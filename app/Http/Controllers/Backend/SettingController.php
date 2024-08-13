<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\ImageHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        $data = [];
        $settings = \App\Models\Setting::all();
        $data['meta_title'] = $settings->where('key', 'meta_title')->first()->value??'';
        $data['meta_description'] = $settings->where('key', 'meta_description')->first()->value??'';
        $data['meta_keywords'] = $settings->where('key', 'meta_keywords')->first()->value??'';
        $data['meta_author'] = $settings->where('key', 'meta_author')->first()->value??'';
        $data['meta_image'] = $settings->where('key', 'meta_image')->first()->value??'';
        $data['logo'] = $settings->where('key', 'logo')->first()->value??'';
        $data['favicon'] = $settings->where('key', 'favicon')->first()->value??'';
        return view('settings.index', $data);
    }

    public function update(Request $request)
    {
        try{
            DB::beginTransaction();
            $all_request = $request->all();
            foreach($all_request as $key => $value){
                // save image
                if($request->hasFile($key) && in_array($key, ['logo', 'favicon','meta_image'])){
                    $setting = Setting::firstOrCreate(['key' => $key]);
                    $old_image = $setting->value;

                    if ($old_image != null) {
                        $image = ImageHelper::update($request->file($key), 'uploads/settings/', $old_image);
                    } else {
                        $image = ImageHelper::upload($request->file($key), 'uploads/settings/');
                    }

                    $setting->value = $image;
                    $setting->save();

                    continue;
                }
                // save text
                if(!in_array($key, ['_token', '_method','logo', 'favicon','meta_image'])){
                    if(in_array($key, ['meta_title', 'meta_description', 'meta_keywords','meta_author'])){
                        Setting::updateOrCreate(
                            ['key' => $key],
                            ['value' => $value]
                        );
                    }
                }
            }
            DB::commit();
            $output = [
                'success' => true,
                'msg' => __('បានកែប្រែដោយជោគជ័យ')
            ];

        }catch(\Exception $e){
            DB::rollBack();
            $output = [
                'success' => false,
                'msg' => $e->getMessage()
            ];
        }
        return redirect()->back()->with($output);
    }
}
