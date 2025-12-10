<?php

use Webkul\Product\Models\Product;
use Webkul\Product\Models\ProductInventory;
use Webkul\Checkout\Models\Cart;
use Webkul\Checkout\Models\CartItem;
use Webkul\Customer\Models\Customer;
use Webkul\Inventory\Models\InventorySource;
use Webkul\Faker\Helpers\Product as ProductFaker;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\postJson;
use function Pest\Laravel\putJson;

it('should enforce minimum cart quantity when adding to cart', function () {
    // Arrange: Create product with min quantity = 5
    $product = (new ProductFaker([
        'attributes' => [5 => 'new'],
        'attribute_value' => ['new' => ['boolean_value' => true]],
    ]))->getSimpleProductFactory()->create();

    // Update product with min quantity
    $product->update(['min_qty' => 5]);

    $customer = Customer::factory()->create();

    // Act: Try to add less than minimum quantity
    $response = actingAs($customer, 'customer')
        ->postJson(route('shop.api.checkout.cart.store'), [
            'product_id' => $product->id,
            'quantity'   => 2, // Less than min
        ]);

    // Assert: Should return validation error
    $response->assertStatus(422)
        ->assertJsonValidationErrors(['quantity']);
});

it('should enforce maximum cart quantity when adding to cart', function () {
    // Arrange: Create product with max quantity = 10
    $product = (new ProductFaker([
        'attributes' => [5 => 'new'],
        'attribute_value' => ['new' => ['boolean_value' => true]],
    ]))->getSimpleProductFactory()->create();

    $product->update(['max_qty' => 10]);

    $customer = Customer::factory()->create();

    // Act: Try to add more than maximum quantity
    $response = actingAs($customer, 'customer')
        ->postJson(route('shop.api.checkout.cart.store'), [
            'product_id' => $product->id,
            'quantity'   => 15, // More than max
        ]);

    // Assert: Should return validation error
    $response->assertStatus(422)
        ->assertJsonValidationErrors(['quantity']);
});

it('should allow backorder when inventory is zero and backorder is enabled', function () {
    // Arrange: Create product with backorder enabled
    $product = (new ProductFaker([
        'attributes' => [5 => 'new'],
        'attribute_value' => ['new' => ['boolean_value' => true]],
    ]))->getSimpleProductFactory()->create();

    $inventorySource = InventorySource::factory()->create();
    
    ProductInventory::factory()->create([
        'product_id'          => $product->id,
        'inventory_source_id' => $inventorySource->id,
        'qty'                 => 0, // Out of stock
    ]);

    // Enable backorder in admin
    $this->loginAsAdmin();
    
    putJson(route('admin.catalog.products.update', $product->id), [
        'inventories' => [
            $inventorySource->id => [
                'qty' => 0,
                'backorder' => true,
            ],
        ],
    ]);

    // Act: Customer tries to order out-of-stock product
    $customer = Customer::factory()->create();
    
    $response = actingAs($customer, 'customer')
        ->postJson(route('shop.api.checkout.cart.store'), [
            'product_id' => $product->id,
            'quantity'   => 1,
        ]);

    // Assert: Should allow adding to cart (backorder)
    $response->assertOk();
});

it('should prevent ordering when out of stock and backorder is disabled', function () {
    // Arrange: Create product with backorder disabled
    $product = (new ProductFaker([
        'attributes' => [5 => 'new'],
        'attribute_value' => ['new' => ['boolean_value' => true]],
    ]))->getSimpleProductFactory()->create();

    $inventorySource = InventorySource::factory()->create();
    
    ProductInventory::factory()->create([
        'product_id'          => $product->id,
        'inventory_source_id' => $inventorySource->id,
        'qty'                 => 0, // Out of stock
    ]);

    $customer = Customer::factory()->create();

    // Act: Try to add out-of-stock product to cart
    $response = actingAs($customer, 'customer')
        ->postJson(route('shop.api.checkout.cart.store'), [
            'product_id' => $product->id,
            'quantity'   => 1,
        ]);

    // Assert: Should return error
    $response->assertStatus(422);
});
