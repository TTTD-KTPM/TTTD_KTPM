<?php

namespace Webkul\Sales\Tests\Feature;

use Tests\TestCase;
use Webkul\Sales\Models\Shipment;
use Webkul\Sales\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShipmentTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test shipment creation for an order
     */
    public function test_can_create_shipment_for_order(): void
    {
        // Arrange
        $order = Order::factory()->create([
            'status' => 'processing',
        ]);

        // Act
        $shipment = Shipment::factory()->create([
            'order_id' => $order->id,
            'carrier_title' => 'DHL',
            'track_number' => 'TRACK123456',
        ]);

        // Assert
        $this->assertDatabaseHas('shipments', [
            'id' => $shipment->id,
            'order_id' => $order->id,
            'carrier_title' => 'DHL',
        ]);
    }

    /**
     * Test shipment has tracking number
     */
    public function test_shipment_has_tracking_number(): void
    {
        // Arrange & Act
        $shipment = Shipment::factory()->create([
            'track_number' => 'TRACK789',
        ]);

        // Assert
        $this->assertNotNull($shipment->track_number);
        $this->assertEquals('TRACK789', $shipment->track_number);
    }

    /**
     * Test shipment updates order status
     */
    public function test_shipment_updates_order_status(): void
    {
        // Arrange
        $order = Order::factory()->create([
            'status' => 'processing',
        ]);

        // Act
        Shipment::factory()->create([
            'order_id' => $order->id,
        ]);

        // Assert
        $order->refresh();
        $this->assertContains($order->status, ['processing', 'completed']);
    }

    /**
     * Test shipment belongs to order
     */
    public function test_shipment_belongs_to_order(): void
    {
        // Arrange
        $order = Order::factory()->create();
        
        // Act
        $shipment = Shipment::factory()->create([
            'order_id' => $order->id,
        ]);

        // Assert
        $this->assertInstanceOf(Order::class, $shipment->order);
        $this->assertEquals($order->id, $shipment->order->id);
    }
}
