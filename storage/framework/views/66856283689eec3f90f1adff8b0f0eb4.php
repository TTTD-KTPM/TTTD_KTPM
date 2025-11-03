<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['isMultiRow' => false]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['isMultiRow' => false]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div>
    <?php if (isset($component)) { $__componentOriginal911dea69ff7b4876d178c5253e0745e5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal911dea69ff7b4876d178c5253e0745e5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.shimmer.datagrid.toolbar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::shimmer.datagrid.toolbar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal911dea69ff7b4876d178c5253e0745e5)): ?>
<?php $attributes = $__attributesOriginal911dea69ff7b4876d178c5253e0745e5; ?>
<?php unset($__attributesOriginal911dea69ff7b4876d178c5253e0745e5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal911dea69ff7b4876d178c5253e0745e5)): ?>
<?php $component = $__componentOriginal911dea69ff7b4876d178c5253e0745e5; ?>
<?php unset($__componentOriginal911dea69ff7b4876d178c5253e0745e5); ?>
<?php endif; ?>

    <div class="mt-8 flex overflow-x-auto rounded-xl border">
        <div class="w-full">
            <div class="table-responsive box-shadow grid w-full overflow-hidden rounded bg-white">
                <?php if (isset($component)) { $__componentOriginal777bf965aec78c0458ea6c268e8d1a8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal777bf965aec78c0458ea6c268e8d1a8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.shimmer.datagrid.table.head','data' => ['isMultiRow' => $isMultiRow]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::shimmer.datagrid.table.head'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['isMultiRow' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($isMultiRow)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal777bf965aec78c0458ea6c268e8d1a8a)): ?>
<?php $attributes = $__attributesOriginal777bf965aec78c0458ea6c268e8d1a8a; ?>
<?php unset($__attributesOriginal777bf965aec78c0458ea6c268e8d1a8a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal777bf965aec78c0458ea6c268e8d1a8a)): ?>
<?php $component = $__componentOriginal777bf965aec78c0458ea6c268e8d1a8a; ?>
<?php unset($__componentOriginal777bf965aec78c0458ea6c268e8d1a8a); ?>
<?php endif; ?>

                <?php if (isset($component)) { $__componentOriginal076edd40e27bf53b1f2102bae7803402 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal076edd40e27bf53b1f2102bae7803402 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.shimmer.datagrid.table.body','data' => ['isMultiRow' => $isMultiRow]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::shimmer.datagrid.table.body'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['isMultiRow' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($isMultiRow)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal076edd40e27bf53b1f2102bae7803402)): ?>
<?php $attributes = $__attributesOriginal076edd40e27bf53b1f2102bae7803402; ?>
<?php unset($__attributesOriginal076edd40e27bf53b1f2102bae7803402); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal076edd40e27bf53b1f2102bae7803402)): ?>
<?php $component = $__componentOriginal076edd40e27bf53b1f2102bae7803402; ?>
<?php unset($__componentOriginal076edd40e27bf53b1f2102bae7803402); ?>
<?php endif; ?>

                <?php if (isset($component)) { $__componentOriginald2a17650606d676cada8d39484ecaadd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald2a17650606d676cada8d39484ecaadd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.shimmer.datagrid.table.footer','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::shimmer.datagrid.table.footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald2a17650606d676cada8d39484ecaadd)): ?>
<?php $attributes = $__attributesOriginald2a17650606d676cada8d39484ecaadd; ?>
<?php unset($__attributesOriginald2a17650606d676cada8d39484ecaadd); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald2a17650606d676cada8d39484ecaadd)): ?>
<?php $component = $__componentOriginald2a17650606d676cada8d39484ecaadd; ?>
<?php unset($__componentOriginald2a17650606d676cada8d39484ecaadd); ?>
<?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Shop\src\Resources\views\components\shimmer\datagrid\index.blade.php ENDPATH**/ ?>