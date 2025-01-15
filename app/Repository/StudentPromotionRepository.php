<?php

namespace App\Repository;

use App\Models\Grade;
use App\Models\promotion;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class StudentPromotionRepository implements StudentPromotionRepositoryInterface{
    // have to make: php artisan make:provider RepoServiceProvider, and also add it in app.php

    public function index()
    {
        $Grades = Grade::all();
        return view('pages.Students.Promotion.index', compact('Grades'));
    }


    public function store($request)
    {
        DB::beginTransaction();
        
        try {
        
            $students = student::where('Grade_id',$request->Grade_id)->where('Classroom_id',   $request->Classroom_id)->where('section_id',$request->section_id)->where('academic_year',$request->academic_year)->get();
            
            if($students->count() < 1){
                // return redirect()->back()->with('error_promotions', __('لا توجد بيانات في جدول الطلاب'));
                // return redirect()->back()->with('error_promotions', __('Students_trans.classrooms'));
                return redirect()->back()->with('error_promotions', trans('Students_trans.Empty_data'));
            }
            
            // update in table student
            foreach ($students as $student){
            
                $ids = explode(',',$student->id);
                student::whereIn('id', $ids)
                    ->update([
                        'Grade_id'=>$request->Grade_id_new,
                        'Classroom_id'=>$request->Classroom_id_new,
                        'section_id'=>$request->section_id_new,
                        'academic_year'=>$request->academic_year_new,
                    ]);
                
                // insert in table promotions
                Promotion::updateOrCreate([
                    'student_id'=>$student->id,
                    'from_grade'=>$request->Grade_id,
                    'from_Classroom'=>$request->Classroom_id,
                    'from_section'=>$request->section_id,
                    'to_grade'=>$request->Grade_id_new,
                    'to_Classroom'=>$request->Classroom_id_new,
                    'to_section'=>$request->section_id_new,
                    'academic_year'=>$request->academic_year,
                    'academic_year_new'=>$request->academic_year_new,
                ]);
            }
            DB::commit(); 
            
            toastr()->success(trans('messages.success'));
            return redirect()->back();  
        
        }
        
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function create()
    {
        $promotions = promotion::all();
        return view('pages.Students.Promotion.management', compact('promotions'));
    }


    public function destroy($request)
    {
        try{
            DB::beginTransaction();
        
            // rollback all
            if($request->page_id ==1){  // 1 = value = delete all in Delete_all.blade
            
                $Promotions = promotion::all(); 
            
                foreach($Promotions as $Promotion){
                    // Update in Students Table
                    $ids = explode(',',$Promotion->student_id);
                    student::whereIn('id', $ids)
                        ->update([
                            'Grade_id'=>$Promotion->from_grade,
                            'Classroom_id'=>$Promotion->from_Classroom,
                            'section_id'=>$Promotion->from_section,
                            'academic_year'=>$Promotion->academic_year,
                        ]);
                        // delete Table Promotions
                        promotion::truncate(); // truncate deletes all rows from the table
                    
                    }
                    DB::commit();
                    toastr()->error(trans('messages.Delete'));
                    return redirect()->back();
            }
            
            else{  // First update in students table, then delete Only 1 student "in Delete_one.blade" 
                $Promotion = promotion::findorfail($request->id);
                
                // Update in Students Table
                student::where('id', $Promotion->student_id)
                        ->update([
                            'Grade_id'=>$Promotion->from_grade,
                            'Classroom_id'=>$Promotion->from_Classroom,
                            'section_id'=>$Promotion->from_section,
                            'academic_year'=>$Promotion->academic_year,
                        ]);
                // Delete in Promotions Table for that specific student
                promotion::destroy($request->id);
                
                DB::commit();  
                toastr()->error(trans('messages.Delete'));
                return redirect()->back();
            }
        
            toastr()->error(trans('messages.Delete'));
        
        }
    
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


}