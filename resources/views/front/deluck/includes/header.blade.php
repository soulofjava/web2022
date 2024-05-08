<header id="home">
    <!-- Start Header 
    ============================================= -->
    <div class="top-bar-area inline inc-border">
        <div class="container">
            <div class="row">
                <div class="col-md-7 address-info text-left">
                    <div class="info box">
                        <ul>
                            <li>
                                <i class="fas fa-map-marker-alt"></i>
                                <p>
                                    {{ $data_website->address }}
                                </p>
                            </li>
                            <li>
                                <i class="fas fa-envelope-open"></i>
                                <p>
                                    {{ $data_website->email }}
                                </p>
                            </li>
                            <!-- <li>
                                <i class="fas fa-phone"></i>
                                <p>
                                    {{ $data_website->phone }}
                                </p>
                            </li> -->
                        </ul>
                    </div>
                </div>
                <div class="col-md-5 info-right">
                    <div class="item-flex border-less">
                        <div class="social">
                            <ul>
                                <li>
                                    <a aria-label="Facebook" target="_blank" href="{{ $data_website->facebook }}"><i
                                            class="fab fa-facebook-f"></i></a>
                                </li>
                                <li>
                                    <a aria-label="Twitter" target="_blank" href="{{ $data_website->twitter }}"><i
                                            class="fab fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a aria-label="Instagram" target="_blank" href="{{ $data_website->instagram }}"><i
                                            class="fab fa-instagram"></i></a>
                                </li>
                                <li>
                                    <a aria-label="Youtube" target="_blank" href="{{ $data_website->youtube }}"><i
                                            class="fab fa-youtube"></i></a>
                                </li>
                            </ul>
                        </div>
                        <!-- <div class="language-switcher">
                            <div class="dropdown">
                                <button class="dropdown-toggle" type="button" data-toggle="dropdown">
                                    English
                                    <span class="fas fa-angle-down"></span>
                                </button>
                                <ul class="dropdown-menu animated">
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">Español</a></li>
                                    <li><a href="#">Française</a></li>
                                </ul>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Top -->

    <!-- Start Navigation -->
    <nav class="navbar navbar-default active-border-top attr-border navbar-sticky bootsnav">

        <!-- Start Top Search -->
        <div class="container">
            <div class="row">
                <div class="top-search">
                    <div class="input-group">
                        {{ Form::open(['route' => 'news.search', 'method' => 'get', '', 'class' => 'w-100']) }}
                        {{ Form::text('kolomcari', null, [
                        'class' => 'form-control text-center',
                        'placeholder' => 'Masukkan Pencarian',
                        ]) }}
                        <button type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- End Top Search -->

        <div class="container">

            <!-- Start Atribute Navigation -->
            <div class="attr-nav">
                <ul>
                    <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                    {{-- <li class="side-menu"><a href="#"><i class="fa fa-bars"></i></a></li> --}}
                </ul>
            </div>
            <!-- End Atribute Navigation -->

            <!-- Start Header Navigation -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}"><img width="50px" src="{{ asset('assets/pemda.ico') }}"
                        class="logo" alt="Logo" style="padding-top: 0 !important;"></a>
            </div>
            <!-- End Header Navigation -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav navbar-right" data-in="#" data-out="#">
                    @foreach (App\Models\FrontMenu::where('menu_parent', '1')->where('active',1)->orderBy('id',
                    'ASC')->get() as $menu)

                    @if (App\Models\FrontMenu::where('menu_parent',
                    $menu->id)->where('active',1)->orderBy('menu_parent',
                    'ASC')->count() == 0)
                    <li>
                        @if ($menu->link)
                        <a target="_blank" href="{{ $menu->menu_url }}">
                            {{ $menu->menu_name }}
                        </a>
                        @else
                        <a class="smooth-menu" href="{{ url('/page', $menu->menu_url) }}">{{ $menu->menu_name }}
                        </a>
                        @endif
                    </li>
                    @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle">{{ $menu->menu_name }}
                        </a>
                        <ul class="dropdown-menu animated">
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
                                <a href="#" class="dropdown-toggle">{{ $sm->menu_name
                                    }}
                                </a>
                                <ul class="dropdown-menu animated">
                                    @foreach (App\Models\FrontMenu::where('menu_parent',
                                    $sm->id)->where('active',1)->orderBy('menu_parent',
                                    'ASC')->get() as $sub3)

                                    @if (App\Models\FrontMenu::where('menu_parent',
                                    $sub3->id)->where('active',1)->orderBy('menu_parent',
                                    'ASC')->count() == 0)
                                    <li>
                                        @if ($sub3->menu_name == 'Permohonan Informasi Publik')
                                        <a href="https://sobopedia.wonosobokab.go.id/homesobopedia/permohonan"
                                            target="_blank">{{
                                            $sub3->menu_name }}
                                        </a>
                                        @elseif ($sub3->menu_name == 'Pengajuan Keberatan Informasi Publik')
                                        <a href="https://sobopedia.wonosobokab.go.id/homesobopedia/keberatan"
                                            target="_blank">{{
                                            $sub3->menu_name }}
                                        </a>
                                        @elseif ($sub3->menu_name == 'JDIH Wonosobo')
                                        <a href="https://jdih.wonosobokab.go.id/" target="_blank">{{
                                            $sub3->menu_name }}
                                        </a>
                                        @elseif ($sub3->menu_name == 'Agenda Pimpinan')
                                        <a href="{{ url('/agenda') }}">{{
                                            $sub3->menu_name }}
                                        </a>
                                        @elseif($sub3->link)
                                        <a href="{{ $sub3->menu_url }}" target="_blank">
                                            {{ $sub3->menu_name }}
                                        </a>
                                        @else
                                        <a href="{{ url('page', $sub3->menu_url) }}">{{ $sub3->menu_name }}
                                        </a>
                                        @endif
                                    </li>
                                    @else
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{
                                            $sub3->menu_name }}
                                        </a>
                                        <ul class="dropdown-menu animated">
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
                    <x-komponen li='dropdown dropdown-right' a="smooth-menu" ul="dropdown-menu animated" />
                </ul>
            </div>
        </div>

        <div class="side">
            <a href="#" class="close-side"><i class="fa fa-times"></i></a>
            <div class="widget">
                <h4 class="title">About Us</h4>
                <p>
                    Arrived compass prepare an on as. Reasonable particular on my it in sympathize. Size now easy eat
                    hand how. Unwilling he departure elsewhere dejection at. Heart large seems may purse means few
                    blind.
                </p>
            </div>
            <div class="widget address">
                <h4 class="title">Office Location</h4>
                <ul>
                    <li>
                        <i class="fas fa-phone"></i>
                        +123 456 7890
                    </li>
                    <li>
                        <i class="fas fa-map-marker-alt"></i>
                        Kejajar, Wonosobo, Jawa Tengah
                    </li>
                    <li>
                        <i class="fas fa-envelope-open"></i>
                        example@app.com
                    </li>
                </ul>
            </div>
            <div class="widget opening-hours">
                <h4>Opening Hours</h4>
                <ul>
                    <li>
                        Mon - Fri <span>9:00 - 21:00</span>
                    </li>
                    <li>
                        Saturday <span>10:00 - 16:00</span>
                    </li>
                </ul>
            </div>
            <div class="widget social">
                <h4 class="title">Connect With Us</h4>
                <ul class="link">
                    <li class="facebook"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li class="twitter"><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li class="pinterest"><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li class="google+"><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                    <li class="youtube"><a href="#"><i class="fab fa-youtube"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<!-- End Header -->