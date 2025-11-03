<v-image-search-result-component>
    <div class="mt-8 rounded-lg border border-gray-200 p-5 max-sm:grid max-sm:gap-y-2.5 max-sm:p-2.5">
        <div class="flex gap-12 max-sm:items-center max-sm:gap-4">
            <?php if (isset($component)) { $__componentOriginal3657c70d06ebc8c078f4ecac2ea1a848 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3657c70d06ebc8c078f4ecac2ea1a848 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.media.images.lazy','data' => ['class' => 'h-[110px] max-h-[110px] w-[110px] min-w-[110px] max-w-[110px] rounded-sm max-sm:h-[60px] max-sm:max-h-[60px] max-sm:min-h-[60px] max-sm:w-[60px] max-sm:min-w-[60px] max-sm:max-w-[60px] max-sm:rounded-xl']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::media.images.lazy'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-[110px] max-h-[110px] w-[110px] min-w-[110px] max-w-[110px] rounded-sm max-sm:h-[60px] max-sm:max-h-[60px] max-sm:min-h-[60px] max-sm:w-[60px] max-sm:min-w-[60px] max-sm:max-w-[60px] max-sm:rounded-xl']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3657c70d06ebc8c078f4ecac2ea1a848)): ?>
<?php $attributes = $__attributesOriginal3657c70d06ebc8c078f4ecac2ea1a848; ?>
<?php unset($__attributesOriginal3657c70d06ebc8c078f4ecac2ea1a848); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3657c70d06ebc8c078f4ecac2ea1a848)): ?>
<?php $component = $__componentOriginal3657c70d06ebc8c078f4ecac2ea1a848; ?>
<?php unset($__componentOriginal3657c70d06ebc8c078f4ecac2ea1a848); ?>
<?php endif; ?>
    
            <div class="flex flex-col gap-4">
                <span class="shimmer h-8 w-60 max-md:h-7 max-md:w-44"></span>

                <!-- For Desktop View keywords -->
                <div class="flex flex-wrap gap-2 max-sm:hidden">
                    <?php for($i = 1; $i < 10; $i++): ?>
                        <div class="shimmer m-1 flex cursor-pointer items-center justify-center rounded-full font-medium">
                            <span class="shimmer h-10 w-20 rounded-full"></span>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
        </div>

        <!-- For Mobile View keywords -->
        <div class="hidden flex-wrap gap-2 max-sm:flex">
            <?php for($i = 1; $i < 8; $i++): ?>
                <div class="shimmer m-1 flex cursor-pointer items-center justify-center rounded-full font-medium">
                    <span class="shimmer h-9 w-20 rounded-full"></span>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</v-image-search-result-component>

<?php if (! $__env->hasRenderedOnce('9975573a-c1c4-42fa-88b9-690fe01ca262')): $__env->markAsRenderedOnce('9975573a-c1c4-42fa-88b9-690fe01ca262');
$__env->startPush('scripts'); ?>
    <script
        type="text/x-template"
        id="v-image-search-result-component-template"
    >
        <div class="mt-8 rounded-lg border border-gray-200 bg-gray-100 p-5 max-sm:mt-0 max-sm:grid max-sm:gap-y-2.5 max-sm:p-2.5">
            <div class="flex gap-12 max-sm:items-center max-sm:gap-4">
                <img
                    class="h-[110px] max-h-[110px] min-h-[110px] w-[110px] max-w-[110px] rounded-sm max-sm:h-[60px] max-sm:max-h-[60px] max-sm:min-h-[60px] max-sm:w-[60px] max-sm:max-w-[60px] max-sm:rounded-xl"
                    :src="searchedImageUrl"
                    alt="search image"
                    height="110"
                    width="110"
                />

                <div class="flex flex-col gap-4">
                    <h2 class="text-2xl font-medium max-sm:text-base">
                        <?php echo app('translator')->get('shop::app.search.images.results.analyzed-keywords'); ?>
                    </h2>

                    <div class="flex flex-wrap gap-5 max-sm:hidden">
                        <span 
                            class="flex cursor-pointer items-center justify-center rounded-full border border-navyBlue px-4 py-1.5 font-medium text-navyBlue"
                            :class="{'rounded-full bg-navyBlue text-white': term.name.trim() === queryParameter.trim()}"
                            v-for="term in searchedTerms"
                            @click="search(term)"
                        >
                            <span class="max-w-full flex-initial py-1.5 text-xs font-medium leading-none">
                                {{ term.name }}
                            </span>
                        </span>
                    </div>
                </div>
            </div>

            <!-- For Mobile View -->
            <div class="hidden flex-wrap gap-2 max-sm:flex">
                <span 
                    class="flex cursor-pointer items-center justify-center rounded-full border border-navyBlue bg-white font-medium text-navyBlue"
                    v-for="term in searchedTerms"
                    @click="search(term)"
                >
                    <span
                        class="max-w-full flex-initial px-2.5 py-2 text-xs font-normal leading-none max-sm:px-3 max-sm:py-2.5"
                        :class="{'rounded-full bg-navyBlue text-white': term.name.trim() === queryParameter.trim()}"
                    >
                        {{ term.name }}
                    </span>
                </span>
            </div>
        </div>
    </script>

    <script type="module">
        app.component('v-image-search-result-component', {
            template: '#v-image-search-result-component-template',

            data() {
                return {
                    searchedTerms: [],
                    searchedImageUrl: localStorage.searchedImageUrl,
                    queryParameter: "<?php echo e(request('query')); ?>",
                };
            },

            created() {
                if (localStorage.searchedTerms && localStorage.searchedTerms != '') {
                    this.searchedTerms = localStorage.searchedTerms.split('_');

                    this.searchedTerms = this.searchedTerms.map(term => {
                        return {
                            name: term,
                            slug: term.split(' ').join('+'),
                        }
                    });
                }
            },

            methods: {
                search(term) {
                    let url = new URL(window.location.href);

                    url.searchParams.set('query', term.name);

                    window.location.href = url.href;
                },
            },
        });
    </script>
<?php $__env->stopPush(); endif; ?><?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Shop\src\Resources\views\search\images\results.blade.php ENDPATH**/ ?>