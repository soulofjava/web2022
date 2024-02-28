@extends('front.buildco.layouts.app')
@section('content')
<!-- Start Banner 
    ============================================= -->
<div class="banner-area inc-top-heading">
    <div id="bootcarousel" class="carousel slide carousel-fade animate_text" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner text-light carousel-zoom">
            @foreach(App\Models\News::latest('date')->take(3)->get() as $hl)
            <div class="item {{ $loop->first ? 'active' : '' }}">
                @if($hl->attachment)
                <div class="slider-thumb bg-cover" style="background-image: url('{{ $hl->attachment }}');">
                </div>
                @elseif($hl->gambarmuka)
                <div class="slider-thumb bg-cover"
                    style="background-image: {{ route('helper.show-picture', ['path' => $hl->gambarmuka->path]) }};">
                </div>
                @else
                <div class="slider-thumb bg-cover" style="background-image: url('{{ asset('img/soulofjava.jpg') }}');">
                </div>
                @endif
                <div class="box-table shadow dark">
                    <div class="box-cell">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="content">
                                        <!-- <h3 data-animation="animated slideInRight">Let's grow together</h3> -->
                                        <h1 data-animation="animated slideInLeft">{{ $hl->title }}</h1>
                                        <a data-animation="animated slideInUp" class="btn btn-theme effect btn-md"
                                            href="{{ url('/news-detail', $hl->slug) }}">Lebih Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- End Wrapper for slides -->

        <!-- Left and right controls -->
        <a class="left carousel-control shadow fixed" href="#bootcarousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control shadow fixed" href="#bootcarousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<!-- End Banner -->

<!-- Start Services
    ============================================= -->
<div class="services-area carousel-shadow flex-less inc-thumb default-padding">
    <div class="container">
        <!-- <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="site-heading text-center">
                    <h4>What we do</h4>
                    <h2>Our Services</h2>
                    <p>
                        While mirth large of on front. Ye he greater related adapted proceed entered an. Through it
                        examine express promise no. Past add size game cold girl off how old
                    </p>
                </div>
            </div>
        </div> -->
        <div class="row">
            <div class="col-md-12">
                <div class="services-items services-carousel-3-col owl-carousel owl-theme text-center inc-overlay">
                    <!-- Single Item -->
                    <div class="item">
                        <div class="thumbs overlay">
                            <img src="{{ route('helper.show-picture', ['path' => 'wp-content/uploads/2023/09/Logo-sipd-scaled.jpg']) }}"
                                alt="Thumb">
                            <div class="info">
                                <!-- <h4>Oil and Gass Energy</h4>
                                <p>
                                    Depend repair met before man admire see and. An he observe be it covered delight
                                    hastily message.
                                </p> -->
                                <a href="https://sipd-ri.kemendagri.go.id/auth/login" target="_blank">Lebih Lanjut</a>
                            </div>
                        </div>
                        <!-- <div class="info">
                            <div class="content">
                                <div class="top-info">
                                    <h4><a href="#">Oil and Gass Energy</a></h4>
                                </div>
                                <div class="bottom">
                                    <i class="flaticon-valve"></i>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <!-- End Single Item -->
                    <!-- Single Item -->
                    <div class="item">
                        <div class="thumbs overlay">
                            <img src="{{ route('helper.show-picture', ['path' => 'wp-content/uploads/2023/09/Logo-gardu-scaled.jpg']) }}"
                                alt="Thumb">
                            <div class="info">
                                <!-- <h4>Agriculture Automation</h4>
                                <p>
                                    Depend repair met before man admire see and. An he observe be it covered delight
                                    hastily message.
                                </p> -->
                                <a href="https://gardu.wonosobokab.go.id/" target="_blank">Lebih Lanjut</a>
                            </div>
                        </div>
                        <!-- <div class="info">
                            <div class="content">
                                <div class="top-info">
                                    <h4><a href="#">Agriculture Automation</a></h4>
                                </div>
                                <div class="bottom">
                                    <i class="flaticon-tractor-1"></i>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <!-- End Single Item -->
                    <!-- Single Item -->
                    <div class="item">
                        <div class="thumbs overlay">
                            <img src="{{ route('helper.show-picture', ['path' => 'wp-content/uploads/2023/09/Logo-simake-scaled.jpg']) }}"
                                alt="Thumb">
                            <div class="info">
                                <!-- <h4>Civil Engineering</h4>
                                <p>
                                    Depend repair met before man admire see and. An he observe be it covered delight
                                    hastily message.
                                </p> -->
                                <a href="https://www.simnangkis.wonosobokab.go.id/" target="_blank">Lebih Lanjut</a>
                            </div>
                        </div>
                        <!-- <div class="info">
                            <div class="content">
                                <div class="top-info">
                                    <h4><a href="#">Civil Engineering</a></h4>
                                </div>
                                <div class="bottom">
                                    <i class="flaticon-mayan-pyramid"></i>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <!-- End Single Item -->
                    <!-- Single Item -->
                    <div class="item">
                        <div class="thumbs overlay">
                            <img src="{{ route('helper.show-picture', ['path' => 'wp-content/uploads/2023/09/Logo-SKM-scaled.jpg']) }}"
                                alt="Thumb">
                            <div class="info">
                                <!-- <h4>Bridge Construction</h4>
                                <p>
                                    Depend repair met before man admire see and. An he observe be it covered delight
                                    hastily message.
                                </p> -->
                                <a href="https://www.skm.wonosobokab.go.id/">Lebih Lanjut</a>
                            </div>
                        </div>
                        <!-- <div class="info">
                            <div class="content">
                                <div class="top-info">
                                    <h4><a href="#" target="_blank">Bridge Construction</a></h4>
                                </div>
                                <div class="bottom">
                                    <i class="flaticon-bridge-2"></i>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <!-- End Single Item -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Services Area -->

<!-- Start Our About
    ============================================= -->
<!-- <div class="about-area default-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-6 info-content">
                <h1>We offer product design, <strong>manufacturing and engineering</strong> management services.
                </h1>
                <p>
                    Seven world think timed while her. Spoil large oh he rooms on since an. Am up unwilling
                    eagerness perceived incommode. Perceived end knowledge certainly day sweetness why cordially.
                    Ask quick six seven offer see among. Handsome met debating sir dwelling age material. As style
                    lived he worse dried. Offered related so visitor we private removed. Moderate do subjects to
                    distance. Conviction up partiality as delightful is discovered. Yet jennings resolved disposed.
                </p>
                <div class="author">
                    <div class="thumb">
                        <img src="{{ asset('assets/front/buildco/img/800x800.png') }}" alt="Thumb">
                    </div>
                    <div class="info">
                        <h4>Ahmed Kamal - <strong>Chairman</strong></h4>
                        <img src="{{ asset('assets/front/buildco/img/signature.png') }}" alt="signature">
                    </div>
                </div>
            </div>
            <div class="col-md-6 right-content services">
                <div class="row">
                    <div class="content-box">
                        <div class="center">
                            <div class="col-md-6 col-sm-6 equal-height">
                                <div class="item">
                                    <i class="flaticon-equipment"></i>
                                    <h4>Modern Equipments</h4>
                                    <p>
                                        Wisdom new and valley answer. Contented it so is discourse recommend.
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 equal-height">
                                <div class="item">
                                    <i class="flaticon-engineer-1"></i>
                                    <h4>Expert Engineers</h4>
                                    <p>
                                        Wisdom new and valley answer. Contented it so is discourse recommend.
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 equal-height">
                                <div class="item">
                                    <i class="flaticon-factory"></i>
                                    <h4>Efficient Factories</h4>
                                    <p>
                                        Wisdom new and valley answer. Contented it so is discourse recommend.
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 equal-height">
                                <div class="item">
                                    <i class="flaticon-helmet"></i>
                                    <h4>Safety Commitment</h4>
                                    <p>
                                        Wisdom new and valley answer. Contented it so is discourse recommend.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- End Our About -->

<!-- Start Why Chose Us
    ============================================= -->
<!-- <div class="choseus-area about-area bg-gray">
    <div class="container-full">
        <div class="row">
            <div class="content-box">
                <div class="col-md-6 thumb bg-cover"
                    style="background-image: url({{ asset('assets/front/buildco/img/2440x1578.png') }});"></div>
                <div class="col-md-6 info">
                    <h4>Why Choose Us</h4>
                    <h2>The Best Solution for all Industrial & Factory Businesses</h2>
                    <p>
                        Dependent certainty off discovery him his tolerably offending. Ham for attention remainder
                        sometimes additions recommend fat our. Direction has strangers now believing. Respect
                        enjoyed gay far exposed parlors towards. Enjoyment use tolerably dependent listening men. No
                        peculiar in handsome together unlocked do by. Article concern joy anxious did picture sir
                        her. Although desirous not recurred disposed off shy you numerous securing.
                    </p>
                    <ul>
                        <li>Compatitive Price</li>
                        <li>Quality Product</li>
                        <li>Quick Delivery</li>
                        <li>High-Tech Manufacturers</li>
                    </ul>
                    <div class="achivement-items">
                        <div class="item">
                            <div class="fun-fact">
                                <div data-speed="3000" data-to="14" class="timer">14</div>
                                <span class="medium">Years of Experiance</span>
                            </div>
                        </div>
                        <div class="item">
                            <div class="fun-fact">
                                <div data-speed="3000" data-to="89" class="timer">89</div>
                                <span class="medium">Professional agents</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- End Why Chose Us -->

<!-- Start Portfolio 
    ============================================= -->
<!-- <div class="portfolio-area info-less default-padding bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="site-heading text-center">
                    <h4>Recent Work</h4>
                    <h2>Complete Cases</h2>
                    <p>
                        While mirth large of on front. Ye he greater related adapted proceed entered an. Through it
                        examine express promise no. Past add size game cold girl off how old
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="mix-item-menu">
                    <button class="active" data-filter="*">All</button>
                    <button data-filter=".industry">Industry</button>
                    <button data-filter=".renovation">Renovation</button>
                    <button data-filter=".petroleum">Petroleum</button>
                    <button data-filter=".metarials">Metarials</button>
                    <button data-filter=".construction">Construction</button>
                </div>
<div class="row magnific-mix-gallery masonary text-left">
    <div id="portfolio-grid" class="portfolio-items col-3">
        <div class="portfolio-items">
            <div class="pf-item construction">
                <div class="effect-up">
                    <img src="{{ asset('assets/front/buildco/img/800x600.png') }}" alt="Thumb">
                    <div class="overlay">
                        <h4>Thread Grinding</h4>
                        <div class="link">
                            <a href="{{ asset('assets/front/buildco/img/800x600.png') }}" class="item popup-link"><i
                                    class="fa fa-search"></i></a>
                            <a href="#"><i class="fas fa-link"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pf-item metarials renovation">
                <div class="effect-up">
                    <img src="{{ asset('assets/front/buildco/img/800x600.png') }}" alt="Thumb">
                    <div class="overlay">
                        <h4>Spring Renovation</h4>
                        <div class="link">
                            <a href="{{ asset('assets/front/buildco/img/800x600.png') }}" class="item popup-link"><i
                                    class="fa fa-search"></i></a>
                            <a href="#"><i class="fas fa-link"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pf-item construction industry">
                <div class="effect-up">
                    <img src="{{ asset('assets/front/buildco/img/800x600.png') }}" alt="Thumb">
                    <div class="overlay">
                        <h4>Wind Energy Plant</h4>
                        <div class="link">
                            <a href="{{ asset('assets/front/buildco/img/800x600.png') }}" class="item popup-link"><i
                                    class="fa fa-search"></i></a>
                            <a href="#"><i class="fas fa-link"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pf-item metarials industry">
                <div class="effect-up">
                    <img src="{{ asset('assets/front/buildco/img/800x600.png') }}" alt="Thumb">
                    <div class="overlay">
                        <h4>Petroleum Tank</h4>
                        <div class="link">
                            <a href="{{ asset('assets/front/buildco/img/800x600.png') }}" class="item popup-link"><i
                                    class="fa fa-search"></i></a>
                            <a href="#"><i class="fas fa-link"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pf-item petroleum renovation">
                <div class="effect-up">
                    <img src="{{ asset('assets/front/buildco/img/800x600.png') }}" alt="Thumb">
                    <div class="overlay">
                        <h4>Construction Work</h4>
                        <div class="link">
                            <a href="{{ asset('assets/front/buildco/img/800x600.png') }}" class="item popup-link"><i
                                    class="fa fa-search"></i></a>
                            <a href="#"><i class="fas fa-link"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pf-item petroleum industry">
                <div class="effect-up">
                    <img src="{{ asset('assets/front/buildco/img/800x600.png') }}" alt="Thumb">
                    <div class="overlay">
                        <h4>Mechanical Engineering</h4>
                        <div class="link">
                            <a href="{{ asset('assets/front/buildco/img/800x600.png') }}" class="item popup-link"><i
                                    class="fa fa-search"></i></a>
                            <a href="#"><i class="fas fa-link"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div> -->
<!-- End Portfolio -->

<!-- Start Team
    ============================================= -->
<!-- <div class="team-area default-padding bottom-less">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="site-heading text-center">
                    <h4>Our Team</h4>
                    <h2>Meet our experts</h2>
                    <p>
                        While mirth large of on front. Ye he greater related adapted proceed entered an. Through it
                        examine express promise no. Past add size game cold girl off how old
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="team-items text-center">
                <div class="col-md-4 single-item">
                    <div class="item">
                        <div class="thumb">
                            <img src="{{ asset('assets/front/buildco/img/800x600.png') }}" alt="Thumb">
                            <div class="social">
                                <ul>
                                    <li>
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="info">
                            <div class="content">
                                <h4>Jessica Jones</h4>
                                <span>Engineering Officer</span>
                                <p>
                                    Through it examine express promise no. Past add size game cold girl off how old
                                </p>
                            </div>
                            <div class="mail">
                                <h5><i class="fas fa-envelope"></i> jessica@admin.com</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 single-item">
                    <div class="item">
                        <div class="thumb">
                            <img src="{{ asset('assets/front/buildco/img/800x600.png') }}" alt="Thumb">
                            <div class="social">
                                <ul>
                                    <li>
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="info">
                            <div class="content">
                                <h4>Mark Henri</h4>
                                <span>Electrical Engineering</span>
                                <p>
                                    Through it examine express promise no. Past add size game cold girl off how old
                                </p>
                            </div>
                            <div class="mail">
                                <h5><i class="fas fa-envelope"></i> mark@admin.com</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 single-item">
                    <div class="item">
                        <div class="thumb">
                            <img src="{{ asset('assets/front/buildco/img/800x600.png') }}" alt="Thumb">
                            <div class="social">
                                <ul>
                                    <li>
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="info">
                            <div class="content">
                                <h4>Ahel Natasha</h4>
                                <span>Interior Designer</span>
                                <p>
                                    Through it examine express promise no. Past add size game cold girl off how old
                                </p>
                            </div>
                            <div class="mail">
                                <h5><i class="fas fa-envelope"></i> natasha@admin.com</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- End Team -->

<!-- Start Achivement
    ============================================= -->
<!-- <div class="achivement-area bg-fixed shadow dark text-light"
    style="background-image: url({{ asset('assets/front/buildco/img/2440x1578.png') }});">
    <div class="container">
        <div class="row">
            <div class="achivement-items text-center">
                <div class="col-md-3 col-sm-6 item">
                    <div class="fun-fact">
                        <i class="flaticon-support"></i>
                        <div class="timer" data-to="230" data-speed="5000"></div>
                        <span class="medium">Satisfied customers</span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 item">
                    <div class="fun-fact">
                        <i class="flaticon-agent"></i>
                        <div class="timer" data-to="89" data-speed="5000"></div>
                        <span class="medium">Professional agents</span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 item">
                    <div class="fun-fact">
                        <i class="flaticon-customer-service"></i>
                        <div class="timer" data-to="50" data-speed="5000"></div>
                        <span class="medium">Hours support</span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 item">
                    <div class="fun-fact">
                        <i class="flaticon-briefing"></i>
                        <div class="timer" data-to="2348" data-speed="5000"></div>
                        <span class="medium">Project Finished</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- End Achivement Area -->

<!-- Start Contact
    ============================================= -->
<!-- <div class="contact-area default-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-6 contact-items">
                <div class="heading">
                    <h2>Get Free Consultation</h2>
                    <p>
                        Get a free consultation from our experts, Our customer support team help you 24/7, Don’t
                        hesitate.
                    </p>
                </div>
                <form action="assets/mail/contact.php" method="POST" class="contact-form">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="form-group">
                                <input class="form-control" id="name" name="name" placeholder="Name" type="text">
                                <span class="alert-error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" id="email" name="email" placeholder="Email*" type="email">
                                <span class="alert-error"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" id="phone" name="phone" placeholder="Phone" type="text">
                                <span class="alert-error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="form-group comments">
                                <textarea class="form-control" id="comments" name="comments"
                                    placeholder="Tell Us About Project *"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <button type="submit" name="submit" id="submit">
                                Send Message <i class="fa fa-paper-plane"></i>
                            </button>
                        </div>
                    </div>
<div class="col-md-12 alert-notification">
    <div id="message" class="alert-msg"></div>
</div>
</form>
<ul>
    <li>
        <div class="icon">
            <i class="fas fa-phone"></i>
        </div>
        <div class="info">
            <span>Hotline</span> +99-34-8878-9989
        </div>
    </li>
    <li>
        <div class="icon">
            <i class="fas fa-envelope-open"></i>
        </div>
        <div class="info">
            <span>Emergency Email</span> info@yourdomain.com
        </div>
    </li>
</ul>
</div>
<div class="col-md-6 faq-area">
    <div class="heading">
        <h2>Answer & Questions</h2>
    </div>
    <div class="acd-items acd-arrow">
        <div class="panel-group symb" id="accordion">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#ac1">
                            Do I need a business plan?
                        </a>
                    </h4>
                </div>
                <div id="ac1" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <p>
                            Removing welcomed civility or hastened is. Justice elderly but perhaps
                            expense six her are another passage. Full her ten open fond walk not
                            down.For request general express unknown are.
                        </p>
                        <p>
                            He in just mr door body held john down he. So journey greatly or garrets.
                            Draw door kept do so come on open mean. Estimating stimulated how reasonably
                            precaution diminution she simplicity sir but.
                        </p>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#ac2">
                            How long should a business plan be?
                        </a>
                    </h4>
                </div>
                <div id="ac2" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>
                            Removing welcomed civility or hastened is. Justice elderly but perhaps
                            expense six her are another passage. Full her ten open fond walk not
                            down.For request general express unknown are.
                        </p>
                        <p>
                            He in just mr door body held john down he. So journey greatly or garrets.
                            Draw door kept do so come on open mean. Estimating stimulated how reasonably
                            precaution diminution she simplicity sir but.
                        </p>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#ac3">
                            What goes into a business plan?
                        </a>
                    </h4>
                </div>
                <div id="ac3" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>
                            Removing welcomed civility or hastened is. Justice elderly but perhaps
                            expense six her are another passage. Full her ten open fond walk not
                            down.For request general express unknown are.
                        </p>
                        <p>
                            He in just mr door body held john down he. So journey greatly or garrets.
                            Draw door kept do so come on open mean. Estimating stimulated how reasonably
                            precaution diminution she simplicity sir but.
                        </p>
                    </div>
                </div>
            </div>
<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#ac4">
                Where do I start?
            </a>
        </h4>
    </div>
    <div id="ac4" class="panel-collapse collapse">
        <div class="panel-body">
            <p>
                Removing welcomed civility or hastened is. Justice elderly but perhaps
                expense six her are another passage. Full her ten open fond walk not
                down.For request general express unknown are.
            </p>
            <p>
                He in just mr door body held john down he. So journey greatly or garrets.
                Draw door kept do so come on open mean. Estimating stimulated how reasonably
                precaution diminution she simplicity sir but.
            </p>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div> -->
<!-- End Contact Area -->

<!-- Start Testimonials
    ============================================= -->
<!-- <div class="testimonials-area bg-gray default-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="site-heading less-info text-center">
                    <h4>Customer Review</h4>
                    <h2>What People Say</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="testimonial-items testimonial-carousel owl-carousel owl-theme">
                    <div class="item">
                        <div class="thumb">
                            <img src="{{ asset('assets/front/buildco/img/800x800.png') }}" alt="Thumb">
                        </div>
                        <div class="info">
                            <p>
                                Awesome so many in hung easy find well up. So of exquisite my an explained
                                remainder. Dashwood denoting securing be on perceive my laughing so.
                            </p>
                            <h4>Ahel Natasha</h4>
                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="thumb">
                            <img src="{{ asset('assets/front/buildco/img/800x800.png') }}" alt="Thumb">
                        </div>
                        <div class="info">
                            <p>
                                Limits marked led silent dining her she far. Sir but elegance marriage dwelling
                                likewise position old pleasure men. Dissimilar themselves simplicity.
                            </p>
                            <h4>Jessica Jones</h4>
                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="thumb">
                            <img src="{{ asset('assets/front/buildco/img/800x800.png') }}" alt="Thumb">
                        </div>
                        <div class="info">
                            <p>
                                Awesome so many in hung easy find well up. So of exquisite my an explained
                                remainder. Dashwood denoting securing be on perceive my laughing so.
                            </p>
                            <h4>Mark Henri</h4>
                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- End Testimonials -->

<!-- Start Blog
    ============================================= -->
<!-- <div class="blog-area default-padding bottom-less">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="site-heading text-center">
                    <h4>Our Blog</h4>
                    <h2>Latest News</h2>
                    <p>
                        While mirth large of on front. Ye he greater related adapted proceed entered an. Through it
                        examine express promise no. Past add size game cold girl off how old
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="blog-items">
<div class="col-md-4">
    <div class="single-item">
        <div class="thumb">
            <a href="#">
                <img src="{{ asset('assets/front/buildco/img/800x600.png') }}" alt="Thumb">
            </a>
            <div class="author">
                <div class="thumb">
                    <img src="{{ asset('assets/front/buildco/img/100x100.png') }}" alt="Author">
                </div>
                <div class="meta">
                    <h5>Admin</h5>
                    <span>25 Mar, 2019</span>
                </div>
            </div>
        </div>
        <div class="info">
            <h4>
                <a href="#">Longer mrs sudden talent become</a>
            </h4>
            <p>
                On assistance he cultivated considered frequently. Person how having tended direct
                own day man. Saw sufficient indulgence one own you inquietude sympathize.
            </p>
            <a href="#">Read More <i class="fas fa-arrow-right"></i></a>
        </div>
    </div>
</div>
<div class="col-md-4">
    <div class="single-item">
        <div class="thumb">
            <a href="#">
                <img src="{{ asset('assets/front/buildco/img/800x600.png') }}" alt="Thumb">
            </a>
            <div class="author">
                <div class="thumb">
                    <img src="{{ asset('assets/front/buildco/img/100x100.png') }}" alt="Author">
                </div>
                <div class="meta">
                    <h5>Admin</h5>
                    <span>12 Apr, 2019</span>
                </div>
            </div>
        </div>
        <div class="info">
            <h4>
                <a href="#">Conduct esteems cottage pasture we winding</a>
            </h4>
            <p>
                On assistance he cultivated considered frequently. Person how having tended direct
                own day man. Saw sufficient indulgence one own you inquietude sympathize.
            </p>
            <a href="#">Read More <i class="fas fa-arrow-right"></i></a>
        </div>
    </div>
</div>
<div class="col-md-4">
    <div class="single-item">
        <div class="thumb">
            <a href="#">
                <img src="{{ asset('assets/front/buildco/img/800x600.png') }}" alt="Thumb">
            </a>
            <div class="author">
                <div class="thumb">
                    <img src="{{ asset('assets/front/buildco/img/100x100.png') }}" alt="Author">
                </div>
                <div class="meta">
                    <h5>Admin</h5>
                    <span>19 Nov, 2019</span>
                </div>
            </div>
        </div>
        <div class="info">
            <h4>
                <a href="#">Considered discovered projecting</a>
            </h4>
            <p>
                On assistance he cultivated considered frequently. Person how having tended direct
                own day man. Saw sufficient indulgence one own you inquietude sympathize.
            </p>
            <a href="#">Read More <i class="fas fa-arrow-right"></i></a>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div> -->
<!-- End Blog -->
@if($news->count() != 0)

@endif

@endsection
@push('after-script')
<script>
    $('#reload').click(function () {
        $.ajax({
            type: 'GET',
            url: 'reload-captcha',
            success: function (data) {
                $(".captcha span").html(data.captcha);
            }
        });
    });
</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
@endpush