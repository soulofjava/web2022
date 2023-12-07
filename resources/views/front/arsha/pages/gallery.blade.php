@extends('front.arsha.layouts.app')
@section('content')
<main id="main">

    <!-- keanehan yang terjadi jika div dibawah ini dihapus maka slideshow blank hitam -->
    <div class="skills-content">
    </div>
    <!-- end of aneh -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="portfolio">

        <div class="container mt-5" data-aos="fade-up">

            <div class="section-title">
                <h2>Gallery</h2>
                <!-- <p>Check our latest photo</p> -->
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-12 d-flex justify-content-center">
                    {{ $gallery->links() }}
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
        </div>

    </section>
    <!-- End Gallery Section -->
</main>
@endsection
@push('after-script')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
@endpush