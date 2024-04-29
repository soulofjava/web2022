@extends('front.Castro.layouts.app')

@section('content')
<!-- Mobile Menu  -->
    <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <div class="close-btn"><i class="fas fa-times"></i></div>
        <nav class="menu-box">
            <div class="nav-logo"><a href="index.html"><img src="{{ asset('master/Castro/assets/images/logo-2.png') }}" alt="" title=""></a></div>
            <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
            <div class="contact-info">
                <h4>Contact Info</h4>
                <ul>
                    <li>Chicago 12, Melborne City, USA</li>
                    <li><a href="tel:+8801682648101">+88 01682648101</a></li>
                    <li><a href="mailto:info@example.com">info@example.com</a></li>
                </ul>
            </div>
            <div class="social-links">
                <ul class="clearfix">
                    <li><a href="index.html"><span class="fab fa-twitter"></span></a></li>
                    <li><a href="index.html"><span class="fab fa-facebook-square"></span></a></li>
                    <li><a href="index.html"><span class="fab fa-pinterest-p"></span></a></li>
                    <li><a href="index.html"><span class="fab fa-instagram"></span></a></li>
                    <li><a href="index.html"><span class="fab fa-youtube"></span></a></li>
                </ul>
            </div>
        </nav>
    </div><!-- End Mobile Menu -->


    <!-- banner-section -->
    <section class="banner-style-one">
        <div class="pattern-layer" style="background-image: url('{{ asset('master/Castro/assets/images/shape/shape-1.png') }}');"></div>
        <div class="banner-carousel owl-theme owl-carousel">
            <div class="slide-item">
                <div class="auto-container">
                    <div class="content-inner">
                        <div class="content-box">
                            <h1>Up To <br /><span>50%</span> Discount</h1>
                            <h3>Summer Lookbook - 2020</h3>
                            <p>New Modern Stylist Fashionable Men's Wear Jeans Shirt.</p>
                            <div class="btn-box">
                                <a href="index.html" class="theme-btn-one">Explore Now<i class="flaticon-right-1"></i></a>
                            </div>
                        </div>
                        <figure class="image-box image-1"><img src="{{ asset('master/Castro/assets/images/banner/banner-image-1.png') }}" alt=""></figure>
                    </div> 
                </div>
            </div>
            <div class="slide-item">
                <div class="auto-container">
                    <div class="content-inner">
                        <div class="content-box">
                            <h1>Up To <br /><span>50%</span> Discount</h1>
                            <h3>Summer Lookbook - 2020</h3>
                            <p>New Modern Stylist Fashionable Men's Wear Jeans Shirt.</p>
                            <div class="btn-box">
                                <a href="index.html" class="theme-btn-one">Explore Now<i class="flaticon-right-1"></i></a>
                            </div>
                        </div>
                        <figure class="image-box image-2"><img src="{{ asset('master/Castro/assets/images/banner/banner-image-2.png') }}" alt=""></figure>
                    </div> 
                </div>
            </div>
            <div class="slide-item">
                <div class="auto-container">
                    <div class="content-inner">
                        <div class="content-box">
                            <h1>Up To <br /><span>50%</span> Discount</h1>
                            <h3>Summer Lookbook - 2020</h3>
                            <p>New Modern Stylist Fashionable Men's Wear Jeans Shirt.</p>
                            <div class="btn-box">
                                <a href="index.html" class="theme-btn-one">Explore Now<i class="flaticon-right-1"></i></a>
                            </div>
                        </div>
                        <figure class="image-box imgae-3"><img src="{{ asset('master/Castro/assets/images/banner/banner-image-3.png') }}" alt=""></figure>
                    </div> 
                </div>
            </div>
        </div>
    </section>
    <!-- banner-section end -->
@endsection