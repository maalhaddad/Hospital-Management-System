<?php

namespace App\Http\Controllers\RayEmployee;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRayRequest;
use App\Interfaces\RayEmployeesDashboard\Invoices\InvoiceRepositoryInterface;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{

    protected $RayEmployee;
    public function __construct(InvoiceRepositoryInterface $RayEmployee)
    {
        $this->RayEmployee = $RayEmployee;
    }

    public function index()
    {
        return $this->RayEmployee->index();
    }

    public function completedInvoices()
    {
        return $this->RayEmployee->completedInvoices();
    }

    public function show($id)
    {
        return $this->RayEmployee->show($id);
    }


    public function edit(string $id)
    {

        return $this->RayEmployee->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRayRequest $request, string $id)
    {
        return $this->RayEmployee->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
