<!-- Preloader -->
<div class="preloader"></div>

<!-- main header -->
<header class="main-header">
    <!-- Header-Top -->
    <div class="header-top bg-light-blue text-white">
        <div class="container-fluid">
            <div class="top-inner">
                <div class="top-left">
                    <p><i class="far fa-clock"></i> <b>Jam Palayanan</b> : {{ $data_website->open_hours }}</p>
                </div>
                <div class="top-right d-flex align-items-center">
                    <div class="social-style-two">
                        <a target="_blank" href="{{ $data_website->facebook }}"><i class="fab fa-facebook-f"></i></a>
                        <a target="_blank" href="{{ $data_website->twitter }}"><i class="fab fa-twitter"></i></a>
                        <a target="_blank" href="{{ $data_website->instagram }}"><i class="fab fa-instagram"></i></a>
                        <a target="_blank" href="{{ $data_website->youtube }}"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Header-Upper -->
    <div class="header-upper">
        <div class="container-fluid clearfix">

            <div class="header-inner d-flex align-items-center justify-content-between">
                <div class="logo-outer d-lg-flex align-items-center">
                    @if(Route::current()->getName() != 'root')
                    <div class="logo" style="background: white !important;">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('assets/bkdwonosobo.png') }}" alt="Logo" title="Logo">
                        </a>
                    </div>
                    @else
                    <div class="logo" style="background: none !important;">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('assets/bkdwonosobo.png') }}" alt="Logo" title="Logo">
                        </a>
                    </div>
                    @endif
                </div>

                <div class="nav-outer clearfix">
                    <!-- Main Menu -->
                    <nav class="main-menu navbar-expand-lg">
                        <div class="navbar-header">
                            @if(Route::current()->getName() != 'root')
                            <div class="mobile-logo bg-white br-10 p-15">
                                <a href="{{ url('/') }}">
                                    <img src="{{ asset('assets/bkdwonosobo.png') }}" alt="Logo" title="Logo">
                                </a>
                            </div>
                            @else
                            <div class="mobile-logo br-10 p-15">
                                <a href="{{ url('/') }}">
                                    <img src="{{ asset('assets/bkdwonosobo.png') }}" alt="Logo" title="Logo">
                                </a>
                            </div>
                            @endif

                            <!-- Toggle Button -->
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <div class="navbar-collapse collapse clearfix">
                            <ul class="navigation clearfix">
                                @foreach (App\Models\FrontMenu::where('menu_parent',
                                '1')->where('active',1)->orderBy('id',
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
                                                    @elseif($sub3->menu_parent == 89 || $sub3->menu_parent == 90 ||
                                                    $sub3->menu_parent
                                                    == 91)
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
                        </div>

                    </nav>
                    <!-- Main Menu End-->
                </div>

                <!-- Menu Button -->
                <div class="menu-btn-sidebar d-flex align-items-center">
                    {{Form::open(['route' => 'global.search','method' => 'get', ''])}}
                    {{Form::text('kolomcari', null,['class' => '',
                    'placeholder' => 'Kata Pencarian','id'=>'textareaID1'])}}
                    <button type="submit"><i class="fas fa-search"></i></button>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
    <!--End Header Upper-->
</header>


<!--Form Back Drop-->
<div class="form-back-drop"></div>

<!-- Hidden Sidebar -->
<section class="hidden-bar">
    <div class="inner-box text-center">
        <div class="cross-icon"><span class="fa fa-times"></span></div>
        <div class="title">
            <h4>Get Appointment</h4>
        </div>

        <!--Appointment Form-->
        <div class="appointment-form">
            <form method="post" action="#">
                <div class="form-group">
                    <input type="text" name="text" value="" placeholder="Name" required>
                </div>
                <div class="form-group">
                    <input type="email" name="email" value="" placeholder="Email Address" required>
                </div>
                <div class="form-group">
                    <textarea placeholder="Message" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="theme-btn">Submit now</button>
                </div>
            </form>
        </div>

        <!--Social Icons-->
        <div class="social-style-one">
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-pinterest-p"></i></a>
        </div>
    </div>
</section>
<!--End Hidden Sidebar -->