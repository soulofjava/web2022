<!DOCTYPE html>
<html lang="en">

<head>
    @include('back.a.includes.meta')
    <title>{{ $data_website->web_name }}</title>
    @stack('before-style')
    @include('back.a.includes.style')
    @stack('after-style')
    @vite([])
</head>

<body>
    @include('sweetalert::alert')
    <script src="{{ asset('assets/back/md/assets/js/preloader.js') }}"></script>
    <div class="body-wrapper">
        @include('back.a.includes.header')
        @yield('content')
        @include('back.a.includes.footer')
        @stack('before-script')
        @include('back.a.includes.script')
        @stack('after-script')
    </div>
</body>

</html>