<?php
//use App\Models\GeneralSetting;
//$terms = GeneralSetting::first();
//?>
    <!DOCTYPE html>
<html lang="ar">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <title>dountLand</title>
    <!-- icon -->
    <link rel="icon" href="img/logo.png" type="image/x-icon"/>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet"/>
    <style>
        .container {
            background-color: rgb(255, 255, 255);
            border-radius: 30px;
        }

        h5 {
            font-weight: bold;
            margin-bottom: 30px;
        }

        * {
            font-family: "Cairo", sans-serif;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            outline: none;
        }

        body {
            overflow-x: hidden;
            background: linear-gradient(45deg, #0087d6, #fff);
        }

        ::-webkit-scrollbar {
            width: 4px;
            height: 4px;
            background-color: #e4e4e4;
        }

        ::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
            box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        }

        ::-webkit-scrollbar-thumb {
            background-color: #525252;
            outline: none;
            border-radius: 20px !important;
        }

        a {
            text-decoration: none;
        }

        a:hover {
            text-decoration: none;
        }

        button:focus {
            outline: 0;
        }

        .form-control:focus {
            border: 1px solid #fff;
            -webkit-box-shadow: 0px 2px 2px 1px #25252553;
            box-shadow: 0px 2px 2px 1px #25252553;
            -webkit-transition: 0.3s ease;
            transition: 0.3s ease;
        }

        .row {
            margin: 0px;
        }

        .logo {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
        }

        .logo .image img {
            height: 80px;
            max-width: 120px;
            object-fit: contain;
        }

    </style>
</head>

<body dir="rtl">

<div class="logo">
    <div class="image py-5">
        <img src="{{get_file('assets/logo.jpg')}}">
    </div>

</div>


<div class="terms px-2">
    <div class="container  w-lg-75 mb-5 shadow ">
        <div class="links p-5">
            <h3>إتفاقية وشروط إستخدام موقع <span> dountLand </span></h3>
            <ul class="padl-15">
                <li><a href="#1">(1) مقدمة</a></li>
                <li><a href="#2">(2) من نحن</a></li>
                <li><a href="#3">(3) شروط و احكام <span> dountLand </span></a></li>

            </ul>
        </div>

        <div class="heading-para p-2">
            <h5 id="1">(1) مقدمة :</h5>
            <p class="1">
                أهلاً بكم مع دونات لاند ، فيما يلي البنود والشروط التي تخص إستخدامك و دخولك لصفحات موقع "<span> dountLand
          </span>" dountLand وكافة الصفحات و الروابط والأدوات والخواص المتفرعة عنها. إن إستخدامك لموقع دونات لاند هو
                موافقة منك على القبول ببنود وشروط هذه الإتفاقية والذي يتضمن كافة التفاصيل أدناه وهو تأكيد لإلتزامك
                بالاستجابة
                لمضمون هذه الإتفاقية الخاصة بشركة دونات لاند
                "نحن" والمشار إليه إيضا بـ"<span> dountLand </span>"، فيما يتعلق باستخدامك للموقع، والمشار إليه فيما يلي
                بـ
                "اتفاقية الإستخدام " وتعتبر هذه الإتفاقية سارية المفعول حال قبولك بخيار الموافقة
            </p>
            <h5 id="2">(2) من نحن :</h5>
            <p class="1">
                {!!$setting->about!!}
            </p>
            <h5 id="3">(3) شروط واحكام <span> dountLand </span>:</h5>
            <p class="1">
                {!!$setting->terms!!}
            </p>

        </div>
    </div>
</div>

<!--////////////////////////////////////////////////////////////////////////////////-->
<!--////////////////////////////////////////////////////////////////////////////////-->
<!--////////////////////////////////////////////////////////////////////////////////-->
<!--/////////////////////////////JavaScript/////////////////////////////////////////-->
<!--////////////////////////////////////////////////////////////////////////////////-->
<!--////////////////////////////////////////////////////////////////////////////////-->
<!--////////////////////////////////////////////////////////////////////////////////-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        if ({{$id}} == '2') {
            $('html, body').animate({
                scrollTop: $("#2").offset().top
            }, 2000);
        } else {
            $('html, body').animate({
                scrollTop: $("#3").offset().top
            }, 2000);
        }
    })
</script>

</body>

</html>
