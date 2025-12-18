# ERD - INVENTORY MANAGEMENT (Quản lý kho)

## Sơ đồ ERD mức khái niệm

```mermaid
erDiagram
    PRODUCTS ||--o{ PRODUCT_INVENTORIES : "có tồn kho"
    PRODUCTS ||--o{ PRODUCT_INVENTORY_INDICES : "có chỉ số tồn kho"
    PRODUCTS ||--o{ PRODUCT_ORDERED_INVENTORIES : "có hàng đã đặt"
    INVENTORY_SOURCES ||--o{ PRODUCT_INVENTORIES : "quản lý"
    CHANNELS ||--o{ PRODUCT_INVENTORY_INDICES : "theo"
    CHANNELS ||--o{ PRODUCT_ORDERED_INVENTORIES : "theo"
    ORDER_ITEMS ||--o{ PRODUCT_ORDERED_INVENTORIES : "tạo ra"
    CART_ITEMS ||--o{ CART_ITEM_INVENTORIES : "phân bổ từ"
    INVENTORY_SOURCES ||--o{ CART_ITEM_INVENTORIES : "cung cấp"
    SHIPMENTS }o--|| INVENTORY_SOURCES : "xuất từ"
    SHIPMENTS ||--o{ SHIPMENT_ITEMS : "chứa"
    ORDER_ITEMS ||--o{ SHIPMENT_ITEMS : "được giao"

    PRODUCTS {
        int id PK "ID sản phẩm"
        string sku UK "Mã SKU"
        string type "Loại sản phẩm"
        int parent_id FK "ID sản phẩm cha"
        timestamp created_at "Ngày tạo"
        timestamp updated_at "Ngày cập nhật"
    }

    INVENTORY_SOURCES {
        int id PK "ID nguồn kho"
        string code UK "Mã kho"
        string name "Tên kho"
        text description "Mô tả"
        string contact_name "Tên người liên hệ"
        string contact_email "Email liên hệ"
        string contact_number "Số điện thoại"
        string contact_fax "Số fax"
        string country "Quốc gia"
        string state "Tỉnh/Thành phố"
        string city "Quận/Huyện"
        string street "Đường"
        string postcode "Mã bưu điện"
        int priority "Độ ưu tiên (0-100)"
        decimal latitude "Vĩ độ"
        decimal longitude "Kinh độ"
        boolean status "Trạng thái (active/inactive)"
        timestamp created_at "Ngày tạo"
        timestamp updated_at "Ngày cập nhật"
    }

    PRODUCT_INVENTORIES {
        int id PK "ID tồn kho"
        int qty "Số lượng tồn kho thực tế"
        int product_id FK "ID sản phẩm"
        int vendor_id "ID nhà cung cấp"
        int inventory_source_id FK "ID nguồn kho"
    }

    PRODUCT_INVENTORY_INDICES {
        int id PK "ID chỉ số tồn kho"
        int qty "Số lượng tồn kho khả dụng"
        int product_id FK "ID sản phẩm"
        int channel_id FK "ID kênh bán hàng"
        timestamp created_at "Ngày tạo"
        timestamp updated_at "Ngày cập nhật"
    }

    PRODUCT_ORDERED_INVENTORIES {
        int id PK "ID hàng đã đặt"
        int qty "Số lượng hàng đã đặt nhưng chưa giao"
        int product_id FK "ID sản phẩm"
        int channel_id FK "ID kênh bán hàng"
    }

    CART_ITEM_INVENTORIES {
        int id PK "ID"
        int qty "Số lượng phân bổ"
        int inventory_source_id FK "ID nguồn kho"
        int cart_item_id FK "ID cart item"
        timestamp created_at "Ngày tạo"
        timestamp updated_at "Ngày cập nhật"
    }

    CART_ITEMS {
        int id PK "ID cart item"
        int quantity "Số lượng"
        string sku "Mã SKU"
        string name "Tên sản phẩm"
        int product_id FK "ID sản phẩm"
        int cart_id FK "ID giỏ hàng"
        timestamp created_at "Ngày tạo"
        timestamp updated_at "Ngày cập nhật"
    }

    ORDER_ITEMS {
        int id PK "ID order item"
        string sku "Mã SKU"
        string name "Tên sản phẩm"
        int qty_ordered "Số lượng đặt"
        int qty_shipped "Số lượng đã giao"
        int qty_canceled "Số lượng đã hủy"
        int qty_refunded "Số lượng đã hoàn"
        int product_id FK "ID sản phẩm"
        int order_id FK "ID đơn hàng"
        timestamp created_at "Ngày tạo"
        timestamp updated_at "Ngày cập nhật"
    }

    ORDERS {
        int id PK "ID đơn hàng"
        string increment_id UK "Mã đơn hàng"
        string status "Trạng thái"
        int total_qty_ordered "Tổng số lượng đặt"
        int customer_id FK "ID khách hàng"
        int channel_id FK "ID kênh"
        timestamp created_at "Ngày tạo"
        timestamp updated_at "Ngày cập nhật"
    }

    SHIPMENTS {
        int id PK "ID vận đơn"
        string increment_id "Mã vận đơn"
        string status "Trạng thái"
        int total_qty "Tổng số lượng giao"
        int total_weight "Tổng trọng lượng"
        string carrier_code "Mã đơn vị vận chuyển"
        string carrier_title "Tên đơn vị VC"
        string track_number "Mã tracking"
        boolean email_sent "Đã gửi email"
        int order_id FK "ID đơn hàng"
        int inventory_source_id FK "ID nguồn kho xuất hàng"
        string inventory_source_name "Tên nguồn kho"
        timestamp created_at "Ngày tạo"
        timestamp updated_at "Ngày cập nhật"
    }

    SHIPMENT_ITEMS {
        int id PK "ID shipment item"
        string name "Tên sản phẩm"
        string sku "Mã SKU"
        int qty "Số lượng giao"
        decimal weight "Trọng lượng"
        int product_id FK "ID sản phẩm"
        int order_item_id FK "ID order item"
        int shipment_id FK "ID vận đơn"
        timestamp created_at "Ngày tạo"
        timestamp updated_at "Ngày cập nhật"
    }

    CHANNELS {
        int id PK "ID kênh"
        string code UK "Mã kênh"
        string name "Tên kênh"
        timestamp created_at "Ngày tạo"
        timestamp updated_at "Ngày cập nhật"
    }
```

## Mô tả các bảng chính

### 1. INVENTORY_SOURCES (Nguồn kho)
- Quản lý các kho hàng/warehouse
- Lưu trữ thông tin địa lý để tính khoảng cách và phí vận chuyển
- Priority: Độ ưu tiên khi phân bổ hàng (số càng nhỏ càng ưu tiên)
- Hỗ trợ multi-warehouse system

### 2. PRODUCT_INVENTORIES (Tồn kho thực tế)
- Lưu số lượng tồn kho thực tế của sản phẩm tại từng kho
- Unique constraint: `(product_id, inventory_source_id, vendor_id)`
- Được cập nhật khi:
  - Nhập hàng (+)
  - Xuất hàng khi giao (-)
  - Điều chỉnh kho
  - Hoàn hàng (+)

### 3. PRODUCT_INVENTORY_INDICES (Tồn kho khả dụng)
- Là bảng index/cache để query nhanh tồn kho khả dụng
- Tính toán: `qty = Σ(PRODUCT_INVENTORIES.qty) - PRODUCT_ORDERED_INVENTORIES.qty`
- Được tổng hợp theo channel
- Cập nhật bất đồng bộ (background job)

### 4. PRODUCT_ORDERED_INVENTORIES (Hàng đã đặt)
- Lưu số lượng hàng đã được đặt nhưng chưa xuất kho
- Unique constraint: `(product_id, channel_id)`
- Được cập nhật khi:
  - Tạo đơn hàng (+)
  - Xuất hàng/giao hàng (-)
  - Hủy đơn hàng (-)

### 5. CART_ITEM_INVENTORIES (Phân bổ tồn kho giỏ hàng)
- Phân bổ số lượng sản phẩm từ các kho khác nhau
- Giúp reserve tồn kho tạm thời cho giỏ hàng
- Tổng qty phải bằng quantity của cart_item

### 6. SHIPMENTS & SHIPMENT_ITEMS (Vận đơn)
- Tracking quá trình xuất kho và giao hàng
- Liên kết với INVENTORY_SOURCE để biết hàng xuất từ kho nào
- Cập nhật qty_shipped của ORDER_ITEMS

## Quy trình nghiệp vụ

### 1. Kiểm tra tồn kho khi thêm vào giỏ

```
1. Lấy quantity cần thêm
2. Query PRODUCT_INVENTORY_INDICES:
   - WHERE product_id = ? AND channel_id = ?
   - Check: available_qty >= requested_qty
3. Nếu đủ hàng:
   - Tạo/Cập nhật CART_ITEMS
   - Phân bổ CART_ITEM_INVENTORIES theo priority của INVENTORY_SOURCES
4. Nếu không đủ:
   - Hiển thị thông báo "Out of stock" hoặc "Only X available"
```

### 2. Đặt hàng (Order Placement)

```
1. Validate tồn kho lần cuối
2. Tạo ORDER từ CART
3. Tăng PRODUCT_ORDERED_INVENTORIES:
   - qty += order_item.qty_ordered
4. Background job cập nhật PRODUCT_INVENTORY_INDICES:
   - qty = actual_inventory - ordered_inventory
5. Clear CART_ITEM_INVENTORIES
```

### 3. Xuất kho và giao hàng (Shipping)

```
1. Chọn INVENTORY_SOURCE để xuất hàng (theo priority hoặc gần khách nhất)
2. Tạo SHIPMENT:
   - Gán inventory_source_id
   - Tạo SHIPMENT_ITEMS từ ORDER_ITEMS
3. Giảm PRODUCT_INVENTORIES tại kho xuất:
   - qty -= shipment_item.qty
4. Giảm PRODUCT_ORDERED_INVENTORIES:
   - qty -= shipment_item.qty
5. Cập nhật ORDER_ITEMS:
   - qty_shipped += shipment_item.qty
6. Background job cập nhật PRODUCT_INVENTORY_INDICES
```

### 4. Hủy đơn (Order Cancellation)

```
1. Lấy ORDER_ITEMS với qty chưa ship
2. Giảm PRODUCT_ORDERED_INVENTORIES:
   - qty -= (order_item.qty_ordered - order_item.qty_shipped)
3. Cập nhật ORDER_ITEMS:
   - qty_canceled = qty_ordered - qty_shipped
4. Background job cập nhật PRODUCT_INVENTORY_INDICES:
   - Tồn kho khả dụng tăng lên
```

### 5. Hoàn hàng (Refund/Return)

```
1. Tạo REFUND với REFUND_ITEMS
2. Khi hàng về kho:
   - Chọn INVENTORY_SOURCE nhận hàng
   - Tăng PRODUCT_INVENTORIES.qty
   - Cập nhật ORDER_ITEMS.qty_refunded
3. Background job cập nhật PRODUCT_INVENTORY_INDICES
```

### 6. Nhập hàng (Stock Receiving)

```
1. Chọn INVENTORY_SOURCE
2. Nhập số lượng cho từng sản phẩm
3. Tăng PRODUCT_INVENTORIES:
   - qty += received_qty
4. Background job cập nhật PRODUCT_INVENTORY_INDICES
```

### 7. Điều chuyển kho (Stock Transfer)

```
1. Chọn source_warehouse và destination_warehouse
2. Giảm PRODUCT_INVENTORIES tại source:
   - qty -= transfer_qty
3. Tăng PRODUCT_INVENTORIES tại destination:
   - qty += transfer_qty
4. Background job cập nhật PRODUCT_INVENTORY_INDICES
```

## Công thức tính toán

### Tồn kho khả dụng (Available Stock):
```
available_qty = Σ(PRODUCT_INVENTORIES.qty for all sources) 
              - PRODUCT_ORDERED_INVENTORIES.qty
```

### Tồn kho theo kho (Stock per Warehouse):
```
warehouse_stock = PRODUCT_INVENTORIES.qty 
                WHERE inventory_source_id = ?
```

### Allocation Strategy (Phân bổ kho):
```
1. Sort INVENTORY_SOURCES by priority ASC
2. For each source with status = 1:
   - Check PRODUCT_INVENTORIES.qty > 0
   - Allocate min(required_qty, available_qty)
   - required_qty -= allocated_qty
   - If required_qty = 0: break
```

## Ràng buộc quan trọng

1. **Non-negative Stock**: `PRODUCT_INVENTORIES.qty >= 0`
2. **Inventory Balance**: 
   ```
   PRODUCT_INVENTORY_INDICES.qty = 
       Σ(PRODUCT_INVENTORIES.qty) - PRODUCT_ORDERED_INVENTORIES.qty
   ```
3. **Cart Allocation**: 
   ```
   Σ(CART_ITEM_INVENTORIES.qty) = CART_ITEMS.quantity
   ```
4. **Shipment Quantity**: 
   ```
   Σ(SHIPMENT_ITEMS.qty) <= ORDER_ITEMS.qty_ordered
   ```
5. **Ordered Inventory**: 
   ```
   PRODUCT_ORDERED_INVENTORIES.qty >= 0
   ```

## Các chỉ số quan trọng (KPIs)

1. **Stock Level**: Số lượng tồn kho hiện tại
2. **Available Stock**: Tồn kho khả dụng (trừ đi đã đặt)
3. **Pending Orders**: Số lượng hàng đã đặt chưa giao
4. **Stock Turnover**: Vòng quay kho
5. **Out of Stock Rate**: Tỷ lệ hết hàng
6. **Warehouse Utilization**: Tỷ lệ sử dụng kho

## Các trạng thái quan trọng

### Shipment Status:
- `pending`: Chờ chuẩn bị hàng
- `processing`: Đang đóng gói
- `ready_to_ship`: Sẵn sàng giao
- `shipped`: Đã giao cho đơn vị vận chuyển
- `delivered`: Đã giao thành công
- `returned`: Đã hoàn trả

### Inventory Source Status:
- `1` (active): Đang hoạt động
- `0` (inactive): Tạm ngưng

## Chiến lược phân bổ kho (Allocation Strategy)

1. **Priority-based**: Ưu tiên theo INVENTORY_SOURCES.priority
2. **Distance-based**: Ưu tiên kho gần khách hàng nhất (dựa vào latitude/longitude)
3. **Stock level-based**: Ưu tiên kho có nhiều hàng nhất
4. **Hybrid**: Kết hợp các yếu tố trên
