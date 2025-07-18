<!-- Modal -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">حذف بيانات موظف</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('laboratorie-employees.destroy', 'd') }}" method="post">
               @method('DELETE')
               @csrf

                <input type="hidden" name="d" id="id" class="form-control" required ><br>
            <div class="modal-body">
                <h5>{{trans('Dashboard/sections_trans.Warning')}} .....</h5>
            </div>
            <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Dashboard/section_trans.Close')}}</button>
                    <button type="submit" class="btn btn-primary">{{__('Dashboard/section_trans.submit')}}</button>
            </div>
            </form>
        </div>
    </div>
</div>