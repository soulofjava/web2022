@extends('front.arsha.layouts.app')
@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
                data-aos="fade-up" data-aos-delay="200">
                <h1>{{ $data_website->web_name }}</h1>
                <h2>{{ $data_website->web_description }}</h2>
                <div class="d-flex justify-content-center justify-content-lg-start">
                    <a href="#about" class="btn-get-started scrollto">Get Started</a>
                    <a href="https://www.youtube.com/watch?v=Zx7_Zmyyh5k" class="glightbox btn-watch-video"><i
                            class="bi bi-play-circle"></i><span>Watch Video</span></a>
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                <img src="{{ asset('assets/front/arsha/assets/img/hero-img.png') }}" class="img-fluid animated" alt="">
            </div>
        </div>
    </div>

</section>
<!-- End Hero -->

<main id="main">
    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Latest Post</h2>
            </div>

            <div class="row">
                @foreach($news as $n)
                <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="post-img">
                            <img src="{{ asset('storage/') }}/{{ $n->path}}" class="img-fluid" alt="">
                        </div>
                        <h4 style="text-align: center;"><a href="{{ url('/news-detail', $n->id) }}">{{ $n->title }}</a>
                        </h4>
                        <h6 style="text-align: center;">{{ \Carbon\Carbon::parse($n->date)->format('l') }}, {{
                            \Carbon\Carbon::parse( $n->date
                            )->toFormattedDateString() }}</h6>
                    </div>
                </div>
                @if($loop->iteration == 4)
                @break
                @endif
                @endforeach
            </div>

        </div>
    </section><!-- End Services Section -->
    <!-- keanehan yang terjadi jika div dibawah ini dihapus maka slideshow blank hitam -->
    <div class="skills-content">
    </div>
    <!-- end of aneh -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Gallery</h2>
                <p>Check our latest photo</p>
                <a href="{{ url('/photos') }}">Show All</a>
            </div>

            <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
                @foreach($gallery as $g)
                <div class="col-lg-3 col-md-6 portfolio-item filter-web">
                    <div class="portfolio-img"><img src="{{ asset('storage/') }}/{{ $g->path}}" class="img-fluid"
                            alt="">
                    </div>
                    <div class="portfolio-info">
                        <h4>{{ $g->description }}</h4>
                        <!-- <p>Web</p> -->
                        <a href="{{ asset('storage/') }}/{{ $g->path}}" data-gallery="portfolioGallery"
                            class="portfolio-lightbox preview-link" title="{{ $g->description }}"><i
                                class="bx bx-plus"></i></a>
                        <!-- <a href="portfolio-details.html" class="details-link" title="More Details"><i
                                class="bx bx-link"></i></a> -->
                    </div>
                </div>
                @if($loop->iteration == 8)
                @break
                @endif
                @endforeach
            </div>

        </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Contact</h2>
                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
                    consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia
                    fugiat sit
                    in iste officiis commodi quidem hic quas.</p>
            </div>

            <div class="row">

                <div class="col-lg-5 d-flex align-items-stretch">
                    <div class="info">
                        <div class="address">
                            <i class="bi bi-geo-alt"></i>
                            <h4>Location:</h4>
                            <p>{{ $data_website->address }}</p>
                        </div>

                        <div class="email">
                            <i class="bi bi-envelope"></i>
                            <h4>Email:</h4>
                            <p>{{ $data_website->email }}</p>
                        </div>

                        <div class="phone">
                            <i class="bi bi-phone"></i>
                            <h4>Call:</h4>
                            <p>{{ $data_website->phone }}</p>
                        </div>
                        <iframe src="https://maps.google.com/maps?q={{ $data_website->latitude }},{{
                            $data_website->longitude }}&z=14&output=embed" frameborder="0"
                            style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
                    </div>

                </div>

                <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
                    <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name">Your Name</label>
                                <input type="text" name="name" class="form-control" id="name" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="name">Your Email</label>
                                <input type="email" class="form-control" name="email" id="email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">Subject</label>
                            <input type="text" class="form-control" name="subject" id="subject" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Message</label>
                            <textarea class="form-control" name="message" rows="10" required></textarea>
                        </div>
                        <div class="my-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>
                        <div class="text-center"><button type="submit">Send Message</button></div>
                    </form>
                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->

</main>
<!-- End #main -->
@endsection
@push('after-script')
<script>
    $('.btn-playstream').click(function () {
        currentvalue = document.getElementById('audio_1').value;
        if (currentvalue == "on") {
            document.getElementById('audio_1').pause();
            document.getElementById("audio_1").value = "off";
            console.log("off!");
        } else {
            document.getElementById('audio_1').play();
            document.getElementById("audio_1").value = "on";
            console.log("on!");
        }
        // function playmusik() {
        //     var song = new Audio();
        //     song.src = "http://i.klikhost.com:8234/stream";
        //     // song.autoplay = true;
        //     song.play;
        // }
        // window.addEventListener("load", playmusik);
    });
</script>
@endpush