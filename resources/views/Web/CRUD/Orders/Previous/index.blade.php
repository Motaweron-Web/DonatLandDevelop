@extends('Web.layouts.inc.app')
@section('title1')
    الطلبات المنتهية
@endsection
@section('content')
    <div class="row">
        <div class=" col-12">
            <div class="card">
                <div class="card-header p-3 pb-0">
                    <div class="row mb-3">
                        <div  style="float: right;display: inline-block" class="col-6">
                            <h6 class="mb-0">الطلبات المنتهية</h6>
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
                                    <th class="text-uppercase text-secondary text-s font-weight-bold opacity-100">#</th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-100">الفرع</th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-100 ps-2">العميل</th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-100 ps-2"> المندوب</th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-100 ps-2">حالة الطلب</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-100">اجمالى السعر</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-100">طريقة الدفع</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-100">طريقة الاستلام</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-100">ملاحضات</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-100">العنوان</th>
                                    <th class="text-secondary text-xs opacity-100 " >تحكم</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $order)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            @if($order->branch)
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-xs">{{$order->branch->name}}</h6>
                                                        <p class="text-xs text-secondary mb-0">{{$order->branch->email}}</p>
                                                        {{--                                                        <p class="text-xs text-secondary mb-0">{{$order->branch->phone}}</p>--}}
                                                    </div>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            @if($order->customer)
                                                <p class="text-xs font-weight-bold mb-0">{{$order->customer->name}}</p>
                                                <p class="text-xs text-secondary mb-0">{{$order->customer->email}}</p>
                                                <p class="text-xs text-secondary mb-0">{{$order->customer->phone_number}}</p>
                                            @endif
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            @if($order->delivery)
                                                <p class="text-xs font-weight-bold mb-0">{{$order->delivery->name}}</p>
                                                <p class="text-xs text-secondary mb-0">{{$order->delivery->phone}}</p>
                                            @else
                                                <p class="text-xs font-weight-bold mb-0">لا يوجد توصيل </p>
                                            @endif
                                        </td>
                                        <td>
                                            @if($order->status=='cancel')
                                                <p class="badge badge-sm badge-secondary">ملغى</p>
                                            @else
                                                <p class="badge badge-sm badge-success"> منتهى </p>
                                            @endif
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-secondary text-xs font-weight-bold">{{$order->grand_total}}</span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                                <span class="text-secondary text-xs font-weight-bold">
                                                    @if($order->payment_type == 'cash') كاش
                                                    @elseif($order->payment_type == 'wallet') محفظة
                                                    @else دفع الكترونى
                                                    @endif
                                                </span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-secondary text-xs font-weight-bold">
                                                @if($order->receive_type == 'branch') الفرع
                                                @else  توصيل دليفرى
                                                @endif
                                            </span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-secondary text-xs font-weight-bold">
                                              {{$order->notes}}
                                            </span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold ">
                                                <a target="_blank" href="http://www.google.com/maps/place/{{$order->latitude}},{{$order->longitude}}" >الذهاب للعنوان</a>
                                            </span>
                                        </td>
                                        <td class="align-middle ">
                                            <div class="row">
                                                <a    class=" col-6 details_element cursor-pointer" data_route="{{aurl('orders/order_details/'.$order->id)}}"  data-toggle="tooltip" data-placement="top" title="التفاصيل">
                                                    <i class="fas fa-search "  style="color: #0982bf"  ></i>
                                                </a>
                                                <a    class=" col-6 delete_element cursor-pointer"  data_delete="{{aurl('orders/order_delete')}}" data_id="{{$order->id}}" data-original-title="delete order" data-toggle="tooltip" data-placement="top" title="حذف">
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
    <script>


        //============================  details_element  =======================================

        $(document).on('click','.details_element',function (e) {
            e.preventDefault()
            var routeAction = $(this).attr('data_route')
            var td = $(this)
            $.ajax({
                type: 'GET',
                url: routeAction,
                data: {},
                success:function(data){
                    $('#exampleModalCenter').modal('show')
                    $('.modal-body').html(data)
                }
            });

        })

        // ============================  close model  ===================================
        $(document).on('click','#close_model',function (e) {
            $('#exampleModalCenter').modal('hide')
        })

    </script>

@endpush
