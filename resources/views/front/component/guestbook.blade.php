@extends('front.medino.layouts.app')
@section('content')
<!-- Banner Area Starts -->
<section class="banner-area other-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Buku Tamu</h1>
                <a href="{{ url('/') }}">Beranda</a> <span>|</span> <a href="#">Buku Tamu</a>
            </div>
        </div>
    </div>
</section>
<!-- Banner Area End -->

<!-- Welcome Area Starts -->
<section class="welcome-area section-padding">
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
<!-- Welcome Area End -->
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