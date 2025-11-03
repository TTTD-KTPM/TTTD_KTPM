<?php $__env->startComponent('admin::emails.layout'); ?>
    <div style="margin-bottom: 34px;">
        <p style="font-weight: bold;font-size: 20px;color: #121A26;line-height: 24px;margin-bottom: 24px">
            <?php echo app('translator')->get('admin::app.emails.dear', ['admin_name' => $userName]); ?>, 👋
        </p>

        <p style="font-size: 16px;color: #384860;line-height: 24px;">
            <?php echo app('translator')->get('admin::app.emails.admin.forgot-password.greeting'); ?>
        </p>
    </div>

    <p style="font-size: 16px;color: #384860;line-height: 24px;margin-bottom: 40px">
        <?php echo app('translator')->get('admin::app.emails.admin.forgot-password.description'); ?>
    </p>

    <div style="display: flex;margin-bottom: 95px">
        <a
            href="<?php echo e(route('admin.reset_password.create', $token)); ?>"
            style="padding: 16px 45px;justify-content: center;align-items: center;gap: 10px;border-radius: 2px;background: #060C3B;color: #FFFFFF;text-decoration: none;text-transform: uppercase;font-weight: 700;"
        >
            <?php echo app('translator')->get('admin::app.emails.admin.forgot-password.reset-password'); ?>
        </a>
    </div>
<?php echo $__env->renderComponent(); ?><?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Admin\src\Resources\views\emails\admin\forget-password.blade.php ENDPATH**/ ?>