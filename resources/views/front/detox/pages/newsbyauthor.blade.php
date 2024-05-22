@extends('front.detox.layouts.app')

@section('content')
<!--Page Title-->
<section class="page-title bg-color-1 text-center">
    <div class="pattern-layer"
        style="background-image: url('{{ asset('master/Detox/assets/images/shape/pattern-18.png') }}');"></div>
    <div class="auto-container">
        <div class="content-box">
            <h1>{{ $hasil }}</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ url('/') }}">Beranda</a></li>
                <li><a href="{{ url('newsall') }}">Semua Postingan</a></li>
                <li>{{ $hasil }}</li>
            </ul>
        </div>
    </div>
</section>
<!--End Page Title-->
<!-- blog-grid -->
<section class="sidebar-page-container blog-grid">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 content-side">
                <div class="blog-grid-content">
                    <div class="row clearfix">
                        @forelse($data as $n)
                        <div class="col-lg-4 col-md-4 col-sm-12 news-block">
                            <div class="news-block-one wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                                <div class="inner-box">
                                    <div class="image-holder">
                                        <figure class="image-box">
                                            @if(Storage::get($n->gambarmuka->path ?? ''))
                                            <img loading="lazy" src="{{ route('helper.show-picture', ['path' => $n->gambarmuka->path]) }}"
                                                class="img-fluid" alt="{{ $n->gambarmuka->file_name }}"
                                                style="object-fit: cover !important; height: 250px; background-position: center; width: 100%;">
                                            @else
                                            <img loading="lazy" src="{{ asset('img/soulofjava.jpg') }}" class="img-fluid"
                                                alt="soul of java"
                                                style="object-fit: cover !important; height: 250px; background-position: center; width: 100%;">
                                            @endif
                                        </figure>
                                        <div class="post-date"><i class="fas fa-calendar-alt"></i>
                                            <p>
                                                {{ \Carbon\Carbon::parse($n->date)->isoFormat('dddd, D MMMM YYYY') }}
                                            </p>
                                        </div>
                                        <div class="link"><a href="{{ url('/news-detail', $n->slug) }}"><i
                                                    class="fas fa-arrow-right"></i></a></div>
                                    </div>
                                    <div class="lower-content">
                                        <ul class="post-info">
                                            <li><span>by</span>&nbsp;<a href="{{ url('/news-detail', $n->slug) }}">{{
                                                    $n->uploader->name ?? 'Admin' }}</a></li>
                                            <li><a href="{{ url('/news-detail', $n->slug) }}">Dilihat {{
                                                    views($n)->count(); }} kali</a></li>
                                        </ul>
                                        <h3><a href="{{ url('/news-detail', $n->slug) }}">{{
                                                \Illuminate\Support\Str::limit($n->title, 50,
                                                $end='...') }}</a>
                                        </h3>
                                        <p>{!!
                                            \Illuminate\Support\Str::limit($n->content, 100,
                                            $end='...') !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="text-center">
                                        <h1>Data Tidak Ditemukan</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        {{ $data->withQueryString()->links('vendor.pagination.detox') }}
    </div>
</section>
<!-- blog-grid end -->
@endsection