<!DOCTYPE html>
<html lang="en">

<head>
    @include('front.blubuild.includes.meta')
    @stack('before-style')
    @include('front.blubuild.includes.style')
    @stack('after-style')
    @vite([])
</head>

<body>
    <main>
        <a href="#" id="websitename" hidden>{{ $data_website->web_name }}</a>
        @include('sweetalert::alert')
        @include('front.blubuild.includes.header')
        @yield('content')
        @include('front.blubuild.includes.footer')
        @stack('before-script')
        @include('front.blubuild.includes.script')
        @include('components.responsive-voice')
        @stack('after-script')
    </main>
</body>

</html>