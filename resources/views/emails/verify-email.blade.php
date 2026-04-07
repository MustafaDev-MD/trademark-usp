<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Verify Email</title>
    <style>
        a{
            text-decoration: none;
        }

        strong a{
            color: #000000 !important;
        }
    </style>
</head>
<body style="margin:0;padding:0;background:#f6f7fb;font-family:Arial">

<table width="100%" cellpadding="0" cellspacing="0">
    <tr>
        <td align="center" style="padding:40px 0">

            <table width="600" cellpadding="0" cellspacing="0"
                   style="background:#ffffff;border-radius:8px;overflow:hidden">

                <!-- HEADER -->
                <tr>
                    <td align="center" style="background:#f1f1f1;padding:20px">
                        <!-- <img src="{{ asset('imagees/logo-new-BIG.png') }}" height="50"> -->
                        <img src="https://trademarkusp.com/imagees/logo-new-BIG.png" height="50">
                    </td>
                </tr>

                <!-- BODY -->
                <tr>
                    <td style="padding:30px;color:#333">
                        <h2 style="margin-top:0">Verify Your Email</h2>

                        <p>
                            Thanks for signing up with <strong>Trademark USP</strong>.
                        </p>

                        <p>
                            Please click the button below to verify your email address.
                        </p>

                        <p style="text-align:center;margin:30px 0">
                            <a href="{{ $url }}"
                               style="background:#F75531;color:#fff;
                               padding:12px 25px;
                               text-decoration:none;
                               border-radius:5px;
                               display:inline-block">
                                Verify Email Address
                            </a>
                        </p>

                        <p>
                            If you did not create an account, no further action is required.
                        </p>

                        <p style="margin-top:30px">
                            Regards,<br>
                            <strong><a href="https://trademarkusp.com/">Trademark USP Team</a></strong>
                        </p>
                    </td>
                </tr>

                <!-- FOOTER -->
                <tr>
                    <td align="center"
                        style="background:#f1f1f1;padding:15px;font-size:12px;color:#777">
                        © {{ date('Y') }} <a href="https://trademarkusp.com/">Trademark USP</a>. All rights reserved.
                    </td>
                </tr>

            </table>

        </td>
    </tr>
</table>

</body>
</html>
