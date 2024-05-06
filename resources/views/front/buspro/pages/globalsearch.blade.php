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
                <h1>{{ $hasil }}</h1>
                <ul class="breadcrumb">
                    <li><a href="{{ url('/') }}"><i class="fas fa-home"></i> Beranda</a></li>
                    <li><a href="{{ url('newsall') }}"> Semua Postingan</a></li>
                    <li class="active"> {{ $hasil }}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumb -->
<!-- Start Blog Area
    ============================================= -->
<div class="blog-area default-padding bottom-less">
    <div class="container">
        <!-- <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="site-heading text-center">
                    <h2>Latest Blog</h2>
                    <p>
                        While mirth large of on front. Ye he greater related adapted proceed entered an. Through it
                        examine express promise no. Past add size game cold girl off how old
                    </p>
                </div>
            </div>
        </div> -->
        <div class="row">
            <table id="datatables" class="table is-striped" cellspacing="0" width="100%" style="width:100%">
                <thead>
                    <tr>
                        <th style="text-align: center;">No</th>
                        <th style="text-align: center;">Halaman</th>
                        <th style="text-align: center;" class="disabled-sorting text-center">
                            Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
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
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search records",
        },
        columns: [
            { data: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'title', name: 'title', className: "text-center", defaultContent: 'N/A' },
            { data: 'action', className: "text-center" },
        ]

    });
    // var table = $('#datatables').DataTable();
    // $('.card .material-datatables label').addClass('form-group');
</script>
@endpush