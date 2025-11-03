<?php if (! ($breadcrumbs->isEmpty())): ?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $breadcrumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <?php if($breadcrumb->url && !$loop->last): ?>
                    <li class="breadcrumb-item"><a href="<?php echo e($breadcrumb->url); ?>"><?php echo e($breadcrumb->title); ?></a></li>
                <?php else: ?>
                    <li class="breadcrumb-item active"><?php echo e($breadcrumb->title); ?></li>
                <?php endif; ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ol>
    </nav>
<?php endif; ?>
<?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\resources\views\vendor\breadcrumbs\bootstrap4.blade.php ENDPATH**/ ?>