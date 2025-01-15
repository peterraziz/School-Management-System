<?php

namespace App\Repository;

use App\Models\Question;
use App\Models\Quizze;

class QuestionRepository implements QuestionRepositoryInterface{
    // have to make: php artisan make:provider RepoServiceProvider, and also add it in app.php

    public function index()
    {
        $questions = Question::get();
        return view('pages.Questions.index', compact('questions'));
    }



    public function create() // show not create To get and show the student data
    {
        $quizzes = Quizze::get();
        return view('pages.Questions.create',compact('quizzes'));
    }



    public function store($request)
    {
        try {
            $question = new Question();
            $question->title = $request->title;
            $question->answers = $request->answers;
            $question->right_answer = $request->right_answer;
            $question->score = $request->score;
            $question->quiz_id = $request->quiz_id;
            $question->save();
            
            toastr()->success(trans('messages.success'));
            return redirect()->route('questions.create');
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }


    // To get the data when clicked on the button
    public function edit($id)
    {
        $question = Question::findorFail($id);
        $quizzes = Quizze::get();
        
        return view('pages.Questions.edit', compact('question','quizzes'));
    }



    public function update($request, $id)
    {
        try {
            $question =Question::findorfail($request->id);
            $question->title = $request->title;
            $question->answers = $request->answers;
            $question->right_answer = $request->right_answer;
            $question->score = $request->score;
            $question->quiz_id = $request->quiz_id;
            $question->save();
            
            toastr()->success(trans('messages.Update')); 
            return redirect()->route('questions.index'); 
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }


    public function destroy($request)
    {
        try {
            Question::destroy($request->id);
            
            toastr()->error(trans('messages.Delete'));
            return redirect()->back();
        } 
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    
}