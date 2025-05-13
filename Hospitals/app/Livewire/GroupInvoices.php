<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Invoice;

class GroupInvoices extends Component
{

    public $group_invoice_id=0;
    public function render()
    {
        return view('livewire.groupInvoices.group-invoices',['group_invoices' => Invoice::where('invoice_type', 2)->get()]);
    }


    public function delete($invoice_id)
    {

        session(['group_invoice_id' => $invoice_id]);

    }


    public function DeleteInvoice()
    {
        try {

        $this->group_invoice_id = session('group_invoice_id');
        Invoice::destroy($this->group_invoice_id) ;
        session()->flash('delete');
        return redirect()->route('group_invoices');

        } catch (\Throwable $th) {
            //throw $th;
        }


    }
}
