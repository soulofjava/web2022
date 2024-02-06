@extends('front.layouts.app')
@section('content')
<!-- LAYOUT CONTENT 1 -->
<div class="layout-content-1 layout-item-3-1 grid-limit" style="margin-top: 50px;">
    <!-- LAYOUT BODY -->
    <div class="layout-body">
        <!-- LAYOUT ITEM -->
        <div class="layout-item gutter-big">
            <!-- POST OPEN -->
            <div class="post-open gaming-news">

                @if($data->gambarmuka)
                <img src="{{ route('helper.show-picture', ['path' => $data->gambarmuka->path ?? '']) }}" alt="post-13"
                    style="width: 100%; height: 500px; margin-bottom: 20px;">
                @else
                <div style="margin-bottom: 60px;"></div>
                @endif
                <!-- POST OPEN CONTENT -->
                <div class="post-open-content">
                    <!-- POST OPEN BODY  -->
                    <div class="post-open-body">
                        <!-- TAG LIST -->
                        <!-- <div class="tag-list">
                            <a href="news-v1.html" class="tag-ornament">Gaming News</a>
                        </div> -->
                        <!-- /TAG LIST -->

                        <!-- POST OPEN TITLE -->
                        <p class="post-open-title">{{ $data->title }}</p>
                        <!-- /POST OPEN TITLE -->

                        <!-- POST AUTHOR INFO -->
                        <div class="post-author-info-wrap">
                            <!-- USER AVATAR -->
                            <a href="search-results.html">
                                <figure class="user-avatar tiny liquid">
                                    <img src="https://ui-avatars.com/api/?name={{ $data->uploader->name }}"
                                        alt="user-01">
                                </figure>
                            </a>
                            <!-- /USER AVATAR -->
                            <p class="post-author-info small light">By <a href="search-results.html"
                                    class="post-author">{{ $data->uploader->name
                                    }}</a><span class="separator">|</span>{{
                                \Carbon\Carbon::parse($data->date)->format('l') }}, {{
                                \Carbon\Carbon::parse( $data->date
                                )->toFormattedDateString() }}
                                <span class="separator">|</span>
                                Dilihat {{ views($data)->count(); }} kali
                            </p>
                        </div>
                        <!-- /POST AUTHOR INFO -->
                        <div style="margin-top: 20px;">
                            {!! $data->description !!}
                        </div>
                    </div>
                    <!-- /POST OPEN BODY -->

                </div>
                <!-- /POST OPEN CONTENT -->

            </div>
            <!-- /POST OPEN -->

        </div>
        <!-- /LAYOUT ITEM -->

    </div>
    <!-- /LAYOUT BODY -->

    <!-- LAYOUT SIDEBAR -->
    <div class="layout-sidebar layout-item gutter-medium" style="margin-top: 
    60px;">
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
                                class="post-author">{{ $item->uploader->name
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
    </div>
    <!-- /LAYOUT SIDEBAR -->
</div>
<!-- /LAYOUT CONTENT 1 -->
@endsection