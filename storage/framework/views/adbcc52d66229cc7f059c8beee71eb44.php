<?php echo view_render_event('bagisto.admin.sales.order.create.cart.shipping.before'); ?>


<v-cart-shipping-methods
    :methods="shippingMethods"
    @processing="stepForward"
    @processed="stepProcessed"
>
    <!-- Shipping Method Shimmer Effect -->
    <?php if (isset($component)) { $__componentOriginal9454bd9a3417c8f2c59ee48bd740afa1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9454bd9a3417c8f2c59ee48bd740afa1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.shimmer.sales.orders.create.cart.shipping','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::shimmer.sales.orders.create.cart.shipping'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9454bd9a3417c8f2c59ee48bd740afa1)): ?>
<?php $attributes = $__attributesOriginal9454bd9a3417c8f2c59ee48bd740afa1; ?>
<?php unset($__attributesOriginal9454bd9a3417c8f2c59ee48bd740afa1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9454bd9a3417c8f2c59ee48bd740afa1)): ?>
<?php $component = $__componentOriginal9454bd9a3417c8f2c59ee48bd740afa1; ?>
<?php unset($__componentOriginal9454bd9a3417c8f2c59ee48bd740afa1); ?>
<?php endif; ?>
</v-cart-shipping-methods>

<?php echo view_render_event('bagisto.admin.sales.order.create.cart.shipping.after'); ?>


<?php if (! $__env->hasRenderedOnce('9025217f-3a05-4736-a5fe-4c0748b7d3e3')): $__env->markAsRenderedOnce('9025217f-3a05-4736-a5fe-4c0748b7d3e3');
$__env->startPush('scripts'); ?>
    <script
        type="text/x-template"
        id="v-cart-shipping-methods-template"
    >
        <div
            class="box-shadow rounded bg-white dark:bg-gray-900"
            id="shipping-step-container"
        >
            <div class="flex items-center border-b p-4 dark:border-gray-800">
                <p class="text-base font-semibold text-gray-800 dark:text-white">
                    <?php echo app('translator')->get('admin::app.sales.orders.create.cart.shipping.title'); ?>
                </p>
            </div>

            <!-- Shipping Cards -->
            <div class="grid">
                <template v-if="! methods">
                    <!-- Shipping Method Shimmer Effect -->
                    <?php if (isset($component)) { $__componentOriginal9454bd9a3417c8f2c59ee48bd740afa1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9454bd9a3417c8f2c59ee48bd740afa1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.shimmer.sales.orders.create.cart.shipping','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::shimmer.sales.orders.create.cart.shipping'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9454bd9a3417c8f2c59ee48bd740afa1)): ?>
<?php $attributes = $__attributesOriginal9454bd9a3417c8f2c59ee48bd740afa1; ?>
<?php unset($__attributesOriginal9454bd9a3417c8f2c59ee48bd740afa1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9454bd9a3417c8f2c59ee48bd740afa1)): ?>
<?php $component = $__componentOriginal9454bd9a3417c8f2c59ee48bd740afa1; ?>
<?php unset($__componentOriginal9454bd9a3417c8f2c59ee48bd740afa1); ?>
<?php endif; ?>
                </template>

                <template v-else>
                    <template v-for="method in methods">
                        <?php echo view_render_event('bagisto.admin.sales.order.create.cart.shipping.before'); ?>


                        <label
                            class="grid cursor-pointer gap-4 border-b p-4 transition-all hover:bg-gray-50 dark:border-gray-800 dark:hover:bg-gray-950"
                            v-for="rate in method.rates"
                            :for="rate.method"
                        >
                            <div class="flex justify-between gap-4">
                                <div class="flex items-center gap-2">
                                    <?php if (isset($component)) { $__componentOriginal53af403f6b2179a3039d488b8ab2a267 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53af403f6b2179a3039d488b8ab2a267 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.control','data' => ['type' => 'radio','name' => 'shipping_method',':id' => 'rate.method',':for' => 'rate.method',':value' => 'rate.method','@change' => 'store(rate.method)']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'radio','name' => 'shipping_method',':id' => 'rate.method',':for' => 'rate.method',':value' => 'rate.method','@change' => 'store(rate.method)']); ?>
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

                                    <p class="text-base font-medium text-gray-600 dark:text-gray-200">
                                        {{ rate.method_title }}
                                    </p>
                                </div>

                                <p class="text-base text-blue-600">
                                    {{ rate.base_formatted_price }}
                                </p>
                            </div>

                            <p class="text-base text-gray-600 dark:text-gray-400">
                                {{ rate.method_description }}
                            </p>
                        </label>

                        <?php echo view_render_event('bagisto.admin.sales.order.create.cart.shipping.after'); ?>

                    </template>
                </template>
            </div>
        </div>
    </script>

    <script type="module">
        app.component('v-cart-shipping-methods', {
            template: '#v-cart-shipping-methods-template',

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
                    this.$emit('processing', 'payment');

                    this.$axios.post("<?php echo e(route('admin.sales.cart.shipping_methods.store', $cart->id)); ?>", {    
                            shipping_method: selectedMethod,
                        })
                        .then(response => {
                            if (response.data.redirect_url) {
                                window.location.href = response.data.redirect_url;
                            } else {
                                this.$emit('processed', response.data.payment_methods);
                            }
                        })
                        .catch(error => {
                            this.$emit('processing', 'shipping');

                            if (error.response.data.redirect_url) {
                                window.location.href = error.response.data.redirect_url;
                            }
                        });
                },
            },
        });
    </script>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Admin\src\Resources\views\sales\orders\create\cart\shipping.blade.php ENDPATH**/ ?>