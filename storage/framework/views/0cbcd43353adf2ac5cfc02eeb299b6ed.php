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
        <?php echo app('translator')->get('shop::app.customers.account.gdpr.index.title'); ?>
     <?php $__env->endSlot(); ?>
    
    <!-- Breadcrumbs -->
    <?php if((core()->getConfigData('general.general.breadcrumbs.shop'))): ?>
        <?php $__env->startSection('breadcrumbs'); ?>
            <?php if (isset($component)) { $__componentOriginaldef12fd0653509715c3bc62a609dde73 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldef12fd0653509715c3bc62a609dde73 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.breadcrumbs.index','data' => ['name' => 'addresses']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::breadcrumbs'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'addresses']); ?>
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

    <div class="mx-4 flex-auto">
        <div class="flex items-center justify-between gap-4 max-md:flex-wrap">
            <div class="flex items-center">
                <!-- Back Button -->
                <a
                    class="grid md:hidden"
                    href="<?php echo e(route('shop.customers.account.index')); ?>"
                >
                    <span class="icon-arrow-left rtl:icon-arrow-right text-2xl"></span>
                </a>
    
                <h2 class="text-2xl font-medium max-md:text-xl max-sm:text-base ltr:ml-2.5 md:ltr:ml-0 rtl:mr-2.5 md:rtl:mr-0">
                    <?php echo app('translator')->get('shop::app.customers.account.gdpr.index.title'); ?>
                </h2>
            </div>

            <div class="flex gap-4">
                <a 
                    href="<?php echo e(route('shop.customers.account.gdpr.pdf-view')); ?>"
                    class="secondary-button border-zinc-200 px-5 py-3 font-normal max-md:rounded-lg max-md:py-2 max-sm:py-1.5 max-sm:text-sm"
                >
                    <?php echo app('translator')->get('shop::app.customers.account.gdpr.index.pdf'); ?> 
                </a>

                <a
                    href="<?php echo e(route('shop.customers.account.gdpr.html-view')); ?>"
                    target="_blank"
                    class="secondary-button border-zinc-200 px-5 py-3 font-normal max-md:rounded-lg max-md:py-2 max-sm:py-1.5 max-sm:text-sm"
                >
                    <?php echo app('translator')->get('shop::app.customers.account.gdpr.index.html'); ?> 
                </a>
    
                <button
                    class="primary-button border-zinc-200 px-5 py-3 font-normal max-md:rounded-lg max-md:py-2 max-sm:py-1.5 max-sm:text-sm"
                    @click="$refs.loginModel.open()"
                >
                    <?php echo app('translator')->get('shop::app.customers.account.gdpr.index.create-btn'); ?> 
                </button>
            </div>
        </div>

        <?php echo view_render_event('bagisto.shop.customers.account.gdpr.list.before'); ?>


        <!-- For Desktop View -->
        <div class="max-md:hidden">
            <?php if (isset($component)) { $__componentOriginalecf94570a1525c4419036c5d937e7c2d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalecf94570a1525c4419036c5d937e7c2d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.datagrid.index','data' => ['src' => route('shop.customers.account.gdpr.index')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::datagrid'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['src' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('shop.customers.account.gdpr.index'))]); ?>
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
        <div class="md:hidden">
            <?php if (isset($component)) { $__componentOriginalecf94570a1525c4419036c5d937e7c2d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalecf94570a1525c4419036c5d937e7c2d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.datagrid.index','data' => ['src' => route('shop.customers.account.gdpr.index')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::datagrid'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['src' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('shop.customers.account.gdpr.index'))]); ?>
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
                        <template v-for="record in available.records">
                            <div class="w-full p-4 border rounded-md transition-all hover:bg-gray-50 [&>*]:border-0 mb-4 last:mb-0">
                                <div class="flex items-center justify-between">
                                    <div class="flex flex-col gap-1">
                                        <div class="flex gap-2">
                                            <p class="text-sm text-neutral-500">
                                                <?php echo app('translator')->get('shop::app.customers.account.gdpr.index.datagrid.id'); ?>: 
                                            </p>
                                            
                                            <p class="text-sm">
                                                {{ record.id }}
                                            </p>
                                        </div>

                                        <div class="flex gap-2">
                                            <p class="text-sm text-neutral-500">
                                                <?php echo app('translator')->get('shop::app.customers.account.gdpr.index.datagrid.type'); ?>: 
                                            </p>
                                            
                                            <p class="text-sm">
                                                {{ record.type }}
                                            </p>
                                        </div>

                                        <div class="flex gap-2">
                                            <p class="text-sm text-neutral-500">
                                                <?php echo app('translator')->get('shop::app.customers.account.gdpr.index.datagrid.date'); ?>: 
                                            </p>
                                            
                                            <p class="text-sm">
                                                {{ record.created_at }}
                                            </p>
                                        </div>

                                        <div class="flex gap-2">
                                            <p class="text-sm text-neutral-500">
                                                <?php echo app('translator')->get('shop::app.customers.account.gdpr.index.datagrid.message'); ?>: 
                                            </p>
                                            
                                            <p class="text-sm">
                                                {{ record.message }}
                                            </p>
                                        </div>
                                        
                                        <div class="flex gap-2">
                                            <p class="text-sm text-neutral-500">
                                                <?php echo app('translator')->get('shop::app.customers.account.gdpr.index.datagrid.status'); ?>: 
                                            </p>
                                            
                                            <p v-html="record.status"></p>
                                        </div>
                                    </div>

                                    <p v-html="record.revoke"></p>
                                </div>
                            </div>
                        </template>
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

        <?php echo view_render_event('bagisto.shop.customers.account.gdpr.list.after'); ?>

    </div>

    <!-- Login Form -->
    <?php if (isset($component)) { $__componentOriginal4d3fcee3e355fb6c8889181b04f357cc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4d3fcee3e355fb6c8889181b04f357cc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.form.index','data' => ['action' => ''.e(route('shop.customers.account.gdpr.store')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => ''.e(route('shop.customers.account.gdpr.store')).'']); ?>
        <?php echo view_render_event('bagisto.shop.customers.account.gdpr.request.form_controls.before'); ?>


        <?php if (isset($component)) { $__componentOriginal571c487d27ea546e3c8ba67e4aec0403 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal571c487d27ea546e3c8ba67e4aec0403 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.modal.index','data' => ['ref' => 'loginModel']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['ref' => 'loginModel']); ?>
            <!-- Modal Header -->
             <?php $__env->slot('header', null, []); ?> 
                <h2 class="text-2xl">
                    <?php echo app('translator')->get('shop::app.customers.account.gdpr.index.modal.title'); ?>
                </h2>
             <?php $__env->endSlot(); ?>

            <!-- Modal Content -->
             <?php $__env->slot('content', null, []); ?> 
                <!-- Type -->
                <?php if (isset($component)) { $__componentOriginal578beb4bb944f523450535628cf00b41 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal578beb4bb944f523450535628cf00b41 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.form.control-group.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::form.control-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    <?php if (isset($component)) { $__componentOriginal2f2718777649517fc23f75e819ccd670 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2f2718777649517fc23f75e819ccd670 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.form.control-group.label','data' => ['class' => 'required']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::form.control-group.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'required']); ?>
                        <?php echo app('translator')->get('shop::app.customers.account.gdpr.index.modal.type.title'); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2f2718777649517fc23f75e819ccd670)): ?>
<?php $attributes = $__attributesOriginal2f2718777649517fc23f75e819ccd670; ?>
<?php unset($__attributesOriginal2f2718777649517fc23f75e819ccd670); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2f2718777649517fc23f75e819ccd670)): ?>
<?php $component = $__componentOriginal2f2718777649517fc23f75e819ccd670; ?>
<?php unset($__componentOriginal2f2718777649517fc23f75e819ccd670); ?>
<?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginal03b54b937596232babb8a12a8847d013 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal03b54b937596232babb8a12a8847d013 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.form.control-group.control','data' => ['type' => 'select','name' => 'type','rules' => 'required']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'select','name' => 'type','rules' => 'required']); ?>
                        <option
                            value=""
                            disabled
                            selected
                        >
                            <?php echo app('translator')->get('shop::app.customers.account.gdpr.index.modal.type.choose'); ?>
                        </option>

                        <option value="update">
                            <?php echo app('translator')->get('shop::app.customers.account.gdpr.index.modal.type.update'); ?>
                        </option>

                        <option value="delete">
                            <?php echo app('translator')->get('shop::app.customers.account.gdpr.index.modal.type.delete'); ?>
                        </option>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal03b54b937596232babb8a12a8847d013)): ?>
<?php $attributes = $__attributesOriginal03b54b937596232babb8a12a8847d013; ?>
<?php unset($__attributesOriginal03b54b937596232babb8a12a8847d013); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal03b54b937596232babb8a12a8847d013)): ?>
<?php $component = $__componentOriginal03b54b937596232babb8a12a8847d013; ?>
<?php unset($__componentOriginal03b54b937596232babb8a12a8847d013); ?>
<?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginal72f1d7ac608c1db7c92b56fb85299dbf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal72f1d7ac608c1db7c92b56fb85299dbf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.form.control-group.error','data' => ['controlName' => 'type']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::form.control-group.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['control-name' => 'type']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal72f1d7ac608c1db7c92b56fb85299dbf)): ?>
<?php $attributes = $__attributesOriginal72f1d7ac608c1db7c92b56fb85299dbf; ?>
<?php unset($__attributesOriginal72f1d7ac608c1db7c92b56fb85299dbf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal72f1d7ac608c1db7c92b56fb85299dbf)): ?>
<?php $component = $__componentOriginal72f1d7ac608c1db7c92b56fb85299dbf; ?>
<?php unset($__componentOriginal72f1d7ac608c1db7c92b56fb85299dbf); ?>
<?php endif; ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal578beb4bb944f523450535628cf00b41)): ?>
<?php $attributes = $__attributesOriginal578beb4bb944f523450535628cf00b41; ?>
<?php unset($__attributesOriginal578beb4bb944f523450535628cf00b41); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal578beb4bb944f523450535628cf00b41)): ?>
<?php $component = $__componentOriginal578beb4bb944f523450535628cf00b41; ?>
<?php unset($__componentOriginal578beb4bb944f523450535628cf00b41); ?>
<?php endif; ?>

                <!-- Message -->
                <?php if (isset($component)) { $__componentOriginal578beb4bb944f523450535628cf00b41 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal578beb4bb944f523450535628cf00b41 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.form.control-group.index','data' => ['class' => '!mb-0']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::form.control-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => '!mb-0']); ?>
                    <?php if (isset($component)) { $__componentOriginal2f2718777649517fc23f75e819ccd670 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2f2718777649517fc23f75e819ccd670 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.form.control-group.label','data' => ['class' => 'required']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::form.control-group.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'required']); ?>
                        <?php echo app('translator')->get('shop::app.customers.account.gdpr.index.modal.message'); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2f2718777649517fc23f75e819ccd670)): ?>
<?php $attributes = $__attributesOriginal2f2718777649517fc23f75e819ccd670; ?>
<?php unset($__attributesOriginal2f2718777649517fc23f75e819ccd670); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2f2718777649517fc23f75e819ccd670)): ?>
<?php $component = $__componentOriginal2f2718777649517fc23f75e819ccd670; ?>
<?php unset($__componentOriginal2f2718777649517fc23f75e819ccd670); ?>
<?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginal03b54b937596232babb8a12a8847d013 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal03b54b937596232babb8a12a8847d013 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.form.control-group.control','data' => ['type' => 'textarea','name' => 'message','rules' => 'required']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'textarea','name' => 'message','rules' => 'required']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal03b54b937596232babb8a12a8847d013)): ?>
<?php $attributes = $__attributesOriginal03b54b937596232babb8a12a8847d013; ?>
<?php unset($__attributesOriginal03b54b937596232babb8a12a8847d013); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal03b54b937596232babb8a12a8847d013)): ?>
<?php $component = $__componentOriginal03b54b937596232babb8a12a8847d013; ?>
<?php unset($__componentOriginal03b54b937596232babb8a12a8847d013); ?>
<?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginal72f1d7ac608c1db7c92b56fb85299dbf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal72f1d7ac608c1db7c92b56fb85299dbf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.form.control-group.error','data' => ['controlName' => 'message']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::form.control-group.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['control-name' => 'message']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal72f1d7ac608c1db7c92b56fb85299dbf)): ?>
<?php $attributes = $__attributesOriginal72f1d7ac608c1db7c92b56fb85299dbf; ?>
<?php unset($__attributesOriginal72f1d7ac608c1db7c92b56fb85299dbf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal72f1d7ac608c1db7c92b56fb85299dbf)): ?>
<?php $component = $__componentOriginal72f1d7ac608c1db7c92b56fb85299dbf; ?>
<?php unset($__componentOriginal72f1d7ac608c1db7c92b56fb85299dbf); ?>
<?php endif; ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal578beb4bb944f523450535628cf00b41)): ?>
<?php $attributes = $__attributesOriginal578beb4bb944f523450535628cf00b41; ?>
<?php unset($__attributesOriginal578beb4bb944f523450535628cf00b41); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal578beb4bb944f523450535628cf00b41)): ?>
<?php $component = $__componentOriginal578beb4bb944f523450535628cf00b41; ?>
<?php unset($__componentOriginal578beb4bb944f523450535628cf00b41); ?>
<?php endif; ?>
             <?php $__env->endSlot(); ?>

            <!-- Modal Footer -->
             <?php $__env->slot('footer', null, []); ?> 
                <div class="flex flex-wrap items-center gap-4">
                    <?php if (isset($component)) { $__componentOriginal30786825665921390a816ebee82cf580 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal30786825665921390a816ebee82cf580 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.button.index','data' => ['class' => 'primary-button max-w-none flex-auto rounded-2xl px-11 py-3 max-md:rounded-lg max-md:py-1.5','title' => trans('shop::app.customers.account.gdpr.index.modal.save'),':loading' => 'isStoring',':disabled' => 'isStoring']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'primary-button max-w-none flex-auto rounded-2xl px-11 py-3 max-md:rounded-lg max-md:py-1.5','title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('shop::app.customers.account.gdpr.index.modal.save')),':loading' => 'isStoring',':disabled' => 'isStoring']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal30786825665921390a816ebee82cf580)): ?>
<?php $attributes = $__attributesOriginal30786825665921390a816ebee82cf580; ?>
<?php unset($__attributesOriginal30786825665921390a816ebee82cf580); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal30786825665921390a816ebee82cf580)): ?>
<?php $component = $__componentOriginal30786825665921390a816ebee82cf580; ?>
<?php unset($__componentOriginal30786825665921390a816ebee82cf580); ?>
<?php endif; ?>
                </div>
             <?php $__env->endSlot(); ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal571c487d27ea546e3c8ba67e4aec0403)): ?>
<?php $attributes = $__attributesOriginal571c487d27ea546e3c8ba67e4aec0403; ?>
<?php unset($__attributesOriginal571c487d27ea546e3c8ba67e4aec0403); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal571c487d27ea546e3c8ba67e4aec0403)): ?>
<?php $component = $__componentOriginal571c487d27ea546e3c8ba67e4aec0403; ?>
<?php unset($__componentOriginal571c487d27ea546e3c8ba67e4aec0403); ?>
<?php endif; ?>

        <?php echo view_render_event('bagisto.shop.customers.account.gdpr.request.form_controls.after'); ?>

     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4d3fcee3e355fb6c8889181b04f357cc)): ?>
<?php $attributes = $__attributesOriginal4d3fcee3e355fb6c8889181b04f357cc; ?>
<?php unset($__attributesOriginal4d3fcee3e355fb6c8889181b04f357cc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4d3fcee3e355fb6c8889181b04f357cc)): ?>
<?php $component = $__componentOriginal4d3fcee3e355fb6c8889181b04f357cc; ?>
<?php unset($__componentOriginal4d3fcee3e355fb6c8889181b04f357cc); ?>
<?php endif; ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4c4dbe009fe892108b054e8b47e63427)): ?>
<?php $attributes = $__attributesOriginal4c4dbe009fe892108b054e8b47e63427; ?>
<?php unset($__attributesOriginal4c4dbe009fe892108b054e8b47e63427); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4c4dbe009fe892108b054e8b47e63427)): ?>
<?php $component = $__componentOriginal4c4dbe009fe892108b054e8b47e63427; ?>
<?php unset($__componentOriginal4c4dbe009fe892108b054e8b47e63427); ?>
<?php endif; ?>
<?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Shop\src\Resources\views\customers\account\gdpr\index.blade.php ENDPATH**/ ?>