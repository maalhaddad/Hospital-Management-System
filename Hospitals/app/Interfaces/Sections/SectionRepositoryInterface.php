<?php

namespace App\Interfaces\sections;

interface SectionRepositoryInterface {

    public function index();

    public function create($attributes);
    public function update($attributes);
    public function destroy($attributes);
}
