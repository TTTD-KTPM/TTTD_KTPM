<?php $order = $refund->order; ?>

<?php if (isset($component)) { $__componentOriginal8001c520f4b7dcb40a16cd3b411856d1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8001c520f4b7dcb40a16cd3b411856d1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.layouts.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::layouts'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <!-- Page Title -->
     <?php $__env->slot('title', null, []); ?> 
        <?php echo app('translator')->get('admin::app.sales.refunds.view.title', ['refund_id' => $refund->id]); ?>
     <?php $__env->endSlot(); ?>

    <!-- Page Header -->
    <div class="grid pt-3">
        <div class="flex items-center justify-between gap-4 max-sm:flex-wrap">
            <p class="text-xl font-bold leading-6 text-gray-800 dark:text-white">
                <?php echo app('translator')->get('admin::app.sales.refunds.view.title', ['refund_id' => $refund->id]); ?>
            </p>

            <!-- Back Button -->
            <div class="flex items-center gap-x-2.5">
                <a
                    href="<?php echo e(route('admin.sales.refunds.index')); ?>"
                    class="transparent-button hover:bg-gray-200 dark:text-white dark:hover:bg-gray-800"
                >
                    <?php echo app('translator')->get('admin::app.account.edit.back-btn'); ?>
                </a>
            </div>
        </div>
    </div>

    <!-- Body Content -->
    <div class="mt-3.5 flex gap-2.5 max-xl:flex-wrap">
        <!-- Left sub-component -->
        <div class="flex flex-1 flex-col gap-2 max-xl:flex-auto">
            <!-- General -->
            <div class="box-shadow rounded bg-white dark:bg-gray-900">
                <p class="mb-4 p-4 text-base font-semibold text-gray-800 dark:text-white">
                    <?php echo app('translator')->get('admin::app.sales.refunds.view.product-ordered'); ?> (<?php echo e($refund->items->count() ?? 0); ?>)
                </p>

                <!-- Products List -->
                <div class="grid">
                    <?php $__currentLoopData = $refund->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="flex justify-between gap-2.5 border-b border-slate-300 px-4 py-6 dark:border-gray-800">
                            <div class="flex gap-2.5">
                                <?php if($item->product?->base_image_url): ?>
                                    <img
                                        class="relative h-[60px] max-h-[60px] w-full max-w-[60px] rounded"
                                        src="<?php echo e($item->product->base_image_url); ?>"
                                    >
                                <?php else: ?>
                                    <div class="relative h-[60px] max-h-[60px] w-full max-w-[60px] rounded border border-dashed border-gray-300 dark:border-gray-800 dark:mix-blend-exclusion dark:invert">
                                        <img src="<?php echo e(bagisto_asset('images/product-placeholders/front.svg')); ?>">

                                        <p class="absolute bottom-1.5 w-full text-center text-[6px] font-semibold text-gray-400">
                                            <?php echo app('translator')->get('admin::app.sales.invoices.view.product-image'); ?>
                                        </p>
                                    </div>
                                <?php endif; ?>

                                <!-- Product Name -->
                                <div class="grid place-content-start gap-1.5">
                                    <p class="break-all text-base font-semibold text-gray-800 dark:text-white">
                                        <?php echo e($item->name); ?>

                                    </p>

                                    <!-- Product Attribute Details -->
                                    <div class="flex flex-col place-items-start gap-1.5">
                                        <?php if(isset($item->additional['attributes'])): ?>
                                            <?php $__currentLoopData = $item->additional['attributes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <p class="text-gray-600 dark:text-gray-300">
                                                    <?php if(
                                                        ! isset($attribute['attribute_type'])
                                                        || $attribute['attribute_type'] !== 'file'
                                                    ): ?>
                                                        <?php echo e($attribute['attribute_name']); ?> : <?php echo e($attribute['option_label']); ?>

                                                    <?php else: ?>
                                                        <?php echo e($attribute['attribute_name']); ?> :

                                                        <a
                                                            href="<?php echo e(Storage::url($attribute['option_label'])); ?>"
                                                            class="text-blue-600 hover:underline"
                                                            download="<?php echo e(File::basename($attribute['option_label'])); ?>"
                                                        >
                                                            <?php echo e(File::basename($attribute['option_label'])); ?>

                                                        </a>
                                                    <?php endif; ?>
                                                </p>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </div>

                                    <!-- Product SKU -->
                                    <p class="text-gray-600 dark:text-gray-300">
                                        <?php echo app('translator')->get('admin::app.sales.refunds.view.sku', ['sku' => $item->child ? $item->child->sku : $item->sku]); ?>
                                    </p>

                                    <!-- Product QTY -->
                                    <p class="text-gray-600 dark:text-gray-300">
                                        <?php echo app('translator')->get('admin::app.sales.refunds.view.qty', ['qty' => $item->qty]); ?>
                                    </p>
                                </div>
                            </div>

                            <!-- Product Price Section -->
                            <div class="grid place-content-start gap-1">
                                <div class="">
                                    <p class="flex items-center justify-end gap-x-1 text-base font-semibold text-gray-800 dark:text-white">
                                        <?php echo e(core()->formatBasePrice($item->base_total + $item->base_tax_amount - $item->base_discount_amount)); ?>

                                    </p>
                                </div>

                                <div class="flex flex-col place-items-start items-end gap-1.5">
                                    <!-- Base Total -->
                                    <?php if(core()->getConfigData('sales.taxes.sales.display_prices') == 'including_tax'): ?>
                                        <p class="text-gray-600 dark:text-gray-300">
                                            <?php echo app('translator')->get('admin::app.sales.refunds.view.price', ['price' => core()->formatBasePrice($item->base_price_incl_tax)]); ?>
                                        </p>
                                    <?php elseif(core()->getConfigData('sales.taxes.sales.display_prices') == 'both'): ?>
                                        <p class="text-gray-600 dark:text-gray-300">
                                            <?php echo app('translator')->get('admin::app.sales.refunds.view.price-excl-tax', ['price' => core()->formatBasePrice($item->base_price)]); ?>
                                        </p>

                                        <p class="text-gray-600 dark:text-gray-300">
                                            <?php echo app('translator')->get('admin::app.sales.refunds.view.price-incl-tax', ['price' => core()->formatBasePrice($item->base_price_incl_tax)]); ?>
                                        </p>
                                    <?php else: ?>
                                        <p class="text-gray-600 dark:text-gray-300">
                                            <?php echo app('translator')->get('admin::app.sales.refunds.view.price', ['price' => core()->formatBasePrice($item->base_price)]); ?>
                                        </p>
                                    <?php endif; ?>

                                    <!-- Base Tax Amount -->
                                    <p class="text-gray-600 dark:text-gray-300">
                                        <?php echo app('translator')->get('admin::app.sales.refunds.view.tax-amount', ['tax_amount' => core()->formatBasePrice($item->base_tax_amount)]); ?>
                                    </p>

                                    <!-- Base Discount Amount -->
                                    <p class="text-gray-600 dark:text-gray-300">
                                        <?php echo app('translator')->get('admin::app.sales.refunds.view.base-discounted-amount', ['base_discounted_amount' => core()->formatBasePrice($item->base_discount_amount)]); ?>
                                    </p>

                                    <!-- Base Sub Total Amount -->
                                    <?php if(core()->getConfigData('sales.taxes.sales.display_subtotal') == 'including_tax'): ?>
                                        <p class="text-gray-600 dark:text-gray-300">
                                            <?php echo app('translator')->get('admin::app.sales.refunds.view.sub-total-amount', ['discounted_amount' => core()->formatBasePrice($item->base_total_incl_tax)]); ?>
                                        </p>
                                    <?php elseif(core()->getConfigData('sales.taxes.sales.display_subtotal') == 'both'): ?>
                                        <p class="text-gray-600 dark:text-gray-300">
                                            <?php echo app('translator')->get('admin::app.sales.refunds.view.sub-total-amount-excl-tax', ['discounted_amount' => core()->formatBasePrice($item->base_total)]); ?>
                                        </p>

                                        <p class="text-gray-600 dark:text-gray-300">
                                            <?php echo app('translator')->get('admin::app.sales.refunds.view.sub-total-amount-incl-tax', ['discounted_amount' => core()->formatBasePrice($item->base_total_incl_tax)]); ?>
                                        </p>
                                    <?php else: ?>
                                        <p class="text-gray-600 dark:text-gray-300">
                                            <?php echo app('translator')->get('admin::app.sales.refunds.view.sub-total-amount', ['discounted_amount' => core()->formatBasePrice($item->base_total)]); ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <!-- Subtotal / Grand Total od the page -->
                <div class="mt-4 flex w-full justify-end gap-2.5 p-4">
                    <div class="flex flex-col gap-y-1.5">
                        <?php if(core()->getConfigData('sales.taxes.sales.display_subtotal') == 'both'): ?>
                            <p class="font-semibold !leading-5 text-gray-600 dark:text-gray-300">
                                <?php echo app('translator')->get('admin::app.sales.refunds.view.sub-total-excl-tax'); ?>
                            </p>

                            <p class="font-semibold !leading-5 text-gray-600 dark:text-gray-300">
                                <?php echo app('translator')->get('admin::app.sales.refunds.view.sub-total-incl-tax'); ?>
                            </p>
                        <?php else: ?>
                            <p class="font-semibold !leading-5 text-gray-600 dark:text-gray-300">
                                <?php echo app('translator')->get('admin::app.sales.refunds.view.sub-total'); ?>
                            </p>
                        <?php endif; ?>

                        <?php if($refund->base_shipping_amount > 0): ?>
                            <?php if(core()->getConfigData('sales.taxes.sales.display_shipping_amount') == 'both'): ?>
                                <p class="!leading-5 text-gray-600 dark:text-gray-300">
                                    <?php echo app('translator')->get('admin::app.sales.refunds.view.shipping-handling-excl-tax'); ?>
                                </p>

                                <p class="!leading-5 text-gray-600 dark:text-gray-300">
                                    <?php echo app('translator')->get('admin::app.sales.refunds.view.shipping-handling-incl-tax'); ?>
                                </p>
                            <?php else: ?>
                                <p class="!leading-5 text-gray-600 dark:text-gray-300">
                                    <?php echo app('translator')->get('admin::app.sales.refunds.view.shipping-handling'); ?>
                                </p>
                            <?php endif; ?>
                        <?php endif; ?>

                        <?php if($refund->base_tax_amount > 0): ?>
                            <p class="!leading-5 text-gray-600 dark:text-gray-300">
                                <?php echo app('translator')->get('admin::app.sales.refunds.view.tax'); ?>
                            </p>
                        <?php endif; ?>

                        <?php if($refund->base_discount_amount > 0): ?>
                            <p class="!leading-5 text-gray-600 dark:text-gray-300">
                                <?php echo app('translator')->get('admin::app.sales.refunds.view.discounted-amount'); ?>
                            </p>
                        <?php endif; ?>

                        <p class="!leading-5 text-gray-600 dark:text-gray-300">
                            <?php echo app('translator')->get('admin::app.sales.refunds.view.adjustment-refund'); ?>
                        </p>

                        <p class="!leading-5 text-gray-600 dark:text-gray-300">
                            <?php echo app('translator')->get('admin::app.sales.refunds.view.adjustment-fee'); ?>
                        </p>

                        <p class="text-base font-semibold !leading-5 text-gray-800 dark:text-white">
                            <?php echo app('translator')->get('admin::app.sales.refunds.view.grand-total'); ?>
                        </p>
                    </div>

                    <div class="flex flex-col gap-y-1.5">
                        <!-- Base Sub Total -->
                        <?php if(core()->getConfigData('sales.taxes.sales.display_subtotal') == 'including_tax'): ?>
                            <p class="font-semibold !leading-5 text-gray-600 dark:text-gray-300">
                                <?php echo e(core()->formatBasePrice($refund->base_sub_total_incl_tax)); ?>

                            </p>
                        <?php elseif(core()->getConfigData('sales.taxes.sales.display_subtotal') == 'both'): ?>
                            <p class="font-semibold !leading-5 text-gray-600 dark:text-gray-300">
                                <?php echo e(core()->formatBasePrice($refund->base_sub_total)); ?>

                            </p>

                            <p class="font-semibold !leading-5 text-gray-600 dark:text-gray-300">
                                <?php echo e(core()->formatBasePrice($refund->base_sub_total_incl_tax)); ?>

                            </p>
                        <?php else: ?>
                            <p class="font-semibold !leading-5 text-gray-600 dark:text-gray-300">
                                <?php echo e(core()->formatBasePrice($refund->base_sub_total)); ?>

                            </p>
                        <?php endif; ?>

                        <!-- Base Shipping Amount -->
                        <?php if($refund->base_shipping_amount > 0): ?>
                            <?php if(core()->getConfigData('sales.taxes.sales.display_shipping_amount') == 'including_tax'): ?>
                                <p class="!leading-5 text-gray-600 dark:text-gray-300">
                                    <?php echo e(core()->formatBasePrice($refund->base_shipping_amount_incl_tax)); ?>

                                </p>
                            <?php elseif(core()->getConfigData('sales.taxes.sales.display_shipping_amount') == 'both'): ?>
                                <p class="!leading-5 text-gray-600 dark:text-gray-300">
                                    <?php echo e(core()->formatBasePrice($refund->base_shipping_amount)); ?>

                                </p>

                                <p class="!leading-5 text-gray-600 dark:text-gray-300">
                                    <?php echo e(core()->formatBasePrice($refund->base_shipping_amount_incl_tax)); ?>

                                </p>
                            <?php else: ?>
                                <p class="!leading-5 text-gray-600 dark:text-gray-300">
                                    <?php echo e(core()->formatBasePrice($refund->base_shipping_amount)); ?>

                                </p>
                            <?php endif; ?>
                        <?php endif; ?>

                        <!-- Base Tax Amount -->
                        <?php if($refund->base_tax_amount > 0): ?>
                            <p class="!leading-5 text-gray-600 dark:text-gray-300">
                                <?php echo e(core()->formatBasePrice($refund->base_tax_amount)); ?>

                            </p>
                        <?php endif; ?>

                        <!-- Base Discount Amount -->
                        <?php if($refund->base_discount_amount > 0): ?>
                            <p class="!leading-5 text-gray-600 dark:text-gray-300">
                                <?php echo e(core()->formatBasePrice($refund->base_discount_amount)); ?>

                            </p>
                        <?php endif; ?>

                        <!-- Base Adjustment Refund -->
                        <p class="!leading-5 text-gray-600 dark:text-gray-300">
                            <?php echo e(core()->formatBasePrice($refund->base_adjustment_refund)); ?>

                        </p>

                        <!-- Base Adjustment Fee -->
                        <p class="!leading-5 text-gray-600 dark:text-gray-300">
                            <?php echo e(core()->formatBasePrice($refund->base_adjustment_fee)); ?>

                        </p>

                        <!-- Base Grand Total -->
                        <p class="text-base font-semibold !leading-5 text-gray-800 dark:text-white">
                            <?php echo e(core()->formatBasePrice($refund->base_grand_total)); ?>

                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right sub-component -->
        <div class="flex w-[360px] max-w-full flex-col gap-2 max-sm:w-full">
            <!-- Account Information -->
            <?php if(
                $order->billing_address
                || $order->shipping_address
            ): ?>
                <?php if (isset($component)) { $__componentOriginale6717d929d3edd1e7d9927d6c11ccc02 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale6717d929d3edd1e7d9927d6c11ccc02 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.accordion.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::accordion'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                     <?php $__env->slot('header', null, []); ?> 
                        <p class="p-2.5 text-base font-semibold text-gray-600 dark:text-gray-300">
                            <?php echo app('translator')->get('admin::app.sales.refunds.view.account-information'); ?>
                        </p>
                     <?php $__env->endSlot(); ?>

                     <?php $__env->slot('content', null, []); ?> 
                        <!-- Account Info -->
                        <div class="flex flex-col pb-4">
                            <!-- Customer Full Name -->
                            <p class="font-semibold text-gray-800 dark:text-white">
                                <?php echo e($refund->order->customer_full_name); ?>

                            </p>

                            <!-- Customer Email -->
                            <p class="text-gray-600 dark:text-gray-300">
                                <?php echo e($refund->order->customer_email); ?>

                            </p>
                        </div>

                        <!-- Billing Address -->
                        <?php if($order->billing_address): ?>
                            <span class="block w-full border-b dark:border-gray-800"></span>

                            <!-- Billing Address -->
                            <div class="flex items-center justify-between">
                                <p class="py-4 text-base font-semibold text-gray-600 dark:text-gray-300">
                                    <?php echo app('translator')->get('admin::app.sales.refunds.view.billing-address'); ?>
                                </p>
                            </div>

                            <?php echo $__env->make('admin::sales.address', ['address' => $order->billing_address], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        <?php endif; ?>

                        <!-- Shipping Address -->
                        <?php if($order->shipping_address): ?>
                            <span class="mt-4 block w-full border-b dark:border-gray-800"></span>

                            <div class="flex items-center justify-between">
                                <p class="py-4 text-base font-semibold text-gray-600 dark:text-gray-300">
                                    <?php echo app('translator')->get('admin::app.sales.refunds.view.shipping-address'); ?>
                                </p>
                            </div>

                            <?php echo $__env->make('admin::sales.address', ['address' => $order->shipping_address], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        <?php endif; ?>
                     <?php $__env->endSlot(); ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale6717d929d3edd1e7d9927d6c11ccc02)): ?>
<?php $attributes = $__attributesOriginale6717d929d3edd1e7d9927d6c11ccc02; ?>
<?php unset($__attributesOriginale6717d929d3edd1e7d9927d6c11ccc02); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale6717d929d3edd1e7d9927d6c11ccc02)): ?>
<?php $component = $__componentOriginale6717d929d3edd1e7d9927d6c11ccc02; ?>
<?php unset($__componentOriginale6717d929d3edd1e7d9927d6c11ccc02); ?>
<?php endif; ?>
            <?php endif; ?>

            <!-- Order Information -->
            <?php if (isset($component)) { $__componentOriginale6717d929d3edd1e7d9927d6c11ccc02 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale6717d929d3edd1e7d9927d6c11ccc02 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.accordion.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::accordion'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                 <?php $__env->slot('header', null, []); ?> 
                    <p class="p-2.5 text-base font-semibold text-gray-600 dark:text-gray-300">
                        <?php echo app('translator')->get('admin::app.sales.refunds.view.order-information'); ?>
                    </p>
                 <?php $__env->endSlot(); ?>

                 <?php $__env->slot('content', null, []); ?> 
                    <div class="flex w-full gap-2.5">
                        <!-- Order Info Left Section  -->
                        <div class="flex flex-col gap-y-1.5">
                            <?php $__currentLoopData = ['order-id', 'order-date', 'order-status', 'order-channel']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <p class="font-semibold text-gray-600 dark:text-gray-300">
                                    <?php echo app('translator')->get('admin::app.sales.refunds.view.' . $item); ?>
                                </p>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <!-- Order Info Right Section  -->
                        <div class="flex flex-col gap-y-1.5">
                            <p class="font-semibold text-gray-600 dark:text-gray-300">
                                <a
                                    href="<?php echo e(route('admin.sales.orders.view', $order->id)); ?>"
                                    class="text-blue-600"
                                >
                                    #<?php echo e($order->increment_id); ?>

                                </a>
                            </p>

                            <p class="text-gray-600 dark:text-gray-300">
                                <?php echo e(core()->formatDate($order->created_at, 'Y-m-d H:i:s')); ?>

                            </p>

                            <p class="text-gray-600 dark:text-gray-300">
                                <?php echo e($order->status_label); ?>

                            </p>

                            <p class="text-gray-600 dark:text-gray-300">
                                <?php echo e($order->channel_name); ?>

                            </p>
                        </div>
                    </div>
                 <?php $__env->endSlot(); ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale6717d929d3edd1e7d9927d6c11ccc02)): ?>
<?php $attributes = $__attributesOriginale6717d929d3edd1e7d9927d6c11ccc02; ?>
<?php unset($__attributesOriginale6717d929d3edd1e7d9927d6c11ccc02); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale6717d929d3edd1e7d9927d6c11ccc02)): ?>
<?php $component = $__componentOriginale6717d929d3edd1e7d9927d6c11ccc02; ?>
<?php unset($__componentOriginale6717d929d3edd1e7d9927d6c11ccc02); ?>
<?php endif; ?>

             <!-- Payment Information -->
             <?php if (isset($component)) { $__componentOriginale6717d929d3edd1e7d9927d6c11ccc02 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale6717d929d3edd1e7d9927d6c11ccc02 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.accordion.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::accordion'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                 <?php $__env->slot('header', null, []); ?> 
                    <p class="p-2.5 text-base font-semibold text-gray-600 dark:text-gray-300">
                        <?php echo app('translator')->get('admin::app.sales.refunds.view.payment-information'); ?>
                    </p>
                 <?php $__env->endSlot(); ?>

                 <?php $__env->slot('content', null, []); ?> 
                    <div class="flex w-full gap-2.5">
                        <!-- Payment Information Left Section  -->
                        <div class="flex flex-col gap-y-1.5">
                            <?php $__currentLoopData = ['payment-method', 'shipping-method', 'currency', 'shipping-price']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <p class="font-semibold text-gray-600 dark:text-gray-300">
                                    <?php echo app('translator')->get('admin::app.sales.refunds.view.' . $item); ?>
                                </p>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <!-- Payment Information Right Section  -->
                        <div class="flex flex-col gap-y-1.5">
                            <p class="text-gray-600 dark:text-gray-300">
                                <a href="<?php echo e(route('admin.sales.orders.view', $order->id)); ?>">
                                    <?php echo e(core()->getConfigData('sales.payment_methods.' . $order->payment->method . '.title')); ?>

                                </a>
                            </p>

                            <p class="text-gray-600 dark:text-gray-300">
                                <?php echo e($order->shipping_title ?? 'N/A'); ?>

                            </p>

                            <p class="text-gray-600 dark:text-gray-300">
                                <?php echo e($order->order_currency_code); ?>

                            </p>

                            <p class="text-gray-600 dark:text-gray-300">
                                <?php echo e(core()->formatBasePrice($order->base_shipping_amount)); ?>

                            </p>
                        </div>
                    </div>
                 <?php $__env->endSlot(); ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale6717d929d3edd1e7d9927d6c11ccc02)): ?>
<?php $attributes = $__attributesOriginale6717d929d3edd1e7d9927d6c11ccc02; ?>
<?php unset($__attributesOriginale6717d929d3edd1e7d9927d6c11ccc02); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale6717d929d3edd1e7d9927d6c11ccc02)): ?>
<?php $component = $__componentOriginale6717d929d3edd1e7d9927d6c11ccc02; ?>
<?php unset($__componentOriginale6717d929d3edd1e7d9927d6c11ccc02); ?>
<?php endif; ?>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8001c520f4b7dcb40a16cd3b411856d1)): ?>
<?php $attributes = $__attributesOriginal8001c520f4b7dcb40a16cd3b411856d1; ?>
<?php unset($__attributesOriginal8001c520f4b7dcb40a16cd3b411856d1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8001c520f4b7dcb40a16cd3b411856d1)): ?>
<?php $component = $__componentOriginal8001c520f4b7dcb40a16cd3b411856d1; ?>
<?php unset($__componentOriginal8001c520f4b7dcb40a16cd3b411856d1); ?>
<?php endif; ?>
<?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Admin\src\Resources\views\sales\refunds\view.blade.php ENDPATH**/ ?>