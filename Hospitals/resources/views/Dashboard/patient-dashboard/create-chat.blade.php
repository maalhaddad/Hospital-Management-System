@extends('Dashboard.layouts.master')
@section('css')
@endsection
 @section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الدردشات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة الاطباء</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
{{-- <livewire:chat.main/> --}}
 @section('content')
<livewire:chat.create-chat/>
@endsection

@section('js')
<!--Internal  lightslider js -->
<script src="{{URL::asset('Dashboard/plugins/lightslider/js/lightslider.min.js')}}"></script>
<!--Internal  Chat js -->
<script src="{{URL::asset('Dashboard/js/chat.js')}}"></script>
@endsection
