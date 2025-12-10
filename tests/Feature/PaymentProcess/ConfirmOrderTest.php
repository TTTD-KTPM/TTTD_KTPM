<?php

use Webkul\Checkout\Models\Cart;
use Webkul\Checkout\Models\CartAddress;
use Webkul\Checkout\Models\CartItem;
use Webkul\Checkout\Models\CartPayment;
use Webkul\Customer\Models\Customer;
use Webkul\Faker\Helpers\Product as ProductFaker;
use Webkul\Sales\Models\Order;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\postJson;

it('should validate required data before confirming order', function () {
    // Arrange: Create customer without complete cart data
    $customer = Customer::factory()->create();

    // Act: Try to confirm order without cart
    $response = actingAs($customer, 'customer')
        ->postJson(route('shop.checkout.onepage.orders.store'));

    // Assert: Should return validation error
    $response->assertStatus(422);
});

it('should create order successfully when all data is valid', function () {
    // Arrange: Create complete cart with customer, product, address, payment
    $customer = Customer::factory()->create();
    
    $product = (new ProductFaker([
        'attributes' => [
            5 => 'new',
        ],
        'attribute_value' => [
            'new' => [
                'boolean_value' => true,
            ],
        ],
    ]))->getSimpleProductFactory()->create();

    $cart = Cart::factory()->create([
        'customer_id'         => $customer->id,
        'customer_email'      => $customer->email,
        'customer_first_name' => $customer->first_name,
        'customer_last_name'  => $customer->last_name,
        'shipping_method'     => 'flatrate_flatrate',
        'items_count'         => 1,
        'items_qty'           => 1,
    ]);

    CartItem::factory()->create([
        'cart_id'    => $cart->id,
        'product_id' => $product->id,
        'sku'        => $product->sku,
        'quantity'   => 1,
        'name'       => $product->name,
        'price'      => 10,
        'base_price' => 10,
        'total'      => 10,
        'base_total' => 10,
    ]);

    // Create billing and shipping address
    CartAddress::factory()->create([
        'cart_id'      => $cart->id,
        'address_type' => 'billing',
        'first_name'   => $customer->first_name,
        'last_name'    => $customer->last_name,
        'email'        => $customer->email,
    ]);

    CartAddress::factory()->create([
        'cart_id'      => $cart->id,
        'address_type' => 'shipping',
        'first_name'   => $customer->first_name,
        'last_name'    => $customer->last_name,
        'email'        => $customer->email,
    ]);

    // Create payment
    CartPayment::factory()->create([
        'cart_id' => $cart->id,
        'method'  => 'cashondelivery',
    ]);

    // Act: Confirm order
    $response = actingAs($customer, 'customer')
        ->postJson(route('shop.checkout.onepage.orders.store'));

    // Assert: Order should be created successfully
    $response->assertOk()
        ->assertJsonStructure([
            'data' => [
                'order',
                'redirect_url',
            ],
        ]);

    // Verify order exists in database
    expect(Order::where('customer_id', $customer->id)->count())->toBe(1);
    
    $order = Order::where('customer_id', $customer->id)->first();
    expect($order->status)->toBe('pending');
    expect($order->customer_email)->toBe($customer->email);
});
