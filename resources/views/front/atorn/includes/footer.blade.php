<!-- Footer Area-->
<footer class="footer-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-sm-6">
                <div class="footer-widget">
                    <div class="logo" hidden>
                        <img src="{{ asset('assets/front/atorn/assets/img/logo-white.png') }}" alt="logo">
                    </div>
                  
                        <p>Total Pengunjung : {{ $counter_web }}</p>

                    <ul class="footer-socials">
                        <li>
                            <a href="{{ $data_website->facebook }}" target="_blank">
                                <i class="lab la-facebook-f"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{ $data_website->twitter }}" target="_blank">
                                <i class="lab la-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{ $data_website->instagram }}" target="_blank">
                                <i class="lab la-instagram"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{ $data_website->youtube }}" target="_blank">
                                <i class="lab la-youtube"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-2 col-sm-6">
                <div class="footer-widget">
                    @if($related->count() > 0)
                    <h3>Link Terkait</h3>
                    <ul class="footer-text">
                        @foreach($related as $rr)
                        <li>
                            <a target="_blank" href="{{ $rr->url }}">
                                <i class="las la-star"></i>
                                {{ $rr->name }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
            </div>

            <div class="col-lg-2 col-sm-6">
                <div class="footer-widget pl-50">
                    <!-- <h3>Services</h3>

                    <ul class="footer-text">
                        <li>
                            <a href="#">
                                <i class="las la-star"></i>
                                Civil Law
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="las la-star"></i>
                                Family Law
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="las la-star"></i>
                                Cyber Law
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="las la-star"></i>
                                Education Law
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="las la-star"></i>
                                Business Law
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="las la-star"></i>
                                Investment Law
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="las la-star"></i>
                                Criminal Law
                            </a>
                        </li>
                    </ul> -->
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="footer-widget">
                    <h3>Contact Info</h3>

                    <ul class="info-list">
                        <li>
                            <i class="las la-phone"></i>
                            <a href="tel:{{ $data_website->phone }}">{{ $data_website->phone }}</a>
                        </li>
                        <li>
                            <i class="las la-envelope"></i>
                            <a href="mailto:{{ $data_website->email }}">{{ $data_website->email }}</a>
                        </li>
                        <li>
                            <i class="las la-map-marker-alt"></i>
                            {{ $data_website->address }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer Area -->

<!-- Footer bottom Area -->
<div class="footer-bottom">
    <div class="container">
        <p>&copy; Copyright 2022. Diskominfo Kab. Wonosobo by <a href="#"> Isa Maulana Tantra
            </a></p>
    </div>
</div>
<!-- End Footer bottom Area -->

<!-- Go Top -->
<div class="go-top">
    <i class="las la-hand-point-up"></i>
</div>
<!-- End Go Top -->