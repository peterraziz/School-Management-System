<?php

namespace App\Repository;

interface FeeInvoicesRepositoryInterface{
    // have to make: php artisan make:provider RepoServiceProvider, and also add it in app.php

    public function index();
    
    public function show($id); // show not create To get and show the student data
    
    public function store($request);
    
    public function edit($id);
    
    public function update($request);
    
    public function destroy($request);
    
    // public function create();
    
}