@extends('front.detox.layouts.app')

@section('content')
    <!-- banner-section -->
    <section class="banner-section">
        <div class="pattern-box">
            <div class="pattern-1 wow slideInDown" data-wow-delay="500ms" data-wow-duration="1500ms"
                style="background-image: url(assets/images/shape/pattern-1.png);"></div>
            <div class="pattern-2" style="background-image: url('{{ asset('assets/images/shape/pattern-2.png') }}');"></div>
        </div>
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                    <div class="content-box wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <h1>Data Analytics Techniques with <span class="animation_text_word"></span> Systems.</h1>
                        <p>Detox's real-time data management technologies, global data marketplaces, and award-winning
                            customer service make our unstacked data solutions.</p>
                        {{-- <div class="btn-box">
                            <a href="index.html" class="theme-btn style-one">Learn More</a>
                            <a href="https://www.youtube.com/watch?v=nfP5N9Yc72A&amp;t=28s" class="lightbox-image video-btn"
                                data-caption=""><i class="flaticon-play"></i>Watch
                                Video</a>
                        </div> --}}
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                    <div class="image-box wow slideInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <figure class="image image-1"><img
                                src="{{ asset('master/detox/assets/images/banner/banner-1.png') }}" alt="">
                        </figure>
                        <figure class="image image-2 float-bob-y"><img
                                src="{{ asset('master/detox/assets/images/banner/banner-2.png') }}" alt=""></figure>
                        <figure class="image image-3 wow slideInDown" data-wow-delay="500ms" data-wow-duration="1500ms">
                            <img src="{{ asset('master/detox/assets/images/banner/banner-5.png') }}" alt="">
                        </figure>
                        <figure class="image image-4"><img
                                src="{{ asset('master/detox/assets/images/banner/banner-3.png') }}" alt="">
                        </figure>
                        <figure class="image image-5 rotate-me"><img
                                src="{{ asset('master/detox/assets/images/banner/banner-4.png') }}" alt="">
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner-section end -->
@endsection
