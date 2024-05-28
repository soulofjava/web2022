@extends('front.herobiz.layouts.app')
@section('content')
<style>
    img {
        border-radius: 50%;
    }

    h2 .white-text {
        color: white;
    }

    span .white-text {
        color: white;
    }
</style>

<section id="hero-animated"
    class="hero-animated d-flex flex-column justify-content-center align-items-center text-center position-relative"
    style="background-image: url('assets/front/herobiz/assets/img/bg.png'); background-size: cover;
background-position: center;" data-aos="zoom-out">

    <div class="media d-flex align-items-between mb-10">
        <div class="avatar avatar-sm avatar-circle mr-3">
            <img loading="lazy" class="img-fluid animated" src="https://sumutprov.go.id/images/spbe.png" alt="Image Description"
                style="width:800px">
        </div>
        <div class="avatar avatar-sm avatar-circle mr-3">
            <img loading="lazy" class="img-fluid animated" src="https://diskominfo.wonosobokab.go.id/front/assets/images/pemkab.png"
                alt="Image Description" style="width:800px">
        </div>
        <div class="avatar avatar-sm avatar-circle mr-3">
            <img loading="lazy" class="img-fluid animated" src="https://diskominfo.wonosobokab.go.id/front/assets/images/soull.png"
                alt="Image Description" style="width:800px">
        </div>
        <div class="avatar avatar-sm avatar-circle mr-3">
            <img loading="lazy" class="img-fluid animated" src="https://diskominfo.wonosobokab.go.id/front/assets/images/smartcity.png"
                alt="Image Description" style="width:800px">
        </div>
    </div>

    <h2 class="white-text" style="color: white;">Go Smart Service</h2>
    <p class="white-text" style="color: white;">{{ $data_website->web_description }}</p>

    <div class="d-none">
        <a href="#about" class="btn-get-started scrollto">Get Started</a>
        <a href="{{ $data_website->heroes_video }}" class="glightbox btn-watch-video d-flex align-items-center"><i
                class="bi bi-play-circle"></i><span class="white-text" style="color: white;">Watch
                Video</span></a>
    </div>
</section>
<main id="main">
    @if($news->count() != 0)
    <section id="recent-blog-posts" class="recent-blog-posts">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h2>Berita</h2>
                <p>Terbaru dari kami</p>
            </div>

            <!-- <x-head-category_news bc='var(--color-primary)' tc='white' /> -->

            <div class="row mt-3">
                @foreach($news as $n)
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200" style="display: flex">
                    <div class="post-box">
                        <div class="post-img"
                            style="justify-content: center; align-items: center; display: flex; overflow: hidden; height: 250px !important;">
                            @if($n->gambarmuka)
                            <img loading="lazy" src="{{ route('helper.show-picture', ['path' => $n->gambarmuka->path]) }}"
                                class="img-thumbnail" alt="{{ $n->gambarmuka->file_name }}"
                                style="flex-shrink: 0; height: 250px !important;">
                            @else
                            <img loading="lazy" src="{{ asset('img/soulofjava.jpg') }}" class="img-thumbnail" alt="soul of java"
                                style="flex-shrink: 0;">
                            @endif
                        </div>
                        <div class="meta">
                            <span class="post-date">{{ \Carbon\Carbon::parse($n->date)->format('l') }}, {{
                                \Carbon\Carbon::parse( $n->date
                                )->toFormattedDateString() }}</span>
                            <span class="post-author"> / {{ $n->uploader->name }}</span>
                        </div>
                        <h3 class="post-title">
                            {{ $n->title }}
                        </h3>
                        <a href="{{ url('/news-detail', $n->slug) }}" class="readmore stretched-link"><span>Read
                                More</span><i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                @if($loop->iteration == 3)
                @break
                @endif
                @endforeach
                <div class="d-flex justify-content-end m-2">
                    <a href="{{ url('newsall') }}" class="btn"
                        style="background-color: var(--color-primary); color: white;">Show
                        All</a>
                </div>
            </div>
        </div>
    </section>
    @endif

    <x-seputar-wonosobo :message='$berita' />

    <section id="contact" class="contact">
        <div class="container">
            <div class="section-header">
                <h2>Hubungi Kami</h2>
            </div>
        </div>
        <div class="map">
            <iframe src="https://maps.google.com/maps?q={{ $data_website->latitude }},{{
                                            $data_website->longitude }}&z=14&output=embed" frameborder="0"
                allowfullscreen></iframe>
        </div>
        <div class="container">
            <div class="row gy-5 gx-lg-5">
                <div class="col-lg-4">
                    <div class="info">
                        <h3>{{ $data_website->web_name }}</h3>
                        <div class="info-item d-flex">
                            <i class="bi bi-geo-alt flex-shrink-0"></i>
                            <div>
                                <h4>Location:</h4>
                                <p>{{ $data_website->address }}</p>
                            </div>
                        </div>
                        <div class="info-item d-flex">
                            <i class="bi bi-envelope flex-shrink-0"></i>
                            <div>
                                <h4>Email:</h4>
                                <p>{{ $data_website->email }}</p>
                            </div>
                        </div>
                        <div class="info-item d-flex">
                            <i class="bi bi-phone flex-shrink-0"></i>
                            <div>
                                <h4>Call:</h4>
                                <p>{{ $data_website->phone }}</p>
                            </div>
                        </div>
                        <div class="info-item d-flex">
                            <i class="bi bi-clock flex-shrink-0"></i>
                            <div>
                                <h4>Open Hours:</h4>
                                <p>{{ $data_website->open_hours }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    {{Form::open(['url' => 'kotakmasuk','method' => 'post', 'files' => 'true', ''])}}
                    <div class="row">
                        <div class="col-md-6 form-group mt-3">
                            {{Form::text('name', null,['class' => 'form-control', 'placeholder' => 'Your Name',
                            'required'])}}
                        </div>
                        <div class="col-md-6 form-group mt-3">
                            {{Form::email('email', null,['class' => 'form-control', 'placeholder' => 'Email',
                            'required'])}}
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        {{Form::number('phone', null,['class' => 'form-control', 'placeholder' => 'Phone Number',
                        'required'])}}
                    </div>
                    <div class="form-group mt-3">
                        {{Form::textarea('message', null,['class' => 'form-control', 'placeholder' => 'Message',
                        'required'])}}
                    </div>
                    <div class="form-group mt-3">
                        <div class="row">
                            <div class="col-sm-12 col-md-6 captcha text-center mb-3">
                                <span>{!! captcha_img() !!}</span>
                                <button type="button" class="btn btn-danger" class="reload" id="reload">
                                    &#x21bb;
                                </button>
                            </div>
                            <div class="col-sm-12 col-md-6 mb-3">
                                {{Form::number('captcha', null,['class' => 'form-control',
                                'placeholder' => 'Enter Captcha Result',
                                'required'])}}
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        {{Form::submit('Send Message', ['class' => 'btn', 'style' => 'background:#0ea2bd;
                        color:white;'])}}
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </section>
</main>
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