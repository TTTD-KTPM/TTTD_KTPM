<?php
    $twitterURL = 'https://twitter.com/intent/tweet?' . http_build_query([
        'url'  => route('shop.product_or_category.index', $product->url_key),
        'text' => $message,
    ]);
?>

<v-twitter-share></v-twitter-share>

<?php $__env->startPush('scripts'); ?>
    <script
        type="text/x-template"
        id="v-twitter-share-template"
    >
        <li class="transition-all hover:opacity-[0.8]">
            <a 
                :href="shareUrl" 
                @click="openSharePopup"
                aria-label="Twitter"
                role="button"
                tabindex="0"
            >
                <?php echo $__env->make('social_share::icons.twitter', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </a>
        </li>
    </script>

    <script type="module">
        app.component('v-twitter-share', {
            template: '#v-twitter-share-template',

            data() {
                return {
                    shareUrl: '<?php echo e($twitterURL); ?>'
                }
            },

            methods: {
                openSharePopup() {
                    window.open(this.shareUrl, '_blank', 'resizable=yes,top=500,left=500,width=500,height=500')
                }
            }
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\SocialShare\src\Resources\views\links\twitter.blade.php ENDPATH**/ ?>