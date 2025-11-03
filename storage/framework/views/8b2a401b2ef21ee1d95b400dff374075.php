<!-- Most Reviews Shimmer -->
<div class="box-shadow relative flex-1 rounded bg-white p-4 dark:bg-gray-900">
    <!-- Header -->
    <div class="mb-4 flex items-center justify-between">
        <div class="shimmer h-[17px] w-[150px]"></div>

        <div class="shimmer h-[21px] w-[79px]"></div>
    </div>
    
    <!-- Progrss Bar Shimmer -->
    <?php if (isset($component)) { $__componentOriginal16633fb258bec858d16ec8ba7a4ac8f1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16633fb258bec858d16ec8ba7a4ac8f1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.shimmer.reporting.progress-bar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::shimmer.reporting.progress-bar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16633fb258bec858d16ec8ba7a4ac8f1)): ?>
<?php $attributes = $__attributesOriginal16633fb258bec858d16ec8ba7a4ac8f1; ?>
<?php unset($__attributesOriginal16633fb258bec858d16ec8ba7a4ac8f1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16633fb258bec858d16ec8ba7a4ac8f1)): ?>
<?php $component = $__componentOriginal16633fb258bec858d16ec8ba7a4ac8f1; ?>
<?php unset($__componentOriginal16633fb258bec858d16ec8ba7a4ac8f1); ?>
<?php endif; ?>
</div><?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Admin\src\Resources\views\components\shimmer\reporting\products\most-reviews.blade.php ENDPATH**/ ?>