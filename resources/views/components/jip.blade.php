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
<div style="width: 100% !important;">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="tab1-tab" data-bs-toggle="tab" href="#tab1" role="tab" aria-controls="tab1"
                aria-selected="true">
                Informasi Berkala | Setiap Saat | Serta Merta
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tab2-tab" data-bs-toggle="tab" href="#tab2" role="tab" aria-controls="tab2"
                aria-selected="false">
                Daftar Informasi Publik (DIP)
            </a>
        </li>
    </ul>

    <!-- Tab content -->
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
            <!-- Content for Tab 1 -->
            <div class="form-group text-center my-3">
                {{Form::select('kategori', get_code_group('INFORMASI_ST')->take(3), null, ['class' =>
                'form-control','placeholder' => 'Semua Data','id'=>'filterSelect'])}}
            </div>
            <table id="dataTable" class="table-hover table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul Postingan</th>
                        <th>Kategori</th>
                        <th class="disabled-sorting text-center">
                            Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="tab-pane fade mt-3" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
            <!-- Content for Tab 2 -->
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
        </div>
    </div>

</div>
@push('after-script')
<script type="text/javascript" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        var dataTable = $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('datappid') }}",
            columns: [
                { data: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'menu_name', name: 'menu_name', className: "", defaultContent: 'N/A' },
                { data: 'kategori', name: 'kategori', className: "text-center" },
                { data: 'action', className: "text-center" },
            ],
            columnDefs: [
                { targets: [2], visible: false }, // Hide the Category column (index 1)
                { className: "dt-head-center", targets: [0, 1, 3] },
            ]
        });

        $('#filterSelect').on('change', function () {
            var selectedValue = $(this).val();
            dataTable.column(2).search(selectedValue).draw();
        });

        $('#datatables2').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('datappid2') }}",
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