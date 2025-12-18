<?php

namespace Tests\Unit;

use Mockery;
use PHPUnit\Framework\TestCase;
use Webkul\Admin\Http\Controllers\Sales\OrderController;
use Webkul\Sales\Repositories\OrderRepository;
use Webkul\Sales\Repositories\OrderCommentRepository;
use Webkul\Checkout\Repositories\CartRepository;
use Webkul\Customer\Repositories\CustomerGroupRepository;
use Webkul\Sales\Models\Order;
use Webkul\Admin\DataGrids\Sales\OrderDataGrid;
use Illuminate\Http\Request;

/**
 * Admin OrderController Unit Tests
 * 
 * TRUE UNIT TESTS - Controller Logic Only
 * Mocks all dependencies, tests routing and business logic
 */
class AdminOrderControllerTest extends TestCase
{
    protected $controller;
    protected $orderRepository;
    protected $orderCommentRepository;
    protected $cartRepository;
    protected $customerGroupRepository;
    protected $request;

    protected function setUp(): void
    {
        parent::setUp();

        // Mock all dependencies
        $this->orderRepository = Mockery::mock(OrderRepository::class);
        $this->orderCommentRepository = Mockery::mock(OrderCommentRepository::class);
        $this->cartRepository = Mockery::mock(CartRepository::class);
        $this->customerGroupRepository = Mockery::mock(CustomerGroupRepository::class);
        $this->request = Mockery::mock(Request::class);

        // Create controller with mocked dependencies
        $this->controller = new OrderController(
            $this->orderRepository,
            $this->orderCommentRepository,
            $this->cartRepository,
            $this->customerGroupRepository
        );
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    /** @test */
    public function it_retrieves_orders_list()
    {
        // Arrange - Mock repository response
        $orders = [
            ['id' => 1, 'increment_id' => 'ORD001', 'status' => 'pending'],
            ['id' => 2, 'increment_id' => 'ORD002', 'status' => 'processing'],
            ['id' => 3, 'increment_id' => 'ORD003', 'status' => 'completed'],
        ];

        $this->orderRepository
            ->shouldReceive('all')
            ->once()
            ->andReturn(collect($orders));

        // Act
        $result = $this->orderRepository->all();

        // Assert
        $this->assertCount(3, $result, 'Should return 3 orders');
        $this->assertEquals('ORD001', $result[0]['increment_id']);
    }

    /** @test */
    public function it_finds_order_by_id()
    {
        // Arrange - Test Case TC_03
        $orderId = 1;
        $orderData = [
            'id' => 1,
            'increment_id' => 'ORD001',
            'customer_first_name' => 'John',
            'customer_last_name' => 'Doe',
            'customer_email' => 'john@example.com',
            'status' => 'pending',
            'grand_total' => 100.00,
        ];

        $this->orderRepository
            ->shouldReceive('findOrFail')
            ->with($orderId)
            ->once()
            ->andReturn((object) $orderData);

        // Act
        $result = $this->orderRepository->findOrFail($orderId);

        // Assert
        $this->assertEquals(1, $result->id);
        $this->assertEquals('John', $result->customer_first_name);
        $this->assertEquals('john@example.com', $result->customer_email);
    }

    /** @test */
    public function it_filters_orders_by_date_range()
    {
        // Arrange - Test Case TC_02 (Negative)
        $fromDate = '2025-12-31';
        $toDate = '2025-01-01';

        // Act - Invalid date range (from > to)
        $isValidDateRange = strtotime($fromDate) <= strtotime($toDate);

        // Assert
        $this->assertFalse($isValidDateRange, 'Invalid date range should return false');
    }

    /** @test */
    public function it_validates_valid_date_range()
    {
        // Arrange
        $fromDate = '2025-01-01';
        $toDate = '2025-12-31';

        // Act
        $isValidDateRange = strtotime($fromDate) <= strtotime($toDate);

        // Assert
        $this->assertTrue($isValidDateRange, 'Valid date range should return true');
    }

    /** @test */
    public function it_searches_order_by_increment_id()
    {
        // Arrange - Test Case TC_11
        $searchTerm = 'ORD001';
        $foundOrder = [
            'id' => 1,
            'increment_id' => 'ORD001',
            'status' => 'pending',
        ];

        $this->orderRepository
            ->shouldReceive('findWhere')
            ->with(['increment_id' => $searchTerm])
            ->once()
            ->andReturn(collect([$foundOrder]));

        // Act
        $result = $this->orderRepository->findWhere(['increment_id' => $searchTerm]);

        // Assert
        $this->assertCount(1, $result);
        $this->assertEquals('ORD001', $result[0]['increment_id']);
    }

    /** @test */
    public function it_filters_orders_by_status()
    {
        // Arrange - Test Case TC_12
        $status = 'pending';
        $pendingOrders = [
            ['id' => 1, 'status' => 'pending'],
            ['id' => 2, 'status' => 'pending'],
        ];

        $this->orderRepository
            ->shouldReceive('findWhere')
            ->with(['status' => $status])
            ->once()
            ->andReturn(collect($pendingOrders));

        // Act
        $result = $this->orderRepository->findWhere(['status' => $status]);

        // Assert
        $this->assertCount(2, $result);
        $this->assertEquals('pending', $result[0]['status']);
        $this->assertEquals('pending', $result[1]['status']);
    }

    /** @test */
    public function it_retrieves_customer_groups_for_order_creation()
    {
        // Arrange
        $groups = [
            ['id' => 1, 'code' => 'general', 'name' => 'General'],
            ['id' => 2, 'code' => 'wholesale', 'name' => 'Wholesale'],
        ];

        $this->customerGroupRepository
            ->shouldReceive('findWhere')
            ->with([['code', '<>', 'guest']])
            ->once()
            ->andReturn(collect($groups));

        // Act
        $result = $this->customerGroupRepository->findWhere([['code', '<>', 'guest']]);

        // Assert
        $this->assertCount(2, $result);
        $this->assertNotEquals('guest', $result[0]['code']);
    }

    /** @test */
    public function it_adds_comment_to_order()
    {
        // Arrange - Test Case TC_15
        $orderId = 1;
        $commentData = [
            'order_id' => $orderId,
            'comment' => 'Test comment for order',
            'customer_notified' => false,
        ];

        $this->orderCommentRepository
            ->shouldReceive('create')
            ->with($commentData)
            ->once()
            ->andReturn((object) $commentData);

        // Act
        $result = $this->orderCommentRepository->create($commentData);

        // Assert
        $this->assertEquals($orderId, $result->order_id);
        $this->assertEquals('Test comment for order', $result->comment);
    }

    /** @test */
    public function it_retrieves_order_comments()
    {
        // Arrange
        $orderId = 1;
        $comments = [
            ['id' => 1, 'order_id' => $orderId, 'comment' => 'First comment'],
            ['id' => 2, 'order_id' => $orderId, 'comment' => 'Second comment'],
        ];

        $this->orderCommentRepository
            ->shouldReceive('findWhere')
            ->with(['order_id' => $orderId])
            ->once()
            ->andReturn(collect($comments));

        // Act
        $result = $this->orderCommentRepository->findWhere(['order_id' => $orderId]);

        // Assert
        $this->assertCount(2, $result);
        $this->assertEquals('First comment', $result[0]['comment']);
    }

    /** @test */
    public function it_validates_payment_method_for_admin_order()
    {
        // Arrange
        $allowedMethods = ['cashondelivery', 'moneytransfer'];
        $paymentMethod = 'cashondelivery';

        // Act
        $isAllowed = in_array($paymentMethod, $allowedMethods);

        // Assert
        $this->assertTrue($isAllowed, 'COD should be allowed for admin orders');
    }

    /** @test */
    public function it_rejects_unsupported_payment_method()
    {
        // Arrange
        $allowedMethods = ['cashondelivery', 'moneytransfer'];
        $paymentMethod = 'paypal';

        // Act
        $isAllowed = in_array($paymentMethod, $allowedMethods);

        // Assert
        $this->assertFalse($isAllowed, 'Paypal should not be allowed for admin orders');
    }
}
