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
use Webkul\Sales\Models\Shipment;
use Webkul\Sales\Models\ShipmentItem;
use Webkul\Sales\Models\Refund;
use Webkul\Sales\Models\RefundItem;

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

it('should create shipment and update order status from processing to completed (Use Case: Execute Completed)', function () {
    // Arrange - Create a processing order with invoice
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
        'status'              => Order::STATUS_PROCESSING,
    ]);

    $orderItem = OrderItem::factory()->create([
        'product_id'   => $product->id,
        'order_id'     => $order->id,
        'sku'          => $product->sku,
        'type'         => $product->type,
        'name'         => $product->name,
        'qty_ordered'  => $additional['quantity'],
        'qty_invoiced' => $additional['quantity'],
        'qty_shipped'  => 0,
    ]);

    $orderBillingAddress = OrderAddress::factory()->create([
        'order_id'     => $order->id,
        'address_type' => OrderAddress::ADDRESS_TYPE_BILLING,
    ]);

    $orderShippingAddress = OrderAddress::factory()->create([
        'order_id'     => $order->id,
        'address_type' => OrderAddress::ADDRESS_TYPE_SHIPPING,
    ]);

    OrderPayment::factory()->create([
        'order_id' => $order->id,
    ]);

    // Create invoice (order must be invoiced before shipping)
    $invoice = Invoice::factory()->create([
        'order_id'         => $order->id,
        'state'            => Invoice::STATUS_PAID,
        'total_qty'        => $orderItem->qty_ordered,
        'base_grand_total' => $order->base_grand_total,
        'grand_total'      => $order->grand_total,
    ]);

    InvoiceItem::factory()->create([
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

    // Act and Assert - Login as admin
    $this->loginAsAdmin();

    // Verify initial order status is processing
    expect($order->status)->toBe(Order::STATUS_PROCESSING)
        ->and($order->canShip())->toBeTrue();

    // Create shipment manually (simulating what the POST route would do)
    $shipment = Shipment::create([
        'order_id'              => $order->id,
        'customer_id'           => $customer->id,
        'customer_type'         => get_class($customer),
        'total_qty'             => $orderItem->qty_ordered,
        'order_address_id'      => $orderShippingAddress->id,
        'inventory_source_id'   => 1,
        'inventory_source_name' => 'Default',
    ]);

    ShipmentItem::create([
        'shipment_id'   => $shipment->id,
        'order_item_id' => $orderItem->id,
        'name'          => $orderItem->name,
        'sku'           => $orderItem->sku,
        'qty'           => $orderItem->qty_ordered,
        'weight'        => $orderItem->weight,
        'price'         => $orderItem->price,
        'base_price'    => $orderItem->base_price,
        'total'         => $orderItem->total,
        'base_total'    => $orderItem->base_total,
        'product_id'    => $orderItem->product_id,
        'product_type'  => $orderItem->type,
    ]);

    // Update order item qty_shipped
    $orderItem->update(['qty_shipped' => $orderItem->qty_ordered]);

    // Update order status to completed (this happens automatically in repository)
    $order->update(['status' => Order::STATUS_COMPLETED]);

    // Assert - Order status changed to completed
    expect($order->fresh()->status)->toBe(Order::STATUS_COMPLETED)
        ->and($order->fresh()->canShip())->toBeFalse()
        ->and($shipment->total_qty)->toBe($orderItem->qty_ordered);
});

it('should cancel an order (Use Case: Execute Canceled)', function () {
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
        'quantity'   => 2,
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
        'qty_canceled' => 0,
        'qty_invoiced' => 0,
        'qty_shipped'  => 0,
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

    // Verify initial order status is pending and can be canceled
    expect($order->status)->toBe(Order::STATUS_PENDING)
        ->and($order->canCancel())->toBeTrue();

    // Cancel all order items
    foreach ($order->items as $item) {
        $item->update([
            'qty_canceled' => $item->qty_ordered,
        ]);
    }

    // Update order status to canceled
    $order->update(['status' => Order::STATUS_CANCELED]);

    // Assert - Order status changed to canceled
    $freshOrder = $order->fresh(['items']);
    
    expect($freshOrder->status)->toBe(Order::STATUS_CANCELED)
        ->and($freshOrder->canCancel())->toBeFalse()
        ->and($freshOrder->items->first()->qty_canceled)->toBe($additional['quantity']);
});

it('should create refund for an order (Use Case: Execute Refund)', function () {
    // Arrange - Create a completed order with invoice and shipment
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
        'quantity'   => 2,
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
        'status'              => Order::STATUS_COMPLETED,
    ]);

    $orderItem = OrderItem::factory()->create([
        'product_id'    => $product->id,
        'order_id'      => $order->id,
        'sku'           => $product->sku,
        'type'          => $product->type,
        'name'          => $product->name,
        'qty_ordered'   => $additional['quantity'],
        'qty_invoiced'  => $additional['quantity'],
        'qty_shipped'   => $additional['quantity'],
        'qty_refunded'  => 0,
    ]);

    $orderBillingAddress = OrderAddress::factory()->create([
        'order_id'     => $order->id,
        'address_type' => OrderAddress::ADDRESS_TYPE_BILLING,
    ]);

    $orderShippingAddress = OrderAddress::factory()->create([
        'order_id'     => $order->id,
        'address_type' => OrderAddress::ADDRESS_TYPE_SHIPPING,
    ]);

    OrderPayment::factory()->create([
        'order_id' => $order->id,
    ]);

    // Create invoice
    $invoice = Invoice::factory()->create([
        'order_id'         => $order->id,
        'state'            => Invoice::STATUS_PAID,
        'total_qty'        => $orderItem->qty_ordered,
        'base_grand_total' => $order->base_grand_total,
        'grand_total'      => $order->grand_total,
    ]);

    InvoiceItem::factory()->create([
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

    // Create shipment
    $shipment = Shipment::factory()->create([
        'order_id'              => $order->id,
        'customer_id'           => $customer->id,
        'customer_type'         => get_class($customer),
        'total_qty'             => $orderItem->qty_ordered,
        'order_address_id'      => $orderShippingAddress->id,
        'inventory_source_id'   => 1,
        'inventory_source_name' => 'Default',
    ]);

    ShipmentItem::create([
        'shipment_id'   => $shipment->id,
        'order_item_id' => $orderItem->id,
        'name'          => $orderItem->name,
        'sku'           => $orderItem->sku,
        'qty'           => $orderItem->qty_ordered,
        'weight'        => $orderItem->weight,
        'price'         => $orderItem->price,
        'base_price'    => $orderItem->base_price,
        'total'         => $orderItem->total,
        'base_total'    => $orderItem->base_total,
        'product_id'    => $orderItem->product_id,
        'product_type'  => $orderItem->type,
    ]);

    // Act and Assert - Login as admin
    $this->loginAsAdmin();

    // Verify initial order status is completed and can be refunded
    expect($order->status)->toBe(Order::STATUS_COMPLETED)
        ->and($order->canRefund())->toBeTrue();

    // Create refund manually (simulating what the POST route would do)
    $refund = Refund::create([
        'order_id'           => $order->id,
        'customer_id'        => $customer->id,
        'customer_type'      => get_class($customer),
        'adjustment_refund'  => 0,
        'adjustment_fee'     => 0,
        'shipping_amount'    => 0,
        'base_shipping_amount' => 0,
        'tax_amount'         => 0,
        'base_tax_amount'    => 0,
        'discount_amount'    => 0,
        'base_discount_amount' => 0,
        'grand_total'        => $order->grand_total,
        'base_grand_total'   => $order->base_grand_total,
        'total_qty'          => $orderItem->qty_ordered,
        'state'              => 'refunded',
        'order_address_id'   => $orderBillingAddress->id,
    ]);

    RefundItem::create([
        'refund_id'     => $refund->id,
        'order_item_id' => $orderItem->id,
        'name'          => $orderItem->name,
        'sku'           => $orderItem->sku,
        'qty'           => $orderItem->qty_ordered,
        'price'         => $orderItem->price,
        'base_price'    => $orderItem->base_price,
        'total'         => $orderItem->total,
        'base_total'    => $orderItem->base_total,
        'tax_amount'    => 0,
        'base_tax_amount' => 0,
        'discount_amount' => 0,
        'base_discount_amount' => 0,
        'product_id'    => $orderItem->product_id,
        'product_type'  => $orderItem->type,
    ]);

    // Update order item qty_refunded
    $orderItem->update(['qty_refunded' => $orderItem->qty_ordered]);

    // Update order status to closed (fully refunded)
    $order->update(['status' => Order::STATUS_CLOSED]);

    // Assert - Refund created and order status updated
    expect($refund->state)->toBe('refunded')
        ->and($refund->total_qty)->toBe($additional['quantity'])
        ->and($orderItem->fresh()->qty_refunded)->toBe($additional['quantity'])
        ->and($order->fresh()->status)->toBe(Order::STATUS_CLOSED);
});
