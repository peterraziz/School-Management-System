<?php

namespace App\Repository;

use App\Models\Degree;
use App\Models\Grade;
use App\Models\Quizze;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class QuizRepository implements QuizRepositoryInterface{
    // have to make: php artisan make:provider RepoServiceProvider, and also add it in app.php

    public function index()
    {
        $quizzes = Quizze::get();
        return view('pages.Quizzes.index', compact('quizzes'));
    }



    public function create() // show not create To get and show the student data
    {
        $data['grades'] = Grade::all();
        $data['subjects'] = Subject::all();
        $data['teachers'] = Teacher::all();
        return view('pages.Quizzes.create', $data);
    }



    public function store($request)
    {
        try {
            $quizzes = new Quizze();
            $quizzes->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $quizzes->subject_id = $request->subject_id;
            $quizzes->grade_id = $request->Grade_id;
            $quizzes->classroom_id = $request->Classroom_id;
            $quizzes->section_id = $request->section_id;
            $quizzes->teacher_id = $request->teacher_id;
            $quizzes->save();
            
            toastr()->success(trans('messages.success'));
            return redirect()->route('Quizzes.index');
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }


    // To get the data when clicked on the button
    public function edit($id)
    {
        $quizz = Quizze::findorFail($id);
        $data['grades'] = Grade::all();
        $data['subjects'] = Subject::all();
        $data['teachers'] = Teacher::all();
        return view('pages.Quizzes.edit', $data, compact('quizz'));
    }



    public function update($request)
    {
        try {
        
            $quizz = Quizze::findorfail($request->id);
            $quizz->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $quizz->subject_id = $request->subject_id;
            $quizz->grade_id = $request->Grade_id;
            $quizz->classroom_id = $request->Classroom_id;
            $quizz->section_id = $request->section_id;
            $quizz->teacher_id = $request->teacher_id;
            $quizz->save();
            
            toastr()->success(trans('messages.Update'));
            return redirect()->route('Quizzes.index');
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }


    public function destroy($request)
    {
        try {
            Quizze::destroy($request->id);
            
            toastr()->error(trans('messages.Delete'));
            return redirect()->back();
        } 
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function student_quiz2($quiz_id)
    {
        $degrees = Degree::where('quiz_id', $quiz_id)->get();
        return view('pages.Quizzes.student_quiz2', compact('degrees'));
    }


    public function repeat_quiz2(Request $request)
    {
        Degree::where('student_id', $request->student_id)
                ->where('quiz_id', $request->quiz_id)
                ->delete();
            
        toastr()->success(trans('messages.Update'));
        return redirect()->back();
    }
    
}