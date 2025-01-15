<?php

namespace App\Http\Controllers\Parents\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Degree;
use App\Models\Fee_invoice;
use App\Models\ReceiptStudent;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SonsController extends Controller
{
    public function index()
    {
        $students = Student::where('parent_id', auth()->user()->id)->get(); 
        return view('livewire.dashboard_parents.sons.index', compact('students'));
    }


    public function results($id)
    {
        $students = Student::findorfail($id);
        if($students->parent_id == auth()->user()->id){ 
            $degrees = Degree::where('student_id', $id)->get();
        
        if($degrees->isNotEmpty()){
            return view('livewire.dashboard_parents.degrees.index', compact('degrees'));
        }
        else{
            toastr()->error(trans('subjects_trans.no_result'));
            return redirect()->route('sons.index');
        }
        
        } 
        else{ 
            return view('errors.404');
        } 
    }

    public function attendances()
    {
        $students = Student::where('parent_id', auth()->user()->id)->get(); 
        return view('livewire.dashboard_parents.attendances.index', compact('students'));
    }

    public function search(Request $request)
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
        return view('livewire.dashboard_parents.attendances.index', compact('Students','students'));
        }
        
        else{
            $Students = Attendance::whereBetween('attendence_date', [$request->from, $request->to])
            ->where('student_id',$request->student_id)->get();
        return view('livewire.dashboard_parents.attendances.index', compact('Students','students'));
        }
    }


    public function fees()
    {
        $students_ids = Student::where('parent_id', auth()->user()->id)->pluck('id'); 
        $fee_invoices = Fee_invoice::whereIn('student_id', $students_ids)->get(); 
        
        return view('livewire.dashboard_parents.fees.index', compact('fee_invoices'));
    }


    public function receipt($id)
    {
        $students = Student::findorfail($id);
        if($students->parent_id !== auth()->user()->id){ 
            toastr()->error(trans('subjects_trans.no_result'));
            return redirect()->route('sons.fees');
        }
        
        $receipt_students = ReceiptStudent::where('student_id',$id)->get();  
        if($receipt_students->isNotEmpty()){
        return view('livewire.dashboard_parents.receipt.index', compact('receipt_students'));
        }
        else{
            toastr()->error(trans('subjects_trans.no_result'));
            return redirect()->route('sons.fees');
        } 
    }

}
