<v-calendar></v-calendar>

<?php if (! $__env->hasRenderedOnce('b0b87093-4d5d-4bf0-9c9b-58e1c40ce98d')): $__env->markAsRenderedOnce('b0b87093-4d5d-4bf0-9c9b-58e1c40ce98d');
$__env->startPush('scripts'); ?>
    <script
        type="text/x-template"
        id="v-calendar-template"
    >
        <div class="mt-7">
            <div class="calendar-container">
                <vue-cal
                    hide-view-selector
                    :watchRealTime="true"
                    :twelveHour="true"
                    :class="'w-full h-full'"
                    :disable-views="['years', 'year', 'month', 'day']"
                    :events="events"
                    @ready="getBookings"
                    @view-change="getBookings"
                    @event-click="toggleEvent"
                >
                    <!-- Left Arrow -->
                    <template #arrow-prev="">
                        <span class="icon-sort-left"></span>
                    </template>

                    <!-- Right Arrow -->
                    <template #arrow-next="">
                        <span class="icon-sort-right"></span>
                    </template>

                    <!-- No Events Content -->
                    <template #no-event>
                        <p class="hidden"></p>
                    </template>

                    <!-- Content -->
                    <template #event="{ event, view }">
                        <div
                            class="slot relative h-full cursor-pointer rounded-l border-l-4 text-left text-xs"
                            :class="[
                                event.status === 'pending' ? 'bg-yellow-100 border-yellow-500 hover:bg-yellow-200 hover:border-yellow-600' :
                                event.status === 'completed' ? 'bg-green-100 border-green-500 hover:border-green-600 hover:bg-green-200' :
                                event.status === 'closed' ? 'bg-blue-100 border-blue-500 hover:border-blue-600 hover:bg-blue-200' :
                                event.status === 'canceled' ? 'bg-red-100 border-red-500 hover:border-red-600 hover:bg-red-200' :
                                'bg-green-100 border-green-600 hover:border-green-600 hover:bg-green-200',
                                event.time_difference ? 'p-2' : 'p-1'
                            ]"
                        >
                            <span>
                                {{ new Date(event.start).toLocaleTimeString('en-US', { hour12: true, hour: 'numeric', minute: '2-digit' }) }} - {{ new Date(event.end).toLocaleTimeString('en-US', { hour12: true, hour: 'numeric', minute: '2-digit' }) }}
                            </span>

                            <br/>

                            <span
                                v-if="event.time_difference"
                                v-text="event.full_name"
                            >
                            </span>
                        </div>
                    </template>
                </vue-cal>
            </div>

            <?php if (isset($component)) { $__componentOriginal09768308838b828c7799162f44758281 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal09768308838b828c7799162f44758281 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.modal.index','data' => ['ref' => 'myModal']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['ref' => 'myModal']); ?>
                <!-- Modal Header -->
                 <?php $__env->slot('header', null, []); ?> 
                    <div class="text-lg font-medium text-[#1F2937]">
                        <?php echo app('translator')->get('admin::app.sales.booking.calendar.booking-details'); ?>
                    </div>
                 <?php $__env->endSlot(); ?>

                <!-- Modal Content -->
                 <?php $__env->slot('content', null, []); ?> 
                    <div class="grid text-sm font-normal">
                        <div class="grid grid-cols-1 gap-2.5 border-b pb-4">
                            <!-- Booking Date -->
                            <div class="grid grid-cols-[100px_auto] gap-2">
                                <div
                                    class="text-gray-500"
                                    v-text="'<?php echo app('translator')->get('admin::app.sales.booking.calendar.booking-date'); ?>'"
                                >
                                </div>

                                <div
                                    class="font-medium text-[#1F2937]"
                                    v-text="new Date(event.created_at).toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' })"
                                >
                                </div>
                            </div>

                            <!-- Time Slot -->
                            <div class="grid grid-cols-[100px_auto] gap-2">
                                <div
                                    class="text-gray-500"
                                    v-text="'<?php echo app('translator')->get('admin::app.sales.booking.calendar.time-slot'); ?>'"
                                >
                                </div>

                                <div class="font-medium text-[#1F2937]">
                                    {{ new Date(event.start).toLocaleTimeString('en-US', { hour12: true, hour: 'numeric', minute: '2-digit' }) }} - {{ new Date(event.end).toLocaleTimeString('en-US', { hour12: true, hour: 'numeric', minute: '2-digit' }) }}
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-[80px_80px_auto] gap-2.5 border-b py-4">
                            <!-- Order Id -->
                            <div class="grid grid-cols-1 gap-2">
                                <div
                                    class="text-gray-500"
                                    v-text="'<?php echo app('translator')->get('admin::app.sales.booking.calendar.order-id'); ?>'"
                                >
                                </div>

                                <div class="font-medium text-[#1F2937]">
                                    #{{ event.order_id }}
                                </div>
                            </div>

                            <!-- Price -->
                            <div class="grid grid-cols-1 gap-2">
                                <div
                                    class="text-gray-500"
                                    v-text="'<?php echo app('translator')->get('admin::app.sales.booking.calendar.price'); ?>'"
                                >
                                </div>

                                <div
                                    class="font-medium text-[#1F2937]"
                                    v-text="event.total"
                                >
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="grid grid-cols-1 gap-2">
                                <div
                                    class="text-gray-500"
                                    v-text="'<?php echo app('translator')->get('admin::app.sales.booking.calendar.status'); ?>'"
                                >
                                </div>

                                <div
                                    class="w-fit rounded-2xl px-2.5 py-1 font-medium text-white"
                                    :class="[
                                        event.status === 'pending' ? 'bg-yellow-500' :
                                        event.status === 'completed' ? 'bg-darkGreen' :
                                        event.status === 'closed' ? 'bg-darkBlue':
                                        event.status === 'canceled' ? 'bg-darkPink' :
                                        'bg-green-500',
                                    ]"
                                >
                                    <span v-text="
                                        event.status === 'completed' ? '<?php echo app('translator')->get('admin::app.sales.booking.calendar.done'); ?>' :
                                        event.status === 'pending' ? '<?php echo app('translator')->get('admin::app.sales.booking.calendar.pending'); ?>' :
                                        event.status === 'canceled' ? '<?php echo app('translator')->get('admin::app.sales.booking.calendar.canceled'); ?>' :
                                        event.status === 'closed' ? '<?php echo app('translator')->get('admin::app.sales.booking.calendar.closed'); ?>' :
                                        event.status"
                                    >
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 items-center gap-2.5 pt-4 font-medium text-[#1F2937]">
                            <!-- Customer Name -->
                            <div class="flex items-center gap-2">
                                <span class="icon-customer-2 text-2xl text-gray-500"></span>

                                <span v-text="event.full_name"></span>
                            </div>

                            <!-- Customer Email -->
                            <div class="flex items-center gap-2">
                                <span class="icon-mail text-2xl text-gray-500"></span>

                                <span v-text="event.email"></span>
                            </div>

                            <!-- Customer Phone Number -->
                            <div class="flex gap-2">
                                <span class="icon-phone text-2xl text-gray-500"></span>

                                <span v-text="event.contact"></span>
                            </div>

                            <!-- Customer Address -->
                            <div class="flex gap-2">
                                <span class="icon-location text-2xl text-gray-500"></span>

                                <span>
                                    <template v-if="event.address">
                                        {{ event.address.split('\n').join(', ') }}
                                    </template>

                                    {{ event.city }},
                                    {{ event.state }},
                                    {{ event.country }}
                                    {{ event.postcode }}
                                </span>
                            </div>
                        </div>
                    </div>
                 <?php $__env->endSlot(); ?>

                <!-- Modal Footer -->
                 <?php $__env->slot('footer', null, []); ?> 
                    <button
                        class="primary-button h-9 p-2.5 text-base"
                        @click="redirect"
                    >
                        <?php echo app('translator')->get('admin::app.sales.booking.calendar.view-details'); ?>
                    </button>
                 <?php $__env->endSlot(); ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal09768308838b828c7799162f44758281)): ?>
<?php $attributes = $__attributesOriginal09768308838b828c7799162f44758281; ?>
<?php unset($__attributesOriginal09768308838b828c7799162f44758281); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal09768308838b828c7799162f44758281)): ?>
<?php $component = $__componentOriginal09768308838b828c7799162f44758281; ?>
<?php unset($__componentOriginal09768308838b828c7799162f44758281); ?>
<?php endif; ?>
        </div>
    </script>

    <script type="module">
        app.component('v-calendar', {
            template: '#v-calendar-template',
            
            data() {
                return {
                    events: [],

                    event: {},
                }
            },

            methods: {
                getBookings({ startDate, endDate }) {
                    const formattedStartDate = new Date(startDate).toLocaleDateString("en-US");
                    const formattedEndDate = new Date(endDate).toLocaleDateString("en-US");

                    this.$axios.get("<?php echo e(route('admin.sales.bookings.get')); ?>", {
                        params: {
                            view_type: 'calendar',
                            startDate: formattedStartDate,
                            endDate: formattedEndDate
                        }
                    })
                    .then(response => {
                        this.events = response.data.bookings;

                        this.events.forEach(element => {
                            const differenceInMinutes = Math.floor((new Date(element.end) - new Date(element.start)) / (1000 * 60));
                            const totalMinutes = Math.floor(differenceInMinutes / 60) * 60 + (differenceInMinutes % 60);

                            element.time_difference = totalMinutes > 60;
                        });
                    })
                    .catch(error => {});
                },

                toggleEvent(event) {
                    this.event = event;

                    this.$refs.myModal.toggle();
                },

                redirect(event) {
                    window.location.href = "<?php echo e(route('admin.sales.orders.view', 'order_id')); ?>/".replace('order_id', this.event.order_id)
                },
            },
        });
    </script>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('e212ab4a-e905-410b-8043-e648e9f6cb0c')): $__env->markAsRenderedOnce('e212ab4a-e905-410b-8043-e648e9f6cb0c');
$__env->startPush('styles'); ?>
    <style>
        .vuecal__title-bar {
            background-color: transparent;
            border-bottom: 1px solid #ddd;
            color: #1F2937;
        }

        .vuecal__title-bar .vuecal__title {
            width: fit-content;
        }

        .vuecal__heading {
            height: 100%;
        }

        .vuecal__heading .weekday-label {
            display: grid;
            height: fit-content;
            justify-content: left;
            text-align:left;
            padding: 6px 25px;
        }

        .weekday-label .full, .weekday-label .small, .weekday-label .xsmall {
            font-size: 12px;
            font-weight: 700;
        } 

        .weekday-label span {
            font-size: 24px;
            font-weight: 500;
            text-transform: uppercase;
            color: #1F2937;
        }

    </style>
<?php $__env->stopPush(); endif; ?><?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Admin\src\Resources\views\sales\bookings\calendar.blade.php ENDPATH**/ ?>