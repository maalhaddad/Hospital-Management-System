<?php

namespace App\Livewire\Chat;

use App\Models\Conversation;
use App\Models\Doctor;
use App\Models\Patient;
use Livewire\Component;
use Livewire\Attributes\On;

class SendMessage extends Component
{

    public $body;
    public $receiverUser;
    public $selectedConversation;
    public $receiverType;
    public $authEmail;

    public function __construct()
    {
        $this->receiverType = getModelGuardName() == 'Patient' ? Doctor::class : Patient::class;
        $this->authEmail = auth()->user()->email;
    }

    // public function mount( $conversationId ,  $receiverUserEmail)
    // {
    //     $this->selectedConversation =Conversation::find($conversationId);
    //     $this->receiverUser = $this->receiverType::find($receiverUserId);
    //     $this->receiverUser = $receiverUserEmail;
    //     $this->receiverUser = $receiverUser;
    // }

    #[On('update-message')]
    public function updateMessage($conversation, $receiverUser)
    {

        $this->selectedConversation = Conversation::find($conversation['id']);
        $this->receiverUser = $this->receiverType::where('email', $receiverUser['email'])->first();
    }


    public function sendMessage()
    {
        if ($this->body == null) {
            return null;
        }

        $lastTimeMessage =$this->selectedConversation->messages()->create([
            'sender_email' => $this->authEmail,
            'receiver_email' => $this->receiverUser->email,
            'body' => $this->body,
        ]);

        $this->selectedConversation->last_time_message = $lastTimeMessage->created_at;
        $this->selectedConversation->save();
        $this->reset('body');
    }
    public function render()
    {
        return view('livewire.chat.send-message');
    }
}
