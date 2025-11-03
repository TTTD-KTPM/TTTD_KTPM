<!-- Category Layouts -->
<div class="flex gap-4">
    <!-- Default Menu -->
    <?php if (isset($component)) { $__componentOriginal09768308838b828c7799162f44758281 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal09768308838b828c7799162f44758281 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.modal.index','data' => ['class' => '[&>*>*>.box-shadow]:!max-w-[1000px]']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => '[&>*>*>.box-shadow]:!max-w-[1000px]']); ?>
         <?php $__env->slot('toggle', null, []); ?> 
            <button type="button">
                <p class="text-sm text-blue-600 transition-all hover:underline">
                    <?php echo app('translator')->get('admin::app.configuration.index.general.design.menu-category.preview-default'); ?>
                </p>
            </button>
         <?php $__env->endSlot(); ?>

         <?php $__env->slot('header', null, []); ?> 
            <p class="text-base font-semibold text-gray-800 dark:text-white">
                <?php echo app('translator')->get('admin::app.configuration.index.general.design.menu-category.default'); ?>
            </p>
         <?php $__env->endSlot(); ?>

         <?php $__env->slot('content', null, ['class' => '!border-none']); ?> 
            <img
                class="border border-gray-200"
                src="<?php echo e(bagisto_asset('images/configuration/default-menu.svg')); ?>"
                alt="<?php echo e(trans('admin::app.configuration.index.general.design.menu-category.default')); ?>"
            >
         <?php $__env->endSlot(); ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal09768308838b828c7799162f44758281)): ?>
<?php $attributes = $__attributesOriginal09768308838b828c7799162f44758281; ?>
<?php unset($__attributesOriginal09768308838b828c7799162f44758281); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal09768308838b828c7799162f44758281)): ?>
<?php $component = $__componentOriginal09768308838b828c7799162f44758281; ?>
<?php unset($__componentOriginal09768308838b828c7799162f44758281); ?>
<?php endif; ?>

    <!-- Sidebar Menu -->
    <?php if (isset($component)) { $__componentOriginal09768308838b828c7799162f44758281 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal09768308838b828c7799162f44758281 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.modal.index','data' => ['class' => '[&>*>*>.box-shadow]:!max-w-[1000px]']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => '[&>*>*>.box-shadow]:!max-w-[1000px]']); ?>
         <?php $__env->slot('toggle', null, []); ?> 
            <button type="button">
                <p class="text-sm text-blue-600 transition-all hover:underline">
                    <?php echo app('translator')->get('admin::app.configuration.index.general.design.menu-category.preview-sidebar'); ?>
                </p>
            </button>
         <?php $__env->endSlot(); ?>

         <?php $__env->slot('header', null, []); ?> 
            <p class="text-base font-semibold text-gray-800 dark:text-white">
                <?php echo app('translator')->get('admin::app.configuration.index.general.design.menu-category.sidebar'); ?>
            </p>
         <?php $__env->endSlot(); ?>

         <?php $__env->slot('content', null, ['class' => '!border-none']); ?> 
            <img 
                class="border border-gray-200"
                src="<?php echo e(bagisto_asset('images/configuration/side-bar-menu.svg')); ?>"
                alt="<?php echo e(trans('admin::app.configuration.index.general.design.menu-category.sidebar')); ?>"
            >
         <?php $__env->endSlot(); ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal09768308838b828c7799162f44758281)): ?>
<?php $attributes = $__attributesOriginal09768308838b828c7799162f44758281; ?>
<?php unset($__attributesOriginal09768308838b828c7799162f44758281); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal09768308838b828c7799162f44758281)): ?>
<?php $component = $__componentOriginal09768308838b828c7799162f44758281; ?>
<?php unset($__componentOriginal09768308838b828c7799162f44758281); ?>
<?php endif; ?>
</div><?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Admin\src\Resources\views\configuration\custom-views\category-menu.blade.php ENDPATH**/ ?>