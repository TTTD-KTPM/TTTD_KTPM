<div class="grid grid-cols-1 gap-6">
    <div class="flex gap-3">
        <span class="icon-calendar text-2xl"></span>

        <div class="grid grid-cols-1 gap-1.5 text-sm font-medium">
            <p class="text-[#6E6E6E]">
                <?php echo app('translator')->get('shop::app.products.view.type.booking.appointment.slot-duration'); ?> :
            </p>

            <div>
                <?php echo app('translator')->get('shop::app.products.view.type.booking.appointment.slot-duration-in-minutes', [
                    'minutes' => $bookingProduct->appointment_slot->duration
                ]); ?>
            </div>
        </div>
    </div>

    <?php $bookingSlotHelper = app('Webkul\BookingProduct\Helpers\AppointmentSlot'); ?>

    <div class="flex gap-3">
        <span class="icon-calendar text-2xl"></span>

        <div class="grid grid-cols-1 gap-4">
            <div class="grid grid-cols-1 gap-1.5 text-sm font-medium">
                <p class="text-[#6E6E6E]">
                    <?php echo app('translator')->get('shop::app.products.view.type.booking.appointment.today-availability'); ?>
                </p>
    
                <span>
                    <?php echo $bookingSlotHelper->getTodaySlotsHtml($bookingProduct); ?>

                </span>
            </div>

            <!-- Toggler Vue Component -->
            <v-toggler />
        </div>
    </div>
    
    <?php echo $__env->make('shop::products.view.types.booking.slots', ['bookingProduct' => $bookingProduct], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</div>

<?php if (! $__env->hasRenderedOnce('374898b7-7a54-440c-9edb-a3c2d31ff2f2')): $__env->markAsRenderedOnce('374898b7-7a54-440c-9edb-a3c2d31ff2f2');
$__env->startPush('scripts'); ?>
    <script
        type="text/x-template"
        id="v-toggler-template"
    >
        <div class="grid w-max select-none gap-3">
            <!-- Details Toggler -->
            <p
                class="flex cursor-pointer items-center gap-x-[15px] text-sm font-medium text-blue-600"
                @click="showDaysAvailability = ! showDaysAvailability"
            >
                <?php echo app('translator')->get('shop::app.products.view.type.booking.appointment.see-details'); ?>

                <span
                    class="text-xl font-bold"
                    :class="{'icon-arrow-up': showDaysAvailability, 'icon-arrow-down': ! showDaysAvailability}"
                >
                </span>
            </p>

            <!-- Option Details -->
            <div
                class="grid grid-cols-2 gap-3"
                v-show="showDaysAvailability"
                v-for="day in days"
            >
                <!-- Name -->
                <p
                    class="text-gray text-sm font-medium"
                    v-text="day.name"
                >
                </p>

                <!-- Slot Duration -->
                <p class="grid gap-y-2.5 text-sm text-gray-600">
                    <template v-if="day.slots && day.slots?.length">
                        <div v-for="slot in day.slots">
                            {{ slot.from }} - {{ slot.to }}
                        </div>
                    </template>

                    <div v-else>
                        <?php echo app('translator')->get('shop::app.products.view.type.booking.appointment.closed'); ?>
                    </div>
                </p>
            </div>
        </div>
    </script>

    <script type="module">
        app.component('v-toggler', {
            template: '#v-toggler-template',

            data() {
                return{
                    showDaysAvailability: '',

                    days: <?php echo json_encode($bookingSlotHelper->getWeekSlotDurations($bookingProduct), 15, 512) ?>,
                }
            },
        })
    </script>
<?php $__env->stopPush(); endif; ?><?php /**PATH D:\xampp\htdocs\TTTD_KTPM_Clone\packages\Webkul\Shop\src\Resources\views\products\view\types\booking\appointment.blade.php ENDPATH**/ ?>