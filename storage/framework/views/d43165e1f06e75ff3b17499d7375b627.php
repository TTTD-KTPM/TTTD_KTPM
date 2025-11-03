<?php
    $details = [
        'mini'    => 'true',
        'url'     => route('shop.product_or_category.index', $product->url_key),
        'title'   => $product->name,
        'summary' => $message
    ];

    $linkedinURL = 'https://www.linkedin.com/shareArticle?' . http_build_query($details);
?>

<v-linkedin-share></v-linkedin-share>

<?php $__env->startPush('scripts'); ?>
    <script
        type="text/x-template"
        id="v-linkedin-share-template"
    >
        <li class="transition-all hover:opacity-[0.8]">
            <a 
                :href="shareUrl" 
                @click="openSharePopup"
                aria-label="Linkedin"
                role="button"
                tabindex="0"
            >
                <?php echo $__env->make('social_share::icons.linkedin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </a>
        </li>
    </script>

    <script type="module">
        app.component('v-linkedin-share', {
            template: '#v-linkedin-share-template',

            data() {
                return {
                    shareUrl: '<?php echo e($linkedinURL); ?>'
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
<?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\SocialShare\src\Resources\views\links\linkedin.blade.php ENDPATH**/ ?>