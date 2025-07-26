<?php

namespace App\Http\Controllers\LaboratorieEmployees;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRayRequest;
use App\Interfaces\LaboratorieEmployeesDashboard\Invoices\InvoiceRepositoryInterface;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    protected $LaboratorieEmployee;

    public function __construct(InvoiceRepositoryInterface $LaboratorieEmployee)
    {
         $this->LaboratorieEmployee = $LaboratorieEmployee;
    }
    public function index()
    {
        return $this->LaboratorieEmployee->index();
    }

    public function completedInvoices()
    {
        return $this->LaboratorieEmployee->completedInvoices();
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->LaboratorieEmployee->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return $this->LaboratorieEmployee->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRayRequest $request, string $id)
    {
        return $this->LaboratorieEmployee->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
