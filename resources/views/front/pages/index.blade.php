@extends('front.layouts.app')
@section('content')
<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach (App\Models\GambarSlide::all() as $item)
        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
            @mobile
            <img src="{{ route('helper.show-picture', ['path' => $item->path]) }}" class="d-block w-100"
                alt="Hero Image 1" style="background-repeat: no-repeat;
                        background-position: center;
                        background-size: cover;
                        height: 300px;
                        ">
            @elsemobile
            <img src="{{ route('helper.show-picture', ['path' => $item->path]) }}" class="d-block w-100"
                alt="Hero Image 1" style="background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            height: 100vh;
            ">
            @endmobile
        </div>
        @endforeach
    </div>
</div>


<!-- Features Section Start -->
<section class="features-section rel z-1 pt-80 pb-120 bg-blue text-white">
    <div class="container">
        <div class="row justify-content-center">
            @foreach($related as $rr)
            <div class="col-lg-2 col-md-4 col-6 mt-3 d-flex justify-content-center align-items-center">
                <div class="feature-item wow fadeInUp delay-0-2s">
                    <div class="image">
                        <a href="{{ $rr->url }}" target="_blank">
                            @if(Storage::exists($rr->path_logo))
                            <img src="{{ route('helper.show-picture', ['path' => $rr->path_logo]) }}" alt="Icon"
                                style="max-width: 100px; max-height: 100px; object-fit: cover;">
                            @else
                            <img src="{{ asset('assets/front/images/features/icon2.png') }}" alt="Icon">
                            @endif
                        </a>
                        <div class="mt-3">
                            <a href="{{ $rr->url }}" target="_blank">
                                <h6>{{ $rr->name }}</h6>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <img class="rectangle-dots" src="{{ asset('assets/front/images/shapes/rectangle-dots.png') }}" alt="Shape">
    <img class="circle-dots" src="{{ asset('assets/front/images/shapes/circle-dots.png') }}" alt="Shape">
</section>
<!-- Features Section End -->

<!-- About Section Start -->
<!-- <section class="about-section pt-130 rpt-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 align-self-end">
                <div class="about-man rmb-75 wow fadeInLeft delay-0-2s">
                    <img src="{{ asset('assets/front/images/about/man.png') }}" alt="Man">
                </div>
            </div>
            <div class="col-lg-7">
                <div class="about-content rel z-2 pb-115 rpb-85 wow fadeInRight delay-0-2s">
                    <div class="section-title mb-40">
                        <span class="sub-title mb-25">about us</span>
                        <h2>We Provide Life Coach From Expert Advisors</h2>
                    </div>
                    <div class="about-features">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="feature-item">
                                    <div class="icon">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <div class="content">
                                        <h5>Exclusive Coach</h5>
                                        <p>Sit consectetur adipiscing eiuse tempor incides</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="feature-item">
                                    <div class="icon">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <div class="content">
                                        <h5>Creative Minds</h5>
                                        <p>Sit consectetur adipiscing eiuse tempor incides</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="feature-item">
                                    <div class="icon">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <div class="content">
                                        <h5>Master Certified</h5>
                                        <p>Sit consectetur adipiscing eiuse tempor incides</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="feature-item">
                                    <div class="icon">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <div class="content">
                                        <h5>Video Tutorials</h5>
                                        <p>Sit consectetur adipiscing eiuse tempor incides</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="about-btns">
                        <a href="about.html" class="theme-btn style-two my-15">Learn more us <i
                                class="fas fa-arrow-right"></i></a>
                        <a href="faqs.html" class="read-more">How it works <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- About Section End -->

<!-- Coach Section Start -->
<section class="coach-section rel z-1 pt-120 rpt-90 rpb-70 bg-lighter">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-7 col-md-8">
                <div class="section-title text-center mb-40">
                    <h2>Berita</h2>
                </div>
            </div>
        </div>
        <!-- <ul class="coach-filter mb-35">
            <li data-filter="*" class="current">Show All</li>
            <li data-filter=".design">Web Design</li>
            <li data-filter=".marketing">Marketing</li>
            <li data-filter=".development">Development</li>
            <li data-filter=".technology">IT & Technology</li>
            <li data-filter=".photography">Photography</li>
        </ul> -->
        <div class="row coach-active justify-content-center">
            @foreach($news as $n)
            <div class="col-lg-3 col-md-6 item marketing technology">
                <div class="coach-item wow fadeInUp delay-0-2s">
                    <div class="coach-image">
                        <a href="{{ url('/news-detail', $n->slug) }}">
                            @if($n->gambarmuka)
                            <img src="{{ route('helper.show-picture', ['path' => $n->gambarmuka->path]) }}"
                                class="img-thumbnail" alt="{{ $n->gambarmuka->file_name }}"
                                style="object-fit: cover; width: 270px; height: 148px">
                            @else
                            <img src="{{ asset('assets/bkdwonosobo.png') }}" alt="Course">
                            @endif
                        </a>
                        <!-- <img src="{{ asset('assets/front/images/coachs/coach1.jpg') }}" alt="Coach"> -->
                    </div>
                    <div class="coach-content" style="height: 175px;">
                        <!-- <span class="label">Basic Coach</span> -->
                        <h4><a href="{{ url('/news-detail', $n->slug) }}">{{ Str::limit($n->title, 40, '...') }}</a>
                        </h4>
                        <!-- <div class="ratting-price">
                            <div class="ratting">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span>(3k)</span>
                            </div>
                            <span class="price">256.95</span>
                        </div> -->
                        <!-- <ul class="coach-footer">
                            <li><i class="far fa-file-alt"></i><span>12 Lessions</span></li>
                            <li><i class="far fa-user"></i><span>seats</span></li>
                        </ul> -->
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Coach Section End -->

<!-- Coach Section Start -->
<section class="coach-section rel z-1 pt-60 rpt-90 pb-100 rpb-70">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-7 col-md-8">
                <div class="section-title text-center mb-40">
                    <h2>Informasi Umum</h2>
                </div>
            </div>
        </div>
        <!-- <ul class="coach-filter mb-35">
            <li data-filter="*" class="current">Show All</li>
            <li data-filter=".design">Web Design</li>
            <li data-filter=".marketing">Marketing</li>
            <li data-filter=".development">Development</li>
            <li data-filter=".technology">IT & Technology</li>
            <li data-filter=".photography">Photography</li>
        </ul> -->
        <div class="row coach-active justify-content-center">
            @foreach(App\Models\News::where('terbit', 1)->where('tag',
            'informasi umum')->latest('date')->get() as $iu)
            <div class="col-lg-3 col-md-6 item marketing technology">
                <div class="coach-item wow fadeInUp delay-0-2s">
                    <div class="coach-image">
                        <a href="{{ url('/news-detail', $iu->slug) }}">
                            @if($iu->gambarmuka)
                            <img src="{{ route('helper.show-picture', ['path' => $iu->gambarmuka->path]) }}"
                                class="img-thumbnail" alt="{{ $iu->gambarmuka->file_name }}"
                                style="object-fit: cover; width: 270px; height: 148px">
                            @else
                            <img src="{{ asset('assets/bkdwonosobo.png') }}" alt="Course">
                            @endif
                        </a>
                        <!-- <img src="{{ asset('assets/front/images/coachs/coach1.jpg') }}" alt="Coach"> -->
                    </div>
                    <div class="coach-content" style="height: 175px;">
                        <!-- <span class="label">Basic Coach</span> -->
                        <h4><a href="{{ url('/news-detail', $iu->slug) }}">{{ Str::limit($iu->title, 40, '...') }}</a>
                        </h4>
                        <!-- <div class="ratting-price">
                            <div class="ratting">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span>(3k)</span>
                            </div>
                            <span class="price">256.95</span>
                        </div> -->
                        <!-- <ul class="coach-footer">
                            <li><i class="far fa-file-alt"></i><span>12 Lessions</span></li>
                            <li><i class="far fa-user"></i><span>seats</span></li>
                        </ul> -->
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Coach Section End -->

<!-- Work Process Section Start -->
<!-- <section class="work-process-section bg-white rel z-1 pt-130 rpt-100 pb-100 rpb-70">
    <div class="container">
        <div class="row justify-content-between align-items-center pb-30 wow fadeInUp delay-0-2s">
            <div class="col-xl-7 col-lg-8">
                <div class="section-title">
                    <span class="sub-title mb-15">How It Works</span>
                    <h2>Very Simple Steps to Success Golas</h2>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="slider-arrow-btns text-lg-right mt-10">
                    <button class="work-prev"><i class="fas fa-angle-left"></i></button>
                    <button class="work-next"><i class="fas fa-angle-right"></i></button>
                </div>
            </div>
        </div>
        <div class="work-step-wrap wow fadeInUp delay-0-4s">
            <div class="work-step-item">
                <span class="number">01</span>
                <div class="content">
                    <h4>Transformation Completed</h4>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
                </div>
            </div>
            <div class="work-step-item">
                <span class="number">02</span>
                <div class="content">
                    <h4>Schedule a Meeting</h4>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
                </div>
            </div>
            <div class="work-step-item">
                <span class="number">03</span>
                <div class="content">
                    <h4>Make a Decision</h4>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- Work Process Section End -->

<!-- Newsletter Section Start -->
<!-- <section class="newsletter-section pb-130 rpb-100 wow fadeInUp delay-0-2s">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="newsletter-video overlay">
                    <img src="{{ asset('assets/front/images/video/video-bg.jpg') }}" alt="Video">
                    <a href="https://www.youtube.com/watch?v=9Y7ma241N8k" class="mfp-iframe video-play"><i
                            class="fas fa-play"></i></a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="newsletter-content bg-lighter">
                    <div class="section-title mb-20">
                        <span class="sub-title mb-25">Newsletters</span>
                        <h2>Get Our Every Single Notifications</h2>
                    </div>
                    <p>Sit amet consectetur adipiscinelit eiusmod tempor incididunt ut labore et dolore magna
                        aliqua suspendisse ultrices gravida. commodo viverra maecenas accumsan facilisis.</p>
                    <form class="newsletter-form mt-25" action="#">
                        <div class="newsletter-radios mb-25">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="hero-wekly" name="example1"
                                    checked>
                                <label class="custom-control-label" for="hero-wekly">Regular Updates</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="hero-monthly" name="example1">
                                <label class="custom-control-label" for="hero-monthly">Weekly Updates</label>
                            </div>
                        </div>
                        <div class="newsletter-email">
                            <label for="email"><i class="far fa-envelope"></i></label>
                            <input id="email" type="email" placeholder="Enter Email Address" required>
                            <button type="submit" class="theme-btn">Subscribe <i
                                    class="fas fa-arrow-right"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- Newsletter Section End -->

<!-- Events Section Start -->
<!-- <section class="events-section rel z-1 py-130 rpy-100 bg-blue text-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-9">
                <div class="section-title text-center mb-55">
                    <span class="sub-title mb-25">Events & Program</span>
                    <h2>We’reArranged Yearly Cultural Events & Program</h2>
                </div>
            </div>
        </div>
        <div class="event-wrap">
            <div class="event-item wow fadeInUp delay-0-2s">
                <div class="image">
                    <img src="{{ asset('assets/front/images/events/event1.jpg') }}" alt="Event">
                    <span class="date">25 march 2022</span>
                </div>
                <div class="content">
                    <h4>How Much Needs Life Coach For Human Beings</h4>
                    <span class="location"><i class="fas fa-map-marker-alt"></i> 55 Main Street, New York</span>
                </div>
            </div>
            <div class="event-item wow fadeInUp delay-0-4s">
                <div class="image">
                    <img src="{{ asset('assets/front/images/events/event2.jpg') }}" alt="Event">
                    <span class="date">25 march 2022</span>
                </div>
                <div class="content">
                    <h4>How Much Needs Life Coach For Human Beings</h4>
                    <span class="location"><i class="fas fa-map-marker-alt"></i> 55 Main Street, New York</span>
                </div>
            </div>
            <div class="event-item wow fadeInUp delay-0-6s">
                <div class="image">
                    <img src="{{ asset('assets/front/images/events/event3.jpg') }}" alt="Event">
                    <span class="date">25 march 2022</span>
                </div>
                <div class="content">
                    <h4>How Much Needs Life Coach For Human Beings</h4>
                    <span class="location"><i class="fas fa-map-marker-alt"></i> 55 Main Street, New York</span>
                </div>
            </div>
            <div class="event-item wow fadeInUp delay-0-2s">
                <div class="image">
                    <img src="{{ asset('assets/front/images/events/event1.jpg') }}" alt="Event">
                    <span class="date">25 march 2022</span>
                </div>
                <div class="content">
                    <h4>How Much Needs Life Coach For Human Beings</h4>
                    <span class="location"><i class="fas fa-map-marker-alt"></i> 55 Main Street, New York</span>
                </div>
            </div>
            <div class="event-item wow fadeInUp delay-0-4s">
                <div class="image">
                    <img src="{{ asset('assets/front/images/events/event2.jpg') }}" alt="Event">
                    <span class="date">25 march 2022</span>
                </div>
                <div class="content">
                    <h4>How Much Needs Life Coach For Human Beings</h4>
                    <span class="location"><i class="fas fa-map-marker-alt"></i> 55 Main Street, New York</span>
                </div>
            </div>
            <div class="event-item wow fadeInUp delay-0-6s">
                <div class="image">
                    <img src="{{ asset('assets/front/images/events/event3.jpg') }}" alt="Event">
                    <span class="date">25 march 2022</span>
                </div>
                <div class="content">
                    <h4>How Much Needs Life Coach For Human Beings</h4>
                    <span class="location"><i class="fas fa-map-marker-alt"></i> 55 Main Street, New York</span>
                </div>
            </div>
        </div>
    </div>
    <span class="bg-text">coach</span>
    <img class="rectangle-dots" src="{{ asset('assets/front/images/shapes/rectangle-dots.png') }}" alt="Shape">
    <img class="circle-dots" src="{{ asset('assets/front/images/shapes/circle-dots.png') }}" alt="Shape">
</section> -->
<!-- Events Section End -->

<!-- Testimonials Section Start -->
<!-- <section class="testimonials-section bg-white rel z-1 py-130 rpy-100">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-5">
                <div class="testimonial-left-content rmb-65 wow fadeInLeft delay-0-2s">
                    <div class="section-title">
                        <span class="sub-title mb-15">Testimonials</span>
                        <h2>Happy Clients Say About Coach</h2>
                    </div>
                    <p>Quis autem veleum iure reprehenderit voluptate velit esse quam nihil molestiae
                        consequatur vel illum dolore eum fugiat quo voluptas nulla pariatur</p>
                    <h4 class="partner-title mt-25 mb-15">We Have <span>1356+</span> Global Partners</h4>
                    <div class="partner-iamges-wrap">
                        <img src="{{ asset('assets/front/images/testimonials/partner1.jpg') }}" alt="Partner">
                        <img src="{{ asset('assets/front/images/testimonials/partner2.jpg') }}" alt="Partner">
                        <img src="{{ asset('assets/front/images/testimonials/partner3.jpg') }}" alt="Partner">
                        <img src="{{ asset('assets/front/images/testimonials/partner4.jpg') }}" alt="Partner">
                        <img src="{{ asset('assets/front/images/testimonials/partner5.jpg') }}" alt="Partner">
                        <img src="{{ asset('assets/front/images/testimonials/partner6.jpg') }}" alt="Partner">
                        <span class="plus">+</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="testimonial-wrap wow fadeInRight delay-0-2s">
                    <div class="testimonial-item">
                        <div class="testimonial-author">
                            <img src="{{ asset('assets/front/images/testimonials/author.jpg') }}" alt="Author">
                        </div>
                        <div class="testimonial-content">
                            <div class="designation">
                                <h4>Justin C. Swanson</h4>
                                <span>Business Manager</span>
                            </div>
                            <p>Voluptatem accusantium doloremq udantium totam rem aperiam eaque quae abillo
                                inventore veritatis et quasi architecto beatae Sed ut perspiciatis unde omnis
                                iste natus error sit</p>
                            <div class="ratting">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item">
                        <div class="testimonial-author">
                            <img src="{{ asset('assets/front/images/testimonials/author.jpg') }}" alt="Author">
                        </div>
                        <div class="testimonial-content">
                            <div class="designation">
                                <h4>Gerardo M. Jordan</h4>
                                <span>Business Manager</span>
                            </div>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                doloremq udantium totam rem aperiam eaque quae abillo inventore veritatis et
                                quasi architecto beatae</p>
                            <div class="ratting">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item">
                        <div class="testimonial-author">
                            <img src="{{ asset('assets/front/images/testimonials/author.jpg') }}" alt="Author">
                        </div>
                        <div class="testimonial-content">
                            <div class="designation">
                                <h4>Justin C. Swanson</h4>
                                <span>Business Manager</span>
                            </div>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                doloremq udantium totam rem aperiam eaque quae abillo inventore veritatis et
                                quasi architecto beatae</p>
                            <div class="ratting">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item">
                        <div class="testimonial-author">
                            <img src="{{ asset('assets/front/images/testimonials/author.jpg') }}" alt="Author">
                        </div>
                        <div class="testimonial-content">
                            <div class="designation">
                                <h4>Gerardo M. Jordan</h4>
                                <span>Business Manager</span>
                            </div>
                            <p>Voluptatem accusantium doloremq udantium totam rem aperiam eaque quae abillo
                                inventore veritatis et quasi architecto beatae Sed ut perspiciatis unde omnis
                                iste natus error sit</p>
                            <div class="ratting">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- Testimonials Section End -->

<!-- Blog Section Start -->
<!-- <section class="blog-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-7 col-md-8">
                <div class="section-title text-center mb-55">
                    <span class="sub-title mb-20">News & Blog</span>
                    <h2>Read Some Store About News & Blog</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="blog-item big-item wow fadeInUp delay-0-2s">
                    <div class="blog-image">
                        <img src="{{ asset('assets/front/images/blog/blog1.jpg') }}" alt="Blog">
                    </div>
                    <div class="blog-content">
                        <span class="date"><span>25</span> March</span>
                        <div class="content">
                            <h4><a href="blog-details.html">Building Web Layouts For Dual-Screen And Foldable
                                    Devices Designing</a></h4>
                            <ul class="blog-meta">
                                <li><i class="far fa-user"></i> <a href="blog.html">By Somalia</a></li>
                                <li><i class="far fa-comments"></i> <a href="blog.html">Comments (5)</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-sm-6">
                <div class="blog-item wow fadeInUp delay-0-4s">
                    <div class="blog-image">
                        <img src="{{ asset('assets/front/images/blog/blog2.jpg') }}" alt="Blog">
                    </div>
                    <div class="blog-content">
                        <span class="date"><span>25</span> March</span>
                        <div class="content">
                            <ul class="blog-meta">
                                <li><i class="far fa-user"></i> <a href="blog.html">By Somalia</a></li>
                                <li><i class="far fa-comments"></i> <a href="blog.html">Com (5)</a></li>
                            </ul>
                            <h5><a href="blog-details.html">Designing Better Linke Website And Email</a></h5>
                            <p>Sit amet consectetur adiscins eiusmod tempor incididunt</p>
                            <a href="blog-details.html" class="read-more">Read more <i
                                    class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-sm-6">
                <div class="blog-item wow fadeInUp delay-0-6s">
                    <div class="blog-image">
                        <img src="{{ asset('assets/front/images/blog/blog3.jpg') }}" alt="Blog">
                    </div>
                    <div class="blog-content">
                        <span class="date"><span>03</span> April</span>
                        <div class="content">
                            <ul class="blog-meta">
                                <li><i class="far fa-user"></i> <a href="blog.html">By Somalia</a></li>
                                <li><i class="far fa-comments"></i> <a href="blog.html">Com (5)</a></li>
                            </ul>
                            <h5><a href="blog-details.html">Useful VS Code Esions Front-End Develop</a></h5>
                            <p>Sit amet consectetur adiscins eiusmod tempor incididunt</p>
                            <a href="blog-details.html" class="read-more">Read more <i
                                    class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="blog-more-btn pt-30 text-center">
            <a href="blog.html" class="theme-btn style-three">view more news <i class="fas fa-arrow-right"></i></a>
        </div>
    </div>
</section> -->
<!-- Blog Section End -->

<!-- Logo Section Start -->
<!-- <div class="logo-section pt-130 rpt-100 pb-80 rpb-50">
    <div class="container">
        <div class="logo-inner">
            <div class="logo-item wow fadeInUp delay-0-1s">
                <a href="contact.html"><img src="{{ asset('assets/front/images/client-logos/client-logo1.png') }}"
                        alt="Client Logo"></a>
            </div>
            <div class="logo-item wow fadeInUp delay-0-2s">
                <a href="contact.html"><img src="{{ asset('assets/front/images/client-logos/client-logo2.png') }}"
                        alt="Client Logo"></a>
            </div>
            <div class="logo-item wow fadeInUp delay-0-3s">
                <a href="contact.html"><img src="{{ asset('assets/front/images/client-logos/client-logo3.png') }}"
                        alt="Client Logo"></a>
            </div>
            <div class="logo-item wow fadeInUp delay-0-4s">
                <a href="contact.html"><img src="{{ asset('assets/front/images/client-logos/client-logo4.png') }}"
                        alt="Client Logo"></a>
            </div>
            <div class="logo-item wow fadeInUp delay-0-5s">
                <a href="contact.html"><img src="{{ asset('assets/front/images/client-logos/client-logo5.png') }}"
                        alt="Client Logo"></a>
            </div>
            <div class="logo-item wow fadeInUp delay-0-6s">
                <a href="contact.html"><img src="{{ asset('assets/front/images/client-logos/client-logo6.png') }}"
                        alt="Client Logo"></a>
            </div>
        </div>
    </div>
</div  -->
<!-- Logo Section End -->

<!-- Instagram Section Start -->
<!-- <div class="instagram-section pb-120 rpb-90">
    <div class="container-fluid">
        <div class="row small-gap justify-content-center">
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                <div class="instagram-item wow fadeInUp delay-0-1s">
                    <img src="{{ asset('assets/front/images/instagram/instagram1.jpg') }}" alt="Instagram">
                    <div class="instagram-hover">
                        <a href="{{ asset('assets/front/images/instagram/instagram1.jpg') }}">
                            <i class="fab fa-instagram"></i>
                            <span>Instagram</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                <div class="instagram-item wow fadeInUp delay-0-2s">
                    <img src="{{ asset('assets/front/images/instagram/instagram2.jpg') }}" alt="Instagram">
                    <div class="instagram-hover">
                        <a href="{{ asset('assets/front/images/instagram/instagram2.jpg') }}">
                            <i class="fab fa-instagram"></i>
                            <span>Instagram</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                <div class="instagram-item wow fadeInUp delay-0-3s">
                    <img src="{{ asset('assets/front/images/instagram/instagram3.jpg') }}" alt="Instagram">
                    <div class="instagram-hover">
                        <a href="{{ asset('assets/front/images/instagram/instagram3.jpg') }}">
                            <i class="fab fa-instagram"></i>
                            <span>Instagram</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                <div class="instagram-item wow fadeInUp delay-0-4s">
                    <img src="{{ asset('assets/front/images/instagram/instagram4.jpg') }}" alt="Instagram">
                    <div class="instagram-hover">
                        <a href="{{ asset('assets/front/images/instagram/instagram4.jpg') }}">
                            <i class="fab fa-instagram"></i>
                            <span>Instagram</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                <div class="instagram-item wow fadeInUp delay-0-5s">
                    <img src="{{ asset('assets/front/images/instagram/instagram5.jpg') }}" alt="Instagram">
                    <div class="instagram-hover">
                        <a href="{{ asset('assets/front/images/instagram/instagram5.jpg') }}">
                            <i class="fab fa-instagram"></i>
                            <span>Instagram</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                <div class="instagram-item wow fadeInUp delay-0-6s">
                    <img src="{{ asset('assets/front/images/instagram/instagram6.jpg') }}" alt="Instagram">
                    <div class="instagram-hover">
                        <a href="{{ asset('assets/front/images/instagram/instagram6.jpg') }}">
                            <i class="fab fa-instagram"></i>
                            <span>Instagram</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- Instagram Section End -->
@endsection