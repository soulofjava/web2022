@extends('front.buspro.layouts.app')
@push('after-style')


<!-- datatable -->
<link href="https://cdn.datatables.net/v/bs/dt-1.13.6/datatables.min.css" rel="stylesheet">
@endpush
@section('content')
<main id="main">

    <!-- Start Breadcrumb
        ============================================= -->
    <div class="breadcrumb-area shadow bg-fixed text-center padding-xl text-light" style="background-color: #F4F7FB;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <!-- <h1>Blog Single</h1> -->
                    <ul class="breadcrumb">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="#">page</a></li>
                        <li><a href="#">buku tamu</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Start Blog
        ============================================= -->
    <div id="blog" class="blog-area bg-gray full-width single default-padding">
        <div class="container">
            <div class="row">
                <div class="blog-items">
                    <div class="col-lg-12 col-md-12">
                        <div class="item">
                            <div class="text-center">
                                <button type="button" style="color: white; background: #012970;" class="btn"
                                    data-toggle="modal" data-target="#exampleModal">
                                    Add Guest
                                </button>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add Guest</h5>
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
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn"
                                                style="color: white; background: #012970;">Save</button>
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
    <!-- End Blog -->

</main>
@endsection
@push('after-script')
<!-- DataTables   -->
<!-- <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> -->
<script src="https://cdn.datatables.net/v/bs/dt-1.13.6/datatables.min.js"></script>

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