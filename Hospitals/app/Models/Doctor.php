<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Doctor extends Authenticatable
{
    use Translatable;
    use HasFactory;
    use Notifiable;
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

    public function reviewInvoices()
    {
        return $this->hasMany(Invoice::class)->where('invoice_status',2);
    }

    public  function completedInvoices()
    {
        return $this->hasMany(Invoice::class)->where('invoice_status',3);
    }

    public function Invoices()
    {
        return $this->hasMany(Invoice::class);
    }

}
