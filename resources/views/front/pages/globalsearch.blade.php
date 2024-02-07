@extends('front.layouts.app')
@section('content')
<!-- Banner Area Starts -->
<section class="banner-area other-page">
    <div class="container">
        <div class="row header-judul">
            <div class="col-lg-12">
                <h1>{{ $hasil }}</h1>
                <a href="{{ url('/') }}">Beranda</a> <span>|</span> <a href="#">Postingan</a>
            </div>
        </div>
    </div>
</section>
<!-- Banner Area End -->

<!--================Blog Area =================-->
<section class="blog_area mt-3">
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
<!--================Blog Area =================-->
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