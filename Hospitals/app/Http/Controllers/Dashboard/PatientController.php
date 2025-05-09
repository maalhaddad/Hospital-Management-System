<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePatientRequest;
use App\Interfaces\Patients\PatientRepositoryInterface;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{

    protected mixed $PatientRepository;
    public function __construct( PatientRepositoryInterface $PatientRepository )
    {
       $this->PatientRepository = $PatientRepository;
    }

    public function index()
    {
        return $this->PatientRepository->index();
    }


    public function create()
    {
        return $this->PatientRepository->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( StorePatientRequest $request)
    {
       return  $this->PatientRepository->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $Patient)
    {
        return $this->PatientRepository->show($Patient);
    }


    public function edit(Patient $Patient)
    {
        return $this->PatientRepository->edit($Patient);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePatientRequest $request, string $id)
    {

        return $this->PatientRepository->update($request , $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,string $id)
    {
        return $this->PatientRepository->destroy($request);
    }
}
