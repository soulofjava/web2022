@extends('back.layouts.app')
@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="#">Menu</a>
            </li>
            <li class="breadcrumb-item active">Data</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-body">
            @if ($message = Session::get('success'))
            <div id="elementId" hidden>{{ $message }}</div>
            @endif
            <div class="card-datatable table-responsive pt-0">
                <table id="datatables" class="datatables-basic table border-top table-hover">
                    <thead>
                        <tr>
                            <th style="text-align: center;">id</th>
                            <th style="text-align: center;">Menu Parent</th>
                            <th style="text-align: center;">Nama Menu</th>
                            <th style="text-align: center;">Tampil</th>
                            <th style="text-align: center;">Aksi</th>
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
    $(document).ready(function () {
        if ($('#elementId').length > 0) {
            const pesan = document.getElementById('elementId').innerText;
            console.log(pesan);
            Swal.fire(
                'OK!',
                'Data berhasil disimpan.',
                'success'
            )
        }
    });

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
                    { data: 'orang_tua' },
                    { data: 'menu_name', name: 'menu_name' },
                    { data: 'aksi' },
                    { data: 'action', },
                ],
                bSort: false,
                dom:
                    '<"card-header"<"head-label text-center"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                displayLength: 7,
                lengthMenu: [7, 10, 25, 50, 75, 100],
                buttons: [
                    {
                        text: '<i class="bx bx-plus me-1"></i> <span class="d-none d-lg-inline-block">Tambah Menu</span>',
                        className: 'create-new btn btn-primary',
                        action: function (e, dt, button, config) {
                            window.location = `{{ route('frontmenu.create') }}`;
                        }
                    }
                ],
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
        var url = "{{ route('centangfm') }}";

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