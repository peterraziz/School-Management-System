<?php

namespace App\Repository;

use Illuminate\Http\Request;

interface QuizRepositoryInterface{
    // have to make: php artisan make:provider RepoServiceProvider, and also add it in app.php

    public function index();
    
    public function create(); 
    
    public function store($request);
    
    public function edit($id);
    
    public function update($request);
    
    public function destroy($request);
    
    public function student_quiz2($quiz_id);
    
    public function repeat_quiz2(Request $request);

}