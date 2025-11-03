<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'isActive' => false,
]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter(([
    'isActive' => false,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<v-modal
    is-active="<?php echo e($isActive); ?>"
    <?php echo e($attributes); ?>

>
    <?php if(isset($toggle)): ?>
        <template v-slot:toggle>
            <?php echo e($toggle); ?>

        </template>
    <?php endif; ?>

    <?php if(isset($header)): ?>
        <template v-slot:header="{ toggle, isOpen }">
            <div <?php echo e($header->attributes->merge(['class' => 'flex items-center justify-between gap-5 border-b border-zinc-200 bg-white p-8 max-sm:px-4 max-sm:py-3'])); ?>>
                <?php echo e($header); ?>


                <span
                    class="icon-cancel cursor-pointer text-3xl max-sm:text-2xl"
                    @click="toggle"
                >
                </span>
            </div>
        </template>
    <?php endif; ?>

    <?php if(isset($content)): ?>
        <template v-slot:content>
            <div <?php echo e($content->attributes->merge(['class' => 'bg-white p-8 max-sm:p-5'])); ?>>
                <?php echo e($content); ?>

            </div>
        </template>
    <?php endif; ?>

    <?php if(isset($footer)): ?>
        <template v-slot:footer>
            <div <?php echo e($footer->attributes->merge(['class' => 'mt-5 bg-white p-8 max-sm:mt-0.5 max-sm:py-4 max-sm:px-4'])); ?>>
                <?php echo e($footer); ?>

            </div>
        </template>
    <?php endif; ?>
</v-modal>

<?php if (! $__env->hasRenderedOnce('8f128a83-1191-4856-a826-8525661b0de2')): $__env->markAsRenderedOnce('8f128a83-1191-4856-a826-8525661b0de2');
$__env->startPush('scripts'); ?>
    <script
        type="text/x-template"
        id="v-modal-template"
    >
        <div>
            <div @click="toggle">
                <slot name="toggle">
                </slot>
            </div>

            <transition
                tag="div"
                name="modal-overlay"
                enter-class="duration-300 ease-out"
                enter-from-class="opacity-0"
                enter-to-class="opacity-100"
                leave-class="duration-200 ease-in"
                leave-from-class="opacity-100"
                leave-to-class="opacity-0"
            >
                <div
                    class="fixed inset-0 z-10 bg-gray-500 bg-opacity-50 transition-opacity"
                    v-show="isOpen"
                ></div>
            </transition>

            <transition
                tag="div"
                name="modal-content"
                enter-class="duration-300 ease-out"
                enter-from-class="translate-y-4 opacity-0 md:translate-y-0 md:scale-95"
                enter-to-class="translate-y-0 opacity-100 md:scale-100"
                leave-class="duration-200 ease-in"
                leave-from-class="translate-y-0 opacity-100 md:scale-100"
                leave-to-class="translate-y-4 opacity-0 md:translate-y-0 md:scale-95"
            >
                <div
                    class="fixed inset-0 z-10 transform overflow-y-auto transition" v-show="isOpen"
                >
                    <div class="flex min-h-full items-end justify-center p-4 sm:items-center sm:p-0">
                        <div class="absolute left-1/2 top-1/2 z-[999] w-full max-w-[595px] -translate-x-1/2 -translate-y-1/2 overflow-hidden rounded-lg bg-zinc-100 max-md:w-[90%]">
                            <!-- Header Slot-->
                            <slot
                                name="header"
                                :toggle="toggle"
                                :isOpen="isOpen"
                            >
                            </slot>

                            <!-- Content Slot-->
                            <slot name="content"></slot>

                            <!-- Footer Slot-->
                            <slot name="footer"></slot>
                        </div>
                    </div>
                </div>
            </transition>
        </div>
    </script>

    <script type="module">
        app.component('v-modal', {
            template: '#v-modal-template',

            props: ['isActive'],

            data() {
                return {
                    isOpen: this.isActive,
                };
            },

            methods: {
                toggle() {
                    this.isOpen = ! this.isOpen;

                    if (this.isOpen) {
                        const scrollbarWidth = window.innerWidth - document.documentElement.clientWidth;

                        document.body.style.overflow = 'hidden';

                        document.body.style.paddingRight = `${scrollbarWidth}px`;
                    } else {
                        document.body.style.overflow ='auto';

                        document.body.style.paddingRight = '';
                    }

                    this.$emit('toggle', { isActive: this.isOpen });
                },

                open() {
                    this.isOpen = true;

                    const scrollbarWidth = window.innerWidth - document.documentElement.clientWidth;

                    document.body.style.overflow = 'hidden';

                    document.body.style.paddingRight = `${scrollbarWidth}px`;

                    this.$emit('open', { isActive: this.isOpen });
                },

                close() {
                    this.isOpen = false;

                    document.body.style.overflow = 'auto';

                    document.body.style.paddingRight = '';

                    this.$emit('close', { isActive: this.isOpen });
                }
            }
        });
    </script>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Shop\src\Resources\views\components\modal\index.blade.php ENDPATH**/ ?>