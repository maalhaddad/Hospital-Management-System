<?php

namespace App\Livewire;

use App\Livewire\Forms\InvoiceForm;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Service;
use App\Models\Invoice;
use App\Models\FundAccount;
use App\Models\PatientAccount;
use Illuminate\Support\Facades\Route;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Illuminate\Support\Facades\DB;


class CreateInvoice extends Component
{

    public InvoiceForm $invoice;
    public $subTotal;
    public $InvoiceSaved;
    public $invoice_id = 0;
    public $functionName = 'store';
    public $selectType = '';
    public function __construct()
    {
        if(Route::currentRouteName() == 'update-invoice')
        {
            $this->invoice_id = Route::current()->parameter('invoice_id');
            $this->ShowInvoiceEdit($this->invoice_id);
            $this->functionName = 'Update';
            $this->selectType = 'disabled';
        }


    }

    public function ShowInvoiceEdit($invoice_id)
    {
        $invoiceEdit = Invoice::find($invoice_id);

         $this->invoice= new InvoiceForm ;
         $this->invoice->section_id = $invoiceEdit->Section->id;
         $this->invoice->section = $invoiceEdit->Section->name;
         $this->invoice->doctor_id = $invoiceEdit->Doctor->id;
         $this->invoice->service_id = $invoiceEdit->Service->id;
         $this->invoice->patient_id = $invoiceEdit->Patient->id;
         $this->invoice->price = $invoiceEdit->price;
         $this->invoice->tax_value = $invoiceEdit->tax_value;
         $this->invoice->tax_rate = $invoiceEdit->tax_rate;
         $this->invoice->discount_value = $invoiceEdit->discount_value;
         $this->invoice->total_with_tax = $invoiceEdit->total_with_tax;
         $this->invoice->type = $invoiceEdit->type;
         $this->invoice->invoice_date = $invoiceEdit->invoice_date;
    }

    // public $count = 1;
    public function render()
    {
        return view('livewire.singleInvoices.create-invoice',
        [
            'Patients' => Patient::all(),
            'Doctors'  => Doctor::all(),
            'Services' => Service::all(),
        ]);
    }


    public function get_section()
    {
        $section = Doctor::find($this->invoice->doctor_id)->Section;
       $this->invoice->section = $section->name;
       $this->invoice->section_id = $section->id;

    }

    public function store() {

        $data = [
            'invoice_date' =>date('Y-m-d'),
            'invoice_type' => 1,
            'section_id' => $this->invoice->section_id,
            'doctor_id' => $this->invoice->doctor_id,
            'service_id' => $this->invoice->service_id,
            'patient_id' => $this->invoice->patient_id,
            'price' => $this->invoice->price,
            'tax_value' => $this->invoice->tax_value,
            'tax_rate' => $this->invoice->tax_rate,
            'discount_value' => $this->invoice->discount_value,
            'total_with_tax' => $this->invoice->total_with_tax,
            'type' => $this->invoice->type,

        ];

        try {

            DB::beginTransaction();
            $invoice = Invoice::create($data);
            if($invoice->type == 1)
            {
                $fundAccount = new FundAccount();
                $fundAccount->date = date('Y-m-d');
                $fundAccount->invoice_id = $invoice->id;
                $fundAccount->Debit = $invoice->total_with_tax;
                $fundAccount->credit = 0.00;
                $fundAccount->save();

            }
            else {

                $patient_accounts = new PatientAccount();
                $patient_accounts->date = date('Y-m-d');
                $patient_accounts->invoice_id = $invoice->id;
                $patient_accounts->patient_id = $invoice->patient_id;
                $patient_accounts->Debit = $invoice->total_with_tax;
                $patient_accounts->credit = 0.00;
                $patient_accounts->save();
            }

                $this->InvoiceSaved = true;
                DB::commit();
                session()->flash('add');
                $this->invoice->resete();


        } catch (\Exception $ex) {
            DB::rollback();
            throw $ex;
        }

        // dd($data);

    }


    public function Update() {

        $data = $this->invoice->Data();

        try {
            DB::beginTransaction();
            $invoice = Invoice::find($this->invoice_id);
            $type = $invoice->type;
            $invoice->update($data);

            if($type== 1)
            {
                $fundAccounts = FundAccount::where('invoice_id',$this->invoice_id)->first();
                $fundAccounts->date = date('Y-m-d');
                $fundAccounts->invoice_id = $invoice->id;
                $fundAccounts->Debit = $invoice->total_with_tax;
                $fundAccounts->credit = 0.00;
                $fundAccounts->save();

            }
            else
            {
                $patient_accounts = PatientAccount::where('invoice_id',$this->invoice_id)->first();
                $patient_accounts->date = date('Y-m-d');
                $patient_accounts->invoice_id = $invoice->id;
                $patient_accounts->patient_id = $invoice->patient_id;
                $patient_accounts->Debit = $invoice->total_with_tax;
                $patient_accounts->credit = 0.00;
                $patient_accounts->save();
            }

            DB::commit();
            session()->flash('edit');
            return redirect()->route('single_invoices');
        } catch (\Exception $ex) {
            DB::rollback();
            throw $ex;
        }

        // dd($data);

    }



    public function get_price()
    {
        $this->invoice->price = Service::find($this->invoice->service_id)->price;
        $this->calculateTotal();


    }

   public function Total_with_tax($value) {

     $this->calculateTotal();
    }


    public function calculateTotal()
    {
        $this->subTotal = $this->Is_Number($this->invoice->price) - $this->Is_Number($this->invoice->discount_value);
        $this->invoice->tax_value = ($this->subTotal * $this->invoice->tax_rate) / 100;
        $this->invoice->total_with_tax = $this->subTotal + $this->Is_Number($this->invoice->tax_value);

    }

    function Is_Number($Number)
    {
        return is_numeric($Number) ? $Number : 0 ;
    }
}
