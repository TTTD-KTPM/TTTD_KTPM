<?php

use Webkul\Product\Models\ProductInventory;
use Webkul\Inventory\Models\InventorySource;
use Webkul\Faker\Helpers\Product as ProductFaker;

use function Pest\Laravel\deleteJson;
use function Pest\Laravel\postJson;

it('should allow deleting inventory for a product', function () {
    // Arrange: Create product with inventory
    $product = (new ProductFaker([
        'attributes' => [5 => 'new'],
        'attribute_value' => ['new' => ['boolean_value' => true]],
    ]))->getSimpleProductFactory()->create();

    $inventorySource = InventorySource::factory()->create();
    
    $inventory = ProductInventory::factory()->create([
        'product_id'          => $product->id,
        'inventory_source_id' => $inventorySource->id,
        'qty'                 => 10,
    ]);

    // Act: Delete inventory
    $this->loginAsAdmin();
    
    $response = deleteJson(route('admin.catalog.products.inventories.delete', [
        'product' => $product->id,
        'inventory' => $inventory->id,
    ]));

    // Assert: Inventory should be deleted
    $response->assertOk();
    expect(ProductInventory::find($inventory->id))->toBeNull();
});

it('should allow creating new inventory source', function () {
    // Arrange: Prepare inventory source data
    $sourceData = [
        'code'        => 'warehouse_01',
        'name'        => 'Warehouse 01',
        'description' => 'Main warehouse',
        'latitude'    => '10.8231',
        'longitude'   => '106.6297',
        'country'     => 'VN',
        'state'       => 'HCM',
        'city'        => 'Ho Chi Minh',
        'street'      => '123 Test Street',
        'postcode'    => '70000',
        'priority'    => 1,
        'status'      => 1,
    ];

    // Act: Create new inventory source
    $this->loginAsAdmin();
    
    $response = postJson(route('admin.settings.inventory_sources.store'), $sourceData);

    // Assert: Inventory source should be created
    $response->assertRedirect();
    
    expect(InventorySource::where('code', 'warehouse_01')->exists())->toBeTrue();
    
    $source = InventorySource::where('code', 'warehouse_01')->first();
    expect($source->name)->toBe('Warehouse 01');
    expect($source->status)->toBe(1);
});
