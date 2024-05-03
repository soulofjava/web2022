@extends('front.flexstart.layouts.app')
@section('content')
<!-- ======= Recent Blog Posts Section ======= -->
<section id="blog" class="blog mt-5">
    <div class="container" data-aos="fade-up">
        <header class="section-header mt-5">
            <h2>Blog</h2>
            <p>Recent posts from our Blog</p>
        </header>

        <x-cari-news />

        <div class="row mt-3">
            @foreach($news as $n)
            <div class="col-xl-3 col-lg-4 col-md-6 mb-3" style="display: flex;">
                <article class="entry">

                    <div class="entry-img">
                        @if(Storage::get($n->gambarmuka->path ?? ''))
                        <img src="{{ route('helper.show-picture', ['path' => $n->gambarmuka->path]) }}" class="img-fluid"
                            alt="{{ $n->gambarmuka->file_name }}"
                            style="background-size: cover; height: 240px; background-position: center; width: 100%;">
                        @else
                        <!-- <img src="{{ asset('img/soulofjava.jpg') }}" class="img-fluid" alt="soul of java"> -->
                        @endif
                    </div>

                    <h2 class="entry-title">
                        <a href="{{ url('/news-detail', $n->slug) }}">{{ \Illuminate\Support\Str::limit($n->title, 50,
                            $end='...') }}</a>
                    </h2>

                    <div class="entry-content">
                        <div class="read-more">
                            <a href="{{ url('/news-detail', $n->slug) }}">Read More</a>
                        </div>
                    </div>

                </article>

            </div>
            @endforeach
        </div>

        <div class="row mt-3" data-aos="fade-up" data-aos-delay="100">
            {{ $news->links('vendor.pagination.flexstart') }}
        </div>

    </div>
</section>
<!-- End Recent Blog Posts Section -->
@endsection
@push('after-script')
@endpush