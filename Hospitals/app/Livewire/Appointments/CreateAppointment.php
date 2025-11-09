<?php

namespace App\Livewire\Appointments;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Section;

use Livewire\Component;

class CreateAppointment extends Component
{
    public $sectionId;
    public $doctorId;
    public $doctors;
    public $sections;
    public $name;
    public $email;
    public $phone;
    public $notes;
    public $appointment_patient;
    public $message;
    public $message2;
    public function render()
    {
        return view('livewire.appointments.create-appointment');
    }

    public function mount()
    {

        $this->sections = Section::get();
        $this->doctors = collect();
    }

    public function getDoctors()
    {
        // dd($this->sectionId);
        $this->doctors = Section::find($this->sectionId)->Doctors;
    }

    public function store()
    {
        try {
            $numberOfStatementsDoctor = Doctor::where('id', $this->doctorId)
            ->pluck('number_of_statements')->first();
            $appointment_count = Appointment::where([
                'doctor_id'           => $this->doctorId,
                'type'                => 'غير مؤكد',
                'appointment_patient' => $this->appointment_patient,
            ])->count();
            // dd($numberOfStatementsDoctor,$appointment_count);
            // // dd('fffffffffffff');

            if ($numberOfStatementsDoctor != $appointment_count)
             {
                $appointment = Appointment::create([
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'notes' => $this->notes,
                'section_id' => $this->sectionId,
                'doctor_id' => $this->doctorId,
                'appointment_patient' => $this->appointment_patient,
            ]);
             $this->message = true;
            $this->reset('name', 'email', 'phone', 'notes');
            }
            else
            {
               $this->message2=true;
            }





        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
