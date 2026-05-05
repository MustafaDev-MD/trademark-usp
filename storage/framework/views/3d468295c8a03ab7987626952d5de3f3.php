<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>

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
                                <h3>Forgot Password?</h3>
                                <h4>No worries, we’ll send you reset instructions</h4>
                            </div>

                            <!--  -->
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('status')): ?>
                            <div class="alert alert-success">
                                <?php echo e(session('status')); ?>

                            </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                            <!--  -->
                            <form method="POST" action="<?php echo e(route('password.email')); ?>">
                                <?php echo csrf_field(); ?>

                                <div class="form-login">
                                    <label>Email</label>
                                    <div class="form-addons">
                                        <input
                                            type="email"
                                            name="email"
                                            value="<?php echo e(old('email')); ?>"
                                            placeholder="Enter your email address"
                                            required
                                            autofocus>
                                        <img src="<?php echo e(asset('assets/img/icons/mail.svg')); ?>" alt="mail">
                                    </div>

                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <small class="text-danger"><?php echo e($message); ?></small>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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
                                    <a href="<?php echo e(route('login')); ?>" class="hover-a">Back to Login</a>
                                </h4>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="login-img">
                    <img src="<?php echo e(asset('assets/img/login.jpg')); ?>" alt="forgot-password">
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

</html><?php /**PATH C:\xampp\htdocs\trademark-usp\resources\views/auth/forgot-password.blade.php ENDPATH**/ ?>