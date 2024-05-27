@extends('front.detox.layouts.app')
@section('content')
<section class="banner-section">
    <div class="owl-carousel owl-theme">
        @foreach (App\Models\News::with('gambarmuka')->where('terbit', 1)->where('highlight',
        1)->latest('date')->take(3)->get()
        as $hl)
        <div class="item">
            <div class="pattern-box">
                <div class="pattern-1 wow slideInDown" data-wow-delay="500ms" data-wow-duration="1500ms"
                    style="background-image: url('{{ asset('master/Detox/assets/images/shape/pattern-1.png') }}');">
                </div>
                <div class="pattern-2"
                    style="background-image: url('{{ asset('master/Detox/assets/images/shape/pattern-2.png') }}');">
                </div>
            </div>
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div class="content-box wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <h1>{!!
                                \Illuminate\Support\Str::limit($hl->title, 10,
                                $end='...') !!}</h1>
                            <p>{!!
                                \Illuminate\Support\Str::limit($hl->content, 50,
                                $end='...') !!}</p>
                            <div class="btn-box">
                                <a href="{{ url('/news-detail', $hl->slug) }}" class="theme-btn style-one">Lebih
                                    Detail</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                        <div class="image-box wow slideInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <figure class="image image-1">
                                <!-- 687x612x -->
                                @if ($hl->gambarmuka)
                                <img loading="lazy"
                                    src="{{ route('helper.show-picture', ['path' => $hl->gambarmuka->path]) }}"
                                    alt="thumb"
                                    style="width: 687px !important; height: 612px !important; object-fit: cover !important;">
                                @else
                                <img loading="lazy" src="{{ asset('master/Detox/assets/images/banner/banner-1.png') }}"
                                    alt="thumb">
                                @endif
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

<!-- faq-section -->
<section class="faq-section faq-page-section sec-pad bg-color-1">
    <div class="auto-container">
        <div class="sec-title text-center">
            <h2>Pertanyaan yang Sering Diajukan</h2>
            <div class="text">Berikut adalah pertanyaan yang sering diajukan oleh pengunjung</div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 inner-column">
                <div id="content_block_07">
                    <ul class="accordion-box">
                        @foreach(App\Models\Faq::all() as $faq)
                        <li class="accordion block">
                            <div class="acc-btn">
                                <h4><span>Q.</span>{{ $faq->pertanyaan }}</h4>
                            </div>
                            <div class="acc-content">
                                <div class="content">
                                    <p>{{ $faq->jawaban }}</p>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- faq-section end -->
@endsection
@push('after-script')
<!-- Load Owl Carousel library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<!-- Script inisialisasi slider -->
<script>
    $(document).ready(function () {
        $(".owl-carousel").owlCarousel({
            items: 1,
            loop: true,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true
        });
    });
</script>
@endpush