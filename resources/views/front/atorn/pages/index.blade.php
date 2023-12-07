@extends('front.atorn.layouts.app')
@section('content')

<!-- Hero Slider Area -->
<div class="hero-slider owl-carousel owl-theme">
    @foreach(App\Models\News::where('highlight', '1')->orderBy('date', 'DESC')->take(3)->get() as $hl)

    @if($hl->gambarmuka)
    <div class="hero-slider-item" style="background-image: url('storage/{{ $hl->gambarmuka->path }}');">
        @else
        <div class="hero-slider-item" style="background-image: url('img/soulofjava.jpg');">
            @endif
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="slider-content">
                            <a href="{{ url('/news-detail', $hl->slug) }}">
                                <h1>{{ $hl->title }}</h1>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!-- End Hero Slider Area -->

    @if($gallery->count() != 0)
    <!-- Service Area -->
    <div class="service-area pt-100 pb-70">
        <div class="container">
            <div class="section-title">
                <!-- <span>Gallery</span> -->
                <h2>Latest Photo From Our Blog</h2>
                <a href="{{ url('photos') }}">Show All Photos</a>
            </div>

            <div class="row">
                @foreach($gallery as $g)
                <div class="col-lg-4 col-sm-6" style="display: flex">
                    <div class="service-card">
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
                                href="{{ asset('storage/') }}/{{ $pic->path }}" data-caption="{{ $g->description }}">
                                <img src="{{ asset('storage/') }}/{{ $pic->path }}" class="img-fluid">
                            </a>
                        </div>
                        @endif
                        @endforeach
                        <div class="service-text">
                            <p>{{ $g->description }}</p>
                        </div>
                    </div>
                </div>
                @if($loop->iteration == 6)
                @break
                @endif
                @endforeach
            </div>
        </div>
    </div>
    <!-- End Service Area -->
    @endif

    <!-- Blog Area -->
    @if($news->count() != 0)
    <div class="blog-area pt-100 pb-70">
        <div class="container">
            <div class="section-title">
                <!-- <span>Posts</span> -->
                <h2><span>Latest Post From Our Blog</span></h2>
            </div>
            <div class="row mb-3 text-center">
                <x-head-category_news btn='default-btn-one' />
            </div>

            <div class="row">
                @foreach($news as $n)
                <div class="col-lg-4 col-sm-6 mb-3" style="display: flex">
                    <div class="blog-card">
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
                        <div class="blog-card-text">
                            <h3><a href="{{ url('/news-detail', $n->slug) }}">{{
                                    \Illuminate\Support\Str::limit($n->title,
                                    50, $end='...') }}</a></h3>
                            <ul>
                                <li>
                                    <i class="las la-calendar"></i>
                                    {{ \Carbon\Carbon::parse($n->date)->format('l') }}, {{
                                    \Carbon\Carbon::parse( $n->date
                                    )->toFormattedDateString() }}
                                </li>
                                <li>
                                    <i class="las la-user-alt"></i>
                                    {{ $n->upload_by }}
                                </li>
                            </ul>
                            <a href="{{ url('/news-detail', $n->slug) }}">
                                Read More <i class="las la-angle-double-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @if($loop->iteration == 6)
                @break
                @endif
                @endforeach
            </div>
        </div>
    </div>
    @endif
    <!-- End Blog Area -->

    <div class="blog-area pt-100 pb-70">
        <x-seputar-wonosobo :message='$berita' />
    </div>

    <!-- Contact Area -->
    <div class="contact-area ptb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="contact-text">
                        <div class="section-title">
                            <h2>Contact Us Today, Get In Touch With Expert</h2>
                            <p>On the other hand, we denounce with righteous indignation and dislike men who are so
                                beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire
                                hat they cannot foresee the pain and trouble.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="section-title">
                        <span>Contact Form</span>
                    </div>
                    <div class="contact-form">
                        {{Form::open(['url' => 'kotakmasuk','method' => 'post', 'files' => 'true', '', 'class' =>
                        'subscribe-form'])}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{Form::text('name', null,['class' => 'form-control', 'placeholder' => 'Your Name',
                                    'required'])}}
                                    <i class="las la-user"></i>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{Form::email('email', null,['class' => 'form-control', 'placeholder' => 'Email',
                                    'required'])}}
                                    <i class="las la-envelope"></i>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{Form::number('phone', null,['class' => 'form-control',
                                    'placeholder' => 'Phone Number',
                                    'required'])}}
                                    <i class="las la-phone"></i>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
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
                                    <i class="las la-calculator"></i>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group" style="margin-bottom: 30px; padding: 10px 40px;">
                                    {{Form::textarea('message', null,['class' => 'form-control', 'placeholder' =>
                                    'Message',
                                    'required'])}}
                                    <i class="las la-sms"></i>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <div class="form-group">
                                    <button type="submit" class="default-btn-one">Send Message</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>

    <!-- start map -->
    <section>
        <div class="map">
            <iframe src="https://maps.google.com/maps?q={{ $data_website->latitude }},{{
                    $data_website->longitude }}&z=14&output=embed" frameborder="0" allowfullscreen width="100%"
                height="300px"></iframe>
        </div>
    </section>
    <!-- end map -->

</div>
<!-- End Contact Area -->

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