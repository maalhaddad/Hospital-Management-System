<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\PatientAccount;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $patient_id = auth()->user()->id;
        $data['invoicesCount'] = Invoice::where('patient_id',$patient_id )->count();
        $data['credit'] = PatientAccount::where('patient_id', $patient_id)->sum('credit');
        $data['invoices'] = Invoice::where('patient_id',$patient_id )->latest()->take(10)->get();
        return view('Dashboard.patient-dashboard.dashboard',$data);
    }
}
