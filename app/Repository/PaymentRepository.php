<?php

namespace App\Repository;

use App\Models\FundAccount;
use App\Models\PaymentStudent;
use App\Models\Student;
use App\Models\Student_Account;
use Illuminate\Support\Facades\DB;

class PaymentRepository implements PaymentRepositoryInterface{
    // have to make: php artisan make:provider RepoServiceProvider, and also add it in app.php

    public function index()
    {
        $payment_students = PaymentStudent::all();
        return view('pages.Payment.index',compact('payment_students'));
    }



    public function show($id) // show not create To get and show the student data
    {
        $student = Student::findorfail($id);
        return view('pages.Payment.add',compact('student'));
    }



    public function store($request)
    {
        DB::beginTransaction();
        
        try {
        
            // حفظ البيانات في جدول سندات الصرف
            // Saving data in PaymentStudent Table
            $payment_students = new PaymentStudent();
            $payment_students->date = date('Y-m-d');
            $payment_students->student_id = $request->student_id;
            $payment_students->amount = $request->Debit;
            $payment_students->description = $request->description;
            $payment_students->save();
        
            // حفظ البيانات في جدول الصندوق
            // Saving data in FundAccount Table
            $fund_accounts = new FundAccount();
            $fund_accounts->date = date('Y-m-d');
            $fund_accounts->payment_id = $payment_students->id;
            $fund_accounts->Debit = 0.00;
            $fund_accounts->credit = $request->Debit;
            $fund_accounts->description = $request->description;
            $fund_accounts->save();
        
            // حفظ البيانات في جدول حساب الطلاب
            // Saving data in Student_Account Table
            $students_accounts = new Student_Account();
            $students_accounts->date = date('Y-m-d');
            $students_accounts->type = 'payment';
            $students_accounts->student_id = $request->student_id;
            $students_accounts->payment_id = $payment_students->id; ///////
            $students_accounts->Debit = $request->Debit;
            $students_accounts->credit = 0.00;
            $students_accounts->description = $request->description;
            $students_accounts->save();
        
            DB::commit();
            toastr()->success(trans('messages.success'));
            return redirect()->route('Payment_students.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


// To get the data when clicked on the button
    public function edit($id)
    {
        $payment_student = PaymentStudent::findorfail($id);
        return view('pages.Payment.edit',compact('payment_student'));
    
    }



    public function update($request)
    {
        DB::beginTransaction();
        
        try {
        
            // تعديل البيانات في جدول سندات الصرف
            // Edit data in PaymentStudent Table
            $payment_students = PaymentStudent::findorfail($request->id);
            $payment_students->date = date('Y-m-d');
            $payment_students->student_id = $request->student_id;
            $payment_students->amount = $request->Debit;
            $payment_students->description = $request->description;
            $payment_students->save();
        
            // تعديل البيانات في جدول الصندوق
            // Edit data in FundAccount Table
            $fund_accounts = FundAccount::where('payment_id',$request->id)->first();
            $fund_accounts->date = date('Y-m-d');
            $fund_accounts->payment_id = $payment_students->id;
            $fund_accounts->Debit = 0.00;
            $fund_accounts->credit = $request->Debit;
            $fund_accounts->description = $request->description;
            $fund_accounts->save();
        
            // تعديل البيانات في جدول حساب الطلاب
            // Edit data in Student_Account Table
            $students_accounts = Student_Account::where('payment_id',$request->id)->first();
            $students_accounts->date = date('Y-m-d');
            $students_accounts->type = 'payment';
            $students_accounts->student_id = $request->student_id;
            $students_accounts->payment_id = $payment_students->id; ///////
            $students_accounts->Debit = $request->Debit;
            $students_accounts->credit = 0.00;
            $students_accounts->description = $request->description;
            $students_accounts->save();
        
            DB::commit();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('Payment_students.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy($request)
    {
        try {
            PaymentStudent::destroy($request->id);
            
            toastr()->error(trans('messages.Delete'));
            return redirect()->back();
        }
        
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



}