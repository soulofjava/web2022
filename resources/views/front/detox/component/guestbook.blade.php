@extends('front.detox.layouts.app')
@push('after-style')
    <!-- datatable -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <style>
        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: red !important;
            color: white !important;
        }
    </style>
@endpush
@section('content')
    <!-- page-title -->
    <section class="page-title centred">
        <div class="pattern-layer"
            style="background-image: url({{ asset('master/Castro/assets/images/background/page-title.jpg') }});">
        </div>
        <div class="auto-container">
            <div class="content-box">
                <h1>Buku Tamu</h1>
                <ul class="bread-crumb clearfix">
                    <li><i class="flaticon-home-1"></i><a href="{{ url('/') }}">Beranda</a></li>
                    <li><a href="#">Halaman</a></li>
                    <li>Buku Tamu</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- page-title end -->
    <!-- blog-details -->
    <section class="blog-details">
        <div class="auto-container">
            <div class="blog-details-content">
                <div class="text-center">
                    <button type="button" style="color: white; background: #FF4135;" class="btn" data-toggle="modal"
                        data-target="#exampleModal">
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
                            {{ Form::open(['url' => 'guest', 'method' => 'post', 'files' => 'true', '']) }}
                            <div class="modal-body">

                                <div class="form-group label-floating">
                                    <label class="control-label">Nama</label>
                                    {{ Form::text('name', null, ['class' => 'form-control']) }}
                                </div>
                                <div class="form-group label-floating">
                                    <label class="control-label">Instansi</label>
                                    {{ Form::text('instansi', null, ['class' => 'form-control']) }}
                                </div>
                                <div class="form-group label-floating">
                                    <label class="control-label">Keperluan</label>
                                    {{ Form::text('keperluan', null, ['class' => 'form-control']) }}
                                </div>
                                <div class="form-group label-floating">
                                    <label class="control-label">Jumlah</label>
                                    {{ Form::number('jumlah', null, ['class' => 'form-control']) }}
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
                                <button type="submit" class="btn"
                                    style="color: white; background: #FF4135;">Simpan</button>
                            </div>
                            {{ Form::close() }}
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
    </section>
    <!-- blog-details end -->
@endsection
@push('after-script')
    <!-- DataTables   -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
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
                columns: [{
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'tgl'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'instansi',
                        name: 'instansi'
                    },
                    {
                        data: 'keperluan',
                        name: 'keperluan'
                    },
                    {
                        data: 'jumlah',
                        name: 'jumlah'
                    },
                ]
            });
        });
        // var table = $('#datatables').DataTable();
        // $('.card .material-datatables label').addClass('form-group');
    </script>
@endpush
