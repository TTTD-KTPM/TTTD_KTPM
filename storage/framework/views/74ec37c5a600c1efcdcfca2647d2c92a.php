<div <?php echo $htmlAttributes; ?>></div>

<?php if($errors->has('g-recaptcha-response')): ?>
    <span class="control-error">
        <?php echo e($errors->first('g-recaptcha-response')); ?>

    </span>
<?php endif; ?><?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Customer\src\Resources\views\captcha\view.blade.php ENDPATH**/ ?>