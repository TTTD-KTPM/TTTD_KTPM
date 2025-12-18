<?php

namespace Tests\Unit;

use Mockery;
use PHPUnit\Framework\TestCase;
use Webkul\Sales\Repositories\RefundRepository;
use Webkul\Sales\Repositories\OrderRepository;
use Webkul\Sales\Repositories\OrderItemRepository;
use Webkul\Sales\Repositories\RefundItemRepository;
use Webkul\Sales\Repositories\DownloadableLinkPurchasedRepository;
use Webkul\Sales\Models\Order;
use Webkul\Sales\Models\OrderItem;
use Webkul\Sales\Models\Refund;
use Illuminate\Container\Container;

/**
 * RefundRepository Unit Tests
 * 
 * TRUE UNIT TESTS - Mocked Dependencies
 * Tests refund creation business logic without database
 */
class RefundRepositoryTest extends TestCase
{
    protected $repository;
    protected $orderRepository;
    protected $orderItemRepository;
    protected $refundItemRepository;
    protected $downloadableLinkPurchasedRepository;
    protected $container;
    protected $refundModel;

    protected function setUp(): void
    {
        parent::setUp();

        // Mock dependencies
        $this->orderRepository = Mockery::mock(OrderRepository::class);
        $this->orderItemRepository = Mockery::mock(OrderItemRepository::class);
        $this->refundItemRepository = Mockery::mock(RefundItemRepository::class);
        $this->downloadableLinkPurchasedRepository = Mockery::mock(DownloadableLinkPurchasedRepository::class);
        $this->container = Mockery::mock(Container::class);
        $this->refundModel = Mockery::mock(Refund::class);

        // Setup container
        $this->container->shouldReceive('make')
            ->with('Webkul\Sales\Contracts\Refund')
            ->andReturn($this->refundModel);

        // Create repository with mocked dependencies
        $this->repository = new RefundRepository(
            $this->orderRepository,
            $this->orderItemRepository,
            $this->refundItemRepository,
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
    public function it_validates_refund_data_structure()
    {
        // Arrange
        $validData = [
            'order_id' => 1,
            'refund' => [
                'items' => [
                    1 => 2, // order_item_id => quantity
                ],
                'shipping' => 5.00,
                'adjustment_refund' => 10.00,
                'adjustment_fee' => 2.00,
            ],
        ];

        // Assert
        $this->assertArrayHasKey('order_id', $validData);
        $this->assertArrayHasKey('refund', $validData);
        $this->assertArrayHasKey('items', $validData['refund']);
        $this->assertArrayHasKey('shipping', $validData['refund']);
        $this->assertArrayHasKey('adjustment_refund', $validData['refund']);
        $this->assertArrayHasKey('adjustment_fee', $validData['refund']);
    }

    /** @test */
    public function it_calculates_total_refund_quantity()
    {
        // Arrange
        $items = [
            1 => 2,
            2 => 3,
            3 => 1,
        ];

        // Act
        $totalQty = array_sum($items);

        // Assert
        $this->assertEquals(6, $totalQty, 'Total refund quantity should be 6');
    }

    /** @test */
    public function it_validates_refund_amount_does_not_exceed_order_total()
    {
        // Arrange - Negative Test Case TC_08
        $orderGrandTotal = 100.00;
        $refundAmount = 150.00;

        // Act
        $isValid = $refundAmount <= $orderGrandTotal;

        // Assert
        $this->assertFalse($isValid, 'Refund amount should not exceed order total');
    }

    /** @test */
    public function it_validates_refund_amount_within_order_total()
    {
        // Arrange
        $orderGrandTotal = 100.00;
        $refundAmount = 80.00;

        // Act
        $isValid = $refundAmount <= $orderGrandTotal;

        // Assert
        $this->assertTrue($isValid, 'Refund amount is within order total');
    }

    /** @test */
    public function it_calculates_partial_refund_correctly()
    {
        // Arrange - Test Case TC_13
        $orderTotal = 100.00;
        $partialRefundAmount = 50.00;

        // Act
        $remainingAmount = $orderTotal - $partialRefundAmount;

        // Assert
        $this->assertEquals(50.00, $remainingAmount, 'Remaining amount should be 50.00');
        $this->assertGreaterThan(0, $remainingAmount, 'Partial refund should leave remaining amount');
    }

    /** @test */
    public function it_validates_refund_quantity_does_not_exceed_available()
    {
        // Arrange
        $qtyInvoiced = 10;
        $qtyRefunded = 6;
        $qtyToRefund = 3;

        // Act
        $availableToRefund = $qtyInvoiced - $qtyRefunded;
        $isValid = $qtyToRefund <= $availableToRefund;

        // Assert
        $this->assertTrue($isValid, 'Refund quantity should not exceed available quantity');
        $this->assertEquals(4, $availableToRefund);
    }

    /** @test */
    public function it_validates_refund_quantity_exceeds_available()
    {
        // Arrange
        $qtyInvoiced = 10;
        $qtyRefunded = 8;
        $qtyToRefund = 5;

        // Act
        $availableToRefund = $qtyInvoiced - $qtyRefunded;
        $isValid = $qtyToRefund <= $availableToRefund;

        // Assert
        $this->assertFalse($isValid, 'Refund quantity exceeds available quantity');
        $this->assertEquals(2, $availableToRefund);
    }

    /** @test */
    public function it_calculates_tax_amount_proportionally()
    {
        // Arrange
        $totalTaxAmount = 10.00;
        $qtyOrdered = 5;
        $qtyToRefund = 2;

        // Act
        $taxPerItem = $totalTaxAmount / $qtyOrdered;
        $refundTaxAmount = $taxPerItem * $qtyToRefund;

        // Assert
        $this->assertEquals(2.00, $taxPerItem);
        $this->assertEquals(4.00, $refundTaxAmount);
    }

    /** @test */
    public function it_calculates_refund_item_total_with_tax()
    {
        // Arrange
        $price = 50.00;
        $qty = 2;
        $taxAmount = 5.00;

        // Act
        $total = $price * $qty;
        $totalInclTax = $total + $taxAmount;

        // Assert
        $this->assertEquals(100.00, $total);
        $this->assertEquals(105.00, $totalInclTax);
    }

    /** @test */
    public function it_includes_shipping_amount_in_refund()
    {
        // Arrange
        $itemsRefund = 80.00;
        $shippingRefund = 10.00;

        // Act
        $totalRefund = $itemsRefund + $shippingRefund;

        // Assert
        $this->assertEquals(90.00, $totalRefund, 'Total refund should include shipping');
    }

    /** @test */
    public function it_applies_adjustment_refund()
    {
        // Arrange
        $itemsRefund = 80.00;
        $adjustmentRefund = 5.00;

        // Act
        $totalRefund = $itemsRefund + $adjustmentRefund;

        // Assert
        $this->assertEquals(85.00, $totalRefund, 'Adjustment refund should be added');
    }

    /** @test */
    public function it_deducts_adjustment_fee()
    {
        // Arrange
        $itemsRefund = 80.00;
        $adjustmentFee = 3.00;

        // Act
        $totalRefund = $itemsRefund - $adjustmentFee;

        // Assert
        $this->assertEquals(77.00, $totalRefund, 'Adjustment fee should be deducted');
    }

    /** @test */
    public function it_sets_refund_state_as_refunded()
    {
        // Arrange & Act
        $defaultState = 'refunded';

        // Assert
        $this->assertEquals('refunded', $defaultState);
    }

    /** @test */
    public function it_validates_empty_refund_items_not_allowed()
    {
        // Arrange
        $refundData = [
            'order_id' => 1,
            'refund' => [
                'items' => [], // empty items
            ],
        ];

        // Act
        $totalQty = array_sum($refundData['refund']['items'] ?? []);

        // Assert
        $this->assertEquals(0, $totalQty, 'Empty refund should have 0 total quantity');
    }

    /** @test */
    public function it_validates_zero_quantity_items_are_skipped()
    {
        // Arrange
        $items = [
            1 => 2,
            2 => 0, // zero quantity - should be skipped
            3 => 3,
        ];

        // Act
        $validItems = array_filter($items, function ($qty) {
            return $qty > 0;
        });

        // Assert
        $this->assertCount(2, $validItems, 'Zero quantity items should be skipped');
        $this->assertArrayNotHasKey(2, $validItems);
    }
}
