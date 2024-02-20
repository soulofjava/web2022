@extends('front.layouts.app')
@push('after-style')
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
@endpush
@section('content')
<div class="layout-content-1 layout-item-3-1 search-pad grid-limit">
    <div class="layout-body layout-item centered">
        @foreach(Conner\Tagging\Model\Tag::all() as $t)
        <center>
            <h2>{{ $t->name }}</h2>
        </center>
        <div id="myCarousel{{ $loop->iteration }}" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @foreach(App\Models\News::with('gambarmuka')->withAnyTag($t->name)->get() as $it)
                @if($loop->first)
                <div class="carousel-item active">
                    <a href="{{ url('news-detail', $it->slug) }}">
                        <img src="{{ asset('Green and Black Maximalist Action  Adventure YouTube Channel Art.png') }}"
                            alt="Slide 1" width="100%" height="300px">
                        <div class="carousel-caption">
                            <h3 style="color: white;">
                                {{ $it->title }}
                            </h3>
                            <p style="color: white;">
                                {{ \Carbon\Carbon::parse($it->date)->format('l') }}, {{
                                \Carbon\Carbon::parse( $it->date
                                )->toFormattedDateString() }}
                            </p>
                        </div>
                    </a>
                </div>
                @else
                <div class="carousel-item">
                    <a href="{{ url('news-detail', $it->slug) }}">
                        <img src="{{ asset('Green and Black Maximalist Action  Adventure YouTube Channel Art.png') }}"
                            alt="Slide 1" width="100%" height="300px">
                        <div class="carousel-caption">
                            <h3 style="color: white;">
                                {{ $it->title }}
                            </h3>
                            <p style="color: white;">
                                {{ \Carbon\Carbon::parse($it->date)->format('l') }}, {{
                                \Carbon\Carbon::parse( $it->date
                                )->toFormattedDateString() }}
                            </p>
                        </div>
                    </a>
                </div>
                @endif
                @endforeach
            </div>

            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#myCarousel{{ $loop->iteration }}" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#myCarousel{{ $loop->iteration }}" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
        @endforeach
        <!-- @foreach(Conner\Tagging\Model\Tag::all() as $t)
        <div id="myCarousel{{ $loop->iteration }}" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <div class="row">
                            <h3 class="text-center w-100">{{ $t->name }}</h3>
                            @foreach(App\Models\News::with('gambarmuka')->withAnyTag($t->name)->get() as $it)
                            <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            {{ $it->title }}
                                        </h5>
                                        <p class="card-text">
                                            {{ \Carbon\Carbon::parse($it->date)->format('l') }}, {{
                                            \Carbon\Carbon::parse( $it->date
                                            )->toFormattedDateString() }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#myCarousel{{ $loop->iteration }}" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#myCarousel{{ $loop->iteration }}" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
        @endforeach -->
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
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endpush