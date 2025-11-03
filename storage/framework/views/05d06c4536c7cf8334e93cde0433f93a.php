<?php
    $text = [
        'text' => $message . ' ' . route('shop.product_or_category.index', $product->url_key),
    ];

    $whatsappURL = 'whatsapp://send?' . http_build_query($text);
?>

<v-whatsapp-share></v-whatsapp-share>

<?php $__env->startPush('scripts'); ?>
    <script
        type="text/x-template"
        id="v-whatsapp-share-template"
    >
        <li class="transition-all hover:opacity-[0.8]">
            <a 
                :href="shareUrl" 
                data-action="share/whatsapp/share" 
                target="_blank"
                aria-label="Whatsapp"
                role="button"
                tabindex="0"
            >
                <?php echo $__env->make('social_share::icons.whatsapp', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </a>
        </li>
    </script>

    <script type="module">
        app.component('v-whatsapp-share', {
            template: '#v-whatsapp-share-template',

            data() {
                return {
                    shareUrl: '<?php echo e($whatsappURL); ?>'
                }
            },
        });
    </script>
<?php $__env->stopPush(); ?><?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\SocialShare\src\Resources\views\links\whatsapp.blade.php ENDPATH**/ ?>