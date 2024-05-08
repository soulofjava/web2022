@extends('front.detox.layouts.app')

@section('content')
<!--Page Title-->
<section class="page-title bg-color-1 text-center">
    <div class="pattern-layer"
        style="background-image: url('{{ asset('master/Detox/assets/images/shape/pattern-18.png') }}');"></div>
    <div class="auto-container">
        <div class="content-box">
            <h1>{{ $data->menu_name ?? $data->title }}</h1>
            <ul class="bread-crumb clearfix">
                <li><i class="flaticon-home-1"></i><a href="{{ url('/') }}">Beranda</a></li>
                <li><a href="{{ url('newsall') }}">Semua Postingan</a></li>
                <li>{{ $data->title }}</li>
            </ul>
        </div>
    </div>
</section>
<!-- blog-details -->
<section class="sidebar-page-container blog-details">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 content-side">
                <div class="blog-details-content">
                    <div class="news-block-one">
                        <div class="inner-box">
                            <div class="image-holder">
                                <figure class="image-box">
                                    @if(count($data->gambar))
                                    <x-carousel :jjj='$data' />
                                    @else
                                    <!-- <img src="{{ asset('img/soulofjava.jpg') }}" alt="soul of java"> -->
                                    @endif
                                </figure>
                                <div class="post-date"><i class="fas fa-calendar-alt"></i>
                                    <p>{{ \Carbon\Carbon::parse($data->date)->isoFormat('dddd, D MMMM YYYY') }}</p>
                                </div>
                            </div>
                            <div class="lower-content">
                                <div class="upper-box">
                                    <ul class="post-info">
                                        <li><span>by</span>&nbsp;<a href="#">{{ $data->uploader->name ?? 'Admin' }}</a>
                                        </li>
                                        <li><a href="#">Dilihat {{
                                                views($data)->count(); }} kali</a></li>
                                    </ul>
                                    <h3>{{ $data->title }}</h3>
                                    <div class="text">
                                        {!! $data->content !!}
                                    </div>
                                </div>
                                <div class="post-share-option">
                                    <ul class="tags-list clearfix">
                                        <li>
                                            <h5>Tags:</h5>
                                        </li>
                                        <li><a href="#">Design</a>,</li>
                                        <li><a href="#">Development</a></li>
                                    </ul>
                                    <ul class="social-links clearfix">
                                        <li>
                                            <h5>Share:</h5>
                                        </li>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="comments-area">
                        <div class="group-title">
                            <h3>Comments</h3>
                        </div>
                        <div class="comment-box">
                            <div class="comment">
                                <figure class="thumb-box">
                                    <img src="assets/images/resource/comment-1.png" alt="">
                                </figure>
                                <div class="comment-inner">
                                    <div class="clearfix">
                                        <div class="comment-info pull-left">
                                            <h5>Laura D Rivas</h5>
                                            <span class="comment-time">15 january 2019 At 10:30 pm</span>
                                        </div>
                                        <div class="replay-btn pull-right">
                                            <a href="#">Reply</a>
                                        </div>
                                    </div>
                                    <div class="text">Ne erat velit invidunt his. Eum in dicta veniam interesset, harum
                                        fuisset te nam ea cu lupta definitionem.</div>
                                </div>
                            </div>
                            <div class="comment replay-comment">
                                <figure class="thumb-box">
                                    <img src="assets/images/resource/comment-3.png" alt="">
                                </figure>
                                <div class="comment-inner">
                                    <div class="clearfix">
                                        <div class="comment-info pull-left">
                                            <h5>Laura D Rivas</h5>
                                            <span class="comment-time">15 january 2019 At 10:30 pm</span>
                                        </div>
                                        <div class="replay-btn pull-right">
                                            <a href="#">Reply</a>
                                        </div>
                                    </div>
                                    <div class="text">Ne erat velit invidunt his. Eum in dicta veniam interesset, harum
                                        fuisset te nam ea cu lupta definitionem.</div>
                                </div>
                            </div>
                            <div class="comment">
                                <figure class="thumb-box">
                                    <img src="assets/images/resource/comment-2.png" alt="">
                                </figure>
                                <div class="comment-inner">
                                    <div class="clearfix">
                                        <div class="comment-info pull-left">
                                            <h5>Martin Cohen</h5>
                                            <span class="comment-time">14 january 2019 At 10:00 pm</span>
                                        </div>
                                        <div class="replay-btn pull-right">
                                            <a href="#">Reply</a>
                                        </div>
                                    </div>
                                    <div class="text">Ne erat velit invidunt his. Eum in dicta veniam interesset, harum
                                        fuisset te nam ea cu lupta definitionem.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comments-form-area">
                        <div class="group-title">
                            <h3>Leave a Comment</h3>
                        </div>
                        <form action="#" method="post" class="comment-form default-form">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text" name="name" placeholder="Your Name*" required="">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="email" name="email" placeholder="Your Email*" required>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <textarea name="message" placeholder="Your Comment here..."></textarea>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                                    <button type="submit" class="theme-btn style-one">Post Now</button>
                                </div>
                            </div>
                        </form>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- blog-details end -->
@endsection