<?php

namespace App\Http\Controllers\Quizzes;

use App\Http\Controllers\Controller;
use App\Repository\QuestionRepositoryInterface;
use Illuminate\Http\Request;

class QuestionController extends Controller
{

    protected $Question; 
    // have to make: php artisan make:provider RepoServiceProvider, and also add it in app.php
    public function __construct(QuestionRepositoryInterface $Question)
    {
        $this->Question = $Question; 
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->Question->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->Question->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->Question->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $quiz_id = $id;
        return view('pages.Questions.create2', compact('quiz_id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return $this->Question->edit($id);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return $this->Question->update($request,$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->Question->destroy($request);
    }
}
