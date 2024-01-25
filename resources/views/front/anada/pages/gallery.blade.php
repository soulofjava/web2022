@extends('front.anada.layouts.app')
@section('content')
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
                            @if(file_exists(public_path('storage/'.$g->path)))
                            <a data-fancybox="gallery" href="{{ route('helper.show-picture', ['path' => $g->path]) }}"><img
                                    src="{{ route('helper.show-picture', ['path' => $g->path]) }}" class="img-fluid"></a>
                            @else
                            <a data-fancybox="gallery" href="{{ asset('img/soulofjava.jpg') }}"><img
                                    src="{{ asset('img/soulofjava.jpg') }}" class="img-fluid" alt="soulofjava"></a>
                            @endif
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