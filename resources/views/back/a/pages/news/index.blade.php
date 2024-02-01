@extends('back.a.layouts.app')
@push('after-style')
<!-- Plugin css for this page -->
<link rel="stylesheet" href="{{ asset('assets/back/md/assets/vendors/datatables/css/jquery.dataTables.min.css') }}" />
@endpush
@section('content')
<main class="content-wrapper">
    <div class="mdc-layout-grid">
        <div class="mdc-layout-grid__inner">
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                <div class="mdc-card">
                    <h6 class="card-title card-padding pb-0">Data Table</h6>
                    <div class="table-responsive">
                        <table id="tabelku" class="table">
                            <thead>
                                <tr role="row">
                                    <th>id</th>
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
</main>
@endsection
@push('after-script')
<!-- Plugin js for this page-->
<script src="{{ asset('assets/back/md/assets/vendors/datatables/js/jquery.dataTables.min.js') }}"></script>
<!-- End plugin js for this page-->
<!-- Custom js for this page-->
<script src="{{ asset('assets/back/md/assets/js/datatable.js') }}"></script>
<!-- End custom js for this page-->
<script type="text/javascript">
    var extensions = {
        sFilter: "dataTables_filter mdc-filter",
        sLength: "dataTables_length mdc-sort-filter"
    };
    // Used when bJQueryUI is false
    $.extend($.fn.dataTableExt.oStdClasses, extensions);
    $.extend($.fn.dataTableExt.oJUIClasses, extensions);
    $('#tabelku').DataTable({
        paginate: true,
        pageLength: 10,
        lengthMenu: [
            [5, 10, -1],
            [5, 10, "Show all"]
        ],
        responsive: true,
        processing: true,
        serverSide: true,
        columns: [
            { data: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'title', name: 'title', className: "text-center" },
            { data: 'tgl', className: "text-center" },
            { data: 'action', className: "text-center" },
        ]
    });
</script>
<script>
    // Mengambil referensi elemen
    var myButton = document.getElementById("tabelku");

    // Menghapus class tertentu
    myButton.classList.remove("no-footer");
    myButton.classList.remove("dataTable");
</script>
@endpush