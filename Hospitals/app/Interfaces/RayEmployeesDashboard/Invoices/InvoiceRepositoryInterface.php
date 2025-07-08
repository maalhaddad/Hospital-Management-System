<?php

namespace App\Interfaces\RayEmployeesDashboard\Invoices;

use App\Models\Invoice;
use Illuminate\Database\Eloquent\Model;

interface InvoiceRepositoryInterface
{
    public function index();

    public function create();

    public function show(Model $Invoice);

    public function store( $attributes);

    public function edit($id);

    public function update( $attributes, $id);

    public function destroy($id);

}
