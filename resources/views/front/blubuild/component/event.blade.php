@extends('front.blubuild.layouts.app')
@section('content')
<section>
    <div class="w-100 pt-170 pb-150 dark-layer3 opc7 position-relative">
        <div class="fixed-bg" style="background-image: url(assets/images/pagetop-bg.jpg);"></div>
        <div class="container">
            <div class="page-top-wrap w-100">

                <h1 class="mb-0">Agenda</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" title="">Home</a></li>
                    <li class="breadcrumb-item"><a href="#" title="">Page</a></li>
                    <li class="breadcrumb-item active">Agenda</li>
                </ol>

            </div>
            <!-- Page Top Wrap -->
        </div>
    </div>
</section>
<section>
    <div class="w-100 pt-100 pb-100 position-relative">
        <div class="container">
            <div class="post-detail-wrap w-100">
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
            <!-- Blog Detail Wrap -->
        </div>
    </div>
</section>
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