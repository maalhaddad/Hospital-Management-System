@extends('Dashboard.layouts.master')
@section('css')
    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{ URL::asset('Dashboard/plugins/sumoselect/sumoselect-rtl.css') }}">
    <link href="{{ URL::asset('dashboard/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />

    <!-- Internal Select2 css -->
    <link href="{{ URL::asset('Dashboard/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!--Internal  Datetimepicker-slider css -->
    <link href="{{ URL::asset('Dashboard/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('Dashboard/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css') }}"
        rel="stylesheet">
    <link href="{{ URL::asset('Dashboard/plugins/pickerjs/picker.min.css') }}" rel="stylesheet">
    <!-- Internal Spectrum-colorpicker css -->
    <link href="{{ URL::asset('Dashboard/plugins/spectrum-colorpicker/spectrum.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .is-invalid {
            border-color: red !important;
            box-shadow: 0 0 5px rgba(255, 0, 0, 0.5);
        }

        .invalid-feedback {
            color: red;
            font-size: 0.875rem;
        }
    </style>
@section('title')
    @if (isset($Doctor))
    {{ __('doctors_trans.edit_doctor') }}
    @else
    {{ __('doctors_trans.add_doctor') }}
    @endif

@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto"> {{ __('Dashboard/main-sidebar_trans.doctors') }}</h4><span
                class="text-muted mt-1 tx-13 mr-2 mb-0">/
                 {{isset($Doctor)?__('doctors_trans.edit_doctor') : __('doctors_trans.add_doctor') }}</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')

@include('Dashboard.messages_alert')

<!-- row -->
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">
                @if (isset($Doctor))
                <form action="{{ route('doctors.update',$Doctor->id) }}" method="post" autocomplete="off"
                enctype="multipart/form-data">
                @method('PUT')
                @else
                <form action="{{ route('doctors.store') }}" method="post" autocomplete="off"
                enctype="multipart/form-data">
                @endif

                    @csrf
                    <div class="pd-30 pd-sm-40 ">

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-1">
                                <label for="exampleInputEmail1">
                                    {{ __('doctors_trans.name') }}</label>
                            </div>
                            <div class="col-md-11 mg-t-5 mg-md-t-0">
                                <input class="form-control @error('name') is-invalid @enderror " name="name"
                                    value=" {{ $Doctor->name ?? old('name') }}"
                                    type="text" autofocus>
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-1">
                                <label for="exampleInputEmail1">
                                    {{ __('doctors_trans.email') }}</label>
                            </div>
                            <div class="col-md-11 mg-t-5 mg-md-t-0">
                                <input class="form-control @error('email') is-invalid @enderror "" name="email"
                                value=" {{$Doctor->email ?? old('email') }}"
                                 type="email">
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-1">
                                <label for="exampleInputEmail1">
                                    {{ __('doctors_trans.password') }}</label>
                            </div>
                            <div class="col-md-11 mg-t-5 mg-md-t-0">
                                <input class="form-control @error('password') is-invalid @enderror " name="password"
                                value="{{ old('password') }}"
                                type="password">
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-1">
                                <label for="exampleInputEmail1">
                                    {{ __('doctors_trans.phone') }}</label>
                            </div>
                            <div class="col-md-11 mg-t-5 mg-md-t-0">
                                <input class="form-control @error('phone') is-invalid @enderror "" name="phone"
                                value=" {{$Doctor->phone ?? old('phone') }}"
                                type="tel">
                                 <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                            </div>
                        </div>


                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-1">
                                <label for="exampleInputEmail1">
                                    {{ __('doctors_trans.section') }}</label>
                            </div>

                            <div class="col-md-11 mg-t-5 mg-md-t-0">
                                <select name="section_id" class="form-control SlectBox @error('section_id') is-invalid @enderror "">
                                    <option value=""  selected disabled>---حدد القسم---</option>
                                    @foreach ($sections as $section)
                                        <option {{ (isset($Doctor)&& $Doctor->Section->id == $section->id)? 'selected':'' }} value="{{ $section->id }}">{{ $section->name }}</option>
                                    @endforeach
                                </select>
                                 <x-input-error :messages="$errors->get('section_id')" class="mt-2" />
                            </div>

                        </div>


                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-1">
                                <label for="exampleInputEmail1">
                                    {{ __('doctors_trans.appointments') }}</label>
                            </div>

                            <div class="col-md-11 mg-t-5 mg-md-t-0">
                                <select multiple="multiple" class="testselect2 @error('appointments') is-invalid @enderror " name="appointments[]">
                                    <option  value="" selected disabled>-- حدد المواعيد --</option>
                                    @foreach ($appointments as $appointment )
                                    <option
                                    @if(isset($Doctor))
                                    {{ (in_array($appointment->id, $appointmentsId)) ? 'selected' : '' }}
                                    @endif
                                     value="{{ $appointment->id }}">{{ $appointment->name }}</option>
                                    @endforeach


                                </select>
                                 <x-input-error :messages="$errors->get('appointments')" class="mt-2" />

                            </div>

                        </div>

                        {{-- <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-1">
                                <label for="exampleInputEmail1">
                                    {{ __('doctors_trans.price') }}</label>
                            </div>

                            <div class="col-md-11 mg-t-5 mg-md-t-0">
                                <input class="form-control @error('price') is-invalid @enderror "" name="price" value=" {{$Doctor->price ?? old('price') }}" type="text">
                                 <x-input-error :messages="$errors->get('price')" class="mt-2" />
                            </div>

                        </div> --}}

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-1">
                                <label for="exampleInputEmail1">
                                    {{ __('doctors_trans.doctor_photo') }}</label>
                            </div>
                            <div class="col-md-11 mg-t-5 mg-md-t-0">
                                <input type="file" accept="image/*" name="photo" onchange="loadFile(event)">
                                <img style="border-radius:50%" src="{{ (isset($Doctor) && isset($Doctor->Image->filename))? asset('Dashboard/img/doctors/'.$Doctor->Image->filename ?? '') : '' }}" width="150px" height="150px" id="output" />
                            </div>
                        </div>

                        <button type="submit"
                            class="btn btn-main-primary pd-x-30 mg-r-5 mg-t-5">{{ __('doctors_trans.submit') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /row -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
@section('js')

<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
</script>

<!--Internal  Form-elements js-->
<script src="{{ URL::asset('Dashboard/js/select2.js') }}"></script>
<script src="{{ URL::asset('Dashboard/js/advanced-form-elements.js') }}"></script>

<!--Internal Sumoselect js-->
<script src="{{ URL::asset('Dashboard/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
<!--Internal  Notify js -->
<script src="{{ URL::asset('dashboard/plugins/notify/js/notifIt.js') }}"></script>
<script src="{{ URL::asset('/plugins/notify/js/notifit-custom.js') }}"></script>


<!--Internal  Datepicker js -->
<script src="{{ URL::asset('dashboard/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
<!--Internal  jquery.maskedinput js -->
<script src="{{ URL::asset('dashboard/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
<!--Internal  spectrum-colorpicker js -->
<script src="{{ URL::asset('dashboard/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
<!-- Internal Select2.min js -->
<script src="{{ URL::asset('dashboard/plugins/select2/js/select2.min.js') }}"></script>
<!--Internal Ion.rangeSlider.min js -->
<script src="{{ URL::asset('dashboard/plugins/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
<!--Internal  jquery-simple-datetimepicker js -->
<script src="{{ URL::asset('dashboard/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js') }}"></script>
<!-- Ionicons js -->
<script src="{{ URL::asset('dashboard/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js') }}"></script>
<!--Internal  pickerjs js -->
<script src="{{ URL::asset('dashboard/plugins/pickerjs/picker.min.js') }}"></script>
<!-- Internal form-elements js -->
<script src="{{ URL::asset('dashboard/js/form-elements.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>



@endsection
