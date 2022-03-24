@extends('Web.layouts.inc.app')
@section('title1')
    قائمة الشكاوى
@endsection
{{--@section('title2')--}}
{{--     عرض قائمة الشكاوى--}}
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
                        <h6 class="mb-0">قائمة الشكاوى</h6>
{{--                        <p class="text-sm mb-0 text-capitalize font-weight-bold">انضم</p>--}}
                    </div>
{{--                    <div  style="float:left;display: inline-block" class="col-6">--}}
{{--                        <div class="icon icon-shape bg-gradient-primary shadow text-center w-auto p-2" style="float: left">--}}
{{--                            <i class="fa fa-plus opacity-10 px-1" style="top:0;" aria-hidden="true"></i>--}}
{{--                            <span class="opacity-10 text-white" aria-hidden="true">اضافة جديد</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>

            </div>

            <div class="card-body border-radius-lg p-3">
                <div class="card">
                    <div class="table-responsive">
                        <table id="example" class="table align-items-center mb-0">
                            <thead>
                            <tr>
                                <th class="text-center text-uppercase text-secondary text-s font-weight-bold opacity-100">#</th>
                                <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-100">الاسم</th>
                                <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-100">البريد الالكترونى</th>
                                <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-100">الموضوع</th>
                                <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-100">الرسالة</th>
                                <th class="text-center text-secondary text-xs opacity-100 " style="min-width: 35px;">تحكم</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $data)
                                <tr>
                                    <td class="align-middle text-center ">{{$loop->iteration}}</td>

                                    <td class="align-middle text-center text-sm">{{$data->name}}</td>
                                    <td class="align-middle text-center text-sm">{{$data->email}}</td>
                                    <td class="align-middle text-center text-sm">{{$data->subject}}</td>
                                    <td class="align-middle text-center text-sm">{{$data->message}}</td>

                                    <td class="align-middle ">
                                        <div class="row">
                                            <a    class=" col-12 delete_element text-center cursor-pointer"  data_delete="{{aurl('contact/contact_delete')}}" data_id="{{$data->id}}" data-original-title="delete order" data-toggle="tooltip" data-placement="top" title="حذف">
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
                @include('Web.CRUD.Drivers.creat')
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


