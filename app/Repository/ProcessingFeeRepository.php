<?php

namespace App\Repository;

use App\Models\ProcessingFee;
use App\Models\Student;
use App\Models\Student_Account;
use Illuminate\Support\Facades\DB;

class ProcessingFeeRepository implements ProcessingFeeRepositoryInterface{
    // have to make: php artisan make:provider RepoServiceProvider, and also add it in app.php

    public function index()
    {
        $ProcessingFees = ProcessingFee::all(); 
        return view('pages.ProcessingFee.index',compact('ProcessingFees'));
    }



    public function show($id) // show not create To get and show the student data
    {
        $student = Student::findorfail($id);
        return view('pages.ProcessingFee.add',compact('student'));
    }



    public function store($request)
    {
        DB::beginTransaction();
        
        try {
            // حفظ البيانات في جدول معالجة الرسوم
            // Saving data in ProcessingFee Table
            $ProcessingFee = new ProcessingFee();
            $ProcessingFee->date = date('Y-m-d');
            $ProcessingFee->student_id = $request->student_id;
            $ProcessingFee->amount = $request->Debit;
            $ProcessingFee->description = $request->description;
            $ProcessingFee->save();
        
            // حفظ البيانات في جدول حساب الطلاب
            // Saving data in Student_Account Table
            $students_accounts = new Student_Account();
            $students_accounts->date = date('Y-m-d');
            $students_accounts->type = 'Processing Fee';
            $students_accounts->student_id = $request->student_id;
            $students_accounts->processing_id = $ProcessingFee->id;
            $students_accounts->Debit = 0.00;
            $students_accounts->credit = $request->Debit;
            $students_accounts->description = $request->description;
            $students_accounts->save();
            
            DB::commit();
            
            toastr()->success(trans('messages.success'));
            return redirect()->route('ProcessingFee.index');
        } 
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


// // To get the data when clicked on the button
    public function edit($id)
    {
        $ProcessingFee = ProcessingFee::findorfail($id);    
        return view('pages.ProcessingFee.edit',compact('ProcessingFee'));
    
    }



    public function update($request)
    {
        DB::beginTransaction();
        
        try {
            // تعديل البيانات في جدول معالجة الرسوم
            // Edit data in ProcessingFee Table
            $ProcessingFee = ProcessingFee::findorfail($request->id);
            $ProcessingFee->date = date('Y-m-d');
            $ProcessingFee->student_id = $request->student_id;
            $ProcessingFee->amount = $request->Debit;
            $ProcessingFee->description = $request->description;
            $ProcessingFee->save();
        
            // تعديل البيانات في جدول حساب الطلاب
            // Edit data in Student_Account Table
            $students_accounts = Student_Account::where('processing_id',$request->id)->first();
            $students_accounts->date = date('Y-m-d');
            $students_accounts->type = 'Processing Fee';
            $students_accounts->student_id = $request->student_id;
            $students_accounts->processing_id = $ProcessingFee->id;
            $students_accounts->Debit = 0.00;
            $students_accounts->credit = $request->Debit;
            $students_accounts->description = $request->description;
            $students_accounts->save();
            
            DB::commit();
            
            toastr()->success(trans('messages.Update'));
            return redirect()->route('ProcessingFee.index');
        } 
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy($request)
    {
        try {
            ProcessingFee::destroy($request->id);
            
            toastr()->error(trans('messages.Delete'));
            return redirect()->back();
        }
        
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


}