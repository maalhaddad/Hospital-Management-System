<?php

namespace App\Interfaces\DoctorDashboard\Rays;

use App\Models\Ray;

interface RayRepositoryInterface
{
    public function index();

    public function create();

    public function show($id);

    public function store( $attributes);

    public function edit(Ray $Ray);

    public function update( $attributes);

    public function destroy($attributes);
}
