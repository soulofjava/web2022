<header class="stick style1 w-100">
    <div class="topbar bg-color1 w-100">
        <div class="container">
            <div class="topbar-inner d-flex flex-wrap justify-content-between align-items-center w-100">
                <ul class="topbar-info-list mb-0 list-unstyled d-inline-flex">
                    <li><i class="thm-clr fas fa-map-marker-alt"></i>{{ $data_website->address }}</li>
                    <li><i class="thm-clr far fa-envelope-open"></i>Email: <a
                            href="mailto:{{ $data_website->email }}">{{
                            $data_website->email }}</a></li>
                </ul>
                <ul class="topbar-links mb-0 list-unstyled d-inline-flex">
                    <!-- <li><a href="javascript:void(0);" title="">Careers</a></li>
                    <li><a href="javascript:void(0);" title="">Help Desk</a></li>
                    <li><a href="javascript:void(0);" title="">Login</a></li> -->
                </ul>
            </div>
        </div>
    </div>
    <!-- Topbar -->
    <div class="logo-info-bar-wrap w-100">
        <div class="container">
            <div class="logo-info-bar-inner w-100 d-flex flex-wrap justify-content-between align-items-center">
                <div class="logo-social d-inline-flex flex-wrap justify-content-between align-items-center">
                    <div class="logo">
                        <!-- <h1 class="mb-0"><a href="index.html" title="Home"><img class="img-fluid"
                                    src="{{ asset('assets/front/blubuild/images/logo.png') }}" alt="Logo"
                                    srcset="{{ asset('assets/front/blubuild/images/retina-logo.png') }}"></a>
                        </h1> -->
                    </div>
                    <!-- Logo -->
                    <div class="social-links">
                        <x-social-media-link fb='fab fa-facebook-f' twitter='fab fa-twitter' insta='fab fa-instagram'
                            youtube='fab fa-youtube' />
                    </div>
                </div>
                <div class="top-info-wrap d-inline-flex flex-wrap justify-content-between align-items-center">
                    <div class="call-us">
                        <i class="thm-clr flaticon-phone-call"></i>
                        <!-- <span>24/7 Phone Services</span> -->
                        <strong>{{
                            $data_website->phone }}</strong>
                    </div>
                    <!-- <div class="add-cart">
                        <a href="cart.html" title="">
                            <i class="thm-bg fas fa-shopping-basket"></i>
                            Add to Cart
                            <span class="d-block">(Item: 02)</span>
                        </a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <!-- Logo Info Bar Wrap -->
    <div class="menu-wrap">
        <div class="container">
            <nav class="d-inline-flex justify-content-between align-items-center w-100 bg-color1">
                <div class="header-left">
                    <ul class="mb-0 list-unstyled d-inline-flex">
                        <x-navbar-menu li="menu-item-has-children" ul="mb-0 list-unstyled" />
                    </ul>
                </div>
                <!-- <div class="header-right-btns">
                    <a class="get-quote" href="javascript:void(0);" title=""><i class="far fa-comments"></i>Get
                        A Quote<i class="flaticon-arrow-pointing-to-right"></i></a>
                </div> -->
            </nav>
        </div>
    </div>
    <!-- Menu Wrap -->
</header>
<!-- Header -->
<div class="sticky-menu">
    <div class="container">
        <div class="sticky-menu-inner d-flex flex-wrap align-items-center justify-content-between w-100">
            <div class="logo">
                <!-- <h1 class="mb-0"><a href="index.html" title="Home"><img class="img-fluid"
                            src="{{ asset('assets/front/blubuild/images/logo.png') }}" alt="Logo"
                            srcset="{{ asset('assets/front/blubuild/images/retina-logo.png') }}"></a>
                </h1> -->
            </div>
            <!-- Logo -->
            <nav class="d-inline-flex justify-content-between align-items-center">
                <div class="header-left">
                    <ul class="mb-0 list-unstyled d-inline-flex">
                        <x-navbar-menu li="menu-item-has-children" ul="mb-0 list-unstyled" />
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- Sticky Menu -->
<div class="rspn-hdr">
    <div class="rspn-mdbr">
        <div class="rspn-scil">
            <x-social-media-link fb='fab fa-facebook-f' twitter='fab fa-twitter' insta='fab fa-instagram'
                youtube='fab fa-youtube' />
        </div>
        <!-- <form class="rspn-srch">
            <input type="text" placeholder="Enter Your Keyword">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form> -->
    </div>
    <div class="lg-mn">
        <!-- <div class="logo"><a href="index.html" title="Home"><img
                    src="{{ asset('assets/front/blubuild/images/logo.png') }}" alt="Logo"></a>
        </div> -->
        <div class="rspn-cnt">
            <span><i class="thm-clr far fa-envelope-open"></i><a href="mailto:{{ $data_website->email }}">{{
                    $data_website->email }}</a></span>
            <span><i class="thm-clr fas fa-map-marker-alt"></i>{{ $data_website->address }}</span>
        </div>
        <span class="rspn-mnu-btn"><i class="fa fa-list-ul"></i></span>
    </div>
    <div class="rsnp-mnu">
        <span class="rspn-mnu-cls"><i class="fa fa-times"></i></span>
        <ul class="mb-0 list-unstyled w-100">
            <x-navbar-menu li="menu-item-has-children" ul="mb-0 list-unstyled" />
        </ul>
    </div>
    <!-- Responsive Menu -->
</div>
<!-- Responsive Header -->