@extends('front.medino.layouts.app')
@section('content')
<!-- Banner Area Starts -->
<section class="banner-area other-page">
    <div class="container">
        <div class="row header-judul">
            <div class="col-lg-12">
                <h1>{{ $data->menu_name }}</h1>
                <a href="{{ url('/') }}">Beranda</a> | <a href="{{ url('newsall') }}">Detail Postingan</a>
            </div>
        </div>
    </div>
</section>
<!-- Banner Area End -->

<!--================Blog Area =================-->
<section class="blog_area section-padding">
    <div class="container">
        <div class="row">
            @if($data->menu_name == 'Daftar Informasi Publik')
            <x-jip />
            @elseif($data->title)
            {!! $data->description !!}
            @else
            {!! $data->content !!}
            @endif
        </div>
    </div>
</section>
<!--================Blog Area =================-->
@endsection
