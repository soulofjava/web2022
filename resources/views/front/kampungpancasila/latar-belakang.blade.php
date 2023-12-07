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
                                <a href="#">Latar Belakang</a>
                            </h2>
                        </center>
                        <div class="entry-content">
                            <p style="text-align: justify;">
                                Latar Belakang penerapan Kampung Pancasila
                            </p>
                            <p style="text-align: justify;">
                                a. Menegakkan nilai-nilai Pancasila sebagi pedoman rakyat Indonesia dalam berbangsa dan
                                bernegara.
                            </p>
                            <p style="text-align: justify;">
                                b. Sebagai contoh penerapan nilai luhur Pancasila dalam kehidupan sehari-hari di
                                masyarakat.
                            </p>
                            <p style="text-align: justify;">
                                c. Sebagai contoh sikap toleransi antar umat beragama.
                            </p>
                            <p style="text-align: justify;">
                                d. Sebagai contoh hidup damai tanpa konflik meskipun terdapat perbedaan agama, suku, dan
                                ras.
                            </p>
                            <p style="text-align: justify;">
                                e. Adanya kerukunan dalam masyarakat di daerah yang dipilih sebagai Kampung Pancasila.
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