<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ambulance extends Model
{
    use HasFactory;
    use Translatable;
    protected $table = 'ambulances';
    public $translatedAttributes = ['driver_name','notes'];
    public $fillable= [
        'car_number'
        ,'car_model',
        'car_year_made',
        'driver_license_number',
        'driver_phone',
        'is_available'
        ,'car_type',
        'driver_name',
        'notes'
    ];
}
