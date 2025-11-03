<div class="flex gap-3">
    <?php $__currentLoopData = ['enable_facebook', 'enable_twitter', 'enable_google', 'enable_linkedin-openid', 'enable_github']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(! core()->getConfigData('customer.settings.social_login.' . $social)): ?>
            <?php continue; ?>
        <?php endif; ?>

        <?php 
            $icon = explode('_', $social); 
        ?>

        <a
            href="<?php echo e(route('customer.social-login.index', $icon[1])); ?>"
            class="transition-all hover:opacity-[0.8]"
            aria-label="<?php echo e($icon[0]); ?>"
        >
            <?php echo $__env->make('social_login::icons.' . $icon[1], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div><?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\SocialLogin\src\Resources\views\shop\customers\session\social-links.blade.php ENDPATH**/ ?>