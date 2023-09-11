<!-- Favicons -->
@if($data_website->favicon == 'assets/pemda.ico')
<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('') }}{{ $data_website->favicon }}" />
<link rel="icon" type="image/png" href="{{ asset('') }}{{ $data_website->favicon }}" />
@else
<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('storage') }}/{{ $data_website->favicon }}" />
<link rel="icon" type="image/png" href="{{ asset('storage') }}/{{ $data_website->favicon }}" />
@endif

<link rel="shortcut icon" href="{{ asset('assets/front/medino/images/logo/favicon.png') }}" type="image/x-icon">

<!-- CSS Files -->
<link rel="stylesheet" href="{{ asset('assets/front/medino/css/animate-3.7.0.css') }}">
<link rel="stylesheet" href="{{ asset('assets/front/medino/css/font-awesome-4.7.0.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/front/medino/css/bootstrap-4.1.3.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/front/medino/css/owl-carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/front/medino/css/jquery.datetimepicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/front/medino/css/linearicons.css') }}">
<link rel="stylesheet" href="{{ asset('assets/front/medino/css/style.css') }}">