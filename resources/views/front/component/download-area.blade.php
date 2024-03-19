@extends('front.layouts.app')
@section('content')
<!-- Blog Standard Start -->
<section class="blog-standard-area py-130 rpt-95 rpb-100" style="height: 100vh; overflow-y: auto;">
    <div class="container">
        <div class="row">
            <div class="col">
                <table id="dataTable" class="display" style="width:100%" wire:ignore>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th class="disabled-sorting text-center">
                                Download</th>
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
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        var dataTable = $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            // ajax: "{{ route('global.search') }}",
            columns: [
                { data: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'judul', name: 'judul', className: "", defaultContent: 'N/A' },
                { data: 'download', className: "text-center" },
            ],
        });
    });
</script>
@endpush
