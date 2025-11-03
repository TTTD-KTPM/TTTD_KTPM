<?php $__env->startComponent('admin::emails.layout'); ?>
    <div style="margin-bottom: 34px;">
        <p style="font-weight: bold;font-size: 20px;color: #121A26;line-height: 24px;margin-bottom: 24px">
            <?php echo app('translator')->get('admin::app.emails.dear', ['admin_name' => core()->getAdminEmailDetails()['name']]); ?>, 👋
        </p>

        <p style="font-size: 16px;color: #384860;line-height: 24px;">
            <?php echo __('admin::app.emails.customers.registration.greeting', [
                'customer_name' => '<a href="' . route('admin.customers.customers.view', $customer->id) . '" style="color: #2969FF;">'.$customer->name. '</a>'
                ]); ?>

        </p>
    </div>

    <p style="font-size: 16px;color: #384860;line-height: 24px;margin-bottom: 40px">
        <?php echo app('translator')->get('admin::app.emails.customers.registration.description'); ?>
    </p>
<?php echo $__env->renderComponent(); ?><?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Admin\src\Resources\views\emails\customers\registration.blade.php ENDPATH**/ ?>