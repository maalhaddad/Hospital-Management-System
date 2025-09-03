<?php

namespace App\Livewire\Chat;

use App\Events\chat\NewMessage;
use App\Models\Conversation;
use App\Models\Doctor;
use App\Models\Message;
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
    public $lastMessage;
    public $body;
    public $auth_id;

    //  public function __construct()
    // {
    //     $this->receiverType = getModelGuardName() == 'Patient' ? Doctor::class : Patient::class;
    //     $this->authEmail = auth()->user()->email;
    //     $this->auth_id = auth()->user()->id;

    // }

    public function mount()
    {
       $this->receiverType = getModelGuardName() == 'Patient' ? Doctor::class : Patient::class;
        $this->authEmail = auth()->user()->email;
        $this->auth_id = auth()->user()->id;
    }
    //  #[On('load-conversationUser')]
    public function loadConversationUser($conversation , $receiverUser )
    {

        $this->selectedConversation= Conversation::find($conversation['id']);
        $this->receiverUser = $this->receiverType::find($receiverUser['id']);
        $this->messages = $this->selectedConversation->messages;
        $this->dispatch('scroll-to-bottom');
    }


    public function sendMessage()
    {
        if ($this->body == null) {
            return null;
        }
        $this->lastMessage =$this->selectedConversation->messages()->create([
            'sender_email' => $this->authEmail,
            'receiver_email' => $this->receiverUser->email,
            'body' => $this->body,
        ]);

        $this->selectedConversation->last_time_message = $this->lastMessage->created_at;
        $this->selectedConversation->save();
        $this->messages->push($this->lastMessage);
        $this->reset('body');
         $this->dispatch('update-chatlist')->to(ChatList::class);
         $this->dispatch('scroll-to-bottom');
        // event(new NewMessage($this->lastMessage , $this->receiverType));
        broadcast(new NewMessage($this->lastMessage , $this->receiverType));
    }


    public function getListeners()
{

    // dd($this->auth_id);
    return [
        "echo-private:chat-Doctor.66,New.Message" => 'broadcastMessage',
        'load-conversationUser' => 'loadConversationUser',
    ];
}

  public function broadcastMessage($event)
  {
     dd($this->receiverUser);

  }
    public function render()
    {
        return view('livewire.chat.chat-box');
    }
}
