<!-- Favicons -->
@if($data_website->favicon == 'assets/pemda.ico')
<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('') }}{{ $data_website->favicon }}" />
<link rel="icon" type="image/png" href="{{ asset('') }}{{ $data_website->favicon }}" />
@else
<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('storage') }}/{{ $data_website->favicon }}" />
<link rel="icon" type="image/png" href="{{ asset('storage') }}/{{ $data_website->favicon }}" />
@endif
<!--====== Google Fonts ======-->
<link
    href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;500;600;700&family=Oswald:wght@300;400;500;600;700&display=swap"
    rel="stylesheet">

<!--====== Flaticon ======-->
<link rel="stylesheet" href="{{ asset('assets/front/css/flaticon.min.css') }}">
<!--====== Font Awesome ======-->
<link rel="stylesheet" href="{{ asset('assets/front/css/font-awesome-5.9.0.min.css') }}">
<!--====== Bootstrap ======-->
<link rel="stylesheet" href="{{ asset('assets/front/css/bootstrap-4.5.3.min.css') }}">
<!--====== Magnific Popup ======-->
<link rel="stylesheet" href="{{ asset('assets/front/css/magnific-popup.min.css') }}">
<!--====== Nice Select ======-->
<link rel="stylesheet" href="{{ asset('assets/front/css/nice-select.min.css') }}">
<!--====== jQuery UI ======-->
<link rel="stylesheet" href="{{ asset('assets/front/css/jquery-ui.min.css') }}">
<!--====== Animate ======-->
<link rel="stylesheet" href="{{ asset('assets/front/css/animate.min.css') }}">
<!--====== Slick ======-->
<link rel="stylesheet" href="{{ asset('assets/front/css/slick.min.css') }}">
<!--====== Main Style ======-->
<link rel="stylesheet" href="{{ asset('assets/front/css/style.css') }}">