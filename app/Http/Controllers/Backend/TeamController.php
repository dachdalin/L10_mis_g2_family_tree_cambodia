<?php

namespace App\Http\Controllers\Backend;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class TeamController extends Controller
{
    public $updateMode = false;

    public $prefix = 'team_';

    public $crudRoutePath = 'teams';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['prefix']        = $this->prefix;
        $data['updateMode']    = $this->updateMode;
        $data['crudRoutePath'] = $this->crudRoutePath;
        $data['teams'] = Team::with('owner')->get();

        return view('backend.teams.create_teams', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        abort_if(Gate::denies($this->prefix.'create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        try {
            $validate = Validator::make($request->all(), [
                'name' => 'required',
                'description' => 'nullable',
            ]);
    
            // if ($request->status) {
            //     $status = true;
            // } else {
            //     $status = false;
            // }
    
            $object_id = $request->object_id;
            if ($object_id) {
                $type = 'update-object';
                $message = 'Team updated successfully';
            } else {
                $type = 'store-object';
                $message = 'Team created successfully';
            }
    
            if ($validate->fails()) {
                return response()->json(['status' => 400, 'error' => $validate->errors()->all()]);
            } else {
                $data = Team::updateOrCreate(['id' => $object_id], [
                    'name' => $request->name,
                    'description' => $request->description,
                    'user_id' => auth()->user()->id,
                    'personal_team' => 0,
                    // 'status' => $status
                ]);
    
                $response = [
                    'status'  => 200,
                    'success' => $message,
                    'data'    => $data,
                    'type'    => $type,
                    'html'    => view('backend.teams.templates.ajax_tr', [
                        'prefix' => 'teams',
                        'crudRoutePath' => 'teams',
                        'row' => $data
                    ])->render(),
                ];
    
                return response()->json($response);
            }
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return response()->json(['status' => 400, 'success' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        abort_if(Gate::denies($this->prefix.'edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $team = Team::findOrFail($id);
        $response = [
            'data' => $team
        ];
        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        abort_if(Gate::denies($this->prefix.'delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $team = Team::findOrFail($id);
        if($team){
            $response = [
                'status' => 400,
                'error' => 'Team can not be deleted because it has use in other'
            ];
            return response()->json($response);
        }else{
            $team->delete();
            $response = [
                'status' => 200,
                'success' => 'Team deleted successfully'
            ];
            return response()->json($response);
        }
    }


    public function restore($id)
    {
        abort_if(Gate::denies($this->prefix.'restore'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $team = Team::onlyTrashed()->findOrFail($id);
        $team->restore();
        $response = [
            'status' => 200,
            'success' => 'Team restored successfully'
        ];
        return response()->json($response);
    }
    public function restore_all()
    {
        abort_if(Gate::denies($this->prefix.'restore'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        Team::onlyTrashed()->restore();
        $response = [
            'status' => 200,
            'success' => 'Team restored successfully'
        ];
        return response()->json($response);
    }
}
