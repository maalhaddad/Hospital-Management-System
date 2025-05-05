@extends('Dashboard.layouts.master')
@section('title')
   معاينة الطباعة
@stop
@section('css')
    <style>
        @media print {
            #print_Button {
                display: none;
            }
        }
    </style>

<style>
    .invoice-header {
        margin-bottom: 20px;
        padding-bottom: 20px;
        border-bottom: 1px solid #eee;
    }
    .invoice-title {
        font-size: 2rem;
        font-weight: bold;
        margin-bottom: 5px;
    }
    .invoice-info-row span:first-child {
        display: inline-block;
        min-width: 180px; /* زيادة عرض التسميات قليلاً */
        font-weight: bold;
    }
    .signature-line {
        border-top: 1px solid #000;
        padding-top: 20px;
        text-align: center;
    }
    .text-end {
        text-align: end;
    }
</style>
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">سند قبض</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ طباعه سند</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    {{-- <div class="row row-sm">
        <div class="col-md-12 col-xl-12">
            <div class=" main-content-body-invoice" id="print">
                <div class="card card-invoice">
                    <div class="card-body">
                        <div class="invoice-header">
                            <h1 class="invoice-title">سند قبض</h1>
                            <div class="billed-from">
                                <h6>برنامج ادراه المستشفي </h6>
                                <p>201 المهندسين<br>
                                    Tel No: 011111111<br>
                                    Email: Hospital@gmail.com</p>
                            </div><!-- billed-from -->
                        </div><!-- invoice-header -->
                        <div class="row mg-t-20">
                            <div class="col-md">
                                <label class="tx-gray-600">معلومات السند</label>
                                <p class="invoice-info-row"><span>تاريخ الاصدار</span> <span>{{$receipt->date}}</span>
                                </p>
                                <p class="invoice-info-row "><span>اسم المريض</span>
                                    <span>{{$receipt->patients->name}}</span></p>
                            </div>
                        </div>
                        <div class="table-responsive mg-t-40">
                            <table class="table table-invoice border text-md-nowrap mb-0">
                                <thead>
                                <tr>
                                    <th class="wd-20p">#</th>
                                    <th class="wd-40p">ملاحظات</th>
                                    <th class="tx-center">المبلغ</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td class="tx-12">{{ $receipt->description}}</td>
                                    <td class="tx-center">{{ number_format($receipt->amount,2)}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <hr class="mg-b-40">
                        <a href="#" class="btn btn-danger float-left mt-3 mr-2" id="print_Button" onclick="printDiv()">
                            <i class="mdi mdi-printer ml-1"></i>طباعه
                        </a>
                    </div>
                </div>
            </div>
        </div><!-- COL-END -->
    </div> --}}
    <!-- row closed -->


    <div class="row row-sm">
        <div class="col-md-12 col-xl-12">
            <div class=" main-content-body-invoice" id="print">
                <div class="card card-invoice">
                    <div class="card-body">
                        <div class="invoice-header d-flex justify-content-between align-items-center">
                            <div>
                                <h1 class="invoice-title mb-1">سند قبض</h1>
                                <p class="tx-14">تاريخ الاصدار: {{ $receipt->date }}</p>
                                <p class="tx-14">رقم السند: {{ $receipt->id ?? '---' }}</p>
                            </div>
                            <div class="text-start">
                                <img src="/images/hospital_logo.png" alt="شعار المستشفى" style="max-width: 150px;">
                            </div>
                        </div><div class="row mg-t-20">
                            <div class="col-md">
                                <label class="tx-gray-600">بيانات المريض</label>
                                <p class="invoice-info-row"><span>اسم المريض</span> <span>{{ $receipt->patients->name }}</span></p>
                                @if($receipt->patients->id)
                                <p class="invoice-info-row"><span>رقم الملف الطبي</span> <span>{{ $receipt->patients->id }}</span></p>
                                @endif
                            </div>
                            <div class="col-md text-end">
                                <label class="tx-gray-600">بيانات المستشفى</label>
                                <h6>برنامج ادارة المستشفى</h6>
                                <p class="mb-1">201 المهندسين</p>
                                <p class="mb-1">Tel No: 011111111</p>
                                <p class="mb-0">Email: Hospital@gmail.com</p>
                            </div>
                        </div><div class="table-responsive mg-t-40">
                            <table class="table table-invoice border text-md-nowrap mb-0">
                                <thead>
                                    <tr>
                                        <th class="wd-20p">#</th>
                                        <th class="wd-40p">ملاحظات</th>
                                        <th class="tx-center">المبلغ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td class="tx-12">{{ $receipt->description }}</td>
                                        <td class="tx-center">{{ number_format($receipt->amount, 2) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row mg-t-30">
                            <div class="col-md">
                                <p class="tx-gray-600">تفاصيل الدفع</p>
                                <div class="row row-xs">
                                    <div class="col-md-6">
                                        <p class="invoice-info-row"><span>المبلغ المستلم (رقماً)</span> <span>{{ number_format($receipt->amount, 2) }} ريال يمني</span></p>
                                    </div>
                                    {{-- <div class="col-md-6">
                                        <p class="invoice-info-row"><span>المبلغ المستلم (كتابةً)</span> <span>{{ convertNumberToArabicWordsWithCurrency($receipt->amount) ?? '---' }}</span></p>
                                    </div> --}}
                                </div>
                                <p class="invoice-info-row"><span>طريقة الدفع</span> <span>نقد</span></p>

                            </div>
                        </div>
                        <hr class="mg-b-40">
                        <div class="row row-sm mt-4">
                            <div class="col-md-6">
                                <p class="tx-gray-600">توقيع المستلم</p>
                                <div class="signature-line">
                                    <br>
                                    (<span id="receiver-name">___</span>)
                                </div>
                            </div>
                            <div class="col-md-6 text-end">
                                <p class="tx-gray-600">توقيع المريض (أو ولي الأمر)</p>
                                <div class="signature-line">
                                    <br>
                                </div>
                            </div>
                        </div>
                        <hr class="mg-b-40">
                        <a href="#" class="btn btn-success float-left mt-3 mr-2" id="print_Button" onclick="printDiv()">
                            <i class="mdi mdi-printer ml-1"></i>طباعة السند
                        </a>
                    </div>
                </div>
            </div>
        </div></div>
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!--Internal  Chart.bundle js -->
    <script src="{{URL::asset('Admin/assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>


    <script type="text/javascript">
        function printDiv() {
            var printContents = document.getElementById('print').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        }
    </script>
@endsection
