@extends('front.blubuild.layouts.app')
@section('content')
<section>
    <div class="w-100 pt-170 pb-150 dark-layer3 opc7 position-relative">
        <div class="fixed-bg" style="background-image: url(assets/images/pagetop-bg.jpg);"></div>
        <div class="container">
            <div class="page-top-wrap w-100">
                @if($data->menu_name == 'Permohonan Informasi Publik')
                <h1>{{ $data->menu_induk->menu_name }}</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" title="">Home</a></li>
                    <li class="breadcrumb-item"><a href="#" title="">Layanan</a></li>
                    <li class="breadcrumb-item active">Permohonan Informasi Publik</li>
                </ol>
                @elseif($data->menu_name == 'Pengajuan Keberatan Informasi Publik')
                <h1>{{ $data->menu_induk->menu_name }}</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" title="">Home</a></li>
                    <li class="breadcrumb-item"><a href="#" title="">Layanan</a></li>
                    <li class="breadcrumb-item active">Pengajuan Keberatan Informasi Publik</li>
                </ol>
                @else
                <h1 class="mb-0">{{ $data->menu_induk->menu_name }}</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" title="">Home</a></li>
                    <li class="breadcrumb-item"><a href="#" title="">Page</a></li>
                    <li class="breadcrumb-item active">{{ $data->menu_name }}</li>
                </ol>
                @endif
            </div>
            <!-- Page Top Wrap -->
        </div>
    </div>
</section>
<section>
    <div class="w-100 pt-100 pb-100 position-relative">
        <div class="container">
            <div class="post-detail-wrap w-100">
                <div class="row">
                    @if($data->menu_name == 'Permohonan Informasi Publik')
                    <x-formpermohonaninformasipublik />
                    @elseif($data->menu_name == 'Pengajuan Keberatan Informasi Publik')
                    <x-formpengajuankeberataninformasipublik />
                    @else
                    {!! $data->content !!}
                    @endif
                </div>
            </div>
            <!-- Blog Detail Wrap -->
        </div>
    </div>
</section>
@endsection
@push('after-script')
@endpush