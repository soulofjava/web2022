<!-- Favicons -->
@if($data_website->favicon == 'assets/pemda.ico')
<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('') }}{{ $data_website->favicon }}" />
<link rel="icon" type="image/png" href="{{ asset('') }}{{ $data_website->favicon }}" />
@else
<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('storage') }}/{{ $data_website->favicon }}" />
<link rel="icon" type="image/png" href="{{ asset('storage') }}/{{ $data_website->favicon }}" />
@endif

<link rel="stylesheet" href="{{ asset('assets/front/blubuild/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/front/blubuild/css/flaticon.css') }}">
<link rel="stylesheet" href="{{ asset('assets/front/blubuild/css/animate.min.css') }}">
<!-- <link href="{{ asset('assets/front/flexstart/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"> -->
<link rel="stylesheet" href="{{ asset('assets/front/blubuild/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/front/blubuild/css/jquery.fancybox.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/front/blubuild/css/perfect-scrollbar.css') }}">
<link rel="stylesheet" href="{{ asset('assets/front/blubuild/css/slick.css') }}">
<link rel="stylesheet" href="{{ asset('assets/front/blubuild/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/front/blubuild/css/responsive.css') }}">
<link rel="stylesheet" href="{{ asset('assets/front/blubuild/css/color.css') }}">

<!-- datatable -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

<!-- ambil dari template lain -->
<link href="{{ asset('assets/front/arsha/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">