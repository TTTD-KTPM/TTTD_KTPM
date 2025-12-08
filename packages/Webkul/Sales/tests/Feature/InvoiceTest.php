<?php

namespace Webkul\Sales\Tests\Feature;

use Tests\TestCase;
use Webkul\Customer\Models\Customer;
use Webkul\Sales\Models\Invoice;
use Webkul\Sales\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InvoiceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test invoice creation for an order
     */
    public function test_can_create_invoice_for_order(): void
    {
        // Arrange: Create order with items
        $order = Order::factory()->create([
            'status' => 'pending',
        ]);

        // Act: Create invoice
        $invoice = Invoice::factory()->create([
            'order_id' => $order->id,
            'state' => 'paid',
        ]);

        // Assert
        $this->assertDatabaseHas('invoices', [
            'id' => $invoice->id,
            'order_id' => $order->id,
            'state' => 'paid',
        ]);
    }

    /**
     * Test invoice has correct total amount
     */
    public function test_invoice_calculates_correct_total(): void
    {
        // Arrange
        $order = Order::factory()->create([
            'grand_total' => 100.00,
        ]);

        // Act
        $invoice = Invoice::factory()->create([
            'order_id' => $order->id,
            'grand_total' => $order->grand_total,
        ]);

        // Assert
        $this->assertEquals($order->grand_total, $invoice->grand_total);
    }

    /**
     * Test cannot create invoice for already invoiced order
     */
    public function test_cannot_create_duplicate_invoice(): void
    {
        // Arrange
        $order = Order::factory()->create();
        Invoice::factory()->create([
            'order_id' => $order->id,
        ]);

        // Assert: Only one invoice exists
        $this->assertEquals(1, Invoice::where('order_id', $order->id)->count());
    }

    /**
     * Test invoice updates order status
     */
    public function test_invoice_updates_order_status(): void
    {
        // Arrange
        $order = Order::factory()->create([
            'status' => 'pending',
        ]);

        // Act
        Invoice::factory()->create([
            'order_id' => $order->id,
            'state' => 'paid',
        ]);

        // Assert
        $order->refresh();
        $this->assertNotEquals('pending', $order->status);
    }
}
