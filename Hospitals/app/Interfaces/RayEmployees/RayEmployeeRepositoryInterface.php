<?php

namespace App\Interfaces\RayEmployees;

use App\Models\RayEmployee;

interface RayEmployeeRepositoryInterface
{
    public function index();

    public function create();

    public function show(RayEmployee $RayEmployee);

    public function store( $attributes);

    public function edit(RayEmployee $RayEmployee);

    public function update( $attributes);

    public function destroy($attributes);
}
