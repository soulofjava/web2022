@extends('front.appway.layouts.app')
@section('content')
<!-- preloader -->
<div class="preloader"></div>
<!-- preloader -->

<!-- page-title -->
<section class="page-title" style="background-image: url('/assets/front/appway/images/background/pagetitle-bg.png');">

    <div class="anim-icons">
        <div class="icon icon-1"><img src="{{ asset('assets/front/appway/images/icons/anim-icon-17.png') }}" alt="">
        </div>
        <div class="icon icon-2 rotate-me"><img src="{{ asset('assets/front/appway/images/icons/anim-icon-18.png') }}"
                alt=""></div>
        <div class="icon icon-3 rotate-me"><img src="{{ asset('assets/front/appway/images/icons/anim-icon-19.png') }}"
                alt=""></div>
        <div class="icon icon-4"></div>
    </div>
    <div class="container">
        <div class="content-box clearfix">
            <div class="title-box pull-left">
                <h1>Agenda</h1>
                <!-- <p>Reach out to the world’s most reliable IT services.</p> -->
            </div>
            <!-- <ul class="bread-crumb pull-right">
                <li>Home</li>
                <li><a href="/">Home</a></li>
            </ul> -->
        </div>
    </div>
</section>
<!-- page-title end -->

<!-- contact-section -->
<section class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-md-12 col-sm-12 offset-lg-1 big-column">
                <!-- Start Tabel Area
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
                <!-- End Table -->

            </div>
        </div>
    </div>
</section>
<!-- contact-section end -->

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