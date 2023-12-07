@extends('front.atorn.layouts.app')
@section('content')
<!-- Page banner Area -->
<div class="page-banner bg-1">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-content">
                    <h2>{{ $hasil }}</h2>
                    <ul>
                        <li><a href="{{ url('/') }}">Home <i class="las la-angle-right"></i></a></li>
                        <li>Show Post</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Page banner Area -->

<!-- Start Services Details Area -->
<div class="services-details-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-7 col-sm-12">
                @foreach($data as $author)
                <div class="services-details">
                    <div class="img">
                        <a href="{{ url('/news-detail', $author->slug) }}">
                            @forelse($author->gambar as $gambar)
                            @if($loop->iteration == 1)
                            <img src="{{ asset('storage/') }}/{{  $gambar->path }}" class="img-fluid"
                                alt="{{ $gambar->file_name }}">
                            @endif
                            @empty
                            <img src="{{ asset('img/soulofjava.jpg') }}" class="img-fluid" alt="soul of java">
                            @endforelse
                        </a>
                    </div>
                    <div class="services-details-content">
                        <h3>{{ $author->title }}</h3>
                        <ul class="blog-list">
                            <li>
                                <i class="las la-calendar"></i>
                                {{
                                \Carbon\Carbon::parse( $author->date )->format('l') }}</strong> {{
                                \Carbon\Carbon::parse( $author->date
                                )->toFormattedDateString() }}
                            </li>
                            <li>
                                <i class="las la-user-tie"></i>
                                <a href="{{ url('/news-author', $author->upload_by) }}">{{
                                    $author->upload_by }}</a>
                            </li>
                            <li>
                                <i class="las la-eye"></i>
                                <a href="#">{{
                                    views($author)->count(); }}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="article-footer">
                        <div class="article-tags">
                        </div>
                        <div class="article-share">
                            <ul class="social">
                                <li><span>Share:</span></li>
                                <li>
                                    {!! Share::page(Request::getHttpHost(), $author->title)
                                    ->facebook(); !!}
                                </li>
                                <li>
                                    {!! Share::page(Request::getHttpHost(), $author->title)
                                    ->twitter(); !!}
                                </li>
                                <li>
                                    {!! Share::page(Request::getHttpHost(), $author->title)
                                    ->whatsapp(); !!}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-lg-4 col-md-5 col-sm-12">
                <div class="side-bar">
                    <div class="side-bar-box search-box">
                        {{Form::open(['route' => 'news.search','method' => 'get', ''])}}
                        {{Form::text('kolomcari', null,['class' => 'form-control',
                        'placeholder' => 'Title Post'])}}
                        <button type="submit"><i class="las la-search"></i></button>
                        {{Form::close()}}
                    </div>
                    <div class="side-bar-box recent-post">
                        <h3 class="title">Recent Post</h3>
                        @foreach($news as $n)
                        <div class="single-recent-post">
                            <div class="recent-post-img">
                                <a href="{{ url('/news-detail', $n->slug) }}">
                                    @if(file_exists(public_path('storage/'.$n->path)))
                                    <img src="{{ asset('storage/') }}/{{ $n->path}}">
                                    @else
                                    <img src="{{ asset('img/soulofjava.jpg') }}">
                                    @endif
                                </a>
                            </div>
                            <div class="recent-post-content">
                                <ul>
                                    <li><a href="{{ url('/news-author', $n->upload_by) }}">By {{
                                            $n->upload_by }}</a></li>
                                    <li><a href="#"><i class="fa fa-calendar"></i> {{
                                            \Carbon\Carbon::parse( $n->date
                                            )->toFormattedDateString() }}</a></li>
                                </ul>
                                <h3><a href="{{ url('/news-detail', $n->slug) }}">{{
                                        \Illuminate\Support\Str::limit($n->title, 50, $end='...') }}</a></h3>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Services Details Area Area -->
@endsection
@push('after-script')
@endpush