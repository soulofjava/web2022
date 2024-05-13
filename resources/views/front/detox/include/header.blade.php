{{-- page wrapper --}}

<body class="boxed_wrapper ltr">

    <!-- preloader -->
    <div class="preloader"></div>
    <!-- preloader -->

    <!-- page-direction -->
    <!-- <div class="page_direction">
        <div class="demo-rtl direction_switch"><button class="rtl">RTL</button></div>
        <div class="demo-ltr direction_switch"><button class="ltr">LTR</button></div>
    </div> -->
    <!-- page-direction end -->


    <!-- switcher menu -->
    <!-- <div class="switcher">
        <div class="switch_btn">
            <button><i class="fas fa-palette"></i></button>
        </div>
        <div class="switch_menu">
            <div class="switcher_container">
                <ul id="styleOptions" title="switch styling">
                    <li>
                        <a href="javascript: void(0)" data-theme="blue" class="blue-color"></a>
                    </li>
                    <li>
                        <a href="javascript: void(0)" data-theme="pink" class="pink-color"></a>
                    </li>
                    <li>
                        <a href="javascript: void(0)" data-theme="violet" class="violet-color"></a>
                    </li>
                    <li>
                        <a href="javascript: void(0)" data-theme="crimson" class="crimson-color"></a>
                    </li>
                    <li>
                        <a href="javascript: void(0)" data-theme="orange" class="orange-color"></a>
                    </li>
                </ul>
            </div>
        </div>
    </div> -->
    <!-- end switcher menu -->

    <!-- main header -->
    <header class="main-header">
        <div class="outer-container">
            <div class="header-upper clearfix">
                <div class="outer-box pull-left">
                    <div class="logo-box pull-left">
                        <figure class="logo">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('assets/pemda.ico') }}" alt="" title=""
                                    style="width: 60px; height: 60px;">
                            </a>
                        </figure>
                    </div>
                    <div class="menu-area pull-left">
                        <!--Mobile Navigation Toggler-->
                        <div class="mobile-nav-toggler">
                            <i class="icon-bar"></i>
                            <i class="icon-bar"></i>
                            <i class="icon-bar"></i>
                        </div>
                        <nav class="main-menu navbar-expand-md navbar-light">
                            <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                <ul class="navigation clearfix">
                                    @foreach (App\Models\FrontMenu::where('menu_parent',
                                    '1')->where('active',1)->orderBy('id',
                                    'ASC')->get() as $menu)

                                    @if (App\Models\FrontMenu::where('menu_parent',
                                    $menu->id)->where('active',1)->orderBy('menu_parent',
                                    'ASC')->count() == 0)
                                    <li>
                                        @if ($menu->link)
                                        <a class="smooth-menu" target="_blank" href="{{ $menu->menu_url }}">
                                            {{ $menu->menu_name }}
                                        </a>
                                        @else
                                        <a class="smooth-menu" href="{{ url('/page', $menu->menu_url) }}">{{
                                            $menu->menu_name }}
                                        </a>
                                        @endif
                                    </li>
                                    @else
                                    <li class="dropdown">
                                        <a href="#">
                                            {{ $menu->menu_name }}
                                        </a>
                                        <ul>
                                            @foreach (App\Models\FrontMenu::where('menu_parent',
                                            $menu->id)->where('active',1)->orderBy('menu_parent',
                                            'ASC')->get() as $sm)

                                            @if (App\Models\FrontMenu::where('menu_parent',
                                            $sm->id)->where('active',1)->orderBy('menu_parent',
                                            'ASC')->count() == 0)
                                            <li>
                                                @if($sm->link)
                                                <a target="_blank" href="{{ $sm->menu_url }}">
                                                    {{ $sm->menu_name }}
                                                </a>
                                                @elseif($sm->menu_parent == 31)
                                                <a href="{{ url('transparansi', $sm->menu_url) }}">
                                                    {{ $sm->menu_name }}
                                                </a>
                                                @else
                                                <a href="{{ url('page', $sm->menu_url) }}">
                                                    {{ $sm->menu_name }}
                                                </a>
                                                @endif
                                            </li>
                                            @else
                                            <li class="dropdown">
                                                <a href="#">
                                                    {{ $sm->menu_name }}
                                                </a>
                                                <ul>
                                                    @foreach (App\Models\FrontMenu::where('menu_parent',
                                                    $sm->id)->where('active',1)->orderBy('menu_parent',
                                                    'ASC')->get() as $sub3)

                                                    @if (App\Models\FrontMenu::where('menu_parent',
                                                    $sub3->id)->where('active',1)->orderBy('menu_parent',
                                                    'ASC')->count() == 0)
                                                    <li>
                                                        @if ($sub3->menu_name == 'Agenda Pimpinan')
                                                        <a href="{{ url('/agenda') }}">{{
                                                            $sub3->menu_name }}
                                                        </a>
                                                        @elseif($sub3->link)
                                                        <a href="{{ $sub3->menu_url }}" target="_blank">
                                                            {{ $sub3->menu_name }}
                                                        </a>
                                                        @else
                                                        <a href="{{ url('page', $sub3->menu_url) }}">{{ $sub3->menu_name
                                                            }}
                                                        </a>
                                                        @endif
                                                    </li>
                                                    @else
                                                    <li class="dropdown">
                                                        <a href="#">
                                                            {{ $sub3->menu_name }}
                                                        </a>
                                                        <ul>
                                                            @foreach (App\Models\FrontMenu::where('menu_parent',
                                                            $sub3->id)->where('active',1)->orderBy('menu_parent',
                                                            'ASC')->get() as $sub4)
                                                            <li>
                                                                @if ($sub4->link)
                                                                <a href="{{ $sub4->menu_url }}" target="_blank">
                                                                    {{ $sub4->menu_name }}
                                                                </a>
                                                                @else
                                                                <a href="{{ url('page', $sub4->menu_url) }}">
                                                                    {{ $sub4->menu_name }}
                                                                </a>
                                                                @endif
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                    @endif
                                                    @endforeach
                                                </ul>
                                            </li>
                                            @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                    @endif
                                    @endforeach
                                    <x-komponen li='' a="" ul="" />
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="menu-right-content pull-right">
                    {{-- <div class="phone">Call Us <a href="tel:880762009">+880.762.009</a></div> --}}

                    <!-- Tombol Search -->
                    <div class="btn-box">
                        <a href="#" data-toggle="modal" data-target="#searchModal">
                            <i class="fas fa-search"></i> Search
                        </a>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title mx-auto" id="exampleModalLabel">Pencarian Data Global</h5>
                                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                </div>
                                <div class="modal-body">
                                    {{ Form::open(['route' => 'news.search', 'method' => 'get', '', 'class' => 'w-100'])
                                    }}
                                    {{ Form::text('kolomcari', null, [
                                    'class' => 'form-control text-center',
                                    'placeholder' => 'Masukkan Kata Pencarian',
                                    ]) }}
                                    <button type="submit" class="btn mt-3"
                                        style="width: 100%; background-color: #6377EE; color: white;">
                                        Cari Data
                                    </button>
                                </div>
                                {{ Form::close() }}
                            </div>
                            <div class="modal-footer">
                                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn"
                                        style="color: white; background: #6377EE;">Simpan</button> -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Modal -->
            </div>
        </div>
        </div>

        <!--sticky Header-->
        <div class="sticky-header">
            <div class="container clearfix">
                <figure class="logo-box">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('assets/pemda.ico') }}" alt="" title="" style="width: 50px; height: 50px;">
                    </a>
                </figure>
                <div class="menu-area">
                    <nav class="main-menu clearfix">
                        <!--Keep This Empty / Menu will come through Javascript-->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- main-header end -->

    <!-- Mobile Menu  -->
    <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <div class="close-btn"><i class="fas fa-times"></i></div>

        <nav class="menu-box">
            <div class="nav-logo" style="text-align: center;"><a href="{{ url('/') }}"><img
                        src="{{ asset('assets/pemda.ico') }}" alt="" title="" style="width: 80px; height: 80px;"></a>
            </div>
            <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
            </div>
            <div class="contact-info">
                <h4>Kontak Kami</h4>
                <ul>
                    <li> {{ $data_website->address }}</li>
                    <li><a href="tel:{{ $data_website->phone }}">{{ $data_website->phone }}</a></li>
                    <li><a href="mailto:{{ $data_website->email }}">{{ $data_website->email }}</a></li>
                </ul>
            </div>
            <div class="social-links">
                <ul class="clearfix">
                    <li>
                        <a aria-label="Facebook" target="_blank" href="{{ $data_website->facebook }}"><i
                                class="fab fa-facebook-f"></i></a>
                    </li>
                    <li>
                        <a aria-label="Twitter" target="_blank" href="{{ $data_website->twitter }}"><i
                                class="fab fa-twitter"></i></a>
                    </li>
                    <li>
                        <a aria-label="Youtube" target="_blank" href="{{ $data_website->youtube }}"><i
                                class="fab fa-youtube"></i></a>
                    </li>
                    <li>
                        <a aria-label="Instagram" target="_blank" href="{{ $data_website->instagram }}"><i
                                class="fab fa-instagram"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div><!-- End Mobile Menu -->