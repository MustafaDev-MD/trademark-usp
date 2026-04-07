<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Admin Dashboard')</title>

    <!-- {{-- Favicon --}} -->
    <link rel="icon" type="image/png" href="{{ asset('imagees/fav.png') }}">

    <!-- {{-- CSS --}} -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">
    <!--<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">-->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}?v={{ time() }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">


</head>

<body>

<!--<div id="global-loader">-->
<!--    <div class="whirly-loader">-->
<!--        <img src="{{ asset('imagees/logo-new-BIG.png') }}" alt="Trademark USP Logo" class="main-nav-logo-image loader-logo">-->
<!--    </div>-->
<!--</div>-->
<div id="global-loader">
    <!-- Spinner ring -->
    <div class="whirly-loader"></div>

    <!-- Center image (static) -->
    <img src="{{ asset('imagees/Icon-new-BIG.webp') }}" alt="Trademark USP Logo" class="loader-logo">
</div>


<div class="main-wrapper">

    {{-- HEADER --}}
    <x-dashboard.header />

    {{-- SIDEBAR --}}
    <x-dashboard.sidebar />

    {{-- PAGE CONTENT --}}
    <div class="page-wrapper">
        <div class="content">
            @yield('content')
        </div>
    </div>

</div>

<!-- {{-- TAWK --}} -->
<script>
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/65380268f2439e1631e7f736/1hdhciqtf';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();

        function triggerChat() {
            if (typeof Tawk_API !== 'undefined') {
                Tawk_API.toggle();
            }
        }
    </script>

{{-- JS --}}
<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/feather.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('assets/plugins/apexchart/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/plugins/apexchart/chart-data.js') }}"></script>
<script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/plugins/sweetalert/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('assets/plugins/sweetalert/sweetalerts.min.js') }}"></script>


<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous"> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script> -->

<script src="{{ asset('assets/js/moment.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>

<!--<script src="{{ asset('assets/js/script.js') }}"></script>-->
<script src="{{ asset('assets/js/script.js') }}?v={{ time() }}"></script>

</body>
</html>
