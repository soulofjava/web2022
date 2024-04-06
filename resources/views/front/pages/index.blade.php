@extends('front.layouts.app')
@section('content')
<!-- Start #main -->

<main id="main">
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero">

        <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
            @foreach(App\Models\News::withAnyTag(['berita'])->with('gambarmuka')->where('highlight', '1')->latest('date')->take(10)->get() as $hl)

            @if ($loop->first)
            @if($hl->gambarmuka)
            @if(Str::contains($hl->gambarmuka, 'https'))
            <div class="carousel-item active" style="background-image: url('{{ $hl->gambarmuka->path }}')">
                @else
                <div class="carousel-item active"
                    style="background-image: url('{{ route('helper.show-picture', ['path' => $hl->gambarmuka->path]) }}')">
                    @endif
                    @else
                    <div class="carousel-item active"
                        style="background-image: url('{{ asset('img/soulofjava.jpg') }}')">
                        @endif
                        <div class="info d-flex align-items-center">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-6 text-center">
                                        <h2 data-aos="fade-down">{{ $hl->title }}</h2>
                                        <p data-aos="fade-up"></p>
                                        <a data-aos="fade-up" data-aos-delay="200"
                                            href="{{ url('/news-detail', $hl->slug) }}" class="btn-get-started">Read
                                            More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    @if($hl->gambarmuka)
                    @if(Str::contains($hl->gambarmuka, 'https'))
                    <div class="carousel-item" style="background-image: url('{{ $hl->gambarmuka->path }}')">
                        @else
                        <div class="carousel-item"
                            style="background-image: url('{{ route('helper.show-picture', ['path' => $hl->gambarmuka->path]) }}')">
                            @endif
                            @else
                            <div class="carousel-item"
                                style="background-image: url('{{ asset('img/soulofjava.jpg') }}')">
                                @endif
                                <div class="info d-flex align-items-center">
                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-6 text-center">
                                                <h2 data-aos="fade-down">{{ $hl->title }}</h2>
                                                <p data-aos="fade-up"></p>
                                                <a data-aos="fade-up" data-aos-delay="200"
                                                    href="{{ url('/news-detail', $hl->slug) }}"
                                                    class="btn-get-started">Read
                                                    More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif

                            <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
                            </a>

                            <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
                            </a>
                            @endforeach
                        </div>

    </section>
    <!-- End Hero Section -->

    <!-- ======= Recent Blog Posts Section ======= -->
    <section id="recent-blog-posts" class="recent-blog-posts">
        <div class="container" data-aos="fade-up">
            <div class=" section-header">
                <h2>Recent Posts</h2>
            </div>

            <div class="row gy-5">

                @foreach($news as $n)
                <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="post-item position-relative h-100">

                        <div class="post-img position-relative overflow-hidden">
                            @if($n->gambarmuka)
                            @if(Str::contains($n->gambarmuka, 'https'))
                            <img src="{{  $n->gambarmuka->path }}" class="img-fluid"
                                alt="{{ $n->gambarmuka->file_name }}">
                            @else
                            <img src="{{ route('helper.show-picture', ['path' => $n->gambarmuka->path]) }}"
                                class="img-fluid" alt="{{ $n->gambarmuka->file_name }}">
                            @endif
                            @else
                            <img src="{{ asset('img/soulofjava.jpg') }}" class="img-fluid" alt="soul of java">
                            @endif
                            <span class="post-date">{{ \Carbon\Carbon::parse($n->date)->format('l') }}, {{
                                \Carbon\Carbon::parse( $n->date
                                )->toFormattedDateString() }}</span>
                        </div>

                        <div class="post-content d-flex flex-column">

                            <h3 class="post-title" style="text-align: justify;">{{ $n->title }}</h3>

                            <div class="meta d-flex align-items-center">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-person"></i> <span class="ps-2">{{ $n->uploader->name ?? 'Admin'
                                        }}</span>
                                </div>
                                <span class="px-3 text-black-50">/</span>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-eye"></i> <span class="ps-2">{{ views($n)->count(); }}</span>
                                </div>
                            </div>

                            <hr>

                            <a href="{{ url('/news-detail', $n->slug) }}" class="readmore stretched-link"><span>Read
                                    More</span><i class="bi bi-arrow-right"></i></a>

                        </div>

                    </div>
                </div>
                @endforeach

            </div>

        </div>
    </section>
    <!-- End Recent Blog Posts Section -->

    <!-- ======= Testimonials Section ======= -->
    @if(App\Models\Testimonial::count() >= 1)
    <section id="testimonials" class="testimonials section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Testimonials</h2>
            </div>

            <div class="slides-2 swiper">
                <div class="swiper-wrapper">

                    @foreach(App\Models\Testimonial::take(5)->get() as $testimonial)
                    <div class="swiper-slide">
                        <div class="testimonial-wrap">
                            <div class="testimonial-item">
                                @if($testimonial->lokasi_foto)
                                <img class="testimonial-img"
                                    src="{{ route('helper.show-picture', ['path' => $testimonial->lokasi_foto]) }}"
                                    alt="profile picture" style="height: 90px; width: 90px;">
                                @else
                                <img src="{{ asset('assets/back/sneat/assets/img/avatars/1.png') }}" alt="user-avatar"
                                    class="testimonial-img" style="height: 90px; width: 90px;">
                                @endif
                                <h3>{{ $testimonial->nama }}</h3>
                                <h4>{{ $testimonial->jabatan }}</h4>
                                <!-- <div class="stars"> -->
                                <!-- <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i> -->
                                <!-- </div> -->
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    {{ strip_tags($testimonial->pesan) }}
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section>
    <!-- End Testimonials Section -->
    @endif

    <!-- ======= Get Started Section ======= -->
    <!-- <section id="get-started" class="get-started section-bg">
        <div class="container">

            <div class="row justify-content-between gy-4">

                <div class="col-lg-6 d-flex align-items-center" data-aos="fade-up">
                    <div class="content">
                        <h3>Minus hic non reiciendis ea possimus at quia.</h3>
                        <p>Rem id rerum. Debitis deserunt quidem delectus expedita ducimus dolor. Aut iusto ipsa.
                            Eos ipsum nobis
                            ipsa soluta itaque perspiciatis fuga ipsum perspiciatis. Eum amet fugiat totam nisi
                            possimus ut delectus
                            dicta.
                        <p>Aliquam velit deserunt autem. Inventore et saepe. Tenetur suscipit eligendi labore culpa
                            eos. Deserunt
                            porro magni qui necessitatibus dolorem at animi cupiditate.</p>
                    </div>
                </div>

                <div class="col-lg-5" data-aos="fade">
                    <form action="forms/quote.php" method="post" class="php-email-form">
                        <h3>Get a quote</h3>
                        <p>Vel nobis odio laboriosam et hic voluptatem. Inventore vitae totam. Rerum repellendus
                            enim linead sero
                            park flows.</p>
                        <div class="row gy-3">

                            <div class="col-md-12">
                                <input type="text" name="name" class="form-control" placeholder="Name" required>
                            </div>

                            <div class="col-md-12 ">
                                <input type="email" class="form-control" name="email" placeholder="Email" required>
                            </div>

                            <div class="col-md-12">
                                <input type="text" class="form-control" name="phone" placeholder="Phone" required>
                            </div>

                            <div class="col-md-12">
                                <textarea class="form-control" name="message" rows="6" placeholder="Message"
                                    required></textarea>
                            </div>

                            <div class="col-md-12 text-center">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your quote request has been sent successfully. Thank you!
                                </div>

                                <button type="submit">Get a quote</button>
                            </div>

                        </div>
                    </form>
                </div>

            </div>

        </div>
    </section> -->
    <!-- End Get Started Section -->

    <!-- ======= Constructions Section ======= -->
    <!-- <section id="constructions" class="constructions">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Constructions</h2>
                <p>Nulla dolorum nulla nesciunt rerum facere sed ut inventore quam porro nihil id ratione ea sunt
                    quis dolorem
                    dolore earum</p>
            </div>

            <div class="row gy-4">

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="card-item">
                        <div class="row">
                            <div class="col-xl-5">
                                <div class="card-bg"
                                    style="background-image: url(assets/front/assets/img/constructions-1.jpg);">
                                </div>
                            </div>
                            <div class="col-xl-7 d-flex align-items-center">
                                <div class="card-body">
                                    <h4 class="card-title">Eligendi omnis sunt veritatis.</h4>
                                    <p>Fuga in dolorum et iste et culpa. Commodi possimus nesciunt modi voluptatem
                                        placeat deleniti
                                        adipisci. Cum delectus doloribus non veritatis. Officia temporibus illo
                                        magnam. Dolor eos et.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="card-item">
                        <div class="row">
                            <div class="col-xl-5">
                                <div class="card-bg"
                                    style="background-image: url(assets/front/assets/img/constructions-2.jpg);">
                                </div>
                            </div>
                            <div class="col-xl-7 d-flex align-items-center">
                                <div class="card-body">
                                    <h4 class="card-title">Possimus ut sed velit assumenda</h4>
                                    <p>Sunt deserunt maiores voluptatem autem est rerum perferendis rerum
                                        blanditiis. Est laboriosam qui
                                        iste numquam laboriosam voluptatem architecto. Est laudantium sunt at quas
                                        aut hic. Eum
                                        dignissimos.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="card-item">
                        <div class="row">
                            <div class="col-xl-5">
                                <div class="card-bg"
                                    style="background-image: url(assets/front/assets/img/constructions-3.jpg);">
                                </div>
                            </div>
                            <div class="col-xl-7 d-flex align-items-center">
                                <div class="card-body">
                                    <h4 class="card-title">Error beatae dolor inventore aut</h4>
                                    <p>Dicta porro nobis. Velit cum in. Nesciunt dignissimos enim molestiae facilis
                                        numquam quae quaerat
                                        ipsam omnis. Neque debitis ipsum at architecto officia laboriosam odit. Ut
                                        sunt temporibus nulla
                                        culpa.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="card-item">
                        <div class="row">
                            <div class="col-xl-5">
                                <div class="card-bg"
                                    style="background-image: url(assets/front/assets/img/constructions-4.jpg);">
                                </div>
                            </div>
                            <div class="col-xl-7 d-flex align-items-center">
                                <div class="card-body">
                                    <h4 class="card-title">Expedita voluptas ut ut nesciunt</h4>
                                    <p>Aut est quidem doloremque voluptatem magnam quis excepturi vero quia. Eum eos
                                        doloremque
                                        architecto illo at beatae dolore. Fugiat suscipit et sint ratione dolores.
                                        Aut aliquid ea dolores
                                        libero nobis.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section> -->
    <!-- End Constructions Section -->

    <!-- ======= Alt Services Section ======= -->
    <!-- <section id="alt-services" class="alt-services">
        <div class="container" data-aos="fade-up">

            <div class="row justify-content-around gy-4">
                <div class="col-lg-6 img-bg" style="background-image: url(assets/front/assets/img/alt-services.jpg);"
                    data-aos="zoom-in" data-aos-delay="100"></div>

                <div class="col-lg-5 d-flex flex-column justify-content-center">
                    <h3>Enim quis est voluptatibus aliquid consequatur fugiat</h3>
                    <p>Esse voluptas cumque vel exercitationem. Reiciendis est hic accusamus. Non ipsam et sed
                        minima temporibus
                        laudantium. Soluta voluptate sed facere corporis dolores excepturi</p>

                    <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="100">
                        <i class="bi bi-easel flex-shrink-0"></i>
                        <div>
                            <h4><a href="" class="stretched-link">Lorem Ipsum</a></h4>
                            <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint
                                occaecati cupiditate
                                non provident</p>
                        </div>
                    </div>

                    <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="200">
                        <i class="bi bi-patch-check flex-shrink-0"></i>
                        <div>
                            <h4><a href="" class="stretched-link">Nemo Enim</a></h4>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                                voluptatum
                                deleniti atque</p>
                        </div>
                    </div>

                    <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="300">
                        <i class="bi bi-brightness-high flex-shrink-0"></i>
                        <div>
                            <h4><a href="" class="stretched-link">Dine Pad</a></h4>
                            <p>Explicabo est voluptatum asperiores consequatur magnam. Et veritatis odit. Sunt aut
                                deserunt minus
                                aut eligendi omnis</p>
                        </div>
                    </div>

                    <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="400">
                        <i class="bi bi-brightness-high flex-shrink-0"></i>
                        <div>
                            <h4><a href="" class="stretched-link">Tride clov</a></h4>
                            <p>Est voluptatem labore deleniti quis a delectus et. Saepe dolorem libero sit non
                                aspernatur odit amet.
                                Et eligendi</p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section> -->
    <!-- End Alt Services Section -->

    <!-- ======= Features Section ======= -->
    <!-- <section id="features" class="features section-bg">
        <div class="container" data-aos="fade-up">

            <ul class="nav nav-tabs row  g-2 d-flex">

                <li class="nav-item col-3">
                    <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#tab-1">
                        <h4>Modisit</h4>
                    </a>
                </li>

                <li class="nav-item col-3">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-2">
                        <h4>Praesenti</h4>
                    </a>

                <li class="nav-item col-3">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-3">
                        <h4>Explica</h4>
                    </a>
                </li>

                <li class="nav-item col-3">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-4">
                        <h4>Nostrum</h4>
                    </a>
                </li>

            </ul>

            <div class="tab-content">

                <div class="tab-pane active show" id="tab-1">
                    <div class="row">
                        <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center"
                            data-aos="fade-up" data-aos-delay="100">
                            <h3>Voluptatem dignissimos provident</h3>
                            <p class="fst-italic">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et
                                dolore
                                magna aliqua.
                            </p>
                            <ul>
                                <li><i class="bi bi-check2-all"></i> Ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat.</li>
                                <li><i class="bi bi-check2-all"></i> Duis aute irure dolor in reprehenderit in
                                    voluptate velit.</li>
                                <li><i class="bi bi-check2-all"></i> Ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat. Duis
                                    aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro
                                    dolore eu fugiat nulla
                                    pariatur.</li>
                            </ul>
                        </div>
                        <div class="col-lg-6 order-1 order-lg-2 text-center" data-aos="fade-up" data-aos-delay="200">
                            <img src="{{ asset('assets/front/assets/img/features-1.jpg') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="tab-2">
                    <div class="row">
                        <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                            <h3>Neque exercitationem debitis</h3>
                            <p class="fst-italic">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et
                                dolore
                                magna aliqua.
                            </p>
                            <ul>
                                <li><i class="bi bi-check2-all"></i> Ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat.</li>
                                <li><i class="bi bi-check2-all"></i> Duis aute irure dolor in reprehenderit in
                                    voluptate velit.</li>
                                <li><i class="bi bi-check2-all"></i> Provident mollitia neque rerum asperiores
                                    dolores quos qui a.
                                    Ipsum neque dolor voluptate nisi sed.</li>
                                <li><i class="bi bi-check2-all"></i> Ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat. Duis
                                    aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro
                                    dolore eu fugiat nulla
                                    pariatur.</li>
                            </ul>
                        </div>
                        <div class="col-lg-6 order-1 order-lg-2 text-center">
                            <img src="{{ asset('assets/front/assets/img/features-2.jpg') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="tab-3">
                    <div class="row">
                        <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                            <h3>Voluptatibus commodi accusamu</h3>
                            <ul>
                                <li><i class="bi bi-check2-all"></i> Ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat.</li>
                                <li><i class="bi bi-check2-all"></i> Duis aute irure dolor in reprehenderit in
                                    voluptate velit.</li>
                                <li><i class="bi bi-check2-all"></i> Provident mollitia neque rerum asperiores
                                    dolores quos qui a.
                                    Ipsum neque dolor voluptate nisi sed.</li>
                            </ul>
                            <p class="fst-italic">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et
                                dolore
                                magna aliqua.
                            </p>
                        </div>
                        <div class="col-lg-6 order-1 order-lg-2 text-center">
                            <img src="{{ asset('assets/front/assets/img/features-3.jpg') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="tab-4">
                    <div class="row">
                        <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                            <h3>Omnis fugiat ea explicabo sunt</h3>
                            <p class="fst-italic">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et
                                dolore
                                magna aliqua.
                            </p>
                            <ul>
                                <li><i class="bi bi-check2-all"></i> Ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat.</li>
                                <li><i class="bi bi-check2-all"></i> Duis aute irure dolor in reprehenderit in
                                    voluptate velit.</li>
                                <li><i class="bi bi-check2-all"></i> Ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat. Duis
                                    aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro
                                    dolore eu fugiat nulla
                                    pariatur.</li>
                            </ul>
                        </div>
                        <div class="col-lg-6 order-1 order-lg-2 text-center">
                            <img src="{{ asset('assets/front/assets/img/features-4.jpg') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section> -->
    <!-- End Features Section -->

    <!-- ======= Our Projects Section ======= -->
    <!-- <section id="projects" class="projects">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Our Projects</h2>
                <p>Consequatur libero assumenda est voluptatem est quidem illum et officia imilique qui vel
                    architecto
                    accusamus fugit aut qui distinctio</p>
            </div>

            <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
                data-portfolio-sort="original-order">

                <ul class="portfolio-flters" data-aos="fade-up" data-aos-delay="100">
                    <li data-filter="*" class="filter-active">All</li>
                    <li data-filter=".filter-remodeling">Remodeling</li>
                    <li data-filter=".filter-construction">Construction</li>
                    <li data-filter=".filter-repairs">Repairs</li>
                    <li data-filter=".filter-design">Design</li>
                </ul>

                <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">

                    <div class="col-lg-4 col-md-6 portfolio-item filter-remodeling">
                        <div class="portfolio-content h-100">
                            <img src="{{ asset('assets/front/assets/img/projects/remodeling-1.jpg') }}"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Remodeling 1</h4>
                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                <a href="{{ asset('assets/front/assets/img/projects/remodeling-1.jpg') }}"
                                    title="Remodeling 1" data-gallery="portfolio-gallery-remodeling"
                                    class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                <a href="project-details.html" title="More Details" class="details-link"><i
                                        class="bi bi-link-45deg"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-construction">
                        <div class="portfolio-content h-100">
                            <img src="{{ asset('assets/front/assets/img/projects/construction-1.jpg') }}"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Construction 1</h4>
                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                <a href="{{ asset('assets/front/assets/img/projects/construction-1.jpg') }}"
                                    title="Construction 1" data-gallery="portfolio-gallery-construction"
                                    class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                <a href="project-details.html" title="More Details" class="details-link"><i
                                        class="bi bi-link-45deg"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-repairs">
                        <div class="portfolio-content h-100">
                            <img src="{{ asset('assets/front/assets/img/projects/repairs-1.jpg') }}" class="img-fluid"
                                alt="">
                            <div class="portfolio-info">
                                <h4>Repairs 1</h4>
                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                <a href="{{ asset('assets/front/assets/img/projects/repairs-1.jpg') }}"
                                    title="Repairs 1" data-gallery="portfolio-gallery-repairs"
                                    class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                <a href="project-details.html" title="More Details" class="details-link"><i
                                        class="bi bi-link-45deg"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-design">
                        <div class="portfolio-content h-100">
                            <img src="{{ asset('assets/front/assets/img/projects/design-1.jpg') }}" class="img-fluid"
                                alt="">
                            <div class="portfolio-info">
                                <h4>Design 1</h4>
                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                <a href="{{ asset('assets/front/assets/img/projects/design-1.jpg') }}" title="Repairs 1"
                                    data-gallery="portfolio-gallery-book" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                                <a href="project-details.html" title="More Details" class="details-link"><i
                                        class="bi bi-link-45deg"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-remodeling">
                        <div class="portfolio-content h-100">
                            <img src="{{ asset('assets/front/assets/img/projects/remodeling-2.jpg') }}"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Remodeling 2</h4>
                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                <a href="{{ asset('assets/front/assets/img/projects/remodeling-2.jpg') }}"
                                    title="Remodeling 2" data-gallery="portfolio-gallery-remodeling"
                                    class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                <a href="project-details.html" title="More Details" class="details-link"><i
                                        class="bi bi-link-45deg"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-construction">
                        <div class="portfolio-content h-100">
                            <img src="{{ asset('assets/front/assets/img/projects/construction-2.jpg') }}"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Construction 2</h4>
                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                <a href="{{ asset('assets/front/assets/img/projects/construction-2.jpg') }}"
                                    title="Construction 2" data-gallery="portfolio-gallery-construction"
                                    class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                <a href="project-details.html" title="More Details" class="details-link"><i
                                        class="bi bi-link-45deg"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-repairs">
                        <div class="portfolio-content h-100">
                            <img src="{{ asset('assets/front/assets/img/projects/repairs-2.jpg') }}" class="img-fluid"
                                alt="">
                            <div class="portfolio-info">
                                <h4>Repairs 2</h4>
                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                <a href="{{ asset('assets/front/assets/img/projects/repairs-2.jpg') }}"
                                    title="Repairs 2" data-gallery="portfolio-gallery-repairs"
                                    class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                <a href="project-details.html" title="More Details" class="details-link"><i
                                        class="bi bi-link-45deg"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-design">
                        <div class="portfolio-content h-100">
                            <img src="{{ asset('assets/front/assets/img/projects/design-2.jpg') }}" class="img-fluid"
                                alt="">
                            <div class="portfolio-info">
                                <h4>Design 2</h4>
                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                <a href="{{ asset('assets/front/assets/img/projects/design-2.jpg') }}" title="Repairs 2"
                                    data-gallery="portfolio-gallery-book" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                                <a href="project-details.html" title="More Details" class="details-link"><i
                                        class="bi bi-link-45deg"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-remodeling">
                        <div class="portfolio-content h-100">
                            <img src="{{ asset('assets/front/assets/img/projects/remodeling-3.jpg') }}"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Remodeling 3</h4>
                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                <a href="{{ asset('assets/front/assets/img/projects/remodeling-3.jpg') }}"
                                    title="Remodeling 3" data-gallery="portfolio-gallery-remodeling"
                                    class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                <a href="project-details.html" title="More Details" class="details-link"><i
                                        class="bi bi-link-45deg"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-construction">
                        <div class="portfolio-content h-100">
                            <img src="{{ asset('assets/front/assets/img/projects/construction-3.jpg') }}"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Construction 3</h4>
                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                <a href="{{ asset('assets/front/assets/img/projects/construction-3.jpg') }}"
                                    title="Construction 3" data-gallery="portfolio-gallery-construction"
                                    class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                <a href="project-details.html" title="More Details" class="details-link"><i
                                        class="bi bi-link-45deg"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-repairs">
                        <div class="portfolio-content h-100">
                            <img src="{{ asset('assets/front/assets/img/projects/repairs-3.jpg') }}" class="img-fluid"
                                alt="">
                            <div class="portfolio-info">
                                <h4>Repairs 3</h4>
                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                <a href="{{ asset('assets/front/assets/img/projects/repairs-3.jpg') }}"
                                    title="Repairs 2" data-gallery="portfolio-gallery-repairs"
                                    class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                <a href="project-details.html" title="More Details" class="details-link"><i
                                        class="bi bi-link-45deg"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-design">
                        <div class="portfolio-content h-100">
                            <img src="{{ asset('assets/front/assets/img/projects/design-3.jpg') }}" class="img-fluid"
                                alt="">
                            <div class="portfolio-info">
                                <h4>Design 3</h4>
                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                <a href="{{ asset('assets/front/assets/img/projects/design-3.jpg') }}" title="Repairs 3"
                                    data-gallery="portfolio-gallery-book" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                                <a href="project-details.html" title="More Details" class="details-link"><i
                                        class="bi bi-link-45deg"></i></a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section> -->
    <!-- End Our Projects Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <div class="d-flex justify-content-center mb-3">
                    <a href="https://ayopromo.com">
                        <img alt="Ayo Promo"
                            src="https://ayopromo.com/show-picture?path=gambar%2FZPAEK8CSkauimapGI5ueJ0iHzsPGqZVYS4Sv0f7H.png"
                            style="width: 500px;">
                    </a>
                </div>
            </div>

            <div class="row gy-4">

                <div class="d-flex justify-content-around mt-3"">
        		@for ($index = 0; $index < 6; $index++)
        			<div>
        				<div id=" iklan" title="Ayo lihat Produk ini">
                    <a href="" target="_blank" id="link-iklan{{  $index }}">
                        <img src="pic_trulli.jpg" id="gambar-iklan{{  $index }}" alt="ayopromo.com" style="
                            border: 1px solid #ddd;
                            border-radius: 4px;
                            padding: 5px;
                            width: 150px;
                            height: 150px;
                            ">
                    </a>
                </div>
            </div>
            @endfor
        </div>

        </div>

        </div>
    </section>
    <!-- End Services Section -->

</main>
<!-- End #main -->
@endsection
@push('after-script')
<script>
    $(document).ready(function () {
        myTimer();
    });

    setInterval(myTimer, 5000);

    function myTimer() {
        @for ($index = 0; $index < 6; $index++)

            fetch("https://ayopromo.com/api/iklan")
                .then(function (response) {
                    return response.json();
                })
                .then(function (data) {
                    var image = document.getElementById('gambar-iklan{{ $index }}');
                    var link = document.getElementById('link-iklan{{ $index }}');
                    // var responses = response.json();
                    // console.log(data.gambar);
                    image.src = data.gambar;
                    link.href = data.link;
                })
                .catch(function (error) {
                    // console.log(error);
                });

        @endfor
    }
</script>
@endpush
