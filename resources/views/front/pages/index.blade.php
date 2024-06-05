@extends('front.layouts.app')
@section('content')
<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach (App\Models\GambarSlide::all() as $item)
        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
            @mobile
            <img loading="lazy" src="{{ route('helper.show-picture', ['path' => $item->path]) }}" class="d-block w-100"
                alt="Hero Image 1" style="background-repeat: no-repeat;
                        background-position: center;
                        background-size: cover;
                        height: 300px;
                        ">
            @elsemobile
            <img loading="lazy" src="{{ route('helper.show-picture', ['path' => $item->path]) }}" class="d-block w-100"
                alt="Hero Image 1" style="background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            height: 100vh;
            ">
            @endmobile
        </div>
        @endforeach
    </div>
</div>

<!-- Features Section Start -->
<section class="features-section rel z-1 pt-40 pb-50 bg-blue text-white">
    <div class="container">
        <div class="row justify-content-center">
            @foreach($related as $rr)
            <div class="col-lg-2 col-md-4 col-6 mt-3 d-flex justify-content-center align-items-center">
                <div class="feature-item wow fadeInUp delay-0-2s">
                    <div class="image">
                        <a href="{{ $rr->url }}" target="_blank">
                            @if(Storage::exists($rr->path_logo))
                            <img loading="lazy" src="{{ route('helper.show-picture', ['path' => $rr->path_logo]) }}"
                                alt="Icon" style="max-width: 100px; max-height: 100px; object-fit: cover;">
                            @else
                            <img src="{{ asset('assets/front/images/features/icon2.png') }}" alt="Icon">
                            @endif
                        </a>
                        <div class="mt-3">
                            <a href="{{ $rr->url }}" target="_blank">
                                <h6>{{ $rr->name }}</h6>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <img class="rectangle-dots" src="{{ asset('assets/front/images/shapes/rectangle-dots.png') }}" alt="Shape">
    <img class="circle-dots" src="{{ asset('assets/front/images/shapes/circle-dots.png') }}" alt="Shape">
</section>
<!-- Features Section End -->

<!-- Coach Section Start -->
<section class="coach-section rel z-1 pt-40 rpt-90 rpb-70 bg-lighter">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-7 col-md-8">
                <div class="section-title text-center mb-40">
                    <h3>Berita</h3>
                </div>
            </div>
        </div>
        <div class="row coach-active justify-content-center">
            @foreach($news as $n)
            <div class="col-lg-3 col-md-6 item marketing technology">
                <div class="coach-item wow fadeInUp delay-0-2s">
                    <div class="coach-image">
                        <a href="{{ url('/news-detail', $n->slug) }}">
                            @if($n->gambarmuka)
                            <img loading="lazy"
                                src="{{ route('helper.show-picture', ['path' => $n->gambarmuka->path]) }}"
                                class="img-thumbnail" alt="{{ $n->gambarmuka->file_name }}"
                                style="object-fit: cover; width: 270px; height: 148px">
                            @else
                            <img src="{{ asset('assets/bkdwonosobo.png') }}" alt="Course">
                            @endif
                        </a>
                    </div>
                    <div class="coach-content" style="height: 100px; text-align: center;">
                        <h6>
                            <a href="{{ url('/news-detail', $n->slug) }}">{{ Str::limit($n->title, 30, '...') }}</a>
                        </h6>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Coach Section End -->

<!-- Coach Section Start -->
<section class="coach-section rel z-1 pt-40 rpt-90 rpb-70">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-7 col-md-8">
                <div class="section-title text-center mb-40">
                    <h3>Informasi Umum</h3>
                </div>
            </div>
        </div>
        <!-- <ul class="coach-filter mb-35">
            <li data-filter="*" class="current">Show All</li>
            <li data-filter=".design">Web Design</li>
            <li data-filter=".marketing">Marketing</li>
            <li data-filter=".development">Development</li>
            <li data-filter=".technology">IT & Technology</li>
            <li data-filter=".photography">Photography</li>
        </ul> -->
        <div class="row coach-active justify-content-center">
            @foreach(App\Models\News::where('terbit', 1)->where('tag',
            'informasi umum')->latest('date')->get() as $iu)
            <div class="col-lg-3 col-md-6 item marketing technology">
                <div class="coach-item wow fadeInUp delay-0-2s">
                    <div class="coach-image">
                        <a href="{{ url('/news-detail', $iu->slug) }}">
                            @if($iu->gambarmuka)
                            <img loading="lazy"
                                src="{{ route('helper.show-picture', ['path' => $iu->gambarmuka->path]) }}"
                                class="img-thumbnail" alt="{{ $iu->gambarmuka->file_name }}"
                                style="object-fit: cover; width: 270px; height: 148px">
                            @else
                            <img src="{{ asset('assets/bkdwonosobo.png') }}" alt="Course">
                            @endif
                        </a>
                        <!-- <img src="{{ asset('assets/front/images/coachs/coach1.jpg') }}" alt="Coach"> -->
                    </div>
                    <div class="coach-content" style="height: 100px; text-align: center;">
                        <!-- <span class="label">Basic Coach</span> -->
                        <h6>
                            <a href="{{ url('/news-detail', $iu->slug) }}">{{ Str::limit($iu->title, 30, '...') }}</a>
                        </h6>
                        <!-- <div class="ratting-price">
                            <div class="ratting">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span>(3k)</span>
                            </div>
                            <span class="price">256.95</span>
                        </div> -->
                        <!-- <ul class="coach-footer">
                            <li><i class="far fa-file-alt"></i><span>12 Lessions</span></li>
                            <li><i class="far fa-user"></i><span>seats</span></li>
                        </ul> -->
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Coach Section End -->

<!-- Advertise Area Start -->
<section class="advertise-area pt-40 pb-100 rpb-70 bg-lighter">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-7 col-md-8">
                <div class="section-title text-center mb-40">
                    <h3>Buku Petunjuk Aplikasi</h3>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach(App\Models\BukuPedoman::get() as $bp)
            <div class="col-lg-6">
                <div class="advertise-item {{ ($loop->odd) ? 'bg-two' : '' }} wow fadeInUp delay-0-2s">
                    <div class="content">
                        <h4>{{ $bp->judul }}</h4>
                        <p>{{ $bp->keterangan }}</p>
                        <a target="_blank" href="{{ route('helper.show-picture', ['path' => $bp->path_file]) }}"
                            class="theme-btn">Lihat lebih detail <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div class="image">
                        <img loading="lazy" src="{{ route('helper.show-picture', ['path' => $bp->path_foto]) }}"
                            height="150px" width="150px" alt="Advertise">
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Advertise Area End -->

<!-- Advertise Area Start -->
<section class="advertise-area pt-40 pb-100 rpb-70">
    <div class="">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-7 col-md-8">
                <div class="section-title text-center mb-40">
                    <h3>Struktur BKD</h3>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach(App\Models\Personil::get()->chunk(5) as $chunk)
                    <div class="carousel-item {{ ($loop->first) ? 'active' : '' }}">
                        <div class="row justify-content-between" style="padding-right: 50px;">
                            @foreach($chunk as $personil)
                            <div class="col-md-2">
                                <div class="testimonial-card">
                                    <img loading="lazy"
                                        src="{{ route('helper.show-picture', ['path' => $personil->path_foto]) }}"
                                        alt="{{ $personil->nama }}">
                                    <p>{{ $personil->nama }}</p>
                                    <footer class="blockquote-footer">{{ $personil->jabatan }}</footer>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Advertise Area End -->
<!-- Counter Start -->
<div class="counter-section-three">
    <div class="container">
        <div class="counter-three-wrap bg-light-blue text-white">
            <div class="success-item">
                <span class="count-text " data-speed="3000" data-stop="{{ jmlpegawai() }}">0</span>
                <span>Jumlah ASN</span>
            </div>
            <div class="success-item">
                <span class="count-text " data-speed="3000" data-stop="{{ jmlpns() }}">0</span>
                <span>Jumlah PNS</span>
            </div>
            <div class="success-item">
                <span class="count-text " data-speed="3000" data-stop="{{ jmlpppk() }}">0</span>
                <span>Jumlah PPPK</span>
            </div>
            <div class="success-item">
                <span class="count-text " data-speed="3000" data-stop="{{ jmlcpns() }}">0</span>
                <span>Jumlah CPNS</span>
            </div>
            <div class="success-item">
                <span class="count-text " data-speed="3000" data-stop="{{ jmlstruktural() }}">0</span>
                <span>Jumlah Struktural</span>
            </div>
            <div class="success-item">
                <span class="count-text " data-speed="3000" data-stop="{{ jmlfungsional() }}">0</span>
                <span>Jumlah Fungsional</span>
            </div>
            <div class="success-item">
                <span class="count-text " data-speed="3000" data-stop="{{ jmlpelaksana() }}">0</span>
                <span>Jumlah Pelaksana</span>
            </div>
            <div class="success-item">
                <span class="count-text " data-speed="3000" data-stop="{{ jmlpensiunblnini() }}">0</span>
                <span>Jumlah Pensiun Bulan Ini</span>
            </div>
        </div>
    </div>
</div>
<!-- Counter End -->
@endsection
@push('after-style')
<style>
    .testimonial-card {
        width: 200px;
        height: 400px;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 20px;
        margin: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .testimonial-card img {
        width: 150px;
        height: 150px;
        object-fit: contain;
        /* border-radius: 50%; */
        margin-bottom: 15px;
    }

    .testimonial-card p {
        font-size: 1rem;
        font-style: italic;
    }

    .testimonial-card footer {
        font-size: 0.9rem;
        color: #777;
    }
</style>
@endpush