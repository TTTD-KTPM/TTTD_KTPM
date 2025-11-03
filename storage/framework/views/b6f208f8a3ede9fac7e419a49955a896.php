<?php if (! ($breadcrumbs->isEmpty())): ?>
    <nav>
        <div class="nav-wrapper">
            <div class="col s12">
                <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $breadcrumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <?php if($breadcrumb->url && !$loop->last): ?>
                        <a href="<?php echo e($breadcrumb->url); ?>" class="breadcrumb"><?php echo e($breadcrumb->title); ?></a>
                    <?php else: ?>
                        <span class="breadcrumb"><?php echo e($breadcrumb->title); ?></span>
                    <?php endif; ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </nav>
<?php endif; ?>
<?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\resources\views\vendor\breadcrumbs\materialize.blade.php ENDPATH**/ ?>