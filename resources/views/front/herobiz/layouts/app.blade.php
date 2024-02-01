<!DOCTYPE html>
<html lang="en">

<head>
    @include('front.herobiz.includes.meta')
    @stack('before-style')
    @include('front.herobiz.includes.style')
    @stack('after-style')
</head>

<body>
    <a href="#" id="websitename" hidden>{{ $data_website->web_name }}</a>
    @include('sweetalert::alert')
    @include('front.herobiz.includes.header')
    @yield('content')
    @include('front.herobiz.includes.footer')
    @stack('before-script')
    @include('front.herobiz.includes.script')
    @include('components.responsive-voice')
    @stack('after-script')
</body>

</html>