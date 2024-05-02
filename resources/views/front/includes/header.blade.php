<!-- ======= Header ======= -->
<header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
        <nav id="navbar" class="navbar">
            <ul>
                <li style="color: rgba(255, 255, 255, 0.6);">
                    <a id="carikan">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </a>
                </li>
                @foreach (App\Models\FrontMenu::where('menu_parent', '1')->where('active',1)->orderBy('id',
                'ASC')->get() as $menu)

                @if (App\Models\FrontMenu::where('menu_parent', $menu->id)->where('active',1)->orderBy('menu_parent',
                'ASC')->count() == 0)
                <li>
                    @if ($menu->menu_name = "Berita")
                    <a href="{{ $menu->menu_url }}">
                        {{ $menu->menu_name }}
                    </a>
                    @elseif ($menu->link)
                    <a target="_blank" href="{{ $menu->menu_url }}">
                        {{ $menu->menu_name }}
                    </a>
                    @else
                    <a href="{{ url('/page', $menu->menu_url) }}">
                        {{ $menu->menu_name }}
                    </a>
                    @endif
                </li>
                @else
                <li class="dropdown">
                    <a href="#">
                        {{ $menu->menu_name }}
                        <i class="bi bi-chevron-down dropdown-indicator"></i>
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
                            @elseif($sm->menu_url == 'pengumuman' || $sm->id == 61 || $sm->id == 62 || $sm->id == 65 || $sm->id == 66)
                            <a href="{{ url('transparansi') }}/{{ $sm->menu_url }}">
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
                                <i class="bi bi-chevron-down dropdown-indicator"></i>
                            </a>
                            <ul>
                                @foreach (App\Models\FrontMenu::where('menu_parent',
                                $sm->id)->where('active',1)->orderBy('menu_parent',
                                'ASC')->get() as $sub3)

                                @if (App\Models\FrontMenu::where('menu_parent',
                                $sub3->id)->where('active',1)->orderBy('menu_parent',
                                'ASC')->count() == 0)
                                <li>
                                    @if ($sub3->link)
                                    <a href="{{ $sub3->menu_url }}" target="_blank">
                                        {{ $sub3->menu_name }}
                                    </a>
                                    @elseif($sub3->id == 99 || $sub3->menu_parent == 89 || $sub3->menu_parent == 90 ||
                                    $sub3->menu_parent
                                    == 91 || $sub3->id == 85 || $sub3->id == 80 || $sub3->id == 126 || $sub3->id == 54 || $sub3->id == 55 || $sub3->id == 88)
                                    <a href="{{ url('transparansi') }}/{{ $sub3->menu_url }}">
                                        {{ $sub3->menu_name }}
                                    </a>
                                    @else
                                    <a href="{{ url('page', $sub3->menu_url) }}">
                                        {{ $sub3->menu_name }}
                                    </a>
                                    @endif
                                </li>
                                @else
                                <li class="dropdown">
                                    <a href="#">
                                        {{ $sub3->menu_name }}
                                        <i class="bi bi-chevron-down dropdown-indicator"></i>
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
                                            @elseif($sub4->id == 144 || $sub4->id == 101 || $sub4->id == 122 || $sub4->id == 22 || $sub4->id == 23)
                                            <a href="{{ url('transparansi') }}/{{ $sub4->menu_url }}">
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
            </ul>
        </nav>
        <a href="{{ url('/') }}" class="logo d-flex align-items-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <h1>{{ $data_website->web_name }}<span>.</span></h1>
        </a>
    </div>
</header>
<!-- End Header -->
