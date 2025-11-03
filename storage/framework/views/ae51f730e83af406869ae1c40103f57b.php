<!-- Top Selling Products By Revenue Vue Component -->
<v-reporting-product-top-selling-by-revenue>
    <!-- Shimmer -->
    <?php if (isset($component)) { $__componentOriginal045c6422800864b4748a1d80cc526a98 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal045c6422800864b4748a1d80cc526a98 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.shimmer.reporting.products.top-selling-by-revenue','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::shimmer.reporting.products.top-selling-by-revenue'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal045c6422800864b4748a1d80cc526a98)): ?>
<?php $attributes = $__attributesOriginal045c6422800864b4748a1d80cc526a98; ?>
<?php unset($__attributesOriginal045c6422800864b4748a1d80cc526a98); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal045c6422800864b4748a1d80cc526a98)): ?>
<?php $component = $__componentOriginal045c6422800864b4748a1d80cc526a98; ?>
<?php unset($__componentOriginal045c6422800864b4748a1d80cc526a98); ?>
<?php endif; ?>
</v-reporting-product-top-selling-by-revenue>

<?php if (! $__env->hasRenderedOnce('e91179a4-3897-4906-a7e2-68f611a6151f')): $__env->markAsRenderedOnce('e91179a4-3897-4906-a7e2-68f611a6151f');
$__env->startPush('scripts'); ?>
    <script
        type="text/x-template"
        id="v-reporting-product-top-selling-by-revenue-template"
    >
        <!-- Shimmer -->
        <template v-if="isLoading">
            <?php if (isset($component)) { $__componentOriginal045c6422800864b4748a1d80cc526a98 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal045c6422800864b4748a1d80cc526a98 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.shimmer.reporting.products.top-selling-by-revenue','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::shimmer.reporting.products.top-selling-by-revenue'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal045c6422800864b4748a1d80cc526a98)): ?>
<?php $attributes = $__attributesOriginal045c6422800864b4748a1d80cc526a98; ?>
<?php unset($__attributesOriginal045c6422800864b4748a1d80cc526a98); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal045c6422800864b4748a1d80cc526a98)): ?>
<?php $component = $__componentOriginal045c6422800864b4748a1d80cc526a98; ?>
<?php unset($__componentOriginal045c6422800864b4748a1d80cc526a98); ?>
<?php endif; ?>
        </template>

        <!-- Top Selling Products By Revenue Section -->
        <template v-else>
            <div class="box-shadow relative flex-1 rounded bg-white p-4 dark:bg-gray-900">
                <!-- Header -->
                <div class="mb-4 flex items-center justify-between">
                    <p class="text-base font-semibold text-gray-600 dark:text-white">
                        <?php echo app('translator')->get('admin::app.reporting.products.index.top-selling-products-by-revenue'); ?>
                    </p>

                    <a
                        href="<?php echo e(route('admin.reporting.products.view', ['type' => 'top-selling-products-by-revenue'])); ?>"
                        class="cursor-pointer text-sm text-blue-600 transition-all hover:underline"
                    >
                        <?php echo app('translator')->get('admin::app.reporting.products.index.view-details'); ?>
                    </a>
                </div>

                <!-- Content -->
                <div class="grid gap-4">
                    <!-- Top Selling Products By Revenue -->
                    <template v-if="report.statistics.length">
                        <!-- Customers -->
                        <div class="grid gap-7">
                            <div
                                class="grid"
                                v-for="product in report.statistics"
                            >
                                <p class="dark:text-white">
                                    {{ product.name }}
                                </p>

                                <div class="flex items-center gap-5">
                                    <div class="relative h-2 w-full bg-slate-100">
                                        <div
                                            class="absolute left-0 h-2 bg-emerald-500"
                                            :style="{ 'width': product.progress + '%' }"
                                        ></div>
                                    </div>

                                    <p class="text-sm font-semibold text-gray-600 dark:text-gray-300">
                                        {{ product.formatted_revenue }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </template>

                    <!-- Empty State -->
                    <template v-else>
                        <?php echo $__env->make('admin::reporting.empty', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    </template>

                    <!-- Date Range -->
                    <div class="flex justify-end gap-5">
                        <div class="flex items-center gap-1">
                            <span class="h-3.5 w-3.5 rounded-md bg-emerald-400"></span>

                            <p class="text-xs dark:text-gray-300">
                                {{ report.date_range.current }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </script>

    <script type="module">
        app.component('v-reporting-product-top-selling-by-revenue', {
            template: '#v-reporting-product-top-selling-by-revenue-template',

            data() {
                return {
                    report: [],

                    isLoading: true,
                }
            },

            mounted() {
                this.getStats({});

                this.$emitter.on('reporting-filter-updated', this.getStats);
            },

            methods: {
                getStats(filters) {
                    this.isLoading = true;

                    var filters = Object.assign({}, filters);

                    filters.type = 'top-selling-products-by-revenue';

                    this.$axios.get("<?php echo e(route('admin.reporting.products.stats')); ?>", {
                            params: filters
                        })
                        .then(response => {
                            this.report = response.data;

                            this.isLoading = false;
                        })
                        .catch(error => {});
                }
            }
        });
    </script>
<?php $__env->stopPush(); endif; ?><?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Admin\src\Resources\views\reporting\products\top-selling-by-revenue.blade.php ENDPATH**/ ?>