<?php

use Webkul\Faker\Helpers\Product as ProductFaker;
use Webkul\Inventory\Models\InventorySource;
use Webkul\Product\Models\Product;
use Webkul\Product\Models\ProductInventory;

use function Pest\Laravel\deleteJson;
use function Pest\Laravel\get;
use function Pest\Laravel\getJson;
use function Pest\Laravel\postJson;
use function Pest\Laravel\putJson;

it('should show the inventory management page', function () {
    // Arrange
    $product = (new ProductFaker)->getSimpleProductFactory()->create();

    // Act and Assert
    $this->loginAsAdmin();

    get(route('admin.catalog.products.edit', $product->id))
        ->assertOk()
        ->assertSeeText(trans('admin::app.catalog.products.edit.title'));
});

it('should allow admin to view product inventory', function () {
    // Arrange
    $product = (new ProductFaker)->getSimpleProductFactory()->create();
    $inventorySource = InventorySource::factory()->create();

    ProductInventory::create([
        'qty'                 => 100,
        'product_id'          => $product->id,
        'inventory_source_id' => $inventorySource->id,
        'vendor_id'           => 0,
    ]);

    // Act and Assert
    $this->loginAsAdmin();

    get(route('admin.catalog.products.edit', $product->id))
        ->assertOk()
        ->assertSee($inventorySource->name);
});

it('should allow admin to update product inventory quantity', function () {
    // Arrange
    $product = (new ProductFaker)->getSimpleProductFactory()->create();
    $inventorySource = InventorySource::factory()->create();

    $inventory = ProductInventory::create([
        'qty'                 => 100,
        'product_id'          => $product->id,
        'inventory_source_id' => $inventorySource->id,
        'vendor_id'           => 0,
    ]);

    // Act and Assert
    $this->loginAsAdmin();

    putJson(route('admin.catalog.products.update', $product->id), [
        'sku'         => $product->sku,
        'name'        => $product->name,
        'url_key'     => $product->url_key,
        'inventories' => [
            $inventorySource->id => 250,
        ],
    ])
        ->assertRedirect(route('admin.catalog.products.index'));

    $this->assertDatabaseHas('product_inventories', [
        'product_id'          => $product->id,
        'inventory_source_id' => $inventorySource->id,
        'qty'                 => 250,
    ]);
});

it('should not allow negative inventory quantity', function () {
    // Arrange
    $product = (new ProductFaker)->getSimpleProductFactory()->create();
    $inventorySource = InventorySource::factory()->create();

    // Act and Assert
    $this->loginAsAdmin();

    putJson(route('admin.catalog.products.update', $product->id), [
        'sku'         => $product->sku,
        'name'        => $product->name,
        'url_key'     => $product->url_key,
        'inventories' => [
            $inventorySource->id => -10,
        ],
    ])
        ->assertJsonValidationErrorFor('inventories.'.$inventorySource->id)
        ->assertUnprocessable();
});

it('should track inventory across multiple sources', function () {
    // Arrange
    $product = (new ProductFaker)->getSimpleProductFactory()->create();
    $source1 = InventorySource::factory()->create(['name' => 'Warehouse A']);
    $source2 = InventorySource::factory()->create(['name' => 'Warehouse B']);

    // Act
    $this->loginAsAdmin();

    putJson(route('admin.catalog.products.update', $product->id), [
        'sku'         => $product->sku,
        'name'        => $product->name,
        'url_key'     => $product->url_key,
        'inventories' => [
            $source1->id => 100,
            $source2->id => 50,
        ],
    ])
        ->assertRedirect(route('admin.catalog.products.index'));

    // Assert
    $this->assertDatabaseHas('product_inventories', [
        'product_id'          => $product->id,
        'inventory_source_id' => $source1->id,
        'qty'                 => 100,
    ]);

    $this->assertDatabaseHas('product_inventories', [
        'product_id'          => $product->id,
        'inventory_source_id' => $source2->id,
        'qty'                 => 50,
    ]);
});

it('should update product status to out of stock when inventory is zero', function () {
    // Arrange
    $product = (new ProductFaker)->getSimpleProductFactory()->create([
        'status' => 1,
    ]);
    $inventorySource = InventorySource::factory()->create();

    // Act
    $this->loginAsAdmin();

    putJson(route('admin.catalog.products.update', $product->id), [
        'sku'         => $product->sku,
        'name'        => $product->name,
        'url_key'     => $product->url_key,
        'inventories' => [
            $inventorySource->id => 0,
        ],
    ])
        ->assertRedirect(route('admin.catalog.products.index'));

    // Assert - inventory updated
    $this->assertDatabaseHas('product_inventories', [
        'product_id'          => $product->id,
        'inventory_source_id' => $inventorySource->id,
        'qty'                 => 0,
    ]);
});

it('should calculate total inventory across all sources', function () {
    // Arrange
    $product = (new ProductFaker)->getSimpleProductFactory()->create();
    $source1 = InventorySource::factory()->create();
    $source2 = InventorySource::factory()->create();
    $source3 = InventorySource::factory()->create();

    ProductInventory::create([
        'qty'                 => 100,
        'product_id'          => $product->id,
        'inventory_source_id' => $source1->id,
        'vendor_id'           => 0,
    ]);

    ProductInventory::create([
        'qty'                 => 50,
        'product_id'          => $product->id,
        'inventory_source_id' => $source2->id,
        'vendor_id'           => 0,
    ]);

    ProductInventory::create([
        'qty'                 => 75,
        'product_id'          => $product->id,
        'inventory_source_id' => $source3->id,
        'vendor_id'           => 0,
    ]);

    // Act
    $totalQty = ProductInventory::where('product_id', $product->id)->sum('qty');

    // Assert
    expect($totalQty)->toBe(225);
});
