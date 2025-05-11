<div>
   <a class="btn btn-primary pull-right" href="{{ route('create-group-invoice') }}" >اضافة فاتورة جديدة </a><br><br>
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
        <tbody>
        @foreach ($group_invoices as $group_invoice)
            <tr>
                <td>{{ $loop->iteration}}</td>
                <td>{{ $group_invoice->Group->name }}</td>
                <td>{{ $group_invoice->Patient->name }}</td>
                <td>{{ $group_invoice->invoice_date }}</td>
                <td>{{ $group_invoice->Doctor->name }}</td>
                <td>{{ $group_invoice->Section->name }}</td>
                <td>{{ number_format($group_invoice->price, 2) }}</td>
                <td>{{ number_format($group_invoice->discount_value, 2) }}</td>
                <td>{{ $group_invoice->tax_rate }}%</td>
                <td>{{ number_format($group_invoice->tax_value, 2) }}</td>
                <td>{{ number_format($group_invoice->total_with_tax, 2) }}</td>
                <td>{{ $group_invoice->type == 1 ? 'نقدي':'اجل' }}</td>
                <td>
                     <a href="{{ route('update-group-invoice', $group_invoice->id) }}"
                                    class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_invoice" wire:click="delete({{ $group_invoice->id }})" ><i class="fa fa-trash"></i></button>
                    <a href="{{route('print-group-invoice',$group_invoice->id)}}" class="btn btn-success btn-sm" target="_blank" title="طباعه فاتورة مجموهة خدمات">
                                                    <i class="fas fa-print"></i>
                                                </a>
                </td>
            </tr>

        @endforeach
    </table>



   <div wire:ignore.self class="modal" id="delete_invoice">
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
                        <input type="hidden" name="invoice_id" id="invoice_id">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ __('Dashboard/section_trans.Close') }}</button>
                        <button type="submit"
                        wire:click.prevent="DeleteInvoice()"
                            class="btn btn-danger">{{ __('Dashboard/section_trans.submit') }}</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>

