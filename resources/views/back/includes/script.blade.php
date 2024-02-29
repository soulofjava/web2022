<!-- Helpers -->
<script src="{{ asset('assets/back/sneat/assets/vendor/js/helpers.js') }}"></script>

<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js') }} in the <head> section -->
<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
<script src="{{ asset('assets/back/sneat/assets/js/config.js') }}"></script>

<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js') }} -->
<script src="{{ asset('assets/back/sneat/assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('assets/back/sneat/assets/vendor/libs/highlight/highlight.js') }}"></script>
<script src="{{ asset('assets/back/sneat/assets/vendor/libs/clipboard/clipboard.js') }}"></script>
<script src="{{ asset('assets/back/sneat/assets/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('assets/back/sneat/assets/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/back/sneat/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<!-- <script src="{{ asset('assets/back/sneat/assets/vendor/js/helpers.js') }}"></script> -->
<script src="{{ asset('assets/back/sneat/assets/vendor/libs/hammer/hammer.js') }}"></script>
<script src="{{ asset('assets/back/sneat/assets/vendor/js/menu.js') }}"></script>
<script src="{{ asset('assets/back/sneat/assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
<!-- <script src="{{ asset('assets/back/sneat/assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script> -->
<!-- <script src="{{ asset('assets/back/sneat/assets/vendor/libs/pickr/pickr.js') }}"></script> -->
<!-- <script src="{{ asset('assets/back/sneat/assets/js/config.js') }}"></script> -->
<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{ asset('assets/back/sneat/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
<script src="{{ asset('assets/back/sneat/assets/vendor/libs/select2/select2.js') }}"></script>

<!-- BS table js -->
<script src="{{ asset('assets/back/sneat/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>

<!-- Sweet Alert 2 plugin -->
<script src="{{ asset('assets/back/sneat/assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>

<!-- Page JS -->
<script src="{{ asset('assets/back/sneat/assets/js/dashboards-analytics.js') }}"></script>

<!-- Main JS -->
<script src="{{ asset('assets/back/sneat/assets/js/main.js') }}"></script>

<!-- Page JS -->
<!-- <script src="{{ asset('assets/back/sneat/assets/js/docs.js') }}"></script> -->
<!-- <script src="{{ asset('assets/back/sneat/assets/js/forms-pickers.js') }}"></script> -->
<script src="{{ asset('assets/back/sneat/assets/js/pages-account-settings-account.js') }}"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

<script src="{{ asset('assets/back/sneat/assets/js/extended-ui-sweetalert2.js') }}"></script>

<!-- <script src="{{ asset('assets/back/sneat/assets/js/docs-tables-datatables.js') }}"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

<script>
    ajaxRequest = document.querySelector('#btn-logout');

    ajaxRequest.onclick = function () {
        Swal.fire({
            title: 'Are you sure?',
            text: "want to logout!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes',
            customClass: {
                confirmButton: 'btn btn-primary me-1',
                cancelButton: 'btn btn-label-secondary'
            },
            buttonsStyling: false
        }).then(function (result) {
            if (result.value) {

                $.ajax({
                    method: 'POST',
                    url: '{{ route("logout") }}',
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    success: function () {
                        // Handle successful logout here (e.g., redirect to login page)
                        window.location.href = '/';
                    },
                    error: function (error) {
                        // Handle logout error (if any)s
                        console.error(error);
                    }
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {

            }
        });
    };

    // btn hapus
    $(document).on('click', '.delete-data-table', function (a) {
        a.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "Do you realy want to delete this records? This process cannot be undone.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Delete!',
            buttonsStyling: false
        }).then((result) => {
            if (result.value) {
                a.preventDefault();
                var url = $(this).attr('href');
                console.log(url);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: url,
                    method: 'delete',
                    success: function () {
                        Swal.fire(
                            'Deleted!',
                            'Data has been deleted.',
                            'success'
                        )
                        $('#datatables').DataTable().ajax.reload();
                    },
                    error: function () {
                        Swal.fire(
                            'Gagal!',
                            'Tidak dapat menghapus menu Parent.',
                            'error'
                        )
                        $('#datatables').DataTable().ajax.reload();
                    }
                })
            }
        })
    });
</script>