<?php if (! ($breadcrumbs->isEmpty())): ?>
    <nav class="container mx-auto">
        <ol class="p-4 rounded flex flex-wrap bg-gray-300 text-sm text-gray-800">
            <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $breadcrumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <?php if($breadcrumb->url && !$loop->last): ?>
                    <li>
                        <a href="<?php echo e($breadcrumb->url); ?>" class="text-blue-600 hover:text-blue-900 hover:underline focus:text-blue-900 focus:underline">
                            <?php echo e($breadcrumb->title); ?>

                        </a>
                    </li>
                <?php else: ?>
                    <li>
                        <?php echo e($breadcrumb->title); ?>

                    </li>
                <?php endif; ?>

                <?php if (! ($loop->last)): ?>
                    <li class="text-gray-500 px-2">
                        /
                    </li>
                <?php endif; ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ol>
    </nav>
<?php endif; ?>
<?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\resources\views\vendor\breadcrumbs\tailwind.blade.php ENDPATH**/ ?>