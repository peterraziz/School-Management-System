<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $collection = Settings::all();
        $setting['setting'] = $collection->flatMap(function ($collection) 
        {
            return [$collection->key => $collection->value];
        });
        return view('pages.Settings.index', $setting);
    }


    public function uploadFile($request,$name,$folder)
    {
        $file_name = $request->file($name)->getClientOriginalName();
        // $request->file($name)->storeAs('attachments/logo/',$file_name,'upload_attachments');
        $request->file($name)->storeAs('attachments/',$folder.'/'.$file_name,'upload_attachments');
    }

    public function update(Request $request)
    {
        try{
            $info = $request->except('_token', '_method', 'logo');
            // $info = $request->except('_token', '_method');
            foreach ($info as $key=> $value){
                Settings::where('key', $key)->update(['value' => $value]);
            }
        
            // Or :
            // $key = array_keys($info);
            // $value = array_values($info);
            // for($i =0; $i<count($info);$i++) {
            //     Setting::where('key', $key[$i])->update(['value' => $value[$i]]);
            // }
        
            if($request->hasFile('logo')) {
                $logo_name = $request->file('logo')->getClientOriginalName();
                Settings::where('key', 'logo')->update(['value' => $logo_name]);
                $this->uploadFile($request,'logo','logo'); // name, and folder name
            }
            
            toastr()->success(trans('messages.Update'));
            return back();
            }
            catch (\Exception $e){
                return redirect()->back()->with(['error' => $e->getMessage()]);
            }
    }
}