@extends('front.flexstart.layouts.app')
@section('content')
<!-- ======= Recent Blog Posts Section ======= -->
<section id="recent-blog-posts" class="recent-blog-posts">
    <div class="container" data-aos="fade-up">
        <header class="section-header">
            <h2>Blog</h2>
            <p>Recent posts from our Blog</p>
        </header>
        <div class="row mt-3">
            @foreach($news as $n)
            <div class="col-xl-3 col-lg-4 col-md-6 mb-3">
                <div class="post-box">
                    <div class="post-img">
                        <img src="{{ asset('storage/') }}/{{ $n->path}}" class="img-fluid" alt="">
                    </div>
                    <span class="post-date">{{ \Carbon\Carbon::parse($n->date)->format('l') }}, {{
                        \Carbon\Carbon::parse( $n->date
                        )->toFormattedDateString() }}</span>
                    <h3 class="post-title">{{ $n->title }}
                    </h3>
                    <a href="{{ url('/news-detail', $n->id) }}" class="readmore stretched-link mt-auto"><span>Read
                            More</span><i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row mt-3" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-12 d-flex justify-content-center">
                {!! $news->render() !!}
                <!-- {{ $news->links() }} -->
            </div>
        </div>
    </div>
</section>
<!-- End Recent Blog Posts Section -->
@endsection
@push('after-script')
@endpush