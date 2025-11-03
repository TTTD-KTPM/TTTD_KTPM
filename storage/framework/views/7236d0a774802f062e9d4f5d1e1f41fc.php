<?php
    $url = urlencode(route('shop.product_or_category.index', $product->url_key));

    $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u=' . $url;
?>

<v-facebook-share></v-facebook-share>

<?php $__env->startPush('scripts'); ?>
    <script
        type="text/x-template"
        id="v-facebook-share-template"
    >
        <li class="transition-all hover:opacity-[0.8]">
            <a 
                :href="shareUrl"
                @click="openSharePopup"
                aria-label="Facebook"
                role="button"
                tabindex="0"
            >
                <?php echo $__env->make('social_share::icons.facebook', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </a>
        </li>
    </script>

    <script type="module">
        app.component('v-facebook-share', {
            template: '#v-facebook-share-template',

            data() {
                return {
                    shareUrl: '<?php echo e($facebookURL); ?>'
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
<?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\SocialShare\src\Resources\views\links\facebook.blade.php ENDPATH**/ ?>