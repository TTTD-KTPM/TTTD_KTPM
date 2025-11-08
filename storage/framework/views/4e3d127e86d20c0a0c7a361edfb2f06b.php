<v-datetime-picker <?php echo e($attributes); ?>>
    <?php echo e($slot); ?>

</v-datetime-picker>

<?php if (! $__env->hasRenderedOnce('e8696ae7-cdd2-41a2-9984-4f4848457f8e')): $__env->markAsRenderedOnce('e8696ae7-cdd2-41a2-9984-4f4848457f8e');
$__env->startPush('scripts'); ?>
    <script
        type="text/x-template"
        id="v-datetime-picker-template"
    >
        <span class="relative">
            <slot></slot>

            <i class="icon-calendar pointer-events-none absolute top-1/2 -translate-y-1/2 text-2xl text-gray-400 ltr:right-2 rtl:left-2"></i>
        </span>
    </script>

    <script type="module">
        app.component('v-datetime-picker', {
            template: '#v-datetime-picker-template',

            props: {
                name: String,

                value: String,

                allowInput: {
                    type: Boolean,
                    default: true,
                },

                disable: Array,

                minDate: String,

                maxDate: String,
            },

            data: function() {
                return {
                    datepicker: null
                };
            },

            mounted: function() {
                let options = this.setOptions();

                this.activate(options);
            },

            methods: {
                setOptions: function() {
                    let self = this;

                    return {
                        allowInput: this.allowInput ?? true,
                        disable: this.disable ?? [],
                        minDate: this.minDate ?? '',
                        maxDate: this.maxDate ?? '',
                        altFormat: "Y-m-d H:i:S",
                        dateFormat: "Y-m-d H:i:S",
                        enableTime: true,
                        time_24hr: true,
                        weekNumbers: true,

                        onChange: function(selectedDates, dateStr, instance) {
                            self.$emit("onChange", dateStr);
                        }
                    };
                },

                activate: function(options) {
                    let element = this.$el.getElementsByTagName("input")[0];

                    this.datepicker = new Flatpickr(element, options);
                },

                clear: function() {
                    this.datepicker.clear();
                }
            }
        });
    </script>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Shop\src/resources/views/components/flat-picker/datetime.blade.php ENDPATH**/ ?>