@extends('front.layouts.app')
@section('content')
<!-- Page Banner Start -->
<section class="page-banner-area rel z-1 text-white text-center"
    style="background-image: url({{ asset('assets/front/images/banner.jpg') }});">
    <div class="container">
        <div class="banner-inner rpt-10">
            <h2 class="page-title wow fadeInUp delay-0-2s">Buku Tamu</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb wow fadeInUp delay-0-4s">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">beranda</a></li>
                    <li class="breadcrumb-item active">Buku Tamu</li>
                </ol>
            </nav>
        </div>
    </div>
    <img class="circle-one" src="{{ asset('assets/front/images/shapes/circle-one.png') }}" alt="Circle">
    <img class="circle-two" src="{{ asset('assets/front/images/shapes/circle-two.png') }}" alt="Circle">
</section>
<!-- Page Banner End -->

<!-- Blog Standard Start -->
<section class="blog-standard-area py-130 rpt-95 rpb-100">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="card-content">
                            <div class="text-center">
                                <button type="button" class="btn btn-primary mb-3" data-toggle="modal"
                                    data-target="#exampleModal">
                                    Isi Buku Tamu
                                </button>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Isi Buku Tamu
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
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
                                                data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                        {{Form::close()}}
                                    </div>
                                </div>
                            </div>
                            <!-- End Modal -->
                            <table id="datatables" class="table is-striped" cellspacing="0" width="100%"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tanggal</th>
                                        <th>Nama</th>
                                        <th>Instansi</th>
                                        <th>Keperluan</th>
                                        <th>Jumlah Tamu</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Standard End -->
@endsection
@push('after-script')
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
        lengthChange: false,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Cari Data",
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