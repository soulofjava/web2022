<!-- Preloder Area -->
<div class="preloader">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="lds-hourglass"></div>
        </div>
    </div>
</div>
<!-- End Preloder Area -->

<!-- Heder Area -->
<header class="header-area">
    <div class="top-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-sm-6">
                    <ul class="left-info">
                        <li>
                            <a href="mailto:{{ $data_website->email }}">
                                <i class="las la-envelope"></i>
                                {{ $data_website->email }}
                            </a>
                        </li>
                        <li>
                            <a href="tel:{{ $data_website->phone }}">
                                <i class="las la-phone"></i>
                                {{ $data_website->phone }}
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-6 col-sm-6">
                    <ul class="right-info">
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

                        <!-- <li class="heder-btn">
                            <a href="#">Get A Schedule</a>
                        </li> -->
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Start Navbar Area -->
    <div class="navbar-area">
        <div class="atorn-responsive-nav">
            <div class="container">
                <div class="atorn-responsive-menu">
                    <div class="logo">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('assets/front/atorn/assets/img/logo.png') }}" class="logo1" alt="logo">
                            <img src="{{ asset('assets/front/atorn/assets/img/logo-white.png') }}" class="logo2"
                                alt="logo">
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="atorn-nav">
            <div class="container">
                <nav class="navbar navbar-expand-md navbar-light">
                    <a class="navbar-brand" href="{{ url('/') }}" hidden>
                        <img src="{{ asset('assets/front/atorn/assets/img/logo.png') }}" class="logo1" alt="logo">
                        <img src="{{ asset('assets/front/atorn/assets/img/logo-white.png') }}" class="logo2" alt="logo">
                    </a>

                    <div class="collapse navbar-collapse mean-menu">
                        <ul class="navbar-nav ms-auto">
                            @php
                            $queryMenu = DB::table('front_menus')
                            ->where('menu_parent', '=', '1')
                            ->where('deleted_at', '=', null)
                            ->orderBy('id', 'ASC')
                            ->get();
                            @endphp
                            @foreach($queryMenu as $menu)
                            @php
                            $menuId = $menu->id;
                            $subMenus = DB::table('front_menus')
                            ->where('menu_parent', '=' , $menuId)
                            ->where('deleted_at', '=', null)
                            ->orderBy('menu_parent', 'ASC')
                            ->get();
                            @endphp
                            @if(count($subMenus) == 0)
                            <li class="nav-item">
                                <a href="{{ url('/page', $menu->menu_url) }}" class="nav-link">
                                    {{ $menu->menu_name }}
                                </a>
                            </li>
                            @else
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    {{ $menu->menu_name }}
                                    <i class="las la-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    @foreach($subMenus as $sm)
                                    @php
                                    $menuId2 = $sm->id;
                                    $subMenus2 = DB::table('front_menus')
                                    ->where('menu_parent', '=' , $menuId2)
                                    ->where('deleted_at', '=', null)
                                    ->orderBy('menu_parent', 'ASC')
                                    ->get();
                                    @endphp
                                    @if(count($subMenus2) == 0)
                                    <li class="nav-item">
                                        <a href="{{ url('page', $sm->menu_url) }}" class="nav-link">
                                            {{ $sm->menu_name }}
                                        </a>
                                    </li>
                                    @else
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            {{$sm->menu_name }}
                                        </a>
                                        <ul class="dropdown-menu">
                                            @foreach($subMenus2 as $sub3)

                                            @php
                                            $menuId3 = $sub3->id;
                                            $subMenus3 = DB::table('front_menus')
                                            ->where('menu_parent', '=' , $menuId3)
                                            ->where('deleted_at', '=', null)
                                            ->orderBy('menu_parent', 'ASC')
                                            ->get();
                                            @endphp

                                            @if(count($subMenus3) == 0)
                                            <li class="nav-item">
                                                <a href="{{ url('page', $sub3->menu_url) }}" class="nav-link">
                                                    {{ $sub3->menu_name }}
                                                </a>
                                            </li>
                                            @else
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">
                                                    {{ $sub3->menu_name }}
                                                </a>
                                                <ul class="dropdown-menu">
                                                    @foreach($subMenus3 as $sub4)
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="{{ url('page', $sub4->menu_url) }}">
                                                            {{ $sub4->menu_name }}
                                                        </a>
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
                            <x-komponen li='nav-item' a='nav-link' ul='dropdown-menu' i='las la-angle-down' />
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- End Navbar Area -->
</header>
<!-- End Heder Area -->

<!-- Search Overlay -->
<div class="search-overlay">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="search-overlay-layer"></div>
            <div class="search-overlay-layer"></div>
            <div class="search-overlay-layer"></div>

            <div class="search-overlay-close">
                <span class="search-overlay-close-line"></span>
                <span class="search-overlay-close-line"></span>
            </div>

            <div class="search-overlay-form">
                <form>
                    <input type="text" class="input-search" placeholder="Search here...">
                    <button type="submit"><i class='las la-search'></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Search Overlay -->