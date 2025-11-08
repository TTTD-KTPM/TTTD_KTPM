<div class="flex flex-col max-md:hidden">
    <p class="font-semibold leading-6 text-gray-800">
        <?php echo e($address->company_name ?? ''); ?>

    </p>

    <p class="font-semibold leading-6 text-gray-800">
        <?php echo e($address->name); ?>

    </p>
    
    <p class="!leading-6 text-gray-600">
        <?php echo e($address->address); ?><br>

        <?php echo e($address->city); ?><br>

        <?php echo e($address->state); ?><br>

        <?php echo e(core()->country_name($address->country)); ?> <?php if($address->postcode): ?> (<?php echo e($address->postcode); ?>) <?php endif; ?><br>

        <?php echo e(__('shop::app.customers.account.orders.view.contact')); ?> : <?php echo e($address->phone); ?>

    </p>
</div>

<!-- For Mobile View -->
<div class="text-gray-800 md:hidden">
    <p class="font-semibold">
        <?php echo e($address->company_name ?? ''); ?>

    </p>

    <p class="text-xs">
        <?php echo e($address->name); ?>


        <?php echo e($address->address); ?>


        <?php echo e($address->city); ?>


        <?php echo e($address->state); ?>


        <?php echo e(core()->country_name($address->country)); ?> <?php if($address->postcode): ?> (<?php echo e($address->postcode); ?>) <?php endif; ?> <br>

        <span class="no-underline">
            <?php echo e(__('shop::app.customers.account.orders.view.contact')); ?> : <?php echo e($address->phone); ?>

        </span>
    </p>
</div><?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Shop\src/resources/views/customers/account/orders/view/address.blade.php ENDPATH**/ ?>