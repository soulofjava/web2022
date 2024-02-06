@extends('front.layouts.app')
@section('content')
<div class="layout-content-1 layout-item-3-1 search-pad grid-limit">
    <div class="layout-body layout-item centered">
        <div class="layout-item">
            @foreach($news as $n)
            <div class="post-preview landscape big gaming-news">
                <a href="{{ url('/news-detail', $n->slug) }}">
                    <div class="post-preview-img-wrap">
                        @if($n->gambarmuka)
                        <figure class="post-preview-img liquid imgLiquid_bgSize imgLiquid_ready"
                            style="background-image: url('{{ route('helper.show-picture', ['path' => $n->gambarmuka->path]) }}'); background-size: cover; background-position: center center; background-repeat: no-repeat;">
                        </figure>
                        <!-- <img src="{{ route('helper.show-picture', ['path' => $n->gambarmuka->path]) }}"
                            alt="post-01" style="display: block !important;"> -->
                        @else
                        <figure class="post-preview-img liquid imgLiquid_bgSize imgLiquid_ready"
                            style="background-image: url('https://diskominfo.wonosobokab.go.id/uploads/20180919023758_wsbPemKab.jpg'); background-size: cover; background-position: center center; background-repeat: no-repeat;">
                        </figure>
                        @endif
                    </div>
                </a>
                <a href="{{ url('/news-detail', $n->slug) }}" class="post-preview-title">{{
                    \Illuminate\Support\Str::limit($n->title, 50, $end='...') }}</a>
                <div class="post-author-info-wrap">
                    <a href="#">
                        <figure class="user-avatar tiny liquid imgLiquid_bgSize imgLiquid_ready"
                            style="background-image: url(https://ui-avatars.com/api/?name={{ $n->uploader->name }}); background-size: cover; background-position: center center; background-repeat: no-repeat;">
                        </figure>
                    </a>
                    <p class="post-author-info small light">By <a href="#" class="post-author">{{ $n->uploader->name
                            }}</a><span class="separator">|</span>{{
                        \Carbon\Carbon::parse($n->date)->format('l') }}, {{
                        \Carbon\Carbon::parse( $n->date
                        )->toFormattedDateString() }}
                    </p>
                </div>
                <p class="post-preview-text">{!! strip_tags(\Illuminate\Support\Str::limit($n->description, 250, $end = '...')) !!}
                </p>
            </div>
            @endforeach
        </div>
    </div>
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

    </div>
</div>
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