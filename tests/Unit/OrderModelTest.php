<?php

namespace Tests\Unit;

use Mockery;
use PHPUnit\Framework\TestCase;
use Webkul\Sales\Models\Order;
use Webkul\Sales\Models\OrderItem;
use Webkul\Sales\Models\Invoice;
use Webkul\Sales\Models\Shipment;

/**
 * Order Model Unit Tests
 * 
 * TRUE UNIT TESTS - No Database, All Mocked
 * Tests business logic methods in Order model
 */
class OrderModelTest extends TestCase
{
    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    /** @test */
    public function it_can_determine_if_order_can_be_invoiced_when_pending()
    {
        // Arrange
        $order = Mockery::mock(Order::class)->makePartial();
        $order->status = Order::STATUS_PENDING;
        
        $orderItem = Mockery::mock(OrderItem::class);
        $orderItem->order = $order;
        $orderItem->shouldReceive('canInvoice')->andReturn(true);
        
        $order->shouldReceive('getAttribute')
            ->with('items')
            ->andReturn(collect([$orderItem]));

        // Act
        $result = $order->canInvoice();

        // Assert
        $this->assertTrue($result, 'Pending order with invoiceable items should be invoiceable');
    }

    /** @test */
    public function it_cannot_invoice_closed_order()
    {
        // Arrange
        $order = Mockery::mock(Order::class)->makePartial();
        $order->status = Order::STATUS_CLOSED;
        
        $orderItem = Mockery::mock(OrderItem::class);
        $orderItem->order = $order;
        $orderItem->shouldReceive('canInvoice')->andReturn(true);
        
        $order->shouldReceive('getAttribute')
            ->with('items')
            ->andReturn(collect([$orderItem]));

        // Act
        $result = $order->canInvoice();

        // Assert
        $this->assertFalse($result, 'Closed order should not be invoiceable');
    }

    /** @test */
    public function it_cannot_invoice_fraud_order()
    {
        // Arrange
        $order = Mockery::mock(Order::class)->makePartial();
        $order->status = Order::STATUS_FRAUD;
        
        $orderItem = Mockery::mock(OrderItem::class);
        $orderItem->order = $order;
        $orderItem->shouldReceive('canInvoice')->andReturn(true);
        
        $order->shouldReceive('getAttribute')
            ->with('items')
            ->andReturn(collect([$orderItem]));

        // Act
        $result = $order->canInvoice();

        // Assert
        $this->assertFalse($result, 'Fraud order should not be invoiceable');
    }

    /** @test */
    public function it_can_determine_if_order_can_be_shipped()
    {
        // Arrange
        $order = Mockery::mock(Order::class)->makePartial();
        $order->status = Order::STATUS_PROCESSING;
        
        $orderItem = Mockery::mock(OrderItem::class);
        $orderItem->order = $order;
        $orderItem->shouldReceive('canShip')->andReturn(true);
        
        $order->shouldReceive('getAttribute')
            ->with('items')
            ->andReturn(collect([$orderItem]));

        // Act
        $result = $order->canShip();

        // Assert
        $this->assertTrue($result, 'Processing order with shippable items should be shippable');
    }

    /** @test */
    public function it_cannot_ship_closed_order()
    {
        // Arrange
        $order = Mockery::mock(Order::class)->makePartial();
        $order->status = Order::STATUS_CLOSED;
        
        $orderItem = Mockery::mock(OrderItem::class);
        $orderItem->order = $order;
        $orderItem->shouldReceive('canShip')->andReturn(true);
        
        $order->shouldReceive('getAttribute')
            ->with('items')
            ->andReturn(collect([$orderItem]));

        // Act
        $result = $order->canShip();

        // Assert
        $this->assertFalse($result, 'Closed order should not be shippable');
    }

    /** @test */
    public function it_can_determine_if_order_can_be_canceled()
    {
        // Arrange
        $order = Mockery::mock(Order::class)->makePartial();
        $order->status = Order::STATUS_PENDING;
        
        $orderItem = Mockery::mock(OrderItem::class);
        $orderItem->order = $order;
        $orderItem->shouldReceive('canCancel')->andReturn(true);
        
        $order->shouldReceive('getAttribute')
            ->with('items')
            ->andReturn(collect([$orderItem]));

        // Act
        $result = $order->canCancel();

        // Assert
        $this->assertTrue($result, 'Pending order with cancelable items should be cancelable');
    }

    /** @test */
    public function it_cannot_cancel_closed_order()
    {
        // Arrange
        $order = Mockery::mock(Order::class)->makePartial();
        $order->status = Order::STATUS_CLOSED;
        
        $orderItem = Mockery::mock(OrderItem::class);
        $orderItem->order = $order;
        $orderItem->shouldReceive('canCancel')->andReturn(true);
        
        $order->shouldReceive('getAttribute')
            ->with('items')
            ->andReturn(collect([$orderItem]));

        // Act
        $result = $order->canCancel();

        // Assert
        $this->assertFalse($result, 'Closed order should not be cancelable');
    }

    /** @test */
    public function it_can_determine_if_order_can_be_refunded()
    {
        // Arrange
        $order = Mockery::mock(Order::class)->makePartial();
        $order->status = Order::STATUS_COMPLETED;
        $order->base_grand_total_invoiced = 100.00;
        $order->base_grand_total_refunded = 0.00;
        
        $orderItem = Mockery::mock(OrderItem::class);
        $orderItem->order = $order;
        $orderItem->qty_to_refund = 2;
        
        $order->shouldReceive('getAttribute')
            ->with('items')
            ->andReturn(collect([$orderItem]));
        
        $order->shouldReceive('refunds->sum')
            ->andReturn(0);

        // Act
        $result = $order->canRefund();

        // Assert
        $this->assertTrue($result, 'Completed order with refundable amount should be refundable');
    }

    /** @test */
    public function it_cannot_refund_when_no_amount_left()
    {
        // Arrange
        $order = Mockery::mock(Order::class)->makePartial();
        $order->status = Order::STATUS_COMPLETED;
        $order->base_grand_total_invoiced = 100.00;
        $order->base_grand_total_refunded = 100.00;
        
        $orderItem = Mockery::mock(OrderItem::class);
        $orderItem->order = $order;
        $orderItem->qty_to_refund = 0;
        
        $order->shouldReceive('getAttribute')
            ->with('items')
            ->andReturn(collect([$orderItem]));
        
        $order->shouldReceive('refunds->sum')
            ->andReturn(0);

        // Act
        $result = $order->canRefund();

        // Assert
        $this->assertFalse($result, 'Order with no refundable amount should not be refundable');
    }

    /** @test */
    public function it_cannot_reorder_guest_order()
    {
        // Arrange
        $order = Mockery::mock(Order::class)->makePartial();
        $order->is_guest = true;
        
        $order->shouldReceive('getAttribute')
            ->with('items')
            ->andReturn(collect([]));

        // Act
        $result = $order->canReorder();

        // Assert
        $this->assertFalse($result, 'Guest order should not be reorderable');
    }

    /** @test */
    public function it_cannot_reorder_with_unavailable_products()
    {
        // Arrange
        $order = Mockery::mock(Order::class)->makePartial();
        $order->is_guest = false;
        
        $product = Mockery::mock();
        $typeInstance = Mockery::mock();
        $typeInstance->shouldReceive('isSaleable')->andReturn(false);
        $product->shouldReceive('getTypeInstance')->andReturn($typeInstance);
        
        $orderItem = Mockery::mock(OrderItem::class);
        $orderItem->product = $product;
        
        $order->shouldReceive('getAttribute')
            ->with('items')
            ->andReturn(collect([$orderItem]));

        // Act
        $result = $order->canReorder();

        // Assert
        $this->assertFalse($result, 'Order with unavailable products should not be reorderable');
    }

    /** @test */
    public function it_can_reorder_with_available_products()
    {
        // Arrange
        $order = Mockery::mock(Order::class)->makePartial();
        $order->is_guest = false;
        
        $product = Mockery::mock();
        $typeInstance = Mockery::mock();
        $typeInstance->shouldReceive('isSaleable')->andReturn(true);
        $product->shouldReceive('getTypeInstance')->andReturn($typeInstance);
        
        $orderItem = Mockery::mock(OrderItem::class);
        $orderItem->product = $product;
        
        $order->shouldReceive('getAttribute')
            ->with('items')
            ->andReturn(collect([$orderItem]));

        // Act
        $result = $order->canReorder();

        // Assert
        $this->assertTrue($result, 'Order with available products should be reorderable');
    }

    /** @test */
    public function it_calculates_base_total_due_correctly()
    {
        // Arrange
        $order = Mockery::mock(Order::class)->makePartial();
        $order->base_grand_total = 100.00;
        $order->base_grand_total_invoiced = 60.00;

        // Act
        $result = $order->getBaseTotalDueAttribute();

        // Assert
        $this->assertEquals(40.00, $result, 'Base total due should be 40.00');
    }

    /** @test */
    public function it_calculates_total_due_correctly()
    {
        // Arrange
        $order = Mockery::mock(Order::class)->makePartial();
        $order->grand_total = 100.00;
        $order->grand_total_invoiced = 75.00;

        // Act
        $result = $order->getTotalDueAttribute();

        // Assert
        $this->assertEquals(25.00, $result, 'Total due should be 25.00');
    }

    /** @test */
    public function it_returns_correct_status_label()
    {
        // Arrange
        $order = Mockery::mock(Order::class)->makePartial();
        $order->status = Order::STATUS_PENDING;

        // Act
        $result = $order->getStatusLabelAttribute();

        // Assert
        $this->assertEquals('Pending', $result, 'Status label should be "Pending"');
    }

    /** @test */
    public function it_detects_stockable_items()
    {
        // Arrange
        $order = Mockery::mock(Order::class)->makePartial();
        
        $typeInstance = Mockery::mock();
        $typeInstance->shouldReceive('isStockable')->andReturn(true);
        
        $orderItem = Mockery::mock(OrderItem::class);
        $orderItem->shouldReceive('getTypeInstance')->andReturn($typeInstance);
        
        $order->shouldReceive('getAttribute')
            ->with('items')
            ->andReturn(collect([$orderItem]));

        // Act
        $result = $order->haveStockableItems();

        // Assert
        $this->assertTrue($result, 'Order should have stockable items');
    }

    /** @test */
    public function it_detects_no_stockable_items()
    {
        // Arrange
        $order = Mockery::mock(Order::class)->makePartial();
        
        $typeInstance = Mockery::mock();
        $typeInstance->shouldReceive('isStockable')->andReturn(false);
        
        $orderItem = Mockery::mock(OrderItem::class);
        $orderItem->shouldReceive('getTypeInstance')->andReturn($typeInstance);
        
        $order->shouldReceive('getAttribute')
            ->with('items')
            ->andReturn(collect([$orderItem]));

        // Act
        $result = $order->haveStockableItems();

        // Assert
        $this->assertFalse($result, 'Order should not have stockable items');
    }
}
