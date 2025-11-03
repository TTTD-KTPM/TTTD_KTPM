<!-- Products with Most Visits Vue Component -->
<v-reporting-products-with-most-visits>
    <!-- Shimmer -->
    <?php if (isset($component)) { $__componentOriginal6580bcb919ccc73ff0a923a0efac8601 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6580bcb919ccc73ff0a923a0efac8601 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.shimmer.reporting.products.most-visits','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::shimmer.reporting.products.most-visits'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6580bcb919ccc73ff0a923a0efac8601)): ?>
<?php $attributes = $__attributesOriginal6580bcb919ccc73ff0a923a0efac8601; ?>
<?php unset($__attributesOriginal6580bcb919ccc73ff0a923a0efac8601); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6580bcb919ccc73ff0a923a0efac8601)): ?>
<?php $component = $__componentOriginal6580bcb919ccc73ff0a923a0efac8601; ?>
<?php unset($__componentOriginal6580bcb919ccc73ff0a923a0efac8601); ?>
<?php endif; ?>
</v-reporting-products-with-most-visits>

<?php if (! $__env->hasRenderedOnce('f6c735e6-6d07-48c6-beb7-84bb8c5e2eec')): $__env->markAsRenderedOnce('f6c735e6-6d07-48c6-beb7-84bb8c5e2eec');
$__env->startPush('scripts'); ?>
    <script
        type="text/x-template"
        id="v-reporting-products-with-most-visits-template"
    >
        <!-- Shimmer -->
        <template v-if="isLoading">
            <?php if (isset($component)) { $__componentOriginal6580bcb919ccc73ff0a923a0efac8601 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6580bcb919ccc73ff0a923a0efac8601 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.shimmer.reporting.products.most-visits','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::shimmer.reporting.products.most-visits'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6580bcb919ccc73ff0a923a0efac8601)): ?>
<?php $attributes = $__attributesOriginal6580bcb919ccc73ff0a923a0efac8601; ?>
<?php unset($__attributesOriginal6580bcb919ccc73ff0a923a0efac8601); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6580bcb919ccc73ff0a923a0efac8601)): ?>
<?php $component = $__componentOriginal6580bcb919ccc73ff0a923a0efac8601; ?>
<?php unset($__componentOriginal6580bcb919ccc73ff0a923a0efac8601); ?>
<?php endif; ?>
        </template>

        <!-- Products with Most Visits Section -->
        <template v-else>
            <div class="box-shadow relative flex-1 rounded bg-white p-4 dark:bg-gray-900">
                <!-- Header -->
                <div class="mb-4 flex items-center justify-between">
                    <p class="text-base font-semibold text-gray-600 dark:text-white">
                        <?php echo app('translator')->get('admin::app.reporting.products.index.products-with-most-visits'); ?>
                    </p>

                    <a
                        href="<?php echo e(route('admin.reporting.products.view', ['type' => 'products-with-most-visits'])); ?>"
                        class="cursor-pointer text-sm text-blue-600 transition-all hover:underline"
                    >
                        <?php echo app('translator')->get('admin::app.reporting.products.index.view-details'); ?>
                    </a>
                </div>
                
                <!-- Content -->
                <div class="grid gap-4">
                    <!-- Products with Most Visits -->
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
                                        {{ product.visits }}
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
        app.component('v-reporting-products-with-most-visits', {
            template: '#v-reporting-products-with-most-visits-template',

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

                    filters.type = 'products-with-most-visits';

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
<?php $__env->stopPush(); endif; ?><?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Admin\src\Resources\views\reporting\products\most-visits.blade.php ENDPATH**/ ?>