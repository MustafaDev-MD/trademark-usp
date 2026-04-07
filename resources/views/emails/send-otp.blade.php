<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>OTP Verification</title>
</head>
<body>
    <h2>Hello {{ $user->name }},</h2>
    <p>Your email verification code is: <strong>{{ $user->email_verification_code }}</strong></p>
    <p>This code will expire in 10 minutes.</p>
    <p>Thank you for using our service!</p>
</body>
</html>