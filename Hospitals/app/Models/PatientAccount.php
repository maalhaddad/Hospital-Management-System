<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientAccount extends Model
{
    use HasFactory;


    public function ReceiptAccount()
    {
        return $this->belongsTo(ReceiptAccount::class,'receipt_id');
    }


    public function PaymentAccount()
    {
        return $this->belongsTo(PaymentAccount::class,'payment_id');
    }

    public function single_invoice()
    {
         return $this->belongsTo(SingleInvoices::class,'single_invoice_id');
    }
}
