<?php echo view_render_event('bagisto.shop.components.layouts.header.desktop.top.before'); ?>


<v-topbar>
    <!-- Shimmer Effect -->
    <div class="flex items-center justify-between border border-b border-l-0 border-r-0 border-t-0 px-16">
        <!-- Currencies -->
        <div class="flex w-20 items-center justify-between gap-2.5 py-3">
            <div
                class="shimmer h-6 w-12 rounded"
                role="presentation"
            >
            </div>

            <div
                class="shimmer h-6 w-6 rounded"
                role="presentation"
            >
            </div>
        </div>

        <!-- Offers -->
        <div
            class="shimmer h-6 w-72 rounded py-3"
            role="presentation"
        >
        </div>

        <!-- Locales -->
        <div class="flex w-32 items-center justify-between gap-2.5 py-3">
            <div
                class="shimmer h-6 w-6"
                role="presentation"
            >
            </div>

            <div
                class="shimmer h-6 w-14 rounded"
                role="presentation"
            >
            </div>

            <div
                class="shimmer h-6 w-6"
                role="presentation"
            >
            </div>
        </div>
    </div>
</v-topbar>

<?php echo view_render_event('bagisto.shop.components.layouts.header.desktop.top.after'); ?>


<?php if (! $__env->hasRenderedOnce('961eaa4d-281f-4efc-9b3e-b44f8f7b43c6')): $__env->markAsRenderedOnce('961eaa4d-281f-4efc-9b3e-b44f8f7b43c6');
$__env->startPush('scripts'); ?>
    <script
        type="text/x-template"
        id="v-topbar-template"
    >
        <div class="flex w-full items-center justify-between border border-b border-l-0 border-r-0 border-t-0 px-16">
            <?php echo view_render_event('bagisto.shop.components.layouts.header.desktop.top.currency_switcher.before'); ?>


            <!-- Currency Switcher -->
            <?php if (isset($component)) { $__componentOriginal6eb652d0a4a36e6466d8d4f363feb553 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6eb652d0a4a36e6466d8d4f363feb553 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.dropdown.index','data' => ['position' => 'bottom-'.e(core()->getCurrentLocale()->direction === 'ltr' ? 'left' : 'right').'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['position' => 'bottom-'.e(core()->getCurrentLocale()->direction === 'ltr' ? 'left' : 'right').'']); ?>
                <!-- Dropdown Toggler -->
                 <?php $__env->slot('toggle', null, []); ?> 
                    <div
                        class="flex cursor-pointer gap-2.5 py-3"
                        role="button"
                        tabindex="0"
                        @click="currencyToggler = ! currencyToggler"
                    >
                        <span>
                            <?php echo e(core()->getCurrentCurrency()->symbol . ' ' . core()->getCurrentCurrencyCode()); ?>

                        </span>

                        <span
                            class="text-2xl"
                            :class="{'icon-arrow-up': currencyToggler, 'icon-arrow-down': ! currencyToggler}"
                            role="presentation"
                        ></span>
                    </div>
                 <?php $__env->endSlot(); ?>

                <!-- Dropdown Content -->
                 <?php $__env->slot('content', null, ['class' => 'journal-scroll max-h-[500px] !p-0']); ?> 
                    <v-currency-switcher></v-currency-switcher>
                 <?php $__env->endSlot(); ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6eb652d0a4a36e6466d8d4f363feb553)): ?>
<?php $attributes = $__attributesOriginal6eb652d0a4a36e6466d8d4f363feb553; ?>
<?php unset($__attributesOriginal6eb652d0a4a36e6466d8d4f363feb553); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6eb652d0a4a36e6466d8d4f363feb553)): ?>
<?php $component = $__componentOriginal6eb652d0a4a36e6466d8d4f363feb553; ?>
<?php unset($__componentOriginal6eb652d0a4a36e6466d8d4f363feb553); ?>
<?php endif; ?>

            <?php echo view_render_event('bagisto.shop.components.layouts.header.desktop.top.currency_switcher.after'); ?>


            <p class="py-3 text-xs font-medium">
                <?php echo e(core()->getConfigData('general.content.header_offer.title')); ?>

                
                <a 
                    href="<?php echo e(core()->getConfigData('general.content.header_offer.redirection_link')); ?>" 
                    class="underline"
                    role="button"
                >
                    <?php echo e(core()->getConfigData('general.content.header_offer.redirection_title')); ?>

                </a>
            </p>

            <?php echo view_render_event('bagisto.shop.components.layouts.header.desktop.top.locale_switcher.before'); ?>


            <!-- Locales Switcher -->
            <?php if (isset($component)) { $__componentOriginal6eb652d0a4a36e6466d8d4f363feb553 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6eb652d0a4a36e6466d8d4f363feb553 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.dropdown.index','data' => ['position' => 'bottom-'.e(core()->getCurrentLocale()->direction === 'ltr' ? 'right' : 'left').'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['position' => 'bottom-'.e(core()->getCurrentLocale()->direction === 'ltr' ? 'right' : 'left').'']); ?>
                 <?php $__env->slot('toggle', null, []); ?> 
                    <!-- Dropdown Toggler -->
                    <div
                        class="flex cursor-pointer items-center gap-2.5 py-3"
                        role="button"
                        tabindex="0"
                        @click="localeToggler = ! localeToggler"
                    >
                        <img
                            src="<?php echo e(! empty(core()->getCurrentLocale()->logo_url)
                                    ? core()->getCurrentLocale()->logo_url
                                    : bagisto_asset('images/default-language.svg')); ?>"
                            class="h-full"
                            alt="<?php echo app('translator')->get('shop::app.components.layouts.header.desktop.top.default-locale'); ?>"
                            width="24"
                            height="16"
                        />
                        
                        <span>
                            <?php echo e(core()->getCurrentChannel()->locales()->orderBy('name')->where('code', app()->getLocale())->value('name')); ?>

                        </span>

                        <span
                            class="text-2xl"
                            :class="{'icon-arrow-up': localeToggler, 'icon-arrow-down': ! localeToggler}"
                            role="presentation"
                        ></span>
                    </div>
                 <?php $__env->endSlot(); ?>
            
                <!-- Dropdown Content -->
                 <?php $__env->slot('content', null, ['class' => 'journal-scroll max-h-[500px] !p-0']); ?> 
                    <v-locale-switcher></v-locale-switcher>
                 <?php $__env->endSlot(); ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6eb652d0a4a36e6466d8d4f363feb553)): ?>
<?php $attributes = $__attributesOriginal6eb652d0a4a36e6466d8d4f363feb553; ?>
<?php unset($__attributesOriginal6eb652d0a4a36e6466d8d4f363feb553); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6eb652d0a4a36e6466d8d4f363feb553)): ?>
<?php $component = $__componentOriginal6eb652d0a4a36e6466d8d4f363feb553; ?>
<?php unset($__componentOriginal6eb652d0a4a36e6466d8d4f363feb553); ?>
<?php endif; ?>

            <?php echo view_render_event('bagisto.shop.components.layouts.header.desktop.top.locale_switcher.after'); ?>

        </div>
    </script>

    <script
        type="text/x-template"
        id="v-currency-switcher-template"
    >
        <div class="my-2.5 grid gap-1 overflow-auto max-md:my-0 sm:max-h-[500px]">
            <span
                class="cursor-pointer px-5 py-2 text-base hover:bg-gray-100"
                v-for="currency in currencies"
                :class="{'bg-gray-100': currency.code == '<?php echo e(core()->getCurrentCurrencyCode()); ?>'}"
                @click="change(currency)"
            >
                {{ currency.symbol + ' ' + currency.code }}
            </span>
        </div>
    </script>

    <script
        type="text/x-template"
        id="v-locale-switcher-template"
    >
        <div class="my-2.5 grid gap-1 overflow-auto max-md:my-0 sm:max-h-[500px]">
            <span
                class="flex cursor-pointer items-center gap-2.5 px-5 py-2 text-base hover:bg-gray-100"
                :class="{'bg-gray-100': locale.code == '<?php echo e(app()->getLocale()); ?>'}"
                v-for="locale in locales"
                @click="change(locale)"                  
            >
                <img
                    :src="locale.logo_url || '<?php echo e(bagisto_asset('images/default-language.svg')); ?>'"
                    width="24"
                    height="16"
                />

                {{ locale.name }}
            </span>
        </div>
    </script>

    <script type="module">
        app.component('v-topbar', {
            template: '#v-topbar-template',

            data() {
                return {
                    localeToggler: '',

                    currencyToggler: '',
                };
            },
        });

        app.component('v-currency-switcher', {
            template: '#v-currency-switcher-template',

            data() {
                return {
                    currencies: <?php echo json_encode(core()->getCurrentChannel()->currencies, 15, 512) ?>,
                };
            },

            methods: {
                change(currency) {
                    let url = new URL(window.location.href);

                    url.searchParams.set('currency', currency.code);

                    window.location.href = url.href;
                }
            }
        });

        app.component('v-locale-switcher', {
            template: '#v-locale-switcher-template',

            data() {
                return {
                    locales: <?php echo json_encode(core()->getCurrentChannel()->locales()->orderBy('name')->get(), 15, 512) ?>,
                };
            },

            methods: {
                change(locale) {
                    let url = new URL(window.location.href);

                    url.searchParams.set('locale', locale.code);

                    window.location.href = url.href;
                }
            }
        });
    </script>
<?php $__env->stopPush(); endif; ?><?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Shop\src\Resources\views\components\layouts\header\desktop\top.blade.php ENDPATH**/ ?>