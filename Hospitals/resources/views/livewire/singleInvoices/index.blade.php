@extends('Dashboard.layouts.master')
 @section('css')

 <link href="{{URL::asset('Dashboard/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('Dashboard/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('Dashboard/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('Dashboard/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('Dashboard/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('Dashboard/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<!--Internal   Notify -->
    <link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
 @endsection
  <?php
  $titles = [
    'update-invoice' => 'تعديل الفاتورة',
    'create-invoice' => 'إضافة فاتورة',
    'single_invoices'  => 'قائمة الفواتير',
];
$title = $titles[Route::currentRouteName()];
 ?>
 @section('title')
     {{ $title }}
 @stop
 @section('page-header')
     <!-- breadcrumb -->
     <div class="breadcrumb-header justify-content-between">
         <div class="my-auto">
             <div class="d-flex">
                 <h4 class="content-title mb-0 my-auto">الفواتير</h4><span
                     class="text-muted mt-1 tx-13 mr-2 mb-0">/   {{ $title }}</span>
             </div>
         </div>
     </div>
     <!-- breadcrumb -->
 @endsection
 @section('content')
 @include('Dashboard.messages_alert')
     <div class="row row-sm">
         <div class="col-xl-12">
             <div class="card">
                 <div class="card-body">
                     {{-- <livewire:single-invoices/> --}}
                     @if (Route::currentRouteName() == 'single_invoices')
                     <livewire:single-invoices/>
                     @else
                     <livewire:create-invoice/>
                     @endif


                 </div>
             </div>
         </div>

     </div>
     <!-- row closed -->
     </div>
     <!-- Container closed -->
     </div>
     <!-- main-content closed -->
 @endsection
 @section('js')

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


  

 @endsection
