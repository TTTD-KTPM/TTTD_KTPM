<!-- SEO Meta Content -->
<?php $__env->startPush('meta'); ?>
    <meta name="description" content="<?php echo e(core()->getCurrentChannel()->home_seo['meta_description'] ?? ''); ?>"/>

    <meta name="keywords" content="<?php echo e(core()->getCurrentChannel()->home_seo['meta_keywords'] ?? ''); ?>"/>
<?php $__env->stopPush(); ?>

<!-- Page Title -->
<?php if (isset($component)) { $__componentOriginal2643b7d197f48caff2f606750db81304 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2643b7d197f48caff2f606750db81304 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.layouts.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::layouts'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('title', null, []); ?> 
        <?php echo e(core()->getCurrentChannel()->home_seo['meta_title'] ?? config('app.name')); ?>

     <?php $__env->endSlot(); ?>

    <!-- Page Content -->
    <div class="container mt-8 px-[60px] max-lg:px-8">
        <!-- Customizations -->
        <?php $__currentLoopData = $customizations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customization): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <x-shop::<?php echo e($customization->type); ?> :customization="$customization" />
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php /**PATH C:\D\xampp\htdocs\TTTD_KTPM_Clone2\packages\Webkul\Shop\src/resources/views/home/index.blade.php ENDPATH**/ ?>