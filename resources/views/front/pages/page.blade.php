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
                    @if($data->menu_name == 'Daftar Informasi Publik')
                    <div class="card">
                        <div class="card-body">
                            <x-jip />
                        </div>
                    </div>
                    @elseif($data->menu_name == 'Daftar Informasi yang Dikecualikan')
                    <div class="card">
                        <div class="card-body">
                            <x-dip />
                        </div>
                    </div>
                    @elseif($data->menu_name == 'Penyertaan Modal' || $data->menu_name == 'Investasi Usaha' ||
                    $data->menu_name == 'Informasi Kejadian Bencana' || $data->menu_name == 'Daftar Kejadian Bencana' ||
                    $data->menu_name == 'Pengumuman' || $data->menu_name == 'Informasi Gangguan' ||
                    $data->menu_name == 'Informasi Hoax' || $data->menu_name == 'Kajian dan Penelitian' ||
                    $data->menu_name == 'Pengawasan Internal' ||
                    $data->menu_name == 'Regulasi Informasi Publik' || $data->menu_name == 'Standar Operasional
                    Prosedur' ||
                    $data->menu_name == 'Laporan Layanan Informasi Daerah')
                    <div class="card">
                        <div class="card-body">
                            <x-data-table :kata="$data->menu_name" />
                        </div>
                    </div>
                    @endif()
                    @endif()

                    @if(isset($data->title))
                    <div class="card">
                        <div class="card-body">
                            {!! $data->description !!}
                        </div>
                    </div>
                    @endif

                    @if(isset($data->content))
                    <div class="card">
                        <div class="card-body">
                            {!! $data->content !!}
                        </div>
                    </div>
                    @endif

                </div>
            </div>

        </div>
    </section>
    <!-- End Blog Details Section -->

</main>
<!-- End #main -->
@endsection