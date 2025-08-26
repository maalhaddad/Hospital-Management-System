<?php

namespace App\Livewire\Chat;

use App\Models\Conversation;
use App\Models\Doctor;
use App\Models\Patient;
use Livewire\Component;
use Livewire\Attributes\On;

class ChatBox extends Component
{

    public $receiverUser;
    public $selectedConversation;
    public $receiverType;
    public $authEmail;
    public $messages;

     public function __construct()
    {
        $this->receiverType = getModelGuardName() == 'Patient' ? Doctor::class : Patient::class;
        $this->authEmail = auth()->user()->email;

    }
     #[On('load-conversationUser')]
    public function loadConversationUser($conversation , $receiverUser )
    {
        $this->selectedConversation = new Conversation((array)$conversation);
        $this->receiverUser = new $this->receiverType((array)$receiverUser);
        // $this->selectedConversation->messages()->create(
        //             [
        //                 'sender_email' => $this->authEmail,
        //                 'receiver_email' => 'Madin@gmail.com',
        //                 'body' => 'معك المريض الذي تشرف علية حبيت استشيرك يادكتور',
        //             ]
        //         );
        $this->messages = $this->selectedConversation->messages;

    }
    public function render()
    {
        return view('livewire.chat.chat-box');
    }
}
