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


    public function Invoices()
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
}
