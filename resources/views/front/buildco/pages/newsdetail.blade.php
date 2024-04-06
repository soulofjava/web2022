@extends('front.buildco.layouts.app')
@section('content')
<!-- Start Breadcrumb 
    ============================================= -->
<div class="breadcrumb-area shadow dark bg-fixed text-center text-light"
    style="background-image: url(assets/img/2440x1578.png);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h1>{{ $data->title }}</h1>
                <ul class="breadcrumb">
                    <li><a href="{{ url('/') }}"><i class="fas fa-home"></i> Beranda</a></li>
                    <li><a href="{{ url('newsall') }}">Postingan</a></li>
                    <li class="active">Detail Postingan</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumb -->

<!-- Start Blog
    ============================================= -->
<div class="blog-area single full-blog full-blog default-padding">
    <div class="container">
        <div class="row">
            <div class="blog-items">
                <div class="blog-content col-md-10 col-md-offset-1">
                    <div class="single-item">

                        <!-- Start Post Thumb -->
                        <div class="thumb">
                            @if(count($data->gambar))
                            <x-looping-image :foto="$data" />
                            @elseif($data->attachment)
                            <img src="{{ $data->attachment }}" alt="soul of java">
                            @else
                            <img src="{{ asset('img/soulofjava.jpg') }}" alt="soul of java">
                            @endif
                            <div class="author">
                                <div class="thumb">
                                    <img src="https://ui-avatars.com/api/?name= {{ $data->uploader->name ?? 'Admin' }}"
                                        alt="Author">
                                </div>
                                <div class="meta">
                                    <h5>{{ $data->uploader->name ?? 'Admin' }}</h5>
                                    <span>{{ \Carbon\Carbon::parse($data->date)->format('l') }},
                                        {{ \Carbon\Carbon::parse( $data->date)->toFormattedDateString() }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="info">
                            {!! $data->description !!}

                            <!-- Start Post Pagination -->
                            <div class="post-pagi-area">
                                <a href="{{ ($prev_data == []) ? '#' : url('/news-detail', $prev_data->slug) }}"><i
                                        class="fas fa-angle-double-left"></i> Previus Post</a>
                                <a href="{{ ($next_data == []) ? '#' : url('/news-detail', $next_data->slug) }}">Next
                                    Post <i class="fas fa-angle-double-right"></i></a>
                            </div>
                            <!-- End Post Pagination -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Blog -->
@endsection