<?php echo view_render_event('bagisto.admin.catalog.product.edit.form.types.grouped.before', ['product' => $product]); ?>


<v-group-products :errors="errors"></v-group-products>

<?php echo view_render_event('bagisto.admin.catalog.product.edit.form.types.grouped.after', ['product' => $product]); ?>


<?php if (! $__env->hasRenderedOnce('25bd4d67-9911-4a63-8df2-9432882e5950')): $__env->markAsRenderedOnce('25bd4d67-9911-4a63-8df2-9432882e5950');
$__env->startPush('scripts'); ?>
    <script
        type="text/x-template"
        id="v-group-products-template"
    >
        <div class="box-shadow relative rounded bg-white dark:bg-gray-900">
            <!-- Panel Header -->
            <div class="mb-2.5 flex justify-between gap-5 p-4">
                <div class="flex flex-col gap-2">
                    <p class="text-base font-semibold text-gray-800 dark:text-white">
                        <?php echo app('translator')->get('admin::app.catalog.products.edit.types.grouped.title'); ?>
                    </p>

                    <p class="text-xs font-medium text-gray-500 dark:text-gray-300">
                        <?php echo app('translator')->get('admin::app.catalog.products.edit.types.grouped.info'); ?>
                    </p>
                </div>

                <!-- Add Button -->
                <div class="flex items-center gap-x-1">
                    <div
                        class="secondary-button"
                        @click="$refs.productSearch.openDrawer()"
                    >
                        <?php echo app('translator')->get('admin::app.catalog.products.edit.types.grouped.add-btn'); ?>
                    </div>
                </div>
            </div>

            <!-- Panel Content -->
            <div
                class="grid"
                v-if="groupProducts.length"
            >
                <!-- Draggable Products -->
                <draggable
                    ghost-class="draggable-ghost"
                    handle=".icon-drag"
                    v-bind="{animation: 200}"
                    :list="groupProducts"
                    item-key="associated_product.id"
                >
                    <template #item="{ element, index }">
                        <div class="flex justify-between gap-2.5 border-b border-slate-300 p-4 dark:border-gray-800">
                            <!-- Information -->
                            <div class="flex gap-2.5">
                                <!-- Drag Icon -->
                                <i class="icon-drag cursor-grab text-xl text-gray-600 transition-all dark:text-gray-300"></i>

                                <!-- Image -->
                                <div
                                    class="relative h-[60px] max-h-[60px] w-full max-w-[60px] overflow-hidden rounded"
                                    :class="{'overflow-hidden rounded border border-dashed border-gray-300 dark:border-gray-800 dark:mix-blend-exclusion dark:invert': ! element.associated_product.images.length}"
                                >
                                    <template v-if="! element.associated_product.images.length">
                                        <img src="<?php echo e(bagisto_asset('images/product-placeholders/front.svg')); ?>">

                                        <p class="absolute bottom-1.5 w-full text-center text-[6px] font-semibold text-gray-400">
                                            <?php echo app('translator')->get('admin::app.catalog.products.edit.types.grouped.image-placeholder'); ?>
                                        </p>
                                    </template>

                                    <template v-else>
                                        <img :src="element.associated_product.images[0].url">
                                    </template>
                                </div>

                                <!-- Details -->
                                <div class="grid place-content-start gap-1.5">
                                    <p class="text-base font-semibold text-gray-800 dark:text-white">
                                        {{ element.associated_product.name }}
                                    </p>

                                    <p class="text-gray-600 dark:text-gray-300">
                                        {{ "<?php echo app('translator')->get('admin::app.catalog.products.edit.types.grouped.sku'); ?>".replace(':sku', element.associated_product.sku) }}
                                    </p>
                                </div>
                            </div>

                            <!-- Actions -->
                            <div class="grid place-content-start gap-1 ltr:text-right rtl:text-left">
                                <p class="font-semibold text-gray-800 dark:text-white">
                                    {{ $admin.formatPrice(element.associated_product.price) }}
                                </p>

                                <!-- Hidden Input -->
                                <input
                                    type="hidden"
                                    :name="'links[' + (element.id ? element.id : 'link_' + element.associated_product.id) + '][associated_product_id]'"
                                    :value="element.associated_product.id"
                                />

                                <input
                                    type="hidden"
                                    :name="'links[' + (element.id ? element.id : 'link_' + element.associated_product.id) + '][sort_order]'"
                                    :value="index"
                                />

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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.label','data' => ['class' => 'required !block']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'required !block']); ?>
                                        <?php echo app('translator')->get('admin::app.catalog.products.edit.types.grouped.default-qty'); ?>
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

                                    <v-field
                                        type="text"
                                        :name="'links[' + (element.id ? element.id : 'link_' + element.associated_product.id) + '][qty]'"
                                        v-model="element.qty"
                                        class="min-h-[39px] w-[86px] rounded-md border px-3 py-2 text-sm text-gray-600 transition-all hover:border-gray-400 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300"
                                        :class="[errors['links[' + (element.id ? element.id : 'link_' + element.associated_product.id) + '][qty]'] ? 'border border-red-600 hover:border-red-600' : '']"
                                        rules="required|numeric|min_value:1"
                                        label="<?php echo app('translator')->get('admin::app.catalog.products.edit.types.grouped.default-qty'); ?>"
                                    >
                                    </v-field>

                                    <v-error-message
                                        :name="'links[' + (element.id ? element.id : 'link_' + element.associated_product.id) + '][qty]'"
                                        v-slot="{ message }"
                                    >
                                        <p class="mt-1 text-xs italic text-red-600">
                                            {{ message }}
                                        </p>
                                    </v-error-message>
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

                                <p
                                    class="cursor-pointer text-red-600 transition-all hover:underline"
                                    @click="remove(element)"
                                >
                                    <?php echo app('translator')->get('admin::app.catalog.products.edit.types.grouped.delete'); ?>
                                </p>
                            </div>
                        </div>
                    </template>
                </draggable>
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
                        <?php echo app('translator')->get('admin::app.catalog.products.edit.types.grouped.empty-title'); ?>
                    </p>

                    <p class="text-gray-400">
                        <?php echo app('translator')->get('admin::app.catalog.products.edit.types.grouped.empty-info'); ?>
                    </p>
                </div>

                <!-- Add Row Button -->
                <div
                    class="secondary-button text-sm"
                    @click="$refs.productSearch.openDrawer()"
                >
                    <?php echo app('translator')->get('admin::app.catalog.products.edit.types.grouped.add-btn'); ?>
                </div>
            </div>

            <!-- Product Search Blade Component -->
            <?php if (isset($component)) { $__componentOriginal327ffe807b42a6db021ef6ea08eda334 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal327ffe807b42a6db021ef6ea08eda334 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.products.search','data' => ['ref' => 'productSearch',':addedProductIds' => 'addedProductIds',':queryParams' => '{type: \'simple\', exclude_customizable_products: 1}','@onProductAdded' => 'addSelected($event)']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::products.search'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['ref' => 'productSearch',':added-product-ids' => 'addedProductIds',':query-params' => '{type: \'simple\', exclude_customizable_products: 1}','@onProductAdded' => 'addSelected($event)']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal327ffe807b42a6db021ef6ea08eda334)): ?>
<?php $attributes = $__attributesOriginal327ffe807b42a6db021ef6ea08eda334; ?>
<?php unset($__attributesOriginal327ffe807b42a6db021ef6ea08eda334); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal327ffe807b42a6db021ef6ea08eda334)): ?>
<?php $component = $__componentOriginal327ffe807b42a6db021ef6ea08eda334; ?>
<?php unset($__componentOriginal327ffe807b42a6db021ef6ea08eda334); ?>
<?php endif; ?>
        </div>
    </script>

    <script type="module">
        app.component('v-group-products', {
            template: '#v-group-products-template',

            props: ['errors'],

            data() {
                return {
                    groupProducts: <?php echo json_encode($product->grouped_products()->with(['associated_product.inventory_indices', 'associated_product.images'])->orderBy('sort_order', 'asc')->get()) ?>
                }
            },

            computed: {
                addedProductIds() {
                    return this.groupProducts.map(product => product.associated_product.id);
                }
            },

            methods: {
                addSelected(selectedProducts) {
                    let self = this;

                    selectedProducts.forEach(function (product) {
                        self.groupProducts.push({
                            associated_product: product,
                            qty: 1,
                        });
                    });
                },

                remove(product) {

                    this.$emitter.emit('open-confirm-modal', {
                        agree: () => {
                            this.groupProducts = this.groupProducts.filter(item => item.associated_product.id !== product.associated_product.id);
                        }
                    });
                },
            }
        });
    </script>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Admin\src\Resources\views\catalog\products\edit\types\grouped.blade.php ENDPATH**/ ?>