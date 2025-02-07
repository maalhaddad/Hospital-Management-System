<?php

namespace App\Interfaces\Insurances;
use App\Models\Insurance;

interface InsuranceRepositoryInterface {

    public function index();
    public function create();
    public function store($attributes);
    public function show(Insurance $insurance);
    public function edit(Insurance $insurance);
    public function update($attributes ,$id);
    public function destroy($attributes);
}
