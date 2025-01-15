<?php

namespace App\Http\Controllers\Subjects;

use App\Http\Controllers\Controller;
use App\Repository\SubjectRepositoryInterface;
use Illuminate\Http\Request;

class SubjectController extends Controller
{

    protected $Subject; 
    // have to make: php artisan make:provider RepoServiceProvider, and also add it in app.php
    public function __construct(SubjectRepositoryInterface $Subject)
    {
        $this->Subject = $Subject; 
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->Subject->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->Subject->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->Subject->store($request);
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
        return $this->Subject->edit($id);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return $this->Subject->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->Subject->destroy($request);
    }
}
