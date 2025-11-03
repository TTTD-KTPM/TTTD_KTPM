<?php
    $productBaseImage = product_image()->getProductBaseImage($product);

    $details = [
        'url'         => route('shop.product_or_category.index', $product->url_key),
        'media'       => $productBaseImage['medium_image_url'] ?: asset('vendor/webkul/ui/assets/images/product/meduim-product-placeholder.png'),
        'description' => $message,
    ];

    $pinterestURL = 'https://pinterest.com/pin/create/button/?' . http_build_query($details);
?>

<v-pinterest-share></v-pinterest-share>

<?php $__env->startPush('scripts'); ?>
    <script
        type="text/x-template"
        id="v-pinterest-share-template"
    >
        <li class="transition-all hover:opacity-[0.8]">
            <a 
                :href="shareUrl" 
                @click="openSharePopup"
                aria-label="Pinterest"
                role="button"
                tabindex="0"
            >
                <?php echo $__env->make('social_share::icons.pinterest', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </a>
        </li>
    </script>

    <script type="module">
        app.component('v-pinterest-share', {
            template: '#v-pinterest-share-template',

            data() {
                return {
                    shareUrl: '<?php echo e($pinterestURL); ?>'
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
<?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\SocialShare\src\Resources\views\links\pinterest.blade.php ENDPATH**/ ?>