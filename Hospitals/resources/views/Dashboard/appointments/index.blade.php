@extends('Dashboard.layouts.master')
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('Dashboard/plugins/sumoselect/sumoselect-rtl.css') }}">
    <link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
    <link href="{{URL::asset('Dashboard/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('Dashboard/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css')}}" rel="stylesheet">
    <link href="{{URL::asset('Dashboard/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css')}}" rel="stylesheet">
    <link href="{{URL::asset('Dashboard/plugins/pickerjs/picker.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('Dashboard/plugins/spectrum-colorpicker/spectrum.css')}}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">المواعيد</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة المواعيد</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @include('Dashboard.messages_alert')
    <!-- row opened -->
    <div class="row row-sm">
        <!--div-->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>اسم المريض</th>
                                <th>البريد الالكتروني</th>
                                <th>القسم</th>
                                <th>الدكتور</th>
                                <th>الهاتف</th>
                                <th>ملاحظات</th>
                                <th>العمليات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($appointments as $appointment)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$appointment->name}}</a></td>
                                    <td>{{$appointment->email}}</td>
                                    <td>{{$appointment->Section->name}}</td>
                                    <td>{{$appointment->Doctor->name}}</td>
                                    <td>{{$appointment->phone}}</td>
                                    <td>{{$appointment->notes}}</td>
                                    <td>
                                        <button class="btn btn-sm btn-success" data-toggle="modal"
                                        data-id_app="{{ $appointment->id }}"
                                        data-name="{{ $appointment->name }}"
                                        data-target="#approval_update"><i class="fas fa-check"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger" data-toggle="modal"
                                                data-target="#Refusal{{$appointment->id}}"><i class="fas fa-remove-format"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!-- bd -->
            </div>
            @include('Dashboard.appointments.approval')<!-- bd -->
        </div>

        <!--/div-->
    </div>
    <!-- /row -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
  <!-- Internal Data tables -->
     {{-- <script src="{{URL::asset('Dashboard/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/jquery.dataTables.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>

     <!--Internal  Datepicker js -->
    <script src="{{URL::asset('dashboard/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{URL::asset('dashboard/plugins/jquery.maskedinput/jquery.maskedinput.js')}}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{URL::asset('dashboard/plugins/spectrum-colorpicker/spectrum.js')}}"></script>
    <!-- Internal Select2.min js -->
    <script src="{{URL::asset('dashboard/plugins/select2/js/select2.min.js')}}"></script>
    <!--Internal Ion.rangeSlider.min js -->
    <script src="{{URL::asset('dashboard/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
    <!--Internal  jquery-simple-datetimepicker js -->
    <script src="{{URL::asset('dashboard/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js')}}"></script>
    <!-- Ionicons js -->
    <script src="{{URL::asset('dashboard/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js')}}"></script>
    <!--Internal  pickerjs js -->
    <script src="{{URL::asset('dashboard/plugins/pickerjs/picker.min.js')}}"></script>
    <!-- Internal form-elements js -->
    <script src="{{URL::asset('dashboard/js/form-elements.js')}}"></script>
    <!--Internal  Datatable js -->
    <script src="{{URL::asset('Dashboard/js/table-data.js')}}"></script>
    <!--Internal  Notify js -->
    <script src="{{URL::asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('/plugins/notify/js/notifit-custom.js')}}"></script> --}}


    <!-- 1️⃣ jQuery (أساسي لكل الإضافات) -->
<script src="{{ URL::asset('dashboard/plugins/jquery/jquery.min.js') }}"></script>

<!-- 2️⃣ Bootstrap JS -->
<script src="{{ URL::asset('dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- 2️⃣ DataTables -->
<script src="{{ URL::asset('Dashboard/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('Dashboard/plugins/datatable/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('Dashboard/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('Dashboard/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>

<!-- 3️⃣ jQuery UI Datepicker -->
<script src="{{ URL::asset('dashboard/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>

<!-- 4️⃣ jQuery Masked Input -->
<script src="{{ URL::asset('dashboard/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>

<!-- 5️⃣ Spectrum Colorpicker -->
<script src="{{ URL::asset('dashboard/plugins/spectrum-colorpicker/spectrum.js') }}"></script>

<!-- 6️⃣ Select2 -->
<script src="{{ URL::asset('dashboard/plugins/select2/js/select2.min.js') }}"></script>

<!-- 7️⃣ Ion RangeSlider -->
<script src="{{ URL::asset('dashboard/plugins/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>

<!-- 8️⃣ AmazeUI Datetimepicker -->
<script src="{{ URL::asset('dashboard/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js') }}"></script>

<!-- 9️⃣ Simple Datetimepicker -->
<script src="{{ URL::asset('dashboard/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js') }}"></script>

<!-- 🔟 Picker.js -->
<script src="{{ URL::asset('dashboard/plugins/pickerjs/picker.min.js') }}"></script>

<!-- 11️⃣ Form Elements JS -->
<script src="{{ URL::asset('dashboard/js/form-elements.js') }}"></script>

<!-- 12️⃣ Notify JS -->
<script src="{{ URL::asset('dashboard/plugins/notify/js/notifIt.js') }}"></script>
<script src="{{ URL::asset('dashboard/plugins/notify/js/notifit-custom.js') }}"></script>


     <script>
         $('#approval_update').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id_app')
            var name = button.data('name')
            console.log(id)
            console.log(name)

            var modal = $(this)

            modal.find('.modal-body #id_app').val(id);
            modal.find('.modal-body #name_app').text(name);
            modal.show();

        });


        // $('#datetimepicker').datetimepicker({

        // })
    </script>
@endsection
