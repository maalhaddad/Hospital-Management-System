<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class InvoiceForm extends Form
{

    public $doctor_id;
    public $section;
    public $section_id;
    public $service_id;
    public $patient_id;
    public $price = 0;
    public $discount_value = 0;
    public $tax_rate = 17;
    public $tax_value = 0;
    public $type;
    public $total_with_tax = 0;
    public $invoice_date;

    public function __construct()
    {

    }

    public function Data()
    {

        return [
            'invoice_date' => $this->invoice_date,
            'section_id' => $this->section_id,
            'doctor_id' => $this->doctor_id,
            'service_id' => $this->service_id,
            'patient_id' => $this->patient_id,
            'price' => $this->price,
            'tax_value' => $this->tax_value,
            'tax_rate' => $this->tax_rate,
            'discount_value' => $this->discount_value,
            'total_with_tax' => $this->total_with_tax,
            'type' => $this->type,
        ];
    }


    public function resete()
    {
        $this->doctor_id = '';
        $this->section = '';
        $this->section_id = '';
        $this->service_id = '';
        $this->patient_id = '';
        $this->price = 0;
        $this->discount_value = 0;
        $this->tax_rate = 17;
        $this->tax_value = 0;
        $this->type = '';
        $this->total_with_tax = 0;
        $this->invoice_date = '';
    }
}
