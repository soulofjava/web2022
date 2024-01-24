@extends('front.layouts.app')
@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/breadcrumbs-bg.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

            <h2>{{ $hasil }}</h2>
            <ol>
                <li><a href="{{ url('/') }}">Beranda</a></li>
                <li>Postingan</li>
            </ol>

        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <x-cari-news />

            <div class="row gy-4 posts-list mt-2">

                @foreach($data ?? [] as $author)
                <div class="col-xl-4 col-md-6">
                    <div class="post-item position-relative h-100">

                        <div class="post-img position-relative overflow-hidden">
                            @if($author->gambarmuka)
                            @if(Str::contains($author->gambarmuka, 'https'))
                            <img src="{{  $author->gambarmuka->path }}" class="img-fluid"
                                alt="{{ $author->gambarmuka->file_name }}">
                            @else
                            <img src="{{ route('helper.show-picture', ['path' => $author->gambarmuka->path]) }}"
                                class="img-fluid" alt="{{ $author->gambarmuka->file_name }}">
                            @endif
                            @else
                            <img src="{{ asset('img/soulofjava.jpg') }}" class="img-fluid" alt="soul of java">
                            @endif
                            <span class="post-date">{{ \Carbon\Carbon::parse($author->date)->isoFormat('dddd, D MMMM
                                Y')
                                }}</span>
                        </div>

                        <div class="post-content d-flex flex-column">

                            <h3 class="post-title">{{ \Illuminate\Support\Str::limit($author->title, 50,
                                $end='...') }}</h3>

                            <div class="meta d-flex align-items-center">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-person"></i> <span class="ps-2">{{ $author->uploader->name ??
                                        'Admin' }}</span>
                                </div>
                                <span class="px-3 text-black-50">/</span>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-eye"></i> <span class="ps-2">{{
                                        views($author)->count(); }} Views</span>
                                </div>
                            </div>

                            <p>
                                {!! \Illuminate\Support\Str::limit($author->description, 100,
                                $end='...') !!}
                            </p>

                            <hr>

                            <a href="{{ url('/news-detail', $author->slug) }}"
                                class="readmore stretched-link"><span>Read More</span><i
                                    class="bi bi-arrow-right"></i></a>

                        </div>

                    </div>
                </div>
                <!-- End post list item -->
                @endforeach

                {!! $data->withQueryString()->links('vendor.pagination.boxass') !!}
                <!-- End blog pagination -->
            </div>
            <!-- End blog posts list -->

        </div>
    </section>
    <!-- End Blog Section -->

</main>
<!-- End #main -->
@endsection
@push('after-script')
@endpush