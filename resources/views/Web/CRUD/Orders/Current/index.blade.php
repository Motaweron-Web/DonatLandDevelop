@extends('Web.layouts.inc.app')
@section('title1')
    الطلبات الحالية
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
                            <h6 class="mb-0">الطلبات الحالية</h6>
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
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-100 ps-2">حالة طلب المندوب</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-100">اجمالى السعر</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-100">طريقة الدفع</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-100">طريقة الاستلام</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-100">ملاحضات</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-100">العنوان</th>
                                    <th class="text-secondary text-xs opacity-100 " style="min-width: 35px;">تحكم</th>
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
                                                        <p class="text-xs text-secondary mb-0">{{$order->branch->phone}}</p>
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
                                                <p class="text-xs text-secondary mb-0">{{$order->customer->phone}}</p>
                                            @else
                                                <p class="text-xs font-weight-bold mb-0">لا يوجد توصيل </p>
                                            @endif
                                        </td>
                                        <td>
                                            @if($order->delivery)
                                                @if($order->delivery_status=='append')
                                                    <p class="badge badge-sm badge-secondary"> جديد </p>
                                                @elseif($order->delivery_status=='accepted')
                                                    <p class="badge badge-sm badge-info">
                                                        تم القبول
                                                    </p>
                                                @elseif($order->delivery_status=='on_way')
                                                    <p class="badge badge-sm badge-success">
                                                        يتم التوصيل
                                                    </p>
                                                @endif
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
                                                <a    class=" col-3 end_element"  data_route="{{aurl('orders/order_end/'.$order->id)}}"  data-toggle="tooltip"  data-placement="top"  title="انهاء">
                                                    <i class="fa fa-check-double "  style="color: #00a500"  ></i>
                                                </a>
                                                <a    class=" col-3 refuse_element" data_route="{{aurl('orders/order_refuse/'.$order->id)}}"  data-toggle="tooltip" data-placement="top" title="رفض">
                                                    <i class="fa fa-times "  style="color: #969794"  ></i>
                                                </a>
                                                <a    class=" col-3 details_element" data_route="{{aurl('orders/order_details/'.$order->id)}}"  data-toggle="tooltip" data-placement="top" title="التفاصيل">
                                                    <i class="fas fa-search "  style="color: #0982bf"  ></i>
                                                </a>
                                                <a    class=" col-3 delete_element"  data_delete="{{aurl('orders/order_delete')}}" data_id="{{$order->id}}" data-original-title="delete order" data-toggle="tooltip" data-placement="top" title="حذف">
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
        $(document).on('click','.end_element',function (e) {
            e.preventDefault()
            var routeAction = $(this).attr('data_route')
            var td = $(this)
            var text = 'انهاء '
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })
                swalWithBootstrapButtons.fire({
                    title: 'هل انت متأكد من '+text+'الطلب المحدد ؟',
                    icon: 'warning',
                    confirmButtonText: ''+text+' !',
                    cancelButtonText: 'الغاء !',
                    reverseButtons: true,
                    showCancelButton: true,

                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'GET',
                            url: routeAction,
                            data: {},
                            success:function(){
                                td.parent().parent().parent().remove();
                                swalWithBootstrapButtons.fire(
                                    'تم ال'+text+' !',
                                    'تم '+text+' الطلب بنجاح .',
                                    'info'
                                )
                            }
                        });
                        // location.href = routeAction;
                    } else if (
                        /* Read more about handling dismissals below */
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                            ' تم الغاء '+text+' الطلب ',
                            'حالة الطلب لم تتغير ',
                            'error'
                        )
                    }
                });




        })

        //============================  refuse_element  =======================================

        $(document).on('click','.refuse_element',function (e) {
            e.preventDefault()
            var routeAction = $(this).attr('data_route')
            var td = $(this)
            var text = 'رفض '
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'هل انت متأكد من '+text+'الطلب المحدد ؟',
                icon: 'warning',
                confirmButtonText: ''+text+' !',
                cancelButtonText: 'الغاء !',
                reverseButtons: true,
                text: "هل انت متاكد من الرفض ",
                showCancelButton: true,

            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'GET',
                        url: routeAction,
                        data: {},
                        success:function(){
                            td.parent().parent().parent().remove();
                            swalWithBootstrapButtons.fire(
                                'تم ال'+text+' !',
                                'تم '+text+' الطلب بنجاح .',
                                'info'
                            )
                        }
                    });
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        ' تم الغاء '+text+' الطلب ',
                        'حالة الطلب لم تتغير ',
                        'error'
                    )
                }
            });
        })

        //============================  refuse_element  =======================================

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
