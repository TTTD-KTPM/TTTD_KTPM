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
     <?php $__env->slot('title', null, []); ?> 
        <?php echo app('translator')->get('admin::app.sales.shipments.view.title', ['shipment_id' => $shipment->id]); ?>
     <?php $__env->endSlot(); ?>

    <?php $order = $shipment->order; ?>

    <div class="grid">
        <div class="flex items-center justify-between gap-4 max-sm:flex-wrap">
            <p class="text-xl font-bold leading-6 text-gray-800 dark:text-white">
                <?php echo app('translator')->get('admin::app.sales.shipments.view.title', ['shipment_id' => $shipment->id]); ?>
            </p>

            <div class="flex items-center gap-x-2.5">
                <!-- Back Button -->
                <a
                    href="<?php echo e(route('admin.sales.shipments.index')); ?>"
                    class="transparent-button hover:bg-gray-200 dark:text-white dark:hover:bg-gray-800"
                >
                    <?php echo app('translator')->get('admin::app.account.edit.back-btn'); ?>
                </a>
            </div>
        </div>
    </div>

    <!-- body content -->
    <div class="mt-3.5 flex gap-2.5 max-xl:flex-wrap">
        <!-- Left sub-component -->
        <div class="flex flex-1 flex-col gap-2 max-xl:flex-auto">
            <!-- General -->
            <div class="box-shadow rounded bg-white dark:bg-gray-900">
                <p class="mb-4 p-4 text-base font-semibold text-gray-800 dark:text-white">
                    <?php echo app('translator')->get('admin::app.sales.shipments.view.ordered-items'); ?> (<?php echo e(count($shipment->items)); ?>)
                </p>

                <div class="grid">
                    <!-- Shipment Items -->
                    <?php $__currentLoopData = $shipment->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="flex justify-between gap-2.5 px-4 py-6">
                            <div class="flex gap-2.5">
                                <!-- Image -->
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

                                <div class="grid place-content-start gap-1.5">
                                    <p class="break-all text-base font-semibold text-gray-800 dark:text-white">
                                        <?php echo e($item->name); ?>

                                    </p>

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

                                        <p class="text-gray-600 dark:text-gray-300">
                                            <?php echo app('translator')->get('admin::app.sales.shipments.view.sku', ['sku' =>  $item->sku ]); ?>
                                        </p>

                                        <p class="text-gray-600 dark:text-gray-300">
                                            <?php echo app('translator')->get('admin::app.sales.shipments.view.qty', ['qty' =>  $item->qty ]); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php if($index < count($shipment->items) - 1): ?>
                            <span class="block w-full border-b dark:border-gray-800"></span>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>

        <!-- Right sub-component -->
        <div class="flex w-[360px] max-w-full flex-col gap-2 max-sm:w-full">
            <!-- component 1 -->
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
                        <?php echo app('translator')->get('admin::app.sales.shipments.view.customer'); ?>
                    </p>
                 <?php $__env->endSlot(); ?>

                 <?php $__env->slot('content', null, []); ?> 
                    <div class="flex flex-col pb-4">
                        <!-- Customer Full Name -->
                        <p class="font-semibold text-gray-800 dark:text-white">
                            <?php echo e($shipment->order->customer_full_name); ?>

                        </p>

                        <!-- Customer Email -->
                        <p class="text-gray-600 dark:text-gray-300">
                            <?php echo app('translator')->get('admin::app.sales.shipments.view.email', ['email' =>  $shipment->order->customer_email ]); ?>
                        </p>
                    </div>

                    <span class="block w-full border-b dark:border-gray-800"></span>

                    <?php if($order->billing_address || $order->shipping_address): ?>
                        <!-- Billing Address -->
                        <?php if($order->billing_address): ?>
                            <div class="flex items-center justify-between">
                                <p class="py-4 text-base font-semibold text-gray-600 dark:text-gray-300">
                                    <?php echo app('translator')->get('admin::app.sales.shipments.view.billing-address'); ?>
                                </p>
                            </div>

                            <?php echo $__env->make('admin::sales.address', ['address' => $order->billing_address], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                        <?php endif; ?>

                        <!-- Shipping Address -->
                        <?php if($order->shipping_address): ?>
                            <span class="mt-4 block w-full border-b dark:border-gray-800"></span>

                            <div class="flex items-center justify-between">
                                <p class="py-4 text-base font-semibold text-gray-600 dark:text-gray-300">
                                    <?php echo app('translator')->get('admin::app.sales.shipments.view.shipping-address'); ?>
                                </p>
                            </div>

                            <?php echo $__env->make('admin::sales.address', ['address' => $order->shipping_address], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                        <?php endif; ?>
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

            <!-- component 2 -->
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
                        <?php echo app('translator')->get('admin::app.sales.shipments.view.order-information'); ?>
                    </p>
                 <?php $__env->endSlot(); ?>

                 <?php $__env->slot('content', null, []); ?> 
                    <div class="flex w-full justify-start gap-5">
                        <div class="flex flex-col gap-y-1.5">
                            <p class="text-gray-600 dark:text-gray-300">
                                <?php echo app('translator')->get('admin::app.sales.shipments.view.order-id'); ?>
                            </p>

                            <p class="text-gray-600 dark:text-gray-300">
                                <?php echo app('translator')->get('admin::app.sales.shipments.view.order-date'); ?>
                           </p>

                            <p class="text-gray-600 dark:text-gray-300">
                                <?php echo app('translator')->get('admin::app.sales.shipments.view.order-status'); ?>
                            </p>

                            <p class="text-gray-600 dark:text-gray-300">
                                <?php echo app('translator')->get('admin::app.sales.shipments.view.channel'); ?>
                            </p>
                        </div>

                        <div class="flex flex-col gap-y-1.5">
                            <!-- Order Id -->
                            <p class="font-semibold text-blue-600">
                                <a href="<?php echo e(route('admin.sales.orders.view', $order->id)); ?>">
                                    #<?php echo e($order->increment_id); ?>

                                </a>
                            </p>

                            <!-- Order Date -->
                            <p class="text-gray-600 dark:text-gray-300">
                                <?php echo e(core()->formatDate($order->created_at)); ?>

                            </p>

                            <!-- Order Status -->
                            <p class="text-gray-600 dark:text-gray-300">
                                <?php echo e($order->status_label); ?>

                            </p>

                            <!-- Order Channel -->
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

            <!-- Component 3 -->
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
                        <?php echo app('translator')->get('admin::app.sales.shipments.view.payment-and-shipping'); ?>
                    </p>
                 <?php $__env->endSlot(); ?>

                 <?php $__env->slot('content', null, []); ?> 
                    <div class="pb-4">
                        <!-- Payment method -->
                        <p class="font-semibold text-gray-800 dark:text-white">
                            <?php echo e(core()->getConfigData('sales.payment_methods.' . $order->payment->method . '.title')); ?>

                        </p>

                        <p class="text-gray-600 dark:text-gray-300">
                            <?php echo app('translator')->get('admin::app.sales.shipments.view.payment-method'); ?>
                        </p>

                        <!-- Currency Code -->
                        <p class="pt-4 font-semibold text-gray-800 dark:text-white">
                            <?php echo e($order->order_currency_code); ?>

                        </p>

                        <p class="text-gray-600 dark:text-gray-300">
                            <?php echo app('translator')->get('admin::app.sales.shipments.view.currency'); ?>
                        </p>
                    </div>

                    <!-- Horizontal Line -->
                    <span class="block w-full border-b dark:border-gray-800"></span>

                    <div class="pt-4">
                        <!-- Shipping Method -->
                        <p class="font-semibold text-gray-800 dark:text-white">
                            <?php echo e($order->shipping_title); ?>

                        </p>

                        <p class="text-gray-600 dark:text-gray-300">
                            <?php echo app('translator')->get('admin::app.sales.shipments.view.shipping-method'); ?>
                        </p>

                        <!-- Inventory Source -->
                        <p class="pt-4 font-semibold text-gray-800 dark:text-white">
                            <?php echo e(core()->formatBasePrice($order->base_shipping_amount)); ?>

                        </p>

                        <p class="text-gray-600 dark:text-gray-300">
                            <?php echo app('translator')->get('admin::app.sales.shipments.view.shipping-price'); ?>
                        </p>

                        <?php if(
                            $shipment->inventory_source
                            || $shipment->inventory_source_name
                        ): ?>
                            <p class="pt-4 font-semibold text-gray-800 dark:text-white">
                                <?php echo e($shipment->inventory_source ? $shipment->inventory_source->name : $shipment->inventory_source_name); ?>

                            </p>

                            <p class="text-gray-600 dark:text-gray-300">
                                <?php echo app('translator')->get('admin::app.sales.shipments.view.inventory-source'); ?>
                            </p>
                        <?php endif; ?>

                        <?php if($shipment->carrier_title): ?>
                            <p class="pt-4 font-semibold text-gray-800 dark:text-white">
                                <?php echo e($shipment->carrier_title); ?>

                            </p>

                            <p class="text-gray-600 dark:text-gray-300">
                                <?php echo app('translator')->get('admin::app.sales.shipments.view.carrier-title'); ?>
                            </p>
                        <?php endif; ?>

                        <?php if($shipment->track_number): ?>
                            <p class="pt-4 font-semibold text-gray-800 dark:text-white">
                                <?php echo e($shipment->track_number); ?>

                            </p>

                            <p class="text-gray-600 dark:text-gray-300">
                                <?php echo app('translator')->get('admin::app.sales.shipments.view.tracking-number'); ?>
                            </p>
                        <?php endif; ?>
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
<?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Admin\src\Resources\views\sales\shipments\view.blade.php ENDPATH**/ ?>