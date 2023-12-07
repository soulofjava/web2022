@extends('front.appway.layouts.app')
@section('content')

<!-- preloader -->
<div class="preloader"></div>
<!-- preloader -->

<!-- page-title -->
<section class="page-title" style="background-image: url('/assets/front/appway/images/background/pagetitle-bg.png');">

    <div class="anim-icons">
        <div class="icon icon-1"><img src="{{ asset('assets/front/appway/images/icons/anim-icon-17.png') }}" alt="">
        </div>
        <div class="icon icon-2 rotate-me"><img src="{{ asset('assets/front/appway/images/icons/anim-icon-18.png') }}"
                alt=""></div>
        <div class="icon icon-3 rotate-me"><img src="{{ asset('assets/front/appway/images/icons/anim-icon-19.png') }}"
                alt=""></div>
        <div class="icon icon-4"></div>
    </div>
    <div class="container">
        <div class="content-box clearfix">
            <div class="title-box pull-left">
                <a href="{{ url('/') }}">
                    <h1>{{ $data_website->web_name }}</h1>
                </a>
                <!-- <p>Reach out to the world’s most reliable IT services.</p> -->
            </div>
            <ul class="bread-crumb pull-right">
                <li>Seputar Wonosobo</li>
                <li><a href="/">Home</a></li>
            </ul>
        </div>
    </div>
</section>
<!-- page-title end -->


<!-- blog-single -->
<section class="sidebar-page-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                <div class="blog-single-content">
                    <div class="post-details">
                        <figure class="image-box">
                            <img src="https://diskominfo.wonosobokab.go.id/{{ $berita['gambar_muka']['path'] }}{{ $berita['gambar_muka']['file_name'] }}"
                                class="img-fluid">
                        </figure>
                        <div class="inner-box">
                            <div class="upper-box">
                                <div class="post-date"><i class="fas fa-calendar-alt"></i>{{
                                    \Carbon\Carbon::parse($berita['created_at'])->format('l') }}, {{
                                    \Carbon\Carbon::parse( $berita['created_at']
                                    )->toFormattedDateString() }}</div>
                                <h3>{{ $berita['judul_posting'] }}</h3>
                                <div class="text">{!! $berita['isi_posting'] !!}</div>
                            </div>
                            <div class="lower-box clearfix">
                                <div class="left-content pull-left">
                                    <figure class="admin-image">
                                        <img src="https://ui-avatars.com/api/?name=Admin">
                                    </figure>
                                    <a href="#">
                                        <span class="admin-name">by Admin</span>
                                    </a>
                                </div>
                                <ul class="right-content pull-right">
                                    <li><a href="#">{{ $berita['views'] }} &nbsp;<i class="far fa-eye"></i></a></li>
                                    <li class="share">
                                        <a href="#"><i class="fas fa-share-alt"></i></a>
                                        <ul class="social-links">
                                            {!! Share::page(Request::getHttpHost(), $berita['judul_posting'])
                                            ->facebook()
                                            ->twitter()
                                            ->whatsapp(); !!}
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                <div class="sidebar">
                    <div class="sidebar-search sidebar-widget">
                        <div class="search-form">
                            {{Form::open(['route' => 'news.search','method' => 'get', ''])}}
                            <div class="form-group">
                                {{Form::search('kolomcari', null,['class' => 'form-control',
                                'placeholder' => 'Title Post'])}}
                                <button type="submit"><i class="fas fa-search"></i></button>
                            </div>
                            {{Form::close()}}
                        </div>
                    </div>
                    <div class="sidebar-post sidebar-widget">
                        <h3 class="sidebar-title">Recent News</h3>
                        <div class="widget-content">
                            @foreach($news as $n)
                            <div class="post">
                                <figure class="image">
                                    <a href="{{ url('/news-detail', $n->slug) }}">
                                        @if(file_exists(public_path('storage/'.$n->path)))
                                        <img src="{{ asset('storage/') }}/{{ $n->path}}"
                                            class="img-fluid rounded-start rounded-end" alt="{{ $n->title }}">
                                        @else
                                        <img src="{{ asset('img/soulofjava.jpg') }}" alt="soulofjava">
                                        @endif
                                    </a>
                                </figure>
                                <h5><a href="{{ url('/news-detail', $n->slug) }}">{{
                                        \Illuminate\Support\Str::limit($n->title, 50, $end='...') }}</a>
                                </h5>
                                <span class="post-date">{{
                                    \Carbon\Carbon::parse( $n->date
                                    )->toFormattedDateString() }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- blog-single end -->
@endsection
@push('after-script')
<script src="{{ asset('js/share.js') }}"></script>
@endpush