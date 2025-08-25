<?php

namespace App\Livewire\Chat;

use App\Models\Conversation;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CreateChat extends Component
{
    public $users;
    public $authEmail;
    public $receiverEmail;

    public function __construct()
    {
        $this->authEmail = auth()->user()->email;
    }

    public function createConversation($receiverEmail)
    {
        $this->receiverEmail = $receiverEmail;

        // dd($this->receiverEmail, $this->authEmail);
        $checkConversation = Conversation::CheckConversation($this->authEmail, $this->receiverEmail)->first();
        if (!$checkConversation) {
            DB::beginTransaction();
            try {

                $createConversation = Conversation::create([
                    'sender_email' => $this->authEmail,
                    'receiver_email' => $receiverEmail,
                    'last_time_message' => null,
                ]);

                $createConversation->messages()->create(
                    [
                        'sender_email' => $this->authEmail,
                        'receiver_email' => $receiverEmail,
                        'body' => 'السلام عليكم',
                    ]
                );

                DB::commit();
                dd('created');
            } catch (\Exception $ex) {
                Db::rollBack();
            }
        }
    }

    public function render()
    {
        if (getModelGuardName() == 'Patient')
            $this->users = Doctor::all();
        else
            $this->users = Patient::all();

        return view('livewire.chat.create-chat');
    }
}
