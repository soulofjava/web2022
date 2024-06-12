@extends('front.boxass.layouts.app')
@section('content')
<!-- Start Banner
    ============================================= -->
<div class="banner-area content-double box-nav background-move bg-gray"
    style="background-image: url(assets/front/boxass/assets/img/bg-2.png);">
    <div class="container">
        <div class="row">
            <div class="double-items">
                <div class="col-md-6 left-info simple-video">
                    <div class="content" data-animation="animated fadeInUpBig">
                        <h1>
                            Selamat datang di website kami
                        </h1>
                        <p>
                            {{ $data_website->web_description }}
                        </p>
                        <!-- <a class="btn btn-theme border btn-md" href="#">Get Started</a> -->
                        <!-- <a class="btn-animation popup-youtube" href="https://www.youtube.com/watch?v=owhuBrGIOsE">
                            <i class="fa fa-play"></i> Watch Video
                        </a> -->
                    </div>
                </div>
                <div class="col-md-6 right-info">
                    <div class="thumb animated">
                        @if($data_website->image_hero)
                        <img loading="lazy" src="{{ route('helper.show-picture', ['path' => $data_website->image_hero]) }}"
                            class="img-fluid" alt="{{ $data_website->image_hero_name }}">
                        @else
                        <img loading="lazy" src="{{ asset('assets/front/boxass/assets/img/illustrations/1.png') }}" alt="Thumb">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Banner -->

<!-- Start Blog Area
    ============================================= -->
<div id="blog" class="blog-area default-padding bottom-less">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-lg-offset-2 col-md-offset-2">
                <div class="site-heading text-center">
                    <h2>Postingan Kami</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="blog-items">
                <!-- Single Item -->
                @foreach(App\Models\News::whereNotIn('id', function ($query) {
                $query->select('taggable_id')
                ->from('tagging_tagged');
                })
                ->where('terbit', 1)
                ->latest('date')
                ->take(3)->get() as $n)
                <div class="col-md-4 single-item">
                    <div class="item">
                        <div class="thumb">
                            <a href="{{ url('/news-detail', $n->slug) }}">
                                @if(Storage::get($n->gambarmuka->path ?? ''))
                                <img loading="lazy" src="{{ route('helper.show-picture', ['path' => $n->gambarmuka->path]) }}"
                                    class="img-fluid" alt="{{ $n->gambarmuka->file_name }}"
                                    style="height: 240px; object-fit: cover; width: 100%;">
                                @else
                                <img loading="lazy" src="{{ asset('img/soulofjava.jpg') }}" class="img-fluid" alt="soul of java">
                                @endif
                            </a>
                        </div>
                        <div class="info" style="height: 304px !important;">
                            <div class="content">
                                <div class="date">
                                    {{ \Carbon\Carbon::parse($n->date)->format('l') }}, {{
                                    \Carbon\Carbon::parse( $n->date
                                    )->toFormattedDateString() }}
                                </div>
                                <h4>
                                    <a href="{{ url('/news-detail', $n->slug) }}">{{
                                        \Illuminate\Support\Str::limit($n->title, 50, $end='...') }}</a>
                                </h4>
                                <a href="{{ url('/news-detail', $n->slug) }}">Baca Lebih lanjut<i
                                        class="fas fa-angle-right"></i></a>
                            </div>
                            <div class="meta">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <img loading="lazy" src="https://ui-avatars.com/api/?name={{ $n->uploader->name ?? 'Admin' }}"
                                                alt="Author">
                                            <span> {{ $n->uploader->name ?? 'Admin' }}</span>
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
                                            <i class="fas fa-eye"></i>
                                            <span>
                                                {{ views($n)->count(); }}
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- Single Item -->
            </div>
        </div>
    </div>
</div>
<!-- End Blog Area -->

<x-seputar-wonosobo :message='$berita' />

@endsection
@push('after-script')
<script>
    $('#reload').click(function () {
        $.ajax({
            type: 'GET',
            url: 'reload-captcha',
            success: function (data) {
                $(".captcha span").html(data.captcha);
            }
        });
    });
</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
@endpush