@extends('front.deluck.layouts.app')
@section('content')
<!-- Start Breadcrumb 
    ============================================= -->
<div class="breadcrumb-area text-center bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="{{ url('/') }}"><i class="fas fa-home"></i> Beranda</a></li>
                    <li><a href="{{ url('newsall') }}"> Postingan</a></li>
                    <li class="active"> Semua Postingan</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumb -->
<!-- Start Blog
    ============================================= -->
<div class="blog-area full-blog blog-standard default-padding">
    <div class="container">
        <div class="row">
            <div class="blog-items">
                <div class="blog-content col-md-10 col-md-offset-1">
                    @foreach($news as $n)
                    <!-- Single Item -->
                    <div class="single-item">
                        <div class="item">
                            <div class="thumb">
                                <a href="{{ url('/news-detail', $n->slug) }}">
                                    @if(Storage::get($n->gambarmuka->path ?? ''))
                                    <img src="{{ route('helper.show-picture', ['path' => $n->gambarmuka->path]) }}"
                                        class="img-fluid" alt="{{ $n->gambarmuka->file_name }}"
                                        style="object-fit: cover !important; height: 700px; background-position: center; width: 100%;">
                                    @else
                                    <img src="{{ asset('img/soulofjava.jpg') }}" class="img-fluid" alt="soul of java"
                                        style="object-fit: cover !important; height: 700px; background-position: center; width: 100%;">
                                    @endif
                                </a>
                            </div>
                            <div class="info">
                                <div class="date">
                                    <h4>{{ \Carbon\Carbon::parse($n->date)->format('l') }}, {{
                                        \Carbon\Carbon::parse( $n->date
                                        )->toFormattedDateString() }}</h4>
                                </div>
                                <h4>
                                    <a href="{{ url('/news-detail', $n->slug) }}">{{
                                        \Illuminate\Support\Str::limit($n->title, 50,
                                        $end='...') }}</a>
                                </h4>
                                <div class="meta">
                                    <ul>
                                        <li>
                                            <a href="#"><i class="fas fa-user"></i> {{ $n->uploader->name ?? 'Admin'
                                                }}</a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fas fa-eye"></i> {{
                                                views($n)->count(); }} </a>
                                        </li>
                                    </ul>
                                </div>
                                <p>
                                    {!!
                                    \Illuminate\Support\Str::limit($n->description, 100,
                                    $end='...') !!}
                                </p>
                                <a class="btn btn-theme border btn-md" href="{{ url('/news-detail', $n->slug) }}">Read
                                    More</a>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    @endforeach
                    <!-- Pagination -->
                    <div class="row">
                        <div class="col-md-12 pagi-area">
                            <nav aria-label="navigation">
                                <ul class="pagination">
                                    {{ $news->withQueryString()->links('vendor.pagination.deluck') }}
                                    <!-- <li><a href="#"><i class="fas fa-long-arrow-alt-left"></i></a></li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#"><i class="fas fa-long-arrow-alt-right"></i></a></li> -->
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Blog -->
@endsection