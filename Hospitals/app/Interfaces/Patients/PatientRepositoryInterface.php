<?php

namespace App\Interfaces\Patients;
use App\Models\Patient;

 interface  PatientRepositoryInterface {

    public function index();

    public function store($attributes);
    // public function show(Patient $Patient);
    public function edit(Patient $Patient);
    public function update($attributes , $id);
    public function destroy($attributes);
}
