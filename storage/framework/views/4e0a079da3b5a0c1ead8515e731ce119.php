<?php echo view_render_event('bagisto.admin.catalog.product.edit.form.videos.before', ['product' => $product]); ?>


<div class="box-shadow relative rounded bg-white p-4 dark:bg-gray-900">
    <!-- Panel Header -->
    <div class="mb-4 flex justify-between gap-5">
        <div class="flex flex-col gap-2">
            <p class="text-base font-semibold text-gray-800 dark:text-white">
                <?php echo app('translator')->get('admin::app.catalog.products.edit.videos.title'); ?>
            </p>

            <p class="text-xs font-medium text-gray-500 dark:text-gray-300">
                <?php echo app('translator')->get('admin::app.catalog.products.edit.videos.info', ['size' => core()->getMaxUploadSize()]); ?>
            </p>
        </div>
    </div>

    <!-- Video Blade Component -->
    <?php if (isset($component)) { $__componentOriginale00d3def8b4d43125c751be117ebe21e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale00d3def8b4d43125c751be117ebe21e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.media.videos','data' => ['name' => 'videos[files]','allowMultiple' => true,'uploadedVideos' => $product->videos]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::media.videos'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'videos[files]','allow-multiple' => true,'uploaded-videos' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product->videos)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale00d3def8b4d43125c751be117ebe21e)): ?>
<?php $attributes = $__attributesOriginale00d3def8b4d43125c751be117ebe21e; ?>
<?php unset($__attributesOriginale00d3def8b4d43125c751be117ebe21e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale00d3def8b4d43125c751be117ebe21e)): ?>
<?php $component = $__componentOriginale00d3def8b4d43125c751be117ebe21e; ?>
<?php unset($__componentOriginale00d3def8b4d43125c751be117ebe21e); ?>
<?php endif; ?>

    <?php if (isset($component)) { $__componentOriginal8da25fb6534e2ef288914e35c32417f8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8da25fb6534e2ef288914e35c32417f8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.error','data' => ['controlName' => 'videos.files[0]']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['control-name' => 'videos.files[0]']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8da25fb6534e2ef288914e35c32417f8)): ?>
<?php $attributes = $__attributesOriginal8da25fb6534e2ef288914e35c32417f8; ?>
<?php unset($__attributesOriginal8da25fb6534e2ef288914e35c32417f8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8da25fb6534e2ef288914e35c32417f8)): ?>
<?php $component = $__componentOriginal8da25fb6534e2ef288914e35c32417f8; ?>
<?php unset($__componentOriginal8da25fb6534e2ef288914e35c32417f8); ?>
<?php endif; ?>
</div>

<?php echo view_render_event('bagisto.admin.catalog.product.edit.form.videos.after', ['product' => $product]); ?><?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Admin\src\Resources\views\catalog\products\edit\videos.blade.php ENDPATH**/ ?>