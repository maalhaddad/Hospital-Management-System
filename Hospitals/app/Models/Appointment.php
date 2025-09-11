<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;


class Appointment extends Model
{
    use HasFactory;
    // use Translatable;
    protected $table = 'appointments';
    protected $fillable = ['name','email','phone','notes','section_id','doctor_id'];

    protected $casts = [
    'appointment' => 'datetime',
];

    public function Section()
    {
        return $this->belongsTo(Section::class);
    }

     public function Doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

}
