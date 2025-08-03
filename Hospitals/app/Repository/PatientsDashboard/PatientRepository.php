<?php

namespace App\Repository\PatientsDashboard;

use App\Interfaces\PatientsDashboard\PatientRepositoryInterface;
use App\Models\Invoice;
use App\Models\Laboratorie;
use App\Models\Patient;
use App\Models\Ray;
use App\Models\ReceiptAccount;

class PatientRepository implements PatientRepositoryInterface
{

     public function invoices()
    {
        $invoices = $this->getData(Invoice::class);
        return view('Dashboard.patient-dashboard.invoices',compact('invoices'));
    }

     public function rays()
    {
        $rays = $this->getData(Ray::class);
        return view('Dashboard.patient-dashboard.rays',compact('rays'));
    }

     public function laboratories()
    {
        $laboratories = $this->getData(Laboratorie::class);
        return view('Dashboard.patient-dashboard.laboratories',compact('laboratories'));
    }

     public function payments()
    {
        $payments = $this->getData(ReceiptAccount::class);
        return view('Dashboard.patient-dashboard.payments',compact('payments'));
    }

    public function laboratoriesView($laboratorieId)
    {
        $laboratorie = Laboratorie::find($laboratorieId);
        if($laboratorie->patient_id != auth()->user()->id)
        {
            return redirect()->back();
        }

        return view('Dashboard.laboratorie-employee-dashboard.Invoices.view_laboratorie',compact('laboratorie'));
    }

    public function raysView($rayId)
    {
         $ray = Ray::find($rayId);
        if($ray->patient_id != auth()->user()->id)
        {
            return redirect()->back();
        }

        return view('Dashboard.rayemployee-dashboard.Invoices.view_rays',compact('ray'));
    }

    private function getData($model)
    {
        return $model::where('patient_id', auth()->user()->id)->get();
    }   
    
    

}
