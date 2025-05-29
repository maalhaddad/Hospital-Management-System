<!-- Modal -->
<div class="modal fade" id="edit_employees" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تعديل بيانات موظف</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('ray-employees.update','null') }}" method="post">
                @method('PUT')
                @csrf

                <input type="hidden" id="emp_id"  name="employee_id">
                <div class="modal-body">
                    <label for="exampleInputPassword1">الاسم</label>
                    <input type="text" id="name" name="name" class="form-control"><br>

                    <label for="exampleInputPassword1">البريد الالكتروني</label>
                    <input type="email" id="email" name="email" class="form-control"><br>

                    <label for="exampleInputPassword1">كلمة المرور</label>
                    <input type="password" name="password" class="form-control" autocomplete="new-password">
                </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Dashboard/section_trans.Close')}}</button>
                    <button type="submit" class="btn btn-primary">{{__('Dashboard/section_trans.submit')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
