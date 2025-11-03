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
    <!-- Title of the page -->
     <?php $__env->slot('title', null, []); ?> 
        <?php echo app('translator')->get('admin::app.sales.orders.create.title', ['name' => $cart->customer->name]); ?>
     <?php $__env->endSlot(); ?>

    <!-- Page Header -->
    <div class="flex items-center justify-between gap-4 max-sm:flex-wrap">
        <div class="grid gap-1.5">
            <p class="text-xl font-bold leading-6 text-gray-800 dark:text-white">
                <?php echo app('translator')->get('admin::app.sales.orders.create.title', ['name' => $cart->customer->name]); ?>
            </p>
        </div>

        <!-- Back Button -->
        <a
            href="<?php echo e(route('admin.sales.orders.index')); ?>"
            class="transparent-button hover:bg-gray-200 dark:text-white dark:hover:bg-gray-800"
        >
            <?php echo app('translator')->get('admin::app.sales.orders.create.back-btn'); ?>
        </a>
    </div>

    <!-- Vue JS Component -->
    <v-create-order>
        <!-- Order Create Shimmer Effect -->
        <?php if (isset($component)) { $__componentOriginal00b913d096541b9c42696ba4f578c29e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal00b913d096541b9c42696ba4f578c29e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.shimmer.sales.orders.create','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::shimmer.sales.orders.create'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal00b913d096541b9c42696ba4f578c29e)): ?>
<?php $attributes = $__attributesOriginal00b913d096541b9c42696ba4f578c29e; ?>
<?php unset($__attributesOriginal00b913d096541b9c42696ba4f578c29e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal00b913d096541b9c42696ba4f578c29e)): ?>
<?php $component = $__componentOriginal00b913d096541b9c42696ba4f578c29e; ?>
<?php unset($__componentOriginal00b913d096541b9c42696ba4f578c29e); ?>
<?php endif; ?>
    </v-create-order>

    <?php if (! $__env->hasRenderedOnce('b8c25d3b-75d9-4d3e-abdc-3dad6dca6ece')): $__env->markAsRenderedOnce('b8c25d3b-75d9-4d3e-abdc-3dad6dca6ece');
$__env->startPush('scripts'); ?>
        <script
            type="text/x-template"
            id="v-create-order-template"
        >
            <div class="mt-3.5 flex gap-2.5 max-xl:flex-wrap">
                <!-- Left Component -->
                <?php echo view_render_event('bagisto.admin.sales.order.create.left_component.before'); ?>


                <div
                    class="flex flex-1 flex-col gap-2 overflow-y-auto max-xl:flex-auto"
                    id="steps-container"
                >
                    <!-- Cart Items Component -->
                    <?php echo $__env->make('admin::sales.orders.create.cart.items', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                    <!-- Included Addresses Blade File -->
                    <template v-if="cart.items_count && ['address', 'shipping', 'payment', 'review'].includes(currentStep)">
                        <?php echo $__env->make('admin::sales.orders.create.cart.address', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    </template>

                    <!-- Included Shipping Methods Blade File -->
                    <template v-if="cart.have_stockable_items && ['shipping', 'payment', 'review'].includes(currentStep)">
                        <?php echo $__env->make('admin::sales.orders.create.cart.shipping', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    </template>

                    <!-- Included Payment Methods Blade File -->
                    <template v-if="['payment', 'review'].includes(currentStep)">
                        <?php echo $__env->make('admin::sales.orders.create.cart.payment', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    </template>

                    <!-- Included Payment Methods Blade File -->
                    <template v-if="['review'].includes(currentStep)">
                        <?php echo $__env->make('admin::sales.orders.create.cart.summary', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    </template>

                    <!-- Product Option Form -->
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
                        <form
                            @submit="handleSubmit($event, addToCart)"
                            ref="addToCartForm"
                        >
                            <?php if (isset($component)) { $__componentOriginal9bfb526197f1d7304e7fade44c26fbb8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9bfb526197f1d7304e7fade44c26fbb8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.drawer.index','data' => ['ref' => 'productConfigurationDrawer']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::drawer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['ref' => 'productConfigurationDrawer']); ?>
                                <!-- Drawer Header -->
                                 <?php $__env->slot('header', null, []); ?> 
                                    <div class="flex items-center justify-between">
                                        <p class="text-xl font-medium dark:text-white">
                                            <?php echo app('translator')->get('admin::app.sales.orders.create.configuration'); ?>
                                        </p>

                                        <button class="primary-button ltr:mr-11 rtl:ml-11">
                                            <?php echo app('translator')->get('admin::app.sales.orders.create.add-to-cart'); ?>
                                        </button>
                                    </div>
                                 <?php $__env->endSlot(); ?>

                                <!-- Drawer Content -->
                                 <?php $__env->slot('content', null, ['class' => '!p-0']); ?> 
                                    <?php echo view_render_event('bagisto.admin.sales.order.create.product_options.before'); ?>


                                    <!-- Included Simple Product Configuration Blade File -->
                                    <template v-if="selectedProductOptions.product.type == 'simple'">
                                        <?php echo $__env->make('admin::sales.orders.create.types.simple', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                    </template>

                                    <!-- Included Configurable Product Configuration Blade File -->
                                    <template v-if="selectedProductOptions.product.type == 'configurable'">
                                        <?php echo $__env->make('admin::sales.orders.create.types.configurable', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                    </template>

                                    <!-- Included Bundle Product Configuration Blade File -->
                                    <template v-if="selectedProductOptions.product.type == 'bundle'">
                                        <?php echo $__env->make('admin::sales.orders.create.types.bundle', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                    </template>

                                    <!-- Included Grouped Product Configuration Blade File -->
                                    <template v-if="selectedProductOptions.product.type == 'grouped'">
                                        <?php echo $__env->make('admin::sales.orders.create.types.grouped', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                    </template>

                                    <!-- Included Downloadable Product Configuration Blade File -->
                                    <template v-if="selectedProductOptions.product.type == 'downloadable'">
                                        <?php echo $__env->make('admin::sales.orders.create.types.downloadable', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                    </template>

                                    <!-- Included Virtual Product Configuration Blade File -->
                                    <template v-if="selectedProductOptions.product.type == 'virtual'">
                                        <?php echo $__env->make('admin::sales.orders.create.types.virtual', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                    </template>

                                    <?php echo view_render_event('bagisto.admin.sales.order.create.product_options.after'); ?>

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

                <?php echo view_render_event('bagisto.admin.sales.order.create.left_component.after'); ?>


                <!-- Right Component -->
                <?php echo view_render_event('bagisto.admin.sales.order.right_component.before'); ?>


                <div class="flex w-[360px] max-w-full flex-col gap-2 max-sm:w-full">
                    <!-- Cart Items Component -->
                    <?php echo $__env->make('admin::sales.orders.create.cart-items', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                    <!-- Wishlist Items Component -->
                    <?php echo $__env->make('admin::sales.orders.create.wishlist-items', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                    <!-- Compare Items Component -->
                    <?php echo $__env->make('admin::sales.orders.create.compare-items', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                    <!-- Recent Order Items Component -->
                    <?php echo $__env->make('admin::sales.orders.create.recent-order-items', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </div>

                <?php echo view_render_event('bagisto.admin.sales.order.create.right_component.after'); ?>

            </div>
        </script>

        <script type="module">
            app.component('v-create-order', {
                template: '#v-create-order-template',

                data() {
                    return {
                        cart: <?php echo json_encode($cart, 15, 512) ?>,

                        selectedProductOptions: null,

                        currentStep: 'address',

                        isAddingToCart: false,

                        shippingMethods: null,

                        paymentMethods: null,

                        canPlaceOrder: false,
                    };
                },

                methods: {
                    setCart(cart) {
                        this.cart = cart;
                    },

                    getCart() {
                        this.$axios.get("<?php echo e(route('admin.sales.cart.index', $cart->id)); ?>")
                            .then(response => {
                                this.cart = response.data.data;
                            })
                            .catch(error => {
                                window.location.href = "<?php echo e(route('admin.sales.orders.index')); ?>";
                            });
                    },

                    configureAddToCart(params) {
                        this.selectedProductOptions = params;

                        if (
                            params.product.is_options_required
                            && ! params.additional?.attributes
                        ) {
                            this.$refs.productConfigurationDrawer.open();

                            return;
                        }

                        this.addToCart(params);
                    },

                    addToCart(params) {
                        let formData = {};

                        if (params.additional?.attributes) {
                            formData = {
                                product_id: params.product.id,

                                quantity: params.qty,

                                ...params.additional,
                            };
                        } else {
                            formData = new FormData(this.$refs.addToCartForm);

                            formData.append('product_id', this.selectedProductOptions.product.id);

                            formData.append('quantity', this.selectedProductOptions.qty);

                            this.$refs.productConfigurationDrawer.close();
                        }

                        this.isAddingToCart = true;

                        this.$axios.post("<?php echo e(route('admin.sales.cart.items.store', $cart->id)); ?>", formData)
                            .then(response => {
                                this.isAddingToCart = false;

                                this.cart = response.data.data;

                                this.$emitter.emit('add-flash', { type: 'success', message: response.data.message });
                            })
                            .catch(error => {});
                    },

                    stepReset() {
                        this.currentStep = 'address';
                    },

                    stepForward(step) {
                        this.currentStep = step;

                        if (step == 'review') {
                            this.canPlaceOrder = true;

                            this.scrollToCurrentStep();

                            return;
                        }

                        this.canPlaceOrder = false;

                        if (this.currentStep == 'shipping') {
                            this.shippingMethods = null;
                        } else if (this.currentStep == 'payment') {
                            this.paymentMethods = null;
                        }
                    },

                    stepProcessed(data) {
                        if (this.currentStep == 'shipping') {
                            this.shippingMethods = data;
                        } else if (this.currentStep == 'payment') {
                            this.paymentMethods = data;
                        }

                        this.scrollToCurrentStep();

                        this.getCart();
                    },

                    scrollToCurrentStep() {
                        let container = document.getElementById(this.currentStep + '-step-container');

                        if (! container) {
                            return;
                        }

                        container.scrollIntoView({
                            behavior: 'smooth',
                            block: 'end'
                        });
                    },
                }
            });
        </script>
    <?php $__env->stopPush(); endif; ?>
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
<?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Admin\src\Resources\views\sales\orders\create.blade.php ENDPATH**/ ?>