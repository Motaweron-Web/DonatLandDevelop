@extends('Web.layouts.inc.app')
@section('title1')
    العملاء
@endsection
{{--@section('title2')--}}
{{--     عرض المشرفين--}}
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
                            <h6 class="mb-0">العملاء</h6>
                            {{--                            <p class="text-sm mb-0 text-capitalize font-weight-bold">انضم</p>--}}
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
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-100">الاسم</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-100">رقم الهاتف</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-100">العنوان</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-100">المدينة</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-100">اجمالى النقاط</th>
                                    <th class="text-center text-secondary text-xs opacity-100 " style="min-width: 35px;">تحكم</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($clients as $data)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td class="align-middle text-center text-sm">
                                            <div>
                                                <img src="{{get_file($data->photo)}}" alt="delivery image" onclick="window.open(this.src)" class="avatar avatar-md me-3">
                                            </div>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-secondary text-xs font-weight-bold">
                                              {{$data->name}}
                                            </span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-secondary text-xs font-weight-bold">
                                              {{$data->phone_number}}
                                            </span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-secondary text-xs font-weight-bold">
                                              {{$data->address}}
                                            </span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-secondary text-xs font-weight-bold">
                                              {{$data->city}}
                                            </span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-secondary text-xs font-weight-bold">
                                              {{$data->total}}
                                            </span>
                                        </td>
                                        <td class="align-middle ">
                                            <div class="row">
{{--                                                <a    class=" col-6 details_element text-center editModal"   action="{{aurl('drivers/edit/'.$data->id)}}" data-toggle="tooltip" data-placement="top" title="تعديل">--}}
{{--                                                    <i class="fas fa-edit "  style="color: #0982bf"  ></i>--}}
{{--                                                </a>--}}
                                                <a    class=" col-12 delete_element text-center"  data_delete="{{aurl('drivers/driver_delete')}}" data_id="{{$data->id}}" data-original-title="delete order" data-toggle="tooltip" data-placement="top" title="حذف">
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


                </div>
            </div>
        </div>
    </div>




@endsection

@push('admin_js')



@endpush
