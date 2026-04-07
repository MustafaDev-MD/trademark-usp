<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

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
                    <div class="login-userset register-userset">

                        <div class="login-logo">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('imagees/logo-new-BIG.png') }}" alt="logo">
                            </a>
                        </div>

                        <div class="login-inner-content register-inner-content">
                            <div class="login-userheading">
                                <h3>Sign Up</h3>
                                <h4>Create your account</h4>
                            </div>

                            <!-- {{-- BREEZE REGISTER FORM --}} -->
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                
                                <div class="row">
                                    <!-- Full Name -->
                                    <div class="col-md-6">
                                        <div class="form-login">
                                            <label for="name">Full Name</label>
                                            <input
                                                id="name"
                                                type="text"
                                                name="name"
                                                value="{{ old('name') }}"
                                                placeholder="Enter your full name"
                                                required
                                                autocomplete="name">
                                            @error('name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                
                                    <!-- Email -->
                                    <div class="col-md-6">
                                        <div class="form-login">
                                            <label for="email">Email</label>
                                            <div class="form-addons">
                                                <input
                                                    id="email"
                                                    type="email"
                                                    name="email"
                                                    value="{{ old('email') }}"
                                                    placeholder="Enter your email address"
                                                    required
                                                    autocomplete="email">
                                                <img src="{{ asset('assets/img/icons/mail.svg') }}" alt="mail">
                                            </div>
                                            @error('email')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <!-- {{-- Name --}} -->
                                <!--<div class="form-login">-->
                                <!--    <label>Full Name</label>-->
                                <!--    <input-->
                                <!--        type="text"-->
                                <!--        name="name"-->
                                <!--        value="{{ old('name') }}"-->
                                <!--        placeholder="Enter your full name"-->
                                <!--        required-->
                                <!--        autofocus>-->
                                <!--    @error('name')-->
                                <!--    <small class="text-danger">{{ $message }}</small>-->
                                <!--    @enderror-->
                                <!--</div>-->

                                <!-- {{-- Email --}} -->
                                <!--<div class="form-login">-->
                                <!--    <label>Email</label>-->
                                <!--    <div class="form-addons">-->
                                <!--        <input-->
                                <!--            type="email"-->
                                <!--            name="email"-->
                                <!--            value="{{ old('email') }}"-->
                                <!--            placeholder="Enter your email address"-->
                                <!--            required>-->
                                <!--        <img src="{{ asset('assets/img/icons/mail.svg') }}" alt="mail">-->
                                <!--    </div>-->
                                <!--    @error('email')-->
                                <!--    <small class="text-danger">{{ $message }}</small>-->
                                <!--    @enderror-->
                                <!--</div>-->
                                
                                <!-- {{-- Phone Number --}} -->
                                <!--<div class="form-login">-->
                                <!--    <label for="phone">Phone Number</label>-->
                                <!--    <input-->
                                <!--        id="phone"-->
                                <!--        type="tel"-->
                                <!--        name="phone"-->
                                <!--        value="{{ old('phone') }}"-->
                                <!--        placeholder="Enter your phone number"-->
                                <!--        required-->
                                <!--        autocomplete="tel">-->
                                <!--    @error('phone')-->
                                <!--        <small class="text-danger">{{ $message }}</small>-->
                                <!--    @enderror-->
                                <!--</div>-->
                                
                                <div class="row">
                                    <!-- Phone Number -->
                                    <div class="col-md-6">
                                        <div class="form-login">
                                            <label for="phone">Phone Number</label>
                                            <input
                                                id="phone"
                                                type="tel"
                                                name="phone"
                                                value="{{ old('phone') }}"
                                                placeholder="Enter your phone number"
                                                required
                                                autocomplete="tel">
                                            @error('phone')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                
                                    <!-- DOB -->
                                    <div class="col-md-6">
                                        <div class="form-login">
                                            <label for="dob">Date of Birth</label>
                                            <input
                                                id="dob"
                                                type="date"
                                                name="dob"
                                                value="{{ old('dob') }}"
                                                required>
                                            @error('dob')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                
                                <div class="row">
                                    <!-- Password -->
                                    <div class="col-md-6">
                                        <div class="form-login">
                                            <label for="password">Password</label>
                                            <div class="pass-group">
                                                <input
                                                    id="password"
                                                    type="password"
                                                    name="password"
                                                    class="pass-input"
                                                    placeholder="Enter your password"
                                                    required
                                                    autocomplete="new-password">
                                                <span class="fas toggle-password fa-eye-slash"></span>
                                            </div>
                                            @error('password')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                
                                    <!-- Confirm Password -->
                                    <div class="col-md-6">
                                        <div class="form-login">
                                            <div class="pass-group">
                                                <label for="confirm-password">Confirm Password</label>
                                                <input
                                                    id="password_confirmation"
                                                    type="password"
                                                    name="password_confirmation"
                                                    class="pass-input"
                                                    placeholder="Confirm your password"
                                                    required
                                                    autocomplete="new-password">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- {{-- Password --}} -->
                                <!--<div class="form-login">-->
                                <!--    <label>Password</label>-->
                                <!--    <div class="pass-group">-->
                                <!--        <input-->
                                <!--            type="password"-->
                                <!--            name="password"-->
                                <!--            class="pass-input"-->
                                <!--            placeholder="Enter your password"-->
                                <!--            required>-->
                                <!--        <span class="fas toggle-password fa-eye-slash"></span>-->
                                <!--    </div>-->
                                <!--    @error('password')-->
                                <!--    <small class="text-danger">{{ $message }}</small>-->
                                <!--    @enderror-->
                                <!--</div>-->

                                <!-- {{-- Confirm Password --}} -->
                                <!--<div class="form-login">-->
                                <!--    <label>Confirm Password</label>-->
                                <!--    <div class="pass-group">-->
                                <!--        <input-->
                                <!--            type="password"-->
                                <!--            name="password_confirmation"-->
                                <!--            class="pass-input"-->
                                <!--            placeholder="Confirm your password"-->
                                <!--            required>-->
                                <!--    </div>-->
                                <!--</div>-->

                                <!-- Terms & Privacy -->
                                <div class="form-login">
                                    <label class="checkboxs">
                                        <input type="checkbox" id="terms" name="terms" required>
                                        <span class="checkmarks"></span>
                                        I agree to Trademark USP Terms of Services & Privacy Policy
                                    </label>
                                    @error('terms')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                                <!-- {{-- Submit --}} -->
                                <div class="form-login">
                                    <button type="submit" id="submitBtn" class="btn btn-login w-100">
                                        Create Account
                                    </button>
                                </div>

                            </form>

                            <!-- {{-- Login link --}} -->
                            <div class="signinform text-start">
                                <h4>
                                    Already have an account?
                                    <a href="{{ route('login') }}" class="hover-a">Sign In</a>
                                </h4>
                            </div>
                        </div>


                    </div>
                </div>

                <!-- {{-- Right Image --}} -->
                <div class="login-img">
                    <img src="{{ asset('assets/img/login.jpg') }}" alt="register">
                </div>

            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}?v={{ time() }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const form = document.querySelector('form');
            const submitBtn = document.getElementById('submitBtn');
            const terms = document.getElementById('terms');

            function checkFormValidity() {
                const formValid = form.checkValidity();
                const termsChecked = terms.checked;

                submitBtn.disabled = !(formValid && termsChecked);
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



</body>

</html>