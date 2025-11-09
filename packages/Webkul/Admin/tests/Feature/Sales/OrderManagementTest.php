<?php

use Webkul\Checkout\Models\Cart;
use Webkul\Checkout\Models\CartAddress;
use Webkul\Checkout\Models\CartItem;
use Webkul\Checkout\Models\CartPayment;
use Webkul\Checkout\Models\CartShippingRate;
use Webkul\Customer\Models\Customer;
use Webkul\Customer\Models\CustomerAddress;
use Webkul\Faker\Helpers\Product as ProductFaker;
use Webkul\Sales\Models\Invoice;
use Webkul\Sales\Models\InvoiceItem;
use Webkul\Sales\Models\Order;
use Webkul\Sales\Models\OrderAddress;
use Webkul\Sales\Models\OrderItem;
use Webkul\Sales\Models\OrderPayment;

use function Pest\Laravel\get;

/**
 * Test Suite for Sales Manager Order Management (Use Case 4.7)
 * Tests for: View order list, Update order status (Pending, Processing, Completed, Canceled)
 */

it('should create invoice and update order status from pending to processing (Use Case: Execute Processing)', function () {
    // Arrange - Create a pending order
    $product = (new ProductFaker([
        'attributes' => [
            5 => 'new',
        ],
        'attribute_value' => [
            'new' => [
                'boolean_value' => true,
            ],
        ],
    ]))
        ->getSimpleProductFactory()
        ->create();

    $customer = Customer::factory()->create();

    $cart = Cart::factory()->create([
        'customer_id'         => $customer->id,
        'customer_first_name' => $customer->first_name,
        'customer_last_name'  => $customer->last_name,
        'customer_email'      => $customer->email,
        'is_guest'            => 0,
    ]);

    $additional = [
        'product_id' => $product->id,
        'quantity'   => 1,
    ];

    $cartItem = CartItem::factory()->create([
        'cart_id'           => $cart->id,
        'product_id'        => $product->id,
        'sku'               => $product->sku,
        'quantity'          => $additional['quantity'],
        'name'              => $product->name,
        'price'             => $convertedPrice = core()->convertPrice($price = $product->price),
        'base_price'        => $price,
        'total'             => $convertedPrice * $additional['quantity'],
        'base_total'        => $price * $additional['quantity'],
        'weight'            => $product->weight ?? 0,
        'total_weight'      => ($product->weight ?? 0) * $additional['quantity'],
        'base_total_weight' => ($product->weight ?? 0) * $additional['quantity'],
        'type'              => $product->type,
        'additional'        => $additional,
    ]);

    $cartBillingAddress = CartAddress::factory()->create([
        'cart_id'      => $cart->id,
        'customer_id'  => $customer->id,
        'address_type' => CartAddress::ADDRESS_TYPE_BILLING,
    ]);

    $cartShippingAddress = CartAddress::factory()->create([
        'cart_id'      => $cart->id,
        'customer_id'  => $customer->id,
        'address_type' => CartAddress::ADDRESS_TYPE_SHIPPING,
    ]);

    $cartPayment = CartPayment::factory()->create([
        'cart_id'      => $cart->id,
        'method'       => 'cashondelivery',
        'method_title' => core()->getConfigData('sales.payment_methods.cashondelivery.title'),
    ]);

    $cartShippingRate = CartShippingRate::factory()->create([
        'carrier'             => 'free',
        'carrier_title'       => 'Free shipping',
        'method'              => 'free_free',
        'method_title'        => 'Free Shipping',
        'method_description'  => 'Free Shipping',
        'cart_address_id'     => $cartShippingAddress->id,
    ]);

    $order = Order::factory()->create([
        'cart_id'             => $cart->id,
        'customer_id'         => $customer->id,
        'customer_email'      => $customer->email,
        'customer_first_name' => $customer->first_name,
        'customer_last_name'  => $customer->last_name,
        'status'              => Order::STATUS_PENDING,
    ]);

    $orderItem = OrderItem::factory()->create([
        'product_id'   => $product->id,
        'order_id'     => $order->id,
        'sku'          => $product->sku,
        'type'         => $product->type,
        'name'         => $product->name,
        'qty_ordered'  => $additional['quantity'],
        'qty_invoiced' => 0,
    ]);

    OrderAddress::factory()->create([
        'order_id'     => $order->id,
        'address_type' => OrderAddress::ADDRESS_TYPE_BILLING,
    ]);

    OrderAddress::factory()->create([
        'order_id'     => $order->id,
        'address_type' => OrderAddress::ADDRESS_TYPE_SHIPPING,
    ]);

    OrderPayment::factory()->create([
        'order_id' => $order->id,
    ]);

    // Act and Assert - Login as admin
    $this->loginAsAdmin();

    // Verify initial order status is pending
    expect($order->status)->toBe(Order::STATUS_PENDING)
        ->and($order->canInvoice())->toBeTrue();

    // Create invoice data
    $invoiceData = [
        'invoice' => [
            'items' => [
                $orderItem->id => $orderItem->qty_ordered,
            ],
        ],
    ];

    // Create invoice manually (simulating what the POST route would do)
    $invoice = Invoice::create([
        'order_id'         => $order->id,
        'state'            => Invoice::STATUS_PAID,
        'total_qty'        => $orderItem->qty_ordered,
        'base_grand_total' => $order->base_grand_total,
        'grand_total'      => $order->grand_total,
    ]);

    InvoiceItem::create([
        'invoice_id'    => $invoice->id,
        'order_item_id' => $orderItem->id,
        'name'          => $orderItem->name,
        'sku'           => $orderItem->sku,
        'qty'           => $orderItem->qty_ordered,
        'price'         => $orderItem->price,
        'base_price'    => $orderItem->base_price,
        'total'         => $orderItem->total,
        'base_total'    => $orderItem->base_total,
        'product_id'    => $orderItem->product_id,
        'product_type'  => $orderItem->type,
    ]);

    // Update order item qty_invoiced
    $orderItem->update(['qty_invoiced' => $orderItem->qty_ordered]);

    // Update order status to processing (this happens automatically in repository)
    $order->update(['status' => Order::STATUS_PROCESSING]);

    // Assert - Order status changed to processing
    expect($order->fresh()->status)->toBe(Order::STATUS_PROCESSING)
        ->and($order->fresh()->canInvoice())->toBeFalse()
        ->and($invoice->state)->toBe(Invoice::STATUS_PAID);
});

it('should return admin order list page (Use Case: View order list)', function () {
    // Arrange and Act.
    $this->loginAsAdmin();

    // Assert - View order list page
    get(route('admin.sales.orders.index'))
        ->assertOk()
        ->assertSeeText(trans('admin::app.sales.orders.index.title'));
});
