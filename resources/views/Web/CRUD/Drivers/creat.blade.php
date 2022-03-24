
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">اضافة جديد</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<form id="add_driver" action="{{aurl('drivers/new')}}" enctype="multipart/form-data">
    <div class="modal-body">
        <div class="mb-3">
            <label for="photo" class="col-form-label">الصورة:</label>
            <input type="file" id="photo" name="photo" class="dropify form-control" data-default-file="اسحب صورة هنا او اضغط للانتقال للملفات" data-height="220" />  {{--multiple--}}
        </div>
        <div class="mb-3">
            <label for="recipient-name" class="col-form-label">الاسم:</label>
            <input type="text" class="form-control" name="name" id="recipient-name">
        </div>
        <div class="mb-3">
            <label for="recipient-password" class="col-form-label">كلمة المرور:</label>
            <input type="password" class="form-control" name="password" id="recipient-password">
        </div>
{{--        <div class="mb-3">--}}
{{--            <label for="message-text" class="col-form-label">Message:</label>--}}
{{--            <textarea class="form-control" id="message-text"></textarea>--}}
{{--        </div>--}}
    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">الغاء</button>
    <button type="submit" class="btn btn-primary">تاكيد</button>
</div>
</form>
