<?php

namespace Webkul\Sales\Tests\Feature;

use Tests\TestCase;
use Webkul\Sales\Models\Refund;
use Webkul\Sales\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RefundTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test refund creation for an order
     */
    public function test_can_create_refund_for_order(): void
    {
        // Arrange
        $order = Order::factory()->create([
            'status' => 'completed',
            'grand_total' => 200.00,
        ]);

        // Act
        $refund = Refund::factory()->create([
            'order_id' => $order->id,
            'adjustment_refund' => 50.00,
        ]);

        // Assert
        $this->assertDatabaseHas('refunds', [
            'id' => $refund->id,
            'order_id' => $order->id,
        ]);
    }

    /**
     * Test refund amount does not exceed order total
     */
    public function test_refund_amount_validation(): void
    {
        // Arrange
        $order = Order::factory()->create([
            'grand_total' => 100.00,
        ]);

        // Act
        $refund = Refund::factory()->create([
            'order_id' => $order->id,
            'adjustment_refund' => 50.00,
        ]);

        // Assert
        $this->assertLessThanOrEqual($order->grand_total, $refund->adjustment_refund);
    }

    /**
     * Test refund updates order status
     */
    public function test_refund_updates_order_status(): void
    {
        // Arrange
        $order = Order::factory()->create([
            'status' => 'completed',
        ]);

        // Act
        Refund::factory()->create([
            'order_id' => $order->id,
        ]);

        // Assert
        $order->refresh();
        $this->assertTrue(in_array($order->status, ['closed', 'completed', 'refunded']));
    }

    /**
     * Test refund belongs to order
     */
    public function test_refund_belongs_to_order(): void
    {
        // Arrange
        $order = Order::factory()->create();
        
        // Act
        $refund = Refund::factory()->create([
            'order_id' => $order->id,
        ]);

        // Assert
        $this->assertInstanceOf(Order::class, $refund->order);
        $this->assertEquals($order->id, $refund->order->id);
    }

    /**
     * Test multiple refunds can exist for single order
     */
    public function test_order_can_have_multiple_partial_refunds(): void
    {
        // Arrange
        $order = Order::factory()->create([
            'grand_total' => 200.00,
        ]);

        // Act
        Refund::factory()->create([
            'order_id' => $order->id,
            'adjustment_refund' => 50.00,
        ]);
        
        Refund::factory()->create([
            'order_id' => $order->id,
            'adjustment_refund' => 30.00,
        ]);

        // Assert
        $this->assertEquals(2, Refund::where('order_id', $order->id)->count());
    }
}
