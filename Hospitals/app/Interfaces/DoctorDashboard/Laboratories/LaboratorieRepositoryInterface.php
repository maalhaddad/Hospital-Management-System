<?php

namespace App\Interfaces\DoctorDashboard\Laboratories;

use App\Models\Laboratorie;

interface LaboratorieRepositoryInterface
{
    public function index();

    public function create();

    public function show( $id);

    public function store( $attributes);

    public function edit(Laboratorie $Laboratorie);

    public function update( $attributes);

    public function destroy($attributes);
}
