@extends('Web.layouts.inc.app')
@section('title1')
    الطلبات الجديدة
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
                            <h6 class="mb-0">الطلبات الجديدة</h6>
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
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-100">الفرع</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-100 ps-2">العميل</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-100">اجمالى السعر</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-100">طريقة الدفع</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-100">طريقة الاستلام</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-100">ملاحضات</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-100">العنوان</th>
                                    <th class="text-secondary opacity-100">تحكم</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $order)
                                        <tr>
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
                                                    <a  href="javascript:;"  class=" col-4 delete_element" data-toggle="tooltip" data_delete="{{route('order_delete')}}" data_id="{{$data->id}}" data-original-title="delete order" data-toggle="tooltip" data-placement="top" title="حذف">
                                                        <i class="fa fa-trash "  style="color: #ce031b" ></i>
                                                    </a>
                                                    <a  href="javascript:;"  class=" col-4 control_element" data-toggle="tooltip" data_route="{{route('order_accept',$data->id)}}" data-original-title="delete order" data-toggle="tooltip" data-placement="top"  title="قبول">
                                                        <i class="fa fa-check "  style="color: #122bce"  ></i>
                                                    </a>
                                                    <a  href="javascript:;"  class=" col-4 control_element" data_route="{{route('order_refuse',$data->id)}}"  data-toggle="tooltip" data-original-title="delete order" data-toggle="tooltip" data-placement="top" title="رفض">
                                                        <i class="fa fa-times "  style="color: #969794"  ></i>
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
