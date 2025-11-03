<?php if (isset($component)) { $__componentOriginal2643b7d197f48caff2f606750db81304 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2643b7d197f48caff2f606750db81304 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.layouts.index','data' => ['hasHeader' => true,'hasFeature' => false,'hasFooter' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::layouts'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['has-header' => true,'has-feature' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false),'has-footer' => true]); ?>
    <!-- Page Title -->
     <?php $__env->slot('title', null, []); ?> 
		<?php echo app('translator')->get('shop::app.checkout.success.thanks'); ?>
     <?php $__env->endSlot(); ?>

	<!-- Page content -->
	<div class="container mt-8 px-[60px] max-lg:px-8">
		<div class="grid place-items-center gap-y-5 max-md:gap-y-2.5">
			<?php echo e(view_render_event('bagisto.shop.checkout.success.image.before', ['order' => $order])); ?>


			<img
				class="max-md:h-[100px] max-md:w-[100px]"
				src="<?php echo e(bagisto_asset('images/thank-you.png')); ?>"
				alt="<?php echo app('translator')->get('shop::app.checkout.success.thanks'); ?>"
				title="<?php echo app('translator')->get('shop::app.checkout.success.thanks'); ?>"
                loading="lazy"
                decoding="async"
			>

			<?php echo e(view_render_event('bagisto.shop.checkout.success.image.after', ['order' => $order])); ?>


			<p class="text-xl max-md:text-sm">
				<?php if(auth()->guard('customer')->user()): ?>
					<?php echo app('translator')->get('shop::app.checkout.success.order-id-info', [
						'order_id' => '<a class="text-blue-700" href="'.route('shop.customers.account.orders.view', $order->id).'">'.$order->increment_id.'</a>'
					]); ?>
				<?php else: ?>
					<?php echo app('translator')->get('shop::app.checkout.success.order-id-info', ['order_id' => $order->increment_id]); ?>
				<?php endif; ?>
			</p>

			<p class="font-medium md:text-2xl">
				<?php echo app('translator')->get('shop::app.checkout.success.thanks'); ?>
			</p>

			<p class="text-xl text-zinc-500 max-md:text-center max-md:text-xs">
				<?php if(! empty($order->checkout_message)): ?>
					<?php echo nl2br($order->checkout_message); ?>

				<?php else: ?>
					<?php echo app('translator')->get('shop::app.checkout.success.info'); ?>
				<?php endif; ?>
			</p>

			<?php echo e(view_render_event('bagisto.shop.checkout.success.continue-shopping.before', ['order' => $order])); ?>


			<a href="<?php echo e(route('shop.home.index')); ?>">
				<div class="w-max cursor-pointer rounded-2xl bg-navyBlue px-11 py-3 text-center text-base font-medium text-white max-md:rounded-lg max-md:px-6 max-md:py-1.5">
             		<?php echo app('translator')->get('shop::app.checkout.cart.index.continue-shopping'); ?>
				</div>
			</a>

			<?php echo e(view_render_event('bagisto.shop.checkout.success.continue-shopping.after', ['order' => $order])); ?>

		</div>
	</div>
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
<?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Shop\src\Resources\views\checkout\success.blade.php ENDPATH**/ ?>