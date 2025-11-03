<div class="grid gap-7">
    <?php $__currentLoopData = range(1, 5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="grid">
            <div class="shimmer h-[17px] w-[150px]"></div>

            <div class="flex items-center gap-5">
                <div class="shimmer h-2 w-full"></div>

                <div class="shimmer h-[17px] w-[35px]"></div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <div class="flex justify-end gap-5">
        <div class="flex items-center gap-1">
            <div class="shimmer h-3.5 w-3.5 rounded-md"></div>
            <div class="shimmer h-[17px] w-[143px]"></div>
        </div>
    </div>
</div><?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Admin\src\Resources\views\components\shimmer\reporting\progress-bar.blade.php ENDPATH**/ ?>