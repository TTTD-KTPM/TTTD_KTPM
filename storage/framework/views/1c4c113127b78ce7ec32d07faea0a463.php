<?php
    $url = route('shop.product_or_category.index', $product->url_key);

    $message ??= $product->name;

    $emailURL = 'mailto:your@email.com?subject=' . $message . '&body=' . $message . ' ' . $url;
?>

<v-email-share></v-email-share>

<?php $__env->startPush('scripts'); ?>
    <script
        type="text/x-template"
        id="v-email-share-template"
    >
        <li class="transition-all hover:opacity-[0.8]">
            <a 
                href="<?php echo e($emailURL); ?>" 
                target="_blank"
                aria-label="Email"
                role="button"
                tabindex="0"
            >
                <?php echo $__env->make('social_share::icons.email', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </a>
        </li>
    </script>

    <script type="module">
        app.component('v-email-share', {
            template: '#v-email-share-template'
        });
    </script>
<?php $__env->stopPush(); ?><?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\SocialShare\src\Resources\views\links\email.blade.php ENDPATH**/ ?>