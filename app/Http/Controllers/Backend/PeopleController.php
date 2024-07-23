<?php

namespace App\Http\Controllers\Backend;

use App\Models\Team;
use App\Models\Photo;
use App\Models\Couple;
use App\Models\Gender;
use App\Models\Person;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $updateMode = false;

    public $prefix = 'person_';

    public $crudRoutePath = 'peoples';

    public function index(Request $request)
    {
        abort_if(Gate::denies($this->prefix.'access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data['prefix'] = $this->prefix;
        $data['crudRoutePath'] = $this->crudRoutePath;
        $data['updateMode'] = $this->updateMode;
        $data['teams'] = Team::all();
        $data['people'] = Person::paginate(10);

        return view('backend.people.search', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        abort_if(Gate::denies($this->prefix.'create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rules =  [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'sex' => ['required', 'string', 'max:1'],
            'dob' => ['nullable', 'date'],
            'yob' => ['nullable', 'integer'],
            'pob' => ['nullable', 'string', 'max:255'],
            'team_id' => ['required', 'exists:teams,id'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'error' => $validator->errors()->toArray()
            ]);
        } else {
            $object_id = $request->object_id;
            if ($object_id) {
                $person = Person::findOrFail($object_id);
                $type = 'update-object';

                // Check if any changes were made
                $originalData = $person->only(array_keys($request->all()));
                $newData = $request->only(array_keys($request->all()));
                $changes = array_diff_assoc($newData, $originalData);

                if (empty($changes) && !$request->hasFile('photo')) {
                    return response()->json([
                        'status' => 400,
                        'error' => ['message' => 'No changes were made. Please update some fields.']
                    ]);
                }

                $success = 'Person has been updated successfully!';
            } else {
                $person = new Person;
                $type = 'store-object';
                $success = 'Person has been added successfully!';
            }

            $person->firstname = $request->firstname;
            $person->lastname = $request->lastname;
            $person->birthname = $request->birthname;
            $person->nickname = $request->nickname;
            $person->sex = $request->sex;
            $person->dob = $request->dob;
            $person->yob = $request->yob;
            $person->pob = $request->pob;
            $person->team_id = $request->team_id;

            $photos = $person->photo ? json_decode($person->photo, true) : [];

            if ($request->hasFile('photo')) {
                $teamName = $person->team->name; // Assuming you have a relation 'team' in your Person model
                $teamDirectory = 'photos/' . $teamName;

                // Delete all old images if a new one is uploaded
                if ($photos) {
                    foreach ($photos as $oldPhoto) {
                        Storage::disk('public')->delete($teamDirectory . '/' . $oldPhoto);
                    }
                    // Clear the old photos array
                    $photos = [];
                }

                $image = $request->file('photo');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $filePath = $image->storeAs($teamDirectory, $name, 'public');

                // Add new profile image to the photos array
                array_unshift($photos, $name);

                $person->photo = json_encode($photos);
            }

            $person->save();


            // Fetch siblings excluding the current person
            $siblings = Person::where(function($query) use ($person) {
                $query->where('father_id', $person->father_id)
                    ->orWhere('mother_id', $person->mother_id);
            })
            ->where('id', '!=', $person->id)
            ->get();

            if ($request->ajax()) {
                $crudRoutePath = $this->crudRoutePath;
                $view = view('backend.people.partials.people-profiles', compact('person', 'crudRoutePath', 'siblings'))->render();
                return response()->json([
                    'status' => 200,
                    'type' => $type,
                    'data' => $person,
                    'html' => $view,
                    'success' => $success
                ]);
            }

            return response()->json([
                'status' => 200,
                'type' => $type,
                'data' => $person,
                'success' => $success,
            ]);
        }
    }

    public function storeContact(Request $request)
    {
        abort_if(Gate::denies($this->prefix.'create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rules =  [
            'street' => ['nullable', 'string', 'max:255'],
            'number' => ['nullable', 'string', 'max:255'],
            'postal_code' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'province' => ['nullable', 'string', 'max:255'],
            'state' => ['nullable', 'string', 'max:255'],
            'country_id' => ['nullable', 'exists:countries,id'],
            'phone' => ['nullable', 'string', 'max:255'],
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'error' => $validator->errors()->toArray()
            ]);
        }

        $object_id = $request->object_id;
        if ($object_id) {
            $person = Person::findOrFail($object_id);
            $type = 'update-object';

            // Check if any changes were made
            $originalData = $person->only(array_keys($request->all()));
            $newData = $request->only(array_keys($request->all()));
            $changes = array_diff_assoc($newData, $originalData);

            if (empty($changes)) {
                return response()->json([
                    'status' => 400,
                    'error' => ['message' => 'No changes were made. Please update some fields.']
                ]);
            }

            $success = 'Person contact has been updated successfully!';
        } else {
            $person = new Person;
            $type = 'store-object';
            $success = 'Person contact has been added successfully!';
        }

        $person->street = $request->street;
        $person->number = $request->number;
        $person->postal_code = $request->postal_code;
        $person->city = $request->city;
        $person->province = $request->province;
        $person->state = $request->state;
        $person->country_id = $request->country_id;
        $person->phone = $request->phone;

        $person->save();

        // Fetch siblings excluding the current person
            $siblings = Person::where(function($query) use ($person) {
                $query->where('father_id', $person->father_id)
                    ->orWhere('mother_id', $person->mother_id);
            })
            ->where('id', '!=', $person->id)
            ->get();
        
        if ($request->ajax()) {
            $crudRoutePath = $this->crudRoutePath;
            $view = view('backend.people.partials.people-profiles', compact('person', 'crudRoutePath', 'siblings'))->render();
            return response()->json(['status' => 200, 'html' => $view, 'success' => $success]);
        }

        return response()->json([
            'status' => 200,
            'type' => $type,
            'data' => $person,
            'success' => $success,
        ]);
    }

    public function storeDeath(Request $request)
    {
        abort_if(Gate::denies($this->prefix.'create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rules =  [
            'yod' => ['nullable', 'integer'],
            'dod' => ['nullable', 'date'],
            'pod' => ['nullable', 'string', 'max:255'],
            'location_name' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string'],
            'latitude' => ['nullable', 'string'], // require should be number not greater than 90
            'longitude' => ['nullable', 'string'], // require should be number not greater than 180
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'error' => $validator->errors()->toArray()
            ]);
        }

        $object_id = $request->object_id;
        if ($object_id) {
            $person = Person::findOrFail($object_id);
            $type = 'update-object';

            // Check if any changes were made
            $originalData = $person->only(['yod', 'dod', 'pod']);
            $newData = $request->only(['yod', 'dod', 'pod']);
            $changes = array_diff_assoc($newData, $originalData);

            if (empty($changes) && $person->metadata()->count() == 0) {
                return response()->json([
                    'status' => 400,
                    'error' => ['message' => 'No changes were made. Please update some fields.']
                ]);
            }

            $success = 'Person death information has been updated successfully!';
        } else {
            $person = new Person;
            $type = 'store-object';
            $success = 'Person death information has been added successfully!';
        }

        $person->yod = $request->yod;
        $person->dod = $request->dod;
        $person->pod = $request->pod;
        $person->save();

        $metadata = [
            'cemetery_location_name' => $request->location_name,
            'cemetery_location_address' => $request->address,
            'cemetery_location_latitude' => $request->latitude,
            'cemetery_location_longitude' => $request->longitude,
        ];

        foreach ($metadata as $key => $value) {
            $person->metadata()->updateOrCreate(['key' => $key], ['value' => $value]);
        }

        // Fetch siblings excluding the current person
        $siblings = Person::where(function($query) use ($person) {
            $query->where('father_id', $person->father_id)
                ->orWhere('mother_id', $person->mother_id);
        })
        ->where('id', '!=', $person->id)
        ->get();

        if ($request->ajax()) {
            $crudRoutePath = $this->crudRoutePath;
            $view = view('backend.people.partials.people-profiles', compact('person', 'crudRoutePath', 'siblings'))->render();
            return response()->json(['status' => 200, 'html' => $view, 'success' => $success]);
        }

        return response()->json([
            'status' => 200,
            'type' => $type,
            'data' => $person,
            'success' => $success,
        ]);
    }

    public function editDeath($id)
    {
        abort_if(Gate::denies($this->prefix.'edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $person = Person::with('metadata')->findOrFail($id);

        return response()->json([
            'data' => $person,
        ]);
    }

    public function storePhotos(Request $request)
    {
        abort_if(Gate::denies($this->prefix.'create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $person = Person::with('team')->findOrFail($request->object_id);
        $photos = $person->photo ? json_decode($person->photo, true) : [];
        $teamName = $person->team->name;
        $teamDirectory = 'photos/' . $teamName;

        if ($request->hasFile('photo')) {
            foreach ($request->file('photo') as $file) {
                $name = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs($teamDirectory, $name, 'public');
                $photos[] = $name;
            }
            $person->photo = json_encode($photos);
            $person->save();
        }

        $photoGallery = view('backend.people.partials.photo-gallery', compact('person'))->render();

        return response()->json([
            'status' => 200,
            'photos' => $photos,
            'photoGalleryHtml' => $photoGallery,
            'person' => $person,
            'success' => 'Photos have been updated successfully!',
        ]);
    }



    public function editPhotos($id)
    {
        abort_if(Gate::denies($this->prefix.'edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $person = Person::with('team')->findOrFail($id);
        $photos = $person->photo ? json_decode($person->photo, true) : [];

        return response()->json([
            'person' => $person,
            'photos' => $photos,
            'photoCount' => count($photos),  // Pass photo count
        ]);
    }

    public function deletePhoto(Request $request, $id)
    {
        $person = Person::with('team')->findOrFail($id);

        $photoName = $request->photo;
        $teamName = $person->team->name;

        $photos = $person->photo ? json_decode($person->photo, true) : [];

        if (($key = array_search($photoName, $photos)) !== false) {
            unset($photos[$key]);
    
            // Delete the photo file from the storage
            Storage::disk('public')->delete('photos/' . $teamName . '/' . $photoName);
    
            $person->photo = json_encode(array_values($photos));
            $person->save();
        }

        $photoGallery = view('backend.people.partials.photo-gallery', compact('person'))->render();

        return response()->json([
            'status' => 200,
            'photos' => $photos,
            'photoGalleryHtml' => $photoGallery,
            'person' => $person,
            'success' => 'Photo has been deleted successfully!',
        ]);
    }





    public function setPrimaryPhoto(Request $request, $id)
    {
        $person = Person::with('team')->findOrFail($id);

        $photoName = $request->photo;
        $teamName = $person->team->name;

        $photos = $person->photo ? json_decode($person->photo, true) : [];

        if (($key = array_search($photoName, $photos)) !== false) {
            // Remove the photo from its current position
            unset($photos[$key]);
    
            // Re-insert the photo at the beginning of the array
            array_unshift($photos, $photoName);
    
            // Save the updated photos array back to the person record
            $person->photo = json_encode(array_values($photos));
            $person->save();
        }

        $photoGallery = view('backend.people.partials.photo-gallery', compact('person'))->render();

        return response()->json([
            'status' => 200,
            'photoGalleryHtml' => $photoGallery,
            'person' => $person,
            'success' => 'Primary photo has been set successfully!',
        ]);
    }






    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        abort_if(Gate::denies($this->prefix.'show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $crudRoutePath = $this->crudRoutePath;

        // $person = Person::findOrFail($id);
        // $person = Person::with('father', 'mother')->findOrFail($id);
        // $person = Person::with('father', 'mother', 'couple')->findOrFail($id);
        // $person = Person::with('team')->findOrFail($id);
        $person = Person::with('father', 'mother', 'father.father', 'father.mother', 'mother.father', 'mother.mother', 'children', 'children.partner')->findOrFail($id);
        $ancestorData = $this->prepareAncestorData($person);
        $descendantData = $this->prepareDescendantData($person);

        $genders = Gender::all();
        $persons = Person::all();
        $countries = Country::all();

        // Filter couples based on the active team of the person
        $team_id = $person->team_id;
        $couples = Couple::with(['person1', 'person2'])
                         ->where('team_id', $team_id)
                         ->get();


        // Fetch siblings excluding the current person
        $siblings = Person::where(function($query) use ($person) {
            $query->where('father_id', $person->father_id)
                ->orWhere('mother_id', $person->mother_id);
        })
        ->where('id', '!=', $person->id)
        ->get();

        return view('backend.people.show', compact('person', 'crudRoutePath', 'genders', 'persons', 'countries', 'couples', 'siblings', 'ancestorData', 'descendantData'));
    }

    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        abort_if(Gate::denies($this->prefix.'edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $person = Person::with('team')->findOrFail($id);
        $photos = $person->photo ? json_decode($person->photo, true) : [];

        return response()->json([
            'data' => $person,
            'photos' => $photos
        ]);
    }

    public function editContact($id)
    {
        abort_if(Gate::denies($this->prefix.'edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $person = Person::findOrFail($id);

        return response()->json([
            'data' => $person,
        ]);
    }


    /*====== add new person as father ======*/
    public function storeFather(Request $request)
    {
        // Validate the request
        $rules = [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'sex' => ['required', 'string', 'max:1'],
            'dob' => ['nullable', 'date'],
            'yob' => ['nullable', 'integer'],
            'pob' => ['nullable', 'string', 'max:255'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'team_id' => ['required', 'exists:teams,id'], // Add this line to validate team_id
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'error' => $validator->errors()->toArray()
            ]);
        }

        // Store the new father
        $father = new Person;
        $father->firstname = $request->first_name;
        $father->lastname = $request->last_name;
        $father->birthname = $request->birth_name;
        $father->nickname = $request->nick_name;
        $father->sex = $request->sex;
        $father->dob = $request->dob;
        $father->yob = $request->yob;
        $father->pob = $request->pob;
        $father->team_id = $request->team_id; // Save the team_id for the father

        // Handle photo upload
        if ($request->hasFile('photo')) {
            $team = Team::findOrFail($request->team_id); // Fetch the team
            $teamDirectory = 'photos/' . $team->name; // Create the directory structure

            $image = $request->file('photo');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $filePath = $image->storeAs($teamDirectory, $name, 'public');
            $father->photo = json_encode([$name]);
        }

        $father->save();

        // Link the father to the child
        if ($request->filled('child_id')) {
            $child = Person::findOrFail($request->child_id);
            $child->father_id = $father->id;
            
            // Update or create couple if mother exists
            if ($child->mother_id) {
                $couple = Couple::updateOrCreate(
                    ['person1_id' => $father->id, 'person2_id' => $child->mother_id],
                    ['team_id' => $child->team_id]
                );

                $child->parents_id = $couple->id;
            }
            
            $child->save();
        }

        $person = Person::find($request->child_id);
        $familyHtml = view('backend.people.partials.family', compact('person'))->render();

        return response()->json([
            'status' => 200,
            'success' => 'Father has been added successfully!',
            'data' => $father,
            'familyHtml' => $familyHtml
        ]);
    }

    public function selectExistingFather(Request $request)
    {
        // Validate the request
        $rules = [
            'existing_person' => ['required', 'exists:people,id'],
            'child_id' => ['required', 'exists:people,id']
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'error' => $validator->errors()->toArray()
            ]);
        }

        $child = Person::findOrFail($request->child_id);

        if ($child->father_id) {
            return response()->json([
                'status' => 400,
                'error' => 'This child already has a father.'
            ]);
        }

        $child->father_id = $request->existing_person;

        // Update or create couple if mother exists
        if ($child->mother_id) {
            $couple = Couple::updateOrCreate(
                ['person1_id' => $child->father_id, 'person2_id' => $child->mother_id],
                ['team_id' => $child->team_id]
            );

            $child->parents_id = $couple->id;
        }
        $child->save();

        $person = Person::find($request->child_id);
        $familyHtml = view('backend.people.partials.family', compact('person'))->render();

        return response()->json([
            'status' => 200,
            'success' => 'Father has been added successfully!',
            'familyHtml' => $familyHtml
        ]);

        return response()->json([
            'status' => 200,
            'success' => 'Father has been linked successfully!',
            'data' => $child
        ]);
    }

    public function getExistingPersons()
    {
        $persons = Person::select('id', 'firstname', 'lastname')->get();
        return response()->json($persons);
    }

    /*====== end add new person as father ======*/


    /*====== add new person as mother ======*/
    public function storeMother(Request $request)
    {
        // Validate the request
        $rules = [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'sex' => ['required', 'string', 'max:1'],
            'dob' => ['nullable', 'date'],
            'yob' => ['nullable', 'integer'],
            'pob' => ['nullable', 'string', 'max:255'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'team_id' => ['required', 'exists:teams,id'], // Add this line to validate team_id
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'error' => $validator->errors()->toArray()
            ]);
        }

        // Store the new father
        $mother = new Person;
        $mother->firstname = $request->first_name;
        $mother->lastname = $request->last_name;
        $mother->birthname = $request->birth_name;
        $mother->nickname = $request->nick_name;
        $mother->sex = $request->sex;
        $mother->dob = $request->dob;
        $mother->yob = $request->yob;
        $mother->pob = $request->pob;
        $mother->team_id = $request->team_id; // Save the team_id for the mother

        // Handle photo upload
        if ($request->hasFile('photo')) {
            $team = Team::findOrFail($request->team_id); // Fetch the team
            $teamDirectory = 'photos/' . $team->name; // Create the directory structure

            $image = $request->file('photo');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $filePath = $image->storeAs($teamDirectory, $name, 'public');
            $mother->photo = json_encode([$name]);
        }

        $mother->save();

        // Link the mother to the child
        if ($request->filled('child_id')) {
            $child = Person::findOrFail($request->child_id);
            $child->mother_id = $mother->id;
            
            // Update or create couple if father exists
            if ($child->father_id) {
                $couple = Couple::updateOrCreate(
                    ['person1_id' => $child->father_id, 'person2_id' => $mother->id],
                    ['team_id' => $child->team_id]
                );
    
                $child->parents_id = $couple->id;
            }
            
            $child->save();
        }

        $person = Person::find($request->child_id);
        $familyHtml = view('backend.people.partials.family', compact('person'))->render();

        return response()->json([
            'status' => 200,
            'success' => 'Mother has been added successfully!',
            'data' => $mother,
            'familyHtml' => $familyHtml
        ]);
    }

    public function selectExistingMother(Request $request)
    {
        // Validate the request
        $rules = [
            'existing_person' => ['required', 'exists:people,id'],
            'child_id' => ['required', 'exists:people,id']
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'error' => $validator->errors()->toArray()
            ]);
        }

        $child = Person::findOrFail($request->child_id);

        if ($child->mother_id) {
            return response()->json([
                'status' => 400,
                'error' => 'This child already has a mother.'
            ]);
        }

        $child->mother_id = $request->existing_person;

        // Update or create couple if father exists
        if ($child->father_id) {
            $couple = Couple::updateOrCreate(
                ['person1_id' => $child->father_id, 'person2_id' => $child->mother_id],
                ['team_id' => $child->team_id]
            );

            $child->parents_id = $couple->id;
        }
        $child->save();

        $person = Person::find($request->child_id);
        $familyHtml = view('backend.people.partials.family', compact('person'))->render();

        return response()->json([
            'status' => 200,
            'success' => 'Mother has been added successfully!',
            'familyHtml' => $familyHtml
        ]);

        return response()->json([
            'status' => 200,
            'success' => 'Mother has been linked successfully!',
            'data' => $child
        ]);
    }

    public function updateFamily(Request $request)
    {
        $person = Person::findOrFail($request->person_id);

        $father_id = $request->father_id;
        $mother_id = $request->mother_id;

        // Update father, mother, and parents_id if new values are provided
        if ($father_id) {
            $person->father_id = $father_id;
        }

        if ($mother_id) {
            $person->mother_id = $mother_id;
        }

        $couple_id = $request->parents_id;

        // Check if father and mother IDs are not null and couple_id is not provided
        if ($father_id && $mother_id && !$couple_id) {
            // Check if the couple already exists
            $couple = Couple::where(function ($query) use ($father_id, $mother_id) {
                $query->where('person1_id', $father_id)
                    ->where('person2_id', $mother_id);
            })->orWhere(function ($query) use ($father_id, $mother_id) {
                $query->where('person1_id', $mother_id)
                    ->where('person2_id', $father_id);
            })->first();

            // If couple does not exist, create a new couple record
            if (!$couple) {
                $couple = Couple::create([
                    'person1_id' => $father_id,
                    'person2_id' => $mother_id,
                    'team_id' => $person->team_id,
                ]);
            }

            $couple_id = $couple->id;
        }

        // Save the couple_id in the parents_id field if a couple_id is provided or created
        if ($couple_id) {
            $person->parents_id = $couple_id;
        }

        // Save the person record
        $person->save();

        $person = Person::find($request->person_id);
        $familyHtml = view('backend.people.partials.family', compact('person'))->render();

        return response()->json([
            'status' => 200,
            'success' => 'Family information updated successfully!',
            'familyHtml' => $familyHtml
        ]);
    }


    /*====== end add new person as mother ======*/




    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $person = Person::findOrFail($id);
        $person->update($request->all());
        return response()->json(['success' => 'Person updated successfully!', 'data' => $person]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        abort_if(Gate::denies($this->prefix.'delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $person = Person::findOrFail($id);
        $person->delete();

        return response()->json(['success' => 'Person has been deleted successfully!']);
    }

    public function search(Request $request)
    {
        $teams = Team::all();
        $genders = Gender::all();
        $crudRoutePath = $this->crudRoutePath;
        // $active_team_id = $request->query('team_id', $teams->first()->id ?? null);
        $active_team_id = $request->query('team_id', session('active_team_id', $teams->first()->id ?? null));
        $active_team = Team::find($active_team_id);
        if ($active_team) {
            // Store the active team in the session
            session(['active_team_id' => $active_team_id, 'active_team_name' => $active_team->name]);
        }

        $active_team_name = $active_team->name;
        $member_count = $active_team->members->count(); // Assuming 'members' is the relation for persons in the team

        $query = $request->query('query');

        $people = Person::where('team_id', $active_team_id)
                    ->where(function($q) use ($query) {
                        $q->where('firstname', 'like', "%$query%")
                          ->orWhere('lastname', 'like', "%$query%")
                          ->orWhere('birthname', 'like', "%$query%")
                          ->orWhere('nickname', 'like', "%$query%");
                    })
                    ->paginate(10);

        if ($request->ajax()) {
            return view('backend.people.partials.people-cards', compact('people'))->render();
        }

        return view('backend.people.search', compact('teams', 'genders', 'crudRoutePath', 'active_team_id', 'active_team_name', 'member_count', 'people'));
    }




    // public function show()
    // {
    //     return view('backend.people.show');
    // }

    public function ancestors($id)
    {
        $crudRoutePath = $this->crudRoutePath;
        $person = Person::with('father', 'mother')->findOrFail($id);

        return view('backend.people.ancestors', compact('crudRoutePath', 'person'));
    }

    public function descendants($id)
    {
        $crudRoutePath = $this->crudRoutePath;
        $person = Person::with('father', 'mother')->findOrFail($id);

        return view('backend.people.descendants', compact('crudRoutePath', 'person'));
    }

    public function getSiblings($id)
    {
        $person = Person::findOrFail($id);
        $siblings = Person::where(function($query) use ($person) {
            $query->where('father_id', $person->father_id)
                ->orWhere('mother_id', $person->mother_id);
        })
        ->where('id', '!=', $person->id)
        ->get();
        
        return view('backend.people.partials.siblings', compact('siblings'))->render();
    }

    public function getAncestorsDescendants($id)
    {
        $person = Person::with('father', 'mother', 'father.father', 'father.mother', 'mother.father', 'mother.mother', 'children', 'children.partner')->findOrFail($id);
        $ancestorData = $this->prepareAncestorData($person);
        $descendantData = $this->prepareDescendantData($person);

        return response()->json([
            'ancestors' => view('backend.people.partials.ancestors', compact('person', 'ancestorData'))->render(),
            'descendants' => view('backend.people.partials.descendants', compact('person', 'descendantData'))->render(),
        ]);
    }


    private function prepareAncestorData($person)
    {
        $data = [];
        if ($person->father) {
            $data[] = ['key' => $person->father->id, 'name' => $person->father->firstname . ' ' . $person->father->lastname, 'parent' => $person->father->father ? $person->father->father->id : null];
            if ($person->father->father) {
                $data[] = ['key' => $person->father->father->id, 'name' => $person->father->father->firstname . ' ' . $person->father->father->lastname];
            }
            if ($person->father->mother) {
                $data[] = ['key' => $person->father->mother->id, 'name' => $person->father->mother->firstname . ' ' . $person->father->mother->lastname];
            }
        }
        if ($person->mother) {
            $data[] = ['key' => $person->mother->id, 'name' => $person->mother->firstname . ' ' . $person->mother->lastname, 'parent' => $person->mother->father ? $person->mother->father->id : null];
            if ($person->mother->father) {
                $data[] = ['key' => $person->mother->father->id, 'name' => $person->mother->father->firstname . ' ' . $person->mother->father->lastname];
            }
            if ($person->mother->mother) {
                $data[] = ['key' => $person->mother->mother->id, 'name' => $person->mother->mother->firstname . ' ' . $person->mother->mother->lastname];
            }
        }
        $data[] = ['key' => $person->id, 'name' => $person->firstname . ' ' . $person->lastname, 'parent' => $person->father ? $person->father->id : null];
        return $data;
    }

    private function prepareDescendantData($person)
    {
        $data = [];
        $data[] = ['key' => $person->id, 'name' => $person->firstname . ' ' . $person->lastname];
        foreach ($person->children as $child) {
            $data[] = ['key' => $child->id, 'name' => $child->firstname . ' ' . $child->lastname, 'parent' => $person->id];
        }
        return $data;
    }


    public function chart($id)
    {
        $crudRoutePath = $this->crudRoutePath;
        $person = Person::with('father', 'mother')->findOrFail($id);

        return view('backend.people.chart', compact('crudRoutePath', 'person'));
    }

}
