<?php echo view_render_event('bagisto.shop.checkout.onepage.address.before'); ?>


<!-- Accordion Blade Component -->
<?php if (isset($component)) { $__componentOriginald3ba50c765d00f082351f5b73fecce50 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald3ba50c765d00f082351f5b73fecce50 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.accordion.index','data' => ['class' => 'mb-7 mt-8 overflow-hidden rounded-xl !border-b-0 max-md:mb-0 max-md:mt-0 max-md:rounded-lg max-md:!border-none max-md:!bg-gray-100']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::accordion'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mb-7 mt-8 overflow-hidden rounded-xl !border-b-0 max-md:mb-0 max-md:mt-0 max-md:rounded-lg max-md:!border-none max-md:!bg-gray-100']); ?>
    <!-- Accordion Header Component Slot -->
     <?php $__env->slot('header', null, ['class' => '!p-0 max-md:!mb-0 max-md:rounded-t-md max-md:!p-3 max-md:text-sm max-md:font-medium max-sm:!p-2']); ?> 
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-medium max-md:text-base">
                <?php echo app('translator')->get('shop::app.checkout.onepage.address.title'); ?>
            </h2>
        </div>
     <?php $__env->endSlot(); ?>

    <!-- Accordion Content Component Slot -->
     <?php $__env->slot('content', null, ['class' => 'mt-8 !p-0 max-md:mt-0 max-md:rounded-t-none max-md:border max-md:border-t-0 max-md:!p-4']); ?> 
        <!-- If the customer is guest -->
        <template v-if="cart.is_guest">
            <?php echo $__env->make('shop::checkout.onepage.address.guest', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </template>

        <!-- If the customer is logged in -->
        <template v-else>
            <?php echo $__env->make('shop::checkout.onepage.address.customer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </template>
     <?php $__env->endSlot(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald3ba50c765d00f082351f5b73fecce50)): ?>
<?php $attributes = $__attributesOriginald3ba50c765d00f082351f5b73fecce50; ?>
<?php unset($__attributesOriginald3ba50c765d00f082351f5b73fecce50); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald3ba50c765d00f082351f5b73fecce50)): ?>
<?php $component = $__componentOriginald3ba50c765d00f082351f5b73fecce50; ?>
<?php unset($__componentOriginald3ba50c765d00f082351f5b73fecce50); ?>
<?php endif; ?>

<?php echo view_render_event('bagisto.shop.checkout.onepage.address.after'); ?><?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Shop\src\Resources\views\checkout\onepage\address.blade.php ENDPATH**/ ?>