<v-datagrid-filter
    :is-loading="isLoading"
    :available="available"
    :applied="applied"
    @applyFilters="filter"
>
    <?php echo e($slot); ?>

</v-datagrid-filter>

<?php if (! $__env->hasRenderedOnce('d66a7f09-486f-4558-aad8-ddd6e57e8cb8')): $__env->markAsRenderedOnce('d66a7f09-486f-4558-aad8-ddd6e57e8cb8');
$__env->startPush('scripts'); ?>
    <script
        type="text/x-template"
        id="v-datagrid-filter-template"
    >
        <slot
            name="filter"
            :available="available"
            :applied="applied"
            :filters="filters"
            :apply-filters="applyFilters"
            :apply-column-values="applyColumnValues"
            :find-applied-column="findAppliedColumn"
            :has-any-applied-column-values="hasAnyAppliedColumnValues"
            :get-applied-column-values="getAppliedColumnValues"
            :remove-applied-column-value="removeAppliedColumnValue"
            :remove-applied-column-all-values="removeAppliedColumnAllValues"
        >
            <template v-if="isLoading">
                <?php if (isset($component)) { $__componentOriginalc6cf2317a9d5b1f3ddec5385f0a8d4bf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc6cf2317a9d5b1f3ddec5385f0a8d4bf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.shimmer.datagrid.toolbar.filter','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::shimmer.datagrid.toolbar.filter'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc6cf2317a9d5b1f3ddec5385f0a8d4bf)): ?>
<?php $attributes = $__attributesOriginalc6cf2317a9d5b1f3ddec5385f0a8d4bf; ?>
<?php unset($__attributesOriginalc6cf2317a9d5b1f3ddec5385f0a8d4bf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc6cf2317a9d5b1f3ddec5385f0a8d4bf)): ?>
<?php $component = $__componentOriginalc6cf2317a9d5b1f3ddec5385f0a8d4bf; ?>
<?php unset($__componentOriginalc6cf2317a9d5b1f3ddec5385f0a8d4bf); ?>
<?php endif; ?>
            </template>

            <template v-else>
                <?php if (isset($component)) { $__componentOriginal2b3e2da8ab003ef79d854b1862e64fc8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2b3e2da8ab003ef79d854b1862e64fc8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.drawer.index','data' => ['width' => '350px','ref' => 'filterDrawer']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::drawer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['width' => '350px','ref' => 'filterDrawer']); ?>
                     <?php $__env->slot('toggle', null, []); ?> 
                        <div
                            class="flex w-full max-w-[200px] cursor-pointer items-center justify-between gap-4 rounded-lg border border-zinc-200 bg-white py-2 text-sm transition-all hover:border-gray-400 focus:border-gray-400 max-md:w-fit ltr:pl-3 ltr:pr-4 max-md:ltr:pl-2.5 max-md:ltr:pr-2.5 rtl:pl-4 rtl:pr-3 max-md:rtl:pl-2.5 max-md:rtl:pr-2.5"
                            :class="{'[&>*]:text-blue-600': filters.columns.length > 0}"
                        >
                            <span class="flex items-center justify-between gap-1.5">
                                <span class="icon-filter text-2xl"></span>

                                <span class="max-md:hidden">
                                    <?php echo app('translator')->get('shop::app.components.datagrid.toolbar.filter.title'); ?>
                                </span>
                            </span>
                        </div>
                     <?php $__env->endSlot(); ?>

                     <?php $__env->slot('header', null, ['class' => 'border-b border-zinc-200 !px-4']); ?> 
                        <p class="text-lg font-semibold">
                            <?php echo app('translator')->get('shop::app.components.datagrid.toolbar.filter.apply-filter'); ?>
                        </p>
                     <?php $__env->endSlot(); ?>

                     <?php $__env->slot('content', null, ['class' => '!p-4 max-md:!pt-2.5']); ?> 
                        <div v-for="column in available.columns">
                            <template v-if="column.filterable">
                                <!-- Boolean -->
                                <template v-if="column.type === 'boolean'">
                                    <!-- Dropdown -->
                                    <template v-if="column.filterable_type === 'dropdown'">
                                        <div class="flex items-center justify-between">
                                            <p
                                                class="text-sm font-medium leading-6 text-gray-800"
                                                v-text="column.label"
                                            >
                                            </p>

                                            <div
                                                class="flex items-center gap-x-1.5"
                                                @click="removeAppliedColumnAllValues(column.index)"
                                            >
                                                <p
                                                    class="cursor-pointer text-xs font-medium leading-6 text-blue-600"
                                                    v-if="hasAnyAppliedColumnValues(column.index)"
                                                >
                                                    <?php echo app('translator')->get('shop::app.components.datagrid.toolbar.filter.custom-filters.clear-all'); ?>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="mb-2 mt-1.5">
                                            <?php if (isset($component)) { $__componentOriginal6eb652d0a4a36e6466d8d4f363feb553 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6eb652d0a4a36e6466d8d4f363feb553 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.dropdown.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                 <?php $__env->slot('toggle', null, []); ?> 
                                                    <button
                                                        type="button"
                                                        class="flex w-full cursor-pointer items-center justify-between gap-4 rounded-lg border border-zinc-200 bg-white py-2 text-sm transition-all hover:border-gray-400 focus:border-gray-400 max-md:w-full max-md:!py-1.5 ltr:pl-4 ltr:pr-3 max-md:ltr:pl-2.5 max-md:ltr:pr-2.5 rtl:pl-3 rtl:pr-4 max-md:rtl:pl-2.5 max-md:rtl:pr-2.5"
                                                    >
                                                        <!-- If Allow Multiple Values -->
                                                        <span
                                                            v-text="'<?php echo app('translator')->get('shop::app.components.datagrid.toolbar.filter.dropdown.select'); ?>'"
                                                            v-if="column.allow_multiple_values"
                                                        >
                                                        </span>

                                                        <!-- If Allow Single Value -->
                                                        <span
                                                            v-text="column.filterable_options.find((option => option.value === getAppliedColumnValues(column.index)))?.label ?? '<?php echo app('translator')->get('admin::app.components.datagrid.filters.select'); ?>'"
                                                            v-else
                                                        >
                                                        </span>

                                                        <span class="icon-sort-down text-2xl"></span>
                                                    </button>
                                                 <?php $__env->endSlot(); ?>

                                                 <?php $__env->slot('menu', null, []); ?> 
                                                    <?php if (isset($component)) { $__componentOriginalb61dc971083484c78229c771be09733d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb61dc971083484c78229c771be09733d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.dropdown.menu.item','data' => ['vFor' => 'option in column.filterable_options','vText' => 'option.label','@click' => 'addFilter(option.value, column)']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::dropdown.menu.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['v-for' => 'option in column.filterable_options','v-text' => 'option.label','@click' => 'addFilter(option.value, column)']); ?>
                                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb61dc971083484c78229c771be09733d)): ?>
<?php $attributes = $__attributesOriginalb61dc971083484c78229c771be09733d; ?>
<?php unset($__attributesOriginalb61dc971083484c78229c771be09733d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb61dc971083484c78229c771be09733d)): ?>
<?php $component = $__componentOriginalb61dc971083484c78229c771be09733d; ?>
<?php unset($__componentOriginalb61dc971083484c78229c771be09733d); ?>
<?php endif; ?>
                                                 <?php $__env->endSlot(); ?>
                                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6eb652d0a4a36e6466d8d4f363feb553)): ?>
<?php $attributes = $__attributesOriginal6eb652d0a4a36e6466d8d4f363feb553; ?>
<?php unset($__attributesOriginal6eb652d0a4a36e6466d8d4f363feb553); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6eb652d0a4a36e6466d8d4f363feb553)): ?>
<?php $component = $__componentOriginal6eb652d0a4a36e6466d8d4f363feb553; ?>
<?php unset($__componentOriginal6eb652d0a4a36e6466d8d4f363feb553); ?>
<?php endif; ?>
                                        </div>

                                        <div class="mb-4 flex flex-wrap gap-2">
                                            <!-- If Allow Multiple Values -->
                                            <template v-if="column.allow_multiple_values">
                                                <p
                                                    class="flex items-center rounded bg-gray-600 px-2 py-1 font-semibold text-white"
                                                    v-for="appliedColumnValue in getAppliedColumnValues(column.index)"
                                                >
                                                    <!-- Retrieving the label from the options based on the applied column value. -->
                                                    <span v-text="column.filterable_options.find((option => option.value == appliedColumnValue)).label"></span>

                                                    <span
                                                        class="icon-cross cursor-pointer text-lg text-white ltr:ml-1.5 rtl:mr-1.5"
                                                        @click="removeAppliedColumnValue(column.index, appliedColumnValue)"
                                                    >
                                                    </span>
                                                </p>
                                            </template>
                                        </div>
                                    </template>

                                    <!-- Basic (If Needed) -->
                                    <template v-else></template>
                                </template>

                                <!-- Date Range -->
                                <template v-else-if="column.type === 'date'">
                                    <!-- Range -->
                                    <template v-if="column.filterable_type === 'date_range'">
                                        <div class="flex items-center justify-between">
                                            <p
                                                class="text-sm font-medium leading-6 text-gray-800"
                                                v-text="column.label"
                                            >
                                            </p>

                                            <div
                                                class="flex items-center gap-x-1.5"
                                                @click="removeAppliedColumnAllValues(column.index)"
                                            >
                                                <p
                                                    class="cursor-pointer text-xs font-medium leading-6 text-blue-600"
                                                    v-if="hasAnyAppliedColumnValues(column.index)"
                                                >
                                                    <?php echo app('translator')->get('shop::app.components.datagrid.toolbar.filter.custom-filters.clear-all'); ?>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="mt-4 grid grid-cols-2 gap-1.5 max-sm:my-2">
                                            <p
                                                class="cursor-pointer rounded-md border border-gray-300 px-2 py-1.5 text-center font-medium leading-6 text-gray-600 max-md:text-sm max-sm:font-normal"
                                                v-for="option in column.filterable_options"
                                                v-text="option.label"
                                                @click="addFilter(
                                                    $event,
                                                    column,
                                                    { quickFilter: { isActive: true, selectedFilter: option } }
                                                )"
                                            >
                                            </p>

                                            <?php if (isset($component)) { $__componentOriginale0625c65349cebd7c8be1b8e7761118d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale0625c65349cebd7c8be1b8e7761118d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.flat-picker.date','data' => [':allowInput' => 'false']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::flat-picker.date'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([':allow-input' => 'false']); ?>
                                                <input
                                                    type="date"
                                                    :name="`${column.index}[from]`"
                                                    value=""
                                                    class="flex min-h-10 w-full rounded-md border px-3 py-2 text-sm text-gray-600 transition-all hover:border-gray-400 max-sm:py-1.5"
                                                    :placeholder="column.label"
                                                    :ref="`${column.index}[from]`"
                                                    @change="addFilter(
                                                        $event,
                                                        column,
                                                        { range: { name: 'from' }, quickFilter: { isActive: false } }
                                                    )"
                                                />
                                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale0625c65349cebd7c8be1b8e7761118d)): ?>
<?php $attributes = $__attributesOriginale0625c65349cebd7c8be1b8e7761118d; ?>
<?php unset($__attributesOriginale0625c65349cebd7c8be1b8e7761118d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale0625c65349cebd7c8be1b8e7761118d)): ?>
<?php $component = $__componentOriginale0625c65349cebd7c8be1b8e7761118d; ?>
<?php unset($__componentOriginale0625c65349cebd7c8be1b8e7761118d); ?>
<?php endif; ?>

                                            <?php if (isset($component)) { $__componentOriginale0625c65349cebd7c8be1b8e7761118d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale0625c65349cebd7c8be1b8e7761118d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.flat-picker.date','data' => [':allowInput' => 'false']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::flat-picker.date'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([':allow-input' => 'false']); ?>
                                                <input
                                                    type="date"
                                                    :name="`${column.index}[to]`"
                                                    value=""
                                                    class="flex min-h-10 w-full rounded-md border px-3 py-2 text-sm text-gray-600 transition-all hover:border-gray-400 max-sm:py-1.5"
                                                    :placeholder="column.label"
                                                    :ref="`${column.index}[from]`"
                                                    @change="addFilter(
                                                        $event,
                                                        column,
                                                        { range: { name: 'to' }, quickFilter: { isActive: false } }
                                                    )"
                                                />
                                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale0625c65349cebd7c8be1b8e7761118d)): ?>
<?php $attributes = $__attributesOriginale0625c65349cebd7c8be1b8e7761118d; ?>
<?php unset($__attributesOriginale0625c65349cebd7c8be1b8e7761118d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale0625c65349cebd7c8be1b8e7761118d)): ?>
<?php $component = $__componentOriginale0625c65349cebd7c8be1b8e7761118d; ?>
<?php unset($__componentOriginale0625c65349cebd7c8be1b8e7761118d); ?>
<?php endif; ?>

                                            <div class="mb-4 flex flex-wrap gap-2">
                                                <p
                                                    class="flex items-center rounded bg-gray-600 px-2 py-1 font-semibold text-white"
                                                    v-if="findAppliedColumn(column.index)"
                                                >
                                                    {{ getFormattedDates(findAppliedColumn(column.index)) }}

                                                    <span
                                                        class="icon-cancel cursor-pointer text-lg text-white ltr:ml-1.5 rtl:mr-1.5"
                                                        @click="removeAppliedColumnValue(column.index, appliedColumnValue)"
                                                    >
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                    </template>

                                    <!-- Basic -->
                                    <template v-else>
                                        <div class="flex items-center justify-between">
                                            <p
                                                class="text-sm font-medium leading-6 text-gray-800"
                                                v-text="column.label"
                                            >
                                            </p>

                                            <div
                                                class="flex items-center gap-x-1.5"
                                                @click="removeAppliedColumnAllValues(column.index)"
                                            >
                                                <p
                                                    class="cursor-pointer text-xs font-medium leading-6 text-blue-600"
                                                    v-if="hasAnyAppliedColumnValues(column.index)"
                                                >
                                                    <?php echo app('translator')->get('shop::app.components.datagrid.toolbar.filter.custom-filters.clear-all'); ?>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="mt-4 grid max-sm:my-2">
                                            <?php if (isset($component)) { $__componentOriginale0625c65349cebd7c8be1b8e7761118d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale0625c65349cebd7c8be1b8e7761118d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.flat-picker.date','data' => [':allowInput' => 'false']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::flat-picker.date'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([':allow-input' => 'false']); ?>
                                                <input
                                                    type="date"
                                                    :name="column.index"
                                                    value=""
                                                    class="flex min-h-10 w-full rounded-md border px-3 py-2 text-sm text-gray-600 transition-all hover:border-gray-400 max-sm:py-1.5"
                                                    :placeholder="column.label"
                                                    :ref="column.index"
                                                    @change="addFilter($event, column)"
                                                />
                                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale0625c65349cebd7c8be1b8e7761118d)): ?>
<?php $attributes = $__attributesOriginale0625c65349cebd7c8be1b8e7761118d; ?>
<?php unset($__attributesOriginale0625c65349cebd7c8be1b8e7761118d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale0625c65349cebd7c8be1b8e7761118d)): ?>
<?php $component = $__componentOriginale0625c65349cebd7c8be1b8e7761118d; ?>
<?php unset($__componentOriginale0625c65349cebd7c8be1b8e7761118d); ?>
<?php endif; ?>

                                            <div class="mb-4 flex flex-wrap gap-2">
                                                <p
                                                    class="flex items-center rounded bg-gray-600 px-2 py-1 font-semibold text-white"
                                                    v-if="findAppliedColumn(column.index)"
                                                >
                                                    {{ getFormattedDates(findAppliedColumn(column.index)) }}

                                                    <span
                                                        class="icon-cancel cursor-pointer text-lg text-white ltr:ml-1.5 rtl:mr-1.5"
                                                        @click="removeAppliedColumnValue(column.index, appliedColumnValue)"
                                                    >
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                    </template>
                                </template>

                                <!-- Date Time Range -->
                                <template v-else-if="column.type === 'datetime'">
                                    <!-- Range -->
                                    <template v-if="column.filterable_type === 'datetime_range'">
                                        <div class="flex items-center justify-between">
                                            <p
                                                class="text-sm font-medium leading-6 text-gray-800"
                                                v-text="column.label"
                                            >
                                            </p>

                                            <div
                                                class="flex items-center gap-x-1.5"
                                                @click="removeAppliedColumnAllValues(column.index)"
                                            >
                                                <p
                                                    class="cursor-pointer text-xs font-medium leading-6 text-blue-600"
                                                    v-if="hasAnyAppliedColumnValues(column.index)"
                                                >
                                                    <?php echo app('translator')->get('shop::app.components.datagrid.toolbar.filter.custom-filters.clear-all'); ?>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="my-4 grid grid-cols-2 gap-1.5">
                                            <p
                                                class="cursor-pointer rounded-md border border-gray-300 px-2 py-1.5 text-center font-medium leading-6 text-gray-600 max-md:text-sm max-sm:font-normal"
                                                v-for="option in column.filterable_options"
                                                v-text="option.label"
                                                @click="addFilter(
                                                    $event,
                                                    column,
                                                    { quickFilter: { isActive: true, selectedFilter: option } }
                                                )"
                                            >
                                            </p>

                                            <?php if (isset($component)) { $__componentOriginalbe7f8f533eb681aa747412af470e462c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbe7f8f533eb681aa747412af470e462c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.flat-picker.datetime','data' => [':allowInput' => 'false']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::flat-picker.datetime'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([':allow-input' => 'false']); ?>
                                                <input
                                                    type="datetime-local"
                                                    :name="`${column.index}[from]`"
                                                    value=""
                                                    class="flex min-h-10 w-full rounded-md border px-3 py-2 text-sm text-gray-600 transition-all hover:border-gray-400"
                                                    :placeholder="column.label"
                                                    :ref="`${column.index}[from]`"
                                                    @change="addFilter(
                                                        $event,
                                                        column,
                                                        { range: { name: 'from' }, quickFilter: { isActive: false } }
                                                    )"
                                                />
                                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbe7f8f533eb681aa747412af470e462c)): ?>
<?php $attributes = $__attributesOriginalbe7f8f533eb681aa747412af470e462c; ?>
<?php unset($__attributesOriginalbe7f8f533eb681aa747412af470e462c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbe7f8f533eb681aa747412af470e462c)): ?>
<?php $component = $__componentOriginalbe7f8f533eb681aa747412af470e462c; ?>
<?php unset($__componentOriginalbe7f8f533eb681aa747412af470e462c); ?>
<?php endif; ?>

                                            <?php if (isset($component)) { $__componentOriginalbe7f8f533eb681aa747412af470e462c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbe7f8f533eb681aa747412af470e462c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.flat-picker.datetime','data' => [':allowInput' => 'false']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::flat-picker.datetime'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([':allow-input' => 'false']); ?>
                                                <input
                                                    type="datetime-local"
                                                    :name="`${column.index}[to]`"
                                                    value=""
                                                    class="flex min-h-10 w-full rounded-md border px-3 py-2 text-sm text-gray-600 transition-all hover:border-gray-400"
                                                    :placeholder="column.label"
                                                    :ref="`${column.index}[from]`"
                                                    @change="addFilter(
                                                        $event,
                                                        column,
                                                        { range: { name: 'to' }, quickFilter: { isActive: false } }
                                                    )"
                                                />
                                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbe7f8f533eb681aa747412af470e462c)): ?>
<?php $attributes = $__attributesOriginalbe7f8f533eb681aa747412af470e462c; ?>
<?php unset($__attributesOriginalbe7f8f533eb681aa747412af470e462c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbe7f8f533eb681aa747412af470e462c)): ?>
<?php $component = $__componentOriginalbe7f8f533eb681aa747412af470e462c; ?>
<?php unset($__componentOriginalbe7f8f533eb681aa747412af470e462c); ?>
<?php endif; ?>

                                            <div class="mb-4 flex flex-wrap gap-2">
                                                <p
                                                    class="flex items-center rounded bg-gray-600 px-2 py-1 font-semibold text-white"
                                                    v-if="findAppliedColumn(column.index)"
                                                >
                                                    {{ getFormattedDates(findAppliedColumn(column.index)) }}

                                                    <span
                                                        class="icon-cancel cursor-pointer text-lg text-white ltr:ml-1.5 rtl:mr-1.5"
                                                        @click="removeAppliedColumnValue(column.index, appliedColumnValue)"
                                                    >
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                    </template>

                                    <!-- Basic -->
                                    <template v-else>
                                        <div class="flex items-center justify-between">
                                            <p
                                                class="text-sm font-medium leading-6 text-gray-800"
                                                v-text="column.label"
                                            >
                                            </p>

                                            <div
                                                class="flex items-center gap-x-1.5"
                                                @click="removeAppliedColumnAllValues(column.index)"
                                            >
                                                <p
                                                    class="cursor-pointer text-xs font-medium leading-6 text-blue-600"
                                                    v-if="hasAnyAppliedColumnValues(column.index)"
                                                >
                                                    <?php echo app('translator')->get('shop::app.components.datagrid.toolbar.filter.custom-filters.clear-all'); ?>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="my-4 grid">
                                            <?php if (isset($component)) { $__componentOriginalbe7f8f533eb681aa747412af470e462c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbe7f8f533eb681aa747412af470e462c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.flat-picker.datetime','data' => [':allowInput' => 'false']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::flat-picker.datetime'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([':allow-input' => 'false']); ?>
                                                <input
                                                    :type="datetime-local"
                                                    :name="column.index"
                                                    value=""
                                                    class="flex min-h-10 w-full rounded-md border px-3 py-2 text-sm text-gray-600 transition-all hover:border-gray-400"
                                                    :placeholder="column.label"
                                                    :ref="column.index"
                                                    @change="addFilter($event, column)"
                                                />
                                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbe7f8f533eb681aa747412af470e462c)): ?>
<?php $attributes = $__attributesOriginalbe7f8f533eb681aa747412af470e462c; ?>
<?php unset($__attributesOriginalbe7f8f533eb681aa747412af470e462c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbe7f8f533eb681aa747412af470e462c)): ?>
<?php $component = $__componentOriginalbe7f8f533eb681aa747412af470e462c; ?>
<?php unset($__componentOriginalbe7f8f533eb681aa747412af470e462c); ?>
<?php endif; ?>

                                            <div class="mb-4 flex flex-wrap gap-2">
                                                <p
                                                    class="flex items-center rounded bg-gray-600 px-2 py-1 font-semibold text-white"
                                                    v-if="findAppliedColumn(column.index)"
                                                >
                                                    {{ getFormattedDates(findAppliedColumn(column.index)) }}

                                                    <span
                                                        class="icon-cancel cursor-pointer text-lg text-white ltr:ml-1.5 rtl:mr-1.5"
                                                        @click="removeAppliedColumnValue(column.index, appliedColumnValue)"
                                                    >
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                    </template>
                                </template>

                                <!-- Rest -->
                                <template v-else>
                                    <!-- Dropdown -->
                                    <template v-if="column.filterable_type === 'dropdown'">
                                        <div class="flex items-center justify-between">
                                            <p
                                                class="text-sm font-medium leading-6 text-gray-800"
                                                v-text="column.label"
                                            >
                                            </p>

                                            <div
                                                class="flex items-center gap-x-1.5"
                                                @click="removeAppliedColumnAllValues(column.index)"
                                            >
                                                <p
                                                    class="cursor-pointer text-xs font-medium leading-6 text-blue-600"
                                                    v-if="hasAnyAppliedColumnValues(column.index)"
                                                >
                                                    <?php echo app('translator')->get('shop::app.components.datagrid.toolbar.filter.custom-filters.clear-all'); ?>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="mb-2 mt-1.5">
                                            <?php if (isset($component)) { $__componentOriginal6eb652d0a4a36e6466d8d4f363feb553 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6eb652d0a4a36e6466d8d4f363feb553 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.dropdown.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                 <?php $__env->slot('toggle', null, []); ?> 
                                                    <button
                                                        type="button"
                                                        class="flex w-full cursor-pointer items-center justify-between gap-4 rounded-lg border border-zinc-200 bg-white py-2 text-sm transition-all hover:border-gray-400 focus:border-gray-400 max-md:w-full max-md:py-1.5 ltr:pl-4 ltr:pr-3 max-md:ltr:pl-2.5 max-md:ltr:pr-2.5 rtl:pl-3 rtl:pr-4 max-md:rtl:pl-2.5 max-md:rtl:pr-2.5"
                                                    >
                                                        <!-- If Allow Multiple Values -->
                                                        <span
                                                            v-text="'<?php echo app('translator')->get('shop::app.components.datagrid.toolbar.filter.dropdown.select'); ?>'"
                                                            v-if="column.allow_multiple_values"
                                                        >
                                                        </span>

                                                        <!-- If Allow Single Value -->
                                                        <span
                                                            v-text="column.filterable_options.find((option => option.value === getAppliedColumnValues(column.index)))?.label ?? '<?php echo app('translator')->get('admin::app.components.datagrid.filters.select'); ?>'"
                                                            v-else
                                                        >
                                                        </span>

                                                        <span class="icon-arrow-down text-2xl"></span>
                                                    </button>
                                                 <?php $__env->endSlot(); ?>

                                                 <?php $__env->slot('menu', null, ['class' => 'max-sm:!py-0']); ?> 
                                                    <?php if (isset($component)) { $__componentOriginalb61dc971083484c78229c771be09733d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb61dc971083484c78229c771be09733d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.dropdown.menu.item','data' => ['vFor' => 'option in column.filterable_options','vText' => 'option.label','@click' => 'addFilter(option.value, column)']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::dropdown.menu.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['v-for' => 'option in column.filterable_options','v-text' => 'option.label','@click' => 'addFilter(option.value, column)']); ?>
                                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb61dc971083484c78229c771be09733d)): ?>
<?php $attributes = $__attributesOriginalb61dc971083484c78229c771be09733d; ?>
<?php unset($__attributesOriginalb61dc971083484c78229c771be09733d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb61dc971083484c78229c771be09733d)): ?>
<?php $component = $__componentOriginalb61dc971083484c78229c771be09733d; ?>
<?php unset($__componentOriginalb61dc971083484c78229c771be09733d); ?>
<?php endif; ?>
                                                 <?php $__env->endSlot(); ?>
                                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6eb652d0a4a36e6466d8d4f363feb553)): ?>
<?php $attributes = $__attributesOriginal6eb652d0a4a36e6466d8d4f363feb553; ?>
<?php unset($__attributesOriginal6eb652d0a4a36e6466d8d4f363feb553); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6eb652d0a4a36e6466d8d4f363feb553)): ?>
<?php $component = $__componentOriginal6eb652d0a4a36e6466d8d4f363feb553; ?>
<?php unset($__componentOriginal6eb652d0a4a36e6466d8d4f363feb553); ?>
<?php endif; ?>
                                        </div>

                                        <div class="mb-4 flex flex-wrap gap-2">
                                            <!-- If Allow Multiple Values -->
                                            <template v-if="column.allow_multiple_values">
                                                <p
                                                    class="flex items-center rounded bg-gray-600 px-2 py-1 font-semibold text-white"
                                                    v-for="appliedColumnValue in getAppliedColumnValues(column.index)"
                                                >
                                                    <!-- Retrieving the label from the options based on the applied column value. -->
                                                    <span v-text="column.filterable_options.find((option => option.value == appliedColumnValue)).label"></span>

                                                    <span
                                                        class="icon-cancel cursor-pointer text-lg text-white ltr:ml-1.5 rtl:mr-1.5"
                                                        @click="removeAppliedColumnValue(column.index, appliedColumnValue)"
                                                    >
                                                    </span>
                                                </p>
                                            </template>
                                        </div>
                                    </template>

                                    <!-- Basic -->
                                    <template v-else>
                                        <div class="flex items-center justify-between">
                                            <p
                                                class="text-sm font-medium leading-6 text-gray-800"
                                                v-text="column.label"
                                            >
                                            </p>

                                            <div
                                                class="flex items-center gap-x-1.5"
                                                @click="removeAppliedColumnAllValues(column.index)"
                                            >
                                                <p
                                                    class="cursor-pointer text-xs font-medium leading-6 text-blue-600"
                                                    v-if="hasAnyAppliedColumnValues(column.index)"
                                                >
                                                    <?php echo app('translator')->get('shop::app.components.datagrid.toolbar.filter.custom-filters.clear-all'); ?>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="mb-2 mt-1.5 grid">
                                            <input
                                                type="text"
                                                class="w-full rounded-lg border px-3 py-2 text-sm text-gray-600 transition-all hover:border-gray-400 focus:border-gray-400 max-sm:mb-0"
                                                :name="column.index"
                                                :placeholder="column.label"
                                                @keyup.enter="addFilter($event, column)"
                                            />
                                        </div>

                                        <div class="mb-4 flex flex-wrap gap-2">
                                            <!-- If Allow Multiple Values -->
                                            <template v-if="column.allow_multiple_values">
                                                <p
                                                    class="flex items-center rounded bg-gray-600 px-2 py-1 font-semibold text-white"
                                                    v-for="appliedColumnValue in getAppliedColumnValues(column.index)"
                                                >
                                                    <span v-text="appliedColumnValue"></span>

                                                    <span
                                                        class="icon-cancel cursor-pointer text-lg text-white ltr:ml-1.5 rtl:mr-1.5"
                                                        @click="removeAppliedColumnValue(column.index, appliedColumnValue)"
                                                    >
                                                    </span>
                                                </p>
                                            </template>

                                            <!-- If Allow Single Value -->
                                            <template v-else>
                                                <p
                                                    class="flex items-center rounded bg-gray-600 px-2 py-1 font-semibold text-white"
                                                    v-if="getAppliedColumnValues(column.index) !== ''"
                                                >
                                                    <span v-text="getAppliedColumnValues(column.index)"></span>

                                                    <span
                                                        class="icon-cancel cursor-pointer text-lg text-white ltr:ml-1.5 rtl:mr-1.5"
                                                        @click="removeAppliedColumnValue(column.index, getAppliedColumnValues(column.index))"
                                                    >
                                                    </span>
                                                </p>
                                            </template>
                                        </div>
                                    </template>
                                </template>
                            </template>
                        </div>

                        <div>
                            <!-- Apply Filter Button -->
                            <button
                                type="button"
                                class="primary-button w-full max-w-full p-2.5 text-sm font-medium"
                                @click="applyFilters"
                                :disabled="! isFilterDirty"
                            >
                                <?php echo app('translator')->get('admin::app.components.datagrid.toolbar.filter.apply-filters-btn'); ?>
                            </button>
                        </div>
                     <?php $__env->endSlot(); ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2b3e2da8ab003ef79d854b1862e64fc8)): ?>
<?php $attributes = $__attributesOriginal2b3e2da8ab003ef79d854b1862e64fc8; ?>
<?php unset($__attributesOriginal2b3e2da8ab003ef79d854b1862e64fc8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2b3e2da8ab003ef79d854b1862e64fc8)): ?>
<?php $component = $__componentOriginal2b3e2da8ab003ef79d854b1862e64fc8; ?>
<?php unset($__componentOriginal2b3e2da8ab003ef79d854b1862e64fc8); ?>
<?php endif; ?>
            </template>
        </slot>
    </script>

    <script type="module">
        app.component('v-datagrid-filter', {
            template: '#v-datagrid-filter-template',

            props: ['isLoading', 'available', 'applied'],

            emits: ['applyFilters'],

            data() {
                return {
                    filters: {
                        columns: [],
                    },

                    isFilterDirty: false,
                };
            },

            mounted() {
                this.filters.columns = this.applied.filters.columns.filter((column) => column.index !== 'all');
            },

            methods: {
                /**
                 * Apply all added filters.
                 *
                 * @returns {void}
                 */
                applyFilters() {
                    this.$emit('applyFilters', this.filters);

                    this.$refs.filterDrawer.close();
                },

                /**
                 * Add filter.
                 *
                 * @param {Event} $event
                 * @param {object} column
                 * @param {object} additional
                 * @returns {void}
                 */
                addFilter($event, column = null, additional = {}) {
                    let quickFilter = additional?.quickFilter;

                    if (quickFilter?.isActive) {
                        let options = quickFilter.selectedFilter;

                        switch (column.type) {
                            case 'date':
                            case 'datetime':
                                this.applyColumnValues(column, options.name);

                                break;

                            default:
                                break;
                        }
                    } else {
                        /**
                         * Here, either a real event will come or a string value. If a string value is present, then
                         * we create a similar event-like structure to avoid any breakage and make it easy to use.
                         */
                        if ($event?.target?.value === undefined) {
                            $event = {
                                target: {
                                    value: $event,
                                }
                            };
                        }

                        this.applyColumnValues(column, $event.target.value, additional);

                        if (column) {
                            $event.target.value = '';
                        }
                    }
                },

                /**
                 * Apply column values.
                 *
                 * @param {object} column
                 * @param {string} requestedValue
                 * @param {object} additional
                 * @returns {void}
                 */
                applyColumnValues(column, requestedValue, additional = {}) {
                    let appliedColumn = this.findAppliedColumn(column?.index);

                    if (
                        requestedValue === undefined ||
                        requestedValue === '' ||
                        (appliedColumn?.allow_multiple_values && appliedColumn?.value.includes(requestedValue)) ||
                        (! appliedColumn?.allow_multiple_values && appliedColumn?.value === requestedValue)
                    ) {
                        return;
                    }

                    switch (column.type) {
                        case 'date':
                        case 'datetime':
                            let { range } = additional;

                            if (appliedColumn) {
                                if (range) {
                                    let appliedRanges = ['', ''];

                                    if (typeof appliedColumn.value !== 'string') {
                                        appliedRanges = appliedColumn.value[0];
                                    }

                                    if (range.name == 'from') {
                                        appliedRanges[0] = requestedValue;
                                    }

                                    if (range.name == 'to') {
                                        appliedRanges[1] = requestedValue;
                                    }

                                    appliedColumn.value = [appliedRanges];
                                } else {
                                    appliedColumn.value = requestedValue;
                                }
                            } else {
                                if (range) {
                                    let appliedRanges = ['', ''];

                                    if (range.name == 'from') {
                                        appliedRanges[0] = requestedValue;
                                    }

                                    if (range.name == 'to') {
                                        appliedRanges[1] = requestedValue;
                                    }

                                    this.filters.columns.push({
                                        index: column.index,
                                        label: column.label,
                                        type: column.type,
                                        value: [appliedRanges]
                                    });
                                } else {
                                    this.filters.columns.push({
                                        index: column.index,
                                        label: column.label,
                                        type: column.type,
                                        value: requestedValue
                                    });
                                }
                            }

                            break;

                        default:
                            if (appliedColumn) {
                                if (appliedColumn.allow_multiple_values) {
                                    appliedColumn.value.push(requestedValue);
                                } else {
                                    appliedColumn.value = requestedValue;
                                }
                            } else {
                                this.filters.columns.push({
                                    index: column.index,
                                    label: column.label,
                                    type: column.type,
                                    value: column.allow_multiple_values ? [requestedValue] : requestedValue,
                                    allow_multiple_values: column.allow_multiple_values,
                                });
                            }

                            break;
                    }

                    this.isFilterDirty = true;
                },

                /**
                 * Get formatted dates.
                 *
                 * @param {object} appliedColumn
                 * @returns {string}
                 */
                getFormattedDates(appliedColumn)
                {
                    if (! appliedColumn) {
                        return '';
                    }

                    if (typeof appliedColumn.value === 'string') {
                        const availableColumn = this.available.columns.find(column => column.index === appliedColumn.index);

                        if (availableColumn.filterable_type === 'date_range' || availableColumn.filterable_type === 'datetime_range') {
                            const option = availableColumn.filterable_options.find(option => option.name === appliedColumn.value);

                            return option.label;
                        }

                        return appliedColumn.value;
                    }

                    if (! appliedColumn.value.length) {
                        return '';
                    }

                    return appliedColumn.value[0].join(' to ');
                },

                /**
                 * Check if any values are applied for the specified column.
                 *
                 * @param {object} column
                 * @returns {boolean}
                 */
                hasAnyValue(column) {
                    if (column.allow_multiple_values) {
                        return column.value.length > 0;
                    }

                    return column.value !== '';
                },

                /**
                 * Find applied column.
                 *
                 * @param {string} columnIndex
                 * @returns {object}
                 */
                findAppliedColumn(columnIndex) {
                    return this.filters.columns.find(column => column.index === columnIndex);
                },

                /**
                 * Check if any values are applied for the specified column.
                 *
                 * @param {string} columnIndex
                 * @returns {boolean}
                 */
                hasAnyAppliedColumnValues(columnIndex) {
                    let appliedColumn = this.findAppliedColumn(columnIndex);

                    if (! appliedColumn) {
                        return false;
                    }

                    return this.hasAnyValue(appliedColumn)
                },

                /**
                 * Get applied values for the specified column.
                 *
                 * @param {string} columnIndex
                 * @returns {Array}
                 */
                getAppliedColumnValues(columnIndex) {
                    let appliedColumn = this.findAppliedColumn(columnIndex);

                    if (appliedColumn?.allow_multiple_values) {
                        return appliedColumn?.value ?? [];
                    }

                    return appliedColumn?.value ?? '';
                },

                /**
                 * Remove a specific value from the applied values of the specified column.
                 *
                 * @param {string} columnIndex
                 * @param {any} appliedColumnValue
                 * @returns {void}
                 */
                removeAppliedColumnValue(columnIndex, appliedColumnValue) {
                    let appliedColumn = this.findAppliedColumn(columnIndex);

                    if (appliedColumn?.type === 'date' || appliedColumn?.type === 'datetime') {
                        appliedColumn.value = [];
                    } else {
                        if (appliedColumn.allow_multiple_values) {
                            appliedColumn.value = appliedColumn?.value.filter(value => value !== appliedColumnValue);
                        } else {
                            appliedColumn.value = '';
                        }
                    }

                    /**
                     * Clean up is done here. If there are no applied values present, there is no point in including the applied column as well.
                     */
                    if (! appliedColumn.value.length) {
                        this.filters.columns = this.filters.columns.filter(column => column.index !== columnIndex);
                    }

                    this.isFilterDirty = true;
                },

                /**
                 * Remove all values from the applied values of the specified column.
                 *
                 * @param {string} columnIndex
                 * @returns {void}
                 */
                removeAppliedColumnAllValues(columnIndex) {
                    this.filters.columns = this.filters.columns.filter(column => column.index !== columnIndex);

                    this.isFilterDirty = true;
                },
            },
        });
    </script>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Shop\src\Resources\views\components\datagrid\toolbar\filter.blade.php ENDPATH**/ ?>