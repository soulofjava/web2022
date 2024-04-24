<!-- Preloader Start -->
<div class="se-pre-con"></div>
<!-- Preloader Ends -->

<!-- Header
    ============================================= -->
<header id="home">
    <div class="container">
        <div class="row">
            <!-- Start Navigation -->
            <nav id="mainNav"
                class="navbar navbar-default navbar-fixed white bootsnav on no-full nav-box no-background">

                <div class="container">
                    <!-- Start Atribute Navigation -->
                    <div class="attr-nav">
                        <ul>
                            <li class="side-menu"><a href="#"><i class="fa fa-search"></i></a></li>
                        </ul>
                    </div>
                    <!-- End Atribute Navigation -->

                    <!-- Start Header Navigation -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                            <i class="fa fa-bars"></i>
                        </button>
                        <a class="navbar-brand" href="{{ url('/') }}"><img width="50px"
                                src="{{ asset('assets/pemda.ico') }}" class="logo" alt="Logo"
                                style="padding-top: 0 !important;"></a>
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
                                <a class="smooth-menu" target="_blank" href="{{ $menu->menu_url }}">
                                    {{ $menu->menu_name }}
                                </a>
                                @else
                                <a class="smooth-menu" href="{{ url('/page', $menu->menu_url) }}">{{ $menu->menu_name }}
                                </a>
                                @endif
                            </li>
                            @else
                            <li class="dropdown dropdown-right">
                                <a href="#" class="dropdown-toggle smooth-menu" data-toggle="dropdown">{{ $menu->menu_name }}
                                </a>
                                <ul class="dropdown-menu">
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
                                        @elseif($sm->menu_parent == 29)
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
                                    <li class="dropdown dropdown-right">
                                        <a href="#" class="dropdown-toggle smooth-menu" data-toggle="dropdown">{{ $sm->menu_name
                                            }}
                                        </a>
                                        <ul class="dropdown-menu">
                                            @foreach (App\Models\FrontMenu::where('menu_parent',
                                            $sm->id)->where('active',1)->orderBy('menu_parent',
                                            'ASC')->get() as $sub3)

                                            @if (App\Models\FrontMenu::where('menu_parent',
                                            $sub3->id)->where('active',1)->orderBy('menu_parent',
                                            'ASC')->count() == 0)
                                            <li>
                                                @if ($sub3->menu_name == 'Permohonan Informasi Publik')
                                                <a href="https://sobopedia.wonosobokab.go.id/homesobopedia/permohonan"
                                                    target="_blank">{{ $sub3->menu_name }}
                                                </a>
                                                @elseif ($sub3->menu_name == 'Pengajuan Keberatan Informasi Publik')
                                                <a href="https://sobopedia.wonosobokab.go.id/homesobopedia/keberatan"
                                                    target="_blank">{{ $sub3->menu_name }}
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
                                            <li class="dropdown dropdown-right">
                                                <a href="#" class="dropdown-toggle smooth-menu"
                                                    data-toggle="dropdown">{{ $sub3->menu_name }}
                                                </a>
                                                <ul class="dropdown-menu">
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
                            <x-komponen li='dropdown dropdown-right' a="smooth-menu" ul="dropdown-menu" />
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div>

                <!-- Start Side Menu -->
                <div class="side">
                    <a href="#" class="close-side"><i class="fa fa-times"></i></a>

                    <div class="widget">
                        <h4 class="title">Pencarian</h4>
                        {{ Form::open(['route' => 'news.search', 'method' => 'get', '', 'class' => 'w-100']) }}
                        {{ Form::text('kolomcari', null, [
                        'class' => 'form-control text-center',
                        'placeholder' => 'Masukkan Pencarian',
                        ]) }}
                        <button type="submit" class="btn btn-primary" style="margin-top: 22px; width: 100%">Cari
                            Data</button>
                        {{ Form::close() }}
                    </div>

                </div>
                <!-- End Side Menu -->

            </nav>
            <!-- End Navigation -->
            <div class="clearfix"></div>

        </div>
    </div>
</header>
<!-- End Header -->