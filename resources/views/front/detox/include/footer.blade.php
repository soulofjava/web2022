<footer class="main-footer">
    <div class="auto-container">
        <div class="footer-top">
            <div class="widget-section wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                <div class="row clearfix">
                    <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                        <div class="footer-widget logo-widget">
                            <figure class="footer-logo">
                                <a href="index.html">
                                    <img src="{{ asset('master/detox/assets/images/footer-logo.png') }}" alt="">
                                </a>
                            </figure>
                            <div class="text">
                                <ul>
                                    <li>
                                        <span>Alamat: </span> {{ $data_website->address }}
                                    </li>
                                    <li>
                                        <span>Jam Pelayanan: </span> {{ $data_website->open_hours }}
                                    </li>
                                    <li>
                                        <span>Email: </span> <a
                                            href="mailto:{{ $data_website->email }}">{{ $data_website->email }}</a>
                                    </li>
                                </ul>
                                <h2><i class="fas fa-phone"></i> {{ $data_website->phone }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                        <div class="footer-widget links-widget">
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
                                <ul class="social-links" style="display: flex;">
                                    <li style="margin-right: 30px;"> <a aria-label="Facebook"
                                            href="{{ $data_website->facebook }}"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li style="margin-right: 30px;"><a aria-label="Twitter"
                                            href="{{ $data_website->twitter }}"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li style="margin-right: 30px;"><a aria-label="Instagram"
                                            href="{{ $data_website->instagram }}"><i class="fab fa-instagram"></i></a>
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
                                    <h4 class="mb-0">Total Pengunjung {{ $counter_web }}</h4>
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
