<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Insurance extends Model
{
    use HasFactory;
    use Translatable;

    public $translatedAttributes = ['name' , 'notes'];
    public $fillable =['name','notes','insurance_code','discount_percentage','company_rate','status'];
}
