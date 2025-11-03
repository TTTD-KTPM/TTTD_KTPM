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
        <?php echo app('translator')->get('shop::app.customers.account.addresses.index.add-address'); ?>
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
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <!-- Back Button -->
                <a
                    class="grid md:hidden"
                    href="<?php echo e(route('shop.customers.account.index')); ?>"
                >
                    <span class="icon-arrow-left rtl:icon-arrow-right text-2xl"></span>
                </a>
    
                <h2 class="text-2xl font-medium max-md:text-xl max-sm:text-base ltr:ml-2.5 md:ltr:ml-0 rtl:mr-2.5 md:rtl:mr-0">
                    <?php echo app('translator')->get('shop::app.customers.account.addresses.index.title'); ?>
                </h2>
            </div>

            <a
                href="<?php echo e(route('shop.customers.account.addresses.create')); ?>"
                class="secondary-button border-zinc-200 px-5 py-3 font-normal max-md:rounded-lg max-md:py-2 max-sm:py-1.5 max-sm:text-sm"
            >
                <?php echo app('translator')->get('shop::app.customers.account.addresses.index.add-address'); ?> 
            </a>
        </div>

        <?php if(! $addresses->isEmpty()): ?>
            <!-- Address Information -->

            <?php echo view_render_event('bagisto.shop.customers.account.addresses.list.before', ['addresses' => $addresses]); ?>


            <div class="mt-[60px] grid grid-cols-2 gap-5 max-1060:grid-cols-[1fr] max-md:mt-5">
                <?php $__currentLoopData = $addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="rounded-xl border border-zinc-200 p-5 max-md:flex-wrap">
                        <div class="flex justify-between">
                            <p class="text-base font-medium">
                                <?php echo e($address->first_name); ?> <?php echo e($address->last_name); ?>


                                <?php if($address->company_name): ?>
                                    (<?php echo e($address->company_name); ?>)
                                <?php endif; ?>
                            </p>

                            <div class="flex gap-4 max-sm:gap-2.5">
                                <?php if($address->default_address): ?>
                                    <div class="label-pending block h-fit w-max px-2.5 py-1 max-md:px-1.5">
                                        <?php echo app('translator')->get('shop::app.customers.account.addresses.index.default-address'); ?> 
                                    </div>
                                <?php endif; ?>

                                <!-- Dropdown Actions -->
                                <?php if (isset($component)) { $__componentOriginal6eb652d0a4a36e6466d8d4f363feb553 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6eb652d0a4a36e6466d8d4f363feb553 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.dropdown.index','data' => ['position' => 'bottom-'.e(core()->getCurrentLocale()->direction === 'ltr' ? 'right' : 'left').'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['position' => 'bottom-'.e(core()->getCurrentLocale()->direction === 'ltr' ? 'right' : 'left').'']); ?>
                                     <?php $__env->slot('toggle', null, []); ?> 
                                        <button 
                                            class="icon-more cursor-pointer rounded-md px-1.5 py-1 text-2xl text-zinc-500 transition-all hover:bg-gray-100 hover:text-black focus:bg-gray-100 focus:text-black max-md:p-0" 
                                            aria-label="More Options"
                                        >
                                        </button>
                                     <?php $__env->endSlot(); ?>

                                     <?php $__env->slot('menu', null, ['class' => '!py-1 max-sm:!py-0']); ?> 
                                        <?php if (isset($component)) { $__componentOriginalb61dc971083484c78229c771be09733d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb61dc971083484c78229c771be09733d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.dropdown.menu.item','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::dropdown.menu.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                            <a href="<?php echo e(route('shop.customers.account.addresses.edit', $address->id)); ?>">
                                                <p class="w-full">
                                                    <?php echo app('translator')->get('shop::app.customers.account.addresses.index.edit'); ?>
                                                </p>
                                            </a>    
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

                                        <?php if (isset($component)) { $__componentOriginalb61dc971083484c78229c771be09733d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb61dc971083484c78229c771be09733d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.dropdown.menu.item','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::dropdown.menu.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                            <form
                                                method="POST"
                                                ref="addressDelete"
                                                action="<?php echo e(route('shop.customers.account.addresses.delete', $address->id)); ?>"
                                            >
                                                <?php echo method_field('DELETE'); ?>
                                                <?php echo csrf_field(); ?>
                                            </form>

                                            <a 
                                                href="javascript:void(0);"                                                
                                                @click="$emitter.emit('open-confirm-modal', {
                                                    agree: () => {
                                                        $refs['addressDelete'].submit()
                                                    }
                                                })"
                                            >
                                                <p class="w-full">
                                                    <?php echo app('translator')->get('shop::app.customers.account.addresses.index.delete'); ?>
                                                </p>
                                            </a>
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

                                        <?php if(! $address->default_address): ?>
                                            <?php if (isset($component)) { $__componentOriginalb61dc971083484c78229c771be09733d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb61dc971083484c78229c771be09733d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.dropdown.menu.item','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::dropdown.menu.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                <form
                                                    method="POST"
                                                    ref="setAsDefault"
                                                    action="<?php echo e(route('shop.customers.account.addresses.update.default', $address->id)); ?>"
                                                >
                                                    <?php echo method_field('PATCH'); ?>
                                                    <?php echo csrf_field(); ?>

                                                </form>

                                                <a 
                                                    href="javascript:void(0);"                                                
                                                    @click="$emitter.emit('open-confirm-modal', {
                                                        agree: () => {
                                                            $refs['setAsDefault'].submit()
                                                        }
                                                    })"
                                                >
                                                    <button>
                                                        <?php echo app('translator')->get('shop::app.customers.account.addresses.index.set-as-default'); ?>
                                                    </button>
                                                </a>
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
                        </div>

                        <p class="mt-6 text-zinc-500 max-md:mt-5 max-md:text-sm">
                            <?php echo e($address->address); ?>,

                            <?php echo e($address->city); ?>, 
                            <?php echo e($address->state); ?>, <?php echo e($address->country); ?>, 
                            <?php echo e($address->postcode); ?>

                        </p>
                    </div>    
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <?php echo view_render_event('bagisto.shop.customers.account.addresses.list.after', ['addresses' => $addresses]); ?>


        <?php else: ?>
            <!-- Address Empty Page -->
            <div class="m-auto grid w-full place-content-center items-center justify-items-center py-32 text-center">
                <img 
                    class="max-md:h-[100px] max-md:w-[100px]"
                    src="<?php echo e(bagisto_asset('images/no-address.png')); ?>" 
                    alt="Empty Address" 
                    title=""
                >
                
                <p
                    class="text-xl max-md:text-sm"
                    role="heading"
                >
                    <?php echo app('translator')->get('shop::app.customers.account.addresses.index.empty-address'); ?>
                </p>
            </div>    
        <?php endif; ?>
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
<?php endif; ?>
<?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Shop\src\Resources\views\customers\account\addresses\index.blade.php ENDPATH**/ ?>