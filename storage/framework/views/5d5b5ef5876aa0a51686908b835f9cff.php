<?php
    $options = $product->bundle_options()->with([
        'product',
        'bundle_option_products',
        'bundle_option_products.product.inventory_indices',
        'bundle_option_products.product.images',
    ])->get();
?>

<?php echo view_render_event('bagisto.admin.catalog.product.edit.form.types.bundle.before', ['product' => $product]); ?>


<v-bundle-options :errors="errors"></v-bundle-options>

<?php echo view_render_event('bagisto.admin.catalog.product.edit.form.types.bundle.after', ['product' => $product]); ?>


<?php if (! $__env->hasRenderedOnce('9367a298-33d6-4b92-a84d-058493110f7a')): $__env->markAsRenderedOnce('9367a298-33d6-4b92-a84d-058493110f7a');
$__env->startPush('scripts'); ?>
    <script
        type="text/x-template"
        id="v-bundle-options-template"
    >
        <div class="box-shadow relative rounded bg-white dark:bg-gray-900">
            <!-- Panel Header -->
            <div class="mb-2.5 flex justify-between gap-5 p-4">
                <div class="flex flex-col gap-2">
                    <p class="text-base font-semibold text-gray-800 dark:text-white">
                        <?php echo app('translator')->get('admin::app.catalog.products.edit.types.bundle.title'); ?>
                    </p>

                    <p class="text-xs font-medium text-gray-500 dark:text-gray-300">
                        <?php echo app('translator')->get('admin::app.catalog.products.edit.types.bundle.info'); ?>
                    </p>
                </div>

                <!-- Add Button -->
                <div class="flex items-center gap-x-1">
                    <div
                        class="secondary-button"
                        @click="resetForm(); $refs.updateCreateOptionModal.open()"
                    >
                        <?php echo app('translator')->get('admin::app.catalog.products.edit.types.bundle.add-btn'); ?>
                    </div>
                </div>
            </div>

            <!-- Panel Content -->
            <div
                class="grid"
                v-if="options.length"
            >
                <!-- Bundle Option Component -->
                <v-bundle-option-item
                    v-for='(option, index) in options'
                    :key="index"
                    :index="index"
                    :option="option"
                    :errors="errors"
                    @onEdit="selectedOption = $event; $refs.updateCreateOptionModal.open()"
                    @onRemove="removeOption($event)"
                >
                </v-bundle-option-item>
            </div>

            <!-- For Empty Option -->
            <div
                class="grid justify-center justify-items-center gap-3.5 px-2.5 py-10"
                v-else
            >
                <!-- Placeholder Image -->
                <img
                    src="<?php echo e(bagisto_asset('images/icon-options.svg')); ?>"
                    class="h-20 w-20 rounded border border-dashed dark:border-gray-800 dark:mix-blend-exclusion dark:invert"
                />

                <!-- Add Variants Information -->
                <div class="flex flex-col items-center gap-1.5">
                    <p class="text-base font-semibold text-gray-400">
                        <?php echo app('translator')->get('admin::app.catalog.products.edit.types.bundle.empty-title'); ?>
                    </p>

                    <p class="text-gray-400">
                        <?php echo app('translator')->get('admin::app.catalog.products.edit.types.bundle.empty-info'); ?>
                    </p>
                </div>

                <div
                    class="secondary-button text-sm"
                    @click="resetForm(); $refs.updateCreateOptionModal.open()"
                >
                    <?php echo app('translator')->get('admin::app.catalog.products.edit.types.bundle.add-btn'); ?>
                </div>
            </div>

            <!-- Add Option Form Modal -->
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
                <form @submit="handleSubmit($event, updateOrCreate)">
                    <!-- Customer Create Modal -->
                    <?php if (isset($component)) { $__componentOriginal09768308838b828c7799162f44758281 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal09768308838b828c7799162f44758281 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.modal.index','data' => ['ref' => 'updateCreateOptionModal']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['ref' => 'updateCreateOptionModal']); ?>
                        <!-- Modal Header -->
                         <?php $__env->slot('header', null, []); ?> 
                            <p class="text-lg font-bold text-gray-800 dark:text-white">
                                <?php echo app('translator')->get('admin::app.catalog.products.edit.types.bundle.update-create.title'); ?>
                            </p>
                         <?php $__env->endSlot(); ?>

                        <!-- Modal Content -->
                         <?php $__env->slot('content', null, []); ?> 
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
                                <?php if (isset($component)) { $__componentOriginal8378211f70f8c39b16d47cecdac9c7c8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8378211f70f8c39b16d47cecdac9c7c8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.label','data' => ['class' => 'required']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'required']); ?>
                                    <?php echo app('translator')->get('admin::app.catalog.products.edit.types.bundle.update-create.name'); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.control','data' => ['type' => 'text','name' => 'label','rules' => 'required',':value' => 'selectedOption.label','label' => trans('admin::app.catalog.products.edit.types.bundle.update-create.name')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'label','rules' => 'required',':value' => 'selectedOption.label','label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('admin::app.catalog.products.edit.types.bundle.update-create.name'))]); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.error','data' => ['controlName' => 'label']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['control-name' => 'label']); ?>
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

                            <div class="flex gap-4">
                                <!-- Type -->
                                <?php if (isset($component)) { $__componentOriginal7b1bc76a00ab5e7f1bf2c6429dae85a3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7b1bc76a00ab5e7f1bf2c6429dae85a3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.index','data' => ['class' => 'flex-1']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'flex-1']); ?>
                                    <?php if (isset($component)) { $__componentOriginal8378211f70f8c39b16d47cecdac9c7c8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8378211f70f8c39b16d47cecdac9c7c8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.label','data' => ['class' => 'required']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'required']); ?>
                                        <?php echo app('translator')->get('admin::app.catalog.products.edit.types.bundle.update-create.type'); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.control','data' => ['type' => 'select','name' => 'type','rules' => 'required',':value' => 'selectedOption.type','label' => trans('admin::app.catalog.products.edit.types.bundle.update-create.type')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'select','name' => 'type','rules' => 'required',':value' => 'selectedOption.type','label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('admin::app.catalog.products.edit.types.bundle.update-create.type'))]); ?>
                                        <option value="select">
                                            <?php echo app('translator')->get('admin::app.catalog.products.edit.types.bundle.update-create.select'); ?>
                                        </option>

                                        <option value="radio">
                                            <?php echo app('translator')->get('admin::app.catalog.products.edit.types.bundle.update-create.radio'); ?>
                                        </option>

                                        <option value="checkbox">
                                            <?php echo app('translator')->get('admin::app.catalog.products.edit.types.bundle.update-create.checkbox'); ?>
                                        </option>

                                        <option value="multiselect">
                                            <?php echo app('translator')->get('admin::app.catalog.products.edit.types.bundle.update-create.multiselect'); ?>
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

                                    <?php if (isset($component)) { $__componentOriginal8da25fb6534e2ef288914e35c32417f8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8da25fb6534e2ef288914e35c32417f8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.error','data' => ['controlName' => 'type']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['control-name' => 'type']); ?>
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

                                <!-- Is Required -->
                                <?php if (isset($component)) { $__componentOriginal7b1bc76a00ab5e7f1bf2c6429dae85a3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7b1bc76a00ab5e7f1bf2c6429dae85a3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.index','data' => ['class' => 'flex-1']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'flex-1']); ?>
                                    <?php if (isset($component)) { $__componentOriginal8378211f70f8c39b16d47cecdac9c7c8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8378211f70f8c39b16d47cecdac9c7c8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.label','data' => ['class' => 'required']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'required']); ?>
                                        <?php echo app('translator')->get('admin::app.catalog.products.edit.types.bundle.update-create.is-required'); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.control','data' => ['type' => 'select','name' => 'is_required','rules' => 'required',':value' => 'selectedOption.is_required','label' => trans('admin::app.catalog.products.edit.types.bundle.update-create.is-required')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'select','name' => 'is_required','rules' => 'required',':value' => 'selectedOption.is_required','label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('admin::app.catalog.products.edit.types.bundle.update-create.is-required'))]); ?>
                                        <option value="1">
                                            <?php echo app('translator')->get('admin::app.catalog.products.edit.types.bundle.update-create.yes'); ?>
                                        </option>

                                        <option value="0">
                                            <?php echo app('translator')->get('admin::app.catalog.products.edit.types.bundle.update-create.no'); ?>
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

                                    <?php if (isset($component)) { $__componentOriginal8da25fb6534e2ef288914e35c32417f8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8da25fb6534e2ef288914e35c32417f8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.error','data' => ['controlName' => 'is_required']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['control-name' => 'is_required']); ?>
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
                         <?php $__env->endSlot(); ?>

                        <!-- Modal Footer -->
                         <?php $__env->slot('footer', null, []); ?> 
                            <!-- Save Button -->
                            <?php if (isset($component)) { $__componentOriginal989f82b74d189698d771eef298c02d90 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal989f82b74d189698d771eef298c02d90 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.button.index','data' => ['buttonType' => 'button','class' => 'primary-button','title' => trans('admin::app.catalog.products.edit.types.bundle.update-create.save-btn')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['button-type' => 'button','class' => 'primary-button','title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('admin::app.catalog.products.edit.types.bundle.update-create.save-btn'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal989f82b74d189698d771eef298c02d90)): ?>
<?php $attributes = $__attributesOriginal989f82b74d189698d771eef298c02d90; ?>
<?php unset($__attributesOriginal989f82b74d189698d771eef298c02d90); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal989f82b74d189698d771eef298c02d90)): ?>
<?php $component = $__componentOriginal989f82b74d189698d771eef298c02d90; ?>
<?php unset($__componentOriginal989f82b74d189698d771eef298c02d90); ?>
<?php endif; ?>
                         <?php $__env->endSlot(); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal09768308838b828c7799162f44758281)): ?>
<?php $attributes = $__attributesOriginal09768308838b828c7799162f44758281; ?>
<?php unset($__attributesOriginal09768308838b828c7799162f44758281); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal09768308838b828c7799162f44758281)): ?>
<?php $component = $__componentOriginal09768308838b828c7799162f44758281; ?>
<?php unset($__componentOriginal09768308838b828c7799162f44758281); ?>
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
        </div>
    </script>

    <script
        type="text/x-template"
        id="v-bundle-option-item-template"
    >
        <!-- Panel -->
        <div>
            <!-- Hidden Inputs -->
            <input
                type="hidden"
                :name="'bundle_options[' + option.id + '][<?php echo e($currentLocale->code); ?>][label]'"
                :value="option.label"
            />

            <input
                type="hidden"
                :name="'bundle_options[' + option.id + '][type]'"
                :value="option.type"
            />

            <input
                type="hidden"
                :name="'bundle_options[' + option.id + '][is_required]'"
                :value="option.is_required"
            />

            <input
                type="hidden"
                :name="'bundle_options[' + option.id + '][sort_order]'"
                :value="index"
            />

            <!-- Panel Header -->
            <div class="mb-2.5 flex justify-between gap-5 p-4">
                <div class="flex flex-col gap-2">
                    <p
                        class="text-base font-semibold text-gray-800 dark:text-white"
                        :class="{'required': option.is_required == 1}"
                    >
                        {{ (index + 1) + '. ' + option.label + ' - ' + types[option.type].title }}
                    </p>

                    <p class="text-xs font-medium text-gray-500 dark:text-gray-300">
                        {{ types[option.type].info }}
                    </p>
                </div>

                <!-- Add Button -->
                <div class="flex items-center gap-x-5">
                    <p
                        class="cursor-pointer font-semibold text-blue-600 transition-all hover:underline"
                        @click="$refs['productSearch' + option.id].openDrawer()"
                    >
                        <?php echo app('translator')->get('admin::app.catalog.products.edit.types.bundle.option.add-btn'); ?>
                    </p>

                    <p
                        class="cursor-pointer font-semibold text-blue-600 transition-all hover:underline"
                        @click="edit"
                    >
                        <?php echo app('translator')->get('admin::app.catalog.products.edit.types.bundle.option.edit-btn'); ?>
                    </p>

                    <p
                        class="cursor-pointer font-semibold text-red-600 transition-all hover:underline"
                        @click="remove"
                    >
                        <?php echo app('translator')->get('admin::app.catalog.products.edit.types.bundle.option.delete-btn'); ?>
                    </p>
                </div>
            </div>

            <!-- Panel Content -->
            <div
                class="grid"
                v-if="option.bundle_option_products.length"
            >
                <!-- Draggable Products -->
                <draggable
                    ghost-class="draggable-ghost"
                    v-bind="{animation: 200}"
                    handle=".icon-drag"
                    :list="option.bundle_option_products"
                    item-key="id"
                >
                    <template #item="{ element, index }">
                        <div class="flex justify-between gap-2.5 border-b border-slate-300 p-4 dark:border-gray-800">
                            <!-- Information -->
                            <div class="flex gap-2.5">
                                <!-- Drag Icon -->
                                <div>
                                    <i class="icon-drag cursor-grab text-xl transition-all hover:text-gray-700 dark:text-gray-300"></i>
                                </div>

                                <!-- Is Default Option -->
                                <div>
                                    <input
                                        :type="[option.type == 'checkbox' || option.type == 'multiselect' ? 'checkbox' : 'radio']"
                                        :id="'bundle_options[' + option.id + '][products][' + element.id + '][is_default]'"
                                        class="peer sr-only"
                                        :name="'bundle_options[' + option.id + '][products][' + element.id + '][is_default]'"
                                        :value="element.is_default"
                                        :checked="element.is_default"
                                        @change="updateIsDefault(element)"
                                    />

                                    <label
                                        class="cursor-pointer text-2xl peer-checked:text-blue-600"
                                        :class="[option.type == 'checkbox' || option.type == 'multiselect' ? 'icon-uncheckbox  peer-checked:icon-checked' : 'icon-radio-normal peer-checked:icon-radio-selected']"
                                        :for="'bundle_options[' + option.id + '][products][' + element.id + '][is_default]'"
                                    >
                                    </label>
                                </div>

                                <!-- Image -->
                                <div
                                    class="relative h-[60px] max-h-[60px] w-full max-w-[60px] overflow-hidden rounded"
                                    :class="{'overflow-hidden rounded border border-dashed border-gray-300 dark:border-gray-800 dark:mix-blend-exclusion dark:invert': ! element.product.images.length}"
                                >
                                    <template v-if="! element.product.images.length">
                                        <img src="<?php echo e(bagisto_asset('images/product-placeholders/front.svg')); ?>">

                                        <p class="absolute bottom-1.5 w-full text-center text-[6px] font-semibold text-gray-400">
                                            <?php echo app('translator')->get('admin::app.catalog.products.edit.types.bundle.image-placeholder'); ?>
                                        </p>
                                    </template>

                                    <template v-else>
                                        <img :src="element.product.images[0].url">
                                    </template>
                                </div>

                                <!-- Details -->
                                <div class="grid place-content-start gap-1.5">
                                    <p class="text-base font-semibold text-gray-800 dark:text-white">
                                        {{ element.product.name }}
                                    </p>

                                    <p class="text-gray-600 dark:text-gray-300">
                                        {{ `<?php echo app('translator')->get('admin::app.catalog.products.edit.types.bundle.option.sku'); ?>`.replace(':sku', element.product.sku) }}
                                    </p>
                                </div>
                            </div>

                            <!-- Actions -->
                            <div class="grid place-content-start gap-1 ltr:text-right rtl:text-left">
                                <p class="font-semibold text-gray-800 dark:text-white">
                                    {{ $admin.formatPrice(element.product.price) }}
                                </p>

                                <!-- Hidden Input -->
                                <input
                                    type="hidden"
                                    :name="'bundle_options[' + option.id + '][products][' + element.id + '][product_id]'"
                                    :value="element.product.id"
                                />

                                <input
                                    type="hidden"
                                    :name="'bundle_options[' + option.id + '][products][' + element.id + '][sort_order]'"
                                    :value="index"
                                />

                                <?php if (isset($component)) { $__componentOriginal7b1bc76a00ab5e7f1bf2c6429dae85a3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7b1bc76a00ab5e7f1bf2c6429dae85a3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.index','data' => ['class' => '!mb-0']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => '!mb-0']); ?>
                                    <?php if (isset($component)) { $__componentOriginal8378211f70f8c39b16d47cecdac9c7c8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8378211f70f8c39b16d47cecdac9c7c8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.label','data' => ['class' => 'required !block']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'required !block']); ?>
                                        <?php echo app('translator')->get('admin::app.catalog.products.edit.types.bundle.option.default-qty'); ?>
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
                                        type="text"
                                        :name="'bundle_options[' + option.id + '][products][' + element.id + '][qty]'"
                                        v-model="element.qty"
                                        class="min-h-[39px] w-[86px] rounded-md border px-3 py-2 text-sm text-gray-600 transition-all hover:border-gray-400 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300"
                                        :class="[errors['bundle_options[' + option.id + '][products][' + element.id + '][qty]'] ? 'border border-red-600 hover:border-red-600' : '']"
                                        rules="required|numeric|min_value:1"
                                        label="<?php echo app('translator')->get('admin::app.catalog.products.edit.types.bundle.option.default-qty'); ?>"
                                    ></v-field>

                                    <v-error-message
                                        :name="'bundle_options[' + option.id + '][products][' + element.id + '][qty]'"
                                        v-slot="{ message }"
                                    >
                                        <p class="mt-1 text-xs italic text-red-600">
                                            {{ message }}
                                        </p>
                                    </v-error-message>
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

                                <p
                                    class="cursor-pointer text-red-600 transition-all hover:underline"
                                    @click="removeProduct(element)"
                                >
                                    <?php echo app('translator')->get('admin::app.catalog.products.edit.types.bundle.option.delete-btn'); ?>
                                </p>
                            </div>
                        </div>
                    </template>
                </draggable>
            </div>

            <!-- For Empty Option -->
            <div
                class="grid justify-center justify-items-center gap-3.5 px-2.5 py-10"
                v-else
            >
                <!-- Placeholder Image -->
                <img
                    src="<?php echo e(bagisto_asset('images/icon-add-product.svg')); ?>"
                    class="h-20 w-20 dark:mix-blend-exclusion dark:invert"
                />

                <!-- Add Variants Information -->
                <div class="flex flex-col items-center gap-1.5">
                    <p class="text-base font-semibold text-gray-400">
                        <?php echo app('translator')->get('admin::app.catalog.products.edit.types.bundle.option.empty-title'); ?>
                    </p>

                    <p class="text-gray-400">
                        <?php echo app('translator')->get('admin::app.catalog.products.edit.types.bundle.option.empty-info'); ?>
                    </p>
                </div>

                <div
                    class="secondary-button text-sm"
                    @click="$refs['productSearch' + option.id].openDrawer()"
                >
                    <?php echo app('translator')->get('admin::app.catalog.products.edit.types.bundle.option.add-btn'); ?>
                </div>
            </div>

            <!-- Product Search Blade Component -->
            <?php if (isset($component)) { $__componentOriginal327ffe807b42a6db021ef6ea08eda334 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal327ffe807b42a6db021ef6ea08eda334 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.products.search','data' => [':ref' => '\'productSearch\' + option.id',':addedProductIds' => 'addedProductIds',':queryParams' => '{type: \'simple\', exclude_customizable_products: 1}','@onProductAdded' => 'addSelected($event)']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::products.search'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([':ref' => '\'productSearch\' + option.id',':added-product-ids' => 'addedProductIds',':query-params' => '{type: \'simple\', exclude_customizable_products: 1}','@onProductAdded' => 'addSelected($event)']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal327ffe807b42a6db021ef6ea08eda334)): ?>
<?php $attributes = $__attributesOriginal327ffe807b42a6db021ef6ea08eda334; ?>
<?php unset($__attributesOriginal327ffe807b42a6db021ef6ea08eda334); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal327ffe807b42a6db021ef6ea08eda334)): ?>
<?php $component = $__componentOriginal327ffe807b42a6db021ef6ea08eda334; ?>
<?php unset($__componentOriginal327ffe807b42a6db021ef6ea08eda334); ?>
<?php endif; ?>
        </div>
    </script>

    <script type="module">
        app.component('v-bundle-options', {
            template: '#v-bundle-options-template',

            props: ['errors'],

            data() {
                return {
                    options: <?php echo json_encode($options, 15, 512) ?>,

                    selectedOption: {
                        label: '',
                        type: 'select',
                        is_required: 1,
                        bundle_option_products: []
                    }
                }
            },

            methods: {
                updateOrCreate(params) {
                    if (this.selectedOption.id == undefined) {
                        params.id = 'option_' + this.options.length;

                        params.bundle_option_products = [];

                        this.options.push(params);
                    } else {
                        const indexToUpdate = this.options.findIndex(option => option.id === this.selectedOption.id);

                        this.options[indexToUpdate] = {
                            ...this.selectedOption,
                            ...params
                        };
                    }

                    this.resetForm();

                    this.$refs.updateCreateOptionModal.close();
                },

                removeOption(option) {
                    this.$emitter.emit('open-confirm-modal', {
                        agree: () => {
                            let index = this.options.indexOf(option);

                            this.options.splice(index, 1);
                        }
                    });
                },

                resetForm() {
                    this.selectedOption = {
                        label: '',
                        type: 'select',
                        is_required: 1,
                        bundle_option_products: []
                    };
                },
            }
        });

        app.component('v-bundle-option-item', {
            template: '#v-bundle-option-item-template',

            props: ['index', 'option', 'errors'],

            emits: ['onEdit', 'onRemove'],

            data() {
                return {
                    types: {
                        select: {
                            key: 'select',
                            title: `<?php echo app('translator')->get('admin::app.catalog.products.edit.types.bundle.option.types.select.title'); ?>`,
                            info: `<?php echo app('translator')->get('admin::app.catalog.products.edit.types.bundle.option.types.select.info'); ?>`
                        },

                        radio: {
                            key: 'radio',
                            title: `<?php echo app('translator')->get('admin::app.catalog.products.edit.types.bundle.option.types.radio.title'); ?>`,
                            info: `<?php echo app('translator')->get('admin::app.catalog.products.edit.types.bundle.option.types.radio.info'); ?>`
                        },

                        multiselect: {
                            key: 'multiselect',
                            title: `<?php echo app('translator')->get('admin::app.catalog.products.edit.types.bundle.option.types.multiselect.title'); ?>`,
                            info: `<?php echo app('translator')->get('admin::app.catalog.products.edit.types.bundle.option.types.multiselect.info'); ?>`
                        },

                        checkbox: {
                            key: 'checkbox',
                            title: `<?php echo app('translator')->get('admin::app.catalog.products.edit.types.bundle.option.types.checkbox.title'); ?>`,
                            info: `<?php echo app('translator')->get('admin::app.catalog.products.edit.types.bundle.option.types.checkbox.info'); ?>`
                        }
                    },
                }
            },

            computed: {
                addedProductIds() {
                    return this.option.bundle_option_products.map(productOption => productOption.product.id);
                }
            },

            methods: {
                edit() {
                    this.$emit('onEdit', this.option);
                },

                remove() {
                    this.$emit('onRemove', this.option);
                },

                addSelected(selectedProducts) {
                    selectedProducts.forEach((product) => {
                        this.option.bundle_option_products.push({
                            id: 'product_' + this.option.bundle_option_products.length,
                            qty: 1,
                            is_default: 0,
                            product: product,
                        });
                    });
                },

                removeProduct(product) {
                    this.$emitter.emit('open-confirm-modal', {
                        agree: () => {
                            let index = this.option.bundle_option_products.indexOf(product);

                            this.option.bundle_option_products.splice(index, 1);
                        }
                    });
                },

                updateIsDefault: function(updatedProductOption) {
                    this.option.bundle_option_products.forEach((productOption) => {
                        if (
                            this.option.type == 'radio'
                            || this.option.type == 'select'
                        ) {
                            productOption.is_default = productOption.product.id == updatedProductOption.product.id ? 1 : 0;
                        } else {
                            if (productOption.product.id == updatedProductOption.product.id) {
                                productOption.is_default = productOption.is_default ? 0 : 1;
                            }
                        }
                    });
                }
            }
        });
    </script>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Admin\src\Resources\views\catalog\products\edit\types\bundle.blade.php ENDPATH**/ ?>