<?php

namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTeachersRequest;
use App\Models\Gender;
use App\Models\Specialization;
use Illuminate\Http\Request;
use App\Repository\TeacherRepositoryInterface; 

class TeacherController extends Controller
{

    protected $Teacher;
    // have to make: php artisan make:provider RepoServiceProvider, and also add it in app.php
    public function __construct(TeacherRepositoryInterface $Teacher)
    {
        $this->Teacher = $Teacher; 
    }

    /**
     * Display a listing of the resource.

     */
    public function index()
    {
        $Teachers = $this->Teacher->getAllTeachers();
        return view('pages.Teachers.Teachers', compact('Teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $specializations = $this->Teacher->Getspecialization();
        $genders = $this->Teacher->GetGender();
        return view('pages.Teachers.create', compact('specializations','genders'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeachersRequest $request) // Validation
    {
        return $this->Teacher->StoreTeachers($request);
        
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
    public function edit(string $id)
    {
        $Teachers = $this->Teacher->EditTeachers($id);
        $specializations = $this->Teacher->Getspecialization();
        $genders = $this->Teacher->GetGender();
        
        return view('pages.Teachers.edit', compact('Teachers','specializations','genders'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        return $this->Teacher->UpdateTeachers($request,$id);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->Teacher->DeleteTeachers($request);
        
    }
}
