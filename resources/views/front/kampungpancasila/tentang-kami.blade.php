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
                                <a href="#">Tentang Kami</a>
                            </h2>
                        </center>
                        <div class="entry-content">
                            <p style="text-align: justify; text-indent: 0.5in;">
                                Kampung Pancasila adalah julukan untuk desa yang dijadikan contoh penerapan nilai-nilai
                                Pancasila
                                Mengutip buku <em>Prosiding Kongres Pancasila V</em> oleh Sudjito, program Kampung
                                Pancasila
                                dilakukan melalui tiga tahapan,
                                yakni interpretasi, internalisasi, dan aktualisasi Pancasila. Sedangkan, proses
                                pelaksanaannya mencakup bidang sosial,
                                budaya, dan ilmiah.
                            </p>
                            <p style="text-align: justify; text-indent: 0.5in;">
                                Sebuah kampung dinyatakan sebagai Kampung Pancasila dengan melihat tingkat toleransi
                                agama yang tinggi.
                                Hasil yang diharapkan dari adanya program Kampung Pancasila adalah meningkatnya
                                kecerdasan masyarakat. Proses
                                interpretasi, internalisasi, dan aktualisasi Pancasila akan membentuk pribadi yang
                                unggul.
                                Pengembangan budaya melalui Pancasila juga akan menghasilkan kecerdasan spiritual. Lalu,
                                pengembangan sosial akan
                                menghasilkan kecerdasan emosional, dan pengembangan ilmiah akan menghasilkan kecerdasan
                                intelektual.
                            </p>
                        </div>


                    </article><!-- End blog entry -->
                </div><!-- End blog entries list -->

            </div>

        </div>
    </section><!-- End Blog Single Section -->

</main>
@endsection
@push('after-script')
@endpush