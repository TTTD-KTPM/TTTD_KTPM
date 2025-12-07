<?php

use Webkul\Checkout\Models\Cart;
use Webkul\Checkout\Models\CartAddress;
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
    
    // Create cart with address
    $this->cart = Cart::factory()->create([
        'customer_id' => $this->customer->id,
        'customer_email' => $this->customer->email,
    ]);
    
    $this->cart->items()->create([
        'product_id' => $this->product->id,
        'sku'        => $this->product->sku,
        'quantity'   => 2,
        'name'       => $this->product->name,
        'price'      => $convertedPrice = core()->convertPrice($this->product->price),
        'base_price' => $this->product->price,
        'total'      => $convertedPrice * 2,
        'base_total' => $this->product->price * 2,
        'weight'     => $this->product->weight ?? 0,
    ]);

    // Create shipping address
    CartAddress::factory()->create([
        'cart_id'      => $this->cart->id,
        'address_type' => CartAddress::ADDRESS_TYPE_SHIPPING,
        'first_name'   => $this->customer->first_name,
        'last_name'    => $this->customer->last_name,
        'email'        => $this->customer->email,
        'country'      => 'US',
        'state'        => 'CA',
        'city'         => 'Los Angeles',
        'postcode'     => '90001',
        'address'      => [fake()->streetAddress()],
        'phone'        => fake()->phoneNumber(),
    ]);
});

it('should return available shipping methods with costs', function () {
    // Arrange
    actingAs($this->customer, 'customer');
    
    // Act - Get shipping methods
    $response = postJson(route('shop.checkout.onepage.shipping_methods.store'));
    
    // Assert
    $response->assertOk()
        ->assertJsonStructure([
            'data' => [
                'methods' => [
                    '*' => [
                        'method',
                        'method_title',
                        'method_description',
                        'base_amount',
                        'formatted_base_amount',
                    ],
                ],
            ],
        ]);
    
    // Verify shipping methods are returned
    $methods = $response->json('data.methods');
    expect($methods)->toBeArray()->not->toBeEmpty();
});

it('should successfully select shipping method and calculate cost', function () {
    // Arrange
    actingAs($this->customer, 'customer');
    
    // First get available methods
    $methodsResponse = postJson(route('shop.checkout.onepage.shipping_methods.store'));
    $methods = $methodsResponse->json('data.methods');
    
    expect($methods)->not->toBeEmpty();
    
    $selectedMethod = $methods[0]['method'];
    
    // Act - Select shipping method
    $response = postJson(route('shop.checkout.onepage.shipping_methods.store'), [
        'shipping_method' => $selectedMethod,
    ]);
    
    // Assert
    $response->assertOk();
    
    // Verify shipping rate is saved
    $this->assertDatabaseHas('cart_shipping_rates', [
        'cart_address_id' => $this->cart->shipping_address->id,
        'method'          => $selectedMethod,
    ]);
    
    // Verify cart has shipping method
    $this->cart->refresh();
    expect($this->cart->selected_shipping_rate)->not->toBeNull();
    expect($this->cart->selected_shipping_rate->method)->toBe($selectedMethod);
});
