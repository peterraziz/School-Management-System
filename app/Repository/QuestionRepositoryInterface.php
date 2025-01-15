<?php

namespace App\Repository;

interface QuestionRepositoryInterface{
    // have to make: php artisan make:provider RepoServiceProvider, and also add it in app.php

    public function index();
    
    public function create(); 
    
    public function store($request);
    
    public function edit($id);
    
    public function update($request,$id);
    
    public function destroy($request);
    
    
}