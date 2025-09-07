<?php

namespace App\Livewire\Appointments;

use App\Models\Appointment;
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
    public $message;
    public function render()
    {
        return view('livewire.appointments.create-appointment');
    }

     public function mount(){

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

             $appointment = Appointment::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'notes' => $this->notes,
            'section_id' => $this->sectionId,
            'doctor_id' => $this->doctorId,
        ]);

           $this->message = true;
           $this->reset('name','email','phone','notes');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }


}
