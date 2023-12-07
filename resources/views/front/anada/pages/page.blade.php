@extends('front.anada.layouts.app')
@section('content')
<!-- Start Breadcrumb 
        ============================================= -->
<div class="breadcrumb-area gradient-bg text-light text-center">
    <!-- Fixed BG -->
    <div class="fixed-bg" style="background-image: url(assets/img/shape/1.png);"></div>
    <!-- Fixed BG -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h1>{{ $data->menu_name }}</h1>
                <ul class="breadcrumb">
                    <li><a href="{{ url('/') }}"><i class="fas fa-home"></i> Home</a></li>
                    <li class="active">{{ $data->menu_name }}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumb -->

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
<!-- End Contact -->
@endsection
@push('after-script')
@endpush