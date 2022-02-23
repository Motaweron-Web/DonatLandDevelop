@extends('Web.layouts.inc.app')
@section('title1')
    سلايدر الرئيسية
@endsection
{{--@section('title2')--}}
{{--     عرض سلايدر الرئيسية--}}
{{--@endsection--}}
@section('content')
    <style>
        img:hover{
            transform: scale(3)
        }
    </style>
    <div class="row">
    <div class=" col-12">
        <div class="card">
            <div class="card-header p-3 pb-0">
                <div class="row mb-3">
                    <div  style="float: right;display: inline-block" class="col-6">
                        <h6 class="mb-0">سلايدر الرئيسية</h6>
{{--                        <p class="text-sm mb-0 text-capitalize font-weight-bold">انضم</p>--}}
                    </div>
                    <div  style="float:left;display: inline-block" class="col-6 ">
                        <div id="add_record" class="icon icon-shape bg-gradient-primary shadow text-center w-auto p-2" style="float: left;cursor:pointer" data-bs-toggle="modal" data-bs-target="#addModal">
                            <i class="fa fa-plus opacity-10 px-1" style="top:0;" aria-hidden="true"></i>
                            <span class="opacity-10 text-white" aria-hidden="true">اضافة جديد</span>
                        </div>
                    </div>
                </div>

            </div>

            <div class="card-body border-radius-lg p-3">
                <div class="card">
                    <div class="table-responsive">
                        <table id="example" class="table align-items-center mb-0">
                            <thead>
                            <tr>
                                <th class="text-center text-uppercase text-secondary text-s font-weight-bold opacity-100">#</th>
                                <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-100">الصورة</th>
                                <th class="text-center text-secondary text-xs opacity-100 " style="min-width: 35px;">تحكم</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($slider as $data)
                                <tr>
                                    <td class="align-middle text-center ">{{$loop->iteration}}</td>

                                    <td class="align-middle text-center text-sm">
                                        <div>
                                            <img src="{{get_file($data->image)}}" alt="delivery image" onclick="window.open(this.src)" class="avatar avatar-md me-3">
                                        </div>
                                    </td>

                                    <td class="align-middle ">
                                        <div class="row">
                                            <a    class=" col-6 details_element text-center editModal cursor-pointer"   action="{{aurl('slider/edit/'.$data->id)}}" data-toggle="tooltip" data-placement="top" title="تعديل">
                                                <i class="fas fa-edit "  style="color: #0982bf"  ></i>
                                            </a>
                                            <a    class=" col-6 delete_element text-center cursor-pointer"  data_delete="{{aurl('slider/slider_delete')}}" data_id="{{$data->id}}" data-original-title="delete order" data-toggle="tooltip" data-placement="top" title="حذف">
                                                <i class="fa fa-trash "  style="color: #ce031b" ></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                            @endforeach



                            </tbody>
                        </table>
                    </div>
                </div>
{{--                <form>--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-6">--}}
{{--                            <div class="form-group">--}}
{{--                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6">--}}
{{--                            <div class="form-group">--}}
{{--                                <input type="text" placeholder="Regular" class="form-control" disabled />--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-6">--}}
{{--                            <div class="form-group">--}}
{{--                                <div class="input-group mb-4">--}}
{{--                                    <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>--}}
{{--                                    <input class="form-control" placeholder="Search" type="text">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6">--}}
{{--                            <div class="form-group">--}}
{{--                                <div class="input-group mb-4">--}}
{{--                                    <input class="form-control" placeholder="Birthday" type="text">--}}
{{--                                    <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-6">--}}
{{--                            <div class="form-group has-success">--}}
{{--                                <input type="text" placeholder="Success" class="form-control is-valid" />--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6">--}}
{{--                            <div class="form-group has-danger">--}}
{{--                                <input type="email" placeholder="Error Input" class="form-control is-invalid" />--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </form>--}}


            </div>
        </div>
    </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                @include('Web.CRUD.Slider.creat')
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="edit_content">

            </div>
        </div>
    </div>


@endsection

@push('admin_js')

    {{--############  add_record  ##########--}}

    <script>

        $(document).on('submit','form#add_slider',function(e) {
            e.preventDefault();
            var myForm = $("#add_slider")[0]
            var formData = new FormData(myForm)
            var url = $('#add_slider').attr('action');
            $('#add_slider')[0].reset();
            $.ajax({
                url:url,
                type: 'POST',
                data: formData,
                success: function (data) {
                    if (data.status === 200) {
                        $('#addModal').modal('hide')

                        Swal.fire({
                            title: 'تم بنجاح!',
                            text: 'تم الاضافة بنجاح!',
                            icon: 'success',
                            confirmButtonText: 'حسنا',
                        });
                        setTimeout(function(){ location.reload()},2000);

                    }

                    if (data.status === 422) {
                        $.each(data.message , function(index, value) {
                            toastr.error(value);
                        });
                    }

                },
                error: function (data) {
                    if (data.status === 500) {
                        $('#addModal').modal('hide')
                        Swal.fire({
                            title: 'خطأ!',
                            text: 'عذرا هناك خطأ!',
                            icon: 'error',
                            confirmButtonText: 'حسنا',
                        })
                    }

                },//end error method

                cache: false,
                contentType: false,
                processData: false
            });
        });

        {{--############  edit_content  ##########--}}
        $(document).on('click','.editModal',function(e) {
            e.preventDefault();
            // var id = $(this).attr('delivery_id')
            var url = $(this).attr('action');
            // alert(url)
            $('#add_slider')[0].reset();
            $.ajax({
                url:url,
                type: 'GET',
                // data: formData,
                success: function (data) {
                    $('#edit_content').html(data);
                    $('#editModal').modal('show')
                    $('.dropify').dropify();
                },
                error: function (data) {
                    if (data.status === 500) {
                        $('#editModal').modal('hide')
                        Swal.fire({
                            title: 'خطأ!',
                            text: 'عذرا هناك خطأ!',
                            icon: 'error',
                            confirmButtonText: 'حسنا',
                        })
                    }

                },//end error method

                cache: false,
                contentType: false,
                processData: false
            });
        });

        {{--############  update_record  ##########--}}


        $(document).on('submit','form#update_slider',function(e) {
            e.preventDefault();
            var myForm = $("#update_slider")[0]
            var formData = new FormData(myForm)
            var url = $('#update_slider').attr('action');
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                success: function (data) {
                    if (data.status === 200) {
                        $('#editModal').modal('hide')
                        Swal.fire({
                            title: 'تم بنجاح!',
                            text: 'تم التعديل بنجاح!',
                            icon: 'success',
                            confirmButtonText: 'حسنا',
                        });
                        setTimeout(function () {
                            location.reload()
                        }, 2000);

                    }

                    if (data.status === 422) {
                        $.each(data.message, function (index, value) {
                            toastr.error(value);
                        });
                    }

                },
                error: function (data) {
                    if (data.status === 500) {
                        $('#editModal').modal('hide')
                        Swal.fire({
                            title: 'خطأ!',
                            text: 'عذرا هناك خطأ!',
                            icon: 'error',
                            confirmButtonText: 'حسنا',
                        })
                    }

                },//end error method

                cache: false,
                contentType: false,
                processData: false
            });
        });

    </script>

@endpush
