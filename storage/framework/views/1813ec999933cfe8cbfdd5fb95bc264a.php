<?php echo view_render_event('bagisto.shop.checkout.onepage.shipping_methods.before'); ?>


<v-shipping-methods
    :methods="shippingMethods"
    @processing="stepForward"
    @processed="stepProcessed"
>
    <!-- Shipping Method Shimmer Effect -->
    <?php if (isset($component)) { $__componentOriginald87fc392b8affb87fbc8104a00c8e1ff = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald87fc392b8affb87fbc8104a00c8e1ff = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.shimmer.checkout.onepage.shipping-method','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::shimmer.checkout.onepage.shipping-method'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald87fc392b8affb87fbc8104a00c8e1ff)): ?>
<?php $attributes = $__attributesOriginald87fc392b8affb87fbc8104a00c8e1ff; ?>
<?php unset($__attributesOriginald87fc392b8affb87fbc8104a00c8e1ff); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald87fc392b8affb87fbc8104a00c8e1ff)): ?>
<?php $component = $__componentOriginald87fc392b8affb87fbc8104a00c8e1ff; ?>
<?php unset($__componentOriginald87fc392b8affb87fbc8104a00c8e1ff); ?>
<?php endif; ?>
</v-shipping-methods>

<?php echo view_render_event('bagisto.shop.checkout.onepage.shipping_methods.after'); ?>


<?php if (! $__env->hasRenderedOnce('30f6ee17-c7e2-41f2-91c0-ba222c33d6ac')): $__env->markAsRenderedOnce('30f6ee17-c7e2-41f2-91c0-ba222c33d6ac');
$__env->startPush('scripts'); ?>
    <script
        type="text/x-template"
        id="v-shipping-methods-template"
    >
        <div class="mb-7 max-md:mb-0">
            <template v-if="! methods">
                <!-- Shipping Method Shimmer Effect -->
                <?php if (isset($component)) { $__componentOriginald87fc392b8affb87fbc8104a00c8e1ff = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald87fc392b8affb87fbc8104a00c8e1ff = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.shimmer.checkout.onepage.shipping-method','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::shimmer.checkout.onepage.shipping-method'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald87fc392b8affb87fbc8104a00c8e1ff)): ?>
<?php $attributes = $__attributesOriginald87fc392b8affb87fbc8104a00c8e1ff; ?>
<?php unset($__attributesOriginald87fc392b8affb87fbc8104a00c8e1ff); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald87fc392b8affb87fbc8104a00c8e1ff)): ?>
<?php $component = $__componentOriginald87fc392b8affb87fbc8104a00c8e1ff; ?>
<?php unset($__componentOriginald87fc392b8affb87fbc8104a00c8e1ff); ?>
<?php endif; ?>
            </template>

            <template v-else>
                <!-- Accordion Blade Component -->
                <?php if (isset($component)) { $__componentOriginald3ba50c765d00f082351f5b73fecce50 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald3ba50c765d00f082351f5b73fecce50 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.accordion.index','data' => ['class' => 'overflow-hidden !border-b-0 max-md:rounded-lg max-md:!border-none max-md:!bg-gray-100']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::accordion'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'overflow-hidden !border-b-0 max-md:rounded-lg max-md:!border-none max-md:!bg-gray-100']); ?>
                    <!-- Accordion Blade Component Header -->
                     <?php $__env->slot('header', null, ['class' => 'px-0 py-4 max-md:p-3 max-md:text-sm max-md:font-medium max-sm:p-2']); ?> 
                        <div class="flex items-center justify-between">
                            <h2 class="text-2xl font-medium max-md:text-base">
                                <?php echo app('translator')->get('shop::app.checkout.onepage.shipping.shipping-method'); ?>
                            </h2>
                        </div>
                     <?php $__env->endSlot(); ?>

                    <!-- Accordion Blade Component Content -->
                     <?php $__env->slot('content', null, ['class' => 'mt-8 !p-0 max-md:mt-0 max-md:rounded-t-none max-md:border max-md:border-t-0 max-md:!p-4']); ?> 
                        <div class="flex flex-wrap gap-8 max-md:gap-4 max-sm:gap-2.5">
                            <template v-for="method in methods">
                                <?php echo view_render_event('bagisto.shop.checkout.onepage.shipping_method.before'); ?>


                                <div
                                    class="relative max-w-[218px] select-none max-md:max-w-full max-md:flex-auto"
                                    v-for="rate in method.rates"
                                >
                                    <input 
                                        type="radio"
                                        name="shipping_method"
                                        :id="rate.method"
                                        :value="rate.method"
                                        class="peer hidden"
                                        @change="store(rate.method)"
                                    >

                                    <label 
                                        class="icon-radio-unselect peer-checked:icon-radio-select absolute top-5 cursor-pointer text-2xl text-navyBlue ltr:right-5 rtl:left-5"
                                        :for="rate.method"
                                    >
                                    </label>

                                    <label 
                                        class="block cursor-pointer rounded-xl border border-zinc-200 p-5 max-sm:flex max-sm:gap-4 max-sm:rounded-lg max-sm:px-4 max-sm:py-2.5"
                                        :for="rate.method"
                                    >
                                        <span class="icon-flate-rate text-6xl text-navyBlue max-sm:text-5xl"></span>

                                        <div>
                                            <p class="mt-1.5 text-2xl font-semibold max-md:text-base">
                                                {{ rate.base_formatted_price }}
                                            </p>
                                            
                                            <p class="mt-2.5 text-xs font-medium max-md:mt-1 max-sm:mt-0 max-sm:font-normal max-sm:text-zinc-500">
                                                <span class="font-medium">{{ rate.method_title }}</span> - {{ rate.method_description }}
                                            </p>
                                        </div>
                                    </label>
                                </div>

                                <?php echo view_render_event('bagisto.shop.checkout.onepage.shipping_method.after'); ?>

                            </template>
                        </div>
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
            </template>
        </div>
    </script>

    <script type="module">
        app.component('v-shipping-methods', {
            template: '#v-shipping-methods-template',

            props: {
                methods: {
                    type: Object,
                    required: true,
                    default: () => null,
                },
            },

            emits: ['processing', 'processed'],

            methods: {
                store(selectedMethod) {
                    this.$emit('processing', 'payment');

                    this.$axios.post("<?php echo e(route('shop.checkout.onepage.shipping_methods.store')); ?>", {    
                            shipping_method: selectedMethod,
                        })
                        .then(response => {
                            if (response.data.redirect_url) {
                                window.location.href = response.data.redirect_url;
                            } else {
                                this.$emit('processed', response.data.payment_methods);
                            }
                        })
                        .catch(error => {
                            this.$emit('processing', 'shipping');

                            if (error.response.data.redirect_url) {
                                window.location.href = error.response.data.redirect_url;
                            }
                        });
                },
            },
        });
    </script>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Shop\src\Resources\views\checkout\onepage\shipping.blade.php ENDPATH**/ ?>