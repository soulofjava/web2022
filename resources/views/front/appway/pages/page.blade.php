@extends('front.appway.layouts.app')
@section('content')
<!-- preloader -->
<div class="preloader"></div>
<!-- preloader -->

<!-- page-title -->
<section class="page-title" style="background-image: url('/assets/front/appway/images/background/pagetitle-bg.png');">

    <div class="anim-icons">
        <div class="icon icon-1"><img src="{{ asset('assets/front/appway/images/icons/anim-icon-17.png') }}" alt="">
        </div>
        <div class="icon icon-2 rotate-me"><img src="{{ asset('assets/front/appway/images/icons/anim-icon-18.png') }}"
                alt=""></div>
        <div class="icon icon-3 rotate-me"><img src="{{ asset('assets/front/appway/images/icons/anim-icon-19.png') }}"
                alt=""></div>
        <div class="icon icon-4"></div>
    </div>
    <div class="container">
        <div class="content-box clearfix">
            <div class="title-box pull-left">
                <a href="{{ url('/') }}">
                    <h1>{{ $data->menu_name }}</h1>
                </a>
                <!-- <p>Reach out to the world’s most reliable IT services.</p> -->
            </div>
            <!-- <ul class="bread-crumb pull-right">
                <li>Blog Details</li>
                <li><a href="/">Home</a></li>
            </ul> -->
        </div>
    </div>
</section>
<!-- page-title end -->

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