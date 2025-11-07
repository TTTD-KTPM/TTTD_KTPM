<?php

namespace Webkul\Admin\Mail\Order;

use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Webkul\Admin\Mail\Mailable;
use Webkul\Sales\Contracts\Order;

class CreatedNotification extends Mailable
{
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(public Order $order) {}

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        // ORIGINAL CODE (commented out due to null email issue in CI):
        // return new Envelope(
        //     to: [
        //         new Address(
        //             core()->getAdminEmailDetails()['email'],
        //             core()->getAdminEmailDetails()['name']
        //         ),
        //     ],
        //     subject: trans('admin::app.emails.orders.created.subject'),
        // );

        // SAFE VERSION (handles null admin email in test environment):
        $adminDetails = core()->getAdminEmailDetails();
        $adminEmail = $adminDetails['email'] ?? config('mail.from.address', 'admin@example.com');
        $adminName = $adminDetails['name'] ?? config('mail.from.name', 'Admin');

        return new Envelope(
            to: [
                new Address(
                    $adminEmail,
                    $adminName
                ),
            ],
            subject: trans('admin::app.emails.orders.created.subject'),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'admin::emails.orders.created',
        );
    }
}
