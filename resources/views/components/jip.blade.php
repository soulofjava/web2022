@push('after-style')
<style>
    /* Warna link saat tidak aktif */
    .nav-link {
        color: black;
        /* Warna biru */
    }

    /* Warna link saat dihover */
    .nav-link:hover {
        color: red;
        /* Warna merah */
    }

    /* Warna link saat aktif */
    a.nav-link.active {
        color: red !important;
        /* Warna merah */
    }

    /* Untuk tombol dengan kelas butone */
    .butone {
        background-color: #FF4135;
        /* Ubah warna latar belakang */
        color: white;
        /* Ubah warna teks */
        border: none;
        /* Hapus batas */
        padding: 8px 16px;
        /* Atur padding */
        border-radius: 4px;
        /* Atur border-radius untuk sudut yang lebih lembut */
    }

    /* Untuk mengubah warna tombol saat dihover */
    .butone:hover {
        background-color: #aa3931;
        /* Ubah warna latar belakang saat dihover */
    }

    /* Gaya untuk dropdown Nice Select dengan lebar 100% */
    .nice-select {
        width: 100%;
        text-align: center !important;
    }
</style>
@endpush
<div>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#tab1">
                Informasi Berkala | Setiap Saat | Serta Merta | Dikecualikan
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#tab2">
                Daftar Informasi Publik (DIP)
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div id="tab1" class="tab-pane fade">
            <div class="mt-3 mb-3">
                <div class="row">
                    <div class="col">
                        {{ Form::select('kategori', get_code_group('INFORMASI_ST'), null, ['class' => 'form-control',
                        'placeholder' => 'Semua
                        Data', 'id' => 'filterSelect', 'style' => 'width: 100%; !important']) }}
                    </div>
                </div>
            </div>
            <table id="dataTable" class="table display mt-3" style="width:100%;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th class="disabled-sorting text-center">Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div id="tab2" class="tab-pane fade show active mt-3">
            <div>
                <table id="datatables2" class="table display" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tahun</th>
                            <th>Judul</th>
                            <th class="disabled-sorting text-center">Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@push('after-script')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        var dataTable = $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('datappid') }}",
            columns: [
                { data: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'menu_name', name: 'menu_name', className: "text-center", defaultContent: 'N/A' },
                { data: 'kategori', name: 'kategori', className: "text-center" },
                { data: 'action', className: "text-center" },
            ],
            columnDefs: [
                { targets: [2], visible: false } // Hide the Category column (index 1)
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
                { data: 'title', name: 'title', className: "text-center" },
                { data: 'action', className: "text-center" },
            ]
        });
    });
</script>
@endpush