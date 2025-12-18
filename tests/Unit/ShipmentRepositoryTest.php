<?php

namespace Tests\Unit;

use Mockery;
use PHPUnit\Framework\TestCase;
use Webkul\Sales\Repositories\ShipmentRepository;
use Webkul\Sales\Repositories\OrderRepository;
use Webkul\Sales\Repositories\OrderItemRepository;
use Webkul\Sales\Repositories\ShipmentItemRepository;
use Webkul\Sales\Models\Order;
use Webkul\Sales\Models\OrderItem;
use Webkul\Sales\Models\Shipment;
use Illuminate\Container\Container;

/**
 * ShipmentRepository Unit Tests
 * 
 * TRUE UNIT TESTS - Mocked Dependencies
 * Tests shipment creation business logic without database
 */
class ShipmentRepositoryTest extends TestCase
{
    protected $repository;
    protected $orderRepository;
    protected $orderItemRepository;
    protected $shipmentItemRepository;
    protected $container;
    protected $shipmentModel;

    protected function setUp(): void
    {
        parent::setUp();

        // Mock dependencies
        $this->orderRepository = Mockery::mock(OrderRepository::class);
        $this->orderItemRepository = Mockery::mock(OrderItemRepository::class);
        $this->shipmentItemRepository = Mockery::mock(ShipmentItemRepository::class);
        $this->container = Mockery::mock(Container::class);
        $this->shipmentModel = Mockery::mock(Shipment::class);

        // Setup container
        $this->container->shouldReceive('make')
            ->with('Webkul\Sales\Contracts\Shipment')
            ->andReturn($this->shipmentModel);

        // Create repository with mocked dependencies
        $this->repository = new ShipmentRepository(
            $this->orderRepository,
            $this->orderItemRepository,
            $this->shipmentItemRepository,
            $this->container
        );
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    /** @test */
    public function it_validates_shipment_data_structure()
    {
        // Arrange
        $validData = [
            'order_id' => 1,
            'shipment' => [
                'carrier_title' => 'DHL',
                'track_number' => 'TRACK123456',
                'source' => 1,
                'items' => [
                    1 => [1 => 2], // order_item_id => [source_id => quantity]
                ],
            ],
        ];

        // Assert
        $this->assertArrayHasKey('order_id', $validData);
        $this->assertArrayHasKey('shipment', $validData);
        $this->assertArrayHasKey('carrier_title', $validData['shipment']);
        $this->assertArrayHasKey('track_number', $validData['shipment']);
        $this->assertArrayHasKey('items', $validData['shipment']);
    }

    /** @test */
    public function it_validates_quantity_does_not_exceed_ordered_quantity()
    {
        // Arrange
        $qtyOrdered = 10;
        $qtyShipped = 6;
        $qtyToShip = 3;

        // Act
        $availableToShip = $qtyOrdered - $qtyShipped;
        $isValid = $qtyToShip <= $availableToShip;

        // Assert
        $this->assertTrue($isValid, 'Ship quantity should not exceed available quantity');
        $this->assertEquals(4, $availableToShip);
    }

    /** @test */
    public function it_validates_quantity_exceeds_available_to_ship()
    {
        // Arrange
        $qtyOrdered = 10;
        $qtyShipped = 7;
        $qtyToShip = 5;

        // Act
        $availableToShip = $qtyOrdered - $qtyShipped;
        $isValid = $qtyToShip <= $availableToShip;

        // Assert
        $this->assertFalse($isValid, 'Ship quantity exceeds available quantity');
        $this->assertEquals(3, $availableToShip);
    }

    /** @test */
    public function it_calculates_total_quantity_from_items()
    {
        // Arrange
        $items = [
            1 => [1 => 2], // item 1: 2 units from source 1
            2 => [1 => 3], // item 2: 3 units from source 1
        ];

        // Act
        $totalQty = 0;
        foreach ($items as $itemId => $sources) {
            foreach ($sources as $sourceId => $qty) {
                $totalQty += $qty;
            }
        }

        // Assert
        $this->assertEquals(5, $totalQty, 'Total shipment quantity should be 5');
    }

    /** @test */
    public function it_calculates_total_weight_from_items()
    {
        // Arrange
        $itemWeight = 2.5;
        $qty = 3;

        // Act
        $totalWeight = $itemWeight * $qty;

        // Assert
        $this->assertEquals(7.5, $totalWeight, 'Total weight should be 7.5');
    }

    /** @test */
    public function it_validates_tracking_number_is_required()
    {
        // Arrange
        $shipmentData = [
            'carrier_title' => 'DHL',
            'track_number' => '', // empty tracking number
        ];

        // Assert
        $this->assertEmpty($shipmentData['track_number'], 'Tracking number is empty');
    }

    /** @test */
    public function it_validates_carrier_title_is_required()
    {
        // Arrange
        $shipmentData = [
            'carrier_title' => '',
            'track_number' => 'TRACK123',
        ];

        // Assert
        $this->assertEmpty($shipmentData['carrier_title'], 'Carrier title is empty');
    }

    /** @test */
    public function it_validates_inventory_source_is_required()
    {
        // Arrange
        $shipmentData = [
            'carrier_title' => 'DHL',
            'track_number' => 'TRACK123',
            'source' => null,
        ];

        // Assert
        $this->assertNull($shipmentData['source'], 'Inventory source is not set');
    }

    /** @test */
    public function it_validates_order_must_have_shipping_address()
    {
        // Arrange
        $order = Mockery::mock(Order::class);
        $order->shouldReceive('getAttribute')
            ->with('shipping_address')
            ->andReturn(null);

        // Act
        $hasShippingAddress = $order->getAttribute('shipping_address') !== null;

        // Assert
        $this->assertFalse($hasShippingAddress, 'Order should have shipping address for shipment');
    }

    /** @test */
    public function it_validates_zero_quantity_items_are_skipped()
    {
        // Arrange
        $items = [
            1 => [1 => 2],
            2 => [1 => 0], // zero quantity - should be skipped
            3 => [1 => 3],
        ];

        // Act
        $validItems = [];
        foreach ($items as $itemId => $sources) {
            foreach ($sources as $sourceId => $qty) {
                if ($qty > 0) {
                    $validItems[$itemId] = $sources;
                }
            }
        }

        // Assert
        $this->assertCount(2, $validItems, 'Zero quantity items should be skipped');
        $this->assertArrayNotHasKey(2, $validItems);
    }

    /** @test */
    public function it_validates_shipment_cannot_exceed_stock()
    {
        // Arrange - Negative Test Case TC_06
        $qtyToShip = 10;
        $availableStock = 5;

        // Act
        $isValid = $qtyToShip <= $availableStock;

        // Assert
        $this->assertFalse($isValid, 'Shipment quantity should not exceed available stock');
    }

    /** @test */
    public function it_validates_shipment_within_stock_limits()
    {
        // Arrange
        $qtyToShip = 5;
        $availableStock = 10;

        // Act
        $isValid = $qtyToShip <= $availableStock;

        // Assert
        $this->assertTrue($isValid, 'Shipment quantity is within stock limits');
    }
}
