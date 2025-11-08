<?php if (isset($component)) { $__componentOriginal6eb652d0a4a36e6466d8d4f363feb553 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6eb652d0a4a36e6466d8d4f363feb553 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.dropdown.index','data' => ['position' => 'bottom-left']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['position' => 'bottom-left']); ?>
     <?php $__env->slot('toggle', null, []); ?> 
        <button class="flex w-full max-w-[200px] cursor-pointer items-center justify-between gap-4 rounded-lg border border-zinc-200 bg-white py-2 text-sm transition-all hover:border-gray-400 focus:border-gray-400 max-md:py-2 max-sm:py-1.5 ltr:pl-4 ltr:pr-3 max-md:ltr:pl-2.5 max-md:ltr:pr-2.5 rtl:pl-3 rtl:pr-4 max-md:rtl:pl-2.5 max-md:rtl:pr-2.5">
            <span v-text="applied.pagination.perPage"></span>

            <span class="icon-arrow-down text-2xl"></span>
        </button>
     <?php $__env->endSlot(); ?>

     <?php $__env->slot('menu', null, ['class' => 'max-md:!py-0']); ?> 
        <?php if (isset($component)) { $__componentOriginalb61dc971083484c78229c771be09733d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb61dc971083484c78229c771be09733d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.dropdown.menu.item','data' => ['vFor' => 'perPageOption in available.meta.per_page_options','vText' => 'perPageOption','@click' => 'changePerPageOption(perPageOption)']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::dropdown.menu.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['v-for' => 'perPageOption in available.meta.per_page_options','v-text' => 'perPageOption','@click' => 'changePerPageOption(perPageOption)']); ?>
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
<?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Shop\src/resources/views/components/datagrid/toolbar/pagination.blade.php ENDPATH**/ ?>