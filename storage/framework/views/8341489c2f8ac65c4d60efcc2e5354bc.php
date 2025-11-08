<?php if (isset($component)) { $__componentOriginal8001c520f4b7dcb40a16cd3b411856d1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8001c520f4b7dcb40a16cd3b411856d1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.layouts.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::layouts'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <!-- Title of the page. -->
     <?php $__env->slot('title', null, []); ?> 
        <?php echo app('translator')->get('admin::app.configuration.index.title'); ?>
     <?php $__env->endSlot(); ?>

    <!-- Heading of the page -->
    <div class="mb-7 flex items-center justify-between">
        <p class="py-3 text-xl font-bold text-gray-800 dark:text-white">
            <?php echo app('translator')->get('admin::app.configuration.index.title'); ?>
        </p>

        <!-- Configuration Search Bar Vue Component -->
        <v-configuration-search>
            <div class="relative flex w-[525px] max-w-[525px] items-center max-lg:w-[400px] ltr:ml-2.5 rtl:mr-2.5">
                <i class="icon-search absolute top-1.5 flex items-center text-2xl ltr:left-3 rtl:right-3"></i>

                <input
                    type="text"
                    class="block w-full rounded-lg border bg-white px-10 py-1.5 leading-6 text-gray-600 transition-all hover:border-gray-400 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300"
                    placeholder="<?php echo app('translator')->get('admin::app.configuration.index.search'); ?>"
                >
            </div>
        </v-configuration-search>
    </div>

    <!-- Page Content -->
    <div class="grid gap-y-8">
        <?php $__currentLoopData = system_config()->getItems(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div>
                <div class="grid gap-1">
                    <!-- Title of the Main Card -->
                    <p class="font-semibold text-gray-600 dark:text-gray-300">
                        <?php echo e($item->getName()); ?>

                    </p>

                    <!-- Info of the Main Card -->
                    <p class="text-gray-600 dark:text-gray-300">
                        <?php echo e($item->getInfo()); ?>

                    </p>
                </div>

                <div class="box-shadow max-1580:grid-cols-3 mt-2 grid grid-cols-4 flex-wrap justify-between gap-12 rounded bg-white p-4 dark:bg-gray-900 max-xl:grid-cols-2 max-sm:grid-cols-1">
                    <!-- Menus cards -->
                    <?php $__currentLoopData = $item->getChildren(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a
                            class="flex max-w-[360px] items-center gap-2 rounded-lg p-2 transition-all hover:bg-gray-100 dark:hover:bg-gray-950"
                            href="<?php echo e(route('admin.configuration.index', ($item->getKey() . '/' . $key))); ?>"
                        >
                            <?php if($icon = $child->getIcon()): ?>
                                <img
                                    class="h-[60px] w-[60px] dark:mix-blend-exclusion dark:invert"
                                    src="<?php echo e(bagisto_asset('images/' . $icon)); ?>"
                                >
                            <?php endif; ?>

                            <?php if($iconClass = $child->getIconClass()): ?>
                                <span class="<?php echo e($iconClass); ?>"></span>
                            <?php endif; ?>

                            <div class="grid">
                                <p class="mb-1.5 text-base font-semibold text-gray-800 dark:text-white">
                                    <?php echo e($child->getName()); ?>

                                </p>

                                <p class="text-xs text-gray-600 dark:text-gray-300">
                                    <?php echo e($child->getInfo()); ?>

                                </p>
                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <?php if (! $__env->hasRenderedOnce('3d9dece5-6090-4878-b189-41b411d3e323')): $__env->markAsRenderedOnce('3d9dece5-6090-4878-b189-41b411d3e323');
$__env->startPush('scripts'); ?>
        <script type="text/x-template" id="v-configuration-search-template">
            <div class="relative flex w-[525px] max-w-[525px] items-center max-lg:w-[400px] ltr:ml-2.5 rtl:mr-2.5">
                <i class="icon-search absolute top-1.5 flex items-center text-2xl ltr:left-3 rtl:right-3"></i>

                <input
                    type="text"
                    class="peer block w-full rounded-lg border bg-white px-10 py-1.5 leading-6 text-gray-600 transition-all hover:border-gray-400 focus:border-gray-400 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300 dark:hover:border-gray-400 dark:focus:border-gray-400"
                    :class="{'border-gray-400': isDropdownOpen}"
                    placeholder="<?php echo app('translator')->get('admin::app.configuration.index.search'); ?>"
                    v-model.lazy="searchTerm"
                    @click="searchTerm.length >= 2 ? isDropdownOpen = true : {}"
                    v-debounce="500"
                >

                <div
                    class="absolute top-10 z-10 w-full rounded-lg border bg-white shadow-[0px_0px_0px_0px_rgba(0,0,0,0.10),0px_1px_3px_0px_rgba(0,0,0,0.10),0px_5px_5px_0px_rgba(0,0,0,0.09),0px_12px_7px_0px_rgba(0,0,0,0.05),0px_22px_9px_0px_rgba(0,0,0,0.01),0px_34px_9px_0px_rgba(0,0,0,0.00)] dark:border-gray-800 dark:bg-gray-900"
                    v-if="isDropdownOpen"
                >
                    <template v-if="isLoading">
                        <?php if (isset($component)) { $__componentOriginal9943e20bc07ac2bc6cf86ef88fcdcb7e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9943e20bc07ac2bc6cf86ef88fcdcb7e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.shimmer.header.mega-search.categories','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::shimmer.header.mega-search.categories'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9943e20bc07ac2bc6cf86ef88fcdcb7e)): ?>
<?php $attributes = $__attributesOriginal9943e20bc07ac2bc6cf86ef88fcdcb7e; ?>
<?php unset($__attributesOriginal9943e20bc07ac2bc6cf86ef88fcdcb7e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9943e20bc07ac2bc6cf86ef88fcdcb7e)): ?>
<?php $component = $__componentOriginal9943e20bc07ac2bc6cf86ef88fcdcb7e; ?>
<?php unset($__componentOriginal9943e20bc07ac2bc6cf86ef88fcdcb7e); ?>
<?php endif; ?>
                    </template>

                    <template v-else>
                        <div class="grid max-h-[400px] overflow-y-auto">
                            <a
                                :href="category.url"
                                class="cursor-pointer border-b p-4 text-sm font-semibold text-gray-600 last:border-b-0 hover:bg-gray-100 dark:border-gray-800 dark:text-gray-300 dark:hover:bg-gray-950"
                                v-for="category in searchedResults.data"
                            >
                                {{ category.title }}
                            </a>

                            <div
                                class="p-4 text-sm font-semibold text-gray-600 dark:text-gray-300"
                                v-if="searchedResults.data.length === 0"
                            >
                                <?php echo app('translator')->get('admin::app.configuration.index.no-result-found'); ?>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </script>

        <script type="module">
            app.component('v-configuration-search', {
                template: '#v-configuration-search-template',

                data() {
                    return {
                        isDropdownOpen: false,

                        isLoading: false,

                        searchTerm: '',

                        searchedResults: [],
                    };
                },

                watch: {
                    searchTerm(newVal, oldVal) {
                        this.search();
                    },
                },

                created() {
                    window.addEventListener('click', this.handleFocusOut);
                },

                beforeDestroy() {
                    window.removeEventListener('click', this.handleFocusOut);
                },

                methods: {
                    search() {
                        if (this.searchTerm.length <= 1) {
                            this.searchedResults = [];

                            this.isDropdownOpen = false;

                            return;
                        }

                        this.isDropdownOpen = true;

                        this.isLoading = true;

                        this.$axios.get("<?php echo e(route('admin.configuration.search')); ?>", {
                                params: {query: this.searchTerm}
                            })
                            .then((response) => {
                                this.searchedResults = response.data;

                                this.isLoading = false;
                            })
                            .catch((error) => {});
                    },

                    handleFocusOut(e) {
                        if (! this.$el.contains(e.target)) {
                            this.isDropdownOpen = false;
                        }
                    },
                },
            });
        </script>
    <?php $__env->stopPush(); endif; ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8001c520f4b7dcb40a16cd3b411856d1)): ?>
<?php $attributes = $__attributesOriginal8001c520f4b7dcb40a16cd3b411856d1; ?>
<?php unset($__attributesOriginal8001c520f4b7dcb40a16cd3b411856d1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8001c520f4b7dcb40a16cd3b411856d1)): ?>
<?php $component = $__componentOriginal8001c520f4b7dcb40a16cd3b411856d1; ?>
<?php unset($__componentOriginal8001c520f4b7dcb40a16cd3b411856d1); ?>
<?php endif; ?>
<?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Admin\src/resources/views/configuration/index.blade.php ENDPATH**/ ?>