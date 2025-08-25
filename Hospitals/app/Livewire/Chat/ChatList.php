<?php

namespace App\Livewire\Chat;

use App\Models\Conversation;
use App\Models\Doctor;
use App\Models\Patient;
use Livewire\Component;

class ChatList extends Component
{

    public $conversations;
    public $receviverUser;
    public $authType;

    public function __construct()
    {
        $this->authType = getModelGuardName() == 'Patient' ? Doctor::class : Patient::class;
    }

    public function getUsers(Conversation $conversation ,$attribute = null){


            $this->receviverUser = $this->authType::where('email',$conversation->receiver_email)
            ->orWhere('email',$conversation->sender_email)->first();
        if(isset($attribute)){
            return $this->receviverUser->$attribute;
        }
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
