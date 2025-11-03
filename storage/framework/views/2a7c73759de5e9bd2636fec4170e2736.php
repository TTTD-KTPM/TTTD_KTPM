<?php echo view_render_event('bagisto.admin.sales.order.create.types.grouped.before'); ?>


<v-product-grouped-options
    :errors="errors"
    :product-options="selectedProductOptions"
></v-product-grouped-options>

<?php echo view_render_event('bagisto.admin.sales.order.create.types.grouped.after'); ?>


<?php if (! $__env->hasRenderedOnce('6bceaa46-3889-4eb0-abe7-9500e0d9517f')): $__env->markAsRenderedOnce('6bceaa46-3889-4eb0-abe7-9500e0d9517f');
$__env->startPush('scripts'); ?>
    <script
        type="text/x-template"
        id="v-product-grouped-options-template"
    >
        <div class="grid gap-5 p-4">
            <div
                class="flex items-center justify-between gap-2"
                v-for="product in associatedProducts"
            >
                <div class="grid gap-1.5">
                    <p class="text-sm font-medium dark:text-white">
                        <?php echo app('translator')->get('admin::app.sales.orders.create.types.grouped.name'); ?>
                    </p>

                    <p class="text-sm text-[#6E6E6E] dark:text-gray-300">
                        {{ product.name + ' + ' + product.formatted_price }}
                    </p>
                </div>

                <?php if (isset($component)) { $__componentOriginal983b1d701666b336441f5e6ffe588221 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal983b1d701666b336441f5e6ffe588221 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.quantity-changer.index','data' => [':name' => '\'qty[\' + product.id + \']\'',':value' => 'product.qty','class' => 'w-max gap-x-4 rounded-l px-4 py-1','@change' => 'updateItem($event)']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::quantity-changer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([':name' => '\'qty[\' + product.id + \']\'',':value' => 'product.qty','class' => 'w-max gap-x-4 rounded-l px-4 py-1','@change' => 'updateItem($event)']); ?>
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
    </script>

    <script type="module">
        app.component('v-product-grouped-options', {
            template: '#v-product-grouped-options-template',

            props: ['errors', 'productOptions'],

            data: function() {
                return {
                    associatedProducts: [],

                    isLoading: false,
                }
            },

            mounted() {
                this.getOptions();
            },

            methods: {
                getOptions() {
                    this.isLoading = true;

                    this.$axios.get("<?php echo e(route('admin.catalog.products.grouped.options', ':replace')); ?>".replace(':replace', this.productOptions.product.id))
                        .then(response => {
                            this.associatedProducts = response.data.data;

                            this.isLoading = false;
                        })
                        .catch(error => {});
                },
            }
        });
    </script>
<?php $__env->stopPush(); endif; ?><?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Admin\src/resources/views/sales/orders/create/types/grouped.blade.php ENDPATH**/ ?>