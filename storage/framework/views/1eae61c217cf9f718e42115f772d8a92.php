<div id="global-loader">
    <!-- Spinner ring -->
    <div class="whirly-loader"></div>

    <!-- Center image (static) -->
    <img src="<?php echo e(asset('imagees/Icon-new-BIG.webp')); ?>" alt="Trademark USP Logo" class="loader-logo">
</div>

<div id="fcmp-modal-wrapper">
    <div id="fcmp-modal">
        <span id="fcmp-close">&times;</span>

        <!-- NEW FORM START -->
        <div class="modal-content">
            <div class="modal-header">
                <div class="logo-modal">
                    <img src="./imagees/logo-new-BIG.png" alt="">
                    <hr>
                    <h2>Start Your Trademark Application</h2>
                    <h6 class="exclusive">
                        Submit your details and we’ll help you begin your filing with the USPTO.
                    </h6>
                </div>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo e(route('modal.form.submit')); ?>" id="modalForm">
                    <?php echo csrf_field(); ?>

                    <!-- HONEYPOT + TIME TRAP -->
                    <input type="text" name="website" style="display:none">
                    <input type="hidden" name="form_time" value="<?php echo e(time()); ?>">
                    <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">

                    <div class="fld-input">
                        <input type="text" id="name" name="customer_full_name" placeholder="Name" required>
                        <small class="text-danger"></small>
                    </div>

                    <div class="fld-input">
                        <input type="text" id="phoneNum2" name="customer_phone" placeholder="Phone Number" required>
                        <small class="text-danger"></small>
                    </div>

                    <div class="fld-input">
                        <input type="email" id="email" name="customer_email" placeholder="Email Address" required>
                        <small class="text-danger"></small>
                    </div>

                    <div class="fld-input">
                        <textarea class="comments form-control mb-3" placeholder="What are you looking to protect?" name="comment" required></textarea>
                        <small class="text-danger"></small>
                    </div>

                    <a href="javascript:void(0);" onclick="triggerChat();" class="another mb-3">
                        Need help? Chat with our team!
                    </a>

                    <div class="fld-btn packageformsubmit mt-5">
                        <button type="submit" id="modalSubmitBtn" disabled>Get Started Now</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- NEW FORM END -->
    </div>
</div>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->guest()): ?>
<!-- RECAPTCHA v3 SCRIPT -->
<script src="https://www.google.com/recaptcha/api.js?render=<?php echo e(env('NOCAPTCHA_SITEKEY')); ?>"></script>

<script>
// document.addEventListener("DOMContentLoaded", function() {
//     const modal = document.getElementById("fcmp-modal-wrapper");
//     const closeBtn = document.getElementById("fcmp-close");
//     const form = document.getElementById("modalForm");
//     const submitBtn = document.getElementById("modalSubmitBtn");
//     const inputs = form.querySelectorAll("input[required], textarea[required]");
//     const touched = new Set();

//     if (!form || !submitBtn) return;

//     // Show modal after 5 seconds
//     if (!sessionStorage.getItem("fcmpModalShown")) {
//         setTimeout(() => {
//             modal.style.display = "flex";
//             sessionStorage.setItem("fcmpModalShown", "true");
//         }, 5000);
//     }

//     closeBtn.onclick = () => modal.style.display = "none";
//     modal.onclick = (e) => { if (e.target === modal) modal.style.display = "none"; };

//     // Validation
//     function validateField(input) {
//         const value = input.value.trim();
//         const errorEl = input.nextElementSibling;
//         let valid = true;
//         errorEl.textContent = "";
//         input.classList.remove("input-error");

//         if (!touched.has(input)) return true;

//         if (!value) {
//             valid = false;
//             errorEl.textContent = "This field is required";
//             input.classList.add("input-error");
//         } else if (input.type === "email") {
//             const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
//             if (!emailPattern.test(value)) {
//                 valid = false;
//                 errorEl.textContent = "Enter a valid email address";
//                 input.classList.add("input-error");
//             }
//         } else if (input.name === "customer_phone") {
//             const phonePattern = /^\+?[0-9\s\-]{10,15}$/;
//             if (!phonePattern.test(value)) {
//                 valid = false;
//                 errorEl.textContent = "Phone must be 10–15 digits and numbers only";
//                 input.classList.add("input-error");
//             }
//         }

//         return valid;
//     }

//     function checkSubmitButton() {
//         let allValid = true;
//         inputs.forEach(input => {
//             if (!input.value.trim() || input.classList.contains("input-error")) allValid = false;
//         });
//         submitBtn.disabled = !allValid;
//     }

//     inputs.forEach(input => {
//         input.addEventListener("focus", () => touched.add(input));
//         input.addEventListener("input", () => { validateField(input); checkSubmitButton(); });
//         input.addEventListener("blur", () => { validateField(input); checkSubmitButton(); });
//     });

//     submitBtn.disabled = true;

//     // Form submit with reCAPTCHA v3
//     form.addEventListener("submit", function(e) {
//         e.preventDefault();

//         // Validate fields first
//         let formValid = true;
//         inputs.forEach(input => { if (!validateField(input)) formValid = false; });
//         if (!formValid) return;

//         // reCAPTCHA v3 token
//         grecaptcha.ready(function() {
//             grecaptcha.execute('<?php echo e(env("NOCAPTCHA_SITEKEY")); ?>', {action: 'modal_form'}).then(function(token) {
//                 document.getElementById('g-recaptcha-response').value = token;
//                 form.submit();
//             });
//         });
//     });
// });

document.addEventListener("DOMContentLoaded", function () {

    const loader = document.getElementById("global-loader");
    const form = document.getElementById("modalForm");
    const submitBtn = document.getElementById("modalSubmitBtn");
    const inputs = form.querySelectorAll("input[required], textarea[required]");
    const touched = new Set();

    const phoneInput = document.getElementById("phoneNum2");

    // Remove loader initially
    if(loader) loader.style.display = "none";

    // ===== Custom Phone Formatting (650 384 0370) =====
    phoneInput.addEventListener("input", function () {
        let value = this.value.replace(/\D/g, ""); // remove non-digits
        if (value.length > 10) value = value.slice(0, 10); // max 10 digits

        let formatted = "";
        if (value.length > 0) formatted += value.slice(0, 3);
        if (value.length >= 4) formatted += " " + value.slice(3, 6);
        if (value.length >= 7) formatted += " " + value.slice(6, 10);

        this.value = formatted;
    });

    // ===== Field Validation =====
    function validateField(input) {
        const value = input.value.trim();
        const errorEl = input.nextElementSibling;
        let valid = true;

        errorEl.textContent = "";
        input.classList.remove("input-error");

        if (!touched.has(input)) return true;

        if (!value) {
            valid = false;
            errorEl.textContent = "This field is required";
            input.classList.add("input-error");
        } else if (input.type === "email") {
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(value)) {
                valid = false;
                errorEl.textContent = "Enter a valid email address";
                input.classList.add("input-error");
            }
        } else if (input.name === "customer_phone") {
            const digits = value.replace(/\s/g, ""); // remove spaces
            if (!/^[0-9]{10}$/.test(digits)) {
                valid = false;
                errorEl.textContent = "Phone must be exactly 10 digits";
                input.classList.add("input-error");
            }
        }

        return valid;
    }

    function checkSubmitButton() {
        let allValid = true;
        inputs.forEach(input => {
            if (!input.value.trim() || input.classList.contains("input-error")) {
                allValid = false;
            }
        });
        submitBtn.disabled = !allValid;
    }

    inputs.forEach(input => {
        input.addEventListener("focus", () => touched.add(input));
        input.addEventListener("input", () => { validateField(input); checkSubmitButton(); });
        input.addEventListener("blur", () => { validateField(input); checkSubmitButton(); });
    });

    submitBtn.disabled = true;

    // ===== Form Submission =====
    form.addEventListener("submit", function (e) {
        e.preventDefault();

        // Remove spaces from phone input before validation
        phoneInput.value = phoneInput.value.replace(/\s/g, "");

        let formValid = true;
        inputs.forEach(input => { if (!validateField(input)) formValid = false; });
        if (!formValid) return;

        submitBtn.disabled = true;
        if(loader) loader.style.display = "flex";

        grecaptcha.ready(function () {
            grecaptcha.execute('<?php echo e(env("NOCAPTCHA_SITEKEY")); ?>', { action: 'modal_form' })
            .then(function (token) {
                document.getElementById("g-recaptcha-response").value = token;

                fetch(form.action, {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value,
                        "Accept": "application/json"
                    },
                    body: new FormData(form)
                })
                .then(res => res.json())
                .then(data => {
                    if(loader) loader.style.display = "none";

                    if (data.success) {
                        window.location.href = data.redirect;
                    } else {
                        Toastify({
                            text: data.message || "Server error. Please try again.",
                            duration: 5000,
                            gravity: "top",
                            position: "center",
                            close: true,
                            style: {
                                background: "#F97555",
                                color: "#FFF4E7",
                                border: "2px solid #475676",
                                borderRadius: "10px"
                            }
                        }).showToast();
                        submitBtn.disabled = false;
                    }
                })
                .catch(error => {
                    if(loader) loader.style.display = "none";
                    Toastify({
                        text: "Server error. Please try again.",
                        duration: 5000,
                        gravity: "top",
                        position: "center",
                        close: true,
                        style: {
                            background: "#F97555",
                            color: "#FFF4E7",
                            border: "2px solid #475676",
                            borderRadius: "10px"
                        }
                    }).showToast();
                    submitBtn.disabled = false;
                });

            });
        });

    });

});
</script>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

<!-- TOASTIFY JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<style>
    /* ERROR STYLING */
    .input-error {
        border: 1px solid red !important;
        background-color: #ffe6e6 !important;
    }

    .text-danger {
        color: red;
        font-size: 13px;
        margin-top: 2px;
        display: block;
    }

    #modalSubmitBtn:disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }
    
    .toast-close {
        padding: 0 5px 0px 20px;
        color: #302240 !important;
    }
    
    .packageformsubmit{
        margin-top: 20px;
    }
    
    #global-loader{
        z-index: 999999;
    }
</style>




<!--    <script>console.log(<?php echo json_encode(auth()->check(), 15, 512) ?>);</script>-->


<!--<script>-->
<!--document.addEventListener('DOMContentLoaded', () => {-->

<!--    // Pass Laravel auth status to JS-->
<!--    const userLoggedIn = <?php echo json_encode(auth()->check(), 15, 512) ?>;-->

<!--    const fcmpModal = document.getElementById("fcmp-modal-wrapper");-->
<!--    const fcmpClose = document.getElementById("fcmp-close");-->

<!--    if (!fcmpModal || !fcmpClose) return;-->

<!--    const showModal = () => {-->
<!--        fcmpModal.style.display = "flex";-->
<!--        localStorage.setItem("fcmpModalShown", "true");-->
<!--    };-->

<!--    // Close modal-->
<!--    fcmpClose.onclick = () => fcmpModal.style.display = "none";-->
<!--    window.onclick = (e) => { if (e.target === fcmpModal) fcmpModal.style.display = "none"; };-->

<!--    // Only show for guests who haven't seen it-->
<!--    if (!userLoggedIn && !localStorage.getItem("fcmpModalShown")) {-->
<!--        setTimeout(showModal, 10000); // 10s delay-->
<!--    }-->
<!--});-->
<!--</script>-->
<!--<div id="fcmp-modal-wrapper" style="display: none;">-->
<!--    <div id="fcmp-modal">-->
<!--        <span id="fcmp-close">&times;</span>-->
<!--        <div class="modal-content">-->
<!--            <div class="modal-header">-->
<!--                <div class="logo-modal">-->
<!--                    <img src="./imagees/logo-new-BIG.png" alt="">-->
<!--                    <hr>-->
<!--                    <h2>Start Your Trademark Application</h2>-->
<!--                    <h6 class="exclusive">-->
<!--                        Submit your details and we’ll help you begin your filing with the USPTO.-->
<!--                    </h6>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="modal-body">-->
<!--                <form method="POST" action="<?php echo e(route('modal.form.submit')); ?>">-->
<!--                    <?php echo csrf_field(); ?>-->
<!--                    <div class="fld-input">-->
<!--                        <input type="text" name="customer_full_name" placeholder="Name" required>-->
<!--                    </div>-->
<!--                    <div class="fld-input">-->
<!--                        <input type="email" name="customer_email" placeholder="Email Address" required>-->
<!--                    </div>-->
<!--                    <div class="fld-input">-->
<!--                        <input type="text" name="customer_phone" placeholder="Phone Number" required>-->
<!--                    </div>-->
<!--                    <div class="fld-input">-->
<!--                        <textarea class="comments form-control mb-3" placeholder="What are you looking to protect?" name="comment"></textarea>-->
<!--                    </div>-->
<!--                    <div class="fld-btn packageformsubmit">-->
<!--                        <button type="submit">Get Started Now</button>-->
<!--                    </div>-->
<!--                </form>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

<!--<script>-->
<!--document.addEventListener('DOMContentLoaded', () => {-->

<!--// Get current route name from Blade-->
<!--    const currentRoute = "<?php echo e(Route::currentRouteName()); ?>";-->

<!--// List of routes where modal should NOT show-->
<!--    const excludedRoutes = ['login', 'register', 'verify.code', 'dashboard'];-->

<!--// Exit early if current route is excluded-->
<!--    if (excludedRoutes.includes(currentRoute)) return;-->

<!--    const fcmpModal = document.getElementById("fcmp-modal-wrapper");-->
<!--    const fcmpClose = document.getElementById("fcmp-close");-->
<!--    if (!fcmpModal || !fcmpClose) return;-->

<!--    const showModal = () => {-->
<!--        fcmpModal.style.display = "flex";-->
<!--        localStorage.setItem("fcmpModalShown", "true");-->
<!--    };-->

<!--// Close modal-->
<!--    fcmpClose.onclick = () => fcmpModal.style.display = "none";-->
<!--    window.onclick = (e) => { if (e.target === fcmpModal) fcmpModal.style.display = "none"; };-->

<!--// Only show once per visitor-->
<!--    if (!localStorage.getItem("fcmpModalShown")) {-->
<!--setTimeout(showModal, 10000); // 10s after page load-->
<!--    }-->

<!--});-->
<!--</script>--><?php /**PATH C:\xampp\htdocs\trademark-usp\resources\views/sections/form.blade.php ENDPATH**/ ?>