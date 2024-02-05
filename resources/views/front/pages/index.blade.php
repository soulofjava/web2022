@extends('front.layouts.app')
@section('content')
<!-- LAYOUT CONTENT 1 -->
<div class="layout-content-1 layout-item-3-1 search-pad grid-limit">
    <!-- LAYOUT BODY -->
    <div class="layout-body layout-item centered">
        <!-- LAYOUT ITEM -->
        <div class="layout-item">
            <!-- POST PREVIEW SET -->
            <div class="post-preview-set">
                <!-- POST PREVIEW SET LEFT -->
                <div class="post-preview-set-left">
                    <!-- POST PREVIEW -->
                    <div class="post-preview picture big game-review">
                        <!-- POST PREVIEW IMG WRAP -->
                        <a href="post-v2.html">
                            <div class="post-preview-img-wrap">
                                <!-- POST PREVIEW IMG -->
                                <figure class="post-preview-img liquid">
                                    <img src="{{ asset('assets/front/img/posts/16.jpg') }}" alt="post-16">
                                </figure>
                                <!-- /POST PREVIEW IMG -->

                                <!-- POST PREVIEW OVERLAY -->
                                <div class="post-preview-overlay">
                                    <!-- TAG ORNAMENT -->
                                    <span class="tag-ornament">Game Reviews</span>
                                    <!-- /TAG ORNAMENT -->

                                    <!-- POST PREVIEW TITLE -->
                                    <p class="post-preview-title">We reviewed the new Magimons game</p>
                                    <!-- POST PREVIEW TEXT -->
                                    <p class="post-preview-text">Lorem ipsum dolor sit amet, consectetur adipisicing
                                        elit, sed do eiusmod tempor incididunt.</p>
                                </div>
                                <!-- /POST PREVIEW OVERLAY -->

                                <!-- REVIEW RATING -->
                                <div class="review-rating">
                                    <div id="content-news-rate-1" class="arc medium"></div>
                                </div>
                                <!-- /REVIEW RATING -->
                            </div>
                        </a>
                        <!-- /POST PREVIEW IMG WRAP -->
                    </div>
                    <!-- /POST PREVIEW -->
                </div>
                <!-- /POST PREVIEW SET LEFT -->

                <!-- POST PREVIEW SET RIGHT -->
                <div class="post-preview-set-right">
                    <!-- POST PREVIEW -->
                    <div class="post-preview picture gaming-news">
                        <!-- POST PREVIEW IMG WRAP -->
                        <a href="post-v1.html">
                            <div class="post-preview-img-wrap">
                                <!-- POST PREVIEW IMG -->
                                <figure class="post-preview-img liquid">
                                    <img src="{{ asset('assets/front/img/posts/07.jpg') }}" alt="post-07">
                                </figure>
                                <!-- /POST PREVIEW IMG -->

                                <!-- POST PREVIEW OVERLAY -->
                                <div class="post-preview-overlay">
                                    <!-- POST PREVIEW TITLE -->
                                    <p class="post-preview-title">New expansion pack coming to "Rise of Depredators"
                                    </p>
                                </div>
                                <!-- /POST PREVIEW OVERLAY -->

                                <!-- TAG ORNAMENT -->
                                <span class="tag-ornament">Gaming news</span>
                                <!-- /TAG ORNAMENT -->
                            </div>
                        </a>
                        <!-- /POST PREVIEW IMG WRAP -->
                    </div>
                    <!-- /POST PREVIEW -->

                    <!-- POST PREVIEW -->
                    <div class="post-preview picture game-review">
                        <!-- POST PREVIEW IMG WRAP -->
                        <a href="post-v2.html">
                            <div class="post-preview-img-wrap">
                                <!-- POST PREVIEW IMG -->
                                <figure class="post-preview-img liquid">
                                    <img src="{{ asset('assets/front/img/posts/25.jpg') }}" alt="post-25">
                                </figure>
                                <!-- /POST PREVIEW IMG -->

                                <!-- POST PREVIEW OVERLAY -->
                                <div class="post-preview-overlay">
                                    <!-- POST PREVIEW TITLE -->
                                    <p class="post-preview-title">"Legend of Kenshi II" is a bit green for now</p>
                                </div>
                                <!-- /POST PREVIEW OVERLAY -->

                                <!-- TAG ORNAMENT -->
                                <span class="tag-ornament">Game reviews</span>
                                <!-- /TAG ORNAMENT -->

                                <!-- REVIEW RATING -->
                                <div class="review-rating">
                                    <div id="content-news-rate-2" class="arc small"></div>
                                </div>
                                <!-- /REVIEW RATING -->
                            </div>
                        </a>
                        <!-- /POST PREVIEW IMG WRAP -->
                    </div>
                    <!-- /POST PREVIEW -->

                    <!-- POST PREVIEW -->
                    <div class="post-preview picture geeky-news">
                        <!-- POST PREVIEW IMG WRAP -->
                        <a href="post-v4.html">
                            <div class="post-preview-img-wrap">
                                <!-- POST PREVIEW IMG -->
                                <figure class="post-preview-img liquid">
                                    <img src="{{ asset('assets/front/img/posts/18.jpg') }}" alt="post-18">
                                </figure>
                                <!-- /POST PREVIEW IMG -->

                                <!-- POST PREVIEW OVERLAY -->
                                <div class="post-preview-overlay">
                                    <!-- POST PREVIEW TITLE -->
                                    <p class="post-preview-title">"Ichigo Idol" anime will have a new season in
                                        April</p>
                                </div>
                                <!-- /POST PREVIEW OVERLAY -->

                                <!-- TAG ORNAMENT -->
                                <span class="tag-ornament">Geeky news</span>
                                <!-- /TAG ORNAMENT -->
                            </div>
                        </a>
                        <!-- /POST PREVIEW IMG WRAP -->
                    </div>
                    <!-- /POST PREVIEW -->
                </div>
                <!-- /POST PREVIEW SET RIGHT -->
            </div>
            <!-- /POST PREVIEW SET -->
        </div>
        <!-- /LAYOUT ITEM -->

        <!-- LAYOUT ITEM 2-1 -->
        <div class="layout-item-2-1">
            <!-- LAYOUT ITEM -->
            <div class="layout-item">
                <!-- POST PREVIEW -->
                <div class="post-preview big gaming-news">
                    <!-- POST PREVIEW IMG WRAP -->
                    <a href="post-v1.html">
                        <div class="post-preview-img-wrap">
                            <!-- POST PREVIEW IMG -->
                            <figure class="post-preview-img liquid">
                                <img src="{{ asset('assets/front/img/posts/01.jpg') }}" alt="post-01">
                            </figure>
                            <!-- POST PREVIEW IMG -->
                        </div>
                    </a>
                    <!-- /POST PREVIEW IMG WRAP -->

                    <!-- TAG ORNAMENT -->
                    <a href="news-v1.html" class="tag-ornament">Gaming news</a>
                    <!-- /TAG ORNAMENT -->

                    <!-- POST PREVIEW TITLE -->
                    <a href="post-v1.html" class="post-preview-title">The Clash of Dragons is breaking record sales
                        in USA and Japan</a>
                    <!-- POST AUTHOR INFO -->
                    <div class="post-author-info-wrap">
                        <!-- USER AVATAR -->
                        <a href="search-results.html">
                            <figure class="user-avatar tiny liquid">
                                <img src="{{ asset('assets/front/img/users/01.jpg') }}" alt="user-01">
                            </figure>
                        </a>
                        <!-- /USER AVATAR -->
                        <p class="post-author-info small light">By <a href="search-results.html"
                                class="post-author">Dexter</a><span class="separator">|</span>December 15th,
                            2018<span class="separator">|</span><a href="post-v1.html#op-comments"
                                class="post-comment-count">174 Comments</a></p>
                    </div>
                    <!-- /POST AUTHOR INFO -->
                    <!-- POST PREVIEW TEXT -->
                    <p class="post-preview-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                        eiusmod tempor incididunt dutor et dolore magna aliqua. Ut enim ad minim veniam, quis
                        nostrud exercitation loso laboris tempora aliquip ex ea commodo consequat. Duis aute irure
                        dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur
                        excepteur sint occaecat pidatat.</p>
                </div>
                <!-- /POST PREVIEW -->

                <!-- POST PREVIEW -->
                <div class="post-preview big game-review">
                    <!-- POST PREVIEW IMG WRAP -->
                    <a href="post-v2.html">
                        <div class="post-preview-img-wrap">
                            <!-- POST PREVIEW IMG -->
                            <figure class="post-preview-img liquid">
                                <img src="{{ asset('assets/front/img/posts/05.jpg') }}" alt="post-05">
                            </figure>
                            <!-- POST PREVIEW IMG -->

                            <!-- REVIEW RATING -->
                            <div class="review-rating">
                                <div id="content-news-rate-3" class="arc"></div>
                            </div>
                            <!-- /REVIEW RATING -->
                        </div>
                    </a>
                    <!-- /POST PREVIEW IMG WRAP -->

                    <!-- TAG ORNAMENT -->
                    <a href="news-v2.html" class="tag-ornament">Game Reviews</a>
                    <!-- /TAG ORNAMENT -->

                    <!-- POST PREVIEW TITLE -->
                    <a href="post-v2.html" class="post-preview-title">We reviewed the new and exciting Fantasy game
                        "Olympus"</a>
                    <!-- POST AUTHOR INFO -->
                    <div class="post-author-info-wrap">
                        <!-- USER AVATAR -->
                        <a href="search-results.html">
                            <figure class="user-avatar tiny liquid">
                                <img src="{{ asset('assets/front/img/users/04.jpg') }}" alt="user-04">
                            </figure>
                        </a>
                        <!-- /USER AVATAR -->
                        <p class="post-author-info small light">By <a href="search-results.html"
                                class="post-author">Vellatrix</a><span class="separator">|</span>December 15th,
                            2018<span class="separator">|</span><a href="post-v2.html#op-comments"
                                class="post-comment-count">258 Comments</a></p>
                    </div>
                    <!-- /POST AUTHOR INFO -->
                    <!-- POST PREVIEW TEXT -->
                    <p class="post-preview-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                        eiusmod tempor incididunt dutor et dolore magna aliqua. Ut enim ad minim veniam, quis
                        nostrud exercitation loso laboris tempora aliquip ex ea commodo consequat. Duis aute irure
                        dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur
                        excepteur sint occaecat pidatat.</p>
                </div>
                <!-- /POST PREVIEW -->

                <!-- POST PREVIEW -->
                <div class="post-preview big gaming-news">
                    <!-- POST PREVIEW IMG WRAP -->
                    <a href="post-v1.html">
                        <div class="post-preview-img-wrap">
                            <!-- POST PREVIEW IMG -->
                            <figure class="post-preview-img liquid">
                                <img src="{{ asset('assets/front/img/posts/27.jpg') }}" alt="post-27">
                            </figure>
                            <!-- POST PREVIEW IMG -->
                        </div>
                    </a>
                    <!-- /POST PREVIEW IMG WRAP -->

                    <!-- TAG ORNAMENT -->
                    <a href="news-v1.html" class="tag-ornament">Gaming news</a>
                    <!-- /TAG ORNAMENT -->

                    <!-- POST PREVIEW TITLE -->
                    <a href="post-v1.html" class="post-preview-title">Everything about Kawai Party 8!</a>
                    <!-- POST AUTHOR INFO -->
                    <div class="post-author-info-wrap">
                        <!-- USER AVATAR -->
                        <a href="search-results.html">
                            <figure class="user-avatar tiny liquid">
                                <img src="{{ asset('assets/front/img/users/01.jpg') }}" alt="user-01">
                            </figure>
                        </a>
                        <!-- /USER AVATAR -->
                        <p class="post-author-info small light">By <a href="search-results.html"
                                class="post-author">Dexter</a><span class="separator">|</span>December 15th,
                            2018<span class="separator">|</span><a href="post-v1.html#op-comments"
                                class="post-comment-count">174 Comments</a></p>
                    </div>
                    <!-- /POST AUTHOR INFO -->
                    <!-- POST PREVIEW TEXT -->
                    <p class="post-preview-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                        eiusmod tempor incididunt dutor et dolore magna aliqua. Ut enim ad minim veniam, quis
                        nostrud exercitation loso laboris tempora aliquip ex ea commodo consequat. Duis aute irure
                        dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur
                        excepteur sint occaecat pidatat.</p>
                </div>
                <!-- /POST PREVIEW -->
            </div>
            <!-- /LAYOUT ITEM -->

            <!-- LAYOUT ITEM -->
            <div class="layout-item">
                <!-- POST PREVIEW -->
                <div class="post-preview gaming-news img-toggle">
                    <!-- POST PREVIEW IMG WRAP -->
                    <a href="post-v1.html">
                        <div class="post-preview-img-wrap">
                            <!-- POST PREVIEW IMG -->
                            <figure class="post-preview-img liquid">
                                <img src="{{ asset('assets/front/img/posts/17.jpg') }}" alt="post-17">
                            </figure>
                            <!-- /POST PREVIEW IMG -->
                        </div>
                    </a>
                    <!-- /POST PREVIEW IMG WRAP -->

                    <!-- TAG ORNAMENT -->
                    <a href="news-v1.html" class="tag-ornament">Gaming news</a>
                    <!-- /TAG ORNAMENT -->

                    <!-- POST PREVIEW TITLE -->
                    <a href="post-v1.html" class="post-preview-title">Jazzstar announced that the GTE5 for PC is
                        delayed</a>
                    <!-- POST AUTHOR INFO -->
                    <div class="post-author-info-wrap">
                        <p class="post-author-info small light">By <a href="search-results.html"
                                class="post-author">Vellatrix</a><span class="separator">|</span>December 15th, 2018
                        </p>
                    </div>
                    <!-- /POST AUTHOR INFO -->
                    <!-- POST PREVIEW TEXT -->
                    <p class="post-preview-text">Lorem ipsum dolor sit amet, consectetur bere adipisicing elit, sed
                        do eiusmod tempor lorem incididunt ut labore et dolore magna.</p>
                </div>
                <!-- /POST PREVIEW -->

                <!-- POST PREVIEW -->
                <div class="post-preview geeky-news img-toggle">
                    <!-- POST PREVIEW IMG WRAP -->
                    <a href="post-v4.html">
                        <div class="post-preview-img-wrap">
                            <!-- POST PREVIEW IMG -->
                            <figure class="post-preview-img liquid">
                                <img src="{{ asset('assets/front/img/posts/02.jpg') }}" alt="post-02">
                            </figure>
                            <!-- /POST PREVIEW IMG -->
                        </div>
                    </a>
                    <!-- /POST PREVIEW IMG WRAP -->

                    <!-- TAG ORNAMENT -->
                    <a href="news-v4.html" class="tag-ornament">Geeky news</a>
                    <!-- /TAG ORNAMENT -->

                    <!-- POST PREVIEW TITLE -->
                    <a href="post-v4.html" class="post-preview-title">Jessica Tam to star in the new "Charlotte"
                        series</a>
                    <!-- POST AUTHOR INFO -->
                    <div class="post-author-info-wrap">
                        <p class="post-author-info small light">By <a href="search-results.html"
                                class="post-author">Vellatrix</a><span class="separator">|</span>December 15th, 2018
                        </p>
                    </div>
                    <!-- /POST AUTHOR INFO -->
                    <!-- POST PREVIEW TEXT -->
                    <p class="post-preview-text">Lorem ipsum dolor sit amet, consectetur bere adipisicing elit, sed
                        do eiusmod tempor lorem incididunt ut labore et dolore magna.</p>
                </div>
                <!-- /POST PREVIEW -->

                <!-- POST PREVIEW -->
                <div class="post-preview gaming-news img-toggle">
                    <!-- POST PREVIEW IMG WRAP -->
                    <a href="post-v1.html">
                        <div class="post-preview-img-wrap">
                            <!-- POST PREVIEW IMG -->
                            <figure class="post-preview-img liquid">
                                <img src="{{ asset('assets/front/img/posts/09.jpg') }}" alt="post-09">
                            </figure>
                            <!-- /POST PREVIEW IMG -->
                        </div>
                    </a>
                    <!-- /POST PREVIEW IMG WRAP -->

                    <!-- TAG ORNAMENT -->
                    <a href="news-v1.html" class="tag-ornament">Gaming news</a>
                    <!-- /TAG ORNAMENT -->

                    <!-- POST PREVIEW TITLE -->
                    <a href="post-v1.html" class="post-preview-title">New "Rizen" game is gonna be released in
                        summer 2019</a>
                    <!-- POST AUTHOR INFO -->
                    <div class="post-author-info-wrap">
                        <p class="post-author-info small light">By <a href="search-results.html"
                                class="post-author">Vellatrix</a><span class="separator">|</span>December 15th, 2018
                        </p>
                    </div>
                    <!-- /POST AUTHOR INFO -->
                    <!-- POST PREVIEW TEXT -->
                    <p class="post-preview-text">Lorem ipsum dolor sit amet, consectetur bere adipisicing elit, sed
                        do eiusmod tempor lorem incididunt ut labore et dolore magna.</p>
                </div>
                <!-- /POST PREVIEW -->

                <!-- POST PREVIEW -->
                <div class="post-preview game-review img-toggle">
                    <!-- POST PREVIEW IMG WRAP -->
                    <a href="post-v2.html">
                        <div class="post-preview-img-wrap">
                            <!-- POST PREVIEW IMG -->
                            <figure class="post-preview-img liquid">
                                <img src="{{ asset('assets/front/img/posts/08.jpg') }}" alt="post-08">
                            </figure>
                            <!-- /POST PREVIEW IMG -->

                            <!-- REVIEW RATING -->
                            <div class="review-rating">
                                <div id="content-news-rate-4" class="arc small"></div>
                            </div>
                            <!-- /REVIEW RATING -->
                        </div>
                    </a>
                    <!-- /POST PREVIEW IMG WRAP -->

                    <!-- TAG ORNAMENT -->
                    <a href="news-v2.html" class="tag-ornament">Game reviews</a>
                    <!-- /TAG ORNAMENT -->

                    <!-- POST PREVIEW TITLE -->
                    <a href="post-v2.html" class="post-preview-title">The new mecha cyborg game is breaking
                        barriers</a>
                    <!-- POST AUTHOR INFO -->
                    <div class="post-author-info-wrap">
                        <p class="post-author-info small light">By <a href="search-results.html"
                                class="post-author">Vellatrix</a><span class="separator">|</span>December 15th, 2018
                        </p>
                    </div>
                    <!-- /POST AUTHOR INFO -->
                    <!-- POST PREVIEW TEXT -->
                    <p class="post-preview-text">Lorem ipsum dolor sit amet, consectetur bere adipisicing elit, sed
                        do eiusmod tempor lorem incididunt ut labore et dolore magna.</p>
                </div>
                <!-- /POST PREVIEW -->

                <!-- POST PREVIEW -->
                <div class="post-preview movie-news img-toggle">
                    <!-- POST PREVIEW IMG WRAP -->
                    <a href="post-v3.html">
                        <div class="post-preview-img-wrap">
                            <!-- POST PREVIEW IMG -->
                            <figure class="post-preview-img liquid">
                                <img src="{{ asset('assets/front/img/posts/12.jpg') }}" alt="post-12">
                            </figure>
                            <!-- /POST PREVIEW IMG -->

                            <!-- RATING ORNAMENT -->
                            <div class="rating-ornament">
                                <!-- RATING ORNAMENT ITEM -->
                                <div class="rating-ornament-item">
                                    <!-- RATING ORNAMENT ICON -->
                                    <svg class="rating-ornament-icon">
                                        <use xlink:href="#svg-star"></use>
                                    </svg>
                                </div>
                                <!-- /RATING ORNAMENT ITEM -->

                                <!-- RATING ORNAMENT ITEM -->
                                <div class="rating-ornament-item">
                                    <!-- RATING ORNAMENT ICON -->
                                    <svg class="rating-ornament-icon">
                                        <use xlink:href="#svg-star"></use>
                                    </svg>
                                </div>
                                <!-- /RATING ORNAMENT ITEM -->

                                <!-- RATING ORNAMENT ITEM -->
                                <div class="rating-ornament-item">
                                    <!-- RATING ORNAMENT ICON -->
                                    <svg class="rating-ornament-icon">
                                        <use xlink:href="#svg-star"></use>
                                    </svg>
                                </div>
                                <!-- /RATING ORNAMENT ITEM -->

                                <!-- RATING ORNAMENT ITEM -->
                                <div class="rating-ornament-item">
                                    <!-- RATING ORNAMENT ICON -->
                                    <svg class="rating-ornament-icon empty">
                                        <use xlink:href="#svg-star"></use>
                                    </svg>
                                </div>
                                <!-- /RATING ORNAMENT ITEM -->

                                <!-- RATING ORNAMENT ITEM -->
                                <div class="rating-ornament-item">
                                    <!-- RATING ORNAMENT ICON -->
                                    <svg class="rating-ornament-icon empty">
                                        <use xlink:href="#svg-star"></use>
                                    </svg>
                                </div>
                                <!-- /RATING ORNAMENT ITEM -->
                            </div>
                            <!-- /RATING ORNAMENT -->
                        </div>
                    </a>
                    <!-- /POST PREVIEW IMG WRAP -->

                    <!-- TAG ORNAMENT -->
                    <a href="news-v3.html" class="tag-ornament">Movie news</a>
                    <!-- /TAG ORNAMENT -->

                    <!-- POST PREVIEW TITLE -->
                    <a href="post-v3.html" class="post-preview-title">We reviewed the "Guardians of the Universe"
                        movie</a>
                    <!-- POST AUTHOR INFO -->
                    <div class="post-author-info-wrap">
                        <p class="post-author-info small light">By <a href="search-results.html"
                                class="post-author">Faye V.</a><span class="separator">|</span>December 15th, 2018
                        </p>
                    </div>
                    <!-- /POST AUTHOR INFO -->
                    <!-- POST PREVIEW TEXT -->
                    <p class="post-preview-text">Lorem ipsum dolor sit amet, consectetur bere adipisicing elit, sed
                        do eiusmod tempor lorem incididunt ut labore et dolore magna.</p>
                </div>
                <!-- /POST PREVIEW -->
            </div>
            <!-- /LAYOUT ITEM -->
        </div>
        <!-- /LAYOUT ITEM 2-1 -->

        <!-- LAYOUT ITEM 1-1-1 -->
        <div class="layout-item layout-item-1-1-1 padded">
            <!-- POST PREVIEW SHOWCASE -->
            <div class="post-preview-showcase">
                <!-- SECTION TITLE WRAP -->
                <div class="section-title-wrap blue">
                    <h2 class="section-title medium">Gaming News</h2>
                    <div class="section-title-separator"></div>
                </div>
                <!-- /SECTION TITLE WRAP -->

                <!-- POST PREVIEW SHOWCASE -->
                <div class="post-preview-showcase">
                    <!-- POST PREVIEW -->
                    <div class="post-preview gaming-news">
                        <!-- POST PREVIEW IMG WRAP -->
                        <a href="post-v1.html">
                            <div class="post-preview-img-wrap">
                                <!-- POST PREVIEW IMG -->
                                <figure class="post-preview-img liquid">
                                    <img src="{{ asset('assets/front/img/posts/20.jpg') }}" alt="post-20">
                                </figure>
                                <!-- /POST PREVIEW IMG -->
                            </div>
                        </a>
                        <!-- /POST PREVIEW IMG WRAP -->

                        <!-- TAG ORNAMENT -->
                        <a href="news-v1.html" class="tag-ornament">Gaming news</a>
                        <!-- /TAG ORNAMENT -->

                        <!-- POST PREVIEW TITLE -->
                        <a href="post-v1.html" class="post-preview-title">Legend of the Temple is coming to all
                            consoles</a>
                        <!-- POST AUTHOR INFO -->
                        <div class="post-author-info-wrap">
                            <p class="post-author-info small light">By <a href="search-results.html"
                                    class="post-author">Vellatrix</a><span class="separator">|</span>December 15th,
                                2018</p>
                        </div>
                        <!-- /POST AUTHOR INFO -->
                    </div>
                    <!-- /POST PREVIEW -->

                    <!-- LINE SEPARATOR -->
                    <div class="line-separator"></div>
                    <!-- /LINE SEPARATOR -->

                    <!-- POST PREVIEW -->
                    <div class="post-preview small gaming-news">
                        <!-- POST PREVIEW TITLE -->
                        <a href="post-v1.html" class="post-preview-title">Pro Soccer 2017 is gonna run with a new
                            graphics engine</a>
                        <!-- POST AUTHOR INFO -->
                        <div class="post-author-info-wrap">
                            <p class="post-author-info small light">By <a href="search-results.html"
                                    class="post-author">Dexter</a><span class="separator">|</span>December 15th,
                                2018</p>
                        </div>
                        <!-- /POST AUTHOR INFO -->
                    </div>
                    <!-- /POST PREVIEW -->

                    <!-- LINE SEPARATOR -->
                    <div class="line-separator"></div>
                    <!-- /LINE SEPARATOR -->

                    <!-- POST PREVIEW -->
                    <div class="post-preview small gaming-news">
                        <!-- POST PREVIEW TITLE -->
                        <a href="post-v1.html" class="post-preview-title">Thomas Barker joins the team of "The
                            Amazing Knight"</a>
                        <!-- POST AUTHOR INFO -->
                        <div class="post-author-info-wrap">
                            <p class="post-author-info small light">By <a href="search-results.html"
                                    class="post-author">Dexter</a><span class="separator">|</span>December 15th,
                                2018</p>
                        </div>
                        <!-- /POST AUTHOR INFO -->
                    </div>
                    <!-- /POST PREVIEW -->
                </div>
                <!-- /POST PREVIEW SHOWCASE -->
            </div>
            <!-- /POST PREVIEW SHOWCASE -->

            <!-- POST PREVIEW SHOWCASE -->
            <div class="post-preview-showcase">
                <!-- SECTION TITLE WRAP -->
                <div class="section-title-wrap red">
                    <h2 class="section-title medium">Game Reviews</h2>
                    <div class="section-title-separator"></div>
                </div>
                <!-- /SECTION TITLE WRAP -->

                <!-- POST PREVIEW SHOWCASE -->
                <div class="post-preview-showcase">
                    <!-- POST PREVIEW -->
                    <div class="post-preview game-review">
                        <!-- POST PREVIEW IMG WRAP -->
                        <a href="post-v2.html">
                            <div class="post-preview-img-wrap">
                                <!-- POST PREVIEW IMG -->
                                <figure class="post-preview-img liquid">
                                    <img src="{{ asset('assets/front/img/posts/10.jpg') }}" alt="post-10">
                                </figure>
                                <!-- /POST PREVIEW IMG -->

                                <!-- REVIEW RATING -->
                                <div class="review-rating">
                                    <div id="content-news-rate-5" class="arc small"></div>
                                </div>
                                <!-- /REVIEW RATING -->
                            </div>
                        </a>
                        <!-- /POST PREVIEW IMG WRAP -->

                        <!-- TAG ORNAMENT -->
                        <a hreF="news-v2.html" class="tag-ornament">Game Reviews</a>
                        <!-- /TAG ORNAMENT -->

                        <!-- POST PREVIEW TITLE -->
                        <a href="post-v2.html" class="post-preview-title">Dragons and Knights arrived with a big
                            impression</a>
                        <!-- POST AUTHOR INFO -->
                        <div class="post-author-info-wrap">
                            <p class="post-author-info small light">By <a href="search-results.html"
                                    class="post-author">Vellatrix</a><span class="separator">|</span>December 15th,
                                2018</p>
                        </div>
                        <!-- /POST AUTHOR INFO -->
                    </div>
                    <!-- /POST PREVIEW -->

                    <!-- LINE SEPARATOR -->
                    <div class="line-separator"></div>
                    <!-- /LINE SEPARATOR -->

                    <!-- POST PREVIEW -->
                    <div class="post-preview small game-review">
                        <!-- POST PREVIEW TITLE -->
                        <a href="post-v2.html" class="post-preview-title">The new Mary World lacks the fun and charm
                            of older versions</a>
                        <!-- POST AUTHOR INFO -->
                        <div class="post-author-info-wrap">
                            <p class="post-author-info small light">By <a href="search-results.html"
                                    class="post-author">Morgana</a><span class="separator">|</span>December 15th,
                                2018</p>
                        </div>
                        <!-- /POST AUTHOR INFO -->
                    </div>
                    <!-- /POST PREVIEW -->

                    <!-- LINE SEPARATOR -->
                    <div class="line-separator"></div>
                    <!-- /LINE SEPARATOR -->

                    <!-- POST PREVIEW -->
                    <div class="post-preview small game-review">
                        <!-- POST PREVIEW TITLE -->
                        <a href="post-v2.html" class="post-preview-title">We played Pirates Greed Japan and has the
                            potential to be GOTY</a>
                        <!-- POST AUTHOR INFO -->
                        <div class="post-author-info-wrap">
                            <p class="post-author-info small light">By <a href="search-results.html"
                                    class="post-author">Vellatrix</a><span class="separator">|</span>December 15th,
                                2018</p>
                        </div>
                        <!-- /POST AUTHOR INFO -->
                    </div>
                    <!-- /POST PREVIEW -->
                </div>
                <!-- /POST PREVIEW SHOWCASE -->
            </div>
            <!-- /POST PREVIEW SHOWCASE -->

            <!-- POST PREVIEW SHOWCASE -->
            <div class="post-preview-showcase">
                <!-- SECTION TITLE WRAP -->
                <div class="section-title-wrap yellow">
                    <h2 class="section-title medium">Geeky News</h2>
                    <div class="section-title-separator"></div>
                </div>
                <!-- /SECTION TITLE WRAP -->

                <!-- POST PREVIEW SHOWCASE -->
                <div class="post-preview-showcase">
                    <!-- POST PREVIEW -->
                    <div class="post-preview geeky-news">
                        <!-- POST PREVIEW IMG WRAP -->
                        <a href="post-v4.html">
                            <div class="post-preview-img-wrap">
                                <!-- POST PREVIEW IMG -->
                                <figure class="post-preview-img liquid">
                                    <img src="{{ asset('assets/front/img/posts/21.jpg') }}" alt="post-21">
                                </figure>
                                <!-- /POST PREVIEW IMG -->
                            </div>
                        </a>
                        <!-- /POST PREVIEW IMG WRAP -->

                        <!-- TAG ORNAMENT -->
                        <a href="news-v4.html" class="tag-ornament">Geeky News</a>
                        <!-- /TAG ORNAMENT -->

                        <!-- POST PREVIEW TITLE -->
                        <a href="post-v4.html" class="post-preview-title">"Steamboat" anime will have a preview
                            event on May</a>
                        <!-- POST AUTHOR INFO -->
                        <div class="post-author-info-wrap">
                            <p class="post-author-info small light">By <a href="search-results.html"
                                    class="post-author">Morgana</a><span class="separator">|</span>December 15th,
                                2018</p>
                        </div>
                        <!-- /POST AUTHOR INFO -->
                    </div>
                    <!-- /POST PREVIEW -->

                    <!-- LINE SEPARATOR -->
                    <div class="line-separator"></div>
                    <!-- /LINE SEPARATOR -->

                    <!-- POST PREVIEW -->
                    <div class="post-preview small geeky-news">
                        <!-- POST PREVIEW TITLE -->
                        <a href="post-v4.html" class="post-preview-title">Plans for a new AC theme park in
                            California studios</a>
                        <!-- POST AUTHOR INFO -->
                        <div class="post-author-info-wrap">
                            <p class="post-author-info small light">By <a href="search-results.html"
                                    class="post-author">Morgana</a><span class="separator">|</span>December 15th,
                                2018</p>
                        </div>
                        <!-- /POST AUTHOR INFO -->
                    </div>
                    <!-- /POST PREVIEW -->

                    <!-- LINE SEPARATOR -->
                    <div class="line-separator"></div>
                    <!-- /LINE SEPARATOR -->

                    <!-- POST PREVIEW -->
                    <div class="post-preview small geeky-news">
                        <!-- POST PREVIEW TITLE -->
                        <a href="post-v4.html" class="post-preview-title">Jessica Tam to appear at this year Bebop
                            convention</a>
                        <!-- POST AUTHOR INFO -->
                        <div class="post-author-info-wrap">
                            <p class="post-author-info small light">By <a href="search-results.html"
                                    class="post-author">Vellatrix</a><span class="separator">|</span>December 15th,
                                2018</p>
                        </div>
                        <!-- /POST AUTHOR INFO -->
                    </div>
                    <!-- /POST PREVIEW -->
                </div>
                <!-- /POST PREVIEW SHOWCASE -->
            </div>
            <!-- /POST PREVIEW SHOWCASE -->
        </div>
        <!-- /LAYOUT ITEM 1-1-1 -->

        <!-- LAYOUT ITEM -->
        <div class="layout-item padded">
            <a href="#">
                <!-- PROMO BANNER -->
                <div class="promo-banner">
                    <!-- PROMO BANNER IMG -->
                    <img src="{{ asset('assets/front/img/banners/live-play-banner-logo.png') }}" alt="promo-banner-img"
                        class="promo-banner-img">
                    <!-- /PROMO BANNER IMG -->

                    <!-- TAG ORNAMENT -->
                    <p class="tag-ornament bold violet">Jan 18 - 10PM PCT</p>
                    <!-- /TAG ORNAMENT -->

                    <!-- PROMO BANNER INFO -->
                    <div class="promo-banner-info">
                        <p class="promo-banner-pre-title">Watch us play<span class="live-icon"></span>live</p>
                        <p class="promo-banner-title">The last of them</p>
                        <p class="promo-banner-text">With SakuraBliss99 and James-Spiegel</p>
                    </div>
                    <!-- /PROMO BANNER INFO -->

                    <!-- COUNTDOWN ARC -->
                    <div id="countdown-arc" class="countdown-arc">
                        <!-- COUNTER WRAP -->
                        <div class="counter-wrap">
                            <div class="timer-days"></div>
                            <p class="text-heading counter-text">Days</p>
                        </div>
                        <!-- /COUNTER WRAP -->

                        <!-- COUNTER WRAP -->
                        <div class="counter-wrap">
                            <div class="timer-hours"></div>
                            <p class="text-heading counter-text">Hours</p>
                        </div>
                        <!-- /COUNTER WRAP -->

                        <!-- COUNTER WRAP -->
                        <div class="counter-wrap">
                            <div class="timer-minutes"></div>
                            <p class="text-heading counter-text">Minutes</p>
                        </div>
                        <!-- /COUNTER WRAP -->

                        <!-- COUNTER WRAP -->
                        <div class="counter-wrap">
                            <div class="timer-seconds"></div>
                            <p class="text-heading counter-text">Seconds</p>
                        </div>
                        <!-- /COUNTER WRAP -->
                    </div>
                    <!-- /COUNTDOWN ARC -->
                </div>
                <!-- /PROMO BANNER -->
            </a>
        </div>
        <!-- /LAYOUT ITEM -->

        <!-- LAYOUT ITEM -->
        <div class="layout-item padded own-grid">
            <!-- SECTION TITLE WRAP -->
            <div class="section-title-wrap cyan">
                <h2 class="section-title medium">Latest Videos</h2>
                <div class="section-title-separator"></div>

                <!-- SLIDER CONTROLS -->
                <div id="lvideos-slider1-controls" class="carousel-controls slider-controls cyan">
                    <div class="slider-control control-previous">
                        <!-- ARROW ICON -->
                        <svg class="arrow-icon medium">
                            <use xlink:href="#svg-arrow-medium"></use>
                        </svg>
                        <!-- /ARROW ICON -->
                    </div>
                    <div class="slider-control control-next">
                        <!-- ARROW ICON -->
                        <svg class="arrow-icon medium">
                            <use xlink:href="#svg-arrow-medium"></use>
                        </svg>
                        <!-- /ARROW ICON -->
                    </div>
                </div>
                <!-- /SLIDER CONTROLS -->
            </div>
            <!-- /SECTION TITLE WRAP -->

            <!-- CAROUSEL -->
            <div id="lvideos-slider1" class="carousel video">
                <!-- CAROUSEL ITEMS -->
                <div class="carousel-items">
                    <!-- CAROUSEL ITEM -->
                    <div class="carousel-item">
                        <!-- POST PREVIEW -->
                        <div class="post-preview video">
                            <!-- POST PREVIEW IMG WRAP -->
                            <a href="post-video.html">
                                <div class="post-preview-img-wrap">
                                    <!-- POST PREVIEW IMG -->
                                    <figure class="post-preview-img liquid">
                                        <img src="{{ asset('assets/front/img/posts/31.jpg') }}" alt="post-31">
                                    </figure>
                                    <!-- /POST PREVIEW IMG -->

                                    <!-- POST PREVIEW OVERLAY -->
                                    <div class="post-preview-overlay">
                                        <!-- PLAY BUTTON -->
                                        <div class="play-button">
                                            <!-- PLAY BUTTON ICON -->
                                            <svg class="play-button-icon">
                                                <use xlink:href="#svg-play"></use>
                                            </svg>
                                            <!-- /PLAY BUTTON ICON -->
                                        </div>
                                        <!-- /PLAY BUTTON -->

                                        <!-- POST PREVIEW OVERLAY INFO -->
                                        <div class="post-preview-overlay-info">
                                            <!-- POST PREVIEW TITLE -->
                                            <p class="post-preview-title">Galaxy Adventure RX is a boring remake of
                                                a classic</p>
                                            <!-- POST PREVIEW TEXT -->
                                            <p class="post-preview-text">Lorem ipsum dolor sit amet, consectetur
                                                adipisicing elit, sed do eiusmod.</p>
                                        </div>
                                        <!-- /POST PREVIEW OVERLAY INFO -->
                                    </div>
                                    <!-- /POST PREVIEW OVERLAY -->
                                </div>
                            </a>
                            <!-- /POST PREVIEW IMG WRAP -->
                        </div>
                        <!-- /POST PREVIEW -->

                        <!-- POST PREVIEW -->
                        <div class="post-preview video">
                            <!-- POST PREVIEW IMG WRAP -->
                            <a href="post-video.html">
                                <div class="post-preview-img-wrap">
                                    <!-- POST PREVIEW IMG -->
                                    <figure class="post-preview-img liquid">
                                        <img src="{{ asset('assets/front/img/posts/25.jpg') }}" alt="post-25">
                                    </figure>
                                    <!-- /POST PREVIEW IMG -->

                                    <!-- POST PREVIEW OVERLAY -->
                                    <div class="post-preview-overlay">
                                        <!-- PLAY BUTTON -->
                                        <div class="play-button">
                                            <!-- PLAY BUTTON ICON -->
                                            <svg class="play-button-icon">
                                                <use xlink:href="#svg-play"></use>
                                            </svg>
                                            <!-- /PLAY BUTTON ICON -->
                                        </div>
                                        <!-- /PLAY BUTTON -->

                                        <!-- POST PREVIEW OVERLAY INFO -->
                                        <div class="post-preview-overlay-info">
                                            <!-- POST PREVIEW TITLE -->
                                            <p class="post-preview-title">Gameplay trailer for the new Legend of
                                                Kenji game</p>
                                            <!-- POST PREVIEW TEXT -->
                                            <p class="post-preview-text">Lorem ipsum dolor sit amet, consectetur
                                                adipisicing elit, sed do eiusmod.</p>
                                        </div>
                                        <!-- /POST PREVIEW OVERLAY INFO -->
                                    </div>
                                    <!-- /POST PREVIEW OVERLAY -->
                                </div>
                            </a>
                            <!-- /POST PREVIEW IMG WRAP -->
                        </div>
                        <!-- /POST PREVIEW -->
                    </div>
                    <!-- /CAROUSEL ITEM -->

                    <!-- CAROUSEL ITEM -->
                    <div class="carousel-item">
                        <!-- POST PREVIEW -->
                        <div class="post-preview video">
                            <!-- POST PREVIEW IMG WRAP -->
                            <a href="post-video.html">
                                <div class="post-preview-img-wrap">
                                    <!-- POST PREVIEW IMG -->
                                    <figure class="post-preview-img liquid">
                                        <img src="{{ asset('assets/front/img/posts/17.jpg') }}" alt="post-17">
                                    </figure>
                                    <!-- /POST PREVIEW IMG -->

                                    <!-- POST PREVIEW OVERLAY -->
                                    <div class="post-preview-overlay">
                                        <!-- PLAY BUTTON -->
                                        <div class="play-button">
                                            <!-- PLAY BUTTON ICON -->
                                            <svg class="play-button-icon">
                                                <use xlink:href="#svg-play"></use>
                                            </svg>
                                            <!-- /PLAY BUTTON ICON -->
                                        </div>
                                        <!-- /PLAY BUTTON -->

                                        <!-- POST PREVIEW OVERLAY INFO -->
                                        <div class="post-preview-overlay-info">
                                            <!-- POST PREVIEW TITLE -->
                                            <p class="post-preview-title">Jazzstar announced that the GTE5 for PC is
                                                delayed</p>
                                            <!-- POST PREVIEW TEXT -->
                                            <p class="post-preview-text">Lorem ipsum dolor sit amet, consectetur
                                                adipisicing elit, sed do eiusmod.</p>
                                        </div>
                                        <!-- /POST PREVIEW OVERLAY INFO -->
                                    </div>
                                    <!-- /POST PREVIEW OVERLAY -->
                                </div>
                            </a>
                            <!-- /POST PREVIEW IMG WRAP -->
                        </div>
                        <!-- /POST PREVIEW -->

                        <!-- POST PREVIEW -->
                        <div class="post-preview video">
                            <!-- POST PREVIEW IMG WRAP -->
                            <a href="post-video.html">
                                <div class="post-preview-img-wrap">
                                    <!-- POST PREVIEW IMG -->
                                    <figure class="post-preview-img liquid">
                                        <img src="{{ asset('assets/front/img/posts/01.jpg') }}" alt="post-01">
                                    </figure>
                                    <!-- /POST PREVIEW IMG -->

                                    <!-- POST PREVIEW OVERLAY -->
                                    <div class="post-preview-overlay">
                                        <!-- PLAY BUTTON -->
                                        <div class="play-button">
                                            <!-- PLAY BUTTON ICON -->
                                            <svg class="play-button-icon">
                                                <use xlink:href="#svg-play"></use>
                                            </svg>
                                            <!-- /PLAY BUTTON ICON -->
                                        </div>
                                        <!-- /PLAY BUTTON -->

                                        <!-- POST PREVIEW OVERLAY INFO -->
                                        <div class="post-preview-overlay-info">
                                            <!-- POST PREVIEW TITLE -->
                                            <p class="post-preview-title">The Clash of Dragons is breaking record
                                                sales in...</p>
                                            <!-- POST PREVIEW TEXT -->
                                            <p class="post-preview-text">Lorem ipsum dolor sit amet, consectetur
                                                adipisicing elit, sed do eiusmod.</p>
                                        </div>
                                        <!-- /POST PREVIEW OVERLAY INFO -->
                                    </div>
                                    <!-- /POST PREVIEW OVERLAY -->
                                </div>
                            </a>
                            <!-- /POST PREVIEW IMG WRAP -->
                        </div>
                        <!-- /POST PREVIEW -->
                    </div>
                    <!-- /CAROUSEL ITEM -->

                    <!-- CAROUSEL ITEM -->
                    <div class="carousel-item">
                        <!-- POST PREVIEW -->
                        <div class="post-preview video">
                            <!-- POST PREVIEW IMG WRAP -->
                            <a href="post-video.html">
                                <div class="post-preview-img-wrap">
                                    <!-- POST PREVIEW IMG -->
                                    <figure class="post-preview-img liquid">
                                        <img src="{{ asset('assets/front/img/posts/07.jpg') }}" alt="post-07">
                                    </figure>
                                    <!-- /POST PREVIEW IMG -->

                                    <!-- POST PREVIEW OVERLAY -->
                                    <div class="post-preview-overlay">
                                        <!-- PLAY BUTTON -->
                                        <div class="play-button">
                                            <!-- PLAY BUTTON ICON -->
                                            <svg class="play-button-icon">
                                                <use xlink:href="#svg-play"></use>
                                            </svg>
                                            <!-- /PLAY BUTTON ICON -->
                                        </div>
                                        <!-- /PLAY BUTTON -->

                                        <!-- POST PREVIEW OVERLAY INFO -->
                                        <div class="post-preview-overlay-info">
                                            <!-- POST PREVIEW TITLE -->
                                            <p class="post-preview-title">New expansion pack coming to "Rise of
                                                Depredators"</p>
                                            <!-- POST PREVIEW TEXT -->
                                            <p class="post-preview-text">Lorem ipsum dolor sit amet, consectetur
                                                adipisicing elit, sed do eiusmod.</p>
                                        </div>
                                        <!-- /POST PREVIEW OVERLAY INFO -->
                                    </div>
                                    <!-- /POST PREVIEW OVERLAY -->
                                </div>
                            </a>
                            <!-- /POST PREVIEW IMG WRAP -->
                        </div>
                        <!-- /POST PREVIEW -->

                        <!-- POST PREVIEW -->
                        <div class="post-preview video">
                            <!-- POST PREVIEW IMG WRAP -->
                            <a href="post-video.html">
                                <div class="post-preview-img-wrap">
                                    <!-- POST PREVIEW IMG -->
                                    <figure class="post-preview-img liquid">
                                        <img src="{{ asset('assets/front/img/posts/16.jpg') }}" alt="post-16">
                                    </figure>
                                    <!-- /POST PREVIEW IMG -->

                                    <!-- POST PREVIEW OVERLAY -->
                                    <div class="post-preview-overlay">
                                        <!-- PLAY BUTTON -->
                                        <div class="play-button">
                                            <!-- PLAY BUTTON ICON -->
                                            <svg class="play-button-icon">
                                                <use xlink:href="#svg-play"></use>
                                            </svg>
                                            <!-- /PLAY BUTTON ICON -->
                                        </div>
                                        <!-- /PLAY BUTTON -->

                                        <!-- POST PREVIEW OVERLAY INFO -->
                                        <div class="post-preview-overlay-info">
                                            <!-- POST PREVIEW TITLE -->
                                            <p class="post-preview-title">We reviewed the new Magimons game</p>
                                            <!-- POST PREVIEW TEXT -->
                                            <p class="post-preview-text">Lorem ipsum dolor sit amet, consectetur
                                                adipisicing elit, sed do eiusmod.</p>
                                        </div>
                                        <!-- /POST PREVIEW OVERLAY INFO -->
                                    </div>
                                    <!-- /POST PREVIEW OVERLAY -->
                                </div>
                            </a>
                            <!-- /POST PREVIEW IMG WRAP -->
                        </div>
                        <!-- /POST PREVIEW -->
                    </div>
                    <!-- /CAROUSEL ITEM -->

                    <!-- CAROUSEL ITEM -->
                    <div class="carousel-item">
                        <!-- POST PREVIEW -->
                        <div class="post-preview video">
                            <!-- POST PREVIEW IMG WRAP -->
                            <a href="post-video.html">
                                <div class="post-preview-img-wrap">
                                    <!-- POST PREVIEW IMG -->
                                    <figure class="post-preview-img liquid">
                                        <img src="{{ asset('assets/front/img/posts/12.jpg') }}" alt="post-12">
                                    </figure>
                                    <!-- /POST PREVIEW IMG -->

                                    <!-- POST PREVIEW OVERLAY -->
                                    <div class="post-preview-overlay">
                                        <!-- PLAY BUTTON -->
                                        <div class="play-button">
                                            <!-- PLAY BUTTON ICON -->
                                            <svg class="play-button-icon">
                                                <use xlink:href="#svg-play"></use>
                                            </svg>
                                            <!-- /PLAY BUTTON ICON -->
                                        </div>
                                        <!-- /PLAY BUTTON -->

                                        <!-- POST PREVIEW OVERLAY INFO -->
                                        <div class="post-preview-overlay-info">
                                            <!-- POST PREVIEW TITLE -->
                                            <p class="post-preview-title">We reviewed the "Guardians of the
                                                Universe" movie</p>
                                            <!-- POST PREVIEW TEXT -->
                                            <p class="post-preview-text">Lorem ipsum dolor sit amet, consectetur
                                                adipisicing elit, sed do eiusmod.</p>
                                        </div>
                                        <!-- /POST PREVIEW OVERLAY INFO -->
                                    </div>
                                    <!-- /POST PREVIEW OVERLAY -->
                                </div>
                            </a>
                            <!-- /POST PREVIEW IMG WRAP -->
                        </div>
                        <!-- /POST PREVIEW -->

                        <!-- POST PREVIEW -->
                        <div class="post-preview video">
                            <!-- POST PREVIEW IMG WRAP -->
                            <a href="post-video.html">
                                <div class="post-preview-img-wrap">
                                    <!-- POST PREVIEW IMG -->
                                    <figure class="post-preview-img liquid">
                                        <img src="{{ asset('assets/front/img/posts/13.jpg') }}" alt="post-13">
                                    </figure>
                                    <!-- /POST PREVIEW IMG -->

                                    <!-- POST PREVIEW OVERLAY -->
                                    <div class="post-preview-overlay">
                                        <!-- PLAY BUTTON -->
                                        <div class="play-button">
                                            <!-- PLAY BUTTON ICON -->
                                            <svg class="play-button-icon">
                                                <use xlink:href="#svg-play"></use>
                                            </svg>
                                            <!-- /PLAY BUTTON ICON -->
                                        </div>
                                        <!-- /PLAY BUTTON -->

                                        <!-- POST PREVIEW OVERLAY INFO -->
                                        <div class="post-preview-overlay-info">
                                            <!-- POST PREVIEW TITLE -->
                                            <p class="post-preview-title">The "Clash of Eternity" new game was just
                                                released</p>
                                            <!-- POST PREVIEW TEXT -->
                                            <p class="post-preview-text">Lorem ipsum dolor sit amet, consectetur
                                                adipisicing elit, sed do eiusmod.</p>
                                        </div>
                                        <!-- /POST PREVIEW OVERLAY INFO -->
                                    </div>
                                    <!-- /POST PREVIEW OVERLAY -->
                                </div>
                            </a>
                            <!-- /POST PREVIEW IMG WRAP -->
                        </div>
                        <!-- /POST PREVIEW -->
                    </div>
                    <!-- /CAROUSEL ITEM -->
                </div>
                <!-- /CAROUSEL ITEMS -->
            </div>
            <!-- /CAROUSEL -->
        </div>
        <!-- /LAYOUT ITEM -->
    </div>
    <!-- /LAYOUT BODY -->

    <!-- LAYOUT SIDEBAR -->
    <div class="layout-sidebar layout-item gutter-medium">
        <!-- WIDGET SIDEBAR -->
        <div class="widget-sidebar">
            <!-- SIDEBAR SEARCH FORM -->
            <form class="sidebar-search-form">
                <!-- SUBMIT INPUT -->
                <div class="submit-input full blue">
                    <input type="text" id="sidebar-search1" name="sidebar-search1"
                        placeholder="Search articles here...">
                    <button class="submit-input-button">
                        <!-- SEARCH ICON -->
                        <svg class="search-icon small">
                            <use xlink:href="#svg-search"></use>
                        </svg>
                        <!-- /SEARCH ICON -->
                    </button>
                </div>
                <!-- /SUBMIT INPUT -->
            </form>
            <!-- /SIDEBAR SEARCH FORM -->
        </div>
        <!-- /WIDGET SIDEBAR -->

        <!-- WIDGET SIDEBAR -->
        <div class="widget-sidebar">
            <!-- SECTION TITLE WRAP -->
            <div class="section-title-wrap blue">
                <h2 class="section-title medium">Social Pixel</h2>
                <div class="section-title-separator"></div>
            </div>
            <!-- /SECTION TITLE WRAP -->

            <!-- SOCIAL LINKS -->
            <div class="social-links medium centered">
                <!-- BUBBLE ORNAMENT -->
                <a href="#" class="bubble-ornament big fb">
                    <!-- FACEBOOK ICON -->
                    <svg class="facebook-icon big">
                        <use xlink:href="#svg-facebook"></use>
                    </svg>
                    <!-- /FACEBOOK ICON -->
                    <p class="bubble-ornament-text">2560</p>
                </a>
                <!-- /BUBBLE ORNAMENT -->

                <!-- BUBBLE ORNAMENT -->
                <a href="#" class="bubble-ornament big twt">
                    <!-- TWITTER ICON -->
                    <svg class="twitter-icon big">
                        <use xlink:href="#svg-twitter"></use>
                    </svg>
                    <!-- /TWITTER ICON -->
                    <p class="bubble-ornament-text">1945</p>
                </a>
                <!-- /BUBBLE ORNAMENT -->

                <!-- BUBBLE ORNAMENT -->
                <a href="#" class="bubble-ornament big insta">
                    <!-- INSTAGRAM ICON -->
                    <svg class="instagram-icon big">
                        <use xlink:href="#svg-instagram"></use>
                    </svg>
                    <!-- /INSTAGRAM ICON -->
                    <p class="bubble-ornament-text">835</p>
                </a>
                <!-- /BUBBLE ORNAMENT -->

                <!-- BUBBLE ORNAMENT -->
                <a href="#" class="bubble-ornament big twitch">
                    <!-- TWITCH ICON -->
                    <svg class="twitch-icon big">
                        <use xlink:href="#svg-twitch"></use>
                    </svg>
                    <!-- /TWITCH ICON -->
                    <p class="bubble-ornament-text">9632</p>
                </a>
                <!-- /BUBBLE ORNAMENT -->
            </div>
            <!-- /SOCIAL LINKS -->
        </div>
        <!-- /WIDGET SIDEBAR -->

        <!-- WIDGET SIDEBAR -->
        <div class="widget-sidebar">
            <!-- SECTION TITLE WRAP -->
            <div class="section-title-wrap blue">
                <h2 class="section-title medium">Popular Posts</h2>
                <div class="section-title-separator"></div>
            </div>
            <!-- /SECTION TITLE WRAP -->

            <!-- POST PREVIEW SHOWCASE -->
            <div class="post-preview-showcase grid-1col centered gutter-small">
                <!-- POST PREVIEW -->
                <div class="post-preview tiny gaming-news">
                    <!-- POST PREVIEW IMG WRAP -->
                    <a href="post-v1.html">
                        <div class="post-preview-img-wrap">
                            <!-- POST PREVIEW IMG -->
                            <figure class="post-preview-img liquid">
                                <img src="{{ asset('assets/front/img/posts/01.jpg') }}" alt="post-01">
                            </figure>
                            <!-- /POST PREVIEW IMG -->
                        </div>
                    </a>
                    <!-- /POST PREVIEW IMG WRAP -->

                    <!-- POST PREVIEW TITLE -->
                    <a href="post-v1.html" class="post-preview-title">The Clash of Dragons is breaking record sales
                        in USA and Japan</a>
                    <!-- POST AUTHOR INFO -->
                    <div class="post-author-info-wrap">
                        <p class="post-author-info small light">By <a href="search-results.html"
                                class="post-author">Dexter</a><span class="separator">|</span>Dec 15th, 2018</p>
                    </div>
                    <!-- /POST AUTHOR INFO -->
                </div>
                <!-- /POST PREVIEW -->

                <!-- POST PREVIEW -->
                <div class="post-preview tiny game-review">
                    <!-- POST PREVIEW IMG WRAP -->
                    <a href="post-v2.html">
                        <div class="post-preview-img-wrap">
                            <!-- POST PREVIEW IMG -->
                            <figure class="post-preview-img liquid">
                                <img src="{{ asset('assets/front/img/posts/25.jpg') }}" alt="post-25">
                            </figure>
                            <!-- /POST PREVIEW IMG -->

                            <!-- REVIEW RATING -->
                            <div class="review-rating">
                                <div id="sidebar-rate-1" class="arc tiny"></div>
                            </div>
                            <!-- /REVIEW RATING -->
                        </div>
                    </a>
                    <!-- /POST PREVIEW IMG WRAP -->

                    <!-- POST PREVIEW TITLE -->
                    <a href="post-v2.html" class="post-preview-title">"Legend of Kenshii II" is a bit green for
                        now</a>
                    <!-- POST AUTHOR INFO -->
                    <div class="post-author-info-wrap">
                        <p class="post-author-info small light">By <a href="search-results.html"
                                class="post-author">Vellatrix</a><span class="separator">|</span>Dec 15th, 2018</p>
                    </div>
                    <!-- /POST AUTHOR INFO -->
                </div>
                <!-- /POST PREVIEW -->

                <!-- POST PREVIEW -->
                <div class="post-preview tiny movie-news">
                    <!-- POST PREVIEW IMG WRAP -->
                    <a href="post-v3.html">
                        <div class="post-preview-img-wrap">
                            <!-- POST PREVIEW IMG -->
                            <figure class="post-preview-img liquid">
                                <img src="{{ asset('assets/front/img/posts/12.jpg') }}" alt="post-12">
                            </figure>
                            <!-- /POST PREVIEW IMG -->

                            <!-- RATING ORNAMENT -->
                            <div class="rating-ornament">
                                <!-- RATING ORNAMENT ITEM -->
                                <div class="rating-ornament-item">
                                    <!-- RATING ORNAMENT ICON -->
                                    <svg class="rating-ornament-icon">
                                        <use xlink:href="#svg-star"></use>
                                    </svg>
                                </div>
                                <!-- /RATING ORNAMENT ITEM -->

                                <!-- RATING ORNAMENT ITEM -->
                                <div class="rating-ornament-item">
                                    <!-- RATING ORNAMENT ICON -->
                                    <svg class="rating-ornament-icon">
                                        <use xlink:href="#svg-star"></use>
                                    </svg>
                                </div>
                                <!-- /RATING ORNAMENT ITEM -->

                                <!-- RATING ORNAMENT ITEM -->
                                <div class="rating-ornament-item">
                                    <!-- RATING ORNAMENT ICON -->
                                    <svg class="rating-ornament-icon">
                                        <use xlink:href="#svg-star"></use>
                                    </svg>
                                </div>
                                <!-- /RATING ORNAMENT ITEM -->

                                <!-- RATING ORNAMENT ITEM -->
                                <div class="rating-ornament-item">
                                    <!-- RATING ORNAMENT ICON -->
                                    <svg class="rating-ornament-icon empty">
                                        <use xlink:href="#svg-star"></use>
                                    </svg>
                                </div>
                                <!-- /RATING ORNAMENT ITEM -->

                                <!-- RATING ORNAMENT ITEM -->
                                <div class="rating-ornament-item">
                                    <!-- RATING ORNAMENT ICON -->
                                    <svg class="rating-ornament-icon empty">
                                        <use xlink:href="#svg-star"></use>
                                    </svg>
                                </div>
                                <!-- /RATING ORNAMENT ITEM -->
                            </div>
                            <!-- /RATING ORNAMENT -->
                        </div>
                    </a>
                    <!-- /POST PREVIEW IMG WRAP -->

                    <!-- POST PREVIEW TITLE -->
                    <a href="post-v3.html" class="post-preview-title">We reviewed the "Guardians of the Universe"
                        movie</a>
                    <!-- POST AUTHOR INFO -->
                    <div class="post-author-info-wrap">
                        <p class="post-author-info small light">By <a href="search-results.html"
                                class="post-author">Faye V.</a><span class="separator">|</span>Dec 15th, 2018</p>
                    </div>
                    <!-- /POST AUTHOR INFO -->
                </div>
                <!-- /POST PREVIEW -->

                <!-- POST PREVIEW -->
                <div class="post-preview tiny gaming-news">
                    <!-- POST PREVIEW IMG WRAP -->
                    <a href="post-v1.html">
                        <div class="post-preview-img-wrap">
                            <!-- POST PREVIEW IMG -->
                            <figure class="post-preview-img liquid">
                                <img src="{{ asset('assets/front/img/posts/17.jpg') }}" alt="post-17">
                            </figure>
                            <!-- /POST PREVIEW IMG -->
                        </div>
                    </a>
                    <!-- /POST PREVIEW IMG WRAP -->

                    <!-- POST PREVIEW TITLE -->
                    <a href="post-v1.html" class="post-preview-title">Jazzstar announced that the GTE5 for PC is
                        delayed</a>
                    <!-- POST AUTHOR INFO -->
                    <div class="post-author-info-wrap">
                        <p class="post-author-info small light">By <a href="search-results.html"
                                class="post-author">Dexter</a><span class="separator">|</span>Dec 15th, 2018</p>
                    </div>
                    <!-- /POST AUTHOR INFO -->
                </div>
                <!-- /POST PREVIEW -->
            </div>
            <!-- /POST PREVIEW SHOWCASE -->
        </div>
        <!-- /WIDGET SIDEBAR -->

        <!-- WIDGET SIDEBAR -->
        <div class="widget-sidebar">
            <!-- SECTION TITLE WRAP -->
            <div class="section-title-wrap red">
                <h2 class="section-title medium">Latest Reviews</h2>
                <div class="section-title-separator"></div>
            </div>
            <!-- /SECTION TITLE WRAP -->

            <!-- POST PREVIEW SHOWCASE -->
            <div class="post-preview-showcase grid-1col centered gutter-small">
                <!-- POST PREVIEW -->
                <div class="post-preview tiny game-review">
                    <!-- POST PREVIEW IMG WRAP -->
                    <a href="post-v2.html">
                        <div class="post-preview-img-wrap">
                            <!-- POST PREVIEW IMG -->
                            <figure class="post-preview-img liquid">
                                <img src="{{ asset('assets/front/img/posts/16.jpg') }}" alt="post-16">
                            </figure>
                            <!-- /POST PREVIEW IMG -->

                            <!-- REVIEW RATING -->
                            <div class="review-rating">
                                <div id="sidebar-rate-2" class="arc tiny"></div>
                            </div>
                            <!-- /REVIEW RATING -->
                        </div>
                    </a>
                    <!-- /POST PREVIEW IMG WRAP -->

                    <!-- POST PREVIEW TITLE -->
                    <a href="post-v2.html" class="post-preview-title">We reviewed the new Magimons game</a>
                    <!-- POST AUTHOR INFO -->
                    <div class="post-author-info-wrap">
                        <p class="post-author-info small light">By <a href="search-results.html"
                                class="post-author">Vellatrix</a><span class="separator">|</span>Dec 15th, 2018</p>
                    </div>
                    <!-- /POST AUTHOR INFO -->
                </div>
                <!-- /POST PREVIEW -->

                <!-- POST PREVIEW -->
                <div class="post-preview tiny game-review">
                    <!-- POST PREVIEW IMG WRAP -->
                    <a href="post-v2.html">
                        <div class="post-preview-img-wrap">
                            <!-- POST PREVIEW IMG -->
                            <figure class="post-preview-img liquid">
                                <img src="{{ asset('assets/front/img/posts/25.jpg') }}" alt="post-25">
                            </figure>
                            <!-- /POST PREVIEW IMG -->

                            <!-- REVIEW RATING -->
                            <div class="review-rating">
                                <div id="sidebar-rate-3" class="arc tiny"></div>
                            </div>
                            <!-- /REVIEW RATING -->
                        </div>
                    </a>
                    <!-- /POST PREVIEW IMG WRAP -->

                    <!-- POST PREVIEW TITLE -->
                    <a href="post-v2.html" class="post-preview-title">"Legend of Kenshii II" is a bit green for
                        now</a>
                    <!-- POST AUTHOR INFO -->
                    <div class="post-author-info-wrap">
                        <p class="post-author-info small light">By <a href="search-results.html"
                                class="post-author">Vellatrix</a><span class="separator">|</span>Dec 15th, 2018</p>
                    </div>
                    <!-- /POST AUTHOR INFO -->
                </div>
                <!-- /POST PREVIEW -->

                <!-- POST PREVIEW -->
                <div class="post-preview tiny game-review">
                    <!-- POST PREVIEW IMG WRAP -->
                    <a href="post-v2.html">
                        <div class="post-preview-img-wrap">
                            <!-- POST PREVIEW IMG -->
                            <figure class="post-preview-img liquid">
                                <img src="{{ asset('assets/front/img/posts/05.jpg') }}" alt="post-05">
                            </figure>
                            <!-- /POST PREVIEW IMG -->

                            <!-- REVIEW RATING -->
                            <div class="review-rating">
                                <div id="sidebar-rate-4" class="arc tiny"></div>
                            </div>
                            <!-- /REVIEW RATING -->
                        </div>
                    </a>
                    <!-- /POST PREVIEW IMG WRAP -->

                    <!-- POST PREVIEW TITLE -->
                    <a href="post-v2.html" class="post-preview-title">We reviewed the new and exciting fantasy game
                        "Olympus"</a>
                    <!-- POST AUTHOR INFO -->
                    <div class="post-author-info-wrap">
                        <p class="post-author-info small light">By <a href="search-results.html"
                                class="post-author">Morgana</a><span class="separator">|</span>Dec 15th, 2018</p>
                    </div>
                    <!-- /POST AUTHOR INFO -->
                </div>
                <!-- /POST PREVIEW -->

                <!-- POST PREVIEW -->
                <div class="post-preview tiny game-review">
                    <!-- POST PREVIEW IMG WRAP -->
                    <a href="post-v2.html">
                        <div class="post-preview-img-wrap">
                            <!-- POST PREVIEW IMG -->
                            <figure class="post-preview-img liquid">
                                <img src="{{ asset('assets/front/img/posts/08.jpg') }}" alt="post-08">
                            </figure>
                            <!-- /POST PREVIEW IMG -->

                            <!-- REVIEW RATING -->
                            <div class="review-rating">
                                <div id="sidebar-rate-5" class="arc tiny"></div>
                            </div>
                            <!-- /REVIEW RATING -->
                        </div>
                    </a>
                    <!-- /POST PREVIEW IMG WRAP -->

                    <!-- POST PREVIEW TITLE -->
                    <a href="post-v2.html" class="post-preview-title">The new Mecha Cyborg game is breaking
                        barriers</a>
                    <!-- POST AUTHOR INFO -->
                    <div class="post-author-info-wrap">
                        <p class="post-author-info small light">By <a href="search-results.html"
                                class="post-author">Vellatrix</a><span class="separator">|</span>Dec 15th, 2018</p>
                    </div>
                    <!-- /POST AUTHOR INFO -->
                </div>
                <!-- /POST PREVIEW -->
            </div>
            <!-- /POST PREVIEW SHOWCASE -->
        </div>
        <!-- /WIDGET SIDEBAR -->

        <!-- WIDGET SIDEBAR -->
        <div class="widget-sidebar">
            <!-- SECTION TITLE WRAP -->
            <div class="section-title-wrap violet">
                <h2 class="section-title medium">Twitch Streams</h2>
                <div class="section-title-separator"></div>
            </div>
            <!-- /SECTION TITLE WRAP -->

            <!-- STREAM PREVIEW SHOWCASE -->
            <div class="stream-preview-showcase grid-1col centered gutter-small">
                <!-- STREAM PREVIEW ITEM -->
                <div class="stream-preview">
                    <!-- STREAM PREVIEW STREAMER -->
                    <div class="stream-preview-streamer stream-preview-streamer-1">
                        <!-- STREAM PREVIEW STREAMER IMG -->
                        <img class="stream-preview-streamer-img"
                            src="{{ asset('assets/front/img/streamers/streambox-01-streamer.png') }}"
                            alt="streambox-01-streamer">
                        <!-- /STREAM PREVIEW STREAMER IMG -->

                        <!-- STREAM PREVIEW STREAMER NAME -->
                        <p class="stream-preview-streamer-name">Game-Huntress</p>
                        <!-- STREAM PREVIEW STREAMER TOPIC -->
                        <p class="stream-preview-streamer-topic">Let’s Play: Magimon Story Mode</p>
                        <!-- STREAM START COUNTER -->
                        <p class="stream-start-counter live">Live</p>
                    </div>
                    <!-- /STREAM PREVIEW STREAMER -->

                    <!-- WIDGET MEDIA -->
                    <div class="widget-media small">
                        <iframe src="https://player.twitch.tv/?autoplay=true&muted=true&t=03h15m50s&video=v417077870"
                            allowfullscreen></iframe>
                    </div>
                    <!-- /WIDGET MEDIA -->
                </div>
                <!-- /STREAM PREVIEW ITEM -->

                <!-- STREAM PREVIEW ITEM -->
                <div class="stream-preview">
                    <!-- STREAM PREVIEW STREAMER -->
                    <div class="stream-preview-streamer stream-preview-streamer-2">
                        <!-- STREAM PREVIEW STREAMER IMG -->
                        <img class="stream-preview-streamer-img"
                            src="{{ asset('assets/front/img/streamers/streambox-02-streamer.png') }}"
                            alt="streambox-02-streamer">
                        <!-- /STREAM PREVIEW STREAMER IMG -->

                        <!-- STREAM PREVIEW STREAMER NAME -->
                        <p class="stream-preview-streamer-name">Davikinger90</p>
                        <!-- STREAM PREVIEW STREAMER TOPIC -->
                        <p class="stream-preview-streamer-topic">I’ll try all Xenowatch’s new skins</p>
                        <!-- STREAM START COUNTER -->
                        <p class="stream-start-counter">Starts in:
                            <span id="sidebar-twitch-countdown-1" class="highlighted"></span>
                        </p>
                    </div>
                    <!-- /STREAM PREVIEW STREAMER -->
                </div>
                <!-- /STREAM PREVIEW ITEM -->

                <!-- STREAM PREVIEW ITEM -->
                <div class="stream-preview">
                    <!-- STREAM PREVIEW STREAMER -->
                    <div class="stream-preview-streamer stream-preview-streamer-3">
                        <!-- STREAM PREVIEW STREAMER IMG -->
                        <img class="stream-preview-streamer-img"
                            src="{{ asset('assets/front/img/streamers/streambox-03-streamer.png') }}"
                            alt="streambox-03-streamer">
                        <!-- /STREAM PREVIEW STREAMER IMG -->

                        <!-- STREAM PREVIEW STREAMER NAME -->
                        <p class="stream-preview-streamer-name">Markus_Snipes</p>
                        <!-- STREAM PREVIEW STREAMER TOPIC -->
                        <p class="stream-preview-streamer-topic">The best sniper of all county!</p>
                        <!-- STREAM START COUNTER -->
                        <p class="stream-start-counter offline">Offline</p>
                    </div>
                    <!-- /STREAM PREVIEW STREAMER -->
                </div>
                <!-- /STREAM PREVIEW ITEM -->
            </div>
            <!-- /STREAM PREVIEW SHOWCASE -->
        </div>
        <!-- /WIDGET SIDEBAR -->

        <!-- WIDGET SIDEBAR -->
        <div class="widget-sidebar">
            <!-- SECTION TITLE WRAP -->
            <div class="section-title-wrap blue">
                <h2 class="section-title medium">Latest Comments</h2>
                <div class="section-title-separator"></div>
            </div>
            <!-- /SECTION TITLE WRAP -->

            <!-- COMMENT PREVIEW SHOWCASE -->
            <div class="comment-preview-showcase grid-1col centered gutter-medium">
                <!-- COMMENT PREVIEW -->
                <div class="comment-preview">
                    <!-- USER AVATAR -->
                    <a href="post-v4.html#op-comments">
                        <img class="user-avatar" src="{{ asset('assets/front/img/users/06.jpg') }}" alt="user-06">
                    </a>
                    <!-- /USER AVATAR -->

                    <!-- COMMENT PREVIEW TITLE -->
                    <a href="post-v4.html#op-comments" class="comment-preview-title">Jessica Croft</a>
                    <!-- COMMENT PREVIEW LINK -->
                    <a href="post-v4.html" class="comment-preview-link yellow">Jessica Tam to star in the new...</a>
                    <!-- COMMENT PREVIEW TEXT -->
                    <p class="comment-preview-text">Lorem ipsum dolor sit tameteturre adipisicing elit,
                        incididunt...</p>
                </div>
                <!-- /COMMENT PREVIEW -->

                <!-- COMMENT PREVIEW -->
                <div class="comment-preview">
                    <!-- USER AVATAR -->
                    <a href="post-v1.html#op-comments">
                        <img class="user-avatar" src="{{ asset('assets/front/img/users/07.jpg') }}" alt="user-07">
                    </a>
                    <!-- /USER AVATAR -->

                    <!-- COMMENT PREVIEW TITLE -->
                    <a href="post-v1.html#op-comments" class="comment-preview-title">Nathan Thompson</a>
                    <!-- COMMENT PREVIEW LINK -->
                    <a href="post-v1.html" class="comment-preview-link blue">The Clash of Dragons is breaking...</a>
                    <!-- COMMENT PREVIEW TEXT -->
                    <p class="comment-preview-text">Lorem ipsum dolor sit ameteturre adipisicing elit...</p>
                </div>
                <!-- /COMMENT PREVIEW -->

                <!-- COMMENT PREVIEW -->
                <div class="comment-preview">
                    <!-- USER AVATAR -->
                    <a href="post-v3.html#op-comments">
                        <img class="user-avatar" src="{{ asset('assets/front/img/users/02.jpg') }}" alt="user-02">
                    </a>
                    <!-- /USER AVATAR -->

                    <!-- COMMENT PREVIEW TITLE -->
                    <a href="post-v3.html#op-comments" class="comment-preview-title">Elizabeth Valentine</a>
                    <!-- COMMENT PREVIEW LINK -->
                    <a href="post-v3.html" class="comment-preview-link green">We reviewed the “Guardians of...</a>
                    <!-- COMMENT PREVIEW TEXT -->
                    <p class="comment-preview-text">Malat lorem de dolor sit ameteturre adipisicing restandor...</p>
                </div>
                <!-- /COMMENT PREVIEW -->
            </div>
            <!-- /COMMENT PREVIEW SHOWCASE -->
        </div>
        <!-- /WIDGET SIDEBAR -->

        <!-- WIDGET SIDEBAR -->
        <div class="widget-sidebar">
            <!-- SECTION TITLE WRAP -->
            <div class="section-title-wrap red">
                <h2 class="section-title medium">Pixelated Poll</h2>
                <div class="section-title-separator"></div>
            </div>
            <!-- /SECTION TITLE WRAP -->

            <!-- POLL WIDGET -->
            <div class="poll-widget">
                <!-- POLL WIDGET TITLE -->
                <p class="poll-widget-title">What actor do you like to play "James" in the upcoming Firestorm movie?
                </p>
                <!-- POLL WIDGET FORM -->
                <form class="poll-widget-form">
                    <!-- RADIO ITEM LIST -->
                    <div class="radio-item-list">
                        <!-- RADIO ITEM -->
                        <div class="radio-item">
                            <input type="radio" id="poll-val-1" name="poll-actor" value="scj">
                            <!-- RADIO CIRCLE -->
                            <div class="radio-circle red"></div>
                            <!-- RADIO CIRCLE -->
                            <label for="poll-val-1" class="rl-label">Stephen Clark Jones</label>
                        </div>
                        <!-- /RADIO ITEM -->

                        <!-- RADIO ITEM -->
                        <div class="radio-item">
                            <input type="radio" id="poll-val-2" name="poll-actor" value="dr" checked>
                            <!-- RADIO CIRCLE -->
                            <div class="radio-circle red"></div>
                            <!-- RADIO CIRCLE -->
                            <label for="poll-val-2" class="rl-label">Derek Richardson</label>
                        </div>
                        <!-- /RADIO ITEM -->

                        <!-- RADIO ITEM -->
                        <div class="radio-item">
                            <input type="radio" id="poll-val-3" name="poll-actor" value="js">
                            <!-- RADIO CIRCLE -->
                            <div class="radio-circle red"></div>
                            <!-- RADIO CIRCLE -->
                            <label for="poll-val-3" class="rl-label">Jhonatan Specter</label>
                        </div>
                        <!-- /RADIO ITEM -->

                        <!-- RADIO ITEM -->
                        <div class="radio-item">
                            <input type="radio" id="poll-val-4" name="poll-actor" value="rdjr">
                            <!-- RADIO CIRCLE -->
                            <div class="radio-circle red"></div>
                            <!-- RADIO CIRCLE -->
                            <label for="poll-val-4" class="rl-label">Roberts Dauristen Jr.</label>
                        </div>
                        <!-- /RADIO ITEM -->
                    </div>
                    <!-- /RADIO ITEM LIST -->

                    <!-- POLL WIDGET FORM ACTIONS -->
                    <div class="poll-widget-form-actions">
                        <button class="button small red">Submit Vote</button>
                        <button class="button small blue">View Results</button>
                    </div>
                    <!-- /POLL WIDGET FORM ACTIONS -->
                </form>
                <!-- /POLL WIDGET FORM -->
            </div>
            <!-- /POLL WIDGET -->
        </div>
        <!-- /WIDGET SIDEBAR -->

        <!-- WIDGET SIDEBAR -->
        <div class="widget-sidebar">
            <!-- SECTION TITLE WRAP -->
            <div class="section-title-wrap cyan">
                <h2 class="section-title medium">Featured Video</h2>
                <div class="section-title-separator"></div>
            </div>
            <!-- /SECTION TITLE WRAP -->

            <!-- POST PREVIEW SHOWCASE -->
            <div class="post-preview-showcase grid-1col centered">
                <!-- POST PREVIEW -->
                <div class="post-preview video">
                    <!-- POST PREVIEW IMG WRAP -->
                    <a href="post-video.html">
                        <div class="post-preview-img-wrap">
                            <!-- POST PREVIEW IMG -->
                            <figure class="post-preview-img liquid">
                                <img src="{{ asset('assets/front/img/posts/03.jpg') }}" alt="post-03">
                            </figure>
                            <!-- /POST PREVIEW IMG -->

                            <!-- POST PREVIEW OVERLAY -->
                            <div class="post-preview-overlay">
                                <!-- PLAY BUTTON -->
                                <div class="play-button">
                                    <!-- PLAY BUTTON ICON -->
                                    <svg class="play-button-icon">
                                        <use xlink:href="#svg-play"></use>
                                    </svg>
                                    <!-- /PLAY BUTTON ICON -->
                                </div>
                                <!-- /PLAY BUTTON -->

                                <!-- POST PREVIEW OVERLAY INFO -->
                                <div class="post-preview-overlay-info">
                                    <!-- POST PREVIEW TITLE -->
                                    <p class="post-preview-title">"The Sandbenders II" break the bad sequel spell
                                        with a...</p>
                                    <!-- POST PREVIEW TEXT -->
                                    <p class="post-preview-text">Lorem ipsum dolor sit amet, consectetur adipisicing
                                        elit, sed do eiusmod.</p>
                                </div>
                                <!-- /POST PREVIEW OVERLAY INFO -->
                            </div>
                            <!-- /POST PREVIEW OVERLAY -->
                        </div>
                    </a>
                    <!-- /POST PREVIEW IMG WRAP -->
                </div>
                <!-- /POST PREVIEW -->
            </div>
            <!-- /POST PREVIEW SHOWCASE -->
        </div>
        <!-- /WIDGET SIDEBAR -->

        <!-- WIDGET SIDEBAR -->
        <div class="widget-sidebar">
            <!-- SECTION TITLE WRAP -->
            <div class="section-title-wrap blue">
                <h2 class="section-title medium">Pixel Tags</h2>
                <div class="section-title-separator"></div>
            </div>
            <!-- /SECTION TITLE WRAP -->

            <!-- TAG LIST -->
            <div class="tag-list">
                <!-- TAG ITEM -->
                <a href="search-results.html" class="tag-item">Gaming</a>
                <!-- /TAG ITEM -->

                <!-- TAG ITEM -->
                <a href="search-results.html" class="tag-item">Video Reviews</a>
                <!-- /TAG ITEM -->

                <!-- TAG ITEM -->
                <a href="search-results.html" class="tag-item">Previews</a>
                <!-- /TAG ITEM -->

                <!-- TAG ITEM -->
                <a href="search-results.html" class="tag-item">Movie Reviews</a>
                <!-- /TAG ITEM -->

                <!-- TAG ITEM -->
                <a href="search-results.html" class="tag-item">Movie News</a>
                <!-- /TAG ITEM -->

                <!-- TAG ITEM -->
                <a href="search-results.html" class="tag-item">Critic</a>
                <!-- /TAG ITEM -->

                <!-- TAG ITEM -->
                <a href="search-results.html" class="tag-item">Ratings</a>
                <!-- /TAG ITEM -->

                <!-- TAG ITEM -->
                <a href="search-results.html" class="tag-item">Funtendo</a>
                <!-- /TAG ITEM -->
            </div>
            <!-- /TAG LIST -->
        </div>
        <!-- /WIDGET SIDEBAR -->

        <!-- WIDGET SIDEBAR -->
        <div class="widget-sidebar">
            <!-- SECTION TITLE WRAP -->
            <div class="section-title-wrap red">
                <h2 class="section-title medium">Instagram Widget</h2>
                <div class="section-title-separator"></div>
            </div>
            <!-- /SECTION TITLE WRAP -->

            <!-- PHOTO LIST -->
            <div class="photo-list"></div>
            <!-- /PHOTO LIST -->
        </div>
        <!-- /WIDGET SIDEBAR -->

        <!-- WIDGET SIDEBAR -->
        <div class="widget-sidebar">
            <!-- SECTION TITLE WRAP -->
            <div class="section-title-wrap blue">
                <h2 class="section-title medium">Calendar</h2>
                <div class="section-title-separator"></div>
            </div>
            <!-- /SECTION TITLE WRAP -->

            <!-- CALENDAR -->
            <div id="calendar-sidebar" class="calendar small blue">
                <!-- CALENDAR HEADER -->
                <div class="calendar-header">
                    <!-- CALENDAR HEADER TOP -->
                    <div class="calendar-header-top">
                        <!-- CALENDAR CONTROLS -->
                        <div id="calendar1-controls" class="calendar-controls slider-controls blue">
                            <div class="slider-control control-previous">
                                <!-- ARROW ICON -->
                                <svg class="arrow-icon medium">
                                    <use xlink:href="#svg-arrow-medium"></use>
                                </svg>
                                <!-- /ARROW ICON -->
                            </div>
                            <div class="slider-control control-next">
                                <!-- ARROW ICON -->
                                <svg class="arrow-icon medium">
                                    <use xlink:href="#svg-arrow-medium"></use>
                                </svg>
                                <!-- /ARROW ICON -->
                            </div>
                        </div>
                        <!-- /CALENDAR CONTROLS -->
                        <p class="calendar-month-year"><span class="calendar-month"></span><span
                                class="calendar-year"></span></p>
                    </div>
                    <!-- /CALENDAR HEADER TOP -->

                    <!-- CALENDAR HEADER BOTTOM -->
                    <div class="calendar-header-bottom"></div>
                    <!-- /CALENDAR HEADER BOTTOM -->
                </div>
                <!-- /CALENDAR HEADER -->

                <!-- CALENDAR BODY -->
                <div class="calendar-body"></div>
                <!-- /CALENDAR BODY -->
            </div>
            <!-- /CALENDAR -->
        </div>
        <!-- /WIDGET SIDEBAR -->
    </div>
    <!-- /LAYOUT SIDEBAR -->
</div>
<!-- /LAYOUT CONTENT 1 -->
@endsection
@push('after-script')
<script>
    $('#reload').click(function () {
        $.ajax({
            type: 'GET',
            url: 'reload-captcha',
            success: function (data) {
                $(".captcha span").html(data.captcha);
            }
        });
    });
</script>
@endpush