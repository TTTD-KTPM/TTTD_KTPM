<?php

namespace Webkul\Shop\Http\Controllers\API;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;
use Webkul\Checkout\Facades\Cart;
use Webkul\Customer\Repositories\CustomerRepository;
use Webkul\Payment\Facades\Payment;
use Webkul\Sales\Repositories\OrderRepository;
use Webkul\Sales\Transformers\OrderResource;
use Webkul\Shipping\Facades\Shipping;
use Webkul\Shop\Http\Requests\CartAddressRequest;
use Webkul\Shop\Http\Resources\CartResource;

class OnepageController extends APIController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected OrderRepository $orderRepository,
        protected CustomerRepository $customerRepository
    ) {}

    /**
     * Return cart summary - DISABLED for Triet-Customer branch.
     */
    public function summary(): JsonResource
    {
        return new JsonResource([
            'message' => 'Checkout is disabled. This branch only supports viewing order history and wishlist.',
        ], Response::HTTP_FORBIDDEN);
    }

    /**
     * Store address - DISABLED for Triet-Customer branch.
     */
    public function storeAddress(CartAddressRequest $cartAddressRequest): JsonResource
    {
        return new JsonResource([
            'message' => 'Checkout is disabled. This branch only supports viewing order history and wishlist.',
        ], Response::HTTP_FORBIDDEN);
    }

    /**
     * Store shipping method - DISABLED for Triet-Customer branch.
     */
    public function storeShippingMethod()
    {
        return new JsonResource([
            'message' => 'Checkout is disabled. This branch only supports viewing order history and wishlist.',
        ], Response::HTTP_FORBIDDEN);
    }

    /**
     * Store payment method - DISABLED for Triet-Customer branch.
     */
    public function storePaymentMethod()
    {
        return new JsonResource([
            'message' => 'Checkout is disabled. This branch only supports viewing order history and wishlist.',
        ], Response::HTTP_FORBIDDEN);
    }

    /**
     * Store order - DISABLED for Triet-Customer branch.
     */
    public function storeOrder()
    {
        return new JsonResource([
            'message' => 'Checkout is disabled. This branch only supports viewing order history and wishlist.',
        ], Response::HTTP_FORBIDDEN);
    }
}

