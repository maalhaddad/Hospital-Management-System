<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientDetailsController extends Controller
{

    public function showDetails($id)
    {
         $patient = Patient::with(['diagnostics', 'rays','Laboratories'])->findOrFail($id);

         return view('Dashboard.doctor-dashboard.invoices.patient_details',compact('patient'));
    }
}
