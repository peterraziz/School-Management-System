<?php

namespace App\Repository;

interface FeesRepositoryInterface{
    // have to make: php artisan make:provider RepoServiceProvider, and also add it in app.php

    public function index();
    
    public function create();
    
    public function edit($id);
    
    public function store($request);
    
    public function update($request);
    
    public function destroy($request);
    
    // public function show($id);
    
}