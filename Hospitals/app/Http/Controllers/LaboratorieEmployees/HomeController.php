<?php

namespace App\Http\Controllers\LaboratorieEmployees;

use App\Http\Controllers\Controller;
use App\Models\Laboratorie;

class HomeController extends Controller
{

    public function index()
    {

        $invoiceCount = Laboratorie::count();
        $pendingInvoicesCount = Laboratorie::where('case', 0)->count();
        $completedInvoicesCount = Laboratorie::where('case', 1)->count();
        $latestInvoices = Laboratorie::latestTen()->get();
        return view('Dashboard.laboratorie-employee-dashboard.dashboard',
        compact('invoiceCount', 'pendingInvoicesCount', 'completedInvoicesCount','latestInvoices'));
    }
}
