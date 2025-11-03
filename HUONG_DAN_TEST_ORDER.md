# 🧪 HƯỚNG DẪN KIỂM THỬ CHỨC NĂNG ORDER

## 📋 Tóm tắt
Nhánh **TT** hiện chứa **TOÀN BỘ** Bagisto platform, KHÔNG chỉ có Order. Lý do: Order phụ thuộc vào Product, Customer, Cart, Payment, Shipping, Tax, Inventory.

---

## ✅ TEST CASES ĐÃ CÓ TRÊN NHÁNH TT

### 1. Admin Order Tests
- ✅ `packages/Webkul/Admin/tests/Feature/Sales/OrdersTest.php`
- ✅ `packages/Webkul/Admin/tests/Feature/Sales/Orders/OrdersTest.php`
- ✅ `packages/Webkul/Admin/tests/Feature/Sales/InvoiceTest.php`
- ✅ `packages/Webkul/Admin/tests/Feature/Sales/ShipmentTest.php`
- ✅ `packages/Webkul/Admin/tests/Feature/Sales/RefundTest.php`
- ✅ `packages/Webkul/Admin/tests/Feature/Sales/TransactionTest.php`

### 2. Shop Order Tests
- ✅ `packages/Webkul/Shop/tests/Feature/Customers/OrdersTest.php`
- ✅ `packages/Webkul/Shop/tests/Feature/Checkout/CheckoutTest.php` (tạo order)
- ✅ `packages/Webkul/Shop/tests/Feature/Checkout/CartTest.php` (cần cho order)

**Tổng**: ~9 test suites liên quan Order

---

## 🚀 CÁC CÁCH KIỂM THỬ

### Cách 1: Chạy CHỈ test Order (KHUYẾN NGHỊ)

```bash
# Sử dụng file config tùy chỉnh
php artisan test --configuration=phpunit.order.xml

# Hoặc filter theo tên
php artisan test --filter=Order
```

### Cách 2: Chạy từng test suite cụ thể

```bash
# Admin Order Tests
php artisan test packages/Webkul/Admin/tests/Feature/Sales/OrdersTest.php

# Shop Order Tests
php artisan test packages/Webkul/Shop/tests/Feature/Customers/OrdersTest.php

# Invoice Tests
php artisan test packages/Webkul/Admin/tests/Feature/Sales/InvoiceTest.php

# Shipment Tests
php artisan test packages/Webkul/Admin/tests/Feature/Sales/ShipmentTest.php

# Refund Tests
php artisan test packages/Webkul/Admin/tests/Feature/Sales/RefundTest.php

# Checkout (tạo order mới)
php artisan test packages/Webkul/Shop/tests/Feature/Checkout/CheckoutTest.php
```

### Cách 3: Kiểm thử Manual qua Web UI

#### **Admin Panel:**
1. Truy cập: http://127.0.0.1:8000/admin
2. Login: `admin@example.com` / `admin123`
3. Menu **Sales → Orders**
4. Test:
   - Xem danh sách orders
   - Chi tiết order
   - Tạo invoice
   - Tạo shipment
   - Refund order
   - Cancel order
   - Add comment
   - Export orders

#### **Shop Frontend:**
1. Truy cập: http://127.0.0.1:8000
2. Đăng ký/Login customer
3. Thêm sản phẩm vào cart
4. Checkout → Tạo order
5. Vào **My Account → My Orders**

---

## ⚠️ LƯU Ý QUAN TRỌNG

### ❌ Web KHÔNG chỉ hiển thị Order
- Nhánh TT có đầy đủ Bagisto: Product, Customer, Marketing, Settings, CMS, v.v.
- Order cần các module khác để hoạt động

### ✅ Các test KHÔNG liên quan Order vẫn tồn tại
- ~148 test files tổng cộng
- ~139 test files KHÔNG liên quan Order
- Sử dụng `phpunit.order.xml` để CHỈ chạy test Order

### 🎯 Để CHUYÊN BIỆT hóa cho Order testing:
Nếu muốn nhánh TT CHỈ test Order, bạn cần:
1. ✅ Disable các test không liên quan (đã làm với `phpunit.order.xml`)
2. ❌ KHÔNG nên xóa code khác (sẽ break Order functionality)
3. ✅ Focus vào test Order bằng config file riêng

---

## 📊 THỐNG KÊ TEST FILES

| Loại | Số lượng | Trạng thái |
|------|----------|-----------|
| **Test Order** | 9 files | ✅ Sẵn sàng test |
| **Test khác** | 139 files | ⏸️ Bỏ qua (dùng phpunit.order.xml) |
| **Tổng** | 148 files | - |

---

## 🔧 SETUP TEST DATABASE

Đảm bảo có database test riêng:

```bash
# Copy .env
cp .env .env.testing

# Sửa .env.testing
DB_DATABASE=bagisto_test

# Tạo database
mysql -u root -e "CREATE DATABASE bagisto_test"

# Chạy migration
php artisan migrate --env=testing
php artisan db:seed --env=testing
```

---

## 📝 KHUYẾN NGHỊ

### Để kiểm thử Order hiệu quả:
1. ✅ Dùng `phpunit.order.xml` - CHỈ chạy test Order
2. ✅ Test manual qua web UI - Kiểm tra UX
3. ✅ Giữ nguyên toàn bộ code - Order cần dependencies
4. ✅ Tạo test case mới nếu cần - Thêm vào `phpunit.order.xml`

### KHÔNG nên:
- ❌ Xóa code Product, Customer, Cart, v.v. - Order sẽ break
- ❌ Xóa test files khác - Có thể cần sau này
- ❌ Chạy toàn bộ 148 tests - Tốn thời gian, không liên quan

---

## 🚦 BẮT ĐẦU NGAY

```bash
# 1. Khởi động server
php artisan serve

# 2. Chạy test Order (terminal khác)
php artisan test --configuration=phpunit.order.xml

# 3. Hoặc test manual
# → Mở http://127.0.0.1:8000/admin
# → Login và test chức năng Order
```

---

## 📞 HỖ TRỢ

Nếu cần thêm test case cho Order:
1. Tạo file test mới trong `packages/Webkul/Admin/tests/Feature/Sales/Orders/`
2. Thêm vào `phpunit.order.xml`
3. Chạy lại test
