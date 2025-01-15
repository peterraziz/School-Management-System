<?php

namespace App\Repository;

use App\Models\Classroom;
use App\Models\Gender;
use App\Models\Grade;
use App\Models\Image;
use App\Models\My_Parent;
use App\Models\Nationalitie;
use App\Models\Section;
use App\Models\Student;
use App\Models\Type_Blood;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StudentRepository implements StudentRepositoryInterface{
    // have to make: php artisan make:provider RepoServiceProvider, and also add it in app.php
    public function Get_Student()
    {
        $students = Student::all();
        return view('pages.Students.index', compact('students')); 
    }
    
    public function Edit_Student($id)
    {
        $data['Grades'] = Grade::all();
        $data['Genders'] = Gender::all();
        $data['my_classes'] = Grade::all();
        $data['parents'] = My_Parent::all(); 
        $data['nationals'] = Nationalitie::all();
        $data['bloods'] = Type_Blood::all();
        
        $Students = Student::findorfail($id);
        return view('pages.Students.edit',$data, compact('Students'));
    }
    
    public function Show_Student($id)
    {
        $Student = Student::findorfail($id);
    
        return view('pages.Students.show', compact('Student'));
    }
    
    // public function Update_Student($request,$id) 
    // {
    //     try {
    //         $Edit_Students = Student::findorfail($request->id);
    //         $Edit_Students->name = ['ar' => $request->name_ar, 'en' => $request->name_en];
    //         $Edit_Students->email = $request->email;
    //         $Edit_Students->password = Hash::make($request->Password);
    //         $Edit_Students->National_ID = $request->National_ID;
    //         $Edit_Students->Phone_number = $request->Phone_number;
    //         $Edit_Students->gender_id = $request->gender_id;
    //         $Edit_Students->nationalitie_id = $request->nationalitie_id;
    //         $Edit_Students->blood_id = $request->blood_id;
    //         $Edit_Students->Date_Birth = $request->Date_Birth;
    //         $Edit_Students->Grade_id = $request->Grade_id;
    //         $Edit_Students->Classroom_id = $request->Classroom_id;
    //         $Edit_Students->section_id = $request->section_id;
    //         $Edit_Students->parent_id = $request->parent_id;
    //         $Edit_Students->academic_year = $request->academic_year;
    //         $Edit_Students->save();
        
    //         toastr()->success(trans('messages.Update'));
    //         return redirect()->route('Students.index');
    //     } catch (\Exception $e) {
    //         return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    //     }
    // }
    public function Update_Student($request, $id)
    {
        try {
            $Edit_Students = Student::findOrFail($request->id);
            
            // Update basic details
            $Edit_Students = Student::findorfail($request->id);
            $Edit_Students->name = ['ar' => $request->name_ar, 'en' => $request->name_en];
            $Edit_Students->email = $request->email;
            $Edit_Students->National_ID = $request->National_ID;
            $Edit_Students->Phone_number = $request->Phone_number;
            $Edit_Students->gender_id = $request->gender_id;
            $Edit_Students->nationalitie_id = $request->nationalitie_id;
            $Edit_Students->blood_id = $request->blood_id;
            $Edit_Students->Date_Birth = $request->Date_Birth;
            $Edit_Students->Grade_id = $request->Grade_id;
            $Edit_Students->Classroom_id = $request->Classroom_id;
            $Edit_Students->section_id = $request->section_id;
            $Edit_Students->parent_id = $request->parent_id;
            $Edit_Students->academic_year = $request->academic_year;
        
            // Update password only if provided
            if (!empty($request->Password)) {
            $Edit_Students->password = Hash::make($request->Password);
            }
        
            $Edit_Students->save();
        
            toastr()->success(trans('messages.Update'));
            return redirect()->route('Students.index');
        } 
        catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function Create_Student()
    {
        $data['my_classes'] = Grade::all();
        $data['parents'] = My_Parent::all(); 
        $data['Genders'] = Gender::all();
        $data['nationals'] = Nationalitie::all();
        $data['bloods'] = Type_Blood::all();
        return view('pages.Students.add',$data);
    
    }

    public function Get_classrooms($id)
    {
        $list_classes = Classroom::where("Grade_id", $id)->pluck("Name_Class", "id");
        return $list_classes;
    }

    //Get Sections
    public function Get_Sections($id)
    {
        $list_sections = Section::where("Class_id", $id)->pluck("Name_Section", "id");
        return $list_sections;
    }

    public function Store_Student($request)
    {
        DB::beginTransaction(); // to let it know these are 2 tables attached to each other
        
        try {
            $students = new Student();
            $students->name = ['en' => $request->name_en,
                                'ar' => $request->name_ar];
            $students->email = $request->email;
            $students->password = Hash::make($request->password);
            $students->National_ID = $request->National_ID;
            $students->Phone_number = $request->Phone_number;
            $students->gender_id = $request->gender_id;
            $students->nationalitie_id = $request->nationalitie_id;
            $students->blood_id = $request->blood_id;
            $students->Date_Birth = $request->Date_Birth;
            $students->Grade_id = $request->Grade_id;
            $students->Classroom_id = $request->Classroom_id;
            $students->section_id = $request->section_id;
            $students->parent_id = $request->parent_id;
            $students->academic_year = $request->academic_year;
            $students->save();
            
            // insert img.      "Input in 'add.blade' " 
            if($request->hasfile('photos'))
            {
                foreach($request->file('photos') as $file) // foreach cause it might be more than 1 img
                {
                    $name = $file->getClientOriginalName();
                    $file->storeAs('attachments/students/'.$students->name, $file->getClientOriginalName(),'upload_attachments'); // upload_attachments is in config > filesystems
                
                    // insert in image_table
                    $images= new Image();
                    $images->filename=$name;
                    $images->imageable_id= $students->id;
                    $images->imageable_type = 'App\Models\Student';
                    $images->save();
                }
            }
            DB::commit(); // insert data if everything went well
            // End insert img.
        
            toastr()->success(trans('messages.success'));
            return redirect()->route('Students.create');
        
        }
    
        catch (Exception $e) {
            DB::rollBack(); // if something went wrong, it will rollback all changes
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function Delete_Student($request)
    {
        Student::destroy($request->id);
    
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('Students.index'); 
    }
    
    public function Upload_attachment($request)
    {
        foreach($request->file('photos') as $file) // photos is the name in show.blade
        {
            $name = $file->getClientOriginalName();
            $file->storeAs('attachments/students/'.$request->student_name, $file->getClientOriginalName(),'upload_attachments');
        
            // insert in image_table
            $images= new image();
            $images->filename=$name;
            $images->imageable_id = $request->student_id;
            $images->imageable_type = 'App\Models\Student';
            $images->save();
        }
    
        toastr()->success(trans('messages.success'));
        return redirect()->back();//->route('Students.show',$request->student_id);
    }

    public function Download_attachment($studentsname, $filename)
    {
        return response()->download(public_path('attachments/students/'.$studentsname.'/'.$filename));
    }


    public function Delete_attachment($request)
    {
        // Delete img in server disk
        Storage::disk('upload_attachments')->delete('attachments/students/'.$request->student_name.'/'.$request->filename);
    
        // Delete img in database
        image::where('id',$request->id)->where('filename',$request->filename)->delete(); // id is the name in Delete_img.blade
        toastr()->error(trans('messages.Delete'));
        return redirect()->back();//->route('Students.show',$request->student_id);
    }


}