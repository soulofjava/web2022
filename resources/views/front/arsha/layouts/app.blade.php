<!DOCTYPE html>
<html lang="en">

<head>
    @include('front.arsha.includes.meta')
    @stack('before-style')
    @include('front.arsha.includes.style')
    @stack('after-style')
</head>

<body>
    <a href="#" id="websitename" hidden>{{ $data_website->web_name }}</a>
    @include('sweetalert::alert')
    @include('front.arsha.includes.header')
    @yield('content')
    @include('front.arsha.includes.footer')
    @stack('before-script')
    @include('front.arsha.includes.script')
    @include('components.responsive-voice')
    @stack('after-script')
</body>

</html>