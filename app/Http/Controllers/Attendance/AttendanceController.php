<?php

namespace App\Http\Controllers\Attendance;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Section;
use App\Models\Student;
use App\Repository\AttendanceRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{

    protected $Attendance; 
    // have to make: php artisan make:provider RepoServiceProvider, and also add it in app.php
    public function __construct(AttendanceRepositoryInterface $Attendance)
    {
        $this->Attendance = $Attendance; 
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->Attendance->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    
    public function edit(Request $request)
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
        // $ids= teacher_section_pivot::all();
        // $ids= DB::table('teacher_section_pivot')->where('teacher_id','id')->pluck('section_id');
        $students = Student::whereIn('section_id',$ids)->get();
        return view('pages.Attendance.attendance_report',compact('students')); 
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
        
        $ids = DB::table('teacher_section_pivot')->where('teacher_id', auth()->user()->id)->pluck('section_id');
        $students = Student::whereIn('section_id', $ids)->get();
        
        if($request->student_id == 0){ 
            $Students = Attendance::whereBetween('attendence_date', [$request->from, $request->to])->get();
            return view('pages.Attendance.attendance_report',compact('Students','students'));
        }
        
        else{
            $Students = Attendance::whereBetween('attendence_date', [$request->from, $request->to])
            ->where('student_id',$request->student_id)->get();
            return view('pages.Attendance.attendance_report',compact('Students','students'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->Attendance->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->Attendance->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function show_data(string $id)
    // {
    //     return $this->Attendance->show_data($id);
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return $this->Attendance->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->Attendance->destroy($request);
    }
}
