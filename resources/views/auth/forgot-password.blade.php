<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>

    <!-- {{-- Favicon --}} -->
    <link rel="icon" type="image/png" href="{{ asset('imagees/fav.png') }}">

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

                        <div class="login-logo">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('imagees/logo-new-BIG.png') }}" alt="logo">
                            </a>
                        </div>

                        <div class="login-inner-content">
                            <div class="login-userheading">
                                <h3>Forgot Password?</h3>
                                <h4>No worries, we’ll send you reset instructions</h4>
                            </div>

                            <!-- {{-- Status message --}} -->
                            @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                            @endif

                            <!-- {{-- BREEZE FORGOT PASSWORD FORM --}} -->
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf

                                <div class="form-login">
                                    <label>Email</label>
                                    <div class="form-addons">
                                        <input
                                            type="email"
                                            name="email"
                                            value="{{ old('email') }}"
                                            placeholder="Enter your email address"
                                            required
                                            autofocus>
                                        <img src="{{ asset('assets/img/icons/mail.svg') }}" alt="mail">
                                    </div>

                                    @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-login">
                                    <button type="submit" id="submitBtn" class="btn btn-login w-100">
                                        Send Reset Link
                                    </button>
                                </div>
                            </form>

                            <div class="signinform text-start">
                                <h4>
                                    Remember your password?
                                    <a href="{{ route('login') }}" class="hover-a">Back to Login</a>
                                </h4>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="login-img">
                    <img src="{{ asset('assets/img/login.jpg') }}" alt="forgot-password">
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

    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}?v={{ time() }}"></script>

</body>

</html>