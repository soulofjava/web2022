<!DOCTYPE html>
<html lang="en">

<head>
    @include('front.buspro.include.meta')
    @stack('before-style')
    @include('front.buspro.include.style')
    @stack('after-style')
    @vite([])
</head>

<body>
    <a href="#" id="websitename" hidden>{{ $data_website->web_name }}</a>
    @include('sweetalert::alert')
    @include('front.buspro.include.header')
    @yield('content')
    @include('front.buspro.include.footer')
    @stack('before-script')
    @include('front.buspro.include.script')
    @stack('after-script')
</body>
</html>