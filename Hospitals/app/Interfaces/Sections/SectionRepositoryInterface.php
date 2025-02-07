<?php

namespace App\Interfaces\Sections;
use App\Models\Section;

interface SectionRepositoryInterface {

    public function index();

    public function store($attributes);
    public function show(Section $section);
    public function update($attributes);
    public function destroy($attributes);
}
