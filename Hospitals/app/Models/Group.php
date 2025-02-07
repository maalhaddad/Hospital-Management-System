<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use App\Models\Service;


class Group extends Model
{
    use HasFactory;
    use Translatable;

    public $translatedAttributes = ['name' , 'notes'];
    public $fillable= ['name','notes','Total_with_tax','tax_rate','Total_after_discount','discount_value', 'Total_before_discount'];

    protected $casts = [
        'discount_value' => 'integer',
    ];
    public function Services()
    {
        return $this->belongsToMany(Service::class, 'service_group')->withPivot('quantity');

    }
}
