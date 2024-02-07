@extends('front.layouts.app')
@section('content')
<!-- Page Banner Start -->
<section class="page-banner-area rel z-1 text-white text-center"
    style="background-image: url({{ asset('assets/front/images/banner.jpg') }});">
    <div class="container">
        <div class="banner-inner rpt-10">
            <h2 class="page-title wow fadeInUp delay-0-2s">{{ $hasil }}</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb wow fadeInUp delay-0-4s">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">beranda</a></li>
                    <li class="breadcrumb-item active">Postingan</li>
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
                <table id="dataTable" class="display" style="width:100%" wire:ignore>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Halaman</th>
                            <th>Kategori</th>
                            <th class="disabled-sorting text-center">
                                Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</section>
<!-- Blog Standard End -->
@endsection
@push('after-script')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
</head>
<script type="text/javascript">
    $(document).ready(function () {
        var dataTable = $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            // ajax: "{{ route('global.search') }}",
            columns: [
                { data: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'title', name: 'title', className: "text-center", defaultContent: 'N/A' },
                { data: 'kategori', name: 'kategori', className: "text-center" },
                { data: 'action', className: "text-center" },
            ],
            columnDefs: [
                { targets: [2], visible: false } // Hide the Category column (index 1)
            ]
        });


    });
</script>
@endpush