<?php

namespace Webkul\Shop\Http\Controllers;

class OnepageController extends Controller
{
    /**
     * Display a listing of the resource - DISABLED for Triet-Customer branch.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        abort(403, 'Checkout is disabled. This branch only supports viewing order history and wishlist.');
    }

    /**
     * Success page - DISABLED for Triet-Customer branch.
     *
     * @return \Illuminate\View\View
     */
    public function success()
    {
        abort(403, 'Checkout is disabled. This branch only supports viewing order history and wishlist.');
    }
}

