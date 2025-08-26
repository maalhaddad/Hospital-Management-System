<div class="card">

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
        <div class="main-chat-body" id="ChatBody">
            <div class="content-inner">
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


                {{-- <div class="media">
                    <div class="main-img-user online"><img src="{{ URL::asset('Dashboard/img/faces/6.jpg') }}"></div>
                    <div class="media-body">
                        <div class="main-msg-wrapper left">
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                        </div>
                        <div>
                            <span>9:32 am</span> <a href=""><i class="icon ion-android-more-horizontal"></i></a>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="media flex-row-reverse">
                    <div class="main-img-user online"><img src="{{ URL::asset('Dashboard/img/faces/9.jpg') }}"></div>
                    <div class="media-body">
                        <div class="main-msg-wrapper right">
                            Nullam dictum felis eu pede mollis pretium
                        </div>
                        <div>
                            <span>11:22 am</span> <a href=""><i class="icon ion-android-more-horizontal"></i></a>
                        </div>
                    </div>
                </div><label class="main-chat-time"><span>Yesterday</span></label>
                <div class="media">
                    <div class="main-img-user online"><img src="{{ URL::asset('Dashboard/img/faces/6.jpg') }}"></div>
                    <div class="media-body">
                        <div class="main-msg-wrapper left">
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                        </div>
                        <div>
                            <span>9:32 am</span> <a href=""><i class="icon ion-android-more-horizontal"></i></a>
                        </div>
                    </div>
                </div>
                <div class="media flex-row-reverse">
                    <div class="main-img-user online"><img src="{{ URL::asset('Dashboard/img/faces/9.jpg') }}"></div>
                    <div class="media-body">
                        <div class="main-msg-wrapper right">
                            Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa
                            quis enim. Donec pede justo, fringilla vel, aliquet nec. In enim justo, rhoncus ut,
                            imperdiet a, venenatis vitae, justo.
                        </div>
                        <div class="main-msg-wrapper right">
                            Nullam dictum felis eu pede mollis pretium
                        </div>
                        <div>
                            <span>9:48 am</span> <a href=""><i class="icon ion-android-more-horizontal"></i></a>
                        </div>
                    </div>
                </div><label class="main-chat-time"><span>Today</span></label>
                <div class="media">
                    <div class="main-img-user online"><img src="{{ URL::asset('Dashboard/img/faces/6.jpg') }}"></div>
                    <div class="media-body">
                        <div class="main-msg-wrapper left">
                            Maecenas tempus, tellus eget condimentum rhoncus
                        </div>
                        <div class="main-msg-wrapper left">
                            Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante
                            tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus.
                        </div>
                        <div>
                            <span>10:12 am</span> <a href=""><i class="icon ion-android-more-horizontal"></i></a>
                        </div>
                    </div>
                </div>
                <div class="media flex-row-reverse">
                    <div class="main-img-user online"><img src="{{ URL::asset('Dashboard/img/faces/9.jpg') }}"></div>
                    <div class="media-body">
                        <div class="main-msg-wrapper right">
                            Maecenas tempus, tellus eget condimentum rhoncus
                        </div>
                        <div class="main-msg-wrapper right">
                            Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante
                            tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus.
                        </div>
                        <div>
                            <span>09:40 am</span> <a href=""><i class="icon ion-android-more-horizontal"></i></a>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>

                            <livewire:chat.send-message/>
    @endif

</div>
