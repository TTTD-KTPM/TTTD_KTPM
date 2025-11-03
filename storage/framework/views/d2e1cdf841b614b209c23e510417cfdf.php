<?php echo view_render_event('bagisto.shop.checkout.onepage.payment_methods.before'); ?>


<v-payment-methods
    :methods="paymentMethods"
    @processing="stepForward"
    @processed="stepProcessed"
>
    <?php if (isset($component)) { $__componentOriginal27d1292a99e0d106fe10d79161c30d5f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal27d1292a99e0d106fe10d79161c30d5f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.shimmer.checkout.onepage.payment-method','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::shimmer.checkout.onepage.payment-method'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal27d1292a99e0d106fe10d79161c30d5f)): ?>
<?php $attributes = $__attributesOriginal27d1292a99e0d106fe10d79161c30d5f; ?>
<?php unset($__attributesOriginal27d1292a99e0d106fe10d79161c30d5f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal27d1292a99e0d106fe10d79161c30d5f)): ?>
<?php $component = $__componentOriginal27d1292a99e0d106fe10d79161c30d5f; ?>
<?php unset($__componentOriginal27d1292a99e0d106fe10d79161c30d5f); ?>
<?php endif; ?>
</v-payment-methods>

<?php echo view_render_event('bagisto.shop.checkout.onepage.payment_methods.after'); ?>


<?php if (! $__env->hasRenderedOnce('5763439e-7a88-4291-8924-14b8ea071b80')): $__env->markAsRenderedOnce('5763439e-7a88-4291-8924-14b8ea071b80');
$__env->startPush('scripts'); ?>
    <script
        type="text/x-template"
        id="v-payment-methods-template"
    >
        <div class="mb-7 max-md:last:!mb-0">
            <template v-if="! methods">
                <!-- Payment Method shimmer Effect -->
                <?php if (isset($component)) { $__componentOriginal27d1292a99e0d106fe10d79161c30d5f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal27d1292a99e0d106fe10d79161c30d5f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.shimmer.checkout.onepage.payment-method','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::shimmer.checkout.onepage.payment-method'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal27d1292a99e0d106fe10d79161c30d5f)): ?>
<?php $attributes = $__attributesOriginal27d1292a99e0d106fe10d79161c30d5f; ?>
<?php unset($__attributesOriginal27d1292a99e0d106fe10d79161c30d5f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal27d1292a99e0d106fe10d79161c30d5f)): ?>
<?php $component = $__componentOriginal27d1292a99e0d106fe10d79161c30d5f; ?>
<?php unset($__componentOriginal27d1292a99e0d106fe10d79161c30d5f); ?>
<?php endif; ?>
            </template>
    
            <template v-else>
                <?php echo view_render_event('bagisto.shop.checkout.onepage.payment_method.accordion.before'); ?>


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
                                <?php echo app('translator')->get('shop::app.checkout.onepage.payment.payment-method'); ?>
                            </h2>
                        </div>
                     <?php $__env->endSlot(); ?>
    
                    <!-- Accordion Blade Component Content -->
                     <?php $__env->slot('content', null, ['class' => 'mt-8 !p-0 max-md:mt-0 max-md:rounded-t-none max-md:border max-md:border-t-0 max-md:!p-4']); ?> 
                        <div class="flex flex-wrap gap-7 max-md:gap-4 max-sm:gap-2.5">
                            <div 
                                class="relative cursor-pointer max-md:max-w-full max-md:flex-auto"
                                v-for="(payment, index) in methods"
                            >
                                <?php echo view_render_event('bagisto.shop.checkout.payment-method.before'); ?>


                                <input 
                                    type="radio" 
                                    name="payment[method]" 
                                    :value="payment.payment"
                                    :id="payment.method"
                                    class="peer hidden"
                                    @change="store(payment)"
                                >
    
                                <label 
                                    :for="payment.method" 
                                    class="icon-radio-unselect peer-checked:icon-radio-select absolute top-5 cursor-pointer text-2xl text-navyBlue ltr:right-5 rtl:left-5"
                                >
                                </label>

                                <label 
                                    :for="payment.method" 
                                    class="block w-[190px] cursor-pointer rounded-xl border border-zinc-200 p-5 max-md:flex max-md:w-full max-md:gap-5 max-md:rounded-lg max-sm:gap-4 max-sm:px-4 max-sm:py-2.5"
                                >
                                    <?php echo view_render_event('bagisto.shop.checkout.onepage.payment-method.image.before'); ?>


                                    <img
                                        class="max-h-11 max-w-14"
                                        :src="payment.image"
                                        width="55"
                                        height="55"
                                        :alt="payment.method_title"
                                        :title="payment.method_title"
                                    />

                                    <?php echo view_render_event('bagisto.shop.checkout.onepage.payment-method.image.after'); ?>


                                    <div>
                                        <?php echo view_render_event('bagisto.shop.checkout.onepage.payment-method.title.before'); ?>


                                        <p class="mt-1.5 text-sm font-semibold max-md:mt-1 max-sm:mt-0">
                                            {{ payment.method_title }}
                                        </p>
                                        
                                        <?php echo view_render_event('bagisto.shop.checkout.onepage.payment-method.title.after'); ?>


                                        <?php echo view_render_event('bagisto.shop.checkout.onepage.payment-method.description.before'); ?>


                                        <p class="mt-2.5 text-xs font-medium text-zinc-500 max-md:mt-1 max-sm:mt-0">
                                            {{ payment.description }}
                                        </p> 

                                        <?php echo view_render_event('bagisto.shop.checkout.onepage.payment-method.description.after'); ?>

    
                                    </div>
                                </label>

                                <?php echo view_render_event('bagisto.shop.checkout.payment-method.after'); ?>


                                <!-- Todo implement the additionalDetails -->
                                
                            </div>
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

                <?php echo view_render_event('bagisto.shop.checkout.onepage.payment_method.accordion.after'); ?>

            </template>
        </div>
    </script>

    <script type="module">
        app.component('v-payment-methods', {
            template: '#v-payment-methods-template',

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
                    this.$emit('processing', 'review');

                    this.$axios.post("<?php echo e(route('shop.checkout.onepage.payment_methods.store')); ?>", {
                            payment: selectedMethod
                        })
                        .then(response => {
                            this.$emit('processed', response.data.cart);

                            // Used in mobile view. 
                            if (window.innerWidth <= 768) {
                                window.scrollTo({
                                    top: document.body.scrollHeight,
                                    behavior: 'smooth'
                                });
                            }
                        })
                        .catch(error => {
                            this.$emit('processing', 'payment');

                            if (error.response.data.redirect_url) {
                                window.location.href = error.response.data.redirect_url;
                            }
                        });
                },
            },
        });
    </script>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Shop\src\Resources\views\checkout\onepage\payment.blade.php ENDPATH**/ ?>