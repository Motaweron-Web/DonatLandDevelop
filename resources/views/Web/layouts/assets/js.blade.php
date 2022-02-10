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
{{--=========================  my js  =========================--}}
{{--<script>--}}
{{--    $(document).ready(function () {--}}
{{--        $('#dark-version').click();--}}
{{--    })--}}
{{--</script>--}}
{{--=========================  datatables  =========================--}}
{{--<script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>--}}
{{--<script src="https://code.jquery.com/jquery-3.5.1.js"></script>--}}
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>



<script>
    // $(document).ready( function () {
    //     $('#myTable').DataTable();
    // } );
    $(document).ready(function() {
        $('#example').DataTable({
            "language": {
                "sProcessing":   "جارٍ المعالجة...",
                "sLengthMenu":   "أظهر _MENU_ مدخلات",
                "sZeroRecords":  "لم يعثر على أية سجلات",
                "sInfo":         "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                "sInfoEmpty":    "يعرض 0 إلى 0 من أصل 0 مُدخل",
                "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                "sInfoPostFix":  "",
                "sSearch":       "ابحث:",
                "sUrl":          "",
                "oPaginate": {
                    "sFirst":    "الأول",
                    "sPrevious": "السابق",
                    "sNext":     "التالي",
                    "sLast":     "الأخير"
                }
            },
        });
    } );
</script>

<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.0.18/sweetalert2.min.js"></script>


{{-- delete element--}}
<script>
    $(document).on('click','.delete_element',function (e) {
        var id = $(this).attr('data_id')
        var td = $(this)
        var routeAction = $(this).attr('data_delete')
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'هل انت متأكد من الحذف ؟',
            text: "سيتم حذف المحدد!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'حذف !',
            cancelButtonText: 'الغاء !',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    url: routeAction,
                    data: {'id':id},
                    success:function(data){
                        td.parent().parent().parent().remove();
                        swalWithBootstrapButtons.fire(
                            'تم الحذف !',
                            'تم حذف العنصر بنجاح .',
                            'info'
                        )
                    }
                });
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'تم الغاء الحذف ',
                    'العنصر المحدد موجود بامان ',
                    'error'
                )
            }
        });
    })
</script>
{{--end delete element --}}
{{--================================  dropfy  ===================--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('.dropify').dropify();
</script>

@stack('admin_js')





