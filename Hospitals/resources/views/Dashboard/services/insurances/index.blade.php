@extends('Dashboard.layouts.master')
@section('title')
    {{__('insurance.Insurance')}}
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
                            <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{__('insurance.Insurance')}}</span>
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
                                        <a  class="btn btn-primary" href="{{ route('insurances.create') }}" >
                                            {{__('insurance.Add_Insurance')}}
                                        </a>

                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive"  >
                                        <table style="width: 100%" class="table key-buttons text-md-wrap" id="example2">
                                            <thead>
                                            <tr>

                                                <th class="border-bottom-0">#</th>
                                                <th >{{__('insurance.Company_code')}}</th>
                                                <th >{{__('insurance.Company_name')}}</th>
                                                <th >{{__('insurance.discount_percentage')}}</th>
                                                <th >{{__('insurance.Insurance_bearing_percentage')}}</th>
                                                <th >{{__('insurance.status')}}</th>
                                                <th >{{__('insurance.notes')}}</th>
                                                <th >{{__('insurance.Processes')}}</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                                @foreach($insurances as $insurance)
                                                    <tr style="text-align: center" >
                                                        <td>{{$loop->iteration }}</td>
                                                        <td>{{$insurance->insurance_code}}</td>
                                                        <td>{{$insurance->name}}</td>
                                                        <td>{{$insurance->discount_percentage}}</td>
                                                        <td>{{$insurance->company_rate}}</td>
                                                        <td>
                                                            @php
                                                            if ($insurance->status == 1) {
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

                                                        <td>{{\Str::limit($insurance->notes,30)}}</td>
                                                        <td>
                                                            <a href="{{route('insurances.edit',$insurance)}}" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                                            <button class="btn btn-sm btn-danger" data-insurance_id="{{ $insurance->id }}" data-toggle="modal" data-target="#delete_insurance"><i class="fas fa-trash"></i>
                                                            </button>

                                                        </td>
                                                     {{-- @include('Dashboard.insurance.Deleted') --}}
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                        </table>
                                    </div>
                                </div><!-- bd -->
                            </div><!-- bd -->
                        </div>
                        <!--/div-->

    <div class="modal" id="delete_insurance">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">{{__('insurance.Title_deleted')}}</h6><button aria-label="Close" class="close"
                    data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('insurances.destroy','test') }}" method="post">
                @method('delete')
                @csrf
                <div class="modal-body">
                    <p>{{ __('sections_trans.Warning') }}</p><br>
                    <input type="hidden" name="insurance_id" id="insurance_id" value="">
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
  $('#delete_insurance').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var insurance_id = button.data('insurance_id')
            var modal = $(this)
            modal.find('.modal-body #insurance_id').val(insurance_id);

        });
 </script>

@endsection
