<?php
    $customer = auth()->guard('customer')->user();
?>

<div class="panel-side journal-scroll grid max-h-[1320px] min-w-[342px] max-w-[380px] grid-cols-[1fr] gap-8 overflow-y-auto overflow-x-hidden max-xl:min-w-[270px] max-md:max-w-full max-md:gap-5">
    <!-- Account Profile Hero Section -->
    <div class="grid grid-cols-[auto_1fr] items-center gap-4 rounded-xl border border-zinc-200 px-5 py-[25px] max-md:py-2.5">
        <div class="">
            <img
                src="<?php echo e($customer->image_url ??  bagisto_asset('images/user-placeholder.png')); ?>"
                class="h-[60px] w-[60px] rounded-full"
                alt="Profile Image"
            >
        </div>

        <div class="flex flex-col justify-between">
            <p class="font-mediums break-all text-2xl max-md:text-xl">Hello! <?php echo e($customer->first_name); ?></p>

            <p class="max-md:text-md: text-zinc-500 no-underline"><?php echo e($customer->email); ?></p>
        </div>
    </div>

    <!-- Account Navigation Menus -->
    <?php $__currentLoopData = menu()->getItems('customer'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menuItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div>
            <!-- Account Navigation Toggler -->
            <div class="select-none pb-5 max-md:pb-1.5">
                <p class="text-xl font-medium max-md:text-lg">
                    <?php echo e($menuItem->getName()); ?>

                </p>
            </div>

            <!-- Account Navigation Content -->
            <?php if($menuItem->haveChildren()): ?>
                <div class="grid rounded-md border border-b border-l-[1px] border-r border-t-0 border-zinc-200 max-md:border-none">
                    <?php $__currentLoopData = $menuItem->getChildren(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subMenuItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e($subMenuItem->getUrl()); ?>">
                            <div class="flex justify-between px-6 py-5 border-t border-zinc-200 hover:bg-zinc-100 cursor-pointer max-md:p-4 max-md:border-0 max-md:py-3 max-md:px-0 <?php echo e($subMenuItem->isActive() ? 'bg-zinc-100' : ''); ?>">
                                <p class="flex items-center gap-x-4 text-lg font-medium max-sm:text-base">
                                    <span class="<?php echo e($subMenuItem->getIcon()); ?> text-2xl"></span>

                                    <?php echo e($subMenuItem->getName()); ?>

                                </p>

                                <span class="icon-arrow-right rtl:icon-arrow-left text-2xl"></span>
                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div><?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Shop\src\Resources\views\components\layouts\account\navigation.blade.php ENDPATH**/ ?>