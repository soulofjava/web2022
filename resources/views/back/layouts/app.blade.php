<!DOCTYPE html>
<html lang="en">

<head>
    @include('back.includes.meta')

    <title>{{ $data_website->web_name }}</title>

    @stack('before-style')
    @include('back.includes.style')
    @stack('after-style')
</head>

<body>
    @auth
    @include('back.includes.header')
    @endauth
    @yield('content')
    @include('back.includes.footer')
    @stack('before-script')
    @include('back.includes.script')
    @stack('after-script')

</body>

</html>