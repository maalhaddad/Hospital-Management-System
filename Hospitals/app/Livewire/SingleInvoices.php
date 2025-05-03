<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\SingleInvoices as Invoice;
class SingleInvoices extends Component
{
    public $single_invoices;
    public $invoice_id = 0;

    public function render()
    {
        $this->single_invoices = Invoice::all();
        return view('livewire.singleInvoices.single-invoices');
    }

   public function delete($invoice_id)
   {
       $this->invoice_id = $invoice_id;
       dd($this->invoice_id);
   }

    public function DeleteInvoice()
    {
        dd($this->invoice_id);
    }


}
