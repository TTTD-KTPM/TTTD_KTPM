<div class="grid px-1 py-2">
    <div class="flex items-center justify-between gap-4 max-sm:flex-wrap">
        <div class="flex items-center gap-2.5">
            <div class="shimmer h-6 w-24"></div>

            <div class="shimmer mx-1 h-6 w-14 rounded-full"></div>
        </div>

        <div class="shimmer h-6 w-12"></div>
    </div>
</div>

<div class="mt-8 flex flex-wrap items-center gap-x-1 gap-y-2">
    <div class="shimmer mx-1 h-8 w-[141px]"></div>

    <div class="shimmer mx-1 h-8 w-[178px]"></div>

    <div class="shimmer mx-1 h-8 w-[166px]"></div>
</div>

<div class="mt-3.5 flex gap-2.5 max-xl:flex-wrap">
    <!-- Left Section -->
    <div class="flex flex-1 flex-col gap-2 max-xl:flex-auto">
        <div class="box-shadow rounded bg-white p-4 dark:bg-gray-900">
            <div class="flex justify-between">
                <div class="shimmer h-[18px] w-[77px]"></div>

                <div class="shimmer h-[18px] w-40"></div>
            </div>

            <div>
                <?php if (isset($component)) { $__componentOriginal53a6a59aff92302e5d442819eff9928e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53a6a59aff92302e5d442819eff9928e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.shimmer.datagrid.toolbar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::shimmer.datagrid.toolbar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal53a6a59aff92302e5d442819eff9928e)): ?>
<?php $attributes = $__attributesOriginal53a6a59aff92302e5d442819eff9928e; ?>
<?php unset($__attributesOriginal53a6a59aff92302e5d442819eff9928e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal53a6a59aff92302e5d442819eff9928e)): ?>
<?php $component = $__componentOriginal53a6a59aff92302e5d442819eff9928e; ?>
<?php unset($__componentOriginal53a6a59aff92302e5d442819eff9928e); ?>
<?php endif; ?>

                <div class="table-responsive box-shadow mt-4 grid w-full overflow-hidden rounded bg-white dark:bg-gray-900">

                    <?php if (isset($component)) { $__componentOriginalc107096d39100b5f7264e4f2087676a5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc107096d39100b5f7264e4f2087676a5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.shimmer.datagrid.table.head','data' => ['isMultiRow' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::shimmer.datagrid.table.head'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['isMultiRow' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc107096d39100b5f7264e4f2087676a5)): ?>
<?php $attributes = $__attributesOriginalc107096d39100b5f7264e4f2087676a5; ?>
<?php unset($__attributesOriginalc107096d39100b5f7264e4f2087676a5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc107096d39100b5f7264e4f2087676a5)): ?>
<?php $component = $__componentOriginalc107096d39100b5f7264e4f2087676a5; ?>
<?php unset($__componentOriginalc107096d39100b5f7264e4f2087676a5); ?>
<?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginal601d211589286a2faeaa4f7f9edf9405 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal601d211589286a2faeaa4f7f9edf9405 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.shimmer.datagrid.table.body','data' => ['isMultiRow' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::shimmer.datagrid.table.body'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['isMultiRow' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal601d211589286a2faeaa4f7f9edf9405)): ?>
<?php $attributes = $__attributesOriginal601d211589286a2faeaa4f7f9edf9405; ?>
<?php unset($__attributesOriginal601d211589286a2faeaa4f7f9edf9405); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal601d211589286a2faeaa4f7f9edf9405)): ?>
<?php $component = $__componentOriginal601d211589286a2faeaa4f7f9edf9405; ?>
<?php unset($__componentOriginal601d211589286a2faeaa4f7f9edf9405); ?>
<?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!--Right Section -->
    <div class="flex w-[360px] max-w-full flex-col gap-2 max-sm:w-full">
        <div class="box-shadow rounded bg-white dark:bg-gray-900">
            <?php if (isset($component)) { $__componentOriginald4a2ee3b74458b25b1bb9b9a154dc326 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald4a2ee3b74458b25b1bb9b9a154dc326 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.shimmer.accordion.index','data' => ['class' => '!h-[200px]']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::shimmer.accordion'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => '!h-[200px]']); ?>
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

        <div class="box-shadow rounded bg-white dark:bg-gray-900">
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
    </div>
</div><?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Admin\src\Resources\views\components\shimmer\customers\view\index.blade.php ENDPATH**/ ?>