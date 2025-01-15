<?php

namespace App\Http\Controllers\Teachers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
                return redirect()->back();
            } catch (\Exception $e) {
                return redirect()->back()->with(['error' => $e->getMessage()]);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $quiz_id = $id;
        return view('pages.Teachers.dashboard.Questions.create', compact('quiz_id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $question = Question::findorFail($id);
        return view('pages.Teachers.dashboard.Questions.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $question = Question::findorfail($id);
            $question->title = $request->title;
            $question->answers = $request->answers;
            $question->right_answer = $request->right_answer;
            $question->score = $request->score;
            $question->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Question::destroy($id);
            toastr()->error(trans('messages.Delete'));
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
