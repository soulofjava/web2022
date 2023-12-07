@extends('front.anada.layouts.app')
@section('content')
<div class="blog-area full-blog blog-standard full-blog default-padding">
    <div class="container">
        <div class="blog-items">
            <div class="row">
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
                <div class="d-flex justify-content-center">
                    {{ $gallery->links('vendor.pagination.anada') }}
                </div>
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