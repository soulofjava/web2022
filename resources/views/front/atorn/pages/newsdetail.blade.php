@extends('front.atorn.layouts.app')
@section('content')
<!-- Page banner Area -->
<div class="page-banner bg-1">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-content">
                    <h2>Post Details</h2>
                    <ul>
                        <li><a href="{{ url('/') }}">Home <i class="las la-angle-right"></i></a></li>
                        <li>Post Details</li>
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
                <div class="services-details">
                    <div class="img">
                        <x-carousel :jjj='$data' />
                    </div>
                    <div class="services-details-content">
                        <h3>{{ $data->title }}</h3>
                        <ul class="blog-list">
                            <li>
                                <i class="las la-calendar"></i>
                                {{
                                \Carbon\Carbon::parse( $data->date )->format('l') }}</strong> {{
                                \Carbon\Carbon::parse( $data->date
                                )->toFormattedDateString() }}
                            </li>
                            <li>
                                <i class="las la-user-tie"></i>
                                <a href="{{ url('/news-author', $data->upload_by) }}">{{
                                    $data->upload_by }}</a>
                            </li>
                            <li>
                                <i class="las la-eye"></i>
                                <a href="#">{{
                                    views($data)->count(); }}</a>
                            </li>
                        </ul>
                        <p>{!! $data->description !!}</p>
                    </div>
                    <div class="article-footer">
                        <div class="article-tags">

                        </div>

                        <div class="article-share">
                            <ul class="social">
                                <li><span>Share:</span></li>
                                <li>
                                    {!! Share::page(Request::getHttpHost(), $data->title)
                                    ->facebook(); !!}
                                </li>
                                <li>
                                    {!! Share::page(Request::getHttpHost(), $data->title)
                                    ->twitter(); !!}
                                </li>
                                <li>
                                    {!! Share::page(Request::getHttpHost(), $data->title)
                                    ->whatsapp(); !!}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
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
                    <div class="side-bar-box categories-box">
                        <x-category h3='sidebar-title' div='sidebar-item categories' />
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
                                    <li><a href="{{ url('/news-author', $data->upload_by) }}">By {{
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
<script src="{{ asset('js/share.js') }}"></script>
@endpush