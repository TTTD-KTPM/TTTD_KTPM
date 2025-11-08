<?php if (isset($component)) { $__componentOriginal2643b7d197f48caff2f606750db81304 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2643b7d197f48caff2f606750db81304 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.layouts.index','data' => ['hasFeature' => false]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::layouts'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['has-feature' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false)]); ?>
    <!-- Page Title -->
     <?php $__env->slot('title', null, []); ?> 
        <?php echo e($title ?? ''); ?>

     <?php $__env->endSlot(); ?>

    <!-- Page Content -->
    <div class="container px-[60px] max-lg:px-8 max-md:px-0">
        <?php if (isset($component)) { $__componentOriginal0dfae93274d9538b7db96d0ca3405a63 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0dfae93274d9538b7db96d0ca3405a63 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.layouts.account.breadcrumb','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::layouts.account.breadcrumb'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0dfae93274d9538b7db96d0ca3405a63)): ?>
<?php $attributes = $__attributesOriginal0dfae93274d9538b7db96d0ca3405a63; ?>
<?php unset($__attributesOriginal0dfae93274d9538b7db96d0ca3405a63); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0dfae93274d9538b7db96d0ca3405a63)): ?>
<?php $component = $__componentOriginal0dfae93274d9538b7db96d0ca3405a63; ?>
<?php unset($__componentOriginal0dfae93274d9538b7db96d0ca3405a63); ?>
<?php endif; ?>

        <div class="mt-8 flex items-start gap-10 max-lg:gap-5 max-md:mt-5 max-md:grid ltr:max-md:gap-0 rtl:max-md:gap-0">
            <?php echo e($slot); ?>

        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2643b7d197f48caff2f606750db81304)): ?>
<?php $attributes = $__attributesOriginal2643b7d197f48caff2f606750db81304; ?>
<?php unset($__attributesOriginal2643b7d197f48caff2f606750db81304); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2643b7d197f48caff2f606750db81304)): ?>
<?php $component = $__componentOriginal2643b7d197f48caff2f606750db81304; ?>
<?php unset($__componentOriginal2643b7d197f48caff2f606750db81304); ?>
<?php endif; ?>
<?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Shop\src/resources/views/components/layouts/account/index.blade.php ENDPATH**/ ?>