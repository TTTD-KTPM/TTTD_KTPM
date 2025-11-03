<?php $__env->startComponent('shop::emails.layout'); ?>
    <div style="margin-bottom: 34px;">
        <p style="font-size: 16px;color: #384860;line-height: 24px;">
            <?php echo e($contactUs['message']); ?>

        </p>
    </div>

        <p style="font-size: 16px;color: #384860;line-height: 24px;margin-bottom: 40px">
            <?php echo app('translator')->get('shop::app.emails.contact-us.to'); ?>
            
            <a href="mailto:<?php echo e($contactUs['email']); ?>"><?php echo e($contactUs['email']); ?></a>,

            <?php echo app('translator')->get('shop::app.emails.contact-us.reply-to-mail'); ?>

            <?php if($contactUs['contact']): ?>
                <?php echo app('translator')->get('shop::app.emails.contact-us.reach-via-phone'); ?>

                <a href="tel:<?php echo e($contactUs['contact']); ?>"><?php echo e($contactUs['contact']); ?></a>.
            <?php endif; ?>
        </p>
    </p>
<?php echo $__env->renderComponent(); ?><?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Shop\src\Resources\views\emails\contact-us.blade.php ENDPATH**/ ?>