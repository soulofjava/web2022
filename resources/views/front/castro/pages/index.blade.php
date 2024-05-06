@extends('front.castro.layouts.app')

@section('content')
<!-- banner-section -->
<section class="banner-style-one">
    <div class="pattern-layer"
        style="background-image: url('{{ asset('master/Castro/assets/images/shape/shape-1.png') }}');"></div>
    <div class="banner-carousel owl-theme owl-carousel">
        @foreach(App\Models\News::with('gambarmuka')->where('terbit', 1)->where('highlight',
        1)->latest('date')->take(3)->get() as $hl)
        <div class="slide-item">
            <div class="auto-container">
                <div class="content-inner">
                    <div class="content-box">
                        <h1>{{ $hl->title }}</h1>
                        <!-- 868x655 -->
                        <!-- <h3>Summer Lookbook - 2020</h3>
                        <p>New Modern Stylist Fashionable Men's Wear Jeans Shirt.</p> -->
                        <div class="btn-box">
                            <a href="{{ url('/news-detail', $hl->slug) }}" class="theme-btn-one">Lebih Detail<i
                                    class="flaticon-right-1"></i></a>
                        </div>
                    </div>
                    <figure class="image-box imgae-3">
                        @if($hl->gambarmuka)
                        <img src="{{ route('helper.show-picture', ['path' => $hl->gambarmuka->path]) }}" alt="thumb"
                           style="width: 868px !important; height: 655px !important; object-fit: fill !important;">
                        @else
                        <img src="{{ asset('master/Castro/assets/images/banner/banner-image-3.png') }}" alt="thumb">
                        @endif
                    </figure>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
<!-- banner-section end -->
@endsection