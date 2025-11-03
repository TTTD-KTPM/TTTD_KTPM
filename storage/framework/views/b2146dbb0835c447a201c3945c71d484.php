<?php $__env->startComponent('shop::emails.layout'); ?>
    <div style="margin-bottom: 34px;">
        <p style="font-weight: bold;font-size: 20px;color: #121A26;line-height: 24px;margin-bottom: 24px">
            <?php echo app('translator')->get('shop::app.emails.dear', ['customer_name' => $customer->name]); ?>, 👋
        </p>

        <p style="font-size: 16px;color: #384860;line-height: 24px;">
            <?php echo app('translator')->get('shop::app.emails.customers.update-password.greeting'); ?>
        </p>
    </div>

    <p style="font-size: 16px;color: #384860;line-height: 24px;margin-bottom: 40px">
        <?php echo app('translator')->get('shop::app.emails.customers.update-password.description'); ?>
    </p>
<?php echo $__env->renderComponent(); ?><?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Shop\src\Resources\views\emails\customers\update-password.blade.php ENDPATH**/ ?>