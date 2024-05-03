<!DOCTYPE html>
<html lang="en">

<head>
    @include('front.deluck.includes.meta')
    @include('front.deluck.includes.style')
</head>

<body>
    <!-- Preloader Start -->
    <div class="se-pre-con"></div>
    <!-- Preloader Ends -->
    @include('front.deluck.includes.header')
    @yield('content')
    @include('front.deluck.includes.footer')
    @include('front.deluck.includes.script')
</body>

</html>