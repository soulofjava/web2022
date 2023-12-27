<!DOCTYPE html>
<html lang="en">

<head>
    @include('front.buildco.includes.meta')
    @stack('before-style')
    @include('front.buildco.includes.style')
    @stack('after-style')
    @vite([])
    @livewireStyles
</head>

<body>
    <a href="#" id="websitename" hidden>{{ $data_website->web_name }}</a>
    @include('sweetalert::alert')
    @include('front.buildco.includes.header')
    @yield('content')
    @include('front.buildco.includes.footer')
    @stack('before-script')
    @include('front.buildco.includes.script')
    @include('components.responsive-voice')
    @stack('after-script')
    @livewireScripts
</body>

</html>