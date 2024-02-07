@extends('front.layouts.app')
@section('content')
<!-- Banner Area Starts -->
<section class="banner-area other-page">
    <div class="container">
        <div class="row header-judul">
            <div class="col-lg-12">
                <h1>{{ $data->title }}</h1>
                <a href="{{ url('/') }}">Beranda</a> <span>|</span> <a href="{{ url('newsall') }}">Semua
                    Postingan</a> |</span> <a href="{{ url('newsall') }}">Detail Postingan</a>
            </div>
        </div>
    </div>
</section>
<!-- Banner Area End -->

<!--================Blog Area =================-->
<section class="blog_area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <div class="post-img">
                    <x-carousel :jjj='$data' />
                </div>
                <div class="single-post row">
                    {!! $data->description !!}
                </div>
                <!-- <div class="comments-area">
                    <h4>05 Comments</h4>
                    <div class="comment-list">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                    <img src="{{ asset('assets/front/medino/images/blog-details/c1.jpg') }}" alt="">
                                </div>
                                <div class="desc">
                                    <h5><a href="#">Emilly Blunt</a></h5>
                                    <p class="date">December 4, 2017 at 3:12 pm </p>
                                    <p class="comment">
                                        Never say goodbye till the end comes!
                                    </p>
                                </div>
                            </div>
                            <div class="reply-btn">
                                <a href="" class="btn-reply text-uppercase">reply</a>
                            </div>
                        </div>
                    </div>
                    <div class="comment-list left-padding">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                    <img src="{{ asset('assets/front/medino/images/blog-details/c2.jpg') }}" alt="">
                                </div>
                                <div class="desc">
                                    <h5><a href="#">Elsie Cum</a></h5>
                                    <p class="date">December 4, 2017 at 3:12 pm </p>
                                    <p class="comment">
                                        Never say goodbye till the end comes!
                                    </p>
                                </div>
                            </div>
                            <div class="reply-btn">
                                <a href="" class="btn-reply text-uppercase">reply</a>
                            </div>
                        </div>
                    </div>
                    <div class="comment-list left-padding">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                    <img src="{{ asset('assets/front/medino/images/blog-details/c3.jpg') }}" alt="">
                                </div>
                                <div class="desc">
                                    <h5><a href="#">Annie Steph</a></h5>
                                    <p class="date">December 4, 2017 at 3:12 pm </p>
                                    <p class="comment">
                                        Never say goodbye till the end comes!
                                    </p>
                                </div>
                            </div>
                            <div class="reply-btn">
                                <a href="" class="btn-reply text-uppercase">reply</a>
                            </div>
                        </div>
                    </div>
                    <div class="comment-list">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                    <img src="{{ asset('assets/front/medino/images/blog-details/c4.jpg') }}" alt="">
                                </div>
                                <div class="desc">
                                    <h5><a href="#">Maria Luna</a></h5>
                                    <p class="date">December 4, 2017 at 3:12 pm </p>
                                    <p class="comment">
                                        Never say goodbye till the end comes!
                                    </p>
                                </div>
                            </div>
                            <div class="reply-btn">
                                <a href="" class="btn-reply text-uppercase">reply</a>
                            </div>
                        </div>
                    </div>
                    <div class="comment-list">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                    <img src="{{ asset('assets/front/medino/images/blog-details/c5.jpg') }}" alt="">
                                </div>
                                <div class="desc">
                                    <h5><a href="#">Ina Hayes</a></h5>
                                    <p class="date">December 4, 2017 at 3:12 pm </p>
                                    <p class="comment">
                                        Never say goodbye till the end comes!
                                    </p>
                                </div>
                            </div>
                            <div class="reply-btn">
                                <a href="" class="btn-reply text-uppercase">reply</a>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- <div class="comment-form">
                    <h4>Leave a Reply</h4>
                    <form>
                        <div class="form-group form-inline">
                            <div class="form-group col-lg-6 col-md-6 name">
                                <input type="text" class="form-control" id="name" placeholder="Enter Name"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'">
                            </div>
                            <div class="form-group col-lg-6 col-md-6 email">
                                <input type="email" class="form-control" id="email" placeholder="Enter email address"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="subject" placeholder="Subject"
                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Subject'">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control mb-10" rows="5" name="message" placeholder="Messege"
                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'"
                                required=""></textarea>
                        </div>
                        <a href="#" class="template-btn">Post Comment</a>
                    </form>
                </div> -->
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget search_widget">
                        {{Form::open(['route' => 'news.search','method' => 'get', ''])}}
                        <div class="input-group">
                            <!-- <input type="text" class="form-control"> -->
                            {{Form::text('kolomcari', null,['class' => 'form-control',
                            'placeholder' => 'Cari Postingan'])}}
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                            </span>
                            <!-- <button type="submit"><i class="fa fa-search"></i></button> -->
                        </div>
                        {{Form::close()}}
                        <div class="br"></div>
                    </aside>
                    <aside class="single_sidebar_widget author_widget">
                        <img class="author_img rounded-circle"
                            src="https://ui-avatars.com/api/?name= {{ $data->uploader->name }}" alt="Author">
                        <h5>{{ $data->uploader->name }}</h5>
                        <div class="br"></div>
                    </aside>
                    <aside class="single_sidebar_widget popular_post_widget">
                        <h4 class="widget_title">Postingan Terbaru</h4>
                        @foreach($news as $n)
                        <div class="media post_item">
                            @if($n->gambarmuka)
                            <img src="{{ asset('storage/') }}/{{ $n->gambarmuka->path }}" width="100px" height="60px"
                                alt="{{ $n->gambarmuka->file_name }}">
                            @else
                            <img src="{{ asset('img/soulofjava.jpg') }}" width="100px" height="60px" alt="soul of java">
                            @endif
                            <div class="media-body">
                                <a href="{{ url('/news-detail', $n->slug) }}">
                                    <h5>{{ \Illuminate\Support\Str::limit($n->title, 50, $end='...') }}</h5>
                                </a>
                                <p>{{ \Carbon\Carbon::parse($n->date
                                    )->diffForHumans(); }}</p>
                            </div>
                        </div>
                        @endforeach
                        <div class="br"></div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================Blog Area =================-->
@endsection
@push('after-script')
@endpush