<?php

namespace App\Http\Controllers\Fees;

use App\Http\Controllers\Controller;
use App\Repository\FeeInvoicesRepositoryInterface;
use Illuminate\Http\Request;

class FeeInvoicesController extends Controller
{
    protected $Fees_Invoices; 
    // have to make: php artisan make:provider RepoServiceProvider, and also add it in app.php
    public function __construct(FeeInvoicesRepositoryInterface $Fees_Invoices)
    {
        $this->Fees_Invoices = $Fees_Invoices; 
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->Fees_Invoices->index();
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
        return $this->Fees_Invoices->store($request);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->Fees_Invoices->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return $this->Fees_Invoices->edit($id);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return $this->Fees_Invoices->update($request);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->Fees_Invoices->destroy($request);
        
    }
}
