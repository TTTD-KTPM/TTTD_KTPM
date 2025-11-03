<div class="box-shadow rounded bg-white p-4 dark:bg-gray-900">
    <div class="flex justify-between">
        <!-- Total Order Count -->
        <p class="text-base font-semibold leading-none text-gray-800 dark:text-white">
            <?php echo app('translator')->get('admin::app.customers.customers.view.orders.count', ['count' => count($customer->orders)]); ?>
        </p>

        <!-- Total Order Revenue -->
        <p class="text-base font-semibold leading-none text-gray-800 dark:text-white">
            <?php echo app('translator')->get('admin::app.customers.customers.view.orders.total-revenue', ['revenue' => core()->formatPrice($customer->orders->whereNotIn('status', ['canceled', 'closed'])->sum('base_grand_total_invoiced'))]); ?>
        </p>
    </div>

    <?php if (isset($component)) { $__componentOriginal3bea17ac3f7235e71a823454ccb74424 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3bea17ac3f7235e71a823454ccb74424 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.datagrid.index','data' => ['src' => route('admin.customers.customers.view', [
            'id'   => $customer->id,
            'type' => 'orders'
        ])]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::datagrid'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['src' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.customers.customers.view', [
            'id'   => $customer->id,
            'type' => 'orders'
        ]))]); ?>
        <!-- Datagrid Header -->
        <template #header="{
            isLoading,
            available,
            applied,
            selectAll,
            sort,
            performAction
        }">
            <template v-if="isLoading">
                <?php if (isset($component)) { $__componentOriginalc107096d39100b5f7264e4f2087676a5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc107096d39100b5f7264e4f2087676a5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.shimmer.datagrid.table.head','data' => ['isMultiRow' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::shimmer.datagrid.table.head'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['isMultiRow' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc107096d39100b5f7264e4f2087676a5)): ?>
<?php $attributes = $__attributesOriginalc107096d39100b5f7264e4f2087676a5; ?>
<?php unset($__attributesOriginalc107096d39100b5f7264e4f2087676a5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc107096d39100b5f7264e4f2087676a5)): ?>
<?php $component = $__componentOriginalc107096d39100b5f7264e4f2087676a5; ?>
<?php unset($__componentOriginalc107096d39100b5f7264e4f2087676a5); ?>
<?php endif; ?>
            </template>

            <template v-else>
                <div class="row grid grid-cols-[0.5fr_0.5fr_1fr] grid-rows-1 items-center border-b border-gray-200 bg-gray-50 px-4 py-2.5 text-sm text-gray-600 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300">
                    <div
                        class="flex select-none items-center gap-2.5"
                        v-for="(columnGroup, index) in [['increment_id', 'created_at', 'status'], ['base_grand_total', 'method', 'channel_name'], ['full_name', 'customer_email', 'location', 'image']]"
                    >
                        <p class="text-gray-600 dark:text-gray-300">
                            <span class="[&>*]:after:content-['_/_']">
                                <template v-for="column in columnGroup">
                                    <span
                                        class="after:content-['/'] last:after:content-['']"
                                        :class="{
                                            'font-medium text-gray-800 dark:text-white': applied.sort.column == column,
                                            'cursor-pointer hover:text-gray-800 dark:hover:text-white': available.columns.find(columnTemp => columnTemp.index === column)?.sortable,
                                        }"
                                        @click="
                                            available.columns.find(columnTemp => columnTemp.index === column)?.sortable ? sort(available.columns.find(columnTemp => columnTemp.index === column)): {}
                                        "
                                    >
                                        {{ available.columns.find(columnTemp => columnTemp.index === column)?.label }}
                                    </span>
                                </template>
                            </span>

                            <i
                                class="align-text-bottom text-base text-gray-800 dark:text-white ltr:ml-1.5 rtl:mr-1.5"
                                :class="[applied.sort.order === 'asc' ? 'icon-down-stat': 'icon-up-stat']"
                                v-if="columnGroup.includes(applied.sort.column)"
                            ></i>
                        </p>
                    </div>
                </div>
            </template>
        </template>

        <template #body="{
            isLoading,
            available,
            applied,
            selectAll,
            sort,
            performAction
        }">
            <template v-if="isLoading">
                <?php if (isset($component)) { $__componentOriginal601d211589286a2faeaa4f7f9edf9405 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal601d211589286a2faeaa4f7f9edf9405 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.shimmer.datagrid.table.body','data' => ['isMultiRow' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::shimmer.datagrid.table.body'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['isMultiRow' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal601d211589286a2faeaa4f7f9edf9405)): ?>
<?php $attributes = $__attributesOriginal601d211589286a2faeaa4f7f9edf9405; ?>
<?php unset($__attributesOriginal601d211589286a2faeaa4f7f9edf9405); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal601d211589286a2faeaa4f7f9edf9405)): ?>
<?php $component = $__componentOriginal601d211589286a2faeaa4f7f9edf9405; ?>
<?php unset($__componentOriginal601d211589286a2faeaa4f7f9edf9405); ?>
<?php endif; ?>
            </template>

            <template v-else>
                <div
                    v-if="available.meta.total"
                    class="row grid grid-cols-4 border-b px-4 py-2.5 transition-all hover:bg-gray-50 dark:border-gray-800 dark:hover:bg-gray-950"
                    v-for="record in available.records"
                >
                    <!-- Order Id, Created, Status Section -->
                    <div class="">
                        <div class="flex gap-2.5">
                            <div class="flex flex-col gap-1.5">
                                <p
                                    class="text-base font-semibold text-gray-800 dark:text-white"
                                >
                                    {{ "<?php echo app('translator')->get('admin::app.sales.orders.index.datagrid.id'); ?>".replace(':id', record.increment_id) }}
                                </p>

                                <p class="text-gray-600 dark:text-gray-300">
                                    {{ record.created_at }}
                                </p>

                                <p v-html="record.status"></p>
                            </div>
                        </div>
                    </div>

                    <!-- Total Amount, Pay Via, Channel -->
                    <div class="">
                        <div class="flex flex-col gap-1.5">
                            <p class="text-base font-semibold text-gray-800 dark:text-white">
                                {{ $admin.formatPrice(record.base_grand_total) }}
                            </p>

                            <p class="text-gray-600 dark:text-gray-300">
                                <?php echo app('translator')->get('admin::app.sales.orders.index.datagrid.pay-by', ['method' => '']); ?>{{ record.method }}
                            </p>

                            <p class="text-gray-600 dark:text-gray-300">
                                {{ record.channel_name }}
                            </p>
                        </div>
                    </div>

                    <!-- Customer, Email, Location Section -->
                    <div class="">
                        <div class="flex flex-col gap-1.5">
                            <p class="text-base text-gray-800 dark:text-white">
                                {{ record.full_name }}
                            </p>

                            <p class="text-gray-600 dark:text-gray-300">
                                {{ record.customer_email }}
                            </p>

                            <p class="text-gray-600 dark:text-gray-300">
                                {{ record.location }}
                            </p>
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-x-2">
                        <a :href="`<?php echo e(route('admin.sales.orders.view', '')); ?>/${record.id}`">
                            <span class="icon-sort-right rtl:icon-sort-left cursor-pointer p-1.5 text-2xl hover:rounded-md hover:bg-gray-200 dark:hover:bg-gray-800 ltr:ml-1 rtl:mr-1"></span>
                        </a>
                    </div>
                </div>

                <div v-else class="table-responsive grid w-full">
                    <div class="grid justify-center justify-items-center gap-3.5 px-2.5 py-10">
                        <!-- Placeholder Image -->
                        <img
                            src="<?php echo e(bagisto_asset('images/empty-placeholders/orders.svg')); ?>"
                            class="h-20 w-20 dark:mix-blend-exclusion dark:invert"
                        />

                        <div class="flex flex-col items-center">
                            <p class="text-base font-semibold text-gray-400">
                                <?php echo app('translator')->get('admin::app.customers.customers.view.datagrid.orders.empty-order'); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </template>
        </template>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3bea17ac3f7235e71a823454ccb74424)): ?>
<?php $attributes = $__attributesOriginal3bea17ac3f7235e71a823454ccb74424; ?>
<?php unset($__attributesOriginal3bea17ac3f7235e71a823454ccb74424); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3bea17ac3f7235e71a823454ccb74424)): ?>
<?php $component = $__componentOriginal3bea17ac3f7235e71a823454ccb74424; ?>
<?php unset($__componentOriginal3bea17ac3f7235e71a823454ccb74424); ?>
<?php endif; ?>
</div>
<?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Admin\src\Resources\views\customers\customers\view\orders.blade.php ENDPATH**/ ?>