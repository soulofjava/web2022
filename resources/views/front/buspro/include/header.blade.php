<!-- Preloader Start -->
<div class="se-pre-con"></div>
<!-- Preloader Ends -->

<!-- Start Header Top -->
<div class="top-bar-area bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-8 address-info text-left">
                <div class="info box">
                    <ul>
                        <li>
                            <div class="icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="info">
                                <span>Address</span> {{ $data_website->address }}
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <i class="fas fa-envelope-open"></i>
                            </div>
                            <div class="info">
                                <span>Email</span> {{ $data_website->email }}
                            </div>
                        </li>
                        {{-- <li>
                            <div class="icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="info">
                                <span>Phone</span> {{ $data_website->phone }}
                            </div>
                        </li> --}}
                    </ul>
                </div>
            </div>
            <div class="col-md-4 social text-right">
                <ul>
                    <li>
                        <a aria-label="Facebook" href="{{ $data_website->facebook }}"><i
                                class="fab fa-facebook-f"></i></a>
                    </li>
                    <li>
                        <a aria-label="Twitter" href="{{ $data_website->twitter }}"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li>
                        <a aria-label="Instagram" href="{{ $data_website->instagram }}"><i
                                class="fab fa-instagram"></i></a>
                    </li>
                    <li>
                        <a aria-label="Youtube" href="{{ $data_website->youtube }}"><i class="fab fa-youtube"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Header Top -->

<!-- Header -->
<header id="home">

    <!-- Start Navigation -->
    <nav class="navbar navbar-default navbar-sticky bootsnav">

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
                        <button type="submit"><i class="fas fa-search"></i></button>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- End Top Search -->

        <div class="container">

            <!-- Start Attribute Navigation -->
            <div class="attr-nav">
                <ul>
                    <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                </ul>
            </div>
            <!-- End Attribute Navigation -->

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
                                    <li class="dropdown dropdown-right">
                                        <a href="#" class="dropdown-toggle smooth-menu" data-toggle="dropdown">{{
                                            $sub3->menu_name }}
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

    </nav>
    <!-- End Navigation -->

</header>
<!-- End Header -->