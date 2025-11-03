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
    <!-- Page Title -->
     <?php $__env->slot('title', null, []); ?> 
        <?php echo app('translator')->get('admin::app.sales.orders.index.title'); ?>
     <?php $__env->endSlot(); ?>

    <div class="flex items-center justify-between gap-4 max-sm:flex-wrap">
        <p class="py-3 text-xl font-bold text-gray-800 dark:text-white">
            <?php echo app('translator')->get('admin::app.sales.orders.index.title'); ?>
        </p>

        <div class="flex items-center gap-x-2.5">
            <?php if (isset($component)) { $__componentOriginal3e5e7d009dccab33c23fb94a77703935 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3e5e7d009dccab33c23fb94a77703935 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.datagrid.export.index','data' => ['src' => ''.e(route('admin.sales.orders.index')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::datagrid.export'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['src' => ''.e(route('admin.sales.orders.index')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3e5e7d009dccab33c23fb94a77703935)): ?>
<?php $attributes = $__attributesOriginal3e5e7d009dccab33c23fb94a77703935; ?>
<?php unset($__attributesOriginal3e5e7d009dccab33c23fb94a77703935); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3e5e7d009dccab33c23fb94a77703935)): ?>
<?php $component = $__componentOriginal3e5e7d009dccab33c23fb94a77703935; ?>
<?php unset($__componentOriginal3e5e7d009dccab33c23fb94a77703935); ?>
<?php endif; ?>

            <?php echo view_render_event('bagisto.admin.sales.orders.create.before'); ?>


            <?php if(bouncer()->hasPermission('sales.orders.create')): ?>
                <button
                    class="primary-button"
                    @click="$refs.selectCustomerComponent.openDrawer()"
                >
                    <?php echo app('translator')->get('admin::app.sales.orders.index.create-btn'); ?>
                </button>
            <?php endif; ?>

            <?php echo view_render_event('bagisto.admin.sales.orders.create.after'); ?>

        </div>
    </div>

    <v-customer-search ref="selectCustomerComponent"></v-customer-search>

    <?php if (isset($component)) { $__componentOriginal3bea17ac3f7235e71a823454ccb74424 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3bea17ac3f7235e71a823454ccb74424 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.datagrid.index','data' => ['src' => route('admin.sales.orders.index'),'isMultiRow' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::datagrid'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['src' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.sales.orders.index')),'isMultiRow' => true]); ?>
        <template #header="{
            isLoading,
            available,
            applied,
            selectAll,
            sort,
            performAction
        }">
            <template v-if="isLoading">
                <?php if (isset($component)) { $__componentOriginalc107096d39100b5f7264e4f2087676a5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc107096d39100b5f7264e4f2087676a5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.shimmer.datagrid.table.head','data' => ['isMultiRow' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::shimmer.datagrid.table.head'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['isMultiRow' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc107096d39100b5f7264e4f2087676a5)): ?>
<?php $attributes = $__attributesOriginalc107096d39100b5f7264e4f2087676a5; ?>
<?php unset($__attributesOriginalc107096d39100b5f7264e4f2087676a5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc107096d39100b5f7264e4f2087676a5)): ?>
<?php $component = $__componentOriginalc107096d39100b5f7264e4f2087676a5; ?>
<?php unset($__componentOriginalc107096d39100b5f7264e4f2087676a5); ?>
<?php endif; ?>
            </template>

            <template v-else>
                <!-- Grid Header Columns -->
                <div class="row grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 items-center border-b px-2 sm:px-4 py-2.5 dark:border-gray-800">
                    <div
                        class="flex select-none items-center gap-2.5"
                        v-for="(columnGroup, index) in [['increment_id', 'created_at', 'status'], ['base_grand_total', 'method', 'channel_id'], ['full_name', 'customer_email', 'location'], ['items']]"
                    >
                        <p class="text-gray-600 dark:text-gray-300 text-sm sm:text-base">
                            <span class="[&>*]:after:content-['_/_']">
                                <template v-for="column in columnGroup">
                                    <span
                                        class="after:content-['/'] last:after:content-['']"
                                        :class="{
                                            'font-medium text-gray-800 dark:text-white': applied.sort.column == column,
                                            'cursor-pointer hover:text-gray-800 dark:hover:text-white': available.columns.find(columnTemp => columnTemp.index === column)?.sortable,
                                        }"
                                        @click="
                                            available.columns.find(columnTemp => columnTemp.index === column)?.sortable ? sort(available.columns.find(columnTemp => columnTemp.index === column)) : {}
                                        "
                                    >
                                        {{ available.columns.find(columnTemp => columnTemp.index === column)?.label }}
                                    </span>
                                </template>
                            </span>

                            <i
                                class="align-text-bottom text-base text-gray-800 dark:text-white ltr:ml-1.5 rtl:mr-1.5"
                                :class="[applied.sort.order === 'asc' ? 'icon-down-stat': 'icon-up-stat']"
                                v-if="columnGroup.includes(applied.sort.column)"
                            >
                            </i>
                        </p>
                    </div>
                </div>
            </template>
        </template>

        <template #body="{
            isLoading,
            available,
            applied,
            selectAll,
            sort,
            performAction
        }">
            <template v-if="isLoading">
                <?php if (isset($component)) { $__componentOriginal601d211589286a2faeaa4f7f9edf9405 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal601d211589286a2faeaa4f7f9edf9405 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.shimmer.datagrid.table.body','data' => ['isMultiRow' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::shimmer.datagrid.table.body'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['isMultiRow' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal601d211589286a2faeaa4f7f9edf9405)): ?>
<?php $attributes = $__attributesOriginal601d211589286a2faeaa4f7f9edf9405; ?>
<?php unset($__attributesOriginal601d211589286a2faeaa4f7f9edf9405); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal601d211589286a2faeaa4f7f9edf9405)): ?>
<?php $component = $__componentOriginal601d211589286a2faeaa4f7f9edf9405; ?>
<?php unset($__componentOriginal601d211589286a2faeaa4f7f9edf9405); ?>
<?php endif; ?>
            </template>

            <template v-else>
                <!-- Order Rows -->
                <div
                    class="row grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-y-4 border-b px-2 sm:px-4 py-2.5 transition-all hover:bg-gray-50 dark:border-gray-800 dark:hover:bg-gray-950"
                    v-for="record in available.records"
                >
                    <!-- Order Id, Created, Status Section -->
                    <div class="flex flex-col gap-1.5">
                        <p class="text-sm sm:text-base font-semibold text-gray-800 dark:text-white">
                            {{ "<?php echo app('translator')->get('admin::app.sales.orders.index.datagrid.id'); ?>".replace(':id', record.increment_id) }}
                        </p>

                        <p class="text-xs sm:text-sm text-gray-600 dark:text-gray-300">
                            {{ record.created_at }}
                        </p>
                        
                        <p v-html="record.status"></p>
                    </div>

                    <!-- Total Amount, Pay Via, Channel -->
                    <div class="flex flex-col gap-1.5">
                        <p class="text-sm sm:text-base font-semibold text-gray-800 dark:text-white">
                            {{ $admin.formatPrice(record.base_grand_total) }}
                        </p>

                        <p class="text-xs sm:text-sm text-gray-600 dark:text-gray-300">
                            <?php echo app('translator')->get('admin::app.sales.orders.index.datagrid.pay-by', ['method' => '']); ?>{{ record.method }}
                        </p>

                        <p class="text-xs sm:text-sm text-gray-600 dark:text-gray-300">
                            {{ record.channel_name }}
                        </p>
                    </div>

                    <!-- Customer, Email, Location Section -->
                    <div class="flex flex-col gap-1.5">
                        <p class="text-sm sm:text-base text-gray-800 dark:text-white">
                            {{ record.full_name }}
                        </p>

                        <p class="text-xs sm:text-sm text-gray-600 dark:text-gray-300">
                            {{ record.customer_email }}
                        </p>

                        <p class="text-xs sm:text-sm text-gray-600 dark:text-gray-300">
                            {{ record.location }}
                        </p>
                    </div>

                    <!-- Images Section -->
                    <div class="flex items-center justify-between gap-x-2">
                        <div
                            class="flex flex-col gap-1.5 text-xs sm:text-sm"
                            v-html="record.items"
                        >
                        </div>

                        <a :href=`<?php echo e(route('admin.sales.orders.view', '')); ?>/${record.id}`>
                            <span class="icon-sort-right rtl:icon-sort-left cursor-pointer p-1.5 text-xl sm:text-2xl hover:rounded-md hover:bg-gray-200 dark:hover:bg-gray-800 ltr:ml-1 rtl:mr-1"></span>
                        </a>
                    </div>
                </div>
            </template>
        </template>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3bea17ac3f7235e71a823454ccb74424)): ?>
<?php $attributes = $__attributesOriginal3bea17ac3f7235e71a823454ccb74424; ?>
<?php unset($__attributesOriginal3bea17ac3f7235e71a823454ccb74424); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3bea17ac3f7235e71a823454ccb74424)): ?>
<?php $component = $__componentOriginal3bea17ac3f7235e71a823454ccb74424; ?>
<?php unset($__componentOriginal3bea17ac3f7235e71a823454ccb74424); ?>
<?php endif; ?>

    <?php echo $__env->make('admin::customers.customers.index.create', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php if (! $__env->hasRenderedOnce('2b590741-1724-4fc1-bc92-f47ddb08458d')): $__env->markAsRenderedOnce('2b590741-1724-4fc1-bc92-f47ddb08458d');
$__env->startPush('scripts'); ?>
        <script
            type="text/x-template"
            id="v-customer-search-template"
        >
            <div class="">
                <!-- Search Drawer -->
                <?php if (isset($component)) { $__componentOriginal9bfb526197f1d7304e7fade44c26fbb8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9bfb526197f1d7304e7fade44c26fbb8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.drawer.index','data' => ['ref' => 'searchCustomerDrawer','@close' => 'searchTerm = \'\'; searchedCustomers = [];']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::drawer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['ref' => 'searchCustomerDrawer','@close' => 'searchTerm = \'\'; searchedCustomers = [];']); ?>
                    <!-- Drawer Header -->
                     <?php $__env->slot('header', null, []); ?> 
                        <div class="grid gap-3">
                            <p class="py-2 text-xl font-medium dark:text-white">
                                <?php echo app('translator')->get('admin::app.sales.orders.index.search-customer.title'); ?>
                            </p>

                            <div class="relative w-full">
                                <input
                                    type="text"
                                    class="block w-full rounded-lg border bg-white py-1.5 leading-6 text-gray-600 transition-all hover:border-gray-400 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300 ltr:pl-3 ltr:pr-10 rtl:pl-10 rtl:pr-3"
                                    placeholder="<?php echo app('translator')->get('admin::app.sales.orders.index.search-customer.search-by'); ?>"
                                    v-model.lazy="searchTerm"
                                    v-debounce="500"
                                />

                                <template v-if="isSearching">
                                    <img
                                        class="absolute top-2.5 h-5 w-5 animate-spin ltr:right-3 rtl:left-3"
                                        src="<?php echo e(bagisto_asset('images/spinner.svg')); ?>"
                                    />
                                </template>

                                <template v-else>
                                    <span class="icon-search pointer-events-none absolute top-1.5 flex items-center text-2xl ltr:right-3 rtl:left-3"></span>
                                </template>
                            </div>
                        </div>
                     <?php $__env->endSlot(); ?>

                    <!-- Drawer Content -->
                     <?php $__env->slot('content', null, ['class' => '!p-0']); ?> 
                        <div
                            class="grid max-h-[400px] overflow-y-auto"
                            v-if="searchedCustomers.length"
                        >
                            <div
                                class="grid cursor-pointer place-content-start gap-1.5 border-b border-slate-300 p-4 last:border-b-0 hover:bg-gray-100 dark:border-gray-800 dark:hover:bg-gray-950"
                                v-for="customer in searchedCustomers"
                                @click="createCart(customer)"
                            >
                                <p class="text-base font-semibold text-gray-600 dark:text-gray-300">
                                    {{ customer.first_name + ' ' + customer.last_name }}
                                </p>

                                <p class="text-gray-500">
                                    {{ customer.email }}
                                </p>
                            </div>
                        </div>

                        <!-- For Empty Variations -->
                        <div
                            class="grid justify-center justify-items-center gap-3.5 px-2.5 py-10"
                            v-else
                        >
                            <!-- Placeholder Image -->
                            <img
                                src="<?php echo e(bagisto_asset('images/empty-placeholders/customers.svg')); ?>"
                                class="h-20 w-20 dark:mix-blend-exclusion dark:invert"
                            />

                            <!-- Add Variants Information -->
                            <div class="flex flex-col items-center gap-1.5">
                                <p class="text-base font-semibold text-gray-400">
                                    <?php echo app('translator')->get('admin::app.sales.orders.index.search-customer.empty-title'); ?>
                                </p>

                                <p class="text-gray-400">
                                    <?php echo app('translator')->get('admin::app.sales.orders.index.search-customer.empty-info'); ?>
                                </p>

                                <button
                                    class="secondary-button"
                                    @click="$refs.searchCustomerDrawer.close(); $refs.createCustomerComponent.openModal()"
                                >
                                    <?php echo app('translator')->get('admin::app.sales.orders.index.search-customer.create-btn'); ?>
                                </button>
                            </div>
                        </div>
                     <?php $__env->endSlot(); ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9bfb526197f1d7304e7fade44c26fbb8)): ?>
<?php $attributes = $__attributesOriginal9bfb526197f1d7304e7fade44c26fbb8; ?>
<?php unset($__attributesOriginal9bfb526197f1d7304e7fade44c26fbb8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9bfb526197f1d7304e7fade44c26fbb8)): ?>
<?php $component = $__componentOriginal9bfb526197f1d7304e7fade44c26fbb8; ?>
<?php unset($__componentOriginal9bfb526197f1d7304e7fade44c26fbb8); ?>
<?php endif; ?>

                <v-create-customer-form
                    ref="createCustomerComponent"
                    @customer-created="createCart"
                ></v-create-customer-form>
            </div>
        </script>

        <script type="module">
            app.component('v-customer-search', {
                template: '#v-customer-search-template',

                data() {
                    return {
                        searchTerm: '',

                        searchedCustomers: [],

                        isSearching: false,
                    }
                },

                watch: {
                    searchTerm: function(newVal, oldVal) {
                        this.search();
                    }
                },

                methods: {
                    openDrawer() {
                        this.$refs.searchCustomerDrawer.open();
                    },

                    search() {
                        if (this.searchTerm.length <= 1) {
                            this.searchedCustomers = [];

                            return;
                        }

                        this.isSearching = true;

                        let self = this;

                        this.$axios.get("<?php echo e(route('admin.customers.customers.search')); ?>", {
                                params: {
                                    query: this.searchTerm,
                                }
                            })
                            .then(function(response) {
                                self.isSearching = false;

                                self.searchedCustomers = response.data.data;
                            })
                            .catch(function (error) {
                            });
                    },

                    createCart(customer) {
                        this.$axios.post("<?php echo e(route('admin.sales.cart.store')); ?>", {customer_id: customer.id})
                            .then(function(response) {
                                window.location.href = response.data.redirect_url;
                            })
                            .catch(function (error) {
                                this.$emitter.emit('add-flash', { type: 'error', message: error.response.data.message });
                            });
                    },
                }
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
<?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Admin\src\Resources\views\sales\orders\index.blade.php ENDPATH**/ ?>