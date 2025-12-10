# Tài liệu ERD - Lược đồ cơ sở dữ liệu Website Thương mại điện tử

## Tổng quan

Bộ tài liệu này cung cấp sơ đồ ERD (Entity Relationship Diagram) mức khái niệm cho các chức năng chính của hệ thống thương mại điện tử. Mỗi chức năng được phân tích chi tiết với đầy đủ thông tin về:

- **Thực thể (Entities)**: Các bảng trong cơ sở dữ liệu
- **Thuộc tính (Attributes)**: Các trường dữ liệu với kiểu dữ liệu
- **Quan hệ (Relationships)**: Mối quan hệ giữa các bảng
- **Quy trình nghiệp vụ**: Luồng xử lý nghiệp vụ
- **Ràng buộc**: Các quy tắc và constraints

## Danh sách các ERD

### 1. [Product Catalog (Danh mục sản phẩm)](./ERD_1_Product_Catalog.md)
📦 **Chức năng**: Quản lý sản phẩm, danh mục, thuộc tính, hình ảnh, đánh giá và tồn kho

**Các bảng chính**:
- `products` - Thông tin sản phẩm
- `categories` - Danh mục sản phẩm (nested set)
- `attributes` - Thuộc tính sản phẩm
- `product_attribute_values` - Giá trị thuộc tính
- `product_images` - Hình ảnh sản phẩm
- `product_reviews` - Đánh giá sản phẩm
- `product_inventories` - Tồn kho
- `inventory_sources` - Nguồn kho

**Highlights**:
- Hỗ trợ nhiều loại sản phẩm: simple, configurable, bundle, grouped
- Danh mục đa cấp với Nested Set Model
- Thuộc tính động và linh hoạt
- Multi-warehouse inventory

---

### 2. [Shopping Cart (Giỏ hàng)](./ERD_2_Shopping_Cart.md)
🛒 **Chức năng**: Quản lý giỏ hàng, thêm/xóa sản phẩm, tính toán giá

**Các bảng chính**:
- `cart` - Giỏ hàng
- `cart_items` - Sản phẩm trong giỏ
- `cart_payment` - Phương thức thanh toán
- `cart_shipping_rates` - Phí vận chuyển
- `cart_item_inventories` - Phân bổ tồn kho

**Highlights**:
- Hỗ trợ cả guest và logged-in users
- Tự động tính thuế, giảm giá
- Multi-currency support
- Inventory reservation

---

### 3. [Order Management (Quản lý đơn hàng)](./ERD_3_Order_Management.md)
📋 **Chức năng**: Quản lý đơn hàng, hóa đơn, vận đơn, hoàn trả

**Các bảng chính**:
- `orders` - Đơn hàng
- `order_items` - Chi tiết đơn hàng
- `order_payment` - Thanh toán
- `invoices` - Hóa đơn
- `shipments` - Vận đơn
- `refunds` - Phiếu hoàn trả

**Highlights**:
- Tracking đầy đủ trạng thái đơn hàng
- Hỗ trợ partial invoice, shipment, refund
- Multi-currency và exchange rate
- Complete order lifecycle management

---

### 4. [Payment Process (Quy trình thanh toán)](./ERD_4_Payment_Process.md)
💳 **Chức năng**: Xử lý thanh toán, mã giảm giá, thuế

**Các bảng chính**:
- `order_payment` - Thanh toán đơn hàng
- `invoices` - Hóa đơn thanh toán
- `cart_rules` - Quy tắc giảm giá
- `cart_rule_coupons` - Mã coupon
- `tax_categories` - Danh mục thuế
- `tax_rates` - Mức thuế

**Highlights**:
- Hỗ trợ nhiều payment gateway
- Flexible discount rules
- Geographic-based tax calculation
- Coupon management với usage limits

---

### 5. [Inventory Management (Quản lý kho)](./ERD_5_Inventory_Management.md)
📦 **Chức năng**: Quản lý tồn kho, nhập/xuất kho, điều chuyển

**Các bảng chính**:
- `inventory_sources` - Nguồn kho/warehouse
- `product_inventories` - Tồn kho thực tế
- `product_inventory_indices` - Tồn kho khả dụng (index)
- `product_ordered_inventories` - Hàng đã đặt
- `shipments` - Vận đơn xuất kho

**Highlights**:
- Multi-warehouse support
- Real-time inventory tracking
- Automated stock allocation
- Priority-based warehouse selection
- Stock reservation system

---

### 6. [Customer Management (Quản lý khách hàng)](./ERD_6_Customer_Management.md)
👥 **Chức năng**: Quản lý khách hàng, địa chỉ, wishlist, đánh giá

**Các bảng chính**:
- `customers` - Khách hàng
- `customer_groups` - Nhóm khách hàng
- `customer_addresses` - Địa chỉ
- `wishlist_items` - Danh sách yêu thích
- `compare_items` - So sánh sản phẩm
- `product_reviews` - Đánh giá
- `customer_social_accounts` - Social login

**Highlights**:
- Customer segmentation
- Multiple addresses per customer
- Wishlist and compare functionality
- Social login integration
- Customer Lifetime Value tracking
- GDPR compliance

---

### 7. [Access Control (Kiểm soát truy cập)](./ERD_7_Access_Control.md)
🔐 **Chức năng**: Quản lý quyền truy cập, vai trò, xác thực

**Các bảng chính**:
- `admins` - Quản trị viên
- `roles` - Vai trò
- `customers` - Khách hàng
- `customer_groups` - Nhóm khách hàng
- `personal_access_tokens` - API tokens
- `channels` - Kênh bán hàng
- `password_resets` - Reset mật khẩu

**Highlights**:
- Role-based access control (RBAC)
- Granular permissions system
- Multi-channel support
- API authentication với Sanctum
- Password policy enforcement
- Audit logging

---

## Công nghệ sử dụng

- **Database**: MySQL/MariaDB
- **Framework**: Laravel 10+
- **Packages**:
  - Bagisto (E-commerce platform)
  - Laravel Sanctum (API authentication)
  - Nested Set (Category hierarchy)
  - Intervention Image (Image processing)

## Quy ước đặt tên

### Bảng (Tables)
- Số nhiều, snake_case: `products`, `order_items`, `cart_rules`
- Bảng pivot: `{table1}_{table2}`: `product_categories`, `cart_rule_coupons`

### Cột (Columns)
- snake_case: `customer_id`, `created_at`, `is_active`
- Khóa chính: `id` (auto increment)
- Khóa ngoại: `{table}_id`: `product_id`, `customer_id`
- Timestamps: `created_at`, `updated_at`
- Soft deletes: `deleted_at`

### Kiểu dữ liệu
- **Số nguyên**: `int`, `tinyint`, `bigint`
- **Số thập phân**: `decimal(12, 4)` cho tiền tệ
- **Chuỗi**: `string` (VARCHAR), `text` (TEXT)
- **Boolean**: `boolean` hoặc `tinyint(1)`
- **Ngày giờ**: `timestamp`, `date`, `datetime`
- **JSON**: `json` cho dữ liệu linh hoạt

## Các mối quan hệ

### One-to-Many (1:N)
```
orders (1) ----< (N) order_items
products (1) ----< (N) product_images
customers (1) ----< (N) orders
```

### Many-to-Many (N:M)
```
products (N) >----< (M) categories [qua product_categories]
cart_rules (N) >----< (M) channels [qua cart_rule_channels]
tax_categories (N) >----< (M) tax_rates [qua tax_categories_tax_rates]
```

### One-to-One (1:1)
```
orders (1) ---- (1) order_payment
cart (1) ---- (1) cart_payment
```

### Polymorphic
```
personal_access_tokens.tokenable_type + tokenable_id
  -> Admin, Customer, User
```

## Indexes và Performance

### Primary Keys
Tất cả bảng có `id` làm primary key (auto increment)

### Foreign Keys
Tất cả foreign keys có index và ON DELETE constraints:
- `CASCADE`: Xóa dữ liệu liên quan
- `SET NULL`: Set NULL khi xóa
- `RESTRICT`: Không cho phép xóa nếu có dữ liệu liên quan

### Unique Indexes
- `products.sku`
- `customers.email`, `customers.phone`
- `admins.email`
- `categories.slug` + `locale`

### Composite Indexes
- `product_inventories`: `(product_id, inventory_source_id, vendor_id)`
- `product_inventory_indices`: `(product_id, channel_id)`
- `cart_items`: `(cart_id, product_id)`

## Tính toán quan trọng

### Giá trị đơn hàng
```
grand_total = sub_total + tax_amount + shipping_amount - discount_amount
```

### Tồn kho khả dụng
```
available_qty = Σ(actual_inventory) - ordered_inventory
```

### Customer Lifetime Value
```
CLV = Σ(order.grand_total) for all orders of customer
```

### Stock Turnover
```
turnover_rate = cost_of_goods_sold / average_inventory
```

## Migration và Seeding

### Thứ tự Migration
1. Core tables: `locales`, `currencies`, `channels`
2. User tables: `admins`, `roles`, `customers`, `customer_groups`
3. Catalog: `attributes`, `attribute_families`, `categories`, `products`
4. Inventory: `inventory_sources`, `product_inventories`
5. Cart & Checkout: `cart`, `cart_items`
6. Orders: `orders`, `order_items`, `invoices`, `shipments`, `refunds`
7. Pivot tables and others

### Seeders cần thiết
- Default locale (en)
- Default currency (USD)
- Default channel (Default)
- Default customer group (General)
- Default admin role (Administrator)
- Sample categories
- Sample attributes

## Best Practices

### 1. Data Integrity
- Sử dụng foreign keys với appropriate constraints
- Validate dữ liệu ở cả application và database level
- Sử dụng transactions cho operations phức tạp

### 2. Performance
- Index các cột thường dùng trong WHERE, JOIN
- Sử dụng eager loading để tránh N+1 query problem
- Cache các queries thường xuyên (categories, attributes)
- Sử dụng queue cho background jobs

### 3. Security
- Hash passwords với bcrypt
- Validate và sanitize user input
- Sử dụng parameterized queries
- Implement rate limiting
- Log sensitive operations

### 4. Scalability
- Sử dụng index tables cho aggregated data
- Implement caching strategy
- Consider read replicas cho read-heavy operations
- Archive old data

## Tài liệu tham khảo

- [Laravel Documentation](https://laravel.com/docs)
- [Bagisto Documentation](https://devdocs.bagisto.com/)
- [MySQL Documentation](https://dev.mysql.com/doc/)
- [Database Design Best Practices](https://www.sqlshack.com/learn-sql-database-design/)

---

## Liên hệ và Đóng góp

Nếu có câu hỏi hoặc đề xuất cải thiện tài liệu, vui lòng tạo issue hoặc pull request trên repository.

**Repository**: TTTD-KTPM/TTTD_KTPM  
**Branch**: Toan-Order  
**Ngày cập nhật**: November 10, 2025
