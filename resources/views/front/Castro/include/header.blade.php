<div class="boxed_wrapper">
<!-- Preloader -->
    <div class="loader-wrap">
        <div class="preloader"><div class="preloader-close">Preloader Close</div></div>
        <div class="layer layer-one"><span class="overlay"></span></div>
        <div class="layer layer-two"><span class="overlay"></span></div>        
        <div class="layer layer-three"><span class="overlay"></span></div>        
    </div>


    <!-- search-popup -->
    <div id="search-popup" class="search-popup">
        <div class="close-search"><i class="flaticon-close"></i></div>
        <div class="popup-inner">
            <div class="overlay-layer"></div>
            <div class="search-form">
                <form method="post" action="index.html">
                    <div class="form-group">
                        <fieldset>
                            <input type="search" class="form-control" name="search-input" value="" placeholder="Search Here" required >
                            <input type="submit" value="Search Now!" class="theme-btn style-four">
                        </fieldset>
                    </div>
                </form>
                {{-- <h3>Recent Search Keywords</h3>
                <ul class="recent-searches">
                    <li><a href="index.html">Finance</a></li>
                    <li><a href="index.html">Idea</a></li>
                    <li><a href="index.html">Service</a></li>
                    <li><a href="index.html">Growth</a></li>
                    <li><a href="index.html">Plan</a></li>
                </ul> --}}
            </div>
        </div>
    </div>
    <!-- search-popup end -->


    <!-- main header -->
    <header class="main-header">
        <div class="header-top">
            <div class="auto-container">
                <div class="top-inner clearfix">
                    <div class="top-left pull-left">
                        <ul class="info clearfix">
                            <li><i class="flaticon-email"></i><a href="mailto:dppkbpppa@wonosobokab.go.id">dppkbpppa@wonosobokab.go.id</a>/<a href="mailto:badankbwonosobo@gmail.com">badankbwonosobo@gmail.com</a></li>
                            <li><i class="flaticon-global"></i> Jl. T. Jogonegoro No 13 Wonosobo</li>
                        </ul>
                    </div>
                    <div class="top-right pull-right">
                        <ul class="social-links clearfix">
                            <li>
                                <a aria-label="Facebook" href="{{ $data_website->facebook }}"><i
                                        class="fab fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a aria-label="Twitter" href="{{ $data_website->twitter }}"><i
                                        class="fab fa-twitter"></i></a>
                            </li>
                            <li>
                                <a aria-label="Youtube" href="{{ $data_website->youtube }}"><i
                                        class="fab fa-youtube"></i></a>
                            </li>
                            <li>
                                <a aria-label="Instagram" href="{{ $data_website->youtube }}"><i
                                    class="fab fa-instagram"></i></a>
                            </li>
                            <li>
                                <a aria-label="Pinterest" href="{{ $data_website->youtube }}"><i
                                    class="fab fa-pinterest"></i></a>
                            </li>
                            <li>
                                <a aria-label="Google+" href="{{ $data_website->youtube }}"><i
                                    class="fab fa-google-plus"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-lower">
            <div class="auto-container">
                <div class="outer-box">
                    <figure class="logo-box"><a href="index.html"><img src="{{ asset('assets/pemda.ico') }}" alt=""></a></figure>
                    <div class="menu-area">
                        <!--Mobile Navigation Toggler-->
                        <div class="mobile-nav-toggler">
                            <i class="icon-bar"></i>
                            <i class="icon-bar"></i>
                            <i class="icon-bar"></i>
                        </div>
                        <nav class="main-menu navbar-expand-md navbar-light">
                            <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                <ul class="navigation clearfix">
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
                                    <li><a href="{{ url('/page', $menu->menu_url) }}">{{
                                            $menu->menu_name
                                            }}</a>
                                    </li>
                                    @else
                                    <li class="dropdown"><a href="#">{{ $menu->menu_name }}</a>
                                        <ul>
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
                                            <li><a href="{{ url('page', $sm->menu_url) }}">{{ $sm->menu_name }}</a></li>
                                            @else
                                            <li class="dropdown"><a href="#">{{ $sm->menu_name }}</a>
                                                <ul>
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
                                                    <li><a href="{{ url('page', $sub3->menu_url) }}">{{
                                                            $sub3->menu_name }}</a></li>
                                                    @else
                                                    <li class="dropdown"><a href="#">{{ $sub3->menu_name }}</a>
                                                        <ul>
                                                            @foreach($subMenus3 as $sub4)
                                                            <li class="jmbt">
                                                                <a class="jmbt2"
                                                                    href="{{ url('page', $sub4->menu_url) }}">{{
                                                                    $sub4->menu_name
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
                                    <x-komponen li='dropdown' />
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
                    <ul class="menu-right-content clearfix">
                        <li>
                            <div class="search-btn">
                                <button type="button" class="search-toggler"><i class="flaticon-search"></i></button>
                            </div>
                        </li>
                        {{-- <li><a href="index.html"><i class="flaticon-like"></i></a></li>
                        <li><a href="index.html"><i class="flaticon-user"></i></a></li>
                        <li class="shop-cart">
                            <a href="shop.html"><i class="flaticon-shopping-cart-1"></i><span>3</span></a>
                        </li> --}}
                    </ul>
                </div>
            </div>
        </div>

        <!--sticky Header-->
        <div class="sticky-header">
            <div class="auto-container">
                <div class="outer-box clearfix">
                    <div class="logo-box pull-left">
                        <figure class="logo"><a href="index.html"><img src="{{ asset('assets/pemda.ico') }}" style="width: 60px; height: auto;"> </a></figure>
                    </div>
                    <div class="menu-area pull-right">
                        <nav class="main-menu clearfix">
                            <!--Keep This Empty / Menu will come through Javascript-->
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- main-header end -->