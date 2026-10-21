<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Trademark USP')</title>
    @include('partials.seo')

    <!-- Google Tag Manager -->

    <!-- End Google Tag Manager -->


    <!-- {{-- Fonts --}} -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- {{-- Icons --}} -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">


    <!-- {{-- CSS --}} -->
    <link rel="stylesheet" href="{{ asset('css/styless.css') }}?v={{ filemtime(public_path('css/styles.css')) }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}?v={{ filemtime(public_path('css/styles.css')) }}">

    <!-- {{-- Favicon --}} -->
    <link rel="icon" type="image/png" href="{{ asset('imagees/fav.png') }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    @livewireStyles
    @stack('head')
</head>

<body>

    <!-- {{-- GTM (noscript) --}} -->



    <!-- {{-- HEADER --}} -->
    @include('partials.header')

    <!-- {{-- PAGE CONTENT --}} -->
    <main>
        @yield('content')
    </main>

    <!-- {{-- FOOTER --}} -->
    @include('partials.footer')

    @include('sections.form')

    <!-- {{-- TAWK --}} -->
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/6ab58264345f80344add99c7/1k3agamt5';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
    <!--End of Tawk.to Script-->

    <!-- {{-- NAVBAR SCRIPT --}} -->
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

    <!-- {{-- POPUP FORM --}} -->
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

    <!-- {{-- GTM --}} -->




    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- {{-- JS --}} -->
    <script src="{{ asset('js/scriptt.js') }}?v={{ filemtime(public_path('css/styles.css')) }}"></script>
    <script src="{{ asset('js/script.js') }}?v={{ filemtime(public_path('css/styles.css')) }}"></script>

    <!-- Google Tag Manager (noscript) -->

    <!-- End Google Tag Manager (noscript) -->

    @include('partials.privacy-settings')
    <script>window.trackingConfig = {gtmIds: @json(config('tracking.gtm_ids'))};</script>
    <script src="{{ asset('js/audit-ui.js') }}?v={{ filemtime(public_path('js/audit-ui.js')) }}"></script>
    @livewireScripts
    @stack('scripts')
</body>

</html>