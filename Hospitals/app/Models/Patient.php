<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    use Translatable;

    public $translatedAttributes = ['name','Address'];
    public $fillable= ['name','Address','email','Password','Date_Birth','Phone','Gender','Blood_Group'];
}
