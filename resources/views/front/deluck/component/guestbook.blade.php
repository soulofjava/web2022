@extends('front.deluck.layouts.app')
@push('after-style')
<!-- datatable -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<style>
    /* Untuk tombol dengan kelas butone */
    .butone {
        background-color: #FF4135;
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
        background-color: #aa3931;
        /* Ubah warna latar belakang saat dihover */
    }

    /* Mengubah warna latar belakang tombol aktif */
    .paginate_button.page-item.active .page-link {
        background-color: #ff0000;
        /* Warna latar belakang merah */
        border-color: #ff0000;
        /* Warna border */
        color: #fff;
        /* Warna teks */
    }
</style>
@endpush
@section('content')
<!-- Start Breadcrumb 
    ============================================= -->
<div class="breadcrumb-area text-center bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
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
<div class="blog-area single full-blog default-padding">
    <div class="container">
        <div class="row">
            <div class="blog-items">
                <div class="blog-content col-md-offset-1">
                    <div class="item">
                        <div class="text-center">
                            <button type="button" style="color: white; background: #FF4135;" class="btn"
                                data-toggle="modal" data-target="#exampleModal">
                                Tambah Data Tamu
                            </button>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Tamu</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
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
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn"
                                            style="color: white; background: #FF4135;">Simpan</button>
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
            {
                data: 'DT_RowIndex',
                orderable: false,
                searchable: false,
                className: 'text-center' // Kolom pertama
            },
            {
                data: 'tgl',
                className: 'text-center' // Kolom kedua
            },
            {
                data: 'name',
                name: 'name',
                className: 'text-center' // Kolom ketiga
            },
            {
                data: 'instansi',
                name: 'instansi',
                className: 'text-center' // Kolom keempat
            },
            {
                data: 'keperluan',
                name: 'keperluan',
                className: 'text-center' // Kolom kelima
            },
            {
                data: 'jumlah',
                name: 'jumlah',
                className: 'text-center' // Kolom keenam
            }

        ]

    });
    // var table = $('#datatables').DataTable();
    // $('.card .material-datatables label').addClass('form-group');
</script>
@endpush