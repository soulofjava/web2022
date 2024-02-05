<!DOCTYPE html>
<html lang="en">

<head>
    @include('front.includes.meta')
    @stack('before-style')
    @include('front.includes.style')
    @stack('after-style')
    @vite([])
    @livewireStyles
</head>

<body>
    <a href="#" id="websitename" hidden>{{ $data_website->web_name }}</a>
    @include('sweetalert::alert')
    @include('front.includes.header')
    @yield('content')
    @include('front.includes.footer')
    @stack('before-script')
    @include('front.includes.script')
    @include('components.responsive-voice')
    @stack('after-script')
    @livewireScripts
</body>

</html>