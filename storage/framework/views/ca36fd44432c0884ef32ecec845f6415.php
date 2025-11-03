<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['attributeCount' => 3, 'productCount' => 3]));

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

foreach (array_filter((['attributeCount' => 3, 'productCount' => 3]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div class="flex items-center justify-between">
    <h2 class="shimmer h-8 w-[200px] max-sm:w-[180px]"></h2>

    <div class="shimmer h-[50px] w-[150px] rounded-xl max-md:h-[42px] max-md:w-[115px] max-sm:h-[34px] max-sm:rounded-xl"></div>
</div>

<div class="journal-scroll mt-16 grid overflow-auto max-md:mt-7">
    <!-- Single row -->
    <?php for($i = 1; $i <= $attributeCount; $i++): ?>
        <div class="flex max-w-full items-center border-b border-zinc-200">
            <div class="min-w-[304px] max-w-full max-md:min-w-40 max-sm:min-w-[110px]">
                <p class="shimmer h-[21px] w-[55%]"></p>
            </div>

            <div class="flex gap-3 border-zinc-200 max-md:gap-0 max-sm:border-0 ltr:border-l-[1px] rtl:border-r-[1px]">
                <?php if (isset($component)) { $__componentOriginal63d85b8bc2d72394bd433a79cbb59384 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal63d85b8bc2d72394bd433a79cbb59384 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.shimmer.products.cards.grid','data' => ['class' => 'min-w-[311px] max-w-[311px] p-5 pt-0 max-md:min-w-60 max-md:px-2.5 max-sm:min-w-[190px] max-sm:pb-2.5','count' => '3']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::shimmer.products.cards.grid'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'min-w-[311px] max-w-[311px] p-5 pt-0 max-md:min-w-60 max-md:px-2.5 max-sm:min-w-[190px] max-sm:pb-2.5','count' => '3']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal63d85b8bc2d72394bd433a79cbb59384)): ?>
<?php $attributes = $__attributesOriginal63d85b8bc2d72394bd433a79cbb59384; ?>
<?php unset($__attributesOriginal63d85b8bc2d72394bd433a79cbb59384); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal63d85b8bc2d72394bd433a79cbb59384)): ?>
<?php $component = $__componentOriginal63d85b8bc2d72394bd433a79cbb59384; ?>
<?php unset($__componentOriginal63d85b8bc2d72394bd433a79cbb59384); ?>
<?php endif; ?>
            </div>
        </div>
    <?php endfor; ?>

    <!-- Single row -->
    <?php if (isset($component)) { $__componentOriginal985d04ddd95fefeada226369e8b0ae46 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal985d04ddd95fefeada226369e8b0ae46 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.shimmer.compare.attribute','data' => ['attributeCount' => $attributeCount,'productCount' => $productCount]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::shimmer.compare.attribute'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['attributeCount' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attributeCount),'productCount' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($productCount)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal985d04ddd95fefeada226369e8b0ae46)): ?>
<?php $attributes = $__attributesOriginal985d04ddd95fefeada226369e8b0ae46; ?>
<?php unset($__attributesOriginal985d04ddd95fefeada226369e8b0ae46); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal985d04ddd95fefeada226369e8b0ae46)): ?>
<?php $component = $__componentOriginal985d04ddd95fefeada226369e8b0ae46; ?>
<?php unset($__componentOriginal985d04ddd95fefeada226369e8b0ae46); ?>
<?php endif; ?>
</div><?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Shop\src\Resources\views\components\shimmer\compare\index.blade.php ENDPATH**/ ?>