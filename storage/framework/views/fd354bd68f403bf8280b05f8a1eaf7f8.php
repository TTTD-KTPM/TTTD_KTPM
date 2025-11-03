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
        <?php echo app('translator')->get('admin::app.sales.invoices.view.title', ['invoice_id' => $invoice->increment_id ?? $invoice->id]); ?>
     <?php $__env->endSlot(); ?>

    <?php
        $order = $invoice->order;
    ?>

    <!-- Main Body -->
    <div class="grid">
        <div class="flex items-center justify-between gap-4 max-sm:flex-wrap">
            <?php echo view_render_event('bagisto.admin.sales.invoice.title.before', ['order' => $order]); ?>


            <p class="text-xl font-bold leading-6 text-gray-800 dark:text-white">
                <?php echo app('translator')->get('admin::app.sales.invoices.view.title', ['invoice_id' => $invoice->increment_id ?? $invoice->id]); ?>

                <span class="<?php echo e($invoice->status_label_class); ?> mx-1.5 text-sm">
                    <?php echo e($invoice->status_label); ?>

                </span>
            </p>

            <?php echo view_render_event('bagisto.admin.sales.invoice.title.after', ['order' => $order]); ?>


            <div class="flex items-center gap-x-2.5">
                <!-- Back Button -->
                <a
                    href="<?php echo e(route('admin.sales.invoices.index')); ?>"
                    class="transparent-button hover:bg-gray-200 dark:text-white dark:hover:bg-gray-800"
                >
                    <?php echo app('translator')->get('admin::app.account.edit.back-btn'); ?>
                </a>
            </div>
        </div>
    </div>

    <!-- Filter row -->
    <div class="mt-7 flex items-center justify-between gap-4 max-md:flex-wrap">
        <div class="flex flex-wrap items-center gap-x-1 gap-y-2">
            <?php echo view_render_event('bagisto.admin.sales.invoice.page_action.before', ['order' => $order]); ?>


            <a
                href="<?php echo e(route('admin.sales.invoices.print', $invoice->id)); ?>"
                class="inline-flex w-full max-w-max cursor-pointer items-center justify-between gap-x-2 px-1 py-1.5 text-center font-semibold text-gray-600 transition-all hover:rounded-md hover:bg-gray-200 dark:text-gray-300 dark:hover:bg-gray-800"
            >
                <span class="icon-printer text-2xl"></span>

                <?php echo app('translator')->get('admin::app.sales.invoices.view.print'); ?>
            </a>

            <!-- Send Duplicate Invoice Modal -->
            <div>
                <button
                    type="button"
                    class="inline-flex w-full max-w-max cursor-pointer items-center justify-between gap-x-2 px-1 py-1.5 text-center font-semibold text-gray-600 transition-all hover:rounded-md hover:bg-gray-200 dark:text-gray-300 dark:hover:bg-gray-800"
                    @click="$refs.groupCreateModal.open()"
                >
                    <span class="icon-mail text-2xl"></span>

                    <?php echo app('translator')->get('admin::app.sales.invoices.view.send-duplicate-invoice'); ?>
                </button>

                <?php if (isset($component)) { $__componentOriginal81b4d293d9113446bb908fc8aef5c8f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal81b4d293d9113446bb908fc8aef5c8f6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.index','data' => ['action' => route('admin.sales.invoices.send_duplicate_email', $invoice->id)]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.sales.invoices.send_duplicate_email', $invoice->id))]); ?>
                    <!-- Create Group Modal -->
                    <?php if (isset($component)) { $__componentOriginal09768308838b828c7799162f44758281 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal09768308838b828c7799162f44758281 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.modal.index','data' => ['ref' => 'groupCreateModal']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['ref' => 'groupCreateModal']); ?>
                        <!-- Modal Header -->
                         <?php $__env->slot('header', null, []); ?> 
                            <p class="text-lg font-bold text-gray-800 dark:text-white">
                                <?php echo app('translator')->get('admin::app.sales.invoices.view.send-duplicate-invoice'); ?>
                            </p>
                         <?php $__env->endSlot(); ?>

                        <!-- Modal Content -->
                         <?php $__env->slot('content', null, []); ?> 
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
                                <?php if (isset($component)) { $__componentOriginal8378211f70f8c39b16d47cecdac9c7c8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8378211f70f8c39b16d47cecdac9c7c8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.label','data' => ['class' => 'required']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'required']); ?>
                                    <?php echo app('translator')->get('admin::app.sales.invoices.view.email'); ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8378211f70f8c39b16d47cecdac9c7c8)): ?>
<?php $attributes = $__attributesOriginal8378211f70f8c39b16d47cecdac9c7c8; ?>
<?php unset($__attributesOriginal8378211f70f8c39b16d47cecdac9c7c8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8378211f70f8c39b16d47cecdac9c7c8)): ?>
<?php $component = $__componentOriginal8378211f70f8c39b16d47cecdac9c7c8; ?>
<?php unset($__componentOriginal8378211f70f8c39b16d47cecdac9c7c8); ?>
<?php endif; ?>

                                <?php if (isset($component)) { $__componentOriginal53af403f6b2179a3039d488b8ab2a267 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53af403f6b2179a3039d488b8ab2a267 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.control','data' => ['type' => 'email','id' => 'email','name' => 'email','rules' => 'required|email','value' => $invoice->order->customer_email,'label' => trans('admin::app.sales.invoices.view.email')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'email','id' => 'email','name' => 'email','rules' => 'required|email','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($invoice->order->customer_email),'label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('admin::app.sales.invoices.view.email'))]); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.error','data' => ['controlName' => 'email']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['control-name' => 'email']); ?>
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
                         <?php $__env->endSlot(); ?>

                        <!-- Modal Footer -->
                         <?php $__env->slot('footer', null, []); ?> 
                            <!-- Save Button -->
                            <?php if (isset($component)) { $__componentOriginal989f82b74d189698d771eef298c02d90 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal989f82b74d189698d771eef298c02d90 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.button.index','data' => ['buttonType' => 'button','class' => 'primary-button','title' => trans('admin::app.sales.invoices.view.send')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['button-type' => 'button','class' => 'primary-button','title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('admin::app.sales.invoices.view.send'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal989f82b74d189698d771eef298c02d90)): ?>
<?php $attributes = $__attributesOriginal989f82b74d189698d771eef298c02d90; ?>
<?php unset($__attributesOriginal989f82b74d189698d771eef298c02d90); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal989f82b74d189698d771eef298c02d90)): ?>
<?php $component = $__componentOriginal989f82b74d189698d771eef298c02d90; ?>
<?php unset($__componentOriginal989f82b74d189698d771eef298c02d90); ?>
<?php endif; ?>
                         <?php $__env->endSlot(); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal09768308838b828c7799162f44758281)): ?>
<?php $attributes = $__attributesOriginal09768308838b828c7799162f44758281; ?>
<?php unset($__attributesOriginal09768308838b828c7799162f44758281); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal09768308838b828c7799162f44758281)): ?>
<?php $component = $__componentOriginal09768308838b828c7799162f44758281; ?>
<?php unset($__componentOriginal09768308838b828c7799162f44758281); ?>
<?php endif; ?>
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
            </div>

            <?php echo view_render_event('bagisto.admin.sales.invoice.page_action.after', ['order' => $order]); ?>


        </div>
    </div>

    <!-- body content -->
    <div class="mt-3.5 flex gap-2.5 max-xl:flex-wrap">
        <!-- Left sub-component -->
        <div class="flex flex-1 flex-col gap-2 max-xl:flex-auto">
            <!-- Invoice Item Section -->
            <div class="box-shadow rounded bg-white dark:bg-gray-900">
                <p class="mb-4 p-4 text-base font-semibold text-gray-800 dark:text-white">
                    <?php echo app('translator')->get('admin::app.sales.invoices.view.invoice-items'); ?> (<?php echo e(count($invoice->items)); ?>)
                </p>

                <div class="grid">
                    <!-- Invoice Item Details-->
                    <?php $__currentLoopData = $invoice->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="flex justify-between gap-2.5 border-b border-slate-300 px-4 py-6 dark:border-gray-800">
                            <div class="flex gap-2.5">
                                <!-- Product Image -->
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
                                    <!-- Item Name -->
                                    <p class="break-all text-base font-semibold text-gray-800 dark:text-white">
                                        <?php echo e($item->name); ?>

                                    </p>

                                    <p class="text-gray-600 dark:text-gray-300">
                                        <?php echo app('translator')->get('admin::app.sales.invoices.view.amount-per-unit', [
                                            'amount' => core()->formatBasePrice($item->base_price),
                                            'qty'    => $item->qty,
                                            ]); ?>
                                    </p>

                                    <div class="flex flex-col place-items-start gap-1.5">
                                        <?php if(isset($item->additional['attributes'])): ?>
                                            <!-- Item Additional Details -->
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

                                        <!--SKU -->
                                        <p class="text-gray-600 dark:text-gray-300">
                                            <?php echo app('translator')->get('admin::app.sales.invoices.view.sku', ['sku' => $item->getTypeInstance()->getOrderedItem($item)->sku]); ?>
                                        </p>

                                        <!-- Quantity -->
                                        <p class="text-gray-600 dark:text-gray-300">
                                            <?php echo app('translator')->get('admin::app.sales.invoices.view.qty', ['qty' => $item->qty]); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="grid place-content-start gap-1">
                                <!-- Item Grand Total -->
                                <p class="flex items-center justify-end gap-x-1 text-base font-semibold text-gray-800 dark:text-white">
                                    <?php echo e(core()->formatBasePrice($item->base_total + $item->base_tax_amount - $item->base_discount_amount)); ?>

                                </p>

                                <!-- Item Base Price -->
                                <div class="flex flex-col place-items-start items-end gap-1.5">
                                    <?php if(core()->getConfigData('sales.taxes.sales.display_prices') == 'including_tax'): ?>
                                        <p class="text-gray-600 dark:text-gray-300">
                                            <?php echo app('translator')->get('admin::app.sales.invoices.view.price', ['price' => core()->formatBasePrice($item->base_price_incl_tax)]); ?>
                                        </p>
                                    <?php elseif(core()->getConfigData('sales.taxes.sales.display_prices') == 'both'): ?>
                                        <p class="text-gray-600 dark:text-gray-300">
                                            <?php echo app('translator')->get('admin::app.sales.invoices.view.price-excl-tax', ['price' => core()->formatBasePrice($item->base_price)]); ?>
                                        </p>

                                        <p class="text-gray-600 dark:text-gray-300">
                                            <?php echo app('translator')->get('admin::app.sales.invoices.view.price-incl-tax', ['price' => core()->formatBasePrice($item->base_price_incl_tax)]); ?>
                                        </p>
                                    <?php else: ?>
                                        <p class="text-gray-600 dark:text-gray-300">
                                            <?php echo app('translator')->get('admin::app.sales.invoices.view.price', ['price' => core()->formatBasePrice($item->base_price)]); ?>
                                        </p>
                                    <?php endif; ?>

                                    <!-- Item Tax Amount -->
                                    <p class="text-gray-600 dark:text-gray-300">
                                        <?php echo app('translator')->get('admin::app.sales.invoices.view.tax', ['tax' => core()->formatBasePrice($item->base_tax_amount)]); ?>
                                    </p>

                                    <!-- Item Discount -->
                                    <?php if($invoice->base_discount_amount > 0): ?>
                                        <p class="text-gray-600 dark:text-gray-300">
                                            <?php echo app('translator')->get('admin::app.sales.invoices.view.discount', ['discount' => core()->formatBasePrice($item->base_discount_amount)]); ?>
                                        </p>
                                    <?php endif; ?>

                                    <!-- Item Sub-Total -->
                                    <?php if(core()->getConfigData('sales.taxes.sales.display_subtotal') == 'including_tax'): ?>
                                        <p class="text-gray-600 dark:text-gray-300">
                                            <?php echo app('translator')->get('admin::app.sales.invoices.view.sub-total', ['sub_total' => core()->formatBasePrice($item->base_total_incl_tax)]); ?>
                                        </p>
                                    <?php elseif(core()->getConfigData('sales.taxes.sales.display_subtotal') == 'both'): ?>
                                        <p class="text-gray-600 dark:text-gray-300">
                                            <?php echo app('translator')->get('admin::app.sales.invoices.view.sub-total-excl-tax', ['sub_total' => core()->formatBasePrice($item->base_total)]); ?>
                                        </p>

                                        <p class="text-gray-600 dark:text-gray-300">
                                            <?php echo app('translator')->get('admin::app.sales.invoices.view.sub-total-incl-tax', ['sub_total' => core()->formatBasePrice($item->base_total_incl_tax)]); ?>
                                        </p>
                                    <?php else: ?>
                                        <p class="text-gray-600 dark:text-gray-300">
                                            <?php echo app('translator')->get('admin::app.sales.invoices.view.sub-total', ['sub_total' => core()->formatBasePrice($item->base_total)]); ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <!--Sale Summary -->
                <div class="mt-4 flex w-full justify-end gap-2.5 p-4">
                    <div class="flex flex-col gap-y-1.5">
                        <?php if(core()->getConfigData('sales.taxes.sales.display_subtotal') == 'both'): ?>
                            <p class="font-semibold !leading-5 text-gray-600 dark:text-gray-300">
                                <?php echo app('translator')->get('admin::app.sales.invoices.view.sub-total-summary-excl-tax'); ?>
                            </p>

                            <p class="font-semibold !leading-5 text-gray-600 dark:text-gray-300">
                                <?php echo app('translator')->get('admin::app.sales.invoices.view.sub-total-summary-incl-tax'); ?>
                            </p>
                        <?php else: ?>
                            <p class="font-semibold !leading-5 text-gray-600 dark:text-gray-300">
                                <?php echo app('translator')->get('admin::app.sales.invoices.view.sub-total-summary'); ?>
                            </p>
                        <?php endif; ?>

                        <?php if(core()->getConfigData('sales.taxes.sales.display_shipping_amount') == 'both'): ?>
                            <p class="!leading-5 text-gray-600 dark:text-gray-300">
                                <?php echo app('translator')->get('admin::app.sales.invoices.view.shipping-and-handling-excl-tax'); ?>
                            </p>

                            <p class="!leading-5 text-gray-600 dark:text-gray-300">
                                <?php echo app('translator')->get('admin::app.sales.invoices.view.shipping-and-handling-incl-tax'); ?>
                            </p>
                        <?php else: ?>
                            <p class="!leading-5 text-gray-600 dark:text-gray-300">
                                <?php echo app('translator')->get('admin::app.sales.invoices.view.shipping-and-handling'); ?>
                            </p>
                        <?php endif; ?>

                        <p class="!leading-5 text-gray-600 dark:text-gray-300">
                            <?php echo app('translator')->get('admin::app.sales.invoices.view.summary-tax'); ?>
                        </p>

                        <?php if($invoice->base_discount_amount > 0): ?>
                            <p class="!leading-5 text-gray-600 dark:text-gray-300">
                                <?php echo app('translator')->get('admin::app.sales.invoices.view.summary-discount'); ?>
                            </p>
                        <?php endif; ?>

                        <p class="text-base font-semibold !leading-5 text-gray-800 dark:text-white">
                            <?php echo app('translator')->get('admin::app.sales.invoices.view.grand-total'); ?>
                        </p>
                    </div>

                    <div class="flex flex-col gap-y-1.5">
                        <!-- Subtotal -->
                        <?php if(core()->getConfigData('sales.taxes.sales.display_subtotal') == 'including_tax'): ?>
                            <p class="font-semibold !leading-5 text-gray-600 dark:text-gray-300">
                                <?php echo e(core()->formatBasePrice($invoice->base_sub_total_incl_tax)); ?>

                            </p>
                        <?php elseif(core()->getConfigData('sales.taxes.sales.display_subtotal') == 'both'): ?>
                            <p class="font-semibold !leading-5 text-gray-600 dark:text-gray-300">
                                <?php echo e(core()->formatBasePrice($invoice->base_sub_total)); ?>

                            </p>

                            <p class="font-semibold !leading-5 text-gray-600 dark:text-gray-300">
                                <?php echo e(core()->formatBasePrice($invoice->base_sub_total_incl_tax)); ?>

                            </p>
                        <?php else: ?>
                            <p class="font-semibold !leading-5 text-gray-600 dark:text-gray-300">
                                <?php echo e(core()->formatBasePrice($invoice->base_sub_total)); ?>

                            </p>
                        <?php endif; ?>

                        <!-- Shipping and Handling -->
                        <?php if(core()->getConfigData('sales.taxes.sales.display_shipping_amount') == 'including_tax'): ?>
                            <p class="!leading-5 text-gray-600 dark:text-gray-300">
                                <?php echo e(core()->formatBasePrice($invoice->base_shipping_amount_incl_tax)); ?>

                            </p>
                        <?php elseif(core()->getConfigData('sales.taxes.sales.display_shipping_amount') == 'both'): ?>
                            <p class="!leading-5 text-gray-600 dark:text-gray-300">
                                <?php echo e(core()->formatBasePrice($invoice->base_shipping_amount)); ?>

                            </p>

                            <p class="!leading-5 text-gray-600 dark:text-gray-300">
                                <?php echo e(core()->formatBasePrice($invoice->base_shipping_amount_incl_tax)); ?>

                            </p>
                        <?php else: ?>
                            <p class="!leading-5 text-gray-600 dark:text-gray-300">
                                <?php echo e(core()->formatBasePrice($invoice->base_shipping_amount)); ?>

                            </p>
                        <?php endif; ?>

                        <!-- Tax -->
                        <p class="!leading-5 text-gray-600 dark:text-gray-300">
                            <?php echo e(core()->formatBasePrice($invoice->base_tax_amount)); ?>

                        </p>

                        <!-- Discount -->
                        <?php if($invoice->base_discount_amount > 0): ?>
                            <p class="!leading-5 text-gray-600 dark:text-gray-300">
                                <?php echo e(core()->formatBasePrice($invoice->base_discount_amount)); ?>

                            </p>
                        <?php endif; ?>

                        <!-- Grand Total -->
                        <p class="text-base font-semibold !leading-5 text-gray-800 dark:text-white">
                            <?php echo e(core()->formatBasePrice($invoice->base_grand_total)); ?>

                        </p>
                    </div>
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
                        <?php echo app('translator')->get('admin::app.sales.invoices.view.customer'); ?>
                    </p>
                 <?php $__env->endSlot(); ?>

                 <?php $__env->slot('content', null, []); ?> 
                    <div class="flex flex-col <?php echo e($order->billing_address ? 'pb-4' : ''); ?>">
                        <p class="font-semibold text-gray-800 dark:text-white">
                            <?php echo e($invoice->order->customer_full_name); ?>

                        </p>

                        <?php echo view_render_event('bagisto.admin.sales.invoice.customer_name.after', ['order' => $order]); ?>


                        <p class="text-gray-600 dark:text-gray-300">
                            <?php echo app('translator')->get('admin::app.sales.invoices.view.customer-email', ['email' => $invoice->order->customer_email]); ?>
                        </p>

                        <?php echo view_render_event('bagisto.admin.sales.invoice.customer_email.after', ['order' => $order]); ?>

                    </div>

                    <?php if($order->billing_address || $order->shipping_address): ?>
                        <!-- Billing Address -->
                        <?php if($order->billing_address): ?>
                            <div class="<?php echo e($order->shipping_address ? 'pb-4' : ''); ?>">
                                <span class="block w-full border-b dark:border-gray-800"></span>

                                <div class="flex items-center justify-between">
                                    <p class="py-4 text-base font-semibold text-gray-600 dark:text-gray-300">
                                        <?php echo app('translator')->get('Billing Address'); ?>
                                    </p>
                                </div>

                                <?php echo $__env->make('admin::sales.address', ['address' => $order->billing_address], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                                <?php echo view_render_event('bagisto.admin.sales.invoice.billing_address.after', ['order' => $order]); ?>

                            </div>
                        <?php endif; ?>

                        <!-- Shipping Address -->
                        <?php if($order->shipping_address): ?>
                            <span class="block w-full border-b dark:border-gray-800"></span>

                            <div class="flex items-center justify-between">
                                <p class="py-4 text-base font-semibold text-gray-600 dark:text-gray-300">
                                    <?php echo app('translator')->get('Shipping Address'); ?>
                                </p>
                            </div>

                            <?php echo $__env->make('admin::sales.address', ['address' => $order->shipping_address], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                            <?php echo view_render_event('bagisto.admin.sales.invoice.shipping_address.after', ['order' => $order]); ?>

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
                        <?php echo app('translator')->get('admin::app.sales.invoices.view.order-information'); ?>
                    </p>
                 <?php $__env->endSlot(); ?>

                 <?php $__env->slot('content', null, []); ?> 
                    <div class="flex w-full justify-start gap-5">
                        <div class="flex flex-col gap-y-1.5">
                            <?php $__currentLoopData = ['order-id', 'order-date', 'order-status', 'invoice-status', 'channel']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <p class="text-gray-600 dark:text-gray-300">
                                    <?php echo app('translator')->get('admin::app.sales.invoices.view.' . $item); ?>
                                </p>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <div class="flex flex-col gap-y-1.5">
                            <!-- Order Id -->
                            <p class="font-semibold text-blue-600 transition-all hover:underline">
                                <a href="<?php echo e(route('admin.sales.orders.view', $order->id)); ?>">#<?php echo e($order->increment_id); ?></a>
                            </p>

                            <?php echo view_render_event('bagisto.admin.sales.invoice.increment_id.after', ['order' => $order]); ?>


                            <!-- Order Date -->
                            <p class="text-gray-600 dark:text-gray-300">
                                <?php echo e(core()->formatDate($order->created_at)); ?>

                            </p>

                            <?php echo view_render_event('bagisto.admin.sales.invoice.created_at.after', ['order' => $order]); ?>


                            <!-- Order Status -->
                            <p class="text-gray-600 dark:text-gray-300">
                                <?php echo e($order->status_label); ?>

                            </p>

                            <?php echo view_render_event('bagisto.admin.sales.invoice.status_label.after', ['order' => $order]); ?>


                            <!-- Invoice Status -->
                            <p class="text-gray-600 dark:text-gray-300">
                                <?php echo e($invoice->status_label); ?>

                            </p>

                            <!-- Order Channel -->
                            <p class="text-gray-600 dark:text-gray-300">
                                <?php echo e($order->channel_name); ?>

                            </p>

                            <?php echo view_render_event('bagisto.admin.sales.invoice.channel_name.after', ['order' => $order]); ?>

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
<?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Admin\src\Resources\views\sales\invoices\view.blade.php ENDPATH**/ ?>