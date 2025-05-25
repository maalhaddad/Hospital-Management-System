<!-- Modal -->
<div class="modal fade" id="delete_xray" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div {{-- class="modal-dialog"  --}} class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">حذف بيانات الاشعة</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('Rays.destroy','null') }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <input type="hidden" name="ray_id" id="ray_id">


                    <div class="form-group">

                    <p class="h5 text-danger"> هل انت متاكد من حذف بيانات الاشعة ؟ </p>
                    <input class="form-control" id="description" name="description" readonly>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Dashboard/section_trans.Close')}}</button>
                    <button type="submit" class="btn btn-danger">{{__('Dashboard/section_trans.submit')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
