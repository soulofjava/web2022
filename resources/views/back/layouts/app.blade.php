<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('assets/back/sneat/assets/') }}"
  data-template="vertical-menu-template-free"
>

<head>
    @include('back.includes.meta')

    <title>{{ $data_website->web_name }}</title>

    @stack('before-style')
    @include('back.includes.style')
    @stack('after-style')
    @vite([])
</head>

<body>
    @auth
    @include('back.includes.header')
    @endauth
    @yield('content')
    @include('back.includes.footer')
    @stack('before-script')
    @include('back.includes.script')
    @stack('after-script')
</body>

</html>