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
{{--<script src="https://cdn.ckeditor.com/ckeditor5/32.0.0/classic/ckeditor.js"></script>--}}

@section('content')
    <div class="card-header p-3 pb-0">
        <div class="row mb-3">
            <div  style="float: right;display: inline-block" class="col-6">
                <h6 class="mb-0">الاعدادات العامة</h6>
            </div>
        </div>

    </div>

    <div class="container rounded bg-white mt-5" style="direction:rtl;box-shadow: 0px 4px 10px #00000030 ; border-radius: 10px">
        <div class="row">
            <div class="col-md-12">
                <div class="p-3 py-5">
                    <form action="{{route('update_setting')}}" id="profile" method="post">
                        @csrf
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            {{--                        <div class="d-flex flex-row align-items-center back"><i class="fa fa-long-arrow-left mr-1 mb-1"></i>--}}
                            {{--                            <h6>Back to home</h6>--}}
                            {{--                        </div>--}}
                            <h6 class="text-right">الاعدادات العامة</h6>
                        </div>
                        <div class="form-group m-form__group row">
                            <label for="example-text-input"  class="col-3 col-form-label">الضريبة</label>
                            <div class="col-8">
                                <input class="form-control m-input"  name="tax_percentage" type="number" value="{{$setting->tax_percentage}}" >
                            </div>
                        </div>
{{--                        <div class="form-group m-form__group row">--}}
{{--                            <label for="example-text-input"  class="col-3 col-form-label">لكل</label>--}}
                            <div class="form-group m-form__group row">
                                <label class="col-3 col-form-label"> لكل : </label>
                                <div class="d-flex align-items-center col-8" >
                                    <div class="form-check m-0 ">
                                        <input class="form-check-input" type="radio" name="tax_for" value="order" id="home" {{$setting->tax_for == 'order'?'checked':''}}>
                                        <label class="form-check-label ms-2" for="home">
                                            طلب
                                        </label>
                                    </div>
                                    <div class="form-check m-0  ms-3" style="margin-right: 30px!important">
                                        <input class="form-check-input" type="radio" name="tax_for" value="product" id="branch" {{$setting->tax_for == 'product'?'checked':''}}>
                                        <label class="form-check-label ms-2" for="branch">
                                            منتج
                                        </label>
                                    </div>
                                </div>
                            </div>
{{--                            <div class="col-8">--}}
{{--                                <input class="form-control m-input"  name="tax_percentage" type="number" value="{{$slider->tax_percentage}}" >--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-3 col-form-label">الشروط والاحكام</label>
                            <div class="col-8">
                                <textarea name="terms" id="terms">{{$setting->terms}}</textarea>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-3 col-form-label">من نحن</label>
                            <div class="col-8">
                                <textarea name="about" id="about">{{$setting->about}}</textarea>
                            </div>
                        </div>

                        <div class="mt-5 text-right"><button class="btn btn-primary profile-button" type="submit">حفظ التغيرات</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>






@endsection

@push('admin_js')
{{--    <script src="https://cdn.ckeditor.com/ckeditor5/32.0.0/classic/ckeditor.js"></script>--}}


{{--<script>--}}
{{--    CKEDITOR.config.startupMode = 'source';--}}
{{--    CKEDITOR.replace('insdescription1');--}}
{{--</script>--}}
{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>--}}

<script src="//cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>

<script>
    CKEDITOR.config.contentsLangDirection = 'rtl';
    CKEDITOR.replace( 'terms' );
    CKEDITOR.replace( 'about' );
</script>
{{--    <script src="https://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>--}}
{{--    <script>--}}
{{--        var data = CKEDITOR.instances.editor1.getData();--}}

{{--        // Your code to save "data", usually through Ajax.--}}
{{--    </script>--}}

@endpush
