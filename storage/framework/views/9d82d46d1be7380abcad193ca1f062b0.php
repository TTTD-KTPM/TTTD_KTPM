<?php if (isset($component)) { $__componentOriginal8001c520f4b7dcb40a16cd3b411856d1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8001c520f4b7dcb40a16cd3b411856d1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.layouts.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::layouts'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('title', null, []); ?> 
        <?php echo app('translator')->get('admin::app.settings.data-transfer.imports.import.title'); ?>
     <?php $__env->endSlot(); ?>

    <div class="flex items-center justify-between gap-4 max-sm:flex-wrap">
        <p class="text-xl font-bold text-gray-800 dark:text-white">
            <?php echo app('translator')->get('admin::app.settings.data-transfer.imports.import.title'); ?>
        </p>

        <div class="flex items-center gap-x-2.5">
            <!-- Back Button -->
            <a
                href="<?php echo e(route('admin.settings.data_transfer.imports.index')); ?>"
                class="transparent-button hover:bg-gray-200 dark:text-white dark:hover:bg-gray-800"
            >
                <?php echo app('translator')->get('admin::app.settings.data-transfer.imports.import.back-btn'); ?>
            </a>

            <!-- Save Button -->
            <a
                href="<?php echo e(route('admin.settings.data_transfer.imports.edit', $import->id)); ?>"
                class="primary-button"
            >
                <?php echo app('translator')->get('admin::app.settings.data-transfer.imports.import.edit-btn'); ?>
            </a>
        </div>
    </div>

    <!-- Import Vue Component -->
    <v-import />

    <?php if (! $__env->hasRenderedOnce('81e7c09b-46e6-4c18-88ff-fdfec4d2fb30')): $__env->markAsRenderedOnce('81e7c09b-46e6-4c18-88ff-fdfec4d2fb30');
$__env->startPush('scripts'); ?>
        <script
            type="text/x-template"
            id="v-import-template"
        >
            <!-- Body Content -->
            <div class="box-shadow mt-3.5 grid gap-2.5 p-5 max-xl:flex-wrap">
                <!-- Validate CSV File -->
                <div
                    class="flex w-full place-content-between items-center rounded-sm border border-orange-200 bg-orange-50 p-3 dark:border-gray-800 dark:bg-gray-900 dark:text-white"
                    v-if="importResource.state == 'pending'"
                >
                    <p class="flex items-center gap-2">
                        <i class="icon-information rounded-full bg-orange-200 text-2xl text-orange-600 dark:!text-orange-600"></i>

                        <?php echo app('translator')->get('admin::app.settings.data-transfer.imports.import.validate-info'); ?>
                    </p>

                    <button
                        class="primary-button place-self-start"
                        @click="validate"
                    >
                        <?php echo app('translator')->get('admin::app.settings.data-transfer.imports.import.validate'); ?>
                    </button>
                </div>

                <!-- Validation In Process -->
                <div
                    class="flex w-full place-content-between items-center rounded-sm border border-blue-200 bg-blue-50 p-3 dark:border-gray-800 dark:bg-gray-900 dark:text-white"
                    v-if="importResource.state == 'validating'"
                >
                    <p class="flex items-center gap-2">
                        <i class="icon-information rounded-full bg-blue-200 text-2xl text-blue-600 dark:!text-blue-600"></i>

                        <?php echo app('translator')->get('admin::app.settings.data-transfer.imports.import.validating-info'); ?>

                        <!-- Spinner -->
                        <svg class="ml-2 h-5 w-5 animate-spin text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none"  aria-hidden="true" viewBox="0 0 24 24">
                            <circle
                                class="opacity-25"
                                cx="12"
                                cy="12"
                                r="10"
                                stroke="currentColor"
                                stroke-width="4"
                            >
                            </circle>

                            <path
                                class="opacity-75"
                                fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
                            >
                            </path>
                        </svg>
                    </p>
                </div>

                <!-- Validation Results -->
                <div
                    class="flex w-full place-content-between rounded-sm border p-3"
                    :class="isValid ? 'border-green-200 bg-green-50 dark:bg-gray-900 dark:border-gray-800' : 'border-red-200 bg-red-50 dark:bg-gray-900 dark:border-gray-800'"
                    v-else-if="importResource.state == 'validated'"
                >
                    <!-- Import Stats -->
                    <div class="grid gap-2">
                        <p
                            class="mb-2 flex items-center gap-2 dark:text-white"
                            v-if="isValid"
                        >
                            <i class="icon-done h-fit rounded-full bg-green-200 text-2xl text-green-600 dark:!text-green-600"></i>

                            <?php echo app('translator')->get('admin::app.settings.data-transfer.imports.import.validation-success-info'); ?>
                        </p>

                        <p
                            class="flex items-center gap-2 dark:text-white"
                            v-else
                        >
                            <i class="icon-cross h-fit rounded-full bg-red-200 text-2xl text-red-600 dark:!text-red-600"></i>

                            <?php echo app('translator')->get('admin::app.settings.data-transfer.imports.import.validation-failed-info'); ?>
                        </p>

                        <p class="flex items-center gap-2 dark:text-white">
                            <i
                                class="icon-information rounded-full text-2xl"
                                :class="isValid ? 'bg-green-200 text-green-600 dark:!text-green-600' : 'bg-red-200 text-red-600 dark:!text-red-600'"
                            ></i>

                            <span class="font-medium text-gray-800 dark:text-white">
                                <?php echo app('translator')->get('admin::app.settings.data-transfer.imports.import.total-rows-processed'); ?>
                            </span>

                            {{ importResource.processed_rows_count }}
                        </p>

                        <p class="flex items-center gap-2 dark:text-white">
                            <i
                                class="icon-information rounded-full text-2xl"
                                :class="isValid ? 'bg-green-200 text-green-600 dark:!text-green-600' : 'bg-red-200 text-red-600 dark:!text-red-600'"
                            ></i>

                            <span class="font-medium text-gray-800 dark:text-white">
                                <?php echo app('translator')->get('admin::app.settings.data-transfer.imports.import.total-invalid-rows'); ?>
                            </span>

                            {{ importResource.invalid_rows_count }}
                        </p>

                        <p class="flex items-center gap-2 dark:text-white">
                            <i
                                class="icon-information rounded-full text-2xl"
                                :class="isValid ? 'bg-green-200 text-green-600 dark:!text-green-600' : 'bg-red-200 text-red-600 dark:!text-red-600'"
                            ></i>

                            <span class="font-medium text-gray-800 dark:text-white">
                                <?php echo app('translator')->get('admin::app.settings.data-transfer.imports.import.total-errors'); ?>
                            </span>

                            {{ importResource.errors_count }}
                        </p>

                        <div
                            class="flex place-items-start items-center gap-2 dark:text-white"
                            v-if="importResource.errors.length"
                        >
                            <i class="icon-information rounded-full bg-red-200 text-2xl text-red-600 dark:!text-red-600"></i>

                            <div class="grid gap-2">
                                <p
                                    class="break-all"
                                    v-for="error in importResource.errors"
                                >
                                    {{ error }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="flex gap-2">
                        <button
                            class="primary-button place-self-start"
                            v-if="isValid"
                            @click="start"
                        >
                            <?php echo app('translator')->get('admin::app.settings.data-transfer.imports.import.title'); ?>
                        </button>

                        <a
                            class="primary-button place-self-start"
                            href="<?php echo e(route('admin.settings.data_transfer.imports.download_error_report', $import->id)); ?>"
                            target="_blank"
                            v-if="importResource.error_file_path && importResource.errors_count"
                        >
                            <?php echo app('translator')->get('admin::app.settings.data-transfer.imports.import.download-error-report'); ?>
                        </a>
                    </div>
                </div>

                <!-- Import In Process -->
                <div
                    class="grid w-full gap-2 rounded-sm border border-green-200 bg-green-50 p-3 dark:border-gray-800 dark:bg-gray-900 dark:text-white"
                    v-else-if="importResource.state == 'processing'"
                >
                    <p class="flex items-center gap-2">
                        <i class="icon-information rounded-full bg-green-200 text-2xl text-green-600 dark:!text-green-600"></i>

                        <?php echo app('translator')->get('admin::app.settings.data-transfer.imports.import.importing-info'); ?>
                    </p>

                    <div class="h-5 w-full rounded-sm bg-green-200 dark:bg-green-700">
                        <div
                            class="h-5 rounded-sm bg-green-600"
                            :style="{ 'width': stats.progress + '%' }"
                        ></div>
                    </div>

                    <p class="flex items-center gap-2">
                        <span class="font-medium text-gray-800 dark:text-white">
                            <?php echo app('translator')->get('admin::app.settings.data-transfer.imports.import.progress'); ?>
                        </span>

                        {{ stats.progress }}%
                    </p>

                    <p class="flex items-center gap-2">
                        <span class="font-medium text-gray-800 dark:text-white">
                            <?php echo app('translator')->get('admin::app.settings.data-transfer.imports.import.total-batches'); ?>
                        </span>

                        {{ stats.batches.total }}
                    </p>

                    <p class="flex items-center gap-2">
                        <span class="font-medium text-gray-800 dark:text-white">
                            <?php echo app('translator')->get('admin::app.settings.data-transfer.imports.import.completed-batches'); ?>
                        </span>

                        {{ stats.batches.completed }}
                    </p>

                    <p class="flex items-center gap-2">
                        <span class="font-medium text-gray-800 dark:text-white">
                            <?php echo app('translator')->get('admin::app.settings.data-transfer.imports.import.total-created'); ?>
                        </span>

                        {{ stats.summary.created }}
                    </p>

                    <p class="flex items-center gap-2">
                        <span class="font-medium text-gray-800 dark:text-white">
                            <?php echo app('translator')->get('admin::app.settings.data-transfer.imports.import.total-updated'); ?>
                        </span>

                        {{ stats.summary.updated }}
                    </p>

                    <p class="flex items-center gap-2">
                        <span class="font-medium text-gray-800 dark:text-white">
                            <?php echo app('translator')->get('admin::app.settings.data-transfer.imports.import.total-deleted'); ?>
                        </span>

                        {{ stats.summary.deleted }}
                    </p>
                </div>

                <!-- Linking In Process -->
                <div
                    class="grid w-full gap-2 rounded-sm border border-green-200 bg-green-50 p-3 dark:border-gray-800 dark:bg-gray-900"
                    v-else-if="importResource.state == 'linking'"
                >
                    <p class="flex items-center gap-2">
                        <i class="icon-information rounded-full bg-green-200 text-2xl text-green-600 dark:!text-green-600"></i>

                        <?php echo app('translator')->get('admin::app.settings.data-transfer.imports.import.linking-info'); ?>
                    </p>

                    <div class="h-5 w-full rounded-sm bg-green-200 dark:bg-green-700">
                        <div
                            class="h-5 rounded-sm bg-green-600"
                            :style="{ 'width': stats.progress + '%' }"
                        ></div>
                    </div>

                    <p class="flex items-center gap-2">
                        <span class="font-medium text-gray-800">
                            <?php echo app('translator')->get('admin::app.settings.data-transfer.imports.import.progress'); ?>
                        </span>

                        {{ stats.progress }}%
                    </p>

                    <p class="flex items-center gap-2">
                        <span class="font-medium text-gray-800">
                            <?php echo app('translator')->get('admin::app.settings.data-transfer.imports.import.total-batches'); ?>
                        </span>

                        {{ stats.batches.total }}
                    </p>

                    <p class="flex items-center gap-2">
                        <span class="font-medium text-gray-800">
                            <?php echo app('translator')->get('admin::app.settings.data-transfer.imports.import.completed-batches'); ?>
                        </span>

                        {{ stats.batches.completed }}
                    </p>
                </div>

                <!-- Indexing In Process -->
                <div
                    class="grid w-full gap-2 rounded-sm border border-green-200 bg-green-50 p-3"
                    v-else-if="importResource.state == 'indexing'"
                >

                    <p class="flex items-center gap-2">
                        <i class="icon-information rounded-full bg-green-200 text-2xl text-green-600 dark:!text-green-600"></i>

                        <?php echo app('translator')->get('admin::app.settings.data-transfer.imports.import.indexing-info'); ?>
                    </p>

                    <div class="h-5 w-full rounded-sm bg-green-200 dark:bg-green-700">
                        <div
                            class="h-5 rounded-sm bg-green-600"
                            :style="{ 'width': stats.progress + '%' }"
                        ></div>
                    </div>

                    <p class="flex items-center gap-2">
                        <span class="font-medium text-gray-800">
                            <?php echo app('translator')->get('admin::app.settings.data-transfer.imports.import.progress'); ?>
                        </span>

                        {{ stats.progress }}%
                    </p>

                    <p class="flex items-center gap-2">
                        <span class="font-medium text-gray-800">
                            <?php echo app('translator')->get('admin::app.settings.data-transfer.imports.import.total-batches'); ?>
                        </span>

                        {{ stats.batches.total }}
                    </p>

                    <p class="flex items-center gap-2">
                        <span class="font-medium text-gray-800">
                            <?php echo app('translator')->get('admin::app.settings.data-transfer.imports.import.completed-batches'); ?>
                        </span>

                        {{ stats.batches.completed }}
                    </p>
                </div>

                <!-- Import Completed -->
                <div
                    class="flex w-full place-content-between rounded-sm border border-green-200 bg-green-50 p-3"
                    v-else-if="importResource.state == 'completed'"
                >
                    <!-- Stats -->
                    <div class="grid gap-2">
                        <p
                            class="mb-2 flex items-center gap-2 text-base"
                            v-if="isValid"
                        >
                            <i class="icon-done h-fit rounded-full bg-green-200 text-2xl text-green-600 dark:!text-green-600"></i>

                            <?php echo app('translator')->get('admin::app.settings.data-transfer.imports.import.imported-info'); ?>
                        </p>

                        <p class="flex items-center gap-2">
                            <i class="icon-information rounded-full bg-green-200 text-2xl text-green-600 dark:!text-green-600"></i>

                            <span class="font-medium text-gray-800">
                                <?php echo app('translator')->get('admin::app.settings.data-transfer.imports.import.total-created'); ?>
                            </span>

                            {{ importResource.summary.created }}
                        </p>

                        <p class="flex items-center gap-2">
                            <i class="icon-information rounded-full bg-green-200 text-2xl text-green-600 dark:!text-green-600"></i>

                            <span class="font-medium text-gray-800">
                                <?php echo app('translator')->get('admin::app.settings.data-transfer.imports.import.total-updated'); ?>
                            </span>

                            {{ importResource.summary.updated }}
                        </p>

                        <p class="flex items-center gap-2">
                            <i class="icon-information rounded-full bg-green-200 text-2xl text-green-600 dark:!text-green-600"></i>

                            <span class="font-medium text-gray-800">
                                <?php echo app('translator')->get('admin::app.settings.data-transfer.imports.import.total-deleted'); ?>
                            </span>

                            {{ importResource.summary.deleted }}
                        </p>
                    </div>
                </div>
            </div>
        </script>

        <script type="module">
            app.component('v-import', {
                template: '#v-import-template',

                data() {
                    return {
                        importResource: <?php echo json_encode($import, 15, 512) ?>,

                        isValid: "<?php echo e($isValid); ?>",

                        stats: <?php echo json_encode($stats, 15, 512) ?>,
                    };
                },

                mounted() {
                    if (this.importResource.process_in_queue) {
                        if (
                            this.importResource.state == 'processing'
                            || this.importResource.state == 'linking'
                            || this.importResource.state == 'indexing'
                        ) {
                            this.getStats();
                        }
                    } else {
                        if (this.importResource.state == 'processing') {
                            this.start();
                        }

                        if (this.importResource.state == 'linking') {
                            this.link();
                        }

                        if (this.importResource.state == 'indexing') {
                            this.index();
                        }
                    }
                },

                methods: {
                    validate() {
                        this.importResource.state = 'validating';

                        this.$axios.get("<?php echo e(route('admin.settings.data_transfer.imports.validate', $import->id)); ?>")
                            .then((response) => {
                                this.importResource = response.data.import;

                                this.isValid = response.data.is_valid;
                            })
                            .catch(error => {
                                this.$emitter.emit('add-flash', { type: 'error', message: error.response.data.message });
                            });
                    },

                    start() {
                        this.importResource.state = 'processing';

                        this.$axios.get("<?php echo e(route('admin.settings.data_transfer.imports.start', $import->id)); ?>")
                            .then((response) => {
                                this.importResource = response.data.import;

                                this.stats = response.data.stats;

                                if (this.importResource.process_in_queue) {
                                    this.getStats();
                                } else {
                                    if (this.importResource.state == 'processing') {
                                        this.start();
                                    } else if (this.importResource.state == 'linking') {
                                        this.link();
                                    } else if (this.importResource.state == 'indexing') {
                                        this.index();
                                    }
                                }
                            })
                            .catch(error => {
                            this.importResource.state = 'validated';

                                this.$emitter.emit('add-flash', { type: 'error', message: error.response.data.message });
                            });
                    },

                    link() {
                        this.$axios.get("<?php echo e(route('admin.settings.data_transfer.imports.link', $import->id)); ?>")
                            .then((response) => {
                                this.importResource = response.data.import;

                                this.stats = response.data.stats;

                                if (this.importResource.state == 'linking') {
                                    this.link();
                                } else if (this.importResource.state == 'indexing') {
                                    this.index();
                                }
                            })
                            .catch(error => {
                                this.$emitter.emit('add-flash', { type: 'error', message: error.response.data.message });
                            });
                    },

                    index() {
                        this.$axios.get("<?php echo e(route('admin.settings.data_transfer.imports.index_data', $import->id)); ?>")
                            .then((response) => {
                                this.importResource = response.data.import;

                                this.stats = response.data.stats;

                                if (this.importResource.state == 'indexing') {
                                    this.index();
                                }
                            })
                            .catch(error => {
                                this.$emitter.emit('add-flash', { type: 'error', message: error.response.data.message });
                            });
                    },

                    getStats() {
                        let state = 'processed';

                        if (this.importResource.state == 'linking') {
                            state = 'linked';
                        } else if (this.importResource.state == 'indexing') {
                            state = 'indexed';
                        }

                        this.$axios.get("<?php echo e(route('admin.settings.data_transfer.imports.stats', $import->id)); ?>/" + state)
                            .then((response) => {
                                this.importResource = response.data.import;

                                this.stats = response.data.stats;

                                if (this.importResource.state != 'completed') {
                                    setTimeout(() => {
                                        this.getStats();
                                    }, 1000);
                                }
                            })
                            .catch(error => {
                                this.$emitter.emit('add-flash', { type: 'error', message: error.response.data.message });
                            });
                    }
                }
            })
        </script>
    <?php $__env->stopPush(); endif; ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8001c520f4b7dcb40a16cd3b411856d1)): ?>
<?php $attributes = $__attributesOriginal8001c520f4b7dcb40a16cd3b411856d1; ?>
<?php unset($__attributesOriginal8001c520f4b7dcb40a16cd3b411856d1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8001c520f4b7dcb40a16cd3b411856d1)): ?>
<?php $component = $__componentOriginal8001c520f4b7dcb40a16cd3b411856d1; ?>
<?php unset($__componentOriginal8001c520f4b7dcb40a16cd3b411856d1); ?>
<?php endif; ?>
<?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Admin\src\Resources\views\settings\data-transfer\imports\import.blade.php ENDPATH**/ ?>