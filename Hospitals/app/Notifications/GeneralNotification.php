<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Broadcasting\PrivateChannel;

class GeneralNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $data;
    private $privateChannel;
    public function __construct( array $data , $privateChannel)
    {
        $this->data = $data;
        $this->privateChannel = $privateChannel;
    }



    public function via(object $notifiable): array
    {
        return ['database', 'broadcast'];
    }



    public function toArray(object $notifiable): array
    {
        return $this->data;
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage($this->data);
    }

    public function broadcastAs()
{
    return 'new-notification';
}

    public function broadcastOn()
    {

        return new PrivateChannel($this->privateChannel);
    }


}
