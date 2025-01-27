<!-- Modal -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('Services.edit_Service')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('services.update','t') }}" method="post" autocomplete="off">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <label for="name">{{__('Services.name')}}</label>
                    <input type="text" name="name" id="name" class="form-control" required ><br>

                    <label for="price">{{__('Services.price')}}</label>
                    <input type="number" name="price" id="price" class="form-control" required ><br>

                    <input type="hidden" name="service_id" id="service_id" class="form-control" required ><br>

                    <label for="description">{{__('Services.description')}}</label>
                    <textarea class="form-control" name="description" id="description" rows="5"></textarea>

                    <div class="form-group">
                        <label for="status">{{ __('doctors_trans.Status') }}</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="" selected disabled>--{{ __('doctors_trans.Choose') }}--</option>
                            <option value="1">{{ __('doctors_trans.Enabled') }}</option>
                            <option value="0">{{ __('doctors_trans.Not_enabled') }}</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Dashboard/section_trans.Close')}}</button>
                    <button type="submit" class="btn btn-primary">{{__('Dashboard/section_trans.submit')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
