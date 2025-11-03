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
        <?php echo app('translator')->get('admin::app.sales.orders.view.title', ['order_id' => $order->increment_id]); ?>
     <?php $__env->endSlot(); ?>

    <!-- Header -->
    <div class="grid">
        <div class="flex items-center justify-between gap-4 max-sm:flex-wrap">
            <?php echo view_render_event('bagisto.admin.sales.order.title.before', ['order' => $order]); ?>


            <div class="flex items-center gap-2.5">
                <p class="text-xl font-bold leading-6 text-gray-800 dark:text-white">
                    <?php echo app('translator')->get('admin::app.sales.orders.view.title', ['order_id' => $order->increment_id]); ?>
                </p>

                <!-- Order Status -->
                <span class="label-<?php echo e($order->status); ?> text-sm mx-1.5">
                    <?php echo app('translator')->get("admin::app.sales.orders.view.$order->status"); ?>
                </span>
            </div>

            <?php echo view_render_event('bagisto.admin.sales.order.title.after', ['order' => $order]); ?>


            <!-- Back Button -->
            <a
                href="<?php echo e(route('admin.sales.orders.index')); ?>"
                class="transparent-button hover:bg-gray-200 dark:text-white dark:hover:bg-gray-800"
            >
                <?php echo app('translator')->get('admin::app.account.edit.back-btn'); ?>
            </a>
        </div>
    </div>

    <div class="mt-5 flex-wrap items-center justify-between gap-x-1 gap-y-2">
        <div class="flex gap-1.5">
            <?php echo view_render_event('bagisto.admin.sales.order.page_action.before', ['order' => $order]); ?>


            <?php if(
                $order->canReorder()
                && bouncer()->hasPermission('sales.orders.create')
                && core()->getConfigData('sales.order_settings.reorder.admin')
            ): ?>
                <a
                    href="<?php echo e(route('admin.sales.orders.reorder', $order->id)); ?>"
                    class="transparent-button px-1 py-1.5 hover:bg-gray-200 dark:text-white dark:hover:bg-gray-800"
                >
                    <span class="icon-cart text-2xl"></span>

                    <?php echo app('translator')->get('admin::app.sales.orders.view.reorder'); ?>
                </a>
            <?php endif; ?>

            <?php if(
                $order->canInvoice()
                && bouncer()->hasPermission('sales.invoices.create')
                && $order->payment->method !== 'paypal_standard'
            ): ?>
                <?php echo $__env->make('admin::sales.invoices.create', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php endif; ?>

            <?php if(
                $order->canShip()
                && bouncer()->hasPermission('sales.shipments.create')
            ): ?>
                <?php echo $__env->make('admin::sales.shipments.create', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php endif; ?>

            <?php if(
                $order->canRefund()
                && bouncer()->hasPermission('sales.refunds.create')
            ): ?>
                <?php echo $__env->make('admin::sales.refunds.create', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php endif; ?>

            <?php if(
                $order->canCancel()
                && bouncer()->hasPermission('sales.orders.cancel')
            ): ?>
               <form
                    method="POST"
                    ref="cancelOrderForm"
                    action="<?php echo e(route('admin.sales.orders.cancel', $order->id)); ?>"
                >
                    <?php echo csrf_field(); ?>
                </form>

                <div
                    class="transparent-button px-1 py-1.5 hover:bg-gray-200 dark:text-white dark:hover:bg-gray-800"
                    @click="$emitter.emit('open-confirm-modal', {
                        message: '<?php echo app('translator')->get('admin::app.sales.orders.view.cancel-msg'); ?>',
                        agree: () => {
                            this.$refs['cancelOrderForm'].submit()
                        }
                    })"
                >
                    <span
                        class="icon-cancel text-2xl"
                        role="presentation"
                        tabindex="0"
                    >
                    </span>

                    <a href="javascript:void(0);">
                        <?php echo app('translator')->get('admin::app.sales.orders.view.cancel'); ?>
                    </a>
                </div>
            <?php endif; ?>

            <?php echo view_render_event('bagisto.admin.sales.order.page_action.after', ['order' => $order]); ?>

        </div>

        <!-- Order details -->
        <div class="mt-3.5 flex gap-2.5 max-xl:flex-wrap">
            <!-- Left Component -->
            <div class="flex flex-1 flex-col gap-2 max-xl:flex-auto">
                <?php echo view_render_event('bagisto.admin.sales.order.left_component.before', ['order' => $order]); ?>


                <div class="box-shadow rounded bg-white dark:bg-gray-900">
                    <div class="flex justify-between p-4">
                        <p class="mb-4 text-base font-semibold text-gray-800 dark:text-white">
                            <?php echo app('translator')->get('Order Items'); ?> (<?php echo e(count($order->items)); ?>)
                        </p>

                        <p class="text-base font-semibold text-gray-800 dark:text-white">
                            <?php echo app('translator')->get('admin::app.sales.orders.view.grand-total', ['grand_total' => core()->formatBasePrice($order->base_grand_total)]); ?>
                        </p>
                    </div>

                    <!-- Order items -->
                    <div class="grid">
                        <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo view_render_event('bagisto.admin.sales.order.list.before', ['order' => $order]); ?>


                            <div class="flex justify-between gap-2.5 border-b border-slate-300 px-4 py-6 dark:border-gray-800">
                                <div class="flex gap-2.5">
                                    <?php if($item?->product?->base_image_url): ?>
                                        <img
                                            class="relative h-[60px] max-h-[60px] w-full max-w-[60px] rounded"
                                            src="<?php echo e($item?->product->base_image_url); ?>"
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
                                            <p class="text-gray-600 dark:text-gray-300">
                                                <?php echo app('translator')->get('admin::app.sales.orders.view.amount-per-unit', [
                                                    'amount' => core()->formatBasePrice($item->base_price),
                                                    'qty'    => $item->qty_ordered,
                                                ]); ?>
                                            </p>

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
                                                <?php echo app('translator')->get('admin::app.sales.orders.view.sku', ['sku' => $item->sku]); ?>
                                            </p>

                                            <p class="text-gray-600 dark:text-gray-300">
                                                <?php echo e($item->qty_ordered ? trans('admin::app.sales.orders.view.item-ordered', ['qty_ordered' => $item->qty_ordered]) : ''); ?>


                                                <?php echo e($item->qty_invoiced ? trans('admin::app.sales.orders.view.item-invoice', ['qty_invoiced' => $item->qty_invoiced]) : ''); ?>


                                                <?php echo e($item->qty_shipped ? trans('admin::app.sales.orders.view.item-shipped', ['qty_shipped' => $item->qty_shipped]) : ''); ?>


                                                <?php echo e($item->qty_refunded ? trans('admin::app.sales.orders.view.item-refunded', ['qty_refunded' => $item->qty_refunded]) : ''); ?>


                                                <?php echo e($item->qty_canceled ? trans('admin::app.sales.orders.view.item-canceled', ['qty_canceled' => $item->qty_canceled]) : ''); ?>

                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="grid place-content-start gap-1">
                                    <div class="">
                                        <p class="flex items-center justify-end gap-x-1 text-base font-semibold text-gray-800 dark:text-white">
                                            <?php echo e(core()->formatBasePrice($item->base_total + $item->base_tax_amount - $item->base_discount_amount)); ?>

                                        </p>
                                    </div>

                                    <div class="flex flex-col place-items-start items-end gap-1.5">
                                        <?php if(core()->getConfigData('sales.taxes.sales.display_prices') == 'including_tax'): ?>
                                            <p class="text-gray-600 dark:text-gray-300">
                                                <?php echo app('translator')->get('admin::app.sales.orders.view.price', ['price' => core()->formatBasePrice($item->base_price_incl_tax)]); ?>
                                            </p>
                                        <?php elseif(core()->getConfigData('sales.taxes.sales.display_prices') == 'both'): ?>
                                            <p class="text-gray-600 dark:text-gray-300">
                                                <?php echo app('translator')->get('admin::app.sales.orders.view.price-excl-tax', ['price' => core()->formatBasePrice($item->base_price)]); ?>
                                            </p>

                                            <p class="text-gray-600 dark:text-gray-300">
                                                <?php echo app('translator')->get('admin::app.sales.orders.view.price-incl-tax', ['price' => core()->formatBasePrice($item->base_price_incl_tax)]); ?>
                                            </p>
                                        <?php else: ?>
                                            <p class="text-gray-600 dark:text-gray-300">
                                                <?php echo app('translator')->get('admin::app.sales.orders.view.price', ['price' => core()->formatBasePrice($item->base_price)]); ?>
                                            </p>
                                        <?php endif; ?>

                                        <p class="text-gray-600 dark:text-gray-300">
                                            <?php echo app('translator')->get('admin::app.sales.orders.view.tax', [
                                                'percent' => number_format($item->tax_percent, 2) . '%',
                                                'tax'     => core()->formatBasePrice($item->base_tax_amount)
                                            ]); ?>
                                        </p>

                                        <?php if($order->base_discount_amount > 0): ?>
                                            <p class="text-gray-600 dark:text-gray-300">
                                                <?php echo app('translator')->get('admin::app.sales.orders.view.discount', ['discount' => core()->formatBasePrice($item->base_discount_amount)]); ?>
                                            </p>
                                        <?php endif; ?>

                                        <?php if(core()->getConfigData('sales.taxes.sales.display_subtotal') == 'including_tax'): ?>
                                            <p class="text-gray-600 dark:text-gray-300">
                                                <?php echo app('translator')->get('admin::app.sales.orders.view.sub-total', ['sub_total' => core()->formatBasePrice($item->base_total_incl_tax)]); ?>
                                            </p>
                                        <?php elseif(core()->getConfigData('sales.taxes.sales.display_subtotal') == 'both'): ?>
                                            <p class="text-gray-600 dark:text-gray-300">
                                                <?php echo app('translator')->get('admin::app.sales.orders.view.sub-total-excl-tax', ['sub_total' => core()->formatBasePrice($item->base_total)]); ?>
                                            </p>

                                            <p class="text-gray-600 dark:text-gray-300">
                                                <?php echo app('translator')->get('admin::app.sales.orders.view.sub-total-incl-tax', ['sub_total' => core()->formatBasePrice($item->base_total_incl_tax)]); ?>
                                            </p>
                                        <?php else: ?>
                                            <p class="text-gray-600 dark:text-gray-300">
                                                <?php echo app('translator')->get('admin::app.sales.orders.view.sub-total', ['sub_total' => core()->formatBasePrice($item->base_total)]); ?>
                                            </p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <?php echo view_render_event('bagisto.admin.sales.order.list.after', ['order' => $order]); ?>


                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <div class="mt-4 flex flex-auto justify-end p-4">
                        <div class="grid max-w-max gap-2 text-sm">

                            <?php echo view_render_event('bagisto.admin.sales.order.view.subtotal.before'); ?>


                            <!-- Sub Total -->
                            <?php if(core()->getConfigData('sales.taxes.sales.display_subtotal') == 'including_tax'): ?>
                                <div class="flex w-full justify-between gap-x-5">
                                    <p class="font-semibold !leading-5 text-gray-600 dark:text-gray-300">
                                        <?php echo app('translator')->get('admin::app.sales.orders.view.summary-sub-total-incl-tax'); ?>
                                    </p>

                                    <p class="font-semibold !leading-5 text-gray-600 dark:text-gray-300">
                                        <?php echo e(core()->formatBasePrice($order->base_sub_total_incl_tax)); ?>

                                    </p>
                                </div>
                            <?php elseif(core()->getConfigData('sales.taxes.sales.display_subtotal') == 'both'): ?>
                                <div class="flex w-full justify-between gap-x-5">
                                    <p class="font-semibold !leading-5 text-gray-600 dark:text-gray-300">
                                        <?php echo app('translator')->get('admin::app.sales.orders.view.summary-sub-total-excl-tax'); ?>
                                    </p>

                                    <p class="font-semibold !leading-5 text-gray-600 dark:text-gray-300">
                                        <?php echo e(core()->formatBasePrice($order->base_sub_total)); ?>

                                    </p>
                                </div>

                                <div class="flex w-full justify-between gap-x-5">
                                    <p class="font-semibold !leading-5 text-gray-600 dark:text-gray-300">
                                        <?php echo app('translator')->get('admin::app.sales.orders.view.summary-sub-total-incl-tax'); ?>
                                    </p>

                                    <p class="font-semibold !leading-5 text-gray-600 dark:text-gray-300">
                                        <?php echo e(core()->formatBasePrice($order->base_sub_total_incl_tax)); ?>

                                    </p>
                                </div>
                            <?php else: ?>
                                <div class="flex w-full justify-between gap-x-5">
                                    <p class="font-semibold !leading-5 text-gray-600 dark:text-gray-300">
                                        <?php echo app('translator')->get('admin::app.sales.orders.view.summary-sub-total'); ?>
                                    </p>

                                    <p class="font-semibold !leading-5 text-gray-600 dark:text-gray-300">
                                        <?php echo e(core()->formatBasePrice($order->base_sub_total)); ?>

                                    </p>
                                </div>
                            <?php endif; ?>

                            <?php echo view_render_event('bagisto.admin.sales.order.view.subtotal.after'); ?>


                            <?php echo view_render_event('bagisto.admin.sales.order.view.shipping.before'); ?>


                            <!-- Shipping And Handling -->
                            <?php if($haveStockableItems = $order->haveStockableItems()): ?>
                                <?php if(core()->getConfigData('sales.taxes.sales.display_subtotal') == 'including_tax'): ?>
                                    <div class="flex w-full justify-between gap-x-5">
                                        <p class="!leading-5 text-gray-600 dark:text-gray-300">
                                            <?php echo app('translator')->get('admin::app.sales.orders.view.shipping-and-handling-incl-tax'); ?>
                                        </p>

                                        <p class="font-semibold !leading-5 text-gray-600 dark:text-gray-300">
                                            <?php echo e(core()->formatBasePrice($order->base_shipping_amount_incl_tax)); ?>

                                        </p>
                                    </div>
                                <?php elseif(core()->getConfigData('sales.taxes.sales.display_shipping_amount') == 'both'): ?>
                                    <div class="flex w-full justify-between gap-x-5">
                                        <p class="!leading-5 text-gray-600 dark:text-gray-300">
                                            <?php echo app('translator')->get('admin::app.sales.orders.view.shipping-and-handling-excl-tax'); ?>
                                        </p>

                                        <p class="font-semibold !leading-5 text-gray-600 dark:text-gray-300">
                                            <?php echo e(core()->formatBasePrice($order->base_shipping_amount)); ?>

                                        </p>
                                    </div>

                                    <div class="flex w-full justify-between gap-x-5">
                                        <p class="!leading-5 text-gray-600 dark:text-gray-300">
                                            <?php echo app('translator')->get('admin::app.sales.orders.view.shipping-and-handling-incl-tax'); ?>
                                        </p>

                                        <p class="font-semibold !leading-5 text-gray-600 dark:text-gray-300">
                                            <?php echo e(core()->formatBasePrice($order->base_shipping_amount_incl_tax)); ?>

                                        </p>
                                    </div>
                                <?php else: ?>
                                    <div class="flex w-full justify-between gap-x-5">
                                        <p class="!leading-5 text-gray-600 dark:text-gray-300">
                                            <?php echo app('translator')->get('admin::app.sales.orders.view.shipping-and-handling'); ?>
                                        </p>

                                        <p class="font-semibold !leading-5 text-gray-600 dark:text-gray-300">
                                            <?php echo e(core()->formatBasePrice($order->base_shipping_amount)); ?>

                                        </p>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php echo view_render_event('bagisto.admin.sales.order.view.shipping.after'); ?>


                            <?php echo view_render_event('bagisto.admin.sales.order.view.tax-amount.before'); ?>


                            <!-- Tax Amount -->
                            <div class="flex w-full justify-between gap-x-5">
                                <p class="!leading-5 text-gray-600 dark:text-gray-300">
                                    <?php echo app('translator')->get('admin::app.sales.orders.view.summary-tax'); ?>
                                </p>

                                <p class="!leading-5 text-gray-600 dark:text-gray-300">
                                    <?php echo e(core()->formatBasePrice($order->base_tax_amount)); ?>

                                </p>
                            </div>

                            <?php echo view_render_event('bagisto.admin.sales.order.view.tax-amount.after'); ?>


                            <?php echo view_render_event('bagisto.admin.sales.order.view.discount.before'); ?>


                            <!-- Discount -->
                            <div class="flex w-full justify-between gap-x-5">
                                <p class="!leading-5 text-gray-600 dark:text-gray-300">
                                    <?php echo app('translator')->get('admin::app.sales.orders.view.summary-discount'); ?>
                                </p>

                                <p class="!leading-5 text-gray-600 dark:text-gray-300">
                                    <?php echo e(core()->formatBasePrice($order->base_discount_amount)); ?>

                                </p>
                            </div>

                            <?php echo view_render_event('bagisto.admin.sales.order.view.discount.after'); ?>


                            <?php echo view_render_event('bagisto.admin.sales.order.view.grand-total.before'); ?>


                            <!-- Grand Total -->
                            <div class="flex w-full justify-between gap-x-5">
                                <p class="text-base font-semibold !leading-5 text-gray-800 dark:text-white">
                                    <?php echo app('translator')->get('admin::app.sales.orders.view.summary-grand-total'); ?>
                                </p>

                                <p class="text-base font-semibold !leading-5 text-gray-800 dark:text-white">
                                    <?php echo e(core()->formatBasePrice($order->base_grand_total)); ?>

                                </p>
                            </div>

                            <?php echo view_render_event('bagisto.admin.sales.order.view.grand-total.after'); ?>


                            <?php echo view_render_event('bagisto.admin.sales.order.view.total-paid.before'); ?>


                            <!-- Total Paid -->
                            <div class="flex w-full justify-between gap-x-5">
                                <p class="!leading-5 text-gray-600 dark:text-gray-300">
                                    <?php echo app('translator')->get('admin::app.sales.orders.view.total-paid'); ?>
                                </p>

                                <p class="!leading-5 text-gray-600 dark:text-gray-300">
                                    <?php echo e(core()->formatBasePrice($order->base_grand_total_invoiced)); ?>

                                </p>
                            </div>

                            <?php echo view_render_event('bagisto.admin.sales.order.view.total-paid.after'); ?>


                            <?php echo view_render_event('bagisto.admin.sales.order.view.total-refunded.before'); ?>


                            <!-- Total Refund -->
                            <div class="flex w-full justify-between gap-x-5">
                                <p class="!leading-5 text-gray-600 dark:text-gray-300">
                                    <?php echo app('translator')->get('admin::app.sales.orders.view.total-refund'); ?>
                                </p>

                                <p class="!leading-5 text-gray-600 dark:text-gray-300">
                                    <?php echo e(core()->formatBasePrice($order->base_grand_total_refunded)); ?>

                                </p>
                            </div>

                            <?php echo view_render_event('bagisto.admin.sales.order.view.total-refunded.after'); ?>


                            <?php echo view_render_event('bagisto.admin.sales.order.view.total-due.before'); ?>


                            <!-- Total Due -->
                            <div class="flex w-full justify-between gap-x-5 font-semibold">
                                <p class="!leading-5 text-gray-600 dark:text-gray-300">
                                    <?php echo app('translator')->get('admin::app.sales.orders.view.total-due'); ?>
                                </p>

                                <?php if($order->status !== 'canceled'): ?>
                                    <p class="!leading-5 text-gray-600 dark:text-gray-300">
                                        <?php echo e(core()->formatBasePrice($order->base_total_due)); ?>

                                    </p>
                                <?php else: ?>
                                    <p class="!leading-5 text-gray-600 dark:text-gray-300">
                                        <?php echo e(core()->formatBasePrice(0.00)); ?>

                                    </p>
                                <?php endif; ?>
                            </div>

                            <?php echo view_render_event('bagisto.admin.sales.order.view.total-due.after'); ?>


                        </div>
                    </div>
                </div>

                <!-- Customer's comment form -->
                <div class="box-shadow rounded bg-white dark:bg-gray-900">
                    <p class="p-4 pb-0 text-base font-semibold text-gray-800 dark:text-white">
                        <?php echo app('translator')->get('admin::app.sales.orders.view.comments'); ?>
                    </p>

                    <?php if (isset($component)) { $__componentOriginal81b4d293d9113446bb908fc8aef5c8f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal81b4d293d9113446bb908fc8aef5c8f6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.index','data' => ['action' => ''.e(route('admin.sales.orders.comment', $order->id)).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => ''.e(route('admin.sales.orders.comment', $order->id)).'']); ?>
                        <div class="p-4">
                            <div class="mb-2.5">
                                <?php if (isset($component)) { $__componentOriginal7b1bc76a00ab5e7f1bf2c6429dae85a3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7b1bc76a00ab5e7f1bf2c6429dae85a3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                    <?php if (isset($component)) { $__componentOriginal53af403f6b2179a3039d488b8ab2a267 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53af403f6b2179a3039d488b8ab2a267 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.control','data' => ['type' => 'textarea','id' => 'comment','name' => 'comment','rules' => 'required','label' => trans('admin::app.sales.orders.view.comments'),'placeholder' => trans('admin::app.sales.orders.view.write-your-comment'),'rows' => '3']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'textarea','id' => 'comment','name' => 'comment','rules' => 'required','label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('admin::app.sales.orders.view.comments')),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('admin::app.sales.orders.view.write-your-comment')),'rows' => '3']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal53af403f6b2179a3039d488b8ab2a267)): ?>
<?php $attributes = $__attributesOriginal53af403f6b2179a3039d488b8ab2a267; ?>
<?php unset($__attributesOriginal53af403f6b2179a3039d488b8ab2a267); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal53af403f6b2179a3039d488b8ab2a267)): ?>
<?php $component = $__componentOriginal53af403f6b2179a3039d488b8ab2a267; ?>
<?php unset($__componentOriginal53af403f6b2179a3039d488b8ab2a267); ?>
<?php endif; ?>

                                    <?php if (isset($component)) { $__componentOriginal8da25fb6534e2ef288914e35c32417f8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8da25fb6534e2ef288914e35c32417f8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.error','data' => ['controlName' => 'comment']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['control-name' => 'comment']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8da25fb6534e2ef288914e35c32417f8)): ?>
<?php $attributes = $__attributesOriginal8da25fb6534e2ef288914e35c32417f8; ?>
<?php unset($__attributesOriginal8da25fb6534e2ef288914e35c32417f8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8da25fb6534e2ef288914e35c32417f8)): ?>
<?php $component = $__componentOriginal8da25fb6534e2ef288914e35c32417f8; ?>
<?php unset($__componentOriginal8da25fb6534e2ef288914e35c32417f8); ?>
<?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7b1bc76a00ab5e7f1bf2c6429dae85a3)): ?>
<?php $attributes = $__attributesOriginal7b1bc76a00ab5e7f1bf2c6429dae85a3; ?>
<?php unset($__attributesOriginal7b1bc76a00ab5e7f1bf2c6429dae85a3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7b1bc76a00ab5e7f1bf2c6429dae85a3)): ?>
<?php $component = $__componentOriginal7b1bc76a00ab5e7f1bf2c6429dae85a3; ?>
<?php unset($__componentOriginal7b1bc76a00ab5e7f1bf2c6429dae85a3); ?>
<?php endif; ?>
                            </div>

                            <div class="flex items-center justify-between">
                                <label
                                    class="flex w-max cursor-pointer select-none items-center gap-1 p-1.5"
                                    for="customer_notified"
                                >
                                    <input
                                        type="checkbox"
                                        name="customer_notified"
                                        id="customer_notified"
                                        value="1"
                                        class="peer hidden"
                                    >

                                    <span
                                        class="icon-uncheckbox peer-checked:icon-checked cursor-pointer rounded-md text-2xl peer-checked:text-blue-600"
                                        role="button"
                                        tabindex="0"
                                    >
                                    </span>

                                    <p class="flex cursor-pointer items-center gap-x-1 font-semibold text-gray-600 hover:text-gray-800 dark:text-gray-300 dark:hover:text-gray-100">
                                        <?php echo app('translator')->get('admin::app.sales.orders.view.notify-customer'); ?>
                                    </p>
                                </label>

                                <button
                                    type="submit"
                                    class="secondary-button"
                                    aria-label="<?php echo e(trans('admin::app.sales.orders.view.submit-comment')); ?>"
                                >
                                    <?php echo app('translator')->get('admin::app.sales.orders.view.submit-comment'); ?>
                                </button>
                            </div>
                        </div>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal81b4d293d9113446bb908fc8aef5c8f6)): ?>
<?php $attributes = $__attributesOriginal81b4d293d9113446bb908fc8aef5c8f6; ?>
<?php unset($__attributesOriginal81b4d293d9113446bb908fc8aef5c8f6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal81b4d293d9113446bb908fc8aef5c8f6)): ?>
<?php $component = $__componentOriginal81b4d293d9113446bb908fc8aef5c8f6; ?>
<?php unset($__componentOriginal81b4d293d9113446bb908fc8aef5c8f6); ?>
<?php endif; ?>

                    <span class="block w-full border-b dark:border-gray-800"></span>

                    <!-- Comment List -->
                    <?php $__currentLoopData = $order->comments()->orderBy('id', 'desc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="grid gap-1.5 p-4">
                            <p class="break-all text-base leading-6 text-gray-800 dark:text-white">
                                <?php echo e($comment->comment); ?>

                            </p>

                            <!-- Notes List Title and Time -->
                            <p class="flex items-center gap-2 text-gray-600 dark:text-gray-300">
                                <?php if($comment->customer_notified): ?>
                                    <span class="icon-done h-fit rounded-full bg-blue-100 text-2xl text-blue-600"></span>

                                    <?php echo app('translator')->get('admin::app.sales.orders.view.customer-notified', ['date' => core()->formatDate($comment->created_at, 'Y-m-d H:i:s a')]); ?>
                                <?php else: ?>
                                    <span class="icon-cancel-1 h-fit rounded-full bg-red-100 text-2xl text-red-600"></span>

                                    <?php echo app('translator')->get('admin::app.sales.orders.view.customer-not-notified', ['date' => core()->formatDate($comment->created_at, 'Y-m-d H:i:s a')]); ?>
                                <?php endif; ?>
                            </p>
                        </div>

                        <span class="block w-full border-b dark:border-gray-800"></span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <?php echo view_render_event('bagisto.admin.sales.order.left_component.after', ['order' => $order]); ?>

            </div>

            <!-- Right Component -->
            <div class="flex w-[360px] max-w-full flex-col gap-2 max-sm:w-full">
                <?php echo view_render_event('bagisto.admin.sales.order.right_component.before', ['order' => $order]); ?>


                <!-- Customer and address information -->
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
                            <?php echo app('translator')->get('admin::app.sales.orders.view.customer'); ?>
                        </p>
                     <?php $__env->endSlot(); ?>

                     <?php $__env->slot('content', null, []); ?> 
                        <div class="<?php echo e($order->billing_address ? 'pb-4' : ''); ?>">
                            <div class="flex flex-col gap-1.5">
                                <p class="font-semibold text-gray-800 dark:text-white">
                                    <?php echo e($order->customer_full_name); ?>

                                </p>

                                <?php echo view_render_event('bagisto.admin.sales.order.customer_full_name.after', ['order' => $order]); ?>


                                <p class="text-gray-600 dark:text-gray-300">
                                    <?php echo e($order->customer_email); ?>

                                </p>

                                <?php echo view_render_event('bagisto.admin.sales.order.customer_email.after', ['order' => $order]); ?>


                                <p class="text-gray-600 dark:text-gray-300">
                                    <?php echo app('translator')->get('admin::app.sales.orders.view.customer-group'); ?> : <?php echo e($order->is_guest ? core()->getGuestCustomerGroup()?->name : ($order->customer->group->name ?? '')); ?>

                                </p>

                                <?php echo view_render_event('bagisto.admin.sales.order.customer_group.after', ['order' => $order]); ?>

                            </div>
                        </div>

                        <!-- Billing Address -->
                        <?php if($order->billing_address): ?>
                            <span class="block w-full border-b dark:border-gray-800"></span>

                            <div class="<?php echo e($order->shipping_address ? 'pb-4' : ''); ?>">

                                <div class="flex items-center justify-between">
                                    <p class="py-4 text-base font-semibold text-gray-600 dark:text-gray-300">
                                        <?php echo app('translator')->get('admin::app.sales.orders.view.billing-address'); ?>
                                    </p>
                                </div>

                                <?php echo $__env->make('admin::sales.address', ['address' => $order->billing_address], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                                <?php echo view_render_event('bagisto.admin.sales.order.billing_address.after', ['order' => $order]); ?>

                            </div>
                        <?php endif; ?>

                        <!-- Shipping Address -->
                        <?php if($order->shipping_address): ?>
                            <span class="block w-full border-b dark:border-gray-800"></span>

                            <div class="flex items-center justify-between">
                                <p class="py-4 text-base font-semibold text-gray-600 dark:text-gray-300">
                                    <?php echo app('translator')->get('admin::app.sales.orders.view.shipping-address'); ?>
                                </p>
                            </div>

                            <?php echo $__env->make('admin::sales.address', ['address' => $order->shipping_address], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                            <?php echo view_render_event('bagisto.admin.sales.order.shipping_address.after', ['order' => $order]); ?>

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
                            <?php echo app('translator')->get('admin::app.sales.orders.view.order-information'); ?>
                        </p>
                     <?php $__env->endSlot(); ?>

                     <?php $__env->slot('content', null, []); ?> 
                        <div class="flex w-full justify-start gap-5">
                            <div class="flex flex-col gap-y-1.5">
                                <p class="text-gray-600 dark:text-gray-300">
                                    <?php echo app('translator')->get('admin::app.sales.orders.view.order-date'); ?>
                                </p>

                                <p class="text-gray-600 dark:text-gray-300">
                                    <?php echo app('translator')->get('admin::app.sales.orders.view.order-status'); ?>
                                </p>

                                <p class="text-gray-600 dark:text-gray-300">
                                    <?php echo app('translator')->get('admin::app.sales.orders.view.channel'); ?>
                                </p>
                            </div>

                            <div class="flex flex-col gap-y-1.5">
                                <?php echo view_render_event('bagisto.admin.sales.order.created_at.before', ['order' => $order]); ?>


                                <!-- Order Date -->
                                <p class="text-gray-600 dark:text-gray-300">
                                    <?php echo e(core()->formatDate($order->created_at)); ?>

                                </p>

                                <?php echo view_render_event('bagisto.admin.sales.order.created_at.after', ['order' => $order]); ?>


                                <!-- Order Status -->
                                <p class="text-gray-600 dark:text-gray-300">
                                    <?php echo e($order->status_label); ?>

                                </p>

                                <?php echo view_render_event('bagisto.admin.sales.order.status_label.after', ['order' => $order]); ?>


                                <!-- Order Channel -->
                                <p class="text-gray-600 dark:text-gray-300">
                                    <?php echo e($order->channel_name); ?>

                                </p>

                                <?php echo view_render_event('bagisto.admin.sales.order.channel_name.after', ['order' => $order]); ?>

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

                <!-- Payment and Shipping Information-->
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
                            <?php echo app('translator')->get('admin::app.sales.orders.view.payment-and-shipping'); ?>
                        </p>
                     <?php $__env->endSlot(); ?>

                     <?php $__env->slot('content', null, []); ?> 
                        <div>
                            <!-- Payment method -->
                            <p class="font-semibold text-gray-800 dark:text-white">
                                <?php echo e(core()->getConfigData('sales.payment_methods.' . $order->payment->method . '.title')); ?>

                            </p>

                            <p class="text-gray-600 dark:text-gray-300">
                                <?php echo app('translator')->get('admin::app.sales.orders.view.payment-method'); ?>
                            </p>

                            <!-- Currency -->
                            <p class="pt-4 font-semibold text-gray-800 dark:text-white">
                                <?php echo e($order->order_currency_code); ?>

                            </p>

                            <p class="text-gray-600 dark:text-gray-300">
                                <?php echo app('translator')->get('admin::app.sales.orders.view.currency'); ?>
                            </p>

                            <?php $additionalDetails = \Webkul\Payment\Payment::getAdditionalDetails($order->payment->method); ?>

                            <!-- Additional details -->
                            <?php if(! empty($additionalDetails)): ?>
                                <p class="pt-4 font-semibold text-gray-800 dark:text-white">
                                    <?php echo e($additionalDetails['title']); ?>

                                </p>

                                <p class="text-gray-600 dark:text-gray-300">
                                    <?php echo e($additionalDetails['value']); ?>

                                </p>
                            <?php endif; ?>

                            <?php echo view_render_event('bagisto.admin.sales.order.payment-method.after', ['order' => $order]); ?>

                        </div>

                        <!-- Shipping Method and Price Details -->
                        <?php if($order->shipping_address): ?>
                            <span class="mt-4 block w-full border-b dark:border-gray-800"></span>

                            <div class="pt-4">
                                <p class="font-semibold text-gray-800 dark:text-white">
                                    <?php echo e($order->shipping_title); ?>

                                </p>

                                <p class="text-gray-600 dark:text-gray-300">
                                    <?php echo app('translator')->get('admin::app.sales.orders.view.shipping-method'); ?>
                                </p>

                                <p class="pt-4 font-semibold text-gray-800 dark:text-white">
                                    <?php echo e(core()->formatBasePrice($order->base_shipping_amount)); ?>

                                </p>

                                <p class="text-gray-600 dark:text-gray-300">
                                    <?php echo app('translator')->get('admin::app.sales.orders.view.shipping-price'); ?>
                                </p>
                            </div>

                            <?php echo view_render_event('bagisto.admin.sales.order.shipping-method.after', ['order' => $order]); ?>

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

                <!-- Invoice Information-->
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
                            <?php echo app('translator')->get('admin::app.sales.orders.view.invoices'); ?> (<?php echo e(count($order->invoices)); ?>)
                        </p>
                     <?php $__env->endSlot(); ?>

                     <?php $__env->slot('content', null, []); ?> 
                        <?php $__empty_1 = true; $__currentLoopData = $order->invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="grid gap-y-2.5">
                                <div>
                                    <p class="font-semibold text-gray-800 dark:text-white">
                                        <?php echo app('translator')->get('admin::app.sales.orders.view.invoice-id', ['invoice' => $invoice->increment_id ?? $invoice->id]); ?>
                                    </p>

                                    <p class="text-gray-600 dark:text-gray-300">
                                        <?php echo e(core()->formatDate($invoice->created_at, 'd M, Y H:i:s a')); ?>

                                    </p>
                                </div>

                                <div class="flex gap-2.5">
                                    <a
                                        href="<?php echo e(route('admin.sales.invoices.view', $invoice->id)); ?>"
                                        class="text-sm text-blue-600 transition-all hover:underline"
                                    >
                                        <?php echo app('translator')->get('admin::app.sales.orders.view.view'); ?>
                                    </a>

                                    <a
                                        href="<?php echo e(route('admin.sales.invoices.print', $invoice->id)); ?>"
                                        class="text-sm text-blue-600 transition-all hover:underline"
                                    >
                                        <?php echo app('translator')->get('admin::app.sales.orders.view.download-pdf'); ?>
                                    </a>
                                </div>
                            </div>

                            <?php if($index < count($order->invoices) - 1): ?>
                                <span class="mb-4 mt-4 block w-full border-b dark:border-gray-800"></span>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <p class="text-gray-600 dark:text-gray-300">
                                <?php echo app('translator')->get('admin::app.sales.orders.view.no-invoice-found'); ?>
                            </p>
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

                <!-- Shipment Information-->
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
                            <?php echo app('translator')->get('admin::app.sales.orders.view.shipments'); ?> (<?php echo e(count($order->shipments)); ?>)
                        </p>
                     <?php $__env->endSlot(); ?>

                     <?php $__env->slot('content', null, []); ?> 
                        <?php $__empty_1 = true; $__currentLoopData = $order->shipments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shipment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="grid gap-y-2.5">
                                <div>
                                    <!-- Shipment Id -->
                                    <p class="font-semibold text-gray-800 dark:text-white">
                                        <?php echo app('translator')->get('admin::app.sales.orders.view.shipment', ['shipment' => $shipment->id]); ?>
                                    </p>

                                    <!-- Shipment Created -->
                                    <p class="text-gray-600 dark:text-gray-300">
                                        <?php echo e(core()->formatDate($shipment->created_at, 'd M, Y H:i:s a')); ?>

                                    </p>
                                </div>

                                <div class="flex gap-2.5">
                                    <a
                                        href="<?php echo e(route('admin.sales.shipments.view', $shipment->id)); ?>"
                                        class="text-sm text-blue-600 transition-all hover:underline"
                                    >
                                        <?php echo app('translator')->get('admin::app.sales.orders.view.view'); ?>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <p class="text-gray-600 dark:text-gray-300">
                                <?php echo app('translator')->get('admin::app.sales.orders.view.no-shipment-found'); ?>
                            </p>
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

                <!-- Refund Information -->
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
                            <?php echo app('translator')->get('admin::app.sales.orders.view.refund'); ?>
                        </p>
                     <?php $__env->endSlot(); ?>

                     <?php $__env->slot('content', null, []); ?> 
                        <?php $__empty_1 = true; $__currentLoopData = $order->refunds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $refund): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="grid gap-y-2.5">
                                <div>
                                    <p class="font-semibold text-gray-800 dark:text-white">
                                        <?php echo app('translator')->get('admin::app.sales.orders.view.refund-id', ['refund' => $refund->id]); ?>
                                    </p>

                                    <p class="text-gray-600 dark:text-gray-300">
                                        <?php echo e(core()->formatDate($refund->created_at, 'd M, Y H:i:s a')); ?>

                                    </p>

                                    <p class="mt-4 font-semibold text-gray-800 dark:text-white">
                                        <?php echo app('translator')->get('admin::app.sales.orders.view.name'); ?>
                                    </p>

                                    <p class="text-gray-600 dark:text-gray-300">
                                        <?php echo e($refund->order->customer_full_name); ?>

                                    </p>

                                    <p class="mt-4 font-semibold text-gray-800 dark:text-white">
                                        <?php echo app('translator')->get('admin::app.sales.orders.view.status'); ?>
                                    </p>

                                    <p class="text-gray-600 dark:text-gray-300">
                                        <?php echo app('translator')->get('admin::app.sales.orders.view.refunded'); ?>

                                        <span class="font-semibold text-gray-800 dark:text-white">
                                            <?php echo e(core()->formatBasePrice($refund->base_grand_total)); ?>

                                        </span>
                                    </p>
                                </div>

                                <div class="flex gap-2.5">
                                    <a
                                        href="<?php echo e(route('admin.sales.refunds.view', $refund->id)); ?>"
                                        class="text-sm text-blue-600 transition-all hover:underline"
                                    >
                                        <?php echo app('translator')->get('admin::app.sales.orders.view.view'); ?>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <p class="text-gray-600 dark:text-gray-300">
                                <?php echo app('translator')->get('admin::app.sales.orders.view.no-refund-found'); ?>
                            </p>
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

                <?php echo view_render_event('bagisto.admin.sales.order.right_component.after', ['order' => $order]); ?>

            </div>
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
<?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Admin\src\Resources\views\sales\orders\view.blade.php ENDPATH**/ ?>