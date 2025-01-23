<?php

namespace App\Interfaces\Doctors;

use Illuminate\Database\Eloquent\Model;

interface DoctorRepositoryInterface {

    public function index();

    public function create();
    public function store($attributes);
    Public function edit(Model $Doctor);
    public function update($attributes , $id);
    public function destroy($attributes);
    public function DeleteSelectDoctors($attributes);
    public function updateStatus($attributes);
}
