@extends('front.buildco.layouts.app')
@section('content')
<!-- Start Breadcrumb 
    ============================================= -->
<div class="breadcrumb-area shadow dark bg-fixed text-center text-light"
    style="background-image: url(assets/img/2440x1578.png);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h1>{{ $data->title }}</h1>
                <ul class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="#">page</a></li>
                    <li><a href="#">{{ $data->menu_name ?? $data->title }}</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumb -->

<!-- Start Blog
    ============================================= -->
<div class="blog-area single full-blog full-blog default-padding">
    <div class="container">
        <div class="row">
            <div class="blog-items">
                <div class="blog-content col-md-10 col-md-offset-1">
                    <div class="single-item">
                        @if($data->menu_name == 'Daftar Informasi Publik')
                        <x-jip />
                        @elseif($data->title)
                        {!! $data->description !!}
                        @else
                        {!! $data->content !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Blog -->
@endsection