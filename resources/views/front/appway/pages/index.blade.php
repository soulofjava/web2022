@extends('front.appway.layouts.app')
@section('content')
<!-- banner-section -->
<section class="banner-section">
    <div class="bg-layer" style="background-image: url('assets/front/appway/images/icons/banner-1.png');"></div>
    <div class="pattern-bg" style="background-image: url(assets/front/appway/images/icons/vactor-1.png);"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                <div class="content-box">
                    <h1>{{ $data_website->web_name }}</h1>
                    <div class="text">{{ $data_website->web_description }}</div>
                    <!-- <div class="btn-box"><a href="#">Get App Now</a></div> -->
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                <div class="image-box float-bob-y clearfix">
                    <!-- @if($data_website->image_hero)
                    <img src="{{ asset('storage') }}/{{ $data_website->image_hero }}" alt="{{ $data_website->web_name }}">
                    @else
                    <figure class="image image-2 wow fadeInUp" data-wow-delay="1500ms" data-wow-duration="1500ms">
                        <img src="{{ asset('assets/front/appway/images/resource/phone-2.png') }}" alt="{{ $data_website->web_name }}">
                    </figure>
                    @endif -->
                    <!-- <figure class="image image-1 wow fadeInUp" data-wow-delay="900ms" data-wow-duration="1500ms">
                        <img src="{{ asset('assets/front/appway/images/resource/phone-1.png') }}" alt="">
                    </figure> -->
                    <!-- <figure class="image image-2 wow fadeInUp" data-wow-delay="1500ms" data-wow-duration="1500ms">
                        <img src="{{ asset('assets/front/appway/images/resource/phone-2.png') }}" alt="">
                    </figure> -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner-section end -->

@if($news->count() != 0)
<!-- news-section -->
<section class="news-section">
    <div class="container">
        <div class="sec-title center">
            <h2>Recent Posts</h2>
        </div>

        <x-head-category_news btn='theme-btn-two' />

        <div class="row mt-3">
            @foreach($news as $n)
            <div class="col-lg-4 col-md-6 col-sm-12 news-column" style="display: flex">
                <div class="news-block-one wow flipInY animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <figure class="image-box">
                            <a href="{{ url('/news-detail', $n->slug) }}">
                                @forelse($n->gambar as $gambar)
                                @if($loop->iteration == 1)
                                <img src="{{ asset('storage/') }}/{{  $gambar->path }}" class="img-fluid"
                                    alt="{{ $gambar->file_name }}">
                                @endif
                                @empty
                                <img src="{{ asset('img/soulofjava.jpg') }}" class="img-fluid" alt="soul of java">
                                @endforelse
                            </a>
                        </figure>
                        <div class="lower-content">
                            <div class="post-date"><i class="fas fa-calendar-alt"></i>{{
                                \Carbon\Carbon::parse($n->date)->format('l') }}</strong> {{
                                \Carbon\Carbon::parse( $n->date
                                )->toFormattedDateString() }}</div>
                            <h3>
                                <a href="{{ url('/news-detail', $n->slug) }}">{{ $n->title }}</a>
                            </h3>
                            <div class="link-btn"><a href="{{ url('/news-detail', $n->slug) }}">Read More</a></div>
                        </div>
                    </div>
                </div>
            </div>
            @if($loop->iteration == 3)
            @break
            @endif
            @endforeach
        </div>
    </div>
</section>
<!-- news-section end -->
@endif

@if($gallery->count() != 0)
<!-- gallery-section -->
<section class="news-section">
    <div class="container">
        <div class="sec-title center">
            <h2>Latest Photos</h2>
            <a href="{{ url('/photos') }}">
                <p>Show All</p>
            </a>
        </div>
        <div class="row">
            @foreach($gallery as $g)
            <div class="col-lg-4 col-md-6 col-sm-12 news-column" style="display: flex">
                <div class="news-block-one wow flipInY animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <figure class="image-box">
                            @foreach($g->gambar as $pic)
                            @if($loop->iteration == 1)
                            <a data-fancybox="gallery-group-{{ $pic->id_news }}"
                                href="{{ asset('storage/') }}/{{ $pic->path }}" data-caption="{{ $g->description }}">
                                <img src="{{ asset('storage/') }}/{{ $pic->path }}" class="img-fluid"
                                    style="height: 250px;">
                            </a>
                            @else
                            <div style="display:none;">
                                <a data-fancybox="gallery-group-{{ $pic->id_news }}"
                                    href="{{ asset('storage/') }}/{{ $pic->path }}"
                                    data-caption="{{ $g->description }}">
                                    <img src="{{ asset('storage/') }}/{{ $pic->path }}" class="img-fluid">
                                </a>
                            </div>
                            @endif
                            @endforeach
                        </figure>
                        <div class="lower-content">
                            <div class="post-date"><i class="fas fa-calendar-alt"></i>{{
                                \Carbon\Carbon::parse($g->upload_date)->format('l') }}</strong> {{
                                \Carbon\Carbon::parse( $g->upload_date
                                )->toFormattedDateString() }}</div>
                            <h3>
                                <a href="#">{{ $g->description }}</a>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            @if($loop->iteration == 3)
            @break
            @endif
            @endforeach
        </div>
    </div>
</section>
<!-- gallery-section end -->
@endif

<x-seputar-wonosobo :message='$berita' />

<!-- subscribe-section -->
<section class="subscribe-section">
    <div class="container">
        <div class="row">
            <!-- <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                <div id="iamge_block_05">
                    <div class="image-box wow slideInLeft animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                        <figure class="image float-bob-y"><img
                                src="{{ asset('assets/front/appway/images/resource/subscribe-1.png') }}" alt="">
                        </figure>
                    </div>
                </div>
            </div> -->
            <div class="col-lg-12 col-md-12 col-sm-12 content-column">
                <div id="content_block_06">
                    <div class="content-box">
                        <div class="sec-title center">
                            <h2>Inbox</h2>
                        </div>
                        <div class="text">We’d love to hear from you anytime</div>
                        {{Form::open(['url' => 'kotakmasuk','method' => 'post', 'files' => 'true', '', 'class' =>
                        'subscribe-form'])}}
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    {{Form::text('name', null,['class' => 'form-control', 'placeholder' => 'Your Name',
                                    'required'])}}
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    {{Form::email('email', null,['class' => 'form-control', 'placeholder' => 'Email',
                                    'required'])}}
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    {{Form::number('phone', null,['class' => 'form-control',
                                    'placeholder' => 'Phone Number',
                                    'required'])}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group captcha text-center"
                                    style="margin-bottom: 30px; padding: 10px 40px;">
                                    <span>{!! captcha_img() !!}</span>
                                    <button type="button" class="btn btn-danger" class="reload" id="reload">
                                        &#x21bb;
                                    </button>
                                </div>
                                <div class="form-group">
                                    {{Form::number('captcha', null,['class' => 'form-control',
                                    'placeholder' => 'Enter Captcha Result',
                                    'required'])}}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group" style="margin-bottom: 30px; padding: 10px 40px;">
                                    {{Form::textarea('message', null,['class' => 'form-control', 'placeholder' =>
                                    'Message',
                                    'required'])}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <div class="form-group">
                                    <button type="submit" class="theme-btn-two">Send Message</button>
                                </div>
                            </div>
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- subscribe-section end -->

<!-- start map -->
<section>
    <div class="container">
        <div class="map">
            <iframe src="https://maps.google.com/maps?q={{ $data_website->latitude }},{{
                $data_website->longitude }}&z=14&output=embed" frameborder="0" allowfullscreen width="100%"
                height="300px"></iframe>
        </div>
    </div>
</section>
<!-- end map -->

<!--Scroll to top-->
<button class="scroll-top scroll-to-target" data-target="html">
    <span class="fa fa-arrow-up"></span>
</button>
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