@extends('Dashboard.layouts.master')
@section('title')
    {{__('Dashboard/main-sidebar_trans.doctors')}}
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
							<h4 class="content-title mb-0 my-auto">{{__('Dashboard/main-sidebar_trans.doctors')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{__('Dashboard/main-sidebar_trans.view_all')}}</span>
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
                                        <button type="button" class="btn btn-danger"
                                        id="btn_delete_all" data-target="#delete_select" >{{__('doctors_trans.delete_select')}}</button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive"  >
                                        <table style="width: 100%" class="table key-buttons text-md-wrap" id="example2">
                                            <thead>
                                            <tr>

                                                <th class="border-bottom-0">#</th>
                                                <th>
                                                    <input type="checkbox" id="select_all_ids" name="delete_select" id="flexCheckChecked">
                                                </th>
                                                <th class="border-bottom-0">{{__('doctors_trans.img')}}</th>
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
                                                    <td>
                                                        <input class="form-check-input checkbox-ids" type="checkbox" name="select_ids" value="{{ $doctor->id }}">
                                                    </td>
                                                       <td>
                                                       <?php $pathImg = (isset($doctor->image->filename)) ? $doctor->image->filename : 'default.png' ?>
                                                       <img src="{{Url::asset('Dashboard/img/doctors/'.$pathImg)}}"
                                                        height="50px" width="50px" alt="{{ $pathImg }}">
                                                       </td>
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
                                                       <td>
                                                     @foreach ($doctor->Appointments as $appointment )

                                                           {{ $appointment->name }},

                                                        @endforeach
                                                       </td>
                                                       <td>{{ $doctor->created_at->diffForHumans() }}</td>
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
                                                @endif




                                            </tbody>
                                        </table>
                                    </div>
                                </div><!-- bd -->
                            </div><!-- bd -->
                        </div>
                        <!--/div-->

                         {{-- Update Password --}}
                         @include('Dashboard.doctors.update_password')
                         {{-- Update Status --}}
                         @include('Dashboard.doctors.update_status')


                                  {{-- Delete Doctor --}}
                                    @include('Dashboard.doctors.delete')
                               {{-- Delete Select --}}
                               @include('Dashboard.doctors.delete_select')



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

     @include('Dashboard.doctors.scripts')
    <script>


        // $('#delete_doctor').on('show.bs.modal', function(event) {
        //     var button = $(event.relatedTarget)
        //     var doctor_id = button.data('doctor_id')
        //     var modal = $(this)
        //     modal.find('.modal-body #doctor_id').val(doctor_id);

        // });

        // $('#update_status').on('show.bs.modal', function(event) {
        //     var button = $(event.relatedTarget)
        //     var doctor_id = button.data('doctor_id')
        //     var modal = $(this)
        //     modal.find('.modal-body #doctor_id').val(doctor_id);

        // });

        // $('#update_password').on('show.bs.modal', function(event) {
        //     var button = $(event.relatedTarget)
        //     var doctor_id = button.data('doctor_id')
        //     var doctor_name = button.data('doctor_name')
        //     console.log(doctor_name)
        //     var modal = $(this)
        //     modal.find('.modal-body #doctor_id').val(doctor_id);
        //     $('#doctor-name').text(doctor_name);

        // });
    </script>

<script>
    $(function(e) {
       $("#select_all_ids").click(function() {
        var check = $(this).prop('checked');
        $(".checkbox-ids").prop('checked',check);
        });
    })
</script>

<script>
    $(function () {
            $("#btn_delete_all").click(function () {
                var selected = [];
                $("input[name=select_ids]:checked").each(function () {
                    selected.push(this.value);
                });

                if (selected.length > 0) {
                    $('#delete_select').modal('show')
                    $('input[name="delete_select_ids"]').val(selected);
                }
            });
        });
</script>

@endsection
