

<?php $__env->startSection('title', 'Admin Dashboard'); ?>

<?php $__env->startSection('content'); ?>


<!-- <div class="row"> -->
   <!-- <div class="col-lg-3 col-sm-6 col-12">
      <div class="dash-widget">
         <div class="dash-widgetimg">
            <span><img src="<?php echo e(asset('assets/img/icons/dash1.svg')); ?>" alt="img"></span>
         </div>
         <div class="dash-widgetcontent">
            <h5>$<span class="counters" data-count="307144.00">$307,144.00</span></h5>
            <h6>Total Purchase Due</h6>
         </div>
      </div>
   </div>
   <div class="col-lg-3 col-sm-6 col-12">
      <div class="dash-widget dash1">
         <div class="dash-widgetimg">
            <span><img src="<?php echo e(asset('assets/img/icons/dash2.svg')); ?>" alt="img"></span>
         </div>
         <div class="dash-widgetcontent">
            <h5>$<span class="counters" data-count="4385.00">$4,385.00</span></h5>
            <h6>Total Sales Due</h6>
         </div>
      </div>
   </div>
   <div class="col-lg-3 col-sm-6 col-12">
      <div class="dash-widget dash2">
         <div class="dash-widgetimg">
            <span><img src="<?php echo e(asset('assets/img/icons/dash3.svg')); ?>" alt="img"></span>
         </div>
         <div class="dash-widgetcontent">
            <h5>$<span class="counters" data-count="385656.50">385,656.50</span></h5>
            <h6>Total Sale Amount</h6>
         </div>
      </div>
   </div>
   <div class="col-lg-3 col-sm-6 col-12">
      <div class="dash-widget dash3">
         <div class="dash-widgetimg">
            <span><img src="<?php echo e(asset('assets/img/icons/dash4.svg')); ?>" alt="img"></span>
         </div>
         <div class="dash-widgetcontent">
            <h5>$<span class="counters" data-count="40000.00">400.00</span></h5>
            <h6>Total Sale Amount</h6>
         </div>
      </div>
   </div> -->
   <!-- <div class="col-lg-3 col-sm-6 col-12 d-flex">
      <div class="dash-count">
         <div class="dash-counts">
            <h4>100</h4>
            <h5>User</h5>
         </div>
         <div class="dash-imgs">
            <i data-feather="user"></i>
         </div>
      </div>
   </div>
   <div class="col-lg-3 col-sm-6 col-12 d-flex">
      <div class="dash-count das1">
         <div class="dash-counts">
            <h4>100</h4>
            <h5>Forms</h5>
         </div>
         <div class="dash-imgs">
            <i data-feather="user-check"></i>
         </div>
      </div>
   </div>
   <div class="col-lg-3 col-sm-6 col-12 d-flex">
      <div class="dash-count das2">
         <div class="dash-counts">
            <h4>100</h4>
            <h5>Orders</h5>
         </div>
         <div class="dash-imgs">
            <i data-feather="file-text"></i>
         </div>
      </div>
   </div>
   <div class="col-lg-3 col-sm-6 col-12 d-flex">
      <div class="dash-count das3">
         <div class="dash-counts">
            <h4>105</h4>
            <h5>Amount</h5>
         </div>
         <div class="dash-imgs">
            <i data-feather="file"></i>
         </div>
      </div>
   </div>
</div> -->

<!-- <div class="row"> -->
   <!-- <div class="col-lg-7 col-sm-12 col-12 d-flex">
      <div class="card flex-fill">
         <div class="card-header pb-0 d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Purchase & Sales</h5>
            <div class="graph-sets">
               <ul>
                  <li>
                     <span>Sales</span>
                  </li>
                  <li>
                     <span>Purchase</span>
                  </li>
               </ul>
               <div class="dropdown">
                  <button class="btn btn-white btn-sm dropdown-toggle" type="button"
                     id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                     2022 <img src="<?php echo e(asset('assets/img/icons/dropdown.svg')); ?>" alt="img" class="ms-2">
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                     <li>
                        <a href="javascript:void(0);" class="dropdown-item">2022</a>
                     </li>
                     <li>
                        <a href="javascript:void(0);" class="dropdown-item">2021</a>
                     </li>
                     <li>
                        <a href="javascript:void(0);" class="dropdown-item">2020</a>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
         <div class="card-body">
            <div id="sales_charts"></div>
         </div>
      </div>
   </div> -->
   <!-- <div class="col-lg-5 col-sm-12 col-12 d-flex">
      <div class="card flex-fill"> -->
         <!-- <div class="card-header pb-0 d-flex justify-content-between align-items-center">
            <h4 class="card-title mb-0">Recently Registered User</h4>
            <div class="dropdown">
               <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false"
                  class="dropset">
                  <i class="fa fa-ellipsis-v"></i>
               </a>
               <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <li>
                     <a href="productlist.html" class="dropdown-item">User List</a>
                  </li>
                  <li>
                     <a href="addproduct.html" class="dropdown-item">Add User</a>
                  </li>
               </ul>
            </div>
         </div> -->
         <!-- <div class="card-body">
            <div class="table-responsive dataview">
               <table class="table datatable ">
                  <thead>
                     <tr>
                        <th>Sno</th>
                        <th>Products</th>
                        <th>Price</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td>1</td>
                        <td class="productimgname">
                           <a href="productlist.html" class="product-img">
                              <img src="<?php echo e(asset('assets/img/product/product22.jpg')); ?>" alt="product">
                           </a>
                           <a href="productlist.html">Apple Earpods</a>
                        </td>
                        <td>$891.2</td>
                     </tr>
                     <tr>
                        <td>2</td>
                        <td class="productimgname">
                           <a href="productlist.html" class="product-img">
                              <img src="<?php echo e(asset('assets/img/product/product23.jpg')); ?>" alt="product">
                           </a>
                           <a href="productlist.html">iPhone 11</a>
                        </td>
                        <td>$668.51</td>
                     </tr>
                     <tr>
                        <td>3</td>
                        <td class="productimgname">
                           <a href="productlist.html" class="product-img">
                              <img src="<?php echo e(asset('assets/img/product/product24.jpg')); ?>" alt="product">
                           </a>
                           <a href="productlist.html">samsung</a>
                        </td>
                        <td>$522.29</td>
                     </tr>
                     <tr>
                        <td>4</td>
                        <td class="productimgname">
                           <a href="productlist.html" class="product-img">
                              <img src="<?php echo e(asset('assets/img/product/product6.jpg')); ?>" alt="product">
                           </a>
                           <a href="productlist.html">Macbook Pro</a>
                        </td>
                        <td>$291.01</td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div> -->
      <!-- </div>
   </div> -->
<!-- </div> -->

<!-- <div class="card mb-0">
   <div class="card-body">
      <h4 class="card-title">Expired Products</h4>
      <div class="table-responsive dataview">
         <table class="table datatable ">
            <thead>
               <tr>
                  <th>SNo</th>
                  <th>Product Code</th>
                  <th>Product Name</th>
                  <th>Brand Name</th>
                  <th>Category Name</th>
                  <th>Expiry Date</th>
               </tr>
            </thead>
            <tbody>
               <tr>
                  <td>1</td>
                  <td><a href="javascript:void(0);">IT0001</a></td>
                  <td class="productimgname">
                     <a class="product-img" href="productlist.html">
                        <img src="<?php echo e(asset('assets/img/product/product2.jpg')); ?>" alt="product">
                     </a>
                     <a href="productlist.html">Orange</a>
                  </td>
                  <td>N/D</td>
                  <td>Fruits</td>
                  <td>12-12-2022</td>
               </tr>
               <tr>
                  <td>2</td>
                  <td><a href="javascript:void(0);">IT0002</a></td>
                  <td class="productimgname">
                     <a class="product-img" href="productlist.html">
                        <img src="<?php echo e(asset('assets/img/product/product3.jpg')); ?>" alt="product">
                     </a>
                     <a href="productlist.html">Pineapple</a>
                  </td>
                  <td>N/D</td>
                  <td>Fruits</td>
                  <td>25-11-2022</td>
               </tr>
               <tr>
                  <td>3</td>
                  <td><a href="javascript:void(0);">IT0003</a></td>
                  <td class="productimgname">
                     <a class="product-img" href="productlist.html">
                        <img src="<?php echo e(asset('assets/img/product/product4.jpg')); ?>" alt="product">
                     </a>
                     <a href="productlist.html">Stawberry</a>
                  </td>
                  <td>N/D</td>
                  <td>Fruits</td>
                  <td>19-11-2022</td>
               </tr>
               <tr>
                  <td>4</td>
                  <td><a href="javascript:void(0);">IT0004</a></td>
                  <td class="productimgname">
                     <a class="product-img" href="productlist.html">
                        <img src="<?php echo e(asset('assets/img/product/product5.jpg')); ?>" alt="product">
                     </a>
                     <a href="productlist.html">Avocat</a>
                  </td>
                  <td>N/D</td>
                  <td>Fruits</td>
                  <td>20-11-2022</td>
               </tr>
            </tbody>
         </table>
      </div>
   </div>
</div> -->
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
<div id="success-alert" 
     class="alert alert-success alert-dismissible fade show mb-3 p-3 rounded shadow-sm" 
     role="alert">
    <?php echo e(session('success')); ?>

    <!-- Close button -->
    <button type="button" class="btn-close m-0" aria-label="Close"></button>
</div>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('error')): ?>
<div id="error-alert" 
     class="alert alert-danger alert-dismissible fade show mb-3 p-3 rounded shadow-sm" 
     role="alert">
    <?php echo e(session('error')); ?>

    <!-- Close button -->
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
            // Smooth fade out
            alert.style.transition = 'opacity 0.5s ease';
            alert.style.opacity = 0;

            // Remove after fade
            setTimeout(() => alert.remove(), 500);
        });
    });
});
</script>



<h4>All Users</h4>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>DOB</th> 
            <th>Applications</th>
        </tr>
    </thead>
    <tbody>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
        <tr>
            <td><?php echo e($user->id); ?></td>
            <td><?php echo e($user->name ?? '-'); ?></td>
            <td><?php echo e($user->email); ?></td>
            <td><?php echo e($user->phone); ?></td>
            <td>
                <?php echo e($user->dob ? $user->dob->format('d M Y') : '-'); ?>

                (<small class="text-muted">Age: <?php echo e($user->age); ?></small>)
            </td>
            <td>
                <a href="<?php echo e(route('admin.user.applications', $user->id)); ?>" class="btn btn-sm btn-primary">
                    View Applications (<?php echo e($user->applications->count()); ?>)
                </a>
            </td>
        </tr>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        <tr>
            <td colspan="4" class="text-center">No users found</td>
        </tr>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </tbody>
</table>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\trademark-usp\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>