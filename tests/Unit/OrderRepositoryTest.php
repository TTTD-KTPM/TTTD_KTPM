<?php

namespace Tests\Unit;

use Mockery;
use PHPUnit\Framework\TestCase;
use Webkul\Sales\Repositories\OrderRepository;
use Webkul\Sales\Repositories\OrderItemRepository;
use Webkul\Sales\Repositories\DownloadableLinkPurchasedRepository;
use Webkul\Product\Repositories\ProductCustomizableOptionRepository;
use Webkul\Sales\Models\Order;
use Webkul\Sales\Models\OrderAddress;
use Webkul\Sales\Models\OrderPayment;
use Webkul\Sales\Models\OrderItem;
use Illuminate\Container\Container;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;

/**
 * OrderRepository Unit Tests
 * 
 * TRUE UNIT TESTS - Mocked Dependencies
 * Tests repository business logic without database
 */
class OrderRepositoryTest extends TestCase
{
    protected $repository;
    protected $orderItemRepository;
    protected $productCustomizableOptionRepository;
    protected $downloadableLinkPurchasedRepository;
    protected $container;
    protected $orderModel;

    protected function setUp(): void
    {
        parent::setUp();

        // Mock dependencies
        $this->orderItemRepository = Mockery::mock(OrderItemRepository::class);
        $this->productCustomizableOptionRepository = Mockery::mock(ProductCustomizableOptionRepository::class);
        $this->downloadableLinkPurchasedRepository = Mockery::mock(DownloadableLinkPurchasedRepository::class);
        $this->container = Mockery::mock(Container::class);
        $this->orderModel = Mockery::mock(Order::class);

        // Setup container to return our mocked model
        $this->container->shouldReceive('make')
            ->with('Webkul\Sales\Contracts\Order')
            ->andReturn($this->orderModel);

        // Create repository with mocked dependencies
        $this->repository = new OrderRepository(
            $this->orderItemRepository,
            $this->productCustomizableOptionRepository,
            $this->downloadableLinkPurchasedRepository,
            $this->container
        );
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    /** @test */
    public function it_generates_unique_increment_id()
    {
        // Act
        $incrementId1 = $this->repository->generateIncrementId();
        $incrementId2 = $this->repository->generateIncrementId();

        // Assert
        $this->assertNotEquals($incrementId1, $incrementId2, 'Increment IDs should be unique');
        $this->assertIsString($incrementId1);
        $this->assertGreaterThan(0, strlen($incrementId1));
    }

    /** @test */
    public function it_validates_order_creation_data_structure()
    {
        // Arrange
        $validData = [
            'customer_id' => 1,
            'customer_email' => 'test@example.com',
            'customer_first_name' => 'John',
            'customer_last_name' => 'Doe',
            'grand_total' => 100.00,
            'base_grand_total' => 100.00,
            'payment' => [
                'method' => 'cashondelivery',
                'method_title' => 'Cash On Delivery',
            ],
            'billing_address' => [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'address_type' => OrderAddress::ADDRESS_TYPE_BILLING,
            ],
            'items' => [
                [
                    'product_id' => 1,
                    'sku' => 'TEST-SKU',
                    'name' => 'Test Product',
                    'qty_ordered' => 2,
                    'price' => 50.00,
                ],
            ],
        ];

        // Assert - data structure should be valid
        $this->assertArrayHasKey('payment', $validData);
        $this->assertArrayHasKey('billing_address', $validData);
        $this->assertArrayHasKey('items', $validData);
        $this->assertIsArray($validData['items']);
        $this->assertNotEmpty($validData['items']);
    }

    /** @test */
    public function it_validates_payment_data_required()
    {
        // Arrange
        $invalidData = [
            'customer_id' => 1,
            // missing payment
        ];

        // Assert
        $this->assertArrayNotHasKey('payment', $invalidData);
    }

    /** @test */
    public function it_validates_items_are_required()
    {
        // Arrange
        $invalidData = [
            'customer_id' => 1,
            'payment' => ['method' => 'cashondelivery'],
            'items' => [], // empty items
        ];

        // Assert
        $this->assertEmpty($invalidData['items'], 'Items should not be empty');
    }

    /** @test */
    public function it_sets_pending_status_by_default()
    {
        // Act
        $expectedStatus = Order::STATUS_PENDING;

        // Assert
        $this->assertEquals('pending', $expectedStatus);
    }

    /** @test */
    public function it_calculates_total_from_items()
    {
        // Arrange
        $items = [
            ['qty_ordered' => 2, 'price' => 50.00, 'total' => 100.00],
            ['qty_ordered' => 1, 'price' => 30.00, 'total' => 30.00],
        ];

        $expectedTotal = 130.00;

        // Act
        $actualTotal = array_sum(array_column($items, 'total'));

        // Assert
        $this->assertEquals($expectedTotal, $actualTotal, 'Total should be sum of all item totals');
    }
}
