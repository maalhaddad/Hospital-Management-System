<!-- Modal -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تعديل بيانات موظف</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('laboratorie-employees.update', 'n') }}" method="post">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="employee_id" id="employee_id" class="form-control" required ><br>
                    <label for="exampleInputPassword1">الاسم</label>
                    <input type="text" value="" id="name" name="name" class="form-control"><br>

                    <label for="exampleInputPassword1">البريد الالكتروني</label>
                    <input type="email" value="" id="email" name="email" class="form-control"><br>

                    <label for="exampleInputPassword1">كلمة المرور</label>
                    <input type="password" name="password" class="form-control" autocomplete="new-password">

                     <div class="form-group">
                        <label for="password_confirmation">{{ __('doctors_trans.confirm_password') }}</label>
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
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
