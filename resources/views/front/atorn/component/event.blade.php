@extends('front.atorn.layouts.app')
@section('content')
<!-- Page banner Area -->
<div class="page-banner bg-1">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-content">
                    <h2>Agenda</h2>
                    <ul>
                        <li><a href="{{ url('/') }}">Home <i class="las la-angle-right"></i></a></li>
                        <li>Agenda</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Page banner Area -->

<!-- News & Blog Area -->
<div class="blog-area ptb-100">
    <div class="container">
        <div class="row">
            <table id="datatables" class="table is-striped" cellspacing="0" width="100%" style="width:100%">
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
<!-- End News & Blog Area -->

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