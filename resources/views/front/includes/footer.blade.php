<!-- Footer Area Start -->
<footer class="main-footer bg-blue text-white pt-75">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-3 col-sm-4">
                <div class="footer-widget about-widget">
                    <h5 class="pt-5">Follow Us</h5>
                    <div class="social-style-one">
                        <a target="_blank" href="{{ $data_website->facebook }}"><i class="fab fa-facebook-f"></i></a>
                        <a target="_blank" href="{{ $data_website->twitter }}"><i class="fab fa-twitter"></i></a>
                        <a target="_blank" href="{{ $data_website->instagram }}"><i class="fab fa-instagram"></i></a>
                        <a target="_blank" href="{{ $data_website->youtube }}"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4">
                <div class="footer-widget menu-widget">
                    <h5 class="footer-title">Statistik Pengunjung</h5>
                    <ul>
                        <li><a href="#">Hari ini = {{ $counter_webh }}</a></li>
                        <li><a href="#">Kemarin = {{ $counter_webk }}</a></li>
                        <li><a href="#">Minggu ini = {{ $counter_webm }}</a></li>
                        <li><a href="#">Bulan ini = {{ $counter_webb }}</a></li>
                        <li><a href="#">Total = {{ $counter_web }}</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col">
                        <div class="footer-widget contact-info-widget">
                            <h5 class="footer-title">Kontak Kami</h5>
                            <ul>
                                <li>
                                    <i class="fas fa-map-marker-alt"></i>
                                    {{ $data_website->address }}
                                </li>
                                <li>
                                    <i class="far fa-envelope"></i>
                                    <a href="mailto:{{ $data_website->email }}">{{ $data_website->email }}</a>
                                </li>
                                <li>
                                    <i class="fas fa-phone"></i>
                                    <a href="callto:+0123456789">{{ $data_website->phone }}</a>
                                </li>
                                <li>
                                    <i class="far fa-clock"></i>{{ $data_website->open_hours }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area bg-dark-blue rel">
        <div class="container">
            <div class="copyright-inner">
                <p>© 2024. BKD KABUPATEN WONOSOBO</p>
                <ul class="footer-menu">
                    <li>Dev by <a href="https://soulofjava.github.io/myportofolio/" target="_blank">Isa Maulana
                            Tantra</a></li>
                </ul>
            </div>
        </div>
        <!-- Scroll Top Button -->
        <button class="scroll-top scroll-to-target" data-target="html"><span
                class="fas fa-angle-double-up"></span></button>
    </div>
</footer>
<!-- Footer Area End -->