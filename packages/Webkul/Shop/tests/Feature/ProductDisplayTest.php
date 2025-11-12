<?php

use Webkul\Faker\Helpers\Category as CategoryFaker;
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

it('should allow customers to browse products by category', function () {
    // Arrange
    $category = (new CategoryFaker)->factory()->create([
        'name'   => 'Electronics',
        'status' => 1,
    ]);

    $product1 = (new ProductFaker)->getSimpleProductFactory()->create([
        'status'               => 1,
        'visible_individually' => 1,
    ]);
    $product2 = (new ProductFaker)->getSimpleProductFactory()->create([
        'status'               => 1,
        'visible_individually' => 1,
    ]);

    $product1->categories()->attach($category->id);
    $product2->categories()->attach($category->id);

    // Act and Assert
    get(route('shop.product_or_category.index', $category->url_path))
        ->assertOk()
        ->assertSeeText($category->name);
});

it('should display products with pagination', function () {
    // Arrange - Create 15 products to test pagination
    $products = [];
    for ($i = 1; $i <= 15; $i++) {
        $products[] = (new ProductFaker)->getSimpleProductFactory()->create([
            'name'                 => "Pagination Test Product {$i}",
            'status'               => 1,
            'visible_individually' => 1,
        ]);
    }

    // Act
    $response = get(route('shop.home.index'));

    // Assert
    $response->assertOk();
    
    // Assuming pagination shows 12 products per page
    // First 12 products should be visible on page 1
    for ($i = 1; $i <= 12; $i++) {
        $response->assertSeeText("Pagination Test Product {$i}");
    }
    
    // Products 13-15 should be on page 2
    $response->assertDontSee("Pagination Test Product 13");
});

it('should handle out of stock products correctly', function () {
    // Arrange
    $product = (new ProductFaker)->getSimpleProductFactory()->create([
        'name'                 => 'Out of Stock Product',
        'status'               => 1,
        'visible_individually' => 1,
    ]);

    // Set inventory to 0
    $product->inventories()->update(['qty' => 0]);

    // Act
    $response = get(route('shop.product_or_category.index', $product->url_key));

    // Assert
    $response->assertOk();
    $response->assertSeeText('Out of Stock Product');
    // Out of stock message should be visible
    expect($response->getContent())->toContain('out-of-stock');
});


