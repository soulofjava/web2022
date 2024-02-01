<!DOCTYPE html>
<html lang="en">

<head>
    @include('front.atorn.includes.meta')
    @stack('before-style')
    @include('front.atorn.includes.style')
    @stack('after-style')
</head>

<body>
    <a href="#" id="websitename" hidden>{{ $data_website->web_name }}</a>
    @include('sweetalert::alert')
    @include('front.atorn.includes.header')
    @yield('content')
    @include('front.atorn.includes.footer')
    @stack('before-script')
    @include('front.atorn.includes.script')
    @include('components.responsive-voice')
    @stack('after-script')
</body>

</html>