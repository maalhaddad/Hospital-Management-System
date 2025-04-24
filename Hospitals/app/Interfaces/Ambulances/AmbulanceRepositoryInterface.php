<?php

namespace App\Interfaces\Ambulances;
use App\Models\Ambulance;

interface AmbulanceRepositoryInterface {

    public function index();
    public function create();
    public function edit($id);
    public function store($attributes);
    public function show(Ambulance $Ambulance);
    public function update($attributes , $id);
    public function destroy($attributes);
}
