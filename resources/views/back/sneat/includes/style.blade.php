@if($data_website->favicon == 'assets/pemda.ico')
<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('') }}{{ $data_website->favicon }}" />
<link rel="icon" type="image/png" href="{{ asset('') }}{{ $data_website->favicon }}" />
@else
<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('storage') }}/{{ $data_website->favicon }}" />
<link rel="icon" type="image/png" href="{{ asset('storage') }}/{{ $data_website->favicon }}" />
@endif

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />

<!-- Icons. Uncomment required icon fonts -->
<link rel="stylesheet" href="{{ asset('assets/back/sneat/assets/vendor/fonts/boxicons.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/back/sneat/assets/vendor/fonts/fontawesome.css') }}" />

<!-- Core CSS -->
<link rel="stylesheet" href="{{ asset('assets/back/sneat/assets/vendor/css/core.css') }}"
    class="template-customizer-core-css" />
<link rel="stylesheet" href="{{ asset('assets/back/sneat/assets/vendor/css/theme-default.css') }}"
    class="template-customizer-theme-css" />
<link rel="stylesheet" href="{{ asset('assets/back/sneat/assets/css/demo.css') }}" />

<!-- Vendors CSS -->
<link rel="stylesheet"
    href="{{ asset('assets/back/sneat/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/back/sneat/assets/vendor/libs/highlight/highlight.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/back/sneat/assets/vendor/libs/apex-charts/apex-charts.css') }}" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/docsearch.js@2/dist/cdn/docsearch.min.css" />
<link rel="stylesheet" href="{{ asset('assets/back/sneat/assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/back/sneat/assets/vendor/libs/flatpickr/flatpickr.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/back/sneat/assets/vendor/libs/select2/select2.css') }}" />

<!-- <link rel="stylesheet" href="{{ asset('assets/back/sneat/assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css') }}" /> -->
<!-- <link rel="stylesheet" href="{{ asset('assets/back/sneat/assets/vendor/libs/pickr/pickr-themes.css') }}" /> -->
<!-- <link rel="stylesheet"
    href="{{ asset('assets/back/sneat/assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css') }}" /> -->
<!-- <link rel="stylesheet"
    href="{{ asset('assets/back/sneat/assets/vendor/libs/jquery-timepicker/jquery-timepicker.css') }}" /> -->

<!-- Page CSS -->
<!-- Page -->
<link rel="stylesheet" href="{{ asset('assets/back/sneat/assets/vendor/css/pages/page-auth.css') }}" />

<!-- Datatable css -->
<link rel="stylesheet"
    href="{{ asset('assets/back/sneat/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
<link rel="stylesheet"
    href="{{ asset('assets/back/sneat/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
<link rel="stylesheet"
    href="{{ asset('assets/back/sneat/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}">
<link rel="stylesheet"
    href="{{ asset('assets/back/sneat/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
