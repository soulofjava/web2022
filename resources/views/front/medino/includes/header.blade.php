<!-- Preloader Starts -->
<div class="preloader">
    <div class="spinner"></div>
</div>
<!-- Preloader End -->

<!-- Header Area Starts -->
<header class="header-area">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 d-md-flex">
                    <h6 class="mr-3"><span class="mr-2"><i class="fa fa-mobile"></i></span> {{ $data_website->phone }}
                    </h6>
                    <h6 class="mr-3"><span class="mr-2"><i class="fa fa-envelope-o"></i></span> {{ $data_website->email
                        }}
                    </h6>
                </div>
                <div class="col-lg-3">
                    <div class="social-links">
                        <ul>
                            <li><a target="_blank" href=" {{ $data_website->facebook }}"><i
                                        class="fa fa-facebook"></i></a></li>
                            <li><a target="_blank" href=" {{ $data_website->twitter }}"><i
                                        class="fa fa-twitter"></i></a></li>
                            <li><a target="_blank" href=" {{ $data_website->instagram }}"><i
                                        class="fa fa-instagram"></i></a></li>
                            <li><a target="_blank" href=" {{ $data_website->youtube }}"><i
                                        class="fa fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="header" id="home">
        <div class="container">
            <div class="row align-items-center justify-content-between d-flex">
                <div id="logo">
                    <a href="{{ url('/') }}"><img width="50px" src="{{ asset('assets/pemda.ico') }}" alt=""
                            title="" /></a>
                </div>
                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        @php
                        $queryMenu = DB::table('front_menus')
                        ->where('menu_parent', '=', '1')
                        ->where('deleted_at', '=', null)
                        ->orderBy('id', 'ASC')
                        ->get();
                        @endphp
                        @foreach ($queryMenu as $menu)
                        @php
                        $menuId = $menu->id;
                        $subMenus = DB::table('front_menus')
                        ->where('menu_parent', '=', $menuId)
                        ->where('deleted_at', '=', null)
                        ->orderBy('menu_parent', 'ASC')
                        ->get();
                        @endphp
                        @if (count($subMenus) == 0)
                        <li>
                            <a href="{{ url('/page', $menu->menu_url) }}">{{ $menu->menu_name }}
                            </a>
                        </li>
                        @else
                        <li class="menu-has-children">
                            <a href="#">{{ $menu->menu_name }}
                            </a>
                            <ul>
                                @foreach ($subMenus as $sm)
                                @php
                                $menuId2 = $sm->id;
                                $subMenus2 = DB::table('front_menus')
                                ->where('menu_parent', '=', $menuId2)
                                ->where('deleted_at', '=', null)
                                ->orderBy('menu_parent', 'ASC')
                                ->get();
                                @endphp
                                @if (count($subMenus2) == 0)
                                <li>
                                    <a href="{{ url('page', $sm->menu_url) }}">{{ $sm->menu_name }}
                                    </a>
                                </li>
                                @else
                                <li class="menu-has-children">
                                    <a href="#">{{ $sm->menu_name
                                        }}
                                    </a>
                                    <ul>
                                        @foreach ($subMenus2 as $sub3)
                                        @php
                                        $menuId3 = $sub3->id;
                                        $subMenus3 = DB::table('front_menus')
                                        ->where('menu_parent', '=', $menuId3)
                                        ->where('deleted_at', '=', null)
                                        ->orderBy('menu_parent', 'ASC')
                                        ->get();
                                        @endphp

                                        @if (count($subMenus3) == 0)
                                        <li>
                                            @if ($sub3->menu_name == 'Permohonan Informasi Publik')
                                            <a href="https://website.wonosobokab.go.id/category/detail/Permohonan-Informasi-Publik"
                                                target="_blank">{{ $sub3->menu_name }}
                                            </a>
                                            @elseif ($sub3->menu_name == 'Pengajuan Keberatan Informasi Publik')
                                            <a href="https://website.wonosobokab.go.id/category/detail/Formulir-Keberatan-atas-Permohonan-Informasi-Publik-pada-PPID-Kabupaten-Wonosobo"
                                                target="_blank">{{ $sub3->menu_name }}
                                            </a>
                                            @elseif ($sub3->menu_name == 'Agenda Pimpinan')
                                            <a href="{{ url('agenda') }}">
                                                {{ $sub3->menu_name }}
                                            </a>
                                            @elseif ($sub3->menu_name == 'JDIH Wonosobo')
                                            <a href="https://jdih.wonosobokab.go.id/" target="_blank">
                                                {{ $sub3->menu_name }}
                                            </a>
                                            @else
                                            <a href="{{ url('page', $sub3->menu_url) }}">
                                                {{ $sub3->menu_name }}
                                            </a>
                                            @endif
                                        </li>
                                        @else
                                        <li class="menu-has-children">
                                            <a href="#">{{ $sub3->menu_name }}
                                            </a>
                                            <ul>
                                                @foreach ($subMenus3 as $sub4)
                                                <li>
                                                    <a href="{{ url('page', $sub4->menu_url) }}">{{ $sub4->menu_name
                                                        }}</a>
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
                        <x-komponen />
                    </ul>
                </nav>
                <!-- #nav-menu-container -->
            </div>
        </div>
    </div>
</header>
<!-- Header Area End -->
