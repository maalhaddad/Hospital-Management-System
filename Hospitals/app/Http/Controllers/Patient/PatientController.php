<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Interfaces\PatientsDashboard\PatientRepositoryInterface;
use App\Models\Invoice;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    protected $patientRepository;

    public function __construct(PatientRepositoryInterface $patientRepository)
    {
        $this->patientRepository = $patientRepository;
    }
    public function invoices()
    {
       return $this->patientRepository->invoices();
    }

    public function rays()
    {
       return $this->patientRepository->rays();
    }

    public function laboratories()
    {
       return $this->patientRepository->laboratories();
    }

    public function payments()
    {
       return $this->patientRepository->payments();
    }

    public function laboratoriesView($laboratorieId)
    {
        return $this->patientRepository->laboratoriesView($laboratorieId);
    }

    public function raysView($raysId)
    {
        return $this->patientRepository->raysView($raysId);
    }
}
