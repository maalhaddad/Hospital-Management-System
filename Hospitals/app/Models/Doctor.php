<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Doctor extends Model
{
    use Translatable;
    use HasFactory;
    public $translatedAttributes = ['name','appointments'];
    public $fillable= ['email','email_verified_at','password','phone','price','name','appointments','photo'];


    public function Image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function Section()
    {
       return $this->belongsTo(Section::class);
    }
}
