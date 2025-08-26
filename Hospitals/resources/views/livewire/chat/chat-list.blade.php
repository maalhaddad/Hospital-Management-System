<div class="card">
    <div class="main-content-left main-content-left-chat">
        <nav class="nav main-nav-line main-nav-line-chat">
             <a class="nav-link active" data-toggle="tab" href="">المحادثات الاخيرة</a>
        </nav>
        <div class="main-chat-contacts-wrapper">
            <label class="main-content-label main-content-label-sm">Active Contacts (5)</label>
            <div class="main-chat-contacts" id="chatActiveContacts">
                <div>
                    <div class="main-img-user online"><img src="{{ URL::asset('Dashboard/img/faces/3.jpg') }}"></div>
                    <small>Adrian</small>
                </div>
                <div>
                    <div class="main-img-user online"><img src="{{ URL::asset('Dashboard/img/faces/12.jpg') }}"></div>
                    <small>John</small>
                </div>
                <div>
                    <div class="main-img-user online"><img src="{{ URL::asset('Dashboard/img/faces/4.jpg') }}"></div>
                    <small>Daniel</small>
                </div>
                <div>
                    <div class="main-img-user online"><img src="{{ URL::asset('Dashboard/img/faces/13.jpg') }}"></div>
                    <small>Katherine</small>
                </div>
                <div>
                    <div class="main-img-user online"><img src="{{ URL::asset('Dashboard/img/faces/5.jpg') }}"></div>
                    <small>Raymart</small>
                </div>
                <div>
                    <div class="main-img-user online"><img src="{{ URL::asset('Dashboard/img/faces/14.jpg') }}"></div>
                    <small>Junrisk</small>
                </div>
                <div>
                    <div class="main-img-user online"><img src="{{ URL::asset('Dashboard/img/faces/6.jpg') }}"></div>
                    <small>George</small>
                </div>
                <div>
                    <div class="main-img-user online"><img src="{{ URL::asset('Dashboard/img/faces/15.jpg') }}"></div>
                    <small>Maryjane</small>
                </div>
                <div>
                    <div class="main-chat-contacts-more">
                        20+
                    </div><small>More</small>
                </div>
            </div><!-- main-active-contacts -->
        </div>
        <!-- main-chat-active-contacts -->

        <div class="main-chat-list" id="ChatList">

            @foreach ($this->conversations as $conversation )

            <div wire:click="chatUserSelected( {{ $conversation }} , '{{ $this->getUser($conversation , 'id') }}')" class="media new">
            {{-- <div wire:click="sendData('madin')" class="media new"> --}}
                <div class="main-img-user online">
                    <img src="{{ URL::asset('Dashboard/img/doctors/default.png') }}"> <span>2</span>
                </div>
                <div class="media-body">
                    <div class="media-contact-name">
                        <span>{{ $this->getUser($conversation , 'name') }}</span> <span>{{ $conversation->messages->last()->created_at->shortAbsoluteDiffForHumans() }}</span>
                    </div>
                    <p>{{ $conversation->messages->last()->body }}</p>
                </div>
            </div>
            @endforeach



            {{-- <div class="media new">
                <div class="main-img-user">
                    <img src="{{ URL::asset('Dashboard/img/faces/6.jpg') }}"> <span>1</span>
                </div>
                <div class="media-body">
                    <div class="media-contact-name">
                        <span>Dexter dela Cruz</span> <span>3 hours</span>
                    </div>
                    <p>Maec enas tempus, tellus eget con dime ntum rhoncus, sem quam</p>
                </div>
            </div>
            <div class="media selected">
                <div class="main-img-user online"><img src="{{ URL::asset('Dashboard/img/faces/9.jpg') }}"></div>
                <div class="media-body">
                    <div class="media-contact-name">
                        <span>Reynante Labares</span> <span>10 hours</span>
                    </div>
                    <p>Nam quam nunc, bl ndit vel aecenas et ante tincid</p>
                </div>
            </div>
            <div class="media">
                <div class="main-img-user"><img src="{{ URL::asset('Dashboard/img/faces/11.jpg') }}"></div>
                <div class="media-body">
                    <div class="media-contact-name">
                        <span>Joyce Chua</span> <span>2 days</span>
                    </div>
                    <p>Ma ecenas tempus, tellus eget con dimen tum rhoncus, sem quam</p>
                </div>
            </div>
            <div class="media">
                <div class="main-img-user"><img src="{{ URL::asset('Dashboard/img/faces/4.jpg') }}"></div>
                <div class="media-body">
                    <div class="media-contact-name">
                        <span>Rolando Paloso</span> <span>2 days</span>
                    </div>
                    <p>Nam quam nunc, blandit vel aecenas et ante tincid</p>
                </div>
            </div>
            <div class="media new">
                <div class="main-img-user">
                    <img src="{{ URL::asset('Dashboard/img/faces/7.jpg') }}"> <span>1</span>
                </div>
                <div class="media-body">
                    <div class="media-contact-name">
                        <span>Ariana Monino</span> <span>3 days</span>
                    </div>
                    <p>Maece nas tempus, tellus eget cond imentum rhoncus, sem quam</p>
                </div>
            </div>
            <div class="media">
                <div class="main-img-user"><img src="{{ URL::asset('Dashboard/img/faces/8.jpg') }}"></div>
                <div class="media-body">
                    <div class="media-contact-name">
                        <span>Maricel Villalon</span> <span>4 days</span>
                    </div>
                    <p>Nam quam nunc, blandit vel aecenas et ante tincid</p>
                </div>
            </div>
            <div class="media">
                <div class="main-img-user"><img src="{{ URL::asset('Dashboard/img/faces/12.jpg') }}"></div>
                <div class="media-body">
                    <div class="media-contact-name">
                        <span>Maryjane Cruiser</span> <span>5 days</span>
                    </div>
                    <p>Mae cenas tempus, tellus eget co ndimen tum rhoncus, sem quam</p>
                </div>
            </div>
            <div class="media">
                <div class="main-img-user"><img src="{{ URL::asset('Dashboard/img/faces/15.jpg') }}"></div>
                <div class="media-body">
                    <div class="media-contact-name">
                        <span>Lovely Dela Cruz</span> <span>5 days</span>
                    </div>
                    <p>Mae cenas tempus, tellus eget co ndimen tum rhoncus, sem quam</p>
                </div>
            </div>
            <div class="media">
                <div class="main-img-user"><img src="{{ URL::asset('Dashboard/img/faces/10.jpg') }}"></div>
                <div class="media-body">
                    <div class="media-contact-name">
                        <span>Daniel Padilla</span> <span>5 days</span>
                    </div>
                    <p>Mae cenas tempus, tellus eget co ndimen tum rhoncus, sem quam</p>
                </div>
            </div>
            <div class="media">
                <div class="main-img-user"><img src="{{ URL::asset('Dashboard/img/faces/3.jpg') }}"></div>
                <div class="media-body">
                    <div class="media-contact-name">
                        <span>John Pratts</span> <span>6 days</span>
                    </div>
                    <p>Mae cenas tempus, tellus eget co ndimen tum rhoncus, sem quam</p>
                </div>
            </div>
            <div class="media">
                <div class="main-img-user"><img src="{{ URL::asset('Dashboard/img/faces/7.jpg') }}"></div>
                <div class="media-body">
                    <div class="media-contact-name">
                        <span>Raymart Santiago</span> <span>6 days</span>
                    </div>
                    <p>Nam quam nunc, blandit vel aecenas et ante tincid</p>
                </div>
            </div>
            <div class="media border-bottom-0">
                <div class="main-img-user"><img src="{{ URL::asset('Dashboard/img/faces/6.jpg') }}"></div>
                <div class="media-body">
                    <div class="media-contact-name">
                        <span>Samuel Lerin</span> <span>7 days</span>
                    </div>
                    <p>Nam quam nunc, blandit vel aecenas et ante tincid</p>
                </div>
            </div> --}}
        </div><!-- main-chat-list -->
    </div>
</div>

