@extends('front.layouts.app')
@section('content')
<!-- Start #main -->

<main id="main">
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero">

        <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
            @foreach(App\Models\News::withAnyTag(['berita'])->with('gambarmuka')->where('terbit', 1)->where('highlight',
            '1')->latest('date')->take(10)->get() as $hl)

            @if ($loop->first)
            @if($hl->gambarmuka)
            @if(Str::contains($hl->gambarmuka, 'https'))
            <div class="carousel-item active" style="background-image: url('{{ $hl->gambarmuka->path }}')">
                @else
                <div class="carousel-item active"
                    style="background-image: url('{{ route('helper.show-picture', ['path' => $hl->gambarmuka->path]) }}')">
                    @endif
                    @else
                    <div class="carousel-item active"
                        style="background-image: url('{{ asset('img/soulofjava.jpg') }}')">
                        @endif
                        <div class="info d-flex align-items-center">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-6 text-center">
                                        <h2 data-aos="fade-down">{{ $hl->title }}</h2>
                                        <p data-aos="fade-up"></p>
                                        <a data-aos="fade-up" data-aos-delay="200"
                                            href="{{ url('/news-detail', $hl->slug) }}" class="btn-get-started">Read
                                            More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    @if($hl->gambarmuka)
                    @if(Str::contains($hl->gambarmuka, 'https'))
                    <div class="carousel-item" style="background-image: url('{{ $hl->gambarmuka->path }}')">
                        @else
                        <div class="carousel-item"
                            style="background-image: url('{{ route('helper.show-picture', ['path' => $hl->gambarmuka->path]) }}')">
                            @endif
                            @else
                            <div class="carousel-item"
                                style="background-image: url('{{ asset('img/soulofjava.jpg') }}')">
                                @endif
                                <div class="info d-flex align-items-center">
                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-6 text-center">
                                                <h2 data-aos="fade-down">{{ $hl->title }}</h2>
                                                <p data-aos="fade-up"></p>
                                                <a data-aos="fade-up" data-aos-delay="200"
                                                    href="{{ url('/news-detail', $hl->slug) }}"
                                                    class="btn-get-started">Read
                                                    More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif

                            <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
                            </a>

                            <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
                            </a>
                            @endforeach
                        </div>

    </section>
    <!-- End Hero Section -->

    <!-- ======= Recent Blog Posts Section ======= -->
    <section id="recent-blog-posts" class="recent-blog-posts">
        <div class="container" data-aos="fade-up">
            <div class=" section-header">
                <h2>Recent Posts</h2>
            </div>

            <div class="row gy-5">

                @foreach($news as $n)
                <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="post-item position-relative h-100">

                        <div class="post-img position-relative overflow-hidden">
                            @if($n->gambarmuka)
                            @if(Str::contains($n->gambarmuka, 'https'))
                            <img loading="lazy" src="{{  $n->gambarmuka->path }}" class="img-fluid"
                                alt="{{ $n->gambarmuka->file_name }}">
                            @else
                            <img loading="lazy"
                                src="{{ route('helper.show-picture', ['path' => $n->gambarmuka->path]) }}"
                                class="img-fluid" alt="{{ $n->gambarmuka->file_name }}">
                            @endif
                            @else
                            <img loading="lazy" src="{{ asset('img/soulofjava.jpg') }}" class="img-fluid" alt="soul of java">
                            @endif
                            <span class="post-date">{{ \Carbon\Carbon::parse($n->date)->format('l') }}, {{
                                \Carbon\Carbon::parse( $n->date
                                )->toFormattedDateString() }}</span>
                        </div>

                        <div class="post-content d-flex flex-column">

                            <h3 class="post-title" style="text-align: justify;">{{ $n->title }}</h3>

                            <div class="meta d-flex align-items-center">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-person"></i> <span class="ps-2">{{ $n->uploader->name ?? 'Admin'
                                        }}</span>
                                </div>
                                <span class="px-3 text-black-50">/</span>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-eye"></i> <span class="ps-2">{{ views($n)->count(); }}</span>
                                </div>
                            </div>

                            <hr>

                            <a href="{{ url('/news-detail', $n->slug) }}" class="readmore stretched-link"><span>Read
                                    More</span><i class="bi bi-arrow-right"></i></a>

                        </div>

                    </div>
                </div>
                @endforeach

            </div>

        </div>
    </section>
    <!-- End Recent Blog Posts Section -->

    <!-- ======= Testimonials Section ======= -->
    @if(App\Models\Testimonial::count() >= 1)
    <section id="testimonials" class="testimonials section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Testimonials</h2>
            </div>

            <div class="slides-2 swiper">
                <div class="swiper-wrapper">

                    @foreach(App\Models\Testimonial::take(5)->get() as $testimonial)
                    <div class="swiper-slide">
                        <div class="testimonial-wrap">
                            <div class="testimonial-item">
                                @if($testimonial->lokasi_foto)
                                <img loading="lazy" class="testimonial-img"
                                    src="{{ route('helper.show-picture', ['path' => $testimonial->lokasi_foto]) }}"
                                    alt="profile picture" style="height: 90px; width: 90px;">
                                @else
                                <img loading="lazy" src="{{ asset('assets/back/sneat/assets/img/avatars/1.png') }}" alt="user-avatar"
                                    class="testimonial-img" style="height: 90px; width: 90px;">
                                @endif
                                <h3>{{ $testimonial->nama }}</h3>
                                <h4>{{ $testimonial->jabatan }}</h4>
                                <!-- <div class="stars"> -->
                                <!-- <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i> -->
                                <!-- </div> -->
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    {{ strip_tags($testimonial->pesan) }}
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section>
    <!-- End Testimonials Section -->
    @endif

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <div class="d-flex justify-content-center mb-3">
                    <a href="https://ayopromo.com">
                        <img loading="lazy" alt="Ayo Promo"
                            src="https://ayopromo.com/show-picture?path=gambar%2FZPAEK8CSkauimapGI5ueJ0iHzsPGqZVYS4Sv0f7H.png"
                            style="width: 500px;">
                    </a>
                </div>
            </div>

            <div class="row gy-4">

                <div class="d-flex justify-content-around mt-3">
                    @for ($index = 0; $index < 6; $index++) <div>
                        <div id=" iklan" title="Ayo lihat Produk ini">
                            <a href="" target="_blank" id="link-iklan{{ $index }}">
                                <img loading="lazy" id="gambar-iklan{{ $index }}" alt="ayopromo.com" style="
                            border: 1px solid #ddd;
                            border-radius: 4px;
                            padding: 5px;
                            width: 150px;
                            height: 150px;
                            ">
                            </a>
                        </div>
                </div>
                @endfor
            </div>

        </div>

        </div>
    </section>
    <!-- End Services Section -->

</main>
<!-- End #main -->
@endsection
@push('after-script')
<script>
    $(document).ready(function () {
        myTimer();
    });

    setInterval(myTimer, 5000);

    function myTimer() {
        @for ($index = 0; $index < 6; $index++)

            fetch("https://ayopromo.com/api/iklan")
                .then(function (response) {
                    return response.json();
                })
                .then(function (data) {
                    var image = document.getElementById('gambar-iklan{{ $index }}');
                    var link = document.getElementById('link-iklan{{ $index }}');
                    // var responses = response.json();
                    // console.log(data.gambar);
                    image.src = data.gambar;
                    link.href = data.link;
                })
                .catch(function (error) {
                    // console.log(error);
                });

        @endfor
    }
</script>
@endpush