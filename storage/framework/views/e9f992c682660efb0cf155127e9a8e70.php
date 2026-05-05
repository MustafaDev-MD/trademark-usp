

<?php $__env->startSection('title', 'Client Application Detail'); ?>

<?php $__env->startSection('content'); ?>

<h4 class="mb-4">Client Application #<?php echo e($app->id); ?></h4>

<div class="row">

    
    <div class="col-12 col-md-6 mb-3">
        <div class="card shadow-sm border-light rounded-3 p-4 h-100">
            <h5 class="mb-4">👤 Personal Information</h5>
            <div class="row g-3">
                <div class="col-6"><strong>First Name:</strong> <?php echo e($app->first_name); ?></div>
                <div class="col-6"><strong>Last Name:</strong> <?php echo e($app->last_name); ?></div>
                <div class="col-6"><strong>Email:</strong> <?php echo e($app->email_address); ?></div>
                <div class="col-6"><strong>Phone:</strong> <?php echo e($app->phone_number); ?></div>
                <div class="col-6"><strong>Website:</strong> 
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($app->website): ?>
                        <a href="<?php echo e($app->website); ?>" target="_blank"><?php echo e($app->website); ?></a>
                    <?php else: ?>
                        -
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <div class="col-6"><strong>Owner of Mark:</strong> <?php echo e($app->owner_of_mark); ?></div>
                <div class="col-6"><strong>DBA:</strong> <?php echo e($app->dba ?? '-'); ?></div>
                <div class="col-6"><strong>Business Name:</strong> <?php echo e($app->business_name ?? '-'); ?></div>
                <div class="col-6"><strong>Business Nature:</strong> <?php echo e($app->business_nature); ?></div>
            </div>
        </div>
    </div>

    
    <div class="col-12 col-md-6 mb-3">
        <div class="card shadow-sm border-light rounded-3 p-4 h-100">
            <h5 class="mb-4">📍 Address</h5>
            <div class="row g-3">
                <div class="col-12"><strong>Mailing Address:</strong> <?php echo e($app->mailing_address); ?></div>
                <div class="col-6"><strong>City:</strong> <?php echo e($app->city); ?></div>
                <div class="col-6"><strong>State:</strong> <?php echo e($app->state); ?></div>
                <div class="col-6"><strong>Country:</strong> <?php echo e($app->country); ?></div>
                <div class="col-6"><strong>Zip Code:</strong> <?php echo e($app->zip_code); ?></div>
            </div>
        </div>
    </div>

    
    <div class="col-12 col-md-6 mb-3">
        <div class="card shadow-sm border-light rounded-3 p-4 h-100">
            <h5 class="mb-4">™️ Trademark Details</h5>
            <div class="row g-3">
                <div class="col-6"><strong>Trademark Type:</strong> <?php echo e($app->trademark_type); ?></div>
                <div class="col-6"><strong>Mark Details:</strong> <?php echo e($app->mark_details ?? '-'); ?></div>
                <div class="col-6"><strong>Using Logo:</strong> <?php echo e($app->using_logo); ?></div>
                <div class="col-6"><strong>Usage List:</strong> <?php echo e($app->usage_list ?? '-'); ?></div>
                <div class="col-6"><strong>Date of Use:</strong> <?php echo e($app->date_of_use ?? '-'); ?></div>
                <div class="col-12">
                    <strong>Business Description:</strong>
                    <p class="mt-1"><?php echo e($app->business_description); ?></p>
                </div>
            </div>
        </div>
    </div>

    
    <div class="col-12 col-md-6 mb-3">
        <div class="card shadow-sm border-light rounded-3 p-4 h-100">
            <h5 class="mb-4">🖼️ Logo File</h5>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($app->logo_file): ?>
                <?php $ext = pathinfo($app->logo_file, PATHINFO_EXTENSION); ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(in_array(strtolower($ext), ['jpg','jpeg','png','gif','webp','svg'])): ?>
                    <img src="<?php echo e(asset('storage/' . $app->logo_file)); ?>" alt="Logo" class="img-fluid rounded" style="max-height:200px;">
                    <div class="mt-2">
                        <a href="<?php echo e(asset('storage/' . $app->logo_file)); ?>" download class="btn btn-sm btn-outline-primary">⬇ Download</a>
                    </div>
                <?php else: ?>
                    <a href="<?php echo e(asset('storage/' . $app->logo_file)); ?>" download class="btn btn-sm btn-outline-primary">⬇ Download File</a>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php else: ?>
                <p class="text-muted">No logo uploaded.</p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <div class="mt-3 text-muted" style="font-size:13px;">
                Submitted: <?php echo e($app->created_at->format('M d, Y h:i A')); ?>

            </div>
        </div>
    </div>

</div>

<div class="mt-3">
    <a href="<?php echo e(route('admin.client.applications.index')); ?>" class="btn btn-secondary">← Back to Applications</a>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\trademark-usp\resources\views/admin/client-applications/show.blade.php ENDPATH**/ ?>