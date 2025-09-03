<div  class="card">

    @if ($this->selectedConversation)

<a class="main-header-arrow" href="" id="ChatBodyHide"><i class="icon ion-md-arrow-back"></i></a>
    <div class="main-content-body main-content-body-chat">
        <div class="main-chat-header">
            <div class="main-img-user"><img src="{{ URL::asset('Dashboard/img/doctors/default.png') }}"></div>
            <div class="main-chat-msg-name">
                <h6>{{ $this->receiverUser->name }}</h6><small>Last seen: 2 minutes ago</small>
            </div>
            <nav class="nav">
                <a class="nav-link" href=""><i class="icon ion-md-more"></i></a> <a class="nav-link"
                    data-toggle="tooltip" href="" title="Call"><i class="icon ion-ios-call"></i></a> <a
                    class="nav-link" data-toggle="tooltip" href="" title="Archive"><i
                        class="icon ion-ios-filing"></i></a> <a class="nav-link" data-toggle="tooltip" href=""
                    title="Trash"><i class="icon ion-md-trash"></i></a> <a class="nav-link" data-toggle="tooltip"
                    href="" title="View Info"><i class="icon ion-md-information-circle"></i></a>
            </nav>
        </div><!-- main-chat-header -->
        <div class="main-chat-body overflow-auto " id="ChatBody" >
            <div  class="content-inner"  >
                <label class="main-chat-time"><span>3 days ago</span></label>
                @foreach ($this->messages as $message )

                <div class="media {{ $message->sender_email == $this->authEmail ? 'flex-row-reverse' : '' }} ">
                    <div class="main-img-user online"><img src="{{ URL::asset('Dashboard/img/faces/9.jpg') }}"></div>
                    <div class="media-body">
                        <div class="main-msg-wrapper right">
                            {{ $message->body }}
                        </div>

                        <div>
                            <span>{{ $message->time_formatted }}</span>
                            @if ($message->sender_email == $this->authEmail)
                            <a href="">
                                <i class="fas fa-check-double" style="margin-right: 2px;" title="Read"></i>
                            </a>
                            @endif

                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>

 <form wire:submit.prevent="sendMessage">

<div class="main-chat-footer">

 <nav class="nav">
        <a class="nav-link" data-toggle="tooltip" href="" title="Add Photo"><i class="fas fa-camera"></i></a> <a
            class="nav-link" data-toggle="tooltip" href="" title="Attach a File"><i
                class="fas fa-paperclip"></i></a> <a class="nav-link" data-toggle="tooltip" href=""
            title="Add Emoticons"><i class="far fa-smile"></i></a> <a class="nav-link" href=""><i
                class="fas fa-ellipsis-v"></i></a>
    </nav><input wire:model="body" class="form-control" placeholder="Type your message here..." type="text">
    <a class="main-msg-send"
        href="#" wire:click.prevent="sendMessage"><i class="far fa-paper-plane"></i></a>

</div>
    </form>

    @endif

</div>

<script src="{{URL::asset('Dashboard/js/echo.js')}}"></script>
<script>
    window.addEventListener('scroll-to-bottom', () => {
        const chatBody = document.getElementById('ChatBody');
        chatBody.scrollTop = chatBody.scrollHeight;


    });

   

<script/>

