<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ray extends Model
{
    use HasFactory;




    public function Doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }

        public function Patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    public function RayEmployee()
    {
        return $this->belongsTo(RayEmployee::class, 'employee_id')
        ->withDefault([
            'name' => 'لا يوجد موظف'
        ]);
    }

    public function Images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

}
