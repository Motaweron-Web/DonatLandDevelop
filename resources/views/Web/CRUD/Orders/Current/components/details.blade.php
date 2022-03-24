{{--<a class="btn" data-toggle="modal" data-target="#exampleModalCenter">Ask Question</a>--}}

    <div class="row">
        <div class="col-6">
            <a class="d-flex align-items-center justify-content-center" >
{{--                            <img src="img/Icons/viber.png" class="z-depth-0" height="45px" alt="">--}}
                <p class="pl-2 font-weight-bold">اسم المنتج</p>
            </a>
        </div>
        <div class="col-2">
            <a class="d-flex align-items-center justify-content-center" >
                <p class="pl-2 font-weight-bold">الكمية</p>
            </a>
        </div>
        <div class="col-2">
            <a class="d-flex align-items-center justify-content-center" >
                <p class="pl-2 font-weight-bold">الضريبة</p>
            </a>
        </div>
        <div class="col-2">
            <a class="d-flex align-items-center justify-content-center" >
                <p class="pl-2 font-weight-bold">الاجمالى</p>
            </a>
        </div>
    </div>

@foreach($details as $detail)
    <div class="row">
        <div class="col-6">
            <a class="d-flex align-items-center justify-content-center" >
                <p class="pl-2 font-weight-bold">
                    @if($detail->product)
                        <p class="pl-2 font-weight-bold">{{$detail->product->name}}</p>
                    @endif
                </p>
            </a>
        </div>
        <div class="col-2">
            <a class="d-flex align-items-center justify-content-center" >
                <p class="pl-2 font-weight-bold">{{$detail->qty}}</p>
            </a>
        </div>
        <div class="col-2">
            <a class="d-flex align-items-center justify-content-center" >
                <p class="pl-2 font-weight-bold">{{$detail->tax}}</p>
            </a>
        </div>
        <div class="col-2">
            <a class="d-flex align-items-center justify-content-center" >
                <p class="pl-2 font-weight-bold">{{$detail->subtotal}}</p>
            </a>
        </div>
    </div>
@endforeach
