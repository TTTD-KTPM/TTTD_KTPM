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
    <v-customer-view>
        <!-- Shimmer Effect -->
        <?php if (isset($component)) { $__componentOriginalcf5c6eb4f2fb6a302fb95786e5737a30 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcf5c6eb4f2fb6a302fb95786e5737a30 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.shimmer.customers.view.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::shimmer.customers.view'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcf5c6eb4f2fb6a302fb95786e5737a30)): ?>
<?php $attributes = $__attributesOriginalcf5c6eb4f2fb6a302fb95786e5737a30; ?>
<?php unset($__attributesOriginalcf5c6eb4f2fb6a302fb95786e5737a30); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcf5c6eb4f2fb6a302fb95786e5737a30)): ?>
<?php $component = $__componentOriginalcf5c6eb4f2fb6a302fb95786e5737a30; ?>
<?php unset($__componentOriginalcf5c6eb4f2fb6a302fb95786e5737a30); ?>
<?php endif; ?>
    </v-customer-view>

    <?php if (! $__env->hasRenderedOnce('eadd339d-54ad-42da-b6de-596ab27be9cf')): $__env->markAsRenderedOnce('eadd339d-54ad-42da-b6de-596ab27be9cf');
$__env->startPush('scripts'); ?>
        <script
            type="text/x-template"
            id="v-customer-view-template"
        >
            <!-- Page Title -->
             <?php $__env->slot('title', null, []); ?> 
                <?php echo app('translator')->get('admin::app.customers.customers.view.title'); ?>
             <?php $__env->endSlot(); ?>

            <div class="grid">
                <div class="flex items-center justify-between gap-4 max-sm:flex-wrap">
                    <div class="flex items-center gap-2.5">
                        <template
                            v-if="! customer"
                            class="flex gap-5"
                        >
                            <p class="shimmer w-32 p-2.5"></p>

                            <p class="shimmer w-14 p-2.5"></p>
                        </template>

                        <template v-else>
                            <h1
                                v-if="customer"
                                class="text-xl font-bold leading-6 text-gray-800 dark:text-white"
                                v-text="`${customer.first_name} ${customer.last_name}`"
                            ></h1>

                            <span
                                v-if="customer.status"
                                class="label-active mx-1.5 text-sm"
                            >
                                <?php echo app('translator')->get('admin::app.customers.customers.view.active'); ?>
                            </span>

                            <span
                                v-else
                                class="label-canceled mx-1.5 text-sm"
                            >
                                <?php echo app('translator')->get('admin::app.customers.customers.view.inactive'); ?>
                            </span>

                            <span
                                v-if="customer.is_suspended"
                                class="label-canceled text-sm"
                            >
                                <?php echo app('translator')->get('admin::app.customers.customers.view.suspended'); ?>
                            </span>
                        </template>
                    </div>

                    <!-- Back Button -->
                    <a
                        href="<?php echo e(route('admin.customers.customers.index')); ?>"
                        class="transparent-button hover:bg-gray-200 dark:text-white dark:hover:bg-gray-800"
                    >
                        <?php echo app('translator')->get('admin::app.customers.customers.view.back-btn'); ?>
                    </a>
                </div>
            </div>

            <?php echo view_render_event('bagisto.admin.customers.customers.view.filters.before'); ?>


            <!-- Filters -->
            <div class="mt-7 flex flex-wrap items-center gap-x-1 gap-y-2">
                <!-- Create Order button -->
                <?php if(bouncer()->hasPermission('sales.orders.create')): ?>
                    <div
                        class="inline-flex w-full max-w-max cursor-pointer items-center justify-between gap-x-2 px-1 py-1.5 text-center font-semibold text-gray-600 transition-all hover:rounded-md hover:bg-gray-200 dark:text-gray-300 dark:hover:bg-gray-800"
                        @click="$emitter.emit('open-confirm-modal', {
                            message: '<?php echo app('translator')->get('admin::app.customers.customers.view.order-create-confirmation'); ?>',

                            agree: () => {
                                this.$refs['create-order'].submit()
                            }
                        })"
                    >
                        <span class="icon-cart text-2xl"></span>

                        <?php echo app('translator')->get('admin::app.customers.customers.view.create-order'); ?>

                        <!-- Create Order Form -->
                        <form
                            method="post"
                            action="<?php echo e(route('admin.customers.customers.cart.store', $customer->id)); ?>"
                            ref="create-order"
                        >
                            <?php echo csrf_field(); ?>
                        </form>
                    </div>
                <?php endif; ?>

                <a
                    class="inline-flex w-full max-w-max cursor-pointer items-center justify-between gap-x-2 px-1 py-1.5 text-center font-semibold text-gray-600 transition-all hover:rounded-md hover:bg-gray-200 dark:text-gray-300 dark:hover:bg-gray-800"
                    href="<?php echo e(route('admin.customers.customers.login_as_customer', $customer->id)); ?>"
                    target="_blank"
                >
                    <span class="icon-exit text-2xl"></span>

                    <?php echo app('translator')->get('admin::app.customers.customers.view.login-as-customer'); ?>
                </a>
                
                <!-- Account Delete button -->
                <?php if(bouncer()->hasPermission('customers.customers.delete')): ?>
                    <div
                        class="inline-flex w-full max-w-max cursor-pointer items-center justify-between gap-x-2 px-1 py-1.5 text-center font-semibold text-gray-600 transition-all hover:rounded-md hover:bg-gray-200 dark:text-gray-300 dark:hover:bg-gray-800"
                        @click="$emitter.emit('open-confirm-modal', {
                            message: '<?php echo app('translator')->get('admin::app.customers.customers.view.account-delete-confirmation'); ?>',

                            agree: () => {
                                this.$refs['delete-account'].submit()
                            }
                        })"
                    >
                        <span class="icon-cancel text-2xl"></span>

                        <?php echo app('translator')->get('admin::app.customers.customers.view.delete-account'); ?>

                        <!-- Delete Customer Account -->
                        <form
                            method="post"
                            action="<?php echo e(route('admin.customers.customers.delete', $customer->id)); ?>"
                            ref="delete-account"
                        >
                            <?php echo csrf_field(); ?>
                        </form>
                    </div>
                <?php endif; ?>
            </div>

            <?php echo view_render_event('bagisto.admin.customers.customers.view.filters.after'); ?>


            <!-- Content -->
            <div class="mt-3.5 flex gap-2.5 max-xl:flex-wrap">
                <!-- Left Component -->
                <div class="flex flex-1 flex-col gap-2 max-xl:flex-auto">
                    <?php echo view_render_event('bagisto.admin.customers.customers.view.card.orders.before'); ?>


                    <?php echo $__env->make('admin::customers.customers.view.orders', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                    <?php echo view_render_event('bagisto.admin.customers.customers.view.card.orders.after'); ?>


                    <?php echo view_render_event('bagisto.admin.customers.customers.view.card.invoices.before'); ?>


                    <?php echo $__env->make('admin::customers.customers.view.invoices', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                    <?php echo view_render_event('bagisto.admin.customers.customers.view.card.invoices.after'); ?>


                    <?php echo view_render_event('bagisto.admin.customers.customers.view.card.reviews.before'); ?>


                    <?php echo $__env->make('admin::customers.customers.view.reviews', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                    <?php echo view_render_event('bagisto.admin.customers.customers.view.card.reviews.after'); ?>


                    <?php echo view_render_event('bagisto.admin.customers.customers.view.card.notes.before'); ?>


                    <?php echo $__env->make('admin::customers.customers.view.notes', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                    <?php echo view_render_event('bagisto.admin.customers.customers.view.card.notes.after'); ?>

                </div>

                <!-- Right Component -->
                <div class="flex w-[360px] max-w-full flex-col gap-2 max-sm:w-full">

                    <?php echo view_render_event('bagisto.admin.customers.customers.view.card.accordion.customer.before'); ?>


                    <!-- Information -->
                    <?php echo view_render_event('bagisto.admin.customers.customers.view.card.accordion.customer.after'); ?>


                    <template v-if="! customer">
                        <?php if (isset($component)) { $__componentOriginald4a2ee3b74458b25b1bb9b9a154dc326 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald4a2ee3b74458b25b1bb9b9a154dc326 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.shimmer.accordion.index','data' => ['class' => 'h-[271px] w-[360px]']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::shimmer.accordion'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-[271px] w-[360px]']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald4a2ee3b74458b25b1bb9b9a154dc326)): ?>
<?php $attributes = $__attributesOriginald4a2ee3b74458b25b1bb9b9a154dc326; ?>
<?php unset($__attributesOriginald4a2ee3b74458b25b1bb9b9a154dc326); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald4a2ee3b74458b25b1bb9b9a154dc326)): ?>
<?php $component = $__componentOriginald4a2ee3b74458b25b1bb9b9a154dc326; ?>
<?php unset($__componentOriginald4a2ee3b74458b25b1bb9b9a154dc326); ?>
<?php endif; ?>
                    </template>

                    <template v-else>
                        <?php if (isset($component)) { $__componentOriginale6717d929d3edd1e7d9927d6c11ccc02 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale6717d929d3edd1e7d9927d6c11ccc02 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.accordion.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::accordion'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                             <?php $__env->slot('header', null, []); ?> 
                                <div class="flex w-full">
                                    <p class="w-full p-2.5 text-base font-semibold text-gray-800 dark:text-white">
                                        <?php echo app('translator')->get('admin::app.customers.customers.view.customer'); ?>
                                    </p>

                                    <!--Customer Edit Component -->
                                    <?php echo $__env->make('admin::customers.customers.view.edit', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                </div>
                             <?php $__env->endSlot(); ?>

                             <?php $__env->slot('content', null, []); ?> 
                                <div class="grid gap-y-2.5">
                                    <p
                                        class="break-all font-semibold text-gray-800 dark:text-white"
                                        v-text="`${customer.first_name} ${customer.last_name}`"
                                    >
                                    </p>

                                    <p class="text-gray-600 dark:text-gray-300">
                                        {{ "<?php echo app('translator')->get('admin::app.customers.customers.view.email'); ?>".replace(':email', customer.email ?? 'N/A') }}
                                    </p>

                                    <p class="text-gray-600 dark:text-gray-300">
                                        {{ "<?php echo app('translator')->get('admin::app.customers.customers.view.phone'); ?>".replace(':phone', customer.phone ?? 'N/A') }}
                                    </p>

                                    <p class="text-gray-600 dark:text-gray-300">
                                        {{ "<?php echo app('translator')->get('admin::app.customers.customers.view.gender'); ?>".replace(':gender', customer.gender ?? 'N/A') }}
                                    </p>

                                    <p class="text-gray-600 dark:text-gray-300">
                                        {{ "<?php echo app('translator')->get('admin::app.customers.customers.view.date-of-birth'); ?>".replace(':dob', customer.date_of_birth ?? 'N/A') }}
                                    </p>

                                    <p class="text-gray-600 dark:text-gray-300">
                                        {{ "<?php echo app('translator')->get('admin::app.customers.customers.view.group'); ?>".replace(':group_code', customer.group?.name ?? 'N/A') }}
                                    </p>
                                </div>
                             <?php $__env->endSlot(); ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale6717d929d3edd1e7d9927d6c11ccc02)): ?>
<?php $attributes = $__attributesOriginale6717d929d3edd1e7d9927d6c11ccc02; ?>
<?php unset($__attributesOriginale6717d929d3edd1e7d9927d6c11ccc02); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale6717d929d3edd1e7d9927d6c11ccc02)): ?>
<?php $component = $__componentOriginale6717d929d3edd1e7d9927d6c11ccc02; ?>
<?php unset($__componentOriginale6717d929d3edd1e7d9927d6c11ccc02); ?>
<?php endif; ?>
                    </template>

                    <?php echo view_render_event('bagisto.admin.customers.customers.view.card.accordion.address.before'); ?>


                    <template v-if="! customer">
                        <?php if (isset($component)) { $__componentOriginald4a2ee3b74458b25b1bb9b9a154dc326 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald4a2ee3b74458b25b1bb9b9a154dc326 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.shimmer.accordion.index','data' => ['class' => 'h-[271px] w-[360px]']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::shimmer.accordion'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-[271px] w-[360px]']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald4a2ee3b74458b25b1bb9b9a154dc326)): ?>
<?php $attributes = $__attributesOriginald4a2ee3b74458b25b1bb9b9a154dc326; ?>
<?php unset($__attributesOriginald4a2ee3b74458b25b1bb9b9a154dc326); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald4a2ee3b74458b25b1bb9b9a154dc326)): ?>
<?php $component = $__componentOriginald4a2ee3b74458b25b1bb9b9a154dc326; ?>
<?php unset($__componentOriginald4a2ee3b74458b25b1bb9b9a154dc326); ?>
<?php endif; ?>
                    </template>

                    <template v-else>
                        <!-- Addresses listing-->
                        <?php if (isset($component)) { $__componentOriginale6717d929d3edd1e7d9927d6c11ccc02 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale6717d929d3edd1e7d9927d6c11ccc02 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.accordion.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::accordion'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                             <?php $__env->slot('header', null, []); ?> 
                                <div class="flex w-full">
                                    <!-- Address Title -->
                                    <p class="w-full p-2.5 text-base font-semibold text-gray-800 dark:text-white">
                                        {{ "<?php echo app('translator')->get('admin::app.customers.customers.view.address.count'); ?>".replace(':count', customer.addresses.length) }}
                                    </p>

                                    <!-- Address Create component -->
                                    <?php echo $__env->make('admin::customers.customers.view.address.create', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                </div>
                             <?php $__env->endSlot(); ?>

                             <?php $__env->slot('content', null, []); ?> 
                                <template v-if="customer.addresses.length">
                                    <div
                                        class="grid gap-y-2.5"
                                        v-for="(address, index) in customer.addresses"
                                    >
                                        <p
                                            class="label-pending"
                                            v-if="address.default_address"
                                        >
                                            <?php echo app('translator')->get('admin::app.customers.customers.view.default-address'); ?>
                                        </p>

                                        <p class="break-all font-semibold text-gray-800 dark:text-white">
                                            {{ `${address.first_name} ${address.last_name}` }}

                                            <template v-if="address.company_name">
                                                ({{ address.company_name }})
                                            </template>
                                        </p>

                                        <p class="text-gray-600 dark:text-gray-300">
                                            <template v-if="address.address">
                                                {{ address.address.split('\n').join(', ') }},
                                            </template>

                                            {{ address.city }},
                                            {{ address.state }},
                                            {{ address.country }},
                                            {{ address.postcode }}
                                        </p>

                                        <p class="text-gray-600 dark:text-gray-300">
                                            {{ '<?php echo app('translator')->get('admin::app.customers.customers.view.phone'); ?>'.replace(':phone', address.phone ?? 'N/A') }}
                                        </p>

                                        <!-- E-mail -->
                                        <p class="text-gray-600 dark:text-gray-300">
                                            {{ '<?php echo app('translator')->get('admin::app.customers.customers.view.email'); ?>'.replace(':email', address.email ?? 'N/A') }}
                                        </p>

                                        <div class="flex items-center gap-2.5">
                                            <!-- Edit Address -->
                                            <?php echo $__env->make('admin::customers.customers.view.address.edit', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                                            <!-- Delete Address -->
                                            <?php if(bouncer()->hasPermission('customers.addresses.delete')): ?>
                                                <p
                                                    class="cursor-pointer text-red-600 transition-all hover:underline"
                                                    @click="deleteAddress(address.id)"
                                                >
                                                    <?php echo app('translator')->get('admin::app.customers.customers.view.delete'); ?>
                                                </p>
                                            <?php endif; ?>

                                            <!-- Set Default Address -->
                                            <template v-if="! address.default_address">
                                                <?php if (isset($component)) { $__componentOriginal989f82b74d189698d771eef298c02d90 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal989f82b74d189698d771eef298c02d90 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.button.index','data' => ['buttonType' => 'button','class' => 'flex cursor-pointer justify-center text-sm text-blue-600 transition-all hover:underline','title' => trans('admin::app.customers.customers.view.set-as-default'),':loading' => 'isUpdating[index]',':disabled' => 'isUpdating[index]','@click' => 'setAsDefault(address, index)']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['button-type' => 'button','class' => 'flex cursor-pointer justify-center text-sm text-blue-600 transition-all hover:underline','title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('admin::app.customers.customers.view.set-as-default')),':loading' => 'isUpdating[index]',':disabled' => 'isUpdating[index]','@click' => 'setAsDefault(address, index)']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal989f82b74d189698d771eef298c02d90)): ?>
<?php $attributes = $__attributesOriginal989f82b74d189698d771eef298c02d90; ?>
<?php unset($__attributesOriginal989f82b74d189698d771eef298c02d90); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal989f82b74d189698d771eef298c02d90)): ?>
<?php $component = $__componentOriginal989f82b74d189698d771eef298c02d90; ?>
<?php unset($__componentOriginal989f82b74d189698d771eef298c02d90); ?>
<?php endif; ?>
                                            </template>
                                        </div>

                                        <span
                                            v-if="index != customer?.addresses.length - 1"
                                            class="mb-4 mt-4 block w-full border-b dark:border-gray-800"
                                        ></span>
                                    </div>
                                </template>

                                <template v-else>
                                    <!-- Empty Address Container -->
                                    <div class="flex items-center gap-5 py-2.5">
                                        <img
                                            src="<?php echo e(bagisto_asset('images/settings/address.svg')); ?>"
                                            class="h-20 w-20 dark:mix-blend-exclusion dark:invert"
                                        />

                                        <div class="flex flex-col gap-1.5">
                                            <p class="text-base font-semibold text-gray-400">
                                                <?php echo app('translator')->get('admin::app.customers.customers.view.empty-title'); ?>
                                            </p>

                                            <p class="text-gray-400">
                                                <?php echo app('translator')->get('admin::app.customers.customers.view.empty-description'); ?>
                                            </p>
                                        </div>
                                    </div>
                                </template>
                             <?php $__env->endSlot(); ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale6717d929d3edd1e7d9927d6c11ccc02)): ?>
<?php $attributes = $__attributesOriginale6717d929d3edd1e7d9927d6c11ccc02; ?>
<?php unset($__attributesOriginale6717d929d3edd1e7d9927d6c11ccc02); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale6717d929d3edd1e7d9927d6c11ccc02)): ?>
<?php $component = $__componentOriginale6717d929d3edd1e7d9927d6c11ccc02; ?>
<?php unset($__componentOriginale6717d929d3edd1e7d9927d6c11ccc02); ?>
<?php endif; ?>
                    </template>

                    <?php echo view_render_event('bagisto.admin.customers.customers.view.card.accordion.address.after'); ?>

                </div>
            </div>
        </script>

        <script type="module">
            app.component('v-customer-view', {
                template: '#v-customer-view-template',

                data() {
                    return {
                        customer: <?php echo json_encode($customer, 15, 512) ?>,

                        isUpdating: {},
                    };
                },

                methods: {
                    deleteAddress(id) {
                        this.$emitter.emit('open-confirm-modal', {
                            message: '<?php echo app('translator')->get('admin::app.customers.customers.view.address-delete-confirmation'); ?>',

                            agree: () => {
                                this.$axios.post(`<?php echo e(route('admin.customers.customers.addresses.delete', '')); ?>/${id}`)
                                    .then((response) => {
                                        this.$emitter.emit('add-flash', { type: 'success', message: response.data.message });

                                        this.customer.addresses = this.customer.addresses.filter(address => address.id !== id);
                                    })
                                    .catch((error) => {});
                            },
                        });
                    },

                    setAsDefault(address, index) {
                        this.isUpdating[index] = true;

                        this.$axios.post(`<?php echo e(route('admin.customers.customers.addresses.set_default', '')); ?>/${this.customer.id}`, {
                            set_as_default: address.id,
                        })
                            .then((response) => {
                                this.$emitter.emit('add-flash', { type: 'success', message: response.data.message });

                                this.customer.addresses = this.customer.addresses.map(address => ({
                                    ...address,
                                    default_address: address.id === response.data.data.id
                                        ? response.data.data.default_address
                                        : false,
                                }));

                                this.isUpdating[index] = false;
                            })
                            .catch((error) => this.isUpdating[index] = false);
                    },

                    updateCustomer(data) {
                        this.customer = {
                            ...this.customer,
                            ...data.customer,
                            group: {
                                ...data.group
                            },
                        };
                    },

                    addressCreated(address) {
                        if (address.default_address) {
                            this.customer.addresses.forEach(address => address.default_address = false);
                        }

                        this.customer.addresses.push({
                            ...address,
                            address: address.address.join('\n'),
                        });
                    },

                    addressUpdated(updatedAddress) {
                        if (updatedAddress.default_address) {
                            this.customer.addresses.forEach(address => address.default_address = false);
                        }

                        this.customer.addresses =this.customer.addresses.map(address => {
                            if (address.id === updatedAddress.id) {
                                return {
                                    ...updatedAddress,
                                    address: updatedAddress.address.join('\n'),
                                };
                            }

                            return address;
                        });
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
<?php endif; ?><?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Admin\src\Resources\views\customers\customers\view.blade.php ENDPATH**/ ?>