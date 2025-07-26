<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratorie extends Model
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

    public function Images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function LaboratorieEmployee()
    {
        return $this->belongsTo(LaboratorieEmployee::class,'employee_id')
         ->withDefault([
                'name' => 'لا يوجد موظف'
            ]);;
    }

    public function scopeLatestTen($query)
    {
        return $query->latest()->take(10);
    }
}
