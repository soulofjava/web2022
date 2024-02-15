@extends('front.layouts.app')
@push('after-style')
@endpush
@section('content')
<!-- LAYOUT CONTENT 1 -->
<div class="layout-content-1 layout-item-3-1 grid-limit" style="margin-top: 50px;">
    <!-- LAYOUT BODY -->
    <div class="layout-body">
        <!-- LAYOUT ITEM -->
        <div class="layout-item gutter-big">
            @foreach($news as $n)
            <div class="post-preview large gaming-news">
                <!-- POST PREVIEW IMG WRAP -->
                <a href="post-v1.html">
                    <div class="post-preview-img-wrap">
                        @if($n->gambarmuka)
                        <figure class="post-preview-img liquid imgLiquid_bgSize imgLiquid_ready"
                            style="background-image: url('{{ route('helper.show-picture', ['path' => $n->gambarmuka->path]) }}'); background-size: cover; background-position: center center; background-repeat: no-repeat;">
                        </figure>
                        @else
                        <figure class="post-preview-img liquid imgLiquid_bgSize imgLiquid_ready"
                            style="background-image: url('https://diskominfo.wonosobokab.go.id/uploads/20180919023758_wsbPemKab.jpg'); background-size: cover; background-position: center center; background-repeat: no-repeat;">
                        </figure>
                        @endif
                    </div>
                </a>
                <!-- /POST PREVIEW IMG WRAP -->

                @if($n->tagged)
                @foreach($n->tagged as $tg)
                <a href="{{ url('newscategory') }}/{{ $tg->tag_slug }}" class="tag-ornament">{{ $tg->tag_name }}</a>
                @endforeach
                @endif
                <a href="{{ url('/news-detail', $n->slug) }}" class="post-preview-title">{{
                    \Illuminate\Support\Str::limit($n->title, 50, $end='...') }}</a>
                <!-- POST AUTHOR INFO -->
                <div class="post-author-info-wrap">
                    <a href="#">
                        <figure class="user-avatar tiny liquid imgLiquid_bgSize imgLiquid_ready"
                            style="background-image: url(https://ui-avatars.com/api/?name={{ $n->uploader->name }}); background-size: cover; background-position: center center; background-repeat: no-repeat;">
                        </figure>
                    </a>
                    <p class="post-author-info small light">
                        By <a href="#" class="post-author">
                            {{ $n->uploader->name }}
                        </a>
                        <span class="separator">|</span>
                        {{ \Carbon\Carbon::parse($n->date)->format('l') }}, {{
                        \Carbon\Carbon::parse( $n->date
                        )->toFormattedDateString() }}
                        <span class="separator">|</span>
                        Dilihat {{ views($n)->count(); }} kali
                    </p>
                </div>
                <!-- /POST AUTHOR INFO -->
                <!-- POST PREVIEW TEXT -->
            </div>
            @endforeach

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

                @foreach($sideposts as $item)
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
    <!-- /LAYOUT SIDEBAR -->
</div>
<!-- /LAYOUT CONTENT 1 -->
@endsection
@push('after-script')
@endpush