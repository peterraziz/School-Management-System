<?php

namespace App\Http\Controllers\Quizzes;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Quizze;
use App\Repository\QuizRepositoryInterface;
use Illuminate\Http\Request;

class QuizController extends Controller
{

    protected $Quiz; 
    // have to make: php artisan make:provider RepoServiceProvider, and also add it in app.php
    public function __construct(QuizRepositoryInterface $Quiz)
    {
        $this->Quiz = $Quiz; 
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->Quiz->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->Quiz->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->Quiz->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $questions = Question::where('quiz_id',$id)->get();
        $quizz = Quizze::findorfail($id);
        return view('pages.Questions.index2',compact('questions','quizz'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return $this->Quiz->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return $this->Quiz->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->Quiz->destroy($request);
    }


    public function student_quiz2($quiz_id)
    {
        return $this->Quiz->student_quiz2($quiz_id);
    }


    public function repeat_quiz2(Request $request)
    {
        return $this->Quiz->repeat_quiz2($request);
    }
}
