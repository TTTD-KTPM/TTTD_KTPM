<?php if (! ($breadcrumbs->isEmpty())): ?>
    <nav class="breadcrumb" aria-label="breadcrumbs">
        <ul>
            <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $breadcrumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <?php if($loop->last): ?>
                    <?php if($breadcrumb->url): ?>
                        <li class="is-active"><a href="<?php echo e($breadcrumb->url); ?>" aria-current="page"><?php echo e($breadcrumb->title); ?></a></li>
                    <?php else: ?>
                        <li class="is-active"><a aria-current="page"><?php echo e($breadcrumb->title); ?></a></li>
                    <?php endif; ?>
                <?php else: ?>
                    <?php if($breadcrumb->url): ?>
                        <li><a href="<?php echo e($breadcrumb->url); ?>"><?php echo e($breadcrumb->title); ?></a></li>
                    <?php else: ?>
                        <li class="is-active"><a><?php echo e($breadcrumb->title); ?></a></li>
                    <?php endif; ?>
                <?php endif; ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </nav>
<?php endif; ?>
<?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\vendor\diglactic\laravel-breadcrumbs\resources\views\bulma.blade.php ENDPATH**/ ?>