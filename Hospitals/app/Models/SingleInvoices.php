<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SingleInvoices extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function Section()
    {
        return $this->belongsTo(Section::class);
    }

    public function Service()
    {
        return $this->belongsTo(Service::class);
    }

    public function Patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
