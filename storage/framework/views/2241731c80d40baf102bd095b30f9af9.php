<?php echo view_render_event('bagisto.admin.sales.order.create.cart.payment.before'); ?>


<v-cart-payment-methods
    :methods="paymentMethods"
    @processing="stepForward"
    @processed="stepProcessed"
>
    <!-- Payment Method shimmer Effect -->
    <?php if (isset($component)) { $__componentOriginalb6e697ed23e9c1b23820f91ff46b1399 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb6e697ed23e9c1b23820f91ff46b1399 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.shimmer.sales.orders.create.cart.payment','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::shimmer.sales.orders.create.cart.payment'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb6e697ed23e9c1b23820f91ff46b1399)): ?>
<?php $attributes = $__attributesOriginalb6e697ed23e9c1b23820f91ff46b1399; ?>
<?php unset($__attributesOriginalb6e697ed23e9c1b23820f91ff46b1399); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb6e697ed23e9c1b23820f91ff46b1399)): ?>
<?php $component = $__componentOriginalb6e697ed23e9c1b23820f91ff46b1399; ?>
<?php unset($__componentOriginalb6e697ed23e9c1b23820f91ff46b1399); ?>
<?php endif; ?>
</v-cart-payment-methods>

<?php echo view_render_event('bagisto.admin.sales.order.create.cart.payment.after'); ?>


<?php if (! $__env->hasRenderedOnce('2575c905-6627-40f9-88f8-6f69a3a8f1aa')): $__env->markAsRenderedOnce('2575c905-6627-40f9-88f8-6f69a3a8f1aa');
$__env->startPush('scripts'); ?>
    <script
        type="text/x-template"
        id="v-cart-payment-methods-template"
    >
        <div
            class="box-shadow rounded bg-white dark:bg-gray-900"
            id="payment-step-container"
        >
            <div class="flex items-center border-b p-4 dark:border-gray-800">
                <p class="text-base font-semibold text-gray-800 dark:text-white">
                    <?php echo app('translator')->get('admin::app.sales.orders.create.cart.payment.title'); ?>
                </p>
            </div>

            <!-- Payment Cards -->
            <template v-if="! methods">
                <!-- Payment Method Shimmer Effect -->
                <?php if (isset($component)) { $__componentOriginalb6e697ed23e9c1b23820f91ff46b1399 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb6e697ed23e9c1b23820f91ff46b1399 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.shimmer.sales.orders.create.cart.payment','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::shimmer.sales.orders.create.cart.payment'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb6e697ed23e9c1b23820f91ff46b1399)): ?>
<?php $attributes = $__attributesOriginalb6e697ed23e9c1b23820f91ff46b1399; ?>
<?php unset($__attributesOriginalb6e697ed23e9c1b23820f91ff46b1399); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb6e697ed23e9c1b23820f91ff46b1399)): ?>
<?php $component = $__componentOriginalb6e697ed23e9c1b23820f91ff46b1399; ?>
<?php unset($__componentOriginalb6e697ed23e9c1b23820f91ff46b1399); ?>
<?php endif; ?>
            </template>

            <template v-else>
                <div class="grid">
                    <?php echo view_render_event('bagisto.admin.sales.order.create.cart.payment.before'); ?>


                    <label
                        class="flex cursor-pointer items-center gap-2 border-b p-4 transition-all hover:bg-gray-50 dark:border-gray-800 dark:hover:bg-gray-950"
                        v-for="payment in methods"
                        :for="payment.method"
                    >
                        <?php if (isset($component)) { $__componentOriginal53af403f6b2179a3039d488b8ab2a267 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53af403f6b2179a3039d488b8ab2a267 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.control','data' => ['type' => 'radio','name' => 'payment_method',':id' => 'payment.method',':for' => 'payment.method',':value' => 'payment.method','@change' => 'store(payment)']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'radio','name' => 'payment_method',':id' => 'payment.method',':for' => 'payment.method',':value' => 'payment.method','@change' => 'store(payment)']); ?>
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

                        <p class="text-base font-medium text-gray-600 dark:text-gray-300">
                            {{ payment.method_title }}
                        </p>
                    </label>

                    <?php echo view_render_event('bagisto.admin.sales.order.create.cart.payment.after'); ?>

                </div>
            </template>
        </div>
    </script>

    <script type="module">
        app.component('v-cart-payment-methods', {
            template: '#v-cart-payment-methods-template',

            props: {
                methods: {
                    type: Object,
                    required: true,
                    default: () => null,
                },
            },

            emits: ['processing', 'processed'],

            methods: {
                store(selectedMethod) {
                    this.$emit('processing', 'review');

                    this.$axios.post("<?php echo e(route('admin.sales.cart.payment_methods.store', $cart->id)); ?>", {
                            payment: selectedMethod
                        })
                        .then(response => {
                            this.$emit('processed', response.data.cart);
                        })
                        .catch(error => {
                            this.$emit('processing', 'payment');

                            if (error.response.data.redirect_url) {
                                window.location.href = error.response.data.redirect_url;
                            }
                        });
                },
            },
        });
    </script>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Admin\src/resources/views/sales/orders/create/cart/payment.blade.php ENDPATH**/ ?>