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
                <a href="#">Link Terkait</a>
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
                            <th style="text-align: center;">Nama</th>
                            <th style="text-align: center;">Url</th>
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
                    { data: 'name', name: 'name' },
                    { data: 'url', name: 'url' },
                    { data: 'action', },
                ],
                bSort: false,
                dom:
                    '<"card-header"<"head-label text-center"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                displayLength: 7,
                lengthMenu: [7, 10, 25, 50, 75, 100],
                buttons: [
                    {
                        text: '<i class="bx bx-plus me-1"></i> <span class="d-none d-lg-inline-block">Tambah Link Terkait</span>',
                        className: 'create-new btn btn-primary',
                        action: function (e, dt, button, config) {
                            window.location = `{{ route('relatedlink.create') }}`;
                        }
                    }
                ],
            });
        }
    });
</script>
@endpush