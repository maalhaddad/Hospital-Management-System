<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDiagnosisRequest;
use App\Interfaces\DoctorDashboard\Diagnostics\DiagnosticRepositoryInterface;
use App\Models\Diagnostic;
use App\Models\Patient;
use Illuminate\Http\Request;

class DiagnosticController extends Controller
{

    protected $Diagnostic;

    public function __construct(DiagnosticRepositoryInterface $Diagnostic)
    {
        $this->Diagnostic = $Diagnostic;
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDiagnosisRequest $request)
    {
        return $this->Diagnostic->store($request);
    }

    public function addReview(StoreDiagnosisRequest $request)
    {
       return $this->Diagnostic->addReview($request);
    }
    public function show($id)
    {
        return $this->Diagnostic->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
