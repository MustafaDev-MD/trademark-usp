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
                                <h3>Sign In</h3>
                                <h4>Please login to your account</h4>
                            </div>

                            <!--  -->
                            <form method="POST" action="<?php echo e(route('login')); ?>">
                                <?php echo csrf_field(); ?>

                                <!--  -->
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

                                <!--  -->
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

                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['password'];
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

                                <!--  -->
                                <div class="form-login">
                                    <div class="alreadyuser">
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Route::has('password.request')): ?>
                                        <h4>
                                            <a href="<?php echo e(route('password.request')); ?>" class="hover-a">
                                                Forgot Password?
                                            </a>
                                        </h4>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </div>
                                </div>

                                <!--  -->
                                <div class="form-login">
                                    <button type="submit" id="submitBtn" class="btn btn-login w-100">
                                        Sign In
                                    </button>
                                </div>
                            </form>

                            <!--  -->
                            <div class="signinform text-start">
                                <h4>
                                    Don’t have an account?
                                    <a href="<?php echo e(route('register')); ?>" class="hover-a">Sign Up</a>
                                </h4>
                            </div>
                        </div>

                    </div>
                </div>

                <!--  -->
                <div class="login-img">
                    <img src="<?php echo e(asset('assets/img/login.png')); ?>" alt="login">
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

    <script src="<?php echo e(asset('assets/js/jquery-3.6.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/script.js')); ?>?v=<?php echo e(time()); ?>"></script>

</body>

</html><?php /**PATH C:\xampp\htdocs\trademark-usp\resources\views/auth/login.blade.php ENDPATH**/ ?>