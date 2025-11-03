<?php echo view_render_event('bagisto.admin.sales.order.create.cart.items.before'); ?>


<!-- Vue JS Component -->
<v-cart-items
    :cart="cart"
    :is-adding-to-cart="isAddingToCart"
    @add-to-cart="configureAddToCart($event); stepReset()"
    @remove-from-cart="setCart($event); stepReset()"
    @cart-item-updated="setCart($event); stepReset()"
>
    <!-- Cart Items Shimmer Effect -->
    <?php if (isset($component)) { $__componentOriginal3443e414903d23f77d083031e17dbeef = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3443e414903d23f77d083031e17dbeef = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.shimmer.sales.orders.create.cart.items','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::shimmer.sales.orders.create.cart.items'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3443e414903d23f77d083031e17dbeef)): ?>
<?php $attributes = $__attributesOriginal3443e414903d23f77d083031e17dbeef; ?>
<?php unset($__attributesOriginal3443e414903d23f77d083031e17dbeef); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3443e414903d23f77d083031e17dbeef)): ?>
<?php $component = $__componentOriginal3443e414903d23f77d083031e17dbeef; ?>
<?php unset($__componentOriginal3443e414903d23f77d083031e17dbeef); ?>
<?php endif; ?>
</v-cart-items>

<?php echo view_render_event('bagisto.admin.sales.order.create.cart.items.after'); ?>


<?php if (! $__env->hasRenderedOnce('823d46a1-cd23-46b7-8f5e-3c5b6f08e4fa')): $__env->markAsRenderedOnce('823d46a1-cd23-46b7-8f5e-3c5b6f08e4fa');
$__env->startPush('scripts'); ?>
    <script
        type="text/x-template"
        id="v-cart-items-template"
    >
        <div class="box-shadow rounded bg-white dark:bg-gray-900">
            <div class="flex justify-between p-4">
                <p class="text-base font-semibold text-gray-800 dark:text-white">
                    <?php echo app('translator')->get('admin::app.sales.orders.create.cart.items.title'); ?>
                </p>

                <div class="flex items-center gap-4">
                    <template v-if="isAddingToCart || isUpdating">
                        <img
                            class="h-5 w-5 animate-spin"
                            src="<?php echo e(bagisto_asset('images/spinner.svg')); ?>"
                        />
                    </template>

                    <template v-else>
                        <p class="flex flex-col gap-1 text-base font-semibold text-gray-800 dark:text-white">
                            <template v-if="displayTax.subtotal == 'including_tax'">
                                {{ "<?php echo app('translator')->get('admin::app.sales.orders.create.cart.items.sub-total', ['sub_total' => 'replace']); ?>".replace('replace', cart.formatted_sub_total_incl_tax) }}
                            </template>

                            <template v-else-if="displayTax.subtotal == 'both'">
                                {{ "<?php echo app('translator')->get('admin::app.sales.orders.create.cart.items.sub-total', ['sub_total' => 'replace']); ?>".replace('replace', cart.formatted_sub_total_incl_tax) }}

                                <span class="text-xs font-normal">
                                    <?php echo app('translator')->get('admin::app.sales.orders.create.cart.items.excl-tax'); ?>

                                    <span class="font-medium">{{ cart.formatted_sub_total }}</span>
                                </span>
                            </template>

                            <template v-else>
                                {{ "<?php echo app('translator')->get('admin::app.sales.orders.create.cart.items.sub-total', ['sub_total' => 'replace']); ?>".replace('replace', cart.formatted_sub_total) }}
                            </template>
                        </p>
                    </template>

                    <button
                        class="secondary-button"
                        @click="$refs.searchProductDrawer.open()"
                    >
                        <?php echo app('translator')->get('admin::app.sales.orders.create.cart.items.add-product'); ?>
                    </button>
                </div>
            </div>

            <!-- Order items -->
            <div
                class="grid"
                v-if="cart.items.length"
            >
                <div
                    class="row grid gap-4 border-b bg-white p-4 transition-all hover:bg-gray-50 dark:border-gray-800 dark:bg-gray-900 dark:hover:bg-gray-950"
                    v-for="item in cart.items"
                >
                    <!-- Item Information -->
                    <div class="flex justify-between gap-2.5">
                        <div class="flex gap-2.5">
                            <!-- Image -->
                            <div
                                class="relative h-[60px] max-h-[60px] w-full max-w-[60px] overflow-hidden rounded"
                                :class="{'overflow-hidden rounded border border-dashed border-gray-300 dark:border-gray-800 dark:mix-blend-exclusion dark:invert': ! item.product.images.length}"
                            >
                                <template v-if="! item.product.images.length">
                                    <img
                                        class="relative h-[60px] max-h-[60px] w-full max-w-[60px] rounded" 
                                        src="<?php echo e(bagisto_asset('images/product-placeholders/front.svg')); ?>"
                                    >

                                    <p class="absolute bottom-1.5 w-full text-center text-[6px] font-semibold text-gray-400">
                                        <?php echo app('translator')->get('admin::app.catalog.products.edit.types.grouped.image-placeholder'); ?>
                                    </p>
                                </template>

                                <template v-else>
                                    <img
                                        class="relative h-[60px] max-h-[60px] w-full max-w-[60px] rounded" 
                                        :src="item.product.images[0].url"
                                    >
                                </template>
                            </div>

                            <div class="flex flex-col gap-1.5">
                                <!-- Item Name -->
                                <p class="whitespace-nowrap text-base font-semibold text-gray-800 dark:text-white">
                                    {{ item.name }}
                                </p>

                                <!-- Item SKU -->
                                <p class="text-gray-600 dark:text-gray-300">
                                    {{ "<?php echo app('translator')->get('admin::app.sales.orders.create.cart.items.sku', ['sku' => ':replace']); ?>".replace(':replace', item.sku) }}
                                </p>

                                <p class="text-gray-600 dark:text-gray-300">
                                    {{ "<?php echo app('translator')->get('admin::app.sales.orders.create.cart.items.amount-per-unit', ['amount' => ':replaceAmount', 'qty' => ':replaceQty']); ?>".replace(':replaceAmount', item.formatted_price).replace(':replaceQty', item.quantity) }}
                                </p>

                                <!-- Item Options -->
                                <div
                                    class="grid select-none gap-x-2.5 gap-y-1.5"
                                    v-if="item.options.length"
                                >
                                    <!-- Details Toggler -->
                                    <p
                                        class="flex cursor-pointer items-center gap-1 text-sm text-gray-800 dark:text-white"
                                        @click="item.option_show = ! item.option_show"
                                    >
                                        <?php echo app('translator')->get('admin::app.sales.orders.create.cart.items.see-details'); ?>

                                        <span
                                            class="text-2xl"
                                            :class="{'icon-arrow-up': item.option_show, 'icon-arrow-down': ! item.option_show}"
                                        ></span>
                                    </p>

                                    <div
                                        class="grid w-full gap-2"
                                        v-show="item.option_show"
                                    >
                                        <div v-for="option in item.options">
                                            <p class="text-sm text-gray-600 dark:text-white">
                                                {{ option.attribute_name + ':' }}
                                            </p>

                                            <p class="text-sm font-medium text-gray-800 dark:text-white">
                                                {{ option.option_label }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col gap-2">
                            <p class="flex flex-col gap-1 text-right text-base font-semibold text-gray-800 dark:text-white">
                                <template v-if="displayTax.subtotal == 'including_tax'">
                                    {{ item.formatted_total_incl_tax }}
                                </template>

                                <template v-else-if="displayTax.subtotal == 'both'">
                                    {{ item.formatted_total_incl_tax }}

                                    <span class="text-xs font-normal">
                                        <?php echo app('translator')->get('admin::app.sales.orders.create.cart.items.excl-tax'); ?>

                                        <span class="font-medium">
                                            {{ item.formatted_total }}
                                        </span>
                                    </span>
                                </template>

                                <template v-else>
                                    {{ item.formatted_total }}
                                </template>
                            </p>

                            <?php if (isset($component)) { $__componentOriginal983b1d701666b336441f5e6ffe588221 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal983b1d701666b336441f5e6ffe588221 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.quantity-changer.index','data' => [':name' => '\'qty[\' + item.id + \']\'',':value' => 'item.quantity','class' => 'w-max gap-x-4 rounded-l px-4 py-1','@change' => 'updateItem(item, $event)']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::quantity-changer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([':name' => '\'qty[\' + item.id + \']\'',':value' => 'item.quantity','class' => 'w-max gap-x-4 rounded-l px-4 py-1','@change' => 'updateItem(item, $event)']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal983b1d701666b336441f5e6ffe588221)): ?>
<?php $attributes = $__attributesOriginal983b1d701666b336441f5e6ffe588221; ?>
<?php unset($__attributesOriginal983b1d701666b336441f5e6ffe588221); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal983b1d701666b336441f5e6ffe588221)): ?>
<?php $component = $__componentOriginal983b1d701666b336441f5e6ffe588221; ?>
<?php unset($__componentOriginal983b1d701666b336441f5e6ffe588221); ?>
<?php endif; ?>
                        </div>
                    </div>

                    <!-- Item Actions -->
                    <div class="flex justify-end gap-2.5">
                        <p
                            class="cursor-pointer text-red-600 transition-all hover:underline"
                            @click="removeItem(item)"
                        >
                            <?php echo app('translator')->get('admin::app.sales.orders.create.cart.items.delete'); ?>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Empty Items Box -->
            <div
                class="grid justify-center justify-items-center gap-3.5 px-2.5 py-10"
                v-else
            >
                <img src="<?php echo e(bagisto_asset('images/icon-add-product.svg')); ?>" class="h-20 w-20 dark:mix-blend-exclusion dark:invert">
                
                <div class="flex flex-col items-center gap-1.5">
                    <p class="text-base font-semibold text-gray-400">
                        <?php echo app('translator')->get('admin::app.sales.orders.create.cart.items.empty-title'); ?>
                    </p>

                    <p class="text-gray-400">
                        <?php echo app('translator')->get('admin::app.sales.orders.create.cart.items.empty-description'); ?>
                    </p>
                </div>
            </div>

            <!-- Search Drawer -->
            <?php if (isset($component)) { $__componentOriginal9bfb526197f1d7304e7fade44c26fbb8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9bfb526197f1d7304e7fade44c26fbb8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.drawer.index','data' => ['ref' => 'searchProductDrawer','@close' => 'searchTerm = \'\'; searchedProducts = [];']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::drawer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['ref' => 'searchProductDrawer','@close' => 'searchTerm = \'\'; searchedProducts = [];']); ?>
                <!-- Drawer Header -->
                 <?php $__env->slot('header', null, []); ?> 
                    <div class="grid gap-5">
                        <p class="text-xl font-medium dark:text-white">
                            <?php echo app('translator')->get('admin::app.sales.orders.create.cart.items.search.title'); ?>
                        </p>

                        <div class="relative w-full">
                            <input
                                type="text"
                                class="block w-full rounded-lg border bg-white py-1.5 leading-6 text-gray-600 transition-all hover:border-gray-400 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300 ltr:pl-3 ltr:pr-10 rtl:pl-10 rtl:pr-3"
                                placeholder="Search by name"
                                v-model.lazy="searchTerm"
                                v-debounce="500"
                            />

                            <template v-if="isSearching">
                                <img
                                    class="absolute top-2.5 h-5 w-5 animate-spin ltr:right-3 rtl:left-3"
                                    src="<?php echo e(bagisto_asset('images/spinner.svg')); ?>"
                                />
                            </template>

                            <template v-else>
                                <span class="icon-search pointer-events-none absolute top-1.5 flex items-center text-2xl ltr:right-3 rtl:left-3"></span>
                            </template>
                        </div>
                    </div>
                 <?php $__env->endSlot(); ?>

                <!-- Drawer Content -->
                 <?php $__env->slot('content', null, ['class' => '!p-0']); ?> 
                    <div
                        class="grid"
                        v-if="searchedProducts.length"
                    >
                        <div
                            class="flex justify-between gap-2.5 border-b border-slate-300 px-4 py-6 dark:border-gray-800"
                            v-for="product in searchedProducts"
                        >
                            <!-- Information -->
                            <div class="flex gap-2.5">
                                <!-- Image -->
                                <div
                                    class="relative h-[60px] max-h-[60px] w-full max-w-[60px] overflow-hidden rounded"
                                    :class="{'border border-dashed border-gray-300 dark:border-gray-800 dark:mix-blend-exclusion dark:invert': ! product.images.length}"
                                >
                                    <template v-if="! product.images.length">
                                        <img
                                            class="relative h-[60px] max-h-[60px] w-full max-w-[60px] rounded" 
                                            src="<?php echo e(bagisto_asset('images/product-placeholders/front.svg')); ?>"
                                        >
                                    
                                        <p class="absolute bottom-1.5 w-full text-center text-[6px] font-semibold text-gray-400">
                                            <?php echo app('translator')->get('admin::app.sales.orders.create.cart.items.search.product-image'); ?>
                                        </p>
                                    </template>

                                    <template v-else>
                                        <img
                                            class="relative h-[60px] max-h-[60px] w-full max-w-[60px] rounded"
                                            :src="product.images[0].url"
                                        >
                                    </template>
                                </div>

                                <!-- Details -->
                                <div class="grid place-content-start gap-1.5">
                                    <p class="break-all text-base font-semibold text-gray-800 dark:text-white">
                                        {{ product.name }}
                                    </p>

                                    <p class="text-gray-600 dark:text-gray-300">
                                        {{ "<?php echo app('translator')->get('admin::app.sales.orders.create.cart.items.search.sku'); ?>".replace(':sku', product.sku) }}
                                    </p>

                                    <p class="text-green-600">
                                        {{ "<?php echo app('translator')->get('admin::app.sales.orders.create.cart.items.search.available-qty'); ?>".replace(':qty', availbleQty(product)) }}
                                    </p>
                                </div>
                            </div>

                            <!-- Actions -->
                            <?php if (isset($component)) { $__componentOriginal81b4d293d9113446bb908fc8aef5c8f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal81b4d293d9113446bb908fc8aef5c8f6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.index','data' => ['vSlot' => '{ meta, errors, handleSubmit }','as' => 'div']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['v-slot' => '{ meta, errors, handleSubmit }','as' => 'div']); ?>
                                <form @submit="handleSubmit($event, addToCart)">
                                    <div class="grid place-content-start gap-2 text-right">
                                        <p class="font-semibold text-gray-800 dark:text-white">
                                            {{ product.formatted_price }}
                                        </p>

                                        <?php if (isset($component)) { $__componentOriginal7b1bc76a00ab5e7f1bf2c6429dae85a3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7b1bc76a00ab5e7f1bf2c6429dae85a3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.index','data' => ['class' => '!mb-0']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => '!mb-0']); ?>
                                            <?php if (isset($component)) { $__componentOriginal8378211f70f8c39b16d47cecdac9c7c8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8378211f70f8c39b16d47cecdac9c7c8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.label','data' => ['class' => 'required justify-end']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'required justify-end']); ?>
                                                <?php echo app('translator')->get('admin::app.sales.orders.create.cart.items.search.qty'); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.control','data' => ['type' => 'hidden','name' => 'product_id',':value' => 'product.id']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'hidden','name' => 'product_id',':value' => 'product.id']); ?>
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

                                            <?php if (isset($component)) { $__componentOriginal53af403f6b2179a3039d488b8ab2a267 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53af403f6b2179a3039d488b8ab2a267 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.control','data' => ['type' => 'text','name' => 'qty','class' => '!w-20 !px-2 !py-1.5','value' => '1','rules' => 'required|numeric|min_value:1','label' => trans('admin::app.sales.orders.create.cart.items.search.qty'),'placeholder' => trans('admin::app.sales.orders.create.cart.items.search.qty')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'qty','class' => '!w-20 !px-2 !py-1.5','value' => '1','rules' => 'required|numeric|min_value:1','label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('admin::app.sales.orders.create.cart.items.search.qty')),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('admin::app.sales.orders.create.cart.items.search.qty'))]); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.error','data' => ['name' => 'qty']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'qty']); ?>
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

                                        <button
                                            class="cursor-pointer text-sm text-blue-600 transition-all hover:underline"
                                            :disabled="! product.is_saleable"
                                        >
                                            <?php echo app('translator')->get('admin::app.sales.orders.create.cart.items.search.add-to-cart'); ?>
                                        </button>
                                    </div>
                                </form>
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
                    </div>

                    <!-- For Empty Variations -->
                    <div
                        class="grid justify-center justify-items-center gap-3.5 px-2.5 py-10"
                        v-else
                    >
                        <!-- Placeholder Image -->
                        <img
                            src="<?php echo e(bagisto_asset('images/icon-add-product.svg')); ?>"
                            class="h-20 w-20 dark:mix-blend-exclusion dark:invert"
                        />

                        <!-- Add Variants Information -->
                        <div class="flex flex-col items-center gap-1.5">
                            <p class="text-base font-semibold text-gray-400">
                                <?php echo app('translator')->get('admin::app.sales.orders.create.cart.items.search.empty-title'); ?>
                            </p>

                            <p class="text-gray-400">
                                <?php echo app('translator')->get('admin::app.sales.orders.create.cart.items.search.empty-info'); ?>
                            </p>
                        </div>
                    </div>
                 <?php $__env->endSlot(); ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9bfb526197f1d7304e7fade44c26fbb8)): ?>
<?php $attributes = $__attributesOriginal9bfb526197f1d7304e7fade44c26fbb8; ?>
<?php unset($__attributesOriginal9bfb526197f1d7304e7fade44c26fbb8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9bfb526197f1d7304e7fade44c26fbb8)): ?>
<?php $component = $__componentOriginal9bfb526197f1d7304e7fade44c26fbb8; ?>
<?php unset($__componentOriginal9bfb526197f1d7304e7fade44c26fbb8); ?>
<?php endif; ?>
        </div>
    </script>

    <script type="module">
        app.component('v-cart-items', {
            template: '#v-cart-items-template',

            props: ['cart', 'isAddingToCart'],

            emits: ['add-to-cart', 'remove-from-cart'],

            data() {
                return {
                    displayTax: {
                        prices: "<?php echo e(core()->getConfigData('sales.taxes.shopping_cart.display_prices')); ?>",

                        subtotal: "<?php echo e(core()->getConfigData('sales.taxes.shopping_cart.display_subtotal')); ?>",
                    },

                    searchTerm: '',

                    searchedProducts: [],

                    isSearching: false,

                    isUpdating: false,
                };
            },

            watch: {
                searchTerm: function(newVal, oldVal) {
                    this.search();
                }
            },

            methods: {
                search() {
                    if (this.searchTerm.length <= 1) {
                        this.searchedProducts = [];

                        return;
                    }

                    this.isSearching = true;

                    let self = this;
                    
                    this.$axios.get("<?php echo e(route('admin.catalog.products.search')); ?>", {
                            params: {
                                query: this.searchTerm,
                                customer_id: this.cart.customer_id
                            }
                        })
                        .then(function(response) {
                            self.isSearching = false;

                            self.searchedProducts = response.data.data;
                        })
                        .catch(function (error) {
                        });
                },

                addToCart(params) {
                    this.$emit('add-to-cart', {
                        product: this.searchedProducts.find(product => product.id == params.product_id),
                        qty: params.qty
                    });

                    this.$refs.searchProductDrawer.close();
                },

                removeItem(item) {
                    this.$emitter.emit('open-confirm-modal', {
                        agree: () => {
                            this.$axios.delete("<?php echo e(route('admin.sales.cart.items.destroy', $cart->id)); ?>", {
                                data: {
                                    cart_item_id: item.id
                                }
                            })
                                .then(response => {
                                    if (! response.data.data) {
                                        window.location.reload();

                                        return;
                                    }

                                    this.$emit('remove-from-cart', response.data.data);

                                    this.$emitter.emit('add-flash', { type: 'success', message: response.data.message });
                                })
                                .catch(error => {});
                        }
                    });
                },

                updateItem(item, qty) {
                    this.isUpdating = true;

                    let params = {
                        qty: {
                            [item.id]: qty
                        }
                    };

                    this.$axios.put("<?php echo e(route('admin.sales.cart.items.update', $cart->id)); ?>", params)
                        .then(response => {
                            this.$emit('cart-item-updated', response.data.data);

                            this.$emitter.emit('add-flash', { type: 'success', message: response.data.message });

                            this.isUpdating = false;

                        })
                        .catch(error => {
                            this.isUpdating = false;
                        });
                },

                availbleQty(product) {
                    let qty = 0;

                    product.inventories.forEach(function (inventory) {
                        qty += inventory.qty;
                    });

                    return qty;
                }
            }
        });
    </script>
<?php $__env->stopPush(); endif; ?><?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Admin\src/resources/views/sales/orders/create/cart/items.blade.php ENDPATH**/ ?>