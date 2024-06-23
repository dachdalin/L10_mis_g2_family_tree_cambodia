<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\District;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Commune;
use App\Models\Province;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class DistrictController extends Controller
{
    public $updateMode = false;

    public $prefix = 'district_';

    public $crudRoutePath = 'districts';
    public function index()
    {
        abort_if(Gate::denies($this->prefix.'access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $data['prefix']        = $this->prefix;
        $data['updateMode']    = $this->updateMode;
        $data['crudRoutePath'] = $this->crudRoutePath;
        $data['districts']     = District::all();
        $data['provices']      = Province::pluck('name','id');

        return view('backend.district.index',$data);
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
                'district_code' => 'required',
            ]);
            if($request->status){
                $status = true;
            }else{
                $status = false;
            }
            $object_id = $request->object_id;
            if($object_id){
                $type = 'update-object';
                $message = 'District updated successfully';
            }else{
                $type = 'store-object';
                $message = 'District created successfully';
            }
            if ($validate->fails()) {
                return response()->json(['status' => 400, 'error' => $validate->errors()->all()]);
            }else{
                $datas = District::updateOrCreate(['id' => $object_id],[
                    'name' => $request->name,
                    'slug' => Str::slug($request->name),
                    'district_code' => $request->district_code,
                    'province_id' => $request->province_id,
                    'created_by' => auth()->user()->id,
                    'status' => $status
                ]);
                $response = [
                    'status'  => 200,
                    'success' => $message,
                    'data'    => $datas,
                    'type'    => $type,
                    'html'    => view('backend.district.templates.ajax_tr',
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
        $district = District::findOrFail($id);
        $response = [
            'data' => $district
        ];
        return response()->json($response);
    }


    public function edit($id)
    {
        abort_if(Gate::denies($this->prefix.'edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $district = District::findOrFail($id);
        $response = [
            'data' => $district
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
        $district = District::findOrFail($id);
        // check if have province_id in table users and table districts can not delete
        // $users = User::where('province_id', $id)->first();
        $commune = Commune::where('district_id', $id)->first();
        if($commune){
            $response = [
                'status' => 400,
                'error' => 'District can not be deleted because it has use in other'
            ];
            return response()->json($response);
        }else{
            $district->delete();
            $response = [
                'status' => 200,
                'success' => 'District deleted successfully'
            ];
            return response()->json($response);
        }
    }
    public function changeStatus(Request $request)
    {
        abort_if(Gate::denies($this->prefix.'edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

      $response = District::find($request->object_id);
      $response->status = $request->status;
      $response->save();
      return response()->json(['success'=>'Status has been change successfully!']);
    }
    public function restore($id)
    {
        abort_if(Gate::denies($this->prefix.'restore'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $district = District::onlyTrashed()->findOrFail($id);
        $district->restore();
        $response = [
            'status' => 200,
            'success' => 'District restored successfully'
        ];
        return response()->json($response);
    }
    public function restore_all()
    {
        abort_if(Gate::denies($this->prefix.'restore'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        District::onlyTrashed()->restore();
        $response = [
            'status' => 200,
            'success' => 'District restored successfully'
        ];
        return response()->json($response);
    }
}
