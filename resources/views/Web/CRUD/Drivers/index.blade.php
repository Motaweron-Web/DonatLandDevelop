@extends('Web.layouts.inc.app')
@section('title1')
    المندوبين
@endsection
{{--@section('title2')--}}
{{--     عرض المشرفين--}}
{{--@endsection--}}
@section('content')
    <div class="row">
        <div class=" col-12">
            <div class="card">
                <div class="card-header p-3 pb-0">
                    <div class="row mb-3">
                        <div  style="float: right;display: inline-block" class="col-6">
                            <h6 class="mb-0">المندوبين</h6>
                            {{--                            <p class="text-sm mb-0 text-capitalize font-weight-bold">انضم</p>--}}
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
                                    <th class="text-secondary text-xs opacity-100 " style="min-width: 35px;">تحكم</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($drivers as $data)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-secondary text-xs font-weight-bold">
                                              {{get_file($data->photo)}}
                                            </span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-secondary text-xs font-weight-bold">
                                              {{$data->name}}
                                            </span>
                                        </td>
                                        <td class="align-middle ">
                                            <div class="row">
                                                <a    class=" col-3 details_element" data_route="{{aurl('orders/order_details/'.$data->id)}}"  data-toggle="tooltip" data-placement="top" title="التفاصيل">
                                                    <i class="fas fa-search "  style="color: #0982bf"  ></i>
                                                </a>
                                                <a    class=" col-3 delete_element"  data_delete="{{aurl('orders/order_delete')}}" data_id="{{$data->id}}" data-original-title="delete order" data-toggle="tooltip" data-placement="top" title="حذف">
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


    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" style="z-index: 999999!important"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

        <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">


            <div class="modal-content">
                <div class="modal-header d-flex justify-content-center">
                    <h5 class="modal-title font-weight-bold" id="exampleModalLongTitle">تفاصيل الطلب</h5>

                </div>
                <div class="modal-body">



                </div>
                <div class="modal-footer text-center d-flex justify-content-center">
                    <button type="button" class="btn " id="close_model" data-dismiss="modal">اغلاق</button>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('admin_js')

    {{--############  Control Booking  ##########--}}


@endpush
