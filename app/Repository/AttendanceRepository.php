<?php

namespace App\Repository;

use App\Models\Attendance;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Teacher;

class AttendanceRepository implements AttendanceRepositoryInterface{
    // have to make: php artisan make:provider RepoServiceProvider, and also add it in app.php

    public function index()
    {
        $Grades = Grade::with(['Sections'])->get();
        $list_Grades = Grade::all();
        $teachers = Teacher::all();
        return view('pages.Attendance.Sections',compact('Grades','teachers','list_Grades'));
    }



    public function show($id) // show not create To get and show the student data
    {
        $students = Student::with('attendance')->where('section_id',$id)->get();
        return view('pages.Attendance.index',compact('students'));
    }



    public function store($request)
    {
        try {
            $attenddate = date('Y-m-d'); 
            foreach ($request->attendences as $studentid => $attendence) {
                if( $attendence == 'presence' ){
                    $attendence_status = true;
                }
                else if( $attendence == 'absent' ){
                    $attendence_status = false;
                }
                
                // Attendance::create([
                Attendance::updateOrcreate(
                    [
                        'student_id'=>$studentid,
                        'attendence_date'=>$attenddate
                    ],
                    [   // this code is with the other way in pages\Attendance\index.blade.php
                    'student_id'=> $studentid,
                    'grade_id'=> $request->grade_id,
                    'classroom_id'=> $request->classroom_id,
                    'section_id'=> $request->section_id,
                    'teacher_id'=> 1,
                    'attendence_date'=> date('Y-m-d'),
                    'attendence_status'=> $attendence_status
                ]);
            }
            toastr()->success(trans('messages.success'));
            return redirect()->back();
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


// // To get the data when clicked on the button
    // public function show_data($id)
    // {
    //     $Grades = Attendance::findorfail($id);
    //     return view('pages.Attendance.Sections',compact('Grades'));
    // }



    public function update($request)
    {
        //
    }


    public function destroy($request)
    {
        //
    }



}