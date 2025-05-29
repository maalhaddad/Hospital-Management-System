@extends('Dashboard.layouts.master')
@section('css')
    <link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('title')
    معلومات المريض -{{ $patient->name }}
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">تفاصيل المريض</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ $patient->name }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @include('Dashboard.messages_alert')
    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-lg-12 col-md-12">
            <div class="card" id="basic-alert">
                <div class="card-body">
                    <div class="text-wrap">
                        <div class="example">
                            <div class="panel panel-primary tabs-style-1">
                                <div class=" tab-menu-heading">
                                    <div class="tabs-menu1">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs main-nav-line">
                                            <li class="nav-item"><a href="#tab1" class="nav-link active" data-toggle="tab">سجل المريض</a></li>
                                            <li class="nav-item"><a href="#tab2" class="nav-link" data-toggle="tab">الاشعة</a></li>
                                            <li class="nav-item"><a href="#tab3" class="nav-link" data-toggle="tab">المختبر</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body main-content-body-right border-top-0 border">
                                    <div class="tab-content">


                                        {{-- Strat Show Information Patient --}}

                                        <div class="tab-pane active" id="tab1">
                                             <br>
                                            <div class="vtimeline">
                                                @foreach($patient->diagnostics as $patient_record)
                                                    <div class="timeline-wrapper {{ $loop->iteration % 2 == 0 ? 'timeline-inverted' : '' }} timeline-wrapper-primary">
                                                        <div class="timeline-badge"><i class="las la-check-circle"></i></div>
                                                        <div class="timeline-panel">
                                                            <div class="timeline-heading">
                                                                <h6 class="timeline-title">Art Ramadani posted a status update</h6>
                                                            </div>
                                                            <div class="timeline-body">
                                                                <p>{{$patient_record->diagnosis}}</p>
                                                            </div>
                                                            <div class="timeline-footer d-flex align-items-center flex-wrap">
                                                                <i class="fas fa-user-md"></i>&nbsp;
                                                                <span>{{$patient_record->Doctor->name}}</span>
                                                                <span class="mr-auto"><i class="fe fe-calendar text-muted mr-1"></i>{{$patient_record->date}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>

                                        {{-- End Show Information Patient --}}



                                        {{-- Start Invices Patient --}}

                                        <div class="tab-pane" id="tab2">

                                            <div class="table-responsive">
                                                <table class="table table-hover text-md-nowrap text-center">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>اسم الخدمه</th>
                                                        <th>اسم الدكتور</th>
                                                        <th>العمليات</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($patient->Rays as $patient_ray)
                                                        <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td>{{$patient_ray->description}}</td>
                                                            <td>{{$patient_ray->Doctor->name}}</td>
                                                            @if($patient_ray->doctor_id == auth()->user()->id)
                                                            <td>
                                                                <a class="modal-effect btn btn-sm btn-primary"
                                                                 data-effect="effect-scale" data-target="#edit_xray_conversion"
                                                                 data-ray_id="{{ $patient_ray->id }}"
                                                                 data-description="{{ $patient_ray->description }}"
                                                                   data-toggle="modal" href="#"><i class="fas fa-edit"></i></a>

                                                                <a class="modal-effect btn btn-sm btn-danger"
                                                                 data-ray_id="{{ $patient_ray->id }}"
                                                                 data-description="{{ $patient_ray->description }}"
                                                                 data-effect="effect-scale" data-target="#delete_xray"  data-toggle="modal" href="#"><i class="las la-trash"></i></a>
                                                            </td>
                                                            @endif
                                                        </tr>
                                                        {{-- @include('Dashboard.doctor.invoices.edit_xray_conversion') --}}
                                                        {{-- @include('Dashboard.doctor.invoices.deleted') --}}
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            @include('Dashboard.doctor-dashboard.invoices.edit_xray_conversion')
                                            @include('Dashboard.doctor-dashboard.invoices.delete_xray')
                                        </div>

                                        {{-- End Invices Patient --}}



                                        {{-- Start Receipt Patient  --}}

                                        <div class="tab-pane" id="tab3">
                                            <div class="table-responsive">
                                                <table class="table table-hover text-md-nowrap text-center">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>اسم الخدمه</th>
                                                        <th>اسم الدكتور</th>
                                                        <th>العمليات</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($patient->Laboratories as $patient_Laboratorie)
                                                        <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td>{{$patient_Laboratorie->description}}</td>
                                                            <td>{{$patient_Laboratorie->doctor->name}}</td>
                                                            @if($patient_Laboratorie->doctor_id == auth()->user()->id)
                                                                <td>
                                                                    <a class="modal-effect btn btn-sm btn-primary" data-effect="effect-scale"
                                                                     data-laboratorie_id="{{ $patient_Laboratorie->id }}"
                                                                     data-description="{{ $patient_Laboratorie->description }}"
                                                                    data-target="#edit_laboratorie"  data-toggle="modal" href="#"><i class="fas fa-edit"></i></a>

                                                                    <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                                     data-laboratorie_id="{{ $patient_Laboratorie->id }}"
                                                                     data-description="{{ $patient_Laboratorie->description }}"
                                                                    data-target="#delete_laboratorie"  data-toggle="modal" href="#"><i class="las la-trash"></i></a>
                                                                </td>
                                                            @endif
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            @include('Dashboard.doctor-dashboard.invoices.edit_laboratorie')
                                            @include('Dashboard.doctor-dashboard.invoices.delete_Laboratorie')
                                        </div>

                                        {{-- End Receipt Patient  --}}






                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Prism Precode -->
                    </div>
                </div>
            </div>
        </div>


    </div>
    </div>
    <!-- /row -->
    </div>
    <!-- Container closed -->
    </div>
@endsection
@section('js')
    <script src="{{URL::asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('/plugins/notify/js/notifit-custom.js')}}"></script>

    <script>

    const ShowModal = (ModalId ,InputId)=>{

    $('#'+ModalId).on('shown.bs.modal', function (event) {

    let button = $(event.relatedTarget);
    let Input = button.data(InputId);
    let description = button.data('description');
    console.log(Input);
    console.log(InputId);
    console.log(description);

    let modal = $(this);
   modal.find(`input[name="${InputId}"]`).val(Input);
    modal.find('.modal-body #description').val(description);
          });
    }

    ShowModal('edit_xray_conversion','ray_id');
    ShowModal('edit_laboratorie','laboratorie_id');
    ShowModal('delete_xray','ray_id');
    ShowModal('delete_laboratorie','laboratorie_id');

    </script>
@endsection
