<!-- Start Footer 
    ============================================= -->
<footer class="bg-dark text-light border-right">
    <div class="container">
        <div class="row">
            <div class="f-items">

                <!-- Single Item -->
                <div class="col-md-3 col-sm-6 equal-height item">
                    <div class="f-item about">
                        <h4>Tentang Kami</h4>
                        <ul>
                            <li>
                                <i class="fas fa-envelope"></i>
                                <p>Email <span><a href="mailto:{{ $data_website->email }}">{{ $data_website->email
                                            }}</a></span>
                                </p>
                            </li>
                            <li>
                                <i class="fas fa-map"></i>
                                <p>Kantor <span>{{ $data_website->address }}</span></p>
                            </li>
                        </ul>
                        <div class="bottom">
                            <h4>Hubungi Kami</h4>
                            <span>{{ $data_website->phone }} </span>
                        </div>
                    </div>
                </div>
                <!-- End Single Item -->
                <!-- Single Item -->
                <div class="col-md-3 col-sm-6 equal-height item">
                    <div class="f-item link">
                        <h4>Services</h4>
                        <ul>
                            <li>
                                <a href="#">Oil & Gas Engineering</a>
                            </li>
                            <li>
                                <a href="#">Chemical Research</a>
                            </li>
                            <li>
                                <a href="#">Industrial Equipments</a>
                            </li>
                            <li>
                                <a href="#">Building & Construction</a>
                            </li>
                            <li>
                                <a href="#">Energy Production</a>
                            </li>
                            <li>
                                <a href="#">Mechanical</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- End Single Item -->
                <!-- Single Item -->
                <div class="col-md-3 col-sm-6 equal-height item">
                    <div class="f-item link">
                        <h4>Useful Links</h4>
                        <ul>
                            <li>
                                <a href="#">Latest News</a>
                            </li>
                            <li>
                                <a href="#">Careers</a>
                            </li>
                            <li>
                                <a href="#">General Inquiries</a>
                            </li>
                            <li>
                                <a href="#">Case Studies</a>
                            </li>
                            <li>
                                <a href="#">Customers Feedback</a>
                            </li>
                            <li>
                                <a href="#">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- End Single Item -->
                <!-- Single Item -->
                <div class="col-md-3 col-sm-6 equal-height item">
                    <div class="f-item address">
                        <h4>Jam Pelayanan</h4>
                        <ul>
                            <li>
                                <span> {{ $data_website->open_hours }} </span>
                            </li>
                        </ul>
                        <div class="bottom">
                            <!-- <h4>Subscribe Newsletter</h4>
                            <form action="#">
                                <div class="input-group stylish-input-group">
                                    <input type="email" name="email" class="form-control"
                                        placeholder="Enter your e-mail here">
                                    <button type="submit">
                                        <i class="fa fa-paper-plane"></i>
                                    </button>
                                </div>
                            </form> -->
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
                    <p>&copy; Copyright 2023. Diskominfo Wonosobo by <a
                            href="https://soulofjava.github.io/myportofolio/" target="_blank">Isa Maulana Tantra</a></p>
                </div>
                <div class="col-md-6 text-right link">
                    <!-- <ul>
                        <li>
                            <a href="#">Terms of user</a>
                        </li>
                        <li>
                            <a href="#">License</a>
                        </li>
                        <li>
                            <a href="#">Support</a>
                        </li>
                    </ul> -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Bottom -->
</footer>
<!-- End Footer -->