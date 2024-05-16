@extends('front.boxass.layouts.app')
@section('content')
<main id="main">

    <!-- Start Breadcrumb
        ============================================= -->
    <div class="breadcrumb-area shadow bg-fixed text-center padding-xl text-light" style="background-color: #F4F7FB;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <!-- <h1>Blog Single</h1> -->
                    <ul class="breadcrumb">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ url('newsall') }}">postingan</a></li>
                        <li><a href="#">{{ $data->title }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->
    <!-- Start Blog
            ============================================= -->
    <div id="blog" class="blog-area bg-gray full-width single default-padding">
        <div class="container">
            <div class="row">
                <div class="blog-items">
                    <div class="col-lg-12 col-md-12">
                        <div class="item">
                            <div class="thumb">
                                @if(count($data->gambar))
                                <x-carousel :jjj='$data' />
                                @else
                                <!-- <img src="{{ asset('img/soulofjava.jpg') }}" alt="soul of java"> -->
                                @endif
                            </div>

                            <div class="info">
                                <div class="meta">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <img src="https://ui-avatars.com/api/?name= {{ $data->uploader->name ?? 'Admin' }}"
                                                    alt="Author">
                                                <span> {{ $data->uploader->name ?? 'Admin' }}</span>
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
                                                <span>{{
                                                    views($data)->count(); }}</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <h3>{{ $data->title }}</h3>
                                {!! $data->content !!}
                                <!-- <div class="post-tags">
                                    <span>Tags: </span>
                                    <a href="#">Consulting</a>
                                    <a href="#">Planing</a>
                                    <a href="#">Business</a>
                                    <a href="#">Fashion</a>
                                </div> -->
                                <div class="post-pagi-area">
                                    <a href="{{ ($prev_data == []) ? '#' : url('/news-detail', $prev_data->slug) }}">
                                        <i class="fas fa-arrow-left"></i>
                                        Previus Post</a>
                                    <a href="{{  ($next_data == []) ? '#' : url('/news-detail', $next_data->slug) }}">
                                        Next Post <i class="fas fa-arrow-right"></i></a>
                                </div>
                                <!-- <div class="comments-area">
                                    <div class="comments-title">
                                        <h4>5 comments</h4>
                                        <div class="comments-list">
                                            <div class="commen-item">
                                                <div class="avatar">
                                                    <img src="https://ui-avatars.com/api/?name=Jonathom Doe"
                                                        alt="Author">
                                                </div>
                                                <div class="content">
                                                    <h5>Jonathom Doe</h5>
                                                    <div class="comments-info">
                                                        <p>July 15, 2019</p> <a href="#"><i
                                                                class="fa fa-reply"></i>Reply</a>
                                                    </div>
                                                    <p>
                                                        Delivered ye sportsmen zealously arranging frankness estimable
                                                        as.
                                                        Nay any article enabled musical shyness. <br> yet sixteen yet
                                                        blushes. Entire its the did figure wonder off.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="commen-item reply">
                                                <div class="avatar">
                                                    <img src="https://ui-avatars.com/api/?name=Spark Lee" alt="Author">
                                                </div>
                                                <div class="content">
                                                    <h5>Spark Lee</h5>
                                                    <div class="comments-info">
                                                        <p>July 15, 2019</p> <a href="#"><i
                                                                class="fa fa-reply"></i>Reply</a>
                                                    </div>
                                                    <p>
                                                        Delivered ye sportsmen zealously arranging frankness estimable
                                                        as.
                                                        Nay any article enabled musical shyness. <br> yet sixteen yet
                                                        blushes. Entire its the did figure wonder off.
                                                    </p>
                                                </div>
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
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <input name="name" class="form-control" placeholder="Name *"
                                                        type="text">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <input name="email" class="form-control" placeholder="Email *"
                                                        type="email">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
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
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog -->

</main>
@endsection