<?php

namespace App\Http\Controllers\Teachers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Degree;
use App\Models\Grade;
use App\Models\Question;
use App\Models\Quizze;
use App\Models\Section;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuizTeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quizzes = Quizze::where('teacher_id',auth()->user()->id)->get(); 
        return view('pages.Teachers.dashboard.Quizzes.index', compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['grades'] = Grade::all();
        $data['subjects'] = Subject::where('teacher_id',auth()->user()->id)->get();
        return view('pages.Teachers.dashboard.Quizzes.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $quizzes = new Quizze();
            $quizzes->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $quizzes->subject_id = $request->subject_id;
            $quizzes->grade_id = $request->Grade_id;
            $quizzes->classroom_id = $request->Classroom_id;
            $quizzes->section_id = $request->section_id;
            $quizzes->teacher_id = auth()->user()->id;
            $quizzes->save();
            toastr()->success(trans('messages.success'));
            return redirect()->route('QuizzesTeacher.index');
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $questions = Question::where('quiz_id',$id)->get();
        $quizz = Quizze::findorfail($id);
        return view('pages.Teachers.dashboard.Questions.index',compact('questions','quizz'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $quizz = Quizze::findorFail($id);
        $data['grades'] = Grade::all();
        $data['subjects'] = Subject::where('teacher_id',auth()->user()->id)->get();
        return view('pages.Teachers.dashboard.Quizzes.edit', $data, compact('quizz'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $quizz = Quizze::findorFail($request->id);
            $quizz->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $quizz->subject_id = $request->subject_id;
            $quizz->grade_id = $request->Grade_id;
            $quizz->classroom_id = $request->Classroom_id;
            $quizz->section_id = $request->section_id;
            $quizz->teacher_id = auth()->user()->id;
            $quizz->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('QuizzesTeacher.index');
        } 
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)   
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


    public function getClassrooms($id)
    {
    // $list_classes = Classroom::where("Grade_id", $id)->pluck("Name_Class", "id");
    // return $list_classes;
    $sectionIds = DB::table('teacher_section_pivot')
        ->where('teacher_id', auth()->user()->id)
        ->pluck('section_id');
    
    $classIds = Section::whereIn('id', $sectionIds)
        ->pluck('Class_id')
        ->unique(); // Ensure no duplicate classrooms
    
    $list_classes = Classroom::where("Grade_id", $id)
        ->whereIn('id', $classIds)
        ->pluck("Name_Class", "id");
    
    return $list_classes;
}


    public function Get_Sections($id)
    {
//     $list_sections = Section::where("Class_id", $id)->pluck("Name_Section", "id");
//     return $list_sections;
    $sectionIds = DB::table('teacher_section_pivot')
        ->where('teacher_id', auth()->user()->id)
        ->pluck('section_id');
    
    $list_sections = Section::where("Class_id", $id)
        ->whereIn('id', $sectionIds)
        ->pluck("Name_Section", "id");
    
    return $list_sections;
}


    public function student_quiz($quiz_id)
    {
        $degrees = Degree::where('quiz_id', $quiz_id)->get();
        return view('pages.Teachers.dashboard.Quizzes.student_quiz', compact('degrees'));
    }


    public function repeat_quiz(Request $request)
    {
        Degree::where('student_id', $request->student_id)
                ->where('quiz_id', $request->quiz_id)
                ->delete();
            
        toastr()->success(trans('messages.Update'));
        return redirect()->back();
    }
    
    public function student_answer(Request $request)
    {
        $questions = Question::where('quiz_id',$request->quiz_id);

        return view('pages.Teachers.dashboard.Quizzes.show_answers');

    }

}
