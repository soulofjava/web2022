@extends('front.layouts.app')
@section('content')
<!-- Blog Details Start -->
<section class="blog-details-area py-130 rpy-100" style="height: 100vh; overflow-y: auto;">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="blog-details-wrap">
                    @if($data->menu_name == 'Daftar Informasi Publik')
                    <x-jip />
                    @elseif($data->menu_name == 'Personil')
                    <x-personil />
                    @elseif($data->menu_name == 'Transparansi')
                    @include('front.pages.transparansi')
                    @elseif($data->title)
                    {!! $data->description !!}
                    @else
                    {!! $data->content !!}
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Details End -->
@endsection