<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">اضافة موظف جديد</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('ray-employees.store') }}" method="post" autocomplete="off">
                @csrf
                <div class="modal-body">
                    <label for="exampleInputPassword1">الاسم</label>
                    <input type="text" name="name" class="form-control"><br>

                    <label for="exampleInputPassword1">البريد الالكتروني</label>
                    <input type="email" name="email" class="form-control"><br>

                    <label for="exampleInputPassword1">كلمة المرور</label>
                    <input type="password" name="password" class="form-control"><br>

                </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Dashboard/section_trans.Close')}}</button>
                    <button type="submit" class="btn btn-primary">{{__('Dashboard/section_trans.submit')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
