<?php

namespace App\Interfaces\DoctorDashboard\Diagnostics;

use App\Models\Diagnostic;

interface DiagnosticRepositoryInterface
{
    public function index($id);

    public function create();

    public function show($id);

    public function store( $attributes);
    public function addReview( $attributes);

    public function edit(Diagnostic $Diagnostic);

    public function update(array $attributes, $id);

    public function destroy($id);
}
