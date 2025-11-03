<!-- SEO Meta Content -->
<?php $__env->startPush('meta'); ?>
    <meta name="description" content="<?php echo app('translator')->get('shop::app.compare.title'); ?>"/>

    <meta name="keywords" content="<?php echo app('translator')->get('shop::app.compare.title'); ?>"/>
<?php $__env->stopPush(); ?>

<?php if (isset($component)) { $__componentOriginal2643b7d197f48caff2f606750db81304 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2643b7d197f48caff2f606750db81304 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.layouts.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::layouts'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <!-- Page Title -->
     <?php $__env->slot('title', null, []); ?> 
        <?php echo app('translator')->get('shop::app.compare.title'); ?>
     <?php $__env->endSlot(); ?>

    <!-- Breadcrumb -->
    <?php if((core()->getConfigData('general.general.breadcrumbs.shop'))): ?>
        <div class="mt-5 flex justify-center max-lg:hidden">
            <?php echo view_render_event('bagisto.shop.customers.account.compare.breadcrumbs.before'); ?>


            <div class="flex items-center gap-x-2.5">
                <?php if (isset($component)) { $__componentOriginaldef12fd0653509715c3bc62a609dde73 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldef12fd0653509715c3bc62a609dde73 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.breadcrumbs.index','data' => ['name' => 'compare']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::breadcrumbs'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'compare']); ?>
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
            </div>

            <?php echo view_render_event('bagisto.shop.customers.account.compare.breadcrumbs.after'); ?>

        </div>
    <?php endif; ?>

    <!-- Compare Component -->
    <div class="container mt-8 px-[60px] max-lg:px-8 max-md:mt-7 max-md:px-0">
        <v-compare>
            <!-- Shimmer Effect -->
            <?php if (isset($component)) { $__componentOriginalfdb4f24de456bdb5d286adeb863402b8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfdb4f24de456bdb5d286adeb863402b8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.shimmer.compare.index','data' => ['attributeCount' => count($comparableAttributes)]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::shimmer.compare'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['attributeCount' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(count($comparableAttributes))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfdb4f24de456bdb5d286adeb863402b8)): ?>
<?php $attributes = $__attributesOriginalfdb4f24de456bdb5d286adeb863402b8; ?>
<?php unset($__attributesOriginalfdb4f24de456bdb5d286adeb863402b8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfdb4f24de456bdb5d286adeb863402b8)): ?>
<?php $component = $__componentOriginalfdb4f24de456bdb5d286adeb863402b8; ?>
<?php unset($__componentOriginalfdb4f24de456bdb5d286adeb863402b8); ?>
<?php endif; ?>
        </v-compare>
    </div>

    <?php if (! $__env->hasRenderedOnce('db291a2b-640c-4adb-a5b3-daaebed3e32d')): $__env->markAsRenderedOnce('db291a2b-640c-4adb-a5b3-daaebed3e32d');
$__env->startPush('scripts'); ?>
        <script
            type="text/x-template"
            id="v-compare-template"
        >
            <div>
                <?php echo view_render_event('bagisto.shop.customers.account.compare.before'); ?>


                <div v-if="! isLoading">
                    <div class="flex items-center justify-between max-md:px-4">

                        <?php echo view_render_event('bagisto.shop.customers.account.compare.title.before'); ?>


                        <h1 class="text-2xl font-medium max-sm:text-base">
                            <?php echo app('translator')->get('shop::app.compare.title'); ?>
                        </h1>

                        <?php echo view_render_event('bagisto.shop.customers.account.compare.title.after'); ?>


                        <?php echo view_render_event('bagisto.shop.customers.account.compare.remove_all.before'); ?>


                        <div
                            class="secondary-button flex items-center gap-x-2.5 whitespace-nowrap border-zinc-200 px-5 py-3 font-normal max-md:rounded-lg max-md:px-3 max-md:text-xs max-sm:py-1.5"
                            v-if="items.length"
                            @click="removeAll"
                        >
                            <span class="icon-bin text-2xl max-md:hidden"></span>

                            <?php echo app('translator')->get('shop::app.compare.delete-all'); ?>
                        </div>

                        <?php echo view_render_event('bagisto.shop.customers.account.compare.remove_all.after'); ?>

                    </div>

                    <div
                        class="journal-scroll mt-16 grid overflow-auto max-md:mt-7"
                        v-if="items.length"
                    >
                        <template v-for="attribute in comparableAttributes">
                            <!-- Product Card -->
                            <div
                                class="flex max-w-full items-center border-b border-zinc-200"
                                v-if="attribute.code == 'product'"
                            >
                                <?php echo view_render_event('bagisto.shop.customers.account.compare.attribute_name.before'); ?>


                                <div class="min-w-[304px] max-w-full max-md:grid max-md:h-full max-md:min-w-40 max-md:items-center max-md:bg-gray-200 max-sm:min-w-[110px]">
                                    <p class="text-sm font-medium max-md:pl-4">
                                        {{ attribute.name ?? attribute.admin_name }}
                                    </p>
                                </div>

                                <?php echo view_render_event('bagisto.shop.customers.account.compare.attribute_name.after'); ?>


                                <div class="flex gap-3 border-zinc-200 max-md:gap-0 max-md:border-0 ltr:border-l-[1px] rtl:border-r-[1px]">
                                    <div
                                        class="relative w-[311px] max-w-[311px] px-5 max-md:w-60 max-md:px-2.5 max-sm:w-[190px]"
                                        v-for="product in items"
                                    >
                                        <span
                                            class="icon-cancel absolute top-5 z-[1] flex h-[30px] w-[30px] cursor-pointer items-center justify-center rounded-md border border-zinc-200 bg-white text-2xl max-md:top-10 max-md:h-6 max-md:w-6 max-md:rounded-full max-md:text-sm ltr:right-10 max-md:ltr:right-4 rtl:left-10 max-md:rtl:left-4"
                                            @click="remove(product.id)"
                                        ></span>

                                        <?php if (isset($component)) { $__componentOriginalce4ea8dd577f45125a0fa9f371a55f23 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce4ea8dd577f45125a0fa9f371a55f23 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.products.card','data' => ['class' => '[&_span.icon-compare]:hidden']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::products.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => '[&_span.icon-compare]:hidden']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce4ea8dd577f45125a0fa9f371a55f23)): ?>
<?php $attributes = $__attributesOriginalce4ea8dd577f45125a0fa9f371a55f23; ?>
<?php unset($__attributesOriginalce4ea8dd577f45125a0fa9f371a55f23); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce4ea8dd577f45125a0fa9f371a55f23)): ?>
<?php $component = $__componentOriginalce4ea8dd577f45125a0fa9f371a55f23; ?>
<?php unset($__componentOriginalce4ea8dd577f45125a0fa9f371a55f23); ?>
<?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <?php echo view_render_event('bagisto.shop.customers.account.compare.comparable_attribute.before'); ?>


                            <!-- Comparable Attributes -->
                            <div
                                class="flex max-w-full items-center border-b border-zinc-200"
                                v-else
                            >
                                <div class="min-w-[304px] max-w-full max-md:grid max-md:h-full max-md:min-w-40 max-md:items-center max-md:bg-gray-200 max-sm:min-w-[110px]">
                                    <p class="text-sm font-medium max-md:pl-4">
                                        {{ attribute.name ?? attribute.admin_name }}
                                    </p>
                                </div>

                                <div class="flex gap-3 border-zinc-200 max-md:gap-0 max-md:border-0 ltr:border-l-[1px] rtl:border-r-[1px]">
                                    <div
                                        class="w-[311px] max-w-[311px] p-5 max-md:w-60 max-md:px-2.5 max-sm:w-[190px]"
                                        v-for="(product, index) in items"
                                    >
                                        <p
                                            class="break-all text-sm"
                                            v-html="product[attribute.code] ?? 'N/A'"
                                        >
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <?php echo view_render_event('bagisto.shop.customers.account.compare.comparable_attribute.after'); ?>

                        </template>
                    </div>

                    <div
                        class="m-auto grid w-full place-content-center items-center justify-items-center py-32 text-center"
                        v-else
                    >
                        <img
                            class="max-sm:h-[100px] max-sm:w-[100px]"
                            src="<?php echo e(bagisto_asset('images/thank-you.png')); ?>"
                            alt="<?php echo app('translator')->get('shop::app.compare.empty-text'); ?>"
                            loading="lazy"
                            decoding="async"
                        />

                        <p
                            class="text-xl max-sm:text-sm"
                            role="heading"
                        >
                            <?php echo app('translator')->get('shop::app.compare.empty-text'); ?>
                        </p>
                    </div>
                </div>

                <div v-else>
                    <!---- Shimmer Effect -->
                    <?php if (isset($component)) { $__componentOriginalfdb4f24de456bdb5d286adeb863402b8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfdb4f24de456bdb5d286adeb863402b8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.shimmer.compare.index','data' => ['attributeCount' => count($comparableAttributes)]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::shimmer.compare'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['attributeCount' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(count($comparableAttributes))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfdb4f24de456bdb5d286adeb863402b8)): ?>
<?php $attributes = $__attributesOriginalfdb4f24de456bdb5d286adeb863402b8; ?>
<?php unset($__attributesOriginalfdb4f24de456bdb5d286adeb863402b8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfdb4f24de456bdb5d286adeb863402b8)): ?>
<?php $component = $__componentOriginalfdb4f24de456bdb5d286adeb863402b8; ?>
<?php unset($__componentOriginalfdb4f24de456bdb5d286adeb863402b8); ?>
<?php endif; ?>
                </div>

                <?php echo view_render_event('bagisto.shop.customers.account.compare.after'); ?>

            </div>
        </script>

        <script type="module">
            app.component("v-compare", {
                template: '#v-compare-template',

                data() {
                    return  {
                        comparableAttributes: [
                            ...[{'code': 'product', 'name': 'Product'}],
                            ...<?php echo json_encode($comparableAttributes, 15, 512) ?>
                        ],

                        items: [],

                        isCustomer: '<?php echo e(auth()->guard('customer')->check()); ?>',

                        isLoading: true,
                    }
                },

                mounted() {
                    this.getItems();
                },

                methods: {
                    getItems() {
                        let productIds = [];

                        if (! this.isCustomer) {
                            productIds = this.getStorageValue('compare_items');
                        }

                        this.$axios.get("<?php echo e(route('shop.api.compare.index')); ?>", {
                                params: {
                                    product_ids: productIds,
                                },
                            })
                            .then(response => {
                                this.isLoading = false;

                                this.items = response.data.data;
                            })
                            .catch(error => {});
                    },

                    remove(productId) {
                        this.$emitter.emit('open-confirm-modal', {
                            agree: () => {
                                if (! this.isCustomer) {
                                    const index = this.items.findIndex((item) => item.id === productId);

                                    this.items.splice(index, 1);

                                    let items = this.getStorageValue()
                                        .filter(item => item != productId);

                                    localStorage.setItem('compare_items', JSON.stringify(items));

                                    return;
                                }

                                this.$axios.post("<?php echo e(route('shop.api.compare.destroy')); ?>", {
                                        '_method': 'DELETE',
                                        'product_id': productId,
                                    })
                                    .then(response => {
                                        this.items = response.data.data;

                                        this.$emitter.emit('add-flash', { type: 'success', message: response.data.message });

                                    })
                                    .catch(error => {
                                        this.$emitter.emit('add-flash', { type: 'error', message: response.data.message });
                                    });
                            }
                        });
                    },

                    removeAll() {
                        this.$emitter.emit('open-confirm-modal', {
                            agree: () => {
                                if (! this.isCustomer) {
                                    localStorage.removeItem('compare_items');

                                    this.items = [];

                                    this.$emitter.emit('add-flash', { type: 'success', message:  "<?php echo app('translator')->get('shop::app.compare.remove-all-success'); ?>" });

                                    return;
                                }

                                this.$axios.post("<?php echo e(route('shop.api.compare.destroy_all')); ?>", {
                                        '_method': 'DELETE',
                                    })
                                    .then(response => {
                                        this.items = [];

                                        this.$emitter.emit('add-flash', { type: 'success', message: response.data.data.message });
                                    })
                                    .catch(error => {});
                            }
                        });
                    },

                    getStorageValue() {
                        let value = localStorage.getItem('compare_items');

                        if (! value) {
                            return [];
                        }

                        return JSON.parse(value);
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
<?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Shop\src\Resources\views\compare\index.blade.php ENDPATH**/ ?>