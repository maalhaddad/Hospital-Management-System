<?php

namespace App\Livewire\Chat;

use App\Models\Doctor;
use App\Models\Patient;
use Livewire\Component;

class Main extends Component
{
    public function render()
    {
        if(getModelGuardName() == 'Patient')
            $this->users = Doctor::all();
        else
            $this->users = Patient::all();
        return view('livewire.chat.main');
    }

     public $users;

    public function test()
    {
        dd('lllllllllllllllllllllll');
    }


}
