<div class="grid grid-cols-1 gap-6">
    <?php if($bookingProduct['default_slot']['duration']): ?>
        <div class="flex gap-3">
            <span class="icon-calendar text-2xl"></span>

            <div class="grid grid-cols-1 gap-1.5 text-sm font-medium">
                <p class="text-[#6E6E6E]">
                    <?php echo app('translator')->get('shop::app.products.view.type.booking.default.slot-duration'); ?> :
                </p>

                <div>
                    <?php echo app('translator')->get('shop::app.products.view.type.booking.default.slot-duration-in-minutes', ['minutes' => $bookingProduct['default_slot']['duration']]); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php echo $__env->make('shop::products.view.types.booking.slots', ['bookingProduct' => $bookingProduct], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</div><?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Shop\src\Resources\views\products\view\types\booking\default.blade.php ENDPATH**/ ?>