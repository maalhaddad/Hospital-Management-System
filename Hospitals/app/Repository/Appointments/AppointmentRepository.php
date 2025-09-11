<?php

namespace App\Repository\Appointments;

use App\Interfaces\Appointments\AppointmentRepositoryInterface;
use App\Mail\AppointmentConfirmation;
use App\Models\Appointment;
use Illuminate\Support\Facades\Mail;

class AppointmentRepository implements AppointmentRepositoryInterface
{
    public function index()
    {


        $appointments = Appointment::where('type','غير مؤكد')->get();
        return view('Dashboard.appointments.index',compact('appointments'));
    }

    public function getConfirmedAppointments()
    {
        $appointments = Appointment::where('type', 'مؤكد')->get();
        return view('Dashboard.appointments.confirmed', compact('appointments'));
    }

    public function update($request)
    {
         try {
            $appointment = Appointment::find($request->id);
            $appointment->appointment = $request->appointment;
            $appointment->type = 'مؤكد';
            $appointment->save();
            session()->flash('edit');
            Mail::to($appointment->email)->send(new AppointmentConfirmation($appointment));
            return redirect()->back();
            }



        catch (\Exception $ex) {
            return redirect()->back()->withErrors($ex->getMessage());
        }
    }



}
