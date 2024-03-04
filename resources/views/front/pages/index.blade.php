@extends('front.layouts.app')
@push('after-style')
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
    .card {
        position: relative;
    }

    .card-overlay {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        color: white;
        width: 100%;
        /* background-color: rgba(0, 0, 0, 0.5); */
        /* Ubah opacity sesuai kebutuhan */
        padding: 20px;
    }
</style>
@endpush
@section('content')
<div class="layout-content-1 layout-item-3-1 search-pad grid-limit">
    <div class="layout-body layout-item centered">
        @foreach(Conner\Tagging\Model\Tag::all() as $t)
        <center>
            @if($t->count > 1)
            <h2>{{ $t->name }}</h2>
            @endif
        </center>
        <div id="multi-item-example{{ $loop->iteration }}" class="carousel slide" data-ride="carousel"
            style="height: auto;">
            <div class="carousel-inner">
                @foreach(App\Models\News::with('gambarmuka')->withAnyTag($t->name)->where('publish',
                1)->latest('date')->get()->chunk(3)
                as $it)
                <div class="carousel-item {{ ($loop->first) ? 'active' : ''}}">
                    <div class="row">
                        @foreach($it as $i)
                        <div class="col-md-4 mb-1">
                            <a href="{{ url('news-detail', $i['slug']) }}">
                                <div class="card">
                                    @if($i->gambarmuka)
                                    <img src="{{ route('helper.show-picture', ['path' => $i->gambarmuka->path]) }}"
                                        class="card-img-top" alt="img" height="200px">
                                    @else
                                    <img src="{{ asset('hand-painted-watercolor-background-with-sky-clouds-shape.jpg') }}"
                                        class="card-img-top" alt="img" height="200px">
                                    <div class="card-overlay">
                                        <h5 class="card-title">{{ $i['title'] }}</h5>
                                        <p class="card-text">{{ $i['date'] }}</p>
                                    </div>
                                    @endif
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#multi-item-example{{ $loop->iteration }}" role="button"
                data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#multi-item-example{{ $loop->iteration }}" role="button"
                data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
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
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endpush