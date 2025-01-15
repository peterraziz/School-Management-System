<?php

namespace App\Http\Controllers\Students\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function index()
    {
        $information = Student::findorFail(auth()->user()->id);
        return view('pages.Students.dashboard.profile', compact('information'));
    }


    public function update(Request $request, string $id)
    {
        $information = Student::findorFail($id);
        if (!empty($request->password)) {
            $information->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $information->password = Hash::make($request->password);
            $information->save();
        } 
        else {
            $information->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $information->save();
        }
        toastr()->success(trans('messages.Update'));
        return redirect()->back();
    }

}
