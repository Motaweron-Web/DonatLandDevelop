<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="csrf-token" content="{{csrf_token()}}">
<meta http-equiv='content-Type' content='text/html; charset=UTF-8'/>
<link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
<link rel="icon" type="image/png" href="../../assets/img/favicon.png">
<title> @yield('title') </title>
<!--     Fonts and icons     -->
<!-- Nucleo Icons -->
<link href="{{url('assets/css/nucleo-icons.css')}}" rel="stylesheet" />
<link href="{{url('assets/css/nucleo-svg.css')}}" rel="stylesheet" />
<!-- Font Awesome Icons -->
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
<link href="{{url('assets/css/nucleo-svg.css')}}" rel="stylesheet" />
<!-- CSS Files -->
{{--<link rel="stylesheet" href="//cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">--}}
{{--data table--}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
{{--end data table--}}
<link id="pagestyle" href="{{url('assets/css/soft-ui-dashboard.min.css')}}" rel="stylesheet" />
<style>
    @font-face {
        font-family: Sukar;
        src: url({{url('assets/default/fonts/Sukar-Regular.otf')}});
    }

    * {
        font-family: Sukar;
    }
</style>
@toastr_css

{{--==============================  my css  ======================--}}
<style>
    footer.footer.pt-3 {
        width: 100%;
        position: absolute;
        bottom: 0;
        left: 0;
    }
    .dataTables_filter label{
        float: left !important;
    }
    select.form-select.form-select-sm {
        padding: 2px;
    }
    div.dataTables_wrapper div.dataTables_length select {
        width: 35px;
    }

    div.swal2-actions button{
         margin: 10px!important;
     }
     /*button.swal2-confirm.btn.btn-success {*/
     /*    margin: 10px!important;*/
     /*}*/

</style>

{{--================================  dropfy  ===================--}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
