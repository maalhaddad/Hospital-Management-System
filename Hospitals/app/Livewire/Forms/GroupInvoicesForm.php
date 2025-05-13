<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class GroupInvoicesForm extends InvoiceForm
{
    public $group_id;
    private $data;

    public function __construct()
    {
         parent::__construct();
         $this->data = parent::Data();
        unset($this->data['service_id']);
        $this->data['group_id'] = $this->group_id;
    }

    public function Data()  {

      $this->data = parent::Data();
      unset($this->data['service_id']);
      $this->data['group_id'] = $this->group_id;
      $this->data['invoice_date'] = date('Y-m-d');
      $this->data['invoice_type'] = 2;
      return $this->data;
    }

    public function resete()  {

        parent::resete();
        $this->group_id='';

    }
    // #[Validate('required')]
    // public $doctor_id;
    // #[Validate('required')]
    // public $section;
    // #[Validate('required')]
    // public $section_id;
    // #[Validate('required')]
    // public $service_id;
    // #[Validate('required')]
    // public $patient_id;
    // #[Validate('required')]
    // public $price = 0;
    // #[Validate('required')]
    // public $discount_value = 0;
    // #[Validate('required')]
    // public $tax_rate = 17;
    // #[Validate('required')]
    // public $tax_value = 0;
    // #[Validate('required')]
    // public $type;
    // #[Validate('required')]
    // public $total_with_tax = 0;
    // #[Validate('required')]
    // public $invoice_date;

}
