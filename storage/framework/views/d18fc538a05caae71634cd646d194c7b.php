<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['position' => 'left']));

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

foreach (array_filter((['position' => 'left']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<v-tabs
    position="<?php echo e($position); ?>"
    <?php echo e($attributes); ?>

>
    <?php if (isset($component)) { $__componentOriginala93c6af5b8f025af46aa7f785a457087 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala93c6af5b8f025af46aa7f785a457087 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.shimmer.tabs.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::shimmer.tabs'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala93c6af5b8f025af46aa7f785a457087)): ?>
<?php $attributes = $__attributesOriginala93c6af5b8f025af46aa7f785a457087; ?>
<?php unset($__attributesOriginala93c6af5b8f025af46aa7f785a457087); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala93c6af5b8f025af46aa7f785a457087)): ?>
<?php $component = $__componentOriginala93c6af5b8f025af46aa7f785a457087; ?>
<?php unset($__componentOriginala93c6af5b8f025af46aa7f785a457087); ?>
<?php endif; ?>
</v-tabs>

<?php if (! $__env->hasRenderedOnce('2a972994-db65-4d85-8411-d6b55b50c2a3')): $__env->markAsRenderedOnce('2a972994-db65-4d85-8411-d6b55b50c2a3');
$__env->startPush('scripts'); ?>
    <script
        type="text/x-template"
        id="v-tabs-template"
    >
        <div>
            <div
                class="flex justify-center gap-4 bg-white dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300 pt-2 max-sm:hidden"
                :style="positionStyles"
            >
                <div
                    v-for="tab in tabs"
                    class="cursor-pointer px-2.5 pb-3.5 text-base font-medium text-gray-300"
                    :class="{'border-blue-600 border-b-2 text-blue-600 transition': tab.isActive }"
                    @click="change(tab)"
                >
                    {{ tab.title }}
                </div>
            </div>

            <div>
                <?php echo e($slot); ?>

            </div>
        </div>
    </script>

    <script type="module">
        app.component('v-tabs', {
            template: '#v-tabs-template',

            props: ['position'],

            data() {
                return {
                    tabs: []
                }
            },

            computed: {
                positionStyles() {
                    return [
                        `justify-content: ${this.position}`
                    ];
                },
            },

            methods: {
                change(selectedTab) {
                    this.tabs.forEach(tab => {
                        tab.isActive = (tab.title == selectedTab.title);
                    });
                },
            },
        });
    </script>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Admin\src\Resources\views\components\tabs\index.blade.php ENDPATH**/ ?>