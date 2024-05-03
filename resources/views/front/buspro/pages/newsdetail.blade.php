@extends('front.buspro.layout.app')

@section('content')
<!-- Start Breadcrumb 
    ============================================= -->
<div class="breadcrumb-area shadow dark bg-fixed text-center text-light"
    style="background-image: url(assets/img/2440x1578.png);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h1>{{ $data->menu_name ?? $data->title }}</h1>
                <ul class="breadcrumb">
                    <li><a href="{{ url('/') }}"><i class="fas fa-home"></i> Beranda</a></li>
                    <li><a href="{{ url('newsall') }}"> Semua Postingan</a></li>
                    <li class="active"> {{ $data->title }}</li>
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
                    <div class="item">

                        <!-- Start Post Thumb -->
                        <div class="thumb">
                            @if(count($data->gambar))
                            <x-carousel :jjj='$data' />
                            @else
                            <!-- <img src="{{ asset('img/soulofjava.jpg') }}" alt="soul of java"> -->
                            @endif
                        </div>
                        <!-- Start Post Thumb -->

                        <div class="info content-box">
                            <div class="meta">
                                <!-- <div class="cats">
                                    <a href="#">Business</a>
                                    <a href="#">Assets</a>
                                </div> -->
                                <div class="date">
                                    <i class="fas fa-calendar-alt"></i> 29 Feb, 2019
                                </div>
                            </div>

                            <h3>{{ $data->title }}</h3>

                            {!! $data->description !!}

                            <!-- Start Post Pagination -->
                            <div class="post-pagi-area">
                                <a href="{{ ($prev_data == []) ? '#' : url('/news-detail', $prev_data->slug) }}">
                                    <i class="fas fa-angle-double-left"></i>
                                    Previus Post
                                </a>
                                <a href="{{  ($next_data == []) ? '#' : url('/news-detail', $next_data->slug) }}">
                                    Next Post
                                    <i class="fas fa-angle-double-right"></i>
                                </a>
                            </div>
                            <!-- End Post Pagination -->

                            <!-- Start Post Tag s-->
                            <!-- <div class="post-tags share">
                                <div class="tags">
                                    <span>Tags: </span>
                                    <a href="#">Consulting</a>
                                    <a href="#">Planing</a>
                                    <a href="#">Business</a>
                                    <a href="#">Fashion</a>
                                </div>
                            </div> -->
                            <!-- End Post Tags -->

                            <!-- Start Author Post -->
                            <!-- <div class="author-bio">
                                <div class="avatar">
                                    <img src="assets/img/800x800.png" alt="Author">
                                </div>
                                <div class="content">
                                    <p>
                                        Supply as so period it enough income he genius. Themselves acceptance bed
                                        sympathize get dissimilar way admiration son. Design for are edward regret met
                                        lovers. This are calm case roof and.

                                    </p>
                                    <h4> - Jonkey Rotham</h4>
                                </div>
                            </div> -->
                            <!-- End Author Post -->

                            <!-- Start Comments Form -->
                            <!-- <div class="comments-area">
                                <div class="comments-title">
                                    <h4>
                                        5 comments
                                    </h4>
                                    <div class="comments-list">
                                        <div class="commen-item">
                                            <div class="avatar">
                                                <img src="assets/img/800x800.png" alt="Author">
                                            </div>
                                            <div class="content">
                                                <h5>Jonathom Doe</h5>
                                                <div class="comments-info">
                                                    <p>July 15, 2018</p> <a href="#"><i
                                                            class="fa fa-reply"></i>Reply</a>
                                                </div>
                                                <p>
                                                    Delivered ye sportsmen zealously arranging frankness estimable as.
                                                    Nay any article enabled musical shyness yet sixteen yet blushes.
                                                    Entire its the did figure wonder off.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="commen-item reply">
                                            <div class="avatar">
                                                <img src="assets/img/800x800.png" alt="Author">
                                            </div>
                                            <div class="content">
                                                <h5>Spark Lee</h5>
                                                <div class="comments-info">
                                                    <p>July 15, 2018</p> <a href="#"><i
                                                            class="fa fa-reply"></i>Reply</a>
                                                </div>
                                                <p>
                                                    Delivered ye sportsmen zealously arranging frankness estimable as.
                                                    Nay any article enabled musical shyness yet sixteen yet blushes.
                                                    Entire its the did figure wonder off.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="comments-form">
                                    <div class="title">
                                        <h4>Leave a comments</h4>
                                    </div>
                                    <form action="#" class="contact-comments">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input name="name" class="form-control" placeholder="Name *"
                                                        type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input name="email" class="form-control" placeholder="Email *"
                                                        type="email">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group comments">
                                                    <textarea class="form-control" placeholder="Comment"></textarea>
                                                </div>
                                                <div class="form-group full-width submit">
                                                    <button type="submit">
                                                        Post Comments
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div> -->
                            <!-- End Comments Form -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Blog -->
@endsection