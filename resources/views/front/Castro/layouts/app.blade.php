<!DOCTYPE html>
<html lang="en">

<head>
    @include('front.Castro.include.meta')
    @stack('before-style')
    @include('front.Castro.include.style')
    @stack('after-style')
    @vite([])
    @livewireStyles
</head>


<!-- page wrapper -->

<body>
    <div class="boxed_wrapper">
        <a href="#" id="websitename" hidden>{{ $data_website->web_name }}</a>
        @include('sweetalert::alert')
        @include('front.Castro.include.header')
        @yield('content')
        @stack('before-script')
        @include('front.Castro.include.footer')
        @include('front.Castro.include.script')
        @stack('after-script')
    </div>
</body>

</html>