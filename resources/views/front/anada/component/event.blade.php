@extends('front.anada.layouts.app')
@section('content')
<!-- Start Breadcrumb 
        ============================================= -->
<div class="breadcrumb-area gradient-bg text-light text-center">
    <!-- Fixed BG -->
    <div class="fixed-bg" style="background-image: url(assets/img/shape/1.png);"></div>
    <!-- Fixed BG -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h1>Agenda</h1>
                <ul class="breadcrumb">
                    <li><a href="{{ url('/') }}"><i class="fas fa-home"></i> Home</a></li>
                    <li class="active">Agenda</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumb -->

<!-- Start Contact Area
    ============================================= -->
<div class="contact-area default-padding">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="card-content">
                            <table id="datatables" class="table is-striped" cellspacing="0" width="100%"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Event Name</th>
                                        <th>Event Location</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Contact -->
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
        searching: false,
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
    // var table = $('#datatables').DataTable();
    // $('.card .material-datatables label').addClass('form-group');
</script>
@endpush