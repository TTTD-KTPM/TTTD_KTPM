<?php echo view_render_event('bagisto.shop.settings.gdpr.modal.before'); ?>


<v-cookie></v-cookie>

<?php echo view_render_event('bagisto.shop.settings.gdpr.modal.before'); ?>


<?php if (! $__env->hasRenderedOnce('3a7f5565-86e7-4c5c-9ad3-8e032df69f15')): $__env->markAsRenderedOnce('3a7f5565-86e7-4c5c-9ad3-8e032df69f15');
$__env->startPush('scripts'); ?>
    <script
        type="text/x-template"
        id="v-cookie-template"
    >
        <?php echo view_render_event('bagisto.shop.settings.gdpr.modal.cookie.before'); ?>


            <?php if(core()->getConfigData('general.gdpr.cookie.enabled')): ?>
                <div
                    class="js-cookie-consent fixed z-[999] mx-4 box-border hidden min-h-5 overflow-hidden rounded bg-black/90 p-7"
                    :class="getPositionClasses(position)"
                >
                    <div class="cookieTitle">
                        <span class="mb-1.5 block font-sans text-xl leading-5 text-white">
                            <?php echo e(core()->getConfigData('general.gdpr.cookie.static_block_identifier')); ?>

                        </span>
                    </div>

                    <div class="cookieDesc cookie-consent__message">
                        <p class="mt-2.5 block font-sans text-sm leading-5 text-white">
                            <?php echo e(core()->getConfigData('general.gdpr.cookie.description')); ?>


                            <a
                                class="text-white underline"
                                href="<?php echo e(url('page/privacy-policy')); ?>"
                            >
                                <?php echo app('translator')->get('shop::app.components.layouts.cookie.index.privacy-policy'); ?>
                            </a>
                        </p>
                    </div>

                    <div class="cookieButton">
                        <div class="mt-2.5 flex gap-2">
                            <button
                                class="box-border inline-block w-full cursor-pointer rounded bg-blue-500 px-6 py-4 text-center font-sans text-sm font-bold text-white transition-colors duration-300 ease-in-out hover:bg-blue-400 hover:text-white"
                                @click="createCookie()"
                            >
                                <?php echo app('translator')->get('shop::app.components.layouts.cookie.index.accept'); ?>
                            </button>

                            <button
                                class="box-border inline-block w-full cursor-pointer rounded bg-blue-500 px-6 py-4 text-center font-sans text-sm font-bold text-white transition-colors duration-300 ease-in-out hover:bg-blue-400 hover:text-white"
                                @click="rejectCookie()"
                            >
                                <?php echo app('translator')->get('shop::app.components.layouts.cookie.index.reject'); ?>
                            </button>
                        </div>

                        <a
                            class="mt-2.5 box-border inline-block w-full cursor-pointer rounded bg-blue-500 px-6 py-4 text-center font-sans text-sm font-bold text-white transition-colors duration-300 ease-in-out hover:bg-blue-400 hover:text-white"
                            href="<?php echo e(route('shop.customers.gdpr.cookie-consent')); ?>"
                        >
                            <?php echo app('translator')->get('shop::app.components.layouts.cookie.index.learn-more-and-customize'); ?>
                        </a>
                    </div>
                </div>
            <?php endif; ?>

        <?php echo view_render_event('bagisto.shop.settings.gdpr.modal.cookie.before'); ?>

    </script>

    <script type="module">
        const secureFlag = <?php echo json_encode(config('session.secure') ? ';secure' : ''); ?>;
        const sameSiteFlag = <?php echo json_encode(config('session.same_site') ? ';samesite=' . config('session.same_site') : ''); ?>;

        app.component('v-cookie', {
            template: '#v-cookie-template',

            data() {
                return {
                    cookieDomain: '<?php echo e(config('session.domain') ?? request()->getHost()); ?>',
                    cookieIp: "<?php echo e($_SERVER['REMOTE_ADDR']); ?>",
                    position: "<?php echo e(core()->getConfigData('general.gdpr.cookie.position') ?? 'center'); ?>"
                };
            },

            mounted() {
                if (! this.cookieExists()) {
                    this.showCookieDialog();
                }
            },

            methods: {
                getPositionClasses(position) {
                    const positionClasses = {
                        'center': 'left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 max-w-[420px]',
                        'top-center': 'top-4 left-1/2 -translate-x-1/2 max-w-[420px]',
                        'bottom-center': 'bottom-4 left-1/2 -translate-x-1/2 max-w-[420px]',
                        'bottom-right': 'bottom-4 right-0 sm:max-w-[420px]',
                        'bottom-left': 'bottom-4 left-0 sm:max-w-[420px]',
                        'top-right': 'top-4 right-0 sm:max-w-[420px]',
                        'top-left': 'top-4 left-0 sm:max-w-[420px]',
                    };

                    return positionClasses[position] || positionClasses['center'];
                },

                createCookie() {
                    this.consentWithCookies();

                    this.acceptAllConsentWithCookies();

                    this.hideCookieDialog();
                },

                rejectCookie() {
                    this.hideCookieDialog();
                },

                setCookie(name, value, expirationInDays) {
                    const date = new Date();

                    date.setTime(date.getTime() + (expirationInDays * 24 * 60 * 60 * 1000));

                    document.cookie = `${name}=${value};expires=${date.toUTCString()};path=/${secureFlag}${sameSiteFlag}`;
                },

                consentWithCookies() {
                    this.setCookie('cookie-consent', 1, 365 * 20);
                },

                acceptAllConsentWithCookies() {
                    this.setCookie('ip_address', this.cookieIp, 365 * 20);
                },

                cookieExists() {
                    return document.cookie.includes(`cookie-consent=${1}`);
                },

                hideCookieDialog() {
                    const cookieConsentElement = document.querySelector('.js-cookie-consent');

                    if (cookieConsentElement) {
                        cookieConsentElement.style.display = 'none';
                    }
                },

                showCookieDialog() {
                    const cookieConsentElement = document.querySelector('.js-cookie-consent');

                    if (cookieConsentElement) {
                        cookieConsentElement.style.display = 'block';
                    }
                },
            },
        });
    </script>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Shop\src\Resources\views\components\layouts\cookie\index.blade.php ENDPATH**/ ?>