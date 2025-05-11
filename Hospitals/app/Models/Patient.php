<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    use Translatable;

    public $translatedAttributes = ['name','Address'];
    public $fillable= ['name','Address','email','Password','Date_Birth','Phone','Gender','Blood_Group'];


    public function SingleInvoices()
    {
        return $this->hasMany(SingleInvoices::class);
    }

    public function Receipt_accounts()
    {
        return $this->hasMany(ReceiptAccount::class);
    }

    public function Patient_accounts()
    {
        return $this->hasMany(PatientAccount::class);
    }

    public function GroupInvoices()
    {
        return $this->hasMany(GroupInvoice::class);
    }

    public function totalSingleInvoicesAmount()
    {
       return $this->SingleInvoices->sum('total_with_tax');
    }

     public function totalGroupInvoicesAmount()
    {
       return $this->GroupInvoices->sum('total_with_tax');
    }


    public function AllInvoices()
    {
        $invoices = $this->SingleInvoices->merge($this->GroupInvoices);
        $invoices = $invoices->sortBy('created_at');
        return $invoices;
    }

    public function getTotalInvoicesAmount()
    {
        return (float)$this->totalSingleInvoicesAmount() +(float)$this->totalGroupInvoicesAmount();
    }
}
