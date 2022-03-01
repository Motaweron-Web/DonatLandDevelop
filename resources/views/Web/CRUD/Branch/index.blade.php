@extends('Web.layouts.inc.app')
@section('title1')
    الفروع
@endsection
@section('content')

    <div class="row">
        <div class=" col-12">
            <div class="card">
                <div class="card-header p-3 pb-0">
                    <div class="row mb-3">
                        <div  style="float: right;display: inline-block" class="col-6">
                            <h6 class="mb-0">الفروع</h6>
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
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-100 max-width-100" >الاسم</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-100">الاسم الثانى</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-100">البريد الالكترونى</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-100">رقم الهاتف</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-100">العنوان</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-100">التوصيل</th>
                                    <th class="text-center text-secondary text-xs opacity-100 " style="min-width: 35px;">تحكم</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($branches as $data)
                                    <tr>
                                        <td class="align-middle text-center ">{{$loop->iteration}}</td>

                                        <td class="align-middle text-center text-sm " >{{$data->name}}</td>
                                        <td class="align-middle text-center text-sm" style="min-width: 150px">
                                            <input type="text" href="{{route('change_name2')}}" data_id="{{$data->id}}" class="change_name2 form-control col-12" value="{{$data->name2}}">
                                        </td>
                                        <td class="align-middle text-center text-sm">{{$data->email}}</td>
                                        <td class="align-middle text-center text-sm">{{$data->phone}}</td>
                                        <td class="align-middle text-center text-sm">{{$data->address}}
                                            <span class="text-secondary text-xs font-weight-bold  d-block " style="min-width: 150px">
                                                    <a target="_blank" href="http://www.google.com/maps/place/{{$data->latitude}},{{$data->longitude}}" >الذهاب للعنوان</a>
                                            </span>
                                        </td>
                                        <td class="align-middle text-center text-sm">{{$data->is_delivery=='yes'?'يوجد' :'لا يوجد'}}</td>

                                        <td class="align-middle ">
                                            <div class="row">
                                                <a    class=" col-12 control_element text-center cursor-pointer"  data_route="{{aurl('branch/branch_control')}}" data_control_id="{{$data->id}}" is_show="{{$data->is_show}}" data-original-title="delete order" data-toggle="tooltip" data-placement="top"  title="{{$data->is_show == '0'?'اظهار':'اخفاء'}}">
                                                    <i class="fas fa-{{$data->is_show == '1'?'eye':'eye-slash'}} "   style="color: {{$data->is_show == '1'?'#31a805':'#ce031b'}} " ></i>
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

    <script>
        $(document).on('click','.control_element',function (e) {
            e.preventDefault()
            var routeAction = $(this).attr('data_route')
            var text = $(this).attr('data-bs-original-title')
            // alert(text)
            var is_show = $(this).attr('is_show')
            if(is_show == '1'){
                var sec_title = 'اظهار'
                var first_icon = 'fa-eye'
                var sec_icon = 'fa-eye-slash'
                var sec_color = '#ce031b'
                var change_is_show= '0';
            }else {
                var sec_title = 'اخفاء'
                var first_icon = 'fa-eye-slash'
                var sec_icon = 'fa-eye'
                var sec_color = '#31a805'
                var change_is_show= '1';
            }
            var id = $(this).attr('data_control_id')
            var this_class = $(this);
            // alert(id)
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'هل انت متأكد من '+text+' الفرع المحدد ؟',
                text: "سيتم "+text+" الفرع المحدد!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: ''+text+' !',
                cancelButtonText: 'الغاء !',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url:routeAction,
                        type: 'POST',
                        data: {'id':id},
                        success: function (data) {
                            // this_class.attr('sec_title',text);
                            this_class.attr('is_show',change_is_show);
                            this_class.attr('data-bs-original-title',sec_title);
                            this_class.find('i').removeClass(first_icon).addClass(sec_icon)
                            this_class.find('i').css('color',sec_color)
                            swalWithBootstrapButtons.fire(
                                'تم ال'+text+' !',
                                'تم '+text+' الفرع بنجاح .',
                                'success'
                            )
                        },
                        error: function (data) {
                                Swal.fire({
                                    title: 'خطأ!',
                                    text: 'عذرا هناك خطأ!',
                                    icon: 'error',
                                    confirmButtonText: 'حسنا',
                                })
                        },//end error method

                        // cache: false,
                        // contentType: false,
                        // processData: false
                    });
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        ' تم الغاء '+text+' الفرع ',
                        'حالة الفرع لم تتغير ',
                        'error'
                    )
                }
            });

        })
    </script>

@endpush
