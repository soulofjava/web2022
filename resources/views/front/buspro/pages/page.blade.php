@extends('front.buspro.layout.app')

@section('content')
<!-- Start Breadcrumb 
    ============================================= -->
<div class="breadcrumb-area shadow dark bg-fixed text-center text-light"
    style="background-image: url(assets/img/2440x1578.png);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h1>{{ $data->menu_name ?? $data->title }}</h1>
                <ul class="breadcrumb">
                    <li><a href="{{ url('/') }}"><i class="fas fa-home"></i> Beranda</a></li>
                    <li><a href="#"> Halaman</a></li>
                    <li><a href="#"> {{ $data->menu_name ?? $data->title }}</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumb -->
<!-- Start Blog Area
    ============================================= -->
<div class="blog-area full-blog blog-standard full-blog default-padding">
    <div class="container">
        <div class="row">
            <div class="blog-items">
                <div class="blog-content col-md-10 col-md-offset-1">
                    @if($data->menu_name == 'Daftar Informasi Publik')
                    <x-jip />
                    @elseif($data->menu_name == 'Daftar Informasi yang Dikecualikan')
                    <x-dip />
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