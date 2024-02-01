<!-- partial:partials/_sidebar.html -->
<aside class="mdc-drawer mdc-drawer--dismissible mdc-drawer--open">
    <div class="mdc-drawer__header">
        <a target="_blank" href="{{ url('/') }}" class="brand-logo">
            <img src="{{ asset('assets/back/md/assets/images/logo.svg') }}" alt="logo">
        </a>
    </div>
    <div class="mdc-drawer__content">
        <div class="user-info">
            <p class="name">Clyde Miles</p>
            <p class="email">clydemiles@elenor.us</p>
        </div>
        <div class="mdc-list-group">
            <nav class="mdc-list mdc-drawer-menu">
                <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link" href="{{ route('dashboard') }}">
                        <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon"
                            aria-hidden="true">home</i>
                        Dashboard
                    </a>
                </div>
                <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link {{ (Str::contains(Request::url(), 'news')) ? 'active' : '' }}"
                        href="{{ route('news.index') }}">
                        <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon"
                            aria-hidden="true">event_note</i>
                        Postingan
                    </a>
                </div>
                <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link" href="pages/forms/basic-forms.html">
                        <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon"
                            aria-hidden="true">track_changes</i>
                        Forms
                    </a>
                </div>
                <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-expansion-panel-link" href="#" data-toggle="expansionPanel" data-target="ui-sub-menu">
                        <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon"
                            aria-hidden="true">dashboard</i>
                        UI Features
                        <i class="mdc-drawer-arrow material-icons">chevron_right</i>
                    </a>
                    <div class="mdc-expansion-panel" id="ui-sub-menu">
                        <nav class="mdc-list mdc-drawer-submenu">
                            <div class="mdc-list-item mdc-drawer-item">
                                <a class="mdc-drawer-link" href="pages/ui-features/buttons.html">
                                    Buttons
                                </a>
                            </div>
                            <div class="mdc-list-item mdc-drawer-item">
                                <a class="mdc-drawer-link" href="pages/ui-features/typography.html">
                                    Typography
                                </a>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link" href="pages/tables/basic-tables.html">
                        <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon"
                            aria-hidden="true">grid_on</i>
                        Tables
                    </a>
                </div>
                <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link" href="pages/charts/chartjs.html">
                        <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon"
                            aria-hidden="true">pie_chart_outlined</i>
                        Charts
                    </a>
                </div>
                <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-expansion-panel-link" href="#" data-toggle="expansionPanel"
                        data-target="sample-page-submenu">
                        <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon"
                            aria-hidden="true">pages</i>
                        Sample Pages
                        <i class="mdc-drawer-arrow material-icons">chevron_right</i>
                    </a>
                    <div class="mdc-expansion-panel" id="sample-page-submenu">
                        <nav class="mdc-list mdc-drawer-submenu">
                            <div class="mdc-list-item mdc-drawer-item">
                                <a class="mdc-drawer-link" href="pages/samples/blank-page.html">
                                    Blank Page
                                </a>
                            </div>
                            <div class="mdc-list-item mdc-drawer-item">
                                <a class="mdc-drawer-link" href="pages/samples/403.html">
                                    403
                                </a>
                            </div>
                            <div class="mdc-list-item mdc-drawer-item">
                                <a class="mdc-drawer-link" href="pages/samples/404.html">
                                    404
                                </a>
                            </div>
                            <div class="mdc-list-item mdc-drawer-item">
                                <a class="mdc-drawer-link" href="pages/samples/500.html">
                                    500
                                </a>
                            </div>
                            <div class="mdc-list-item mdc-drawer-item">
                                <a class="mdc-drawer-link" href="pages/samples/505.html">
                                    505
                                </a>
                            </div>
                            <div class="mdc-list-item mdc-drawer-item">
                                <a class="mdc-drawer-link" href="pages/samples/login.html">
                                    Login
                                </a>
                            </div>
                            <div class="mdc-list-item mdc-drawer-item">
                                <a class="mdc-drawer-link" href="pages/samples/register.html">
                                    Register
                                </a>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link"
                        href="https://www.bootstrapdash.com/demo/material-admin-free/jquery/documentation/documentation.html"
                        target="_blank">
                        <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon"
                            aria-hidden="true">description</i>
                        Documentation
                    </a>
                </div>
            </nav>
        </div>
        <div class="profile-actions">
            <a href="javascript:;">Settings</a>
            <span class="divider"></span>
            <a href="javascript:;">Logout</a>
        </div>
        <div class="mdc-card premium-card">
            <div class="d-flex align-items-center">
                <div class="mdc-card icon-card box-shadow-0">
                    <i class="mdi mdi-shield-outline"></i>
                </div>
                <div>
                    <p class="mt-0 mb-1 ml-2 font-weight-bold tx-12">Material Dash</p>
                    <p class="mt-0 mb-0 ml-2 tx-10">Pro available</p>
                </div>
            </div>
            <p class="tx-8 mt-3 mb-1">More elements. More Pages.</p>
            <p class="tx-8 mb-3">Starting from $25.</p>
            <a href="https://www.bootstrapdash.com/product/material-design-admin-template/" target="_blank">
                <span class="mdc-button mdc-button--raised mdc-button--white">Upgrade to Pro</span>
            </a>
        </div>
    </div>
</aside>
<!-- partial -->
<div class="main-wrapper mdc-drawer-app-content">
    <!-- partial:../../partials/_navbar.html -->
    <header class="mdc-top-app-bar">
        <div class="mdc-top-app-bar__row">
            <div class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
                <button
                    class="material-icons mdc-top-app-bar__navigation-icon mdc-icon-button sidebar-toggler">menu</button>
                <span class="mdc-top-app-bar__title">Greetings Clyde!</span>
                <div
                    class="mdc-text-field mdc-text-field--outlined mdc-text-field--with-leading-icon search-text-field d-none d-md-flex">
                    <i class="material-icons mdc-text-field__icon">search</i>
                    <input class="mdc-text-field__input" id="text-field-hero-input">
                    <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                        <div class="mdc-notched-outline__leading"></div>
                        <div class="mdc-notched-outline__notch">
                            <label for="text-field-hero-input" class="mdc-floating-label" style="">Search..</label>
                        </div>
                        <div class="mdc-notched-outline__trailing"></div>
                    </div>
                </div>
            </div>
            <div class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end mdc-top-app-bar__section-right">
                <div class="menu-button-container menu-profile d-none d-md-block">
                    <button class="mdc-button mdc-menu-button mdc-ripple-upgraded">
                        <span class="d-flex align-items-center">
                            <span class="figure">
                                <img src="{{ asset('assets/back/md/assets/images/faces/face1.jpg') }}" alt="user" class="user">
                            </span>
                            <span class="user-name">Clyde Miles</span>
                        </span>
                    </button>
                    <div class="mdc-menu mdc-menu-surface" tabindex="-1">
                        <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical">
                            <li class="mdc-list-item" role="menuitem" tabindex="-1">
                                <div class="item-thumbnail item-thumbnail-icon-only">
                                    <i class="mdi mdi-account-edit-outline text-primary"></i>
                                </div>
                                <div class="item-content d-flex align-items-start flex-column justify-content-center">
                                    <h6 class="item-subject font-weight-normal">Edit profile</h6>
                                </div>
                            </li>
                            <li class="mdc-list-item" role="menuitem" tabindex="-1">
                                <div class="item-thumbnail item-thumbnail-icon-only">
                                    <i class="mdi mdi-settings-outline text-primary"></i>
                                </div>
                                <div class="item-content d-flex align-items-start flex-column justify-content-center">
                                    <h6 class="item-subject font-weight-normal">Logout</h6>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="divider d-none d-md-block"></div>
                <div class="menu-button-container d-none d-md-block">
                    <button class="mdc-button mdc-menu-button mdc-ripple-upgraded">
                        <i class="mdi mdi-settings"></i>
                    </button>
                    <div class="mdc-menu mdc-menu-surface" tabindex="-1">
                        <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical">
                            <li class="mdc-list-item" role="menuitem" tabindex="-1">
                                <div class="item-thumbnail item-thumbnail-icon-only">
                                    <i class="mdi mdi-alert-circle-outline text-primary"></i>
                                </div>
                                <div class="item-content d-flex align-items-start flex-column justify-content-center">
                                    <h6 class="item-subject font-weight-normal">Settings</h6>
                                </div>
                            </li>
                            <li class="mdc-list-item" role="menuitem" tabindex="-1">
                                <div class="item-thumbnail item-thumbnail-icon-only">
                                    <i class="mdi mdi-progress-download text-primary"></i>
                                </div>
                                <div class="item-content d-flex align-items-start flex-column justify-content-center">
                                    <h6 class="item-subject font-weight-normal">Update</h6>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="menu-button-container">
                    <button class="mdc-button mdc-menu-button mdc-ripple-upgraded">
                        <i class="mdi mdi-bell"></i>
                    </button>
                    <div class="mdc-menu mdc-menu-surface" tabindex="-1">
                        <h6 class="title"> <i class="mdi mdi-bell-outline mr-2 tx-16"></i> Notifications</h6>
                        <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical">
                            <li class="mdc-list-item" role="menuitem" tabindex="-1">
                                <div class="item-thumbnail item-thumbnail-icon">
                                    <i class="mdi mdi-email-outline"></i>
                                </div>
                                <div class="item-content d-flex align-items-start flex-column justify-content-center">
                                    <h6 class="item-subject font-weight-normal">You received a new message</h6>
                                    <small class="text-muted"> 6 min ago </small>
                                </div>
                            </li>
                            <li class="mdc-list-item" role="menuitem" tabindex="-1">
                                <div class="item-thumbnail item-thumbnail-icon">
                                    <i class="mdi mdi-account-outline"></i>
                                </div>
                                <div class="item-content d-flex align-items-start flex-column justify-content-center">
                                    <h6 class="item-subject font-weight-normal">New user registered</h6>
                                    <small class="text-muted"> 15 min ago </small>
                                </div>
                            </li>
                            <li class="mdc-list-item" role="menuitem" tabindex="-1">
                                <div class="item-thumbnail item-thumbnail-icon">
                                    <i class="mdi mdi-alert-circle-outline"></i>
                                </div>
                                <div class="item-content d-flex align-items-start flex-column justify-content-center">
                                    <h6 class="item-subject font-weight-normal">System Alert</h6>
                                    <small class="text-muted"> 2 days ago </small>
                                </div>
                            </li>
                            <li class="mdc-list-item" role="menuitem" tabindex="-1">
                                <div class="item-thumbnail item-thumbnail-icon">
                                    <i class="mdi mdi-update"></i>
                                </div>
                                <div class="item-content d-flex align-items-start flex-column justify-content-center">
                                    <h6 class="item-subject font-weight-normal">You have a new update</h6>
                                    <small class="text-muted"> 3 days ago </small>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="menu-button-container">
                    <button class="mdc-button mdc-menu-button mdc-ripple-upgraded">
                        <i class="mdi mdi-email"></i>
                        <span class="count-indicator">
                            <span class="count">3</span>
                        </span>
                    </button>
                    <div class="mdc-menu mdc-menu-surface" tabindex="-1">
                        <h6 class="title"><i class="mdi mdi-email-outline mr-2 tx-16"></i> Messages</h6>
                        <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical">
                            <li class="mdc-list-item" role="menuitem" tabindex="-1">
                                <div class="item-thumbnail">
                                    <img src="{{ asset('assets/back/md/assets/images/faces/face4.jpg') }}" alt="user">
                                </div>
                                <div class="item-content d-flex align-items-start flex-column justify-content-center">
                                    <h6 class="item-subject font-weight-normal">Mark send you a message</h6>
                                    <small class="text-muted"> 1 Minutes ago </small>
                                </div>
                            </li>
                            <li class="mdc-list-item" role="menuitem" tabindex="-1">
                                <div class="item-thumbnail">
                                    <img src="{{ asset('assets/back/md/assets/images/faces/face2.jpg') }}" alt="user">
                                </div>
                                <div class="item-content d-flex align-items-start flex-column justify-content-center">
                                    <h6 class="item-subject font-weight-normal">Cregh send you a message</h6>
                                    <small class="text-muted"> 15 Minutes ago </small>
                                </div>
                            </li>
                            <li class="mdc-list-item" role="menuitem" tabindex="-1">
                                <div class="item-thumbnail">
                                    <img src="{{ asset('assets/back/md/assets/images/faces/face3.jpg') }}" alt="user">
                                </div>
                                <div class="item-content d-flex align-items-start flex-column justify-content-center">
                                    <h6 class="item-subject font-weight-normal">Profile picture updated</h6>
                                    <small class="text-muted"> 18 Minutes ago </small>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="menu-button-container d-none d-md-block">
                    <button class="mdc-button mdc-menu-button mdc-ripple-upgraded">
                        <i class="mdi mdi-arrow-down-bold-box"></i>
                    </button>
                    <div class="mdc-menu mdc-menu-surface" tabindex="-1">
                        <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical">
                            <li class="mdc-list-item" role="menuitem" tabindex="-1">
                                <div class="item-thumbnail item-thumbnail-icon-only">
                                    <i class="mdi mdi-lock-outline text-primary"></i>
                                </div>
                                <div class="item-content d-flex align-items-start flex-column justify-content-center">
                                    <h6 class="item-subject font-weight-normal">Lock screen</h6>
                                </div>
                            </li>
                            <li class="mdc-list-item" role="menuitem" tabindex="-1">
                                <div class="item-thumbnail item-thumbnail-icon-only">
                                    <i class="mdi mdi-logout-variant text-primary"></i>
                                </div>
                                <div class="item-content d-flex align-items-start flex-column justify-content-center">
                                    <h6 class="item-subject font-weight-normal">Logout</h6>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- partial -->
    <div class="page-wrapper mdc-toolbar-fixed-adjust">