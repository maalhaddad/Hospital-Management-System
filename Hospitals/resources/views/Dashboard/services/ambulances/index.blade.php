@extends('Dashboard.layouts.master')
@section('title')
{{__('ambulances.Ambulance')}}
@stop
@section('css')
    <!-- Internal Data table css -->
    <link href="{{URL::asset('Dashboard/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('Dashboard/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('Dashboard/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('Dashboard/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('Dashboard/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('Dashboard/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <!--Internal   Notify -->
    <link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('page-header')
{{-- موقع سنديان --}}
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{ __('Services.Services') }}</h4>
                            <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{__('ambulances.Ambulance')}}</span>
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
                                        <a  class="btn btn-primary" href="{{ route('ambulances.create') }}" >
                                            {{__('ambulances.Ambulance_add')}}
                                        </a>

                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive"  >
                                        <table style="width: 100%" class="table key-buttons text-md-wrap" id="example2">
                                            <thead>
                                            <tr  >

                                                <th class="border-bottom-0">#</th>
                                                <th>{{ __('Ambulances.car_number') }}</th>
                                                <th>{{ __('Ambulances.car_model') }}</th>
                                                <th>{{ __('Ambulances.manufacture_year') }}</th>
                                                <th>{{ __('Ambulances.car_type') }}</th>
                                                <th>{{ __('Ambulances.driver_name') }}</th>
                                                <th>{{ __('Ambulances.license_number') }}</th>
                                                <th>{{ __('Ambulances.phone_number') }}</th>
                                                <th>{{ __('Ambulances.car_status') }}</th>
                                                <th>{{ __('Ambulances.notes') }}</th>
                                                <th >{{__('Ambulances.actions')}}</th>
                                            </tr>
                                            </thead>
                                        @foreach ($ambulances as $ambulance )
                                        <tr style="text-align:center">

                                            <td>{{$loop->iteration }}</td>
                                            <td>{{ $ambulance->car_number }}</td>
                                            <td>{{ $ambulance->car_model }}</td>
                                            <td>{{ $ambulance->car_year_made }}</td>
                                            <td>

                                                {{ $ambulance->car_type == 1 ? 'مملوكة' : 'إيجار' }}
                                            </td>
                                            <td>{{ $ambulance->driver_name }}</td>
                                            <td>{{ $ambulance->driver_license_number }}</td>
                                            <td>{{ $ambulance->driver_phone }}</td>

                                            <td>
                                                @php
                                                if ($ambulance->is_available == 1) {
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
                                            <td>{{ $ambulance->notes }}</td>
                                            <td>
                                                <a href="{{route('ambulances.edit',$ambulance->id)}}" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                                <button class="btn btn-sm btn-danger" data-ambulance_id="{{ $ambulance->id }}" data-toggle="modal" data-target="#delete_ambulance"><i class="fas fa-trash"></i>
                                                </button>

                                            </td>
                                        </tr>
                                        @endforeach

                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div><!-- bd -->
                            </div><!-- bd -->
                        </div>
                        <!--/div-->

    <div class="modal" id="delete_ambulance">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">{{__('ambulances.Title_deleted')}}</h6><button aria-label="Close" class="close"
                    data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('ambulances.destroy','test') }}" method="post">
                @method('delete')
                @csrf
                <div class="modal-body">
                    <p>{{ __('sections_trans.Warning') }}</p><br>
                    <input type="hidden" name="ambulance_id" id="ambulance_id" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Dashboard/section_trans.Close')}}</button>
                    <button type="submit" class="btn btn-danger">{{__('Dashboard/section_trans.submit')}}</button>
                </div>
        </div>
        </form>
    </div>
</div>




                    <!-- /row -->

				</div>
				<!-- row closed -->

			<!-- Container closed -->

		<!-- main-content closed -->
@endsection
@section('js')

    <!-- Internal Data tables -->
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/jquery.dataTables.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/jszip.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/pdfmake.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/vfs_fonts.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/buttons.html5.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/buttons.print.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
    <!--Internal  Datatable js -->
    <script src="{{URL::asset('Dashboard/js/table-data.js')}}"></script>
    <!--Internal  Notify js -->
    <script src="{{URL::asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('/plugins/notify/js/notifit-custom.js')}}"></script>


    </script>

 <script>
  $('#delete_ambulance').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var ambulance_id = button.data('ambulance_id')
            var modal = $(this)
            modal.find('.modal-body #ambulance_id').val(ambulance_id);

        });
 </script>

@endsection
