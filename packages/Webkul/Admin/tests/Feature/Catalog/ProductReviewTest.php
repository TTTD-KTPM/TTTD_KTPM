<?php

use Webkul\Customer\Models\Customer;
use Webkul\Faker\Helpers\Product as ProductFaker;
use Webkul\Product\Models\ProductReview;

use function Pest\Laravel\get;
use function Pest\Laravel\getJson;

it('should show the product reviews list page', function () {
    // Act and Assert
    $this->loginAsAdmin();

    get(route('admin.catalog.products.reviews.index'))
        ->assertOk()
        ->assertSeeText(trans('admin::app.catalog.products.reviews.index.title'));
});

it('should return listing items of product reviews', function () {
    // Arrange
    $product = (new ProductFaker)->getSimpleProductFactory()->create();
    $customer = Customer::factory()->create();

    $review = ProductReview::create([
        'title'       => 'Great Product',
        'rating'      => 5,
        'comment'     => 'This is an excellent product!',
        'status'      => 'pending',
        'product_id'  => $product->id,
        'customer_id' => $customer->id,
        'name'        => $customer->name,
    ]);

    // Act and Assert
    $this->loginAsAdmin();

    getJson(route('admin.catalog.products.reviews.index'), [
        'X-Requested-With' => 'XMLHttpRequest',
    ])
        ->assertOk()
        ->assertJsonPath('records.0.id', $review->id)
        ->assertJsonPath('records.0.title', 'Great Product');
});
