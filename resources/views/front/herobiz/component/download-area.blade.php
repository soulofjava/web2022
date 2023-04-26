@extends('front.herobiz.layouts.app')
@section('content')
<main id="main">

    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Page</li>
            </ol>
            <h2>Download Area</h2>

        </div>
    </section>

    <section id="portfolio-details" class="portfolio-details">
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
                                            <th>Judul</th>
                                            <th>Sumber</th>
                                            <th>Tanggal Upload</th>
                                            <th>File</th>
                                            <th>Uploader</th>
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

</main>
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
        lengthChange: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search records",
        },
        columns: [
            { data: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'judul', name: 'judul', className: "text-center" },
            { data: 'sumber', name: 'sumber', className: "text-center" },
            { data: 'tgl', className: "text-center" },
            { data: 'filenya', className: "text-center" },
            { data: 'usernya.name', className: "text-center" },
        ]

    });
    // var table = $('#datatables').DataTable();
    // $('.card .material-datatables label').addClass('form-group');
</script>
@endpush
