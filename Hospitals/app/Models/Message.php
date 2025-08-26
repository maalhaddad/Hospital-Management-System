<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Message extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function conversation()
    {
        return $this->belongsTo(Conversation::class);
    }


    public function getTimeFormattedAttribute()
    {
        return Carbon::parse($this->created_at)->format('g:i a');
    }
}
