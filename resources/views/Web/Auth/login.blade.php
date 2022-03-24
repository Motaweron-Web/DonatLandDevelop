@section('title')
    تسجيل الدخول
    @endsection
    <!DOCTYPE html>
    <html>

    <head>
        {{--=============== css =============--}}
        @include('Web.layouts.assets.css')
        @include('Web.Auth.layout.css')
        {{--=============== css =============--}}


    </head>

    <body style="direction: rtl">
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
            </div>
        </div>
    </div>
    <main class="main-content main-content-bg mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                            <div class="card card-plain mt-8">
                                <div class="card-header pb-0 text-end">
                                    <h3 class="font-weight-bolder text-info text-gradient">أهلا بك</h3>
                                    <p class="mb-0">قم بإدخال بياناتك لتسجيل الدخول</p>
                                </div>
                                <div class="card-body">
                                    <form role="form" action="{{route('submit.login')}}" id="LoginForm" class="text-end">
                                        @csrf
                                        <label>اسم المستخدم</label>
                                        <div class="mb-3">
                                            <input type="text" class="form-control" required name="name" placeholder="اسم المستخدم" aria-label="اسم المستخدم">
                                        </div>
                                        <label>كلمة المرور</label>
                                        <div class="mb-3">
                                            <input type="password" class="form-control" required placeholder="كلمة المرور" name="password" aria-label="كلمة المرور">
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" name="remember_me" value="0" checked type="checkbox" id="rememberMe" >
                                            <label class="form-check-label" for="rememberMe">تذكرنى</label>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" id="loginButton" class="btn bg-gradient-info w-100 mt-4 mb-0"><i id="lockId" class="fa fa-lock" style="margin-left: 6px"></i> تسجيل الدخول</button>
                                        </div>
                                    </form>
                                </div>

                            </div>

                            <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
                            <footer class="footer py-5">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-8 mx-auto text-center mt-1">
                                            <p class="mb-0 text-secondary">
                                                Copyright © <script>
                                                    document.write(new Date().getFullYear())
                                                </script>
{{--                                                Soft by {{$setting->developed_by}}.--}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </footer>
                            <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->


                        </div>
                        <div class="col-md-6">
                            <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('{{url('assets/img/login_banner.jpg')}}')"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>


    {{--=============== js =============--}}
    @include('Web.layouts.assets.js')
    {{--=============== js =============--}}
    <script>
        $("form#LoginForm").submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            var url = $('#LoginForm').attr('action');
            $.ajax({
                url:url,
                type: 'POST',
                data: formData,
                beforeSend: function(){
                    $('#loginButton').html('<span class="spinner-border spinner-border-sm mr-2" ' +
                        ' ></span> <span style="margin-left: 4px;">جارى العمل</span>').attr('disabled', true);

                },
                complete: function(){


                },
                success: function (data) {
                    if (data == 200){
                        toastr.success('تم تسجيل الدخول');
                        window.setTimeout(function() {
                            // window.location.href= 'admin/';
                            window.location.reload();
                        }, 1000);
                    }else {
                        toastr.error('كلمة المرور خاطئة');
                        $('#loginButton').html(`<i id="lockId" class="fa fa-lock" style="margin-left: 6px"></i> تسجيل الدخول`).attr('disabled', false);
                    }

                },
                error: function (data) {
                    if (data.status === 500) {
                        $('#loginButton').html(`<i id="lockId" class="fa fa-lock" style="margin-left: 6px"></i> تسجيل الدخول`).attr('disabled', false);
                        toastr.error('هناك خطأ ما');
                    }
                    if (data.status === 422) {
                        $('#loginButton').html(`<i id="lockId" class="fa fa-lock" style="margin-left: 6px"></i> تسجيل الدخول`).attr('disabled', false);
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

    </body>

    </html>
