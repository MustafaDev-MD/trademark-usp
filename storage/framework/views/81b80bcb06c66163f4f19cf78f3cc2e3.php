

<?php $__env->startSection('title', 'Client Applications'); ?>

<?php $__env->startSection('content'); ?>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
<div class="alert alert-success alert-dismissible fade show mb-3 p-3 rounded shadow-sm" role="alert">
    <?php echo e(session('success')); ?>

    <button type="button" class="btn-close m-0" aria-label="Close"></button>
</div>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const alerts = document.querySelectorAll('.alert-dismissible');
    alerts.forEach(alert => {
        const closeBtn = alert.querySelector('.btn-close');
        if (!closeBtn) return;
        closeBtn.addEventListener('click', () => {
            alert.style.transition = 'opacity 0.5s ease';
            alert.style.opacity = 0;
            setTimeout(() => alert.remove(), 500);
        });
    });
});
</script>

<h4 class="mb-3">Client Form Applications</h4>

<div class="table-scroll-wrapper" style="overflow:auto;">
    <table class="table datanew table-bordered table-striped table-hover">
        <thead class="sticky-top bg-white">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Owner of Mark</th>
                <th>Business Name</th>
                <th>Trademark Type</th>
                <th>City</th>
                <th>State</th>
                <th>Country</th>
                <th>Submitted</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
            <tr>
                <td><?php echo e($app->id); ?></td>
                <td><?php echo e($app->first_name); ?> <?php echo e($app->last_name); ?></td>
                <td><?php echo e($app->email_address); ?></td>
                <td><?php echo e($app->phone_number); ?></td>
                <td><?php echo e($app->owner_of_mark); ?></td>
                <td><?php echo e($app->business_name ?? '-'); ?></td>
                <td><?php echo e($app->trademark_type); ?></td>
                <td><?php echo e($app->city); ?></td>
                <td><?php echo e($app->state); ?></td>
                <td><?php echo e($app->country); ?></td>
                <td><?php echo e($app->created_at->format('M d, Y')); ?></td>
                <td>
                    <a href="<?php echo e(route('admin.client.applications.show', $app->id)); ?>" class="btn btn-sm btn-secondary">
                        View
                    </a>
                </td>
            </tr>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            <tr>
                <td colspan="12" class="text-center">No applications found</td>
            </tr>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        if (!$.fn.DataTable.isDataTable('.datanew')) {
            $('.datanew').DataTable({
                paging: true, ordering: true, info: true, searching: true,
                lengthMenu: [10, 25, 50, 100], pageLength: 10,
                language: { search: "_INPUT_", searchPlaceholder: "Search applications..." }
            });
        }
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\trademark-usp\resources\views/admin/client-applications/index.blade.php ENDPATH**/ ?>