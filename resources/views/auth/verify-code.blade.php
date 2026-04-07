<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email</title>
    <!-- {{-- Favicon --}} -->
    <link rel="icon" type="image/png" href="{{ asset('imagees/fav.png') }}">
    
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
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
                        <div class="login-logo text-center mb-4">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('imagees/logo-new-BIG.png') }}" alt="logo">
                            </a>
                        </div>

                        <!-- Inner Content -->
                        <div class="login-inner-content">
                            <div class="login-userheading">
                                <h3>Email Verification</h3>
                                <h4>Please enter the 6-digit code sent to your email</h4>
                            </div>

                            <!-- OTP Form -->
                            <form method="POST" action="{{ route('verify.code.submit') }}">
                                @csrf
                                <div class="form-login">
                                    <label>Verification Code</label>
                                    <div class="form-addons">
                                        <input type="text" name="code" maxlength="6" placeholder="Enter 6-digit code" required>
                                    </div>

                                    @error('code')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                    @if(session('success'))
                                    <small class="text-success">{{ session('success') }}</small>
                                    @endif
                                </div>

                                <div class="form-login mt-3">
                                    <button type="submit" class="btn btn-login w-100">Verify</button>
                                </div>
                            </form>

                            <!-- Additional Links -->
                            <div class="signinform mt-4">
                                <h4>
                                    Didn’t receive the code?
                                    <a href="{{ route('resend.otp') }}" class="hover-a">Resend</a>
                                </h4>

                                <!--<p class="mt-3">-->
                                <!--    Want to use a different account or register again? <br>-->
                                <!--    <a href="{{ route('login') }}" class="hover-a">Login</a> | -->
                                <!--    <a href="{{ route('register') }}" class="hover-a">Register</a>-->
                                <!--</p>-->

                                <!-- Logout Button -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-danger w-100 mt-2">Go Back</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Image -->
                <div class="login-img">
                    <img src="{{ asset('assets/img/login.jpg') }}" alt="login">
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
