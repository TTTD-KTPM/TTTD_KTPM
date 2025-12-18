# ERD - SHOPPING CART (Giỏ hàng)

## Sơ đồ ERD mức khái niệm

```mermaid
erDiagram
    CART ||--o{ CART_ITEMS : "chứa"
    CART ||--|| CART_PAYMENT : "có"
    CART ||--o{ CART_SHIPPING_RATES : "có"
    CART }o--o| CUSTOMERS : "thuộc về"
    CART }o--|| CHANNELS : "thuộc"
    CART_ITEMS }o--|| PRODUCTS : "tham chiếu"
    CART_ITEMS ||--o{ CART_ITEM_INVENTORIES : "có"
    CART_ITEMS }o--o| TAX_CATEGORIES : "áp dụng"
    CART_ITEMS }o--o| CART_ITEMS : "sản phẩm con"
    CART_RULE_COUPONS }o--o{ CART : "áp dụng cho"
    INVENTORY_SOURCES ||--o{ CART_ITEM_INVENTORIES : "cung cấp"

    CART {
        int id PK "ID giỏ hàng"
        string customer_email "Email khách hàng"
        string customer_first_name "Tên khách hàng"
        string customer_last_name "Họ khách hàng"
        string shipping_method "Phương thức vận chuyển"
        string coupon_code "Mã giảm giá"
        boolean is_gift "Là quà tặng"
        int items_count "Số lượng items"
        decimal items_qty "Tổng số lượng sản phẩm"
        decimal exchange_rate "Tỷ giá"
        string global_currency_code "Mã tiền tệ toàn cầu"
        string base_currency_code "Mã tiền tệ cơ sở"
        string channel_currency_code "Mã tiền tệ kênh"
        string cart_currency_code "Mã tiền tệ giỏ hàng"
        decimal grand_total "Tổng tiền"
        decimal base_grand_total "Tổng tiền (base)"
        decimal sub_total "Tổng tiền hàng"
        decimal base_sub_total "Tổng tiền hàng (base)"
        decimal tax_total "Tổng thuế"
        decimal base_tax_total "Tổng thuế (base)"
        decimal discount_amount "Số tiền giảm giá"
        decimal base_discount_amount "Số tiền giảm giá (base)"
        string checkout_method "Phương thức thanh toán"
        boolean is_guest "Khách vãng lai"
        boolean is_active "Đang hoạt động"
        string applied_cart_rule_ids "ID các rule đã áp dụng"
        int customer_id FK "ID khách hàng"
        int channel_id FK "ID kênh bán hàng"
        timestamp created_at "Ngày tạo"
        timestamp updated_at "Ngày cập nhật"
    }

    CART_ITEMS {
        int id PK "ID item"
        int quantity "Số lượng"
        string sku "Mã SKU"
        string type "Loại sản phẩm"
        string name "Tên sản phẩm"
        string coupon_code "Mã giảm giá"
        decimal weight "Trọng lượng"
        decimal total_weight "Tổng trọng lượng"
        decimal base_total_weight "Tổng trọng lượng (base)"
        decimal price "Đơn giá"
        decimal base_price "Đơn giá (base)"
        decimal custom_price "Giá tùy chỉnh"
        decimal total "Thành tiền"
        decimal base_total "Thành tiền (base)"
        decimal tax_percent "% thuế"
        decimal tax_amount "Tiền thuế"
        decimal base_tax_amount "Tiền thuế (base)"
        decimal discount_percent "% giảm giá"
        decimal discount_amount "Tiền giảm giá"
        decimal base_discount_amount "Tiền giảm giá (base)"
        int parent_id FK "ID item cha"
        int product_id FK "ID sản phẩm"
        int cart_id FK "ID giỏ hàng"
        int tax_category_id FK "ID danh mục thuế"
        string applied_cart_rule_ids "ID các rule đã áp dụng"
        json additional "Dữ liệu bổ sung"
        timestamp created_at "Ngày tạo"
        timestamp updated_at "Ngày cập nhật"
    }

    CART_PAYMENT {
        int id PK "ID thanh toán"
        string method "Phương thức thanh toán"
        string method_title "Tên phương thức"
        json additional "Dữ liệu bổ sung"
        int cart_id FK "ID giỏ hàng"
        timestamp created_at "Ngày tạo"
        timestamp updated_at "Ngày cập nhật"
    }

    CART_SHIPPING_RATES {
        int id PK "ID phí vận chuyển"
        string carrier "Đơn vị vận chuyển"
        string carrier_title "Tên đơn vị vận chuyển"
        string method "Phương thức"
        string method_title "Tên phương thức"
        text method_description "Mô tả phương thức"
        decimal price "Giá"
        decimal base_price "Giá (base)"
        boolean is_calculate_tax "Có tính thuế"
        int cart_address_id FK "ID địa chỉ"
        timestamp created_at "Ngày tạo"
        timestamp updated_at "Ngày cập nhật"
    }

    CART_ITEM_INVENTORIES {
        int id PK "ID"
        int qty "Số lượng"
        int inventory_source_id FK "ID nguồn kho"
        int cart_item_id FK "ID cart item"
        timestamp created_at "Ngày tạo"
        timestamp updated_at "Ngày cập nhật"
    }

    CUSTOMERS {
        int id PK "ID khách hàng"
        string first_name "Tên"
        string last_name "Họ"
        string gender "Giới tính"
        date date_of_birth "Ngày sinh"
        string email UK "Email"
        string phone UK "Số điện thoại"
        string image "Ảnh đại diện"
        tinyint status "Trạng thái"
        string password "Mật khẩu"
        string api_token UK "API token"
        int customer_group_id FK "ID nhóm khách hàng"
        boolean subscribed_to_news_letter "Đăng ký nhận tin"
        boolean is_verified "Đã xác thực"
        tinyint is_suspended "Bị tạm ngưng"
        string token "Token xác thực"
        text notes "Ghi chú"
        timestamp created_at "Ngày tạo"
        timestamp updated_at "Ngày cập nhật"
    }

    PRODUCTS {
        int id PK "ID sản phẩm"
        string sku UK "Mã SKU"
        string type "Loại sản phẩm"
        int parent_id FK "ID sản phẩm cha"
        int attribute_family_id FK "ID nhóm thuộc tính"
        json additional "Dữ liệu bổ sung"
        timestamp created_at "Ngày tạo"
        timestamp updated_at "Ngày cập nhật"
    }

    CHANNELS {
        int id PK "ID kênh"
        string code UK "Mã kênh"
        string name "Tên kênh"
        text description "Mô tả"
        string theme "Theme"
        string hostname "Hostname"
        string logo "Logo"
        string favicon "Favicon"
        int root_category_id FK "ID danh mục gốc"
        int default_locale_id FK "ID ngôn ngữ mặc định"
        int base_currency_id FK "ID tiền tệ cơ sở"
        boolean is_maintenance_on "Chế độ bảo trì"
        text maintenance_mode_text "Text bảo trì"
        json seo "Cấu hình SEO"
        timestamp created_at "Ngày tạo"
        timestamp updated_at "Ngày cập nhật"
    }

    TAX_CATEGORIES {
        int id PK "ID danh mục thuế"
        string code "Mã danh mục"
        string name "Tên danh mục"
        text description "Mô tả"
        timestamp created_at "Ngày tạo"
        timestamp updated_at "Ngày cập nhật"
    }

    CART_RULE_COUPONS {
        int id PK "ID coupon"
        string code UK "Mã coupon"
        int usage_limit "Giới hạn sử dụng"
        int usage_per_customer "Giới hạn mỗi khách hàng"
        int times_used "Số lần đã dùng"
        string type "Loại (0=shared, 1=unique)"
        boolean is_primary "Là coupon chính"
        date expired_at "Ngày hết hạn"
        int cart_rule_id FK "ID cart rule"
        timestamp created_at "Ngày tạo"
        timestamp updated_at "Ngày cập nhật"
    }

    INVENTORY_SOURCES {
        int id PK "ID nguồn kho"
        string code UK "Mã nguồn kho"
        string name "Tên nguồn kho"
        text description "Mô tả"
        boolean status "Trạng thái"
        timestamp created_at "Ngày tạo"
        timestamp updated_at "Ngày cập nhật"
    }
```

## Mô tả các bảng chính

### 1. CART (Giỏ hàng)
- Lưu trữ thông tin tổng quan về giỏ hàng
- Hỗ trợ cả khách hàng đã đăng nhập và khách vãng lai
- Tính toán tự động tổng tiền, thuế, giảm giá
- Hỗ trợ đa tiền tệ và đa kênh

### 2. CART_ITEMS (Sản phẩm trong giỏ)
- Chi tiết từng sản phẩm trong giỏ hàng
- Hỗ trợ sản phẩm phức tạp (configurable, bundle) qua parent_id
- Tính toán giá, thuế, giảm giá cho từng item
- Lưu trữ thông tin snapshot của sản phẩm (tránh thay đổi giá)

### 3. CART_PAYMENT (Thanh toán)
- Lưu phương thức thanh toán được chọn
- Hỗ trợ nhiều loại payment gateway

### 4. CART_SHIPPING_RATES (Phí vận chuyển)
- Lưu các lựa chọn phí vận chuyển khả dụng
- Tính toán dựa trên địa chỉ và carrier

### 5. CART_ITEM_INVENTORIES (Phân bổ tồn kho)
- Quản lý phân bổ số lượng từ các nguồn kho khác nhau
- Hỗ trợ multi-warehouse fulfillment

## Quy trình nghiệp vụ

1. **Thêm sản phẩm vào giỏ**:
   - Tạo/cập nhật CART
   - Thêm CART_ITEMS
   - Phân bổ CART_ITEM_INVENTORIES
   - Áp dụng CART_RULE_COUPONS (nếu có)
   - Tính toán lại tổng tiền

2. **Cập nhật giỏ hàng**:
   - Thay đổi số lượng CART_ITEMS
   - Cập nhật CART_ITEM_INVENTORIES
   - Tính toán lại thuế, giảm giá
   - Cập nhật CART totals

3. **Checkout**:
   - Chọn phương thức vận chuyển (CART_SHIPPING_RATES)
   - Chọn phương thức thanh toán (CART_PAYMENT)
   - Xác thực tồn kho
   - Chuyển đổi thành ORDER

## Các ràng buộc quan trọng

- Mỗi CART chỉ có một CART_PAYMENT duy nhất
- CART_ITEMS phải tham chiếu đến PRODUCTS tồn tại
- Tổng quantity của CART_ITEM_INVENTORIES phải bằng quantity của CART_ITEMS
- Giá trong CART_ITEMS là snapshot, không tự động cập nhật theo PRODUCTS
