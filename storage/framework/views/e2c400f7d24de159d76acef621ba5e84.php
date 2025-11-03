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

<?php for($i = 0;  $i < $attributeCount; $i++): ?>
    <div class="flex max-w-full items-center border-b border-zinc-200 max-sm:border-0">
        <div class="min-w-[304px] max-w-full max-md:min-w-40 max-sm:min-w-[110px]">
            <p class="shimmer h-[21px] w-[55%]"></p>
        </div>

        <div class="flex gap-3 border-l-[1px] border-zinc-200">
            <?php for($j = 0;  $j < $productCount; $j++): ?>
                <div class="w-[311px] max-w-[311px] p-5 max-md:max-w-60 max-sm:max-w-[190px] ltr:pr-0 rtl:pl-0">
                    <div class="grid gap-1.5">
                        <p class="shimmer hidden h-[21px] w-[55%] max-sm:block"></p>
                        <p class="shimmer h-[21px] w-[55%]"></p>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>
<?php endfor; ?><?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Shop\src\Resources\views\components\shimmer\compare\attribute.blade.php ENDPATH**/ ?>