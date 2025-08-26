<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Conversation extends Model
{
    use HasFactory;

    protected $guarded=[];





    public function messages()
    {
        return $this->hasMany(Message::class);
    }

public function scopeCheckConversation($query, $authEmail, $receiverEmail)
{
    return $query->where(function($q) use ($authEmail, $receiverEmail) {
        $q->where([
            ['sender_email', $authEmail],
            ['receiver_email', $receiverEmail]
        ]);
    })->orWhere(function($q) use ($authEmail, $receiverEmail) {
        $q->where([
            ['sender_email', $receiverEmail],
            ['receiver_email', $authEmail]
        ]);
    });
}




}
