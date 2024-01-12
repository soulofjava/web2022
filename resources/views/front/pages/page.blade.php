@extends('front.layouts.app')
@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center"
        style="background-image: url('assets/front/assets/img/breadcrumbs-bg.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

            <h2>{{ $data->menu_name }}</h2>
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
                    @elseif($data->title)
                    <div class="card">
                        <div class="card-body">
                            {!! $data->description !!}
                        </div>
                    </div>
                    @else
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