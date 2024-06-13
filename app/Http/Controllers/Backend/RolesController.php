<?php

namespace App\Http\Controllers\Backend;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class RolesController extends Controller
{
    public $prefix = 'role_';

    public $crudRoutePath = 'roles';

    public function index()
    {
        abort_if(Gate::denies($this->prefix.'access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
      
        $data['prefix'] = $this->prefix;
        $data['crudRoutePath'] = $this->crudRoutePath;
        $data['roles'] = Role::with('permissions')->latest()->get();
        $data['all_permissions'] = Permission::all()->groupBy('group')->toArray();
        return view('backend.role.index',$data);
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
      
        if($request->status){
            $status = true;
          } else {
            $status = false;
          }
          $object_id= $request->object_id;
          $validator = Validator::make($request->all(),[
            'title' => ['required','string'],
            'permissions.*' => ['integer'],
            'permissions' => [
              'required',
              'array',
            ],
          ]);
          if(!$validator->passes()){
            $response = [
              'status' => 400,
              'error'  => $validator->errors()->toArray()
            ];
            return response()->json($response);
          } else {
            $datas   =   Role::updateOrCreate([
              'id' => $object_id],
              [
                'title' => $request->title,
                'status' => $status
              ]);
            $datas->permissions()->sync($request->permissions);
            if($object_id){
              $type = 'update-object';
              $success = 'Permission has been Updated!';
            } else {
              $type = 'store-object';
              $success = 'Permission has been registered!';
            }
            $response = [
              'status'  => 200,
              'type'    => $type,
              'success' => $success,
              'data'    => $datas,
              'html'    => view('backend.role.templates.ajax_tr',[
                'row'=> $datas,
                'prefix'=>$this->prefix,
                'crudRoutePath'=> $this->crudRoutePath])
                ->render(),
            ];
          }
          return response()->json($response);
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
    public function edit(Role $role)
    {
      abort_if(Gate::denies($this->prefix.'edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
      
        $response= [
            'data'    => $role,
            'role_permissions' => $role->permissions->pluck('id','id')->toArray(),
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
    public function destroy(Role $role)
    {
      abort_if(Gate::denies($this->prefix.'delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
      
        $role->delete();
        return response()->json(['success'=>'Item has been deleted successfully!']);
    }

    public function changeStatus(Request $request)
    {
      abort_if(Gate::denies($this->prefix.'edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
      
      $response = Role::find($request->object_id);
      $response->status = $request->status;
      $response->save();
      return response()->json(['success'=>'Status has been change successfully!']);
    }
}
