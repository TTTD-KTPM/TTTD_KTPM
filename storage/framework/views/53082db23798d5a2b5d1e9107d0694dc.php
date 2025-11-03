<?php echo view_render_event('bagisto.admin.sales.order.create.cart.summary.before'); ?>


<v-cart-summary
    :cart="cart"
    @coupon-applied="setCart"
    @coupon-removed="setCart"
></v-cart-summary>

<?php echo view_render_event('bagisto.admin.sales.order.create.cart.summary.after'); ?>


<?php if (! $__env->hasRenderedOnce('af77cc20-f44b-4a5d-82d8-994ca0a6c014')): $__env->markAsRenderedOnce('af77cc20-f44b-4a5d-82d8-994ca0a6c014');
$__env->startPush('scripts'); ?>
    <script
        type="text/x-template"
        id="v-cart-summary-template"
    >
        <div
            class="box-shadow rounded bg-white dark:bg-gray-900"
            id="review-step-container"
        >
            <div class="flex items-center border-b p-4 dark:border-gray-800">
                <p class="text-base font-semibold text-gray-800 dark:text-white">
                    <?php echo app('translator')->get('admin::app.sales.orders.create.cart.summary.title'); ?>
                </p>
            </div>

            <!-- Cart Totals -->
            <div class="grid w-full justify-end gap-2.5 border-b p-4 dark:border-gray-800">
                <div class="grid gap-4">
                    <!-- Sub Total -->
                    <?php echo view_render_event('bagisto.admin.sales.order.create.left_component.summary.sub_total.before'); ?>


                    <template v-if="displayTax.subtotal == 'including_tax'">
                        <div class="row grid grid-cols-2 grid-rows-1 justify-between gap-4 text-right">
                            <p class="text-base font-medium text-gray-600 dark:text-gray-300">
                                <?php echo app('translator')->get('admin::app.sales.orders.create.cart.summary.sub-total'); ?>
                            </p>

                            <p class="text-base font-medium text-gray-600 dark:text-gray-300">
                                {{ cart.formatted_sub_total_incl_tax }}
                            </p>
                        </div>
                    </template>

                    <template v-else-if="displayTax.subtotal == 'both'">
                        <div class="row grid grid-cols-2 grid-rows-1 justify-between gap-4 text-right">
                            <p class="text-base font-medium text-gray-600 dark:text-gray-300">
                                <?php echo app('translator')->get('admin::app.sales.orders.create.cart.summary.sub-total-excl-tax'); ?>
                            </p>

                            <p class="text-base font-medium text-gray-600 dark:text-gray-300">
                                {{ cart.formatted_sub_total }}
                            </p>
                        </div>
                        
                        <div class="row grid grid-cols-2 grid-rows-1 justify-between gap-4 text-right">
                            <p class="text-base font-medium text-gray-600 dark:text-gray-300">
                                <?php echo app('translator')->get('admin::app.sales.orders.create.cart.summary.sub-total-incl-tax'); ?>
                            </p>

                            <p class="text-base font-medium text-gray-600 dark:text-gray-300">
                                {{ cart.formatted_sub_total_incl_tax }}
                            </p>
                        </div>
                    </template>

                    <template v-else>
                        <div class="row grid grid-cols-2 grid-rows-1 justify-between gap-4 text-right">
                            <p class="text-base font-medium text-gray-600 dark:text-gray-300">
                                <?php echo app('translator')->get('admin::app.sales.orders.create.cart.summary.sub-total'); ?>
                            </p>

                            <p class="text-base font-medium text-gray-600 dark:text-gray-300">
                                {{ cart.formatted_sub_total }}
                            </p>
                        </div>
                    </template>

                    <?php echo view_render_event('bagisto.admin.sales.order.create.left_component.summary.sub_total.after'); ?>



                    <!-- Taxes -->
                    <?php echo view_render_event('bagisto.admin.sales.order.create.left_component.summary.tax.before'); ?>


                    <div
                        class="row grid grid-cols-2 grid-rows-1 justify-between gap-4 text-right"
                        v-for="(amount, index) in cart.tax_amounts"
                        v-if="parseFloat(cart.tax_total)"
                    >
                        <p class="text-base font-medium text-gray-600 dark:text-gray-300">
                            <?php echo app('translator')->get('admin::app.sales.orders.create.cart.summary.tax'); ?> ({{ index }})
                        </p>

                        <p class="text-base font-medium text-gray-600 dark:text-gray-300">
                            {{ amount }}
                        </p>
                    </div>

                    <?php echo view_render_event('bagisto.admin.sales.order.create.left_component.summary.tax.after'); ?>


                    <!-- Shipping Rates -->
                    <?php echo view_render_event('bagisto.admin.sales.order.create.left_component.summary.delivery_charges.before'); ?>


                    <template v-if="displayTax.shipping == 'including_tax'">
                        <div class="row grid grid-cols-2 grid-rows-1 justify-between gap-4 text-right">
                            <p class="text-base font-medium text-gray-600 dark:text-gray-300">
                                <?php echo app('translator')->get('admin::app.sales.orders.create.cart.summary.shipping-amount'); ?>
                            </p>

                            <p class="text-base font-medium text-gray-600 dark:text-gray-300">
                                {{ cart.formatted_shipping_amount_incl_tax }}
                            </p>
                        </div>
                    </template>

                    <template v-else-if="displayTax.shipping == 'both'">
                        <div class="row grid grid-cols-2 grid-rows-1 justify-between gap-4 text-right">
                            <p class="text-base font-medium text-gray-600 dark:text-gray-300">
                                <?php echo app('translator')->get('admin::app.sales.orders.create.cart.summary.shipping-amount-excl-tax'); ?>
                            </p>

                            <p class="text-base font-medium text-gray-600 dark:text-gray-300">
                                {{ cart.formatted_shipping_amount }}
                            </p>
                        </div>
                        
                        <div class="row grid grid-cols-2 grid-rows-1 justify-between gap-4 text-right">
                            <p class="text-base font-medium text-gray-600 dark:text-gray-300">
                                <?php echo app('translator')->get('admin::app.sales.orders.create.cart.summary.shipping-amount-incl-tax'); ?>
                            </p>

                            <p class="text-base font-medium text-gray-600 dark:text-gray-300">
                                {{ cart.formatted_shipping_amount_incl_tax }}
                            </p>
                        </div>
                    </template>

                    <template v-else>
                        <div class="row grid grid-cols-2 grid-rows-1 justify-between gap-4 text-right">
                            <p class="text-base font-medium text-gray-600 dark:text-gray-300">
                                <?php echo app('translator')->get('admin::app.sales.orders.create.cart.summary.shipping-amount'); ?>
                            </p>

                            <p class="text-base font-medium text-gray-600 dark:text-gray-300">
                                {{ cart.formatted_shipping_amount }}
                            </p>
                        </div>
                    </template>



                    <?php echo view_render_event('bagisto.admin.sales.order.create.left_component.summary.delivery_charges.after'); ?>


                    <!-- Discount -->
                    <?php echo view_render_event('bagisto.admin.sales.order.create.left_component.summary.discount_amount.before'); ?>


                    <div
                        class="row grid grid-cols-2 grid-rows-1 justify-between gap-4 text-right"
                        v-if="parseFloat(cart.discount_amount)"
                    >
                        <p class="text-base font-medium text-gray-600 dark:text-gray-300">
                            <?php echo app('translator')->get('admin::app.sales.orders.create.cart.summary.discount-amount'); ?>
                        </p>

                        <p class="text-base font-medium text-gray-600 dark:text-gray-300">
                            {{ cart.formatted_discount_amount }}
                        </p>
                    </div>

                    <?php echo view_render_event('bagisto.admin.sales.order.create.left_component.summary.discount_amount.after'); ?>



                    <!-- Discount -->
                    <?php echo view_render_event('bagisto.admin.sales.order.create.left_component.summary.coupon.before'); ?>


                    <div class="row grid grid-cols-2 grid-rows-1 justify-items-end gap-4 text-right">
                        <p class="text-base font-medium text-gray-600 dark:text-gray-300">
                            <?php echo app('translator')->get('admin::app.sales.orders.create.cart.summary.apply-coupon'); ?>
                        </p>

                        <template v-if="cart.coupon_code">
                            <p class="flex items-center gap-1 text-base font-medium text-green-600">
                                {{ cart.coupon_code }}

                                <span
                                    class="icon-cancel cursor-pointer text-2xl"
                                    @click="destroyCoupon"
                                >
                                </span>
                            </p>
                        </template>

                        <template v-else>
                            <p class="text-base font-medium text-gray-600">
                                <span
                                    class="cursor-pointer text-blue-600"
                                    @click="$refs.couponModel.open()"
                                >
                                    <?php echo app('translator')->get('admin::app.sales.orders.create.cart.summary.apply-coupon'); ?>
                                </span>
                            </p>
                        </template>
                    </div>

                    <?php echo view_render_event('bagisto.admin.sales.order.create.left_component.summary.coupon.after'); ?>


                    <?php echo view_render_event('bagisto.admin.sales.order.create.left_component.summary.coupon.after'); ?>


                    <!-- Cart Grand Total -->
                    <?php echo view_render_event('bagisto.admin.sales.order.create.left_component.summary.grand_total.before'); ?>


                    <div class="row grid grid-cols-2 grid-rows-1 justify-between gap-4 text-right">
                        <p class="text-lg font-semibold dark:text-white">
                            <?php echo app('translator')->get('admin::app.sales.orders.create.cart.summary.grand-total'); ?>
                        </p>

                        <p class="text-lg font-semibold dark:text-white">
                            {{ cart.formatted_grand_total }}
                        </p>
                    </div>

                    <?php echo view_render_event('bagisto.admin.sales.order.create.left_component.summary.grand_total.after'); ?>

                </div>
            </div>

            <div class="flex w-full justify-end p-4">
                <?php if (isset($component)) { $__componentOriginal989f82b74d189698d771eef298c02d90 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal989f82b74d189698d771eef298c02d90 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.button.index','data' => ['type' => 'button','class' => 'primary-button w-max px-11 py-3','title' => trans('shop::app.checkout.onepage.summary.place-order'),':disabled' => 'isPlacingOrder',':loading' => 'isPlacingOrder','@click' => 'placeOrder']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'button','class' => 'primary-button w-max px-11 py-3','title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('shop::app.checkout.onepage.summary.place-order')),':disabled' => 'isPlacingOrder',':loading' => 'isPlacingOrder','@click' => 'placeOrder']); ?>
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
            </div>

            <!-- Apply Coupon Form -->
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
                <!-- Apply coupon form -->
                <form @submit="handleSubmit($event, applyCoupon)">
                    <?php echo view_render_event('bagisto.admin.sales.order.create.left_component.summary.coupon_form_controls.before'); ?>


                    <!-- Apply coupon modal -->
                    <?php if (isset($component)) { $__componentOriginal09768308838b828c7799162f44758281 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal09768308838b828c7799162f44758281 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.modal.index','data' => ['ref' => 'couponModel']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['ref' => 'couponModel']); ?>
                        <!-- Modal Header -->
                         <?php $__env->slot('header', null, ['class' => 'dark:text-white']); ?> 
                            <?php echo app('translator')->get('admin::app.sales.orders.create.cart.summary.apply-coupon'); ?>
                         <?php $__env->endSlot(); ?>

                        <!-- Modal Content -->
                         <?php $__env->slot('content', null, []); ?> 
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
                                <?php if (isset($component)) { $__componentOriginal53af403f6b2179a3039d488b8ab2a267 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53af403f6b2179a3039d488b8ab2a267 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.control','data' => ['type' => 'text','name' => 'code','rules' => 'required','placeholder' => trans('admin::app.sales.orders.create.cart.summary.enter-your-code')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'code','rules' => 'required','placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('admin::app.sales.orders.create.cart.summary.enter-your-code'))]); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.error','data' => ['controlName' => 'code']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['control-name' => 'code']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.button.index','data' => ['class' => 'primary-button','title' => trans('admin::app.sales.orders.create.cart.summary.apply-coupon'),':loading' => 'isLoading',':disabled' => 'isLoading']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'primary-button','title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('admin::app.sales.orders.create.cart.summary.apply-coupon')),':loading' => 'isLoading',':disabled' => 'isLoading']); ?>
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

                    <?php echo view_render_event('bagisto.admin.sales.order.create.left_component.summary.coupon_form_controls.after'); ?>

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
    </script>

    <script type="module">
        app.component('v-cart-summary', {
            template: '#v-cart-summary-template',

            props: ['cart'],

            data() {
                return {
                    displayTax: {
                        prices: "<?php echo e(core()->getConfigData('sales.taxes.shopping_cart.display_prices')); ?>",

                        subtotal: "<?php echo e(core()->getConfigData('sales.taxes.shopping_cart.display_subtotal')); ?>",
                        
                        shipping: "<?php echo e(core()->getConfigData('sales.taxes.shopping_cart.display_shipping_amount')); ?>",
                    },
                    
                    isLoading: false,

                    isPlacingOrder: false,
                }
            },

            methods: {
                applyCoupon(params, { resetForm }) {
                    this.isLoading = true;

                    this.$axios.post("<?php echo e(route('admin.sales.cart.store_coupon', $cart->id)); ?>", params)
                        .then((response) => {
                            this.isLoading = false;

                            this.$emit('coupon-applied', response.data.data);
                  
                            this.$emitter.emit('add-flash', { type: 'success', message: response.data.message });

                            this.$refs.couponModel.toggle();

                            resetForm();
                        })
                        .catch((error) => {
                            this.isLoading = false;

                            this.$refs.couponModel.toggle();

                            if ([400, 422].includes(error.response.request.status)) {
                                this.$emitter.emit('add-flash', { type: 'warning', message: error.response.data.message });

                                resetForm();

                                return;
                            }

                            this.$emitter.emit('add-flash', { type: 'error', message: error.response.data.message });
                        });
                },

                destroyCoupon() {
                    this.$axios.delete("<?php echo e(route('admin.sales.cart.remove_coupon', $cart->id)); ?>", {
                            '_token': "<?php echo e(csrf_token()); ?>"
                        })
                        .then((response) => {
                            this.$emit('coupon-removed', response.data.data);

                            this.$emitter.emit('add-flash', { type: 'success', message: response.data.message });
                        })
                        .catch(error => console.log(error));
                },

                placeOrder() {
                    this.isPlacingOrder = true;

                    this.$axios.post('<?php echo e(route('admin.sales.orders.store', $cart->id)); ?>')
                        .then(response => {
                            if (response.data.data.redirect) {
                                window.location.href = response.data.data.redirect_url;
                            } else {
                                window.location.href = '<?php echo e(route('shop.checkout.onepage.success')); ?>';
                            }

                            this.isPlacingOrder = false;
                        })
                        .catch(error => {
                            this.isPlacingOrder = false

                            this.$emitter.emit('add-flash', { type: 'error', message: error.response.data.message });
                        });
                }
            }
        });
    </script>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Admin\src\Resources\views\sales\orders\create\cart\summary.blade.php ENDPATH**/ ?>