<!-- Products with Most Reviews Vue Component -->
<v-reporting-products-last-search-terms>
    <!-- Shimmer -->
    <?php if (isset($component)) { $__componentOriginala855c109d29ba267b7728641993a5c9e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala855c109d29ba267b7728641993a5c9e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.shimmer.reporting.products.last-search-terms','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::shimmer.reporting.products.last-search-terms'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala855c109d29ba267b7728641993a5c9e)): ?>
<?php $attributes = $__attributesOriginala855c109d29ba267b7728641993a5c9e; ?>
<?php unset($__attributesOriginala855c109d29ba267b7728641993a5c9e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala855c109d29ba267b7728641993a5c9e)): ?>
<?php $component = $__componentOriginala855c109d29ba267b7728641993a5c9e; ?>
<?php unset($__componentOriginala855c109d29ba267b7728641993a5c9e); ?>
<?php endif; ?>
</v-reporting-products-last-search-terms>

<?php if (! $__env->hasRenderedOnce('710f12d7-6da9-491a-94d7-0c5654dcc411')): $__env->markAsRenderedOnce('710f12d7-6da9-491a-94d7-0c5654dcc411');
$__env->startPush('scripts'); ?>
    <script
        type="text/x-template"
        id="v-reporting-products-last-search-terms-template"
    >
        <template v-if="isLoading">
            <!-- Shimmer -->
            <?php if (isset($component)) { $__componentOriginala855c109d29ba267b7728641993a5c9e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala855c109d29ba267b7728641993a5c9e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.shimmer.reporting.products.last-search-terms','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::shimmer.reporting.products.last-search-terms'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala855c109d29ba267b7728641993a5c9e)): ?>
<?php $attributes = $__attributesOriginala855c109d29ba267b7728641993a5c9e; ?>
<?php unset($__attributesOriginala855c109d29ba267b7728641993a5c9e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala855c109d29ba267b7728641993a5c9e)): ?>
<?php $component = $__componentOriginala855c109d29ba267b7728641993a5c9e; ?>
<?php unset($__componentOriginala855c109d29ba267b7728641993a5c9e); ?>
<?php endif; ?>
        </template>

        <template v-else>
            <div class="box-shadow relative flex-1 rounded bg-white p-4 dark:bg-gray-900">
                <!-- Header -->
                <div class="mb-4 flex items-center justify-between">
                    <p class="text-base font-semibold text-gray-600 dark:text-white">
                        <?php echo app('translator')->get('admin::app.reporting.products.index.last-search-terms'); ?>
                    </p>

                    <a
                        href="<?php echo e(route('admin.reporting.products.view', ['type' => 'last-search-terms'])); ?>"
                        class="cursor-pointer text-sm text-blue-600 transition-all hover:underline"
                    >
                        <?php echo app('translator')->get('admin::app.reporting.products.index.view-details'); ?>
                    </a>
                </div>

                <!-- Content -->
                <div class="grid gap-4">
                    <template v-if="report.statistics.length">
                        <div class="table-responsive grid w-full overflow-hidden rounded bg-white dark:bg-gray-900">
                            <!-- Table Header -->
                            <div
                                class="row grid grid-cols-4 grid-rows-1 items-center gap-2.5 border-b bg-gray-50 px-4 py-2.5 font-semibold text-gray-600 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300"
                                style="grid-template-columns: repeat(3, minmax(0, 1fr));"
                            >
                                <div class="flex gap-2.5">
                                    <p class="text-gray-600 dark:text-gray-300">
                                        <?php echo app('translator')->get('admin::app.reporting.products.index.search-term'); ?>
                                    </p>
                                </div>

                                <div class="flex gap-2.5">
                                    <p class="text-gray-600 dark:text-gray-300">
                                        <?php echo app('translator')->get('admin::app.reporting.products.index.results'); ?>
                                    </p>
                                </div>

                                <div class="flex gap-2.5">
                                    <p class="text-gray-600 dark:text-gray-300">
                                        <?php echo app('translator')->get('admin::app.reporting.products.index.uses'); ?>
                                    </p>
                                </div>
                            </div>

                            <!-- Table Body -->
                            <div
                                class="row grid items-center gap-2.5 border-b px-4 py-4 text-gray-600 transition-all hover:bg-gray-50 dark:border-gray-800 dark:text-gray-300 dark:hover:bg-gray-950"
                                style="grid-template-columns: repeat(3, minmax(0, 1fr));"
                                v-for="record in report.statistics"
                            >
                                <p>{{ record.term }}</p>

                                <p>{{ record.results }}</p>

                                <p>{{ record.uses }}</p>
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
        app.component('v-reporting-products-last-search-terms', {
            template: '#v-reporting-products-last-search-terms-template',

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

                    filters.type = 'last-search-terms';

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
<?php $__env->stopPush(); endif; ?><?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Admin\src\Resources\views\reporting\products\last-search-terms.blade.php ENDPATH**/ ?>