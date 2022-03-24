
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">تعديل</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<form id="update_admin" action="{{aurl('admins/update')}}" enctype="multipart/form-data">
    <div class="modal-body">
        <input type="hidden" value="{{$admin->id}}" name="id">
        <div class="form-group m-form__group row">
            <label for="example-text-input" class="col-3 col-form-label">الإسم</label>
            <div class="col-8">
                <input class="form-control m-input"  name="name" type="text" value="{{$admin->name}}" >
            </div>
        </div>
        <div class="form-group m-form__group row">
            <label for="example-text-input" class="col-3 col-form-label">اسم الشركة</label>
            <div class="col-8">
                <input class="form-control m-input"  name="company_name" type="text" value="{{$admin->company_name}}" >
            </div>
        </div>
        <div class="form-group m-form__group row">
            <label for="example-text-input"  class="col-3 col-form-label">البريد الإلكترونى</label>
            <div class="col-8">
                <input class="form-control m-input"  name="email" type="email" value="{{$admin->email}}">
            </div>
        </div>
        <div class="form-group m-form__group row">
            <label for="example-text-input" class="col-3 col-form-label">رقم الهاتف</label>
            <div class="col-8">
                <input class="form-control m-input"  name="phone" type="number" value="{{$admin->phone}}">
            </div>
        </div>
        <div class="form-group m-form__group row">
            <label for="example-text-input" class="col-3 col-form-label">كلمة السر</label>
            <div class="col-8">
                <input class="form-control m-input"  name="password" type="password" placeholder="*******">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">الغاء</button>
        <button type="submit" class="btn btn-primary">تاكيد</button>
    </div>
</form>
