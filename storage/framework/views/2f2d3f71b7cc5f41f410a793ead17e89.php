<?php if (isset($component)) { $__componentOriginal8001c520f4b7dcb40a16cd3b411856d1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8001c520f4b7dcb40a16cd3b411856d1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.layouts.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::layouts'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('title', null, []); ?> 
        <?php echo app('translator')->get('admin::app.customers.customers.index.title'); ?>
     <?php $__env->endSlot(); ?>

    <div class="flex items-center justify-between">
        <p class="text-xl font-bold text-gray-800 dark:text-white">
            <?php echo app('translator')->get('admin::app.customers.customers.index.title'); ?>
        </p>

        <div class="flex items-center gap-x-2.5">
            <!-- Export Modal -->
            <?php if (isset($component)) { $__componentOriginal3e5e7d009dccab33c23fb94a77703935 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3e5e7d009dccab33c23fb94a77703935 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.datagrid.export.index','data' => ['src' => ''.e(route('admin.customers.customers.index')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::datagrid.export'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['src' => ''.e(route('admin.customers.customers.index')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3e5e7d009dccab33c23fb94a77703935)): ?>
<?php $attributes = $__attributesOriginal3e5e7d009dccab33c23fb94a77703935; ?>
<?php unset($__attributesOriginal3e5e7d009dccab33c23fb94a77703935); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3e5e7d009dccab33c23fb94a77703935)): ?>
<?php $component = $__componentOriginal3e5e7d009dccab33c23fb94a77703935; ?>
<?php unset($__componentOriginal3e5e7d009dccab33c23fb94a77703935); ?>
<?php endif; ?>

            <div class="flex items-center gap-x-2.5">
                <!-- Included customer create blade file -->
                <?php if(bouncer()->hasPermission('customers.customers.create')): ?>
                    <?php echo view_render_event('bagisto.admin.customers.customers.create.before'); ?>


                    <?php echo $__env->make('admin::customers.customers.index.create', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                    <v-create-customer-form
                        ref="createCustomerComponent"
                        @customer-created="$refs.customerDatagrid.get()"
                    ></v-create-customer-form>

                    <?php echo view_render_event('bagisto.admin.customers.customers.create.after'); ?>


                    <button
                        class="primary-button"
                        @click="$refs.createCustomerComponent.openModal()"
                    >
                        <?php echo app('translator')->get('admin::app.customers.customers.index.create.create-btn'); ?>
                    </button>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php echo view_render_event('bagisto.admin.customers.customers.list.before'); ?>


    <?php if (isset($component)) { $__componentOriginal3bea17ac3f7235e71a823454ccb74424 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3bea17ac3f7235e71a823454ccb74424 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.datagrid.index','data' => ['src' => route('admin.customers.customers.index'),'ref' => 'customerDatagrid','isMultiRow' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::datagrid'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['src' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.customers.customers.index')),'ref' => 'customerDatagrid','isMultiRow' => true]); ?>
        <?php
            $hasPermission = bouncer()->hasPermission('customers.customers.edit') || bouncer()->hasPermission('customers.customers.delete');
        ?>

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
                <div class="row grid grid-cols-1 md:grid-cols-[2fr_1fr_1fr] grid-rows-1 gap-1 items-center border-b px-4 py-2.5 dark:border-gray-800 min-w-full">
                    <div
                        class="flex select-none items-center gap-2.5"
                        v-for="(columnGroup, index) in [['full_name', 'email', 'phone'], ['status', 'gender', 'group', 'customer_id'], ['revenue', 'order_count', 'address_count']]"
                    >
                        <?php if($hasPermission): ?>
                            <label
                                class="flex w-max cursor-pointer select-none items-center gap-1"
                                for="mass_action_select_all_records"
                                v-if="! index"
                            >
                                <input
                                    type="checkbox"
                                    name="mass_action_select_all_records"
                                    id="mass_action_select_all_records"
                                    class="peer hidden"
                                    :checked="['all', 'partial'].includes(applied.massActions.meta.mode)"
                                    @change="selectAll"
                                >

                                <span
                                    class="icon-uncheckbox cursor-pointer rounded-md text-2xl"
                                    :class="[
                                        applied.massActions.meta.mode === 'all' ? 'peer-checked:icon-checked peer-checked:text-blue-600' : (
                                            applied.massActions.meta.mode === 'partial' ? 'peer-checked:icon-checkbox-partial peer-checked:text-blue-600' : ''
                                        ),
                                    ]"
                                >
                                </span>
                            </label>
                        <?php endif; ?>

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
                    class="row grid grid-cols-1 gap-2 md:grid-cols-[minmax(150px,_2fr)_1fr_1fr] md:gap-0 border-b px-4 py-2.5 transition-all hover:bg-gray-50 dark:border-gray-800 dark:hover:bg-gray-950 min-w-full"
                    v-for="record in available.records"
                >
                    <div class="flex gap-2.5">
                        <?php if($hasPermission): ?>
                            <input
                                type="checkbox"
                                :name="`mass_action_select_record_${record.customer_id}`"
                                :id="`mass_action_select_record_${record.customer_id}`"
                                :value="record.customer_id"
                                class="peer hidden"
                                v-model="applied.massActions.indices"
                                @change="setCurrentSelectionMode"
                            >

                            <label
                                class="icon-uncheckbox peer-checked:icon-checked cursor-pointer rounded-md text-2xl peer-checked:text-blue-600"
                                :for="`mass_action_select_record_${record.customer_id}`"
                            >
                            </label>
                        <?php endif; ?>

                        <div class="flex flex-col gap-1.5">
                            <p class="text-base font-semibold text-gray-800 dark:text-white">
                                {{ record.full_name }}
                            </p>

                            <p class="text-gray-600 dark:text-gray-300">
                                {{ record.email }}
                            </p>

                            <p class="text-gray-600 dark:text-gray-300">
                                {{ record.phone ?? 'N/A' }}
                            </p>
                        </div>
                    </div>

                    <div class="flex flex-col gap-1.5 ps-8 md:ps-0">
                        <div class="flex gap-1.5">
                            <span
                                :class="{
                                    'label-canceled': record.status == '',
                                    'label-active': record.status === 1,
                                }"
                            >
                                {{ record.status ? '<?php echo app('translator')->get('admin::app.customers.customers.index.datagrid.active'); ?>' : '<?php echo app('translator')->get('admin::app.customers.customers.index.datagrid.inactive'); ?>' }}
                            </span>

                            <span
                                :class="{
                                    'label-canceled': record.is_suspended === 1,
                                }"
                            >
                                {{ record.is_suspended ?  '<?php echo app('translator')->get('admin::app.customers.customers.index.datagrid.suspended'); ?>' : '' }}
                            </span>
                        </div>

                        <p class="text-gray-600 dark:text-gray-300">
                            {{ record.gender ?? 'N/A' }}
                        </p>

                        <p class="text-gray-600 dark:text-gray-300">
                            {{ record.group ?? 'N/A' }}
                        </p>

                        <p class="text-gray-600 dark:text-gray-300">
                            {{ "<?php echo app('translator')->get('admin::app.customers.customers.index.datagrid.id-value'); ?>".replace(':id', record.customer_id) }}
                        </p>
                    </div>

                    <div class="flex items-center justify-between gap-x-4 ps-8 md:ps-0">
                        <div class="flex flex-col gap-1.5">
                            <p class="text-base font-semibold text-gray-800 dark:text-white">
                                {{ $admin.formatPrice(record.revenue) }}
                            </p>

                            <p class="text-gray-600 dark:text-gray-300">
                                {{ "<?php echo app('translator')->get('admin::app.customers.customers.index.datagrid.order'); ?>".replace(':order', record.order_count) }}
                            </p>

                            <p class="text-gray-600 dark:text-gray-300">
                                {{ "<?php echo app('translator')->get('admin::app.customers.customers.index.datagrid.address'); ?>".replace(':address', record.address_count) }}
                            </p>
                        </div>

                        <div class="flex items-center">
                            <a
                                class="icon-login cursor-pointer p-1.5 text-2xl hover:rounded-md hover:bg-gray-200 dark:hover:bg-gray-800 ltr:ml-1 rtl:mr-1"
                                :href=`<?php echo e(route('admin.customers.customers.login_as_customer', '')); ?>/${record.customer_id}`
                                target="_blank"
                            >
                            </a>

                            <a
                                class="icon-sort-right rtl:icon-sort-left cursor-pointer p-1.5 text-2xl hover:rounded-md hover:bg-gray-200 dark:hover:bg-gray-800 ltr:ml-1 rtl:mr-1"
                                :href=`<?php echo e(route('admin.customers.customers.view', '')); ?>/${record.customer_id}`
                            >
                            </a>
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

    <?php echo view_render_event('bagisto.admin.customers.customers.list.after'); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8001c520f4b7dcb40a16cd3b411856d1)): ?>
<?php $attributes = $__attributesOriginal8001c520f4b7dcb40a16cd3b411856d1; ?>
<?php unset($__attributesOriginal8001c520f4b7dcb40a16cd3b411856d1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8001c520f4b7dcb40a16cd3b411856d1)): ?>
<?php $component = $__componentOriginal8001c520f4b7dcb40a16cd3b411856d1; ?>
<?php unset($__componentOriginal8001c520f4b7dcb40a16cd3b411856d1); ?>
<?php endif; ?>
<?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Admin\src\Resources\views\customers\customers\index.blade.php ENDPATH**/ ?>