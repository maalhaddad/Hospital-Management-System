<?php

namespace App\Http\Controllers\RayEmployee;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Ray;
use App\Notifications\GeneralNotification;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $invoiceCount = Ray::count();
        $pendingInvoicesCount = Ray::where('case', 0)->count();
        $completedInvoicesCount = Ray::where('case', 1)->count();
        $latestInvoices = Ray::latestTen()->get();
        return view('Dashboard.rayemployee-dashboard.dashboard',
        compact('invoiceCount', 'pendingInvoicesCount', 'completedInvoicesCount','latestInvoices')
    );
    }
}
