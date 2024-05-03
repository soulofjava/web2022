<!DOCTYPE html>
<html lang="en">

<head>
    @include('front.castro.includes.meta')
    @stack('before-style')
    @include('front.castro.includes.style')
    @stack('after-style')
    @vite([])
    @livewireStyles
</head>


<!-- page wrapper -->

<body>
    <div class="boxed_wrapper">
        <a href="#" id="websitename" hidden>{{ $data_website->web_name }}</a>
        @include('sweetalert::alert')
        @include('front.castro.includes.header')
        @yield('content')
        @stack('before-script')
        @include('front.castro.includes.footer')
        @include('front.castro.includes.script')
        @stack('after-script')
    </div>
</body>

</html>