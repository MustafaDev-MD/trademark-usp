

<?php $__env->startSection('title', 'User Dashboard'); ?>

<?php $__env->startSection('content'); ?>

<!---->
<!--<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>-->
<!--<div id="success-alert" class="alert alert-success mb-3">-->
<!--    <?php echo e(session('success')); ?>-->
<!--</div>-->

<!--<script>-->
<!--    setTimeout(() => {-->
<!--        const alert = document.getElementById('success-alert');-->
<!--        if (alert) {-->
<!--            alert.style.display = 'none';-->
<!--        }-->
    <!--}, 5000); // hides after 5 seconds-->
<!--</script>-->
<!--<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>-->

<!--<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('error')): ?>-->
<!--<div id="error-alert" class="alert alert-danger mb-3">-->
<!--    <?php echo e(session('error')); ?>-->
<!--</div>-->

<!--<script>-->
<!--    setTimeout(() => {-->
<!--        const alert = document.getElementById('error-alert');-->
<!--        if (alert) {-->
<!--            alert.style.display = 'none';-->
<!--        }-->
    <!--}, 5000); // hides after 5 seconds-->
<!--</script>-->
<!--<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>-->

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
<div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
    <?php echo e(session('success')); ?>

    <button type="button" class="btn-close m-0" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('error')): ?>
<div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
    <?php echo e(session('error')); ?>

    <button type="button" class="btn-close m-0" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>


<script>
document.addEventListener('DOMContentLoaded', function() {
    // Select all close buttons
    const closeButtons = document.querySelectorAll('.close-alert');

    closeButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            const alert = btn.parentElement;
            if (alert) {
                alert.style.transition = "opacity 0.5s ease";
                alert.style.opacity = 0;
                setTimeout(() => alert.remove(), 500); // remove after fade
            }
        });
    });
});
</script>



<div class="table-scroll-wrapper" style="overflow:auto;">
    <table class="table datanew table-bordered table-striped">
        <thead class="sticky-top bg-white">
            <tr>
                <th>ID</th>
                <th>Trademark Type</th>
                <th>Trademark Text</th>
                <th>Logo Name</th>
                <th>Logo Description</th>
                <!--<th>First Name</th>-->
                <!--<th>Last Name</th>-->
                <!--<th>Email</th>-->
                <!--<th>Phone</th>-->
                <th>Plan</th>
                <th>Plan Price</th>
                <th>Addons</th>
                <th>Addons Price</th>
                <th>Priority</th>
                <th>Priority Price</th>
                <th>Subtotal</th>
                <th>Promo Code</th>
                <th>Discount</th>
                <th>Total</th>
                <th>Payment Status</th>
                <th>Project Status</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
            <tr>
                <td><?php echo e($app->id); ?></td>
                <td><?php echo e(ucfirst($app->trademark_type)); ?></td>
                <td><?php echo e($app->trademark_text ?? '-'); ?></td>
                <td><?php echo e($app->logo_name ?? '-'); ?></td>
                <td><?php echo e($app->logo_description ?? '-'); ?></td>
                <!--<td><?php echo e($app->first_name); ?></td>-->
                <!--<td><?php echo e($app->last_name); ?></td>-->
                <!--<td><?php echo e($app->email); ?></td>-->
                <!--<td><?php echo e($app->phone); ?></td>-->
                <td><?php echo e(ucfirst($app->plan)); ?></td>
                <td>$<?php echo e(number_format($app->plan_price ?? 0, 2)); ?></td>
                <td><?php echo e(is_array($app->addons) ? implode(', ', $app->addons) : '-'); ?></td>
                <td>$<?php echo e(number_format($app->addons_price ?? 0, 2)); ?></td>
                <td><?php echo e(ucfirst($app->priority)); ?></td>
                <td>$<?php echo e(number_format($app->priority_price ?? 0, 2)); ?></td>
                <td>$<?php echo e(number_format($app->subtotal ?? 0, 2)); ?></td>
                <td><?php echo e($app->promo_code ?? '-'); ?></td>
                <td>$<?php echo e(number_format($app->discount ?? 0, 2)); ?></td>
                <td>$<?php echo e(number_format($app->total ?? 0, 2)); ?></td>

                
                <td>
                    <?php
                    $paymentClass = match($app->payment_status) {
                    'paid' => 'bg-lightgreen',
                    'partial' => 'bg-lightyellow',
                    default => 'bg-lightred',
                    };
                    ?>
                    <span class="badges <?php echo e($paymentClass); ?>">
                        <?php echo e(ucfirst($app->payment_status)); ?>

                    </span>
                </td>

                
                <td>
                    <?php
                    $projectClass = match($app->project_status) {
                    'completed' => 'bg-success',
                    'in_progress' => 'bg-primary',
                    'on_hold' => 'bg-warning',
                    default => 'bg-secondary',
                    };
                    ?>
                    <span class="badges <?php echo e($projectClass); ?>">
                        <?php echo e(ucfirst(str_replace('_',' ', $app->project_status))); ?>

                    </span>
                </td>

                


                
                <td>
                    <a href="<?php echo e(route('user.applications.show', $app->id)); ?>" class="btn btn-sm btn-secondary">
                        View
                    </a>
                </td>
            </tr>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            <tr>
                <td colspan="21" class="text-center">No applications found</td>
            </tr>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </tbody>
    </table>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready(function() {
        if (!$.fn.DataTable.isDataTable('.datanew')) {
            $('.datanew').DataTable({
                paging: true,
                ordering: true,
                info: true,
                searching: true,
                lengthMenu: [10, 25, 50, 100],
                pageLength: 10,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search applications..."
                }
            });
        }
    });

    $('#example').DataTable({
        "infoCallback": function(settings, start, end, max, total, pre) {
            return `Showing <strong>${start}</strong> to <strong>${end}</strong> of <strong>${total}</strong> entries`;
        }
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\trademark-usp\resources\views/user/dashboard.blade.php ENDPATH**/ ?>