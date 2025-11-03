<!-- Total Customer Shimmer -->
<div class="box-shadow relative rounded bg-white p-4 dark:bg-gray-900">
    <!-- Header -->
    <div class="mb-4 flex items-center justify-between">
        <div class="shimmer h-[17px] w-[150px]"></div>

        <div class="shimmer h-[21px] w-[79px]"></div>
    </div>

    <div class="grid gap-4">
        <div class="flex place-content-start gap-4">
            <div class="flex items-center gap-4">
                <div class="shimmer h-9 w-[120px]"></div>
                <div class="shimmer h-[17px] w-[75px]"></div>
            </div>
        </div>

        <div class="shimmer h-5 w-[120px]"></div>

        <!-- Graph Shimmer -->
        <?php if (isset($component)) { $__componentOriginalb273e6283c9bd4110a9dd0f716d91695 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb273e6283c9bd4110a9dd0f716d91695 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.shimmer.reporting.graph','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::shimmer.reporting.graph'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb273e6283c9bd4110a9dd0f716d91695)): ?>
<?php $attributes = $__attributesOriginalb273e6283c9bd4110a9dd0f716d91695; ?>
<?php unset($__attributesOriginalb273e6283c9bd4110a9dd0f716d91695); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb273e6283c9bd4110a9dd0f716d91695)): ?>
<?php $component = $__componentOriginalb273e6283c9bd4110a9dd0f716d91695; ?>
<?php unset($__componentOriginalb273e6283c9bd4110a9dd0f716d91695); ?>
<?php endif; ?>

        <!-- Date Range -->
        <div class="flex justify-center gap-5">
            <div class="flex items-center gap-1">
                <div class="shimmer h-3.5 w-3.5 rounded-md"></div>
                <div class="shimmer h-[17px] w-[143px]"></div>
            </div>
            
            <div class="flex items-center gap-1">
                <div class="shimmer h-3.5 w-3.5 rounded-md"></div>
                <div class="shimmer h-[17px] w-[143px]"></div>
            </div>
        </div>
    </div>
</div><?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Admin\src\Resources\views\components\shimmer\reporting\customers\total-customers.blade.php ENDPATH**/ ?>