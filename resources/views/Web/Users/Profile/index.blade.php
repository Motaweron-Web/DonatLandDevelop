@extends('Web.layouts.inc.app')
@section('title1')
    البروفايل
@endsection
@push('admin_css')
    <style>
    body {
        background: #BA68C8
    }

    .form-control:focus {
        box-shadow: none;
        border-color: #BA68C8
    }

    .profile-button {
        background: #BA68C8;
        box-shadow: none;
        border: none
    }

    .profile-button:hover {
        background: #682773
    }

    .profile-button:focus {
        background: #682773;
        box-shadow: none
    }

    .profile-button:active {
        background: #682773;
        box-shadow: none
    }

    .back:hover {
        color: #682773;
        cursor: pointer
    }
</style>
@endpush
@section('content')
    <br>
    <br>


{{--    <div class="m-content">--}}
{{--        <div class="row">--}}
{{--            <div class="col-xl-3 col-lg-4">--}}
{{--                <div class="m-portlet m-portlet--full-height  ">--}}
{{--                    <div class="m-portlet__body">--}}
{{--                        <div class="m-card-profile text-center">--}}
{{--                            <div class="m-card-profile__title m--hide">--}}
{{--                                ملفك الشخصى--}}
{{--                            </div>--}}
{{--                            <div class="m-card-profile__pic">--}}
{{--                                <div class="m-card-profile__pic-wrapper">--}}
{{--                                    <img width="120px" height="120px" style="border-radius: 50%" src="{{get_file(admin()->user()->image)}}" alt="{{admin()->user()->name}}">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="m-card-profile__details">--}}
{{--                                <span class="m-card-profile__name">{{admin()->user()->name_ar}}</span>--}}
{{--                                <a href="" class="m-card-profile__email m-link">{{admin()->user()->email}}</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-xl-9 col-lg-8">--}}
{{--                <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">--}}

{{--                        <div class="tab-pane active" id="m_user_profile_tab_1">--}}
{{--                            <form class=""  action="{{route('update_profile')}}" method="post" enctype="multipart/form-data">--}}
{{--                                @csrf--}}
{{--                                <div class="m-portlet__body">--}}
{{--                                    <div class="form-group m-form__group m--margin-top-10 m--hide">--}}
{{--                                        <div class="alert m-alert m-alert--default" role="alert">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group m-form__group row">--}}
{{--                                        <div class="col-10 ml-auto">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group m-form__group row">--}}
{{--                                        <label for="example-text-input" class="col-2 col-form-label">الإسم</label>--}}
{{--                                        <div class="col-7">--}}
{{--                                            <input class="form-control m-input" required name="name" type="text" value="{{admin()->user()->name}}" >--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group m-form__group row">--}}
{{--                                        <label for="example-text-input"  class="col-2 col-form-label">البريد الإلكترونى</label>--}}
{{--                                        <div class="col-7">--}}
{{--                                            <input class="form-control m-input" required name="email" type="text" value="{{admin()->user()->email}}">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group m-form__group row">--}}
{{--                                        <label for="example-text-input" class="col-2 col-form-label">رقم الهاتف</label>--}}
{{--                                        <div class="col-7">--}}
{{--                                            <input class="form-control m-input" required name="phone" type="number" value="{{admin()->user()->phone}}">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group m-form__group row">--}}
{{--                                        <label for="example-text-input" class="col-2 col-form-label">كلمة السر</label>--}}
{{--                                        <div class="col-7">--}}
{{--                                            <input class="form-control m-input"  name="password" type="password" placeholder="*******">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group m-form__group row">--}}
{{--                                        <label for="example-text-input" class="col-2 col-form-label">الصورة</label>--}}
{{--                                        --}}{{--                                        <div class="col-7">--}}
{{--                                                                                    <input type="file" name="image"  id="input-file-now-custom-1" class="dropify" style="border-radius: 20px"--}}
{{--                                                                                           data-default-file="{{get_file(admin()->user()->image)}}" >--}}
{{--                                        --}}{{--                                        </div>--}}

{{--                                        <div class="col-lg-8">--}}
{{--                                            <!--begin::Image input-->--}}
{{--                                            <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url({{url('admin')}}/assets/media/avatars/blank.png)">--}}
{{--                                                <!--begin::Preview existing avatar-->--}}
{{--                                                <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{get_file(admin()->user()->image)}})"></div>--}}
{{--                                                <!--end::Preview existing avatar-->--}}
{{--                                                <!--begin::Label-->--}}
{{--                                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="تغيير الصورة">--}}
{{--                                                    <i class="bi bi-pencil-fill fs-7"></i>--}}
{{--                                                    <!--begin::Inputs-->--}}
{{--                                                    <input type="file" name="image" accept=".png, .jpg, .jpeg" />--}}
{{--                                                    <input type="hidden" name="avatar_remove" />--}}
{{--                                                    <!--end::Inputs-->--}}
{{--                                                </label>--}}
{{--                                                <!--end::Label-->--}}
{{--                                                <!--begin::Cancel-->--}}
{{--                                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">--}}
{{--                                            <i class="bi bi-x fs-2"></i>--}}
{{--                                        </span>--}}
{{--                                                <!--end::Cancel-->--}}
{{--                                                <!--begin::Remove-->--}}
{{--                                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">--}}
{{--                                            <i class="bi bi-x fs-2"></i>--}}
{{--                                        </span>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-text">انواع الملفات المتاحة : png, jpg, jpeg.</div>--}}
{{--                                        </div>--}}

{{--                                    </div>--}}




{{--                                </div>--}}
{{--                                <div class="m-portlet__foot m-portlet__foot--fit">--}}
{{--                                    <div class="m-form__actions">--}}
{{--                                        <div class="row">--}}
{{--                                            <div class="col-2">--}}
{{--                                            </div>--}}
{{--                                            <div class="col-7 text-center">--}}
{{--                                                <button type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom col-5">حفظ</button>&nbsp;&nbsp;--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                        <div class="tab-pane " id="m_user_profile_tab_2">--}}
{{--                        </div>--}}
{{--                        <div class="tab-pane " id="m_user_profile_tab_3">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}








    <div class="container rounded bg-white mt-5" style="direction:rtl;box-shadow: 0px 4px 10px #00000030 ; border-radius: 10px">
        <div class="row">
            <div class="col-md-4 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
{{--                    <img class="rounded-circle mt-5" src="{{get_file(admin()->user()->image)}}" width="90" height="90">--}}
                    <span class="font-weight-bold">{{admin()->user()->name}}</span>
                    <span class="text-black-50">{{admin()->user()->email}}</span><span>{{admin()->user()->phone}}</span></div>
            </div>
            <div class="col-md-8">
                <div class="p-3 py-5">
                    <form action="{{route('update_profile')}}" id="profile" method="post">
                        @csrf
                        <div class="d-flex justify-content-between align-items-center mb-3">
    {{--                        <div class="d-flex flex-row align-items-center back"><i class="fa fa-long-arrow-left mr-1 mb-1"></i>--}}
    {{--                            <h6>Back to home</h6>--}}
    {{--                        </div>--}}
                            <h6 class="text-right">تعديل الملف الشخصى</h6>
                        </div>
                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-3 col-form-label">الإسم</label>
                            <div class="col-8">
                                <input class="form-control m-input"  name="name" type="text" value="{{admin()->user()->name}}" >
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label for="example-text-input"  class="col-3 col-form-label">البريد الإلكترونى</label>
                            <div class="col-8">
                                <input class="form-control m-input"  name="email" type="email" value="{{admin()->user()->email}}">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-3 col-form-label">رقم الهاتف</label>
                            <div class="col-8">
                                <input class="form-control m-input"  name="phone" type="number" value="{{admin()->user()->phone}}">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-3 col-form-label">كلمة السر</label>
                            <div class="col-8">
                                <input class="form-control m-input"  name="password" type="password" placeholder="*******">
                            </div>
                        </div>
{{--                        <div class="form-group m-form__group row">--}}
{{--                            <label for="example-text-input" class="col-3 col-form-label">الصورة</label>--}}
{{--                            <div class="col-8">--}}
{{--                                <input type="file" name="image"  id="input-file-now-custom-1" class="dropify" style="border-radius: 20px"--}}
{{--                                       data-default-file="{{get_file(admin()->user()->image)}}" >--}}
{{--                            </div>--}}
{{--                        </div>--}}

    {{--                    <div class="row mt-2">--}}
    {{--                        <div class="col-md-12">--}}
{{--                                <input type="text" name="name" class="form-control" placeholder="الإسم ..." value="{{admin()->user()->name}}">--}}
    {{--                        </div>--}}
    {{--                        <div class="col-md-12"><input type="text" name="email" class="form-control" placeholder="البريد الالكترونى ..." value="{{admin()->user()->email}}"></div>--}}
    {{--                        <div class="col-md-12"><input type="text" name="phone" class="form-control" value="{{admin()->user()->phone}}" placeholder="رقم الهاتف ..."></div>--}}
    {{--                        <div class="col-md-12"><input type="password" name="password" class="form-control" value="******" placeholder="كلمة المرور ..."></div>--}}
    {{--                    </div>--}}

                        <div class="mt-5 text-right"><button class="btn btn-primary profile-button" type="submit">حفظ التغيرات</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>






@endsection
@push('admin_js')
    <script>
    $("form#profile").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        var url = $('#profile').attr('action');
        $.ajax({
            url:url,
            type: 'POST',
            data: formData,
            success: function (data) {
                if (data.status == 200){
                    toastr.success('تم تعديل البيانات بنجاح');
                }
                if (data.status == 422){
                    $.each(data.message, function(key, value) {
                        toastr.error(value);
                    })
                }

            },
            error: function (data) {
                if (data.status === 500) {
                    toastr.error('هناك خطأ ما');
                }
                if (data.status === 422) {
                    var errors = $.parseJSON(data.responseText);
                    $.each(errors, function (key, value) {
                        if ($.isPlainObject(value)) {
                            $.each(value, function (key, value) {
                                toastr.error(value,key);
                            });

                        } else {

                        }
                    });
                }
            },//end error method

            cache: false,
            contentType: false,
            processData: false
        });
    });

</script>
@endpush
