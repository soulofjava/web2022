<!DOCTYPE html>
<html lang="en">

<head>
    @include('front.flexstart.includes.meta')
    @stack('before-style')
    @include('front.flexstart.includes.style')
    @stack('after-style')
</head>

<body>
    <a href="#" id="websitename" hidden>{{ $data_website->web_name }}</a>
    @include('sweetalert::alert')
    @include('front.flexstart.includes.header')
    @yield('content')
    @include('front.flexstart.includes.footer')
    @stack('before-script')
    @include('front.flexstart.includes.script')
    @stack('after-script')
</body>

</html>