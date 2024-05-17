@extends('front.boxass.layouts.app')
@section('content')
<main id="main">

    <!-- Start Breadcrumb
        ============================================= -->
    <div class="breadcrumb-area shadow bg-fixed text-center padding-xl text-light" style="background-color: #F4F7FB;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <!-- <h1>Blog Single</h1> -->
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
    <div id="blog" class="blog-area bg-gray full-width single default-padding">
        <div class="container">
            <div class="row">
                <div class="blog-items">
                    <div class="col-lg-12 col-md-12">
                        <div class="item">
                            @if($data->menu_name == 'Daftar Informasi Publik')
                            <x-jip />
                            @elseif($data->menu_name == 'Personil')
                            <div id="personil">
                            </div>
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

</main>
@endsection
@push('after-script')
<script>
    $.get('{{ route('api.personil') }}', function (data) {
        // Lakukan sesuatu dengan data yang diterima
        console.log(data);
        $('#personil').empty();
        $('#personil').html(data);
    }).fail(function (xhr, status, error) {
        // Tangani kesalahan jika ada
        console.error(xhr.responseText);
    });
</script>
@endpush