<!-- Modal -->
<div class="modal fade" id="add_Laboratorie" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div {{-- class="modal-dialog"  --}} class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تحويل الى المختبر</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('Laboratorie.store') }}" method="POST">
                @csrf
                <div class="modal-body">

                    <input type="hidden" name="invoice_id" id="invoice_id">
                    <input type="hidden" name="patient_id" id="patient_id">
                    <input type="hidden" name="doctor_id" id="doctor_id">


                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">المطلوب</label>
                        <textarea class="form-control" name="description" rows="6"></textarea>
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
