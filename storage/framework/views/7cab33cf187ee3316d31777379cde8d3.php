<!-- Total Sales Stats Vue Component -->
<v-reporting-sales-total-sales>
    <!-- Shimmer -->
    <?php if (isset($component)) { $__componentOriginal7e5b90cac9e81351383692dae807f240 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7e5b90cac9e81351383692dae807f240 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.shimmer.reporting.sales.total-sales','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::shimmer.reporting.sales.total-sales'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7e5b90cac9e81351383692dae807f240)): ?>
<?php $attributes = $__attributesOriginal7e5b90cac9e81351383692dae807f240; ?>
<?php unset($__attributesOriginal7e5b90cac9e81351383692dae807f240); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7e5b90cac9e81351383692dae807f240)): ?>
<?php $component = $__componentOriginal7e5b90cac9e81351383692dae807f240; ?>
<?php unset($__componentOriginal7e5b90cac9e81351383692dae807f240); ?>
<?php endif; ?>
</v-reporting-sales-total-sales>

<?php if (! $__env->hasRenderedOnce('ebcee3f4-701a-4754-a086-f47676b08c82')): $__env->markAsRenderedOnce('ebcee3f4-701a-4754-a086-f47676b08c82');
$__env->startPush('scripts'); ?>
    <script
        type="text/x-template"
        id="v-reporting-sales-total-sales-template"
    >
        <!-- Shimmer -->
        <template v-if="isLoading">
            <?php if (isset($component)) { $__componentOriginal7e5b90cac9e81351383692dae807f240 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7e5b90cac9e81351383692dae807f240 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.shimmer.reporting.sales.total-sales','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::shimmer.reporting.sales.total-sales'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7e5b90cac9e81351383692dae807f240)): ?>
<?php $attributes = $__attributesOriginal7e5b90cac9e81351383692dae807f240; ?>
<?php unset($__attributesOriginal7e5b90cac9e81351383692dae807f240); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7e5b90cac9e81351383692dae807f240)): ?>
<?php $component = $__componentOriginal7e5b90cac9e81351383692dae807f240; ?>
<?php unset($__componentOriginal7e5b90cac9e81351383692dae807f240); ?>
<?php endif; ?>
        </template>

        <!-- Total Sales Section -->
        <template v-else>
            <div class="box-shadow relative rounded bg-white p-4 dark:bg-gray-900">
                <!-- Header -->
                <div class="mb-4 flex items-center justify-between">
                    <p class="text-base font-semibold text-gray-600 dark:text-white">
                        <?php echo app('translator')->get('admin::app.reporting.sales.index.total-sales'); ?>
                    </p>

                    <a
                        href="<?php echo e(route('admin.reporting.sales.view', ['type' => 'total-sales'])); ?>"
                        class="cursor-pointer text-sm text-blue-600 transition-all hover:underline"
                    >
                        <?php echo app('translator')->get('admin::app.reporting.sales.index.view-details'); ?>
                    </a>
                </div>
                
                <!-- Content -->
                <div class="grid gap-4">
                    <div class="flex place-content-start gap-4">
                        <p class="text-3xl font-bold leading-9 text-gray-600 dark:text-gray-300">
                            {{ report.statistics.sales.formatted_total }}
                        </p>
                        
                        <div class="flex items-center gap-0.5">
                            <p
                                class="text-base text-emerald-500"
                                :class="[report.statistics.sales.progress < 0 ?  'text-red-500' : 'text-emerald-500']"
                            >
                                {{ Math.abs(report.statistics.sales.progress.toFixed(2)) }}%
                            </p>

                            <span
                                class="text-base text-emerald-500"
                                :class="[report.statistics.sales.progress < 0 ? 'icon-down-stat text-red-500 dark:!text-red-500' : 'icon-up-stat text-emerald-500 dark:!text-emerald-500']"
                            ></span>
                        </div>
                    </div>

                    <p class="text-base font-semibold text-gray-600 dark:text-gray-300">
                        <?php echo app('translator')->get('admin::app.reporting.sales.index.sales-over-time'); ?>
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

                    <!-- Date Range Section -->
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
        app.component('v-reporting-sales-total-sales', {
            template: '#v-reporting-sales-total-sales-template',

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

                    filters.type = 'total-sales';

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
<?php $__env->stopPush(); endif; ?><?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Admin\src\Resources\views\reporting\sales\total-sales.blade.php ENDPATH**/ ?>