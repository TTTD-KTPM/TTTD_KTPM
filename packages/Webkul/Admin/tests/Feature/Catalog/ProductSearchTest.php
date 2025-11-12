<?php

use Webkul\Faker\Helpers\Category as CategoryFaker;
use Webkul\Faker\Helpers\Product as ProductFaker;

use function Pest\Laravel\getJson;

it('should allow searching products by keyword in admin', function () {
    // Arrange
    $product1 = (new ProductFaker)->getSimpleProductFactory()->create(['name' => 'Samsung Galaxy S21']);
    $product2 = (new ProductFaker)->getSimpleProductFactory()->create(['name' => 'iPhone 13 Pro']);
    $product3 = (new ProductFaker)->getSimpleProductFactory()->create(['name' => 'Samsung TV']);

    // Act and Assert
    $this->loginAsAdmin();

    getJson(route('admin.catalog.products.search', ['query' => 'Samsung']))
        ->assertOk()
        ->assertJsonCount(2, 'data')
        ->assertJsonFragment(['name' => 'Samsung Galaxy S21'])
        ->assertJsonFragment(['name' => 'Samsung TV']);
});

it('should return products filtered by category', function () {
    // Arrange
    $category = (new CategoryFaker)->factory()->create(['name' => 'Electronics']);
    $product1 = (new ProductFaker)->getSimpleProductFactory()->create();
    $product2 = (new ProductFaker)->getSimpleProductFactory()->create();

    // Assign products to category
    $product1->categories()->attach($category->id);

    // Act and Assert
    $this->loginAsAdmin();

    getJson(route('admin.catalog.products.index', [
        'category_id' => $category->id,
    ]), [
        'X-Requested-With' => 'XMLHttpRequest',
    ])
        ->assertOk()
        ->assertJsonPath('records.0.product_id', $product1->id);
});

it('should filter products by price range', function () {
    // Arrange
    $product1 = (new ProductFaker)->getSimpleProductFactory()->create(['price' => 100]);
    $product2 = (new ProductFaker)->getSimpleProductFactory()->create(['price' => 500]);
    $product3 = (new ProductFaker)->getSimpleProductFactory()->create(['price' => 1000]);

    // Act and Assert
    $this->loginAsAdmin();

    getJson(route('admin.catalog.products.index', [
        'price_from' => 200,
        'price_to'   => 800,
    ]), [
        'X-Requested-With' => 'XMLHttpRequest',
    ])
        ->assertOk()
        ->assertJsonFragment(['product_id' => $product2->id]);
});

it('should sort products by price ascending', function () {
    // Arrange
    $product1 = (new ProductFaker)->getSimpleProductFactory()->create(['price' => 500]);
    $product2 = (new ProductFaker)->getSimpleProductFactory()->create(['price' => 100]);
    $product3 = (new ProductFaker)->getSimpleProductFactory()->create(['price' => 300]);

    // Act and Assert
    $this->loginAsAdmin();

    $response = getJson(route('admin.catalog.products.index', [
        'sort'  => 'price',
        'order' => 'asc',
    ]), [
        'X-Requested-With' => 'XMLHttpRequest',
    ])
        ->assertOk()
        ->json();

    // Assert - first product should have lowest price
    expect($response['records'][0]['product_id'])->toBe($product2->id);
});

it('should sort products by price descending', function () {
    // Arrange
    $product1 = (new ProductFaker)->getSimpleProductFactory()->create(['price' => 500]);
    $product2 = (new ProductFaker)->getSimpleProductFactory()->create(['price' => 100]);
    $product3 = (new ProductFaker)->getSimpleProductFactory()->create(['price' => 300]);

    // Act and Assert
    $this->loginAsAdmin();

    $response = getJson(route('admin.catalog.products.index', [
        'sort'  => 'price',
        'order' => 'desc',
    ]), [
        'X-Requested-With' => 'XMLHttpRequest',
    ])
        ->assertOk()
        ->json();

    // Assert - first product should have highest price
    expect($response['records'][0]['product_id'])->toBe($product1->id);
});

it('should sort products by newest first', function () {
    // Arrange
    $product1 = (new ProductFaker)->getSimpleProductFactory()->create([
        'created_at' => now()->subDays(5),
    ]);
    $product2 = (new ProductFaker)->getSimpleProductFactory()->create([
        'created_at' => now()->subDays(1),
    ]);
    $product3 = (new ProductFaker)->getSimpleProductFactory()->create([
        'created_at' => now()->subDays(3),
    ]);

    // Act and Assert
    $this->loginAsAdmin();

    $response = getJson(route('admin.catalog.products.index', [
        'sort'  => 'created_at',
        'order' => 'desc',
    ]), [
        'X-Requested-With' => 'XMLHttpRequest',
    ])
        ->assertOk()
        ->json();

    // Assert - newest product should be first
    expect($response['records'][0]['product_id'])->toBe($product2->id);
});

it('should return relevant search results based on product name and SKU', function () {
    // Arrange
    $product1 = (new ProductFaker)->getSimpleProductFactory()->create([
        'sku'  => 'LAPTOP-001',
        'name' => 'Dell Laptop',
    ]);
    $product2 = (new ProductFaker)->getSimpleProductFactory()->create([
        'sku'  => 'PHONE-001',
        'name' => 'Samsung Phone',
    ]);

    // Act and Assert - Search by name
    $this->loginAsAdmin();

    getJson(route('admin.catalog.products.search', ['query' => 'Laptop']))
        ->assertOk()
        ->assertJsonFragment(['name' => 'Dell Laptop']);

    // Act and Assert - Search by SKU
    getJson(route('admin.catalog.products.search', ['query' => 'PHONE-001']))
        ->assertOk()
        ->assertJsonFragment(['sku' => 'PHONE-001']);
});
