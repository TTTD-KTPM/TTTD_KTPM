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
        <?php echo app('translator')->get('admin::app.customers.reviews.index.title'); ?>
     <?php $__env->endSlot(); ?>

    <div class="flex items-center justify-between gap-4 max-sm:flex-wrap">
        <p class="py-3 text-xl font-bold text-gray-800 dark:text-white">
            <?php echo app('translator')->get('admin::app.customers.reviews.index.title'); ?>
        </p>
    </div>

    <?php echo view_render_event('bagisto.admin.customers.reviews.edit.before'); ?>


    <v-review-edit-drawer></v-review-edit-drawer>

    <?php echo view_render_event('bagisto.admin.customers.groups.edit.after'); ?>


    <?php if (! $__env->hasRenderedOnce('30fae5af-5d27-4c7b-98d5-44367968595c')): $__env->markAsRenderedOnce('30fae5af-5d27-4c7b-98d5-44367968595c');
$__env->startPush('scripts'); ?>
        <script
            type="text/x-template"
            id="v-review-edit-drawer-template"
        >

            <?php echo view_render_event('bagisto.admin.customers.reviews.list.before'); ?>


            <?php if (isset($component)) { $__componentOriginal3bea17ac3f7235e71a823454ccb74424 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3bea17ac3f7235e71a823454ccb74424 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.datagrid.index','data' => ['src' => route('admin.customers.customers.review.index'),'isMultiRow' => true,'ref' => 'review_data']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::datagrid'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['src' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.customers.customers.review.index')),'isMultiRow' => true,'ref' => 'review_data']); ?>
                <?php
                    $hasPermission = bouncer()->hasPermission('customers.reviews.edit') || bouncer()->hasPermission('customers.reviews.delete');
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
                        <div class="row grid grid-cols-1 md:grid-cols-[2fr_1fr_minmax(150px,_4fr)_0.5fr] grid-rows-1 gap-1 items-center border-b px-4 py-2.5 dark:border-gray-800 min-w-full">
                            <div
                                class="flex items-center gap-2.5"
                                v-for="(columnGroup, index) in [['customer_full_name', 'product_name', 'product_review_status'], ['rating', 'created_at', 'product_review_id'], ['title', 'comment']]"
                            >
                                <?php if($hasPermission): ?>
                                    <label
                                        class="flex w-max cursor-pointer select-none items-center gap-1"
                                        for="mass_action_select_all_records"
                                        v-if="! index"
                                    >
                                        <input
                                            type="checkbox"
                                            id="mass_action_select_all_records"
                                            class="peer hidden"
                                            name="mass_action_select_all_records"
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

                                <!-- Product Name, Review Status -->
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
                            class="row grid grid-cols-1 gap-2 md:grid-cols-[2fr_1fr_minmax(150px,_4fr)_0.5fr] md:gap-0 border-b px-4 py-2.5 transition-all hover:bg-gray-50 dark:border-gray-800 dark:hover:bg-gray-950 min-w-full"
                            v-for="record in available.records"
                        >
                            <!-- Name, Product, Description -->
                            <div class="flex gap-2.5">
                                <?php if($hasPermission): ?>
                                    <input
                                        type="checkbox"
                                        :id="`mass_action_select_record_${record.product_review_id}`"
                                        class="peer hidden"
                                        :name="`mass_action_select_record_${record.product_review_id}`"
                                        :value="record.product_review_id"
                                        v-model="applied.massActions.indices"
                                        @change="setCurrentSelectionMode"
                                    >

                                    <label
                                        class="icon-uncheckbox peer-checked:icon-checked cursor-pointer rounded-md text-2xl peer-checked:text-blue-600"
                                        :for="`mass_action_select_record_${record.product_review_id}`"
                                    ></label>
                                <?php endif; ?>

                                <div class="flex flex-col gap-1.5">
                                    <p class="text-base font-semibold text-gray-800 dark:text-white">
                                        {{ record.customer_full_name }}
                                    </p>

                                    <p class="text-gray-600 dark:text-gray-300">
                                        {{ record.product_name }}
                                    </p>

                                    <p v-html="record.product_review_status"></p>
                                </div>
                            </div>

                            <!-- Rating, Date, Id Section -->
                            <div class="flex flex-col gap-1.5 ps-8 md:ps-0">
                                <div class="flex">
                                    <?php if (isset($component)) { $__componentOriginaled400a1a58027a9258589eb369d5148d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaled400a1a58027a9258589eb369d5148d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.star-rating.index','data' => ['isEditable' => false,':value' => 'record.rating']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::star-rating'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['is-editable' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false),':value' => 'record.rating']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaled400a1a58027a9258589eb369d5148d)): ?>
<?php $attributes = $__attributesOriginaled400a1a58027a9258589eb369d5148d; ?>
<?php unset($__attributesOriginaled400a1a58027a9258589eb369d5148d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaled400a1a58027a9258589eb369d5148d)): ?>
<?php $component = $__componentOriginaled400a1a58027a9258589eb369d5148d; ?>
<?php unset($__componentOriginaled400a1a58027a9258589eb369d5148d); ?>
<?php endif; ?>
                                </div>

                                <p class="text-gray-600 dark:text-gray-300">
                                    {{ record.created_at }}
                                </p>

                                <p
                                    class="text-gray-600 dark:text-gray-300"
                                >
                                    {{ "<?php echo app('translator')->get('admin::app.customers.reviews.index.datagrid.review-id'); ?>".replace(':review_id', record.product_review_id) }}
                                </p>
                            </div>

                            <!-- Title, Description -->
                            <div class="flex flex-col gap-1.5 ps-8 md:ps-0">
                                <p class="text-base font-semibold text-gray-800 dark:text-white">
                                    {{ record.title }}
                                </p>

                                <p class="text-gray-600 dark:text-gray-300">
                                    {{ record.comment }}
                                </p>
                            </div>

                            <div class="flex place-content-end items-center gap-1.5 self-center">
                                <!-- Review Delete Button -->
                                <a @click="performAction(record.actions.find(action => action.index === 'delete'))">
                                    <span
                                        :class="record.actions.find(action => action.index === 'delete')?.icon"
                                        class="cursor-pointer rounded-md p-1.5 text-2xl transition-all hover:bg-gray-200 dark:hover:bg-gray-800 ltr:ml-1 rtl:mr-1"
                                    >
                                    </span>
                                </a>

                                <!-- View Button -->
                                <a
                                    v-if="record.actions.find(action => action.index === 'edit')"
                                    @click="edit(record.actions.find(action => action.index === 'edit')?.url)"
                                >
                                    <span class="icon-sort-right rtl:icon-sort-left cursor-pointer rounded-md p-1.5 text-2xl transition-all hover:bg-gray-200 dark:hover:bg-gray-800 ltr:ml-1 rtl:mr-1"></span>
                                </a>
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

            <?php echo view_render_event('bagisto.admin.customers.reviews.list.after'); ?>


            <!-- Drawer content -->
            <div class="flex flex-1 flex-col gap-2 max-xl:flex-auto">
                <?php if (isset($component)) { $__componentOriginal81b4d293d9113446bb908fc8aef5c8f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal81b4d293d9113446bb908fc8aef5c8f6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.index','data' => ['vSlot' => '{ meta, errors, handleSubmit }','as' => 'div']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['v-slot' => '{ meta, errors, handleSubmit }','as' => 'div']); ?>
                    <form
                        @submit="handleSubmit($event, update)"
                        ref="reviewCreateForm"
                    >
                        <?php if (isset($component)) { $__componentOriginal9bfb526197f1d7304e7fade44c26fbb8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9bfb526197f1d7304e7fade44c26fbb8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.drawer.index','data' => ['ref' => 'review']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::drawer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['ref' => 'review']); ?>
                            <!-- Drawer Header -->
                             <?php $__env->slot('header', null, []); ?> 
                                <div class="flex items-center justify-between">
                                    <p class="text-xl font-medium dark:text-white">
                                        <?php echo app('translator')->get('admin::app.customers.reviews.index.edit.title'); ?>
                                    </p>

                                    <button class="primary-button ltr:mr-11 rtl:ml-11">
                                        <?php echo app('translator')->get('admin::app.customers.reviews.index.edit.save-btn'); ?>
                                    </button>
                                </div>
                             <?php $__env->endSlot(); ?>

                            <!-- Drawer Content -->
                             <?php $__env->slot('content', null, []); ?> 
                                <div class="flex flex-col gap-4 px-1.5 py-2.5">
                                    <div class="grid grid-cols-2 gap-4">
                                        <div class="">
                                            <!-- Customer Name -->
                                            <p class="text-xs font-semibold text-gray-600 dark:text-gray-300">
                                                <?php echo app('translator')->get('admin::app.customers.reviews.index.edit.customer'); ?>
                                            </p>

                                            <p class="font-semibold text-gray-800 dark:text-white">
                                                {{ review.name !== '' ? review.name : 'N/A' }}
                                            </p>
                                        </div>

                                        <div class="">
                                            <p class="text-xs font-semibold text-gray-600 dark:text-gray-300">
                                                <?php echo app('translator')->get('admin::app.customers.reviews.index.edit.product'); ?>
                                            </p>

                                            <p class="font-semibold text-gray-800 dark:text-white">
                                                {{ review.product.name }}
                                            </p>
                                        </div>

                                        <div class="">
                                            <p class="text-xs font-semibold text-gray-600 dark:text-gray-300">
                                                <?php echo app('translator')->get('admin::app.customers.reviews.index.edit.id'); ?>
                                            </p>

                                            <p class="font-semibold text-gray-800 dark:text-white">
                                                {{ review.id }}
                                            </p>
                                        </div>

                                        <div class="">
                                            <p class="text-xs font-semibold text-gray-600 dark:text-gray-300">
                                                <?php echo app('translator')->get('admin::app.customers.reviews.index.edit.date'); ?>
                                            </p>

                                            <p class="font-semibold text-gray-800 dark:text-white">
                                                {{ review.date }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="w-full">
                                        <?php if (isset($component)) { $__componentOriginal53af403f6b2179a3039d488b8ab2a267 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53af403f6b2179a3039d488b8ab2a267 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.control','data' => ['type' => 'hidden','name' => 'id','rules' => 'required',':value' => 'review.id']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'hidden','name' => 'id','rules' => 'required',':value' => 'review.id']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal53af403f6b2179a3039d488b8ab2a267)): ?>
<?php $attributes = $__attributesOriginal53af403f6b2179a3039d488b8ab2a267; ?>
<?php unset($__attributesOriginal53af403f6b2179a3039d488b8ab2a267); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal53af403f6b2179a3039d488b8ab2a267)): ?>
<?php $component = $__componentOriginal53af403f6b2179a3039d488b8ab2a267; ?>
<?php unset($__componentOriginal53af403f6b2179a3039d488b8ab2a267); ?>
<?php endif; ?>

                                        <?php if (isset($component)) { $__componentOriginal7b1bc76a00ab5e7f1bf2c6429dae85a3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7b1bc76a00ab5e7f1bf2c6429dae85a3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                            <?php if (isset($component)) { $__componentOriginal8378211f70f8c39b16d47cecdac9c7c8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8378211f70f8c39b16d47cecdac9c7c8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.label','data' => ['class' => 'required']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'required']); ?>
                                                <?php echo app('translator')->get('admin::app.customers.reviews.index.edit.status'); ?>
                                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8378211f70f8c39b16d47cecdac9c7c8)): ?>
<?php $attributes = $__attributesOriginal8378211f70f8c39b16d47cecdac9c7c8; ?>
<?php unset($__attributesOriginal8378211f70f8c39b16d47cecdac9c7c8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8378211f70f8c39b16d47cecdac9c7c8)): ?>
<?php $component = $__componentOriginal8378211f70f8c39b16d47cecdac9c7c8; ?>
<?php unset($__componentOriginal8378211f70f8c39b16d47cecdac9c7c8); ?>
<?php endif; ?>

                                            <?php if (isset($component)) { $__componentOriginal53af403f6b2179a3039d488b8ab2a267 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53af403f6b2179a3039d488b8ab2a267 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.control','data' => ['type' => 'select','name' => 'status','rules' => 'required',':value' => 'review.status']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'select','name' => 'status','rules' => 'required',':value' => 'review.status']); ?>
                                                <option value="approved" >
                                                    <?php echo app('translator')->get('admin::app.customers.reviews.index.edit.approved'); ?>
                                                </option>

                                                <option value="disapproved">
                                                    <?php echo app('translator')->get('admin::app.customers.reviews.index.edit.disapproved'); ?>
                                                </option>

                                                <option value="pending">
                                                    <?php echo app('translator')->get('admin::app.customers.reviews.index.edit.pending'); ?>
                                                </option>
                                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal53af403f6b2179a3039d488b8ab2a267)): ?>
<?php $attributes = $__attributesOriginal53af403f6b2179a3039d488b8ab2a267; ?>
<?php unset($__attributesOriginal53af403f6b2179a3039d488b8ab2a267); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal53af403f6b2179a3039d488b8ab2a267)): ?>
<?php $component = $__componentOriginal53af403f6b2179a3039d488b8ab2a267; ?>
<?php unset($__componentOriginal53af403f6b2179a3039d488b8ab2a267); ?>
<?php endif; ?>

                                            <?php if (isset($component)) { $__componentOriginal8da25fb6534e2ef288914e35c32417f8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8da25fb6534e2ef288914e35c32417f8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.error','data' => ['controlName' => 'status']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['control-name' => 'status']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8da25fb6534e2ef288914e35c32417f8)): ?>
<?php $attributes = $__attributesOriginal8da25fb6534e2ef288914e35c32417f8; ?>
<?php unset($__attributesOriginal8da25fb6534e2ef288914e35c32417f8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8da25fb6534e2ef288914e35c32417f8)): ?>
<?php $component = $__componentOriginal8da25fb6534e2ef288914e35c32417f8; ?>
<?php unset($__componentOriginal8da25fb6534e2ef288914e35c32417f8); ?>
<?php endif; ?>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7b1bc76a00ab5e7f1bf2c6429dae85a3)): ?>
<?php $attributes = $__attributesOriginal7b1bc76a00ab5e7f1bf2c6429dae85a3; ?>
<?php unset($__attributesOriginal7b1bc76a00ab5e7f1bf2c6429dae85a3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7b1bc76a00ab5e7f1bf2c6429dae85a3)): ?>
<?php $component = $__componentOriginal7b1bc76a00ab5e7f1bf2c6429dae85a3; ?>
<?php unset($__componentOriginal7b1bc76a00ab5e7f1bf2c6429dae85a3); ?>
<?php endif; ?>
                                    </div>

                                    <div class="w-full">
                                        <p class="font-semibold text-gray-600 dark:text-gray-300">
                                            <?php echo app('translator')->get('admin::app.customers.reviews.index.edit.rating'); ?>
                                        </p>

                                        <div class="flex">
                                            <?php if (isset($component)) { $__componentOriginaled400a1a58027a9258589eb369d5148d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaled400a1a58027a9258589eb369d5148d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.star-rating.index','data' => ['isEditable' => false,':value' => 'review.rating']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::star-rating'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['is-editable' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false),':value' => 'review.rating']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaled400a1a58027a9258589eb369d5148d)): ?>
<?php $attributes = $__attributesOriginaled400a1a58027a9258589eb369d5148d; ?>
<?php unset($__attributesOriginaled400a1a58027a9258589eb369d5148d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaled400a1a58027a9258589eb369d5148d)): ?>
<?php $component = $__componentOriginaled400a1a58027a9258589eb369d5148d; ?>
<?php unset($__componentOriginaled400a1a58027a9258589eb369d5148d); ?>
<?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="w-full">
                                        <p class="block text-xs font-medium leading-6 text-gray-800 dark:text-white">
                                            <?php echo app('translator')->get('admin::app.customers.reviews.index.edit.review-title'); ?>
                                        </p>

                                        <p class="font-semibold text-gray-800 dark:text-white">
                                            {{ review.title }}
                                        </p>
                                    </div>

                                    <div class="w-full">
                                        <p class="block text-xs font-semibold leading-6 text-gray-600 dark:text-gray-300">
                                            <?php echo app('translator')->get('admin::app.customers.reviews.index.edit.review-comment'); ?>
                                        </p>

                                        <p class="text-gray-800 dark:text-white">
                                            {{ review.comment }}
                                        </p>
                                    </div>

                                    <div
                                        class="w-full"
                                        v-if="review.images.length"
                                    >
                                        <?php if (isset($component)) { $__componentOriginal8378211f70f8c39b16d47cecdac9c7c8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8378211f70f8c39b16d47cecdac9c7c8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.label','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                            <?php echo app('translator')->get('admin::app.customers.reviews.index.edit.images'); ?>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8378211f70f8c39b16d47cecdac9c7c8)): ?>
<?php $attributes = $__attributesOriginal8378211f70f8c39b16d47cecdac9c7c8; ?>
<?php unset($__attributesOriginal8378211f70f8c39b16d47cecdac9c7c8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8378211f70f8c39b16d47cecdac9c7c8)): ?>
<?php $component = $__componentOriginal8378211f70f8c39b16d47cecdac9c7c8; ?>
<?php unset($__componentOriginal8378211f70f8c39b16d47cecdac9c7c8); ?>
<?php endif; ?>

                                        <div class="flex flex-wrap gap-4">
                                            <div v-for="image in review.images" :key="image.id">
                                                <img
                                                    :src="image.url"
                                                    class="h-[60px] w-[60px] rounded"
                                                    v-if="image.type === 'image'"
                                                    alt="Image"
                                                />

                                                <video
                                                    v-else
                                                    class="h-[60px] w-[60px] rounded"
                                                    controls
                                                    autoplay
                                                >
                                                    <source
                                                        :src="image.url"
                                                        type="video/mp4"
                                                    >
                                                </video>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             <?php $__env->endSlot(); ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9bfb526197f1d7304e7fade44c26fbb8)): ?>
<?php $attributes = $__attributesOriginal9bfb526197f1d7304e7fade44c26fbb8; ?>
<?php unset($__attributesOriginal9bfb526197f1d7304e7fade44c26fbb8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9bfb526197f1d7304e7fade44c26fbb8)): ?>
<?php $component = $__componentOriginal9bfb526197f1d7304e7fade44c26fbb8; ?>
<?php unset($__componentOriginal9bfb526197f1d7304e7fade44c26fbb8); ?>
<?php endif; ?>
                    </form>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal81b4d293d9113446bb908fc8aef5c8f6)): ?>
<?php $attributes = $__attributesOriginal81b4d293d9113446bb908fc8aef5c8f6; ?>
<?php unset($__attributesOriginal81b4d293d9113446bb908fc8aef5c8f6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal81b4d293d9113446bb908fc8aef5c8f6)): ?>
<?php $component = $__componentOriginal81b4d293d9113446bb908fc8aef5c8f6; ?>
<?php unset($__componentOriginal81b4d293d9113446bb908fc8aef5c8f6); ?>
<?php endif; ?>
            </div>
        </script>

        <script type="module">
            app.component('v-review-edit-drawer', {
                template: '#v-review-edit-drawer-template',

                data() {
                    return {
                        review: {},
                    }
                },

                methods: {
                    edit(url) {
                        this.$axios.get(url)
                            .then((response) => {
                                this.$refs.review.open(),

                                this.review = response.data.data
                            })
                            .catch(error => {
                                if (error.response.status ==422) {
                                    setErrors(error.response.data.errors);
                                }
                            });

                    },

                    update(params) {
                        let formData = new FormData(this.$refs.reviewCreateForm);

                        formData.append('_method', 'put');

                        this.$axios.post(`<?php echo e(route('admin.customers.customers.review.update', '')); ?>/${params.id}`, formData)
                            .then((response) => {
                                this.$refs.review.close();

                                this.$refs.review_data.get();

                                this.$emitter.emit('add-flash', { type: 'success', message: response.data.message });
                            })
                            .catch(error => {
                                if (error.response.status == 422) {
                                    setErrors(error.response.data.errors);
                                }
                            });
                    },
                }
            })
        </script>
    <?php $__env->stopPush(); endif; ?>
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
<?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Admin\src\Resources\views\customers\reviews\index.blade.php ENDPATH**/ ?>