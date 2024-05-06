@extends('front.castro.layouts.app')
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
            <h1>Agenda</h1>
            <ul class="bread-crumb clearfix">
                <li><i class="flaticon-home-1"></i><a href="{{ url('/') }}">Beranda</a></li>
                <li><a href="#">Halaman</a></li>
                <li>Agenda</li>
            </ul>
        </div>
    </div>
</section>
<!-- page-title end -->
<!-- blog-details -->
<section class="blog-details">
    <div class="auto-container">
        <div class="blog-details-content">
            <table id="datatables" class="table is-striped" cellspacing="0" width="100%" style="width:100%">
                <thead>
                    <tr>
                        <th style="text-align: center;">#</th>
                        <th style="text-align: center;">Date</th>
                        <th style="text-align: center;">Event Name</th>
                        <th style="text-align: center;">Event Location</th>
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
    $(document).ready(function () {
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
                { data: 'tgl', className: "text-center" },
                { data: 'title', className: "text-center" },
                { data: 'location', className: "text-center" },
            ]

        });
    });
    // var table = $('#datatables').DataTable();
    // $('.card .material-datatables label').addClass('form-group');
</script>
@endpush