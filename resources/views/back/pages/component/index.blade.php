@extends('back.sneat.layouts.app')
@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="#">Komponen</a>
            </li>
            <li class="breadcrumb-item active">Data</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-body">
            <div class="card-datatable table-responsive pt-0">
                <table id="datatables" class="datatables-basic table border-top table-hover">
                    <thead>
                        <tr>
                            <th style="text-align: center;">id</th>
                            <th style="text-align: center;">nama</th>
                            <th style="text-align: center;">Aktif</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- / Content -->
@endsection
@push('after-script')
<script type="text/javascript">
    $(function () {
        'use strict';

        var dt_basic_table = $('.datatables-basic');

        // DataTable with buttons
        // --------------------------------------------------------------------

        if (dt_basic_table.length) {
            var dt_basic = dt_basic_table.DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                columns: [
                    { data: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'name', name: 'name' },
                    { data: 'action' },
                ],
                bSort: false,

                displayLength: 7,
                lengthMenu: [7, 10, 25, 50, 75, 100],

            });
        }
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function centang(submenu) {
        // e.preventDefault();
        // const { pathname } = window.location;
        // const paths = pathname.split("/").filter(entry => entry !== "");
        // const lastPath = parseInt(paths[paths.length - 1]);
        var url = "{{ route('centang') }}";

        $.ajax({
            url: url,
            method: 'POST',
            data: {
                id: submenu
                // roleId: lastPath
            },
            success: function (response) {
                if (response.success) {
                    Swal.fire(
                        'OK!',
                        'Data berhasil diubah.',
                        'success'
                    )
                    // location.reload();
                } else {
                    alert("Error")
                }
            },
            error: function (error) {
                console.log(error)
            }
        });
    };
</script>
@endpush