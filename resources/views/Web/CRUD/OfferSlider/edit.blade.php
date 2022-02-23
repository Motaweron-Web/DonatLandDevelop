
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">تعديل</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<form id="update_offerSlider" action="{{aurl('offerSlider/update')}}" enctype="multipart/form-data">
    <div class="modal-body">
        <input type="hidden" value="{{$data->id}}" name="id">
        <div class="form-group m-form__group row">
            <label for="example-text-input" class="col-3 col-form-label">الصورة</label>
            <div class="col-8">
                <input type="file" name="image"  id="input-file-now-custom-1" class="dropify" style="border-radius: 20px"
                       data-default-file="{{get_file($data->image)}}" >
            </div>
        </div>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">الغاء</button>
        <button type="submit" class="btn btn-primary">تاكيد</button>
    </div>
</form>
