{{-- page wrapper --}}

<body class="boxed_wrapper ltr">

    <!-- preloader -->
    <div class="preloader"></div>
    <!-- preloader -->

    <!-- page-direction -->
    <div class="page_direction">
        <div class="demo-rtl direction_switch"><button class="rtl">RTL</button></div>
        <div class="demo-ltr direction_switch"><button class="ltr">LTR</button></div>
    </div>
    <!-- page-direction end -->


    <!-- switcher menu -->
    <div class="switcher">
        <div class="switch_btn">
            <button><i class="fas fa-palette"></i></button>
        </div>
        <div class="switch_menu">
            <!-- color changer -->
            <div class="switcher_container">
                <ul id="styleOptions" title="switch styling">
                    <li>
                        <a href="javascript: void(0)" data-theme="blue" class="blue-color"></a>
                    </li>
                    <li>
                        <a href="javascript: void(0)" data-theme="pink" class="pink-color"></a>
                    </li>
                    <li>
                        <a href="javascript: void(0)" data-theme="violet" class="violet-color"></a>
                    </li>
                    <li>
                        <a href="javascript: void(0)" data-theme="crimson" class="crimson-color"></a>
                    </li>
                    <li>
                        <a href="javascript: void(0)" data-theme="orange" class="orange-color"></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- end switcher menu -->

    <!-- main header -->
    <header class="main-header">
        <div class="outer-container">
            <div class="header-upper clearfix">
                <div class="outer-box pull-left">
                    <div class="logo-box pull-left">
                        <figure class="logo"><a href="index.html"><img src="{{ asset('assets/pemda.ico') }}"
                                    alt="" title="" style="width: 60px; height: 60px;"></a>
                        </figure>
                    </div>
                    <div class="menu-area pull-left">
                        <!--Mobile Navigation Toggler-->
                        <div class="mobile-nav-toggler">
                            <i class="icon-bar"></i>
                            <i class="icon-bar"></i>
                            <i class="icon-bar"></i>
                        </div>
                        <nav class="main-menu navbar-expand-md navbar-light">
                            <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                <ul class="navigation clearfix">
                                    <li class="current dropdown"><a href="index.html">Home</a>
                                        <ul>
                                            <li><a href="index.html">Home Page One</a></li>
                                            <li><a href="index-2.html">Home Page Two</a></li>
                                            <li><a href="index-3.html">Home Page Three</a></li>
                                            <li><a href="index-boxed.html">Home Boxed</a></li>
                                            <li><a href="index-onepage.html">Home OnePage</a></li>
                                            <li class="dropdown"><a href="index.html">Home Page</a>
                                                <ul>
                                                    <li><a href="index.html">Home Page One</a></li>
                                                    <li><a href="index-2.html">Home Page Two</a></li>
                                                    <li><a href="index-3.html">Home Page Three</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="index.html">Services</a>
                                        <ul>
                                            <li><a href="service.html">Services One</a></li>
                                            <li><a href="service-2.html">Services Two</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="index.html">Pages</a>
                                        <ul class="megamenu">
                                            <li><a href="about.html">About Us</a></li>
                                            <li><a href="service.html">Services One</a></li>
                                            <li><a href="team-element-2.html">Team Elements 02</a></li>
                                            <li><a href="feature-element-1.html">Feature Elements 01</a></li>
                                            <li><a href="portfolio.html">Portfolio Grid</a></li>
                                            <li><a href="service-2.html">Services Two</a></li>
                                            <li><a href="counter-element-1.html">Counter Elements 01</a></li>
                                            <li><a href="feature-element-2.html">Feature Elements 02</a></li>
                                            <li><a href="portfolio-2.html">Portfolio Masonry</a></li>
                                            <li><a href="error.html">Error Page</a></li>
                                            <li><a href="counter-element-2.html">Counter Elements 02</a></li>
                                            <li><a href="about-element-1.html">About Elements 01</a></li>
                                            <li><a href="portfolio-details.html">Portfolio Details</a></li>
                                            <li><a href="blog-grid.html">Blog Grid</a></li>
                                            <li><a href="contact.html">Contact</a></li>
                                            <li><a href="about-element-2.html">About Elements 02</a></li>
                                            <li><a href="team.html">Our Team</a></li>
                                            <li><a href="blog-masonry.html">Blog Masonry</a></li>
                                            <li><a href="service-element.html">Service Elements</a></li>
                                            <li><a href="process-element-1.html">Process Elements 01</a></li>
                                            <li><a href="faq.html">Faq's</a></li>
                                            <li><a href="blog-standard.html">Blog Standard</a></li>
                                            <li><a href="faq-element.html">Faq's Elements</a></li>
                                            <li><a href="process-element-2.html">Process Elements 02</a></li>
                                            <li><a href="pricing.html">Pricing Plan</a></li>
                                            <li><a href="blog-details.html">Blog Details</a></li>
                                            <li><a href="choose-element.html">Choose Elements</a></li>
                                            <li><a href="team-element-1.html">Team Elements 01</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="index.html">Elements</a>
                                        <ul>
                                            <li class="dropdown"><a href="index.html">Feature Elements</a>
                                                <ul>
                                                    <li><a href="feature-element-1.html">Feature Elements 01</a></li>
                                                    <li><a href="feature-element-2.html">Feature Elements 02</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown"><a href="index.html">About Elements</a>
                                                <ul>
                                                    <li><a href="about-element-1.html">About Elements 01</a></li>
                                                    <li><a href="about-element-2.html">About Elements 02</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown"><a href="index.html">Blog Elements</a>
                                                <ul>
                                                    <li><a href="blog-element-1.html">Blog Elements 01</a></li>
                                                    <li><a href="blog-element-2.html">Blog Elements 02</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown"><a href="index.html">Process Elements</a>
                                                <ul>
                                                    <li><a href="process-element-1.html">Process Elements 01</a></li>
                                                    <li><a href="process-element-2.html">Process Elements 02</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown"><a href="index.html">Counter Elements</a>
                                                <ul>
                                                    <li><a href="counter-element-1.html">Counter Elements 01</a></li>
                                                    <li><a href="counter-element-2.html">Counter Elements 02</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown"><a href="index.html">Team Elements</a>
                                                <ul>
                                                    <li><a href="team-element-1.html">Team Elements 01</a></li>
                                                    <li><a href="team-element-2.html">Team Elements 02</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="service-element.html">Service Elements</a></li>
                                            <li><a href="faq-element.html">Faq's Elements</a></li>
                                            <li><a href="choose-element.html">Choose Elements</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="index.html">Blog</a>
                                        <ul>
                                            <li><a href="blog-grid.html">Blog Grid</a></li>
                                            <li><a href="blog-masonry.html">Blog Masonry</a></li>
                                            <li><a href="blog-standard.html">Blog Standard</a></li>
                                            <li><a href="blog-details.html">Blog Details</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="contact.html">Contact</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="menu-right-content pull-right">
                    {{-- <div class="phone">Call Us <a href="tel:880762009">+880.762.009</a></div> --}}
                    <div class="btn-box"><a href="index.html">Login</a></div>
                </div>
            </div>
        </div>

        <!--sticky Header-->
        <div class="sticky-header">
            <div class="container clearfix">
                <figure class="logo-box"><a href="index.html"><img src="{{ asset('assets/pemda.ico') }}"
                            alt="" title="" style="width: 50px; height: 50px;"></a>
                </figure>
                <div class="menu-area">
                    <nav class="main-menu clearfix">
                        <!--Keep This Empty / Menu will come through Javascript-->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- main-header end -->

    <!-- Mobile Menu  -->
    <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <div class="close-btn"><i class="fas fa-times"></i></div>

        <nav class="menu-box">
            <div class="nav-logo" style="text-align: center;"><a href="index.html"><img
                        src="{{ asset('assets/pemda.ico') }}" alt="" title=""
                        style="width: 80px; height: 80px;"></a>
            </div>
            <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
            </div>
            <div class="contact-info">
                <h4>Kontak Kami</h4>
                <ul>
                    <li> {{ $data_website->address }}</li>
                    <li><a href="tel:{{ $data_website->phone }}">{{ $data_website->phone }}</a></li>
                    <li><a href="mailto:{{ $data_website->email }}">{{ $data_website->email }}</a></li>
                </ul>
            </div>
            <div class="social-links">
                <ul class="clearfix">
                    <li>
                        <a aria-label="Facebook" target="_blank" href="{{ $data_website->facebook }}"><i
                                class="fab fa-facebook-f"></i></a>
                    </li>
                    <li>
                        <a aria-label="Twitter" target="_blank" href="{{ $data_website->twitter }}"><i
                                class="fab fa-twitter"></i></a>
                    </li>
                    <li>
                        <a aria-label="Youtube" target="_blank" href="{{ $data_website->youtube }}"><i
                                class="fab fa-youtube"></i></a>
                    </li>
                    <li>
                        <a aria-label="Instagram" target="_blank" href="{{ $data_website->instagram }}"><i
                                class="fab fa-instagram"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div><!-- End Mobile Menu -->
