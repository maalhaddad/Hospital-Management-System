@extends('Dashboard.layouts.master')
@section('css')
    <!--Internal   Notify -->
    <link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('title')
    {{ isset($ambulance)? __('ambulances.Ambulance_edit') : __('ambulances.Ambulance_add') }}
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">{{ __('ambulances.Ambulance') }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ اضافة سيارة جديدة</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
@include('Dashboard.messages_alert')
<!-- row -->
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                @if (isset($ambulance))
                <form action="{{route('ambulances.update', $ambulance->id )}}" method="post" autocomplete="off">
                @method('PUT')
                @else
                <form action="{{route('ambulances.store')}}" method="post" autocomplete="off">
                @endif
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label>{{ __('Ambulances.car_number') }}</label>
                            <input type="text" name="car_number"  value="{{ $ambulance->car_number ?? old('car_number')}}" class="form-control @error('car_number') is-invalid @enderror">
                        </div>

                        <div class="col">
                            <label>{{ __('Ambulances.car_model') }}</label>
                            <input type="text" name="car_model"  value="{{$ambulance->car_model ?? old('car_model')}}" class="form-control @error('car_model') is-invalid @enderror">
                        </div>

                        <div class="col">
                            <label>{{ __('Ambulances.manufacture_year') }}</label>
                            <input type="number" name="car_year_made"  value="{{ $ambulance->car_year_made ?? old('car_year_made')}}" class="form-control @error('car_year_made') is-invalid @enderror">
                        </div>

                        <div class="col">
                            <label>{{ __('Ambulances.car_type') }}</label>
                            <select class="form-control" name="car_type">

                                <option {{ ( isset($ambulance) && $ambulance->car_type == 1) ? 'selected' : '' }} value="1">مملوكة</option>
                                <option {{ ( isset($ambulance) && $ambulance->car_type == 2) ? 'selected' : '' }} value="2">ايجار</option>
                            </select>
                        </div>

                    </div>
                    <br>

                    <div class="row">
                        <div class="col-3">
                            <label>{{ __('Ambulances.driver_name') }}</label>
                            <input type="text" name="driver_name"  value="{{$ambulance->driver_name ?? old('driver_name')}}" class="form-control @error('driver_name') is-invalid @enderror">
                        </div>

                        <div class="col-3">
                            <label>{{ __('Ambulances.license_number') }}</label>
                            <input type="number" name="driver_license_number"  value="{{$ambulance->driver_license_number?? old('driver_license_number')}}" class="form-control @error('driver_license_number') is-invalid @enderror">
                        </div>

                        <div class="col-6">
                            <label>{{ __('Ambulances.phone_number') }}</label>
                            <input type="number" name="driver_phone"  value="{{ $ambulance->driver_phone ?? old('driver_phone')}}" class="form-control @error('driver_phone') is-invalid @enderror">
                        </div>

                    </div>

                    <br>

                    <div class="row">
                        <div class="col">
                            <label>{{ __('Ambulances.notes') }}</label>
                            <textarea rows="5" cols="10" class="form-control" name="notes">{{ $ambulance->notes ?? old('notes')}}</textarea>
                        </div>
                    </div>
                    <br>
                    @if (isset($ambulance))
                    <div class="row">
                        <div class="col">
                            <label>{{ __('Ambulances.activation_status') }}</label>
                             &nbsp;
                            <input name="is_available" {{$ambulance->is_available == 1 ? 'checked' : ''}} value="1" type="checkbox" class="form-check-input" id="exampleCheck1">
                        </div>
                    </div>

                    <br>

                    @endif
                    <br>

                    <div class="row">
                        <div class="col">
                            <button class="btn btn-success">{{__('insurance.save')}}</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
    <script src="{{URL::asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('/plugins/notify/js/notifit-custom.js')}}"></script>
@endsection
