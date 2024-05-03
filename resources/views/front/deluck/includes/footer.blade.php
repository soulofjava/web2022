<!-- Start Footer ============================================= -->
<footer class="bg-dark text-light">
    <div class="container">
        <div class="row">

            <div class="f-items default-padding">
                <!-- Single Item -->
                <div class="col-md-4 item">
                    <div class="f-item about">
                        <ul>
                            <li>
                                <span>Alamat: </span> {{ $data_website->address }}
                            </li>
                            <li>
                                <span>Jam Pelayanan: </span> {{ $data_website->open_hours }}
                            </li>
                            <li>
                                <span>Email: </span> <a href="mailto:{{ $data_website->email }}">{{ $data_website->email
                                    }}</a>
                            </li>
                        </ul>
                        <h2><i class="fas fa-phone"></i> {{ $data_website->phone }}</h2>
                    </div>
                </div>
                <!-- End Single Item -->
                <!-- Single Item -->
                <div class="col-md-4 item">
                    <div class="f-item link">
                        @if($related->count() > 0)
                        <h4>Link Terkait</h4>
                        <ul>
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
                <!-- End Single Item -->
                <!-- Single Item -->
                <div class="col-md-4 col-sm-6 equal-height item">
                    <div class="map" style="height: 100%;">
                        <iframe title="lokasi kami"
                            src="https://maps.google.com/maps?q={{ $data_website->latitude }},{{ $data_website->longitude }}&z=14&output=embed"
                            frameborder="0" allowfullscreen width="100%" height="100%"></iframe>
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <br>
                            <h4 class="mb-0">Total Pengunjung {{ $counter_web }}</h4>
                        </div>
                    </div>
                </div>
                <!-- End Single Item -->
            </div>
        </div>
    </div>
    <!-- End Single Item -->

    <!-- Start Footer Bottom -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-7">
                    <p>&copy; Copyright 2023. Diskominfo
                        Kab.
                        Wonosobo by <a href="https://soulofjava.github.io/myportofolio/" target="_blank">Isa Maulana
                            Tantra</a></p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-5 text-right social">
                    <ul>
                        <li>
                            <a aria-label="Facebook" href="{{ $data_website->facebook }}"><i
                                    class="fab fa-facebook-f"></i></a>
                        </li>
                        <li>
                            <a aria-label="Twitter" href="{{ $data_website->twitter }}"><i
                                    class="fab fa-twitter"></i></a>
                        </li>
                        <li>
                            <a aria-label="Instagram" href="{{ $data_website->instagram }}"><i
                                    class="fab fa-instagram"></i></a>
                        </li>
                        <li>
                            <a aria-label="Youtube" href="{{ $data_website->youtube }}"><i
                                    class="fab fa-youtube"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Bottom -->
</footer>
<!-- End Footer -->