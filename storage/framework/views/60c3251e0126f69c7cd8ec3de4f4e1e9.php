<div class="grid grid-cols-1 gap-6">
    <div class="flex gap-3">
        <span class="icon-calendar text-2xl"></span>

        <div class="grid grid-cols-1 gap-1.5 text-sm font-medium">
            <p class="text-[#6E6E6E]">
                <?php echo app('translator')->get('shop::app.products.view.type.booking.table.slot-duration'); ?> :
            </p>

            <div>
                <?php echo app('translator')->get('shop::app.products.view.type.booking.table.slot-duration-in-minutes', ['minutes' => $bookingProduct->table_slot->duration]); ?>
            </div>
        </div>
    </div>

    <?php $bookingSlotHelper = app('Webkul\BookingProduct\Helpers\TableSlot'); ?>

    <div class="flex gap-3">
        <span class="icon-calendar text-2xl"></span>

        <div class="grid grid-cols-1 gap-4">
            <div class="grid grid-cols-1 gap-1.5 text-sm font-medium">
                <p class="text-[#6E6E6E]">
                    <?php echo app('translator')->get('shop::app.products.view.type.booking.table.today-availability'); ?>
                </p>
    
                <span>
                    <?php echo $bookingSlotHelper->getTodaySlotsHtml($bookingProduct); ?>

                </span>
            </div>

            <!-- Toggler Vue Component -->
            <v-toggler></v-toggler>
        </div>
    </div>

    <?php echo $__env->make('shop::products.view.types.booking.slots', [
        'bookingProduct' => $bookingProduct, 
        'title' => trans('shop::app.products.view.type.booking.table.book-a-table')
    ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- Notes -->
    <?php if (isset($component)) { $__componentOriginal578beb4bb944f523450535628cf00b41 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal578beb4bb944f523450535628cf00b41 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.form.control-group.index','data' => ['class' => '!mb-0 w-full']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::form.control-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => '!mb-0 w-full']); ?>
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
            <?php echo app('translator')->get('shop::app.products.view.type.booking.table.special-notes'); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.form.control-group.control','data' => ['type' => 'textarea','class' => '!mb-0 max-sm:px-2.5 max-sm:py-1.5 max-sm:text-xs','name' => 'booking[note]','rules' => 'required','label' => trans('shop::app.products.view.type.booking.table.special-notes'),'placeholder' => trans('shop::app.products.view.type.booking.table.special-notes')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'textarea','class' => '!mb-0 max-sm:px-2.5 max-sm:py-1.5 max-sm:text-xs','name' => 'booking[note]','rules' => 'required','label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('shop::app.products.view.type.booking.table.special-notes')),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('shop::app.products.view.type.booking.table.special-notes'))]); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.form.control-group.error','data' => ['controlName' => 'booking[note]']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::form.control-group.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['control-name' => 'booking[note]']); ?>
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
</div>

<?php if (! $__env->hasRenderedOnce('a81eaad2-2a18-433c-b603-1e1d6fe7b8d2')): $__env->markAsRenderedOnce('a81eaad2-2a18-433c-b603-1e1d6fe7b8d2');
$__env->startPush('scripts'); ?>
    <script
        type="text/x-template"
        id="v-toggler-template"
    >
        <div class="grid w-max select-none gap-3">
            <!-- Details Toggler -->
            <p
                class="flex cursor-pointer items-center gap-x-[15px] text-sm font-medium text-blue-600"
                @click="showDaysAvailability = ! showDaysAvailability"
            >
                <?php echo app('translator')->get('shop::app.products.view.type.booking.table.slots-for-all-days'); ?>

                <span
                    class="text-xl font-bold"
                    :class="{'icon-arrow-up': showDaysAvailability, 'icon-arrow-down': ! showDaysAvailability}"
                >
                </span>
            </p>

            <!-- Option Details -->
            <div
                class="grid grid-cols-2 gap-3"
                v-show="showDaysAvailability"
                v-for="day in days"
            >
                <p
                    class="text-gray text-sm font-medium"
                    v-text="day.name"
                >
                </p>

                <p class="text-sm text-gray-600">
                    <template v-if="day.slots && day.slots?.length">
                        <div v-for="slot in day.slots">
                            {{ slot.from }} - {{ slot.to }}
                        </div>
                    </template>

                    <div v-else>
                        <?php echo app('translator')->get('shop::app.products.view.type.booking.table.closed'); ?>
                    </div>
                </p>
            </div>
        </div>
    </script>

    <script type="module">
        app.component('v-toggler', {
            template: '#v-toggler-template',

            data() {
                return{
                    showDaysAvailability: '',

                    days: <?php echo json_encode($bookingSlotHelper->getWeekSlotDurations($bookingProduct), 15, 512) ?>,
                }
            },
        })
    </script>
<?php $__env->stopPush(); endif; ?><?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Shop\src\Resources\views\products\view\types\booking\table.blade.php ENDPATH**/ ?>