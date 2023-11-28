<!-- Javascript -->
<script src="{{ asset('assets/front/medino/js/vendor/jquery-2.2.4.min.js') }}"></script>
<script src="{{ asset('assets/front/medino/js/vendor/bootstrap-4.1.3.min.js') }}"></script>
<script src="{{ asset('assets/front/medino/js/vendor/wow.min.js') }}"></script>
<script src="{{ asset('assets/front/medino/js/vendor/owl-carousel.min.js') }}"></script>
<script src="{{ asset('assets/front/medino/js/vendor/jquery.datetimepicker.full.min.js') }}"></script>
<script src="{{ asset('assets/front/medino/js/vendor/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('assets/front/medino/js/vendor/superfish.min.js') }}"></script>
<script src="{{ asset('assets/front/medino/js/main.js') }}"></script>
<!-- DataTables   -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
<script>
    document.addEventListener("keydown", function (event) {
        // Check if the '`' key (key code 192) is pressed
        if (event.keyCode === 192) {
            var aku = $('#exampleModal').modal('show');
            if ($('#exampleModal').modal('show')) {
                $('#exampleModal').modal('hide')
            } else {
                $('#exampleModal').modal('show')
            }
        }
    });

    $(document).ready(function () {
        $("#exampleModal").on('shown.bs.modal', function () {
            $(this).find('#textareaID1').focus();
        });
    });
</script>