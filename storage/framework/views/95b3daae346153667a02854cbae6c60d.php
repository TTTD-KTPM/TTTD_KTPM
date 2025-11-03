<!-- Total Customer Vue Component -->
<v-reporting-customers-total-traffic>
    <!-- Shimmer -->
    <?php if (isset($component)) { $__componentOriginaldb493a53b6ec84018e7ced1345669322 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldb493a53b6ec84018e7ced1345669322 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.shimmer.reporting.customers.total-traffic','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::shimmer.reporting.customers.total-traffic'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldb493a53b6ec84018e7ced1345669322)): ?>
<?php $attributes = $__attributesOriginaldb493a53b6ec84018e7ced1345669322; ?>
<?php unset($__attributesOriginaldb493a53b6ec84018e7ced1345669322); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldb493a53b6ec84018e7ced1345669322)): ?>
<?php $component = $__componentOriginaldb493a53b6ec84018e7ced1345669322; ?>
<?php unset($__componentOriginaldb493a53b6ec84018e7ced1345669322); ?>
<?php endif; ?> 
</v-reporting-customers-total-traffic>

<?php if (! $__env->hasRenderedOnce('e1acdc88-0946-4a9a-aae3-52ccc4eb1e27')): $__env->markAsRenderedOnce('e1acdc88-0946-4a9a-aae3-52ccc4eb1e27');
$__env->startPush('scripts'); ?>
    <script
        type="text/x-template"
        id="v-reporting-customers-total-traffic-template"
    >
        <!-- Shimmer -->
        <template v-if="isLoading">
            <?php if (isset($component)) { $__componentOriginaldb493a53b6ec84018e7ced1345669322 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldb493a53b6ec84018e7ced1345669322 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.shimmer.reporting.customers.total-traffic','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::shimmer.reporting.customers.total-traffic'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldb493a53b6ec84018e7ced1345669322)): ?>
<?php $attributes = $__attributesOriginaldb493a53b6ec84018e7ced1345669322; ?>
<?php unset($__attributesOriginaldb493a53b6ec84018e7ced1345669322); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldb493a53b6ec84018e7ced1345669322)): ?>
<?php $component = $__componentOriginaldb493a53b6ec84018e7ced1345669322; ?>
<?php unset($__componentOriginaldb493a53b6ec84018e7ced1345669322); ?>
<?php endif; ?> 
        </template>

        <!-- Total Customer Section -->
        <template v-else>
            <div class="box-shadow relative flex-1 rounded bg-white p-4 dark:bg-gray-900">
                <!-- Header -->
                <div class="mb-4 flex items-center justify-between">
                    <p class="text-base font-semibold text-gray-600 dark:text-white">
                        <?php echo app('translator')->get('admin::app.reporting.customers.index.customers-traffic'); ?>
                    </p>
                </div>
                
                <!-- Content -->
                <div class="grid gap-4">
                    <div class="flex justify-between gap-4">
                        <!-- Total Visitors -->
                        <div class="grid gap-1">
                            <p class="text-base font-semibold leading-none text-gray-800 dark:text-white">
                                {{ report.statistics.total.current }}
                            </p>

                            <p class="text-xs font-semibold leading-none text-gray-600 dark:text-gray-300">
                                <?php echo app('translator')->get('admin::app.reporting.customers.index.total-visitors'); ?>
                            </p>
                            
                            <div class="flex items-center gap-0.5">
                                <span
                                    class="text-base leading-none text-emerald-500"
                                    :class="[report.statistics.total.progress < 0 ? 'icon-down-stat text-red-500 dark:!text-red-500' : 'icon-up-stat text-emerald-500 dark:!text-emerald-500']"
                                ></span>

                                <p
                                    class="text-base leading-none text-emerald-500"
                                    :class="[report.statistics.total.progress < 0 ?  'text-red-500' : 'text-emerald-500']"
                                >
                                    {{ report.statistics.total.progress.toFixed(2) }}%
                                </p>
                            </div>
                        </div>

                        <!-- Unique Visitors -->
                        <div class="grid gap-1">
                            <p class="text-base font-semibold text-gray-800 dark:text-white">
                                {{ report.statistics.unique.current }}
                            </p>

                            <p class="text-xs font-semibold text-gray-600 dark:text-gray-300">
                                <?php echo app('translator')->get('admin::app.reporting.customers.index.unique-visitors'); ?>
                            </p>
                            
                            <div class="flex items-center gap-0.5">
                                <span
                                    class="text-base text-emerald-500"
                                    :class="[report.statistics.unique.progress < 0 ? 'icon-down-stat text-red-500 dark:!text-red-500' : 'icon-up-stat text-emerald-500 dark:!text-emerald-500']"
                                ></span>

                                <p
                                    class="text-base text-emerald-500"
                                    :class="[report.statistics.unique.progress < 0 ?  'text-red-500' : 'text-emerald-500']"
                                >
                                    {{ report.statistics.unique.progress.toFixed(2) }}%
                                </p>
                            </div>
                        </div>
                    </div>

                    <p class="text-base font-semibold text-gray-600 dark:text-gray-300">
                        <?php echo app('translator')->get('admin::app.reporting.customers.index.traffic-over-week'); ?>
                    </p>

                    <!-- Bar Chart -->
                    <?php if (isset($component)) { $__componentOriginalf196fc0ab37fc50ba89798b7f8a09a8b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf196fc0ab37fc50ba89798b7f8a09a8b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.charts.bar','data' => [':labels' => 'chartLabels',':datasets' => 'chartDatasets']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::charts.bar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([':labels' => 'chartLabels',':datasets' => 'chartDatasets']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf196fc0ab37fc50ba89798b7f8a09a8b)): ?>
<?php $attributes = $__attributesOriginalf196fc0ab37fc50ba89798b7f8a09a8b; ?>
<?php unset($__attributesOriginalf196fc0ab37fc50ba89798b7f8a09a8b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf196fc0ab37fc50ba89798b7f8a09a8b)): ?>
<?php $component = $__componentOriginalf196fc0ab37fc50ba89798b7f8a09a8b; ?>
<?php unset($__componentOriginalf196fc0ab37fc50ba89798b7f8a09a8b); ?>
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
        app.component('v-reporting-customers-total-traffic', {
            template: '#v-reporting-customers-total-traffic-template',

            data() {
                return {
                    report: [],

                    isLoading: true,
                }
            },

            computed: {
                chartLabels() {
                    return this.report.statistics.over_time.previous['label'];
                },

                chartDatasets() {
                    return [{
                        data: this.report.statistics.over_time.previous['total'],
                        pointStyle: false,
                        backgroundColor: '#34D399',
                        fill: true,
                    }, {
                        data: this.report.statistics.over_time.current['total'],
                        pointStyle: false,
                        backgroundColor: '#0E9CFF',
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

                    filters.type = 'customers-traffic';

                    this.$axios.get("<?php echo e(route('admin.reporting.customers.stats')); ?>", {
                            params: filters
                        })
                        .then(response => {
                            this.report = response.data;

                            this.isLoading = false;
                        })
                        .catch(error => {});
                },
            }
        });
    </script>
<?php $__env->stopPush(); endif; ?><?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Admin\src\Resources\views\reporting\customers\total-traffic.blade.php ENDPATH**/ ?>