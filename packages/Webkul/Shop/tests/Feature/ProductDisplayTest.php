<?php

use Webkul\Faker\Helpers\Product as ProductFaker;
use Webkul\Product\Models\ProductReview;

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

it('should display product information correctly', function () {
    // Arrange
    $product = (new ProductFaker)->getSimpleProductFactory()->create([
        'name'              => 'Test Product Display',
        'price'             => 199.99,
        'description'       => 'Detailed product description',
        'short_description' => 'Short description here',
        'status'            => 1,
        'visible_individually' => 1,
    ]);

    // Act and Assert
    get(route('shop.product_or_category.index', $product->url_key))
        ->assertOk()
        ->assertSeeText('Test Product Display')
        ->assertSeeText('199.99')
        ->assertSeeText('Detailed product description');
});

it('should display product image gallery', function () {
    // Arrange
    $product = (new ProductFaker)->getSimpleProductFactory()->create([
        'status'               => 1,
        'visible_individually' => 1,
    ]);

    // Act and Assert
    $response = get(route('shop.product_or_category.index', $product->url_key))
        ->assertOk();

    // Check if image container exists (structure may vary)
    expect($response->getContent())->toContain('product-image');
});

it('should display product reviews on detail page', function () {
    // Arrange
    $product = (new ProductFaker)->getSimpleProductFactory()->create([
        'status'               => 1,
        'visible_individually' => 1,
    ]);

    // Create approved review
    ProductReview::factory()->create([
        'product_id' => $product->id,
        'status'     => 'approved',
        'rating'     => 5,
        'title'      => 'Excellent Product',
        'comment'    => 'This product is amazing!',
    ]);

    // Act and Assert
    get(route('shop.product_or_category.index', $product->url_key))
        ->assertOk()
        ->assertSeeText('Excellent Product')
        ->assertSeeText('This product is amazing!');
});
