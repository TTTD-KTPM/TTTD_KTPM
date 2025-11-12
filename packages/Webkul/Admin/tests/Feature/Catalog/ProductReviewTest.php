<?php

use Webkul\Customer\Models\Customer;
use Webkul\Faker\Helpers\Product as ProductFaker;
use Webkul\Product\Models\ProductReview;

use function Pest\Laravel\deleteJson;
use function Pest\Laravel\get;
use function Pest\Laravel\getJson;
use function Pest\Laravel\postJson;
use function Pest\Laravel\putJson;

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

it('should approve a product review', function () {
    // Arrange
    $product = (new ProductFaker)->getSimpleProductFactory()->create();
    $customer = Customer::factory()->create();

    $review = ProductReview::create([
        'title'       => 'Pending Review',
        'rating'      => 4,
        'comment'     => 'Awaiting approval',
        'status'      => 'pending',
        'product_id'  => $product->id,
        'customer_id' => $customer->id,
        'name'        => $customer->name,
    ]);

    // Act and Assert
    $this->loginAsAdmin();

    putJson(route('admin.catalog.products.reviews.update', $review->id), [
        'status' => 'approved',
    ])
        ->assertOk()
        ->assertJsonPath('message', trans('admin::app.catalog.products.reviews.update-success'));

    $this->assertDatabaseHas('product_reviews', [
        'id'     => $review->id,
        'status' => 'approved',
    ]);
});

it('should disapprove a product review', function () {
    // Arrange
    $product = (new ProductFaker)->getSimpleProductFactory()->create();
    $customer = Customer::factory()->create();

    $review = ProductReview::create([
        'title'       => 'Approved Review',
        'rating'      => 3,
        'comment'     => 'This was approved',
        'status'      => 'approved',
        'product_id'  => $product->id,
        'customer_id' => $customer->id,
        'name'        => $customer->name,
    ]);

    // Act and Assert
    $this->loginAsAdmin();

    putJson(route('admin.catalog.products.reviews.update', $review->id), [
        'status' => 'disapproved',
    ])
        ->assertOk()
        ->assertJsonPath('message', trans('admin::app.catalog.products.reviews.update-success'));

    $this->assertDatabaseHas('product_reviews', [
        'id'     => $review->id,
        'status' => 'disapproved',
    ]);
});

it('should delete a product review', function () {
    // Arrange
    $product = (new ProductFaker)->getSimpleProductFactory()->create();
    $customer = Customer::factory()->create();

    $review = ProductReview::create([
        'title'       => 'Review to Delete',
        'rating'      => 2,
        'comment'     => 'Will be deleted',
        'status'      => 'pending',
        'product_id'  => $product->id,
        'customer_id' => $customer->id,
        'name'        => $customer->name,
    ]);

    // Act and Assert
    $this->loginAsAdmin();

    deleteJson(route('admin.catalog.products.reviews.delete', $review->id))
        ->assertOk()
        ->assertJsonPath('message', trans('admin::app.catalog.products.reviews.delete-success'));

    $this->assertDatabaseMissing('product_reviews', [
        'id' => $review->id,
    ]);
});

it('should mass delete product reviews', function () {
    // Arrange
    $product = (new ProductFaker)->getSimpleProductFactory()->create();
    $customer = Customer::factory()->create();

    $review1 = ProductReview::create([
        'title'       => 'Review 1',
        'rating'      => 5,
        'comment'     => 'First review',
        'status'      => 'approved',
        'product_id'  => $product->id,
        'customer_id' => $customer->id,
        'name'        => $customer->name,
    ]);

    $review2 = ProductReview::create([
        'title'       => 'Review 2',
        'rating'      => 4,
        'comment'     => 'Second review',
        'status'      => 'pending',
        'product_id'  => $product->id,
        'customer_id' => $customer->id,
        'name'        => $customer->name,
    ]);

    // Act and Assert
    $this->loginAsAdmin();

    postJson(route('admin.catalog.products.reviews.mass_delete'), [
        'indices' => [$review1->id, $review2->id],
    ])
        ->assertOk()
        ->assertJsonPath('message', trans('admin::app.catalog.products.reviews.index.datagrid.mass-delete-success'));

    $this->assertDatabaseMissing('product_reviews', ['id' => $review1->id]);
    $this->assertDatabaseMissing('product_reviews', ['id' => $review2->id]);
});

it('should mass update product review status', function () {
    // Arrange
    $product = (new ProductFaker)->getSimpleProductFactory()->create();
    $customer = Customer::factory()->create();

    $review1 = ProductReview::create([
        'title'       => 'Pending Review 1',
        'rating'      => 5,
        'comment'     => 'Awaiting approval',
        'status'      => 'pending',
        'product_id'  => $product->id,
        'customer_id' => $customer->id,
        'name'        => $customer->name,
    ]);

    $review2 = ProductReview::create([
        'title'       => 'Pending Review 2',
        'rating'      => 4,
        'comment'     => 'Also awaiting',
        'status'      => 'pending',
        'product_id'  => $product->id,
        'customer_id' => $customer->id,
        'name'        => $customer->name,
    ]);

    // Act and Assert
    $this->loginAsAdmin();

    postJson(route('admin.catalog.products.reviews.mass_update'), [
        'indices' => [$review1->id, $review2->id],
        'value'   => 'approved',
    ])
        ->assertOk()
        ->assertJsonPath('message', trans('admin::app.catalog.products.reviews.index.datagrid.mass-update-success'));

    $this->assertDatabaseHas('product_reviews', ['id' => $review1->id, 'status' => 'approved']);
    $this->assertDatabaseHas('product_reviews', ['id' => $review2->id, 'status' => 'approved']);
});

it('should validate rating is between 1 and 5', function () {
    // Arrange
    $product = (new ProductFaker)->getSimpleProductFactory()->create();

    // Act and Assert - Invalid rating (below 1)
    $this->loginAsAdmin();

    postJson(route('admin.catalog.products.reviews.store'), [
        'title'      => 'Invalid Rating Review',
        'rating'     => 0,
        'comment'    => 'Rating too low',
        'status'     => 'approved',
        'product_id' => $product->id,
        'name'       => 'Test Customer',
    ])
        ->assertStatus(422)
        ->assertJsonValidationErrorFor('rating');

    // Act and Assert - Invalid rating (above 5)
    postJson(route('admin.catalog.products.reviews.store'), [
        'title'      => 'Invalid Rating Review',
        'rating'     => 6,
        'comment'    => 'Rating too high',
        'status'     => 'approved',
        'product_id' => $product->id,
        'name'       => 'Test Customer',
    ])
        ->assertStatus(422)
        ->assertJsonValidationErrorFor('rating');
});
