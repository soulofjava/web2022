@extends('front.deluck.layouts.app')
@section('content')
<!-- Start Breadcrumb 
    ============================================= -->
<div class="breadcrumb-area text-center bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="{{ url('/') }}"><i class="fas fa-home"></i> Beranda</a></li>
                    <li><a href="#"> Page</a></li>
                    <li class="active"> {{ $data->menu_name ?? $data->title }}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumb -->
<!-- Start Blog
    ============================================= -->
<div class="blog-area single full-blog default-padding">
    <div class="container">
        <div class="row">
            <div class="blog-items">
                <div class="blog-content col-md-10 col-md-offset-1">
                    <div class="item">
                        @if($data->menu_name == 'Daftar Informasi Publik')
                        <x-jip />
                        @elseif($data->menu_name == 'Personil')
                        <x-personil />
                        @elseif($data->title == 'Layanan')
                        <livewire:layanan />
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