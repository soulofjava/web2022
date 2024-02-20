@extends('front.layouts.app')
@section('content')
<div class="layout-content-1 layout-item-3-1 search-pad grid-limit">
    <div class="layout-body layout-item centered">
        @foreach(Conner\Tagging\Model\Tag::all() as $t)
        <div class="layout-item padded own-grid">
            <div class="section-title-wrap violet">
                <h2 class="section-title medium">{{ $t->name }}</h2>
                <div class="section-title-separator"></div>
                <div id="{{ ($loop->even) ? 'esnews-slider1-controls' : 'gknews-slider1-controls'}}"
                    class="carousel-controls slider-controls violet">
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
            </div>
            <div id="{{ ($loop->even) ? 'esnews-slider1' : 'gknews-slider1' }}" class="carousel">
                <div class="carousel-items">
                    @foreach(App\Models\News::with('gambarmuka')->withAnyTag($t->name)->get() as $it)
                    <div class="post-preview e-sport">
                        <a href="{{ url('news-detail', $it->slug) }}">
                            <div class="post-preview-img-wrap">
                                @if($it->gambarmuka)
                                <figure class="post-preview-img liquid">
                                    <img src="{{ route('helper.show-picture', ['path' => $it->gambarmuka->path]) }}"
                                        alt="img">
                                </figure>
                                @else
                                <figure class="post-preview-img liquid">
                                    <img src="https://diskominfo.wonosobokab.go.id/uploads/20180919023758_wsbPemKab.jpg"
                                        alt="img">
                                </figure>
                                @endif
                            </div>
                        </a>
                        <a href="{{ url('news-detail', $it->slug) }}" class="tag-ornament">{{
                            json_encode($it->tagNames()) }}</a>
                        <a href="{{ url('news-detail', $it->slug) }}" class="post-preview-title">{{ $it->title
                            }}</a>
                        <div class="post-author-info-wrap">
                            <p class="post-author-info small light">
                                {{ \Carbon\Carbon::parse($it->date)->format('l') }}, {{
                                \Carbon\Carbon::parse( $it->date
                                )->toFormattedDateString() }}
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="layout-sidebar layout-item gutter-medium">
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
                @foreach($popular as $item)
                <!-- POST PREVIEW -->
                <div class="post-preview tiny gaming-news">
                    <!-- POST PREVIEW IMG WRAP -->
                    <a href="{{ url('/news-detail', $item->slug) }}">
                        <div class="post-preview-img-wrap">
                            @if($item->gambarmuka)
                            <figure class="post-preview-img liquid imgLiquid_bgSize imgLiquid_ready"
                                style="background-image: url('{{ route('helper.show-picture', ['path' => $item->gambarmuka->path]) }}'); background-size: cover; background-position: center center; background-repeat: no-repeat;">
                            </figure>
                            @else
                            <figure class="post-preview-img liquid imgLiquid_bgSize imgLiquid_ready"
                                style="background-image: url('https://diskominfo.wonosobokab.go.id/uploads/20180919023758_wsbPemKab.jpg'); background-size: cover; background-position: center center; background-repeat: no-repeat;">
                            </figure>
                            @endif
                        </div>
                    </a>
                    <!-- /POST PREVIEW IMG WRAP -->

                    <!-- POST PREVIEW TITLE -->
                    <a href="{{ url('/news-detail', $item->slug) }}" class="post-preview-title">{{
                        \Illuminate\Support\Str::limit($item->title, 50, $end='...') }}</a>
                    <!-- POST AUTHOR INFO -->
                    <div class="post-author-info-wrap">
                        <p class="post-author-info small light">By <a href="{{ url('/news-detail', $item->slug) }}"
                                class="post-author">{{
                                $item->uploader->name
                                }}</a><span class="separator">|</span>{{
                            \Carbon\Carbon::parse($item->date)->format('l') }}, {{
                            \Carbon\Carbon::parse( $item->date
                            )->toFormattedDateString() }}</p>
                    </div>
                    <!-- /POST AUTHOR INFO -->
                </div>
                <!-- /POST PREVIEW -->
                @endforeach
            </div>
            <!-- /POST PREVIEW SHOWCASE -->
        </div>
        <!-- /WIDGET SIDEBAR -->
        <div class="widget-sidebar">
            <!-- SECTION TITLE WRAP -->
            <div class="section-title-wrap blue">
                <h2 class="section-title medium">Kategori</h2>
                <div class="section-title-separator"></div>
            </div>
            <!-- /SECTION TITLE WRAP -->

            <!-- TAG LIST -->
            <div class="tag-list">

                @foreach(Conner\Tagging\Model\Tag::all() as $t)
                <!-- TAG ITEM -->
                <a href="{{ url('newscategory') }}/{{ $t->slug }}" class="tag-item">{{ $t->name }}</a>
                <!-- /TAG ITEM -->
                @endforeach

            </div>
            <!-- /TAG LIST -->
        </div>
    </div>
</div>
@endsection
@push('after-script')
@endpush