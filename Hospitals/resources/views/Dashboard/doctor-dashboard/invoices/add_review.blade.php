<!-- Modal -->
<div class="modal fade" id="add_review" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div
     {{-- class="modal-dialog"  --}}
     class="modal-dialog modal-dialog-centered"
     role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تحديد مراجعة المريض</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('Diagnostics.add_review')}}" method="post">
            @csrf
            {{-- @method('POST') --}}
            <div class="modal-body">

                <input type="hidden" name="invoice_id"  id="invoice_id">
                <input type="hidden" name="patient_id" id="patient_id"  >
                <input type="hidden" name="doctor_id" id="doctor_id">

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">التشخيص</label>
                    <textarea class="form-control" name="diagnosis" rows="6"></textarea>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">الادوية</label>
                    <textarea class="form-control" name="medicine" rows="6"></textarea>
                </div>

                 <div class="form-group" style="position:relative;">
                    <label>تاريخ المراجعة</label>
                    <input class="form-control fc-datepicker" id="review_date" name="review_date" type="text" required>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                <button type="submit" class="btn btn-primary">حفظ البيانات</button>
            </div>
            </form>
        </div>
    </div>
</div>
