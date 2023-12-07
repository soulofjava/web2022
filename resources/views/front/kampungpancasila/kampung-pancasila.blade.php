@extends('front.flexstart.layouts.app')
@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <!-- <ol>
                <li><a href="index.html">Home</a></li>
                <li><a href="blog.html">Blog</a></li>
                <li>Blog Single</li>
            </ol> -->
            <!-- <h2>Blog Single</h2> -->

        </div>
    </section>
    <!-- End Breadcrumbs -->

    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-8 entries">
                    <article class="entry entry-single">
                        <div class="entry-img">
                            <img src="assets/img/blog/blog-1.jpg" alt="" class="img-fluid">
                        </div>
                        <center>
                            <h2 class="entry-title">
                                <a href="#">Kampung Pancasila Wonosobo</a>
                            </h2>
                        </center>
                        <div class="entry-content">
                            <ul>
                                <li>Desa Kapencar, Kertek</li>
                            </ul>
                            <p style="padding-left: 40px;">Desa Kapencar dijadikan desa Pancasila karena merupakan desa
                                yg sangat majemuk terdiri
                                dari berbagai macam agama tetapi sangat rukun dan damai Pancasila merupakan lambang
                                dasar Negara Indonesia sebagai
                                simbul bangsa yang di dalamnya memiliki arti dalam bingkai Bhineka Tunggal Ika.</p>
                            <ul>
                                <li>Desa Buntu, Kejajar</li>
                                <li>Desa Kadipaten, Selomerto</li>
                                <li>Desa Jonggolsari, Leksono</li>
                                <li>Kelurahan Jaraksari, Wonosobo</li>
                            </ul>
                        </div>
                    </article>
                    <!-- End blog entry -->
                </div>
                <!-- End blog entries list -->
            </div>
        </div>
    </section>
    <!-- End Blog Single Section -->
</main>
@endsection
@push('after-script')
@endpush