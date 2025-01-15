<?php

namespace App\Repository;

use App\Models\Classroom;
use App\Models\Fee;
use App\Models\Fee_invoice;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Student_Account;
use Illuminate\Support\Facades\DB;

class FeeInvoicesRepository implements FeeInvoicesRepositoryInterface{
    // have to make: php artisan make:provider RepoServiceProvider, and also add it in app.php

    public function index()
    {
        $Fee_invoices = Fee_invoice::all();
        $Grades = Grade::all(); 
        return view('pages.Fees_invoices.index',compact('Fee_invoices','Grades'));
    }


    public function show($id) // show not create To get and show the student data
    {
        $student = Student::findorfail($id);
        $fees = Fee::where('Classroom_id',$student->Classroom_id)->get();
        $classrooom = Classroom::all();
        return view('pages.Fees_Invoices.add',compact('student','fees','classrooom'));
    }



    public function store($request)
    {
        $List_Fees = $request->List_Fees; // List_Fees in add.blade in Fees_invoices
        
        DB::beginTransaction();
        
        try {
        
            foreach ($List_Fees as $List_Fee) {
                // حفظ البيانات في جدول فواتير الرسوم الدراسية
                // Storing data in Fee Invoices Table
                $Fees = new Fee_invoice();
                $Fees->invoice_date = date('Y-m-d');
                $Fees->student_id = $List_Fee['student_id'];
                $Fees->Grade_id = $request->Grade_id;
                $Fees->Classroom_id = $request->Classroom_id;
                $Fees->fee_id = $List_Fee['fee_id'];
                $Fees->amount = $List_Fee['amount'];
                $Fees->description = $List_Fee['description'];
                $Fees->save();
            
                // حفظ البيانات في جدول حسابات الطلاب
                // Storing data in Student Accounts Table
                $StudentAccount = new Student_Account();
                $StudentAccount->date = date('Y-m-d'); ///
                $StudentAccount->type = ('invoice'); ////
                $StudentAccount->fee_invoice_id = $Fees->id; ///////
                $StudentAccount->student_id = $List_Fee['student_id'];
                // $StudentAccount->Grade_id = $request->Grade_id;  //Delete 
                // $StudentAccount->Classroom_id = $request->Classroom_id;  //Delete
                $StudentAccount->Debit = $List_Fee['amount'];
                $StudentAccount->credit = 0.00;
                $StudentAccount->description = $List_Fee['description'];
                $StudentAccount->save();
                
            }
            DB::commit();
            
            toastr()->success(trans('messages.success'));
            return redirect()->route('Fees_Invoices.index');
        } 
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


// To get the data when clicked on the button
    public function edit($id)
    {
        $fee_invoices = Fee_invoice::findorfail($id);    
        $fees = Fee::where('Classroom_id',$fee_invoices->Classroom_id)->get();
        ///////////
        $studentt = Student::find($fee_invoices->student_id);  
        return view('pages.Fees_Invoices.edit',compact('fee_invoices','fees','studentt'));
    
    }



    public function update($request)
    {
        DB::beginTransaction();
        try {
            // تعديل البيانات في جدول فواتير الرسوم الدراسية
            // Edit data in fee_invoices table
            $Fees = Fee_invoice::findorfail($request->id);
            $Fees->fee_id = $request->fee_id;
            $Fees->amount = $request->amount;
            $Fees->description = $request->description;
            $Fees->save();
        
            // تعديل البيانات في جدول حسابات الطلاب
            // Edit data in Student_Accounts table
            $StudentAccount = Student_Account::where('fee_invoice_id',$request->id)->first();
            $StudentAccount->Debit = $request->amount;
            $StudentAccount->description = $request->description;
            $StudentAccount->save();
            DB::commit();
        
            toastr()->success(trans('messages.Update'));
            return redirect()->route('Fees_Invoices.index');
            
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy($request)
    {
        try {
            Fee_invoice::destroy($request->id);
            
            toastr()->error(trans('messages.Delete'));
            return redirect()->back();
        }
        
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

}