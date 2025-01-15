<?php

namespace App\Repository;

interface AttendanceRepositoryInterface{
    // have to make: php artisan make:provider RepoServiceProvider, and also add it in app.php

    public function index();
    
    public function show($id); 
    
    public function store($request);
    
    // public function show_data($id);
    
    public function update($request);
    
    public function destroy($request);
    
    
}