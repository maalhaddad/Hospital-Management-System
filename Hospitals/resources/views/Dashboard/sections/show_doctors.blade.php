@extends('Dashboard.layouts.master')
@section('css')

 <!--Internal   Notify -->
 <link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection

@section('title')
    {{$section->name}} / {{trans('sections_trans.section_doctors')}}
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{$section->name}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{__('sections_trans.section_doctors')}}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

@include('Dashboard.messages_alert')
    <!-- row opened -->
    <div class="row row-sm">
        <!--div-->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped mg-b-0 text-md-nowrap table-hover">
                            <thead>
                            <tr>
                                <th>#</th>

                                <th class="border-bottom-0">{{__('doctors_trans.name')}}</th>
                                <th class="border-bottom-0">{{__('doctors_trans.email')}}</th>
                                <th class="border-bottom-0">{{__('doctors_trans.section')}}</th>
                                <th class="border-bottom-0">{{__('doctors_trans.phone')}}</th>
                                <th class="border-bottom-0">{{__('doctors_trans.appointments')}}</th>
                                <th class="border-bottom-0">{{__('doctors_trans.Status')}}</th>
                                <th class="border-bottom-0">{{__('doctors_trans.Processes')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($doctors as $doctor)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{$doctor->name}}</td>
                                <td>{{ $doctor->email }}</td>
                                <td>{{ $doctor->section->name}}</td>
                                <td>{{ $doctor->phone}}</td>
                                <td>
                                    @foreach($doctor->Appointments as $appointment)
                                        {{$appointment->name}}
                                    @endforeach
                                </td>
                                <td>
                                    @php
                                    if ($doctor->status == 1) {
                                        $className = 'success';
                                        $status = __('doctors_trans.Enabled');

                                    }
                                    else {
                                        $className = 'danger';
                                        $status = __('doctors_trans.Not_enabled');
                                    }
                                @endphp
                                <div
                                class="dot-label bg-{{$className}} ml-1"></div>
                                <span class="text-{{ $className }}">{{ $status }}</span>
                                   </td>

                                <td>
                                    <div class="dropdown">
                                        <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary btn-sm" data-toggle="dropdown" type="button">{{__('doctors_trans.Processes')}}<i class="fas fa-caret-down mr-1"></i></button>
                                        <div class="dropdown-menu tx-13">
                                            <a class="dropdown-item" href="{{route('doctors.edit',$doctor)}}"><i style="color: #0ba360" class="text-success ti-user"></i>&nbsp;&nbsp;تعديل البيانات</a>
                                            <a class="dropdown-item" href="#update_password" data-doctor_id="{{ $doctor->id }}" data-doctor_name="{{ $doctor->name }}"  data-toggle="modal" ><i   class="text-primary ti-key"></i>&nbsp;&nbsp;تغير كلمة المرور</a>
                                            <a class="dropdown-item" href="#update_status" data-toggle="modal" data-doctor_id="{{ $doctor->id }}"><i   class="text-warning ti-back-right"></i>&nbsp;&nbsp;تغير الحالة</a>
                                           <a class="dropdown-item" data-effect="effect-scale"  data-toggle="modal" href="#delete_doctor" data-doctor_id="{{ $doctor->id }}">
                                             <i class="text-danger  ti-trash"></i>&nbsp;&nbsp;حذف البيانات</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div><!-- bd -->
                </div><!-- bd -->
            </div><!-- bd -->
        </div>

        @include('Dashboard.doctors.update_password')
        {{-- Update Status --}}
        @include('Dashboard.doctors.update_status')


                 {{-- Delete Doctor --}}
             @include('Dashboard.doctors.delete')
              {{-- Delete Select --}}
              @include('Dashboard.doctors.delete_select')
        <!--/div-->
    </div>
    <!-- /row -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
 <!--Internal  Notify js -->
 <script src="{{URL::asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
 <script src="{{URL::asset('/plugins/notify/js/notifit-custom.js')}}"></script>
@include('Dashboard.doctors.scripts')
@endsection
