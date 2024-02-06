<!-- SEARCH POPUP -->
<div class="search-popup">
    <!-- CROSS ICON -->
    <svg class="cross-icon big close-button search-popup-close">
        <use xlink:href="#svg-cross-big"></use>
    </svg>
    <!-- /CROSS ICON -->

    <form method="GET" class="search-popup-form">
        <input type="text" id="search" class="input-line" name="search" placeholder="What are you looking for...?">
    </form>
    <p class="search-popup-text">Write what you are looking for and press enter to begin your search!</p>
</div>
<!-- /SEARCH POPUP -->

<!-- MOBILE MENU WRAP -->
<div class="mobile-menu-wrap">
    <!-- CROSS ICON -->
    <svg class="cross-icon big mobile-menu-close">
        <use xlink:href="#svg-cross-big"></use>
    </svg>
    <!-- /CROSS ICON -->

    <!-- SEARCH POPUP OPEN -->
    <svg class="search-popup-open search-icon">
        <use xlink:href="#svg-search"></use>
    </svg>
    <!-- /SEARCH POPUP OPEN -->

    <!-- LOGO IMG -->
    <img src="{{ asset('img/CPNS.png') }}" alt="Logo" width="250px" height="50px" >
    <!-- /LOGO IMG -->

    <!-- MOBILE MENU -->
    <ul class="mobile-menu">
        <!-- MOBILE MENU ITEM -->
        <li class="mobile-menu-item">
            <a href="index.html" class="mobile-menu-item-link">Home</a>
        </li>
        <!-- /MOBILE MENU ITEM -->
    </ul>
    <!-- /MOBILE MENU -->
</div>
<!-- /MOBILE MENU WRAP -->

<!-- NAVIGATION WRAP -->
<nav class="navigation-wrap void stick-on-top">
    <!-- NAVIGATION -->
    <div class="navigation grid-limit">
        <!-- LOGO -->
        <div class="logo">
            <!-- LOGO IMG -->
            <!-- <figure class="logo-img">
                <img src="{{ asset('img/CPNS.png') }}" alt="Logo" width="500px" height="100px">
            </figure> -->
            <img src="{{ asset('img/CPNS.png') }}" alt="Logo" width="250px" height="50px">
            <!-- /LOGO IMG -->

            <!-- LOGO TEXT -->
            <!-- <div class="logo-text">
                <h2 class="logo-title">Pixel<span class="highlight">Diamond</span></h2>
                <p class="logo-info">The Latest Gaming News</p>
            </div> -->
            <!-- /LOGO TEXT -->
        </div>
        <!-- /LOGO -->

        <!-- SEARCH BUTTON -->
        <div class="search-button search-popup-open">
            <!-- SEARCH ICON -->
            <svg class="search-icon">
                <use xlink:href="#svg-search"></use>
            </svg>
            <!-- /SEARCH ICON -->
        </div>
        <!-- /SEARCH BUTTON -->

        <!-- MAIN MENU -->
        <ul class="main-menu">
            <!-- MAIN MENU ITEM -->
            <li class="main-menu-item">
                <a href="{{ url('/') }}" class="main-menu-item-link">Home</a>
            </li>
            <!-- /MAIN MENU ITEM -->

        </ul>
        <!-- /MAIN MENU -->
    </div>
    <!-- NAVIGATION -->
</nav>
<!-- /NAVIGATION WRAP -->

<!-- MOBILE MENU PULL -->
<div class="mobile-menu-pull mobile-menu-open">
    <!-- MENU PULL ICON -->
    <svg class="menu-pull-icon">
        <use xlink:href="#svg-menu-pull"></use>
    </svg>
    <!-- /MENU PULL ICON -->
</div>
<!-- /MOBILE MENU PULL -->

@if(Route::current()->getName() == 'root')
<!-- BANNER SLIDER -->
<div id="banner-slider-1" class="banner-slider">
    <!-- SLIDER ITEMS -->
    <div class="slider-items">
        @foreach($news as $n)
        <!-- SLIDER ITEM -->
        <div class="slider-item slider-item-{{ $loop->iteration }}">
            <div class="slider-item-wrap">
                <!-- POST PREVIEW -->
                <div class="post-preview huge gaming-news">
                    <!-- TAG ORNAMENT -->
                    <!-- <a href="news-v1.html" class="tag-ornament">Gaming news</a> -->
                    <!-- /TAG ORNAMENT -->

                    <!-- POST PREVIEW TITLE -->
                    <a href="{{ url('/news-detail', $n->slug) }}" class="post-preview-title">{{
                        \Illuminate\Support\Str::limit($n->title, 50, $end='...') }}</a>
                    <!-- POST PREVIEW TEXT -->
                    <p class="post-preview-text">{!! strip_tags(\Illuminate\Support\Str::limit($n->description, 250,
                        $end = '...')) !!}</p>
                    <!-- BUTTON -->
                    <a href="{{ url('/news-detail', $n->slug) }}" class="button big blue">
                        Go to the article
                        <!-- BUTTON ORNAMENT -->
                        <div class="button-ornament">
                            <!-- ARROW ICON -->
                            <svg class="arrow-icon big">
                                <use xlink:href="#svg-arrow-big"></use>
                            </svg>
                            <!-- /ARROW ICON -->

                            <!-- CROSS ICON -->
                            <svg class="cross-icon big">
                                <use xlink:href="#svg-cross-big"></use>
                            </svg>
                            <!-- /CROSS ICON -->
                        </div>
                        <!-- /BUTTON ORNAMENT -->
                    </a>
                    <!-- /BUTTON -->
                </div>
                <!-- /POST PREVIEW -->
            </div>
        </div>
        <!-- /SLIDER ITEM -->
        @if($loop->iteration == 4)
        @break
        @endif
        @endforeach
    </div>
    <!-- /SLIDER ITEMS -->

    <!-- BANNER SLIDER ROSTER -->
    <div class="banner-slider-roster">
        <div class="banner-slider-roster-item"></div>
        <div class="banner-slider-roster-item"></div>
        <div class="banner-slider-roster-item"></div>
        <div class="banner-slider-roster-item"></div>
    </div>
    <!-- /BANNER SLIDER ROSTER -->
</div>
<!-- /BANNER SLIDER -->
@endif

