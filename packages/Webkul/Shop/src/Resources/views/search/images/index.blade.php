<v-image-search>
    <button
        type="button"
        class="icon-camera absolute top-3 flex items-center text-xl max-sm:top-2.5 ltr:right-3 ltr:pr-3 max-md:ltr:right-1.5 rtl:left-3 rtl:pl-3 max-md:rtl:left-1.5"
        aria-label="@lang('shop::app.search.images.index.search')"
    >
    </button>
</v-image-search>

@pushOnce('scripts')
    <script
        type="text/x-template"
        id="v-image-search-template"
    >
        <div>
            <label
                class="icon-camera absolute top-3 flex items-center text-xl max-sm:top-2.5 ltr:right-3 ltr:pr-3 max-md:ltr:right-1.5 rtl:left-3 rtl:pl-3 max-md:rtl:left-1.5"
                aria-label="@lang('shop::app.search.images.index.search')"
                :for="'v-image-search-' + $.uid"
                v-if="! isSearching"
            >
            </label>

            <label
                class="absolute top-2.5 flex cursor-pointer items-center text-xl ltr:right-3 ltr:pr-3 max-md:ltr:pr-1 rtl:left-3 rtl:pl-3 max-md:rtl:pl-1"
                v-else
            >
                <!-- Spinner -->
                <svg
                    class="h-5 w-5 animate-spin text-black"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                >
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
            </label>

            <input
                type="file"
                class="hidden"
                ref="imageSearchInput"
                :id="'v-image-search-' + $.uid"
                @change="loadLibrary()"
            />

            <img
                id="uploaded-image-url"
                class="hidden"
                :src="uploadedImageUrl"
                alt="uploaded image url"
                width="20"
                height="20"
                crossorigin="anonymous"
            />
        </div>
    </script>

    <script type="module">
        app.component('v-image-search', {
            template: '#v-image-search-template',

            data() {
                return {
                    uploadedImageUrl: '',

                    isSearching: false,
                };
            },

            methods: {
                /**
                 * This method will dynamically load the scripts. Because image search library
                 * only used when someone clicks or interact with the image button. This will
                 * reduce some data usage for mobile user.
                 * 
                 * @return {void}
                 */
                loadLibrary() {
                    this.$shop.loadDynamicScript(
                        'https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@latest/dist/tf.min.js', () => {
                            this.$shop.loadDynamicScript(
                                'https://cdn.jsdelivr.net/npm/tensorflow-models-mobilenet-patch@2.1.1/dist/mobilenet.min.js', () => {
                                    this.analyzeImage();
                                }
                            );
                        }
                    );
                },

                /**
                 * This method will analyze the image and load the sets on the bases of trained model.
                 * 
                 * @return {void}
                 */
                analyzeImage() {
                    this.isSearching = true;

                    let imageInput = this.$refs.imageSearchInput;

                    if (imageInput.files && imageInput.files[0]) {
                        if (imageInput.files[0].type.includes('image/')) {
                            if (imageInput.files[0].size <= 2000000) {
                                // MODIFIED: Use FileReader to convert image to data URL (avoids CORS issues)
                                const reader = new FileReader();
                                const self = this;

                                reader.onload = function(e) {
                                    self.uploadedImageUrl = e.target.result;

                                    // MODIFIED: Wait for image to be set in DOM, then analyze
                                    self.$nextTick(() => {
                                        self.classifyImage();
                                    });
                                };

                                reader.onerror = function() {
                                    self.$emitter.emit('add-flash', { type: 'error', message: '@lang('shop::app.search.images.index.something-went-wrong')'});
                                    self.isSearching = false;
                                };

                                reader.readAsDataURL(imageInput.files[0]);
                            } else {
                                imageInput.value = '';

                                this.$emitter.emit('add-flash', { type: 'error', message: '@lang('shop::app.search.images.index.size-limit-error')'});

                                this.isSearching = false;
                            }
                        } else {
                            imageInput.value = '';

                            this.$emitter.emit('add-flash', { type: 'error', message: '@lang('shop::app.search.images.index.only-images-allowed')'});

                            this.isSearching = false;
                        }
                    }
                },

                // MODIFIED: New method to classify image using TensorFlow/MobileNet
                async classifyImage() {
                    const self = this;

                    try {
                        const net = await mobilenet.load();
                        const imgElement = document.getElementById('uploaded-image-url');

                        // MODIFIED: Wait for image to load properly
                        await new Promise((resolve, reject) => {
                            if (imgElement.complete && imgElement.naturalHeight !== 0) {
                                resolve();
                            } else {
                                imgElement.onload = resolve;
                                imgElement.onerror = () => reject(new Error('Image failed to load'));
                            }
                        });

                        const result = await net.classify(imgElement);

                        let analysedResult = [];
                        let queryString = '';

                        result.forEach(function(value) {
                            queryString = value.className.split(',');

                            if (queryString.length > 1) {
                                analysedResult = analysedResult.concat(queryString);
                            } else {
                                analysedResult.push(queryString[0]);
                            }
                        });

                        localStorage.searchedImageUrl = self.uploadedImageUrl;
                        queryString = localStorage.searchedTerms = analysedResult.join('_');

                        queryString = localStorage.searchedTerms.split('_').map(term => {
                            return term.split(' ').join('+');
                        });

                        window.location.href = `${'{{ route('shop.search.index') }}'}?query=${queryString[0]}&image-search=1`;
                    } catch (error) {
                        // MODIFIED: Better error logging
                        console.error('Image classification error:', error);
                        this.$emitter.emit('add-flash', { type: 'error', message: "@lang('shop::app.search.images.index.something-went-wrong')"});
                        this.isSearching = false;
                    }
                },
            },
        });
    </script>
@endPushOnce