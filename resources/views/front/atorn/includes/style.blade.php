<!-- Favicons -->
@if($data_website->favicon == 'assets/pemda.ico')
<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('') }}{{ $data_website->favicon }}" />
<link rel="icon" type="image/png" href="{{ asset('') }}{{ $data_website->favicon }}" />
@else
<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('storage') }}/{{ $data_website->favicon }}" />
<link rel="icon" type="image/png" href="{{ asset('storage') }}/{{ $data_website->favicon }}" />
@endif

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{ asset('assets/front/atorn/assets/css/bootstrap.min.css') }}">
<!-- Animate CSS -->
<link rel="stylesheet" href="{{ asset('assets/front/atorn/assets/css/animate.min.css') }}">
<!-- Meanmenu CSS -->
<link rel="stylesheet" href="{{ asset('assets/front/atorn/assets/css/meanmenu.min.css') }}">
<!-- Line Awesome CSS -->
<link rel="stylesheet" href="{{ asset('assets/front/atorn/assets/css/line-awesome.min.css') }}">
<!-- Magnific CSS -->
<link rel="stylesheet" href="{{ asset('assets/front/atorn/assets/css/magnific-popup.css') }}">
<!-- Owl Carousel CSS -->
<link rel="stylesheet" href="{{ asset('assets/front/atorn/assets/css/owl.carousel.min.css') }}">
<!-- Owl Theme CSS -->
<link rel="stylesheet" href="{{ asset('assets/front/atorn/assets/css/owl.theme.default.min.css') }}">
<!-- Odometer CSS -->
<link rel="stylesheet" href="{{ asset('assets/front/atorn/assets/css/odometer.css') }}">
<!-- Stylesheet CSS -->
<link rel="stylesheet" href="{{ asset('assets/front/atorn/assets/css/style.css') }}">
<!-- Stylesheet Responsive CSS -->
<link rel="stylesheet" href="{{ asset('assets/front/atorn/assets/css/responsive.css') }}">
<!-- Theme Dark CSS -->
<link rel="stylesheet" href="{{ asset('assets/front/atorn/assets/css/theme-dark.css') }}">
<!-- Favicon -->
<!-- <link rel="icon" type="image/png" href="{{ asset('assets/front/atorn/assets/img/favicon.png') }}"> -->

<!-- datatable -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

<!-- ambil dari template lain -->
<link href="{{ asset('assets/front/arsha/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">