<!-- SEO Meta Content -->
<?php $__env->startPush('meta'); ?>
    <meta name="description" content="<?php echo app('translator')->get('shop::app.checkout.cart.index.cart'); ?>"/>

    <meta name="keywords" content="<?php echo app('translator')->get('shop::app.checkout.cart.index.cart'); ?>"/>
<?php $__env->stopPush(); ?>

<?php if (isset($component)) { $__componentOriginal2643b7d197f48caff2f606750db81304 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2643b7d197f48caff2f606750db81304 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.layouts.index','data' => ['hasHeader' => false,'hasFeature' => false,'hasFooter' => false]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::layouts'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['has-header' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false),'has-feature' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false),'has-footer' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false)]); ?>
    <!-- Page Title -->
     <?php $__env->slot('title', null, []); ?> 
        <?php echo app('translator')->get('shop::app.checkout.cart.index.cart'); ?>
     <?php $__env->endSlot(); ?>

    <?php echo view_render_event('bagisto.shop.checkout.cart.header.before'); ?>


    <!-- Page Header -->
    <div class="flex flex-wrap">
        <div class="flex w-full justify-between border border-b border-l-0 border-r-0 border-t-0 px-[60px] py-4 max-lg:px-8 max-md:px-4">
            <div class="flex items-center gap-x-14 max-[1180px]:gap-x-9">
                <?php echo view_render_event('bagisto.shop.checkout.cart.logo.before'); ?>


                <a
                    href="<?php echo e(route('shop.home.index')); ?>"
                    class="flex min-h-[30px]"
                    aria-label="<?php echo app('translator')->get('shop::app.checkout.cart.index.bagisto'); ?>"
                >
                    <img
                        src="<?php echo e(core()->getCurrentChannel()->logo_url ?? bagisto_asset('images/logo.svg')); ?>"
                        alt="<?php echo e(config('app.name')); ?>"
                        width="131"
                        height="29"
                    >
                </a>

                <?php echo view_render_event('bagisto.shop.checkout.cart.logo.after'); ?>

            </div>

            <?php if(auth()->guard('customer')->guest()): ?>
                <?php echo $__env->make('shop::checkout.login', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php endif; ?>
        </div>
    </div>

    <?php echo view_render_event('bagisto.shop.checkout.cart.header.after'); ?>


    <div class="flex-auto">
        <div class="container px-[60px] max-lg:px-8 max-md:px-4">

            <?php echo view_render_event('bagisto.shop.checkout.cart.breadcrumbs.before'); ?>


            <!-- Breadcrumbs -->
            <?php if((core()->getConfigData('general.general.breadcrumbs.shop'))): ?>
                <?php if (isset($component)) { $__componentOriginaldef12fd0653509715c3bc62a609dde73 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldef12fd0653509715c3bc62a609dde73 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.breadcrumbs.index','data' => ['name' => 'cart']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::breadcrumbs'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'cart']); ?>
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
            <?php endif; ?>

            <?php echo view_render_event('bagisto.shop.checkout.cart.breadcrumbs.after'); ?>


            <?php
                $errors = \Webkul\Checkout\Facades\Cart::getErrors();
            ?>

            <?php if(! empty($errors) && $errors['error_code'] === 'MINIMUM_ORDER_AMOUNT'): ?>
                <div class="mt-5 w-full gap-12 rounded-lg bg-[#FFF3CD] px-5 py-3 text-[#383D41] max-sm:px-3 max-sm:py-2 max-sm:text-sm">
                    <?php echo e($errors['message']); ?>: <?php echo e($errors['amount']); ?>

                </div>
            <?php endif; ?>

            <v-cart ref="vCart">
                <!-- Cart Shimmer Effect -->
                <?php if (isset($component)) { $__componentOriginal79f5de2ce8c947c8a98a12475d1bd385 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal79f5de2ce8c947c8a98a12475d1bd385 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.shimmer.checkout.cart.index','data' => ['count' => 3]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::shimmer.checkout.cart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['count' => 3]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal79f5de2ce8c947c8a98a12475d1bd385)): ?>
<?php $attributes = $__attributesOriginal79f5de2ce8c947c8a98a12475d1bd385; ?>
<?php unset($__attributesOriginal79f5de2ce8c947c8a98a12475d1bd385); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal79f5de2ce8c947c8a98a12475d1bd385)): ?>
<?php $component = $__componentOriginal79f5de2ce8c947c8a98a12475d1bd385; ?>
<?php unset($__componentOriginal79f5de2ce8c947c8a98a12475d1bd385); ?>
<?php endif; ?>
            </v-cart>
        </div>
    </div>

    <?php if(core()->getConfigData('sales.checkout.shopping_cart.cross_sell')): ?>
        <?php echo view_render_event('bagisto.shop.checkout.cart.cross_sell_carousel.before'); ?>


        <!-- Cross-sell Product Carousal -->
        <?php if (isset($component)) { $__componentOriginalc7b94830d947988d2b7058066254da2b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7b94830d947988d2b7058066254da2b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.products.carousel','data' => ['title' => trans('shop::app.checkout.cart.index.cross-sell.title'),'src' => route('shop.api.checkout.cart.cross-sell.index')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::products.carousel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('shop::app.checkout.cart.index.cross-sell.title')),'src' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('shop.api.checkout.cart.cross-sell.index'))]); ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc7b94830d947988d2b7058066254da2b)): ?>
<?php $attributes = $__attributesOriginalc7b94830d947988d2b7058066254da2b; ?>
<?php unset($__attributesOriginalc7b94830d947988d2b7058066254da2b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc7b94830d947988d2b7058066254da2b)): ?>
<?php $component = $__componentOriginalc7b94830d947988d2b7058066254da2b; ?>
<?php unset($__componentOriginalc7b94830d947988d2b7058066254da2b); ?>
<?php endif; ?>

        <?php echo view_render_event('bagisto.shop.checkout.cart.cross_sell_carousel.after'); ?>

    <?php endif; ?>

    <?php if (! $__env->hasRenderedOnce('ea570995-0343-45d4-ba24-8690d16affee')): $__env->markAsRenderedOnce('ea570995-0343-45d4-ba24-8690d16affee');
$__env->startPush('scripts'); ?>
        <script
            type="text/x-template"
            id="v-cart-template"
        >
            <div>
                <!-- Cart Shimmer Effect -->
                <template v-if="isLoading">
                    <?php if (isset($component)) { $__componentOriginal79f5de2ce8c947c8a98a12475d1bd385 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal79f5de2ce8c947c8a98a12475d1bd385 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.shimmer.checkout.cart.index','data' => ['count' => 3]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::shimmer.checkout.cart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['count' => 3]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal79f5de2ce8c947c8a98a12475d1bd385)): ?>
<?php $attributes = $__attributesOriginal79f5de2ce8c947c8a98a12475d1bd385; ?>
<?php unset($__attributesOriginal79f5de2ce8c947c8a98a12475d1bd385); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal79f5de2ce8c947c8a98a12475d1bd385)): ?>
<?php $component = $__componentOriginal79f5de2ce8c947c8a98a12475d1bd385; ?>
<?php unset($__componentOriginal79f5de2ce8c947c8a98a12475d1bd385); ?>
<?php endif; ?>
                </template>

                <!-- Cart Information -->
                <template v-else>
                    <div
                        class="mt-8 flex flex-wrap gap-20 pb-8 max-1060:flex-col max-md:mt-0 max-md:gap-[30px] max-md:pb-0"
                        v-if="cart?.items?.length"
                    >
                        <div class="flex flex-1 flex-col gap-6 max-md:gap-5">

                            <?php echo view_render_event('bagisto.shop.checkout.cart.cart_mass_actions.before'); ?>


                            <!-- Cart Mass Action Container -->
                            <div class="flex items-center justify-between border-b border-zinc-200 pb-2.5 max-md:py-2.5">
                                <div class="flex select-none items-center">
                                    <input
                                        type="checkbox"
                                        id="select-all"
                                        class="peer hidden"
                                        v-model="allSelected"
                                        @change="selectAll"
                                    >

                                    <label
                                        class="icon-uncheck peer-checked:icon-check-box cursor-pointer text-2xl text-navyBlue peer-checked:text-navyBlue"
                                        for="select-all"
                                        tabindex="0"
                                        aria-label="<?php echo app('translator')->get('shop::app.checkout.cart.index.select-all'); ?>"
                                        aria-labelledby="select-all-label"
                                    >
                                    </label>

                                    <span
                                        class="text-xl max-sm:text-sm ltr:ml-2.5 rtl:mr-2.5"
                                        role="heading"
                                        aria-level="2"
                                    >
                                        {{ "<?php echo app('translator')->get('shop::app.checkout.cart.index.items-selected'); ?>".replace(':count', selectedItemsCount) }}
                                    </span>
                                </div>

                                <div v-if="selectedItemsCount">
                                    <span
                                        class="cursor-pointer text-base text-blue-700 max-sm:text-xs"
                                        role="button"
                                        tabindex="0"
                                        @click="removeSelectedItems"
                                    >
                                        <?php echo app('translator')->get('shop::app.checkout.cart.index.remove'); ?>
                                    </span>

                                    <?php if(auth()->guard()->check()): ?>
                                        <span class="mx-2.5 border-r-2 border-zinc-200"></span>

                                        <span
                                            class="cursor-pointer text-base text-blue-700 max-sm:text-xs"
                                            role="button"
                                            tabindex="0"
                                            @click="moveToWishlistSelectedItems"
                                        >
                                            <?php echo app('translator')->get('shop::app.checkout.cart.index.move-to-wishlist'); ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <?php echo view_render_event('bagisto.shop.checkout.cart.cart_mass_actions.after'); ?>


                            <?php echo view_render_event('bagisto.shop.checkout.cart.item.listing.before'); ?>


                            <!-- Cart Item Listing Container -->
                            <div
                                class="grid gap-y-6"
                                v-for="item in cart?.items"
                            >
                                <div class="flex justify-between gap-x-2.5 border-b border-zinc-200 pb-5">
                                    <div class="flex gap-x-5">
                                        <div class="mt-11 select-none max-md:mt-9 max-sm:mt-7">
                                            <input
                                                type="checkbox"
                                                :id="'item_' + item.id"
                                                class="peer hidden"
                                                v-model="item.selected"
                                                @change="updateAllSelected"
                                            >

                                            <label
                                                class="icon-uncheck peer-checked:icon-check-box cursor-pointer text-2xl text-navyBlue peer-checked:text-navyBlue"
                                                :for="'item_' + item.id"
                                                tabindex="0"
                                                aria-label="<?php echo app('translator')->get('shop::app.checkout.cart.index.select-cart-item'); ?>"
                                                aria-labelledby="select-item-label"
                                            ></label>
                                        </div>

                                        <?php echo view_render_event('bagisto.shop.checkout.cart.item_image.before'); ?>


                                        <!-- Cart Item Image -->
                                        <a :href="`<?php echo e(route('shop.product_or_category.index', '')); ?>/${item.product_url_key}`">
                                            <?php if (isset($component)) { $__componentOriginal3657c70d06ebc8c078f4ecac2ea1a848 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3657c70d06ebc8c078f4ecac2ea1a848 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.media.images.lazy','data' => ['class' => 'h-[110px] max-w-[110px] rounded-xl max-md:h-20 max-md:max-w-20',':src' => 'item.base_image.small_image_url',':alt' => 'item.name','width' => '110','height' => '110',':key' => 'item.id',':index' => 'item.id']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::media.images.lazy'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-[110px] max-w-[110px] rounded-xl max-md:h-20 max-md:max-w-20',':src' => 'item.base_image.small_image_url',':alt' => 'item.name','width' => '110','height' => '110',':key' => 'item.id',':index' => 'item.id']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3657c70d06ebc8c078f4ecac2ea1a848)): ?>
<?php $attributes = $__attributesOriginal3657c70d06ebc8c078f4ecac2ea1a848; ?>
<?php unset($__attributesOriginal3657c70d06ebc8c078f4ecac2ea1a848); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3657c70d06ebc8c078f4ecac2ea1a848)): ?>
<?php $component = $__componentOriginal3657c70d06ebc8c078f4ecac2ea1a848; ?>
<?php unset($__componentOriginal3657c70d06ebc8c078f4ecac2ea1a848); ?>
<?php endif; ?>
                                        </a>

                                        <?php echo view_render_event('bagisto.shop.checkout.cart.item_image.after'); ?>


                                        <!-- Cart Item Options Container -->
                                        <div class="grid place-content-start gap-y-2.5 max-md:gap-y-0">
                                            <?php echo view_render_event('bagisto.shop.checkout.cart.item_name.before'); ?>


                                            <a :href="`<?php echo e(route('shop.product_or_category.index', '')); ?>/${item.product_url_key}`">
                                                <p class="text-base font-medium max-sm:text-sm">
                                                    {{ item.name }}
                                                </p>
                                            </a>

                                            <?php echo view_render_event('bagisto.shop.checkout.cart.item_name.after'); ?>


                                            <?php echo view_render_event('bagisto.shop.checkout.cart.item_details.before'); ?>


                                            <!-- Cart Item Options Container -->
                                            <div
                                                class="grid select-none gap-x-2.5 gap-y-1.5"
                                                v-if="item.options.length"
                                            >
                                                <!-- Details Toggler -->
                                                <div class="">
                                                    <p
                                                        class="flex cursor-pointer items-center gap-x-4 text-base max-md:gap-x-1.5 max-sm:text-xs"
                                                        @click="item.option_show = ! item.option_show"
                                                    >
                                                        <?php echo app('translator')->get('shop::app.checkout.cart.index.see-details'); ?>

                                                        <span
                                                            class="text-2xl max-md:text-lg"
                                                            :class="{'icon-arrow-up': item.option_show, 'icon-arrow-down': ! item.option_show}"
                                                        ></span>
                                                    </p>
                                                </div>

                                                <!-- Option Details -->
                                                <div
                                                    class="grid gap-2"
                                                    v-show="item.option_show"
                                                >
                                                    <template v-for="attribute in item.options">
                                                        <div class="max-md:grid max-md:gap-0.5">
                                                            <p class="text-sm font-medium text-zinc-500 max-md:font-normal max-sm:text-xs">
                                                                {{ attribute.attribute_name + ':' }}
                                                            </p>

                                                            <p class="text-sm max-sm:text-xs">
                                                                <template v-if="attribute?.attribute_type === 'file'">
                                                                    <a
                                                                        :href="attribute.file_url"
                                                                        class="text-blue-700"
                                                                        target="_blank"
                                                                        :download="attribute.file_name"
                                                                    >
                                                                        {{ attribute.file_name }}
                                                                    </a>
                                                                </template>

                                                                <template v-else>
                                                                    {{ attribute.option_label }}
                                                                </template>
                                                            </p>
                                                        </div>
                                                    </template>
                                                </div>
                                            </div>

                                            <?php echo view_render_event('bagisto.shop.checkout.cart.item_details.after'); ?>


                                            <?php echo view_render_event('bagisto.shop.checkout.cart.formatted_total.before'); ?>


                                            <div class="md:hidden">
                                                <p class="text-lg font-semibold max-md:text-sm">
                                                    <template v-if="displayTax.prices == 'including_tax'">
                                                            {{ item.formatted_total_incl_tax }}
                                                    </template>

                                                    <template v-else-if="displayTax.prices == 'both'">

                                                        {{ item.formatted_total_incl_tax }}
                                                        <span class="text-xs font-normal">
                                                            <?php echo app('translator')->get('shopTheme::app.checkout.cart.index.excl-tax'); ?>
                                                            <span class="font-medium">{{ item.formatted_total }}</span>
                                                        </span>

                                                    </template>

                                                    <template v-else>
                                                            {{ item.formatted_total }}
                                                    </template>
                                                </p>

                                                <span
                                                    class="cursor-pointer text-base text-blue-700 max-md:hidden"
                                                    role="button"
                                                    tabindex="0"
                                                    @click="removeItem(item.id)"
                                                >
                                                    <?php echo app('translator')->get('shop::app.checkout.cart.index.remove'); ?>
                                                </span>
                                            </div>

                                            <?php echo view_render_event('bagisto.shop.checkout.cart.formatted_total.after'); ?>


                                            <?php echo view_render_event('bagisto.shop.checkout.cart.quantity_changer.before'); ?>


                                            <div class="flex items-center gap-2.5 max-md:mt-2.5">
                                                <?php if (isset($component)) { $__componentOriginal6c50a43d549a14cd17ba26b5e08aa48c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6c50a43d549a14cd17ba26b5e08aa48c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.quantity-changer.index','data' => ['vIf' => 'item.can_change_qty','class' => 'flex max-w-max items-center gap-x-2.5 rounded-[54px] border border-navyBlue px-3.5 py-1.5 max-md:gap-x-1.5 max-md:px-1 max-md:py-0.5','name' => 'quantity',':value' => 'item?.quantity','@change' => 'setItemQuantity(item.id, $event)']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::quantity-changer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['v-if' => 'item.can_change_qty','class' => 'flex max-w-max items-center gap-x-2.5 rounded-[54px] border border-navyBlue px-3.5 py-1.5 max-md:gap-x-1.5 max-md:px-1 max-md:py-0.5','name' => 'quantity',':value' => 'item?.quantity','@change' => 'setItemQuantity(item.id, $event)']); ?>
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

                                                <!-- For Mobile view Remove Button -->
                                                <span
                                                    class="hidden cursor-pointer text-sm text-blue-700 max-md:block"
                                                    role="button"
                                                    tabindex="0"
                                                    @click="removeItem(item.id)"
                                                >
                                                    <?php echo app('translator')->get('shop::app.checkout.cart.index.remove'); ?>
                                                </span>
                                            </div>

                                            <?php echo view_render_event('bagisto.shop.checkout.cart.quantity_changer.after'); ?>

                                        </div>
                                    </div>

                                    <div class="text-right max-md:hidden">
                                        <?php echo view_render_event('bagisto.shop.checkout.cart.total.before'); ?>


                                        <template v-if="displayTax.prices == 'including_tax'">
                                            <p class="text-lg font-semibold">
                                                {{ item.formatted_total_incl_tax }}
                                            </p>
                                        </template>

                                        <template v-else-if="displayTax.prices == 'both'">
                                            <p class="flex flex-col text-lg font-semibold">
                                                {{ item.formatted_total_incl_tax }}

                                                <span class="text-xs font-normal">
                                                    <?php echo app('translator')->get('shop::app.checkout.cart.index.excl-tax'); ?>

                                                    <span class="font-medium">{{ item.formatted_total }}</span>
                                                </span>
                                            </p>
                                        </template>

                                        <template v-else>
                                            <p class="text-lg font-semibold">
                                                {{ item.formatted_total }}
                                            </p>
                                        </template>

                                        <?php echo view_render_event('bagisto.shop.checkout.cart.total.after'); ?>


                                        <?php echo view_render_event('bagisto.shop.checkout.cart.remove_button.before'); ?>


                                        <!-- Cart Item Remove Button -->
                                        <span
                                            class="cursor-pointer text-base text-blue-700"
                                            role="button"
                                            tabindex="0"
                                            @click="removeItem(item.id)"
                                        >
                                            <?php echo app('translator')->get('shop::app.checkout.cart.index.remove'); ?>
                                        </span>

                                        <?php echo view_render_event('bagisto.shop.checkout.cart.remove_button.after'); ?>

                                    </div>
                                </div>
                            </div>

                            <?php echo view_render_event('bagisto.shop.checkout.cart.item.listing.after'); ?>


                            <?php echo view_render_event('bagisto.shop.checkout.cart.controls.before'); ?>


                            <!-- Cart Item Actions -->
                            <div class="flex flex-wrap justify-end gap-8 max-md:justify-between max-md:gap-5">
                                <?php echo view_render_event('bagisto.shop.checkout.cart.continue_shopping.before'); ?>


                                <a
                                    class="secondary-button max-h-14 rounded-2xl max-md:rounded-lg max-md:px-6 max-md:py-3 max-md:text-sm max-sm:py-2"
                                    href="<?php echo e(route('shop.home.index')); ?>"
                                >
                                    <?php echo app('translator')->get('shop::app.checkout.cart.index.continue-shopping'); ?>
                                </a>

                                <?php echo view_render_event('bagisto.shop.checkout.cart.continue_shopping.after'); ?>


                                <?php echo view_render_event('bagisto.shop.checkout.cart.update_cart.before'); ?>


                                <?php if (isset($component)) { $__componentOriginal30786825665921390a816ebee82cf580 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal30786825665921390a816ebee82cf580 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.button.index','data' => ['class' => 'secondary-button max-h-14 rounded-2xl max-md:rounded-lg max-md:px-6 max-md:py-3 max-md:text-sm max-sm:py-2','title' => trans('shop::app.checkout.cart.index.update-cart'),':loading' => 'isStoring',':disabled' => 'isStoring','@click' => 'update()']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'secondary-button max-h-14 rounded-2xl max-md:rounded-lg max-md:px-6 max-md:py-3 max-md:text-sm max-sm:py-2','title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('shop::app.checkout.cart.index.update-cart')),':loading' => 'isStoring',':disabled' => 'isStoring','@click' => 'update()']); ?>
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

                                <?php echo view_render_event('bagisto.shop.checkout.cart.update_cart.after'); ?>

                            </div>

                            <?php echo view_render_event('bagisto.shop.checkout.cart.controls.after'); ?>

                        </div>

                        <?php echo view_render_event('bagisto.shop.checkout.cart.summary.before'); ?>


                        <!-- Cart Summary Blade File -->
                        <?php echo $__env->make('shop::checkout.cart.summary', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                        <?php echo view_render_event('bagisto.shop.checkout.cart.summary.after'); ?>

                    </div>

                    <!-- Empty Cart Section -->
                    <div
                        class="m-auto grid w-full place-content-center items-center justify-items-center py-32 text-center"
                        v-else
                    >
                        <img
                            class="max-md:h-[100px] max-md:w-[100px]"
                            src="<?php echo e(bagisto_asset('images/thank-you.png')); ?>"
                            alt="<?php echo app('translator')->get('shop::app.checkout.cart.index.empty-product'); ?>"
                            loading="lazy"
                            decoding="async"
                        />

                        <p
                            class="text-xl max-md:text-sm"
                            role="heading"
                        >
                            <?php echo app('translator')->get('shop::app.checkout.cart.index.empty-product'); ?>
                        </p>
                    </div>
                </template>
            </div>
        </script>

        <script type="module">
            app.component("v-cart", {
                template: '#v-cart-template',

                data() {
                    return  {
                        cart: [],

                        allSelected: false,

                        applied: {
                            quantity: {},
                        },

                        displayTax: {
                            prices: "<?php echo e(core()->getConfigData('sales.taxes.shopping_cart.display_prices')); ?>",

                            subtotal: "<?php echo e(core()->getConfigData('sales.taxes.shopping_cart.display_subtotal')); ?>",

                            shipping: "<?php echo e(core()->getConfigData('sales.taxes.shopping_cart.display_shipping_amount')); ?>",
                        },

                        isLoading: true,

                        isStoring: false,
                    }
                },

                mounted() {
                    this.getCart();
                },

                computed: {
                    selectedItemsCount() {
                        return this.cart.items.filter(item => item.selected).length;
                    },
                },

                methods: {
                    getCart() {
                        this.$axios.get('<?php echo e(route('shop.api.checkout.cart.index')); ?>')
                            .then(response => {
                                this.cart = response.data.data;

                                this.isLoading = false;

                                if (response.data.message) {
                                    this.$emitter.emit('add-flash', { type: 'info', message: response.data.message });
                                }
                            })
                            .catch(error => {});
                    },

                    setCart(cart) {
                        this.cart = cart;
                    },

                    selectAll() {
                        for (let item of this.cart.items) {
                            item.selected = this.allSelected;
                        }
                    },

                    updateAllSelected() {
                        this.allSelected = this.cart.items.every(item => item.selected);
                    },

                    update() {
                        this.isStoring = true;

                        this.$axios.put('<?php echo e(route('shop.api.checkout.cart.update')); ?>', { qty: this.applied.quantity })
                            .then(response => {
                                if (response.data.message) {
                                    this.cart = response.data.data;

                                    this.$emitter.emit('add-flash', { type: 'success', message: response.data.message });
                                } else {
                                    this.$emitter.emit('add-flash', { type: 'warning', message: response.data.data.message });
                                }

                                this.isStoring = false;

                            })
                            .catch(error => {
                                this.isStoring = false;
                            });
                    },

                    setItemQuantity(itemId, quantity) {
                        this.applied.quantity[itemId] = quantity;
                    },

                    removeItem(itemId) {
                        this.$emitter.emit('open-confirm-modal', {
                            agree: () => {
                                this.$axios.post('<?php echo e(route('shop.api.checkout.cart.destroy')); ?>', {
                                        '_method': 'DELETE',
                                        'cart_item_id': itemId,
                                    })
                                    .then(response => {
                                        this.cart = response.data.data;

                                        this.$emitter.emit('add-flash', { type: 'success', message: response.data.message });

                                    })
                                    .catch(error => {});
                            }
                        });
                    },

                    removeSelectedItems() {
                        this.$emitter.emit('open-confirm-modal', {
                            agree: () => {
                                const selectedItemsIds = this.cart.items.flatMap(item => item.selected ? item.id : []);

                                this.$axios.post('<?php echo e(route('shop.api.checkout.cart.destroy_selected')); ?>', {
                                        '_method': 'DELETE',
                                        'ids': selectedItemsIds,
                                    })
                                    .then(response => {
                                        this.cart = response.data.data;

                                        this.$emitter.emit('update-mini-cart', response.data.data );

                                        this.$emitter.emit('add-flash', { type: 'success', message: response.data.message });

                                    })
                                    .catch(error => {});
                            }
                        });
                    },

                    moveToWishlistSelectedItems() {
                        this.$emitter.emit('open-confirm-modal', {
                            agree: () => {
                                const selectedItemsIds = this.cart.items.flatMap(item => item.selected ? item.id : []);

                                const selectedItemsQty = this.cart.items.filter(item => item.selected).map(item => this.applied.quantity[item.id] ?? item.quantity);

                                this.$axios.post('<?php echo e(route('shop.api.checkout.cart.move_to_wishlist')); ?>', {
                                        'ids': selectedItemsIds,
                                        'qty': selectedItemsQty
                                    })
                                    .then(response => {
                                        this.cart = response.data.data;

                                        this.$emitter.emit('update-mini-cart', response.data.data );

                                        this.$emitter.emit('add-flash', { type: 'success', message: response.data.message });

                                    })
                                    .catch(error => {});
                            }
                        });
                    },
                }
            });
        </script>
    <?php $__env->stopPush(); endif; ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2643b7d197f48caff2f606750db81304)): ?>
<?php $attributes = $__attributesOriginal2643b7d197f48caff2f606750db81304; ?>
<?php unset($__attributesOriginal2643b7d197f48caff2f606750db81304); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2643b7d197f48caff2f606750db81304)): ?>
<?php $component = $__componentOriginal2643b7d197f48caff2f606750db81304; ?>
<?php unset($__componentOriginal2643b7d197f48caff2f606750db81304); ?>
<?php endif; ?>
<?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Shop\src\Resources\views\checkout\cart\index.blade.php ENDPATH**/ ?>