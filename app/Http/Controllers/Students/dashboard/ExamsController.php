<?php

namespace App\Http\Controllers\Students\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Quizze;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quizzes = Quizze::where('grade_id', auth()->user()->Grade_id)
        ->where('classroom_id', auth()->user()->Classroom_id)
        ->where('section_id', auth()->user()->section_id)
        ->orderBy('id', 'DESC')
        ->get();
        // return $quizzes; 
        return view('pages.Students.dashboard.exams.index', compact('quizzes'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $quiz_id)
    {
        $student_id = Auth::user()->id;
        return view('pages.Students.dashboard.exams.show', compact('quiz_id','student_id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
