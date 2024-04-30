@extends('front.Castro.layouts.app')

@section('content')
{{-- <!-- page-title -->
    <section class="page-title centred">
    <div class="pattern-layer" style="background-image: url(assets/images/background/page-title.jpg);"></div>
    <div class="auto-container">
        <div class="content-box">
            <h1>Blog Details 1</h1>
            <ul class="bread-crumb clearfix">
                <li><i class="flaticon-home-1"></i><a href="index.html">Home</a></li>
                <li>Blog Details 1</li>
            </ul>
        </div>
    </div>
    </section>
    <!-- page-title end --> --}}


    <!-- blog-details -->
    <section class="blog-details">
    <div class="auto-container">
        <div class="blog-details-content">
            <figure class="image-box"><img src="assets/images/news/blog-details-1.jpg" alt=""></figure>
            <div class="inner-box">
                <ul class="post-info clearfix">
                    <li>May 5, 2020</li>
                    <li><a href="blog-details.html">by admin</a></li>
                    <li><a href="blog-details.html">03 Comments</a></li>
                </ul>
                <div class="text">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    <h3>The biebers just switched up their couple style.</h3>
                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet.consectetur.</p>
                </div>
                <div class="image-box">
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                            <figure class="image"><img src="assets/images/news/blog-details-2.jpg" alt=""></figure>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                            <figure class="image"><img src="assets/images/news/blog-details-3.jpg" alt=""></figure>
                        </div>
                    </div>
                </div>
                <div class="text">
                    <h3>Why is a ticket to lagos so expensive?</h3>
                    <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamo laboris nisi ut aliquip ex ea commodo consequat. duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium dolore que laudantium totam rem aperiam eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit fugit sed quia consequuntur magni dolore eos qui ratione voluptatem sequi nesciunt. Neque poro quisquam est, qui dolore ipsum quia dolor sit amet.consectetur adipisci velit, sed quia non numquam eius modi tempora.</p>
                </div>
                <div class="post-share-option clearfix">
                    <div class="tags-box pull-left">
                        <h4>Tags:</h4>
                        <ul class="tags-list clearfix">
                            <li><a href="blog-details.html">Retail</a></li>
                            <li><a href="blog-details.html">Fashion</a></li>
                        </ul>
                    </div>
                    <div class="social-box pull-right">
                        <h4>Follow Us:</h4>
                        <ul class="social-links clearfix">
                            <li><a href="blog-details.html"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="blog-details.html"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="blog-details.html"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="blog-details.html"><i class="fab fa-skype"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="comments-area">
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
                                <p>Excepteur sint occaecat cupidatat non proident sunt in culpa  qui officia deserunt mollit anim  est laborum. Sed perspiciatis unde omnis natus error sit voluptatem.</p>
                                <a href="blog-single.html">Reply<i class="flaticon-right-1"></i></a>
                            </div>
                        </div>
                        <div class="comment replay-comment">
                            <figure class="thumb-box">
                                <img src="assets/images/news/comment-2.png" alt="">
                            </figure>
                            <div class="comment-inner">
                                <h6>Eileen Alene <span>- May 2, 2020</span></h6>
                                <p>Excepteur sint occaecat cupidatat non proident sunt in culpa  qui officia deserunt mollit anim  laborum. Sed perspiciatis unde omnis natus error sit voluptam accusa.</p>
                                <a href="blog-single.html">Reply<i class="flaticon-right-1"></i></a>
                            </div>
                        </div>
                        <div class="comment replay-comment">
                            <figure class="thumb-box">
                                <img src="assets/images/news/comment-3.png" alt="">
                            </figure>
                            <div class="comment-inner">
                                <h6>Eileen Alene <span>- May 2, 2020</span></h6>
                                <p>Excepteur sint occaecat cupidatat non proident sunt in culpa  qui officia deserunt mollit anim  est laborum perspiciatis.</p>
                                <a href="blog-single.html">Reply<i class="flaticon-right-1"></i></a>
                            </div>
                        </div>
                        <div class="comment">
                            <figure class="thumb-box">
                                <img src="assets/images/news/comment-4.png" alt="">
                            </figure>
                            <div class="comment-inner">
                                <h6>Eileen Alene <span>- May 1, 2020</span></h6>
                                <p>Excepteur sint occaecat cupidatat non proident sunt in culpa  qui officia deserunt mollit anim  est laborum. Sed perspiciatis unde omnis.</p>
                                <a href="blog-single.html">Reply<i class="flaticon-right-1"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="comments-form-area">
                    <div class="group-title">
                        <h3>Leave A Comments</h3>
                    </div>
                    <form action="blog-details.html" method="post" class="comment-form">
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
                                <button type="submit" class="theme-btn-two">Submit Comment<i class="flaticon-right-1"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- blog-details end -->
@endsection


