<!-- plugins:js -->
<script src="{{ asset('assets/back/md/assets/vendors/js/vendor.bundle.base.js') }}"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<script src="{{ asset('assets/back/md/assets/vendors/chartjs/Chart.min.js') }}"></script>
<script src="{{ asset('assets/back/md/assets/vendors/jvectormap/jquery-jvectormap.min.js') }}"></script>
<script src="{{ asset('assets/back/md/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="{{ asset('assets/back/md/assets/js/material.js') }}"></script>
<script src="{{ asset('assets/back/md/assets/js/misc.js') }}"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{ asset('assets/back/md/assets/js/dashboard.js') }}"></script>
<!-- End custom js for this page-->
<!-- Sweet Alert 2 plugin -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
    // btn hapus
    $(document).on('click', '.delete-data-table', function (a) {
        a.preventDefault();
        swal({
            title: 'Apa anda yakin?',
            text: "Data yang sudah terhapus tidak dapat dikembalikan.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
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
                    swal(
                        'Sukses!',
                        'Data berhasil dihapus',
                        'success'
                    )
                    $('#tabelku').DataTable().ajax.reload();
                }
            })
        })
    });
</script>