<!-- Pannel Content -->
<div class="mt-3.5 flex gap-2.5 max-xl:flex-wrap">
    <!-- Left Component -->
    <div class="flex flex-1 flex-col gap-2 overflow-auto max-xl:flex-auto">
        <div class="box-shadow rounded bg-white p-4 dark:bg-gray-900">
            <div class="shimmer mb-4 h-4 w-16"></div>

            <?php for($i = 1; $i < 10; $i++): ?>
                <div class="mb-6 h-14 w-full">
                    <div class="shimmer mb-2 h-4 w-24"></div>

                    <div class="shimmer flex h-10 w-full rounded-md py-px"></div>
                </div>
            <?php endfor; ?>
        </div>
    </div>

    <!-- Right Component -->
    <div class="flex w-[360px] max-w-full flex-col gap-2">
        <!-- General -->
        <div class="box-shadow rounded bg-white dark:bg-gray-900">
            <div class="flex items-center justify-between gap-x-5 p-4">
                <p class="shimmer w-20 p-2.5"></p>
                
                <p class="shimmer w-5 p-2.5"></p>
            </div>
            
            <div class="px-4 pb-4">
                <?php for($i = 1; $i < 4; $i++): ?>
                    <div class="mb-4 last:mb-0">
                        <div class="shimmer mb-1.5 h-4 w-24"></div>

                        <div class="shimmer flex h-10 w-full rounded-md py-px"></div>
                    </div>
                <?php endfor; ?>
            </div>
        </div>

        <!-- Validation Section -->
        <div class="box-shadow rounded bg-white dark:bg-gray-900">
            <div class="flex items-center justify-between gap-x-5 p-4">
                <p class="shimmer w-24 p-2.5"></p>
                
                <p class="shimmer w-5 p-2.5"></p>
            </div>

            <div class="px-4 pb-4">
                <div class="mb-2 flex items-center gap-2.5">
                    <div class="shimmer h-6 w-6"></div>

                    <div class="shimmer h-4 w-20"></div>
                </div>

                <div class="flex items-center gap-2.5">
                    <div class="shimmer h-6 w-6"></div>

                    <div class="shimmer h-4 w-20"></div>
                </div>
            </div>
        </div>

        <!-- Configuration Section -->
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
</div><?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Admin\src\Resources\views\components\shimmer\catalog\attributes\index.blade.php ENDPATH**/ ?>