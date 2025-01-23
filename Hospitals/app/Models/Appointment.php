<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;


class Appointment extends Model
{
    use HasFactory;
    use Translatable;
    protected $table = 'appointments';
    protected $fillable = ['name'];
    public $translatedAttributes = ['name'];

    public function Doctors() {

        return $this->belongsToMany(Doctor::class, 'appointment_doctor');
    }

}
