<?php

namespace App\Http\Controllers\Fees;

use App\Http\Controllers\Controller;
use App\Repository\ReceiptStudentsRepositoryInterface;
use Illuminate\Http\Request;

class ReceiptStudentsController extends Controller
{

    protected $Receipt; 
    // have to make: php artisan make:provider RepoServiceProvider, and also add it in app.php
    public function __construct(ReceiptStudentsRepositoryInterface $Receipt)
    {
        $this->Receipt = $Receipt; 
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->Receipt->index();

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->Receipt->store($request);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->Receipt->show($id);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return $this->Receipt->edit($id);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return $this->Receipt->update($request);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->Receipt->destroy($request);
        
    }
}
