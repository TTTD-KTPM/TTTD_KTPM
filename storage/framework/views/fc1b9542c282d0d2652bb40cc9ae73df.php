<v-static-content :errors="errors">
    <?php if (isset($component)) { $__componentOriginalf17d5b98dd8627ea7a69a44447304caf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf17d5b98dd8627ea7a69a44447304caf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.shimmer.settings.themes.static-content.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::shimmer.settings.themes.static-content'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf17d5b98dd8627ea7a69a44447304caf)): ?>
<?php $attributes = $__attributesOriginalf17d5b98dd8627ea7a69a44447304caf; ?>
<?php unset($__attributesOriginalf17d5b98dd8627ea7a69a44447304caf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf17d5b98dd8627ea7a69a44447304caf)): ?>
<?php $component = $__componentOriginalf17d5b98dd8627ea7a69a44447304caf; ?>
<?php unset($__componentOriginalf17d5b98dd8627ea7a69a44447304caf); ?>
<?php endif; ?>
</v-static-content>

<!-- Static Content Vue Component -->
<?php if (! $__env->hasRenderedOnce('f70ea6c4-7e0e-4e7a-9811-6ee73d431275')): $__env->markAsRenderedOnce('f70ea6c4-7e0e-4e7a-9811-6ee73d431275');
$__env->startPush('scripts'); ?>
    <script
        type="text/x-template"
        id="v-static-content-template"
    >
        <div class="flex flex-1 flex-col gap-2 max-xl:flex-auto">
            <div class="box-shadow rounded bg-white p-4 dark:bg-gray-900">
                <div class="mb-2.5 flex items-center justify-between gap-x-2.5">
                    <div class="flex flex-col gap-1">
                        <p class="text-base font-semibold text-gray-800 dark:text-white">
                            <?php echo app('translator')->get('admin::app.settings.themes.edit.static-content'); ?>
                        </p>

                        <p class="text-xs font-medium text-gray-500 dark:text-gray-300">
                            <?php echo app('translator')->get('admin::app.settings.themes.edit.static-content-description'); ?>
                        </p>
                    </div>

                    <div
                        class="flex gap-2.5"
                        v-if="isHtmlEditorActive"
                    >
                        <!-- Hidden Input Filed for upload images -->
                        <label
                            class="secondary-button"
                            for="static_image"
                        >
                            <?php echo app('translator')->get('admin::app.settings.themes.edit.add-image-btn'); ?>
                        </label>

                        <input 
                            type="file"
                            name="static_image"
                            id="static_image"
                            class="hidden"
                            accept="image/*"
                            ref="static_image"
                            label="Image"
                            @change="storeImage($event)"
                        >
                    </div>
                </div>
                
                <div class="pt-4 text-center text-sm font-medium text-gray-500">
                    <div class="tabs">
                        <div class="mb-4 flex gap-4 border-b-2 pt-2 max-sm:hidden">
                            <!-- HTML Tab Header -->
                            <p @click="switchEditor('v-html-editor-theme', 1)">
                                <div
                                    class="cursor-pointer px-2.5 pb-3.5 text-base font-medium text-gray-600 transition dark:text-gray-300"
                                    :class="{'-mb-px border-b-2 border-blue-600': inittialEditor == 'v-html-editor-theme'}"
                                >
                                    <?php echo app('translator')->get('admin::app.settings.themes.edit.html'); ?>
                                </div>
                            </p>

                            <!-- CSS Tab Editor -->
                            <p @click="switchEditor('v-css-editor-theme', 0);">
                                <div
                                    class="cursor-pointer px-2.5 pb-3.5 text-base font-medium text-gray-600 transition dark:text-gray-300"
                                    :class="{'-mb-px border-b-2 border-blue-600': inittialEditor == 'v-css-editor-theme'}"
                                >
                                    <?php echo app('translator')->get('admin::app.settings.themes.edit.css'); ?>
                                </div>
                            </p>

                            <!-- Preview Tab Editor -->
                            <p @click="switchEditor('v-static-content-previewer', 0);">
                                <div
                                    class="cursor-pointer px-2.5 pb-3.5 text-base font-medium text-gray-600 transition dark:text-gray-300"
                                    :class="{'-mb-px border-b-2 border-blue-600': inittialEditor == 'v-static-content-previewer'}"
                                >
                                    <?php echo app('translator')->get('admin::app.settings.themes.edit.preview'); ?>
                                </div>
                            </p>
                        </div>
                    </div>
                </div>

                <input
                    type="hidden"
                    name="<?php echo e($currentLocale->code); ?>[options][html]"
                    v-model="options.html"
                />

                <input
                    type="hidden"
                    name="<?php echo e($currentLocale->code); ?>[options][css]"
                    v-model="options.css"
                />

                <KeepAlive class="[&>*]:dark:bg-gray-900 [&>*]:dark:!text-white">
                    <component 
                        :is="inittialEditor"
                        ref="editor"
                        @editor-data="editorData"
                        :options="options"
                    >
                    </component>
                </KeepAlive>
            </div>
        </div>
    </script>

    <!-- Html Editor Template -->
    <script
        type="text/x-template"
        id="v-html-editor-theme-template"
    >
        <div ref="html"></div>
    </script>

    <!-- Css Editor Template -->
    <script
        type="text/x-template"
        id="v-css-editor-theme-template"
    >
        <div ref="css"></div>
    </script>

    <!-- Static Content Previewer -->
    <script
        type="text/x-template"
        id="v-static-content-previewer-template"
    >
        <div v-html="getPreviewContent()"></div>
    </script>

    <script type="module">
        app.component('v-static-content', {
            template: '#v-static-content-template',

            props: ['errors'],

            data() {
                return {
                    inittialEditor: 'v-html-editor-theme',

                    options: <?php echo json_encode($theme->translate($currentLocale->code)['options'] ?? null, 15, 512) ?>,

                    isHtmlEditorActive: true,
                };
            },

            created() {
                if (this.options === null) {
                    this.options = { html: {} };
                }   
            },

            mounted() {
                this.applydarkColor();
            },

            methods: {
                switchEditor(editor, isActive) {
                    this.inittialEditor = editor;

                    this.isHtmlEditorActive = isActive;

                    this.$nextTick(() => {
                        this.applydarkColor();

                        if (editor == 'v-static-content-previewer') {
                            this.$refs.editor.review = this.options;
                        }
                    });
                },

                editorData(value) {
                    if (value.html) {
                        this.options.html = value.html;
                    } else {
                        this.options.css = value.css;
                    } 
                },

                storeImage($event) {
                    let imageInput = this.$refs.static_image;

                    if (imageInput.files == undefined) {
                        return;
                    }

                    const validFiles = Array.from(imageInput.files).every(file => file.type.includes('image/'));

                    if (! validFiles) {
                        this.$emitter.emit('add-flash', {
                            type: 'warning',
                            message: '<?php echo app('translator')->get('admin::app.settings.themes.edit.image-upload-message'); ?>'
                        });

                        imageInput.value = '';

                        return;
                    }

                    imageInput.files.forEach((file, index) => {
                        this.$refs.editor.storeImage($event);
                    });
                },

                applydarkColor() {
                    this.$nextTick(() => {
                        const codeMirrorGutters = this.$el.querySelector('.CodeMirror-gutters');

                        if (codeMirrorGutters) {
                            codeMirrorGutters.classList.add('dark:bg-gray-900', 'dark:!text-white');
                        }
                    });
                },
            },
        });
    </script>

    <!-- Html Editor Component -->
    <script type="module">
        app.component('v-html-editor-theme', {
            template: '#v-html-editor-theme-template',
            
            data() {
                return {
                    options:{
                        html: `<?php echo $theme->translate($currentLocale->code)['options']['html'] ?? ''; ?>`,
                    },

                    cursorPointer: {},
                };
            },

            created() {
                this.initHtmlEditor();

                this.$emitter.on('change-theme', (theme) => this._html.setOption('theme', (theme === 'dark') ? 'ayu-dark' : 'default'));
            },

            methods: {
                initHtmlEditor() {
                    this.$nextTick(() => {
                        this.options.html = SimplyBeautiful().html(this.options.html);

                        this._html = new CodeMirror(this.$refs.html, {
                            lineNumbers: true,
                            tabSize: 4,
                            lineWrapping: true,
                            lineWiseCopyCut: true,
                            value: this.options.html,
                            mode: 'htmlmixed',
                            theme: document.documentElement.classList.contains('dark') ? 'ayu-dark' : 'default',
                        });

                        this._html.on('changes', (e) => {
                            this.options.html = this._html.getValue();

                            this.cursorPointer = e.getCursor();

                            this.$emit('editorData', this.options);
                        });
                    });
                },

                storeImage($event) {
                    let selectedImage = $event.target.files[0];

                    if (! selectedImage) {
                        return;
                    }

                    const allowedImageTypes = ['image/jpeg', 'image/png', 'image/webp', 'image/jpg'];

                    if (! allowedImageTypes.includes(selectedImage.type)) {
                        return;
                    }

                    let formData = new FormData();

                    formData.append('<?php echo e($currentLocale->code); ?>[options][][image]', selectedImage);
                    formData.append('id', '<?php echo e($theme->id); ?>');
                    formData.append('type', 'static_content');

                    this.$axios.post('<?php echo e(route('admin.settings.themes.store')); ?>', formData)
                        .then((response) => {
                            let editor = this._html.getDoc();

                            let cursorPointer = editor.getCursor();

                            editor.replaceRange(`<img class="lazy" data-src="${response.data}">`, {
                                line: cursorPointer.line, ch: cursorPointer.ch
                            });

                            editor.setCursor({
                                line: cursorPointer.line, ch: cursorPointer.ch + response.data.length
                            });
                        })
                        .catch((error) => {
                            if (error.response.status == 422) {
                                this.$emitter.emit('add-flash', { type: 'warning', message: error.response.data.message });
                            }
                        });
                },
            },
        });
    </script>
    
    <!-- Css Editor Component -->
    <script type="module">
        app.component('v-css-editor-theme', {
            template: '#v-css-editor-theme-template',

            data() {
                return {
                    options:{
                        css: `<?php echo $theme->translate($currentLocale->code)['options']['css'] ?? ''; ?>`,
                    }
                };
            },

            created() {
                this.initCssEditor();

                this.$emitter.on('change-theme', (theme) => this._css.setOption('theme', (theme === 'dark') ? 'ayu-dark' : 'default'));
            },

            methods: {
                initCssEditor() {
                    this.$nextTick(() => {
                        this.options.css = SimplyBeautiful().css(this.options.css);

                        this._css = new CodeMirror(this.$refs.css, {
                            lineNumbers: true,
                            lineWrapping: true,
                            tabSize: 4,
                            lineWiseCopyCut: true,
                            value: this.options.css,
                            mode: 'css',
                            theme: document.documentElement.classList.contains('dark') ? 'ayu-dark' : 'default',
                        });

                        this._css.on('changes', () => {
                            this.options.css = this._css.getValue();

                            this.$emit('editorData', this.options);
                        });
                    });
                },
            },
        });
    </script>
    
    <!-- Static Content Previewer -->
    <script type="module">
        app.component('v-static-content-previewer', {
            template: '#v-static-content-previewer-template',

            props: ['options'],

            methods: {
                getPreviewContent() {
                    let html = this.options.html.slice();

                    html = html.replaceAll('src=""', '').replaceAll('data-src', 'src').replaceAll('src="storage/theme/', "src=\"<?php echo e(config('app.url')); ?>/storage/theme/");

                    return html + '<style type=\"text/css\">' +   this.options.css + '</style>';
                },
            },
        });
    </script>

    <!-- Code mirror script CDN -->
    <script
        type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.13.4/codemirror.js"
    >
    </script>

    <!-- 
        Html mixed and xml cnd both are dependent 
        Used for html and css theme
    -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.13.4/mode/xml/xml.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.13.4/mode/htmlmixed/htmlmixed.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/codemirror/5.13.4/mode/css/css.js"></script>

    <!-- Beatutify html and css -->
    <script src="https://cdn.jsdelivr.net/npm/simply-beautiful@latest/dist/index.min.js"></script>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('5a517899-49a4-4968-bb00-ecf34915bf0d')): $__env->markAsRenderedOnce('5a517899-49a4-4968-bb00-ecf34915bf0d');
$__env->startPush('styles'); ?>
    <!-- Code mirror style cdn -->
    <link 
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.13.4/codemirror.css"
    >
    </link>

    <!-- Dark theme css -->
    <link rel="stylesheet" href="https://codemirror.net/5/theme/ayu-dark.css">
<?php $__env->stopPush(); endif; ?><?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Admin\src\Resources\views\settings\themes\edit\static-content.blade.php ENDPATH**/ ?>