<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Patient extends Authenticatable
{
    use HasFactory;
    use Translatable;

    public $translatedAttributes = ['name','Address'];
    public $fillable= ['name','Address','email','password','Date_Birth','Phone','Gender','Blood_Group'];


    // public function SingleInvoices()
    // {
    //     return $this->hasMany(SingleInvoices::class);
    // }

    public function Receipt_accounts()
    {
        return $this->hasMany(ReceiptAccount::class);
    }

    public function Patient_accounts()
    {
        return $this->hasMany(PatientAccount::class);
    }

    public function Invoices()
    {
        return $this->hasMany(Invoice::class);
    }

     public function Records()
    {
        return $this->hasMany(Diagnostic::class);
    }



    public function totalInvoicesAmount()
    {
       return $this->Invoices->sum('total_with_tax');
    }


    public function Rays()
    {
        return $this->hasMany(Ray::class);
    }

     public function Diagnostics()
    {
        return $this->hasMany(Diagnostic::class);
    }

     public function Laboratories()
    {
        return $this->hasMany(Laboratorie::class);
    }

    //  public function totalGroupInvoicesAmount()
    // {
    //    return $this->GroupInvoices->sum('total_with_tax');
    // }


    // public function AllInvoices()
    // {
    //     $invoices = $this->SingleInvoices->merge($this->GroupInvoices);
    //     $invoices = $invoices->sortBy('created_at');
    //     return $invoices;
    // }

    // public function getTotalInvoicesAmount()
    // {
    //     return (float)$this->totalSingleInvoicesAmount() +(float)$this->totalGroupInvoicesAmount();
    // }
}
