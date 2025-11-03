<?php $paypalStandard = app('Webkul\Paypal\Payment\Standard') ?>

<body data-gr-c-s-loaded="true" cz-shortcut-listen="true">
    You will be redirected to the PayPal website in a few seconds.
    

    <form action="<?php echo e($paypalStandard->getPaypalUrl()); ?>" id="paypal_standard_checkout" method="POST">
        <input value="Click here if you are not redirected within 10 seconds..." type="submit">

        <?php $__currentLoopData = $paypalStandard->getFormFields(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <input
                type="hidden"
                name="<?php echo e($name); ?>"
                value="<?php echo e($value); ?>"
            />

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </form>

    <script type="text/javascript">
        document.getElementById("paypal_standard_checkout").submit();
    </script>
</body><?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Paypal\src\Resources\views\standard-redirect.blade.php ENDPATH**/ ?>