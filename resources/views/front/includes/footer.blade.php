<!-- ======= Footer ======= -->
<footer id="footer" class="footer">

    <div class="footer-content position-relative">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-md-6">
                    <div class="footer-info">
                        <h3>{{ $data_website->web_name }}</h3>
                        <p>
                            {{ $data_website->address }} <br>
                            <br><br>
                            <strong>Telepon:</strong> {{ $data_website->phone }}<br>
                            <strong>Email:</strong> {{ $data_website->email }}<br>
                        </p>
                        <div class="social-links d-flex mt-3">
                            <a target="_blank" href="{{ $data_website->twitter }}"
                                class="d-flex align-items-center justify-content-center"><i
                                    class="bi bi-twitter"></i></a>
                            <a target="_blank" href="{{ $data_website->facebook }}"
                                class="d-flex align-items-center justify-content-center"><i
                                    class="bi bi-facebook"></i></a>
                            <a target="_blank" href="{{ $data_website->instagram }}"
                                class="d-flex align-items-center justify-content-center"><i
                                    class="bi bi-instagram"></i></a>
                            <a target="_blank" href="{{ $data_website->youtube }}"
                                class="d-flex align-items-center justify-content-center"><i
                                    class="bi bi-youtube"></i></a>
                        </div>
                    </div>
                </div>
                <!-- End footer info column-->

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Link Terkait</h4>
                    <ul>
                        @foreach($related ?? [] as $rr)
                        <li>
                            <a href="{{ $rr->url }}" target="_blank">
                                {{ $rr->name }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-lg-6 col-md-6 footer-links">
                    <div class="d-flex justify-content-end">
                        <h4>Total Pengunjung = {{ $counter_web }}</h4>
                    </div>
                    <!-- start map -->
                    <div class="map">
                        <iframe src="https://maps.google.com/maps?q={{ $data_website->latitude }},{{
                                    $data_website->longitude }}&z=14&output=embed" frameborder="0" allowfullscreen
                            width="100%" height="300px"></iframe>
                    </div>
                    <!-- end map -->
                </div>


                <!-- End footer links column-->

            </div>
        </div>
    </div>

    <div class="footer-legal text-center position-relative">
        <div class="container">
            <div class="copyright">
                &copy; <strong><span>2023 PEMERINTAH KABUPATEN WONOSOBO</span></strong>.
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/upconstruction-bootstrap-construction-website-template/ -->
                by <a href="https://soulofjava.github.io/myportofolio/">Isa Maulana Tantra</a>
            </div>
        </div>
    </div>

</footer>
<!-- End Footer -->

<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<div id="preloader"></div>