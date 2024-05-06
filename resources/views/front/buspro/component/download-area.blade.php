@extends('front.buspro.layout.app')
@push('after-style')
<!-- datatable -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<style>
    /* Untuk tombol dengan kelas butone */
    .butone {
        background-color: #1cb9c8;
        /* Ubah warna latar belakang */
        color: white;
        /* Ubah warna teks */
        border: none;
        /* Hapus batas */
        padding: 8px 16px;
        /* Atur padding */
        border-radius: 4px;
        /* Atur border-radius untuk sudut yang lebih lembut */
    }

    /* Untuk mengubah warna tombol saat dihover */
    .butone:hover {
        background-color: #0e7f8f;
        /* Ubah warna latar belakang saat dihover */
    }

    .pagination>li.active>a {
        background: #1cb9c8;
        color: #fff;
    }

    /* Untuk tautan aktif di dalam pagination saat dihover */
    .pagination>li.active>a:hover {
        background: #0e7f8f;
        /* Ubah warna latar belakang saat dihover */
        color: #fff;
        /* Ubah warna teks saat dihover */
    }
</style>
@endpush
@section('content')
<!-- Start Breadcrumb 
    ============================================= -->
<div class="breadcrumb-area shadow dark bg-fixed text-center text-light"
    style="background-image: url(assets/img/2440x1578.png);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h1>Download Area</h1>
                <ul class="breadcrumb">
                    <li><a href="{{ url('/') }}"><i class="fas fa-home"></i> Beranda</a></li>
                    <li><a href="#"> Halaman</a></li>
                    <li class="active"> Download Area</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumb -->
<!-- Start Blog
        ============================================= -->
<div class="blog-area default-padding bottom-less">
    <div class="container">
        <div class="row">
            <table id="datatables" class="table is-striped" cellspacing="0" width="100%" style="width:100%">
                <thead>
                    <tr>
                        <th style="text-align: center;">#</th>
                        <th style="text-align: center;">Nama File</th>
                        <th style="text-align: center;">Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<!-- End Blog -->
@endsection
@push('after-script')
<!-- DataTables   -->
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

<script type="text/javascript">
    $('#datatables').DataTable({
        "pagingType": "full_numbers",
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        responsive: true,
        processing: true,
        serverSide: true,
        lengthChange: true,
        scrollX: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search records",
        },
        columns: [
            { data: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'judul', className: "text-center" },
            { data: 'download', className: "text-center" },
        ]

    });
    // var table = $('#datatables').DataTable();
    // $('.card .material-datatables label').addClass('form-group');
</script>
@endpush