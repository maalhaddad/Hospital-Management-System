<?php

namespace App\Interfaces\sections;
use App\Models\Section;

interface SectionRepositoryInterface {

    public function index();

    public function store($attributes);
    public function show(Section $section);
    public function update($attributes);
    public function destroy($attributes);
}
