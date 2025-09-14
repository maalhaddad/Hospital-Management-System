<!-- Deleted insurance -->
<div class="modal" id="approval_update" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تاكيد موعد المريض</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('Appointments.update','t') }}" method="post">
                    @method('PUT')
                    @csrf
                    <input type="text" id="id_app" name="id">
                    <p class="mg-b-20" id="name_app" ></p>
                    <!--div-->
                    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                    <div class="input-group col-md-12">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
                                            </div>
                                        </div>
                                        {{-- <input class="form-control" name="appointment" id="datetimepicker" type="text" value="{{date('Y-m-d H:i')}}"> --}}
                                        <input type="text" class="form-control fc-datepicker" id="review_date" name="appointment" value="{{date('Y-m-d H:i')}}"  required>
                                    </div>

                            </div>
                        </div>
                    </div>
                    <!--/div-->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{ trans('insurance.close') }}</button>
                        <button class="btn btn-success">{{ trans('insurance.save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
