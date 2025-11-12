<?php

use Webkul\Faker\Helpers\Product as ProductFaker;

use function Pest\Laravel\get;

it('should display product detail page for customers', function () {
    // Arrange
    $product = (new ProductFaker)->getSimpleProductFactory()->create([
        'name'                 => 'Customer Visible Product',
        'status'               => 1,
        'visible_individually' => 1,
    ]);

    // Act and Assert
    get(route('shop.product_or_category.index', $product->url_key))
        ->assertOk()
        ->assertSeeText($product->name);
});
