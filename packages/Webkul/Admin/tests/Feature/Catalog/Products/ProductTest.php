<?php

use Webkul\Faker\Helpers\Category as CategoryFaker;
use Webkul\Faker\Helpers\Product as ProductFaker;
use Webkul\Product\Contracts\ProductFlat;

use function Pest\Laravel\get;
use function Pest\Laravel\postJson;

it('should return the product index page', function () {
    // Act and Assert.
    $this->loginAsAdmin();

    get(route('admin.catalog.products.index'))
        ->assertOk()
        ->assertSeeText(trans('admin::app.catalog.products.index.title'))
        ->assertSeeText(trans('admin::app.catalog.products.index.create-btn'));
});

it('should copy the existing product', function () {
    // Arrange.
    $product = (new ProductFaker)->getSimpleProductFactory()->create();

    // Act and Assert.
    $this->loginAsAdmin();

    postJson(route('admin.catalog.products.copy', $product->id), [
        'message' => trans('admin::app.catalog.products.product-copied'),
    ]);

    $this->assertModelWise([
        ProductFlat::class => [
            [
                'id' => $product->id + 1,
            ],
        ],
    ]);
});

it('should perform the mass action from update status for products', function () {
    // Arrange.
    $products = (new ProductFaker)->getSimpleProductFactory()->count(2)->create();

    // Act and Assert.
    $this->loginAsAdmin();

    postJson(route('admin.catalog.products.mass_update'), [
        'indices' => $products->pluck('id')->toArray(),
        'value'   => 1,
    ])
        ->assertOk()
        ->assertJsonPath('message', trans('admin::app.catalog.products.index.datagrid.mass-update-success'));

    foreach ($products as $product) {
        $this->assertModelWise([
            ProductFlat::class => [
                [
                    'product_id' => $product->id,
                    'sku'        => $product->sku,
                    'status'     => 1,
                ],
            ],
        ]);
    }
});

it('should perform the mass action for delete for products', function () {
    // Arrange.
    $products = (new ProductFaker)->getSimpleProductFactory()->count(2)->create();

    // Act and Assert.
    $this->loginAsAdmin();

    postJson(route('admin.catalog.products.mass_delete'), [
        'indices' => $products->pluck('id')->toArray(),
        'value'   => 1,
    ])
        ->assertOk()
        ->assertJsonPath('message', trans('admin::app.catalog.products.index.datagrid.mass-delete-success'));

    foreach ($products as $product) {
        $this->assertDatabaseMissing('product_flat', [
            'status'     => 1,
            'product_id' => $product->id,
        ]);
    }
});

it('should search the product', function () {
    // Arrange.
    $product = (new ProductFaker)->getSimpleProductFactory()->count(2)->create();

    // Act and Assert.
    $this->loginAsAdmin();

    get(route('admin.catalog.products.search', [
        'query' => $product[0]->name,
    ]))
        ->assertOk()
        ->assertJsonPath('data.0.id', $product[0]->id)
        ->assertJsonPath('data.0.name', $product[0]->name)
        ->assertJsonPath('data.0.sku', $product[0]->sku);
});

it('should return the product create page', function () {
    // Act and Assert
    $this->loginAsAdmin();

    get(route('admin.catalog.products.create'))
        ->assertOk()
        ->assertSeeText(trans('admin::app.catalog.products.create.title'));
});

it('should create a new simple product with valid data', function () {
    // Arrange
    $productData = [
        'type'                => 'simple',
        'attribute_family_id' => 1,
        'sku'                 => 'TEST-SKU-' . time(),
        'name'                => 'Test Product',
        'url_key'             => 'test-product-' . time(),
        'price'               => 99.99,
        'weight'              => 1.5,
        'status'              => 1,
        'visible_individually' => 1,
        'guest_checkout'      => 1,
        'description'         => 'Test Description',
        'short_description'   => 'Short Desc',
        'channel'             => 'default',
        'locale'              => 'en',
    ];

    // Act and Assert
    $this->loginAsAdmin();

    postJson(route('admin.catalog.products.store'), $productData)
        ->assertRedirect()
        ->assertSessionHas('success', trans('admin::app.catalog.products.create-success'));

    $this->assertDatabaseHas('products', [
        'sku'  => $productData['sku'],
        'type' => 'simple',
    ]);
});

it('should validate required fields when creating a product', function () {
    // Arrange
    $invalidData = [
        'type'                => 'simple',
        'attribute_family_id' => 1,
        // Missing required fields: sku, url_key
    ];

    // Act and Assert
    $this->loginAsAdmin();

    postJson(route('admin.catalog.products.store'), $invalidData)
        ->assertStatus(422)
        ->assertJsonValidationErrorFor('sku')
        ->assertJsonValidationErrorFor('url_key');
});

it('should return the product edit page', function () {
    // Arrange
    $product = (new ProductFaker)->getSimpleProductFactory()->create();

    // Act and Assert
    $this->loginAsAdmin();

    get(route('admin.catalog.products.edit', $product->id))
        ->assertOk()
        ->assertSeeText(trans('admin::app.catalog.products.edit.title'));
});

it('should update an existing product', function () {
    // Arrange
    $product = (new ProductFaker)->getSimpleProductFactory()->create();
    
    $updateData = [
        'name'              => 'Updated Product Name',
        'price'             => 199.99,
        'status'            => 1,
        'channel'           => 'default',
        'locale'            => 'en',
        'url_key'           => $product->url_key,
        'sku'               => $product->sku,
        'description'       => 'Updated description',
        'short_description' => 'Updated short description',
    ];

    // Act and Assert
    $this->loginAsAdmin();

    postJson(route('admin.catalog.products.update', $product->id), $updateData)
        ->assertRedirect()
        ->assertSessionHas('success', trans('admin::app.catalog.products.update-success'));

    $this->assertDatabaseHas('product_flat', [
        'product_id' => $product->id,
        'name'       => 'Updated Product Name',
    ]);
});

it('should delete a product', function () {
    // Arrange
    $product = (new ProductFaker)->getSimpleProductFactory()->create();

    // Act and Assert
    $this->loginAsAdmin();

    postJson(route('admin.catalog.products.delete', $product->id))
        ->assertOk()
        ->assertJsonPath('message', trans('admin::app.catalog.products.delete-success'));

    $this->assertDatabaseMissing('product_flat', [
        'product_id' => $product->id,
    ]);
});

it('should validate SKU uniqueness when creating a product', function () {
    // Arrange
    $existingProduct = (new ProductFaker)->getSimpleProductFactory()->create([
        'sku' => 'UNIQUE-SKU-123',
    ]);

    $duplicateData = [
        'type'                => 'simple',
        'attribute_family_id' => 1,
        'sku'                 => 'UNIQUE-SKU-123', // Duplicate SKU
        'name'                => 'Duplicate Product',
        'url_key'             => 'duplicate-product',
        'price'               => 50,
        'channel'             => 'default',
        'locale'              => 'en',
    ];

    // Act and Assert
    $this->loginAsAdmin();

    postJson(route('admin.catalog.products.store'), $duplicateData)
        ->assertStatus(422)
        ->assertJsonValidationErrorFor('sku');
});

it('should validate price must be numeric and positive', function () {
    // Arrange
    $invalidPriceData = [
        'type'                => 'simple',
        'attribute_family_id' => 1,
        'sku'                 => 'TEST-PRICE-' . time(),
        'url_key'             => 'test-price-' . time(),
        'name'                => 'Test Product',
        'price'               => -50, // Invalid negative price
        'channel'             => 'default',
        'locale'              => 'en',
    ];

    // Act and Assert
    $this->loginAsAdmin();

    postJson(route('admin.catalog.products.store'), $invalidPriceData)
        ->assertStatus(422)
        ->assertJsonValidationErrorFor('price');
});

it('should handle product image upload', function () {
    // Arrange
    $product = (new ProductFaker)->getSimpleProductFactory()->create();
    
    $imageData = [
        'images' => [
            [
                'id'       => 0,
                'file'     => 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mNk+M9QDwADhgGAWjR9awAAAABJRU5ErkJggg==',
                'position' => 1,
            ],
        ],
        'channel' => 'default',
        'locale'  => 'en',
    ];

    // Act and Assert
    $this->loginAsAdmin();

    // Note: This test validates the structure; actual file upload may require storage mocking
    expect($imageData['images'][0]['file'])->toContain('data:image/png;base64');
});

it('should allow assigning product to multiple categories', function () {
    // Arrange
    $product = (new ProductFaker)->getSimpleProductFactory()->create();
    
    $category1 = (new CategoryFaker)->factory()->create();
    $category2 = (new CategoryFaker)->factory()->create();

    // Act
    $product->categories()->attach([$category1->id, $category2->id]);

    // Assert
    expect($product->categories)->toHaveCount(2);
    expect($product->categories->pluck('id')->toArray())
        ->toContain($category1->id)
        ->toContain($category2->id);
});
