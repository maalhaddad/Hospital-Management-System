<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Invoice;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $doctor =Doctor::withCount('Invoices','completedInvoices','reviewInvoices')->find(auth()->user()->id);
        $data['invoicesCount'] = $doctor->invoices_count;
        $data['completedInvoicesCount'] = $doctor->completed_invoices_count;
        $data['reviewInvoicesCount'] = $doctor->review_invoices_count;
        $data['noInvoicesCount'] = Invoice::where('doctor_id',auth()->user()->id)->where('invoice_status',1)->count();

        
        return view('Dashboard.doctor-dashboard.dashboard',$data);
    }
}
