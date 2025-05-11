<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupInvoice extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function Group()
    {
        return $this->belongsTo(Group::class,'group_id');
    }
    public function Section()
    {
        return $this->belongsTo(Section::class);
    }
    public function Doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
    public function Patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
