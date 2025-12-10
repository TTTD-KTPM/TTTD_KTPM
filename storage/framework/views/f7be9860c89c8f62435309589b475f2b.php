<?php echo view_render_event('bagisto.shop.components.layouts.header.desktop.bottom.before'); ?>


<div class="flex min-h-[78px] w-full justify-between border border-b border-l-0 border-r-0 border-t-0 px-[60px] max-1180:px-8">
    <!--
        This section will provide categories for the first, second, and third levels. If
        additional levels are required, users can customize them according to their needs.
    -->
    <!-- Left Nagivation Section -->
    <div class="flex items-center gap-x-10 max-[1180px]:gap-x-5">
        <?php echo view_render_event('bagisto.shop.components.layouts.header.desktop.bottom.logo.before'); ?>


        <a
            href="<?php echo e(route('shop.home.index')); ?>"
            aria-label="<?php echo app('translator')->get('shop::app.components.layouts.header.desktop.bottom.bagisto'); ?>"
        >
            <img
                src="<?php echo e(core()->getCurrentChannel()->logo_url ?? bagisto_asset('images/logo.svg')); ?>"
                width="131"
                height="29"
                alt="<?php echo e(config('app.name')); ?>"
            >
        </a>

        <?php echo view_render_event('bagisto.shop.components.layouts.header.desktop.bottom.logo.after'); ?>


        <?php echo view_render_event('bagisto.shop.components.layouts.header.desktop.bottom.category.before'); ?>


        <v-desktop-category>
            <div class="flex items-center gap-5">
                <span
                    class="shimmer h-6 w-20 rounded"
                    role="presentation"
                ></span>

                <span
                    class="shimmer h-6 w-20 rounded"
                    role="presentation"
                ></span>

                <span
                    class="shimmer h-6 w-20 rounded"
                    role="presentation"
                ></span>
            </div>
        </v-desktop-category>

        <?php echo view_render_event('bagisto.shop.components.layouts.header.desktop.bottom.category.after'); ?>

    </div>

    <!-- Right Nagivation Section -->
    <div class="flex items-center gap-x-9 max-[1100px]:gap-x-6 max-lg:gap-x-8">

        <?php echo view_render_event('bagisto.shop.components.layouts.header.desktop.bottom.search_bar.before'); ?>


        <!-- Search Bar Container -->
        <div class="relative w-full">
            <form
                action="<?php echo e(route('shop.search.index')); ?>"
                class="flex max-w-[445px] items-center"
                role="search"
            >
                <label
                    for="organic-search"
                    class="sr-only"
                >
                    <?php echo app('translator')->get('shop::app.components.layouts.header.desktop.bottom.search'); ?>
                </label>

                <div class="icon-search pointer-events-none absolute top-2.5 flex items-center text-xl ltr:left-3 rtl:right-3"></div>

                <input
                    type="text"
                    name="query"
                    value="<?php echo e(request('query')); ?>"
                    class="block w-full rounded-lg border border-transparent bg-zinc-100 px-11 py-3 text-xs font-medium text-gray-900 transition-all hover:border-gray-400 focus:border-gray-400"
                    minlength="<?php echo e(core()->getConfigData('catalog.products.search.min_query_length')); ?>"
                    maxlength="<?php echo e(core()->getConfigData('catalog.products.search.max_query_length')); ?>"
                    placeholder="<?php echo app('translator')->get('shop::app.components.layouts.header.desktop.bottom.search-text'); ?>"
                    aria-label="<?php echo app('translator')->get('shop::app.components.layouts.header.desktop.bottom.search-text'); ?>"
                    aria-required="true"
                    pattern="[^\\]+"
                    required
                >

                <button
                    type="submit"
                    class="hidden"
                    aria-label="<?php echo app('translator')->get('shop::app.components.layouts.header.desktop.bottom.submit'); ?>"
                >
                </button>

                <?php if(core()->getConfigData('catalog.products.settings.image_search')): ?>
                    <?php echo $__env->make('shop::search.images.index', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <?php endif; ?>
            </form>
        </div>

        <?php echo view_render_event('bagisto.shop.components.layouts.header.desktop.bottom.search_bar.after'); ?>


        <!-- Right Navigation Links -->
        <div class="mt-1.5 flex gap-x-8 max-[1100px]:gap-x-6 max-lg:gap-x-8">

            <?php echo view_render_event('bagisto.shop.components.layouts.header.desktop.bottom.compare.before'); ?>


            

            <?php echo view_render_event('bagisto.shop.components.layouts.header.desktop.bottom.compare.after'); ?>


            <?php echo view_render_event('bagisto.shop.components.layouts.header.desktop.bottom.mini_cart.before'); ?>


            <!-- Mini cart - ESSENTIAL for Payment Process -->
            <?php if(core()->getConfigData('sales.checkout.shopping_cart.cart_page')): ?>
                <?php echo $__env->make('shop::checkout.cart.mini-cart', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php endif; ?>

            <?php echo view_render_event('bagisto.shop.components.layouts.header.desktop.bottom.mini_cart.after'); ?>


            <?php echo view_render_event('bagisto.shop.components.layouts.header.desktop.bottom.profile.before'); ?>


            

            <?php echo view_render_event('bagisto.shop.components.layouts.header.desktop.bottom.profile.after'); ?>

        </div>
    </div>
</div>

<?php if (! $__env->hasRenderedOnce('27379a69-29ce-4831-b7eb-df9315f28c2e')): $__env->markAsRenderedOnce('27379a69-29ce-4831-b7eb-df9315f28c2e');
$__env->startPush('scripts'); ?>
    <script
        type="text/x-template"
        id="v-desktop-category-template"
    >
        <!-- Loading State -->
        <div
            class="flex items-center gap-5"
            v-if="isLoading"
        >
            <span
                class="shimmer h-6 w-20 rounded"
                role="presentation"
            ></span>

            <span
                class="shimmer h-6 w-20 rounded"
                role="presentation"
            ></span>

            <span
                class="shimmer h-6 w-20 rounded"
                role="presentation"
            ></span>
        </div>

        <!-- Default category layout -->
        <div
            class="flex items-center"
            v-else-if="'<?php echo e(core()->getConfigData('general.design.categories.category_view')); ?>' !== 'sidebar'"
        >
            <div
                class="group relative flex h-[77px] items-center border-b-4 border-transparent hover:border-b-4 hover:border-navyBlue"
                v-for="category in categories"
            >
                <span>
                    <a
                        :href="category.url"
                        class="inline-block px-5 uppercase"
                    >
                        {{ category.name }}
                    </a>
                </span>

                <div
                    class="pointer-events-none absolute top-[78px] z-[1] max-h-[580px] w-max max-w-[1260px] translate-y-1 overflow-auto overflow-x-auto border border-b-0 border-l-0 border-r-0 border-t border-[#F3F3F3] bg-white p-9 opacity-0 shadow-[0_6px_6px_1px_rgba(0,0,0,.3)] transition duration-300 ease-out group-hover:pointer-events-auto group-hover:translate-y-0 group-hover:opacity-100 group-hover:duration-200 group-hover:ease-in ltr:-left-9 rtl:-right-9"
                    v-if="category.children && category.children.length"
                >
                    <div class="flex justify-between gap-x-[70px]">
                        <div
                            class="grid w-full min-w-max max-w-[150px] flex-auto grid-cols-[1fr] content-start gap-5"
                            v-for="pairCategoryChildren in pairCategoryChildren(category)"
                        >
                            <template v-for="secondLevelCategory in pairCategoryChildren">
                                <p class="font-medium text-navyBlue">
                                    <a :href="secondLevelCategory.url">
                                        {{ secondLevelCategory.name }}
                                    </a>
                                </p>

                                <ul
                                    class="grid grid-cols-[1fr] gap-3"
                                    v-if="secondLevelCategory.children && secondLevelCategory.children.length"
                                >
                                    <li
                                        class="text-sm font-medium text-zinc-500"
                                        v-for="thirdLevelCategory in secondLevelCategory.children"
                                    >
                                        <a :href="thirdLevelCategory.url">
                                            {{ thirdLevelCategory.name }}
                                        </a>
                                    </li>
                                </ul>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar category layout -->
        <div v-else>
            <!-- Categories Navigation -->
            <div class="flex items-center">
                <!-- "All" button for opening the category drawer -->
                <div
                    class="flex h-[77px] cursor-pointer items-center border-b-4 border-transparent hover:border-b-4 hover:border-navyBlue"
                    @click="toggleCategoryDrawer"
                >
                    <span class="flex items-center gap-1 px-5 uppercase">
                        <span class="icon-hamburger text-xl"></span>

                        <?php echo app('translator')->get('shop::app.components.layouts.header.desktop.bottom.all'); ?>
                    </span>
                </div>

                <!-- Show only first 4 categories in main navigation -->
                <div
                    class="group relative flex h-[77px] items-center border-b-4 border-transparent hover:border-b-4 hover:border-navyBlue"
                    v-for="category in categories.slice(0, 4)"
                >
                    <span>
                        <a
                            :href="category.url"
                            class="inline-block px-5 uppercase"
                        >
                            {{ category.name }}
                        </a>
                    </span>

                    <!-- Dropdown for each category -->
                    <div
                        class="pointer-events-none absolute top-[78px] z-[1] max-h-[580px] w-max max-w-[1260px] translate-y-1 overflow-auto overflow-x-auto border border-b-0 border-l-0 border-r-0 border-t border-[#F3F3F3] bg-white p-9 opacity-0 shadow-[0_6px_6px_1px_rgba(0,0,0,.3)] transition duration-300 ease-out group-hover:pointer-events-auto group-hover:translate-y-0 group-hover:opacity-100 group-hover:duration-200 group-hover:ease-in ltr:-left-9 rtl:-right-9"
                        v-if="category.children && category.children.length"
                    >
                        <div class="flex justify-between gap-x-[70px]">
                            <div
                                class="grid w-full min-w-max max-w-[150px] flex-auto grid-cols-[1fr] content-start gap-5"
                                v-for="pairCategoryChildren in pairCategoryChildren(category)"
                            >
                                <template v-for="secondLevelCategory in pairCategoryChildren">
                                    <p class="font-medium text-navyBlue">
                                        <a :href="secondLevelCategory.url">
                                            {{ secondLevelCategory.name }}
                                        </a>
                                    </p>

                                    <ul
                                        class="grid grid-cols-[1fr] gap-3"
                                        v-if="secondLevelCategory.children && secondLevelCategory.children.length"
                                    >
                                        <li
                                            class="text-sm font-medium text-zinc-500"
                                            v-for="thirdLevelCategory in secondLevelCategory.children"
                                        >
                                            <a :href="thirdLevelCategory.url">
                                                {{ thirdLevelCategory.name }}
                                            </a>
                                        </li>
                                    </ul>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bagisto Drawer Integration -->
            <?php if (isset($component)) { $__componentOriginal2b3e2da8ab003ef79d854b1862e64fc8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2b3e2da8ab003ef79d854b1862e64fc8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.drawer.index','data' => ['position' => 'left','width' => '400px',':isActive' => 'isDrawerActive','@toggle' => 'onDrawerToggle','@close' => 'onDrawerClose']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::drawer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['position' => 'left','width' => '400px',':is-active' => 'isDrawerActive','@toggle' => 'onDrawerToggle','@close' => 'onDrawerClose']); ?>
                 <?php $__env->slot('toggle', null, []); ?>  <?php $__env->endSlot(); ?>

                 <?php $__env->slot('header', null, ['class' => 'border-b border-gray-200']); ?> 
                    <div class="flex w-full items-center justify-between">
                        <p class="text-xl font-medium">
                            <?php echo app('translator')->get('shop::app.components.layouts.header.desktop.bottom.categories'); ?>
                        </p>
                    </div>
                 <?php $__env->endSlot(); ?>

                 <?php $__env->slot('content', null, ['class' => '!px-0']); ?> 
                    <!-- Wrapper with transition effects -->
                    <div class="relative h-full overflow-hidden">
                        <!-- Sliding container -->
                        <div
                            class="flex h-full transition-transform duration-300"
                            :class="{
                                'ltr:translate-x-0 rtl:translate-x-0': currentViewLevel !== 'third',
                                'ltr:-translate-x-full rtl:translate-x-full': currentViewLevel === 'third'
                            }"
                        >
                            <!-- First level view -->
                            <div class="h-[calc(100vh-74px)] w-full flex-shrink-0 overflow-auto">
                                <div class="py-4">
                                    <div
                                        v-for="category in categories"
                                        :key="category.id"
                                        :class="{'mb-2': category.children && category.children.length}"
                                    >
                                        <div class="flex cursor-pointer items-center justify-between px-6 py-2 transition-colors duration-200 hover:bg-gray-100">
                                            <a
                                                :href="category.url"
                                                class="text-base font-medium text-black"
                                            >
                                                {{ category.name }}
                                            </a>
                                        </div>

                                        <!-- Second Level Categories -->
                                        <div v-if="category.children && category.children.length" >
                                            <div
                                                v-for="secondLevelCategory in category.children"
                                                :key="secondLevelCategory.id"
                                            >
                                                <div
                                                    class="flex cursor-pointer items-center justify-between px-6 py-2 transition-colors duration-200 hover:bg-gray-100"
                                                    @click="showThirdLevel(secondLevelCategory, category, $event)"
                                                >
                                                    <a
                                                        :href="secondLevelCategory.url"
                                                        class="text-sm font-normal"
                                                    >
                                                        {{ secondLevelCategory.name }}
                                                    </a>

                                                    <span
                                                        v-if="secondLevelCategory.children && secondLevelCategory.children.length"
                                                        class="icon-arrow-right rtl:icon-arrow-left"
                                                    ></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Third level view -->
                            <div
                                class="h-full w-full flex-shrink-0"
                                v-if="currentViewLevel === 'third'"
                            >
                                <div class="border-b border-gray-200 px-6 py-4">
                                    <button
                                        @click="goBackToMainView"
                                        class="flex items-center justify-center gap-2 focus:outline-none"
                                        aria-label="Go back"
                                    >
                                        <span class="icon-arrow-left rtl:icon-arrow-right text-lg"></span>

                                        <p class="text-base font-medium text-black">
                                            <?php echo app('translator')->get('shop::app.components.layouts.header.desktop.bottom.back-button'); ?>
                                        </p>
                                    </button>
                                </div>

                                <!-- Third Level Content -->
                                <div class="py-4">
                                    <div
                                        v-for="thirdLevelCategory in currentSecondLevelCategory?.children"
                                        :key="thirdLevelCategory.id"
                                        class="mb-2"
                                    >
                                        <a
                                            :href="thirdLevelCategory.url"
                                            class="block px-6 py-2 text-sm transition-colors duration-200 hover:bg-gray-100"
                                        >
                                            {{ thirdLevelCategory.name }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 <?php $__env->endSlot(); ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2b3e2da8ab003ef79d854b1862e64fc8)): ?>
<?php $attributes = $__attributesOriginal2b3e2da8ab003ef79d854b1862e64fc8; ?>
<?php unset($__attributesOriginal2b3e2da8ab003ef79d854b1862e64fc8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2b3e2da8ab003ef79d854b1862e64fc8)): ?>
<?php $component = $__componentOriginal2b3e2da8ab003ef79d854b1862e64fc8; ?>
<?php unset($__componentOriginal2b3e2da8ab003ef79d854b1862e64fc8); ?>
<?php endif; ?>
        </div>
    </script>

    <script type="module">
        app.component('v-desktop-category', {
            template: '#v-desktop-category-template',

            data() {
                return {
                    isLoading: true,
                    categories: [],
                    isDrawerActive: false,
                    currentViewLevel: 'main',
                    currentSecondLevelCategory: null,
                    currentParentCategory: null
                }
            },

            mounted() {
                this.initCategories();
            },

            methods: {
                initCategories() {
                    try {
                        const stored = localStorage.getItem('categories');

                        if (stored) {
                            this.categories = JSON.parse(stored);
                            this.isLoading = false;

                            return;
                        }

                    } catch (e) {}

                    this.getCategories();
                },

                getCategories() {
                    this.$axios.get("<?php echo e(route('shop.api.categories.tree')); ?>")
                        .then(response => {
                            this.isLoading = false;
                            this.categories = response.data.data;
                            localStorage.setItem('categories', JSON.stringify(this.categories));
                        })
                        .catch(error => {
                            console.log(error);
                        });
                },

                pairCategoryChildren(category) {
                    if (! category.children) return [];

                    return category.children.reduce((result, value, index, array) => {
                        if (index % 2 === 0) {
                            result.push(array.slice(index, index + 2));
                        }
                        return result;
                    }, []);
                },

                toggleCategoryDrawer() {
                    this.isDrawerActive = !this.isDrawerActive;
                    if (this.isDrawerActive) {
                        this.currentViewLevel = 'main';
                    }
                },

                onDrawerToggle(event) {
                    this.isDrawerActive = event.isActive;
                },

                onDrawerClose(event) {
                    this.isDrawerActive = false;
                },

                showThirdLevel(secondLevelCategory, parentCategory, event) {
                    if (secondLevelCategory.children && secondLevelCategory.children.length) {
                        this.currentSecondLevelCategory = secondLevelCategory;
                        this.currentParentCategory = parentCategory;
                        this.currentViewLevel = 'third';

                        if (event) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                    }
                },

                goBackToMainView() {
                    this.currentViewLevel = 'main';
                }
            },
        });
    </script>
<?php $__env->stopPush(); endif; ?>
<?php echo view_render_event('bagisto.shop.components.layouts.header.desktop.bottom.after'); ?>

<?php /**PATH C:\D\xampp\htdocs\TTTD_KTPM_Clone2\packages\Webkul\Shop\src/resources/views/components/layouts/header/desktop/bottom.blade.php ENDPATH**/ ?>