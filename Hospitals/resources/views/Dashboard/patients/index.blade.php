@extends('Dashboard.layouts.master')
@section('css')

 <!-- Internal Data table css -->
    <link href="{{URL::asset('Dashboard/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('Dashboard/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('Dashboard/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('Dashboard/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('Dashboard/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('Dashboard/plugins/select2/css/select2.min.css')}}" rel="stylesheet">

    <link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{ __('patients.patients') }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ __('patients.patient_list') }}</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('title')
    {{ __('patients.patient_list') }}
@endsection
@section('content')
    @include('Dashboard.messages_alert')
				<!-- row opened -->
				<div class="row row-sm">
					<!--div-->
					<div class="col-xl-12">
						<div class="card">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
                                    <a href="{{ route('patients.create') }}" class="btn btn-primary">{{ __('patients.add_patient') }}</a>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									{{-- <table class="table text-md-nowrap" id="example1"> --}}
                                    <table style="width: 100%" class="table key-buttons text-md-wrap" id="example2">
										<thead>
											<tr>
												<th>#</th>
												<th>{{ __('patients.name') }}</th>
												<th>{{ __('patients.email') }}</th>
												<th>{{ __('patients.date_of_birth') }}</th>
												<th>{{ __('patients.phone') }}</th>
												<th>{{ __('patients.gender') }}</th>
                                                <th>{{ __('patients.blood_group') }}</th>
                                                <th>{{ __('patients.address') }}</th>
                                                <th>{{ __('patients.actions') }}</th>
											</tr>
										</thead>
										<tbody>
                                        @foreach($Patients as $Patient)
											<tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td><a href="{{ route('patients.show',$Patient) }}">{{$Patient->name}}</a> </td>
                                                <td>{{$Patient->email}}</td>
                                                <td>{{$Patient->Date_Birth}}</td>
                                                <td>{{$Patient->Phone}}</td>
                                                <td>{{$Patient->Gender == 1 ? __('patients.male') : __('patients.female')}}</td>
                                                <td>{{$Patient->Blood_Group}}</td>
                                                <td>{{$Patient->Address}}</td>
                                                <td>
                                                    <a href="{{route('patients.edit',$Patient)}}" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                                    <button class="btn btn-sm btn-danger" data-patient_id="{{ $Patient->id }}" data-patient_name="{{ $Patient->name }}" data-toggle="modal" data-target="#delete_Patients"><i class="fas fa-trash"></i></button>
                                                    <a href="{{route('patients.show',$Patient)}}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
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
				</div>


    <div class="modal" id="delete_Patients">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">{{ __('patients.delete_patient') }}</h6><button aria-label="Close" class="close"
                        data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{ route('patients.destroy','test') }}" method="post">
                    @method('delete')
                    @csrf
                    <div class="modal-body">
                        <p>{{ __('sections_trans.Warning') }}</p><br>
                        <input type="hidden" name="patient_id" id="patient_id" value="">
                        <input type="text" name="patient_name" id="patient_name" class="form-control" readonly>
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
			<!-- Container closed -->
		</div>
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

    <script>
         $('#delete_Patients').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var patient_id = button.data('patient_id')
            var patient_name = button.data('patient_name')
            var modal = $(this)
            modal.find('.modal-body #patient_id').val(patient_id);
            modal.find('.modal-body #patient_name').val(patient_name);

        });
    </script>
@endsection