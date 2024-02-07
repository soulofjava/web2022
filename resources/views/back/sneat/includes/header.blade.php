<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
            <div class="app-brand demo">
                <a href="{{ url('/') }}" target="_blank" class="app-brand-link">
                    <img src="{{ asset('assets/logo.png') }}" alt="logo" style="width: 200px;">
                </a>

                <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                    <i class="bx bx-chevron-left bx-sm align-middle"></i>
                </a>
            </div>

            <div class="menu-inner-shadow"></div>

            <ul class="menu-inner py-1">
                <!-- Dashboard -->
                <li class="menu-item {{ (Str::contains(Request::url(), 'dashboard')) ? 'active' : '' }}">
                    <a href="{{ url('dashboard') }}" class="menu-link">
                        <i class='bx bxs-dashboard'></i>
                        <div data-i18n="Analytics">Dashboard</div>
                    </a>
                </li>

                <li class="menu-item {{ (Str::contains(Request::url(), 'news')) ? 'active' : '' }}">
                    <a href="{{ url('admin/news') }}" class="menu-link">
                        <i class='bx bx-news'></i>
                        <div data-i18n="Basic">Postingan</div>
                    </a>
                </li>

                @role('superadmin|admin')
                <li
                    class="menu-item {{ (Str::contains(Request::url(), ['component', 'frontmenu', 'relatedlink', 'settings', 'themes', 'user', 'bidang', 'myprofile'])) ? 'active open' : '' }}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-layout"></i>
                        <div data-i18n="Website">Website</div>
                    </a>

                    <ul class="menu-sub">
                        <li class="menu-item {{ (Str::contains(Request::url(), 'component')) ? 'active' : '' }}">
                            <a class="menu-link" href="{{ route('component.index') }}">
                                <div data-i18n="Komponen">Komponen</div>
                            </a>
                        </li>
                        <li class="menu-item {{ (Str::contains(Request::url(), 'relatedlink')) ? 'active' : '' }}">
                            <a class="menu-link" href="{{ route('relatedlink.index') }}">
                                Link Terkait</a>
                        </li>
                        <li class="menu-item {{ (Str::contains(Request::url(), 'frontmenu')) ? 'active' : '' }}">
                            <a class="menu-link" href="{{ route('frontmenu.index') }}">
                                <div data-i18n="Menu">Menu</div>
                            </a>
                        </li>
                        <li class="menu-item {{ (Str::contains(Request::url(), 'settings')) ? 'active' : '' }}">
                            <a class="menu-link" href="{{ route('settings.index') }}">
                                Pengaturan Web</a>
                        </li>
                        @role('superadmin')
                        <li class="menu-item {{ (Str::contains(Request::url(), 'themes')) ? 'active' : '' }}">
                            <a class="menu-link" href="{{ route('themes.index') }}">
                                Tema</a>
                        </li>
                        @endrole
                        <li
                            class="menu-item {{ (Str::contains(Request::url(), ['user', 'bidang', 'myprofile'])) ? 'active' : '' }}">
                            <a class="menu-link" href="{{ route('user.index') }}">
                                Pengguna</a>
                        </li>
                    </ul>
                </li>
                @endrole

            </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
            <!-- Navbar -->

            <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                id="layout-navbar">
                <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                        <i class="bx bx-menu bx-sm"></i>
                    </a>
                </div>

                <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                    <!-- Search -->
                    <div class="navbar-nav align-items-center">
                        <div class="nav-item d-flex align-items-center">
                            <i class="bx bx-search fs-4 lh-0"></i>
                            <input type="text" class="form-control border-0 shadow-none" placeholder="Search..."
                                aria-label="Search..." />
                        </div>
                    </div>
                    <!-- /Search -->

                    <ul class="navbar-nav flex-row align-items-center ms-auto">
                        <!-- Place this tag where you want the button to render. -->
                        <!-- User -->
                        <li class="nav-item navbar-dropdown dropdown-user dropdown">
                            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                data-bs-toggle="dropdown">
                                <div class="avatar avatar-online">
                                    @if(auth()->user()->profile_photo_path)
                                    <img src="{{ asset('storage') }}/{{ auth()->user()->profile_photo_path }}"
                                        class="w-px-40 h-auto rounded-circle" />
                                    @else
                                    <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}"
                                        class="w-px-40 h-auto rounded-circle">
                                    @endif
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar avatar-online">
                                                    @if(auth()->user()->profile_photo_path)
                                                    <img src="{{ asset('storage') }}/{{ auth()->user()->profile_photo_path }}"
                                                        class="w-px-40 h-auto rounded-circle" />
                                                    @else
                                                    <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}"
                                                        class="w-px-40 h-auto rounded-circle">
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <span class="fw-semibold d-block">{{ auth()->user()->name }}</span>
                                                <small class="text-muted">{{ auth()->user()->email }}</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('myprofile.edit', auth()->user()->id) }}">
                                        <i class="bx bx-user me-2"></i>
                                        <span class="align-middle">My Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a id="btn-logout" class="dropdown-item">
                                        <i class="bx bx-power-off me-2"></i>
                                        <span class="align-middle">Log Out</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!--/ User -->
                    </ul>
                </div>
            </nav>

            <!-- / Navbar -->


            <!-- Content wrapper -->
            <div class="content-wrapper">