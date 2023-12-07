@extends('front.herobiz.layouts.app')
@section('content')
<section id="gallery" class="portfolio">
    <div class="container" data-aos="fade-up">
        <header class="section-header">
            <h2>Gallery</h2>
            <p>Check our latest photo</p>
        </header>
        <div class="container-fluid" data-aos="fade-up" data-aos-delay="200">
            <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
                data-portfolio-sort="original-order">
                <div class="row g-0">
                    @foreach($gallery as $g)
                    <div class="col-xl-3 col-lg-4 col-md-6" style="display: flex">
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
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row mt-3" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-12 d-flex justify-content-center">
                {{ $gallery->links() }}
            </div>
        </div>
    </div>
</section>
@endsection
@push('after-script')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
@endpush