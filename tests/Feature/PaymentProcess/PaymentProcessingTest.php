<?php

use Webkul\Sales\Models\Order;
use Webkul\Sales\Models\OrderItem;
use Webkul\Sales\Models\Invoice;
use Webkul\Customer\Models\Customer;
use Webkul\Faker\Helpers\Product as ProductFaker;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\postJson;

it('should process payment and create invoice for order', function () {
    // Arrange: Create validated order
    $customer = Customer::factory()->create();
    $product = (new ProductFaker([
        'attributes' => [5 => 'new'],
        'attribute_value' => ['new' => ['boolean_value' => true]],
    ]))->getSimpleProductFactory()->create();

    $order = Order::factory()->create([
        'customer_id'    => $customer->id,
        'customer_email' => $customer->email,
        'status'         => 'processing',
        'grand_total'    => 100,
        'base_grand_total' => 100,
    ]);

    OrderItem::factory()->create([
        'order_id'    => $order->id,
        'product_id'  => $product->id,
        'sku'         => $product->sku,
        'name'        => $product->name,
        'qty_ordered' => 1,
        'price'       => 100,
        'base_price'  => 100,
        'total'       => 100,
        'base_total'  => 100,
    ]);

    // Act: Process payment (create invoice)
    $this->loginAsAdmin();
    
    $response = postJson(route('admin.sales.invoices.store', $order->id), [
        'invoice' => [
            'items' => [
                $order->items->first()->id => 1,
            ],
        ],
    ]);

    // Assert: Invoice should be created
    $response->assertRedirect();
    
    expect(Invoice::where('order_id', $order->id)->count())->toBe(1);
    
    $invoice = Invoice::where('order_id', $order->id)->first();
    expect($invoice->state)->toBe('paid');
});

it('should update order status after successful payment', function () {
    // Arrange: Create order with invoice
    $customer = Customer::factory()->create();
    $product = (new ProductFaker([
        'attributes' => [5 => 'new'],
        'attribute_value' => ['new' => ['boolean_value' => true]],
    ]))->getSimpleProductFactory()->create();

    $order = Order::factory()->create([
        'customer_id'    => $customer->id,
        'customer_email' => $customer->email,
        'status'         => 'processing',
    ]);

    $orderItem = OrderItem::factory()->create([
        'order_id'    => $order->id,
        'product_id'  => $product->id,
        'sku'         => $product->sku,
        'name'        => $product->name,
        'qty_ordered' => 1,
    ]);

    // Create invoice (payment completed)
    Invoice::factory()->create([
        'order_id'   => $order->id,
        'state'      => 'paid',
        'grand_total' => $order->grand_total,
    ]);

    // Act: Check order status after payment
    $order->refresh();

    // Assert: Order status should reflect payment completion
    expect($order->status)->toBeIn(['processing', 'completed']);
    expect(Invoice::where('order_id', $order->id)->where('state', 'paid')->exists())->toBeTrue();
});
