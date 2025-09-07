<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Interfaces\Appointments\AppointmentRepositoryInterface;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    protected $appointmentRepository;
    public function __construct(AppointmentRepositoryInterface $appointmentRepository)
    {
         $this->appointmentRepository = $appointmentRepository;

    }

    public function index()
    {
        return $this->appointmentRepository->index();
    }

    public function getConfirmedAppointments()
    {
        return $this->appointmentRepository->getConfirmedAppointments();
    }

    public function update(Request $request)
    {
        return $this->appointmentRepository->update($request);
    }
}
