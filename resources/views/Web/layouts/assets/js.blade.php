<!--   Core JS Files   -->
<script src="{{url('assets/js/jquery.min.js')}}"></script>
<script src="{{url('assets/js/core/popper.min.js')}}"></script>
<script src="{{url('assets/js/core/bootstrap.min.js')}}"></script>
<script src="{{url('assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
<script src="{{url('assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
<script src="{{url('assets/js/plugins/fullcalendar.min.js')}}"></script>
<!-- Kanban scripts -->
<script src="{{url('assets/js/plugins/dragula/dragula.min.js')}}"></script>
<script src="{{url('assets/js/plugins/jkanban/jkanban.js')}}"></script>
<script src="{{url('assets/js/plugins/choices.min.js')}}"></script>
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{url('assets/js/soft-ui-dashboard.min.js')}}"></script>
@toastr_js
@toastr_render
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

</script>
