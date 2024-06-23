<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\District;
use App\Models\Province;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class ProvinceController extends Controller
{
    public $updateMode = false;

    public $prefix = 'province_';

    public $crudRoutePath = 'provinces';
    public function index()
    {
        abort_if(Gate::denies($this->prefix.'access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $data['prefix']        = $this->prefix;
        $data['updateMode']    = $this->updateMode;
        $data['crudRoutePath'] = $this->crudRoutePath;
        $data['provinces']     = Province::all();

        return view('backend.province.index',$data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies($this->prefix.'create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        try{
            $validate = Validator::make($request->all(), [
                'name' => 'required',
                'province_code' => 'required',
            ]);
            if($request->status){
                $status = true;
            }else{
                $status = false;
            }
            $object_id = $request->object_id;
            if($object_id){
                $type = 'update-object';
                $message = 'Province updated successfully';
            }else{
                $type = 'store-object';
                $message = 'Province created successfully';
            }
            if ($validate->fails()) {
                return response()->json(['status' => 400, 'error' => $validate->errors()->all()]);
            }else{
                $datas = Province::updateOrCreate(['id' => $object_id],[
                    'name' => $request->name,
                    'slug' => Str::slug($request->name),
                    'province_code' => $request->province_code,
                    'created_by' => auth()->user()->id,
                    'status' => $status
                ]);
                $response = [
                    'status'  => 200,
                    'success' => $message,
                    'data'    => $datas,
                    'type'    => $type,
                    'html'    => view('backend.province.templates.ajax_tr',
                    [
                     'prefix'        => $this->prefix,
                     'crudRoutePath' => $this->crudRoutePath,
                     'row'           => $datas
                    ])->render(),
                ];
                return response()->json($response);
            }
        }catch (\Exception $e){
            Log::info($e->getMessage());
            return response()->json(['status' => 400, 'success' => $e->getMessage()]);
        }

    }


    public function show($id)
    {
        abort_if(Gate::denies($this->prefix.'show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $province = Province::findOrFail($id);
        $response = [
            'data' => $province
        ];
        return response()->json($response);
    }


    public function edit($id)
    {
        abort_if(Gate::denies($this->prefix.'edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $province = Province::findOrFail($id);
        $response = [
            'data' => $province
        ];
        return response()->json($response);
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        abort_if(Gate::denies($this->prefix.'delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $province = Province::findOrFail($id);
        // check if have province_id in table users and table districts can not delete
        // $users = User::where('province_id', $id)->first();
        $districts = District::where('province_id', $id)->first();
        if($districts){
            $response = [
                'status' => 400,
                'error' => 'Province can not be deleted because it has use in other'
            ];
            return response()->json($response);
        }else{
            $province->delete();
            $response = [
                'status' => 200,
                'success' => 'Province deleted successfully'
            ];
            return response()->json($response);
        }
    }
    public function changeStatus(Request $request)
    {
        abort_if(Gate::denies($this->prefix.'edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

      $response = Province::find($request->object_id);
      $response->status = $request->status;
      $response->save();
      return response()->json(['success'=>'Status has been change successfully!']);
    }
    public function restore($id)
    {
        abort_if(Gate::denies($this->prefix.'restore'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $province = Province::onlyTrashed()->findOrFail($id);
        $province->restore();
        $response = [
            'status' => 200,
            'success' => 'Province restored successfully'
        ];
        return response()->json($response);
    }
    public function restore_all()
    {
        abort_if(Gate::denies($this->prefix.'restore'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        Province::onlyTrashed()->restore();
        $response = [
            'status' => 200,
            'success' => 'Province restored successfully'
        ];
        return response()->json($response);
    }
}
