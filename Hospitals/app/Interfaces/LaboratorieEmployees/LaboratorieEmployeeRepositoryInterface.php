<?php

namespace App\Interfaces\LaboratorieEmployees;

use App\Models\LaboratorieEmployee;

interface LaboratorieEmployeeRepositoryInterface
{
    public function index();

    public function create();

    public function show(LaboratorieEmployee $LaboratorieEmployee);

    public function store( $request);

    public function edit(LaboratorieEmployee $LaboratorieEmployee);

    public function update( $request, $id);

    public function destroy($id);
}
