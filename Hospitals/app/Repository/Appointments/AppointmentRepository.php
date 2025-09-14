<?php

namespace App\Repository\Appointments;

use App\Interfaces\Appointments\AppointmentRepositoryInterface;
use App\Mail\AppointmentConfirmation;
use App\Models\Appointment;
use App\Services\SmsService;
use Illuminate\Support\Facades\Mail;

class AppointmentRepository implements AppointmentRepositoryInterface
{
    public function index()
    {

            // $SendSms = new SmsService();
            // // $message = "تم تأكيد موعدك في العيادة بتاريخ: 15/5/2025. شكراً لاختيارك عيادتنا.";
            // $message = "الحياة حلوة";
            // $SendSms->sendSms('+967775056592', $message);
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
            // return $appointment->phone;
            $appointment->appointment = $request->appointment;
            $appointment->type = 'مؤكد';
            $appointment->save();
            session()->flash('edit');
            Mail::to($appointment->email)->send(new AppointmentConfirmation($appointment));
            $SendSms = new SmsService();
            // $message = "تم تأكيد موعدك في العيادة بتاريخ: " . $appointment->appointment . ". شكراً لاختيارك عيادتنا.";
            $message = "عزيزي المريض" . " " . $appointment->name . " " . "تم حجز موعدك بتاريخ " . $appointment->appointment;
            $SendSms->sendSms($appointment->phone, $message);
            return redirect()->back();
            }



        catch (\Exception $ex) {
            return redirect()->back()->withErrors($ex->getMessage());
        }
    }



}
