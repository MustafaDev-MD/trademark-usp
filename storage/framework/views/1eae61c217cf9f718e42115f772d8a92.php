<div id="fcmp-modal-wrapper" style="display:none" role="dialog" aria-modal="true" aria-labelledby="inquiry-title" aria-describedby="inquiry-summary">
<div id="fcmp-modal" tabindex="-1">
<button id="fcmp-close" type="button" aria-label="Close inquiry">&times;</button>
<div class="modal-content"><div class="modal-header"><h2 id="inquiry-title">Request filing support</h2></div>
<div class="modal-body">
<p id="inquiry-summary">Send an inquiry to our team. No payment is taken and no order is placed by this form.</p>
<p id="selected-package" aria-live="polite"></p>
<p>Service fees exclude government fees and optional extras. A complete quote and any separate attorney agreement must be reviewed before purchase.</p>
<form method="POST" action="<?php echo e(route('modal.form.submit')); ?>" id="modalForm">
<?php echo csrf_field(); ?>
<input type="text" name="website" tabindex="-1" autocomplete="off" aria-hidden="true" style="display:none">
<input type="hidden" name="selected_plan" id="inquiry-plan">
<input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = ['customer_full_name'=>'Full name', 'customer_phone'=>'Phone number', 'customer_email'=>'Email address']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field=>$label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
<div class="fld-input"><label for="inquiry-<?php echo e($field); ?>"><?php echo e($label); ?></label><input id="inquiry-<?php echo e($field); ?>" type="<?php echo e($field === 'customer_email' ? 'email' : ($field === 'customer_phone' ? 'tel' : 'text')); ?>" name="<?php echo e($field); ?>" required autocomplete="<?php echo e($field === 'customer_email' ? 'email' : ($field === 'customer_phone' ? 'tel' : 'name')); ?>" aria-describedby="error-<?php echo e($field); ?>"><small id="error-<?php echo e($field); ?>" class="text-danger"></small></div>
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
<div class="fld-input"><label for="inquiry-comment">What would you like to protect?</label><textarea id="inquiry-comment" name="comment" maxlength="1000" required aria-describedby="error-comment"></textarea><small id="error-comment" class="text-danger"></small></div>
<p>Read our <a href="<?php echo e(route('privacy-policy')); ?>">Privacy Policy</a> and <a href="<?php echo e(route('term-of-service')); ?>">Terms of Service</a> before sending your inquiry.</p>
<p id="inquiry-status" role="status" aria-live="polite"></p>
<div class="fld-btn"><button type="submit" id="modalSubmitBtn">Send inquiry - no payment</button></div>
</form>
<p><a id="application-start" href="<?php echo e(route('register')); ?>">Continue to application and review pricing</a></p>
<p>To place an order, create or sign into your account, complete the application and review the amount before checkout. This is separate from sending an inquiry.</p>
</div></div></div></div>
<script src="https://www.google.com/recaptcha/api.js?render=<?php echo e(config('captcha.sitekey')); ?>" async defer></script>
<script>window.inquiryConfig = {sitekey: <?php echo json_encode(config('captcha.sitekey'), 15, 512) ?>, packages: <?php echo json_encode(config('packages'), 15, 512) ?>, startUrl: <?php echo json_encode(url('/start-application'), 15, 512) ?>, registerUrl: <?php echo json_encode(route('register'), 15, 512) ?>};</script>
<?php /**PATH C:\xampp\htdocs\trademark-usp\resources\views/sections/form.blade.php ENDPATH**/ ?>