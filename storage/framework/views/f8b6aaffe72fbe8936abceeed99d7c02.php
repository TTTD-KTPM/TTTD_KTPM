<div class="box-shadow rounded bg-white p-4 dark:bg-gray-900">
    <div class="flex justify-between">
        <!-- Total Reviews Count -->
        <p class="text-base font-semibold leading-none text-gray-800 dark:text-white">
            <?php echo app('translator')->get('admin::app.customers.customers.view.reviews.count', ['count' => count($customer->reviews)]); ?>
        </p>
    </div>

    <?php if (isset($component)) { $__componentOriginal3bea17ac3f7235e71a823454ccb74424 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3bea17ac3f7235e71a823454ccb74424 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.datagrid.index','data' => ['src' => route('admin.customers.customers.view', [
            'id'   => $customer->id,
            'type' => 'reviews'
        ])]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::datagrid'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['src' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.customers.customers.view', [
            'id'   => $customer->id,
            'type' => 'reviews'
        ]))]); ?>
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
                <div class="row grid grid-cols-[2fr_1fr_1fr] grid-rows-1 items-center border-b border-gray-200 bg-gray-50 px-4 py-2.5 text-sm text-gray-600 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300">
                    <div
                        class="flex select-none items-center gap-2.5"
                        v-for="(columnGroup, index) in [['product_name', 'status', 'title', 'comment'], ['rating', 'created_at', 'product_review_id']]"
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
                    class="grid gap-y-4 border-b p-4 transition-all hover:bg-gray-50 dark:border-gray-800 dark:hover:bg-gray-950"
                    v-for="record in available.records"
                >
                    <div class="flex justify-start [&amp;>*]:flex-1">
                        <div class="flex flex-col gap-1.5">
                            <!-- Review Name -->
                            <p  
                                class="text-base font-semibold leading-none text-gray-800 dark:text-white"
                                v-text="record.name"
                            >
                            </p>

                            <!-- Product Name -->
                            <p
                                class="text-gray-600 dark:text-gray-300"
                                v-html="record.product_name"
                            >
                            </p>

                            <!-- Review Status -->
                            <p
                                class="text-gray-600 dark:text-gray-300"
                                v-html="record.status"
                            >
                            </p>
                        </div>

                        <div class="flex flex-col gap-1.5">
                            <!-- Review Rating -->
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

                            <!-- Review Created At -->
                            <p
                                class="text-gray-600 dark:text-gray-300"
                                v-html="record.created_at"
                            >
                            </p>

                            <!-- Review ID -->
                            <p class="text-gray-600 dark:text-gray-300">
                                {{ "<?php echo app('translator')->get('admin::app.customers.customers.view.reviews.id'); ?>".replace(':id', record.product_review_id) }}
                            </p>
                        </div>
                    </div>

                    <div class="flex items-center justify-between gap-x-4">
                        <div class="flex flex-col gap-1.5">
                            <!-- Review Title -->
                            <p class="text-base font-semibold leading-none text-gray-800 dark:text-white">
                                {{ record.title }}
                            </p>

                            <!-- Review Comment -->
                            <p class="text-gray-600 dark:text-gray-300">
                                {{ record.comment }}
                            </p>
                        </div>

                        <!-- Review associated with product -->
                        <a 
                            :href="`<?php echo e(route('admin.catalog.products.edit', '')); ?>/${record.product_id}`"
                            target="_blank"
                            class="icon-sort-right rtl:icon-sort-left cursor-pointer rounded-md p-1.5 text-2xl transition-all hover:bg-gray-200 dark:hover:bg-gray-800 ltr:ml-1 rtl:mr-1"
                        >
                        </a>
                    </div>
                </div>

                <div    
                    v-else
                    class="table-responsive grid w-full"
                >
                    <div class="grid justify-center justify-items-center gap-3.5 px-2.5 py-10">
                        <!-- Placeholder Image -->
                        <img
                            src="<?php echo e(bagisto_asset('images/empty-placeholders/reviews.svg')); ?>"
                            class="h-20 w-20 dark:mix-blend-exclusion dark:invert"
                        />

                        <div class="flex flex-col items-center">
                            <p class="text-base font-semibold text-gray-400">
                                <?php echo app('translator')->get('admin::app.customers.customers.view.datagrid.reviews.empty-reviews'); ?>
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
</div><?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Admin\src\Resources\views\customers\customers\view\reviews.blade.php ENDPATH**/ ?>