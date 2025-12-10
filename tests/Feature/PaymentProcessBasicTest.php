<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Webkul\Customer\Models\Customer;
use Webkul\Product\Models\Product;
use Webkul\Checkout\Facades\Cart;

/**
 * Payment Process Basic Test Cases (TC_01 - TC_08)
 * Test các chức năng cơ bản của quy trình thanh toán
 * 
 * Dựa trên file: docs/Inventory_Payment(Sheet1).csv
 */
class PaymentProcessBasicTest extends TestCase
{
    use RefreshDatabase;

    protected $customer;
    protected $product;

    protected function setUp(): void
    {
        parent::setUp();
        
        // Tạo sản phẩm test
        $this->product = Product::factory()->create([
            'sku' => 'TEST-PAYMENT-001',
            'price' => 100,
            'quantity' => 50,
        ]);

        // Tạo khách hàng test
        $this->customer = Customer::factory()->create([
            'email' => 'customer@test.com',
            'password' => bcrypt('password123'),
        ]);
    }

    /**
     * TC_01: Checkout - Validate Form
     * 
     * Mô tả: Kiểm tra validation form checkout khi bỏ trống các trường bắt buộc
     * 
     * Các bước:
     * 1. Bỏ trống SĐT/Địa chỉ
     * 2. Nhấn nút Tiếp tục
     * 
     * Kết quả mong đợi: Báo lỗi tại các trường bắt buộc
     * 
     * Dữ liệu test: SĐT/Địa chỉ: Trống
     */
    public function test_checkout_validate_form_tc01()
    {
        // Thêm sản phẩm vào giỏ
        Cart::add($this->product->id, 1);

        // Gửi form checkout với thông tin trống
        $response = $this->post(route('shop.checkout.onepage.addresses.store'), [
            'billing' => [
                'first_name' => '',
                'last_name' => '',
                'email' => '',
                'address1' => '',
                'city' => '',
                'country' => '',
                'state' => '',
                'postcode' => '',
                'phone' => '',
            ]
        ]);

        // Kiểm tra có lỗi validation
        $response->assertSessionHasErrors([
            'billing.first_name',
            'billing.email',
            'billing.address1',
            'billing.phone',
        ]);
    }

    /**
     * TC_02: Checkout - Khách vãng lai
     * 
     * Mô tả: Kiểm tra chức năng đặt hàng với khách vãng lai (Guest Checkout)
     * 
     * Các bước:
     * 1. Chọn Guest Checkout
     * 2. Điền thông tin đầy đủ
     * 3. Place Order
     * 
     * Kết quả mong đợi: Đặt hàng thành công không cần đăng nhập
     * 
     * Dữ liệu test: Guest: guest001@test.com
     */
    public function test_checkout_guest_tc02()
    {
        // Thêm sản phẩm vào giỏ
        Cart::add($this->product->id, 1);

        // Guest checkout với thông tin đầy đủ
        $response = $this->post(route('shop.checkout.onepage.addresses.store'), [
            'billing' => [
                'first_name' => 'Guest',
                'last_name' => 'User',
                'email' => 'guest001@test.com',
                'address1' => '123 Test Street',
                'city' => 'Test City',
                'country' => 'VN',
                'state' => 'HN',
                'postcode' => '100000',
                'phone' => '0123456789',
            ]
        ]);

        // Chọn phương thức vận chuyển và thanh toán
        $this->post(route('shop.checkout.onepage.shipping_methods.store'), [
            'shipping_method' => 'flatrate_flatrate',
        ]);

        $this->post(route('shop.checkout.onepage.payment_methods.store'), [
            'payment' => ['method' => 'cashondelivery'],
        ]);

        // Đặt hàng
        $orderResponse = $this->post(route('shop.checkout.onepage.orders.store'));

        // Kiểm tra đơn hàng được tạo thành công
        $orderResponse->assertRedirect();
        $this->assertDatabaseHas('orders', [
            'customer_email' => 'guest001@test.com',
        ]);
    }

    /**
     * TC_03: Checkout - Thành viên
     * 
     * Mô tả: Kiểm tra checkout với tài khoản thành viên đã đăng nhập
     * 
     * Các bước:
     * 1. Login
     * 2. Checkout
     * 3. Chọn địa chỉ có sẵn
     * 
     * Kết quả mong đợi: Form tự điền thông tin, đặt hàng nhanh
     * 
     * Dữ liệu test: Member: customer@test.com
     */
    public function test_checkout_member_tc03()
    {
        // Đăng nhập
        $this->actingAs($this->customer, 'customer');

        // Thêm địa chỉ cho customer
        $this->customer->addresses()->create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'address1' => '456 Member Street',
            'city' => 'Member City',
            'country' => 'VN',
            'state' => 'HN',
            'postcode' => '100000',
            'phone' => '0987654321',
        ]);

        // Thêm sản phẩm vào giỏ
        Cart::add($this->product->id, 1);

        // Checkout với địa chỉ đã lưu
        $response = $this->get(route('shop.checkout.onepage.index'));

        // Kiểm tra form có thông tin địa chỉ
        $response->assertStatus(200);
        $response->assertSee('Member Street');
    }

    /**
     * TC_04: Chọn Phí vận chuyển
     * 
     * Mô tả: Kiểm tra việc chọn phương thức vận chuyển và tính phí
     * 
     * Các bước:
     * 1. Chọn phương thức Giao nhanh
     * 
     * Kết quả mong đợi: Phí ship được cộng vào Tổng tiền
     * 
     * Dữ liệu test: Phí ship: $9
     */
    public function test_select_shipping_fee_tc04()
    {
        // Thêm sản phẩm vào giỏ
        Cart::add($this->product->id, 1);

        // Điền thông tin checkout
        $this->post(route('shop.checkout.onepage.addresses.store'), [
            'billing' => [
                'first_name' => 'Test',
                'last_name' => 'User',
                'email' => 'test@example.com',
                'address1' => '123 Test Street',
                'city' => 'Test City',
                'country' => 'VN',
                'state' => 'HN',
                'postcode' => '100000',
                'phone' => '0123456789',
            ]
        ]);

        // Chọn phương thức vận chuyển
        $response = $this->post(route('shop.checkout.onepage.shipping_methods.store'), [
            'shipping_method' => 'flatrate_flatrate',
        ]);

        // Kiểm tra phí vận chuyển được tính
        $cart = Cart::getCart();
        $this->assertGreaterThan(0, $cart->selected_shipping_rate->price);
    }

    /**
     * TC_05: Thanh toán COD
     * 
     * Mô tả: Kiểm tra phương thức thanh toán khi nhận hàng (COD)
     * 
     * Các bước:
     * 1. Chọn Thanh toán khi nhận hàng
     * 2. Order
     * 
     * Kết quả mong đợi: Đơn hàng thành công, trạng thái Pending Payment
     * 
     * Dữ liệu test: Payment: COD
     */
    public function test_payment_cod_tc05()
    {
        // Thêm sản phẩm vào giỏ
        Cart::add($this->product->id, 1);

        // Hoàn tất checkout với COD
        $this->post(route('shop.checkout.onepage.addresses.store'), [
            'billing' => [
                'first_name' => 'Test',
                'last_name' => 'User',
                'email' => 'test@example.com',
                'address1' => '123 Test Street',
                'city' => 'Test City',
                'country' => 'VN',
                'state' => 'HN',
                'postcode' => '100000',
                'phone' => '0123456789',
            ]
        ]);

        $this->post(route('shop.checkout.onepage.shipping_methods.store'), [
            'shipping_method' => 'flatrate_flatrate',
        ]);

        $this->post(route('shop.checkout.onepage.payment_methods.store'), [
            'payment' => ['method' => 'cashondelivery'],
        ]);

        // Đặt hàng
        $this->post(route('shop.checkout.onepage.orders.store'));

        // Kiểm tra đơn hàng có phương thức COD
        $this->assertDatabaseHas('orders', [
            'payment_method' => 'cashondelivery',
            'status' => 'pending',
        ]);
    }

    /**
     * TC_06: Kiểm tra Lịch sử mua hàng
     * 
     * Mô tả: Kiểm tra xem lịch sử đơn hàng trong tài khoản khách hàng
     * 
     * Các bước:
     * 1. Vào Tài khoản
     * 2. Xem Đơn hàng
     * 
     * Kết quả mong đợi: Đơn vừa đặt xuất hiện trong danh sách
     * 
     * Dữ liệu test: Customer orders list
     */
    public function test_order_history_tc06()
    {
        // Đăng nhập
        $this->actingAs($this->customer, 'customer');

        // Tạo đơn hàng cho customer
        $order = $this->customer->orders()->create([
            'customer_email' => $this->customer->email,
            'customer_first_name' => $this->customer->first_name,
            'customer_last_name' => $this->customer->last_name,
            'status' => 'pending',
            'grand_total' => 150,
            'base_grand_total' => 150,
        ]);

        // Truy cập trang lịch sử đơn hàng
        $response = $this->get(route('shop.customers.account.orders.index'));

        // Kiểm tra đơn hàng hiển thị
        $response->assertStatus(200);
        $response->assertSee($order->id);
    }

    /**
     * TC_07: Áp dụng Coupon hợp lệ
     * 
     * Mô tả: Kiểm tra áp dụng mã giảm giá hợp lệ
     * 
     * Các bước:
     * 1. Nhập mã giảm giá đúng
     * 2. Apply
     * 
     * Kết quả mong đợi: Báo thành công, Grand Total được giảm tiền
     * 
     * Dữ liệu test: Coupon: SAVE9
     */
    public function test_apply_valid_coupon_tc07()
    {
        // Tạo coupon
        $coupon = \Webkul\CartRule\Models\CartRule::create([
            'name' => 'Test Coupon',
            'coupon_code' => 'SAVE9',
            'discount_amount' => 10,
            'action_type' => 'by_fixed',
            'status' => 1,
            'starts_from' => now()->subDay(),
            'ends_till' => now()->addDay(),
        ]);

        // Thêm sản phẩm vào giỏ
        Cart::add($this->product->id, 1);

        // Áp dụng coupon
        $response = $this->post(route('shop.checkout.cart.coupon.apply'), [
            'code' => 'SAVE9',
        ]);

        // Kiểm tra coupon được áp dụng
        $response->assertSessionHas('success');
        $this->assertNotNull(Cart::getCart()->coupon_code);
    }

    /**
     * TC_08: Áp dụng Coupon sai/hết hạn
     * 
     * Mô tả: Kiểm tra áp dụng mã giảm giá không hợp lệ
     * 
     * Các bước:
     * 1. Nhập mã sai
     * 2. Apply
     * 
     * Kết quả mong đợi: Báo lỗi "Mã không hợp lệ", Giá giữ nguyên
     * 
     * Dữ liệu test: Coupon: INVALID122
     */
    public function test_apply_invalid_coupon_tc08()
    {
        // Thêm sản phẩm vào giỏ
        Cart::add($this->product->id, 1);

        $originalTotal = Cart::getCart()->grand_total;

        // Áp dụng coupon không hợp lệ
        $response = $this->post(route('shop.checkout.cart.coupon.apply'), [
            'code' => 'INVALID122',
        ]);

        // Kiểm tra có lỗi
        $response->assertSessionHas('error');
        
        // Kiểm tra giá không thay đổi
        $this->assertEquals($originalTotal, Cart::getCart()->grand_total);
    }
}
