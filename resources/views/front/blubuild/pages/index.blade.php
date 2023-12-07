@extends('front.blubuild.layouts.app')
@section('content')
<section>
    <div class="w-100 position-relative">
        <div class="feat-wrap position-relative w-100">
            <div class="feat-caro">
                @foreach(App\Models\News::where('highlight', '1')->orderBy('date',
                'DESC')->take(3)->get() as $hl)

                <div class="feat-item">
                    @if($hl->gambarmuka)
                    <div class="feat-img position-absolute"
                        style="background-image: url('storage/{{ $hl->gambarmuka->path }}');">
                        @else
                        <div class="feat-img position-absolute" style="background-image: url('img/soulofjava.jpg');">
                            @endif
                        </div>
                        <div class="container">
                            <div class="feat-cap">
                                <a href="{{ url('/news-detail', $hl->slug) }}">
                                    <h2 class="mb-0" style="color: white;">{{ $hl->title }}</h2>
                                </a>
                                <div class="feat-cap-innr">
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
</section>

<section>
    <div class="w-100 pt-100 pb-100 position-relative">
        <div class="container">
            <div class="sec-title w-100">
                <div class="sec-title-inner d-inline-block">
                    <span class="d-block thm-clr">OUR BLOG</span>
                    <h3 class="mb-0">Our Latest News</h3>
                </div>
            </div>
            <x-cari-news />
            <x-head-category_news btn='thm-btn thm-bg' />
            <div class="blog-wrap w-100 mt-3">
                <div class="row post-caro">
                    @foreach($news ?? [] as $n)
                    <div class="col-md-6 col-sm-6 col-lg-4" style="display: flex;">
                        <div class="post-box w-100 text-center">
                            <div class="post-img overflow-hidden w-100">
                                <a href="{{ url('/news-detail', $n->slug) }}">
                                    @if($n->gambarmuka)
                                    <img src="{{ asset('storage/') }}/{{  $n->gambarmuka->path }}" class="img-fluid"
                                        alt="{{ $n->gambarmuka->file_name }}" style="height: 246px; width: 370px;">
                                    @else
                                    <img src="{{ asset('img/soulofjava.jpg') }}" class="img-fluid" alt="soul of java"
                                        style="height: 246px; width: 370px;">
                                    @endif
                                </a>
                            </div>
                            <div class="post-info w-100">
                                <h3 class="mb-0"><a href="{{ url('/news-detail', $n->slug) }}">{{
                                        \Illuminate\Support\Str::limit($n->title,
                                        50, $end='...') }}</a></h3>
                                <!-- <p class="mb-0">
                                </p> -->
                                <div class="post-info-bottom d-flex flex-wrap w-100">
                                    <span class="d-inline-block"><i class="far fa-user"></i><a
                                            href="javascript:void(0);">{{ $n->uploader->name }}</a></span>
                                    <ul class="post-meta mb-0 list-unstyled d-inline-flex">
                                        <li><i class="far fa-calendar-alt"></i>{{
                                            \Carbon\Carbon::parse($n->date)->format('l') }}, {{
                                            \Carbon\Carbon::parse( $n->date
                                            )->toFormattedDateString() }}</li>
                                        <!-- <li><i class="fas fa-comment-dots"></i>02</li> -->
                                    </ul>
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
        </div>
    </div>
</section>

<section>
    <div class="w-100 pt-100 pb-100 position-relative">
        <div class="container">
            <x-seputar-wonosobo :message='$berita' />
        </div>
    </div>
</section>

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

<section>
    <div class="w-100 pt-100 pb-100 position-relative">
        <div class="container">
            <div class="sec-title v2 text-center w-100">
                <div class="sec-title-inner d-inline-block">
                    <span class="thm-clr d-block">Contact Us</span>
                    <!-- <h2 class="mb-0">Al is no longer a futuristic notion, it's here right now</h2> -->
                    <!-- <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p> -->
                </div>
            </div>
            {{Form::open(['url' => 'kotakmasuk','method' => 'post', 'files' => 'true', '', 'class' =>
            'contact-form text-center w-100'])}}
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12">
                    <div class="form-group w-100">
                        <div class="response w-100"></div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6">
                    {{Form::text('name', null,['class' => 'form-control', 'placeholder' => 'Your Name',
                    'required'])}}
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6">
                    {{Form::email('email', null,['class' => 'form-control', 'placeholder' => 'Email',
                    'required'])}}
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6">
                    {{Form::number('phone', null,['class' => 'form-control',
                    'placeholder' => 'Phone Number',
                    'required'])}}
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6">
                    <div class="form-group captcha text-center" style="margin-bottom: 30px; padding: 10px 40px;">
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
                <div class="col-md-12 col-sm-12 col-lg-12">
                    {{Form::textarea('message', null,['class' => 'form-control', 'placeholder' =>
                    'Message',
                    'required'])}}
                    <button class="thm-btn thm-bg" type="submit">Send Message Now<i
                            class="flaticon-arrow-pointing-to-right"></i></button>
                </div>
            </div>
            {{Form::close()}}
            <!-- Contact Form -->
        </div>
    </div>
</section>

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