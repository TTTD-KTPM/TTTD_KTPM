<?php if($paginator->hasPages()): ?>
    <div class="flex items-center justify-between p-6">
        <p class="text-xs font-medium">
            <?php echo app('translator')->get('shop::app.partials.pagination.pagination-showing', [
                'firstItem' => $paginator->firstItem(),
                'lastItem' => $paginator->lastItem(),
                'total' => $paginator->total(),
            ]); ?>
        </p>

        <nav aria-label="Page Navigation">
            <ul class="inline-flex items-center -space-x-px">
                <!-- Previous Page Link -->
                <li>
                    <?php if($paginator->onFirstPage()): ?>
                        <span class="icon-arrow-left rtl:icon-arrow-right flex h-[37px] w-[35px] items-center justify-center border border-zinc-200 text-2xl font-medium leading-normal ltr:rounded-l-lg rtl:rounded-r-lg"></span>
                    <?php else: ?>
                        <a 
                            href="<?php echo e(urldecode($paginator->previousPageUrl())); ?>" 
                            class="flex h-[37px] w-[35px] items-center justify-center border border-zinc-200 font-medium leading-normal hover:bg-gray-100 ltr:rounded-l-lg rtl:rounded-r-lg" 
                            aria-label="<?php echo e(trans('shop::app.partials.pagination.prev-page')); ?>"
                        >
                            <span class="icon-arrow-left rtl:icon-arrow-right text-2xl"></span>
                        </a>
                    <?php endif; ?>
                </li>
    
                <!-- Pagination Elements -->
                <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                    <?php if(is_string($element)): ?> 
                        <li>
                            <span 
                                class="disabled flex h-[37px] w-[35px] items-center justify-center border border-zinc-200 text-center font-medium leading-normal text-black"
                            >
                                <?php echo e($element); ?>

                            </span>
                        </li>
                    <?php endif; ?> 

                    <?php if(is_array($element)): ?> 
                        <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                            <li>
                                <a 
                                    href="<?php echo e($paginator->currentPage() ? $url : '#'); ?>"
                                    class="flex h-[37px] w-[35px] items-center justify-center border border-zinc-200 text-center font-medium leading-normal text-black hover:bg-gray-100 <?php echo e($paginator->currentPage() ? 'bg-gray-100' : ''); ?>"
                                >
                                    <?php echo e($page); ?>

                                </a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                    <?php endif; ?> 
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <!-- Next Page Link -->
                <li>
                    <?php if($paginator->hasMorePages()): ?>
                        <a 
                            href="<?php echo e(urldecode($paginator->nextPageUrl())); ?>" 
                            class="flex h-[37px] w-[35px] items-center justify-center border border-zinc-200 font-medium leading-normal hover:bg-gray-100 ltr:rounded-r-lg rtl:rounded-l-lg" 
                            aria-label="<?php echo e(trans('shop::app.partials.pagination.next-page')); ?>"
                        >
                            <span class="icon-arrow-right rtl:icon-arrow-left text-2xl"></span>
                        </a>
                    <?php else: ?>
                        <span class="icon-arrow-right rtl:icon-arrow-left flex h-[37px] w-[35px] items-center justify-center border border-zinc-200 text-2xl font-medium leading-normal ltr:rounded-r-lg rtl:rounded-l-lg"></span>
                    <?php endif; ?>
                </li>
            </ul>
        </nav>
    </div>
<?php endif; ?>
<?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Shop\src\Resources\views\partials\pagination.blade.php ENDPATH**/ ?>