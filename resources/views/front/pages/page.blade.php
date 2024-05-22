@extends('front.layouts.app')
@push('after-style')
<style>
    table a {
        color: blue;
    }
</style>
@endpush
@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center"
        style="background-image: url('{{ asset('assets/front/assets/img/breadcrumbs-bg.jpg') }}');">

        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

            <h2>{{ $data->menu_name ?? '' }}</h2>
            <ol>
                <li><a href="{{ url('/') }}">Beranda</a></li>
                <li>Postingan</li>
            </ol>

        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- ======= Blog Details Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row">
                <div class="col">
                    @if(isset($data->menu_name))
                    <div class="card">
                        <div class="card-body">
                            @if($data->menu_name == 'Staf Ahli Bupati')
                            <div id="stafahli">
                            </div>
                            @elseif($data->menu_name == 'Sekretariat Daerah')
                            <div id="setda">
                            </div>
                            @elseif($data->menu_name == 'Perangkat Daerah')
                            <div id="kapalaopda">
                            </div>
                            @elseif($data->menu_name == 'Kecamatan')
                            <div id="camat">
                            </div>
                            @elseif($data->menu_name == 'Daftar Informasi Publik')
                            <x-jip />
                            @elseif($data->menu_name == 'Daftar Informasi yang Dikecualikan')
                            <x-dip />
                            @elseif(in_array($data->menu_name, ['Penyertaan Modal', 'Investasi Usaha', 'Informasi
                            Kejadian Bencana', 'Daftar
                            Kejadian Bencana', 'Pengumuman', 'Informasi Gangguan', 'Informasi Hoax', 'Kajian dan
                            Penelitian', 'Pengawasan
                            Internal', 'Regulasi Informasi Publik', 'Standar Operasional Prosedur', 'Laporan Layanan
                            Informasi Daerah']))
                            <x-data-table :kata="$data->menu_name" />
                            @endif
                        </div>
                    </div>
                    @endif


                    @if(isset($data->title))
                    <div class="card">
                        <div class="card-body">
                            {!! $data->description !!}
                        </div>
                    </div>
                    @endif

                    @if(isset($data->content) && !in_array($data->menu_name, ['Staf Ahli Bupati', 'Sekretariat Daerah',
                    'Perangkat Daerah',
                    'Kecamatan']))
                    <div class="card">
                        <div class="card-body">
                            {!! $data->content !!}
                        </div>
                    </div>
                    @endif

                    @if(isset($data->content) && !in_array($data->menu_name, ['Staf Ahli Bupati', 'Sekretariat Daerah',
                    'Perangkat Daerah',
                    'Kecamatan']))@endif

                </div>
            </div>

        </div>
    </section>
    <!-- End Blog Details Section -->

</main>
<!-- End #main -->
@endsection
@push('after-script')
<script>
    $.get('{{ route('api.stafahli') }}', function (data) {
        // Lakukan sesuatu dengan data yang diterima
        console.log(data);
        $('#stafahli').empty();
        $('#stafahli').html(data);
    }).fail(function (xhr, status, error) {
        // Tangani kesalahan jika ada
        console.error(xhr.responseText);
    });

    $.get('{{ route('api.setda') }}', function (data) {
        // Lakukan sesuatu dengan data yang diterima
        console.log(data);
        $('#setda').empty();
        $('#setda').html(data);
    }).fail(function (xhr, status, error) {
        // Tangani kesalahan jika ada
        console.error(xhr.responseText);
    });

    $.get('{{ route('api.kepalaopd') }}', function (data) {
        // Lakukan sesuatu dengan data yang diterima
        console.log(data);
        $('#kepalaopd').empty();
        $('#kepalaopd').html(data);
    }).fail(function (xhr, status, error) {
        // Tangani kesalahan jika ada
        console.error(xhr.responseText);
    });

    $.get('{{ route('api.camat') }}', function (data) {
        // Lakukan sesuatu dengan data yang diterima
        console.log(data);
        $('#camat').empty();
        $('#camat').html(data);
    }).fail(function (xhr, status, error) {
        // Tangani kesalahan jika ada
        console.error(xhr.responseText);
    });
</script>
@endpush