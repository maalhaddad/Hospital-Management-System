<div>

    {{-- <button class="btn btn-primary pull-right" wire:click="show_form_add" type="button">اضافة فاتورة جديدة </button> --}}
    {{-- @if ($InvoiceUpdated)
         <div class="alert alert-info">تم تعديل البيانات بنجاح.</div>
     @endif --}}
    <a href="{{ route('create-invoice') }}" class="btn btn-primary pull-right">إضافة فاتورة جديده</a>
    <br><br>

    <div class="table-responsive">
        <table class="table text-md-nowrap" id="example1" data-page-length="50"style="text-align: center">
            <thead>
                <tr>
                    <th>#</th>
                    <th>اسم الخدمة</th>
                    <th>اسم المريض</th>
                    <th>تاريخ الفاتورة</th>
                    <th>اسم الدكتور</th>
                    <th>القسم</th>
                    <th>سعر الخدمة</th>
                    <th>قيمة الخصم</th>
                    <th>نسبة الضريبة</th>
                    <th>قيمة الضريبة</th>
                    <th>الاجمالي مع الضريبة</th>
                    <th>نوع الفاتورة</th>
                    <th>العمليات</th>
                </tr>
            </thead>

            @if (isset($single_invoices))

                <tbody>

                    @foreach ($single_invoices as $single_invoice)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $single_invoice->Service->name }}</td>
                            <td>{{ $single_invoice->Patient->name }}</td>
                            <td>{{ $single_invoice->invoice_date }}</td>
                            <td>{{ $single_invoice->Doctor->name }}</td>
                            <td>{{ $single_invoice->Section->name }}</td>
                            <td>{{ number_format($single_invoice->price, 2) }}</td>
                            <td>{{ number_format($single_invoice->discount_value, 2) }}</td>
                            <td>{{ $single_invoice->tax_rate }}%</td>
                            <td>{{ number_format($single_invoice->tax_value, 2) }}</td>
                            <td>{{ number_format($single_invoice->total_with_tax, 2) }}</td>
                            <td>{{ $single_invoice->type == 1 ? 'نقدي' : 'اجل' }}</td>
                            <td>
                                <a href="{{ route('update-invoice', $single_invoice->id) }}"
                                    class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                {{-- <button wire:click="editInvoice" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button> --}}
                                {{-- <button type="button" wire:click="delete({{ $single_invoice->id }})" class="btn btn-danger btn-sm" data-toggle="modal"  data-target="#delete_invoice"><i class="fa fa-trash"></i></button> --}}
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_invoice" wire:click="delete({{ $single_invoice->id }})" ><i class="fa fa-trash"></i></button>

                            </td>
                        </tr>
                    @endforeach

                </tbody>
            @endif

        </table>
    </div>

     <div class="modal" id="delete_invoice">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">{{ __('doctors_trans.delete_doctor') }}</h6><button aria-label="Close"
                        class="close" data-dismiss="modal" type="button"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <form wire:submit.prevent="DeleteInvoice">
                    @method('delete')
                    @csrf
                    <div class="modal-body">
                        <p>{{ __('sections_trans.Warning') }}</p><br>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ __('Dashboard/section_trans.Close') }}</button>
                        <button type="submit"
                            class="btn btn-danger">{{ __('Dashboard/section_trans.submit') }}</button>
                    </div>
            </div>
            </form>
        </div>
    </div>



</div>

