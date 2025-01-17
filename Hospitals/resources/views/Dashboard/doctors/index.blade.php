@extends('Dashboard.layouts.master')
@section('title')
    {{trans('Dashboard/main-sidebar_trans.doctors')}}
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
							<h4 class="content-title mb-0 my-auto">{{__('Dashboard/main-sidebar_trans.doctors')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{trans('Dashboard/main-sidebar_trans.view_all')}}</span>
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
                                        <a  class="btn btn-primary" href="{{ route('doctors.create') }}" >
                                            {{__('doctors_trans.add_doctor')}}
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive"  >
                                        <table style="width: 100%" class="table key-buttons text-md-wrap" id="example2">
                                            <thead>
                                            <tr>
                                                <th class="border-bottom-0">#</th>
                                                <th class="border-bottom-0">{{__('doctors_trans.name')}}</th>
                                                <th class="border-bottom-0">{{__('doctors_trans.email')}}</th>
                                                <th class="border-bottom-0">{{__('doctors_trans.phone')}}</th>
                                                <th class="border-bottom-0">{{__('doctors_trans.section')}}</th>
                                                <th class="border-bottom-0">{{__('doctors_trans.Status')}}</th>
                                                <th class="border-bottom-0">{{__('doctors_trans.appointments')}}</th>
                                                <th class="border-bottom-0">{{__('doctors_trans.created_at')}}</th>
                                                <th class="border-bottom-0">{{__('doctors_trans.Processes')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                                @if (isset($doctors) && $doctors->count() > 0)
                                                @foreach ($doctors as  $doctor )

                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                       <td>{{ $doctor->name }}</td>
                                                       <td>{{ $doctor->email }}</td>
                                                       <td>{{ $doctor->phone }}</td>
                                                       <td>{{ $doctor->Section->name }}</td>
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
                                                       <td>{{ $doctor->appointments[0] }}</td>
                                                       <td>{{ $doctor->created_at->diffForHumans() }}</td>
                                                       <td>
                                                           <a class="modal-effect btn btn-sm btn-info" href="{{ route('doctors.edit',$doctor) }}"
                                                           ><i class="las la-pen"></i></a>
                                                           <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"  data-toggle="modal" href="#delete"
                                                            data-section_id=""
                                                           ><i class="las la-trash"></i></a>
                                                       </td>
                                                   </tr>
                                                @endforeach
                                                @endif




                                            </tbody>
                                        </table>
                                    </div>
                                </div><!-- bd -->
                            </div><!-- bd -->
                        </div>
                        <!--/div-->

                    


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

@endsection
