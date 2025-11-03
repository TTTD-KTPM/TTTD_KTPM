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
        <?php echo app('translator')->get('admin::app.reporting.' . $entity . '.index.' . request()->query('type')); ?>
     <?php $__env->endSlot(); ?>

    <v-reporting-stats-table>
        <!-- Shimmer -->
        <?php if (isset($component)) { $__componentOriginal9730a667738f72d6fcbec4ddc5c6f4ab = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9730a667738f72d6fcbec4ddc5c6f4ab = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.shimmer.reporting.view','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::shimmer.reporting.view'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9730a667738f72d6fcbec4ddc5c6f4ab)): ?>
<?php $attributes = $__attributesOriginal9730a667738f72d6fcbec4ddc5c6f4ab; ?>
<?php unset($__attributesOriginal9730a667738f72d6fcbec4ddc5c6f4ab); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9730a667738f72d6fcbec4ddc5c6f4ab)): ?>
<?php $component = $__componentOriginal9730a667738f72d6fcbec4ddc5c6f4ab; ?>
<?php unset($__componentOriginal9730a667738f72d6fcbec4ddc5c6f4ab); ?>
<?php endif; ?>
    </v-reporting-stats-table>

    <?php if (! $__env->hasRenderedOnce('8dd6fb51-6dd7-4ff2-9f1c-b44cc88b3f42')): $__env->markAsRenderedOnce('8dd6fb51-6dd7-4ff2-9f1c-b44cc88b3f42');
$__env->startPush('scripts'); ?>
        <script
            type="text/x-template"
            id="v-reporting-stats-table-template"
        >
            <div>
                <!-- Page Header -->
                <div class="mb-5 flex items-center justify-between gap-4 max-sm:flex-wrap">
                    <!-- Title -->
                    <div class="grid gap-1.5">
                        <p class="text-xl font-bold leading-6 text-gray-800 dark:text-white">
                            <?php echo app('translator')->get('admin::app.reporting.' . $entity . '.index.' . request()->query('type')); ?>
                        </p>
                    </div>

                    <!-- Actions -->
                    <div class="flex items-center gap-1.5">
                       <!-- Back Button -->
                        <div>
                            <a v-if="entity === 'customers'"
                                href="<?php echo e(route('admin.reporting.customers.index')); ?>"
                                class="transparent-button hover:bg-gray-200 dark:text-white dark:hover:bg-gray-800">
                                <?php echo app('translator')->get('admin::app.reporting.view.back-btn'); ?>
                            </a>
                            
                            <a v-else-if="entity === 'products'"
                                href="<?php echo e(route('admin.reporting.products.index')); ?>"
                                class="transparent-button hover:bg-gray-200 dark:text-white dark:hover:bg-gray-800">
                                <?php echo app('translator')->get('admin::app.reporting.view.back-btn'); ?>
                            </a>
                            
                            <a v-else
                                href="<?php echo e(route('admin.reporting.sales.index')); ?>"
                                class="transparent-button hover:bg-gray-200 dark:text-white dark:hover:bg-gray-800">
                                <?php echo app('translator')->get('admin::app.reporting.view.back-btn'); ?>
                            </a>
                        </div>
             
                        <!-- Export Button -->
                        <?php if (isset($component)) { $__componentOriginalaf937e0ec72fa678d3a0c6dc6c0ac5f2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaf937e0ec72fa678d3a0c6dc6c0ac5f2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.dropdown.index','data' => ['position' => 'bottom-right']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['position' => 'bottom-right']); ?>
                             <?php $__env->slot('toggle', null, []); ?> 
                                <div class="transparent-button hover:bg-gray-200 dark:text-white dark:hover:bg-gray-800">
                                    <span class="icon-export text-xl text-gray-600"></span>
            
                                    <?php echo app('translator')->get('admin::app.export.export'); ?>
                                </div>
                             <?php $__env->endSlot(); ?>

                             <?php $__env->slot('menu', null, ['class' => '!p-0 shadow-[0_5px_20px_rgba(0,0,0,0.15)] dark:border-gray-800']); ?> 
                                <?php if (isset($component)) { $__componentOriginal0223c8534d6a243be608c3a65289c4d0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0223c8534d6a243be608c3a65289c4d0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.dropdown.menu.item','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::dropdown.menu.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                    <span @click="exportReporting('csv')">
                                        <?php echo app('translator')->get('admin::app.reporting.view.export-csv'); ?>
                                    </span>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0223c8534d6a243be608c3a65289c4d0)): ?>
<?php $attributes = $__attributesOriginal0223c8534d6a243be608c3a65289c4d0; ?>
<?php unset($__attributesOriginal0223c8534d6a243be608c3a65289c4d0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0223c8534d6a243be608c3a65289c4d0)): ?>
<?php $component = $__componentOriginal0223c8534d6a243be608c3a65289c4d0; ?>
<?php unset($__componentOriginal0223c8534d6a243be608c3a65289c4d0); ?>
<?php endif; ?>

                                <?php if (isset($component)) { $__componentOriginal0223c8534d6a243be608c3a65289c4d0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0223c8534d6a243be608c3a65289c4d0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.dropdown.menu.item','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::dropdown.menu.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                    <span @click="exportReporting('xls')">
                                        <?php echo app('translator')->get('admin::app.reporting.view.export-xls'); ?>
                                    </span>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0223c8534d6a243be608c3a65289c4d0)): ?>
<?php $attributes = $__attributesOriginal0223c8534d6a243be608c3a65289c4d0; ?>
<?php unset($__attributesOriginal0223c8534d6a243be608c3a65289c4d0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0223c8534d6a243be608c3a65289c4d0)): ?>
<?php $component = $__componentOriginal0223c8534d6a243be608c3a65289c4d0; ?>
<?php unset($__componentOriginal0223c8534d6a243be608c3a65289c4d0); ?>
<?php endif; ?>
                             <?php $__env->endSlot(); ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalaf937e0ec72fa678d3a0c6dc6c0ac5f2)): ?>
<?php $attributes = $__attributesOriginalaf937e0ec72fa678d3a0c6dc6c0ac5f2; ?>
<?php unset($__attributesOriginalaf937e0ec72fa678d3a0c6dc6c0ac5f2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalaf937e0ec72fa678d3a0c6dc6c0ac5f2)): ?>
<?php $component = $__componentOriginalaf937e0ec72fa678d3a0c6dc6c0ac5f2; ?>
<?php unset($__componentOriginalaf937e0ec72fa678d3a0c6dc6c0ac5f2); ?>
<?php endif; ?>
                    </div>
                </div>

                <div class="mb-5 flex items-center justify-between gap-4 max-sm:flex-wrap">
                    <div class="flex items-center gap-x-1">
                        <!-- Channel Filter -->
                        <template v-if="channels.length > 2">
                            <?php if (isset($component)) { $__componentOriginalaf937e0ec72fa678d3a0c6dc6c0ac5f2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaf937e0ec72fa678d3a0c6dc6c0ac5f2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.dropdown.index','data' => ['position' => 'bottom-'.e(core()->getCurrentLocale()->direction === 'ltr' ? 'left' : 'right').'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['position' => 'bottom-'.e(core()->getCurrentLocale()->direction === 'ltr' ? 'left' : 'right').'']); ?>
                                 <?php $__env->slot('toggle', null, []); ?> 
                                    <button
                                        type="button"
                                        class="transparent-button px-1 py-1.5 hover:bg-gray-200 focus:bg-gray-200 dark:text-white dark:hover:bg-gray-800 dark:focus:bg-gray-800"
                                    >
                                        <span class="icon-store text-2xl"></span>

                                        {{ channels.find(channel => channel.code == filters.channel).name }}
                                        
                                        <span class="icon-sort-down text-2xl"></span>
                                    </button>
                                 <?php $__env->endSlot(); ?>

                                 <?php $__env->slot('menu', null, ['class' => '!p-0 shadow-[0_5px_20px_rgba(0,0,0,0.15)] dark:border-gray-800']); ?> 
                                    <?php if (isset($component)) { $__componentOriginal0223c8534d6a243be608c3a65289c4d0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0223c8534d6a243be608c3a65289c4d0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.dropdown.menu.item','data' => ['vFor' => 'channel in channels',':class' => '{\'bg-gray-100 dark:bg-gray-950\': channel.code == filters.channel}','@click' => 'filters.channel = channel.code']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::dropdown.menu.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['v-for' => 'channel in channels',':class' => '{\'bg-gray-100 dark:bg-gray-950\': channel.code == filters.channel}','@click' => 'filters.channel = channel.code']); ?>
                                        {{ channel.name }}
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0223c8534d6a243be608c3a65289c4d0)): ?>
<?php $attributes = $__attributesOriginal0223c8534d6a243be608c3a65289c4d0; ?>
<?php unset($__attributesOriginal0223c8534d6a243be608c3a65289c4d0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0223c8534d6a243be608c3a65289c4d0)): ?>
<?php $component = $__componentOriginal0223c8534d6a243be608c3a65289c4d0; ?>
<?php unset($__componentOriginal0223c8534d6a243be608c3a65289c4d0); ?>
<?php endif; ?>
                                 <?php $__env->endSlot(); ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalaf937e0ec72fa678d3a0c6dc6c0ac5f2)): ?>
<?php $attributes = $__attributesOriginalaf937e0ec72fa678d3a0c6dc6c0ac5f2; ?>
<?php unset($__attributesOriginalaf937e0ec72fa678d3a0c6dc6c0ac5f2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalaf937e0ec72fa678d3a0c6dc6c0ac5f2)): ?>
<?php $component = $__componentOriginalaf937e0ec72fa678d3a0c6dc6c0ac5f2; ?>
<?php unset($__componentOriginalaf937e0ec72fa678d3a0c6dc6c0ac5f2); ?>
<?php endif; ?>
                        </template>

                        <!-- Day Filter -->
                        <?php if(in_array(request()->query('type'), [
                            'total-sales',
                            'total-orders',
                            'average-sales',
                            'tax-collected',
                            'shipping-collected',
                            'refunds',
                            'total-customers',
                            'total-sold-quantities',
                            'total-products-added-to-wishlist',
                        ])): ?>
                            <div class="relative inline-flex w-full max-w-max">
                                <select
                                    class="w-full cursor-pointer appearance-none rounded-md border bg-white px-2.5 py-1.5 pr-8 text-center leading-6 text-gray-600 transition hover:border-gray-400 focus:border-gray-400 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300 dark:hover:border-gray-400 dark:focus:border-gray-400"
                                    v-model="filters.period"
                                >
                                    <option value="day">
                                        <?php echo app('translator')->get('admin::app.reporting.view.day'); ?>
                                    </option>
                                    
                                    <option value="month">
                                        <?php echo app('translator')->get('admin::app.reporting.view.month'); ?>
                                    </option>
                            
                                    <option value="year">
                                        <?php echo app('translator')->get('admin::app.reporting.view.year'); ?>
                                    </option>
                                </select>
                                
                                <span class="icon-sort-down pointer-events-none absolute right-2 top-1/2 -translate-y-1/2 transform text-2xl text-gray-600 dark:text-gray-300"></span>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Actions -->
                    <div class="flex items-center gap-1.5">
                        <?php if (isset($component)) { $__componentOriginalfb6be9e824dd35fb24e37e299d255b9b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfb6be9e824dd35fb24e37e299d255b9b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.flat-picker.date','data' => ['class' => '!w-[140px]',':allowInput' => 'false']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::flat-picker.date'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => '!w-[140px]',':allow-input' => 'false']); ?>
                            <input
                                class="flex min-h-[39px] w-full rounded-md border px-3 py-2 text-sm text-gray-600 transition-all hover:border-gray-400 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300 dark:hover:border-gray-400"
                                v-model="filters.start"
                                placeholder="<?php echo app('translator')->get('admin::app.reporting.view.start-date'); ?>"
                            />
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfb6be9e824dd35fb24e37e299d255b9b)): ?>
<?php $attributes = $__attributesOriginalfb6be9e824dd35fb24e37e299d255b9b; ?>
<?php unset($__attributesOriginalfb6be9e824dd35fb24e37e299d255b9b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfb6be9e824dd35fb24e37e299d255b9b)): ?>
<?php $component = $__componentOriginalfb6be9e824dd35fb24e37e299d255b9b; ?>
<?php unset($__componentOriginalfb6be9e824dd35fb24e37e299d255b9b); ?>
<?php endif; ?>

                        <?php if (isset($component)) { $__componentOriginalfb6be9e824dd35fb24e37e299d255b9b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfb6be9e824dd35fb24e37e299d255b9b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.flat-picker.date','data' => ['class' => '!w-[140px]',':allowInput' => 'false']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::flat-picker.date'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => '!w-[140px]',':allow-input' => 'false']); ?>
                            <input
                                class="flex min-h-[39px] w-full rounded-md border px-3 py-2 text-sm text-gray-600 transition-all hover:border-gray-400 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300 dark:hover:border-gray-400"
                                v-model="filters.end"
                                placeholder="<?php echo app('translator')->get('admin::app.reporting.view.end-date'); ?>"
                            />
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfb6be9e824dd35fb24e37e299d255b9b)): ?>
<?php $attributes = $__attributesOriginalfb6be9e824dd35fb24e37e299d255b9b; ?>
<?php unset($__attributesOriginalfb6be9e824dd35fb24e37e299d255b9b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfb6be9e824dd35fb24e37e299d255b9b)): ?>
<?php $component = $__componentOriginalfb6be9e824dd35fb24e37e299d255b9b; ?>
<?php unset($__componentOriginalfb6be9e824dd35fb24e37e299d255b9b); ?>
<?php endif; ?>
                    </div>
                </div>

                <div class="table-responsive box-shadow grid w-full overflow-hidden rounded bg-white dark:bg-gray-900">
                    <template v-if="isLoading">
                        <?php if (isset($component)) { $__componentOriginalc107096d39100b5f7264e4f2087676a5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc107096d39100b5f7264e4f2087676a5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.shimmer.datagrid.table.head','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::shimmer.datagrid.table.head'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
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

                        <?php if (isset($component)) { $__componentOriginal601d211589286a2faeaa4f7f9edf9405 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal601d211589286a2faeaa4f7f9edf9405 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.shimmer.datagrid.table.body','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::shimmer.datagrid.table.body'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
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
                        <!-- Table Header -->
                        <div
                            class="row grid grid-cols-4 grid-rows-1 items-center gap-2.5 border-b bg-gray-50 px-4 py-2.5 font-semibold text-gray-600 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300"
                            :style="`grid-template-columns: repeat(${reporting.statistics.columns.length}, minmax(0, 1fr))`"
                        >
                            <div
                                class="flex cursor-pointer gap-2.5"
                                v-for="column in reporting.statistics.columns"
                            >
                                <p class="text-gray-600 dark:text-gray-300">
                                    {{ column.label }}
                                </p>
                            </div>
                        </div>

                        <!-- Table Body -->
                        <div
                            class="row grid items-center gap-2.5 border-b px-4 py-4 text-gray-600 transition-all hover:bg-gray-50 dark:border-gray-800 dark:text-gray-300 dark:hover:bg-gray-950" style="grid-template-columns: repeat(4, minmax(0, 1fr));"
                            :style="`grid-template-columns: repeat(${reporting.statistics.columns.length}, minmax(0, 1fr))`"
                            v-if="reporting.statistics.records.length"
                            v-for="record in reporting.statistics.records"
                        >
                            <p v-for="column in reporting.statistics.columns">
                                {{ record[column.key] }}
                            </p>
                        </div>

                        <div
                            v-else
                            class="row grid gap-2.5 border-b px-4 py-4 text-center text-gray-600 transition-all hover:bg-gray-50 dark:border-gray-800 dark:text-gray-300 dark:hover:bg-gray-950"
                        >
                            <p><?php echo app('translator')->get('admin::app.reporting.view.not-available'); ?></p>
                        </div>
                    </template>
                </div>
            </div>
        </script>

        <script type="module">
            app.component('v-reporting-stats-table', {
                template: '#v-reporting-stats-table-template',

                data() {
                    return {
                        channels: [
                            {
                                name: "<?php echo app('translator')->get('admin::app.reporting.view.all-channels'); ?>",
                                code: ''
                            },
                            ...<?php echo json_encode(core()->getAllChannels(), 15, 512) ?>,
                        ],
                        
                        filters: {
                            type: "<?php echo e(request()->query('type')); ?>",
                            
                            period: 'day',

                            channel: '',

                            start: "<?php echo e($startDate->format('Y-m-d')); ?>",

                            end: "<?php echo e($endDate->format('Y-m-d')); ?>",
                        },

                        reporting: [],

                        isLoading: true,

                        entity: "<?php echo e($entity); ?>",
                    }
                },

                mounted() {
                    this.getStats();
                },

                watch: {
                    filters: {
                        handler() {
                            this.getStats();
                        },

                        deep: true
                    }
                },

                methods: {
                    getStats() {
                        this.isLoading = true;

                        this.$axios.get("<?php echo e(route('admin.reporting.' . $entity . '.view.stats')); ?>", {
                                params: this.filters
                            })
                            .then(response => {
                                this.reporting = response.data;

                                this.isLoading = false;
                            })
                            .catch(error => {});
                    },

                    exportReporting(format) {
                        let filters = this.filters;

                        filters.format = format;

                        window.open(
                            "<?php echo e(route('admin.reporting.' . $entity . '.export')); ?>?"  + new URLSearchParams(filters).toString(),
                            '_blank'
                        );
                    }
                }
            });
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
<?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Admin\src\Resources\views\reporting\view.blade.php ENDPATH**/ ?>