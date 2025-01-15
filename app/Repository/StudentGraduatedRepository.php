<?php

namespace App\Repository;

use App\Models\Grade;
use App\Models\Student;
use App\Models\promotion;


class StudentGraduatedRepository implements StudentGraduatedRepositoryInterface{
    // have to make: php artisan make:provider RepoServiceProvider, and also add it in app.php

    public function index()
    {
        $students = Student::onlyTrashed()->get();
        return view('pages.Students.Graduation.index', compact('students'));
        // return view('pages.Students.Graduation.index', compact('students','promotionn','studentt','Gradee'));
    }


    public function create()
    {
        $Grades = Grade::all();
        return view('pages.Students.Graduation.create', compact('Grades'));
    }


    public function softDelete($request)
    {
        $students = Student::where('Grade_id',$request->Grade_id)->where('Classroom_id',$request->Classroom_id)->where('section_id',$request->section_id)->get();
    
        if($students->count() < 1){ // To make sure the table is not empty
            return redirect()->back()->with('error_Graduated', trans('Students_trans.Empty_data'));
        }
        else{ // softDelete Process 
            foreach ($students as $student){
                $ids = explode(',',$student->id);
                Student::whereIn('id',$ids)->delete();
            }
            toastr()->success(trans('messages.success'));
            return redirect()->route('Graduated.index');
        }
    }


    public function ReturnData($request)
    {
        Student::onlyTrashed()->where('id',$request->id)->first()->restore();
    
        toastr()->success(trans('messages.success'));
        return redirect()->back();    
}


    public function destroy($request)
    {
        Student::onlyTrashed()->where('id',$request->id)->first()->forceDelete();
    
        toastr()->error(trans('messages.Delete'));
        return redirect()->back();   
    }


}