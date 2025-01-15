<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $information = User::findorFail(auth()->user()->id);
        return view('pages.Admin.profile', compact('information'));
    }


    public function update(Request $request, string $id)
    {
        $information = User::findorFail($id);
        if (!empty($request->password)) {
            $information->name = $request->name;
            $information->email = $request->email;
            $information->password = Hash::make($request->password);
            $information->save();
        } 
        else {
            $information->name = $request->name;
            $information->email = $request->email;
            $information->save();
        }
        toastr()->success(trans('messages.Update'));
        return redirect()->back();
    }

}
