<?php

use Webkul\Product\Models\Product;
use Webkul\Product\Models\ProductInventory;
use Webkul\Inventory\Models\InventorySource;
use Webkul\Faker\Helpers\Product as ProductFaker;

use function Pest\Laravel\postJson;
use function Pest\Laravel\putJson;

it('should allow product manager to update inventory quantity', function () {
    // Arrange: Create product with inventory
    $product = (new ProductFaker([
        'attributes' => [5 => 'new'],
        'attribute_value' => ['new' => ['boolean_value' => true]],
    ]))->getSimpleProductFactory()->create();

    $inventorySource = InventorySource::factory()->create([
        'code' => 'default',
        'name' => 'Default',
    ]);

    $inventory = ProductInventory::factory()->create([
        'product_id'          => $product->id,
        'inventory_source_id' => $inventorySource->id,
        'qty'                 => 10,
    ]);

    // Act: Update inventory quantity
    $this->loginAsAdmin();
    
    $response = putJson(route('admin.catalog.products.update', $product->id), [
        'inventories' => [
            $inventorySource->id => 50,
        ],
    ]);

    // Assert: Inventory should be updated
    $response->assertRedirect();
    
    $inventory->refresh();
    expect($inventory->qty)->toBe(50);
});

it('should validate inventory quantity is not negative', function () {
    // Arrange: Create product with inventory
    $product = (new ProductFaker([
        'attributes' => [5 => 'new'],
        'attribute_value' => ['new' => ['boolean_value' => true]],
    ]))->getSimpleProductFactory()->create();

    $inventorySource = InventorySource::factory()->create();

    // Act: Try to set negative inventory
    $this->loginAsAdmin();
    
    $response = putJson(route('admin.catalog.products.update', $product->id), [
        'inventories' => [
            $inventorySource->id => -10,
        ],
    ]);

    // Assert: Should return validation error
    $response->assertStatus(422);
});
