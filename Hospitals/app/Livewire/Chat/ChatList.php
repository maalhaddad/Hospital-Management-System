<?php

namespace App\Livewire\Chat;

use App\Models\Conversation;
use App\Models\Doctor;
use App\Models\Patient;
use Livewire\Component;


class ChatList extends Component
{

    public $conversations;
    public $receiverUser;
    public $authType;
    public $selectedConversation;

    public function __construct()
    {
        $this->authType = getModelGuardName() == 'Patient' ? Doctor::class : Patient::class;
    }

    //  public $name;

    // public function sendData($name)
    // {
    //     $this->name=$name;
    //     // نرسل البيانات عبر event
    //     $this->emitTo(ChatBox::class,'data-sent', $this->name);
    // }

    public function getUser(Conversation $conversation ,$attribute = null){


            $this->receiverUser = $this->authType::where('email',$conversation->receiver_email)
            ->orWhere('email',$conversation->sender_email)->first();
        if(isset($attribute)){
            return $this->receiverUser->$attribute;
        }
     }

    public function chatUserSelected(Conversation $conversation ,$receiver_id)
    {
        $this->selectedConversation =  $conversation;
        $this->receiverUser = $this->authType::find($receiver_id);
        // dd($this->receiverUser->name);
        $this->dispatch('load-conversationUser',
         conversation: $this->selectedConversation,
         receiverUser: $this->receiverUser
        );

    }


    public function render()
    {
        $authEmail = auth()->user()->email;
        $this->conversations = Conversation::where('sender_email',$authEmail)
        ->orWhere('receiver_email', $authEmail)
        ->orderBy('created_at','DESC')->get();

        return view('livewire.chat.chat-list');
    }


}
