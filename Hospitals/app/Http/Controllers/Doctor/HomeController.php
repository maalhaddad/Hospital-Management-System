<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Invoice;
use App\Models\RayEmployee;
use App\Notifications\GeneralNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

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

     public function patientsList()
    {
       return view('Dashboard.patient-dashboard.create-chat');
    }

    public function Chats()
    {
      return view('Dashboard.patient-dashboard.chat');
    }
}
