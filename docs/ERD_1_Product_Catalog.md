# ERD - PRODUCT CATALOG (Danh mục sản phẩm)

## Sơ đồ ERD mức khái niệm

```mermaid
erDiagram
    PRODUCTS ||--o{ PRODUCT_CATEGORIES : "thuộc về"
    PRODUCTS ||--o{ PRODUCT_ATTRIBUTE_VALUES : "có"
    PRODUCTS ||--o{ PRODUCT_IMAGES : "có"
    PRODUCTS ||--o{ PRODUCT_REVIEWS : "có"
    PRODUCTS ||--o{ PRODUCT_INVENTORIES : "có"
    PRODUCTS }o--|| ATTRIBUTE_FAMILIES : "thuộc"
    CATEGORIES ||--o{ PRODUCT_CATEGORIES : "chứa"
    CATEGORIES ||--o{ CATEGORY_TRANSLATIONS : "có"
    ATTRIBUTES ||--o{ PRODUCT_ATTRIBUTE_VALUES : "mô tả"
    INVENTORY_SOURCES ||--o{ PRODUCT_INVENTORIES : "quản lý"

    PRODUCTS {
        int id PK "ID sản phẩm"
        string sku UK "Mã SKU duy nhất"
        string type "Loại sản phẩm (simple, configurable, bundle...)"
        int parent_id FK "ID sản phẩm cha (nếu có)"
        int attribute_family_id FK "ID nhóm thuộc tính"
        json additional "Dữ liệu bổ sung"
        timestamp created_at "Ngày tạo"
        timestamp updated_at "Ngày cập nhật"
    }

    CATEGORIES {
        int id PK "ID danh mục"
        int position "Vị trí sắp xếp"
        string image "Hình ảnh danh mục"
        string category_banner "Banner danh mục"
        boolean status "Trạng thái (active/inactive)"
        string display_mode "Chế độ hiển thị"
        int _lft "Left boundary (nested set)"
        int _rgt "Right boundary (nested set)"
        int parent_id FK "ID danh mục cha"
        json additional "Dữ liệu bổ sung"
        timestamp created_at "Ngày tạo"
        timestamp updated_at "Ngày cập nhật"
    }

    CATEGORY_TRANSLATIONS {
        int id PK "ID"
        int category_id FK "ID danh mục"
        string name "Tên danh mục"
        string slug UK "Đường dẫn URL"
        text description "Mô tả"
        text meta_title "Tiêu đề SEO"
        text meta_description "Mô tả SEO"
        text meta_keywords "Từ khóa SEO"
        string locale_id "Mã ngôn ngữ"
        timestamp created_at "Ngày tạo"
        timestamp updated_at "Ngày cập nhật"
    }

    PRODUCT_CATEGORIES {
        int product_id PK_FK "ID sản phẩm"
        int category_id PK_FK "ID danh mục"
    }

    ATTRIBUTES {
        int id PK "ID thuộc tính"
        string code UK "Mã thuộc tính"
        string admin_name "Tên hiển thị admin"
        string type "Kiểu dữ liệu (text, select, price...)"
        string swatch_type "Kiểu swatch (color, image...)"
        string validation "Quy tắc validation"
        int position "Vị trí sắp xếp"
        boolean is_required "Bắt buộc"
        boolean is_unique "Duy nhất"
        boolean is_filterable "Có thể lọc"
        boolean is_comparable "Có thể so sánh"
        boolean is_configurable "Có thể cấu hình"
        boolean is_user_defined "Do người dùng định nghĩa"
        boolean is_visible_on_front "Hiển thị frontend"
        boolean value_per_locale "Giá trị theo ngôn ngữ"
        boolean value_per_channel "Giá trị theo kênh"
        boolean enable_wysiwyg "Bật editor WYSIWYG"
        timestamp created_at "Ngày tạo"
        timestamp updated_at "Ngày cập nhật"
    }

    ATTRIBUTE_FAMILIES {
        int id PK "ID nhóm thuộc tính"
        string code UK "Mã nhóm"
        string name "Tên nhóm"
        boolean status "Trạng thái"
        boolean is_user_defined "Do người dùng định nghĩa"
        timestamp created_at "Ngày tạo"
        timestamp updated_at "Ngày cập nhật"
    }

    PRODUCT_ATTRIBUTE_VALUES {
        int id PK "ID"
        int product_id FK "ID sản phẩm"
        int attribute_id FK "ID thuộc tính"
        string locale "Mã ngôn ngữ"
        string channel "Kênh bán hàng"
        text text_value "Giá trị dạng text"
        boolean boolean_value "Giá trị dạng boolean"
        int integer_value "Giá trị dạng integer"
        decimal float_value "Giá trị dạng float"
        datetime datetime_value "Giá trị dạng datetime"
        date date_value "Giá trị dạng date"
        json json_value "Giá trị dạng JSON"
        timestamp created_at "Ngày tạo"
        timestamp updated_at "Ngày cập nhật"
    }

    PRODUCT_IMAGES {
        int id PK "ID hình ảnh"
        string type "Loại (image)"
        string path "Đường dẫn file"
        int product_id FK "ID sản phẩm"
        int position "Vị trí sắp xếp"
        timestamp created_at "Ngày tạo"
        timestamp updated_at "Ngày cập nhật"
    }

    PRODUCT_REVIEWS {
        int id PK "ID đánh giá"
        string title "Tiêu đề"
        decimal rating "Điểm đánh giá (1-5)"
        text comment "Nội dung đánh giá"
        string status "Trạng thái (approved, pending, disapproved)"
        int product_id FK "ID sản phẩm"
        int customer_id FK "ID khách hàng"
        string name "Tên người đánh giá"
        timestamp created_at "Ngày tạo"
        timestamp updated_at "Ngày cập nhật"
    }

    PRODUCT_INVENTORIES {
        int id PK "ID tồn kho"
        int qty "Số lượng"
        int product_id FK "ID sản phẩm"
        int vendor_id "ID nhà cung cấp"
        int inventory_source_id FK "ID nguồn kho"
    }

    INVENTORY_SOURCES {
        int id PK "ID nguồn kho"
        string code UK "Mã nguồn kho"
        string name "Tên nguồn kho"
        text description "Mô tả"
        string contact_name "Tên liên hệ"
        string contact_email "Email liên hệ"
        string contact_number "Số điện thoại"
        string contact_fax "Số fax"
        string country "Quốc gia"
        string state "Tỉnh/Thành phố"
        string city "Quận/Huyện"
        string street "Đường"
        string postcode "Mã bưu điện"
        int priority "Độ ưu tiên"
        decimal latitude "Vĩ độ"
        decimal longitude "Kinh độ"
        boolean status "Trạng thái"
        timestamp created_at "Ngày tạo"
        timestamp updated_at "Ngày cập nhật"
    }
```

## Mô tả các bảng chính

### 1. PRODUCTS (Sản phẩm)
- Bảng trung tâm lưu trữ thông tin sản phẩm
- Hỗ trợ nhiều loại sản phẩm: simple, configurable, bundle, grouped, downloadable
- Có quan hệ tự liên kết để xử lý sản phẩm phức tạp

### 2. CATEGORIES (Danh mục)
- Quản lý cây danh mục sản phẩm bằng Nested Set Model
- Hỗ trợ danh mục đa cấp không giới hạn
- Có hình ảnh và banner riêng

### 3. ATTRIBUTES (Thuộc tính)
- Định nghĩa các thuộc tính có thể gán cho sản phẩm
- Hỗ trợ nhiều kiểu dữ liệu
- Có thể cấu hình cho filter, compare, configuration

### 4. PRODUCT_INVENTORIES (Tồn kho sản phẩm)
- Quản lý số lượng tồn kho theo từng nguồn kho
- Hỗ trợ multi-warehouse
- Tracking theo vendor

## Mối quan hệ chính

1. **Sản phẩm - Danh mục**: Many-to-Many qua `PRODUCT_CATEGORIES`
2. **Sản phẩm - Thuộc tính**: Many-to-Many qua `PRODUCT_ATTRIBUTE_VALUES`
3. **Sản phẩm - Hình ảnh**: One-to-Many
4. **Sản phẩm - Đánh giá**: One-to-Many
5. **Sản phẩm - Tồn kho**: One-to-Many (theo nguồn kho)
6. **Danh mục - Đa ngôn ngữ**: One-to-Many qua `CATEGORY_TRANSLATIONS`
