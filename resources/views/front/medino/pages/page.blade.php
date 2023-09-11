@extends('front.medino.layouts.app')
@section('content')
<!-- Banner Area Starts -->
<section class="banner-area other-page">
    <div class="container">
        <div class="row">
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
            @if($data->menu_name == 'Permohonan Informasi Publik')
            <x-form-permohonan-informasi-publik />
            @elseif($data->menu_name == 'Pengajuan Keberatan Informasi Publik')
            <x-form-pengajuan-keberatan-informasi-publik />
            @else
            {!! $data->content !!}
            @endif
        </div>
    </div>
</section>
<!--================Blog Area =================-->
@endsection
@push('after-script')
@endpush