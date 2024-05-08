@extends('front.castro.layouts.app')

@section('content')
<!-- page-title -->
<section class="page-title centred">
    <div class="pattern-layer"
        style="background-image: url({{ asset('master/Castro/assets/images/background/page-title.jpg') }});">
    </div>
    <div class="auto-container">
        <div class="content-box">
            <h1>{{ $data->menu_name ?? $data->title }}</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ url('/') }}">Beranda</a></li>
                <li><a href="#">Halaman</a></li>
                <li>{{ $data->menu_name ?? $data->title }}</li>
            </ul>
        </div>
    </div>
</section>
<!-- page-title end -->
<!-- blog-details -->
<section class="blog-details">
    <div class="auto-container">
        <div class="blog-details-content">
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
</section>
<!-- blog-details end -->
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