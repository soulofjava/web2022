@extends('front.castro.layouts.app')

@section('content')
<!-- page-title -->
<section class="page-title centred">
    <div class="pattern-layer" style="background-image: url(assets/images/background/page-title.jpg);"></div>
    <div class="auto-container">
        <div class="content-box">
            <h1>Semua Postingan</h1>
            <ul class="bread-crumb clearfix">
                <li><i class="flaticon-home-1"></i><a href="{{ url('/') }}">Beranda</a></li>
                <li><a href="{{ url('newsall') }}">Postingan</a></li>
                <li>Semua Postingan</li>
            </ul>
        </div>
    </div>
</section>
<!-- page-title end -->
<!-- news-section -->
<section class="blog-page-section blog-page-1 sec-pad-2">
    <div class="auto-container">
        <div class="row clearfix">
            @foreach($news as $n)
            <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                <div class="news-block-one wow fadeInUp animated animated" data-wow-delay="00ms"
                    data-wow-duration="1500ms">
                    <div class="inner-box">
                        <figure class="image-box">
                            @if(Storage::get($n->gambarmuka->path ?? ''))
                            <img src="{{ route('helper.show-picture', ['path' => $n->gambarmuka->path]) }}"
                                class="img-fluid" alt="{{ $n->gambarmuka->file_name }}"
                                style="object-fit: cover !important; height: 240px; background-position: center; width: 100%;">
                            @else
                            <img src="{{ asset('img/soulofjava.jpg') }}" class="img-fluid" alt="soul of java"
                                style="object-fit: cover !important; height: 240px; background-position: center; width: 100%;">
                            @endif
                        </figure>
                        <div class="lower-content">
                            <span class="post-date">{{ \Carbon\Carbon::parse($n->date)->isoFormat('dddd, D MMMM YYYY')
                                }}</span>
                            <h3><a href="{{ url('/news-detail', $n->slug) }}">{{
                                    \Illuminate\Support\Str::limit($n->title, 50,
                                    $end='...') }}</a></h3>
                            <ul class="post-info clearfix">
                                <li><a href="#">by {{ $n->uploader->name ?? 'Admin' }}</a></li>
                                <li><a href="#">Dilihat {{
                                        views($n)->count(); }} kali</a></li>
                            </ul>
                            <p>{!!
                                \Illuminate\Support\Str::limit($n->content, 100,
                                $end='...') !!}</p>
                            <div class="link"><a href="{{ url('/news-detail', $n->slug) }}">Read More<i
                                        class="flaticon-right-1"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- <div class="pagination-wrapper centred">
            <ul class="pagination clearfix">
                <li><a href="shop.html">Prev</a></li>
                <li><a href="shop.html">1</a></li>
                <li><a href="shop.html" class="active">2</a></li>
                <li><a href="shop.html">3</a></li>
                <li><a href="shop.html">4</a></li>
                <li><a href="shop.html">5</a></li>
                <li><a href="shop.html">Next</a></li>
            </ul>
        </div> -->
        {{ $news->links('vendor.pagination.castro') }}
    </div>
</section>
<!-- news-section end -->
@endsection