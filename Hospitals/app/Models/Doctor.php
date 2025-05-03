<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Doctor extends Model
{
    use Translatable;
    use HasFactory;
    public $translatedAttributes = ['name'];
    public $fillable= ['email','email_verified_at','password','status','name','photo'];


    public function Image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function Section()
    {
       return $this->belongsTo(Section::class);
    }

    public function Appointments()  {

        return $this->belongsToMany(Appointment::class, 'appointment_doctor');
    }

    public function Invoices()
    {
        return $this->hasMany(SingleInvoices::class);
    }
}
