<?php

use Webkul\Sales\Models\Order;
use Webkul\Sales\Models\OrderItem;
use Webkul\Customer\Models\Customer;
use Webkul\Faker\Helpers\Product as ProductFaker;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\postJson;
use function Pest\Laravel\putJson;

it('should allow sales manager to validate pending orders', function () {
    // Arrange: Create admin user (sales manager)
    $admin = createAdmin();
    
    // Create customer and order
    $customer = Customer::factory()->create();
    $product = (new ProductFaker([
        'attributes' => [5 => 'new'],
        'attribute_value' => ['new' => ['boolean_value' => true]],
    ]))->getSimpleProductFactory()->create();

    $order = Order::factory()->create([
        'customer_id'    => $customer->id,
        'customer_email' => $customer->email,
        'status'         => 'pending',
    ]);

    OrderItem::factory()->create([
        'order_id'   => $order->id,
        'product_id' => $product->id,
        'sku'        => $product->sku,
        'name'       => $product->name,
        'qty_ordered' => 1,
    ]);

    // Act: Sales manager validates the order
    $this->loginAsAdmin();
    
    $response = putJson(route('admin.sales.orders.update', $order->id), [
        'status' => 'processing',
    ]);

    // Assert: Order status should be updated
    $response->assertRedirect();
    
    $order->refresh();
    expect($order->status)->toBe('processing');
});

it('should reject invalid orders with proper validation', function () {
    // Arrange: Create admin and order with issues
    $admin = createAdmin();
    
    $customer = Customer::factory()->create();
    $order = Order::factory()->create([
        'customer_id'    => $customer->id,
        'customer_email' => $customer->email,
        'status'         => 'pending',
    ]);

    // Act: Try to update with invalid status
    $this->loginAsAdmin();
    
    $response = putJson(route('admin.sales.orders.update', $order->id), [
        'status' => 'invalid_status',
    ]);

    // Assert: Should return validation error
    $response->assertStatus(422);
});
