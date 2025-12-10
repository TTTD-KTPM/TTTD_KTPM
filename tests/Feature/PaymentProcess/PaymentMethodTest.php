<?php

use Webkul\Checkout\Models\Cart;
use Webkul\Checkout\Models\CartItem;
use Webkul\Customer\Models\Customer;
use Webkul\Faker\Helpers\Product as ProductFaker;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\postJson;

it('should list available payment methods for checkout', function () {
    // Arrange: Create customer, product and cart
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
        'customer_id'      => $customer->id,
        'customer_email'   => $customer->email,
        'customer_first_name' => $customer->first_name,
        'customer_last_name'  => $customer->last_name,
    ]);

    CartItem::factory()->create([
        'cart_id'    => $cart->id,
        'product_id' => $product->id,
        'sku'        => $product->sku,
        'quantity'   => 1,
        'name'       => $product->name,
    ]);

    // Act: Get available payment methods
    $response = actingAs($customer, 'customer')
        ->getJson(route('shop.api.checkout.payment_methods.index'));

    // Assert: Should return list of payment methods
    $response->assertOk()
        ->assertJsonStructure([
            'data' => [
                'payment_methods' => [
                    '*' => [
                        'method',
                        'method_title',
                        'description',
                    ]
                ],
            ],
        ]);
});

it('should save selected payment method to cart', function () {
    // Arrange: Create customer, product and cart
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
        'customer_id'      => $customer->id,
        'customer_email'   => $customer->email,
        'customer_first_name' => $customer->first_name,
        'customer_last_name'  => $customer->last_name,
    ]);

    CartItem::factory()->create([
        'cart_id'    => $cart->id,
        'product_id' => $product->id,
        'sku'        => $product->sku,
        'quantity'   => 1,
        'name'       => $product->name,
    ]);

    // Act: Save payment method (Cash On Delivery)
    $response = actingAs($customer, 'customer')
        ->postJson(route('shop.api.checkout.payment_methods.store'), [
            'payment' => [
                'method' => 'cashondelivery',
            ],
        ]);

    // Assert: Should save payment method successfully
    $response->assertOk();

    // Verify payment method is saved in cart
    $cart->refresh();
    expect($cart->payment->method)->toBe('cashondelivery');
});
