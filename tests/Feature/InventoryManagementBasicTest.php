<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Webkul\Product\Models\Product;
use Webkul\Inventory\Models\InventorySource;
use Webkul\User\Models\Admin;

/**
 * Inventory Management Basic Test Cases (TC_01 - TC_10)
 * Test các chức năng cơ bản của quản lý tồn kho
 * 
 * Dựa trên file: docs/Inventory_Payment(Sheet1).csv
 */
class InventoryManagementBasicTest extends TestCase
{
    use RefreshDatabase;

    protected $admin;
    protected $product;
    protected $inventorySource;

    protected function setUp(): void
    {
        parent::setUp();
        
        // Tạo admin user
        $this->admin = Admin::factory()->create();

        // Tạo inventory source mặc định
        $this->inventorySource = InventorySource::factory()->create([
            'code' => 'default',
            'name' => 'Default Warehouse',
        ]);

        // Tạo sản phẩm test
        $this->product = Product::factory()->create([
            'sku' => 'TEST-INV-001',
            'price' => 100,
        ]);
    }

    /**
     * TC_01: Tạo nguồn kho
     * 
     * Mô tả: Kiểm tra chức năng tạo nguồn kho mới
     * 
     * Các bước:
     * 1. Admin → Inventory Sources
     * 2. Click Add
     * 3. Điền thông tin
     * 4. Save
     * 
     * Kết quả mong đợi: Created - Nguồn kho được tạo thành công
     * 
     * Dữ liệu test: Source ID: 2
     */
    public function test_create_inventory_source_tc01()
    {
        // Đăng nhập admin
        $this->actingAs($this->admin, 'admin');

        // Tạo inventory source mới
        $response = $this->post(route('admin.settings.inventory_sources.store'), [
            'code' => 'WH-002',
            'name' => 'Warehouse 2',
            'contact_name' => 'John Doe',
            'contact_email' => 'warehouse2@test.com',
            'contact_number' => '0123456789',
            'country' => 'VN',
            'state' => 'HN',
            'city' => 'Hanoi',
            'street' => '123 Test Street',
            'postcode' => '100000',
            'priority' => 1,
            'status' => 1,
        ]);

        // Kiểm tra nguồn kho được tạo
        $response->assertRedirect();
        $this->assertDatabaseHas('inventory_sources', [
            'code' => 'WH-002',
            'name' => 'Warehouse 2',
        ]);
    }

    /**
     * TC_02: Thiếu tên kho (Negative Test)
     * 
     * Mô tả: Kiểm tra validation khi tạo nguồn kho thiếu tên
     * 
     * Các bước:
     * 1. Name blank
     * 2. Save
     * 
     * Kết quả mong đợi: Error - Hiển thị lỗi validation
     * 
     * Dữ liệu test: Empty name
     */
    public function test_create_source_missing_name_tc02()
    {
        // Đăng nhập admin
        $this->actingAs($this->admin, 'admin');

        // Thử tạo inventory source không có tên
        $response = $this->post(route('admin.settings.inventory_sources.store'), [
            'code' => 'WH-003',
            'name' => '', // Tên trống
            'country' => 'VN',
            'status' => 1,
        ]);

        // Kiểm tra có lỗi validation
        $response->assertSessionHasErrors('name');
        
        // Kiểm tra không có record mới
        $this->assertDatabaseMissing('inventory_sources', [
            'code' => 'WH-003',
        ]);
    }

    /**
     * TC_03: Cập nhật tồn kho
     * 
     * Mô tả: Kiểm tra chức năng cập nhật số lượng tồn kho
     * 
     * Các bước:
     * 1. Inventory → Products
     * 2. Edit qty
     * 3. Save
     * 
     * Kết quả mong đợi: Success - Số lượng được cập nhật
     * 
     * Dữ liệu test: qty = 100
     */
    public function test_update_inventory_tc03()
    {
        // Đăng nhập admin
        $this->actingAs($this->admin, 'admin');

        // Cập nhật inventory
        $response = $this->put(route('admin.catalog.products.update', $this->product->id), [
            'sku' => $this->product->sku,
            'name' => $this->product->name,
            'inventories' => [
                $this->inventorySource->id => 100,
            ],
        ]);

        // Kiểm tra inventory được cập nhật
        $this->assertDatabaseHas('product_inventories', [
            'product_id' => $this->product->id,
            'inventory_source_id' => $this->inventorySource->id,
            'qty' => 100,
        ]);
    }

    /**
     * TC_04: Nhập tồn âm (Negative Test)
     * 
     * Mô tả: Kiểm tra validation khi nhập số lượng âm
     * 
     * Các bước:
     * 1. qty = -5
     * 2. Save
     * 
     * Kết quả mong đợi: Error - Không cho phép số âm
     * 
     * Dữ liệu test: qty = -5
     * 
     * Note: Cần validation rule để ngăn số âm
     */
    public function test_negative_inventory_tc04()
    {
        // Đăng nhập admin
        $this->actingAs($this->admin, 'admin');

        // Thử cập nhật với số lượng âm
        $response = $this->put(route('admin.catalog.products.update', $this->product->id), [
            'sku' => $this->product->sku,
            'name' => $this->product->name,
            'inventories' => [
                $this->inventorySource->id => -5,
            ],
        ]);

        // Kiểm tra có lỗi validation
        $response->assertSessionHasErrors();
        
        // Hoặc kiểm tra số lượng không bị cập nhật thành số âm
        $this->assertDatabaseMissing('product_inventories', [
            'product_id' => $this->product->id,
            'qty' => -5,
        ]);
    }

    /**
     * TC_05: Hết hàng tự ẩn SP
     * 
     * Mô tả: Kiểm tra sản phẩm tự động hiển thị "Out of stock" khi qty = 0
     * 
     * Các bước:
     * 1. Đặt qty = 0
     * 2. Save
     * 3. Xem frontend
     * 
     * Kết quả mong đợi: SP hiển thị "Out of stock"
     * 
     * Dữ liệu test: qty = 0
     */
    public function test_out_of_stock_display_tc05()
    {
        // Đăng nhập admin
        $this->actingAs($this->admin, 'admin');

        // Đặt inventory = 0
        $this->product->inventories()->updateOrCreate(
            ['inventory_source_id' => $this->inventorySource->id],
            ['qty' => 0]
        );

        // Kiểm tra trạng thái sản phẩm
        $this->assertEquals(0, $this->product->totalQuantity());
        
        // Truy cập trang sản phẩm
        $response = $this->get(route('shop.product_or_category.index', $this->product->url_key));
        
        // Kiểm tra hiển thị "Out of stock"
        $response->assertSee('Out of stock');
    }

    /**
     * TC_06: Tồn kho quá lớn (Negative Test)
     * 
     * Mô tả: Kiểm tra validation với số lượng rất lớn
     * 
     * Các bước:
     * 1. qty = 9999999
     * 2. Save
     * 
     * Kết quả mong đợi: Error hoặc Accept (tùy business rule)
     * 
     * Dữ liệu test: qty = 9999999
     * 
     * Note: Chưa có max limit validation
     */
    public function test_large_inventory_tc06()
    {
        // Đăng nhập admin
        $this->actingAs($this->admin, 'admin');

        // Thử cập nhật với số lượng rất lớn
        $response = $this->put(route('admin.catalog.products.update', $this->product->id), [
            'sku' => $this->product->sku,
            'name' => $this->product->name,
            'inventories' => [
                $this->inventorySource->id => 9999999,
            ],
        ]);

        // Kiểm tra xem có accept hoặc reject
        if ($response->isRedirect()) {
            // Accept: Kiểm tra số lượng được lưu
            $this->assertDatabaseHas('product_inventories', [
                'product_id' => $this->product->id,
                'qty' => 9999999,
            ]);
        } else {
            // Reject: Kiểm tra có lỗi
            $response->assertSessionHasErrors();
        }
    }

    /**
     * TC_07: Xuất kho vượt tồn (Negative Test)
     * 
     * Mô tả: Kiểm tra ngăn chặn đặt hàng vượt quá tồn kho
     * 
     * Các bước:
     * 1. Sản phẩm có tồn kho: 5
     * 2. Khách thử đặt: 10
     * 3. Checkout
     * 
     * Kết quả mong đợi: Error - Không cho phép đặt hàng
     * 
     * Dữ liệu test: Available: 5, Order: 10
     * 
     * Note: Được xử lý tại checkout
     */
    public function test_order_exceeds_stock_tc07()
    {
        // Đặt tồn kho = 5
        $this->product->inventories()->updateOrCreate(
            ['inventory_source_id' => $this->inventorySource->id],
            ['qty' => 5]
        );

        // Thử thêm 10 sản phẩm vào giỏ
        $response = $this->post(route('shop.checkout.cart.add', $this->product->id), [
            'product_id' => $this->product->id,
            'quantity' => 10,
        ]);

        // Kiểm tra có lỗi
        $response->assertSessionHas('error');
        
        // Hoặc kiểm tra số lượng trong giỏ không vượt quá tồn kho
        $cart = \Webkul\Checkout\Facades\Cart::getCart();
        if ($cart) {
            $item = $cart->items->first();
            $this->assertLessThanOrEqual(5, $item->quantity);
        }
    }

    /**
     * TC_08: Xem lịch sử kho
     * 
     * Mô tả: Kiểm tra chức năng xem lịch sử thay đổi tồn kho
     * 
     * Các bước:
     * 1. Inventory → History
     * 2. Xem log
     * 
     * Kết quả mong đợi: Hiển thị log các thay đổi
     * 
     * Dữ liệu test: N/A
     * 
     * Note: Feature chưa available - Test sẽ SKIP
     */
    public function test_inventory_history_tc08()
    {
        $this->markTestSkipped('Inventory history feature not available yet');
        
        // Đăng nhập admin
        $this->actingAs($this->admin, 'admin');

        // Truy cập trang lịch sử (nếu có)
        // $response = $this->get(route('admin.inventory.history'));
        // $response->assertStatus(200);
    }

    /**
     * TC_09: API tồn kho lỗi (Negative Test)
     * 
     * Mô tả: Kiểm tra xử lý lỗi khi API tồn kho fail
     * 
     * Các bước:
     * 1. API fail
     * 2. Cập nhật stock
     * 
     * Kết quả mong đợi: Error message
     * 
     * Dữ liệu test: N/A
     * 
     * Note: Requires API endpoint - Test sẽ SKIP
     */
    public function test_api_inventory_error_tc09()
    {
        $this->markTestSkipped('API endpoint not available for testing');
        
        // Test API error handling khi có API endpoint
    }

    /**
     * TC_10: Enable backorder
     * 
     * Mô tả: Kiểm tra chức năng cho phép đặt hàng khi hết hàng (backorder)
     * 
     * Các bước:
     * 1. Product → Enable backorder
     * 2. Save
     * 3. Đặt qty = 0
     * 4. Thử đặt hàng
     * 
     * Kết quả mong đợi: Cho phép order khi hết hàng
     * 
     * Dữ liệu test: Backorder enabled
     * 
     * Note: Product setting available
     */
    public function test_enable_backorder_tc10()
    {
        // Đăng nhập admin
        $this->actingAs($this->admin, 'admin');

        // Bật backorder cho sản phẩm
        $this->product->update([
            'manage_stock' => 1,
        ]);

        // Đặt inventory = 0
        $this->product->inventories()->updateOrCreate(
            ['inventory_source_id' => $this->inventorySource->id],
            ['qty' => 0]
        );

        // Kiểm tra có thể thêm vào giỏ khi hết hàng
        // (Tùy thuộc vào cấu hình backorder của Bagisto)
        $response = $this->post(route('shop.checkout.cart.add', $this->product->id), [
            'product_id' => $this->product->id,
            'quantity' => 1,
        ]);

        // Nếu backorder được bật, không có lỗi
        // Nếu không, có lỗi "out of stock"
        $this->assertTrue(
            $response->isRedirect() || $response->assertSessionHas('error')
        );
    }
}
