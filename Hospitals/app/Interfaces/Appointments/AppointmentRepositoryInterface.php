<?php

namespace App\Interfaces\Appointments;
use App\Models\Appointment;

 interface  AppointmentRepositoryInterface {

    public function index();
    public function update($request);
    public function getConfirmedAppointments();



}
