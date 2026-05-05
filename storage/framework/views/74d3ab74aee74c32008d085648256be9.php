<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $__env->yieldContent('title', 'Admin Dashboard'); ?></title>

    <!--  -->
    <link rel="icon" type="image/png" href="<?php echo e(asset('imagees/fav.png')); ?>">

    <!--  -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/animate.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/dataTables.bootstrap4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/fontawesome/css/fontawesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/fontawesome/css/all.min.css')); ?>">
    <!--<link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">-->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>?v=<?php echo e(time()); ?>">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">


</head>

<body>

<!--<div id="global-loader">-->
<!--    <div class="whirly-loader">-->
<!--        <img src="<?php echo e(asset('imagees/logo-new-BIG.png')); ?>" alt="Trademark USP Logo" class="main-nav-logo-image loader-logo">-->
<!--    </div>-->
<!--</div>-->
<div id="global-loader">
    <!-- Spinner ring -->
    <div class="whirly-loader"></div>

    <!-- Center image (static) -->
    <img src="<?php echo e(asset('imagees/Icon-new-BIG.webp')); ?>" alt="Trademark USP Logo" class="loader-logo">
</div>


<div class="main-wrapper">

    
    <?php if (isset($component)) { $__componentOriginald3b387f4f5efe74d7afe13be62871c47 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald3b387f4f5efe74d7afe13be62871c47 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dashboard.header','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dashboard.header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald3b387f4f5efe74d7afe13be62871c47)): ?>
<?php $attributes = $__attributesOriginald3b387f4f5efe74d7afe13be62871c47; ?>
<?php unset($__attributesOriginald3b387f4f5efe74d7afe13be62871c47); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald3b387f4f5efe74d7afe13be62871c47)): ?>
<?php $component = $__componentOriginald3b387f4f5efe74d7afe13be62871c47; ?>
<?php unset($__componentOriginald3b387f4f5efe74d7afe13be62871c47); ?>
<?php endif; ?>

    
    <?php if (isset($component)) { $__componentOriginal060abe2a9b4511e378911474e77b046d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal060abe2a9b4511e378911474e77b046d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dashboard.sidebar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dashboard.sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal060abe2a9b4511e378911474e77b046d)): ?>
<?php $attributes = $__attributesOriginal060abe2a9b4511e378911474e77b046d; ?>
<?php unset($__attributesOriginal060abe2a9b4511e378911474e77b046d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal060abe2a9b4511e378911474e77b046d)): ?>
<?php $component = $__componentOriginal060abe2a9b4511e378911474e77b046d; ?>
<?php unset($__componentOriginal060abe2a9b4511e378911474e77b046d); ?>
<?php endif; ?>

    
    <div class="page-wrapper">
        <div class="content">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>

</div>

<!--  -->
<script>
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/65380268f2439e1631e7f736/1hdhciqtf';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();

        function triggerChat() {
            if (typeof Tawk_API !== 'undefined') {
                Tawk_API.toggle();
            }
        }
    </script>


<script src="<?php echo e(asset('assets/js/jquery-3.6.0.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/feather.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/jquery.slimscroll.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/bootstrap.bundle.min.js')); ?>"></script>

<script src="<?php echo e(asset('assets/plugins/apexchart/apexcharts.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/apexchart/chart-data.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/select2/js/select2.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/sweetalert/sweetalert2.all.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/sweetalert/sweetalerts.min.js')); ?>"></script>


<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous"> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script> -->

<script src="<?php echo e(asset('assets/js/moment.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/bootstrap-datetimepicker.min.js')); ?>"></script>

<!--<script src="<?php echo e(asset('assets/js/script.js')); ?>"></script>-->
<script src="<?php echo e(asset('assets/js/script.js')); ?>?v=<?php echo e(time()); ?>"></script>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\trademark-usp\resources\views/layouts/dashboard.blade.php ENDPATH**/ ?>