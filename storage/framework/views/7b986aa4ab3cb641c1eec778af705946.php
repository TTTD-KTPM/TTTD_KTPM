<v-tinymce <?php echo e($attributes); ?>></v-tinymce>

<?php if (! $__env->hasRenderedOnce('e69c37f4-7279-479f-a0f7-3c22e713d706')): $__env->markAsRenderedOnce('e69c37f4-7279-479f-a0f7-3c22e713d706');
$__env->startPush('scripts'); ?>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.6.2/tinymce.min.js"
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    ></script>

    <script
        type="text/x-template"
        id="v-tinymce-template"
    >
    </script>

    <script type="module">
        app.component('v-tinymce', {
            template: '#v-tinymce-template',
                
            props: ['selector', 'field',],

            mounted() {
                this.init();

                this.$emitter.on('change-theme', (theme) => {
                    tinymce.activeEditor.destroy();

                    this.init();
                });
            },

            methods: {
                init() {
                    let self = this;

                    let tinyMCEHelper = {
                        initTinyMCE: function(extraConfiguration) {
                            let self2 = this;

                            let config = {  
                                relative_urls: false,
                                menubar: false,
                                remove_script_host: false,
                                document_base_url: '<?php echo e(asset('/')); ?>',
                                uploadRoute: '<?php echo e(route('admin.tinymce.upload')); ?>',
                                csrfToken: '<?php echo e(csrf_token()); ?>',
                                ...extraConfiguration,
                            };

                            const image_upload_handler = (blobInfo, progress) => new Promise((resolve, reject) => {
                                self2.uploadImageHandler(config, blobInfo, resolve, reject, progress);
                            });

                            tinymce.init({
                                ...config,

                                file_picker_callback: function(cb, value, meta) {
                                    self2.filePickerCallback(config, cb, value, meta);
                                },

                                images_upload_handler: image_upload_handler,
                            });
                        },

                        filePickerCallback: function(config, cb, value, meta) {
                            let input = document.createElement('input');
                            input.setAttribute('type', 'file');
                            input.setAttribute('accept', 'image/*');

                            input.onchange = function() {
                                let file = this.files[0];

                                let reader = new FileReader();
                                reader.readAsDataURL(file);
                                reader.onload = function() {
                                    let id = 'blobid' + new Date().getTime();
                                    let blobCache = tinymce.activeEditor.editorUpload.blobCache;
                                    let base64 = reader.result.split(',')[1];
                                    let blobInfo = blobCache.create(id, file, base64);

                                    blobCache.add(blobInfo);

                                    cb(blobInfo.blobUri(), {
                                        title: file.name
                                    });
                                };
                            };

                            input.click();
                        },

                        uploadImageHandler: function(config, blobInfo, resolve, reject, progress) {
                            let xhr, formData;

                            xhr = new XMLHttpRequest();

                            xhr.withCredentials = false;

                            xhr.open('POST', config.uploadRoute);

                            xhr.upload.onprogress = ((e) => progress((e.loaded / e.total) * 100));

                            xhr.onload = function() {
                                let json;

                                if (xhr.status === 403) {
                                    reject("<?php echo app('translator')->get('admin::app.error.tinymce.http-error'); ?>", {
                                        remove: true
                                    });

                                    return;
                                }

                                if (xhr.status < 200 || xhr.status >= 300) {
                                    reject("<?php echo app('translator')->get('admin::app.error.tinymce.http-error'); ?>");

                                    return;
                                }

                                json = JSON.parse(xhr.responseText);

                                if (! json || typeof json.location != 'string') {
                                    reject("<?php echo app('translator')->get('admin::app.error.tinymce.invalid-json'); ?>" + xhr.responseText);

                                    return;
                                }

                                resolve(json.location);
                            };

                            xhr.onerror = (()=>reject("<?php echo app('translator')->get('admin::app.error.tinymce.upload-failed'); ?>"));

                            formData = new FormData();
                            formData.append('_token', config.csrfToken);
                            formData.append('file', blobInfo.blob(), blobInfo.filename());

                            xhr.send(formData);
                        },
                    };

                    tinyMCEHelper.initTinyMCE({
                        selector: this.selector,
                        plugins: 'image media wordcount save fullscreen code table lists link',
                        toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor image alignleft aligncenter alignright alignjustify | link hr |numlist bullist outdent indent  | removeformat | code | table | aibutton',
                        image_advtab: true,
                        directionality : "<?php echo e(core()->getCurrentLocale()->direction); ?>",

                        setup: editor => {
                            editor.on('keyup', () => this.field.onInput(editor.getContent()));
                        },
                    });
                },
            },
        })
    </script>
<?php $__env->stopPush(); endif; ?><?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Shop\src\Resources\views\components\tinymce\index.blade.php ENDPATH**/ ?>