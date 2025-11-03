<?php $__env->startComponent('admin::emails.layout'); ?>
    <div style="margin-bottom: 34px;">
        <span style="font-size: 22px;font-weight: 600;color: #121A26">
            <?php echo app('translator')->get('admin::app.emails.orders.inventory-source.title'); ?>
        </span> <br>

        <p style="font-size: 16px;color: #5E5E5E;line-height: 24px;">
            <?php echo app('translator')->get('admin::app.emails.dear', ['admin_name' => $shipment->inventory_source->contact_name]); ?>,👋
        </p>

        <p style="font-size: 16px;color: #5E5E5E;line-height: 24px;">
            <?php echo app('translator')->get('admin::app.emails.orders.inventory-source.greeting', [
                'invoice_id' => $shipment->increment_id,
                'order_id'   => '<a href="' . route('admin.sales.orders.view', $shipment->order_id) . '" style="color: #2969FF;">#' . $shipment->order->increment_id . '</a>',
                'created_at' => core()->formatDate($shipment->order->created_at, 'Y-m-d H:i:s')
            ]); ?>
        </p>
    </div>

    <div style="font-size: 20px;font-weight: 600;color: #121A26">
        <?php echo app('translator')->get('admin::app.emails.orders.inventory-source.summary'); ?>
    </div>

    <div style="display: flex;flex-direction: row;margin-top: 20px;justify-content: space-between;margin-bottom: 40px;">
        <?php if($shipment->order->shipping_address): ?>
            <div style="line-height: 25px;">
                <div style="font-size: 16px;font-weight: 600;color: #121A26;">
                    <?php echo app('translator')->get('admin::app.emails.orders.shipping-address'); ?>
                </div>

                <div style="font-size: 16px;font-weight: 400;color: #384860;margin-bottom: 40px;">
                    <?php echo e($shipment->order->shipping_address->company_name ?? ''); ?><br/>

                    <?php echo e($shipment->order->shipping_address->name); ?><br/>

                    <?php echo e($shipment->order->shipping_address->address); ?><br/>

                    <?php echo e($shipment->order->shipping_address->postcode . " " . $shipment->order->shipping_address->city); ?><br/>

                    <?php echo e($shipment->order->shipping_address->state); ?><br/>

                    ---<br/>

                    <?php echo app('translator')->get('admin::app.emails.orders.contact'); ?> : <?php echo e($shipment->order->billing_address->phone); ?>

                </div>

                <div style="font-size: 16px;font-weight: 600;color: #121A26;">
                    <?php echo app('translator')->get('admin::app.emails.orders.shipping'); ?>
                </div>

                <div style="font-size: 16px;font-weight: 400;color: #384860;">
                    <?php echo e($shipment->order->shipping_title); ?>

                </div>

                <div style="font-size: 16px; color: #384860;">
                    <div>
                        <span><?php echo app('translator')->get('admin::app.emails.orders.carrier'); ?> : </span>

                        <?php echo e($shipment->carrier_title); ?>

                    </div>

                    <div>
                        <span><?php echo app('translator')->get('admin::app.emails.orders.tracking-number'); ?> : </span>

                        <?php echo e($shipment->track_number); ?>

                    </div>
                </div>

                <?php $additionalDetails = \Webkul\Payment\Payment::getAdditionalDetails($shipment->order->payment->method); ?>

                <?php if(! empty($additionalDetails)): ?>
                    <div style="font-size: 16px; color: #384860;">
                        <div>
                            <span><?php echo e($additionalDetails->title); ?> : </span>
                        </div>

                        <div>
                            <span><?php echo e($additionalDetails->value); ?> </span>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if($shipment->order->billing_address): ?>
            <div style="line-height: 25px;">
                <div style="font-size: 16px;font-weight: 600;color: #121A26;">
                    <?php echo app('translator')->get('admin::app.emails.orders.billing-address'); ?>
                </div>

                <div style="font-size: 16px;font-weight: 400;color: #384860;margin-bottom: 40px;">
                    <?php echo e($shipment->order->billing_address->company_name ?? ''); ?><br/>

                    <?php echo e($shipment->order->billing_address->name); ?><br/>

                    <?php echo e($shipment->order->billing_address->address); ?><br/>

                    <?php echo e($shipment->order->billing_address->postcode . " " . $shipment->order->billing_address->city); ?><br/>

                    <?php echo e($shipment->order->billing_address->state); ?><br/>

                    ---<br/>

                    <?php echo app('translator')->get('admin::app.emails.orders.contact'); ?> : <?php echo e($shipment->order->billing_address->phone); ?>

                </div>

                <div style="font-size: 16px;font-weight: 600;color: #121A26;">
                    <?php echo app('translator')->get('admin::app.emails.orders.payment'); ?>
                </div>

                <div style="font-size: 16px;font-weight: 400;color: #384860;">
                    <?php echo e(core()->getConfigData('sales.payment_methods.' . $shipment->order->payment->method . '.title')); ?>

                </div>
            </div>
        <?php endif; ?>
    </div>

    <div style="padding-bottom: 40px;border-bottom: 1px solid #CBD5E1;">
        <table style="overflow-x: auto; border-collapse: collapse;
        border-spacing: 0;width: 100%">
            <thead>
                <tr style="color: #121A26;border-top: 1px solid #CBD5E1;border-bottom: 1px solid #CBD5E1;">
                    <th style="text-align: left;padding: 15px"><?php echo app('translator')->get('admin::app.emails.orders.sku'); ?></th>
                    <th style="text-align: left;padding: 15px"><?php echo app('translator')->get('admin::app.emails.orders.name'); ?></th>
                    <th style="text-align: left;padding: 15px"><?php echo app('translator')->get('admin::app.emails.orders.price'); ?></th>
                    <th style="text-align: left;padding: 15px"><?php echo app('translator')->get('admin::app.emails.orders.qty'); ?></th>
                </tr>
            </thead>

            <tbody style="font-size: 16px;font-weight: 400;color: #384860;">
                <?php $__currentLoopData = $shipment->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr style="vertical-align: text-top;">
                        <td style="text-align: left;padding: 15px">
                            <?php echo e($item->sku); ?>

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
                                            <b><?php echo e($attribute['attribute_name']); ?> : </b>

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
                                <?php echo e(core()->formatBasePrice($item->base_price_incl_tax)); ?>

                            <?php elseif(core()->getConfigData('sales.taxes.sales.display_prices') == 'both'): ?>
                                <?php echo e(core()->formatBasePrice($item->base_price_incl_tax)); ?>


                                <span style="font-size: 12px; white-space: nowrap">
                                    <?php echo app('translator')->get('admin::app.emails.orders.excl-tax'); ?>

                                    <span style="font-weight: 600">
                                        <?php echo e(core()->formatBasePrice($item->base_price)); ?>

                                    </span>
                                </span>
                            <?php else: ?>
                                <?php echo e(core()->formatBasePrice($item->base_price)); ?>

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
<?php echo $__env->renderComponent(); ?>
<?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Admin\src\Resources\views\emails\orders\inventory-source.blade.php ENDPATH**/ ?>