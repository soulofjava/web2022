<!-- Start Footer 
    ============================================= -->
    <footer class="bg-light">
        <!-- Start Footer Top -->
        {{-- <div class="footer-top bg-gray">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4 logo">
                        <a href="#"><img src="{{ asset('master/Buspro/source/assets/img/logo.png') }}" alt="Logo"></a>
                    </div>
                    <div class="col-md-8 col-sm-8 form text-right">
                        <form action="#">
                            <div class="input-group stylish-input-group">
                                <input type="email" placeholder="Enter your e-mail here" class="form-control" name="email">
                                <span class="input-group-addon">
                                    <button type="submit">
                                        Subscribe <i class="fa fa-paper-plane"></i>
                                    </button>  
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- End Footer Top -->
        <div class="container">
            <div class="row">
                <div class="f-items default-padding">

                    <!-- Single Item -->
                    <div class="col-md-4 equal-height item">
                        <div class="f-item">
                            <h3>{{ $data_website->web_name }}</h3>
                                <p>
                                {{ $data_website->address }}<br><br>
                                <strong style="color: black;">Telpn:</strong> {{ $data_website->phone }}<br>
                                <strong style="color: black;">Email:</strong> {{ $data_website->email }}<br>
                                </p>
                            <div class="social">
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
                    <!-- End Single Item -->
                    <!-- Single Item -->
                    <div class="col-md-4 equal-height item">
                        <div class="f-item link">
                            @if($related->count() > 0)
                            <h3>Link Terkait</h3>
                            <ul>
                                @foreach($related as $rr)
                                <li>
                                    <a target="_blank" href="{{ $rr->url }}">{{ $rr->name }}</a>
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                    </div>
                    <!-- End Single Item -->
                    <!-- Single Item -->
                    <div class="col-md-4 equal-height item">
                        <div class="map">
                            <iframe title="lokasi kami"
                                src="https://maps.google.com/maps?q={{ $data_website->latitude }},{{
                                                                                                    $data_website->longitude }}&z=14&output=embed"
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
        <!-- Start Footer Bottom -->
        <div class="footer-bottom bg-dark text-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p>&copy; Copyright 2023. Diskominfo
                            Kab.
                            Wonosobo by <a href="https://soulofjava.github.io/myportofolio/" target="_blank">Isa Maulana
                                Tantra</a></p>
                    </div>
                    {{-- <div class="col-md-6 text-right link">
                        <ul>
                            <li>
                                <a href="#">Terms of user</a>
                            </li>
                            <li>
                                <a href="#">License</a>
                            </li>
                            <li>
                                <a href="#">Support</a>
                            </li>
                        </ul>
                    </div> --}}
                </div>
            </div>
        </div>
        <!-- End Footer Bottom -->
    </footer>
    <!-- End Footer -->