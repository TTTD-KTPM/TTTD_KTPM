<?php

namespace Webkul\Shop\Http\Controllers;

class CartController extends Controller
{
    /**
     * Cart page - DISABLED for Triet-Customer branch.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        abort(403, 'Shopping cart is disabled. This branch only supports viewing order history and wishlist.');
    }
}
