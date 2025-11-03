<?php echo view_render_event('bagisto.admin.sales.order.create.types.simple.before'); ?>


<v-simple-product-customizable-options
    :errors="errors"
    :product-options="selectedProductOptions"
></v-simple-product-customizable-options>

<?php echo view_render_event('bagisto.admin.sales.order.create.types.simple.after'); ?>


<?php if (! $__env->hasRenderedOnce('8bfb4279-4e00-46ce-884f-686a75875f8f')): $__env->markAsRenderedOnce('8bfb4279-4e00-46ce-884f-686a75875f8f');
$__env->startPush('scripts'); ?>
    <script
        type="text/x-template"
        id="v-simple-product-customizable-options-template"
    >
        <div class="">
            <v-simple-product-customizable-option-item
                :key="index"
                :option="option"
                v-for="(option, index) in options"
                @priceUpdated="priceUpdated"
            >
            </v-simple-product-customizable-option-item>

            <div class="p-4">
                <div class="my-5 flex items-center justify-between">
                    <p class="text-sm dark:text-white">
                        <?php echo app('translator')->get('admin::app.sales.orders.create.types.simple.total-amount'); ?>
                    </p>

                    <p class="text-lg font-medium dark:text-white">
                        {{ formattedTotalPrice }}
                    </p>
                </div>
            </div>
        </div>
    </script>

    <script
        type="text/x-template"
        id="v-simple-product-customizable-option-item-template"
    >
        <div class="border-b border-[#E9E9E9] p-4">
            <?php if (isset($component)) { $__componentOriginal7b1bc76a00ab5e7f1bf2c6429dae85a3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7b1bc76a00ab5e7f1bf2c6429dae85a3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <!-- Text Options -->
                <template v-if="option.type == 'text'">
                    <?php if (isset($component)) { $__componentOriginal8378211f70f8c39b16d47cecdac9c7c8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8378211f70f8c39b16d47cecdac9c7c8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.label','data' => ['class' => '!mt-0',':class' => '{ \'required\': Boolean(option.is_required) }']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => '!mt-0',':class' => '{ \'required\': Boolean(option.is_required) }']); ?>
                        {{ option.label }}

                        <span class="text-black">
                            {{ '+ ' + $admin.formatPrice(option.price) }}
                        </span>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.control','data' => ['type' => 'text',':name' => '\'customizable_options[\' + option.id + \'][]\'',':value' => 'option.id','vModel' => 'selectedItems',':rules' => '{ \'required\': Boolean(option.is_required), \'max\': option.max_characters }',':label' => 'option.label']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text',':name' => '\'customizable_options[\' + option.id + \'][]\'',':value' => 'option.id','v-model' => 'selectedItems',':rules' => '{ \'required\': Boolean(option.is_required), \'max\': option.max_characters }',':label' => 'option.label']); ?>
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
                </template>

                <!-- Textarea Options -->
                <template v-else-if="option.type == 'textarea'">
                    <?php if (isset($component)) { $__componentOriginal8378211f70f8c39b16d47cecdac9c7c8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8378211f70f8c39b16d47cecdac9c7c8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.label','data' => ['class' => '!mt-0',':class' => '{ \'required\': Boolean(option.is_required) }']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => '!mt-0',':class' => '{ \'required\': Boolean(option.is_required) }']); ?>
                        {{ option.label }}

                        <span class="text-black">
                            {{ '+ ' + $admin.formatPrice(option.price) }}
                        </span>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.control','data' => ['type' => 'textarea',':name' => '\'customizable_options[\' + option.id + \'][]\'',':value' => 'option.id','vModel' => 'selectedItems',':rules' => '{ \'required\': Boolean(option.is_required), \'max\': option.max_characters }',':label' => 'option.label']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'textarea',':name' => '\'customizable_options[\' + option.id + \'][]\'',':value' => 'option.id','v-model' => 'selectedItems',':rules' => '{ \'required\': Boolean(option.is_required), \'max\': option.max_characters }',':label' => 'option.label']); ?>
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
                </template>

                <!-- Checkbox Options -->
                <template v-else-if="option.type == 'checkbox'">
                    <?php if (isset($component)) { $__componentOriginal8378211f70f8c39b16d47cecdac9c7c8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8378211f70f8c39b16d47cecdac9c7c8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.label','data' => ['class' => '!mt-0',':class' => '{ \'required\': Boolean(option.is_required) }']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => '!mt-0',':class' => '{ \'required\': Boolean(option.is_required) }']); ?>
                        {{ option.label }}
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

                    <div class="grid gap-2">
                        <!-- Options -->
                        <div
                            class="flex select-none items-center gap-x-4"
                            v-for="(item, index) in optionItems"
                        >
                            <?php if (isset($component)) { $__componentOriginal53af403f6b2179a3039d488b8ab2a267 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53af403f6b2179a3039d488b8ab2a267 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.control','data' => ['type' => 'checkbox',':name' => '\'customizable_options[\' + option.id + \'][]\'',':value' => 'item.id',':for' => '\'customizable_options[\' + option.id + \'][\' + index + \']\'',':id' => '\'customizable_options[\' + option.id + \'][\' + index + \']\'','vModel' => 'selectedItems',':rules' => '{ \'required\': Boolean(option.is_required) }',':label' => 'option.label']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'checkbox',':name' => '\'customizable_options[\' + option.id + \'][]\'',':value' => 'item.id',':for' => '\'customizable_options[\' + option.id + \'][\' + index + \']\'',':id' => '\'customizable_options[\' + option.id + \'][\' + index + \']\'','v-model' => 'selectedItems',':rules' => '{ \'required\': Boolean(option.is_required) }',':label' => 'option.label']); ?>
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

                            <label
                                class="cursor-pointer text-sm text-[#6E6E6E] dark:text-gray-300"
                                :for="'customizable_options[' + option.id + '][' + index + ']'"
                            >
                                {{ item.label }}

                                <span class="text-black dark:text-white">
                                    {{ '+ ' + $admin.formatPrice(item.price) }}
                                </span>
                            </label>
                        </div>
                    </div>
                </template>

                <!-- Radio Options -->
                <template v-else-if="option.type == 'radio'">
                    <?php if (isset($component)) { $__componentOriginal8378211f70f8c39b16d47cecdac9c7c8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8378211f70f8c39b16d47cecdac9c7c8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.label','data' => ['class' => '!mt-0',':class' => '{ \'required\': Boolean(option.is_required) }']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => '!mt-0',':class' => '{ \'required\': Boolean(option.is_required) }']); ?>
                        {{ option.label }}
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

                    <div class="grid gap-2">
                        <!-- "None" radio option for cases where the option is not required. -->
                        <div
                            class="flex select-none gap-x-4"
                            v-if="! Boolean(option.is_required)"
                        >
                            <?php if (isset($component)) { $__componentOriginal53af403f6b2179a3039d488b8ab2a267 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53af403f6b2179a3039d488b8ab2a267 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.control','data' => ['type' => 'radio',':name' => '\'customizable_options[\' + option.id + \'][]\'','value' => '0',':for' => '\'customizable_options[\' + option.id + \'][\' + index + \']\'',':id' => '\'customizable_options[\' + option.id + \'][\' + index + \']\'','vModel' => 'selectedItems',':rules' => '{ \'required\': Boolean(option.is_required) }',':label' => 'option.label',':checked' => 'true']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'radio',':name' => '\'customizable_options[\' + option.id + \'][]\'','value' => '0',':for' => '\'customizable_options[\' + option.id + \'][\' + index + \']\'',':id' => '\'customizable_options[\' + option.id + \'][\' + index + \']\'','v-model' => 'selectedItems',':rules' => '{ \'required\': Boolean(option.is_required) }',':label' => 'option.label',':checked' => 'true']); ?>
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

                            <label
                                class="cursor-pointer text-sm text-[#6E6E6E] dark:text-gray-300"
                                :for="'customizable_options[' + option.id + '][' + index + ']'"
                            >
                                <?php echo app('translator')->get('admin::app.sales.orders.create.types.simple.none'); ?>
                            </label>
                        </div>

                        <!-- Options -->
                        <div
                            class="flex select-none items-center gap-x-4"
                            v-for="(item, index) in optionItems"
                        >
                            <?php if (isset($component)) { $__componentOriginal53af403f6b2179a3039d488b8ab2a267 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53af403f6b2179a3039d488b8ab2a267 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.control','data' => ['type' => 'radio',':name' => '\'customizable_options[\' + option.id + \'][]\'',':value' => 'item.id',':for' => '\'customizable_options[\' + option.id + \'][\' + index + \']\'',':id' => '\'customizable_options[\' + option.id + \'][\' + index + \']\'','vModel' => 'selectedItems',':rules' => '{ \'required\': Boolean(option.is_required) }',':label' => 'option.label']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'radio',':name' => '\'customizable_options[\' + option.id + \'][]\'',':value' => 'item.id',':for' => '\'customizable_options[\' + option.id + \'][\' + index + \']\'',':id' => '\'customizable_options[\' + option.id + \'][\' + index + \']\'','v-model' => 'selectedItems',':rules' => '{ \'required\': Boolean(option.is_required) }',':label' => 'option.label']); ?>
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

                            <label
                                class="cursor-pointer text-sm text-[#6E6E6E] dark:text-gray-300"
                                :for="'customizable_options[' + option.id + '][' + index + ']'"
                            >
                                {{ item.label }}

                                <span class="text-black dark:text-white">
                                    {{ '+ ' + $admin.formatPrice(item.price) }}
                                </span>
                            </label>
                        </div>
                    </div>
                </template>

                <!-- Select Options -->
                <template v-else-if="option.type == 'select'">
                    <?php if (isset($component)) { $__componentOriginal8378211f70f8c39b16d47cecdac9c7c8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8378211f70f8c39b16d47cecdac9c7c8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.label','data' => ['class' => '!mt-0',':class' => '{ \'required\': Boolean(option.is_required) }']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => '!mt-0',':class' => '{ \'required\': Boolean(option.is_required) }']); ?>
                        {{ option.label }}
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.control','data' => ['type' => 'select',':name' => '\'customizable_options[\' + option.id + \'][]\'','vModel' => 'selectedItems',':rules' => '{ \'required\': Boolean(option.is_required) }',':label' => 'option.label']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'select',':name' => '\'customizable_options[\' + option.id + \'][]\'','v-model' => 'selectedItems',':rules' => '{ \'required\': Boolean(option.is_required) }',':label' => 'option.label']); ?>
                        <!-- "None" select option for cases where the option is not required. -->
                        <option
                            value="0"
                            v-if="! Boolean(option.is_required)"
                        >
                            <?php echo app('translator')->get('admin::app.sales.orders.create.types.simple.none'); ?>
                        </option>

                        <option
                            v-for="item in optionItems"
                            :value="item.id"
                        >
                            {{ item.label + ' + ' + $admin.formatPrice(item.price) }}
                        </option>
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
                </template>

                <!-- Multiselect Options -->
                <template v-else-if="option.type == 'multiselect'">
                    <?php if (isset($component)) { $__componentOriginal8378211f70f8c39b16d47cecdac9c7c8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8378211f70f8c39b16d47cecdac9c7c8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.label','data' => ['class' => '!mt-0',':class' => '{ \'required\': Boolean(option.is_required) }']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => '!mt-0',':class' => '{ \'required\': Boolean(option.is_required) }']); ?>
                        {{ option.label }}
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.control','data' => ['type' => 'multiselect',':name' => '\'customizable_options[\' + option.id + \'][]\'','vModel' => 'selectedItems',':rules' => '{\'required\': Boolean(option.is_required)}',':label' => 'option.label']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'multiselect',':name' => '\'customizable_options[\' + option.id + \'][]\'','v-model' => 'selectedItems',':rules' => '{\'required\': Boolean(option.is_required)}',':label' => 'option.label']); ?>
                        <option
                            v-for="item in optionItems"
                            :value="item.id"
                            :selected="value && value.includes(item.id)"
                        >
                            {{ item.label + ' + ' + $admin.formatPrice(item.price) }}
                        </option>
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
                </template>

                <!-- Date Field -->
                <template v-else-if="option.type == 'date'">
                    <?php if (isset($component)) { $__componentOriginal8378211f70f8c39b16d47cecdac9c7c8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8378211f70f8c39b16d47cecdac9c7c8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.label','data' => ['class' => '!mt-0',':class' => '{ \'required\': Boolean(option.is_required) }']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => '!mt-0',':class' => '{ \'required\': Boolean(option.is_required) }']); ?>
                        {{ option.label }}

                        <span class="text-black">
                            {{ '+ ' + $admin.formatPrice(option.price) }}
                        </span>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.control','data' => ['type' => 'date',':name' => '\'customizable_options[\' + option.id + \'][]\'',':value' => 'option.id','vModel' => 'selectedItems',':rules' => '{\'required\': Boolean(option.is_required)}',':label' => 'option.label']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'date',':name' => '\'customizable_options[\' + option.id + \'][]\'',':value' => 'option.id','v-model' => 'selectedItems',':rules' => '{\'required\': Boolean(option.is_required)}',':label' => 'option.label']); ?>
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
                </template>

                <!-- Datetime Field -->
                <template v-else-if="option.type == 'datetime'">
                    <?php if (isset($component)) { $__componentOriginal8378211f70f8c39b16d47cecdac9c7c8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8378211f70f8c39b16d47cecdac9c7c8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.label','data' => ['class' => '!mt-0',':class' => '{ \'required\': Boolean(option.is_required) }']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => '!mt-0',':class' => '{ \'required\': Boolean(option.is_required) }']); ?>
                        {{ option.label }}

                        <span class="text-black">
                            {{ '+ ' + $admin.formatPrice(option.price) }}
                        </span>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.control','data' => ['type' => 'datetime',':name' => '\'customizable_options[\' + option.id + \'][]\'',':value' => 'option.id','vModel' => 'selectedItems',':rules' => '{\'required\': Boolean(option.is_required)}',':label' => 'option.label']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'datetime',':name' => '\'customizable_options[\' + option.id + \'][]\'',':value' => 'option.id','v-model' => 'selectedItems',':rules' => '{\'required\': Boolean(option.is_required)}',':label' => 'option.label']); ?>
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
                </template>

                <!-- Time Field -->
                <template v-else-if="option.type == 'time'">
                    <?php if (isset($component)) { $__componentOriginal8378211f70f8c39b16d47cecdac9c7c8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8378211f70f8c39b16d47cecdac9c7c8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.label','data' => ['class' => '!mt-0',':class' => '{ \'required\': Boolean(option.is_required) }']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => '!mt-0',':class' => '{ \'required\': Boolean(option.is_required) }']); ?>
                        {{ option.label }}

                        <span class="text-black">
                            {{ '+ ' + $admin.formatPrice(option.price) }}
                        </span>
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

                    <v-field
                        type="time"
                        :name="'customizable_options[' + option.id + '][]'"
                        :value="option.id"
                        v-model="selectedItems"
                        :rules="{'required': Boolean(option.is_required)}"
                        :label="option.label"
                    />
                </template>

                <!-- File -->
                <template v-else-if="option.type == 'file'">
                    <?php if (isset($component)) { $__componentOriginal8378211f70f8c39b16d47cecdac9c7c8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8378211f70f8c39b16d47cecdac9c7c8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.label','data' => ['class' => '!mt-0',':class' => '{ \'required\': Boolean(option.is_required) }']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => '!mt-0',':class' => '{ \'required\': Boolean(option.is_required) }']); ?>
                        {{ option.label }}

                        <span class="text-black">
                            {{ '+ ' + $admin.formatPrice(option.price) }}
                        </span>
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

                    <v-field
                        type="file"
                        :name="'customizable_options[' + option.id + '][]'"
                        :rules="{'required': Boolean(option.is_required), ...(option.supported_file_extensions && option.supported_file_extensions.length ? {'ext': option.supported_file_extensions.split(',').map(ext => ext.trim())} : {})}"
                        :label="option.label"
                        @change="handleFileChange"
                    >
                    </v-field>
                </template>

                <?php if (isset($component)) { $__componentOriginal8da25fb6534e2ef288914e35c32417f8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8da25fb6534e2ef288914e35c32417f8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.error','data' => [':name' => '\'customizable_options[\' + option.id + \'][]\'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([':name' => '\'customizable_options[\' + option.id + \'][]\'']); ?>
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
        </div>
    </script>

    <script type="module">
        app.component('v-simple-product-customizable-options', {
            template: '#v-simple-product-customizable-options-template',

            props: ['errors', 'productOptions'],

            data: function() {
                return {
                    isLoading: false,

                    initialPrice: 0,

                    options: [],

                    prices: [],
                }
            },

            computed: {
                formattedTotalPrice: function() {
                    let totalPrice = parseFloat(this.initialPrice);

                    for (let price of this.prices) {
                        totalPrice += parseFloat(price.price);
                    }

                    return this.$admin.formatPrice(totalPrice);
                }
            },

            mounted() {
                this.getCustomizableOptions();
            },

            methods: {
                getCustomizableOptions() {
                    this.isLoading = true;

                    this.$axios.get("<?php echo e(route('admin.catalog.products.simple.customizable-options', ':replace')); ?>".replace(':replace', this.productOptions.product.id))
                        .then(response => {
                            this.initialPrice = response.data.meta.initial_price;

                            this.options = response.data.data.map((option) => {
                                if (! this.canHaveMultiplePriceOptions(option.type)) {
                                    return {
                                        id: option.id,
                                        label: option.label,
                                        type: option.type,
                                        is_required: option.is_required,
                                        max_characters: option.max_characters,
                                        supported_file_extensions: option.supported_file_extensions,
                                        customizable_option_prices: option.customizable_option_prices,
                                        price_id: option.customizable_option_prices[0].id,
                                        price: option.customizable_option_prices[0].price,
                                    };
                                }

                                return {
                                    id: option.id,
                                    label: option.label,
                                    type: option.type,
                                    is_required: option.is_required,
                                    max_characters: option.max_characters,
                                    supported_file_extensions: option.supported_file_extensions,
                                    customizable_option_prices: option.customizable_option_prices,
                                    price: 0,
                                };
                            });

                            this.prices = this.options.map((option) => {
                                return {
                                    option_id: option.id,
                                    price: 0,
                                };
                            });

                            this.isLoading = false;
                        })
                        .catch(error => {});
                },

                priceUpdated({ option, totalPrice }) {
                    let price = this.prices.find(price => price.option_id === option.id);

                    price.price = totalPrice;
                },

                canHaveMultiplePriceOptions(type) {
                    return ['checkbox', 'radio', 'select', 'multiselect'].includes(type);
                },
            }
        });

        app.component('v-simple-product-customizable-option-item', {
            template: '#v-simple-product-customizable-option-item-template',

            emits: ['priceUpdated'],

            props: ['option'],

            data: function() {
                return {
                    optionItems: [],

                    selectedItems: this.canHaveMultiplePrices()  ? [] : null,
                };
            },

            mounted() {
                if (! this.option.customizable_option_prices) {
                    return;
                }

                this.optionItems = this.option.customizable_option_prices.map(optionItem => {
                    return {
                        id: optionItem.id,
                        label: optionItem.label,
                        price: optionItem.price,
                    };
                });
            },

            watch: {
                selectedItems: function (value) {
                    let selectedItemValues = Array.isArray(value) ? value : [value];

                    let totalPrice = 0;

                    for (let item of this.optionItems) {
                        switch (this.option.type) {
                            case 'text':
                            case 'textarea':
                            case 'date':
                            case 'datetime':
                            case 'time':
                                if (selectedItemValues[0].length > 0) {
                                    totalPrice += parseFloat(item.price);
                                }

                                break;

                            case 'checkbox':
                            case 'radio':
                            case 'select':
                            case 'multiselect':
                                if (selectedItemValues.includes(item.id)) {
                                    totalPrice += parseFloat(item.price);
                                }

                            case 'file':
                                if (selectedItemValues[0] instanceof File) {
                                    totalPrice += parseFloat(item.price);
                                }

                                break;
                        }
                    }

                    this.$emit('priceUpdated', {
                        option: this.option,

                        totalPrice,
                    });
                },
            },

            methods: {
                canHaveMultiplePrices() {
                    return ['checkbox', 'multiselect'].includes(this.option.type);
                },

                handleFileChange($event) {
                    const selectedFiles = event.target.files;

                    this.selectedItems = selectedFiles[0];
                },
            },
        });
    </script>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Admin\src\Resources\views\sales\orders\create\types\simple.blade.php ENDPATH**/ ?>