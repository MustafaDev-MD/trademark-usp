

<?php $__env->startSection('title', 'Thank You - Trademark USP'); ?>

<?php $__env->startSection('content'); ?>

<!-- hero section  -->
<section class="about-hero-section">
    <div class="about-hero-header-area">
        <!--<p class="about-hero-tag">Thank You</p>-->
        <h1 class="about-hero-headline">Thank you for choosing our services!</h1>
        <p class="about-hero-subtext">
            Our agents are studying your case and will get back to you soon!
        </p>
        <!-- <a href="<?php echo e(route('blog')); ?>" class="about-hero-button-orange ">Explore Our Services</a> -->
        <a href="<?php echo e(route('register')); ?>" class="about-hero-button-orange ">Register my trademark</a>
    </div>

    <div class="about-hero-collage-wrapper">
        <img src="./imagees/About-us/About_us_Hero_Image.png" alt="Trademark USP team collage" class="about-hero-collage-image">
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\trademark-usp\resources\views/thank-you.blade.php ENDPATH**/ ?>