<?php

namespace App\Http\Controllers\Dashboard;

use App\Events\TestEvent;
use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Group;
use App\Models\Patient;
use App\Models\Section;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Notifications\GeneralNotification;

class HomeController extends Controller
{

    public function index()
    {
        $data['servicesCount'] = Service::count();
        $data['servicesGroupCount'] = Group::count();
        $data['doctorsCount'] = Doctor::count();
        $data['patientsCount'] = Patient::count();
        $data['sectionsCount'] = Section::count();
        return view('Dashboard.Admin.dashboard',$data);
    }
}
