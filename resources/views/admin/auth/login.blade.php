<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body class="account-page">

    <div class="main-wrapper">
        <div class="account-content">
            <div class="login-wrapper">
                <div class="login-content">
                    <div class="login-userset">

                        <div class="login-logo">
                            <img src="{{ asset('assets/img/logo.png') }}">
                        </div>

                        <div class="login-userheading">
                            <h3>Admin Login</h3>
                            <h4>Only authorized access</h4>
                        </div>

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            {{ $errors->first() }}
                        </div>
                        @endif

                        <form method="POST" action="{{ route('admin.login.submit') }}">
                            @csrf

                            <div class="form-login">
                                <label>Email</label>
                                <input type="email" name="email" required>
                            </div>

                            <div class="form-login">
                                <label>Password</label>
                                <input type="password" name="password" required>
                            </div>

                            <div class="form-login">
                                <button class="btn btn-login w-100">Login</button>
                            </div>
                        </form>

                    </div>
                </div>

                <div class="login-img">
                    <img src="{{ asset('assets/img/login.jpg') }}">
                </div>
            </div>
        </div>
    </div>

</body>

</html>