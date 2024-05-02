@extends('back.sneat.layouts.app')
@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="#">Menu</a>
            </li>
            <li class="breadcrumb-item active">Data</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-body">
            @if ($message = Session::get('success'))
            <div id="elementId" hidden>{{ $message }}</div>
            @endif
            <div class="card-datatable table-responsive pt-0">
                @include('vendor.menu-builder.menu-html')
            </div>
        </div>
    </div>
</div>
<!-- / Content -->
@endsection
@push('after-script')
{!! Menu::scripts() !!}
<script type="text/javascript">
    $(document).ready(function () {
        if ($('#elementId').length > 0) {
            const pesan = document.getElementById('elementId').innerText;
            console.log(pesan);
            Swal.fire(
                'OK!',
                'Data berhasil disimpan.',
                'success'
            )
        }
    });
</script>
@endpush