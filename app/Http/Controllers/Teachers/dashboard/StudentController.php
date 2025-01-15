<?php

namespace App\Http\Controllers\Teachers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ids= DB::table('teacher_section_pivot')->where('teacher_id',auth()->user()->id)->pluck('section_id');
        $students = Student::whereIn('section_id',$ids)->get();
        return view('pages.Teachers.dashboard.students.index',compact('students')); 
    }


    public function sections()
    {
        $ids = DB::table('teacher_section_pivot')->where('teacher_id', auth()->user()->id)->pluck('section_id');
        $sections = Section::whereIn('id', $ids)->get();
        return view('pages.Teachers.dashboard.sections.index', compact('sections'));
    }


    public function attendance(Request $request)
    {
        try {
            $attenddate = date('Y-m-d'); 
            foreach ($request->attendences as $studentid => $attendence) {
            
                if ($attendence == 'presence') {
                    $attendence_status = true;
                } 
                else if ($attendence == 'absent') {
                    $attendence_status = false;
                }
            
                // Attendance::create([
                    Attendance::updateOrcreate(
                        [
                            'student_id'=>$studentid,
                            'attendence_date'=>$attenddate
                        ],
                        [   // this code is with the other way in pages\Teachers\dashboard\students\index.blade.php
                    'student_id' => $studentid,
                    'grade_id' => $request->grade_id,
                    'classroom_id' => $request->classroom_id,
                    'section_id' => $request->section_id,
                    'teacher_id' => 1,
                    'attendence_date' => $attenddate,
                    'attendence_status' => $attendence_status
                ]);
            }
            toastr()->success(trans('messages.success'));
            return redirect()->back();
        } 
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function editAttendance(Request $request)
    {
        try{
            $date = date('Y-m-d');
            $student_id = Attendance::where('attendence_date',$date)->where('student_id',$request->id)->first();
            if( $request->attendences == 'presence' ) {
                $attendence_status = true;
            } 
            else if( $request->attendences == 'absent' ){
                $attendence_status = false;
            }
            $student_id->update([
                'attendence_status'=> $attendence_status
            ]);
            toastr()->success(trans('messages.success'));
            return redirect()->back();
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function attendanceReport()
    {
        $ids= DB::table('teacher_section_pivot')->where('teacher_id',auth()->user()->id)->pluck('section_id');
        $students = Student::whereIn('section_id',$ids)->get();
        return view('pages.Teachers.dashboard.students.attendance_report',compact('students')); 
    }


    public function attendanceSearch(Request $request)
    {
        $request->validate([
            'from'  =>'required|date|date_format:Y-m-d',
            'to'=> 'required|date|date_format:Y-m-d|after_or_equal:from'
        ],[
            'to.after_or_equal' => trans('subjects_trans.after_or_equal'), 
            'from.date_format' => trans('subjects_trans.date_format_from'),
            'to.date_format' => trans('subjects_trans.date_format_to'),
        ]);
        
        // Get section IDs for the logged-in teacher
        $ids = DB::table('teacher_section_pivot')
                ->where('teacher_id', auth()->user()->id)
                ->pluck('section_id');
        
        // Get all students for the teacher's sections
        $students = Student::whereIn('section_id', $ids)->get();
        
        if($request->student_id == 0){ 
            // Retrieve attendance only for students in the teacher's sections
            $Students = Attendance::whereIn('section_id', $ids)
                        ->whereBetween('attendence_date', [$request->from, $request->to])
                        ->get();
        } 
        else {
            // Retrieve attendance for a specific student if selected
            $Students = Attendance::whereBetween('attendence_date', [$request->from, $request->to])
                        ->where('student_id', $request->student_id)
                        ->whereIn('section_id', $ids)  // Ensure this student is within the teacher's sections
                        ->get();
        }
        
        return view('pages.Teachers.dashboard.students.attendance_report', compact('Students', 'students'));
    }
    

}
