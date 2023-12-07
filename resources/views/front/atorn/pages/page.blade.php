@extends('front.atorn.layouts.app')
@section('content')
<!-- Page banner Area -->
<div class="page-banner bg-1">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-content">
                    @if($data->menu_name == 'Permohonan Informasi Publik')
                    <h2>Layanan</h2>
                    <ul>
                        <li><a href="{{ url('/') }}">Home <i class="las la-angle-right"></i></a></li>
                        <li>Permohonan Informasi Publik</li>
                    </ul>
                    @elseif($data->menu_name == 'Pengajuan Keberatan Informasi Publik')
                    <h2>Layanan</h2>
                    <ul>
                        <li><a href="{{ url('/') }}">Home <i class="las la-angle-right"></i></a></li>
                        <li>Pengajuan Keberatan Informasi Publik</li>
                    </ul>
                    @else
                    <h2>{{ $data->menu_name }}</h2>
                    <ul>
                        <li><a href="{{ url('/') }}">Home <i class="las la-angle-right"></i></a></li>
                        <li>Page</li>
                    </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Page banner Area -->


<!-- Start Contact Area
    ============================================= -->
<div class="contact-area default-padding">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="card-content">
                            @if($data->menu_name == 'Permohonan Informasi Publik')
                            <x-form-permohonan-informasi-publik />
                            @elseif($data->menu_name == 'Pengajuan Keberatan Informasi Publik')
                            <x-form-pengajuan-keberatan-informasi-publik />
                            @else
                            {!! $data->content !!}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('after-script')
@endpush