<div>

 @if($InvoiceSaved)

    <div class="alert alert-info">تم حفظ البيانات بنجاح.</div>
 @endif
     <form wire:submit.prevent="{{ $functionName }}" autocomplete="off">
                 @csrf
                 <div class="row">
                     <div class="col">
                         <label>اسم المريض</label>
                         <select wire:model="invoice.patient_id" class="form-control" required>
                             <option value=""  >-- اختار من القائمة --</option>
                             @foreach($Patients as $Patient)
                                 <option value="{{$Patient->id}}">{{$Patient->name}}</option>
                             @endforeach
                         </select>
                     </div>


                     <div class="col">
                         <label>اسم الدكتور</label>
                         <select wire:model="invoice.doctor_id"  wire:change="get_section" class="form-control"  id="exampleFormControlSelect1" required>
                             <option value="" >-- اختار من القائمة --</option>
                             @foreach($Doctors as $Doctor)
                                 <option value="{{$Doctor->id}}">{{$Doctor->name}}</option>
                             @endforeach
                         </select>
                     </div>


                     <div class="col">
                         <label>القسم</label>
                         <input wire:model="invoice.section" type="text"  class="form-control" readonly >
                     </div>

                     <div class="col">
                         <label>نوع الفاتورة</label>
                         <select {{ $selectType }} wire:model="invoice.type" class="form-control">
                             <option value="" >-- اختار من القائمة --</option>
                             <option value="1">نقدي</option>
                             <option value="2">اجل</option>
                         </select>
                     </div>


                 </div><br>

                 <div class="row row-sm">
                     <div class="col-xl-12">
                         <div class="card">
                             <div class="card-header pb-0">
                                 <div class="d-flex justify-content-between">
                                     <h4 class="card-title mg-b-0"></h4>
                                 </div>
                             </div>
                             <div class="card-body">
                                 <div class="table-responsive">
                                     <table class="table table-striped mg-b-0 text-md-nowrap" style="text-align: center">
                                         <thead>
                                         <tr>
                                             <th>#</th>
                                             <th>اسم الخدمة</th>
                                             <th>سعر الخدمة</th>
                                             <th>قيمة الخصم</th>
                                             <th>نسبة الضريبة</th>
                                             <th>قيمة الضريبة</th>
                                             <th>الاجمالي مع الضريبة</th>
                                         </tr>
                                         </thead>
                                         <tbody>
                                         <tr>
                                             <th scope="row">1</th>
                                             <td>
                                                 <select wire:model="invoice.group_id" class="form-control" wire:change="get_price" id="exampleFormControlSelect1">
                                                     <option value="">-- اختار الخدمة --</option>
                                                     @foreach($GroupServices as $Service)
                                                         <option value="{{$Service->id}}">{{$Service->name}}</option>
                                                     @endforeach
                                                 </select>
                                             </td>
                                             <td><input wire:model="invoice.price" type="text" class="form-control" readonly></td>
                                             <td><input wire:model="invoice.discount_value"  type="text" readonly class="form-control"></td>
                                             <th><input wire:model="invoice.tax_rate" type="text" class="form-control"  readonly ></th>
                                             <td><input type="text" wire:model="invoice.tax_value" class="form-control" value="{{ $subTotal }}" readonly ></td>
                                             <td><input type="text"  wire:model= "invoice.total_with_tax" class="form-control"  readonly ></td>
                                         </tr>
                                         </tbody>
                                     </table>
                                 </div><!-- bd -->
                             </div><!-- bd -->
                         </div><!-- bd -->
                     </div>
                 </div>

                 <input class="btn btn-outline-success" type="submit" value="تاكيد البيانات">
             </form>

     {{-- @endif --}}

</div>

