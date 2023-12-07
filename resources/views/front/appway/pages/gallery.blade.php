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
                    <h1>{{ $data_website->web_name }}</h1>
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

<div class="blog-area full-blog blog-standard full-blog default-padding">
    <div class="container">
        <div class="blog-items">
            <div class="row mb-3">
                <div class="col text-center">
                    <h2>Gallery</h2>
                </div>
            </div>
            <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
                @foreach($gallery as $g)
                <div class="col-lg-4 col-md-6 portfolio-item filter-web" style="display: flex">
                    <div class="portfolio-img">
                        @foreach($g->gambar as $pic)
                        @if($loop->iteration == 1)
                        <a data-fancybox="gallery-group-{{ $pic->id_news }}" 
                            href="{{ asset('storage/') }}/{{ $pic->path }}" data-caption="{{ $g->description }}">
                            <img src="{{ asset('storage/') }}/{{ $pic->path }}" class="img-fluid"
                                style="height: 250px;">
                        </a>
                        @else
                        <div style="display:none;">
                            <a data-fancybox="gallery-group-{{ $pic->id_news }}" 
                                href="{{ asset('storage/') }}/{{ $pic->path }}" data-caption="{{ $g->description }}">
                                <img src="{{ asset('storage/') }}/{{ $pic->path }}" class="img-fluid">
                            </a>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col text-center">
                {{ $gallery->links('vendor.pagination.appway') }}
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@push('after-script')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
@endpush