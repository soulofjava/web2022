@extends('back.a.layouts.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        {{ Breadcrumbs::render('news') }}
        @if ($message = Session::get('success'))
        <div id="elementId" hidden>{{ $message }}</div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="green">
                        <i class="material-icons">event_note</i>
                    </div>
                    <div class="card-content">
                        <div class="text-right">
                            <a href="{{ route('news.create') }}" class="btn btn-info btn-round">Tambah Data <i
                                    class="material-icons">add_circle_outline</i>
                                <div class="ripple-container"></div>
                            </a>
                        </div>
                        <div class="toolbar text-right">
                        </div>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover devan"
                                cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Judul</th>
                                        <th>Tanggal</th>
                                        <th class="disabled-sorting text-center">
                                            Aksi</th>
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
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search records",
        },
        columns: [
            { data: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'title', name: 'title', className: "text-center" },
            { data: 'tgl', className: "text-center" },
            { data: 'action', className: "text-center" },
        ]

    });
</script>
<script>
    $(document).ready(function () {
        if ($('#elementId').length > 0) {
            const pesan = document.getElementById('elementId').innerText;
            console.log(pesan);
            demo.showNotification('top', 'center', pesan)
        }
    });
</script>
@endpush