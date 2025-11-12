<?php

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
