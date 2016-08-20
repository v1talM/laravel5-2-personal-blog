<script src="{{ asset('backend/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('backend/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('backend/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
<script src="{{ asset('backend/vendors/iCheck/icheck.min.js') }}"></script>
<script>
    var $datatable = $('#datatable-checkbox');

    $datatable.dataTable({
        'order': [[ 1, 'asc' ]],
        'columnDefs': [
            { orderable: false, targets: [0] }
        ]
    });
    $datatable.on('draw.dt', function() {
        $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
        });
    });
    $("#submit").on('click', function () {
        $("#category_form").submit();
    })
</script>