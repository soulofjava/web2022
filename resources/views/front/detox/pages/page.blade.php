@extends('front.detox.layouts.app')

@section('content')
<!--Page Title-->
<section class="page-title bg-color-1 text-center">
    <div class="pattern-layer"
        style="background-image: url('{{ asset('master/Detox/assets/images/shape/pattern-18.png') }}');"></div>
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
<!--End Page Title-->
<!-- error-section -->
<section class="error-section centred">
    <div class="container">
        <div class="content-box">
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
<!-- error-section end -->
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