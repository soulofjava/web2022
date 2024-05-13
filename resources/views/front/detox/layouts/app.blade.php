<!DOCTYPE html>
<html lang="en">

<head>
    @include('front.detox.include.meta')
    @stack('before-style')
    @include('front.detox.include.style')
    @stack('after-style')
</head>

<body>
    <a href="#" id="websitename" hidden>{{ $data_website->web_name }}</a>
    @include('front.detox.include.header')
    @yield('content')
    @include('front.detox.include.footer')
    @stack('before-script')
    @include('front.detox.include.script')
    @include('components.responsive-voice')
    @stack('after-script')
</body>

</html>