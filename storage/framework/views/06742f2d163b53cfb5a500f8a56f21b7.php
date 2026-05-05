<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!--  -->
    <link rel="icon" type="image/png" href="<?php echo e(asset('imagees/fav.png')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/fontawesome/css/fontawesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/fontawesome/css/all.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>?v=<?php echo e(time()); ?>">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

</head>

<body class="account-page">

    <div class="main-wrapper">
        <div class="account-content">
            <div class="login-wrapper">

                <div class="login-content">
                    <div class="login-userset">

                        <div class="login-logo">
                            <a href="<?php echo e(route('home')); ?>">
                                <img src="<?php echo e(asset('imagees/logo-new-BIG.png')); ?>" alt="logo">
                            </a>
                        </div>

                        <div class="login-inner-content">
                            <div class="login-userheading">
                                <h3>Reset Password</h3>
                                <h4>Enter your new Password</h4>
                            </div>

                            <form method="POST" action="<?php echo e(route('password.store')); ?>">
                                <?php echo csrf_field(); ?>

                                <input type="hidden" name="token" value="<?php echo e($request->route('token')); ?>">

                                <div class="form-login">
                                    <label>Email</label>
                                    <input type="email" name="email"
                                        value="<?php echo e(old('email', $request->email)); ?>" required>
                                </div>

                                <div class="form-login">
                                    <label>New Password</label>
                                    <input type="password" name="password" required>
                                </div>

                                <div class="form-login">
                                    <label>Confirm Password</label>
                                    <input type="password" name="password_confirmation" required>
                                </div>

                                <div class="form-login">
                                    <button class="btn btn-login w-100" id="submitBtn">
                                        Reset Password
                                    </button>
                                </div>

                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
                                <div class="alert alert-danger mt-3">
                                    <?php echo e($errors->first()); ?>

                                </div>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </form>
                        </div>


                    </div>
                </div>

                <!--  -->
                <div class="login-img">
                    <img src="<?php echo e(asset('assets/img/login.jpg')); ?>" alt="login">
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

    <script src="<?php echo e(asset('assets/js/jquery-3.6.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/script.js')); ?>?v=<?php echo e(time()); ?>"></script>

</body>

</html><?php /**PATH C:\xampp\htdocs\trademark-usp\resources\views/auth/reset-password.blade.php ENDPATH**/ ?>