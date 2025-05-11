<?php

namespace App\Livewire;

use App\Models\Doctor;
use App\Models\Group;
use App\Models\Patient;
use Livewire\Component;
use App\Livewire\Forms\GroupInvoicesForm;
use App\Models\FundAccount;
use App\Models\GroupInvoice;
use App\Models\PatientAccount;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

class CreateGroupInvoice extends Component
{
    public GroupInvoicesForm $invoice;
    public $subTotal;
    public $InvoiceSaved;
    public $invoice_id = 0;
    public $functionName = 'store';
    public $selectType = '';



    public function __construct()
    {
        if(Route::currentRouteName() == 'update-group-invoice')
        {
            $this->invoice_id = Route::current()->parameter('invoice_id');
            $this->ShowInvoiceEdit($this->invoice_id);
            $this->functionName = 'Update';
            $this->selectType = 'disabled';
        }


    }
    public function render()
    {
        return view('livewire.groupInvoices.create-group-invoice',
        [
            'Patients' => Patient::all(),
            'Doctors'  => Doctor::all(),
            'GroupServices' => Group::all(),
        ]
    );
    }


     public function get_section()
    {
        $section = Doctor::find($this->invoice->doctor_id)->Section;
       $this->invoice->section = $section->name;
       $this->invoice->section_id = $section->id;

    }

     public function get_price()
    {
        $group = Group::find($this->invoice->group_id);
        $this->invoice->price = $group->Total_before_discount ;
        $this->invoice->discount_value = $group->discount_value;
        $this->invoice->tax_rate = $group->tax_rate;
        $this->invoice->total_with_tax = $group->Total_with_tax;


        $this->calculateTotal();


    }

    public function calculateTotal()
    {
        $this->subTotal = $this->Is_Number($this->invoice->price) - $this->Is_Number($this->invoice->discount_value);
        $this->invoice->tax_value = ($this->subTotal * $this->invoice->tax_rate) / 100;
        // $this->invoice->total_with_tax = $this->subTotal + $this->Is_Number($this->invoice->tax_value);

    }

    function Is_Number($Number)
    {
        return is_numeric($Number) ? $Number : 0 ;
    }


     public function ShowInvoiceEdit($invoice_id)
    {
        $invoiceEdit = GroupInvoice::find($invoice_id);

         $this->invoice= new GroupInvoicesForm ;
         $this->invoice->group_id = $invoiceEdit->Group->id;
         $this->invoice->section_id = $invoiceEdit->Section->id;
         $this->invoice->section = $invoiceEdit->Section->name;
         $this->invoice->doctor_id = $invoiceEdit->Doctor->id;
         $this->invoice->patient_id = $invoiceEdit->Patient->id;
         $this->invoice->price = $invoiceEdit->price;
         $this->invoice->tax_value = $invoiceEdit->tax_value;
         $this->invoice->tax_rate = $invoiceEdit->tax_rate;
         $this->invoice->discount_value = $invoiceEdit->discount_value;
         $this->invoice->total_with_tax = $invoiceEdit->total_with_tax;
         $this->invoice->type = $invoiceEdit->type;
         $this->invoice->invoice_date = $invoiceEdit->invoice_date;
    }


     public function store() {

        try {

            DB::beginTransaction();
            $invoice = GroupInvoice::create($this->invoice->Data());
            if($invoice->type == 1)
            {
                $fundAccount = new FundAccount();
                $fundAccount->date = date('Y-m-d');
                $fundAccount->group_invoice_id = $invoice->id;
                $fundAccount->Debit = $invoice->total_with_tax;
                $fundAccount->credit = 0.00;
                $fundAccount->save();

            }
            else {

                $patient_accounts = new PatientAccount();
                $patient_accounts->date = date('Y-m-d');
                $patient_accounts->group_invoice_id = $invoice->id;
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

    }



     public function Update() {

        $data = $this->invoice->Data();

        try {
            DB::beginTransaction();
            $invoice = GroupInvoice::find($this->invoice_id);
            $type = $invoice->type;
            $invoice->update($data);

            if($type== 1)
            {
                $fundAccounts = FundAccount::where('group_invoice_id',$this->invoice_id)->first();
                $fundAccounts->date = date('Y-m-d');
                $fundAccounts->group_invoice_id = $invoice->id;
                $fundAccounts->Debit = $invoice->total_with_tax;
                $fundAccounts->credit = 0.00;
                $fundAccounts->save();

            }
            else
            {
                $patient_accounts = PatientAccount::where('group_invoice_id',$this->invoice_id)->first();
                $patient_accounts->date = date('Y-m-d');
                $patient_accounts->group_invoice_id = $invoice->id;
                $patient_accounts->patient_id = $invoice->patient_id;
                $patient_accounts->Debit = $invoice->total_with_tax;
                $patient_accounts->credit = 0.00;
                $patient_accounts->save();
            }

            DB::commit();
            session()->flash('edit');
            return redirect()->route('group_invoices');
        } catch (\Exception $ex) {
            DB::rollback();
            throw $ex;
        }

        // dd($data);

    }
}
