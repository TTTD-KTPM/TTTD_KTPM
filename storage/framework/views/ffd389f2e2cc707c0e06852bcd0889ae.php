<div class="mt-3.5 flex gap-2.5 max-xl:flex-wrap">
    <!-- Left sub-components -->
    <div class="flex flex-1 flex-col gap-2 max-xl:flex-auto">
        <!-- General Section -->
        <div class="box-shadow rounded bg-white p-4 dark:bg-gray-900">
            <div class="shimmer mb-4 h-5 w-16"></div>

            <!-- Name -->
            <div class="mb-4">
                <div class="shimmer mb-1.5 h-3.5 w-16"></div>

                <div class="h-[42px] w-full rounded-md border px-3 py-2.5 dark:border-gray-800 dark:bg-gray-900"></div>
            </div>

            <!-- Description -->
            <div class="mb-6">
                <div class="shimmer mb-1.5 h-4 w-16"></div>

                <div class="h-[61px] w-full rounded-md border px-3 py-2.5 dark:border-gray-800 dark:bg-gray-900"></div>
            </div>

            <?php for($i = 1; $i < 3; $i++): ?>
                <div class="mb-5 last:!mb-8">
                    <div class="shimmer mb-1.5 h-3.5 w-16"></div>

                    <div class="h-[42px] w-full rounded-md border px-3 py-2.5 dark:border-gray-800 dark:bg-gray-900"></div>
                </div>
            <?php endfor; ?>
        </div>

        <!-- Conditions Section -->
        <div class="box-shadow rounded bg-white p-4 dark:bg-gray-900">
            <div class="flex items-center justify-between gap-4">
                <div class="shimmer h-5 w-20"></div>

                <div class="grid w-[204px] gap-2">
                    <div class="shimmer grid-col-1 h-4"></div>

                    <div class="shimmer h-[42px] rounded"></div>
                </div>
            </div>

            <!-- Button -->
            <div class="secondary-button mt-4 h-[38px] w-[137px]"></div>
        </div>
    </div>

     <!-- Right sub-components -->
    <div class="flex w-[360px] max-w-full flex-col gap-2 max-sm:w-full">
        <?php if (isset($component)) { $__componentOriginald4a2ee3b74458b25b1bb9b9a154dc326 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald4a2ee3b74458b25b1bb9b9a154dc326 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.shimmer.accordion.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::shimmer.accordion'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald4a2ee3b74458b25b1bb9b9a154dc326)): ?>
<?php $attributes = $__attributesOriginald4a2ee3b74458b25b1bb9b9a154dc326; ?>
<?php unset($__attributesOriginald4a2ee3b74458b25b1bb9b9a154dc326); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald4a2ee3b74458b25b1bb9b9a154dc326)): ?>
<?php $component = $__componentOriginald4a2ee3b74458b25b1bb9b9a154dc326; ?>
<?php unset($__componentOriginald4a2ee3b74458b25b1bb9b9a154dc326); ?>
<?php endif; ?>

        <?php if (isset($component)) { $__componentOriginald4a2ee3b74458b25b1bb9b9a154dc326 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald4a2ee3b74458b25b1bb9b9a154dc326 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.shimmer.accordion.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::shimmer.accordion'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald4a2ee3b74458b25b1bb9b9a154dc326)): ?>
<?php $attributes = $__attributesOriginald4a2ee3b74458b25b1bb9b9a154dc326; ?>
<?php unset($__attributesOriginald4a2ee3b74458b25b1bb9b9a154dc326); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald4a2ee3b74458b25b1bb9b9a154dc326)): ?>
<?php $component = $__componentOriginald4a2ee3b74458b25b1bb9b9a154dc326; ?>
<?php unset($__componentOriginald4a2ee3b74458b25b1bb9b9a154dc326); ?>
<?php endif; ?>
    </div>
</div><?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Admin\src\Resources\views\components\shimmer\marketing\promotions\cart-rules\index.blade.php ENDPATH**/ ?>