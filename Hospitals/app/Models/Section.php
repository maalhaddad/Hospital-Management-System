<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Section extends Model
{
    use HasFactory;
    use Translatable;

    public $translatedAttributes = ['name','description'];

    // الحقول التي يمكن تعبئتها بشكل مباشر

    protected $fillable = ['name','description'];


    public function Doctors()
    {
        return $this->hasMany(Doctor::class,'section_id');
    }

    public function Invoices()
    {
        return $this->hasMany(SingleInvoices::class);
    }

}
