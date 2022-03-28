@extends('front.herobiz.layouts.app')
@section('content')
@if($news->count() != 0)
<!-- ======= Recent Blog Posts Section ======= -->
<section id="recent-blog-posts" class="recent-blog-posts">

    <div class="container" data-aos="fade-up">

        <header class="section-header">
            <h2>Blog</h2>
            <p>Recent posts form our Blog</p>
        </header>
        <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-12 d-flex justify-content-center">
                @if(Route::current()->getName() == 'news.all')
                {!! $news->render() !!}
                <!-- {{ $news->links() }} -->
                @else
                <!-- <ul id="recent-blog-posts-flters"> -->
                <a href="{{ url('/newsall') }}">Show All</a>
                <!-- </ul> -->
                @endif
            </div>
        </div>
        <div class="row mt-4">
            @foreach($news as $n)
            <div class="col-lg-4">
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
    </div>

</section>
<!-- End Recent Blog Posts Section -->
@endif
@endsection
@push('after-script')
<script>
    $(function () {
        $('body').on('click', '.pagination a', function (e) {
            e.preventDefault();
            $('#load').append('<img style="position: absolute; left: 0; top: 0; z-index: 10000;" src="https://i.imgur.com/v3KWF05.gif />');
            var url = $(this).attr('href');
            window.history.pushState("", "", url);
            loadPosts(url);
        });
        function loadPosts(url) {
            $.ajax({
                url: url
            }).done(function (data) {
                $('.recent-blog-posts').html(data);
            }).fail(function () {
                console.log("Failed to load data!");
            });
        }
    });
</script>
@endpush