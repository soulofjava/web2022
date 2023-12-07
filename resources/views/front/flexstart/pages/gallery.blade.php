@extends('front.flexstart.layouts.app')
@section('content')
<!-- ======= Gallery Section ======= -->
<section id="gallery" class="portfolio">

    <div class="container" data-aos="fade-up">

        <header class="section-header">
            <h2>Gallery</h2>
            <p>Check our latest photo</p>
        </header>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-12 d-flex justify-content-center">
                {{ $gallery->links() }}
            </div>
        </div>

        <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
            @foreach($gallery as $g)
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="d-flex justify-content-center">
                    @foreach($g->gambar as $pic)
                    @if($loop->iteration == 1)
                    <a data-fancybox="gallery-group-{{ $pic->id_news }}" 
                        href="{{ asset('storage/') }}/{{ $pic->path }}" data-caption="{{ $g->description }}">
                        <img src="{{ asset('storage/') }}/{{ $pic->path }}" class="img-fluid">
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
@endsection
@push('after-script')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
@endpush