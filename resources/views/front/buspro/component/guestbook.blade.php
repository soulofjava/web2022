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
                <h1>Buku Tamu</h1>
                <ul class="breadcrumb">
                    <li><a href="{{ url('/') }}"><i class="fas fa-home"></i> Beranda</a></li>
                    <li><a href="#"> Halaman</a></li>
                    <li class="active"> Buku Tamu</li>
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
            <div class="text-center">
                <button type="button" style="color: white; background: #1cb9c8;" class="btn" data-toggle="modal"
                    data-target="#exampleModal">
                    Tambah Tamu
                </button>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Tamu</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        {{Form::open(['url' => 'guest','method' => 'post', 'files'
                        => 'true', ''])}}
                        <div class="modal-body">

                            <div class="form-group label-floating">
                                <label class="control-label">Nama</label>
                                {{Form::text('name', null,['class' => 'form-control'])}}
                            </div>
                            <div class="form-group label-floating">
                                <label class="control-label">Instansi</label>
                                {{Form::text('instansi', null,['class' => 'form-control'])}}
                            </div>
                            <div class="form-group label-floating">
                                <label class="control-label">Keperluan</label>
                                {{Form::text('keperluan', null,['class' => 'form-control'])}}
                            </div>
                            <div class="form-group label-floating">
                                <label class="control-label">Jumlah</label>
                                {{Form::number('jumlah', null,['class' => 'form-control'])}}
                            </div>
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn" style="color: white; background: #1cb9c8;">Simpan</button>
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
            <!-- End Modal -->
            <table id="datatables" class="table is-striped" cellspacing="0" width="100%" style="width:100%">
                <thead>
                    <tr>
                        <th style="text-align: center;">#</th>
                        <th style="text-align: center;">Tanggal</th>
                        <th style="text-align: center;">Nama</th>
                        <th style="text-align: center;">Instansi</th>
                        <th style="text-align: center;">Keperluan</th>
                        <th style="text-align: center;">Jumlah Tamu</th>
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
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search records",
        },
        columns: [
            { data: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'tgl' },
            { data: 'name', name: 'name' },
            { data: 'instansi', name: 'instansi' },
            { data: 'keperluan', name: 'keperluan' },
            { data: 'jumlah', name: 'jumlah' },
        ]

    });
    // var table = $('#datatables').DataTable();
    // $('.card .material-datatables label').addClass('form-group');
</script>
@endpush