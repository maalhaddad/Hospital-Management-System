@extends('Dashboard.layouts.master')
@section('title')
    {{ __('Dashboard/main-sidebar_trans.Single_service') }}
@stop
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('Dashboard/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('Dashboard/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('Dashboard/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('Dashboard/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('Dashboard/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('Dashboard/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!--Internal   Notify -->
    <link href="{{ URL::asset('dashboard/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('Dashboard/main-sidebar_trans.Services') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ __('Dashboard/main-sidebar_trans.Single_service') }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @include('Dashboard.messages_alert')
    <!-- row -->
    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">
                            {{ __('Services.add_Service') }}
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table style="width: 100%" class="table text-md-nowrap" id="example2">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th> {{ __('Services.name') }}</th>
                                    <th> {{ __('Services.price') }}</th>
                                    <th> {{ __('doctors_trans.Status') }}</th>
                                    <th> {{ __('Services.description') }}</th>
                                    <th>{{ __('sections_trans.created_at') }}</th>
                                    <th>{{ __('sections_trans.Processes') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($services as $service)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $service->name }}</td>
                                        <td>{{ $service->price }}</td>
                                        <td>
                                            <div
                                                class="dot-label bg-{{ $service->status == 1 ? 'success' : 'danger' }} ml-1">
                                            </div>
                                            {{ $service->status == 1 ? __('doctors_trans.Enabled') : __('doctors_trans.Not_enabled') }}
                                        </td>
                                        <td> {{ Str::limit($service->description, 30) }}</td>
                                        <td>{{ $service->created_at->diffForHumans() }}</td>
                                        <td>

                                            <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                data-toggle="modal" href="#edit" data-service_id="{{ $service->id }}"
                                                data-service_name="{{ $service->name }}"
                                                data-service_price="{{ $service->price }}"
                                                data-service_description="{{ $service->description }}"
                                                data-service_status="{{ $service->status }}"><i class="las la-pen"></i></a>

                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                data-toggle="modal" href="#delete" data-service_id="{{ $service->id }}"
                                                data-service_name="{{ $service->name }}"><i class="las la-trash"></i></a>

                                        </td>
                                    </tr>                                   
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!-- bd -->
            </div><!-- bd -->
        </div>
        <!--/div-->
        @include('Dashboard.Services.Single.add')
        @include('Dashboard.Services.Single.edit')
        @include('Dashboard.Services.Single.delete')
        <!-- /row -->

    </div>
    <!-- row closed -->

    <!-- Container closed -->

    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Data tables -->
    <script src="{{ URL::asset('Dashboard/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('Dashboard/js/table-data.js') }}"></script>
    <!--Internal  Notify js -->
    <script src="{{ URL::asset('dashboard/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('/plugins/notify/js/notifit-custom.js') }}"></script>


    <script>
        $('#edit').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var fields = {
                service_id: button.data('service_id'),
                name: button.data('service_name'),
                price: button.data('service_price'),
                description: button.data('service_description'),
                status: button.data('service_status')
            };
            var modal = $(this)
            $.each(fields, function(field, value) {
                modal.find('.modal-body #' + field).val(value);
            });

        });


        $('#delete').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var service_id = button.data('service_id')
            var modal = $(this)
            modal.find('.modal-body #service_id').val(service_id);


        });
    </script>
@endsection
