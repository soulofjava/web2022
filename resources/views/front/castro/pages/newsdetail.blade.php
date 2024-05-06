@extends('front.castro.layouts.app')

@section('content')
<!-- page-title -->
<section class="page-title centred">
    <div class="pattern-layer"
        style="background-image: url({{ asset('master/Castro/assets/images/background/page-title.jpg') }});">
    </div>
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
<!-- page-title end -->
<!-- blog-details -->
<section class="blog-details">
    <div class="auto-container">
        <div class="blog-details-content">
            <figure class="image-box">
                @if(count($data->gambar))
                <x-carousel :jjj='$data' />
                @else
                <!-- <img src="{{ asset('img/soulofjava.jpg') }}" alt="soul of java"> -->
                @endif
            </figure>
            <div class="inner-box">
                <ul class="post-info clearfix">
                    <li>{{ \Carbon\Carbon::parse($data->date)->isoFormat('dddd, D MMMM YYYY') }}</li>
                    <li><a href="#">by {{ $data->uploader->name ?? 'Admin' }}</a></li>
                    <li><a href="#">Dilihat {{
                            views($data)->count(); }} kali</a></li>
                </ul>
                <div class="text">
                    {!! $data->content !!}
                </div>
                <div class="post-share-option clearfix">
                    <div class="tags-box pull-left">
                        <!-- <h4>Tags:</h4>
                        <ul class="tags-list clearfix">
                            <li><a href="#">Retail</a></li>
                            <li><a href="#">Fashion</a></li>
                        </ul> -->
                    </div>
                    <div class="social-box pull-right">
                        <h4>Follow Us:</h4>
                        <ul class="social-links clearfix">
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-skype"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!-- <div class="comments-area">
                    <div class="group-title">
                        <h3>2 Comments</h3>
                    </div>
                    <div class="comment-box">
                        <div class="comment">
                            <figure class="thumb-box">
                                <img src="assets/images/news/comment-1.png" alt="">
                            </figure>
                            <div class="comment-inner">
                                <h6>Eileen Alene <span>- May 2, 2020</span></h6>
                                <p>Excepteur sint occaecat cupidatat non proident sunt in culpa qui officia deserunt
                                    mollit anim est laborum. Sed perspiciatis unde omnis natus error sit voluptatem.</p>
                                <a href="blog-single.html">Reply<i class="flaticon-right-1"></i></a>
                            </div>
                        </div>
                        <div class="comment replay-comment">
                            <figure class="thumb-box">
                                <img src="assets/images/news/comment-2.png" alt="">
                            </figure>
                            <div class="comment-inner">
                                <h6>Eileen Alene <span>- May 2, 2020</span></h6>
                                <p>Excepteur sint occaecat cupidatat non proident sunt in culpa qui officia deserunt
                                    mollit anim laborum. Sed perspiciatis unde omnis natus error sit voluptam accusa.
                                </p>
                                <a href="blog-single.html">Reply<i class="flaticon-right-1"></i></a>
                            </div>
                        </div>
                        <div class="comment replay-comment">
                            <figure class="thumb-box">
                                <img src="assets/images/news/comment-3.png" alt="">
                            </figure>
                            <div class="comment-inner">
                                <h6>Eileen Alene <span>- May 2, 2020</span></h6>
                                <p>Excepteur sint occaecat cupidatat non proident sunt in culpa qui officia deserunt
                                    mollit anim est laborum perspiciatis.</p>
                                <a href="blog-single.html">Reply<i class="flaticon-right-1"></i></a>
                            </div>
                        </div>
                        <div class="comment">
                            <figure class="thumb-box">
                                <img src="assets/images/news/comment-4.png" alt="">
                            </figure>
                            <div class="comment-inner">
                                <h6>Eileen Alene <span>- May 1, 2020</span></h6>
                                <p>Excepteur sint occaecat cupidatat non proident sunt in culpa qui officia deserunt
                                    mollit anim est laborum. Sed perspiciatis unde omnis.</p>
                                <a href="blog-single.html">Reply<i class="flaticon-right-1"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="comments-form-area">
                    <div class="group-title">
                        <h3>Leave A Comments</h3>
                    </div>
                    <form action="#" method="post" class="comment-form">
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="text" name="name" placeholder="Name" required="">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="email" name="email" placeholder="Email" required="">
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                <textarea name="message" placeholder="Message"></textarea>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                                <button type="submit" class="theme-btn-two">Submit Comment<i
                                        class="flaticon-right-1"></i></button>
                            </div>
                        </div>
                    </form>
                </div> -->
            </div>
        </div>
    </div>
</section>
<!-- blog-details end -->
@endsection