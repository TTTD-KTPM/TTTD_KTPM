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
        <?php echo app('translator')->get('shop::app.customers.account.reviews.title'); ?>
     <?php $__env->endSlot(); ?>

    <!-- Breadcrumbs -->
    <?php if((core()->getConfigData('general.general.breadcrumbs.shop'))): ?>
        <?php $__env->startSection('breadcrumbs'); ?>
            <?php if (isset($component)) { $__componentOriginaldef12fd0653509715c3bc62a609dde73 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldef12fd0653509715c3bc62a609dde73 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.breadcrumbs.index','data' => ['name' => 'reviews']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::breadcrumbs'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'reviews']); ?>
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

    <div class="mx-4 flex-auto max-md:mx-6 max-sm:mx-4">
        <div class="mb-8 flex items-center max-md:mb-5">
            <!-- Back Button -->
            <a
                class="grid md:hidden"
                href="<?php echo e(route('shop.customers.account.index')); ?>"
            >
                <span class="icon-arrow-left rtl:icon-arrow-right text-2xl"></span>
            </a>

            <h2 class="text-2xl font-medium max-md:text-xl max-sm:text-base ltr:ml-2.5 md:ltr:ml-0 rtl:mr-2.5 md:rtl:mr-0">
                <?php echo app('translator')->get('shop::app.customers.account.reviews.title'); ?>
            </h2>
        </div>

        <!-- Reviews Vue Component -->
        <v-product-reviews>
            <!-- Reviews Shimmer Effect -->
            <?php if (isset($component)) { $__componentOriginaldbbe6b723c34d70ad7b7c0fea5208a78 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldbbe6b723c34d70ad7b7c0fea5208a78 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.shimmer.customers.account.reviews.index','data' => ['count' => 4]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::shimmer.customers.account.reviews'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['count' => 4]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldbbe6b723c34d70ad7b7c0fea5208a78)): ?>
<?php $attributes = $__attributesOriginaldbbe6b723c34d70ad7b7c0fea5208a78; ?>
<?php unset($__attributesOriginaldbbe6b723c34d70ad7b7c0fea5208a78); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldbbe6b723c34d70ad7b7c0fea5208a78)): ?>
<?php $component = $__componentOriginaldbbe6b723c34d70ad7b7c0fea5208a78; ?>
<?php unset($__componentOriginaldbbe6b723c34d70ad7b7c0fea5208a78); ?>
<?php endif; ?>
        </v-product-reviews>

    </div>

    <?php if (! $__env->hasRenderedOnce('3c79b341-ef9e-4992-922f-93af90d5e03e')): $__env->markAsRenderedOnce('3c79b341-ef9e-4992-922f-93af90d5e03e');
$__env->startPush('scripts'); ?>
        <script
            type="text/x-template"
            id="v-product-reviews-template"
        >
            <div>
                <!-- Reviews Shimmer Effect -->
                <template v-if="isLoading">
                    <?php if (isset($component)) { $__componentOriginaldbbe6b723c34d70ad7b7c0fea5208a78 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldbbe6b723c34d70ad7b7c0fea5208a78 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.shimmer.customers.account.reviews.index','data' => ['count' => 4]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::shimmer.customers.account.reviews'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['count' => 4]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldbbe6b723c34d70ad7b7c0fea5208a78)): ?>
<?php $attributes = $__attributesOriginaldbbe6b723c34d70ad7b7c0fea5208a78; ?>
<?php unset($__attributesOriginaldbbe6b723c34d70ad7b7c0fea5208a78); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldbbe6b723c34d70ad7b7c0fea5208a78)): ?>
<?php $component = $__componentOriginaldbbe6b723c34d70ad7b7c0fea5208a78; ?>
<?php unset($__componentOriginaldbbe6b723c34d70ad7b7c0fea5208a78); ?>
<?php endif; ?>
                </template>

                <?php echo view_render_event('bagisto.shop.customers.account.reviews.list.before', ['reviews' => $reviews]); ?>


                <!-- Reviews Information -->
                <template v-else>
                    <?php if(! $reviews->isEmpty()): ?>
                        <!-- Review Information -->
                        <div class="mt-14 grid gap-5 max-1060:grid-cols-[1fr] max-md:mt-5">
                            <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a
                                    href="<?php echo e(route('shop.product_or_category.index', $review->product->url_key)); ?>"
                                    id="<?php echo e($review->product_id); ?>"
                                    aria-label="<?php echo e($review->title); ?>"
                                >
                                    <!-- For Desktop View -->
                                    <div class="flex gap-5 rounded-xl border border-zinc-200 p-6 max-md:hidden max-md:gap-1.5">
                                        <?php echo view_render_event('bagisto.shop.customers.account.reviews.image.before', ['reviews' => $reviews]); ?>


                                        <?php if (isset($component)) { $__componentOriginal3657c70d06ebc8c078f4ecac2ea1a848 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3657c70d06ebc8c078f4ecac2ea1a848 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.media.images.lazy','data' => ['class' => 'h-[146px] max-h-[146px] w-32 min-w-32 max-w-32 rounded-xl','src' => ''.e($review->product->base_image_url ?? bagisto_asset('images/small-product-placeholder.webp')).'','alt' => 'Review Image']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::media.images.lazy'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-[146px] max-h-[146px] w-32 min-w-32 max-w-32 rounded-xl','src' => ''.e($review->product->base_image_url ?? bagisto_asset('images/small-product-placeholder.webp')).'','alt' => 'Review Image']); ?>
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

                                        <?php echo view_render_event('bagisto.shop.customers.account.reviews.image.after', ['reviews' => $reviews]); ?>


                                        <div class="w-full">
                                            <div class="flex justify-between">
                                                <?php echo view_render_event('bagisto.shop.customers.account.reviews.title.before', ['reviews' => $reviews]); ?>


                                                <p class="text-xl font-medium">
                                                    <?php echo e($review->title); ?>

                                                </p>

                                                <?php echo view_render_event('bagisto.shop.customers.account.reviews.title.after', ['reviews' => $reviews]); ?>

        
                                                <?php echo view_render_event('bagisto.shop.customers.account.reviews.rating.before', ['reviews' => $reviews]); ?>


                                                <div class="flex items-center gap-0.5">
                                                    <?php for($i = 1; $i <= 5; $i++): ?>
                                                        <span class="icon-star-fill text-3xl <?php echo e($review->rating >= $i ? 'text-amber-500' : 'text-zinc-500'); ?>"></span>
                                                    <?php endfor; ?>
                                                </div>

                                                <?php echo view_render_event('bagisto.shop.customers.account.reviews.rating.after', ['reviews' => $reviews]); ?>

                                            </div>
        
                                            <?php echo view_render_event('bagisto.shop.customers.account.reviews.created_at.before', ['reviews' => $reviews]); ?>


                                            <p class="mt-2.5 text-sm font-medium">
                                                <?php echo e($review->created_at); ?>

                                            </p>
        
                                            <?php echo view_render_event('bagisto.shop.customers.account.reviews.created_at.after', ['reviews' => $reviews]); ?>


                                            <?php echo view_render_event('bagisto.shop.customers.account.reviews.comment.before', ['reviews' => $reviews]); ?>


                                            <p class="mt-5 text-base text-zinc-500 max-md:mt-2">
                                                <?php echo e($review->comment); ?>

                                            </p>

                                            <?php echo view_render_event('bagisto.shop.customers.account.reviews.comment.after', ['reviews' => $reviews]); ?>

                                        </div>
                                       
                                    </div>

                                    <!-- For Mobile View -->
                                    <div class="flex gap-5 rounded-xl border border-zinc-200 p-6 max-md:grid max-md:gap-2.5 max-md:p-4 md:hidden">
                                        <div class="flex gap-2.5">
                                            <?php echo view_render_event('bagisto.shop.customers.account.reviews.image.before', ['reviews' => $reviews]); ?>

    
                                            <?php if (isset($component)) { $__componentOriginal3657c70d06ebc8c078f4ecac2ea1a848 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3657c70d06ebc8c078f4ecac2ea1a848 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.media.images.lazy','data' => ['class' => 'h-[146px] max-h-[146px] w-32 min-w-32 max-w-32 rounded-xl max-md:h-20 max-md:w-20 max-md:min-w-20 max-md:rounded-lg','src' => ''.e($review->product->base_image_url ?? bagisto_asset('images/small-product-placeholder.webp')).'','alt' => 'Review Image']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::media.images.lazy'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-[146px] max-h-[146px] w-32 min-w-32 max-w-32 rounded-xl max-md:h-20 max-md:w-20 max-md:min-w-20 max-md:rounded-lg','src' => ''.e($review->product->base_image_url ?? bagisto_asset('images/small-product-placeholder.webp')).'','alt' => 'Review Image']); ?>
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
    
                                            <?php echo view_render_event('bagisto.shop.customers.account.reviews.image.after', ['reviews' => $reviews]); ?>


                                            <div class="justify-between">
                                                <?php echo view_render_event('bagisto.shop.customers.account.reviews.title.before', ['reviews' => $reviews]); ?>


                                                <p class="text-xl font-medium max-md:text-base">
                                                    <?php echo e($review->title); ?>

                                                </p>

                                                <?php echo view_render_event('bagisto.shop.customers.account.reviews.title.after', ['reviews' => $reviews]); ?>


                                                <?php echo view_render_event('bagisto.shop.customers.account.reviews.created_at.before', ['reviews' => $reviews]); ?>


                                                <p class="mt-1.5 font-normal text-zinc-500 max-md:mt-0 max-md:text-xs">
                                                    <?php echo e($review->created_at); ?>

                                                </p>
            
                                                <?php echo view_render_event('bagisto.shop.customers.account.reviews.created_at.after', ['reviews' => $reviews]); ?>

        
                                                <?php echo view_render_event('bagisto.shop.customers.account.reviews.rating.before', ['reviews' => $reviews]); ?>


                                                <div class="mt-1 flex items-center">
                                                    <?php for($i = 1; $i <= 5; $i++): ?>
                                                        <span class="icon-star-fill text-3xl <?php echo e($review->rating >= $i ? 'text-amber-500' : 'text-zinc-500'); ?>"></span>
                                                    <?php endfor; ?>
                                                </div>

                                                <?php echo view_render_event('bagisto.shop.customers.account.reviews.rating.after', ['reviews' => $reviews]); ?>

                                            </div>

                                        </div>

                                        <div>
                                            <?php echo view_render_event('bagisto.shop.customers.account.reviews.comment.before', ['reviews' => $reviews]); ?>


                                            <p class="text-xs text-zinc-500">
                                                <?php echo e($review->comment); ?>

                                            </p>

                                            <?php echo view_render_event('bagisto.shop.customers.account.reviews.comment.after', ['reviews' => $reviews]); ?>

                                        </div>
                                    </div>
                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <!-- Pagination -->
                            <?php echo e($reviews->links()); ?>

                        </div>
                    <?php else: ?>
                        <!-- Review Empty Page -->
                        <div class="m-auto grid w-full place-content-center items-center justify-items-center py-32 text-center">
                            <img
                                class="max-md:h-[100px] max-md:w-[100px]"
                                src="<?php echo e(bagisto_asset('images/review.png')); ?>"
                                alt="Empty Review"
                                title=""
                            >

                            <p
                                class="text-xl max-md:text-sm"
                                role="heading"
                            >
                                <?php echo app('translator')->get('shop::app.customers.account.reviews.empty-review'); ?>
                            </p>
                        </div>
                    <?php endif; ?>
                </template>

                <?php echo view_render_event('bagisto.shop.customers.account.reviews.list.after', ['reviews' => $reviews]); ?>


            </div>
        </script>

        <script type="module">
            app.component("v-product-reviews", {
                template: '#v-product-reviews-template',

                data() {
                    return {
                        isLoading: true,
                    };
                },

                mounted() {
                    this.get();
                },

                methods: {
                    get() {
                        this.$axios.get("<?php echo e(route('shop.customers.account.reviews.index')); ?>")
                            .then(response => {
                                this.isLoading = false;
                            })
                            .catch(error => {});
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
<?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Shop\src\Resources\views\customers\account\reviews\index.blade.php ENDPATH**/ ?>