<?php

namespace Webkul\Shop\Http\Controllers\API;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;
use Webkul\CartRule\Repositories\CartRuleCouponRepository;
use Webkul\Checkout\Facades\Cart;
use Webkul\Checkout\Models\CartAddress;
use Webkul\Product\Repositories\ProductRepository;
use Webkul\Shipping\Facades\Shipping;
use Webkul\Shop\Http\Resources\CartResource;
use Webkul\Shop\Http\Resources\ProductResource;

class CartController extends APIController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected ProductRepository $productRepository,
        protected CartRuleCouponRepository $cartRuleCouponRepository
    ) {}

    /**
     * Cart.
     */
    public function index(): JsonResource
    {
        Cart::collectTotals();

        $response = [
            'data' => ($cart = Cart::getCart()) ? new CartResource($cart) : null,
        ];

        if (session()->has('info')) {
            $response['message'] = session()->get('info');
        }

        return new JsonResource($response);
    }

    /**
     * Store items in cart - DISABLED for Triet-Customer branch.
     */
    public function store()
    {
        return new JsonResource([
            'message' => 'Shopping cart is disabled. This branch only supports viewing order history and wishlist.',
        ], Response::HTTP_FORBIDDEN);
    }

    /**
     * Update cart - DISABLED for Triet-Customer branch.
     */
    public function update(): JsonResource
    {
        return new JsonResource([
            'message' => 'Shopping cart is disabled. This branch only supports viewing order history and wishlist.',
        ], Response::HTTP_FORBIDDEN);
    }

    /**
     * Removes the item from the cart - DISABLED for Triet-Customer branch.
     */
    public function destroy(): JsonResource
    {
        return new JsonResource([
            'message' => 'Shopping cart is disabled. This branch only supports viewing order history and wishlist.',
        ], Response::HTTP_FORBIDDEN);
    }

    /**
     * Method for remove selected items from cart - DISABLED for Triet-Customer branch.
     */
    public function destroySelected(): JsonResource
    {
        return new JsonResource([
            'message' => 'Shopping cart is disabled. This branch only supports viewing order history and wishlist.',
        ], Response::HTTP_FORBIDDEN);
    }

    /**
     * Method for move to wishlist selected items from cart - DISABLED for Triet-Customer branch.
     */
    public function moveToWishlist(): JsonResource
    {
        return new JsonResource([
            'message' => 'Shopping cart is disabled. This branch only supports viewing order history and wishlist.',
        ], Response::HTTP_FORBIDDEN);
    }

    /**
     * Estimate Shipping and Tax amount - DISABLED for Triet-Customer branch.
     */
    public function estimateShippingMethods(): JsonResource
    {
        return new JsonResource([
            'message' => 'Shopping cart is disabled. This branch only supports viewing order history and wishlist.',
        ], Response::HTTP_FORBIDDEN);
    }

    /**
     * Apply coupon to the cart - DISABLED for Triet-Customer branch.
     */
    public function storeCoupon()
    {
        return (new JsonResource([
            'message'  => 'Shopping cart is disabled. This branch only supports viewing order history and wishlist.',
        ]))->response()->setStatusCode(Response::HTTP_FORBIDDEN);
    }

    /**
     * Remove coupon from the cart - DISABLED for Triet-Customer branch.
     */
    public function destroyCoupon()
    {
        return new JsonResource([
            'message' => 'Shopping cart is disabled. This branch only supports viewing order history and wishlist.',
        ], Response::HTTP_FORBIDDEN);
    }

    /**
     * Get cross sell products - DISABLED for Triet-Customer branch.
     */
    public function crossSellProducts(): JsonResource
    {
        return new JsonResource([
            'data' => [],
        ]);
    }
}

