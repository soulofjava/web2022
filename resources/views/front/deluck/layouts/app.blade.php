<!DOCTYPE html>
<html lang="en">

<head>
    @include('front.deluck.includes.meta')
    @stack('before-style')
    @include('front.deluck.includes.style')
    @stack('after-style')
</head>

<body>
    <!-- Preloader Start -->
    <div class="se-pre-con"></div>
    <!-- Preloader Ends -->
    <a href="#" id="websitename" hidden>{{ $data_website->web_name }}</a>
    @include('sweetalert::alert')
    @include('front.deluck.includes.header')
    @yield('content')
    @include('front.deluck.includes.footer')
    @stack('before-script')
    @include('front.deluck.includes.script')
    @stack('after-script')
</body>

</html>