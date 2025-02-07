<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use App\Models\Group;

class Service extends Model
{
    use HasFactory;
    use Translatable;

    public $translatedAttributes = ['name','description'];
    protected $fillable = ['name','description','price','status'];



    public function Groups()
    {
        return $this->belongsToMany(Group::class, 'service_group')->withPivot('quantity');
    }

}
