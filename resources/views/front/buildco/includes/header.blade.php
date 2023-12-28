<!-- Preloader Start -->
<div class="se-pre-con"></div>
<!-- Preloader Ends -->

<!-- Start Header Top 
    ============================================= -->
<div class="top-bar-area inc-border bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-9 address-info text-left">
                <div class="info box">
                    <ul>
                        <li>
                            <div class="icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="info">
                                <span>Alamat</span> {{ $data_website->address }}
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
                        <li>
                            <div class="icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="info">
                                <span>Telepon</span> {{ $data_website->phone }}
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 social text-right">
                <ul>
                    <li>
                        <a href="{{ $data_website->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    </li>
                    <li>
                        <a href="{{ $data_website->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li>
                        <a href="{{ $data_website->youtube }}" target="_blank"><i class="fab fa-youtube"></i></a>
                    </li>
                    <li>
                        <a href="{{ $data_website->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Header Top -->

<!-- Header 
    ============================================= -->
<header id="home">

    <!-- Start Navigation -->
    <nav class="navbar navbar-default active-border attr-border navbar-sticky bootsnav">

        <!-- Start Top Search -->
        <div class="container">
            <div class="row">
                <div class="top-search">
                    <div class="input-group">
                        <!-- <form action="#">
                            <input type="text" name="text" class="form-control" placeholder="Search">
                            <button type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </form> -->
                        {{Form::open(['route' => 'global.search','method' => 'get', ''])}}
                        {{Form::text('kolomcari', null,['class' => 'form-control mb-3 text-center',
                        'placeholder' => 'Kata Pencarian','id'=>'textareaID1'])}}
                        <button type="submit"><i class="fas fa-search"></i></button>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
        <!-- End Top Search -->

        <div class="container">

            <!-- Start Atribute Navigation -->
            <div class="attr-nav">
                <ul>
                    <li class="search">
                        <a href="#">
                            <i class="fa fa-search"></i>
                        </a>
                    </li>
                    <!-- <li class="btn"><a href="#">free quote</a></li> -->
                </ul>
            </div>
            <!-- End Atribute Navigation -->

            <!-- Start Header Navigation -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="https://bappeda.wonosobokab.go.id/wp-content/uploads/2023/06/logoheader.png" class="logo"
                        alt="Logo" style="max-width: 250px;">
                </a>
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
                        <a href="#" dropdown-toggle smooth-menu data-toggle="dropdown">{{ $menu->menu_name }}
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
                                @else
                                <a href="{{ url('page', $sm->menu_url) }}">
                                    {{ $sm->menu_name }}
                                </a>
                                @endif
                            </li>
                            @else
                            <li class="dropdown">
                                <a href="#" dropdown-toggle smooth-menu data-toggle="dropdown">{{ $sm->menu_name
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
                                        <a href="https://website.wonosobokab.go.id/category/detail/Permohonan-Informasi-Publik"
                                            target="_blank">{{ $sub3->menu_name }}
                                        </a>
                                        @elseif ($sub3->menu_name == 'Pengajuan Keberatan Informasi Publik')
                                        <a href="https://website.wonosobokab.go.id/category/detail/Formulir-Keberatan-atas-Permohonan-Informasi-Publik-pada-PPID-Kabupaten-Wonosobo"
                                            target="_blank">{{ $sub3->menu_name }}
                                        </a>
                                        @elseif ($sub3->menu_name == 'JDIH Wonosobo')
                                        <a href="https://jdih.wonosobokab.go.id/" target="_blank">{{
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
                    <x-komponen li='dropdown' a="smooth-menu" ul="dropdown-menu" />
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>

    </nav>
    <!-- End Navigation -->

</header>
<!-- End Header -->