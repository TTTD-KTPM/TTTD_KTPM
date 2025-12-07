<?php

use Webkul\Checkout\Models\Cart;
use Webkul\Customer\Models\Customer;
use Webkul\Faker\Helpers\Product as ProductFaker;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\postJson;

beforeEach(function () {
    $this->customer = Customer::factory()->create();
    $this->product = (new ProductFaker([
        'attributes' => [
            5 => 'new',
        ],
        'attribute_value' => [
            'new' => [
                'boolean_value' => true,
            ],
        ],
    ]))->getSimpleProductFactory()->create();
});

it('should validate required fields when filling shipping information', function () {
    // Arrange
    actingAs($this->customer, 'customer');

    // Add product to cart
    $cart = Cart::factory()->create([
        'customer_id' => $this->customer->id,
        'customer_email' => $this->customer->email,
    ]);

    // Act & Assert - Test validation errors
    postJson(route('shop.checkout.onepage.addresses.store'), [])
        ->assertJsonValidationErrorFor('billing.first_name')
        ->assertJsonValidationErrorFor('billing.last_name')
        ->assertJsonValidationErrorFor('billing.email')
        ->assertJsonValidationErrorFor('billing.address')
        ->assertJsonValidationErrorFor('billing.city')
        ->assertJsonValidationErrorFor('billing.country')
        ->assertJsonValidationErrorFor('billing.state')
        ->assertJsonValidationErrorFor('billing.postcode')
        ->assertJsonValidationErrorFor('billing.phone')
        ->assertUnprocessable();
});

it('should successfully save shipping information for logged in customer', function () {
    // Arrange
    actingAs($this->customer, 'customer');

    $cart = Cart::factory()->create([
        'customer_id' => $this->customer->id,
        'customer_email' => $this->customer->email,
    ]);

    $shippingData = [
        'billing' => [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => $this->customer->email,
            'address' => '123 Main Street',
            'city' => 'Ho Chi Minh City',
            'country' => 'VN',
            'state' => 'SG',
            'postcode' => '700000',
            'phone' => '0901234567',
        ],
        'shipping' => [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => $this->customer->email,
            'address' => '123 Main Street',
            'city' => 'Ho Chi Minh City',
            'country' => 'VN',
            'state' => 'SG',
            'postcode' => '700000',
            'phone' => '0901234567',
        ],
    ];

    // Act & Assert
    postJson(route('shop.checkout.onepage.addresses.store'), $shippingData)
        ->assertOk()
        ->assertJsonStructure([
            'data' => [
                'rates',
                'payment_methods',
            ],
        ]);

    // Verify cart has addresses
    $cart->refresh();
    expect($cart->billing_address)->not->toBeNull()
        ->and($cart->shipping_address)->not->toBeNull();
});

it('should validate email format when filling shipping information', function () {
    // Arrange
    actingAs($this->customer, 'customer');

    $cart = Cart::factory()->create([
        'customer_id' => $this->customer->id,
        'customer_email' => $this->customer->email,
    ]);

    // Act & Assert
    postJson(route('shop.checkout.onepage.addresses.store'), [
        'billing' => [
            'email' => 'invalid-email',
        ],
    ])
        ->assertJsonValidationErrorFor('billing.email')
        ->assertUnprocessable();
});

it('should validate phone number format when filling shipping information', function () {
    // Arrange
    actingAs($this->customer, 'customer');

    $cart = Cart::factory()->create([
        'customer_id' => $this->customer->id,
        'customer_email' => $this->customer->email,
    ]);

    // Act & Assert
    postJson(route('shop.checkout.onepage.addresses.store'), [
        'billing' => [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => $this->customer->email,
            'address' => '123 Main Street',
            'city' => 'Ho Chi Minh City',
            'country' => 'VN',
            'state' => 'SG',
            'postcode' => '700000',
            'phone' => 'abc123', // Invalid phone
        ],
    ])
        ->assertJsonValidationErrorFor('billing.phone')
        ->assertUnprocessable();
});

it('should allow using billing address as shipping address', function () {
    // Arrange
    actingAs($this->customer, 'customer');

    $cart = Cart::factory()->create([
        'customer_id' => $this->customer->id,
        'customer_email' => $this->customer->email,
    ]);

    $addressData = [
        'billing' => [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => $this->customer->email,
            'address' => '123 Main Street',
            'city' => 'Ho Chi Minh City',
            'country' => 'VN',
            'state' => 'SG',
            'postcode' => '700000',
            'phone' => '0901234567',
            'use_for_shipping' => true,
        ],
    ];

    // Act & Assert
    postJson(route('shop.checkout.onepage.addresses.store'), $addressData)
        ->assertOk();

    $cart->refresh();
    expect($cart->billing_address->first_name)
        ->toBe($cart->shipping_address->first_name)
        ->and($cart->billing_address->address)
        ->toBe($cart->shipping_address->address);
});
