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
