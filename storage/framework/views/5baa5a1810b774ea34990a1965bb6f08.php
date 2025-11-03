<?php echo view_render_event('bagisto.admin.sales.order.create.types.bundle.before'); ?>


<v-product-bundle-options
    :errors="errors"
    :product-options="selectedProductOptions"
></v-product-bundle-options>

<?php echo view_render_event('bagisto.admin.sales.order.create.types.bundle.after'); ?>


<?php if (! $__env->hasRenderedOnce('164036ef-94e4-4131-94d6-322e34dadc8a')): $__env->markAsRenderedOnce('164036ef-94e4-4131-94d6-322e34dadc8a');
$__env->startPush('scripts'); ?>
    <script
        type="text/x-template"
        id="v-product-bundle-options-template"
    >
        <div class="">
            <v-product-bundle-option-item
                v-for="(option, index) in options"
                :option="option"
                :errors="errors"
                :key="index"
                @onProductSelected="productSelected(option, $event)"
            >
            </v-product-bundle-option-item>

            <div class="p-4">
                <div class="my-5 flex items-center justify-between">
                    <p class="text-sm dark:text-white">
                        <?php echo app('translator')->get('admin::app.sales.orders.create.types.bundle.total-amount'); ?>
                    </p>

                    <p class="text-lg font-medium dark:text-white">
                        {{ formattedTotalPrice }}
                    </p>
                </div>

                <ul class="grid gap-2.5 text-base">
                    <li v-for="option in options">
                        <span class="mb-1.5 inline-block dark:text-white">
                            {{ option.label }}
                        </span>

                        <template v-for="product in option.products">
                            <div
                                class="text-[#6E6E6E] dark:text-gray-300"
                                :key="product.id"
                                v-if="product.is_default"
                            >
                                {{ product.qty + ' x ' + product.name }}
                            </div>
                        </template>
                    </li>
                </ul>
            </div>
        </div>
    </script>

    <script
        type="text/x-template"
        id="v-product-bundle-option-item-template"
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
                <!-- Dropdown Options Container -->
                <?php if (isset($component)) { $__componentOriginal8378211f70f8c39b16d47cecdac9c7c8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8378211f70f8c39b16d47cecdac9c7c8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.label','data' => ['class' => '!mt-0',':class' => '{ \'required\': option.is_required }']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => '!mt-0',':class' => '{ \'required\': option.is_required }']); ?>
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

                <template v-if="option.type == 'select'">
                    <?php if (isset($component)) { $__componentOriginal53af403f6b2179a3039d488b8ab2a267 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53af403f6b2179a3039d488b8ab2a267 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.control','data' => ['type' => 'select',':name' => '\'bundle_options[\' + option.id + \'][]\'',':rules' => '{\'required\': option.is_required}','vModel' => 'selectedProduct',':label' => 'option.label']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'select',':name' => '\'bundle_options[\' + option.id + \'][]\'',':rules' => '{\'required\': option.is_required}','v-model' => 'selectedProduct',':label' => 'option.label']); ?>
                        <option
                            value="0"
                            v-if="! option.is_required"
                        >
                            <?php echo app('translator')->get('admin::app.sales.orders.create.types.bundle.none'); ?>
                        </option>

                        <option
                            v-for="product in option.products"
                            :value="product.id"
                        >
                            {{ product.name + ' + ' + product.price.final.formatted_price }}
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

                <template v-if="option.type == 'multiselect'">
                    <?php if (isset($component)) { $__componentOriginal53af403f6b2179a3039d488b8ab2a267 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53af403f6b2179a3039d488b8ab2a267 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.control','data' => ['type' => 'select',':name' => '\'bundle_options[\' + option.id + \'][]\'',':rules' => '{\'required\': option.is_required}','vModel' => 'selectedProduct',':label' => 'option.label','multiple' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'select',':name' => '\'bundle_options[\' + option.id + \'][]\'',':rules' => '{\'required\': option.is_required}','v-model' => 'selectedProduct',':label' => 'option.label','multiple' => true]); ?>
                        <option
                            value="0"
                            v-if="! option.is_required"
                        >
                            <?php echo app('translator')->get('admin::app.sales.orders.create.types.bundle.none'); ?>
                        </option>

                        <option
                            v-for="product in option.products"
                            :value="product.id"
                            :selected="value && value.includes(product.id)"
                        >
                            {{ product.name + ' + ' + product.price.final.formatted_price }}
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
                
                <template v-if="option.type == 'radio'">
                    <div class="grid gap-2">
                        <!-- None radio option if option is not required -->
                        <div
                            class="flex select-none gap-x-4"
                            v-if="! option.is_required"
                        >
                            <?php if (isset($component)) { $__componentOriginal53af403f6b2179a3039d488b8ab2a267 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53af403f6b2179a3039d488b8ab2a267 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.control','data' => ['type' => 'radio',':name' => '\'bundle_options[\' + option.id + \'][]\'',':for' => '\'bundle_options[\' + option.id + \'][\' + index + \']\'',':id' => '\'bundle_options[\' + option.id + \'][\' + index + \']\'','value' => '0','vModel' => 'selectedProduct',':rules' => '{\'required\': option.is_required}',':label' => 'option.label']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'radio',':name' => '\'bundle_options[\' + option.id + \'][]\'',':for' => '\'bundle_options[\' + option.id + \'][\' + index + \']\'',':id' => '\'bundle_options[\' + option.id + \'][\' + index + \']\'','value' => '0','v-model' => 'selectedProduct',':rules' => '{\'required\': option.is_required}',':label' => 'option.label']); ?>
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
                                :for="'bundle_options[' + option.id + '][' + index + ']'"
                            >
                                <?php echo app('translator')->get('admin::app.sales.orders.create.types.bundle.none'); ?>
                            </label>
                        </div>

                        <!-- Options -->
                        <div
                            class="flex select-none items-center gap-x-4"
                            v-for="(product, index) in option.products"
                        >
                            <?php if (isset($component)) { $__componentOriginal53af403f6b2179a3039d488b8ab2a267 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53af403f6b2179a3039d488b8ab2a267 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.control','data' => ['type' => 'radio',':name' => '\'bundle_options[\' + option.id + \'][]\'',':for' => '\'bundle_options[\' + option.id + \'][\' + index + \']\'',':id' => '\'bundle_options[\' + option.id + \'][\' + index + \']\'',':value' => 'product.id','vModel' => 'selectedProduct',':rules' => '{\'required\': option.is_required}',':label' => 'option.label']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'radio',':name' => '\'bundle_options[\' + option.id + \'][]\'',':for' => '\'bundle_options[\' + option.id + \'][\' + index + \']\'',':id' => '\'bundle_options[\' + option.id + \'][\' + index + \']\'',':value' => 'product.id','v-model' => 'selectedProduct',':rules' => '{\'required\': option.is_required}',':label' => 'option.label']); ?>
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
                                :for="'bundle_options[' + option.id + '][' + index + ']'"
                            >
                                {{ product.name }}

                                <span class="text-black dark:text-white">
                                    {{ '+ ' + product.price.final.formatted_price }}
                                </span>
                            </label>
                        </div>
                    </div>
                </template>

                <template v-if="option.type == 'checkbox'">
                    <div class="grid gap-2">
                        <!-- Options -->
                        <div
                            class="flex select-none items-center gap-x-4"
                            v-for="(product, index) in option.products"
                        >
                            <?php if (isset($component)) { $__componentOriginal53af403f6b2179a3039d488b8ab2a267 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53af403f6b2179a3039d488b8ab2a267 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.control','data' => ['type' => 'checkbox',':name' => '\'bundle_options[\' + option.id + \'][]\'',':for' => '\'bundle_options[\' + option.id + \'][\' + index + \']\'',':id' => '\'bundle_options[\' + option.id + \'][\' + index + \']\'',':value' => 'product.id','vModel' => 'selectedProduct',':rules' => '{\'required\': option.is_required}',':label' => 'option.label']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'checkbox',':name' => '\'bundle_options[\' + option.id + \'][]\'',':for' => '\'bundle_options[\' + option.id + \'][\' + index + \']\'',':id' => '\'bundle_options[\' + option.id + \'][\' + index + \']\'',':value' => 'product.id','v-model' => 'selectedProduct',':rules' => '{\'required\': option.is_required}',':label' => 'option.label']); ?>
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
                                :for="'bundle_options[' + option.id + '][' + index + ']'"
                            >
                                {{ product.name }}

                                <span class="text-black dark:text-white">
                                    {{ '+ ' + product.price.final.formatted_price }}
                                </span>
                            </label>
                        </div>
                    </div>
                </template>

                <?php if (isset($component)) { $__componentOriginal8da25fb6534e2ef288914e35c32417f8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8da25fb6534e2ef288914e35c32417f8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.error','data' => [':name' => '\'bundle_options[\' + option.id + \'][]\'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([':name' => '\'bundle_options[\' + option.id + \'][]\'']); ?>
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

            <template v-if="['select', 'radio'].includes(option.type)">
                <?php if (isset($component)) { $__componentOriginal983b1d701666b336441f5e6ffe588221 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal983b1d701666b336441f5e6ffe588221 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.quantity-changer.index','data' => [':name' => '\'bundle_option_qty[\' + option?.id + \']\'',':value' => 'productQty','class' => 'mt-5 w-max gap-x-4 rounded-l px-4 py-1','@change' => 'qtyUpdated($event)']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::quantity-changer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([':name' => '\'bundle_option_qty[\' + option?.id + \']\'',':value' => 'productQty','class' => 'mt-5 w-max gap-x-4 rounded-l px-4 py-1','@change' => 'qtyUpdated($event)']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal983b1d701666b336441f5e6ffe588221)): ?>
<?php $attributes = $__attributesOriginal983b1d701666b336441f5e6ffe588221; ?>
<?php unset($__attributesOriginal983b1d701666b336441f5e6ffe588221); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal983b1d701666b336441f5e6ffe588221)): ?>
<?php $component = $__componentOriginal983b1d701666b336441f5e6ffe588221; ?>
<?php unset($__componentOriginal983b1d701666b336441f5e6ffe588221); ?>
<?php endif; ?>
            </template>
        </div>
    </script>

    <script type="module">
        app.component('v-product-bundle-options', {
            template: '#v-product-bundle-options-template',

            props: ['errors', 'productOptions'],

            data: function() {
                return {
                    config: [],

                    isLoading: false,

                    bundleOptions: [],

                    options: [],
                }
            },

            computed: {
                formattedTotalPrice: function() {
                    var total = 0;

                    for (var key in this.options) {
                        for (var key1 in this.options[key].products) {
                            if (! this.options[key].products[key1].is_default)
                                continue;

                            total += this.options[key].products[key1].qty * this.options[key].products[key1].price.final.price;
                        }
                    }

                    return this.$admin.formatPrice(total);
                }
            },

            mounted() {
                this.getOptions();
            },

            methods: {
                getOptions() {
                    this.isLoading = true;

                    this.$axios.get("<?php echo e(route('admin.catalog.products.bundle.options', ':replace')); ?>".replace(':replace', this.productOptions.product.id))
                        .then(response => {
                            this.config = response.data.data;

                            for (var key in this.config.options) {
                                this.options.push(this.config.options[key]);
                            }

                            this.isLoading = false;
                        })
                        .catch(error => {});
                },

                productSelected: function(option, value) {
                    var selectedProductIds = Array.isArray(value) ? value : [value];

                    for (var key in option.products) {
                        option.products[key].is_default = selectedProductIds.indexOf(option.products[key].id) > -1 ? 1 : 0;
                    }
                }
            }
        });

        app.component('v-product-bundle-option-item', {
            template: '#v-product-bundle-option-item-template',

            props: ['option', 'errors'],

            data: function() {
                return {
                    selectedProduct: (this.option.type == 'checkbox' || this.option.type == 'multiselect')  ? [] : null,
                };
            },

            computed: {
                productQty: function() {
                    let qty = 0;

                    this.option.products.forEach((product, key) => {
                        if (this.selectedProduct == product.id) {
                            qty =  this.option.products[key].qty;
                        }
                    });

                    return qty;
                }
            },

            watch: {
                selectedProduct: function (value) {
                    this.$emit('onProductSelected', value);
                }
            },

            created: function() {
                for (var key in this.option.products) {
                    if (! this.option.products[key].is_default)
                        continue;

                    if (this.option.type == 'checkbox' || this.option.type == 'multiselect') {
                        this.selectedProduct.push(this.option.products[key].id)
                    } else {
                        this.selectedProduct = this.option.products[key].id
                    }
                }
            },

            methods: {
                qtyUpdated: function(qty) {
                    if (! this.option.products.find(data => data.id == this.selectedProduct)) {
                        return;
                    }

                    this.option.products.find(data => data.id == this.selectedProduct).qty = qty;
                }
            }
        });
    </script>
<?php $__env->stopPush(); endif; ?><?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Admin\src/resources/views/sales/orders/create/types/bundle.blade.php ENDPATH**/ ?>