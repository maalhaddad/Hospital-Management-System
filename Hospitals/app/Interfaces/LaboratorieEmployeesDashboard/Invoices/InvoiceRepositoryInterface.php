<?php

namespace App\Interfaces\LaboratorieEmployeesDashboard\Invoices;

interface InvoiceRepositoryInterface
{
    public function index();

    public function create();

    public function completedInvoices();

    public function show($id);

    public function store( $request);

    public function edit($id);

    public function update( $request, $id);

    public function destroy($id);
}
