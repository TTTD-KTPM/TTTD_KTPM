# ERD - PAYMENT PROCESS (Quy trình thanh toán)

## Sơ đồ ERD mức khái niệm

```mermaid
erDiagram
    ORDERS ||--|| ORDER_PAYMENT : "có"
    ORDERS ||--o{ INVOICES : "tạo ra"
    CART ||--|| CART_PAYMENT : "có"
    INVOICES }o--o| ORDERS : "thuộc về"
    ORDER_PAYMENT }o--|| ORDERS : "cho"
    CART_PAYMENT }o--|| CART : "cho"
    CUSTOMERS ||--o{ ORDERS : "đặt"
    CART_RULES ||--o{ CART_RULE_COUPONS : "có"
    CART_RULE_COUPONS }o--o{ CART : "áp dụng"
    CART_RULE_COUPONS }o--o{ ORDERS : "áp dụng"
    TAX_CATEGORIES ||--o{ TAX_CATEGORIES_TAX_RATES : "có"
    TAX_RATES ||--o{ TAX_CATEGORIES_TAX_RATES : "thuộc"
    CART_ITEMS }o--o| TAX_CATEGORIES : "áp dụng"
    ORDER_ITEMS }o--o| TAX_CATEGORIES : "áp dụng"

    ORDER_PAYMENT {
        int id PK "ID thanh toán đơn hàng"
        int order_id FK "ID đơn hàng"
        string method "Mã phương thức (cashondelivery, paypal, stripe...)"
        string method_title "Tên phương thức hiển thị"
        json additional "Thông tin bổ sung (gateway response, transaction ID...)"
        timestamp created_at "Ngày tạo"
        timestamp updated_at "Ngày cập nhật"
    }

    CART_PAYMENT {
        int id PK "ID thanh toán giỏ hàng"
        string method "Mã phương thức thanh toán"
        string method_title "Tên phương thức"
        json additional "Thông tin bổ sung"
        int cart_id FK "ID giỏ hàng"
        timestamp created_at "Ngày tạo"
        timestamp updated_at "Ngày cập nhật"
    }

    INVOICES {
        int id PK "ID hóa đơn"
        string increment_id "Mã hóa đơn"
        string state "Trạng thái (pending, paid, canceled)"
        boolean email_sent "Đã gửi email"
        int total_qty "Tổng số lượng"
        string base_currency_code "Mã tiền tệ cơ sở"
        string channel_currency_code "Mã tiền tệ kênh"
        string order_currency_code "Mã tiền tệ đơn hàng"
        decimal sub_total "Tổng tiền hàng"
        decimal base_sub_total "Tổng tiền hàng (base)"
        decimal grand_total "Tổng tiền"
        decimal base_grand_total "Tổng tiền (base)"
        decimal shipping_amount "Phí vận chuyển"
        decimal base_shipping_amount "Phí VC (base)"
        decimal tax_amount "Tiền thuế"
        decimal base_tax_amount "Tiền thuế (base)"
        decimal discount_amount "Tiền giảm giá"
        decimal base_discount_amount "Tiền giảm giá (base)"
        int order_id FK "ID đơn hàng"
        string transaction_id "ID giao dịch thanh toán"
        int reminders "Số lần nhắc nhở"
        timestamp next_reminder_at "Thời gian nhắc nhở tiếp"
        timestamp created_at "Ngày tạo"
        timestamp updated_at "Ngày cập nhật"
    }

    ORDERS {
        int id PK "ID đơn hàng"
        string increment_id UK "Mã đơn hàng"
        string status "Trạng thái đơn hàng"
        string coupon_code "Mã giảm giá đã dùng"
        decimal grand_total "Tổng tiền"
        decimal base_grand_total "Tổng tiền (base)"
        decimal grand_total_invoiced "Tổng tiền đã lập hóa đơn"
        decimal base_grand_total_invoiced "Tổng tiền đã lập HD (base)"
        decimal sub_total "Tổng tiền hàng"
        decimal base_sub_total "Tổng tiền hàng (base)"
        decimal discount_amount "Tiền giảm giá"
        decimal base_discount_amount "Tiền giảm giá (base)"
        decimal tax_amount "Tiền thuế"
        decimal base_tax_amount "Tiền thuế (base)"
        decimal shipping_amount "Phí vận chuyển"
        decimal base_shipping_amount "Phí VC (base)"
        string base_currency_code "Mã tiền tệ cơ sở"
        string order_currency_code "Mã tiền tệ đơn hàng"
        string applied_cart_rule_ids "Các rule đã áp dụng"
        int customer_id FK "ID khách hàng"
        int channel_id FK "ID kênh"
        timestamp created_at "Ngày đặt"
        timestamp updated_at "Ngày cập nhật"
    }

    CART {
        int id PK "ID giỏ hàng"
        string coupon_code "Mã giảm giá"
        decimal grand_total "Tổng tiền"
        decimal base_grand_total "Tổng tiền (base)"
        decimal sub_total "Tổng tiền hàng"
        decimal base_sub_total "Tổng tiền hàng (base)"
        decimal tax_total "Tổng thuế"
        decimal base_tax_total "Tổng thuế (base)"
        decimal discount_amount "Tiền giảm giá"
        decimal base_discount_amount "Tiền giảm giá (base)"
        string applied_cart_rule_ids "Các rule đã áp dụng"
        int customer_id FK "ID khách hàng"
        timestamp created_at "Ngày tạo"
        timestamp updated_at "Ngày cập nhật"
    }

    CART_ITEMS {
        int id PK "ID cart item"
        decimal price "Đơn giá"
        decimal base_price "Đơn giá (base)"
        decimal total "Thành tiền"
        decimal base_total "Thành tiền (base)"
        decimal tax_percent "% thuế"
        decimal tax_amount "Tiền thuế"
        decimal base_tax_amount "Tiền thuế (base)"
        decimal discount_amount "Tiền giảm giá"
        decimal base_discount_amount "Tiền giảm giá (base)"
        int cart_id FK "ID giỏ hàng"
        int tax_category_id FK "ID danh mục thuế"
        timestamp created_at "Ngày tạo"
        timestamp updated_at "Ngày cập nhật"
    }

    ORDER_ITEMS {
        int id PK "ID order item"
        decimal price "Đơn giá"
        decimal base_price "Đơn giá (base)"
        decimal total "Thành tiền"
        decimal base_total "Thành tiền (base)"
        decimal tax_percent "% thuế"
        decimal tax_amount "Tiền thuế"
        decimal base_tax_amount "Tiền thuế (base)"
        decimal discount_amount "Tiền giảm giá"
        decimal base_discount_amount "Tiền giảm giá (base)"
        int order_id FK "ID đơn hàng"
        int tax_category_id FK "ID danh mục thuế"
        timestamp created_at "Ngày tạo"
        timestamp updated_at "Ngày cập nhật"
    }

    CUSTOMERS {
        int id PK "ID khách hàng"
        string first_name "Tên"
        string last_name "Họ"
        string email UK "Email"
        string phone UK "Số điện thoại"
        int customer_group_id FK "ID nhóm khách hàng"
        timestamp created_at "Ngày tạo"
        timestamp updated_at "Ngày cập nhật"
    }

    CART_RULES {
        int id PK "ID rule giảm giá"
        string name "Tên rule"
        text description "Mô tả"
        date starts_from "Ngày bắt đầu"
        date ends_till "Ngày kết thúc"
        boolean status "Trạng thái"
        string coupon_type "Loại coupon (0=no, 1=specific, 2=auto)"
        boolean use_auto_generation "Tự động tạo coupon"
        int usage_per_customer "Giới hạn mỗi khách"
        int uses_per_coupon "Giới hạn mỗi coupon"
        int times_used "Số lần đã dùng"
        text conditions "Điều kiện áp dụng (JSON)"
        boolean end_other_rules "Kết thúc rules khác"
        string action_type "Loại hành động (by_percent, by_fixed, cart_fixed...)"
        decimal discount_amount "Số tiền/% giảm"
        decimal discount_quantity "Số lượng tối đa được giảm"
        int discount_step "Bước giảm"
        boolean apply_to_shipping "Áp dụng cho phí VC"
        boolean free_shipping "Miễn phí vận chuyển"
        int sort_order "Thứ tự ưu tiên"
        timestamp created_at "Ngày tạo"
        timestamp updated_at "Ngày cập nhật"
    }

    CART_RULE_COUPONS {
        int id PK "ID coupon"
        string code UK "Mã coupon"
        int usage_limit "Giới hạn sử dụng"
        int usage_per_customer "Giới hạn mỗi khách"
        int times_used "Số lần đã dùng"
        string type "Loại (0=shared, 1=unique)"
        boolean is_primary "Là coupon chính"
        date expired_at "Ngày hết hạn"
        int cart_rule_id FK "ID cart rule"
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

    TAX_RATES {
        int id PK "ID mức thuế"
        string identifier UK "Mã định danh"
        boolean is_zip "Theo mã bưu điện"
        string zip_code "Mã bưu điện"
        string zip_from "Từ mã BP"
        string zip_to "Đến mã BP"
        string state "Mã tỉnh/thành"
        string country "Mã quốc gia"
        decimal tax_rate "% thuế"
        timestamp created_at "Ngày tạo"
        timestamp updated_at "Ngày cập nhật"
    }

    TAX_CATEGORIES_TAX_RATES {
        int id PK "ID"
        int tax_category_id PK_FK "ID danh mục thuế"
        int tax_rate_id PK_FK "ID mức thuế"
        timestamp created_at "Ngày tạo"
        timestamp updated_at "Ngày cập nhật"
    }
```

## Mô tả các bảng chính

### 1. ORDER_PAYMENT (Thanh toán đơn hàng)
- Lưu thông tin phương thức thanh toán đã chọn
- Chứa dữ liệu từ payment gateway (transaction ID, response...)
- Một đơn hàng chỉ có một phương thức thanh toán chính

### 2. CART_PAYMENT (Thanh toán giỏ hàng)
- Lưu phương thức thanh toán được chọn trong quá trình checkout
- Sẽ được copy sang ORDER_PAYMENT khi tạo đơn hàng

### 3. INVOICES (Hóa đơn)
- Chứng từ yêu cầu thanh toán
- Tracking trạng thái thanh toán (pending/paid)
- Lưu transaction_id từ payment gateway
- Hỗ trợ partial invoicing

### 4. CART_RULES & CART_RULE_COUPONS (Mã giảm giá)
- Quản lý các chương trình khuyến mãi
- Hỗ trợ nhiều loại giảm giá: theo %, theo số tiền cố định, miễn phí ship...
- Có thể giới hạn số lần sử dụng, thời gian, đối tượng áp dụng

### 5. TAX_CATEGORIES & TAX_RATES (Thuế)
- Quản lý các loại thuế và mức thuế
- Hỗ trợ tính thuế theo địa lý (quốc gia, tỉnh/thành, mã bưu điện)
- Many-to-Many relationship để linh hoạt áp dụng

## Quy trình nghiệp vụ

### 1. Quy trình thanh toán chuẩn

```
CART + CART_PAYMENT (chọn phương thức)
    ↓
CART (áp dụng COUPON, tính TAX)
    ↓
ORDER + ORDER_PAYMENT (copy từ CART_PAYMENT)
    ↓
INVOICE (pending)
    ↓
Payment Gateway Processing
    ↓
INVOICE (paid) + cập nhật ORDER_PAYMENT.additional
    ↓
ORDER.grand_total_invoiced được cập nhật
```

### 2. Các phương thức thanh toán phổ biến

- **Cash On Delivery (COD)**: Thanh toán khi nhận hàng
- **Bank Transfer**: Chuyển khoản ngân hàng
- **Online Payment**: PayPal, Stripe, VNPay, MoMo...
- **E-wallet**: Ví điện tử

### 3. Luồng áp dụng mã giảm giá

```
1. Khách hàng nhập COUPON CODE
2. Validate CART_RULE_COUPONS:
   - Kiểm tra code tồn tại
   - Kiểm tra hạn sử dụng (expired_at)
   - Kiểm tra số lần dùng (times_used vs usage_limit)
   - Kiểm tra điều kiện (CART_RULES.conditions)
3. Áp dụng CART_RULES.action_type:
   - by_percent: Giảm theo %
   - by_fixed: Giảm số tiền cố định
   - cart_fixed: Giảm cố định cho toàn giỏ
   - buy_x_get_y: Mua X tặng Y
4. Tính toán discount_amount cho CART và CART_ITEMS
5. Cập nhật times_used của CART_RULE_COUPONS
6. Lưu coupon_code và applied_cart_rule_ids vào CART/ORDER
```

### 4. Luồng tính thuế

```
1. Xác định TAX_CATEGORY của sản phẩm (từ CART_ITEMS/ORDER_ITEMS)
2. Lấy địa chỉ giao hàng (country, state, zip_code)
3. Tìm TAX_RATES phù hợp:
   - Theo TAX_CATEGORIES_TAX_RATES
   - Filter theo địa lý
4. Tính tax_amount = (price × quantity × tax_rate / 100)
5. Cập nhật tax_amount vào CART_ITEMS/ORDER_ITEMS
6. Tổng hợp tax_total vào CART/ORDER
```

## Công thức tính toán

### Tính tổng tiền giỏ hàng/đơn hàng:
```
sub_total = Σ(item.price × item.quantity)
discount_amount = Tính theo CART_RULES
tax_amount = Σ(item.tax_amount)
shipping_amount = Từ CART_SHIPPING_RATES
grand_total = sub_total - discount_amount + tax_amount + shipping_amount
```

### Tính thuế cho từng item:
```
item_tax_amount = (item.price × item.quantity) × (tax_rate / 100)
```

### Tính giảm giá:
```
# Theo phần trăm
discount_amount = sub_total × (discount_percent / 100)

# Theo số tiền cố định
discount_amount = discount_value (với giới hạn không vượt quá sub_total)

# Buy X Get Y
discount_amount = price_of_y × (qty / x) × y
```

## Ràng buộc và quy tắc

1. **Payment Method**: Bắt buộc chọn trước khi checkout
2. **Invoice Amount**: Tổng invoice amount không được vượt quá order grand_total
3. **Coupon Usage**: `times_used ≤ usage_limit`
4. **Discount**: `discount_amount ≤ sub_total`
5. **Tax Rate**: `0 ≤ tax_rate ≤ 100`
6. **Currency Consistency**: Tất cả các giá trị phải thống nhất về currency code

## Các trạng thái quan trọng

### Invoice State:
- `pending`: Chờ thanh toán
- `paid`: Đã thanh toán
- `canceled`: Đã hủy

### Order Status (liên quan đến payment):
- `pending`: Chờ thanh toán
- `pending_payment`: Chờ xác nhận thanh toán
- `processing`: Đã thanh toán, đang xử lý
- `payment_review`: Đang review thanh toán
