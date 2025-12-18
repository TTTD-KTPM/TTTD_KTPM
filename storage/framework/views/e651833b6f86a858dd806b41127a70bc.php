<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['isMultiRow' => false]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['isMultiRow' => false]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<v-datagrid-table
    :is-loading="isLoading"
    :available="available"
    :applied="applied"
    @selectAll="selectAll"
    @sort="sort"
    @actionSuccess="get"
    @changePage="changePage"
>
    <?php echo e($slot); ?>

</v-datagrid-table>

<?php if (! $__env->hasRenderedOnce('bb0ae96a-ed2d-472b-81f0-0bf6faca1c0e')): $__env->markAsRenderedOnce('bb0ae96a-ed2d-472b-81f0-0bf6faca1c0e');
$__env->startPush('scripts'); ?>
    <script
        type="text/x-template"
        id="v-datagrid-table-template"
    >
        <div class="w-full overflow-x-auto rounded-xl border max-md:rounded-none max-md:border-0">
            <div class="table-responsive box-shadow grid w-full overflow-hidden rounded bg-white">
                <slot
                    name="header"
                    :is-loading="isLoading"
                    :available="available"
                    :applied="applied"
                    :select-all="selectAll"
                    :sort="sort"
                    :perform-action="performAction"
                >
                    <template v-if="isLoading">
                        <?php if (isset($component)) { $__componentOriginal777bf965aec78c0458ea6c268e8d1a8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal777bf965aec78c0458ea6c268e8d1a8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.shimmer.datagrid.table.head','data' => ['isMultiRow' => $isMultiRow]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::shimmer.datagrid.table.head'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['isMultiRow' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($isMultiRow)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal777bf965aec78c0458ea6c268e8d1a8a)): ?>
<?php $attributes = $__attributesOriginal777bf965aec78c0458ea6c268e8d1a8a; ?>
<?php unset($__attributesOriginal777bf965aec78c0458ea6c268e8d1a8a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal777bf965aec78c0458ea6c268e8d1a8a)): ?>
<?php $component = $__componentOriginal777bf965aec78c0458ea6c268e8d1a8a; ?>
<?php unset($__componentOriginal777bf965aec78c0458ea6c268e8d1a8a); ?>
<?php endif; ?>
                    </template>

                    <template v-else>
                        <div
                            class="row grid items-center gap-2.5 border-b border-zinc-200 bg-zinc-100 px-6 py-4 text-sm font-medium text-black max-md:p-4"
                            :style="`grid-template-columns: repeat(${gridsCount}, minmax(0, 1fr))`"
                        >
                            <!-- Mass Actions -->
                            <p v-if="available.massActions.length">
                                <label for="mass_action_select_all_records">
                                    <input
                                        type="checkbox"
                                        name="mass_action_select_all_records"
                                        id="mass_action_select_all_records"
                                        class="peer hidden"
                                        :checked="['all', 'partial'].includes(applied.massActions.meta.mode)"
                                        @change="selectAll"
                                    >

                                    <span
                                        class="icon-uncheck cursor-pointer rounded-md text-2xl"
                                        :class="[
                                            applied.massActions.meta.mode === 'all' ? 'peer-checked:icon-check-box' : (
                                                applied.massActions.meta.mode === 'partial' ? 'peer-checked:icon-checkbox-partial' : ''
                                            ),
                                        ]"
                                    >
                                    </span>
                                </label>
                            </p>

                            <!-- Columns -->
                            <template v-for="column in available.columns">
                                <p
                                    class="flex items-center gap-1.5"
                                    :class="{'cursor-pointer select-none': column.sortable}"
                                    @click="sort(column)"
                                    v-if="column.visibility"
                                >
                                    {{ column.label }}

                                    <i
                                        class="align-text-bottom text-base text-gray-800"
                                        :class="[applied.sort.order === 'asc' ? 'icon-arrow-down': 'icon-arrow-up']"
                                        v-if="column.index == applied.sort.column"
                                    ></i>
                                </p>
                            </template>

                            <!-- Actions -->
                            <p
                                class="place-self-end max-md:place-self-auto"
                                v-if="available.actions.length"
                            >
                                <?php echo app('translator')->get('shop::app.components.datagrid.table.actions'); ?>
                            </p>
                        </div>
                    </template>
                </slot>

                <slot
                    name="body"
                    :is-loading="isLoading"
                    :available="available"
                    :applied="applied"
                    :select-all="selectAll"
                    :sort="sort"
                    :perform-action="performAction"
                >
                    <template v-if="isLoading">
                        <?php if (isset($component)) { $__componentOriginal076edd40e27bf53b1f2102bae7803402 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal076edd40e27bf53b1f2102bae7803402 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.shimmer.datagrid.table.body','data' => ['isMultiRow' => $isMultiRow]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::shimmer.datagrid.table.body'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['isMultiRow' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($isMultiRow)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal076edd40e27bf53b1f2102bae7803402)): ?>
<?php $attributes = $__attributesOriginal076edd40e27bf53b1f2102bae7803402; ?>
<?php unset($__attributesOriginal076edd40e27bf53b1f2102bae7803402); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal076edd40e27bf53b1f2102bae7803402)): ?>
<?php $component = $__componentOriginal076edd40e27bf53b1f2102bae7803402; ?>
<?php unset($__componentOriginal076edd40e27bf53b1f2102bae7803402); ?>
<?php endif; ?>
                    </template>

                    <template v-else>
                        <template v-if="available.records.length">
                            <div
                                class="row grid items-center gap-2.5 border-b bg-white px-6 py-4 font-medium text-gray-600 transition-all max-md:p-4 max-md:text-xs"
                                v-for="record in available.records"
                                :style="`grid-template-columns: repeat(${gridsCount}, minmax(0, 1fr))`"
                            >
                                <!-- Mass Actions -->
                                <p v-if="available.massActions.length">
                                    <label :for="`mass_action_select_record_${record[available.meta.primary_column]}`">
                                        <input
                                            type="checkbox"
                                            :name="`mass_action_select_record_${record[available.meta.primary_column]}`"
                                            :value="record[available.meta.primary_column]"
                                            :id="`mass_action_select_record_${record[available.meta.primary_column]}`"
                                            class="peer hidden"
                                            v-model="applied.massActions.indices"
                                        >

                                        <span class="icon-uncheck peer-checked:icon-check-box cursor-pointer rounded-md text-2xl">
                                        </span>
                                    </label>
                                </p>

                                <!-- Columns -->
                                <template v-for="column in available.columns">
                                    <p
                                        class="break-words"
                                        v-html="record[column.index]"
                                        v-if="column.visibility"
                                    >
                                    </p>
                                </template>
                                
                                <!-- Actions -->
                                <p v-if="available.actions.length">
                                    <span
                                        class="float-right cursor-pointer rounded-md p-1.5 text-2xl transition-all hover:bg-gray-200"
                                        :class="action.icon"
                                        v-for="action in record.actions"
                                        @click="performAction(action)"
                                    >
                                        {{ ! action.icon ? action.title : '' }}
                                    </span>
                                </p>
                            </div>
                        </template>

                        <template v-else>
                            <div class="row grid border-b border-gray-300 px-4 py-4 text-center text-gray-600">
                                <p>
                                    <?php echo app('translator')->get('shop::app.components.datagrid.table.no-records-available'); ?>
                                </p>
                            </div>
                        </template>
                    </template>
                </slot>

                <slot
                    name="footer"
                    :available="available"
                    :applied="applied"
                    :change-page="changePage"
                >
                    <template v-if="isLoading">
                        <?php if (isset($component)) { $__componentOriginald2a17650606d676cada8d39484ecaadd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald2a17650606d676cada8d39484ecaadd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.shimmer.datagrid.table.footer','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::shimmer.datagrid.table.footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald2a17650606d676cada8d39484ecaadd)): ?>
<?php $attributes = $__attributesOriginald2a17650606d676cada8d39484ecaadd; ?>
<?php unset($__attributesOriginald2a17650606d676cada8d39484ecaadd); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald2a17650606d676cada8d39484ecaadd)): ?>
<?php $component = $__componentOriginald2a17650606d676cada8d39484ecaadd; ?>
<?php unset($__componentOriginald2a17650606d676cada8d39484ecaadd); ?>
<?php endif; ?>
                    </template>

                    <template v-else>
                        <!-- Information Panel -->
                        <div v-if="$parent.available.records.length" class="flex items-center justify-between p-6 max-md:p-2">
                            <p class="text-xs font-medium">
                                {{ "<?php echo app('translator')->get('shop::app.components.datagrid.table.showing'); ?>".replace(':firstItem', $parent.available.meta.from) }}
                                {{ "<?php echo app('translator')->get('shop::app.components.datagrid.table.to'); ?>".replace(':lastItem', $parent.available.meta.to) }}
                                {{ "<?php echo app('translator')->get('shop::app.components.datagrid.table.of'); ?>".replace(':total', $parent.available.meta.total) }}
                            </p>

                            <!-- Pagination -->
                            <div class="flex items-center gap-1">
                                <div
                                    class="inline-flex w-full max-w-max cursor-pointer appearance-none items-center justify-between gap-x-1 rounded-md border border-transparent p-1.5 text-center text-gray-600 transition-all marker:shadow hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-black active:border-gray-300"
                                    @click="changePage('previous')"
                                >
                                    <span class="icon-sort-left text-2xl"></span>
                                </div>

                                <div
                                    class="inline-flex w-full max-w-max cursor-pointer appearance-none items-center justify-between gap-x-1 rounded-md border border-transparent p-1.5 text-center text-gray-600 transition-all marker:shadow hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-black active:border-gray-300"
                                    @click="changePage('next')"
                                >
                                    <span class="icon-sort-right text-2xl"></span>
                                </div>
                            </div>

                            <nav aria-label="<?php echo app('translator')->get('shop::app.components.datagrid.table.page-navigation'); ?>">
                                <ul class="inline-flex items-center -space-x-px rounded-lg border border-zinc-200 max-md:px-0">
                                    <li  @click="changePage('previous')">
                                        <a
                                            href="javascript:void(0);"
                                            class="flex h-10 w-9 items-center justify-center font-medium leading-normal hover:bg-gray-100 max-md:h-8 max-md:w-6 max-md:justify-normal"
                                            aria-label="<?php echo app('translator')->get('shop::app.components.datagrid.table.previous-page'); ?>"
                                        >
                                            <span class="icon-arrow-left rtl:icon-arrow-right text-2xl"></span>
                                        </a>
                                    </li>

                                    <li>
                                        <input
                                            type="text"
                                            :value="$parent.available.meta.current_page"
                                            class="max-w-[42px] items-center border-l border-r px-4 py-2 font-medium leading-normal text-black hover:bg-gray-100 max-md:max-w-9 max-md:justify-normal max-md:px-0 max-md:py-1 max-md:text-center"
                                            @change="changePage(parseInt($event.target.value))"
                                            aria-label="<?php echo app('translator')->get('shop::app.components.datagrid.table.page-number'); ?>"
                                        >
                                    </li>

                                    <li @click="changePage('next')">
                                        <a
                                            href="javascript:void(0);"
                                            class="flex h-10 w-9 items-center justify-center font-medium leading-normal hover:bg-gray-100 max-md:h-8 max-md:w-6 max-md:justify-normal"
                                            aria-label="<?php echo app('translator')->get('shop::app.components.datagrid.table.next-page'); ?>"
                                        >
                                            <span class="icon-arrow-right rtl:icon-arrow-left text-2xl"></span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </template>
                </slot>
            </div>
        </div>
    </script>

    <script type="module">
        app.component('v-datagrid-table', {
            template: '#v-datagrid-table-template',

            props: ['isLoading', 'available', 'applied'],

            emits: ['selectAll', 'sort', 'actionSuccess', 'changePage'],

            computed: {
                gridsCount() {
                    let count = this.available.columns.filter((column) => column.visibility).length;

                    if (this.available.actions.length) {
                        ++count;
                    }

                    if (this.available.massActions.length) {
                        ++count;
                    }

                    return count;
                },
            },

            methods: {
                /**
                 * Change Page.
                 *
                 * The reason for choosing the numeric approach over the URL approach is to prevent any conflicts with our existing
                 * URLs. If we were to use the URL approach, it would introduce additional arguments in the `get` method, necessitating
                 * the addition of a `url` prop. Instead, by using the numeric approach, we can let Axios handle all the query parameters
                 * using the `applied` prop. This allows for a cleaner and more straightforward implementation.
                 *
                 * @param {string|integer} directionOrPageNumber
                 * @returns {void}
                 */
                 changePage(directionOrPageNumber) {
                    let newPage;

                    if (typeof directionOrPageNumber === 'string') {
                        if (directionOrPageNumber === 'previous') {
                            newPage = this.available.meta.current_page - 1;
                        } else if (directionOrPageNumber === 'next') {
                            newPage = this.available.meta.current_page + 1;
                        } else {
                            console.warn('Invalid Direction Provided : ' + directionOrPageNumber);

                            return;
                        }
                    }  else if (typeof directionOrPageNumber === 'number') {
                        newPage = directionOrPageNumber;
                    } else {
                        console.warn('Invalid Input Provided: ' + directionOrPageNumber);

                        return;
                    }

                    /**
                     * Check if the `newPage` is within the valid range.
                     */
                    if (newPage >= 1 && newPage <= this.available.meta.last_page) {
                        this.$emit('changePage', newPage);
                    } else {
                        console.warn('Invalid Page Provided: ' + newPage);
                    }
                },

                /**
                 * Select all records in the datagrid.
                 *
                 * @returns {void}
                 */
                selectAll() {
                    this.$emit('selectAll');
                },

                /**
                 * Perform a sorting operation on the specified column.
                 *
                 * @param {object} column
                 * @returns {void}
                 */
                sort(column) {
                    this.$emit('sort', column);
                },

                /**
                 * Perform the specified action.
                 *
                 * @param {object} action
                 * @returns {void}
                 */
                performAction(action) {
                    const method = action.method.toLowerCase();

                    switch (method) {
                        case 'get':
                            window.location.href = action.url;

                            break;

                        case 'post':
                        case 'put':
                        case 'patch':
                        case 'delete':
                            this.$emitter.emit('open-confirm-modal', {
                                agree: () => {
                                    this.$axios[method](action.url)
                                        .then(response => {
                                            this.$emitter.emit('add-flash', { type: 'success', message: response.data.message });

                                            this.$emit('actionSuccess', response.data);
                                        })
                                        .catch((error) => {
                                            this.$emitter.emit('add-flash', { type: 'error', message: error.response.data.message });

                                            this.$emit('actionError', error.response.data);
                                        });
                                }
                            });

                            break;

                        default:
                            console.error('Method not supported.');

                            break;
                    }
                },
            },
        });
    </script>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Shop\src/resources/views/components/datagrid/table.blade.php ENDPATH**/ ?>