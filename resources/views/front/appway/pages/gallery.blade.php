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
            <div class="row">
                <div class="col text-center">
                    <h2>Gallery</h2>
                </div>
                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
                    @foreach($gallery as $g)
                    <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                        <div class="portfolio-img">
                            @if(Storage::get($g->path))
                            <a data-fancybox="gallery"
                                href="{{ route('helper.show-picture', ['path' => $g->path]) }}"><img
                                    src="{{ route('helper.show-picture', ['path' => $g->path]) }}" class="img-fluid"
                                    alt="$g->name"></a>
                            @else
                            <a data-fancybox="gallery" href="{{ asset('img/soulofjava.jpg') }}"><img
                                    src="{{ asset('img/soulofjava.jpg') }}" class="img-fluid" alt="soulofjava"></a>
                            @endif
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