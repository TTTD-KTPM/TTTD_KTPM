<?php

use function Pest\Laravel\get;

it('should returns the index page customers orders', function () {
    // Act and Assert.
    $this->loginAsCustomer();

    get(route('shop.customers.account.orders.index'))
        ->assertOk()
        ->assertSeeText(trans('shop::app.customers.account.orders.title'));
});
