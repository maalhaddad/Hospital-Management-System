<?php

namespace App\Http\Controllers\LaboratorieEmployees;

use App\Http\Controllers\Controller;


class HomeController extends Controller
{

    public function index()
    {

        return view('Dashboard.laboratorie-employee-dashboard.dashboard');
    }
}
