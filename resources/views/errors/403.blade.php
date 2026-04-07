<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>403 | Unauthorized</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #192E5A 0%, #0f1f3d 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .error-card {
            background: #ffffff;
            border-radius: 5px;
            padding: 50px 45px;
            max-width: 520px;
            width: 100%;
            text-align: center;
            box-shadow: 0 25px 60px rgba(0,0,0,.25);
            animation: fadeUp .6s ease;
        }

        .error-badge {
            display: inline-block;
            background: rgba(247, 85, 49, 0.12);
            color: #F75531;
            padding: 8px 18px;
            border-radius: 5px;
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 18px;
        }

        .error-code {
            font-size: 96px;
            font-weight: 800;
            color: #192E5A;
            line-height: 1;
        }

        .error-title {
            font-size: 24px;
            font-weight: 600;
            color: #192E5A;
            margin: 15px 0 10px;
        }

        .error-desc {
            font-size: 15px;
            color: #6c757d;
            margin-bottom: 30px;
        }

        .btn-brand {
            background: #F75531;
            border: none;
            padding: 12px 28px;
            border-radius: 5px;
            color: #fff;
            font-weight: 600;
            transition: all .25s ease;
        }

        .btn-brand:hover {
            background: #e44724;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(247, 85, 49, .35);
        }

        .btn-outline-brand {
            border: 2px solid #192E5A;
            color: #192E5A;
            padding: 10px 26px;
            border-radius: 5px;
            font-weight: 600;
            /* margin-right: 10px; */
            transition: all .25s ease;
        }

        .btn-outline-brand:hover {
            background: #192E5A;
            color: #fff;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(25px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 480px) {
            .error-card {
                padding: 35px 25px;
                border-radius: 14px;
            }
        }
    </style>
</head>
<body>

<div class="error-card">
    <span class="error-badge">Access Denied</span>

    <div class="error-code">403</div>

    <div class="error-title">Unauthorized Access</div>

    <p class="error-desc">
        You don’t have permission to view this page.
        Please contact the administrator if you believe this is a mistake.
    </p>

    <div class="d-flex justify-content-center flex-wrap gap-3">
        <a href="{{ route('login') }}" class="btn btn-outline-brand">
            Go to Sign in
        </a>

        <a href="{{ route('home') }}" class="btn btn-brand ms-2">
            Go to Home
        </a>
    </div>
</div>

</body>
</html>
