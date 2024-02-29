<div>
    @push('after-style')
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <style>
        .pagination>li.active>a {
            background: #ffc009;
            color: #fff;
        }
    </style>
    @endpush
    <table id="datatables2" class="table-hover table-striped" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Tahun</th>
                <th>Judul</th>
                <th class="disabled-sorting text-center">
                    Aksi</th>
            </tr>
        </thead>
    </table>
    @push('after-script')
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#datatables2').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('tabel', $datane) }}",
                columns: [
                    { data: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'dip_tahun', name: 'dip_tahun', className: "text-center" },
                    { data: 'title', name: 'title', className: "" },
                    { data: 'action', className: "text-center" },
                ],
                columnDefs: [
                    { className: "dt-head-center", targets: [0, 1, 2, 3] },
                ]
            });
        });
    </script>
    @endpush
</div>