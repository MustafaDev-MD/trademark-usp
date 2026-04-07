<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

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
                                <h3>Sign In</h3>
                                <h4>Please login to your account</h4>
                            </div>

                            <!-- {{-- BREEZE LOGIN FORM --}} -->
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <!-- {{-- Email --}} -->
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

                                <!-- {{-- Password --}} -->
                                <div class="form-login">
                                    <label>Password</label>
                                    <div class="pass-group">
                                        <input
                                            type="password"
                                            name="password"
                                            class="pass-input"
                                            placeholder="Enter your password"
                                            required>
                                        <span class="fas toggle-password fa-eye-slash"></span>
                                    </div>

                                    @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- {{-- Forgot password --}} -->
                                <div class="form-login">
                                    <div class="alreadyuser">
                                        @if (Route::has('password.request'))
                                        <h4>
                                            <a href="{{ route('password.request') }}" class="hover-a">
                                                Forgot Password?
                                            </a>
                                        </h4>
                                        @endif
                                    </div>
                                </div>

                                <!-- {{-- Submit --}} -->
                                <div class="form-login">
                                    <button type="submit" id="submitBtn" class="btn btn-login w-100">
                                        Sign In
                                    </button>
                                </div>
                            </form>

                            <!-- {{-- Register --}} -->
                            <div class="signinform text-start">
                                <h4>
                                    Don’t have an account?
                                    <a href="{{ route('register') }}" class="hover-a">Sign Up</a>
                                </h4>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- {{-- Right image --}} -->
                <div class="login-img">
                    <img src="{{ asset('assets/img/login.png') }}" alt="login">
                </div>

            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const form = document.querySelector('form');
            const submitBtn = document.getElementById('submitBtn');

            function checkFormValidity() {
                const formValid = form.checkValidity();

                submitBtn.disabled = !(formValid);
            }

            // IMPORTANT: run once on page load
            checkFormValidity();

            // Run on typing
            form.addEventListener('input', checkFormValidity);
            terms.addEventListener('change', checkFormValidity);
        });

        document.addEventListener('DOMContentLoaded', function() {

            document.querySelectorAll('.toggle-password').forEach(function(icon) {

                icon.addEventListener('click', function() {

                    const input = this.previousElementSibling;

                    if (input.type === 'password') {
                        input.type = 'text';
                        this.classList.remove('fa-eye-slash');
                        this.classList.add('fa-eye');
                    } else {
                        input.type = 'password';
                        this.classList.remove('fa-eye');
                        this.classList.add('fa-eye-slash');
                    }
                });
            });

        });
    </script>

    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}?v={{ time() }}"></script>

</body>

</html>