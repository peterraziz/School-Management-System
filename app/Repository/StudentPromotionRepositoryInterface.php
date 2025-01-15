<?php

namespace App\Repository;

interface StudentPromotionRepositoryInterface{
    // have to make: php artisan make:provider RepoServiceProvider, and also add it in app.php

    public function index();
    
    public function store($request);
    
    public function create();
    
    public function destroy($request);

}