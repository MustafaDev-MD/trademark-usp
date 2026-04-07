<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('imagees/fav.png') }}">

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}?v={{ time() }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body class="account-page">

    <div class="main-wrapper">
        <div class="account-content">
            <div class="login-wrapper">

                <div class="login-content">
                    <div class="login-userset">

                        <!-- Logo -->
                        <div class="login-logo">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('imagees/logo-new-BIG.png') }}" alt="logo">
                            </a>
                        </div>

                        <!--  AUTH PAGE CONTENT (LOGIN / RESET / VERIFY) -->
                        {{ $slot }}

                    </div>
                </div>

                <!-- Right Image -->
                <div class="login-img d-none d-md-block">
                    <img src="{{ asset('assets/img/login.jpg') }}" alt="login">
                </div>

            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const form = document.querySelector('form');
            const submitBtn = document.getElementById('submitBtn');
            // const terms = document.getElementById('terms');

            function checkFormValidity() {
                const formValid = form.checkValidity();
                // const termsChecked = terms.checked;

                submitBtn.disabled = !(formValid);
            }

            // IMPORTANT: run once on page load
            checkFormValidity();

            // Run on typing
            form.addEventListener('input', checkFormValidity);
            terms.addEventListener('change', checkFormValidity);
        });
    </script>

    <!-- JS -->
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}?v={{ time() }}"></script>

</body>

</html>