<?php

namespace App\Interfaces\DoctorDashboard\Invoices;

use App\Models\Invoice;
use Illuminate\Database\Eloquent\Model;

interface InvoiceRepositoryInterface
{
    public function index();

    public function create();

    public function show(Model $Invoice);

    public function store(array $attributes);

    public function edit(Model $Invoice);

    public function update(array $attributes, $id);

    public function destroy($id);
}
