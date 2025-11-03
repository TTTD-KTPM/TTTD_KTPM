<?php echo view_render_event('bagisto.admin.sales.order.create.cart_items.before'); ?>


<!-- Vue JS Component -->
<v-previous-cart-items
    :cart="cart"
    @add-to-cart="configureAddToCart($event); stepReset()"
>
    <!-- Items Shimmer Effect -->
    <?php if (isset($component)) { $__componentOriginal2ad546b86dcbe56ffecded973142dc8e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2ad546b86dcbe56ffecded973142dc8e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.shimmer.sales.orders.create.items','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::shimmer.sales.orders.create.items'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2ad546b86dcbe56ffecded973142dc8e)): ?>
<?php $attributes = $__attributesOriginal2ad546b86dcbe56ffecded973142dc8e; ?>
<?php unset($__attributesOriginal2ad546b86dcbe56ffecded973142dc8e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2ad546b86dcbe56ffecded973142dc8e)): ?>
<?php $component = $__componentOriginal2ad546b86dcbe56ffecded973142dc8e; ?>
<?php unset($__componentOriginal2ad546b86dcbe56ffecded973142dc8e); ?>
<?php endif; ?>
</v-previous-cart-items>

<?php echo view_render_event('bagisto.admin.sales.order.create.cart_items.after'); ?>



<?php if (! $__env->hasRenderedOnce('dcb9dbe1-b636-4853-a491-5c10f22124c8')): $__env->markAsRenderedOnce('dcb9dbe1-b636-4853-a491-5c10f22124c8');
$__env->startPush('scripts'); ?>
    <script
        type="text/x-template"
        id="v-previous-cart-items-template"
    >
        <template v-if="isLoading">
            <!-- Items Shimmer Effect -->
            <?php if (isset($component)) { $__componentOriginal2ad546b86dcbe56ffecded973142dc8e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2ad546b86dcbe56ffecded973142dc8e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.shimmer.sales.orders.create.items','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::shimmer.sales.orders.create.items'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2ad546b86dcbe56ffecded973142dc8e)): ?>
<?php $attributes = $__attributesOriginal2ad546b86dcbe56ffecded973142dc8e; ?>
<?php unset($__attributesOriginal2ad546b86dcbe56ffecded973142dc8e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2ad546b86dcbe56ffecded973142dc8e)): ?>
<?php $component = $__componentOriginal2ad546b86dcbe56ffecded973142dc8e; ?>
<?php unset($__componentOriginal2ad546b86dcbe56ffecded973142dc8e); ?>
<?php endif; ?>
        </template>

        <template v-else>
            <div class="box-shadow rounded bg-white dark:bg-gray-900">
                <div class="flex items-center justify-between p-4">
                    <p class="text-base font-semibold text-gray-800 dark:text-white">
                        <?php echo app('translator')->get('admin::app.sales.orders.create.cart-items.title'); ?>
                    </p>
                </div>

                <!-- cart items -->
                <div
                    class="grid"
                    v-if="items.length"
                >
                    <div
                        class="row flex gap-2.5 border-b bg-white p-4 transition-all hover:bg-gray-50 dark:border-gray-800 dark:bg-gray-900 dark:hover:bg-gray-950"
                        v-for="item in items"
                    >
                        <!-- Image -->
                        <div
                            class="relative h-[60px] max-h-[60px] w-full max-w-[60px] overflow-hidden rounded"
                            :class="{'overflow-hidden rounded border border-dashed border-gray-300 dark:border-gray-800 dark:mix-blend-exclusion dark:invert': ! item.product.images.length}"
                        >
                            <template v-if="! item.product.images.length">
                                <img src="<?php echo e(bagisto_asset('images/product-placeholders/front.svg')); ?>">
                            
                                <p class="absolute bottom-1.5 w-full text-center text-[6px] font-semibold text-gray-400">
                                    <?php echo app('translator')->get('admin::app.catalog.products.edit.types.grouped.image-placeholder'); ?>
                                </p>
                            </template>

                            <template v-else>
                                <img :src="item.product.images[0].url">
                            </template>
                        </div>

                        <!-- Item Information -->
                        <div class="grid gap-1.5">
                            <!-- Item Name -->
                            <p class="break-all text-base font-semibold text-gray-800 dark:text-white">
                                {{ item.name }}
                            </p>

                            <!-- Item SKU -->
                            <p class="text-gray-600 dark:text-gray-300">
                                {{ "<?php echo app('translator')->get('admin::app.sales.orders.create.cart-items.sku', ['sku' => ':replace']); ?>".replace(':replace', item.sku) }}
                            </p>

                            <!-- Price -->
                            <p class="flex flex-col gap-1 text-base font-semibold text-gray-800 dark:text-white">
                                <template v-if="displayTax.prices == 'including_tax'">
                                    {{ item.formatted_price_incl_tax }}
                                </template>

                                <template v-else-if="displayTax.prices == 'both'">
                                    {{ item.formatted_price_incl_tax }}
                                    
                                    <span class="text-xs font-normal">
                                        <?php echo app('translator')->get('admin::app.sales.orders.create.cart-items.excl-tax'); ?>

                                        <span class="font-medium">{{ item.formatted_price }}</span>
                                    </span>
                                </template>

                                <template v-else>
                                    {{ item.formatted_price }}
                                </template>
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
                                    <?php echo app('translator')->get('admin::app.sales.orders.create.cart-items.see-details'); ?>

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

                            <!-- Item Actions -->
                            <div class="mt-2 flex gap-2.5">
                                <p
                                    class="cursor-pointer text-red-600 transition-all hover:underline"
                                    @click="removeItem(item)"
                                >
                                    <?php echo app('translator')->get('admin::app.sales.orders.create.cart-items.delete'); ?>
                                </p>

                                <p
                                    class="cursor-pointer text-emerald-600 transition-all hover:underline"
                                    @click="moveToCart(item)"
                                >
                                    <?php echo app('translator')->get('admin::app.sales.orders.create.cart-items.add-to-cart'); ?>
                                </p>
                            </div>
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
                            <?php echo app('translator')->get('admin::app.sales.orders.create.cart-items.empty-title'); ?>
                        </p>
    
                        <p class="text-gray-400">
                            <?php echo app('translator')->get('admin::app.sales.orders.create.cart-items.empty-description'); ?>
                        </p>
                    </div>
                </div>
            </div>
        </template>
    </script>

    <script type="module">
        app.component('v-previous-cart-items', {
            template: '#v-previous-cart-items-template',

            props: ['cart'],

            emits: ['add-to-cart'],

            data() {
                return {
                    displayTax: {
                        prices: "<?php echo e(core()->getConfigData('sales.taxes.shopping_cart.display_prices')); ?>",

                        subtotal: "<?php echo e(core()->getConfigData('sales.taxes.shopping_cart.display_subtotal')); ?>",
                    },

                    items: [],
                    
                    isLoading: false,
                };
            },

            mounted() {
                this.get();
            },

            methods: {
                get() {
                    this.isLoading = true;

                    this.$axios.get("<?php echo e(route('admin.customers.customers.cart.items', $cart->customer_id)); ?>")
                        .then(response => {
                            this.items = response.data.data;

                            this.isLoading = false;
                        })
                        .catch(error => {});
                },

                moveToCart(item) {
                    this.$emitter.emit('open-confirm-modal', {
                        agree: () => {
                            this.$emit('add-to-cart', {
                                product: item.product,
                                qty: item.additional.quantity || 1,
                                additional: item.additional,
                            });
                        }
                    });
                },

                removeItem(item) {
                    this.$emitter.emit('open-confirm-modal', {
                        agree: () => {
                            this.$axios.delete("<?php echo e(route('admin.customers.customers.cart.items.delete', $cart->customer_id)); ?>", {
                                data: {
                                    item_id: item.id
                                }
                            })
                                .then(response => {
                                    let index = this.items.findIndex(cartItem => cartItem.id === item.id);

                                    if (index !== -1) {
                                        this.items.splice(index, 1);
                                    }

                                    this.$emitter.emit('add-flash', { type: 'success', message: response.data.data.message });
                                })
                                .catch(error => {});
                        }
                    });
                },
            }
        });
    </script>
<?php $__env->stopPush(); endif; ?><?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Admin\src/resources/views/sales/orders/create/cart-items.blade.php ENDPATH**/ ?>