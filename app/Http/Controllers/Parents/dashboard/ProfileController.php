<?php

namespace App\Http\Controllers\Parents\dashboard;

use App\Http\Controllers\Controller;
use App\Models\My_Parent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $information = My_Parent::findorFail(auth()->user()->id); 
        return view('livewire.dashboard_parents.profile.profile', compact('information'));
    }


    public function update(Request $request, string $id)
    {
        $information = My_Parent::findorFail($id);
        // if (!empty($request->password)) {
            // $information->Name_Father = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            // $information->Name_Mother = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $information->password = Hash::make($request->password);
            $information->save();
        // } 
        // else {
            // $information->Name_Father = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            // $information->Name_Mother = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            // $information->save();
        // }
        toastr()->success(trans('messages.Update'));
        return redirect()->back();
    }
}
