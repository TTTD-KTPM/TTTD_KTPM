<?php

namespace Webkul\Checkout\Listeners;

use Webkul\Checkout\Facades\Cart;

class CustomerEventsHandler
{
    /**
     * Handle Customer login events - DISABLED for Triet-Customer branch.
     * Cart merge functionality is disabled.
     */
    public function onCustomerLogin($customer)
    {
        /**
         * Cart merge is disabled for Triet-Customer branch.
         * This branch does not support shopping cart functionality.
         */
        // Cart::mergeCart($customer);
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     * @return void
     */
    public function subscribe($events)
    {
        $events->listen('customer.after.login', 'Webkul\Checkout\Listeners\CustomerEventsHandler@onCustomerLogin');
    }
}
