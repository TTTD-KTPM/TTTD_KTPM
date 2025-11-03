<?php switch($attribute->type):
    case ('text'): ?>
        <v-field
            type="text"
            name="<?php echo e($attribute->code); ?>"
            :rules="<?php echo e($attribute->validations); ?>"
            value="<?php echo e(old($attribute->code) ?: $product[$attribute->code]); ?>"
            v-slot="{ field }"
            label="<?php echo e($attribute->admin_name); ?>"
        >
            <input
                type="text"
                id="<?php echo e($attribute->code); ?>"
                :class="[errors['<?php echo e($attribute->code); ?>'] ? 'border border-red-600 hover:border-red-600' : '']"
                class="w-full rounded-md border px-3 py-2.5 text-sm text-gray-600 transition-all hover:border-gray-400 focus:border-gray-400 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300 dark:hover:border-gray-400 dark:focus:border-gray-400"
                name="<?php echo e($attribute->code); ?>"
                v-bind="field"
                <?php if($attribute->code == 'url_key'): ?> v-slugify <?php endif; ?>
                <?php if($attribute->code == 'name'): ?> v-slugify-target:url_key="setValues" <?php endif; ?>
            >
        </v-field>

        <?php break; ?>
    <?php case ('price'): ?>
        <?php if (isset($component)) { $__componentOriginal53af403f6b2179a3039d488b8ab2a267 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53af403f6b2179a3039d488b8ab2a267 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.control','data' => ['type' => 'price','id' => $attribute->code,'class' => ($attribute->code == 'price' ? 'py-2.5 bg-gray-50 text-xl font-bold' : ''),'name' => $attribute->code,':rules' => ''.e($attribute->validations).'','value' => ''.e(old($attribute->code) ?: $product[$attribute->code]).'','label' => $attribute->admin_name]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'price','id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attribute->code),'class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(($attribute->code == 'price' ? 'py-2.5 bg-gray-50 text-xl font-bold' : '')),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attribute->code),':rules' => ''.e($attribute->validations).'','value' => ''.e(old($attribute->code) ?: $product[$attribute->code]).'','label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attribute->admin_name)]); ?>
             <?php $__env->slot('currency', null, ['class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('dark:text-gray-300 ' . ($attribute->code == 'price' ? 'bg-gray-50 dark:bg-gray-900 text-xl' : ''))]); ?> 
                <?php echo e(core()->currencySymbol(core()->getBaseCurrencyCode())); ?>

             <?php $__env->endSlot(); ?>
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

        <?php break; ?>
    <?php case ('textarea'): ?>
        <?php if (isset($component)) { $__componentOriginal53af403f6b2179a3039d488b8ab2a267 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53af403f6b2179a3039d488b8ab2a267 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.control','data' => ['type' => 'textarea','id' => $attribute->code,'name' => $attribute->code,':rules' => ''.e($attribute->validations).'','value' => ''.e(old($attribute->code) ?: $product[$attribute->code]).'','label' => $attribute->admin_name,'tinymce' => (bool) $attribute->enable_wysiwyg,'prompt' => core()->getConfigData('general.magic_ai.content_generation.product_' . $attribute->code . '_prompt')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'textarea','id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attribute->code),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attribute->code),':rules' => ''.e($attribute->validations).'','value' => ''.e(old($attribute->code) ?: $product[$attribute->code]).'','label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attribute->admin_name),'tinymce' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute((bool) $attribute->enable_wysiwyg),'prompt' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(core()->getConfigData('general.magic_ai.content_generation.product_' . $attribute->code . '_prompt'))]); ?>
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

        <?php break; ?>
    <?php case ('date'): ?>
        <?php if (isset($component)) { $__componentOriginal53af403f6b2179a3039d488b8ab2a267 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53af403f6b2179a3039d488b8ab2a267 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.control','data' => ['type' => 'date','id' => $attribute->code,'name' => $attribute->code,':rules' => ''.e($attribute->validations).'','value' => ''.e(old($attribute->code) ?: $product[$attribute->code]).'','label' => $attribute->admin_name]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'date','id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attribute->code),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attribute->code),':rules' => ''.e($attribute->validations).'','value' => ''.e(old($attribute->code) ?: $product[$attribute->code]).'','label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attribute->admin_name)]); ?>
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

        <?php break; ?>
    <?php case ('datetime'): ?>
        <?php if (isset($component)) { $__componentOriginal53af403f6b2179a3039d488b8ab2a267 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53af403f6b2179a3039d488b8ab2a267 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.control','data' => ['type' => 'datetime','name' => $attribute->code,':rules' => ''.e($attribute->validations).'','value' => ''.e(old($attribute->code) ?: $product[$attribute->code]).'','label' => $attribute->admin_name]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'datetime','name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attribute->code),':rules' => ''.e($attribute->validations).'','value' => ''.e(old($attribute->code) ?: $product[$attribute->code]).'','label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attribute->admin_name)]); ?>
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

        <?php break; ?>
    <?php case ('select'): ?>
        <?php if (isset($component)) { $__componentOriginal53af403f6b2179a3039d488b8ab2a267 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53af403f6b2179a3039d488b8ab2a267 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.control','data' => ['type' => 'select','id' => $attribute->code,'name' => $attribute->code,':rules' => ''.e($attribute->validations).'','value' => old($attribute->code) ?: $product[$attribute->code],'label' => $attribute->admin_name]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'select','id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attribute->code),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attribute->code),':rules' => ''.e($attribute->validations).'','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old($attribute->code) ?: $product[$attribute->code]),'label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attribute->admin_name)]); ?>
            <?php
                $selectedOption = old($attribute->code) ?: $product[$attribute->code];

                if ($attribute->code != 'tax_category_id') {
                    $options = $attribute->options()->orderBy('sort_order')->get();
                } else {
                    $options = app('Webkul\Tax\Repositories\TaxCategoryRepository')->all();
                }
            ?>

            <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option
                    value="<?php echo e($option->id); ?>"
                    <?php echo e($selectedOption == $option->id ? 'selected' : ''); ?>

                >
                    <?php echo e($option->admin_name ?? $option->name); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

        <?php break; ?>
    <?php case ('multiselect'): ?>
        <?php
            $selectedOption = old($attribute->code) ?: explode(',', $product[$attribute->code]);
        ?>

        <?php if (isset($component)) { $__componentOriginal53af403f6b2179a3039d488b8ab2a267 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53af403f6b2179a3039d488b8ab2a267 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.control','data' => ['type' => 'multiselect','id' => $attribute->code . '[]','name' => $attribute->code . '[]',':rules' => ''.e($attribute->validations).'','label' => $attribute->admin_name]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'multiselect','id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attribute->code . '[]'),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attribute->code . '[]'),':rules' => ''.e($attribute->validations).'','label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attribute->admin_name)]); ?>
            <?php $__currentLoopData = $attribute->options()->orderBy('sort_order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option
                    value="<?php echo e($option->id); ?>"
                    <?php echo e(in_array($option->id, $selectedOption) ? 'selected' : ''); ?>

                >
                    <?php echo e($option->admin_name); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

        <?php break; ?>
    <?php case ('checkbox'): ?>
        <?php
            $selectedOption = old($attribute->code) ?: explode(',', $product[$attribute->code]);
        ?>

        <?php $__currentLoopData = $attribute->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="mb-2 flex items-center gap-2.5 last:!mb-0">
                <?php if (isset($component)) { $__componentOriginal53af403f6b2179a3039d488b8ab2a267 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53af403f6b2179a3039d488b8ab2a267 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.control','data' => ['type' => 'checkbox','id' => $attribute->code . '_' . $option->id,'name' => $attribute->code . '[]',':rules' => ''.e($attribute->validations).'','value' => $option->id,'for' => $attribute->code . '_' . $option->id,'label' => $attribute->admin_name,'checked' => in_array($option->id, $selectedOption)]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'checkbox','id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attribute->code . '_' . $option->id),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attribute->code . '[]'),':rules' => ''.e($attribute->validations).'','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($option->id),'for' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attribute->code . '_' . $option->id),'label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attribute->admin_name),'checked' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(in_array($option->id, $selectedOption))]); ?>
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
                    class="cursor-pointer select-none text-xs font-medium text-gray-600 dark:text-gray-300"
                    for="<?php echo e($attribute->code . '_' . $option->id); ?>"
                >
                    <?php echo e($option->admin_name); ?>

                </label>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php break; ?>
    <?php case ('boolean'): ?>
        <?php $selectedValue = old($attribute->code) ?: $product[$attribute->code] ?>

        <?php if (isset($component)) { $__componentOriginal53af403f6b2179a3039d488b8ab2a267 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53af403f6b2179a3039d488b8ab2a267 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.control','data' => ['type' => 'switch','id' => $attribute->code,'name' => $attribute->code,'value' => 1,'label' => $attribute->admin_name,'checked' => (boolean) $selectedValue]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'switch','id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attribute->code),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attribute->code),'value' => 1,'label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attribute->admin_name),'checked' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute((boolean) $selectedValue)]); ?>
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

        <?php break; ?>
    <?php case ('image'): ?>
    <?php case ('file'): ?>
        <div class="flex gap-2.5">
            <?php if($product[$attribute->code]): ?>
                <a
                    href="<?php echo e(route('admin.catalog.products.file.download', [$product->id, $attribute->id] )); ?>"
                    class="flex"
                >
                    <?php if($attribute->type == 'image'): ?>
                        <?php if(Storage::exists($product[$attribute->code])): ?>
                            <img
                                src="<?php echo e(Storage::url($product[$attribute->code])); ?>"
                                class="h-[45px] w-[45px] overflow-hidden rounded border hover:border-gray-400 dark:border-gray-800"
                            />
                        <?php endif; ?>
                    <?php else: ?>
                        <div class="inline-flex w-full max-w-max cursor-pointer appearance-none items-center justify-between gap-x-1 rounded-md border border-transparent p-1.5 text-center text-gray-600 transition-all marker:shadow hover:bg-gray-200 active:border-gray-300 dark:text-gray-300 dark:hover:bg-gray-800">
                            <i class="icon-down-stat text-2xl"></i>
                        </div>
                    <?php endif; ?>
                </a>

                <input
                    type="hidden"
                    name="<?php echo e($attribute->code); ?>"
                    value="<?php echo e($product[$attribute->code]); ?>"
                />
            <?php endif; ?>

            <v-field
                type="file"
                class="w-full"
                name="<?php echo e($attribute->code); ?>"
                :rules="<?php echo e($attribute->validations); ?>"
                v-slot="{ handleChange, handleBlur }"
                label="<?php echo e($attribute->admin_name); ?>"
            >
                <input
                    type="file"
                    id="<?php echo e($attribute->code); ?>"
                    :class="[errors['<?php echo e($attribute->code); ?>'] ? 'border border-red-600 hover:border-red-600' : '']"
                    class="w-full rounded-md border px-3 py-2.5 text-sm text-gray-600 transition-all hover:border-gray-400 focus:border-gray-400 dark:border-gray-800 dark:text-gray-300 dark:file:bg-gray-800 dark:file:dark:text-white dark:hover:border-gray-400 dark:focus:border-gray-400"
                    name="<?php echo e($attribute->code); ?>"
                    @change="handleChange"
                    @blur="handleBlur"
                >
            </v-field>
        </div>

        <?php if($product[$attribute->code]): ?>
            <div class="mt-2.5 flex items-center gap-2.5">
                <?php if (isset($component)) { $__componentOriginal53af403f6b2179a3039d488b8ab2a267 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53af403f6b2179a3039d488b8ab2a267 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.control','data' => ['type' => 'checkbox','id' => $attribute->code . '_delete','name' => $attribute->code . '[delete]','value' => '1','for' => $attribute->code . '_delete']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'checkbox','id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attribute->code . '_delete'),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attribute->code . '[delete]'),'value' => '1','for' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attribute->code . '_delete')]); ?>
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
                    for="<?php echo e($attribute->code . '_delete'); ?>"
                    class="cursor-pointer select-none text-sm text-gray-600 dark:text-gray-300"
                >
                    <?php echo app('translator')->get('admin::app.catalog.products.edit.remove'); ?>
                </label>
            </div>
        <?php endif; ?>

        <?php break; ?>
<?php endswitch; ?>
<?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Admin\src\Resources\views\catalog\products\edit\controls.blade.php ENDPATH**/ ?>