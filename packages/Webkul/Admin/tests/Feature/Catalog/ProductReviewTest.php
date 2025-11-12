<?php

use function Pest\Laravel\get;

it('should show the product reviews list page', function () {
    // Act and Assert
    $this->loginAsAdmin();

    get(route('admin.catalog.products.reviews.index'))
        ->assertOk()
        ->assertSeeText(trans('admin::app.catalog.products.reviews.index.title'));
});
