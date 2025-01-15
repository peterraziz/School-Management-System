<?php

namespace App\Repository;

interface StudentGraduatedRepositoryInterface{
    // have to make: php artisan make:provider RepoServiceProvider, and also add it in app.php

    public function index();
    
    public function create();
    
    public function softDelete($request);
    
    public function ReturnData($request);
    
    public function destroy($request);

}