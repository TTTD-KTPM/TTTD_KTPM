<!-- Abandoned Carts Vue Component -->
<v-reporting-sales-abandoned-carts>
    <!-- Shimmer -->
    <?php if (isset($component)) { $__componentOriginal5e2837ada5b0c5b7c107e1fd389240b1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5e2837ada5b0c5b7c107e1fd389240b1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.shimmer.reporting.sales.abandoned-carts','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::shimmer.reporting.sales.abandoned-carts'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5e2837ada5b0c5b7c107e1fd389240b1)): ?>
<?php $attributes = $__attributesOriginal5e2837ada5b0c5b7c107e1fd389240b1; ?>
<?php unset($__attributesOriginal5e2837ada5b0c5b7c107e1fd389240b1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5e2837ada5b0c5b7c107e1fd389240b1)): ?>
<?php $component = $__componentOriginal5e2837ada5b0c5b7c107e1fd389240b1; ?>
<?php unset($__componentOriginal5e2837ada5b0c5b7c107e1fd389240b1); ?>
<?php endif; ?>
</v-reporting-sales-abandoned-carts>

<?php if (! $__env->hasRenderedOnce('cc62dcf9-1e64-406b-a4f3-7b9291cae494')): $__env->markAsRenderedOnce('cc62dcf9-1e64-406b-a4f3-7b9291cae494');
$__env->startPush('scripts'); ?>
    <script
        type="text/x-template"
        id="v-reporting-sales-abandoned-carts-template"
    >
        <!-- Shimmer -->
        <template v-if="isLoading">
            <?php if (isset($component)) { $__componentOriginal5e2837ada5b0c5b7c107e1fd389240b1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5e2837ada5b0c5b7c107e1fd389240b1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.shimmer.reporting.sales.abandoned-carts','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::shimmer.reporting.sales.abandoned-carts'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5e2837ada5b0c5b7c107e1fd389240b1)): ?>
<?php $attributes = $__attributesOriginal5e2837ada5b0c5b7c107e1fd389240b1; ?>
<?php unset($__attributesOriginal5e2837ada5b0c5b7c107e1fd389240b1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5e2837ada5b0c5b7c107e1fd389240b1)): ?>
<?php $component = $__componentOriginal5e2837ada5b0c5b7c107e1fd389240b1; ?>
<?php unset($__componentOriginal5e2837ada5b0c5b7c107e1fd389240b1); ?>
<?php endif; ?>
        </template>

        <!-- Abandoned Carts Section -->
        <template v-else>
            <div class="box-shadow relative flex-1 rounded bg-white p-4 dark:bg-gray-900">
                <div class="mb-4 flex items-center justify-between">
                    <p class="text-base font-semibold text-gray-600 dark:text-white">
                        <?php echo app('translator')->get('admin::app.reporting.sales.index.abandoned-carts'); ?>
                    </p>

                    <a
                        href="<?php echo e(route('admin.reporting.sales.view', ['type' => 'abandoned-carts'])); ?>"
                        class="cursor-pointer text-sm text-blue-600 transition-all hover:underline"
                    >
                        <?php echo app('translator')->get('admin::app.reporting.sales.index.view-details'); ?>
                    </a>
                </div>

                <!-- Content -->
                <div class="grid gap-4">
                    <!-- Stats -->
                    <div class="flex justify-between gap-4">
                        <!-- Abandoned Revenue -->
                        <div class="grid gap-1">
                            <p class="text-base font-semibold leading-none text-gray-800 dark:text-white">
                                {{ report.statistics.sales.formatted_total }}
                            </p>

                            <p class="text-xs font-semibold leading-none text-gray-600 dark:text-gray-300">
                                <?php echo app('translator')->get('admin::app.reporting.sales.index.abandoned-revenue'); ?>
                            </p>
                            
                            <div class="flex items-center gap-0.5">
                                <span
                                    class="text-base text-emerald-500"
                                    :class="[report.statistics.sales.progress < 0 ? 'icon-down-stat text-red-500 dark:!text-red-500' : 'icon-up-stat text-emerald-500 dark:!text-emerald-500']"
                                ></span>

                                <p
                                    class="text-base text-emerald-500"
                                    :class="[report.statistics.sales.progress < 0 ?  'text-red-500' : 'text-emerald-500']"
                                >
                                    {{ Math.abs(report.statistics.sales.progress.toFixed(2)) }}%
                                </p>
                            </div>
                        </div>

                        <!-- Abandoned Cart -->
                        <div class="grid gap-1">
                            <p class="text-base font-semibold leading-none text-gray-800 dark:text-white">
                                {{ report.statistics.carts.current }}
                            </p>

                            <p class="text-xs font-semibold leading-none text-gray-600 dark:text-gray-300">
                                <?php echo app('translator')->get('admin::app.reporting.sales.index.abandoned-carts'); ?>
                            </p>
                            
                            <div class="flex items-center gap-0.5">
                                <span
                                    class="text-base text-emerald-500"
                                    :class="[report.statistics.carts.progress < 0 ? 'icon-down-stat text-red-500 dark:!text-red-500' : 'icon-up-stat text-emerald-500 dark:!text-emerald-500']"
                                ></span>

                                <p
                                    class="text-base text-emerald-500"
                                    :class="[report.statistics.carts.progress < 0 ?  'text-red-500' : 'text-emerald-500']"
                                >
                                    {{ Math.abs(report.statistics.carts.progress.toFixed(2)) }}%
                                </p>
                            </div>
                        </div>

                        <!-- Abandoned Rate -->
                        <div class="grid gap-1">
                            <div class="flex gap-0.5">
                                <p
                                    class="text-base leading-none text-emerald-500"
                                    :class="[report.statistics.rate.progress >= 0 ?  'text-red-500' : 'text-emerald-500']"
                                >
                                    {{ Math.abs(report.statistics.rate.current.toFixed(2)) }}%
                                </p>

                                <span
                                    class="text-base leading-none text-emerald-500"
                                    :class="[report.statistics.carts.progress >= 0 ? 'icon-down-stat text-red-500 dark:!text-red-500' : 'icon-up-stat text-emerald-500 dark:!text-emerald-500']"
                                ></span>
                            </div>

                            <p class="text-xs font-semibold leading-none text-gray-600 dark:text-gray-300">
                                <?php echo app('translator')->get('admin::app.reporting.sales.index.abandoned-rate'); ?>
                            </p>
                            
                            <div class="flex items-center gap-0.5">
                                <p
                                    class="text-base leading-none text-emerald-500"
                                    :class="[report.statistics.rate.progress < 0 ?  'text-red-500' : 'text-emerald-500']"
                                >
                                    {{ Math.abs(report.statistics.rate.progress.toFixed(2)) }}%
                                </p>

                                <span
                                    class="text-base leading-none text-emerald-500"
                                    :class="[report.statistics.carts.progress < 0 ? 'icon-down-stat text-red-500 dark:!text-red-500' : 'icon-up-stat text-emerald-500 dark:!text-emerald-500']"
                                ></span>
                            </div>
                        </div>
                    </div>

                    <!-- Header -->
                    <p class="mt-4 py-2.5 text-base font-semibold text-gray-600 dark:text-white">
                        <?php echo app('translator')->get('admin::app.reporting.sales.index.abandoned-products'); ?>
                    </p>

                    <!-- Abandoned Products -->
                    <template v-if="report.statistics.products.length">
                        <div class="grid gap-7">
                            <div
                                class="grid"
                                v-for="product in report.statistics.products"
                            >
                                <p class="dark:text-white">
                                    {{ product.name }}
                                </p>

                                <div class="flex items-center gap-5">
                                    <div class="relative h-2 w-full bg-slate-100">
                                        <div
                                            class="absolute left-0 h-2 bg-blue-500"
                                            :style="{ 'width': product.progress + '%' }"
                                        ></div>
                                    </div>

                                    <p class="text-sm font-semibold text-gray-600 dark:text-gray-300">
                                        {{ product.count }}
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
                            <span class="h-3.5 w-3.5 rounded-md bg-blue-500"></span>

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
        app.component('v-reporting-sales-abandoned-carts', {
            template: '#v-reporting-sales-abandoned-carts-template',

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

                    filters.type = 'abandoned-carts';

                    this.$axios.get("<?php echo e(route('admin.reporting.sales.stats')); ?>", {
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
<?php $__env->stopPush(); endif; ?><?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Admin\src\Resources\views\reporting\sales\abandoned-carts.blade.php ENDPATH**/ ?>