<?php

namespace App\Http\Controllers\Backend;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{
    public $updateMode = false;

    public $prefix = 'user_';

    public $crudRoutePath = 'users';

    public function index(Request $request)
    {
        abort_if(Gate::denies($this->prefix.'access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data['prefix'] = $this->prefix;
        $data['crudRoutePath'] = $this->crudRoutePath;
        $data['updateMode'] = $this->updateMode;
        $data['roles'] = Role::pluck('title', 'id');
        $data['users'] = User::first()->get();

        // if($request->has('view_deleted'))
        // {
        // }
        // $data['users_trash'] = User::onlyTrashed()->get();
        return view('backend.user.index',$data);
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'name'  => ['required','unique:users'],
            'roles.*' => [
                'integer',
            ],
            'roles' => [
                'required',
                'array',
            ],
            ];
            if($request->status){
                $status = true;
            } else {
                $status = false;
            }
            $object_id= $request->object_id;
            if($object_id){
            unset(
                $rules['email'],
                $rules['name'],
                $rules['password'],
            );

            $type = 'update-object';
                $success = 'User has been updated successfully!';
            } else {
            $type = 'store-object';
                $success = 'User has been register successfully!';
            }

            $validator = Validator::make($request->all(),$rules);
            if($validator->fails()){
            $response = [
                'status' => 400,
                'error' =>$validator->errors()->toArray()
            ];
            return response()->json($response);
            } else {
            if(!$request->password){
                $datas   =   User::updateOrCreate([
                'id' => $object_id],
                [
                    'name' => $request->name,
                    'email' => $request->email,
                    'status' => $status
                ]);
            } else {
                $datas   =   User::updateOrCreate([
                    'id' => $object_id],
                    [
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'status' => $status
                    ]);
                }
            $datas->roles()->sync($request->roles);
            $response = [
                'status'   => 200,
                'type'    => $type,
                'data'    => $datas,
                'success' => $success,
                'html'    => view('backend.user.templates.ajax_tr',[
                'row'=> $datas,
                'prefix'=>$this->prefix,
                'crudRoutePath'=> $this->crudRoutePath])
                ->render(),
            ];
            return response()->json($response);
            }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        abort_if(Gate::denies($this->prefix.'show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

         $user = User::findOrFail($id);
        $response = [
        'data'  => $user
        ];
        return response()->json($response);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        abort_if(Gate::denies($this->prefix.'edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

         $response = [
        'data'  => User::findOrFail($id)->load('roles')
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

        $datas = User::find($id)->delete();

        return response()->json($datas);
    }

    public function restore($id)
    {
        $resdatas = User::withTrashed()->find($id)->restore();
        return response()->json($resdatas);
    }

    public function restore_all()
    {
        $resdatasall = User::onlyTrashed()->restore();
        return response()->json($resdatasall);
    }

    public function changeStatus(Request $request)
    {
        abort_if(Gate::denies($this->prefix.'edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

      $response = User::find($request->object_id);
      $response->status = $request->status;
      $response->save();
      return response()->json(['success'=>'Status has been change successfully!']);
    }
}
