<?php echo view_render_event('bagisto.admin.catalog.product.edit.form.categories.before', ['product' => $product]); ?>


<!-- Panel -->
<div class="box-shadow rounded bg-white p-4 dark:bg-gray-900">
    <!-- Panel Header -->
    <p class="mb-4 flex justify-between text-base font-semibold text-gray-800 dark:text-white">
        <?php echo app('translator')->get('admin::app.catalog.products.edit.categories.title'); ?>
    </p>

    <?php echo view_render_event('bagisto.admin.catalog.product.edit.form.categories.controls.before', ['product' => $product]); ?>


    <!-- Panel Content -->
    <div class="mb-5 text-sm text-gray-600 dark:text-gray-300">

        <v-product-categories>
            <?php if (isset($component)) { $__componentOriginalb4beef7df1b15d9a4369797cc87e2364 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb4beef7df1b15d9a4369797cc87e2364 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.shimmer.tree.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::shimmer.tree'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb4beef7df1b15d9a4369797cc87e2364)): ?>
<?php $attributes = $__attributesOriginalb4beef7df1b15d9a4369797cc87e2364; ?>
<?php unset($__attributesOriginalb4beef7df1b15d9a4369797cc87e2364); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb4beef7df1b15d9a4369797cc87e2364)): ?>
<?php $component = $__componentOriginalb4beef7df1b15d9a4369797cc87e2364; ?>
<?php unset($__componentOriginalb4beef7df1b15d9a4369797cc87e2364); ?>
<?php endif; ?>
        </v-product-categories>

    </div>

    <?php echo view_render_event('bagisto.admin.catalog.product.edit.form.categories.controls.after', ['product' => $product]); ?>

</div>

<?php echo view_render_event('bagisto.admin.catalog.product.edit.form.categories.after', ['product' => $product]); ?>


<?php if (! $__env->hasRenderedOnce('4200a254-f1ef-4afd-8563-3698069acc91')): $__env->markAsRenderedOnce('4200a254-f1ef-4afd-8563-3698069acc91');
$__env->startPush('scripts'); ?>
    <script
        type="text/x-template"
        id="v-product-categories-template"
    >
        <div>
            <template v-if="isLoading">
                <?php if (isset($component)) { $__componentOriginalb4beef7df1b15d9a4369797cc87e2364 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb4beef7df1b15d9a4369797cc87e2364 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.shimmer.tree.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::shimmer.tree'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb4beef7df1b15d9a4369797cc87e2364)): ?>
<?php $attributes = $__attributesOriginalb4beef7df1b15d9a4369797cc87e2364; ?>
<?php unset($__attributesOriginalb4beef7df1b15d9a4369797cc87e2364); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb4beef7df1b15d9a4369797cc87e2364)): ?>
<?php $component = $__componentOriginalb4beef7df1b15d9a4369797cc87e2364; ?>
<?php unset($__componentOriginalb4beef7df1b15d9a4369797cc87e2364); ?>
<?php endif; ?>
            </template>

            <template v-else>
                <?php if (isset($component)) { $__componentOriginal52aaa072e73f9e8f086096eec28d0063 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal52aaa072e73f9e8f086096eec28d0063 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.tree.view','data' => ['inputType' => 'checkbox','selectionType' => 'individual','nameField' => 'categories','idField' => 'id','valueField' => 'id',':items' => 'categories','value' => json_encode($product->categories->pluck('id')),'fallbackLocale' => config('app.fallback_locale')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::tree.view'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['input-type' => 'checkbox','selection-type' => 'individual','name-field' => 'categories','id-field' => 'id','value-field' => 'id',':items' => 'categories','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(json_encode($product->categories->pluck('id'))),'fallback-locale' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(config('app.fallback_locale'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal52aaa072e73f9e8f086096eec28d0063)): ?>
<?php $attributes = $__attributesOriginal52aaa072e73f9e8f086096eec28d0063; ?>
<?php unset($__attributesOriginal52aaa072e73f9e8f086096eec28d0063); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal52aaa072e73f9e8f086096eec28d0063)): ?>
<?php $component = $__componentOriginal52aaa072e73f9e8f086096eec28d0063; ?>
<?php unset($__componentOriginal52aaa072e73f9e8f086096eec28d0063); ?>
<?php endif; ?>
            </template>
        </div>
    </script>

    <script type="module">
        app.component('v-product-categories', {
            template: '#v-product-categories-template',

            data() {
                return {
                    isLoading: true,

                    categories: [],
                }
            },

            mounted() {
                this.get();
            },

            methods: {
                get() {
                    axios.get("<?php echo e(route('admin.catalog.categories.tree')); ?>", { // Update this line
                            params: {
                                channel: "<?php echo e($currentChannel->code); ?>",
                            }
                        })
                        .then(response => {
                            this.isLoading = false;

                            this.categories = response.data.data;
                        }).catch(error => {
                            console.log(error);
                        });
                }
            }
        });
    </script>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Admin\src\Resources\views\catalog\products\edit\categories.blade.php ENDPATH**/ ?>