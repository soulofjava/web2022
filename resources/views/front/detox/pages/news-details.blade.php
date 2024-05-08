@extends('front.detox.layouts.app')

@section('content')
<!--Page Title-->
<section class="page-title bg-color-1 text-center">
    <div class="pattern-layer"
        style="background-image: url('{{ asset('master/Detox/assets/images/shape/pattern-18.png') }}');"></div>
    <div class="auto-container">
        <div class="content-box">
            <h1>Blog Details</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="index.html">Home</a></li>
                <li>Blog Details</li>
            </ul>
        </div>
    </div>
</section>
<!--End Page Title-->


<!-- blog-details -->
<section class="sidebar-page-container blog-details">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                <div class="blog-details-content">
                    <div class="news-block-one">
                        <div class="inner-box">
                            <div class="image-holder">
                                <figure class="image-box"><img src="assets/images/news/news-21.jpg" alt="">
                                </figure>
                                <div class="post-date"><i class="fas fa-calendar-alt"></i>
                                    <p>Dec 28</p>
                                </div>
                            </div>
                            <div class="lower-content">
                                <div class="upper-box">
                                    <ul class="post-info">
                                        <li><span>by</span>&nbsp;<a href="blog-details.html">Nicolas</a></li>
                                        <li><a href="blog-details.html">3 Comments</a></li>
                                    </ul>
                                    <h3>How to Become a Successful Businessman.</h3>
                                    <div class="text">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor
                                            incididunt labore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                            exercitation ullamco laboris aliquip commodo consequat.</p>
                                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore
                                            eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident
                                            sunt culpa qui officia deserunt mollit anim id est laborum. Sed perspiciatis
                                            unde omnis iste natus error sit voluptatem accusantium doloremque
                                            laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis.
                                        </p>
                                    </div>
                                </div>
                                <div class="two-column">
                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-12 col-sm-12 text-column">
                                            <div class="text">
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do
                                                    eiusmod tempor incididunt labore magna aliqua. Ut enim ad minim
                                                    veniam, quis nostrud exercitation ullamco laboris aliquip commodo
                                                    consequat.</p>
                                                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                                                    dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                                            <figure class="image-box"><img src="assets/images/news/news-23.jpg" alt="">
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                                <div class="lower-box">
                                    <p>Reprehenderit in voluptate velit esse cillum dolore fugiat nulla pariatur
                                        excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                        deserunt ex mollit anim id est laborum sed ut perspiciatis unde omnis iste natus
                                        error sit voluptatem accusantium doloremque laudantium.</p>
                                </div>
                                <div class="post-share-option">
                                    <ul class="tags-list clearfix">
                                        <li>
                                            <h5>Tags:</h5>
                                        </li>
                                        <li><a href="blog-details.html">Design</a>,</li>
                                        <li><a href="blog-details.html">Development</a></li>
                                    </ul>
                                    <ul class="social-links clearfix">
                                        <li>
                                            <h5>Share:</h5>
                                        </li>
                                        <li><a href="blog-details.html"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="blog-details.html"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="blog-details.html"><i class="fab fa-vimeo-v"></i></a></li>
                                        <li><a href="blog-details.html"><i class="fab fa-linkedin-in"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comments-area">
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
                                    <div class="text">Ne erat velit invidunt his. Eum in dicta veniam interesset,
                                        harum fuisset te nam ea cu lupta definitionem.</div>
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
                                    <div class="text">Ne erat velit invidunt his. Eum in dicta veniam interesset,
                                        harum fuisset te nam ea cu lupta definitionem.</div>
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
                                    <div class="text">Ne erat velit invidunt his. Eum in dicta veniam interesset,
                                        harum fuisset te nam ea cu lupta definitionem.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comments-form-area">
                        <div class="group-title">
                            <h3>Leave a Comment</h3>
                        </div>
                        <form action="blog-details.html" method="post" class="comment-form default-form">
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
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                <div class="sidebar">
                    <div class="sidebar-widget sidebar-search">
                        <div class="widget-title">
                            <h3>Search</h3>
                        </div>
                        <div class="widget-content">
                            <form action="blog-grid.html" method="post">
                                <div class="form-group">
                                    <input type="search" name="search-field" placeholder="Search" required="">
                                    <button type="submit"><i class="fas fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="sidebar-widget sidebar-testimonial">
                        <div class="sidebar-testimonial-carousel owl-carousel owl-theme owl-nav-none">
                            <div class="testimonial-content">
                                <p>Lorem ipsum dolor sit amet con sectetur adipicing elit sed do smod tempor incididunt
                                    enim minim veniam.</p>
                                <div class="author-info">
                                    <h4>Nicolas Lawson</h4>
                                    <span class="designation">Designer</span>
                                </div>
                            </div>
                            <div class="testimonial-content">
                                <p>Lorem ipsum dolor sit amet con sectetur adipicing elit sed do smod tempor incididunt
                                    enim minim veniam.</p>
                                <div class="author-info">
                                    <h4>Nicolas Lawson</h4>
                                    <span class="designation">Designer</span>
                                </div>
                            </div>
                            <div class="testimonial-content">
                                <p>Lorem ipsum dolor sit amet con sectetur adipicing elit sed do smod tempor incididunt
                                    enim minim veniam.</p>
                                <div class="author-info">
                                    <h4>Nicolas Lawson</h4>
                                    <span class="designation">Designer</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-widget sidebar-categories">
                        <div class="widget-title">
                            <h3>Categories</h3>
                        </div>
                        <div class="widget-content">
                            <ul class="clearfix">
                                <li><a href="blog-grid.html">Education<span>(32)</span></a></li>
                                <li><a href="blog-grid.html">Olympiad<span>(7)</span></a></li>
                                <li><a href="blog-grid.html">Drawing<span>(5)</span></a></li>
                                <li><a href="blog-grid.html">Science<span>(2)</span></a></li>
                                <li><a href="blog-grid.html">Science<span>(8)</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar-widget sidebar-post">
                        <div class="widget-title">
                            <h3>Latest News</h3>
                        </div>
                        <div class="post-inner">
                            <div class="post">
                                <figure class="image-box"><a href="blog-details.html"><img
                                            src="assets/images/news/post-1.png" alt=""></a></figure>
                                <div class="post-date"><i class="far fa-calendar-alt"></i>&nbsp;<p>Dec 25, 2019</p>
                                </div>
                                <h5><a href="blog-details.html">Conse quntur magni eos dolore qui.</a></h5>
                            </div>
                            <div class="post">
                                <figure class="image-box"><a href="blog-details.html"><img
                                            src="assets/images/news/post-2.png" alt=""></a></figure>
                                <div class="post-date"><i class="far fa-calendar-alt"></i>&nbsp;<p>Dec 24, 2019</p>
                                </div>
                                <h5><a href="blog-details.html">What to do with your Old Blog Posts?</a></h5>
                            </div>
                            <div class="post">
                                <figure class="image-box"><a href="blog-details.html"><img
                                            src="assets/images/news/post-3.png" alt=""></a></figure>
                                <div class="post-date"><i class="far fa-calendar-alt"></i>&nbsp;<p>Dec 23, 2019</p>
                                </div>
                                <h5><a href="blog-details.html">Ten Instagram the Marketing Tips...</a></h5>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-widget sidebar-tags">
                        <div class="widget-title">
                            <h3>Popular Tags</h3>
                            <div class="widget-content">
                                <ul class="clearfix">
                                    <li><a href="blog-grid.html">Software</a></li>
                                    <li><a href="blog-grid.html">Design</a></li>
                                    <li><a href="blog-grid.html">Saas</a></li>
                                    <li><a href="blog-grid.html">Code</a></li>
                                    <li><a href="blog-grid.html">Landing Page</a></li>
                                    <li><a href="blog-grid.html">Web</a></li>
                                    <li><a href="blog-grid.html">Detox</a></li>
                                    <li><a href="blog-grid.html">Corporate</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- blog-details end -->
@endsection