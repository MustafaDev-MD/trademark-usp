<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

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
                    <div class="login-userset register-userset">

                        <div class="login-logo">
                            <a href="<?php echo e(route('home')); ?>">
                                <img src="<?php echo e(asset('imagees/logo-new-BIG.png')); ?>" alt="logo">
                            </a>
                        </div>

                        <div class="login-inner-content register-inner-content">
                            <div class="login-userheading">
                                <h3>Sign Up</h3>
                                <h4>Create your account</h4>
                            </div>

                            <!--  -->
                            <form method="POST" action="<?php echo e(route('register')); ?>">
                                <?php echo csrf_field(); ?>
                                
                                <div class="row">
                                    <!-- Full Name -->
                                    <div class="col-md-6">
                                        <div class="form-login">
                                            <label for="name">Full Name</label>
                                            <input
                                                id="name"
                                                type="text"
                                                name="name"
                                                value="<?php echo e(old('name')); ?>"
                                                placeholder="Enter your full name"
                                                required
                                                autocomplete="name">
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['name'];
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
                                                    value="<?php echo e(old('email')); ?>"
                                                    placeholder="Enter your email address"
                                                    required
                                                    autocomplete="email">
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
                                    </div>
                                </div>


                                <!--  -->
                                <!--<div class="form-login">-->
                                <!--    <label>Full Name</label>-->
                                <!--    <input-->
                                <!--        type="text"-->
                                <!--        name="name"-->
                                <!--        value="<?php echo e(old('name')); ?>"-->
                                <!--        placeholder="Enter your full name"-->
                                <!--        required-->
                                <!--        autofocus>-->
                                <!--    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>-->
                                <!--    <small class="text-danger"><?php echo e($message); ?></small>-->
                                <!--    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>-->
                                <!--</div>-->

                                <!--  -->
                                <!--<div class="form-login">-->
                                <!--    <label>Email</label>-->
                                <!--    <div class="form-addons">-->
                                <!--        <input-->
                                <!--            type="email"-->
                                <!--            name="email"-->
                                <!--            value="<?php echo e(old('email')); ?>"-->
                                <!--            placeholder="Enter your email address"-->
                                <!--            required>-->
                                <!--        <img src="<?php echo e(asset('assets/img/icons/mail.svg')); ?>" alt="mail">-->
                                <!--    </div>-->
                                <!--    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>-->
                                <!--    <small class="text-danger"><?php echo e($message); ?></small>-->
                                <!--    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>-->
                                <!--</div>-->
                                
                                <!--  -->
                                <!--<div class="form-login">-->
                                <!--    <label for="phone">Phone Number</label>-->
                                <!--    <input-->
                                <!--        id="phone"-->
                                <!--        type="tel"-->
                                <!--        name="phone"-->
                                <!--        value="<?php echo e(old('phone')); ?>"-->
                                <!--        placeholder="Enter your phone number"-->
                                <!--        required-->
                                <!--        autocomplete="tel">-->
                                <!--    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>-->
                                <!--        <small class="text-danger"><?php echo e($message); ?></small>-->
                                <!--    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>-->
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
                                                value="<?php echo e(old('phone')); ?>"
                                                placeholder="Enter your phone number"
                                                required
                                                autocomplete="tel">
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['phone'];
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
                                    </div>
                                
                                    <!-- DOB -->
                                    <div class="col-md-6">
                                        <div class="form-login">
                                            <label for="dob">Date of Birth</label>
                                            <input
                                                id="dob"
                                                type="date"
                                                name="dob"
                                                value="<?php echo e(old('dob')); ?>"
                                                required>
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['dob'];
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

                                <!--  -->
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
                                <!--    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>-->
                                <!--    <small class="text-danger"><?php echo e($message); ?></small>-->
                                <!--    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>-->
                                <!--</div>-->

                                <!--  -->
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
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['terms'];
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
                                    <button type="submit" id="submitBtn" class="btn btn-login w-100">
                                        Create Account
                                    </button>
                                </div>

                            </form>

                            <!--  -->
                            <div class="signinform text-start">
                                <h4>
                                    Already have an account?
                                    <a href="<?php echo e(route('login')); ?>" class="hover-a">Sign In</a>
                                </h4>
                            </div>
                        </div>


                    </div>
                </div>

                <!--  -->
                <div class="login-img">
                    <img src="<?php echo e(asset('assets/img/login.jpg')); ?>" alt="register">
                </div>

            </div>
        </div>
    </div>

    <script src="<?php echo e(asset('assets/js/jquery-3.6.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/script.js')); ?>?v=<?php echo e(time()); ?>"></script>

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

</html><?php /**PATH C:\xampp\htdocs\trademark-usp\resources\views/auth/register.blade.php ENDPATH**/ ?>