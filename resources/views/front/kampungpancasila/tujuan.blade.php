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
                                <a href="#">Tujuan</a>
                            </h2>
                        </center>
                        <div class="entry-content">
                            <p style="text-align: justify;">
                                a. Untuk menciptakan suatu media pembelajaran Pancasila bagi masyarakat luas.
                            </p>
                            <p style="text-align: justify;">
                                b. Untuk semakin menumbuhkan kerukunan antar masyarakat di Pancasila, karena penduduknya
                                beragam.
                            </p>
                            <p style="text-align: justify;">
                                c. Untuk menanamkan nilai-nilai Bhinneka Tunggal Ika.
                            </p>
                            <p style="text-align: justify;">
                                d. Untuk menanamkan pemahaman bahwa seluruh warga negara Indonesia wajib menerapkan
                                sila-sila Pancasila.
                            </p>
                            <p style="text-align: justify;">
                                e. Untuk menanamkan pemahaman bahwa seluruh warga negara Indonesia wajib memberikan
                                penghormatan dan penghargaan yang
                                setinggi-tingginya kepada para pemimpin bangsa yang telah berhasil menggali dan
                                merumuskan Pancasila sebagai dasar
                                negara.
                            </p>
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