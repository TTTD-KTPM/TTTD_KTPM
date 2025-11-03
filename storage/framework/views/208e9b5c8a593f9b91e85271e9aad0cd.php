<v-datagrid-search
    :is-loading="isLoading"
    :available="available"
    :applied="applied"
    @search="search"
>
    <?php echo e($slot); ?>

</v-datagrid-search>

<?php if (! $__env->hasRenderedOnce('1def0ca7-c7b3-4a01-ab2f-c1b3f1e106ac')): $__env->markAsRenderedOnce('1def0ca7-c7b3-4a01-ab2f-c1b3f1e106ac');
$__env->startPush('scripts'); ?>
    <script
        type="text/x-template"
        id="v-datagrid-search-template"
    >
        <slot
            name="search"
            :available="available"
            :applied="applied"
            :search="search"
            :get-searched-values="getSearchedValues"
        >
            <template v-if="isLoading">
                <?php if (isset($component)) { $__componentOriginalfb82da10aedb1966fce3a34eab1912d2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfb82da10aedb1966fce3a34eab1912d2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.shimmer.datagrid.toolbar.search','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::shimmer.datagrid.toolbar.search'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfb82da10aedb1966fce3a34eab1912d2)): ?>
<?php $attributes = $__attributesOriginalfb82da10aedb1966fce3a34eab1912d2; ?>
<?php unset($__attributesOriginalfb82da10aedb1966fce3a34eab1912d2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfb82da10aedb1966fce3a34eab1912d2)): ?>
<?php $component = $__componentOriginalfb82da10aedb1966fce3a34eab1912d2; ?>
<?php unset($__componentOriginalfb82da10aedb1966fce3a34eab1912d2); ?>
<?php endif; ?>
            </template>

            <template v-else>
                <div class="flex w-full items-center gap-x-1">
                    <!-- Search Panel -->
                    <div class="flex max-w-[445px] items-center max-md:w-full max-md:max-w-[250px]">
                        <div class="relative w-full">
                            <input
                                type="text"
                                name="search"
                                :value="getSearchedValues('all')"
                                class="rounded-lg border border-gray-300 bg-white px-3 py-2 text-base text-gray-600 transition-all hover:border-gray-400 focus:border-gray-400 max-md:max-w-[250px] max-md:py-2 max-sm:py-1.5 ltr:pr-8 rtl:pl-8"
                                placeholder="<?php echo app('translator')->get('shop::app.components.datagrid.toolbar.search.title'); ?>"
                                autocomplete="off"
                                @keyup.enter="search"
                            >

                            <div class="icon-search pointer-events-none absolute top-2.5 flex items-center text-xl max-sm:top-2 ltr:right-2.5 rtl:left-2.5">
                            </div>
                        </div>
                    </div>

                    <!-- Information Panel -->
                    <div class="max-md:hidden ltr:pl-2.5 rtl:pr-2.5">
                        <p class="text-sm font-light text-gray-800 max-md:w-full">
                            {{ "<?php echo app('translator')->get('shop::app.components.datagrid.toolbar.results'); ?>".replace(':total', available.meta.total) }}
                        </p>
                    </div>
                </div>
            </template>
        </slot>
    </script>

    <script type="module">
        app.component('v-datagrid-search', {
            template: '#v-datagrid-search-template',

            props: ['isLoading', 'available', 'applied'],

            emits: ['search'],

            data() {
                return {
                    filters: {
                        columns: [],
                    },
                };
            },

            mounted() {
                this.filters.columns = this.applied.filters.columns.filter((column) => column.index === 'all');
            },

            methods: {
                /**
                 * Perform a search operation based on the input value.
                 *
                 * @param {Event} $event
                 * @returns {void}
                 */
                search($event) {
                    let requestedValue = $event.target.value;

                    let appliedColumn = this.filters.columns.find(column => column.index === 'all');

                    if (! requestedValue) {
                        appliedColumn.value = [];

                        this.$emit('search', this.filters);

                        return;
                    }

                    if (appliedColumn) {
                        appliedColumn.value = [requestedValue];
                    } else {
                        this.filters.columns.push({
                            index: 'all',
                            value: [requestedValue]
                        });
                    }

                    this.$emit('search', this.filters);
                },

                /**
                 * Get the searched values for a specific column.
                 *
                 * @param {string} columnIndex
                 * @returns {Array}
                 */
                getSearchedValues(columnIndex) {
                    let appliedColumn = this.filters.columns.find(column => column.index === 'all');

                    return appliedColumn?.value ?? [];
                },
            },
        });
    </script>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Shop\src\Resources\views\components\datagrid\toolbar\search.blade.php ENDPATH**/ ?>