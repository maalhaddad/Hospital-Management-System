<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Invoice;
use Illuminate\Support\Facades\Redirect;

class SingleInvoices extends Component
{
    public $single_invoices;
    public $invoice_id = 0;

    public function render()
    {
        $this->single_invoices = Invoice::where('invoice_type', 1)->get();
        return view('livewire.singleInvoices.single-invoices');
    }

    public function print($id)
    {
        $single_invoice = Invoice::findorfail($id);
        return Redirect::route('Print_single_invoices',[
            'invoice_date' => $single_invoice->invoice_date,
            'doctor_id' => $single_invoice->Doctor->name,
            'section_id' => $single_invoice->Section->name,
            'Service_id' => $single_invoice->Service->name,
            'type' => $single_invoice->type,
            'price' => $single_invoice->price,
            'discount_value' => $single_invoice->discount_value,
            'tax_rate' => $single_invoice->tax_rate,
            'total_with_tax' => $single_invoice->total_with_tax,
        ]);

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
