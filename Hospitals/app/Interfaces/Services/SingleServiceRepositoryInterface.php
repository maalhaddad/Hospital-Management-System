<?php

namespace App\Interfaces\Services;
use App\Models\Service;

interface SingleServiceRepositoryInterface {

    public function index();

    public function store($attributes);
    public function show(Service $Service);
    public function update($attributes);
    public function destroy($attributes);
}
