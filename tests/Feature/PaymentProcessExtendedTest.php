<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Webkul\Customer\Models\Customer;
use Webkul\Product\Models\Product;
use Webkul\Checkout\Facades\Cart;
use Webkul\CartRule\Models\CartRule;
use Webkul\Sales\Models\Order;

/**
 * Payment Process Extended Test Cases (PAYMENT_TC_01 - PAYMENT_TC_30)
 * Test mở rộng cho quy trình thanh toán
 * 
 * Dựa trên file: docs/Inventory_Payment(Sheet1).csv
 */
class PaymentProcessExtendedTest extends TestCase
{
    use RefreshDatabase;

    protected $customer;
    protected $product1, $product2, $product3;

    protected function setUp(): void
    {
        parent::setUp();
        
        // Tạo sản phẩm test
        $this->product1 = Product::factory()->create(['sku' => 'PROD-001', 'price' => 100, 'quantity' => 50]);
        $this->product2 = Product::factory()->create(['sku' => 'PROD-002', 'price' => 200, 'quantity' => 30]);
        $this->product3 = Product::factory()->create(['sku' => 'PROD-003', 'price' => 300, 'quantity' => 0]);

        // Tạo khách hàng test
        $this->customer = Customer::factory()->create([
            'email' => 'extended@test.com',
            'password' => bcrypt('password123'),
        ]);
    }

    /**
     * PAYMENT_TC_01: Checkout - Kiểm tra validation
     * 
     * Các bước:
     * 1. Truy cập trang chủ
     * 2. Thêm sản phẩm vào giỏ
     * 3. Checkout
     * 4. Bỏ trống tất cả các trường
     * 5. Nhấn Proceed
     * 
     * Kết quả mong đợi: Hiển thị lỗi validation cho từng trường bắt buộc. Form không submit
     */
    public function test_checkout_validation_payment_tc01()
    {
        Cart::add($this->product1->id, 1);
        
        $response = $this->post(route('shop.checkout.onepage.addresses.store'), [
            'billing' => []
        ]);
        
        $response->assertSessionHasErrors();
    }

    /**
     * PAYMENT_TC_02: Checkout - Email không hợp lệ
     * 
     * Các bước:
     * 1. Tại trang Checkout
     * 2. Điền thông tin hợp lệ
     * 3. Nhập email sai định dạng
     * 4. Nhấn Proceed
     * 
     * Kết quả mong đợi: Hiển thị lỗi email validation
     */
    public function test_checkout_invalid_email_payment_tc02()
    {
        Cart::add($this->product1->id, 1);
        
        $response = $this->post(route('shop.checkout.onepage.addresses.store'), [
            'billing' => [
                'email' => 'invalidemail',
                'first_name' => 'Test',
                'last_name' => 'User',
            ]
        ]);
        
        $response->assertSessionHasErrors('billing.email');
    }

    /**
     * PAYMENT_TC_03: Checkout - Số điện thoại không hợp lệ
     * 
     * Các bước:
     * 1-4. Nhập SĐT chứa chữ cái
     * 
     * Kết quả mong đợi: Hiển thị lỗi validation cho số điện thoại
     */
    public function test_checkout_invalid_phone_payment_tc03()
    {
        Cart::add($this->product1->id, 1);
        
        $response = $this->post(route('shop.checkout.onepage.addresses.store'), [
            'billing' => [
                'phone' => 'abc123',
                'email' => 'test@test.com',
            ]
        ]);
        
        $response->assertSessionHasErrors('billing.phone');
    }

    /**
     * PAYMENT_TC_06-09: Giỏ hàng operations
     */
    public function test_add_product_to_cart_payment_tc06()
    {
        $response = $this->post(route('shop.checkout.cart.add', $this->product1->id), [
            'product_id' => $this->product1->id,
            'quantity' => 1,
        ]);
        
        $response->assertSessionHas('success');
        $this->assertNotNull(Cart::getCart());
    }

    public function test_add_multiple_products_payment_tc07()
    {
        Cart::add($this->product1->id, 1);
        Cart::add($this->product2->id, 2);
        Cart::add($this->product3->id, 1);
        
        $cart = Cart::getCart();
        $this->assertGreaterThanOrEqual(3, $cart->items->count());
    }

    public function test_update_cart_quantity_payment_tc08()
    {
        Cart::add($this->product1->id, 1);
        $cartItem = Cart::getCart()->items->first();
        
        $response = $this->put(route('shop.checkout.cart.update'), [
            'qty' => [
                $cartItem->id => 5
            ]
        ]);
        
        $response->assertRedirect();
    }

    public function test_remove_from_cart_payment_tc09()
    {
        Cart::add($this->product1->id, 1);
        Cart::add($this->product2->id, 1);
        
        $cartItem = Cart::getCart()->items->first();
        
        $response = $this->delete(route('shop.checkout.cart.remove', $cartItem->id));
        
        $response->assertRedirect();
    }

    /**
     * PAYMENT_TC_10: Giỏ hàng - Sản phẩm hết hàng
     */
    public function test_out_of_stock_product_payment_tc10()
    {
        $response = $this->post(route('shop.checkout.cart.add', $this->product3->id), [
            'product_id' => $this->product3->id,
            'quantity' => 1,
        ]);
        
        $response->assertSessionHas('error');
    }

    /**
     * PAYMENT_TC_11-12: Phương thức vận chuyển
     */
    public function test_flat_rate_shipping_payment_tc11()
    {
        Cart::add($this->product1->id, 1);
        
        $this->post(route('shop.checkout.onepage.addresses.store'), [
            'billing' => $this->getValidAddress(),
        ]);
        
        $response = $this->post(route('shop.checkout.onepage.shipping_methods.store'), [
            'shipping_method' => 'flatrate_flatrate',
        ]);
        
        $response->assertSessionDoesntHaveErrors();
    }

    /**
     * PAYMENT_TC_13-14: Phương thức thanh toán
     */
    public function test_cod_payment_method_payment_tc13()
    {
        $this->prepareCheckout();
        
        $response = $this->post(route('shop.checkout.onepage.payment_methods.store'), [
            'payment' => ['method' => 'cashondelivery'],
        ]);
        
        $response->assertSessionDoesntHaveErrors();
    }

    /**
     * PAYMENT_TC_15-16: Xác nhận đơn hàng
     */
    public function test_order_confirmation_page_payment_tc15()
    {
        $this->prepareCheckout();
        
        $response = $this->post(route('shop.checkout.onepage.orders.store'));
        
        $response->assertRedirect();
        $this->assertDatabaseHas('orders', [
            'customer_email' => $this->customer->email ?? 'test@test.com',
        ]);
    }

    /**
     * PAYMENT_TC_17-18: Lịch sử đơn hàng
     */
    public function test_customer_order_history_payment_tc17()
    {
        $this->actingAs($this->customer, 'customer');
        
        $response = $this->get(route('shop.customers.account.orders.index'));
        
        $response->assertStatus(200);
    }

    /**
     * PAYMENT_TC_19-22: Coupon operations
     */
    public function test_apply_valid_coupon_payment_tc19()
    {
        $coupon = $this->createCoupon('SAVE10', 10);
        Cart::add($this->product1->id, 1);
        
        $response = $this->post(route('shop.checkout.cart.coupon.apply'), [
            'code' => 'SAVE10',
        ]);
        
        $response->assertSessionHas('success');
    }

    public function test_apply_invalid_coupon_payment_tc20()
    {
        Cart::add($this->product1->id, 1);
        
        $response = $this->post(route('shop.checkout.cart.coupon.apply'), [
            'code' => 'INVALID',
        ]);
        
        $response->assertSessionHas('error');
    }

    public function test_remove_applied_coupon_payment_tc22()
    {
        $coupon = $this->createCoupon('REMOVE10', 10);
        Cart::add($this->product1->id, 1);
        
        $this->post(route('shop.checkout.cart.coupon.apply'), ['code' => 'REMOVE10']);
        
        $response = $this->delete(route('shop.checkout.cart.coupon.remove'));
        
        $response->assertRedirect();
    }

    /**
     * PAYMENT_TC_30: Vượt quá số lượng tồn kho
     */
    public function test_exceed_stock_quantity_payment_tc30()
    {
        $response = $this->post(route('shop.checkout.cart.add', $this->product1->id), [
            'product_id' => $this->product1->id,
            'quantity' => 1000, // Vượt quá tồn kho (50)
        ]);
        
        $response->assertSessionHas('error');
    }

    // Helper methods
    protected function getValidAddress()
    {
        return [
            'first_name' => 'Test',
            'last_name' => 'User',
            'email' => 'test@test.com',
            'address1' => '123 Test St',
            'city' => 'Test City',
            'country' => 'VN',
            'state' => 'HN',
            'postcode' => '100000',
            'phone' => '0123456789',
        ];
    }

    protected function prepareCheckout()
    {
        Cart::add($this->product1->id, 1);
        
        $this->post(route('shop.checkout.onepage.addresses.store'), [
            'billing' => $this->getValidAddress(),
        ]);
        
        $this->post(route('shop.checkout.onepage.shipping_methods.store'), [
            'shipping_method' => 'flatrate_flatrate',
        ]);
        
        $this->post(route('shop.checkout.onepage.payment_methods.store'), [
            'payment' => ['method' => 'cashondelivery'],
        ]);
    }

    protected function createCoupon($code, $discount)
    {
        return CartRule::create([
            'name' => 'Test Coupon ' . $code,
            'coupon_code' => $code,
            'discount_amount' => $discount,
            'action_type' => 'by_fixed',
            'status' => 1,
            'starts_from' => now()->subDay(),
            'ends_till' => now()->addDay(),
        ]);
    }
}
