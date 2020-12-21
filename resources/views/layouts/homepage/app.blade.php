<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-4.3.1-dist/css/bootstrap.min.css') }}">

    <title>@yield('title')</title>
</head>

<body>




    <!-- Script JS -->
    <script src="{{ asset('css/src/assets/libs/popper/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('css/src/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('css/src/assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>




    <script src="{{ asset('css/date/jquery.datetimepicker.full.min.js') }}"></script>
    <script src="{{ asset('css/date/jquery.datetimepicker.min.js') }}"></script>

    <script src="{{ asset('css/src/dist/js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('css/src/dist/js/feather.min.js') }}"></script>
    <script src="{{ asset('css/src/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('css/src/dist/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('css/src/dist/js/custom.min.js') }}"></script>
    <script src="{{ asset('css/src/assets/extra-libs/c3/d3.min.js') }}"></script>
    <script src="{{ asset('css/src/assets/extra-libs/c3/c3.min.js') }}"></script>
    <script src="{{ asset('css/chart/dist/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('css/chart/dist/Chart.min.js') }}"></script>

    <script src="{{ asset('css/src/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('css/src/assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js') }}"></script>

    <script src="{{ asset('css/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('dist/yearpicker.js') }}"></script>
    {{-- datables --}}
    <script type="text/javascript" src="{{ asset('css/dataTables.min.js') }}"></script>
    {{-- datables --}}
    {{-- tag inputan --}}
    
    <!-- Amsify Plugin -->
    <script type="text/javascript" src="{{ asset('tag/jquery.amsify.suggestags.js') }}"></script>
    <script type="text/javascript" src="{{ asset('css/js/numeral.min.js') }}"></script>
    {{-- new --}}
    @yield('container')
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <link href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css" />
</body>

</html>