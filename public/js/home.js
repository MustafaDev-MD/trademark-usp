// <!-- image testimonials section  end -->

    // <!-- nav bar css -->
        document.addEventListener('DOMContentLoaded', () => {
            const hamburgerBtn = document.querySelector('.main-nav-hamburger-btn');
            const navContainer = document.querySelector('.main-nav-links-container');
            const dropdownToggles = document.querySelectorAll('.main-nav-dropdown > .main-nav-link');

            // 1. Toggle Mobile Menu Open/Close
            hamburgerBtn.addEventListener('click', () => {
                // Only toggle the main nav container
                navContainer.classList.toggle('is-open');

                // Optional: Change the hamburger icon to an 'X'
                hamburgerBtn.textContent = navContainer.classList.contains('is-open') ? '✕' : '☰';
            });

            // 2. Toggle Mobile Dropdown Panels 
            dropdownToggles.forEach(toggle => {
                toggle.addEventListener('click', (e) => {
                    // Only toggle dropdown on mobile screens
                    if (window.innerWidth <= 950) {
                        e.preventDefault();
                        const dropdownContent = toggle.nextElementSibling;
                        if (dropdownContent) {
                            const isVisible = dropdownContent.style.display === 'block';
                            dropdownContent.style.display = isVisible ? 'none' : 'block';
                        }
                    }
                });
            });

            // 3. Reset state on resize for clean desktop/mobile switch
            window.addEventListener('resize', () => {
                if (window.innerWidth > 950) {
                    navContainer.classList.remove('is-open');
                    hamburgerBtn.textContent = '☰';
                }
            });
        });
    // <!-- nav bar css -->

        // Select ALL buttons using the class selector
        const fcmpBtns = document.querySelectorAll(".fcmp-trigger-button");

        // Modal elements remain the same since they are unique IDs
        const fcmpModal = document.getElementById("fcmp-modal-wrapper");
        const fcmpClose = document.getElementById("fcmp-close");

        // Loop through each button and attach the click event
        fcmpBtns.forEach(button => {
            button.onclick = () => fcmpModal.style.display = "flex";
        });

        // Close handlers remain the same
        fcmpClose.onclick = () => fcmpModal.style.display = "none";
        window.onclick = (e) => {
            if (e.target === fcmpModal) {
                fcmpModal.style.display = "none";
            }
        }
    // <!-- Google Tag Manager -->
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
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-5QQV3FW6');
    // <!-- End Google Tag Manager -->
    // <!-- Google Tag Manager -->
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
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-WSH7VPQM');
    // <!-- End Google Tag Manager -->

   

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
    // <!-- pop-up form's script -->