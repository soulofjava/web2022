@extends('front.blubuild.layouts.app')
@section('content')
<section>
    <div class="w-100 pt-170 pb-150 dark-layer3 opc7 position-relative">
        <div class="fixed-bg" style="background-image: url(assets/images/pagetop-bg.jpg);"></div>
        <div class="container">
            <div class="page-top-wrap w-100">
                <h1 class="mb-0">{{ $data->title }}</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" title="">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('newsall') }}" title="">News</a></li>
                    <li class="breadcrumb-item active">News Details</li>
                </ol>
            </div>
            <!-- Page Top Wrap -->
        </div>
    </div>
</section>
<section>
    <div class="w-100 pt-100 pb-100 position-relative">
        <div class="container">
            <div class="post-detail-wrap w-100">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-8">
                        <div class="post-detail w-100">
                            <x-carousel :jjj='$data' />
                            <!-- <img class="img-fluid w-100" src="assets/images/resources/blog-detail-img.jpg"
                                alt="Blog Detail Image"> -->
                            <!-- <h2 class="mb-0">Technical Support ( Computer Repair & Help Desk )</h2> -->

                            <p class="mb-0">{!! $data->description !!}</p>

                            <div class="detail-share w-100">
                                <span>Share:</span>
                                {!! Share::page(Request::getHttpHost(), $data->title, [], '', '')
                                ->facebook(); !!}
                                {!! Share::page(Request::getHttpHost(), $data->title, [], '', '')
                                ->twitter(); !!}
                                {!! Share::page(Request::getHttpHost(), $data->title, [], '', '')
                                ->whatsapp(); !!}
                                <a href="#">
                                    <i class="fa fa-solid fa-eye"></i>
                                    {{
                                    views($data)->count(); }}</a>
                            </div>
                            <!-- <div class="comments w-100">
                                <h3 class="mb-0">Comments (2)</h3>
                                <ul class="comments-thread mb-0 list-unstyled">
                                    <li>
                                        <div class="comment w-100">
                                            <div class="comment-img"><span class="rounded-circle"><img
                                                        class="img-fluid rounded-circle"
                                                        src="assets/images/resources/comment-img1.png"
                                                        alt="Comment Image 1"></span></div>
                                            <div class="comment-detail">
                                                <h4 class="mb-0">Kosmi Kotalia</h4>
                                                <p class="mb-0">There are many variations of passages of Lorem Ipsum
                                                    available, but the majority some form, by injected humour, or
                                                    randomised words which.</p>
                                                <a class="comment-reply-link d-inline-block" href="javascript:void(0);"
                                                    title=""><i class="fas fa-reply-all"></i>Reply</a>
                                                <span class="d-inline-block"><i class="far fa-clock"></i>39 minutes
                                                    ago</span>
                                            </div>
                                        </div>
                                        <ul class="children mb-0 list-unstyled">
                                            <li>
                                                <div class="comment w-100">
                                                    <div class="comment-img"><span class="rounded-circle"><img
                                                                class="img-fluid rounded-circle"
                                                                src="assets/images/resources/comment-img2.png"
                                                                alt="Comment Image 2"></span></div>
                                                    <div class="comment-detail">
                                                        <h4 class="mb-0">Envato Market</h4>
                                                        <p class="mb-0">There are many variations of passages of Lorem
                                                            Ipsum available, but some form, by injected humour, or
                                                            randomised words.</p>
                                                        <a class="comment-reply-link d-inline-block"
                                                            href="javascript:void(0);" title=""><i
                                                                class="fas fa-reply-all"></i>Reply</a>
                                                        <span class="d-inline-block"><i class="far fa-clock"></i>39
                                                            minutes ago</span>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div> -->
                            <!-- Comments -->
                            <!-- <div class="reply-form w-100">
                                <h3 class="mb-0">Leave Reply</h3>
                                <form class="w-100">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-lg-6">
                                            <div class="field-wrap w-100">
                                                <label>Nick name:</label>
                                                <input type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-lg-6">
                                            <div class="field-wrap w-100">
                                                <label>Email Address:</label>
                                                <input type="email">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                            <div class="field-wrap w-100">
                                                <label>Write a message:</label>
                                                <textarea></textarea>
                                            </div>
                                            <button class="thm-btn thm-bg" type="submit">Learn More<i
                                                    class="flaticon-arrow-pointing-to-right"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-lg-4">
                        <aside class="sidebar-wrap w-100">
                            <div class="widget2 brd-rd5 w-100">
                                <div class="about-widget text-center w-100">
                                    <div class="about-widget-img d-inline-block">
                                        <!-- <a class="thm-bg rounded-circle" href="javascript:void(0);" title=""><i
                                                class="fab fa-facebook-f"></i></a> -->
                                        <img class="img-fluid rounded-circle"
                                            src="https://ui-avatars.com/api/?name={{ $data->uploader->name }}"
                                            alt="{{ $data->uploader->name }}">
                                        <!-- <img class="img-fluid rounded-circle"
                                            src="assets/images/resources/about-widget-img.jpg" alt="About Image"> -->
                                    </div>
                                    <h4 class="mb-0">About Me</h4>
                                    <p class="mb-0">“Praesent scelerisque, odio eu fermentum malesuada, nisi arcu
                                        volutpat nisl, sit amet convallis nun”</p>
                                    <span class="d-block"><a href="{{ url('/news-author', $data->upload_by) }}">
                                            {{
                                            $data->uploader->name }}
                                        </a></span>
                                </div>
                            </div>
                            <div class="widget2 search_widget brd-rd5 w-100">
                                <h3>Keyword</h3>
                                {{Form::open(['route' => 'news.search','method' => 'get', '','class' => 'w-100'])}}
                                {{Form::text('kolomcari', null,['class' => 'form-control',
                                'placeholder' => 'Title Post'])}}
                                <button type="submit"><i class="fas fa-search"></i></button>
                                {{Form::close()}}
                            </div>

                            <div class="widget2 category_widget brd-rd5 w-100">
                                <x-category h3='sidebar-title' div='sidebar-item categories' />
                            </div>

                            <!-- <div class="widget2 category_widget brd-rd5 w-100">
                                <h3>Category</h3>
                                <ul class="mb-0 list-unstyled w-100">
                                    <li><a href="javascript:void(0);" title="">PSD Templates</a>50</li>
                                    <li><a href="javascript:void(0);" title="">WordPress</a>60</li>
                                    <li><a href="javascript:void(0);" title="">Marketing</a>70</li>
                                    <li><a href="javascript:void(0);" title="">eCommerce</a>80</li>
                                    <li><a href="javascript:void(0);" title="">CMS Themes</a>90</li>
                                    <li><a href="javascript:void(0);" title="">Marketing</a>23</li>
                                    <li><a href="javascript:void(0);" title="">Software</a>65</li>
                                    <li><a href="javascript:void(0);" title="">Business</a>6</li>
                                </ul>
                            </div> -->
                            <!-- <div class="widget2 tags_widget brd-rd5 w-100">
                                <h3>Tags</h3>
                                <div class="tagclouds w-100">
                                    <a href="javascript:void(0);" title="">Isabella</a>
                                    <a href="javascript:void(0);" title="">Samantha</a>
                                    <a href="javascript:void(0);" title="">Emily</a>
                                    <a href="javascript:void(0);" title="">Isabelle</a>
                                    <a href="javascript:void(0);" title="">Grace</a>
                                    <a href="javascript:void(0);" title="">Grace</a>
                                    <a href="javascript:void(0);" title="">Madison</a>
                                    <a href="javascript:void(0);" title="">Grace</a>
                                </div>
                            </div> -->
                            <!-- <div class="widget2 rating_widget brd-rd5 w-100">
                                <h3>Rating</h3>
                                <ul class="rate-list mb-0 list-unstyled w-100">
                                    <li><a href="javascript:void(0);" title=""><span class="rate"><i
                                                    class="far fa-star"></i><i class="far fa-star"></i><i
                                                    class="far fa-star"></i><i class="far fa-star"></i><i
                                                    class="far fa-star"></i></span></a></li>
                                    <li><a href="javascript:void(0);" title=""><span class="rate"><i
                                                    class="far fa-star"></i><i class="far fa-star"></i><i
                                                    class="far fa-star"></i><i class="far fa-star"></i></span></a></li>
                                    <li><a href="javascript:void(0);" title=""><span class="rate"><i
                                                    class="far fa-star"></i><i class="far fa-star"></i><i
                                                    class="far fa-star"></i></span></a></li>
                                    <li><a href="javascript:void(0);" title=""><span class="rate"><i
                                                    class="far fa-star"></i><i class="far fa-star"></i></span></a></li>
                                    <li><a href="javascript:void(0);" title=""><span class="rate"><i
                                                    class="far fa-star"></i></span></a></li>
                                </ul>
                            </div> -->
                            <div class="widget2 blog_widget brd-rd5 w-100">
                                <h3>Latest Blog</h3>
                                <div class="blog-widget-post-list w-100">
                                    @foreach($news as $n)
                                    <div class="blog-mini-post w-100">
                                        <a href="{{ url('/news-detail', $n->slug) }}">
                                            @if($n->gambarmuka)
                                            <img class="img-fluid"
                                                src="{{ asset('storage/') }}/{{ $n->gambarmuka->path}}"
                                                alt="{{ $n->title}}">
                                            @else
                                            <img class="img-fluid" src="{{ asset('img/soulofjava.jpg') }}"
                                                alt="soulofjava">
                                            @endif
                                        </a>
                                        <div class="blog-mini-post-info">
                                            <h4 class="mb-0"><a href="{{ url('/news-detail', $n->slug) }}">{{
                                                    \Illuminate\Support\Str::limit($n->title, 50, $end='...') }}</a>
                                            </h4>
                                            <span class="d-block mini-post-date">{{
                                                \Carbon\Carbon::parse( $n->date
                                                )->toFormattedDateString() }}</span>
                                            <!-- <span class="d-block mini-post-comments"><i
                                                    class="far fa-comments thm-clr"></i>66 Comments</span> -->
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- <div class="widget2 p-0 video-widget brd-rd5 w-100">
                                <div class="widget-video-box w-100 position-relative">
                                    <img class="img-fluid w-100" src="assets/images/resources/widget-video-img.jpg"
                                        alt="Widget Video Image">
                                    <a class="spinner" href="https://www.youtube.com/embed/6gUOzbhtVd4" data-fancybox
                                        title=""><i class="fas fa-plus"></i></a>
                                </div>
                            </div> -->
                        </aside>
                        <!-- Sidebar Wrap -->
                    </div>
                </div>
            </div>
            <!-- Blog Detail Wrap -->
        </div>
    </div>
</section>
@endsection
@push('after-script')
@endpush