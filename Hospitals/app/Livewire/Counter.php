<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component
{

    public $count = 1;
    public $msg = '';
    public function __construct()
    {
       $this->msg= route('livewire.update');
    }

    public function increment()
    {
        $this->count++;
    }

    public function sub()
    {
        $this->count--;
    }
    public function render()
    {
        return view('livewire.counter');
    }
}
