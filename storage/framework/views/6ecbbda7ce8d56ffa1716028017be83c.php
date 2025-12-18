<?php if (isset($component)) { $__componentOriginal4c4dbe009fe892108b054e8b47e63427 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4c4dbe009fe892108b054e8b47e63427 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.layouts.account.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::layouts.account'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <!-- Page Title -->
     <?php $__env->slot('title', null, []); ?> 
        <?php echo app('translator')->get('shop::app.customers.account.orders.view.page-title', ['order_id' => $order->increment_id]); ?>
     <?php $__env->endSlot(); ?>

    <!-- Breadcrumbs -->
    <?php $__env->startSection('breadcrumbs'); ?>
        <?php if (isset($component)) { $__componentOriginaldef12fd0653509715c3bc62a609dde73 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldef12fd0653509715c3bc62a609dde73 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.breadcrumbs.index','data' => ['name' => 'orders.view','entity' => $order]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::breadcrumbs'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'orders.view','entity' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($order)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldef12fd0653509715c3bc62a609dde73)): ?>
<?php $attributes = $__attributesOriginaldef12fd0653509715c3bc62a609dde73; ?>
<?php unset($__attributesOriginaldef12fd0653509715c3bc62a609dde73); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldef12fd0653509715c3bc62a609dde73)): ?>
<?php $component = $__componentOriginaldef12fd0653509715c3bc62a609dde73; ?>
<?php unset($__componentOriginaldef12fd0653509715c3bc62a609dde73); ?>
<?php endif; ?>
    <?php $__env->stopSection(); ?>

    <div class="max-md:hidden">
        <?php if (isset($component)) { $__componentOriginalf60f1298dff473a76a071049d503ffbb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf60f1298dff473a76a071049d503ffbb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.layouts.account.navigation','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::layouts.account.navigation'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf60f1298dff473a76a071049d503ffbb)): ?>
<?php $attributes = $__attributesOriginalf60f1298dff473a76a071049d503ffbb; ?>
<?php unset($__attributesOriginalf60f1298dff473a76a071049d503ffbb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf60f1298dff473a76a071049d503ffbb)): ?>
<?php $component = $__componentOriginalf60f1298dff473a76a071049d503ffbb; ?>
<?php unset($__componentOriginalf60f1298dff473a76a071049d503ffbb); ?>
<?php endif; ?>
    </div>

    <div class="mx-4 flex-auto max-md:mx-6 max-sm:mx-4">

        <!-- Cancel and Reorder buttons -->
        <div class="flex items-center justify-between">
            <div class="max-md:flex max-md:items-center">
                <!-- Back Button For mobile view -->
                <a
                    class="grid md:hidden"
                    href="<?php echo e(route('shop.customers.account.orders.index')); ?>"
                >
                    <span class="icon-arrow-left rtl:icon-arrow-right text-2xl"></span>
                </a>

                <h2 class="text-2xl font-medium max-md:text-xl max-sm:text-base ltr:ml-2.5 md:ltr:ml-0 rtl:mr-2.5 md:rtl:mr-0">
                    <?php echo app('translator')->get('shop::app.customers.account.orders.view.page-title', ['order_id' => $order->increment_id]); ?>
                </h2>
            </div>

            <div class="flex gap-1.5">
                <?php echo view_render_event('bagisto.shop.customers.account.orders.reorder_button.before', ['order' => $order]); ?>


                <?php if(
                    $order->canReorder()
                    && core()->getConfigData('sales.order_settings.reorder.shop')
                ): ?>
                    <a
                        href="<?php echo e(route('shop.customers.account.orders.reorder', $order->id)); ?>"
                        class="secondary-button border-zinc-200 px-5 py-3 font-normal max-md:hidden"
                    >
                        <?php echo app('translator')->get('shop::app.customers.account.orders.view.reorder-btn-title'); ?>
                    </a>
                <?php endif; ?>

                <?php echo view_render_event('bagisto.shop.customers.account.orders.reorder_button.after', ['order' => $order]); ?>


                <?php echo view_render_event('bagisto.shop.customers.account.orders.cancel_button.before', ['order' => $order]); ?>


                <?php if($order->canCancel()): ?>
                    <form
                        method="POST"
                        ref="cancelOrderForm"
                        action="<?php echo e(route('shop.customers.account.orders.cancel', $order->id)); ?>"
                    >
                        <?php echo csrf_field(); ?>
                    </form>

                    <a
                        class="secondary-button border-zinc-200 px-5 py-3 font-normal max-md:hidden"
                        href="javascript:void(0);"
                        @click="$emitter.emit('open-confirm-modal', {
                            message: '<?php echo app('translator')->get('shop::app.customers.account.orders.view.cancel-confirm-msg'); ?>',

                            agree: () => {
                                this.$refs['cancelOrderForm'].submit()
                            }
                        })"
                    >
                        <?php echo app('translator')->get('shop::app.customers.account.orders.view.cancel-btn-title'); ?>
                    </a>
                <?php endif; ?>

                <?php echo view_render_event('bagisto.shop.customers.account.orders.cancel_button.after', ['order' => $order]); ?>

            </div>
        </div>

        <?php echo view_render_event('bagisto.shop.customers.account.orders.view.before', ['order' => $order]); ?>


        <!-- Order view tabs -->
        <div class="mt-8 max-md:mt-5 max-md:grid max-md:gap-4">
            <?php if (isset($component)) { $__componentOriginalfc60bb615bed00622a91d98d31176f33 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfc60bb615bed00622a91d98d31176f33 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.tabs.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::tabs'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <?php if (isset($component)) { $__componentOriginal1f42c1ae3abb1d72da6c703bc82e8a90 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1f42c1ae3abb1d72da6c703bc82e8a90 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.tabs.item','data' => ['class' => '!px-0 max-md:pb-0 max-md:pt-2','title' => trans('shop::app.customers.account.orders.view.information.info'),'isSelected' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::tabs.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => '!px-0 max-md:pb-0 max-md:pt-2','title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('shop::app.customers.account.orders.view.information.info')),'is-selected' => true]); ?>
                    <!-- For Desktop -->
                    <div class="max-md:hidden">
                        <div class="text-base font-medium">
                            <?php echo app('translator')->get('shop::app.customers.account.orders.view.information.placed-on'); ?>

                            <?php echo e(core()->formatDate($order->created_at, 'd M Y')); ?>

                        </div>

                        <!-- Order Details -->
                        <div class="relative mt-8 overflow-x-auto rounded-xl border">
                            <table class="w-full text-left">
                                <thead class="border-b border-zinc-200 bg-zinc-100 text-sm text-black">
                                    <tr class="[&>*]:font-medium [&>*]:px-6 [&>*]:py-4">
                                        <th scope="col">
                                            <?php echo app('translator')->get('shop::app.customers.account.orders.view.information.sku'); ?>
                                        </th>

                                        <th scope="col">
                                            <?php echo app('translator')->get('shop::app.customers.account.orders.view.information.product-name'); ?>
                                        </th>

                                        <th scope="col">
                                            <?php echo app('translator')->get('shop::app.customers.account.orders.view.information.price'); ?>
                                        </th>

                                        <th scope="col">
                                            <?php echo app('translator')->get('shop::app.customers.account.orders.view.information.item-status'); ?>
                                        </th>

                                        <th scope="col">
                                            <?php echo app('translator')->get('shop::app.customers.account.orders.view.information.subtotal'); ?>
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="border-b bg-white align-top font-medium [&>*]:px-6 [&>*]:py-4">
                                            <td data-value="<?php echo app('translator')->get('shop::app.customers.account.orders.view.information.sku'); ?>">
                                                <?php echo e($item->getTypeInstance()->getOrderedItem($item)->sku); ?>

                                            </td>

                                            <td data-value="<?php echo app('translator')->get('shop::app.customers.account.orders.view.information.product-name'); ?>">
                                                <?php echo e($item->name); ?>


                                                <?php if(isset($item->additional['attributes'])): ?>
                                                    <div>
                                                        <?php $__currentLoopData = $item->additional['attributes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if(
                                                                ! isset($attribute['attribute_type'])
                                                                || $attribute['attribute_type'] !== 'file'
                                                            ): ?>
                                                                <b><?php echo e($attribute['attribute_name']); ?> : </b><?php echo e($attribute['option_label']); ?><br>
                                                            <?php else: ?>
                                                                <?php echo e($attribute['attribute_name']); ?> :

                                                                <a
                                                                    href="<?php echo e(Storage::url($attribute['option_label'])); ?>"
                                                                    class="text-blue-600 hover:underline"
                                                                    download="<?php echo e(File::basename($attribute['option_label'])); ?>"
                                                                >
                                                                    <?php echo e(File::basename($attribute['option_label'])); ?>

                                                                </a>

                                                                <br>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                <?php endif; ?>
                                            </td>

                                            <td
                                                class="flex flex-col"
                                                data-value="<?php echo app('translator')->get('shop::app.customers.account.orders.view.information.price'); ?>"
                                            >
                                                <?php if(core()->getConfigData('sales.taxes.sales.display_prices') == 'including_tax'): ?>
                                                    <?php echo e(core()->formatPrice($item->price_incl_tax, $order->order_currency_code)); ?>

                                                <?php elseif(core()->getConfigData('sales.taxes.sales.display_prices') == 'both'): ?>
                                                    <?php echo e(core()->formatPrice($item->price_incl_tax, $order->order_currency_code)); ?>


                                                    <span class="whitespace-nowrap text-xs font-normal">
                                                        <?php echo app('translator')->get('shop::app.customers.account.orders.view.information.excl-tax'); ?>

                                                        <span class="font-medium">
                                                            <?php echo e(core()->formatPrice($item->price, $order->order_currency_code)); ?>

                                                        </span>
                                                    </span>
                                                <?php else: ?>
                                                    <?php echo e(core()->formatPrice($item->price, $order->order_currency_code)); ?>

                                                <?php endif; ?>
                                            </td>

                                            <td data-value="<?php echo app('translator')->get('shop::app.customers.account.orders.view.information.item-status'); ?>">
                                                <?php if($item->qty_ordered): ?>
                                                    <?php echo app('translator')->get('shop::app.customers.account.orders.view.information.ordered-item', ['qty_ordered' => $item->qty_ordered]); ?>
                                                <?php endif; ?>

                                                <?php if($item->qty_invoiced): ?>
                                                    <?php echo app('translator')->get('shop::app.customers.account.orders.view.information.invoiced-item', ['qty_invoiced' => $item->qty_invoiced]); ?>
                                                <?php endif; ?>

                                                <?php if($item->qty_shipped): ?>
                                                    <?php echo app('translator')->get('shop::app.customers.account.orders.view.information.item-shipped', ['qty_shipped' => $item->qty_shipped]); ?>
                                                <?php endif; ?>

                                                <?php if($item->qty_refunded): ?>
                                                    <?php echo app('translator')->get('shop::app.customers.account.orders.view.information.item-refunded', ['qty_refunded' => $item->qty_refunded]); ?>
                                                <?php endif; ?>

                                                <?php if($item->qty_canceled): ?>
                                                    <?php echo app('translator')->get('shop::app.customers.account.orders.view.information.item-canceled', ['qty_canceled' => $item->qty_canceled]); ?>
                                                <?php endif; ?>
                                            </td>

                                            <td
                                                class="flex flex-col"
                                                data-value="<?php echo app('translator')->get('shop::app.customers.account.orders.view.information.subtotal'); ?>"
                                            >
                                                <?php if(core()->getConfigData('sales.taxes.sales.display_prices') == 'including_tax'): ?>
                                                    <?php echo e(core()->formatPrice($item->total_incl_tax, $order->order_currency_code)); ?>

                                                <?php elseif(core()->getConfigData('sales.taxes.sales.display_prices') == 'both'): ?>
                                                    <?php echo e(core()->formatPrice($item->total_incl_tax, $order->order_currency_code)); ?>


                                                    <span class="whitespace-nowrap text-xs font-normal">
                                                        <?php echo app('translator')->get('shop::app.customers.account.orders.view.information.excl-tax'); ?>

                                                        <?php echo e(core()->formatPrice($item->total, $order->order_currency_code)); ?>

                                                    </span>
                                                <?php else: ?>
                                                    <?php echo e(core()->formatPrice($item->total, $order->order_currency_code)); ?>

                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- Payment Details -->
                        <div class="mt-8 flex items-start gap-10 max-lg:gap-5">
                            <div class="flex-auto">
                                <div class="flex justify-end">
                                    <div class="grid max-w-max gap-2 text-sm">

                                        <?php echo view_render_event('bagisto.shop.customers.account.orders.view.information.subtotal.before'); ?>


                                        <!-- Sub Total -->
                                        <?php if(core()->getConfigData('sales.taxes.sales.display_subtotal') == 'including_tax'): ?>
                                            <div class="flex w-full justify-between gap-x-5">
                                                <?php echo app('translator')->get('shop::app.customers.account.orders.view.information.subtotal'); ?>

                                                <p>
                                                    <?php echo e(core()->formatPrice($order->sub_total_incl_tax, $order->order_currency_code)); ?>

                                                </p>
                                            </div>
                                        <?php elseif(core()->getConfigData('sales.taxes.sales.display_subtotal') == 'both'): ?>
                                            <div class="flex w-full justify-between gap-x-5">
                                                <?php echo app('translator')->get('shop::app.customers.account.orders.view.information.subtotal-excl-tax'); ?>

                                                <p>
                                                    <?php echo e(core()->formatPrice($order->sub_total, $order->order_currency_code)); ?>

                                                </p>
                                            </div>

                                            <div class="flex w-full justify-between gap-x-5">
                                                <?php echo app('translator')->get('shop::app.customers.account.orders.view.information.subtotal-incl-tax'); ?>

                                                <p>
                                                    <?php echo e(core()->formatPrice($order->sub_total_incl_tax, $order->order_currency_code)); ?>

                                                </p>
                                            </div>
                                        <?php else: ?>
                                            <div class="flex w-full justify-between gap-x-5">
                                                <?php echo app('translator')->get('shop::app.customers.account.orders.view.information.subtotal'); ?>

                                                <p>
                                                    <?php echo e(core()->formatPrice($order->sub_total, $order->order_currency_code)); ?>

                                                </p>
                                            </div>
                                        <?php endif; ?>

                                        <?php echo view_render_event('bagisto.shop.customers.account.orders.view.information.subtotal.after'); ?>


                                        <?php echo view_render_event('bagisto.shop.customers.account.orders.view.information.shipping.before'); ?>


                                        <!-- Shipping And Handling -->
                                        <?php if($order->haveStockableItems()): ?>
                                            <?php if(core()->getConfigData('sales.taxes.sales.display_shipping_amount') == 'including_tax'): ?>
                                                <div class="flex w-full justify-between gap-x-5">
                                                    <?php echo app('translator')->get('shop::app.customers.account.orders.view.information.shipping-handling'); ?>

                                                    <p>
                                                        <?php echo e(core()->formatPrice($order->shipping_amount_incl_tax, $order->order_currency_code)); ?>

                                                    </p>
                                                </div>
                                            <?php elseif(core()->getConfigData('sales.taxes.sales.display_shipping_amount') == 'both'): ?>
                                                <div class="flex w-full justify-between gap-x-5">
                                                    <?php echo app('translator')->get('shop::app.customers.account.orders.view.information.shipping-handling-excl-tax'); ?>

                                                    <p>
                                                        <?php echo e(core()->formatPrice($order->shipping_amount, $order->order_currency_code)); ?>

                                                    </p>
                                                </div>

                                                <div class="flex w-full justify-between gap-x-5">
                                                    <?php echo app('translator')->get('shop::app.customers.account.orders.view.information.shipping-handling-incl-tax'); ?>

                                                    <p>
                                                        <?php echo e(core()->formatPrice($order->shipping_amount_incl_tax, $order->order_currency_code)); ?>

                                                    </p>
                                                </div>
                                            <?php else: ?>
                                                <div class="flex w-full justify-between gap-x-5">
                                                    <?php echo app('translator')->get('shop::app.customers.account.orders.view.information.shipping-handling'); ?>

                                                    <p>
                                                        <?php echo e(core()->formatPrice($order->shipping_amount, $order->order_currency_code)); ?>

                                                    </p>
                                                </div>
                                            <?php endif; ?>
                                        <?php endif; ?>

                                        <?php echo view_render_event('bagisto.shop.customers.account.orders.view.information.shipping.after'); ?>


                                        <?php echo view_render_event('bagisto.shop.customers.account.orders.view.information.tax-amount.before'); ?>


                                        <!-- Tax Amount -->
                                        <div class="flex w-full justify-between gap-x-5">
                                            <?php echo app('translator')->get('shop::app.customers.account.orders.view.information.tax'); ?>

                                            <p>
                                                <?php echo e(core()->formatPrice($order->tax_amount, $order->order_currency_code)); ?>

                                            </p>
                                        </div>

                                        <?php echo view_render_event('bagisto.shop.customers.account.orders.view.information.tax-amount.after'); ?>


                                        <?php echo view_render_event('bagisto.shop.customers.account.orders.view.information.discount.before'); ?>


                                        <!-- Discount Details -->
                                        <?php if($order->base_discount_amount > 0): ?>
                                            <div class="flex w-full justify-between gap-x-5">
                                                <p>
                                                    <?php echo app('translator')->get('shop::app.customers.account.orders.view.information.discount'); ?>

                                                    <?php if($order->coupon_code): ?>
                                                        (<?php echo e($order->coupon_code); ?>)
                                                    <?php endif; ?>
                                                </p>

                                                <p>
                                                    <?php echo e(core()->formatPrice($order->discount_amount, $order->order_currency_code)); ?>

                                                </p>
                                            </div>
                                        <?php endif; ?>

                                        <?php echo view_render_event('bagisto.shop.customers.account.orders.view.information.discount.after'); ?>


                                        <?php echo view_render_event('bagisto.shop.customers.account.orders.view.information.grand-total.before'); ?>


                                        <!-- Grand Total -->
                                        <div class="flex w-full justify-between gap-x-5 font-semibold">
                                            <?php echo app('translator')->get('shop::app.customers.account.orders.view.information.grand-total'); ?>

                                            <p>
                                                <?php echo e(core()->formatPrice($order->grand_total, $order->order_currency_code)); ?>

                                            </p>
                                        </div>

                                        <?php echo view_render_event('bagisto.shop.customers.account.orders.view.information.grand-total.after'); ?>


                                        <?php echo view_render_event('bagisto.shop.customers.account.orders.view.information.total-paid.before'); ?>


                                        <!-- Total Paid -->
                                        <div class="flex w-full justify-between gap-x-5">
                                            <?php echo app('translator')->get('shop::app.customers.account.orders.view.information.total-paid'); ?>

                                            <p>
                                                <?php echo e(core()->formatPrice($order->grand_total_invoiced, $order->order_currency_code)); ?>

                                            </p>
                                        </div>

                                        <?php echo view_render_event('bagisto.shop.customers.account.orders.view.information.total-paid.after'); ?>


                                        <?php echo view_render_event('bagisto.shop.customers.account.orders.view.information.total-refunded.before'); ?>


                                        <!-- Total Refunded -->
                                        <div class="flex w-full justify-between gap-x-5">
                                            <?php echo app('translator')->get('shop::app.customers.account.orders.view.information.total-refunded'); ?>

                                            <p>
                                                <?php echo e(core()->formatPrice($order->grand_total_refunded, $order->order_currency_code)); ?>

                                            </p>
                                        </div>

                                        <?php echo view_render_event('bagisto.shop.customers.account.orders.view.information.total-refunded.after'); ?>


                                        <?php echo view_render_event('bagisto.shop.customers.account.orders.view.information.total-due.before'); ?>


                                        <!-- Total Due -->
                                        <div class="flex w-full justify-between gap-x-5">
                                            <?php echo app('translator')->get('shop::app.customers.account.orders.view.information.total-due'); ?>

                                            <p>
                                                <?php if($order->status !== \Webkul\Sales\Models\Order::STATUS_CANCELED): ?>
                                                    <?php echo e(core()->formatPrice($order->total_due, $order->order_currency_code)); ?>

                                                <?php else: ?>
                                                    <?php echo e(core()->formatPrice(0.00, $order->order_currency_code)); ?>

                                                <?php endif; ?>
                                            </p>
                                        </div>

                                        <?php echo view_render_event('bagisto.shop.customers.account.orders.view.information.total-due.after'); ?>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- For Mobile View -->
                    <div class="grid gap-4 md:hidden">
                        <div class="rounded-lg border">
                            <div class="grid gap-1.5 px-4 py-2.5 text-xs font-medium text-zinc-500 [&>*]:flex [&>*]:justify-between">
                                <div>
                                    <?php echo app('translator')->get('shop::app.customers.account.orders.view.order-id'); ?>:

                                    <p class="text-black">#<?php echo e($order->increment_id); ?></p>
                                </div>

                                <div>
                                    <?php echo app('translator')->get('shop::app.customers.account.orders.view.information.placed-on'); ?>:

                                    <p class="text-black"><?php echo e(core()->formatDate($order->created_at, 'd M Y')); ?></p>
                                </div>

                                <div class="items-center">
                                    <?php echo app('translator')->get('shop::app.customers.account.orders.view.status'); ?>

                                    <?php switch($order->status):
                                        case ('completed'): ?>
                                            <p class="label-completed"><?php echo e(ucfirst($order->status)); ?></p>
                                            <?php break; ?>

                                        <?php case ('pending'): ?>
                                            <p class="label-pending"><?php echo e(ucfirst($order->status)); ?></p>
                                            <?php break; ?>

                                        <?php case ('closed'): ?>
                                            <p class="label-closed"><?php echo e(ucfirst($order->status)); ?></p>
                                            <?php break; ?>

                                        <?php case ('processing'): ?>
                                            <p class="label-processing"><?php echo e(ucfirst($order->status)); ?></p>
                                            <?php break; ?>

                                        <?php case ('canceled'): ?>
                                            <p class="label-canceled"><?php echo e(ucfirst($order->status)); ?></p>
                                            <?php break; ?>

                                        <?php default: ?>
                                            <p class="label-info"><?php echo e(ucfirst($order->status)); ?></p>
                                    <?php endswitch; ?>
                                </div>
                            </div>

                            <!-- Reorder and Cancel Button -->
                            <div class="flex w-full justify-center rounded-b-lg border-t text-center">
                                <?php if($order->canReorder()): ?>
                                    <a
                                        href="<?php echo e(route('shop.customers.account.orders.reorder', $order->id)); ?>"
                                        class="mx-auto w-full py-3 text-sm font-medium text-navyBlue hover:bg-zinc-100 max-sm:py-2"
                                    >
                                        <?php echo app('translator')->get('shop::app.customers.account.orders.view.reorder-btn-title'); ?>
                                    </a>
                                <?php endif; ?>

                                <?php if($order->canCancel()): ?>
                                    <form
                                        method="POST"
                                        ref="cancelOrderForm"
                                        action="<?php echo e(route('shop.customers.account.orders.cancel', $order->id)); ?>"
                                    >
                                        <?php echo csrf_field(); ?>
                                    </form>

                                    <!-- Seperator -->
                                    <span class="my-auto h-5 w-0.5 bg-zinc-200 py-3"></span>

                                    <a
                                        href="javascript:void(0);"
                                        class="mx-auto w-full py-3 text-sm font-medium hover:bg-zinc-100 max-sm:py-2"
                                        @click="$emitter.emit('open-confirm-modal', {
                                            message: '<?php echo app('translator')->get('shop::app.customers.account.orders.view.cancel-confirm-msg'); ?>',

                                            agree: () => {
                                                this.$refs['cancelOrderForm'].submit()
                                            }
                                        })"
                                    >
                                        <?php echo app('translator')->get('shop::app.customers.account.orders.view.cancel-btn-title'); ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Item Ordered -->
                        <?php if (isset($component)) { $__componentOriginald3ba50c765d00f082351f5b73fecce50 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald3ba50c765d00f082351f5b73fecce50 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.accordion.index','data' => ['isActive' => true,'class' => 'overflow-hidden rounded-lg !border-none !bg-gray-100']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::accordion'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['is-active' => true,'class' => 'overflow-hidden rounded-lg !border-none !bg-gray-100']); ?>
                             <?php $__env->slot('header', null, ['class' => 'bg-gray-100 !px-4 py-3 text-sm font-medium max-sm:py-2']); ?> 
                               <?php echo app('translator')->get('shop::app.customers.account.orders.view.item-ordered'); ?>
                             <?php $__env->endSlot(); ?>

                             <?php $__env->slot('content', null, ['class' => 'grid gap-2.5 !bg-gray-100 !p-0']); ?> 
                                <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="rounded-md rounded-t-none border border-t-0 bg-white px-4 py-2">
                                        <p class="pb-2 text-sm font-medium">
                                            <?php echo e($item->name); ?>


                                            <?php if(isset($item->additional['attributes'])): ?>
                                                <div>
                                                    <?php $__currentLoopData = $item->additional['attributes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <b  class="max-sm:!font-semibold"><?php echo e($attribute['attribute_name']); ?> : </b><?php echo e($attribute['option_label']); ?><br>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            <?php endif; ?>
                                        </p>

                                        <div class="grid gap-1.5 text-xs font-medium">
                                            <!-- SKU -->
                                            <div class="flex justify-between">
                                                <span class="text-zinc-500">
                                                    <?php echo app('translator')->get('shop::app.customers.account.orders.view.information.sku'); ?>:
                                                </span>

                                                <span>
                                                    <?php echo e($item->getTypeInstance()->getOrderedItem($item)->sku); ?>

                                                </span>
                                            </div>

                                            <!-- Quantity -->
                                            <div class="flex justify-between">
                                                <span class="text-zinc-500">
                                                    <?php echo app('translator')->get('shop::app.customers.account.orders.view.information.item-status'); ?>
                                                </span>

                                                <div class="[&>*]:text-right">
                                                    <?php if($item->qty_ordered): ?>
                                                        <p>
                                                            <?php echo app('translator')->get('shop::app.customers.account.orders.view.information.ordered-item', ['qty_ordered' => $item->qty_ordered]); ?>
                                                        </p>
                                                    <?php endif; ?>

                                                    <?php if($item->qty_invoiced): ?>
                                                        <p>
                                                            <?php echo app('translator')->get('shop::app.customers.account.orders.view.information.invoiced-item', ['qty_invoiced' => $item->qty_invoiced]); ?>
                                                        </p>
                                                    <?php endif; ?>

                                                    <?php if($item->qty_shipped): ?>
                                                        <p>
                                                            <?php echo app('translator')->get('shop::app.customers.account.orders.view.information.item-shipped', ['qty_shipped' => $item->qty_shipped]); ?>
                                                        </p>
                                                    <?php endif; ?>

                                                    <?php if($item->qty_refunded): ?>
                                                        <span>
                                                            <?php echo app('translator')->get('shop::app.customers.account.orders.view.information.item-refunded', ['qty_refunded' => $item->qty_refunded]); ?>
                                                        </span>
                                                    <?php endif; ?>

                                                    <?php if($item->qty_canceled): ?>
                                                        <p>
                                                            <?php echo app('translator')->get('shop::app.customers.account.orders.view.information.item-canceled', ['qty_canceled' => $item->qty_canceled]); ?>

                                                        </p>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <!-- Price -->
                                            <div class="flex justify-between">
                                                <span class="text-zinc-500">
                                                    <?php echo app('translator')->get('shop::app.customers.account.orders.view.information.price'); ?>:
                                                </span>

                                                <span class="[&>*]:text-right">
                                                    <?php if(core()->getConfigData('sales.taxes.sales.display_prices') == 'including_tax'): ?>
                                                        <?php echo e(core()->formatPrice($item->price_incl_tax, $order->order_currency_code)); ?>

                                                    <?php elseif(core()->getConfigData('sales.taxes.sales.display_prices') == 'both'): ?>
                                                        <p>
                                                            <?php echo e(core()->formatPrice($item->price_incl_tax, $order->order_currency_code)); ?>

                                                        </p>

                                                        <p class="whitespace-nowrap text-xs font-normal">
                                                            <?php echo app('translator')->get('shop::app.customers.account.orders.view.information.excl-tax'); ?>

                                                            <span class="font-medium">
                                                                <?php echo e(core()->formatPrice($item->price, $order->order_currency_code)); ?>

                                                            </span>
                                                        </p>
                                                    <?php else: ?>
                                                        <?php echo e(core()->formatPrice($item->price, $order->order_currency_code)); ?>

                                                    <?php endif; ?>
                                                </span>
                                            </div>

                                            <!-- Sub Total -->
                                            <div class="flex justify-between">
                                                <span class="text-zinc-500">
                                                    <?php echo app('translator')->get('shop::app.customers.account.orders.view.invoices.subtotal'); ?>:
                                                </span>

                                                <span class="[&>*]:text-right">
                                                    <?php if(core()->getConfigData('sales.taxes.sales.display_prices') == 'including_tax'): ?>
                                                        <?php echo e(core()->formatPrice($item->total_incl_tax, $order->order_currency_code)); ?>

                                                    <?php elseif(core()->getConfigData('sales.taxes.sales.display_prices') == 'both'): ?>
                                                        <p>
                                                            <?php echo e(core()->formatPrice($item->total_incl_tax, $order->order_currency_code)); ?>

                                                        </p>

                                                        <p class="whitespace-nowrap text-xs font-normal">
                                                            <?php echo app('translator')->get('shop::app.customers.account.orders.view.invoices.excl-tax'); ?>

                                                            <span class="font-medium">
                                                                <?php echo e(core()->formatPrice($item->total, $order->order_currency_code)); ?>

                                                            </span>
                                                        </p>
                                                    <?php else: ?>
                                                        <?php echo e(core()->formatPrice($item->total, $order->order_currency_code)); ?>

                                                    <?php endif; ?>
                                                </span>
                                            </div>

                                            <!-- Tax Percent -->
                                            <div class="flex justify-between">
                                                <span class="text-zinc-500">
                                                    <?php echo app('translator')->get('shop::app.customers.account.orders.view.information.tax-percent'); ?>
                                                </span>

                                                <p>
                                                    <?php echo e($item->tax_percent); ?>

                                                </p>
                                            </div>

                                            <!-- Tax Amount -->
                                            <div class="flex justify-between">
                                                <span class="text-zinc-500">
                                                    <?php echo app('translator')->get('shop::app.customers.account.orders.view.information.tax-amount'); ?>
                                                </span>

                                                <p>
                                                    <?php echo e($item->tax_amount); ?>

                                                </p>
                                            </div>

                                            <!-- Grand Total -->
                                            <div class="flex justify-between">
                                                <span class="text-zinc-500">
                                                    <?php echo app('translator')->get('shop::app.customers.account.orders.view.information.grand-total'); ?>
                                                </span>

                                                <p>
                                                    <?php echo e(core()->formatPrice($order->grand_total, $order->order_currency_code)); ?>

                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             <?php $__env->endSlot(); ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald3ba50c765d00f082351f5b73fecce50)): ?>
<?php $attributes = $__attributesOriginald3ba50c765d00f082351f5b73fecce50; ?>
<?php unset($__attributesOriginald3ba50c765d00f082351f5b73fecce50); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald3ba50c765d00f082351f5b73fecce50)): ?>
<?php $component = $__componentOriginald3ba50c765d00f082351f5b73fecce50; ?>
<?php unset($__componentOriginald3ba50c765d00f082351f5b73fecce50); ?>
<?php endif; ?>

                        <!--Summary -->
                        <div class="w-full rounded-md bg-gray-100">
                            <div class="rounded-t-md border-none !px-4 py-3 text-sm font-medium max-sm:py-2">
                                <?php echo app('translator')->get('shop::app.customers.account.orders.view.information.order-summary'); ?>
                            </div>

                            <div class="grid gap-1.5 rounded-md rounded-t-none border border-t-0 bg-white px-4 py-3 text-xs font-medium">

                                <?php echo view_render_event('bagisto.shop.customers.account.orders.view.information.subtotal.before'); ?>


                                <?php if(core()->getConfigData('sales.taxes.sales.display_subtotal') == 'including_tax'): ?>
                                    <div class="flex w-full justify-between gap-x-5">
                                        <p class="text-zinc-500">
                                            <?php echo app('translator')->get('shop::app.customers.account.orders.view.information.subtotal'); ?>
                                        </p>

                                        <p>
                                            <?php echo e(core()->formatPrice($order->sub_total_incl_tax, $order->order_currency_code)); ?>

                                        </p>
                                    </div>
                                <?php elseif(core()->getConfigData('sales.taxes.sales.display_subtotal') == 'both'): ?>
                                    <div class="flex w-full justify-between gap-x-5">
                                        <p class="text-zinc-500">
                                            <?php echo app('translator')->get('shop::app.customers.account.orders.view.information.subtotal-excl-tax'); ?>
                                        </p>

                                        <p>
                                            <?php echo e(core()->formatPrice($order->sub_total, $order->order_currency_code)); ?>

                                        </p>
                                    </div>

                                    <div class="flex w-full justify-between gap-x-5">
                                        <p class="text-zinc-500">

                                            <?php echo app('translator')->get('shop::app.customers.account.orders.view.information.subtotal-incl-tax'); ?>
                                        </p>

                                        <p>
                                            <?php echo e(core()->formatPrice($order->sub_total_incl_tax, $order->order_currency_code)); ?>

                                        </p>
                                    </div>
                                <?php else: ?>
                                    <div class="flex w-full justify-between gap-x-5">
                                        <p class="text-zinc-500">
                                            <?php echo app('translator')->get('shop::app.customers.account.orders.view.information.subtotal'); ?>
                                        </p>

                                        <p>
                                            <?php echo e(core()->formatPrice($order->sub_total, $order->order_currency_code)); ?>

                                        </p>
                                    </div>
                                <?php endif; ?>

                                <?php echo view_render_event('bagisto.shop.customers.account.orders.view.information.subtotal.after'); ?>


                                <?php echo view_render_event('bagisto.shop.customers.account.orders.view.information.shipping.before'); ?>


                                <?php if($order->haveStockableItems()): ?>
                                    <?php if(core()->getConfigData('sales.taxes.sales.display_shipping_amount') == 'including_tax'): ?>
                                        <div class="flex w-full justify-between gap-x-5">
                                            <p class="text-zinc-500">
                                                <?php echo app('translator')->get('shop::app.customers.account.orders.view.information.shipping-handling'); ?>
                                            </p>

                                            <p>
                                                <?php echo e(core()->formatPrice($order->shipping_amount_incl_tax, $order->order_currency_code)); ?>

                                            </p>
                                        </div>
                                    <?php elseif(core()->getConfigData('sales.taxes.sales.display_shipping_amount') == 'both'): ?>
                                        <div class="flex w-full justify-between gap-x-5">
                                            <p class="text-zinc-500">
                                                <?php echo app('translator')->get('shop::app.customers.account.orders.view.information.shipping-handling-excl-tax'); ?>
                                            </p>

                                            <p>
                                                <?php echo e(core()->formatPrice($order->shipping_amount, $order->order_currency_code)); ?>

                                            </p>
                                        </div>

                                        <div class="flex w-full justify-between gap-x-5">
                                            <p class="text-zinc-500">
                                                <?php echo app('translator')->get('shop::app.customers.account.orders.view.information.shipping-handling-incl-tax'); ?>
                                            </p>

                                            <p>
                                                <?php echo e(core()->formatPrice($order->shipping_amount_incl_tax, $order->order_currency_code)); ?>

                                            </p>
                                        </div>
                                    <?php else: ?>
                                        <div class="flex w-full justify-between gap-x-5">
                                            <p class="text-zinc-500">
                                                <?php echo app('translator')->get('shop::app.customers.account.orders.view.information.shipping-handling'); ?>
                                            </p>

                                            <p>
                                                <?php echo e(core()->formatPrice($order->shipping_amount, $order->order_currency_code)); ?>

                                            </p>
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>

                                <?php echo view_render_event('bagisto.shop.customers.account.orders.view.information.shipping.after'); ?>


                                <?php echo view_render_event('bagisto.shop.customers.account.orders.view.information.tax-amount.before'); ?>


                                <!-- Tax Informations -->
                                <div class="flex w-full justify-between gap-x-5">
                                    <p class="text-zinc-500">
                                        <?php echo app('translator')->get('shop::app.customers.account.orders.view.information.tax'); ?>
                                    </p>

                                    <p>
                                        <?php echo e(core()->formatPrice($order->tax_amount, $order->order_currency_code)); ?>

                                    </p>
                                </div>

                                <?php echo view_render_event('bagisto.shop.customers.account.orders.view.information.tax-amount.after'); ?>


                                <?php echo view_render_event('bagisto.shop.customers.account.orders.view.information.discount.before'); ?>


                                <?php if($order->base_discount_amount > 0): ?>
                                    <div class="flex w-full justify-between gap-x-5">
                                        <p class="text-zinc-500">
                                            <?php echo app('translator')->get('shop::app.customers.account.orders.view.information.discount'); ?>

                                            <?php if($order->coupon_code): ?>
                                                (<?php echo e($order->coupon_code); ?>)
                                            <?php endif; ?>
                                        </p>

                                        <p>
                                            <?php echo e(core()->formatPrice($order->discount_amount, $order->order_currency_code)); ?>

                                        </p>
                                    </div>
                                <?php endif; ?>

                                <?php echo view_render_event('bagisto.shop.customers.account.orders.view.information.discount.after'); ?>


                                <?php echo view_render_event('bagisto.shop.customers.account.orders.view.information.grand-total.before'); ?>


                                <!-- Grand Total -->
                                <div class="flex w-full justify-between gap-x-5 font-semibold">
                                    <p class="text-zinc-500">
                                        <?php echo app('translator')->get('shop::app.customers.account.orders.view.information.grand-total'); ?>
                                    </p>

                                    <p>
                                        <?php echo e(core()->formatPrice($order->grand_total, $order->order_currency_code)); ?>

                                    </p>
                                </div>

                                <?php echo view_render_event('bagisto.shop.customers.account.orders.view.information.grand-total.after'); ?>


                                <?php echo view_render_event('bagisto.shop.customers.account.orders.view.information.total-paid.before'); ?>


                                <!-- Total Paid -->
                                <div class="flex w-full justify-between gap-x-5">
                                    <p class="text-zinc-500">
                                        <?php echo app('translator')->get('shop::app.customers.account.orders.view.information.total-paid'); ?>
                                    </p>

                                    <p>
                                        <?php echo e(core()->formatPrice($order->grand_total_invoiced, $order->order_currency_code)); ?>

                                    </p>
                                </div>

                                <?php echo view_render_event('bagisto.shop.customers.account.orders.view.information.total-paid.after'); ?>


                                <?php echo view_render_event('bagisto.shop.customers.account.orders.view.information.total-refunded.before'); ?>


                                <!-- Total Refunded -->
                                <div class="flex w-full justify-between gap-x-5">
                                    <p class="text-zinc-500">
                                        <?php echo app('translator')->get('shop::app.customers.account.orders.view.information.total-refunded'); ?>
                                    </p>

                                    <p>
                                        <?php echo e(core()->formatPrice($order->grand_total_refunded, $order->order_currency_code)); ?>

                                    </p>
                                </div>

                                <?php echo view_render_event('bagisto.shop.customers.account.orders.view.information.total-refunded.after'); ?>


                                <?php echo view_render_event('bagisto.shop.customers.account.orders.view.information.total-due.before'); ?>


                                <!-- Total Due -->
                                <div class="flex w-full justify-between gap-x-5">
                                    <p class="text-zinc-500">
                                        <?php echo app('translator')->get('shop::app.customers.account.orders.view.information.total-due'); ?>
                                    </p>

                                    <p>
                                        <?php if($order->status !== \Webkul\Sales\Models\Order::STATUS_CANCELED): ?>
                                            <?php echo e(core()->formatPrice($order->total_due, $order->order_currency_code)); ?>

                                        <?php else: ?>
                                            <?php echo e(core()->formatPrice(0.00, $order->order_currency_code)); ?>

                                        <?php endif; ?>
                                    </p>
                                </div>

                                <?php echo view_render_event('bagisto.shop.customers.account.orders.view.information.total-due.after'); ?>


                            </div>
                        </div>
                    </div>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1f42c1ae3abb1d72da6c703bc82e8a90)): ?>
<?php $attributes = $__attributesOriginal1f42c1ae3abb1d72da6c703bc82e8a90; ?>
<?php unset($__attributesOriginal1f42c1ae3abb1d72da6c703bc82e8a90); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1f42c1ae3abb1d72da6c703bc82e8a90)): ?>
<?php $component = $__componentOriginal1f42c1ae3abb1d72da6c703bc82e8a90; ?>
<?php unset($__componentOriginal1f42c1ae3abb1d72da6c703bc82e8a90); ?>
<?php endif; ?>

                <!-- Invoices tab -->
                <?php if($order->invoices->count()): ?>
                    <?php if (isset($component)) { $__componentOriginal1f42c1ae3abb1d72da6c703bc82e8a90 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1f42c1ae3abb1d72da6c703bc82e8a90 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.tabs.item','data' => ['class' => 'max-md:!px-0 max-md:pb-0 max-md:pt-2','title' => trans('shop::app.customers.account.orders.view.invoices.invoices')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::tabs.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'max-md:!px-0 max-md:pb-0 max-md:pt-2','title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('shop::app.customers.account.orders.view.invoices.invoices'))]); ?>
                        <div class="flex flex-col gap-10 max-md:gap-8">
                            <?php $__currentLoopData = $order->invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <!-- For Mobile View -->
                                <div class="grid gap-4 md:hidden">
                                    <div class="rounded-lg border">
                                        <div class="grid gap-1.5 px-4 py-2.5 text-xs font-medium text-zinc-500 [&>*]:flex [&>*]:justify-between">
                                            <div class="flex justify-between">
                                                <?php echo app('translator')->get('shop::app.customers.account.orders.view.invoices.individual-invoice', ['invoice_id' => $invoice->increment_id ?? $invoice->id]); ?>

                                                <a href="<?php echo e(route('shop.customers.account.orders.print-invoice', $invoice->id)); ?>">
                                                    <div class="flex items-center gap-1 font-medium text-black">
                                                        <span class="icon-download text-sm font-semibold"></span>

                                                        <?php echo app('translator')->get('shop::app.customers.account.orders.view.invoices.print'); ?>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Item  Invoiced -->
                                    <?php if (isset($component)) { $__componentOriginald3ba50c765d00f082351f5b73fecce50 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald3ba50c765d00f082351f5b73fecce50 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.accordion.index','data' => ['isActive' => true,'class' => 'overflow-hidden rounded-lg !border-none !bg-gray-100']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::accordion'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['is-active' => true,'class' => 'overflow-hidden rounded-lg !border-none !bg-gray-100']); ?>
                                         <?php $__env->slot('header', null, ['class' => '!mb-0 rounded-t-md bg-gray-100 !px-4 py-3 text-sm font-medium max-sm:py-2']); ?> 
                                            <?php echo app('translator')->get('shop::app.customers.account.orders.view.item-invoiced'); ?>
                                         <?php $__env->endSlot(); ?>

                                         <?php $__env->slot('content', null, ['class' => 'grid gap-2.5 !bg-gray-100 !p-0']); ?> 
                                            <?php $__currentLoopData = $invoice->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="rounded-md rounded-t-none border border-t-0 bg-white px-4 py-2">
                                                    <p class="pb-2 text-sm font-medium">
                                                        <?php echo e($item->name); ?>

                                                    </p>

                                                    <?php if(isset($item->additional['attributes'])): ?>
                                                        <div>
                                                            <?php $__currentLoopData = $item->additional['attributes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <b><?php echo e($attribute['attribute_name']); ?> : </b><?php echo e($attribute['option_label']); ?><br>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>
                                                    <?php endif; ?>

                                                    <div class="grid gap-1.5 text-xs font-medium">
                                                        <!-- SKU -->
                                                        <div class="flex justify-between">
                                                            <span class="text-zinc-500">
                                                                <?php echo app('translator')->get('shop::app.customers.account.orders.view.invoices.sku'); ?>:
                                                            </span>

                                                            <span>
                                                                <?php echo e($item->getTypeInstance()->getOrderedItem($item)->sku); ?>

                                                            </span>
                                                        </div>

                                                        <!-- Price -->
                                                        <div class="flex justify-between">
                                                            <span class="text-zinc-500">
                                                                <?php echo app('translator')->get('shop::app.customers.account.orders.view.invoices.price'); ?>:
                                                            </span>

                                                            <span class="[&>*]:text-right">
                                                                <?php if(core()->getConfigData('sales.taxes.sales.display_prices') == 'including_tax'): ?>
                                                                    <?php echo e(core()->formatPrice($item->price_incl_tax, $order->order_currency_code)); ?>

                                                                <?php elseif(core()->getConfigData('sales.taxes.sales.display_prices') == 'both'): ?>
                                                                    <p>
                                                                        <?php echo e(core()->formatPrice($item->price_incl_tax, $order->order_currency_code)); ?>

                                                                    </p>

                                                                    <p class="whitespace-nowrap text-xs font-normal">
                                                                        <?php echo app('translator')->get('shop::app.customers.account.orders.view.information.excl-tax'); ?>

                                                                        <span class="font-medium">
                                                                            <?php echo e(core()->formatPrice($item->price, $order->order_currency_code)); ?>

                                                                        </span>
                                                                    </p>
                                                                <?php else: ?>
                                                                    <?php echo e(core()->formatPrice($item->price, $order->order_currency_code)); ?>

                                                                <?php endif; ?>
                                                            </span>
                                                        </div>

                                                        <!-- Quantity -->
                                                        <div class="flex justify-between">
                                                            <span class="text-zinc-500">
                                                                <?php echo app('translator')->get('shop::app.customers.account.orders.view.invoices.qty'); ?>
                                                            </span>

                                                            <span>
                                                                <?php echo e($item->qty); ?>

                                                            </span>
                                                        </div>

                                                        <!-- Sub Total -->
                                                        <div class="flex justify-between">
                                                            <span class="text-zinc-500">
                                                                <?php echo app('translator')->get('shop::app.customers.account.orders.view.invoices.subtotal'); ?>:
                                                            </span>

                                                            <span class="[&>*]:text-right">
                                                                <?php if(core()->getConfigData('sales.taxes.sales.display_prices') == 'including_tax'): ?>
                                                                    <?php echo e(core()->formatPrice($item->total_incl_tax, $order->order_currency_code)); ?>

                                                                <?php elseif(core()->getConfigData('sales.taxes.sales.display_prices') == 'both'): ?>
                                                                    <p>
                                                                        <?php echo e(core()->formatPrice($item->total_incl_tax, $order->order_currency_code)); ?>

                                                                    </p>

                                                                    <p class="whitespace-nowrap text-xs font-normal">
                                                                        <?php echo app('translator')->get('shop::app.customers.account.orders.view.invoices.excl-tax'); ?>

                                                                        <span class="font-medium">
                                                                            <?php echo e(core()->formatPrice($item->total, $order->order_currency_code)); ?>

                                                                        </span>
                                                                    </p>
                                                                <?php else: ?>
                                                                    <?php echo e(core()->formatPrice($item->total, $order->order_currency_code)); ?>

                                                                <?php endif; ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                         <?php $__env->endSlot(); ?>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald3ba50c765d00f082351f5b73fecce50)): ?>
<?php $attributes = $__attributesOriginald3ba50c765d00f082351f5b73fecce50; ?>
<?php unset($__attributesOriginald3ba50c765d00f082351f5b73fecce50); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald3ba50c765d00f082351f5b73fecce50)): ?>
<?php $component = $__componentOriginald3ba50c765d00f082351f5b73fecce50; ?>
<?php unset($__componentOriginald3ba50c765d00f082351f5b73fecce50); ?>
<?php endif; ?>

                                    <!--Summary -->
                                    <div class="w-full rounded-md bg-gray-100">
                                        <div class="rounded-t-md border-none !px-4 py-3 text-sm font-medium max-sm:py-2">
                                            <?php echo app('translator')->get('Order Summary'); ?>
                                        </div>

                                        <div class="grid gap-1.5 rounded-md rounded-t-none border border-t-0 bg-white px-4 py-3 text-xs font-medium">

                                            <?php echo view_render_event('bagisto.shop.customers.account.orders.view.invoices.subtotal.before'); ?>


                                            <?php if(core()->getConfigData('sales.taxes.sales.display_subtotal') == 'including_tax'): ?>
                                                <div class="flex w-full justify-between gap-x-5">
                                                    <p class="text-zinc-500">
                                                        <?php echo app('translator')->get('shop::app.customers.account.orders.view.invoices.subtotal'); ?>
                                                    </p>

                                                    <p>
                                                        <?php echo e(core()->formatPrice($invoice->sub_total_incl_tax, $order->order_currency_code)); ?>

                                                    </p>
                                                </div>
                                            <?php elseif(core()->getConfigData('sales.taxes.sales.display_subtotal') == 'both'): ?>
                                                <div class="flex w-full justify-between gap-x-5">
                                                    <p class="text-zinc-500">
                                                        <?php echo app('translator')->get('shop::app.customers.account.orders.view.invoices.subtotal-excl-tax'); ?>
                                                    </p>

                                                    <p>
                                                        <?php echo e(core()->formatPrice($invoice->sub_total, $order->order_currency_code)); ?>

                                                    </p>
                                                </div>
                                            <?php else: ?>
                                                <div class="flex w-full justify-between gap-x-5">
                                                    <p class="text-zinc-500">
                                                        <?php echo app('translator')->get('shop::app.customers.account.orders.view.invoices.subtotal'); ?>
                                                    </p>

                                                    <p>
                                                        <?php echo e(core()->formatPrice($invoice->sub_total, $order->order_currency_code)); ?>

                                                    </p>
                                                </div>
                                            <?php endif; ?>

                                            <?php echo view_render_event('bagisto.shop.customers.account.orders.view.invoices.subtotal.after'); ?>


                                            <?php echo view_render_event('bagisto.shop.customers.account.orders.view.invoices.shipping.before'); ?>


                                            <?php if(core()->getConfigData('sales.taxes.sales.display_shipping_amount') == 'including_tax'): ?>
                                                <div class="flex w-full justify-between gap-x-5">
                                                    <p class="text-zinc-500">
                                                        <?php echo app('translator')->get('shop::app.customers.account.orders.view.information.shipping-handling'); ?>
                                                    </p>

                                                    <p>
                                                        <?php echo e(core()->formatPrice($invoice->shipping_amount_incl_tax, $order->order_currency_code)); ?>

                                                    </p>
                                                </div>
                                            <?php elseif(core()->getConfigData('sales.taxes.sales.display_shipping_amount') == 'both'): ?>
                                                <div class="flex w-full justify-between gap-x-5">
                                                    <p class="text-zinc-500">
                                                        <?php echo app('translator')->get('shop::app.customers.account.orders.view.invoices.shipping-handling-excl-tax'); ?>
                                                    </p>

                                                    <p>
                                                        <?php echo e(core()->formatPrice($invoice->shipping_amount, $order->order_currency_code)); ?>

                                                    </p>
                                                </div>

                                                <div class="flex w-full justify-between gap-x-5">
                                                    <p class="text-zinc-500">
                                                        <?php echo app('translator')->get('shop::app.customers.account.orders.view.invoices.shipping-handling-incl-tax'); ?>
                                                    </p>

                                                    <p>
                                                        <?php echo e(core()->formatPrice($invoice->shipping_amount_incl_tax, $order->order_currency_code)); ?>

                                                    </p>
                                                </div>
                                            <?php else: ?>
                                                <div class="flex w-full justify-between gap-x-5">
                                                    <p class="text-zinc-500">
                                                        <?php echo app('translator')->get('shop::app.customers.account.orders.view.invoices.shipping-handling'); ?>
                                                    </p>

                                                    <p>
                                                        <?php echo e(core()->formatPrice($invoice->shipping_amount, $order->order_currency_code)); ?>

                                                    </p>
                                                </div>
                                            <?php endif; ?>

                                            <?php echo view_render_event('bagisto.shop.customers.account.orders.view.invoices.shipping.after'); ?>


                                            <?php echo view_render_event('bagisto.shop.customers.account.orders.view.invoices.discount.before'); ?>


                                            <?php if($invoice->base_discount_amount > 0): ?>
                                                <div class="flex w-full justify-between gap-x-5">
                                                    <p class="text-zinc-500">
                                                        <?php echo app('translator')->get('shop::app.customers.account.orders.view.invoices.discount'); ?>
                                                    </p>

                                                    <p>
                                                        <?php echo e(core()->formatPrice($invoice->discount_amount, $order->order_currency_code)); ?>

                                                    </p>
                                                </div>
                                            <?php endif; ?>

                                            <?php echo view_render_event('bagisto.shop.customers.account.orders.view.invoices.discount.after'); ?>


                                            <?php echo view_render_event('bagisto.shop.customers.account.orders.view.invoices.tax.before'); ?>


                                            <!-- Tax Amount -->
                                            <div class="flex w-full justify-between gap-x-5">
                                                <p class="text-zinc-500">
                                                    <?php echo app('translator')->get('shop::app.customers.account.orders.view.invoices.tax'); ?>
                                                </p>

                                                <p>
                                                    <?php echo e(core()->formatPrice($invoice->tax_amount, $order->order_currency_code)); ?>

                                                </p>
                                            </div>

                                            <?php echo view_render_event('bagisto.shop.customers.account.orders.view.invoices.tax.after'); ?>


                                            <?php echo view_render_event('bagisto.shop.customers.account.orders.view.invoices.grand-total.before'); ?>


                                            <!-- Grand Total -->
                                            <div class="flex w-full justify-between gap-x-5 font-semibold">
                                                <p class="text-zinc-500">
                                                    <?php echo app('translator')->get('shop::app.customers.account.orders.view.invoices.grand-total'); ?>
                                                </p>

                                                <p>
                                                    <?php echo e(core()->formatPrice($invoice->grand_total, $order->order_currency_code)); ?>

                                                </p>
                                            </div>

                                            <?php echo view_render_event('bagisto.shop.customers.account.orders.view.invoices.grand-total.after'); ?>


                                        </div>
                                    </div>
                                </div>

                                <!-- For Desktop View -->
                                <div class="max-md:hidden">
                                    <div class="flex justify-between">
                                        <label class="text-base font-medium">
                                            <?php echo app('translator')->get('shop::app.customers.account.orders.view.invoices.individual-invoice', ['invoice_id' => $invoice->increment_id ?? $invoice->id]); ?>
                                        </label>

                                        <a href="<?php echo e(route('shop.customers.account.orders.print-invoice', $invoice->id)); ?>">
                                            <div class="flex items-center gap-1 font-semibold">
                                                <span class="icon-download text-2xl"></span>

                                                <?php echo app('translator')->get('shop::app.customers.account.orders.view.invoices.print'); ?>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="relative mt-8 overflow-x-auto rounded-xl border">
                                        <table class="w-full text-left">
                                            <thead class="border-b border-zinc-200 bg-zinc-100 text-sm text-black">
                                                <tr class="[&>*]:font-medium [&>*]:px-6 [&>*]:py-4">
                                                    <th scope="col">
                                                        <?php echo app('translator')->get('shop::app.customers.account.orders.view.invoices.sku'); ?>
                                                    </th>

                                                    <th scope="col">
                                                        <?php echo app('translator')->get('shop::app.customers.account.orders.view.invoices.product-name'); ?>
                                                    </th>

                                                    <th scope="col">
                                                        <?php echo app('translator')->get('shop::app.customers.account.orders.view.invoices.price'); ?>
                                                    </th>

                                                    <th scope="col">
                                                        <?php echo app('translator')->get('shop::app.customers.account.orders.view.invoices.qty'); ?>
                                                    </th>

                                                    <th scope="col">
                                                        <?php echo app('translator')->get('shop::app.customers.account.orders.view.invoices.subtotal'); ?>
                                                    </th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php $__currentLoopData = $invoice->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr class="border-b bg-white text-black [&>*]:font-medium [&>*]:px-6 [&>*]:py-4">
                                                        <td data-value="<?php echo app('translator')->get('shop::app.customers.account.orders.view.invoices.sku'); ?>">
                                                            <?php echo e($item->getTypeInstance()->getOrderedItem($item)->sku); ?>

                                                        </td>

                                                        <td data-value="<?php echo app('translator')->get('shop::app.customers.account.orders.view.invoices.product-name'); ?>">
                                                            <?php echo e($item->name); ?>


                                                            <?php if(isset($item->additional['attributes'])): ?>
                                                                <div>
                                                                    <?php $__currentLoopData = $item->additional['attributes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <b><?php echo e($attribute['attribute_name']); ?> : </b><?php echo e($attribute['option_label']); ?><br>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </div>
                                                            <?php endif; ?>
                                                        </td>

                                                        <td
                                                            class="flex flex-col"
                                                            data-value="<?php echo app('translator')->get('shop::app.customers.account.orders.view.invoices.price'); ?>"
                                                        >
                                                            <?php if(core()->getConfigData('sales.taxes.sales.display_prices') == 'including_tax'): ?>
                                                                <?php echo e(core()->formatPrice($item->price_incl_tax, $order->order_currency_code)); ?>

                                                            <?php elseif(core()->getConfigData('sales.taxes.sales.display_prices') == 'both'): ?>
                                                                <?php echo e(core()->formatPrice($item->price_incl_tax, $order->order_currency_code)); ?>


                                                                <span class="whitespace-nowrap text-xs font-normal">
                                                                    <?php echo app('translator')->get('shop::app.customers.account.orders.view.information.excl-tax'); ?>

                                                                    <span class="font-medium">
                                                                        <?php echo e(core()->formatPrice($item->price, $order->order_currency_code)); ?>

                                                                    </span>
                                                                </span>
                                                            <?php else: ?>
                                                                <?php echo e(core()->formatPrice($item->price, $order->order_currency_code)); ?>

                                                            <?php endif; ?>
                                                        </td>

                                                        <td data-value="<?php echo app('translator')->get('shop::app.customers.account.orders.view.invoices.qty'); ?>">
                                                            <?php echo e($item->qty); ?>

                                                        </td>

                                                        <td
                                                            class="flex flex-col"
                                                            data-value="<?php echo app('translator')->get('shop::app.customers.account.orders.view.invoices.subtotal'); ?>"
                                                        >
                                                            <?php if(core()->getConfigData('sales.taxes.sales.display_prices') == 'including_tax'): ?>
                                                                <?php echo e(core()->formatPrice($item->total_incl_tax, $order->order_currency_code)); ?>

                                                            <?php elseif(core()->getConfigData('sales.taxes.sales.display_prices') == 'both'): ?>
                                                                <?php echo e(core()->formatPrice($item->total_incl_tax, $order->order_currency_code)); ?>


                                                                <span class="whitespace-nowrap text-xs font-normal">
                                                                    <?php echo app('translator')->get('shop::app.customers.account.orders.view.invoices.excl-tax'); ?>

                                                                    <span class="font-medium">
                                                                        <?php echo e(core()->formatPrice($item->total, $order->order_currency_code)); ?>

                                                                    </span>
                                                                </span>
                                                            <?php else: ?>
                                                                <?php echo e(core()->formatPrice($item->total, $order->order_currency_code)); ?>

                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- Summary -->
                                    <div class="mt-8 flex items-start gap-10 max-lg:gap-5">
                                        <div class="flex flex-auto justify-end">
                                            <div class="grid max-w-max gap-2 text-sm">

                                                <?php echo view_render_event('bagisto.shop.customers.account.orders.view.invoices.subtotal.before'); ?>


                                                <!-- Sub Total -->
                                                <?php if(core()->getConfigData('sales.taxes.sales.display_subtotal') == 'including_tax'): ?>
                                                    <div class="flex w-full justify-between gap-x-5">
                                                        <?php echo app('translator')->get('shop::app.customers.account.orders.view.invoices.subtotal'); ?>

                                                        <p>
                                                            <?php echo e(core()->formatPrice($invoice->sub_total_incl_tax, $order->order_currency_code)); ?>

                                                        </p>
                                                    </div>
                                                <?php elseif(core()->getConfigData('sales.taxes.sales.display_subtotal') == 'both'): ?>
                                                    <div class="flex w-full justify-between gap-x-5">
                                                        <?php echo app('translator')->get('shop::app.customers.account.orders.view.invoices.subtotal-excl-tax'); ?>

                                                        <p>
                                                            <?php echo e(core()->formatPrice($invoice->sub_total, $order->order_currency_code)); ?>

                                                        </p>
                                                    </div>

                                                    <div class="flex w-full justify-between gap-x-5">
                                                        <?php echo app('translator')->get('shop::app.customers.account.orders.view.invoices.subtotal-incl-tax'); ?>

                                                        <p>
                                                            <?php echo e(core()->formatPrice($invoice->sub_total_incl_tax, $order->order_currency_code)); ?>

                                                        </p>
                                                    </div>
                                                <?php else: ?>
                                                    <div class="flex w-full justify-between gap-x-5">
                                                        <?php echo app('translator')->get('shop::app.customers.account.orders.view.invoices.subtotal'); ?>

                                                        <p>
                                                            <?php echo e(core()->formatPrice($invoice->sub_total, $order->order_currency_code)); ?>

                                                        </p>
                                                    </div>
                                                <?php endif; ?>

                                                <?php echo view_render_event('bagisto.shop.customers.account.orders.view.invoices.subtotal.after'); ?>


                                                <?php echo view_render_event('bagisto.shop.customers.account.orders.view.invoices.shipping.before'); ?>


                                                <!-- Shipping -->
                                                <?php if(core()->getConfigData('sales.taxes.sales.display_shipping_amount') == 'including_tax'): ?>
                                                    <div class="flex w-full justify-between gap-x-5">
                                                        <?php echo app('translator')->get('shop::app.customers.account.orders.view.invoices.shipping-handling'); ?>

                                                        <p>
                                                            <?php echo e(core()->formatPrice($invoice->shipping_amount_incl_tax, $order->order_currency_code)); ?>

                                                        </p>
                                                    </div>
                                                <?php elseif(core()->getConfigData('sales.taxes.sales.display_shipping_amount') == 'both'): ?>
                                                    <div class="flex w-full justify-between gap-x-5">
                                                        <?php echo app('translator')->get('shop::app.customers.account.orders.view.invoices.shipping-handling-excl-tax'); ?>

                                                        <p>
                                                            <?php echo e(core()->formatPrice($invoice->shipping_amount, $order->order_currency_code)); ?>

                                                        </p>
                                                    </div>

                                                    <div class="flex w-full justify-between gap-x-5">
                                                        <?php echo app('translator')->get('shop::app.customers.account.orders.view.invoices.shipping-handling-incl-tax'); ?>

                                                        <p>
                                                            <?php echo e(core()->formatPrice($invoice->shipping_amount_incl_tax, $order->order_currency_code)); ?>

                                                        </p>
                                                    </div>
                                                <?php else: ?>
                                                    <div class="flex w-full justify-between gap-x-5">
                                                        <?php echo app('translator')->get('shop::app.customers.account.orders.view.invoices.shipping-handling'); ?>

                                                        <p>
                                                            <?php echo e(core()->formatPrice($invoice->shipping_amount, $order->order_currency_code)); ?>

                                                        </p>
                                                    </div>
                                                <?php endif; ?>

                                                <?php echo view_render_event('bagisto.shop.customers.account.orders.view.invoices.shipping.after'); ?>


                                                <?php echo view_render_event('bagisto.shop.customers.account.orders.view.invoices.discount.before'); ?>


                                                <!-- Discount Amount -->
                                                <?php if($invoice->base_discount_amount > 0): ?>
                                                    <div class="flex w-full justify-between gap-x-5">
                                                        <?php echo app('translator')->get('shop::app.customers.account.orders.view.invoices.discount'); ?>

                                                        <p>
                                                            <?php echo e(core()->formatPrice($invoice->discount_amount, $order->order_currency_code)); ?>

                                                        </p>
                                                    </div>
                                                <?php endif; ?>

                                                <?php echo view_render_event('bagisto.shop.customers.account.orders.view.invoices.discount.after'); ?>


                                                <?php echo view_render_event('bagisto.shop.customers.account.orders.view.invoices.tax-amount.before'); ?>


                                                <!-- Tax Amount -->
                                                <div class="flex w-full justify-between gap-x-5">
                                                    <?php echo app('translator')->get('shop::app.customers.account.orders.view.invoices.tax'); ?>

                                                    <p>
                                                        <?php echo e(core()->formatPrice($invoice->tax_amount, $order->order_currency_code)); ?>

                                                    </p>
                                                </div>

                                                <?php echo view_render_event('bagisto.shop.customers.account.orders.view.invoices.tax-amount.after'); ?>


                                                <?php echo view_render_event('bagisto.shop.customers.account.orders.view.invoices.grand-total.before'); ?>


                                                <!-- Grand Total -->
                                                <div class="flex w-full justify-between gap-x-5 font-semibold">
                                                    <?php echo app('translator')->get('shop::app.customers.account.orders.view.invoices.grand-total'); ?>

                                                    <p>
                                                        <?php echo e(core()->formatPrice($invoice->grand_total, $order->order_currency_code)); ?>

                                                    </p>
                                                </div>

                                                <?php echo view_render_event('bagisto.shop.customers.account.orders.view.invoices.grand-total.after'); ?>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1f42c1ae3abb1d72da6c703bc82e8a90)): ?>
<?php $attributes = $__attributesOriginal1f42c1ae3abb1d72da6c703bc82e8a90; ?>
<?php unset($__attributesOriginal1f42c1ae3abb1d72da6c703bc82e8a90); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1f42c1ae3abb1d72da6c703bc82e8a90)): ?>
<?php $component = $__componentOriginal1f42c1ae3abb1d72da6c703bc82e8a90; ?>
<?php unset($__componentOriginal1f42c1ae3abb1d72da6c703bc82e8a90); ?>
<?php endif; ?>
                <?php endif; ?>

                <!-- Shipment tab -->
                <?php if($order->shipments->count()): ?>
                    <?php if (isset($component)) { $__componentOriginal1f42c1ae3abb1d72da6c703bc82e8a90 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1f42c1ae3abb1d72da6c703bc82e8a90 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.tabs.item','data' => ['class' => 'max-md:!px-0 max-md:py-1.5','title' => ''.e(trans('shop::app.customers.account.orders.view.shipments.shipments')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::tabs.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'max-md:!px-0 max-md:py-1.5','title' => ''.e(trans('shop::app.customers.account.orders.view.shipments.shipments')).'']); ?>
                        <div class="flex flex-col gap-10 max-md:gap-8">
                            <?php $__currentLoopData = $order->shipments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shipment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <!-- For Desktop View -->
                                <div class="max-md:hidden">
                                    <div>
                                        <label class="text-base font-medium">
                                            <?php echo app('translator')->get('shop::app.customers.account.orders.view.shipments.tracking-number'); ?>
                                        </label>

                                        <span>
                                            <?php echo e($shipment->track_number); ?>

                                        </span>
                                    </div>

                                    <div class="text-base font-medium">
                                        <span>
                                            <?php echo app('translator')->get('shop::app.customers.account.orders.view.shipments.individual-shipment', ['shipment_id' => $shipment->id]); ?>
                                        </span>
                                    </div>

                                    <!-- Table of Contents -->
                                    <div class="relative mt-5 overflow-x-auto rounded-xl border max-md:hidden">
                                        <table class="w-full text-left text-sm">
                                            <thead class="border-b border-zinc-200 bg-zinc-100 text-sm text-black">
                                                <tr class="[&>*]:font-medium [&>*]:px-6 [&>*]:py-4">
                                                    <th scope="col">
                                                        <?php echo app('translator')->get('shop::app.customers.account.orders.view.shipments.sku'); ?>
                                                    </th>

                                                    <th scope="col">
                                                        <?php echo app('translator')->get('shop::app.customers.account.orders.view.shipments.product-name'); ?>
                                                    </th>

                                                    <th scope="col">
                                                        <?php echo app('translator')->get('shop::app.customers.account.orders.view.shipments.qty'); ?>
                                                    </th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php $__currentLoopData = $shipment->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr class="border-b bg-white [&>*]:font-medium [&>*]:px-6 [&>*]:py-4 [&>*]:text-black">
                                                        <td data-value="<?php echo app('translator')->get('shop::app.customers.account.orders.view.shipments.sku'); ?>">
                                                            <?php echo e($item->sku); ?>

                                                        </td>

                                                        <td data-value="<?php echo app('translator')->get('shop::app.customers.account.orders.view.shipments.product-name'); ?>">
                                                            <?php echo e($item->name); ?>


                                                            <?php if(isset($item->additional['attributes'])): ?>
                                                                <div>
                                                                    <?php $__currentLoopData = $item->additional['attributes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <b><?php echo e($attribute['attribute_name']); ?> : </b><?php echo e($attribute['option_label']); ?><br>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </div>
                                                            <?php endif; ?>
                                                        </td>

                                                        <td data-value="<?php echo app('translator')->get('shop::app.customers.account.orders.view.shipments.qty'); ?>">
                                                            <?php echo e($item->qty); ?>

                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- For Mobile view -->
                                <div class="grid gap-4 md:hidden">
                                    <div class="rounded-lg border">
                                        <div class="grid gap-1.5 px-4 py-2.5 text-xs font-medium text-zinc-500 [&>*]:flex [&>*]:justify-between">
                                            <div class="flex justify-between">
                                                <?php echo app('translator')->get('shop::app.customers.account.orders.view.shipments.tracking-number'); ?>:

                                                <span>
                                                    <?php echo e($shipment->track_number); ?>

                                                </span>
                                            </div>

                                            <?php echo app('translator')->get('shop::app.customers.account.orders.view.shipments.individual-shipment', ['shipment_id' => $shipment->id]); ?>
                                        </div>
                                    </div>

                                    <?php if (isset($component)) { $__componentOriginald3ba50c765d00f082351f5b73fecce50 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald3ba50c765d00f082351f5b73fecce50 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.accordion.index','data' => ['isActive' => true,'class' => 'overflow-hidden rounded-lg !border-none !bg-gray-100']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::accordion'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['is-active' => true,'class' => 'overflow-hidden rounded-lg !border-none !bg-gray-100']); ?>
                                         <?php $__env->slot('header', null, ['class' => '!mb-0 rounded-t-md bg-gray-100 !px-4 py-3 text-sm font-medium max-sm:py-2']); ?> 
                                            <?php echo app('translator')->get('shop::app.customers.account.orders.view.item-shipped'); ?>
                                         <?php $__env->endSlot(); ?>

                                         <?php $__env->slot('content', null, ['class' => 'grid gap-2.5 !bg-gray-100 !p-0']); ?> 
                                            <?php $__currentLoopData = $shipment->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="rounded-md rounded-t-none border border-t-0 bg-white px-4 py-2">
                                                    <p class="pb-2 text-sm font-medium">
                                                        <?php echo e($item->name); ?>

                                                    </p>

                                                    <div class="grid gap-1.5 text-xs font-medium">
                                                        <!-- SKU -->
                                                        <div class="flex justify-between">
                                                            <span class="text-zinc-500">
                                                                <?php echo app('translator')->get('shop::app.customers.account.orders.view.shipments.sku'); ?>:
                                                            </span>

                                                            <span>
                                                                <?php echo e($item->sku); ?>

                                                            </span>
                                                        </div>

                                                        <!-- Quantity -->
                                                        <div class="flex justify-between">
                                                            <span class="text-zinc-500">
                                                                <?php echo app('translator')->get('shop::app.customers.account.orders.view.shipments.qty'); ?>:
                                                            </span>

                                                            <span><?php echo e($item->qty); ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                         <?php $__env->endSlot(); ?>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald3ba50c765d00f082351f5b73fecce50)): ?>
<?php $attributes = $__attributesOriginald3ba50c765d00f082351f5b73fecce50; ?>
<?php unset($__attributesOriginald3ba50c765d00f082351f5b73fecce50); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald3ba50c765d00f082351f5b73fecce50)): ?>
<?php $component = $__componentOriginald3ba50c765d00f082351f5b73fecce50; ?>
<?php unset($__componentOriginald3ba50c765d00f082351f5b73fecce50); ?>
<?php endif; ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1f42c1ae3abb1d72da6c703bc82e8a90)): ?>
<?php $attributes = $__attributesOriginal1f42c1ae3abb1d72da6c703bc82e8a90; ?>
<?php unset($__attributesOriginal1f42c1ae3abb1d72da6c703bc82e8a90); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1f42c1ae3abb1d72da6c703bc82e8a90)): ?>
<?php $component = $__componentOriginal1f42c1ae3abb1d72da6c703bc82e8a90; ?>
<?php unset($__componentOriginal1f42c1ae3abb1d72da6c703bc82e8a90); ?>
<?php endif; ?>
                <?php endif; ?>

                <!-- Refund Tab -->
                <?php if($order->refunds->count()): ?>
                    <?php if (isset($component)) { $__componentOriginal1f42c1ae3abb1d72da6c703bc82e8a90 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1f42c1ae3abb1d72da6c703bc82e8a90 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.tabs.item','data' => ['class' => 'max-md:!px-0 max-md:py-1.5','title' => trans('shop::app.customers.account.orders.view.refunds.refunds')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::tabs.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'max-md:!px-0 max-md:py-1.5','title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('shop::app.customers.account.orders.view.refunds.refunds'))]); ?>
                        <?php $__currentLoopData = $order->refunds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $refund): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <!-- For Desktop View -->
                            <div class="max-md:hidden">
                                <div class="text-base font-medium">
                                    <span>
                                        <?php echo app('translator')->get('shop::app.customers.account.orders.view.refunds.individual-refund', ['refund_id' => $refund->id]); ?>
                                    </span>
                                </div>

                                <div class="relative mt-8 overflow-x-auto rounded-xl border">
                                    <table class="w-full text-left text-sm">
                                        <thead class="border-b border-zinc-200 bg-zinc-100 text-sm text-black">
                                            <tr class="[&>*]:font-medium [&>*]:px-6 [&>*]:py-4">
                                                <th scope="col">
                                                    <?php echo app('translator')->get('shop::app.customers.account.orders.view.refunds.sku'); ?>
                                                </th>

                                                <th scope="col">
                                                    <?php echo app('translator')->get('shop::app.customers.account.orders.view.refunds.product-name'); ?>
                                                </th>

                                                <th scope="col">
                                                    <?php echo app('translator')->get('shop::app.customers.account.orders.view.refunds.price'); ?>
                                                </th>

                                                <th scope="col">
                                                    <?php echo app('translator')->get('shop::app.customers.account.orders.view.refunds.qty'); ?>
                                                </th>

                                                <th scope="col">
                                                    <?php echo app('translator')->get('shop::app.customers.account.orders.view.refunds.subtotal'); ?>
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $__currentLoopData = $refund->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr class="border-b bg-white [&>*]:font-medium [&>*]:px-6 [&>*]:py-4 [&>*]:text-black">
                                                    <td data-value="<?php echo app('translator')->get('shop::app.customers.account.orders.view.refunds.sku'); ?>">
                                                        <?php echo e($item->child ? $item->child->sku : $item->sku); ?>

                                                    </td>

                                                    <td data-value="<?php echo app('translator')->get('shop::app.customers.account.orders.view.refunds.product-name'); ?>">
                                                        <?php echo e($item->name); ?>


                                                        <?php if(isset($item->additional['attributes'])): ?>
                                                            <div>
                                                                <?php $__currentLoopData = $item->additional['attributes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <b><?php echo e($attribute['attribute_name']); ?> : </b><?php echo e($attribute['option_label']); ?><br>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    </td>

                                                    <td
                                                        class="flex flex-col"
                                                        data-value="<?php echo app('translator')->get('shop::app.customers.account.orders.view.refunds.price'); ?>"
                                                    >
                                                        <?php if(core()->getConfigData('sales.taxes.sales.display_prices') == 'including_tax'): ?>
                                                            <?php echo e(core()->formatPrice($item->price_incl_tax, $order->order_currency_code)); ?>

                                                        <?php elseif(core()->getConfigData('sales.taxes.sales.display_prices') == 'both'): ?>
                                                            <?php echo e(core()->formatPrice($item->price_incl_tax, $order->order_currency_code)); ?>


                                                            <span class="whitespace-nowrap text-xs font-normal">
                                                                <?php echo app('translator')->get('shop::app.customers.account.orders.view.information.excl-tax'); ?>

                                                                <span class="font-medium">
                                                                    <?php echo e(core()->formatPrice($item->price, $order->order_currency_code)); ?>

                                                                </span>
                                                            </span>
                                                        <?php else: ?>
                                                            <?php echo e(core()->formatPrice($item->price, $order->order_currency_code)); ?>

                                                        <?php endif; ?>
                                                    </td>

                                                    <td data-value="<?php echo app('translator')->get('shop::app.customers.account.orders.view.refunds.qty'); ?>">
                                                        <?php echo e($item->qty); ?>

                                                    </td>

                                                    <td
                                                        class="flex flex-col"
                                                        data-value="<?php echo app('translator')->get('shop::app.customers.account.orders.view.refunds.subtotal'); ?>"
                                                    >
                                                        <?php if(core()->getConfigData('sales.taxes.sales.display_prices') == 'including_tax'): ?>
                                                            <?php echo e(core()->formatPrice($item->total_incl_tax, $order->order_currency_code)); ?>

                                                        <?php elseif(core()->getConfigData('sales.taxes.sales.display_prices') == 'both'): ?>
                                                            <?php echo e(core()->formatPrice($item->total_incl_tax, $order->order_currency_code)); ?>


                                                            <span class="whitespace-nowrap text-xs font-normal">
                                                                <?php echo app('translator')->get('shop::app.customers.account.orders.view.information.excl-tax'); ?>

                                                                <span class="font-medium">
                                                                    <?php echo e(core()->formatPrice($item->total, $order->order_currency_code)); ?>

                                                                </span>
                                                            </span>
                                                        <?php else: ?>
                                                            <?php echo e(core()->formatPrice($item->total, $order->order_currency_code)); ?>

                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            <?php if(! $refund->items->count()): ?>
                                                <tr>
                                                    <td><?php echo app('translator')->get('shop::app.customers.account.orders.view.refunds.no-result-found'); ?></td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- For Mobile View -->
                            <div class="grid gap-4 md:hidden">
                                <div class="rounded-lg border">
                                    <div class="grid gap-1.5 px-4 py-2.5 text-xs font-medium text-zinc-500 [&>*]:flex [&>*]:justify-between">
                                        <?php echo app('translator')->get('shop::app.customers.account.orders.view.refunds.individual-refund', ['refund_id' => $refund->id]); ?>
                                    </div>
                                </div>

                                <?php if (isset($component)) { $__componentOriginald3ba50c765d00f082351f5b73fecce50 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald3ba50c765d00f082351f5b73fecce50 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.accordion.index','data' => ['isActive' => true,'class' => 'overflow-hidden rounded-lg !border-none !bg-gray-100']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::accordion'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['is-active' => true,'class' => 'overflow-hidden rounded-lg !border-none !bg-gray-100']); ?>
                                     <?php $__env->slot('header', null, ['class' => '!mb-0 rounded-t-md bg-gray-100 !px-4 py-3 text-sm font-medium max-sm:py-2']); ?> 
                                        <?php echo app('translator')->get('shop::app.customers.account.orders.view.item-refunded'); ?>
                                     <?php $__env->endSlot(); ?>

                                     <?php $__env->slot('content', null, ['class' => 'grid gap-2.5 !bg-gray-100 !p-0']); ?> 
                                        <?php $__currentLoopData = $invoice->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="rounded-md rounded-t-none border border-t-0 bg-white px-4 py-2">
                                                <p class="pb-2 text-sm font-medium">
                                                    <?php echo e($item->name); ?>

                                                </p>

                                                <div class="grid gap-1.5 text-xs font-medium">
                                                    <!-- SKU -->
                                                    <div class="flex justify-between">
                                                        <span class="text-zinc-500">
                                                            <?php echo app('translator')->get('shop::app.customers.account.orders.view.refunds.sku'); ?>:
                                                        </span>

                                                        <span>
                                                            <?php echo e($item->child ? $item->child->sku : $item->sku); ?>

                                                        </span>
                                                    </div>

                                                    <!-- Price -->
                                                    <div class="flex justify-between">
                                                        <span class="text-zinc-500">
                                                            <?php echo app('translator')->get('shop::app.customers.account.orders.view.refunds.price'); ?>:
                                                        </span>

                                                        <span class="[&>*]:text-right">
                                                            <?php if(core()->getConfigData('sales.taxes.sales.display_prices') == 'including_tax'): ?>
                                                                <?php echo e(core()->formatPrice($item->price_incl_tax, $order->order_currency_code)); ?>

                                                            <?php elseif(core()->getConfigData('sales.taxes.sales.display_prices') == 'both'): ?>
                                                                <p>
                                                                    <?php echo e(core()->formatPrice($item->price_incl_tax, $order->order_currency_code)); ?>

                                                                </p>

                                                                <p class="whitespace-nowrap text-xs font-normal">
                                                                    <?php echo app('translator')->get('shop::app.customers.account.orders.view.information.excl-tax'); ?>

                                                                    <span class="font-medium">
                                                                        <?php echo e(core()->formatPrice($item->price, $order->order_currency_code)); ?>

                                                                    </span>
                                                                </p>
                                                            <?php else: ?>
                                                                <?php echo e(core()->formatPrice($item->price, $order->order_currency_code)); ?>

                                                            <?php endif; ?>
                                                        </span>
                                                    </div>

                                                    <!-- Quantity -->
                                                    <div class="flex justify-between">
                                                        <span class="text-zinc-500">
                                                            <?php echo app('translator')->get('shop::app.customers.account.orders.view.refunds.qty'); ?>
                                                        </span>

                                                        <span>
                                                            <?php echo e($item->qty); ?>

                                                        </span>
                                                    </div>

                                                    <!-- Sub Total -->
                                                    <div class="flex justify-between">
                                                        <span class="text-zinc-500">
                                                            <?php echo app('translator')->get('shop::app.customers.account.orders.view.refunds.subtotal'); ?>:
                                                        </span>

                                                        <span class="[&>*]:text-right">
                                                            <?php if(core()->getConfigData('sales.taxes.sales.display_prices') == 'including_tax'): ?>
                                                                <?php echo e(core()->formatPrice($item->total_incl_tax, $order->order_currency_code)); ?>

                                                            <?php elseif(core()->getConfigData('sales.taxes.sales.display_prices') == 'both'): ?>
                                                                <p>
                                                                    <?php echo e(core()->formatPrice($item->total_incl_tax, $order->order_currency_code)); ?>

                                                                </p>

                                                                <p class="whitespace-nowrap text-xs font-normal">
                                                                    <?php echo app('translator')->get('shop::app.customers.account.orders.view.information.excl-tax'); ?>

                                                                    <span class="font-medium">
                                                                        <?php echo e(core()->formatPrice($item->total, $order->order_currency_code)); ?>

                                                                    </span>
                                                                </p>
                                                            <?php else: ?>
                                                                <?php echo e(core()->formatPrice($item->total, $order->order_currency_code)); ?>

                                                            <?php endif; ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                     <?php $__env->endSlot(); ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald3ba50c765d00f082351f5b73fecce50)): ?>
<?php $attributes = $__attributesOriginald3ba50c765d00f082351f5b73fecce50; ?>
<?php unset($__attributesOriginald3ba50c765d00f082351f5b73fecce50); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald3ba50c765d00f082351f5b73fecce50)): ?>
<?php $component = $__componentOriginald3ba50c765d00f082351f5b73fecce50; ?>
<?php unset($__componentOriginald3ba50c765d00f082351f5b73fecce50); ?>
<?php endif; ?>

                                <!-- Summary -->
                                <div class="w-full rounded-md bg-gray-100">
                                    <div class="rounded-t-md border-none !px-4 py-3 text-sm font-medium max-sm:py-2">
                                        <?php echo app('translator')->get('shop::app.customers.account.orders.view.refunds.order-summary'); ?>
                                    </div>

                                    <div class="grid gap-1.5 rounded-md rounded-t-none border border-t-0 bg-white px-4 py-3 text-xs font-medium">

                                        <?php echo view_render_event('bagisto.shop.customers.account.orders.view.refunds.subtotal.before'); ?>


                                        <?php if(core()->getConfigData('sales.taxes.sales.display_subtotal') == 'including_tax'): ?>
                                            <div class="flex w-full justify-between gap-x-5">
                                                <p class="text-zinc-500">
                                                    <?php echo app('translator')->get('shop::app.customers.account.orders.view.refunds.subtotal'); ?>
                                                </p>

                                                <p>
                                                    <?php echo e(core()->formatPrice($refund->sub_total_incl_tax, $order->order_currency_code)); ?>

                                                </p>
                                            </div>
                                        <?php elseif(core()->getConfigData('sales.taxes.sales.display_subtotal') == 'both'): ?>
                                            <div class="flex w-full justify-between gap-x-5">
                                                <p class="text-zinc-500">
                                                    <?php echo app('translator')->get('shop::app.customers.account.orders.view.refunds.subtotal-excl-tax'); ?>
                                                </p>

                                                <p>
                                                    <?php echo e(core()->formatPrice($refund->sub_total, $order->order_currency_code)); ?>

                                                </p>
                                            </div>

                                            <div class="flex w-full justify-between gap-x-5">
                                                <p class="text-zinc-500">

                                                    <?php echo app('translator')->get('shop::app.customers.account.orders.view.refunds.subtotal-incl-tax'); ?>
                                                </p>

                                                <p>
                                                    <?php echo e(core()->formatPrice($refund->sub_total_incl_tax, $order->order_currency_code)); ?>

                                                </p>
                                            </div>
                                        <?php else: ?>
                                            <div class="flex w-full justify-between gap-x-5">
                                                <p class="text-zinc-500">
                                                    <?php echo app('translator')->get('shop::app.customers.account.orders.view.refunds.subtotal'); ?>
                                                </p>

                                                <p>
                                                    <?php echo e(core()->formatPrice($refund->sub_total, $order->order_currency_code)); ?>

                                                </p>
                                            </div>
                                        <?php endif; ?>

                                        <?php echo view_render_event('bagisto.shop.customers.account.orders.view.refunds.subtotal.after'); ?>


                                        <?php echo view_render_event('bagisto.shop.customers.account.orders.view.refunds.shipping.before'); ?>


                                        <?php if(core()->getConfigData('sales.taxes.sales.display_shipping_amount') == 'including_tax'): ?>
                                            <div class="flex w-full justify-between gap-x-5">
                                                <p class="text-zinc-500">
                                                    <?php echo app('translator')->get('shop::app.customers.account.orders.view.refunds.shipping-handling'); ?>
                                                </p>

                                                <p>
                                                    <?php echo e(core()->formatPrice($refund->shipping_amount_incl_tax, $order->order_currency_code)); ?>

                                                </p>
                                            </div>
                                        <?php elseif(core()->getConfigData('sales.taxes.sales.display_shipping_amount') == 'both'): ?>
                                            <div class="flex w-full justify-between gap-x-5">
                                                <p class="text-zinc-500">
                                                    <?php echo app('translator')->get('shop::app.customers.account.orders.view.refunds.shipping-handling-excl-tax'); ?>
                                                </p>

                                                <p>
                                                    <?php echo e(core()->formatPrice($refund->shipping_amount, $order->order_currency_code)); ?>

                                                </p>
                                            </div>

                                            <div class="flex w-full justify-between gap-x-5">
                                                <p class="text-zinc-500">
                                                    <?php echo app('translator')->get('shop::app.customers.account.orders.view.refunds.shipping-handling-incl-tax'); ?>
                                                </p>

                                                <p>
                                                    <?php echo e(core()->formatPrice($refund->shipping_amount_incl_tax, $order->order_currency_code)); ?>

                                                </p>
                                            </div>
                                        <?php else: ?>
                                            <div class="flex w-full justify-between gap-x-5">
                                                <p class="text-zinc-500">
                                                    <?php echo app('translator')->get('shop::app.customers.account.orders.view.refunds.shipping-handling'); ?>
                                                </p>

                                                <p>
                                                    <?php echo e(core()->formatPrice($refund->shipping_amount, $order->order_currency_code)); ?>

                                                </p>
                                            </div>
                                        <?php endif; ?>

                                        <?php echo view_render_event('bagisto.shop.customers.account.orders.view.refunds.shipping.after'); ?>


                                        <?php echo view_render_event('bagisto.shop.customers.account.orders.view.refunds.discount.before'); ?>


                                        <!-- Discount -->
                                        <?php if($refund->discount_amount > 0): ?>
                                            <div class="flex w-full justify-between gap-x-5">
                                                <?php echo app('translator')->get('shop::app.customers.account.orders.view.refunds.discount'); ?>

                                                <p>
                                                    <?php echo e(core()->formatPrice($order->discount_amount, $order->order_currency_code)); ?>

                                                </p>
                                            </div>
                                        <?php endif; ?>

                                        <?php echo view_render_event('bagisto.shop.customers.account.orders.view.refunds.discount.after'); ?>


                                        <?php echo view_render_event('bagisto.shop.customers.account.orders.view.refunds.tax-amount.before'); ?>


                                        <!-- Tax Amount -->
                                        <?php if($refund->tax_amount > 0): ?>
                                            <div class="flex w-full justify-between gap-x-5">
                                                <p class="text-zinc-500">
                                                    <?php echo app('translator')->get('shop::app.customers.account.orders.view.refunds.tax'); ?>
                                                </p>

                                                <p>
                                                    <?php echo e(core()->formatPrice($refund->tax_amount, $order->order_currency_code)); ?>

                                                </p>
                                            </div>
                                        <?php endif; ?>

                                        <?php echo view_render_event('bagisto.shop.customers.account.orders.view.refunds.tax-amount.after'); ?>


                                        <?php echo view_render_event('bagisto.shop.customers.account.orders.view.refunds.adjustment-refund.before'); ?>


                                        <!-- Adjustments Refund -->
                                        <div class="flex w-full justify-between gap-x-5">
                                            <p class="text-zinc-500">
                                                <?php echo app('translator')->get('shop::app.customers.account.orders.view.refunds.adjustment-refund'); ?>
                                            </p>

                                            <p>
                                                <?php echo e(core()->formatPrice($refund->adjustment_refund, $order->order_currency_code)); ?>

                                            </p>
                                        </div>

                                        <?php echo view_render_event('bagisto.shop.customers.account.orders.view.refunds.adjustment-refund.after'); ?>


                                        <?php echo view_render_event('bagisto.shop.customers.account.orders.view.refunds.adjustment-fee.before'); ?>


                                        <!-- Adjustment fee -->
                                        <div class="flex w-full justify-between gap-x-5">
                                            <p class="text-zinc-500">
                                                <?php echo app('translator')->get('shop::app.customers.account.orders.view.refunds.adjustment-fee'); ?>
                                            </p>

                                            <p>
                                                <?php echo e(core()->formatPrice($refund->adjustment_fee, $order->order_currency_code)); ?>

                                            </p>
                                        </div>

                                        <?php echo view_render_event('bagisto.shop.customers.account.orders.view.refunds.adjustment-fee.after'); ?>


                                        <?php echo view_render_event('bagisto.shop.customers.account.orders.view.refunds.grand-total.before'); ?>


                                        <!-- Grand Total -->
                                        <div class="flex w-full justify-between gap-x-5 font-semibold">
                                            <p class="text-zinc-500">
                                                <?php echo app('translator')->get('shop::app.customers.account.orders.view.refunds.grand-total'); ?>
                                            </p>

                                            <p>
                                                <?php echo e(core()->formatPrice($refund->grand_total, $order->order_currency_code)); ?>

                                            </p>
                                        </div>

                                        <?php echo view_render_event('bagisto.shop.customers.account.orders.view.refunds.grand-total.after'); ?>


                                    </div>
                                </div>
                            </div>

                            <!-- Summary -->
                            <div class="mt-8 flex items-start gap-10 max-lg:gap-5 max-md:hidden">
                                <div class="flex flex-auto justify-end">
                                    <div class="grid max-w-max gap-2 text-sm">

                                        <?php echo view_render_event('bagisto.shop.customers.account.orders.view.refunds.subtotal.before'); ?>


                                        <!-- Sub Total -->
                                        <?php if(core()->getConfigData('sales.taxes.sales.display_subtotal') == 'including_tax'): ?>
                                            <div class="flex w-full justify-between gap-x-5 text-sm">
                                                <?php echo app('translator')->get('shop::app.customers.account.orders.view.refunds.subtotal'); ?>

                                                <p>
                                                    <?php echo e(core()->formatPrice($refund->sub_total_incl_tax, $order->order_currency_code)); ?>

                                                </p>
                                            </div>
                                        <?php elseif(core()->getConfigData('sales.taxes.sales.display_subtotal') == 'both'): ?>
                                            <div class="flex w-full justify-between gap-x-5 text-sm">
                                                <?php echo app('translator')->get('shop::app.customers.account.orders.view.refunds.subtotal-excl-tax'); ?>

                                                <p>
                                                    <?php echo e(core()->formatPrice($refund->sub_total, $order->order_currency_code)); ?>

                                                </p>
                                            </div>

                                            <div class="flex w-full justify-between gap-x-5 text-sm">
                                                <?php echo app('translator')->get('shop::app.customers.account.orders.view.refunds.subtotal-incl-tax'); ?>

                                                <p>
                                                    <?php echo e(core()->formatPrice($refund->sub_total_incl_tax, $order->order_currency_code)); ?>

                                                </p>
                                            </div>
                                        <?php else: ?>
                                            <div class="flex w-full justify-between gap-x-5 text-sm">
                                                <?php echo app('translator')->get('shop::app.customers.account.orders.view.refunds.subtotal'); ?>

                                                <p>
                                                    <?php echo e(core()->formatPrice($refund->sub_total, $order->order_currency_code)); ?>

                                                </p>
                                            </div>
                                        <?php endif; ?>

                                        <?php echo view_render_event('bagisto.shop.customers.account.orders.view.refunds.subtotal.after'); ?>


                                        <?php echo view_render_event('bagisto.shop.customers.account.orders.view.refunds.shipping.before'); ?>


                                        <!-- Shipping And Handling -->
                                        <?php if(core()->getConfigData('sales.taxes.sales.display_shipping_amount') == 'including_tax'): ?>
                                            <div class="flex w-full justify-between gap-x-5">
                                                <?php echo app('translator')->get('shop::app.customers.account.orders.view.refunds.shipping-handling'); ?>

                                                <p>
                                                    <?php echo e(core()->formatPrice($refund->shipping_amount_incl_tax, $order->order_currency_code)); ?>

                                                </p>
                                            </div>
                                        <?php elseif(core()->getConfigData('sales.taxes.sales.display_shipping_amount') == 'both'): ?>
                                            <div class="flex w-full justify-between gap-x-5">
                                                <?php echo app('translator')->get('shop::app.customers.account.orders.view.refunds.shipping-handling-excl-tax'); ?>

                                                <p>
                                                    <?php echo e(core()->formatPrice($refund->shipping_amount, $order->order_currency_code)); ?>

                                                </p>
                                            </div>

                                            <div class="flex w-full justify-between gap-x-5">
                                                <?php echo app('translator')->get('shop::app.customers.account.orders.view.refunds.shipping-handling-incl-tax'); ?>

                                                <p>
                                                    <?php echo e(core()->formatPrice($refund->shipping_amount_incl_tax, $order->order_currency_code)); ?>

                                                </p>
                                            </div>
                                        <?php else: ?>
                                            <div class="flex w-full justify-between gap-x-5">
                                                <?php echo app('translator')->get('shop::app.customers.account.orders.view.refunds.shipping-handling'); ?>

                                                <p>
                                                    <?php echo e(core()->formatPrice($refund->shipping_amount, $order->order_currency_code)); ?>

                                                </p>
                                            </div>
                                        <?php endif; ?>

                                        <?php echo view_render_event('bagisto.shop.customers.account.orders.view.refunds.shipping.after'); ?>


                                        <?php echo view_render_event('bagisto.shop.customers.account.orders.view.refunds.discount.before'); ?>


                                        <!-- Discount -->
                                        <?php if($refund->discount_amount > 0): ?>
                                            <div class="flex w-full justify-between gap-x-5">
                                                <?php echo app('translator')->get('shop::app.customers.account.orders.view.refunds.discount'); ?>

                                                <p>
                                                    <?php echo e(core()->formatPrice($order->discount_amount, $order->order_currency_code)); ?>

                                                </p>
                                            </div>
                                        <?php endif; ?>

                                        <?php echo view_render_event('bagisto.shop.customers.account.orders.view.refunds.discount.after'); ?>


                                        <?php echo view_render_event('bagisto.shop.customers.account.orders.view.refunds.tax-amount.before'); ?>


                                        <!-- Tax Amount -->
                                        <?php if($refund->tax_amount > 0): ?>
                                            <div class="flex w-full justify-between gap-x-5">
                                                <?php echo app('translator')->get('shop::app.customers.account.orders.view.refunds.tax'); ?>

                                                <p>
                                                    <?php echo e(core()->formatPrice($refund->tax_amount, $order->order_currency_code)); ?>

                                                </p>
                                            </div>
                                        <?php endif; ?>

                                        <?php echo view_render_event('bagisto.shop.customers.account.orders.view.refunds.tax-amount.after'); ?>


                                        <?php echo view_render_event('bagisto.shop.customers.account.orders.view.refunds.adjustment-refund.before'); ?>


                                        <!-- Adjustments Refund -->
                                        <div class="flex w-full justify-between gap-x-5">
                                            <?php echo app('translator')->get('shop::app.customers.account.orders.view.refunds.adjustment-refund'); ?>

                                            <p>
                                                <?php echo e(core()->formatPrice($refund->adjustment_refund, $order->order_currency_code)); ?>

                                            </p>
                                        </div>

                                        <?php echo view_render_event('bagisto.shop.customers.account.orders.view.refunds.adjustment-refund.after'); ?>


                                        <?php echo view_render_event('bagisto.shop.customers.account.orders.view.refunds.adjustment-fee.before'); ?>


                                        <!-- Adjustment fee -->
                                        <div class="flex w-full justify-between gap-x-5">
                                            <?php echo app('translator')->get('shop::app.customers.account.orders.view.refunds.adjustment-fee'); ?>

                                            <p>
                                                <?php echo e(core()->formatPrice($refund->adjustment_fee, $order->order_currency_code)); ?>

                                            </p>
                                        </div>

                                        <?php echo view_render_event('bagisto.shop.customers.account.orders.view.refunds.adjustment-fee.after'); ?>


                                        <?php echo view_render_event('bagisto.shop.customers.account.orders.view.refunds.grand-total.before'); ?>


                                        <!-- Grand Total -->
                                        <div class="flex w-full justify-between gap-x-5 font-semibold">
                                            <?php echo app('translator')->get('shop::app.customers.account.orders.view.refunds.grand-total'); ?>

                                            <p>
                                                <?php echo e(core()->formatPrice($refund->grand_total, $order->order_currency_code)); ?>

                                            </p>
                                        </div>

                                        <?php echo view_render_event('bagisto.shop.customers.account.orders.view.refunds.grand-total.after'); ?>


                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1f42c1ae3abb1d72da6c703bc82e8a90)): ?>
<?php $attributes = $__attributesOriginal1f42c1ae3abb1d72da6c703bc82e8a90; ?>
<?php unset($__attributesOriginal1f42c1ae3abb1d72da6c703bc82e8a90); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1f42c1ae3abb1d72da6c703bc82e8a90)): ?>
<?php $component = $__componentOriginal1f42c1ae3abb1d72da6c703bc82e8a90; ?>
<?php unset($__componentOriginal1f42c1ae3abb1d72da6c703bc82e8a90); ?>
<?php endif; ?>
                <?php endif; ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfc60bb615bed00622a91d98d31176f33)): ?>
<?php $attributes = $__attributesOriginalfc60bb615bed00622a91d98d31176f33; ?>
<?php unset($__attributesOriginalfc60bb615bed00622a91d98d31176f33); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfc60bb615bed00622a91d98d31176f33)): ?>
<?php $component = $__componentOriginalfc60bb615bed00622a91d98d31176f33; ?>
<?php unset($__componentOriginalfc60bb615bed00622a91d98d31176f33); ?>
<?php endif; ?>

            <!-- Shipping Address and Payment methods for mobile view -->
            <div class="w-full rounded-md bg-gray-100 md:hidden">
                <div class="rounded-t-md border-none !px-4 py-3 text-sm font-medium max-sm:py-2">
                    <?php echo app('translator')->get('shop::app.customers.account.orders.view.shipping-and-payment'); ?>
                </div>

                <div class="grid gap-1.5 rounded-md rounded-t-none border border-t-0 bg-white px-4 py-3 text-xs font-medium">
                    <!-- Shipping Address -->
                    <?php if($order->shipping_address): ?>
                        <div class="text-sm font-medium text-zinc-500">
                            <?php echo app('translator')->get('shop::app.customers.account.orders.view.shipping-address'); ?>

                            <div class="mt-1 grid gap-2 text-xs text-black">
                                <div class="grid gap-2.5 max-md:gap-0">
                                    <?php echo $__env->make('shop::customers.account.orders.view.address', ['address' => $order->shipping_address], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                </div>

                                <?php echo view_render_event('bagisto.shop.customers.account.orders.view.shipping_address_details.after', ['order' => $order]); ?>

                            </div>

                            <?php echo view_render_event('bagisto.shop.customers.account.orders.view.shipping_address.after', ['order' => $order]); ?>


                        </div>
                    <?php endif; ?>

                    <!-- Billing Address -->
                    <?php if($order->billing_address): ?>
                        <div class="text-sm font-medium text-zinc-500">
                            <?php echo app('translator')->get('shop::app.customers.account.orders.view.billing-address'); ?>

                            <div class="mt-1 grid gap-2 text-xs text-gray-800">
                                <div class="grid gap-2.5 max-md:gap-0">
                                    <?php echo $__env->make('shop::customers.account.orders.view.address', ['address' => $order->billing_address], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                </div>

                                <?php echo view_render_event('bagisto.shop.customers.account.orders.view.billing_address_details.after', ['order' => $order]); ?>


                            </div>

                            <?php echo view_render_event('bagisto.shop.customers.account.orders.view.billing_address.after', ['order' => $order]); ?>


                        </div>
                    <?php endif; ?>

                    <!-- Shipping Method -->
                    <?php if($order->shipping_address): ?>
                        <div class="text-sm font-medium text-zinc-500">
                            <?php echo app('translator')->get('shop::app.customers.account.orders.view.shipping-method'); ?>

                            <div class="mt-1 grid gap-2.5 text-xs text-gray-800">
                                <?php echo e($order->shipping_title); ?>


                                <?php echo view_render_event('bagisto.shop.customers.account.orders.view.shipping_method_details.after', ['order' => $order]); ?>

                            </div>

                            <?php echo view_render_event('bagisto.shop.customers.account.orders.view.shipping_method.after', ['order' => $order]); ?>


                        </div>
                    <?php endif; ?>

                    <!-- Payment Method -->
                    <div class="text-sm font-medium text-zinc-500">
                        <?php echo app('translator')->get('shop::app.customers.account.orders.view.payment-method'); ?>

                        <div class="mt-1 grid gap-2.5 text-xs text-black">
                            <?php echo e(core()->getConfigData('sales.payment_methods.' . $order->payment->method . '.title')); ?>


                            <?php if(! empty($additionalDetails)): ?>
                                <div class="instructions">
                                    <label><?php echo e($additionalDetails['title']); ?></label>
                                </div>
                            <?php endif; ?>

                            <?php echo view_render_event('bagisto.shop.customers.account.orders.view.payment_method_details.after', ['order' => $order]); ?>


                        </div>

                        <?php echo view_render_event('bagisto.shop.customers.account.orders.view.payment_method.after', ['order' => $order]); ?>

                    </div>
                </div>
            </div>

            <!-- Desktop View -->
            <div class="mt-11 flex flex-wrap justify-between gap-x-11 gap-y-8 border-t border-zinc-200 pt-7 max-md:hidden">
                <!-- Billing Address -->
                <?php if($order->billing_address): ?>
                    <div class="grid max-w-[200px] gap-4 max-868:w-full max-868:max-w-full max-md:max-w-full max-md:gap-2">
                        <p class="text-base text-zinc-500 max-md:text-lg max-md:text-black">
                            <?php echo app('translator')->get('shop::app.customers.account.orders.view.billing-address'); ?>
                        </p>

                        <div class="grid gap-2.5 max-md:gap-0">
                            <p class="text-sm">
                                <?php echo $__env->make('shop::customers.account.orders.view.address', ['address' => $order->billing_address], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                            </p>
                        </div>

                        <?php echo view_render_event('bagisto.shop.customers.account.orders.view.billing_address_details.after', ['order' => $order]); ?>

                    </div>

                <?php echo view_render_event('bagisto.shop.customers.account.orders.view.billing_address.after', ['order' => $order]); ?>


                <?php endif; ?>

                <!-- Shipping Address -->
                <?php if($order->shipping_address): ?>
                    <div class="grid max-w-[200px] gap-4 max-868:w-full max-868:max-w-full max-md:max-w-full max-md:gap-2">
                        <p class="text-base text-zinc-500 max-md:text-lg max-md:text-black">
                            <?php echo app('translator')->get('shop::app.customers.account.orders.view.shipping-address'); ?>
                        </p>

                        <div class="grid gap-2.5 max-md:gap-0">
                            <p class="text-sm">
                                <?php echo $__env->make('shop::customers.account.orders.view.address', ['address' => $order->shipping_address], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                            </p>
                        </div>

                        <?php echo view_render_event('bagisto.shop.customers.account.orders.view.shipping_address_details.after', ['order' => $order]); ?>

                    </div>

                    <?php echo view_render_event('bagisto.shop.customers.account.orders.view.shipping_address.after', ['order' => $order]); ?>


                    <!-- Shipping Method -->
                    <div class="grid max-w-[200px] place-content-baseline gap-4 max-868:w-full max-868:max-w-full max-md:max-w-full max-md:gap-2">
                        <p class="text-base text-zinc-500 max-md:text-lg max-md:text-black">
                            <?php echo app('translator')->get('shop::app.customers.account.orders.view.shipping-method'); ?>
                        </p>

                        <p class="text-sm">
                            <?php echo e($order->shipping_title); ?>

                        </p>

                        <?php echo view_render_event('bagisto.shop.customers.account.orders.view.shipping_method_details.after', ['order' => $order]); ?>

                    </div>

                    <?php echo view_render_event('bagisto.shop.customers.account.orders.view.shipping_method.after', ['order' => $order]); ?>


                <?php endif; ?>

                <!-- Payment Method -->
                <div class="grid max-w-[200px] place-content-baseline gap-4 max-868:w-full max-868:max-w-full max-md:max-w-full max-md:gap-2">
                    <p class="text-base text-zinc-500 max-md:text-lg max-md:text-black">
                        <?php echo app('translator')->get('shop::app.customers.account.orders.view.payment-method'); ?>
                    </p>

                    <p class="text-sm">
                        <?php echo e(core()->getConfigData('sales.payment_methods.' . $order->payment->method . '.title')); ?>

                    </p>

                    <?php if(! empty($additionalDetails)): ?>
                        <div class="instructions">
                            <label><?php echo e($additionalDetails['title']); ?></label>
                        </div>
                    <?php endif; ?>

                    <?php echo view_render_event('bagisto.shop.customers.account.orders.view.payment_method_details.after', ['order' => $order]); ?>

                </div>

                <?php echo view_render_event('bagisto.shop.customers.account.orders.view.payment_method.after', ['order' => $order]); ?>

            </div>
        </div>

        <?php echo view_render_event('bagisto.shop.customers.account.orders.view.after', ['order' => $order]); ?>


    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4c4dbe009fe892108b054e8b47e63427)): ?>
<?php $attributes = $__attributesOriginal4c4dbe009fe892108b054e8b47e63427; ?>
<?php unset($__attributesOriginal4c4dbe009fe892108b054e8b47e63427); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4c4dbe009fe892108b054e8b47e63427)): ?>
<?php $component = $__componentOriginal4c4dbe009fe892108b054e8b47e63427; ?>
<?php unset($__componentOriginal4c4dbe009fe892108b054e8b47e63427); ?>
<?php endif; ?>
<?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Shop\src/resources/views/customers/account/orders/view.blade.php ENDPATH**/ ?>