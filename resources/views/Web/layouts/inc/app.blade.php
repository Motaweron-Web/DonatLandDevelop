
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    {{--=============== css =============--}}
    @include('Web.layouts.assets.css')
    {{--=============== css =============--}}
</head>

<body class="g-sidenav-show rtl bg-gray-100">
{{--=============== sidebar =============--}}
    @include('Web.layouts.inc.sidebar')
{{--=============== sidebar =============--}}

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg overflow-hidden">
    {{--=============== header =============--}}
    @include('Web.layouts.inc.header')
    {{--=============== header =============--}}
     <div class="container-fluid py-4">
        {{--=============== load content =============--}}
        @yield('content')
        {{--=============== load content =============--}}
     </div>

    {{--=============== footer =============--}}
    @include('Web.layouts.inc.footer')
    {{--=============== footer =============--}}


</main>
{{--=============== setting =============--}}
@include('Web.layouts.inc.setting')
{{--=============== setting =============--}}

{{--=============== js =============--}}
@include('Web.layouts.assets.js')
{{--=============== js =============--}}

</body>

</html>
