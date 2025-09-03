<?php

namespace App\Events\chat;

use App\Models\Message;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewMessage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $message;
    public $privateChannel;
    public $sender;
    public $receiver;
    public function __construct(Message $message , $receiverType)
    {
        $this->message = $message;
        $this->sender = auth()->user();
        $this->receiver = $receiverType::where('email',$this->message->receiver_email)->first();
        $this->privateChannel =  'chat-Doctor.'.$this->receiver->id;
        // dd($this->privateChannel);
    }


    public function broadcastOn(): array
    {
        return [
            new PrivateChannel($this->privateChannel),
        ];
    }


    public function broadcastWith(): array
    {
        return [
            'receiver_email' => $this->message->receiver_email,
            'body' => $this->message->body,
            'time' => $this->message->time_formatted,
            'sender' => $this->sender
                ];
    }

    public function broadcastAs()
    {
        return 'New.Message';
    }
}
