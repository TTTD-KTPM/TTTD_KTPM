<template v-if="isLoading">
    <?php if (isset($component)) { $__componentOriginal911dea69ff7b4876d178c5253e0745e5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal911dea69ff7b4876d178c5253e0745e5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.shimmer.datagrid.toolbar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::shimmer.datagrid.toolbar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal911dea69ff7b4876d178c5253e0745e5)): ?>
<?php $attributes = $__attributesOriginal911dea69ff7b4876d178c5253e0745e5; ?>
<?php unset($__attributesOriginal911dea69ff7b4876d178c5253e0745e5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal911dea69ff7b4876d178c5253e0745e5)): ?>
<?php $component = $__componentOriginal911dea69ff7b4876d178c5253e0745e5; ?>
<?php unset($__componentOriginal911dea69ff7b4876d178c5253e0745e5); ?>
<?php endif; ?>
</template>

<template v-else>
    <div class="mt-7 flex items-center justify-between gap-4 max-md:block">
        <!-- Left Toolbar -->
        <div class="flex w-full gap-x-1">
            <!-- Mass Actions Panel -->
            <template v-if="applied.massActions.indices.length">
                <?php if (isset($component)) { $__componentOriginal087d36e3f75c125f36f2d5f13d825bcb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal087d36e3f75c125f36f2d5f13d825bcb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.datagrid.toolbar.mass-action','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::datagrid.toolbar.mass-action'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    <template #mass-action="{
                        available,
                        applied,
                        massActions,
                        validateMassAction,
                        performMassAction
                    }">
                        <slot
                            name="mass-action"
                            :available="available"
                            :applied="applied"
                            :mass-actions="massActions"
                            :validate-mass-action="validateMassAction"
                            :perform-mass-action="performMassAction"
                        >
                        </slot>
                    </template>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal087d36e3f75c125f36f2d5f13d825bcb)): ?>
<?php $attributes = $__attributesOriginal087d36e3f75c125f36f2d5f13d825bcb; ?>
<?php unset($__attributesOriginal087d36e3f75c125f36f2d5f13d825bcb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal087d36e3f75c125f36f2d5f13d825bcb)): ?>
<?php $component = $__componentOriginal087d36e3f75c125f36f2d5f13d825bcb; ?>
<?php unset($__componentOriginal087d36e3f75c125f36f2d5f13d825bcb); ?>
<?php endif; ?>
            </template>

            <!-- Search Panel -->
            <template v-else>
                <?php if (isset($component)) { $__componentOriginal9c3166ed8fae8d40c6617ea1de1f56f5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9c3166ed8fae8d40c6617ea1de1f56f5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.datagrid.toolbar.search','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::datagrid.toolbar.search'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    <template #search="{
                        available,
                        applied,
                        search,
                        getSearchedValues
                    }">
                        <slot
                            name="search"
                            :available="available"
                            :applied="applied"
                            :search="search"
                            :get-searched-values="getSearchedValues"
                        >
                        </slot>
                    </template>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9c3166ed8fae8d40c6617ea1de1f56f5)): ?>
<?php $attributes = $__attributesOriginal9c3166ed8fae8d40c6617ea1de1f56f5; ?>
<?php unset($__attributesOriginal9c3166ed8fae8d40c6617ea1de1f56f5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9c3166ed8fae8d40c6617ea1de1f56f5)): ?>
<?php $component = $__componentOriginal9c3166ed8fae8d40c6617ea1de1f56f5; ?>
<?php unset($__componentOriginal9c3166ed8fae8d40c6617ea1de1f56f5); ?>
<?php endif; ?>

                <div class="hidden w-11 max-md:block">
                    <?php if (isset($component)) { $__componentOriginal9ca2ea672568ec4f21764c64d900bdeb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ca2ea672568ec4f21764c64d900bdeb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.datagrid.toolbar.filter','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::datagrid.toolbar.filter'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                        <template #filter="{
                            available,
                            applied,
                            filters,
                            applyFilter,
                            applyColumnValues,
                            findAppliedColumn,
                            hasAnyAppliedColumnValues,
                            getAppliedColumnValues,
                            removeAppliedColumnValue,
                            removeAppliedColumnAllValues
                        }">
                            <slot
                                name="filter"
                                :available="available"
                                :applied="applied"
                                :filters="filters"
                                :apply-filter="applyFilter"
                                :apply-column-values="applyColumnValues"
                                :find-applied-column="findAppliedColumn"
                                :has-any-applied-column-values="hasAnyAppliedColumnValues"
                                :get-applied-column-values="getAppliedColumnValues"
                                :remove-applied-column-value="removeAppliedColumnValue"
                                :remove-applied-column-all-values="removeAppliedColumnAllValues"
                            >
                            </slot>
                        </template>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ca2ea672568ec4f21764c64d900bdeb)): ?>
<?php $attributes = $__attributesOriginal9ca2ea672568ec4f21764c64d900bdeb; ?>
<?php unset($__attributesOriginal9ca2ea672568ec4f21764c64d900bdeb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ca2ea672568ec4f21764c64d900bdeb)): ?>
<?php $component = $__componentOriginal9ca2ea672568ec4f21764c64d900bdeb; ?>
<?php unset($__componentOriginal9ca2ea672568ec4f21764c64d900bdeb); ?>
<?php endif; ?>
                </div>
            </template>
        </div>

        <!-- Right Toolbar -->
        <div class="flex gap-x-4 max-md:my-4 max-md:items-center max-md:justify-between">
            <!-- Pagination Panel -->
            <?php if (isset($component)) { $__componentOriginalfae2d8fc52b713d5ad0be74ea0cdce35 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfae2d8fc52b713d5ad0be74ea0cdce35 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.datagrid.toolbar.pagination','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::datagrid.toolbar.pagination'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <template #pagination="{
                    available,
                    applied,
                    changePage,
                    changePerPageOption
                }">
                    <slot
                        name="pagination"
                        :available="available"
                        :applied="applied"
                        :change-page="changePage"
                        :change-per-page-option="changePerPageOption"
                    >
                    </slot>
                </template>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfae2d8fc52b713d5ad0be74ea0cdce35)): ?>
<?php $attributes = $__attributesOriginalfae2d8fc52b713d5ad0be74ea0cdce35; ?>
<?php unset($__attributesOriginalfae2d8fc52b713d5ad0be74ea0cdce35); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfae2d8fc52b713d5ad0be74ea0cdce35)): ?>
<?php $component = $__componentOriginalfae2d8fc52b713d5ad0be74ea0cdce35; ?>
<?php unset($__componentOriginalfae2d8fc52b713d5ad0be74ea0cdce35); ?>
<?php endif; ?>                

            <div class="hidden max-md:block ltr:pl-2.5 rtl:pr-2.5">
                <p class="text-sm font-light text-gray-800 max-md:w-full">
                    {{ "<?php echo app('translator')->get('shop::app.components.datagrid.toolbar.results'); ?>".replace(':total', available.meta.total) }}
                </p>
            </div>

            <!-- Filter Panel -->
            <div class="max-md:hidden">
                <?php if (isset($component)) { $__componentOriginal9ca2ea672568ec4f21764c64d900bdeb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ca2ea672568ec4f21764c64d900bdeb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.datagrid.toolbar.filter','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::datagrid.toolbar.filter'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    <template #filter="{
                        available,
                        applied,
                        filters,
                        applyFilter,
                        applyColumnValues,
                        findAppliedColumn,
                        hasAnyAppliedColumnValues,
                        getAppliedColumnValues,
                        removeAppliedColumnValue,
                        removeAppliedColumnAllValues
                    }">
                        <slot
                            name="filter"
                            :available="available"
                            :applied="applied"
                            :filters="filters"
                            :apply-filter="applyFilter"
                            :apply-column-values="applyColumnValues"
                            :find-applied-column="findAppliedColumn"
                            :has-any-applied-column-values="hasAnyAppliedColumnValues"
                            :get-applied-column-values="getAppliedColumnValues"
                            :remove-applied-column-value="removeAppliedColumnValue"
                            :remove-applied-column-all-values="removeAppliedColumnAllValues"
                        >
                        </slot>
                    </template>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ca2ea672568ec4f21764c64d900bdeb)): ?>
<?php $attributes = $__attributesOriginal9ca2ea672568ec4f21764c64d900bdeb; ?>
<?php unset($__attributesOriginal9ca2ea672568ec4f21764c64d900bdeb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ca2ea672568ec4f21764c64d900bdeb)): ?>
<?php $component = $__componentOriginal9ca2ea672568ec4f21764c64d900bdeb; ?>
<?php unset($__componentOriginal9ca2ea672568ec4f21764c64d900bdeb); ?>
<?php endif; ?>
            </div>
        </div>
    </div>
</template>
<?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Shop\src\Resources\views\components\datagrid\toolbar.blade.php ENDPATH**/ ?>