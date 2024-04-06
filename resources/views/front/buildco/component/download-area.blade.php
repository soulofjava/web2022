@extends('front.buildco.layouts.app')
@push('after-style')
<!-- datatable -->
<link href="https://cdn.datatables.net/v/bs/dt-1.13.6/datatables.min.css" rel="stylesheet">
<style>
    .pagination>li.active>a,
    .pagination>li.active>span {
        background-color: #FF5E14 !important
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
                <!-- <h1>POstingan Kami</h1> -->
                <ul class="breadcrumb">
                    <li><a href="{{ url('/') }}"><i class="fas fa-home"></i> Beranda</a></li>
                    <li><a href="#">Halaman</a></li>
                    <li class="active">Download Area</li>
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
                        <table id="datatables" class="table is-striped" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama File</th>
                                    <th>Aksi</th>
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
        scrollX: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search records",
        },
        columns: [
            { data: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'judul' },
            { data: 'download' },
        ]

    });
    // var table = $('#datatables').DataTable();
    // $('.card .material-datatables label').addClass('form-group');
</script>
@endpush