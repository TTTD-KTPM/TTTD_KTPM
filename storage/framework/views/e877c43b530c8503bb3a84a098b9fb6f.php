<?php if (isset($component)) { $__componentOriginal4c4dbe009fe892108b054e8b47e63427 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4c4dbe009fe892108b054e8b47e63427 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.layouts.account.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::layouts.account'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <!-- Page Title -->
     <?php $__env->slot('title', null, []); ?> 
        <?php echo app('translator')->get('shop::app.customers.account.wishlist.page-title'); ?>
     <?php $__env->endSlot(); ?>

    <!-- Breadcrumbs -->
    <?php if((core()->getConfigData('general.general.breadcrumbs.shop'))): ?>
        <?php $__env->startSection('breadcrumbs'); ?>
            <?php if (isset($component)) { $__componentOriginaldef12fd0653509715c3bc62a609dde73 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldef12fd0653509715c3bc62a609dde73 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.breadcrumbs.index','data' => ['name' => 'wishlist']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::breadcrumbs'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'wishlist']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldef12fd0653509715c3bc62a609dde73)): ?>
<?php $attributes = $__attributesOriginaldef12fd0653509715c3bc62a609dde73; ?>
<?php unset($__attributesOriginaldef12fd0653509715c3bc62a609dde73); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldef12fd0653509715c3bc62a609dde73)): ?>
<?php $component = $__componentOriginaldef12fd0653509715c3bc62a609dde73; ?>
<?php unset($__componentOriginaldef12fd0653509715c3bc62a609dde73); ?>
<?php endif; ?>
        <?php $__env->stopSection(); ?>
    <?php endif; ?>

    <div class="max-md:hidden">
        <?php if (isset($component)) { $__componentOriginalf60f1298dff473a76a071049d503ffbb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf60f1298dff473a76a071049d503ffbb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.layouts.account.navigation','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::layouts.account.navigation'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf60f1298dff473a76a071049d503ffbb)): ?>
<?php $attributes = $__attributesOriginalf60f1298dff473a76a071049d503ffbb; ?>
<?php unset($__attributesOriginalf60f1298dff473a76a071049d503ffbb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf60f1298dff473a76a071049d503ffbb)): ?>
<?php $component = $__componentOriginalf60f1298dff473a76a071049d503ffbb; ?>
<?php unset($__componentOriginalf60f1298dff473a76a071049d503ffbb); ?>
<?php endif; ?>
    </div>

    <div class="mx-4 flex-auto">
        <!-- Wishlist Vue Component -->
        <v-wishlist-products>
            <!-- Wishlist Shimmer Effect -->
            <?php if (isset($component)) { $__componentOriginalc59d3fee66f47244b93f57a17fef3c46 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc59d3fee66f47244b93f57a17fef3c46 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.shimmer.customers.account.wishlist.index','data' => ['count' => 4]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::shimmer.customers.account.wishlist'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['count' => 4]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc59d3fee66f47244b93f57a17fef3c46)): ?>
<?php $attributes = $__attributesOriginalc59d3fee66f47244b93f57a17fef3c46; ?>
<?php unset($__attributesOriginalc59d3fee66f47244b93f57a17fef3c46); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc59d3fee66f47244b93f57a17fef3c46)): ?>
<?php $component = $__componentOriginalc59d3fee66f47244b93f57a17fef3c46; ?>
<?php unset($__componentOriginalc59d3fee66f47244b93f57a17fef3c46); ?>
<?php endif; ?>
        </v-wishlist-products>
    </div>

    <?php if (! $__env->hasRenderedOnce('0a416f3d-9004-4dbb-a681-a7b9b9aa4642')): $__env->markAsRenderedOnce('0a416f3d-9004-4dbb-a681-a7b9b9aa4642');
$__env->startPush('scripts'); ?>
        <script
            type="text/x-template"
            id="v-wishlist-products-template"
        >
            <div>
                <!-- Wishlist Shimmer Effect -->
                <template v-if="isLoading">
                    <?php if (isset($component)) { $__componentOriginalc59d3fee66f47244b93f57a17fef3c46 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc59d3fee66f47244b93f57a17fef3c46 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.shimmer.customers.account.wishlist.index','data' => ['count' => 4]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::shimmer.customers.account.wishlist'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['count' => 4]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc59d3fee66f47244b93f57a17fef3c46)): ?>
<?php $attributes = $__attributesOriginalc59d3fee66f47244b93f57a17fef3c46; ?>
<?php unset($__attributesOriginalc59d3fee66f47244b93f57a17fef3c46); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc59d3fee66f47244b93f57a17fef3c46)): ?>
<?php $component = $__componentOriginalc59d3fee66f47244b93f57a17fef3c46; ?>
<?php unset($__componentOriginalc59d3fee66f47244b93f57a17fef3c46); ?>
<?php endif; ?>
                </template>

                <?php echo view_render_event('bagisto.shop.customers.account.wishlist.list.before'); ?>


                <!-- Wishlist Information -->
                <template v-else>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <!-- Back Button -->
                            <a
                                class="grid md:hidden"
                                href="<?php echo e(route('shop.customers.account.index')); ?>"
                            >
                                <span class="icon-arrow-left rtl:icon-arrow-right text-2xl"></span>
                            </a>

                            <h2 class="text-2xl font-medium max-md:text-xl max-sm:text-base ltr:ml-2.5 md:ltr:ml-0 rtl:mr-2.5 md:rtl:mr-0">
                                <?php echo app('translator')->get('shop::app.customers.account.wishlist.page-title'); ?>
                            </h2>
                        </div>

                        <?php echo view_render_event('bagisto.shop.customers.account.wishlist.delete_all.before'); ?>


                        <div
                            class="secondary-button border-zinc-200 px-5 py-3 font-normal max-md:rounded-lg max-md:py-2 max-sm:py-1.5 max-sm:text-sm"
                            @click="removeAll"
                            v-if="wishlistItems.length"
                        >
                            <?php echo app('translator')->get('shop::app.customers.account.wishlist.delete-all'); ?>
                        </div>

                        <?php echo view_render_event('bagisto.shop.customers.account.wishlist.delete_all.after'); ?>

                    </div>

                    <!-- Wishlist Items -->
                    <template v-if="wishlistItems.length">
                        <v-wishlist-products-item
                            v-for="(wishlist, index) in wishlistItems"
                            :wishlist="wishlist"
                            :key="wishlist.id"
                            @wishlist-items="(items) => wishlistItems = items"
                        >
                            <?php if (isset($component)) { $__componentOriginalc59d3fee66f47244b93f57a17fef3c46 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc59d3fee66f47244b93f57a17fef3c46 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.shimmer.customers.account.wishlist.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::shimmer.customers.account.wishlist'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc59d3fee66f47244b93f57a17fef3c46)): ?>
<?php $attributes = $__attributesOriginalc59d3fee66f47244b93f57a17fef3c46; ?>
<?php unset($__attributesOriginalc59d3fee66f47244b93f57a17fef3c46); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc59d3fee66f47244b93f57a17fef3c46)): ?>
<?php $component = $__componentOriginalc59d3fee66f47244b93f57a17fef3c46; ?>
<?php unset($__componentOriginalc59d3fee66f47244b93f57a17fef3c46); ?>
<?php endif; ?>
                        </v-wishlist-products-item>
                    </template>

                    <!-- Empty Wishlist -->
                    <template v-else>
                        <div class="m-auto grid w-full place-content-center items-center justify-items-center py-32 text-center">
                            <img
                                class="max-md:h-[100px] max-md:w-[100px]"
                                src="<?php echo e(bagisto_asset('images/wishlist.png')); ?>"
                                alt="Empty wishlist"
                            >

                            <p
                                class="text-xl max-md:text-sm"
                                role="heading"
                            >
                                <?php echo app('translator')->get('shop::app.customers.account.wishlist.empty'); ?>
                            </p>
                        </div>
                    </template>
                </template>

                <?php echo view_render_event('bagisto.shop.customers.account.wishlist.list.after'); ?>

            </div>
        </script>

        <script
            type="text/x-template"
            id="v-wishlist-products-item-template"
        >
            <div class="mt-8 flex flex-wrap gap-20 max-1060:flex-col max-md:my-5 max-md:last:mb-0">
                <div class="grid flex-1 gap-8 max-md:flex-none">
                    <div class="grid gap-y-6 max-md:gap-y-0">
                        <!-- Wishlist item -->
                        <div class="flex justify-between gap-x-2.5 border-b border-zinc-200 pb-5">
                            <div class="flex gap-x-5 max-md:w-full max-md:gap-x-5">
                                <div>
                                    <?php echo view_render_event('bagisto.shop.customers.account.wishlist.image.before'); ?>


                                    <a :href="`<?php echo e(route('shop.product_or_category.index', '')); ?>/${wishlist.product.url_key}`">
                                        <!-- Wishlist Item Image -->
                                        <img
                                            class="h-28 max-h-28 w-28 max-w-28 rounded-xl max-md:h-20 max-md:max-h-20 max-md:w-20 max-md:max-w-20"
                                            :src="wishlist.product.base_image.small_image_url"
                                            alt="Product Image"
                                        />
                                    </a>

                                    <?php echo view_render_event('bagisto.shop.customers.account.wishlist.image.after'); ?>

                                </div>

                                <div class="grid gap-y-2.5 max-md:w-full max-md:gap-y-0">
                                    <div class="flex justify-between">
                                        <p class="text-base font-medium max-md:text-sm">
                                            {{ wishlist.product.name }}
                                        </p>

                                        <span
                                            @click="remove"
                                            class="icon-bin hidden text-2xl max-md:block"
                                        ></span>
                                    </div>

                                    <!--Wishlist Item attributes -->
                                    <div
                                        class="flex flex-wrap gap-x-2.5 gap-y-1.5"
                                        v-if="wishlist.options?.attributes"
                                    >
                                        <div class="grid gap-2">
                                            <div>
                                                <p
                                                    class="flex cursor-pointer items-center gap-x-4 text-base"
                                                    @click="wishlist.option_show = ! wishlist.option_show"
                                                >
                                                    <?php echo app('translator')->get('shop::app.customers.account.wishlist.see-details'); ?>

                                                    <span
                                                        class="text-2xl"
                                                        :class="{
                                                            'icon-arrow-up': wishlist.option_show,
                                                            'icon-arrow-down': ! wishlist.option_show
                                                        }"
                                                    ></span>
                                                </p>
                                            </div>

                                            <div
                                                class="grid gap-2"
                                                v-show="wishlist.option_show"
                                            >
                                                <div v-for="option in wishlist.options?.attributes">
                                                    <p class="text-sm font-medium">
                                                        {{ option.attribute_name + ':' }}
                                                    </p>

                                                    <p class="text-sm">
                                                        <template v-if="option?.attribute_type === 'file'">
                                                            <a
                                                                :href="option.file_url"
                                                                class="text-blue-700"
                                                                target="_blank"
                                                                :download="option.file_name"
                                                            >
                                                                {{ option.file_name }}
                                                            </a>
                                                        </template>

                                                        <template v-else>
                                                            {{ option.option_label }}
                                                        </template>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="max-md:block md:hidden">
                                        <p
                                            class="text-lg font-semibold max-md:text-sm"
                                            v-html="wishlist.product.price_html"
                                        ></p>

                                        <?php echo view_render_event('bagisto.shop.customers.account.wishlist.remove_button.before'); ?>


                                        <!--Wishlist Item removed button-->
                                        <a
                                            class="flex cursor-pointer justify-end text-base text-blue-700 max-md:hidden"
                                            @click="remove"
                                        >
                                            <?php echo app('translator')->get('shop::app.customers.account.wishlist.remove'); ?>
                                        </a>

                                        <?php echo view_render_event('bagisto.shop.customers.account.wishlist.remove_button.after'); ?>

                                    </div>

                                    <?php echo view_render_event('bagisto.shop.customers.account.wishlist.perform_actions.before'); ?>


                                    <div class="flex gap-5 max-md:mt-2.5">
                                        <?php if (isset($component)) { $__componentOriginal6c50a43d549a14cd17ba26b5e08aa48c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6c50a43d549a14cd17ba26b5e08aa48c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.quantity-changer.index','data' => ['name' => 'quantity',':value' => 'wishlist.options.quantity ?? 1','class' => 'flex max-h-10 items-center gap-x-2.5 rounded-[54px] border border-navyBlue px-3.5 py-1.5 max-md:gap-x-1 max-md:px-1.5 max-md:py-1','@change' => '(qty) => wishlist.quantity = qty']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::quantity-changer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'quantity',':value' => 'wishlist.options.quantity ?? 1','class' => 'flex max-h-10 items-center gap-x-2.5 rounded-[54px] border border-navyBlue px-3.5 py-1.5 max-md:gap-x-1 max-md:px-1.5 max-md:py-1','@change' => '(qty) => wishlist.quantity = qty']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6c50a43d549a14cd17ba26b5e08aa48c)): ?>
<?php $attributes = $__attributesOriginal6c50a43d549a14cd17ba26b5e08aa48c; ?>
<?php unset($__attributesOriginal6c50a43d549a14cd17ba26b5e08aa48c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6c50a43d549a14cd17ba26b5e08aa48c)): ?>
<?php $component = $__componentOriginal6c50a43d549a14cd17ba26b5e08aa48c; ?>
<?php unset($__componentOriginal6c50a43d549a14cd17ba26b5e08aa48c); ?>
<?php endif; ?>

                                        <?php if(core()->getConfigData('sales.checkout.shopping_cart.cart_page')): ?>
                                            <!--Wishlist Item Move-to-cart-->
                                            <?php if (isset($component)) { $__componentOriginal30786825665921390a816ebee82cf580 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal30786825665921390a816ebee82cf580 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.button.index','data' => ['class' => 'primary-button max-h-10 w-max rounded-2xl px-6 py-1.5 text-center text-base max-md:px-4 max-md:py-1.5 max-md:text-sm','title' => trans('shop::app.customers.account.wishlist.move-to-cart'),':loading' => 'movingToCart',':disabled' => 'movingToCart','@click' => 'moveToCart']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'primary-button max-h-10 w-max rounded-2xl px-6 py-1.5 text-center text-base max-md:px-4 max-md:py-1.5 max-md:text-sm','title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('shop::app.customers.account.wishlist.move-to-cart')),':loading' => 'movingToCart',':disabled' => 'movingToCart','@click' => 'moveToCart']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal30786825665921390a816ebee82cf580)): ?>
<?php $attributes = $__attributesOriginal30786825665921390a816ebee82cf580; ?>
<?php unset($__attributesOriginal30786825665921390a816ebee82cf580); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal30786825665921390a816ebee82cf580)): ?>
<?php $component = $__componentOriginal30786825665921390a816ebee82cf580; ?>
<?php unset($__componentOriginal30786825665921390a816ebee82cf580); ?>
<?php endif; ?>
                                        <?php endif; ?>
                                    </div>

                                    <?php echo view_render_event('bagisto.shop.customers.account.wishlist.perform_actions.after'); ?>

                                </div>
                            </div>

                            <div class="max-md:hidden">
                                <p
                                    class="text-lg font-semibold"
                                    v-html="wishlist.product.price_html"
                                >
                                </p>

                                <a
                                    class="flex cursor-pointer justify-end text-base text-blue-700"
                                    @click="remove"
                                >
                                    <?php echo app('translator')->get('shop::app.customers.account.wishlist.remove'); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </script>

        <script type="module">
            app.component("v-wishlist-products", {
                template: '#v-wishlist-products-template',

                data() {
                    return {
                        isLoading: true,

                        wishlistItems: [],
                    };
                },

                mounted() {
                    this.get();
                },

                methods: {
                    get() {
                        this.$axios.get("<?php echo e(route('shop.api.customers.account.wishlist.index')); ?>")
                            .then(response => {
                                this.isLoading = false;

                                this.wishlistItems = response.data.data;
                            })
                            .catch(error => {});
                    },

                    removeAll() {
                        this.$emitter.emit('open-confirm-modal', {
                            agree: () => {
                                this.$axios.post("<?php echo e(route('shop.api.customers.account.wishlist.destroy_all')); ?>", {
                                        '_method': 'DELETE',
                                    })
                                    .then(response => {
                                        this.wishlistItems = [];

                                        this.$emitter.emit('add-flash', { type: 'success', message: response.data.data.message });
                                    })
                                    .catch(error => {});
                            },
                        });
                    },
                },
            });

            app.component('v-wishlist-products-item', {
                template: '#v-wishlist-products-item-template',

                props: ['wishlist'],

                emits: ['wishlist-items'],

                data() {
                    return {
                        movingToCart: false,
                    };
                },

                methods: {
                    remove() {
                        this.$emitter.emit('open-confirm-modal', {
                            agree: () => {
                                this.$axios
                                    .delete(`<?php echo e(route('shop.api.customers.account.wishlist.destroy', '')); ?>/${this.wishlist.id}`)
                                    .then(response => {
                                        this.$emit('wishlist-items', response.data.data);

                                        this.$emitter.emit('add-flash', { type: 'success', message: response.data.message });
                                    })
                                    .catch(error => {});
                            },
                        });
                    },

                    moveToCart() {
                        this.movingToCart = true;

                        const endpoint = `<?php echo e(route('shop.api.customers.account.wishlist.move_to_cart', ':wishlistId:')); ?>`.replace(':wishlistId:', this.wishlist.id);

                        this.$axios.post(endpoint, {
                                quantity: (this.wishlist.quantity ?? this.wishlist.options.quantity) ?? 1,
                                product_id: this.wishlist.product.id,
                            })
                            .then(response => {
                                if (response.data?.redirect) {
                                    this.$emitter.emit('add-flash', { type: 'warning', message: response.data.message });

                                    window.location.href = response.data.data;

                                    return;
                                }

                                this.$emit('wishlist-items', response.data.data?.wishlist);

                                this.$emitter.emit('update-mini-cart', response.data.data.cart);

                                this.$emitter.emit('add-flash', { type: 'success', message: response.data.message });

                                this.movingToCart = false;
                            })
                            .catch(error => {
                                this.movingToCart = false;

                                this.$emitter.emit('add-flash', { type: 'warning', message: error.response.data.message });
                            });
                    },
                },
            });
        </script>
    <?php $__env->stopPush(); endif; ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4c4dbe009fe892108b054e8b47e63427)): ?>
<?php $attributes = $__attributesOriginal4c4dbe009fe892108b054e8b47e63427; ?>
<?php unset($__attributesOriginal4c4dbe009fe892108b054e8b47e63427); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4c4dbe009fe892108b054e8b47e63427)): ?>
<?php $component = $__componentOriginal4c4dbe009fe892108b054e8b47e63427; ?>
<?php unset($__componentOriginal4c4dbe009fe892108b054e8b47e63427); ?>
<?php endif; ?>
<?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Shop\src\Resources\views\customers\account\wishlist\index.blade.php ENDPATH**/ ?>