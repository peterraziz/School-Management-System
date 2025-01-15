<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Repository\StudentGraduatedRepositoryInterface;
use Illuminate\Http\Request;

class GraduatedController extends Controller
{

    protected $Graduated; 
    // have to make: php artisan make:provider RepoServiceProvider, and also add it in app.php
    public function __construct(StudentGraduatedRepositoryInterface $Graduated)
    {
        $this->Graduated = $Graduated; 
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->Graduated->index();
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->Graduated->create();
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->Graduated->softDelete($request);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        return $this->Graduated->ReturnData($request);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->Graduated->destroy($request);
        
    }
}
