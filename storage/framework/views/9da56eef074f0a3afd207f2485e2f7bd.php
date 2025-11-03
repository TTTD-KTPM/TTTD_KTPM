<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['count' => 0]));

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

foreach (array_filter((['count' => 0]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div class="journal-scroll flex items-center justify-between overflow-auto max-md:hidden">
    <div class="shimmer h-8 w-24"></div>
</div>

<div class="mt-14 grid gap-5 max-1060:grid-cols-[1fr] max-md:mt-5">
    <?php for($i = 0;  $i < $count; $i++): ?>
        <!-- Single card -->
        <div class="rounded-xl border p-6 max-md:p-4">
            <div class="flex gap-5">
                <?php if (isset($component)) { $__componentOriginal3657c70d06ebc8c078f4ecac2ea1a848 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3657c70d06ebc8c078f4ecac2ea1a848 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.media.images.lazy','data' => ['class' => 'h-[146px] max-h-[146px] w-32 min-w-32 max-w-32 rounded-xl max-md:h-20 max-md:w-20 max-md:min-w-20','alt' => 'Review Image']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::media.images.lazy'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-[146px] max-h-[146px] w-32 min-w-32 max-w-32 rounded-xl max-md:h-20 max-md:w-20 max-md:min-w-20','alt' => 'Review Image']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3657c70d06ebc8c078f4ecac2ea1a848)): ?>
<?php $attributes = $__attributesOriginal3657c70d06ebc8c078f4ecac2ea1a848; ?>
<?php unset($__attributesOriginal3657c70d06ebc8c078f4ecac2ea1a848); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3657c70d06ebc8c078f4ecac2ea1a848)): ?>
<?php $component = $__componentOriginal3657c70d06ebc8c078f4ecac2ea1a848; ?>
<?php unset($__componentOriginal3657c70d06ebc8c078f4ecac2ea1a848); ?>
<?php endif; ?>
    
                <div class="w-full">
                    <div class="flex justify-between">
                        <p class="shimmer h-6 w-28 max-md:h-5 max-md:w-24"></p>
    
                        <div class="flex items-center gap-0.5 max-md:hidden">
                            <span class="shimmer h-3.5 w-3.5"></span>
                            <span class="shimmer h-3.5 w-3.5"></span>
                            <span class="shimmer h-3.5 w-3.5"></span>
                            <span class="shimmer h-3.5 w-3.5"></span>
                            <span class="shimmer h-3.5 w-3.5"></span>
                        </div>
                    </div>
    
                    
                    <p class="shimmer mt-2.5 h-5 w-28 max-md:mt-1 max-md:h-4 max-md:w-32"></p>
    
                    <!-- For Mobile screen -->
                    <div class="mt-1.5 flex items-center gap-0.5 md:hidden">
                        <span class="shimmer h-6 w-6"></span>
                        <span class="shimmer h-6 w-6"></span>
                        <span class="shimmer h-6 w-6"></span>
                        <span class="shimmer h-6 w-6"></span>
                        <span class="shimmer h-6 w-6"></span>
                    </div>
    
                    <p class="shimmer mt-5 h-5 w-full max-md:hidden"></p>

                    <p class="shimmer mt-2.5 h-5 w-full max-md:hidden"></p>
                </div>
            </div>

            <!-- For Mobile screen -->
            <p class="shimmer mt-2.5 h-5 w-full md:hidden"></p>

            <p class="shimmer mt-2.5 h-5 w-full md:hidden"></p>
        </div>
    <?php endfor; ?>
</div><?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Shop\src\Resources\views\components\shimmer\customers\account\reviews\index.blade.php ENDPATH**/ ?>