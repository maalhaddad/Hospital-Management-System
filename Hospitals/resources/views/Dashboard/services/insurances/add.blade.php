@extends('Dashboard.layouts.master')
@section('css')
    <!--Internal   Notify -->
    <link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('title')
     {{isset($insurance) ?__('insurance.edit_Insurance'): __('insurance.Add_Insurance')}}
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">جميع الخدمات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{__('insurance.Insurance')}}</span>
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
                @if (isset($insurance))
                <form action="{{route('insurances.update',$insurance->id)}}" method="post" autocomplete="off">
                    @method('PUT')
                @else
                <form action="{{route('insurances.store')}}" method="post" autocomplete="off">
                @endif
                @csrf
                    <div class="row">
                        <div class="col">
                            <label>{{__('insurance.Company_code')}}</label>
                            <input type="text" name="insurance_code"  value="{{ $insurance->insurance_code ?? old('insurance_code')}}" class="form-control @error('insurance_code') is-invalid @enderror">
                            @error('insurance_code')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col">
                            <label>{{__('insurance.Company_name')}}</label>
                            <input type="text" name="name"  value="{{ $insurance->name ??  old('name')}}" class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <br>

                    <div class="row">
                        <div class="col">
                            <label>{{__('insurance.discount_percentage')}} %</label>
                            <input type="number" name="discount_percentage" value="{{ $insurance->discount_percentage ??  old('discount_percentage')}}" class="form-control @error ('discount_percentage') is-invalid @enderror">
                            @error('discount_percentage')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col">
                            <label>{{__('insurance.Insurance_bearing_percentage')}} %</label>
                            <input type="number" name="Company_rate" value="{{ $insurance->company_rate ??  old('Company_rate')}}" class="form-control @error ('Company_rate') is-invalid @enderror">
                            @error('Company_rate')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <br>

                    <div class="row">
                        <div class="col">
                            <label>{{__('insurance.notes')}}</label>
                            <textarea rows="5" cols="10" class="form-control" name="notes">{{ $insurance->notes ??  old('notes') }}</textarea>
                        </div>
                    </div>

                    <br>

                    @if (isset($insurance))
                    <div class="row">
                        <div class="col">
                            <label>حالة التفعيل</label>
                             &nbsp;
                            <input name="status" {{$insurance->status == 1 ? 'checked' : ''}} value="1" type="checkbox" class="form-check-input" id="exampleCheck1">
                        </div>
                    </div>

                    <br>

                    @endif

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
