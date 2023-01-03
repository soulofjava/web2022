@extends('front.pesonafm.layouts.app')
@push('after-style')
<!-- Fancybox and Jquery CDN
    This link get github repository -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
@endpush
@section('content')
<div class="container mx-auto py-1">
  <div class="flex mt-10">
    <div class="basis-1/2 text-right">
      <a href="{{url('/')}}" class="sm:text-4xl font-bold">
        <h1 class="font-bold text-right"> Tips & </h1>
    </div>
    <div class="basis-1/2">
      <span class="bg-gradient-to-r from-blue-500 to-teal-400 bg-clip-text text-transparent">Trick</span>
      </a>
    </div>
  </div>

  <div class="mt-10">
    <a class="bg-red-500 px-10 py-2 w-20 h-30 text-white text-center rounded-lg" href="{{ url('/') }}">Back</a>
  </div>

  <!-- ======= News Section ======= -->
  <div class="container my-24 px-6 mx-auto">
    <section class="mb-32 text-gray-800">
      <div id="body" class="flex flex-wrap m-1 md:m-2">
        <div class="grid grid-cols-2 gap-4">
          @foreach($gallery as $g)
          <div class="flex flex-wrap hover:scale-125 focus:outline-none px-6 py-5">
            <div class="w-full p-3 md:p-2">
              <div class="relative overflow-hidden bg-no-repeat bg-black bg-cover shadow-lg rounded-lg"
                style="background-position: 50%;" data-mdb-ripple="true" data-mdb-ripple-color="light">
                @if(file_exists(public_path('storage/'.$g->path)))
                <a data-fancybox="gallery" href="{{ asset('storage') }}/{{ $g->path}}">
                  <img src="{{ asset('storage') }}/{{ $g->path}}" class="img-fluid" alt="image">
                </a>
                @else
                <img src="{{ asset('img/soulofjava.jpg') }}" class="img-fluid" alt="image">
                @endif
                <div class="portfolio-info">
                  <h4 class="text-center" style="color: #ffffff;">{{ $g->description }}</h4>
                  <div class="portfolio-links ">
                    <a href="{{ asset('storage') }}/{{ $g->path}}" data-gallery="portfolioGallery"
                      class="portfokio-lightbox" title="{{ $g->description }}"><i class="bi bi-plus"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
      <div class="row mt-3" data-aos="fade-up" data-aos-delay="100">
        <div class="col-lg-12 d-flex justify-content-center">
          {{ $gallery->links('pagination::tailwind') }}
        </div>
      </div>
    </section>
    <!-- End News Section -->
  </div>

</div>
@endsection
@push('after-script')
@endpush