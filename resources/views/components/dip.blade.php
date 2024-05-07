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
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#datatables2').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('dikecualikan') }}",
            columns: [
                { data: 'DT_RowIndex', orderable: false, searchable: false, className: "text-center" },
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