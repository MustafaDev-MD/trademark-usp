<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email</title>
    <!--  -->
    <link rel="icon" type="image/png" href="<?php echo e(asset('imagees/fav.png')); ?>">
    
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>?v=<?php echo e(time()); ?>">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
</head>
<body class="account-page">
    <div class="main-wrapper">
        <div class="account-content">
            <div class="login-wrapper">
                <div class="login-content">
                    <div class="login-userset">

                        <!-- Logo -->
                        <div class="login-logo text-center mb-4">
                            <a href="<?php echo e(route('home')); ?>">
                                <img src="<?php echo e(asset('imagees/logo-new-BIG.png')); ?>" alt="logo">
                            </a>
                        </div>

                        <!-- Inner Content -->
                        <div class="login-inner-content">
                            <div class="login-userheading">
                                <h3>Email Verification</h3>
                                <h4>Please enter the 6-digit code sent to your email</h4>
                            </div>

                            <!-- OTP Form -->
                            <form method="POST" action="<?php echo e(route('verify.code.submit')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="form-login">
                                    <label>Verification Code</label>
                                    <div class="form-addons">
                                        <input type="text" name="code" maxlength="6" placeholder="Enter 6-digit code" required>
                                    </div>

                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <small class="text-danger"><?php echo e($message); ?></small>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
                                    <small class="text-success"><?php echo e(session('success')); ?></small>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>

                                <div class="form-login mt-3">
                                    <button type="submit" class="btn btn-login w-100">Verify</button>
                                </div>
                            </form>

                            <!-- Additional Links -->
                            <div class="signinform mt-4">
                                <h4>
                                    Didn’t receive the code?
                                    <a href="<?php echo e(route('resend.otp')); ?>" class="hover-a">Resend</a>
                                </h4>

                                <!--<p class="mt-3">-->
                                <!--    Want to use a different account or register again? <br>-->
                                <!--    <a href="<?php echo e(route('login')); ?>" class="hover-a">Login</a> | -->
                                <!--    <a href="<?php echo e(route('register')); ?>" class="hover-a">Register</a>-->
                                <!--</p>-->

                                <!-- Logout Button -->
                                <form method="POST" action="<?php echo e(route('logout')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="btn btn-danger w-100 mt-2">Go Back</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Image -->
                <div class="login-img">
                    <img src="<?php echo e(asset('assets/img/login.jpg')); ?>" alt="login">
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo e(asset('assets/js/jquery-3.6.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/bootstrap.bundle.min.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\trademark-usp\resources\views/auth/verify-code.blade.php ENDPATH**/ ?>