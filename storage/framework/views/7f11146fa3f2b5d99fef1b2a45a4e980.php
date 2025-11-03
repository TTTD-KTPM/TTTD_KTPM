<div class="flex flex-wrap gap-1.5">
    <?php
        $restCount = max($order->items->count() - 3, 0);
    ?>

    <?php $__currentLoopData = $order->items->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="relative">
            <div class="relative h-[60px] max-h-[60px] w-full max-w-[60px] rounded">
                <?php if($item->product?->images->count() > 0): ?>
                    <img 
                        class="h-full w-full rounded" 
                        src="<?php echo e($item->product->base_image_url); ?>"
                    >

                    <span class="absolute bottom-px rounded-full bg-darkPink px-1.5 text-xs font-bold leading-normal text-white ltr:left-px rtl:right-px">
                        <?php echo e($item->qty_ordered); ?>

                    </span>
                <?php else: ?>
                    <div class="relative h-[60px] max-h-[60px] w-full max-w-[60px] rounded border border-dashed border-gray-300 dark:border-gray-800 dark:mix-blend-exclusion dark:invert">
                        <img src="<?php echo e(bagisto_asset('images/product-placeholders/front.svg')); ?>">
                        
                        <p class="absolute bottom-1.5 w-full text-center text-[6px] font-semibold text-gray-400"> 
                            <?php echo app('translator')->get('admin::app.sales.invoices.view.product-image'); ?> 
                        </p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php if($restCount >= 1): ?>
        <a href="<?php echo e(route('admin.sales.orders.view', $order->id)); ?>">
            <div class="flex h-[65px] w-[65px] items-center rounded bg-gray-50 dark:bg-gray-800">
                <p class="px-1.5 py-1.5 text-center text-xs font-bold text-gray-600 dark:text-gray-300">
                    <?php echo app('translator')->get('admin::app.sales.orders.index.datagrid.product-count', ['count' => $restCount]); ?>
                </p>
            </div>
        </a>
    <?php endif; ?>
</div><?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Admin\src\Resources\views\sales\orders\items.blade.php ENDPATH**/ ?>