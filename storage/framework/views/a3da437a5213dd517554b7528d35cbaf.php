<?php $__env->startComponent('shop::emails.layout'); ?>
    <div style="margin-bottom: 34px;">
        <span style="font-size: 22px;font-weight: 600;color: #121A26">
            <?php echo app('translator')->get('shop::app.emails.orders.invoiced.title'); ?>
        </span> <br>

        <p style="font-size: 16px;color: #5E5E5E;line-height: 24px;">
            <?php echo app('translator')->get('shop::app.emails.dear', ['customer_name' => $invoice->order->customer_full_name]); ?>,👋
        </p>

        <p style="font-size: 16px;color: #5E5E5E;line-height: 24px;">
            <?php echo app('translator')->get('shop::app.emails.orders.invoiced.greeting', [
                'invoice_id' => $invoice->increment_id,
                'order_id'   => '<a href="' . route('shop.customers.account.orders.view', $invoice->order_id) . '" style="color: #2969FF;">#' . $invoice->order->increment_id . '</a>',
                'created_at' => core()->formatDate($invoice->order->created_at, 'Y-m-d H:i:s')
            ]); ?>
        </p>
    </div>

    <div style="font-size: 20px;font-weight: 600;color: #121A26">
        <?php echo app('translator')->get('shop::app.emails.orders.invoiced.summary'); ?>
    </div>

    <div style="display: flex;flex-direction: row;margin-top: 20px;justify-content: space-between;margin-bottom: 40px;">
        <?php if($invoice->order->shipping_address): ?>
            <div style="line-height: 25px;">
                <div style="font-size: 16px;font-weight: 600;color: #121A26;">
                    <?php echo app('translator')->get('shop::app.emails.orders.shipping-address'); ?>
                </div>

                <div style="font-size: 16px;font-weight: 400;color: #384860;margin-bottom: 40px;">
                    <?php echo e($invoice->order->shipping_address->company_name ?? ''); ?><br/>

                    <?php echo e($invoice->order->shipping_address->name); ?><br/>

                    <?php echo e($invoice->order->shipping_address->address); ?><br/>

                    <?php echo e($invoice->order->shipping_address->postcode . " " . $invoice->order->shipping_address->city); ?><br/>

                    <?php echo e($invoice->order->shipping_address->state); ?><br/>

                    ---<br/>

                    <?php echo app('translator')->get('shop::app.emails.orders.contact'); ?> : <?php echo e($invoice->order->billing_address->phone); ?>

                </div>

                <div style="font-size: 16px;font-weight: 600;color: #121A26;">
                    <?php echo app('translator')->get('shop::app.emails.orders.shipping'); ?>
                </div>

                <div style="font-size: 16px;font-weight: 400;color: #384860;">
                    <?php echo e($invoice->order->shipping_title); ?>

                </div>
            </div>
        <?php endif; ?>

        <?php if($invoice->order->billing_address): ?>
            <div style="line-height: 25px;">
                <div style="font-size: 16px;font-weight: 600;color: #121A26;">
                    <?php echo app('translator')->get('shop::app.emails.orders.billing-address'); ?>
                </div>

                <div style="font-size: 16px;font-weight: 400;color: #384860;margin-bottom: 40px;">
                    <?php echo e($invoice->order->billing_address->company_name ?? ''); ?><br/>

                    <?php echo e($invoice->order->billing_address->name); ?><br/>

                    <?php echo e($invoice->order->billing_address->address); ?><br/>

                    <?php echo e($invoice->order->billing_address->postcode . " " . $invoice->order->billing_address->city); ?><br/>

                    <?php echo e($invoice->order->billing_address->state); ?><br/>

                    ---<br/>

                    <?php echo app('translator')->get('shop::app.emails.orders.contact'); ?> : <?php echo e($invoice->order->billing_address->phone); ?>

                </div>

                <div style="font-size: 16px;font-weight: 600;color: #121A26;">
                    <?php echo app('translator')->get('shop::app.emails.orders.payment'); ?>
                </div>

                <div style="font-size: 16px;font-weight: 400;color: #384860;">
                    <?php echo e(core()->getConfigData('sales.payment_methods.' . $invoice->order->payment->method . '.title')); ?>

                </div>

                <?php $additionalDetails = \Webkul\Payment\Payment::getAdditionalDetails($invoice->order->payment->method); ?>

                <?php if(! empty($additionalDetails)): ?>
                    <div style="font-size: 16px; color: #384860;">
                        <div><?php echo e($additionalDetails['title']); ?></div>
                        <div><?php echo e($additionalDetails['value']); ?></div>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>

    <div style="padding-bottom: 40px;border-bottom: 1px solid #CBD5E1;">
        <table style="overflow-x: auto; border-collapse: collapse;
        border-spacing: 0;width: 100%">
            <thead>
                <tr style="color: #121A26;border-top: 1px solid #CBD5E1;border-bottom: 1px solid #CBD5E1;">
                    <?php $__currentLoopData = ['sku', 'name', 'price', 'qty']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <th style="text-align: left;padding: 15px">
                            <?php echo app('translator')->get('shop::app.emails.orders.' .$item); ?>
                        </th>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
            </thead>

            <tbody style="font-size: 16px;font-weight: 400;color: #384860;">
                <?php $__currentLoopData = $invoice->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr style="vertical-align: text-top;">
                        <td style="text-align: left;padding: 15px">
                            <?php echo e($item->getTypeInstance()->getOrderedItem($item)->sku); ?>

                        </td>

                        <td style="text-align: left;padding: 15px">
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

                        <td style="display: flex;flex-direction: column;text-align: left;padding: 15px">
                            <?php if(core()->getConfigData('sales.taxes.sales.display_prices') == 'including_tax'): ?>
                                <?php echo e(core()->formatPrice($item->price_incl_tax, $invoice->order_currency_code)); ?>

                            <?php elseif(core()->getConfigData('sales.taxes.sales.display_prices') == 'both'): ?>
                                <?php echo e(core()->formatPrice($item->price_incl_tax, $invoice->order_currency_code)); ?>


                                <span style="font-size: 12px; white-space: nowrap">
                                    <?php echo app('translator')->get('shop::app.emails.orders.excl-tax'); ?>

                                    <span style="font-weight: 600">
                                        <?php echo e(core()->formatPrice($item->price, $invoice->order_currency_code)); ?>

                                    </span>
                                </span>
                            <?php else: ?>
                                <?php echo e(core()->formatPrice($item->price, $invoice->order_currency_code)); ?>

                            <?php endif; ?>
                        </td>

                        <td style="text-align: left;padding: 15px">
                            <?php echo e($item->qty); ?>

                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

    <div style="display: grid;justify-content: end;font-size: 16px;color: #384860;line-height: 30px;padding-top: 20px;padding-bottom: 20px;">

        <?php if(core()->getConfigData('sales.taxes.sales.display_subtotal') == 'including_tax'): ?>
            <div style="display: grid;gap: 20px;grid-template-columns: repeat(2, minmax(0, 1fr));">
                <span>
                    <?php echo app('translator')->get('shop::app.emails.orders.subtotal'); ?>
                </span>

                <span style="text-align: right;">
                    <?php echo e(core()->formatPrice($invoice->sub_total, $invoice->order_currency_code_incl_tax)); ?>

                </span>
            </div>
        <?php elseif(core()->getConfigData('sales.taxes.sales.display_subtotal') == 'both'): ?>
            <div style="display: grid;gap: 20px;grid-template-columns: repeat(2, minmax(0, 1fr));">
                <span>
                    <?php echo app('translator')->get('shop::app.emails.orders.subtotal-excl-tax'); ?>
                </span>

                <span style="text-align: right;">
                    <?php echo e(core()->formatPrice($invoice->sub_total, $invoice->order_currency_code)); ?>

                </span>
            </div>

            <div style="display: grid;gap: 20px;grid-template-columns: repeat(2, minmax(0, 1fr));">
                <span>
                    <?php echo app('translator')->get('shop::app.emails.orders.subtotal-incl-tax'); ?>
                </span>

                <span style="text-align: right;">
                    <?php echo e(core()->formatPrice($invoice->sub_total, $invoice->order_currency_code_incl_tax)); ?>

                </span>
            </div>
        <?php else: ?>
            <div style="display: grid;gap: 20px;grid-template-columns: repeat(2, minmax(0, 1fr));">
                <span>
                    <?php echo app('translator')->get('shop::app.emails.orders.subtotal'); ?>
                </span>

                <span style="text-align: right;">
                    <?php echo e(core()->formatPrice($invoice->sub_total, $invoice->order_currency_code)); ?>

                </span>
            </div>
        <?php endif; ?>

        <?php if($invoice->order->shipping_address): ?>
            <?php if(core()->getConfigData('sales.taxes.sales.display_shipping_amount') == 'including_tax'): ?>
                <div style="display: grid;gap: 20px;grid-template-columns: repeat(2, minmax(0, 1fr));">
                    <span>
                        <?php echo app('translator')->get('shop::app.emails.orders.shipping-handling'); ?>
                    </span>

                    <span style="text-align: right;">
                        <?php echo e(core()->formatPrice($invoice->shipping_amount_incl_tax, $invoice->order_currency_code)); ?>

                    </span>
                </div>
            <?php elseif(core()->getConfigData('sales.taxes.sales.display_shipping_amount') == 'both'): ?>
                <div style="display: grid;gap: 20px;grid-template-columns: repeat(2, minmax(0, 1fr));">
                    <span>
                        <?php echo app('translator')->get('shop::app.emails.orders.shipping-handling-excl-tax'); ?>
                    </span>

                    <span style="text-align: right;">
                        <?php echo e(core()->formatPrice($invoice->shipping_amount, $invoice->order_currency_code)); ?>

                    </span>
                </div>

                <div style="display: grid;gap: 20px;grid-template-columns: repeat(2, minmax(0, 1fr));">
                    <span>
                        <?php echo app('translator')->get('shop::app.emails.orders.shipping-handling-incl-tax'); ?>
                    </span>

                    <span style="text-align: right;">
                        <?php echo e(core()->formatPrice($invoice->shipping_amount_incl_tax, $invoice->order_currency_code)); ?>

                    </span>
                </div>
            <?php else: ?>
                <div style="display: grid;gap: 20px;grid-template-columns: repeat(2, minmax(0, 1fr));">
                    <span>
                        <?php echo app('translator')->get('shop::app.emails.orders.shipping-handling'); ?>
                    </span>

                    <span style="text-align: right;">
                        <?php echo e(core()->formatPrice($invoice->shipping_amount, $invoice->order_currency_code)); ?>

                    </span>
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <div style="display: grid;gap: 100px;grid-template-columns: repeat(2, minmax(0, 1fr));">
            <span>
                <?php echo app('translator')->get('shop::app.emails.orders.tax'); ?>
            </span>

            <span style="text-align: right;">
                <?php echo e(core()->formatPrice($invoice->tax_amount, $invoice->order_currency_code)); ?>

            </span>
        </div>

        <?php if($invoice->discount_amount > 0): ?>
            <div style="display: grid;gap: 100px;grid-template-columns: repeat(2, minmax(0, 1fr));">
                <span>
                    <?php echo app('translator')->get('shop::app.emails.orders.discount'); ?>
                </span>

                <span style="text-align: right;">
                    <?php echo e(core()->formatPrice($invoice->discount_amount, $invoice->order_currency_code)); ?>

                </span>
            </div>
        <?php endif; ?>

        <div style="display: grid;gap: 100px;grid-template-columns: repeat(2, minmax(0, 1fr));font-weight: bold">
            <span>
                <?php echo app('translator')->get('shop::app.emails.orders.grand-total'); ?>
            </span>

            <span style="text-align: right;">
                <?php echo e(core()->formatPrice($invoice->grand_total, $invoice->order_currency_code)); ?>

            </span>
        </div>
    </div>
<?php echo $__env->renderComponent(); ?>
<?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Shop\src\Resources\views\emails\orders\invoiced.blade.php ENDPATH**/ ?>