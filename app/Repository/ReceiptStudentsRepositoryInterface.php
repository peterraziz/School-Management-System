<?php

namespace App\Repository;

interface ReceiptStudentsRepositoryInterface{
    // have to make: php artisan make:provider RepoServiceProvider, and also add it in app.php

    public function index();
    
    public function show($id); 
    
    public function store($request);
    
    public function edit($id);
    
    public function update($request);
    
    public function destroy($request);
    
    
}