<footer>
    <div class="w-100 bg-color5 pt-100 pb-10 position-relative">
        <div class="particles-js" id="prtcl5"></div>
        <div class="container">
            <div class="footer-data w-100">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-3">
                        <div class="widget w-100">
                            <div class="logo w-100">
                                <!-- <h1 class="mb-0"><a href="index.html" title="Home"><img class="img-fluid"
                                            src="{{ asset('assets/front/blubuild/images/logo2.png') }}" alt="Logo"
                                            srcset="{{ asset('assets/front/blubuild/images/retina-logo2.png') }}"></a>
                                </h1> -->
                            </div>
                            <!-- Logo -->
                            <!-- <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry. Lorem Ipsum has been.</p> -->
                            <div class="social-links2 d-inline-block">
                                <x-social-media-link fb='flaticon-facebook' twitter='flaticon-twitter'
                                    insta='fab fa-instagram' youtube='fab fa-youtube' />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-3 order-lg-1">
                        <div class="widget w-100">
                            <div class="visitor-stats w-100">
                                <div class="visitor-stat-box w-100">
                                    <h4 class="mb-0 thm-clr counter">{{ $counter_web }}</h4>
                                    <h5 class="mb-0">Our Total visitor</h5>
                                </div>
                                <div class="visitor-stat-box w-100">
                                    <!-- <h4 class="mb-0 text-color4 counter">329,53253825</h4>
                                    <h5 class="mb-0">Our Unique visitor</h5> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-lg-6">
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-lg-4">
                                <div class="widget w-100">
                                    <!-- <h3>About Us</h3>
                                    <ul class="mb-0 list-unstyled w-100">
                                        <li><a href="shop.html" title="">Our Products</a></li>
                                        <li><a href="about.html" title="">About Us</a></li>
                                        <li><a href="services.html" title="">Our Services</a></li>
                                        <li><a href="blog.html" title="">Our Blog</a></li>
                                    </ul> -->
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-lg-4">
                                <div class="widget w-100">
                                    <!-- <h3>Support</h3>
                                    <ul class="mb-0 list-unstyled w-100">
                                        <li><a href="about.html" title="">Get Started Us</a></li>
                                        <li><a href="contact.html" title="">Contact Us</a></li>
                                        <li><a href="testimonials.html" title="">Our Testimonials</a></li>
                                        <li><a href="contact.html" title="">Join With Us</a></li>
                                        <li><a href="faq.html" title="">Ask Question</a></li>
                                    </ul> -->
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-lg-4">
                                <div class="widget w-100">
                                    @if($related->count() > 0)
                                    <h3>Quick Links</h3>
                                    <ul class="mb-0 list-unstyled w-100">
                                        @foreach($related as $rr)
                                        <li>
                                            <a target="_blank" href="{{ $rr->url }}">
                                                {{ $rr->name }}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer Data -->
        </div>
    </div>
</footer>
<div class="copyright w-100 text-center bg-color6 position-relative">
    <div class="container">
        <p>&copy; Copyright 2022. Diskominfo Kab. Wonosobo by <a target="_blank"
                href="https://soulofjava.github.io/myportofolio/"> Isa
                Maulana Tantra
            </a></p>
    </div>
</div>
<!-- Copyright -->