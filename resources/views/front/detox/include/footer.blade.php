<footer class="main-footer">
    <div class="auto-container">
        <div class="footer-top">
            <div class="widget-section wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                <div class="row clearfix">
                    <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                        <div class="footer-widget contact-widget">
                            <!-- <figure class="footer-logo">
                                <a href="index.html">
                                    <img src="{{ asset('master/Detox/assets/images/footer-logo.png') }}" alt="">
                                </a>
                            </figure> -->
                            <div class="widget-title">
                                <h3>Kontak Kami</h3>
                            </div>
                            <div class="widget-content">
                                <ul>
                                    <li>
                                        <span>Jam Pelayanan : </span> {{ $data_website->open_hours }}
                                    </li>
                                    <li>
                                        <span>Alamat : </span> {{ $data_website->address }}
                                    </li>
                                    <li>
                                        <span>Email : </span> {{ $data_website->email }}
                                    </li>
                                    <li>
                                        <span>Phone : </span> {{ $data_website->phone }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                        <div class="footer-widget contact-widget">
                            <div class="widget-title">
                                <h3>Link Terkait</h3>
                            </div>
                            <div class="widget-content">
                                <ul class="links-list clearfix">
                                    @if ($related->count() > 0)
                                    @foreach ($related as $rr)
                                    <li><a target="_blank" href="{{ $rr->url }}">{{ $rr->name }}</a>
                                    </li>
                                    @endforeach
                                    @endif
                                </ul>
                                <ul class="social-links clearfix mt-3">
                                    <li> <a aria-label="Facebook" href="{{ $data_website->facebook }}"><i
                                                class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li><a aria-label="Twitter" href="{{ $data_website->twitter }}"><i
                                                class="fab fa-twitter"></i></a>
                                    </li>
                                    <li><a aria-label="Instagram" href="{{ $data_website->instagram }}"><i
                                                class="fab fa-instagram"></i></a>
                                    </li>
                                    <li><a aria-label="Youtube" href="{{ $data_website->youtube }}"><i
                                                class="fab fa-youtube"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 footer-column">
                        <div class="footer-widget newsletter-widget">
                            <div class="map">
                                <iframe title="lokasi kami"
                                    src="https://maps.google.com/maps?q={{ $data_website->latitude }},{{ $data_website->longitude }}&z=14&output=embed"
                                    frameborder="0" allowfullscreen width="100%" height="300px"></iframe>
                            </div>
                            <div class="row">
                                <div class="col text-center">
                                    <br>
                                    <div class="widget-title">
                                        <h4> Total Pengunjung {{ $counter_web }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom clearfix">
            <div class="copyright pull-left">
                <p>&copy; Copyright 2024.
                    Diskominfo Kab. Wonosobo by <a href="https://soulofjava.github.io/myportofolio/" target="_blank">Isa
                        Maulana Tantra</a></p>
            </div>
        </div>
    </div>
</footer>