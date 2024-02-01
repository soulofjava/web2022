<!DOCTYPE html>
<html lang="en">

<head>
    @include('front.appway.includes.meta')
    @stack('before-style')
    @include('front.appway.includes.style')
    @stack('after-style')
</head>

<body class="boxed_wrapper">
    <a href="#" id="websitename" hidden>{{ $data_website->web_name }}</a>
    @include('sweetalert::alert')
    @include('front.appway.includes.header')
    @yield('content')
    @include('front.appway.includes.footer')
    @stack('before-script')
    @include('front.appway.includes.script')
    @include('components.responsive-voice')
    @stack('after-script')
</body>

</html>