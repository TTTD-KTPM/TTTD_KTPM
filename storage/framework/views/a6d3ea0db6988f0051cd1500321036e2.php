<?php if (! $__env->hasRenderedOnce('34f64d90-b5e6-4d9a-ae66-96d34ea7a231')): $__env->markAsRenderedOnce('34f64d90-b5e6-4d9a-ae66-96d34ea7a231');
$__env->startPush('scripts'); ?>
    <script
        type="text/x-template"
        id="v-slots-template"
    >
        <div class="flex items-center justify-between gap-5 py-2">
            <div class="flex flex-col gap-1">
                <p class="text-base font-semibold text-gray-800 dark:text-white">
                    <?php echo app('translator')->get('admin::app.catalog.products.edit.types.booking.slots.title'); ?>
                </p>

                <p class="text-xs font-medium text-gray-500 dark:text-gray-300">
                    <?php echo app('translator')->get('admin::app.catalog.products.edit.types.booking.slots.description-info'); ?>
                </p>
            </div>

            <!-- Add Slots Button -->
            <div
                class="flex items-center gap-x-1"
                v-if="parseInt(sameSlotAllDays)"
            >
                <div
                    class="secondary-button"
                    @click="toggle()"
                >
                    <?php echo app('translator')->get('admin::app.catalog.products.edit.types.booking.slots.add'); ?>
                </div>
            </div>
        </div>

        <!-- Table Information -->
        <div class="overflow-x-auto">
            <!-- For Same Slot All Days -->
            <template v-if="parseInt(bookingProduct.same_slot_all_days)">
                <template v-if="slots['same_for_week'].length || Object.keys(slots['same_for_week']).length">
                    <div class="flex flex-wrap gap-x-2.5">
                        <div
                            class="flex min-h-[38px] flex-wrap items-center gap-1 dark:border-gray-800"
                            v-for="(data, index) in slots['same_for_week']"
                        >
                            <!-- Hidden Inputs -->
                            <input
                                type="hidden"
                                :name="'booking[slots][' + index + '][from]'"
                                :value="data.from"
                            />

                            <input
                                type="hidden"
                                :name="'booking[slots][' + index + '][to]'"
                                :value="data.to"
                            />

                            <!-- Panel Details -->
                            <p class="flex items-center px-2 py-1 font-semibold text-white bg-gray-600 rounded">
                                {{ data.from }} - {{ data.to }}

                                <span
                                    class="icon-cross cursor-pointer text-lg text-white ltr:ml-1.5 rtl:mr-1.5"
                                    @click="removeIndex(index)"
                                >
                                </span>
                            </p>
                        </div>
                    </div>
                </template>

                <template v-else>
                    <!-- For Empty Illustration -->
                    <v-empty-info ::type="bookingType"></v-empty-info>
                </template>
            </template>
            
            <template v-else>
                <div
                    class="grid grid-cols-[0.5fr_2fr] items-center gap-2.5 border-b border-slate-300 py-2 last:border-b-0 dark:border-gray-800"
                    v-for="(day, dayIndex) in week_days"
                >
                    <p
                        class="font-medium dark:text-gray-300"
                        v-text="day"
                    >
                    </p>

                    <div class="flex items-center justify-between grid-cols-2">
                        <div class="flex min-h-[38px] flex-wrap items-center gap-1 dark:border-gray-800">
                            <template
                                v-if="slots['different_for_week'][dayIndex]?.length"
                                v-for="(item, itemIndex) in slots['different_for_week'][dayIndex]"
                            >
                                <!-- Hidden Inputs -->
                                <input
                                    type="hidden"
                                    :name="'booking[slots][' + dayIndex + '][' + itemIndex + '][from]'"
                                    :value="item.from"
                                />

                                <input
                                    type="hidden"
                                    :name="'booking[slots][' + dayIndex + '][' + itemIndex + '][to]'"
                                    :value="item.to"
                                />

                                <!-- Panel Details -->
                                <p class="flex items-center px-2 py-1 font-semibold text-white bg-gray-600 rounded">
                                    {{ item.from }} - {{ item.to }}

                                    <span
                                        class="icon-cross cursor-pointer text-lg text-white ltr:ml-1.5 rtl:mr-1.5"
                                        @click="removeIndex(dayIndex,itemIndex)"
                                    >
                                    </span>
                                </p>    
                            </template>

                            <template v-else>
                                <p class="text-gray-500">
                                    <?php echo app('translator')->get('admin::app.catalog.products.edit.types.booking.slots.unavailable'); ?>
                                </p>
                            </template>
                        </div>

                        <p
                            class="text-right text-blue-600 transition-all cursor-pointer place-content-start hover:underline"
                            @click="currentIndex=dayIndex;toggle()"
                        >
                            <?php echo app('translator')->get('admin::app.catalog.products.edit.types.booking.slots.action.add'); ?>
                        </p>
                    </div>
                </div>
            </template>
        </div>

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
                @submit.prevent="handleSubmit($event, store)"
                enctype="multipart/form-data"
                ref="createOptionsForm"
            >
                <?php if (isset($component)) { $__componentOriginal9bfb526197f1d7304e7fade44c26fbb8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9bfb526197f1d7304e7fade44c26fbb8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.drawer.index','data' => ['ref' => 'drawerForm']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::drawer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['ref' => 'drawerForm']); ?>
                     <?php $__env->slot('header', null, []); ?> 
                        <div class="flex items-center justify-between">
                            <p class="my-2.5 text-xl font-medium dark:text-white">
                                <?php echo app('translator')->get('admin::app.catalog.products.edit.types.booking.slots.title'); ?>
                            </p>

                            <div class="flex items-center gap-4 ltr:mr-11 rtl:ml-11">
                                <!-- Add Slots Button -->
                                <div
                                    class="font-medium text-blue-600 cursor-pointer w-fit dark:text-white"
                                    @click="add"
                                >
                                    <?php echo app('translator')->get('admin::app.catalog.products.edit.types.booking.slots.add'); ?>
                                </div>

                                <!-- Save Button -->
                                <button
                                    type="submit"
                                    class="primary-button"
                                >
                                    <?php echo app('translator')->get('admin::app.catalog.products.edit.types.booking.slots.save'); ?>
                                </button>
                            </div>
                        </div>
                     <?php $__env->endSlot(); ?>

                     <?php $__env->slot('content', null, []); ?> 
                        <template v-if="field['same_for_week']?.length">
                            <div class="flex gap-2.5 pb-2.5 text-gray-800 dark:text-white">
                                <div class="w-full">
                                    <?php echo app('translator')->get('admin::app.catalog.products.edit.types.booking.slots.modal.slot.from'); ?>
                                </div>
                    
                                <div class="w-full">
                                    <?php echo app('translator')->get('admin::app.catalog.products.edit.types.booking.slots.modal.slot.to'); ?>
                                </div>
                            </div>

                            <template v-for="(slot, index) in field['same_for_week']">
                                <v-slot-item
                                    :control-name="'booking[slots][' + index + ']'"
                                    :index="index"
                                    :slot-item="slot"
                                    @onRemoveSlot="remove($event)"
                                />
                            </template>
                        </template>

                        <template v-else-if="field['different_for_week'][currentIndex]?.length">
                            <div class="mx-2.5 flex gap-2.5 pb-2.5 text-gray-800 dark:text-white">
                                <div class="w-full">
                                    <?php echo app('translator')->get('admin::app.catalog.products.edit.types.booking.slots.modal.slot.from'); ?>
                                </div>
                    
                                <div class="w-full">
                                    <?php echo app('translator')->get('admin::app.catalog.products.edit.types.booking.slots.modal.slot.to'); ?>
                                </div>
                            </div>

                            <template v-for="(slot, index) in field['different_for_week'][currentIndex]">
                                <v-slot-item
                                    :control-name="'booking[slots][' + currentIndex + '][' + index + ']'"
                                    :index="currentIndex + '_' + index"
                                    :slot-item="slot"
                                    @onRemoveSlot="remove($event, currentIndex)"
                                />
                            </template>
                        </template>

                        <template v-else>
                            <!-- For Empty Illustration -->
                            <v-empty-info ::type="bookingType"></v-empty-info>
                        </template>
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
    </script>

    <!-- Slot Item Vue Component -->
    <script
        type="text/x-template"
        id="v-slot-item-template"
    >
        <div class="flex gap-2.5">
            <!-- From -->
            <input
                type="hidden"
                :name="controlName + '[id]'"
            />

            <!-- From -->
            <?php if (isset($component)) { $__componentOriginal7b1bc76a00ab5e7f1bf2c6429dae85a3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7b1bc76a00ab5e7f1bf2c6429dae85a3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.index','data' => ['class' => 'w-full']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-full']); ?>
                <?php if (isset($component)) { $__componentOriginal8378211f70f8c39b16d47cecdac9c7c8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8378211f70f8c39b16d47cecdac9c7c8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.label','data' => ['class' => 'hidden']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'hidden']); ?>
                    <?php echo app('translator')->get('admin::app.catalog.products.edit.types.booking.slots.modal.slot.from'); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.control','data' => ['type' => 'time',':id' => 'controlName + \'[from]\'',':name' => 'controlName + \'[from]\'','rules' => 'required','label' => trans('admin::app.catalog.products.edit.types.booking.slots.modal.slot.from'),'placeholder' => trans('admin::app.catalog.products.edit.types.booking.slots.modal.slot.from')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'time',':id' => 'controlName + \'[from]\'',':name' => 'controlName + \'[from]\'','rules' => 'required','label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('admin::app.catalog.products.edit.types.booking.slots.modal.slot.from')),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('admin::app.catalog.products.edit.types.booking.slots.modal.slot.from'))]); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.error','data' => [':controlName' => 'controlName + \'[from]\'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([':control-name' => 'controlName + \'[from]\'']); ?>
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

            <!-- To -->
            <?php if (isset($component)) { $__componentOriginal7b1bc76a00ab5e7f1bf2c6429dae85a3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7b1bc76a00ab5e7f1bf2c6429dae85a3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.index','data' => ['class' => 'w-full']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-full']); ?>
                <?php if (isset($component)) { $__componentOriginal8378211f70f8c39b16d47cecdac9c7c8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8378211f70f8c39b16d47cecdac9c7c8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.label','data' => ['class' => 'hidden']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'hidden']); ?>
                    <?php echo app('translator')->get('admin::app.catalog.products.edit.types.booking.slots.modal.slot.to'); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.control','data' => ['type' => 'time',':id' => 'controlName + \'[to]\'',':name' => 'controlName + \'[to]\'','rules' => 'required','label' => trans('admin::app.catalog.products.edit.types.booking.slots.modal.slot.to'),'placeholder' => trans('admin::app.catalog.products.edit.types.booking.slots.modal.slot.to')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'time',':id' => 'controlName + \'[to]\'',':name' => 'controlName + \'[to]\'','rules' => 'required','label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('admin::app.catalog.products.edit.types.booking.slots.modal.slot.to')),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('admin::app.catalog.products.edit.types.booking.slots.modal.slot.to'))]); ?>
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

                <!-- Form Avoiding object value in last input field -->
                <?php if (isset($component)) { $__componentOriginal53af403f6b2179a3039d488b8ab2a267 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53af403f6b2179a3039d488b8ab2a267 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.control','data' => ['type' => 'hidden']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'hidden']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.error','data' => [':controlName' => 'controlName + \'[to]\'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([':control-name' => 'controlName + \'[to]\'']); ?>
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

            <!-- Delete Icon -->
            <div
                class="icon-delete w-fit cursor-pointer p-1.5 text-2xl transition-all"
                @click="remove"
            >
            </div>
        </div>
    </script>

    <script type="module">
        app.component('v-slots', {
            template: '#v-slots-template',

            props: ['bookingType', 'bookingProduct', 'sameSlotAllDays'],

            data() {
                return {
                    slots: {
                        'same_for_week': [],
    
                        'different_for_week': [[], [], [], [], [], [], []]
                    },

                    field: {
                        'same_for_week': [],
    
                        'different_for_week': [[], [], [], [], [], [], []]
                    },

                    week_days: [
                        "<?php echo app('translator')->get('admin::app.catalog.products.edit.types.booking.slots.modal.slot.sunday'); ?>",
                        "<?php echo app('translator')->get('admin::app.catalog.products.edit.types.booking.slots.modal.slot.monday'); ?>",
                        "<?php echo app('translator')->get('admin::app.catalog.products.edit.types.booking.slots.modal.slot.tuesday'); ?>",
                        "<?php echo app('translator')->get('admin::app.catalog.products.edit.types.booking.slots.modal.slot.wednesday'); ?>",
                        "<?php echo app('translator')->get('admin::app.catalog.products.edit.types.booking.slots.modal.slot.thursday'); ?>",
                        "<?php echo app('translator')->get('admin::app.catalog.products.edit.types.booking.slots.modal.slot.friday'); ?>",
                        "<?php echo app('translator')->get('admin::app.catalog.products.edit.types.booking.slots.modal.slot.saturday'); ?>"
                    ],

                    currentIndex: '',
                }
            },

            created() {
                if ( ! this.bookingProduct || ! this.bookingProduct.slots) {
                    return;
                }

                const slots = this.bookingProduct.slots;

                if (this.bookingProduct.same_slot_all_days) {
                    this.slots['same_for_week'] = slots ?? this.slots['same_for_week'];
                } else {
                    this.slots['different_for_week'] = Object.values(slots).slice(0, 7);
                }

                this.slots['different_for_week'].forEach((slot, index) => {
                    if (this.slotSpansTwoDays(slot)) {
                        const secondDaySlot = { ...slot, from: '00:00' };
                        
                        this.slots['different_for_week'].splice(index + 1, 0, secondDaySlot);
                        
                        index++;
                    }
                });

                if (slots.length > 7) {
                    this.slots['different_for_week'] = this.slots['different_for_week'].concat(slots.slice(7));
                }
            },

            methods: {
                slotSpansTwoDays(slot) {
                    if (slot.length) {
                        slot.forEach(element => {
                            const from = element['from'].split(':');

                            const to = element['to'].split(':');

                            return parseInt(from) > parseInt(to);
                        });
                    }
                },

                add() {
                    if (parseInt(this.sameSlotAllDays)) {
                        this.field['same_for_week'].push({
                            'from': '',
                            'to': '',
                        });
                    } else {
                        this.field['different_for_week'][this.currentIndex].push({
                            'id': '',
                            'from': '',
                            'to': '',
                        });
                    }
                },

                remove(slot, dayIndex = null) {
                    if (dayIndex != null) {
                        let index = this.field['different_for_week'][dayIndex].indexOf(slot)
    
                        this.field['different_for_week'][dayIndex].splice(index, 1)
                    } else {
                        let index = this.field['same_for_week'].indexOf(slot)
    
                        this.field['same_for_week'].splice(index, 1)
                    }
                },

                store(params) {
                    let formDataObj = {};

                    let formData = new FormData(this.$refs.createOptionsForm);

                    formData.forEach((value, key) => (formDataObj[key] = value));

                    this.slotData(formDataObj);
                },

                slotData(params) {
                    const slotType = parseInt(this.sameSlotAllDays) ? 'same_for_week' : 'different_for_week';

                    const slotCount = Object.keys(params).length / 3;

                    for (let i = 0; i < slotCount; i++) {
                        const fromKey = parseInt(this.sameSlotAllDays) ? `booking[slots][${i}][from]` : `booking[slots][${this.currentIndex}][${i}][from]`;
                        const toKey = parseInt(this.sameSlotAllDays) ? `booking[slots][${i}][to]` : `booking[slots][${this.currentIndex}][${i}][to]`;

                        this.insertTimeSlot(slotType, params[fromKey], params[toKey], i + 1);
                    }

                    Object.keys(this.slots[slotType]).forEach((key, index) => {
                        this.slots[slotType][key].id = index + 1;
                    });

                    this.toggle();
                },

                insertTimeSlot(key, fromValue, toValue, id) {
                    if (! fromValue || ! toValue) return;
                    
                    if (! this.isValidSlot(fromValue, toValue)) return;
                    
                    const slot = { id, to: toValue, from: fromValue };

                    let existingSlots = key === 'same_for_week'
                        ? Object.values(this.slots[key] || [])
                        : this.slots[key][this.currentIndex] || [];

                    if (this.isOverlapping(slot, existingSlots)) {
                        this.$emitter.emit('add-flash', {
                            type: 'error',
                            message: "<?php echo app('translator')->get('admin::app.catalog.products.edit.types.booking.validations.overlap-validation'); ?>",
                        });
                        
                        return;
                    }

                    if (key === 'same_for_week') {
                        this.slots[key] = this.slots[key] || {};

                        const nextIndex = Object.keys(this.slots[key]).length 
                            ? Math.max(...Object.keys(this.slots[key]).map(Number)) + 1 
                            : 0;

                        this.slots[key][nextIndex] = slot;
                    } else {
                        this.slots[key][this.currentIndex] = this.slots[key][this.currentIndex] || [];

                        this.slots[key][this.currentIndex].push(slot);
                    }
                },

                removeIndex(dayIndex, timeIndex) {
                    this.$emitter.emit('open-confirm-modal', {
                        agree: () => {
                            if (parseInt(this.sameSlotAllDays)) {
                                this.slots['same_for_week'].splice(dayIndex, 1);
                            } else {
                                this.slots['different_for_week'][dayIndex].splice(timeIndex, 1);
                            }
                        },
                    });
                },

                toggle() {
                    this.field['same_for_week'] = [];

                    this.field['different_for_week'] = [[], [], [], [], [], [], []];

                    this.add();

                    this.$refs.drawerForm.toggle();
                },

                isValidSlot(from, to) {
                    if (from >= to) {
                        this.$emitter.emit('add-flash', {
                            type: 'error',
                            message: "<?php echo app('translator')->get('admin::app.catalog.products.edit.types.booking.validations.time-validation'); ?>",
                        });
                        
                        return false;
                    }
                    
                    return true;
                },

                isOverlapping(newSlot, existingSlots) {
                    return existingSlots.some(s => {
                        return (newSlot.from < s.to && newSlot.to > s.from);
                    });
                },
            },
        });

        app.component('v-slot-item', {
            template: '#v-slot-item-template',
    
            props: ['controlName', 'slotItem'],

            methods: {
                remove() {
                    this.$emit('onRemoveSlot', this.slotItem)
                },
            }
        });
    </script>
<?php $__env->stopPush(); endif; ?><?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Admin\src\Resources\views\catalog\products\edit\types\booking\slots.blade.php ENDPATH**/ ?>