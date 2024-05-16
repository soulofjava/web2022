@extends('front.boxass.layouts.app')
@push('after-style')
@endpush
@section('content')
<main id="main">

    <!-- Start Breadcrumb
        ============================================= -->
    <div class="breadcrumb-area shadow bg-fixed text-center padding-xl text-light" style="background-color: #F4F7FB;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <!-- <h1>Blog Single</h1> -->
                    <ul class="breadcrumb">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="#">postingan</a></li>
                        <li><a href="#">Semua postingan</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Start Blog
    ============================================= -->
    <div class="blog-area full-width bg-gray">
        <div class="container">
            <x-cari-news style='margin-bottom: 50px; width:100%;' />
            <div class="row" style="margin-top: 25px;">
                <div class="blog-items">
                    @foreach($news as $n)
                    <!-- Single Item -->
                    <div class="col-lg-4 col-md-4 col-sm-6 equal-height">
                        <div class="item" style="height: 245px;">
                            <div class="thumb">
                                <a href="{{ url('/news-detail', $n->slug) }}">
                                    @if(Storage::get($n->gambarmuka->path ?? ''))
                                    <img src="{{ route('helper.show-picture', ['path' => $n->gambarmuka->path]) }}"
                                        class="img-fluid" alt="{{ $n->gambarmuka->file_name }}"
                                        style="background-size: cover; height: 240px; background-position: center; width: 100%;">
                                    @else
                                    <!-- <img src="{{ asset('img/soulofjava.jpg') }}" class="img-fluid" alt="soul of java"> -->
                                    @endif
                                </a>
                            </div>
                            <div class="info">
                                <div class="content">
                                    <div class="date">
                                        {{ \Carbon\Carbon::parse($n->date)->format('l') }}, {{
                                        \Carbon\Carbon::parse( $n->date
                                        )->toFormattedDateString() }}
                                    </div>
                                    <h4>
                                        <a href="{{ url('/news-detail', $n->slug) }}">{{
                                            \Illuminate\Support\Str::limit($n->title, 50,
                                            $end='...') }}</a>
                                    </h4>
                                    <a href="{{ url('/news-detail', $n->slug) }}">lebih detail <i
                                            class="fas fa-angle-right"></i></a>
                                </div>
                                <div class="meta">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <img src="{{ asset('assets/front/boxass/assets/img/100x100.png') }}"
                                                    alt="Author">
                                                <span>Author</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fas fa-comments"></i>
                                                <span>05</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fas fa-share-alt"></i>
                                                <span>37</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    @endforeach
                    <div class="col-lg-12 col-md-12 pagi-area">
                        <nav aria-label="navigation">
                            <ul class="pagination">
                                {{ $news->links('vendor.pagination.boxass') }}
                                <!-- <li><a href="#">Previous</a></li>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">Next</a></li> -->
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog -->

</main>
@endsection
@push('after-script')
@endpush