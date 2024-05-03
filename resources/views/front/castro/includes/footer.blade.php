<footer class="main-footer">
    <div class="footer-top">
        <div class="auto-container">
            <div class="row clearfix">
                <!-- Kontak Kami -->
                <div class="col-lg-4 col-md-4 col-sm-12 footer-column">
                    <div class="footer-widget contact-widget">
                        <div class="widget-title">
                            <h3>Kontak Kami</h3>
                        </div>
                        <ul class="info-list clearfix">
                            <li>{{ $data_website->address }}</li>
                            <li><a href="tel:{{ $data_website->phone }}">{{ $data_website->phone }}</a></li>
                            <li><a href="mailto:{{ $data_website->email }}">{{ $data_website->email }}</a></li>
                        </ul>
                        <ul class="footer-social clearfix">
                            <li><a aria-label="Facebook" target="_blank" href="{{ $data_website->facebook }}"><i
                                        class="fab fa-facebook-f"></i></a></li>
                            <li><a aria-label="Twitter" target="_blank" href="{{ $data_website->twitter }}"><i
                                        class="fab fa-twitter"></i></a></li>
                            <li><a aria-label="Youtube" target="_blank" href="{{ $data_website->youtube }}"><i
                                        class="fab fa-youtube"></i></a></li>
                            <li><a aria-label="Instagram" target="_blank" href="{{ $data_website->instagram }}"><i
                                        class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!-- Link Terkait -->
                <div class="col-lg-4 col-md-4 col-sm-12 footer-column">
                    <div class="footer-widget links-widget">
                        <div class="widget-title">
                            <h3>Link Terkait</h3>
                        </div>
                        <div class="widget-content">
                            <ul class="links-list clearfix">
                                @if($related->count() > 0)
                                @foreach($related as $rr)
                                <li><a target="_blank" href="{{ $rr->url }}">{{ $rr->name }}</a></li>
                                @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Map -->
                <div class="col-lg-4 col-md-4 col-sm-12 footer-column">
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
    <div class="footer-bottom">
        <div class="auto-container clearfix">
            <ul class="cart-list pull-left clearfix">
                <li><a href="index.html"><img src="assets/images/resource/card-1.png" alt=""></a></li>
                <li><a href="index.html"><img src="assets/images/resource/card-2.png" alt=""></a></li>
                <li><a href="index.html"><img src="assets/images/resource/card-3.png" alt=""></a></li>
                <li><a href="index.html"><img src="assets/images/resource/card-4.png" alt=""></a></li>
            </ul>
            <div class="copyright pull-right">
                <p>&copy; Copyright 2023.
                    Diskominfo Kab. Wonosobo by <a href="https://soulofjava.github.io/myportofolio/" target="_blank">Isa
                        Maulana Tantra</a>
                </p>
            </div>
        </div>
    </div>
</footer>
<!-- main-footer end -->

<!--Scroll to top-->
<button class="scroll-top scroll-to-target" data-target="html">
    <i class="fas fa-long-arrow-alt-up"></i>
</button>