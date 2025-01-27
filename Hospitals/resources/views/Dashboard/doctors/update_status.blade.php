<div class="modal" id="update_status">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">{{ __('doctors_trans.Status_change') }}</h6><button aria-label="Close"
                    class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('doctors.update-status') }}" method="post">
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                        <label for="status">{{ __('doctors_trans.Status') }}</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="" selected disabled>--{{ __('doctors_trans.Choose') }}--</option>
                            <option value="1">{{ __('doctors_trans.Enabled') }}</option>
                            <option value="0">{{ __('doctors_trans.Not_enabled') }}</option>
                        </select>
                    </div>
                    <input type="hidden" name="doctor_id" id="doctor_id" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">{{ __('Dashboard/section_trans.Close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('Dashboard/section_trans.submit') }}</button>
                </div>
        </div>
        </form>
    </div>
</div>
