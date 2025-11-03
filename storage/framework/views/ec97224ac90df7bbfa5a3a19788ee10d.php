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
        <?php echo app('translator')->get('admin::app.catalog.products.edit.title'); ?>
     <?php $__env->endSlot(); ?>

    <?php echo view_render_event('bagisto.admin.catalog.product.edit.before', ['product' => $product]); ?>


    <?php if (isset($component)) { $__componentOriginal81b4d293d9113446bb908fc8aef5c8f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal81b4d293d9113446bb908fc8aef5c8f6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.index','data' => ['method' => 'PUT','enctype' => 'multipart/form-data']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['method' => 'PUT','enctype' => 'multipart/form-data']); ?>
        <?php echo view_render_event('bagisto.admin.catalog.product.edit.actions.before', ['product' => $product]); ?>


        <!-- Page Header -->
        <div class="grid gap-2.5">
            <div class="flex items-center justify-between gap-4 max-sm:flex-wrap">
                <div class="grid gap-1.5">
                    <p class="text-xl font-bold leading-6 text-gray-800 dark:text-white">
                        <?php echo app('translator')->get('admin::app.catalog.products.edit.title'); ?>
                    </p>
                </div>

                <div class="flex items-center gap-x-2.5">
                    <!-- Back Button -->
                    <a
                        href="<?php echo e(route('admin.catalog.products.index')); ?>"
                        class="transparent-button hover:bg-gray-200 dark:text-white dark:hover:bg-gray-800"
                    >
                        <?php echo app('translator')->get('admin::app.account.edit.back-btn'); ?>
                    </a>

                    <!-- Preview Button -->
                    <?php if(
                        $product->status
                        && $product->visible_individually
                        && $product->url_key
                    ): ?>
                        <a
                            href="<?php echo e(route('shop.product_or_category.index', $product->url_key)); ?>"
                            class="secondary-button"
                            target="_blank"
                        >
                            <?php echo app('translator')->get('admin::app.catalog.products.edit.preview'); ?>
                        </a>
                    <?php endif; ?>

                    <!-- Save Button -->
                    <button class="primary-button">
                        <?php echo app('translator')->get('admin::app.catalog.products.edit.save-btn'); ?>
                    </button>
                </div>
            </div>
        </div>

        <?php
            $channels = core()->getAllChannels();

            $currentChannel = core()->getRequestedChannel();

            $currentLocale = core()->getRequestedLocale();
        ?>

        <!-- Channel and Locale Switcher -->
        <div class="mt-7 flex items-center justify-between gap-4 max-md:flex-wrap">
            <div class="flex items-center gap-x-1">
                <!-- Channel Switcher -->
                <?php if (isset($component)) { $__componentOriginalaf937e0ec72fa678d3a0c6dc6c0ac5f2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaf937e0ec72fa678d3a0c6dc6c0ac5f2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.dropdown.index','data' => ['class' => $channels->count() <= 1 ? 'hidden' : '']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($channels->count() <= 1 ? 'hidden' : '')]); ?>
                    <!-- Dropdown Toggler -->
                     <?php $__env->slot('toggle', null, []); ?> 
                        <button
                            type="button"
                            class="transparent-button px-1 py-1.5 hover:bg-gray-200 focus:bg-gray-200 dark:text-white dark:hover:bg-gray-800 dark:focus:bg-gray-800"
                        >
                            <span class="icon-store text-2xl"></span>
                            
                            <?php echo e($currentChannel->name); ?>


                            <input
                                type="hidden"
                                name="channel"
                                value="<?php echo e($currentChannel->code); ?>"
                            />

                            <span class="icon-sort-down text-2xl"></span>
                        </button>
                     <?php $__env->endSlot(); ?>

                    <!-- Dropdown Content -->
                     <?php $__env->slot('content', null, ['class' => '!p-0']); ?> 
                        <?php $__currentLoopData = $channels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $channel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a
                                href="?<?php echo e(Arr::query(['channel' => $channel->code, 'locale' => $channel->default_locale?->code ?? $currentLocale->code ])); ?>"
                                class="flex cursor-pointer gap-2.5 px-5 py-2 text-base hover:bg-gray-100 dark:text-white dark:hover:bg-gray-950"
                            >
                                <?php echo e($channel->name); ?>

                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

                <!-- Locale Switcher -->
                <?php if (isset($component)) { $__componentOriginalaf937e0ec72fa678d3a0c6dc6c0ac5f2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaf937e0ec72fa678d3a0c6dc6c0ac5f2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.dropdown.index','data' => ['class' => $currentChannel->locales->count() <= 1 ? 'hidden' : '']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($currentChannel->locales->count() <= 1 ? 'hidden' : '')]); ?>
                    <!-- Dropdown Toggler -->
                     <?php $__env->slot('toggle', null, []); ?> 
                        <button
                            type="button"
                            class="transparent-button px-1 py-1.5 hover:bg-gray-200 focus:bg-gray-200 dark:text-white dark:hover:bg-gray-800 dark:focus:bg-gray-800"
                        >
                            <span class="icon-language text-2xl"></span>

                            <?php echo e($currentLocale->name); ?>

                            
                            <input
                                type="hidden"
                                name="locale"
                                value="<?php echo e($currentLocale->code); ?>"
                            />

                            <span class="icon-sort-down text-2xl"></span>
                        </button>
                     <?php $__env->endSlot(); ?>

                    <!-- Dropdown Content -->
                     <?php $__env->slot('content', null, ['class' => '!p-0']); ?> 
                        <?php $__currentLoopData = $currentChannel->locales->sortBy('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a
                                href="?<?php echo e(Arr::query(['channel' => $currentChannel->code, 'locale' => $locale->code])); ?>"
                                class="flex gap-2.5 px-5 py-2 text-base cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-950 dark:text-white <?php echo e($locale->code == $currentLocale->code ? 'bg-gray-100 dark:bg-gray-950' : ''); ?>"
                            >
                                <?php echo e($locale->name); ?>

                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

        <?php echo view_render_event('bagisto.admin.catalog.product.edit.actions.after', ['product' => $product]); ?>


        <!-- body content -->
        <?php echo view_render_event('bagisto.admin.catalog.product.edit.form.before', ['product' => $product]); ?>


        <div class="mt-3.5 flex gap-2.5 max-xl:flex-wrap">
            <?php
                $groupedColumns = $product->attribute_family->attribute_groups->groupBy('column');

                $isSingleColumn = $groupedColumns->count() !== 2;
            ?>

            <?php $__currentLoopData = $groupedColumns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column => $groups): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <?php echo view_render_event("bagisto.admin.catalog.product.edit.form.column_{$column}.before", ['product' => $product]); ?>


                <div class="flex flex-col gap-2 <?php echo e($column == 1 ? 'flex-1 max-xl:flex-auto' : 'w-[360px] max-w-full max-sm:w-full'); ?>">
                    <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $customAttributes = $product->getEditableAttributes($group); ?>

                        <?php if(
                            $group->code === 'inventories' 
                            && (
                                $product->getTypeInstance()->isComposite()
                                || $product->type === 'downloadable'
                            )
                        ): ?>
                            <?php continue; ?>
                        <?php endif; ?>

                        <?php if($customAttributes->isNotEmpty()): ?>
                            <?php echo view_render_event("bagisto.admin.catalog.product.edit.form.{$group->code}.before", ['product' => $product]); ?>


                            <div class="box-shadow relative rounded bg-white p-4 dark:bg-gray-900">
                                <p class="mb-4 text-base font-semibold text-gray-800 dark:text-white">
                                    <?php echo e($group->name); ?>

                                </p>

                                <?php if($group->code == 'meta_description'): ?>
                                    <?php if (isset($component)) { $__componentOriginalab143bfdc06ba566873dc3777a785d64 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalab143bfdc06ba566873dc3777a785d64 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.seo.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::seo'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalab143bfdc06ba566873dc3777a785d64)): ?>
<?php $attributes = $__attributesOriginalab143bfdc06ba566873dc3777a785d64; ?>
<?php unset($__attributesOriginalab143bfdc06ba566873dc3777a785d64); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalab143bfdc06ba566873dc3777a785d64)): ?>
<?php $component = $__componentOriginalab143bfdc06ba566873dc3777a785d64; ?>
<?php unset($__componentOriginalab143bfdc06ba566873dc3777a785d64); ?>
<?php endif; ?>
                                <?php endif; ?>

                                <?php $__currentLoopData = $customAttributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo view_render_event("bagisto.admin.catalog.product.edit.form.{$group->code}.controls.before", ['product' => $product]); ?>


                                    <?php if (isset($component)) { $__componentOriginal7b1bc76a00ab5e7f1bf2c6429dae85a3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7b1bc76a00ab5e7f1bf2c6429dae85a3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.index','data' => ['class' => 'last:!mb-0']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'last:!mb-0']); ?>
                                        <?php if (isset($component)) { $__componentOriginal8378211f70f8c39b16d47cecdac9c7c8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8378211f70f8c39b16d47cecdac9c7c8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.label','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                            <?php echo $attribute->admin_name . ($attribute->is_required ? '<span class="required"></span>' : ''); ?>


                                            <?php if(
                                                $attribute->value_per_channel
                                                && $channels->count() > 1
                                            ): ?>
                                                <span class="rounded border border-gray-200 bg-gray-100 px-1 py-0.5 text-[10px] font-semibold leading-normal text-gray-600">
                                                    <?php echo e($currentChannel->name); ?>

                                                </span>
                                            <?php endif; ?>

                                            <?php if($attribute->value_per_locale): ?>
                                                <span class="rounded border border-gray-200 bg-gray-100 px-1 py-0.5 text-[10px] font-semibold leading-normal text-gray-600">
                                                    <?php echo e($currentLocale->name); ?>

                                                </span>
                                            <?php endif; ?>
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

                                        <?php echo $__env->make('admin::catalog.products.edit.controls', [
                                            'attribute' => $attribute,
                                            'product'   => $product,
                                        ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                                        <?php if (isset($component)) { $__componentOriginal8da25fb6534e2ef288914e35c32417f8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8da25fb6534e2ef288914e35c32417f8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.error','data' => ['controlName' => $attribute->code . (in_array($attribute->type, ['multiselect', 'checkbox']) ? '[]' : '')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['control-name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attribute->code . (in_array($attribute->type, ['multiselect', 'checkbox']) ? '[]' : ''))]); ?>
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

                                    <?php echo view_render_event("bagisto.admin.catalog.product.edit.form.{$group->code}.controls.after", ['product' => $product]); ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <?php echo $__env->renderWhen($group->code == 'price', 'admin::catalog.products.edit.price.group', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1])); ?>

                                <?php echo $__env->renderWhen($group->code === 'inventories', 'admin::catalog.products.edit.inventories', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1])); ?>
                            </div>

                            <?php echo view_render_event("bagisto.admin.catalog.product.edit.form.{$group->code}.after", ['product' => $product]); ?>

                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php if($column == 1): ?>
                        <!-- Images View Blade File -->
                        <?php echo $__env->make('admin::catalog.products.edit.images', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                        <!-- Videos View Blade File -->
                        <?php echo $__env->make('admin::catalog.products.edit.videos', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                        <!-- Product Type View Blade File -->
                        <?php if ($__env->exists('admin::catalog.products.edit.types.' . $product->type)) echo $__env->make('admin::catalog.products.edit.types.' . $product->type, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                        <!-- Related, Cross Sells, Up Sells View Blade File -->
                        <?php echo $__env->make('admin::catalog.products.edit.links', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                        <!-- Include Product Type Additional Blade Files If Any -->
                        <?php $__currentLoopData = $product->getTypeInstance()->getAdditionalViews(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if ($__env->exists($view)) echo $__env->make($view, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php elseif(! $isSingleColumn): ?>
                        <!-- Channels View Blade File -->
                        <?php echo $__env->make('admin::catalog.products.edit.channels', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                        <!-- Categories View Blade File -->
                        <?php echo $__env->make('admin::catalog.products.edit.categories', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php endif; ?>
                </div>

                <?php if($isSingleColumn && ($column == 1 || $column == 2)): ?>
                    <div class="w-[360px] max-w-full max-sm:w-full">
                        <?php if($column == 2): ?> 
                            <!-- Images View Blade File -->
                            <?php echo $__env->make('admin::catalog.products.edit.images', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                            <!-- Videos View Blade File -->
                            <?php echo $__env->make('admin::catalog.products.edit.videos', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                            <!-- Product Type View Blade File -->
                            <?php if ($__env->exists('admin::catalog.products.edit.types.' . $product->type)) echo $__env->make('admin::catalog.products.edit.types.' . $product->type, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                            <!-- Related, Cross Sells, Up Sells View Blade File -->
                            <?php echo $__env->make('admin::catalog.products.edit.links', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                            <!-- Include Product Type Additional Blade Files If Any -->
                            <?php $__currentLoopData = $product->getTypeInstance()->getAdditionalViews(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if ($__env->exists($view)) echo $__env->make($view, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>

                        <!-- Channels View Blade File -->
                        <?php echo $__env->make('admin::catalog.products.edit.channels', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                        <!-- Categories View Blade File -->
                        <?php echo $__env->make('admin::catalog.products.edit.categories', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    </div>
                <?php endif; ?>

                <?php echo view_render_event("bagisto.admin.catalog.product.edit.form.column_{$column}.after", ['product' => $product]); ?>


            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <?php echo view_render_event('bagisto.admin.catalog.product.edit.form.after', ['product' => $product]); ?>


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

    <?php echo view_render_event('bagisto.admin.catalog.product.edit.after', ['product' => $product]); ?>


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
<?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Admin\src\Resources\views\catalog\products\edit.blade.php ENDPATH**/ ?>