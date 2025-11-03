<!-- Average Order Value Vue Component -->
<v-reporting-sales-average-order-value>
    <!-- Shimmer -->
    <?php if (isset($component)) { $__componentOriginal75945c2063d77491944d4537b492243b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal75945c2063d77491944d4537b492243b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.shimmer.reporting.sales.average-order-value','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::shimmer.reporting.sales.average-order-value'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal75945c2063d77491944d4537b492243b)): ?>
<?php $attributes = $__attributesOriginal75945c2063d77491944d4537b492243b; ?>
<?php unset($__attributesOriginal75945c2063d77491944d4537b492243b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal75945c2063d77491944d4537b492243b)): ?>
<?php $component = $__componentOriginal75945c2063d77491944d4537b492243b; ?>
<?php unset($__componentOriginal75945c2063d77491944d4537b492243b); ?>
<?php endif; ?> 
</v-reporting-sales-average-order-value>

<?php if (! $__env->hasRenderedOnce('bd768724-9241-433a-ad65-ff1d9fcd8f7f')): $__env->markAsRenderedOnce('bd768724-9241-433a-ad65-ff1d9fcd8f7f');
$__env->startPush('scripts'); ?>
    <script
        type="text/x-template"
        id="v-reporting-sales-average-order-value-template"
    >
        <!-- Shimmer -->
        <template v-if="isLoading">
            <?php if (isset($component)) { $__componentOriginal75945c2063d77491944d4537b492243b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal75945c2063d77491944d4537b492243b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.shimmer.reporting.sales.average-order-value','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::shimmer.reporting.sales.average-order-value'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal75945c2063d77491944d4537b492243b)): ?>
<?php $attributes = $__attributesOriginal75945c2063d77491944d4537b492243b; ?>
<?php unset($__attributesOriginal75945c2063d77491944d4537b492243b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal75945c2063d77491944d4537b492243b)): ?>
<?php $component = $__componentOriginal75945c2063d77491944d4537b492243b; ?>
<?php unset($__componentOriginal75945c2063d77491944d4537b492243b); ?>
<?php endif; ?>
        </template>

        <!-- Average Order Value Section -->
        <template v-else>
            <div class="box-shadow relative flex-1 rounded bg-white p-4 dark:bg-gray-900">
                <!-- Header -->
                <div class="mb-4 flex items-center justify-between">
                    <p class="text-base font-semibold text-gray-600 dark:text-white">
                        <?php echo app('translator')->get('admin::app.reporting.sales.index.average-sales'); ?>
                    </p>

                    <a
                        href="<?php echo e(route('admin.reporting.sales.view', ['type' => 'average-sales'])); ?>"
                        class="cursor-pointer text-sm text-blue-600 transition-all hover:underline"
                    >
                        <?php echo app('translator')->get('admin::app.reporting.sales.index.view-details'); ?>
                    </a>
                </div>

                <!-- Content -->
                <div class="grid gap-4">
                    <div class="flex justify-between gap-4">
                        <p class="text-3xl font-bold leading-9 text-gray-600 dark:text-gray-300">
                            {{ report.statistics.sales.formatted_total }}
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

                    <p class="text-base font-semibold text-gray-600 dark:text-gray-300">
                        <?php echo app('translator')->get('admin::app.reporting.sales.index.average-order-value-over-time'); ?>
                    </p>

                    <!-- Line Chart -->
                    <?php if (isset($component)) { $__componentOriginalb8c5a56cc7464ac234c10f1e17210837 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb8c5a56cc7464ac234c10f1e17210837 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.charts.line','data' => [':labels' => 'chartLabels',':datasets' => 'chartDatasets']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::charts.line'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([':labels' => 'chartLabels',':datasets' => 'chartDatasets']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb8c5a56cc7464ac234c10f1e17210837)): ?>
<?php $attributes = $__attributesOriginalb8c5a56cc7464ac234c10f1e17210837; ?>
<?php unset($__attributesOriginalb8c5a56cc7464ac234c10f1e17210837); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb8c5a56cc7464ac234c10f1e17210837)): ?>
<?php $component = $__componentOriginalb8c5a56cc7464ac234c10f1e17210837; ?>
<?php unset($__componentOriginalb8c5a56cc7464ac234c10f1e17210837); ?>
<?php endif; ?>

                    <!-- Date Range -->
                    <div class="flex justify-center gap-5">
                        <div class="flex items-center gap-1">
                            <span class="h-3.5 w-3.5 rounded-md bg-emerald-400"></span>

                            <p class="text-xs dark:text-gray-300">
                                {{ report.date_range.previous }}
                            </p>
                        </div>

                        <div class="flex items-center gap-1">
                            <span class="h-3.5 w-3.5 rounded-md bg-sky-400"></span>

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
        app.component('v-reporting-sales-average-order-value', {
            template: '#v-reporting-sales-average-order-value-template',

            data() {
                return {
                    report: [],

                    isLoading: true,
                }
            },

            computed: {
                chartLabels() {
                    return this.report.statistics.over_time.current.map(({ label }) => label);
                },

                chartDatasets() {
                    return [{
                        data: this.report.statistics.over_time.current.map(({ total }) => total),
                        lineTension: 0.2,
                        pointStyle: false,
                        borderWidth: 2,
                        borderColor: '#0E9CFF',
                        backgroundColor: 'rgba(14, 156, 255, 0.3)',
                        fill: true,
                    }, {
                        data: this.report.statistics.over_time.previous.map(({ total }) => total),
                        lineTension: 0.2,
                        pointStyle: false,
                        borderWidth: 2,
                        borderColor: '#34D399',
                        backgroundColor: 'rgba(52, 211, 153, 0.3)',
                        fill: true,
                    }];
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

                    filters.type = 'average-sales';

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
<?php $__env->stopPush(); endif; ?><?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Admin\src\Resources\views\reporting\sales\average-order-value.blade.php ENDPATH**/ ?>