<?php if (isset($component)) { $__componentOriginal4c4dbe009fe892108b054e8b47e63427 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4c4dbe009fe892108b054e8b47e63427 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.layouts.account.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::layouts.account'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <!-- Page Title -->
     <?php $__env->slot('title', null, []); ?> 
        <?php echo app('translator')->get('shop::app.customers.account.downloadable-products.name'); ?>
     <?php $__env->endSlot(); ?>

    <!-- Breadcrumbs -->
    <?php if((core()->getConfigData('general.general.breadcrumbs.shop'))): ?>
        <?php $__env->startSection('breadcrumbs'); ?>
            <?php if (isset($component)) { $__componentOriginaldef12fd0653509715c3bc62a609dde73 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldef12fd0653509715c3bc62a609dde73 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.breadcrumbs.index','data' => ['name' => 'downloadable-products']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::breadcrumbs'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'downloadable-products']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldef12fd0653509715c3bc62a609dde73)): ?>
<?php $attributes = $__attributesOriginaldef12fd0653509715c3bc62a609dde73; ?>
<?php unset($__attributesOriginaldef12fd0653509715c3bc62a609dde73); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldef12fd0653509715c3bc62a609dde73)): ?>
<?php $component = $__componentOriginaldef12fd0653509715c3bc62a609dde73; ?>
<?php unset($__componentOriginaldef12fd0653509715c3bc62a609dde73); ?>
<?php endif; ?>
        <?php $__env->stopSection(); ?>
    <?php endif; ?>

    <div class="max-md:hidden">
        <?php if (isset($component)) { $__componentOriginalf60f1298dff473a76a071049d503ffbb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf60f1298dff473a76a071049d503ffbb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.layouts.account.navigation','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::layouts.account.navigation'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf60f1298dff473a76a071049d503ffbb)): ?>
<?php $attributes = $__attributesOriginalf60f1298dff473a76a071049d503ffbb; ?>
<?php unset($__attributesOriginalf60f1298dff473a76a071049d503ffbb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf60f1298dff473a76a071049d503ffbb)): ?>
<?php $component = $__componentOriginalf60f1298dff473a76a071049d503ffbb; ?>
<?php unset($__componentOriginalf60f1298dff473a76a071049d503ffbb); ?>
<?php endif; ?>
    </div>

    <div class="mx-4 flex-auto max-md:mx-6 max-sm:mx-4">
        <div class="mb-8 flex items-center max-md:mb-5">
            <!-- Back Button -->
            <a
                class="grid md:hidden"
                href="<?php echo e(route('shop.customers.account.index')); ?>"
            >
                <span class="icon-arrow-left rtl:icon-arrow-right text-2xl"></span>
            </a>

            <h2 class="text-2xl font-medium max-md:text-xl max-sm:text-base ltr:ml-2.5 md:ltr:ml-0 rtl:mr-2.5 md:rtl:mr-0">
                <?php echo app('translator')->get('shop::app.customers.account.downloadable-products.name'); ?>
            </h2>
        </div>

        <?php echo view_render_event('bagisto.shop.customers.account.downloadable_products.list.before'); ?>


            <!-- For Desktop View -->
        <div class="max-md:hidden">
            <?php if (isset($component)) { $__componentOriginalecf94570a1525c4419036c5d937e7c2d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalecf94570a1525c4419036c5d937e7c2d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.datagrid.index','data' => ['src' => route('shop.customers.account.downloadable_products.index')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::datagrid'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['src' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('shop.customers.account.downloadable_products.index'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalecf94570a1525c4419036c5d937e7c2d)): ?>
<?php $attributes = $__attributesOriginalecf94570a1525c4419036c5d937e7c2d; ?>
<?php unset($__attributesOriginalecf94570a1525c4419036c5d937e7c2d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalecf94570a1525c4419036c5d937e7c2d)): ?>
<?php $component = $__componentOriginalecf94570a1525c4419036c5d937e7c2d; ?>
<?php unset($__componentOriginalecf94570a1525c4419036c5d937e7c2d); ?>
<?php endif; ?>
        </div>

        <!-- For Mobile View -->
        <div class="hidden max-md:block">
            <?php if (isset($component)) { $__componentOriginalecf94570a1525c4419036c5d937e7c2d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalecf94570a1525c4419036c5d937e7c2d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.datagrid.index','data' => ['src' => route('shop.customers.account.downloadable_products.index')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::datagrid'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['src' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('shop.customers.account.downloadable_products.index'))]); ?>
                <!-- Datagrid Header -->
                <template #header="{
                    isLoading,
                    available,
                    applied,
                    selectAll,
                    sort,
                    performAction
                }">
                    <div class="hidden"></div>
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
                        <?php if (isset($component)) { $__componentOriginal076edd40e27bf53b1f2102bae7803402 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal076edd40e27bf53b1f2102bae7803402 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.shimmer.datagrid.table.body','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::shimmer.datagrid.table.body'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
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
                        <div class="grid gap-4">
                            <template
                                v-for="record in available.records"
                                v-if="available.records.length"
                            >
                                <div class="grid w-full gap-2.5 rounded-md border p-4 transition-all">
                                    <div class="flex justify-between">
                                        <div class="text-sm font-semibold">
                                            <p><?php echo app('translator')->get('shop::app.customers.account.downloadable-products.orderId'); ?>: #{{ record.increment_id }}</p>

                                            <p class="text-xs font-normal text-neutral-500">
                                                {{ record.created_at }}
                                            </p>
                                        </div>

                                        <p v-html="record.status"></p>
                                    </div>
            
                                    <div class="text-xs font-normal">
                                        <p
                                            class="text-sm font-semibold text-blue-600"
                                            v-html="record.product_name"
                                        >
                                        </p>

                                        <p><span class="text-neutral-500"><?php echo app('translator')->get('Remaining Downloads'); ?>:</span> <span class="font-medium">{{ record.remaining_downloads }}</span></p>
                                    </div>
                                </div>
                            </template>

                            <template v-else>
                                {{ available.records.length }} <?php echo app('translator')->get('shop::app.customers.account.downloadable-products.records-found'); ?>
                            </template>
                        </div>
                    </template>
                </template>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalecf94570a1525c4419036c5d937e7c2d)): ?>
<?php $attributes = $__attributesOriginalecf94570a1525c4419036c5d937e7c2d; ?>
<?php unset($__attributesOriginalecf94570a1525c4419036c5d937e7c2d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalecf94570a1525c4419036c5d937e7c2d)): ?>
<?php $component = $__componentOriginalecf94570a1525c4419036c5d937e7c2d; ?>
<?php unset($__componentOriginalecf94570a1525c4419036c5d937e7c2d); ?>
<?php endif; ?>
        </div>

        <?php echo view_render_event('bagisto.shop.customers.account.downloadable_products.list.after'); ?>


    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4c4dbe009fe892108b054e8b47e63427)): ?>
<?php $attributes = $__attributesOriginal4c4dbe009fe892108b054e8b47e63427; ?>
<?php unset($__attributesOriginal4c4dbe009fe892108b054e8b47e63427); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4c4dbe009fe892108b054e8b47e63427)): ?>
<?php $component = $__componentOriginal4c4dbe009fe892108b054e8b47e63427; ?>
<?php unset($__componentOriginal4c4dbe009fe892108b054e8b47e63427); ?>
<?php endif; ?><?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Shop\src\Resources\views\customers\account\downloadable_products\index.blade.php ENDPATH**/ ?>