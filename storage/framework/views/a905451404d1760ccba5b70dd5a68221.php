<?php echo view_render_event('bagisto.admin.sales.order.create.types.configurable.before'); ?>


<v-product-configurable-options
    :errors="errors"
    :product-options="selectedProductOptions"
></v-product-configurable-options>

<?php echo view_render_event('bagisto.admin.sales.order.create.types.configurable.after'); ?>


<?php if (! $__env->hasRenderedOnce('2a3482eb-ba8c-42ef-8603-828d7dab3099')): $__env->markAsRenderedOnce('2a3482eb-ba8c-42ef-8603-828d7dab3099');
$__env->startPush('scripts'); ?>
    <script
        type="text/x-template"
        id="v-product-configurable-options-template"
    >
        <div class="w-[455px] max-w-full p-4">
            <?php if (isset($component)) { $__componentOriginal53af403f6b2179a3039d488b8ab2a267 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53af403f6b2179a3039d488b8ab2a267 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.control','data' => ['type' => 'hidden','name' => 'selected_configurable_option','vModel' => 'selectedProductId']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'hidden','name' => 'selected_configurable_option','v-model' => 'selectedProductId']); ?>
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

            <template v-for='(attribute, index) in childAttributes'>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.label','data' => ['class' => 'required !mt-0']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'required !mt-0']); ?>
                        {{ attribute.label }}
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.control','data' => ['type' => 'select',':name' => '\'super_attribute[\' + attribute.id + \']\'','rules' => 'required',':disabled' => 'attribute.disabled',':label' => 'attribute.label','@change' => 'configure(attribute, $event.target.value)']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'select',':name' => '\'super_attribute[\' + attribute.id + \']\'','rules' => 'required',':disabled' => 'attribute.disabled',':label' => 'attribute.label','@change' => 'configure(attribute, $event.target.value)']); ?>
                        <option
                            v-for='(option, index) in attribute.options'
                            :value="option.id"
                            :selected="index == attribute.selectedIndex"
                        >
                            {{ option.label }}
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.error','data' => [':name' => '\'super_attribute[\' + attribute.id + \']\'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([':name' => '\'super_attribute[\' + attribute.id + \']\'']); ?>
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
            </template>
        </div>
    </script>

    <script type="module">
        app.component('v-product-configurable-options', {
            template: '#v-product-configurable-options-template',

            props: ['errors', 'productOptions'],

            data() {
                return {
                    config: [],

                    isLoading: false,

                    childAttributes: [],

                    selectedProductId: '',

                    simpleProduct: null,
                }
            },

            watch: {
                simpleProduct: {
                    deep: true,

                    handler(selectedProduct) {
                        if (selectedProduct) {
                            return;
                        }
                    },
                },
            },

            mounted() {
                this.getAttibuteOptions();
            },

            methods: {
                getAttibuteOptions() {
                    this.isLoading = true;

                    this.$axios.get("<?php echo e(route('admin.catalog.products.configurable.options', ':replace')); ?>".replace(':replace', this.productOptions.product.id))
                        .then(response => {
                            this.config = response.data.data;

                            this.prepareAttributes();

                            this.isLoading = false;
                        })
                        .catch(error => {});
                },

                prepareAttributes() {
                    let config = JSON.parse(JSON.stringify(this.config));

                    let childAttributes = this.childAttributes,
                        attributes = config.attributes.slice(),
                        index = attributes.length,
                        attribute;

                    while (index--) {
                        attribute = attributes[index];

                        attribute.options = [];

                        if (index) {
                            attribute.disabled = true;
                        } else {
                            this.fillSelect(attribute);
                        }

                        attribute = Object.assign(attribute, {
                            childAttributes: childAttributes.slice(),
                            prevAttribute: attributes[index - 1],
                            nextAttribute: attributes[index + 1]
                        });

                        childAttributes.unshift(attribute);
                    }
                },

                configure(attribute, value) {
                    this.simpleProduct = this.getSelectedProductId(attribute, value);

                    if (value) {
                        attribute.selectedIndex = this.getSelectedIndex(attribute, value);

                        if (attribute.nextAttribute) {
                            attribute.nextAttribute.disabled = false;

                            this.fillSelect(attribute.nextAttribute);

                            this.resetChildren(attribute.nextAttribute);
                        } else {
                            this.selectedProductId = this.simpleProduct;
                        }
                    } else {
                        attribute.selectedIndex = 0;

                        this.resetChildren(attribute);

                        this.clearSelect(attribute.nextAttribute)
                    }
                },

                getSelectedIndex(attribute, value) {
                    let selectedIndex = 0;

                    attribute.options.forEach(function(option, index) {
                        if (option.id == value) {
                            selectedIndex = index;
                        }
                    })

                    return selectedIndex;
                },

                getSelectedProductId(attribute, value) {
                    let options = attribute.options,
                        matchedOptions;

                    matchedOptions = options.filter(function (option) {
                        return option.id == value;
                    });

                    if (matchedOptions[0] != undefined && matchedOptions[0].allowedProducts != undefined) {
                        return matchedOptions[0].allowedProducts[0];
                    }

                    return undefined;
                },

                fillSelect(attribute) {
                    let options = this.getAttributeOptions(attribute.id),
                        prevOption,
                        index = 1,
                        allowedProducts,
                        i,
                        j;

                    this.clearSelect(attribute)

                    attribute.options = [{
                        'id': '',
                        'label': "<?php echo app('translator')->get('admin::app.sales.orders.create.types.configurable.select-options'); ?>",
                        'products': []
                    }];

                    if (attribute.prevAttribute) {
                        prevOption = attribute.prevAttribute.options[attribute.prevAttribute.selectedIndex];
                    }

                    if (options) {
                        for (i = 0; i < options.length; i++) {
                            allowedProducts = [];

                            if (prevOption) {
                                for (j = 0; j < options[i].products.length; j++) {
                                    if (prevOption.allowedProducts && prevOption.allowedProducts.indexOf(options[i].products[j]) > -1) {
                                        allowedProducts.push(options[i].products[j]);
                                    }
                                }
                            } else {
                                allowedProducts = options[i].products.slice(0);
                            }

                            if (allowedProducts.length > 0) {
                                options[i].allowedProducts = allowedProducts;

                                attribute.options[index] = options[i];

                                index++;
                            }
                        }
                    }
                },

                resetChildren(attribute) {
                    if (attribute.childAttributes) {
                        attribute.childAttributes.forEach(function (set) {
                            set.selectedIndex = 0;
                            set.disabled = true;
                        });
                    }
                },

                clearSelect (attribute) {
                    if (! attribute)
                        return;

                    if (! attribute.swatch_type || attribute.swatch_type == '' || attribute.swatch_type == 'dropdown') {
                        let element = document.getElementById("attribute_" + attribute.id);

                        if (element) {
                            element.selectedIndex = "0";
                        }
                    } else {
                        let elements = document.getElementsByName('super_attribute[' + attribute.id + ']');

                        let self = this;

                        elements.forEach(function(element) {
                            element.checked = false;
                        })
                    }
                },

                getAttributeOptions (attributeId) {
                    let self = this,
                        options;

                    this.config.attributes.forEach(function(attribute, index) {
                        if (attribute.id == attributeId) {
                            options = attribute.options;
                        }
                    })

                    return options;
                },
            }
        });

    </script>
<?php $__env->stopPush(); endif; ?><?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Admin\src\Resources\views\sales\orders\create\types\configurable.blade.php ENDPATH**/ ?>