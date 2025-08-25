<div>
    {{-- @section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الدردشات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة الاطباء</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection --}}

    {{-- @section('content') --}}

<div class="row row-sm main-content-app mb-4">

        <div class="card w-100 h-100 p-3 ">
            <div class="active w-100 h-100 overflow-auto  bg-light" id="side1">

                @forelse ($this->users as $user )

                <div class="list d-flex align-items-center border-bottom p-2 w-80 m-3 ">
                    <!-- الصورة أو الأفاتار -->
                    <div>
                         <?php $pathImg = (isset($user->image->filename)) ? $user->image->filename : 'default.png' ?>

                        <span class="avatar bg-primary brround avatar-md">
                            <img src="{{asset('Dashboard/img/doctors/'.$pathImg)}}"
                             height="50px" width="50px"
                             class="rounded-circle"
                             alt="{{ $pathImg }}">
                        </span>
                    </div>

                    <!-- المحتوى الأساسي -->
                    <a class="wrapper w-100 mx-3" href="#">
                        <p class="mb-0 d-flex">
                            <b>{{ $user->name }}</b>
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <i class="mdi mdi-clock text-muted ml-1"></i>
                                <small class="text-muted ml-auto">{{ $user->Section->name ?? $user->email }}</small>
                            </div>
                        </div>
                    </a>

                    <!-- أيقونة المحادثة على الطرف الآخر -->
                    <div>
                        <a wire:click.prevent="createConversation('{{ $user->email }}')" class="main-msg-send" href="#">
                            <i class="far fa-paper-plane"></i>
                        </a>
                    </div>
                </div>
                @empty

                @endforelse




                 {{-- <div class="list d-flex align-items-center border-bottom p-2 w-80 m-3 ">
                    <!-- الصورة أو الأفاتار -->
                    <div>
                        <span class="avatar bg-danger brround avatar-md">CH</span>
                    </div>

                    <!-- المحتوى الأساسي -->
                    <a class="wrapper w-100 mx-3" href="#">
                        <p class="mb-0 d-flex">
                            <b>New Websites is Created</b>
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <i class="mdi mdi-clock text-muted ml-1"></i>
                                <small class="text-muted ml-auto">30 mins ago</small>
                            </div>
                        </div>
                    </a>

                    <!-- أيقونة المحادثة على الطرف الآخر -->
                    <div>
                        <a class="main-msg-send"href="#">
                            <i class="far fa-paper-plane"></i>
                        </a>
                    </div>
                </div>

                 <div class="list d-flex align-items-center border-bottom p-2 w-80 m-3 ">
                    <!-- الصورة أو الأفاتار -->
                    <div>
                        <span class="avatar bg-primary brround avatar-md">CH</span>
                    </div>

                    <!-- المحتوى الأساسي -->
                    <a class="wrapper w-100 mx-3" href="#">
                        <p class="mb-0 d-flex">
                            <b>New Websites is Created</b>
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <i class="mdi mdi-clock text-muted ml-1"></i>
                                <small class="text-muted ml-auto">30 mins ago</small>
                            </div>
                        </div>
                    </a>

                    <!-- أيقونة المحادثة على الطرف الآخر -->
                    <div>
                        <a class="main-msg-send"href="#">
                            <i class="far fa-paper-plane"></i>
                        </a>
                    </div>
                </div> --}}

                <!-- باقي العناصر بنفس النمط مع w-100 -->
            </div>
        </div>



    </div>

    {{-- @endsection --}}


</div>
