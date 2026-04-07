<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Trademark USP'); ?></title>

    <!--  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!--  -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">


    <!--  -->
    <link rel="stylesheet" href="<?php echo e(asset('css/styless.css')); ?>?v=<?php echo e(time()); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>?v=<?php echo e(time()); ?>">

    <!--  -->
    <link rel="icon" type="image/png" href="<?php echo e(asset('imagees/fav.png')); ?>">
    
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

    <?php echo $__env->yieldPushContent('head'); ?>
</head>

<body>

    <!--  -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5QQV3FW6"
            height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WSH7VPQM"
            height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>

    <!--  -->
    <?php echo $__env->make('partials.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!--  -->
    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <!--  -->
    <?php echo $__env->make('partials.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php echo $__env->make('sections.form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

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



    <!--  -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const hamburgerBtn = document.querySelector('.main-nav-hamburger-btn');
            const navContainer = document.querySelector('.main-nav-links-container');
            const dropdownToggles = document.querySelectorAll('.main-nav-dropdown > .main-nav-link');

            hamburgerBtn?.addEventListener('click', () => {
                navContainer.classList.toggle('is-open');
                hamburgerBtn.textContent = navContainer.classList.contains('is-open') ? '✕' : '☰';
            });

            dropdownToggles.forEach(toggle => {
                toggle.addEventListener('click', (e) => {
                    if (window.innerWidth <= 950) {
                        e.preventDefault();
                        const dropdown = toggle.nextElementSibling;
                        dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
                    }
                });
            });

            window.addEventListener('resize', () => {
                if (window.innerWidth > 950) {
                    navContainer.classList.remove('is-open');
                    hamburgerBtn.textContent = '☰';
                }
            });
        });
    </script>

    <!--  -->
    <!-- <script>
        const fcmpBtns = document.querySelectorAll(".fcmp-trigger-button");
        const fcmpModal = document.getElementById("fcmp-modal-wrapper");
        const fcmpClose = document.getElementById("fcmp-close");

        fcmpBtns.forEach(btn => btn.onclick = () => fcmpModal.style.display = "flex");
        fcmpClose?.addEventListener('click', () => fcmpModal.style.display = "none");

        window.onclick = (e) => {
            if (e.target === fcmpModal) {
                fcmpModal.style.display = "none";
            }
        };
    </script> -->

    <!--  -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-5QQV3FW6');
    </script>

    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-WSH7VPQM');
    </script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!--  -->
    <script src="<?php echo e(asset('js/scriptt.js')); ?>?v=<?php echo e(time()); ?>"></script>
    <script src="<?php echo e(asset('js/script.js')); ?>?v=<?php echo e(time()); ?>"></script>

    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>

</html><?php /**PATH C:\xampp\htdocs\trademark-usp\resources\views/layouts/app.blade.php ENDPATH**/ ?>