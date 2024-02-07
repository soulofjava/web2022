@extends('front.layouts.app')
@section('content')
<!-- Page Banner Start -->
<section class="page-banner-area rel z-1 text-white text-center"
    style="background-image: url({{ asset('assets/front/images/banner.jpg') }});">
    <div class="container">
        <div class="banner-inner rpt-10">
            <h2 class="page-title wow fadeInUp delay-0-2s">{{ $data->menu_name }}</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb wow fadeInUp delay-0-4s">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">beranda</a></li>
                    <li class="breadcrumb-item active">Postingan</li>
                </ol>
            </nav>
        </div>
    </div>
    <img class="circle-one" src="{{ asset('assets/front/images/shapes/circle-one.png') }}" alt="Circle">
    <img class="circle-two" src="{{ asset('assets/front/images/shapes/circle-two.png') }}" alt="Circle">
</section>
<!-- Page Banner End -->

<!-- Blog Details Start -->
<section class="blog-details-area py-130 rpy-100">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="blog-details-wrap">
                    @if($data->menu_name == 'Daftar Informasi Publik')
                    <x-jip />
                    @elseif($data->title)
                    {!! $data->description !!}
                    @else
                    {!! $data->content !!}
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Details End -->
@endsection