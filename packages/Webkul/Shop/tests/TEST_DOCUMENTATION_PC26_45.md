# Tài Liệu Kiểm Thử - Test Cases PC_26 đến PC_45

**Dự án:** Bagisto E-commerce Platform  
**Module:** Product Catalog & Shopping Cart  
**Framework Test:** Pest PHP  
**Ngày cập nhật:** 17/12/2025

---

## Integration Tests (Kiểm Thử Tích Hợp) - PC_26 đến PC_45

| ID | Mô Tả Test Case | Quy Trình Test Case | Kết Quả Mong Đợi | Phụ Thuộc Test Case | Result | Test Date | Test-Data | Note |
|---|---|---|---|---|---|---|---|---|
| **PC_26** | Cho phép Product Manager xem chi tiết sản phẩm để chỉnh sửa (Product Catalog) | 1. Tạo sản phẩm mới. 2. Lấy chi tiết sản phẩm theo ID. 3. Kiểm tra tất cả thuộc tính được trả về | Chi tiết sản phẩm được trả về với tất cả các trường thông tin | PC_03 | Pass | 2025-12-17 | product_id: auto-generated, ProductFaker::createSimple() | Xem sản phẩm để chỉnh sửa |
| **PC_27** | Cho phép Product Manager cập nhật thông tin sản phẩm (Product Catalog) | 1. Tạo sản phẩm mới. 2. Cập nhật trạng thái sản phẩm thành disabled (0) trong bảng product_flat. 3. Kiểm tra database đã cập nhật | Trạng thái sản phẩm được cập nhật thành công trong bảng product_flat | PC_03 | Pass | 2025-12-17 | DB::table('product_flat')->update(['status' => 0]) | Cập nhật sản phẩm qua product_flat table |
| **PC_28** | Cho phép Product Manager xóa sản phẩm (Product Catalog) | 1. Tạo sản phẩm mới. 2. Xóa sản phẩm theo ID. 3. Kiểm tra sản phẩm không còn trong database | Sản phẩm bị xóa thành công | PC_03 | Pass | 2025-12-17 | product_id: auto-generated, ProductFaker::createSimple() | Xóa sản phẩm |
| **PC_29** | Hiển thị cấu trúc phân cấp danh mục sản phẩm (Product Catalog) | 1. Tạo danh mục cha. 2. Tạo danh mục con. 3. Kiểm tra cấu trúc phân cấp được trả về đúng | Danh mục được hiển thị theo cấu trúc cây với _lft và _rgt | None | Pass | 2025-12-17 | CategoryFaker::create() với parent_id, nested set model (_lft, _rgt) | Hiển thị cây danh mục |
| **PC_30** | Cho phép tạo danh mục sản phẩm mới (Product Catalog) | 1. Chuẩn bị dữ liệu danh mục. 2. Tạo danh mục mới. 3. Kiểm tra danh mục trong database | Danh mục được tạo với slug tự động và cấu trúc phân cấp | None | Pass | 2025-12-17 | name: "New Category", slug: auto-generated, CategoryFaker::create() | Tạo danh mục |
| **PC_31** | Gán sản phẩm vào danh mục thành công (Product Catalog) | 1. Tạo sản phẩm và danh mục. 2. Gán sản phẩm vào danh mục qua attach(). 3. Load lại relationship và kiểm tra | Sản phẩm có danh mục trong collection categories | PC_03, PC_30 | Pass | 2025-12-17 | $product->categories()->attach($category->id), $product->load('categories') | Gán sản phẩm vào danh mục |
| **PC_32** | Hiển thị số lượng tồn kho sản phẩm (Product Catalog) | 1. Tạo sản phẩm với inventory. 2. Lấy thông tin inventory. 3. Kiểm tra số lượng được hiển thị | Số lượng tồn kho được trả về chính xác | PC_03 | Pass | 2025-12-17 | ProductInventory với qty=100 | Hiển thị tồn kho |
| **PC_33** | Cho phép cập nhật số lượng tồn kho sản phẩm (Product Catalog) | 1. Tạo sản phẩm với inventory ban đầu. 2. Cập nhật số lượng mới. 3. Kiểm tra database đã cập nhật | Số lượng tồn kho được cập nhật thành công | PC_03 | Pass | 2025-12-17 | Inventory ban đầu: qty=100, Cập nhật: qty=150 | Cập nhật tồn kho |
| **PC_34** | Tạo thuộc tính sản phẩm với các tùy chọn (Product Catalog) | 1. Chuẩn bị dữ liệu thuộc tính. 2. Tạo attribute (ví dụ: "Color"). 3. Thêm options (Red, Blue, Green). 4. Kiểm tra creation | Thuộc tính được tạo với các options | None | Pass | 2025-12-17 | Attribute: code="color", label="Color", type="select", Options: ["Red", "Blue", "Green"] | Tạo attribute |
| **PC_35** | Hiển thị mini-cart với số lượng item chính xác (Shopping Cart) | 1. Thêm nhiều sản phẩm vào giỏ hàng. 2. Lấy dữ liệu mini-cart. 3. Kiểm tra số lượng items | Mini-cart hiển thị số lượng items chính xác | PC_18 | Pass | 2025-12-17 | 2 sản phẩm khác nhau trong cart, items_count | Hiển thị mini-cart |
| **PC_36** | Hiển thị giỏ hàng chi tiết với tất cả items và giá (Shopping Cart) | 1. Thêm nhiều sản phẩm vào giỏ hàng. 2. Gọi cart()->collectTotals(). 3. Kiểm tra tất cả items và giá được hiển thị | Giỏ hàng hiển thị tất cả items với giá riêng lẻ | PC_18 | Pass | 2025-12-17 | 3 sản phẩm với giá khác nhau, cart()->collectTotals() để tính totals | Hiển thị giỏ hàng chi tiết |
| **PC_37** | Xóa item khỏi giỏ hàng thành công (Shopping Cart) | 1. Thêm sản phẩm vào giỏ hàng. 2. Xóa item cụ thể. 3. Kiểm tra item đã bị xóa | Item bị xóa khỏi giỏ hàng | PC_18 | Pass | 2025-12-17 | cart_item_id: auto-generated, removeItem() method | Xóa item khỏi cart |
| **PC_38** | Tính tổng giỏ hàng bao gồm thuế và giảm giá (Shopping Cart) | 1. Thêm sản phẩm vào giỏ hàng. 2. Gọi cart()->collectTotals(). 3. Kiểm tra tính toán tổng | Tổng giỏ hàng được tính với thuế và giảm giá | PC_18 | Pass | 2025-12-17 | Sản phẩm với tax rules, discount rules, cart()->collectTotals() | Tính tổng giỏ hàng |
| **PC_39** | Kiểm tra giỏ hàng có items trước khi checkout (Shopping Cart) | 1. Tạo giỏ hàng trống. 2. Thử checkout. 3. Kiểm tra lỗi validation | Lỗi: Giỏ hàng trống | None | Pass | 2025-12-17 | Empty cart với items_count: 0 | Validation checkout |
| **PC_40** | Phân trang danh sách sản phẩm chính xác (Product Catalog) | 1. Tạo 15 sản phẩm. 2. Đặt page size = 10. 3. Kiểm tra phân trang | Trang đầu hiển thị 10, trang hai hiển thị 5 | None | Pass | 2025-12-17 | 15 sản phẩm, page_size: 10, pagination | Phân trang sản phẩm |
| **PC_41** | Xử lý kết quả tìm kiếm trống một cách hợp lý (Product Catalog) | 1. Tìm kiếm từ khóa không tồn tại. 2. Kiểm tra xử lý kết quả trống | Mảng rỗng được trả về, không có lỗi | None | Pass | 2025-12-17 | Search term: "XYZ123NotFound" | Xử lý empty search |
| **PC_42** | Cho phép xóa coupon đã áp dụng khỏi giỏ hàng (Shopping Cart) | 1. Thêm sản phẩm vào giỏ hàng. 2. Áp dụng coupon. 3. Xóa coupon. 4. Kiểm tra tổng được khôi phục | Coupon bị xóa, tổng ban đầu được khôi phục | PC_18, PC_22 | Pass | 2025-12-17 | Coupon: "SAVE10" được áp dụng sau đó xóa | Xóa coupon |
| **PC_43** | Hiển thị trạng thái tồn kho trên trang chi tiết sản phẩm (Product Catalog) | 1. Tạo sản phẩm với thông tin tồn kho. 2. Truy cập trang chi tiết sản phẩm. 3. Kiểm tra trạng thái tồn kho được hiển thị | Trạng thái tồn kho hiển thị: "Còn hàng" hoặc "Hết hàng" | PC_03 | Pass | 2025-12-17 | Product với stock: 50, isSaleable() method | Hiển thị trạng thái stock |
| **PC_44** | Áp dụng nhiều bộ lọc đồng thời (Product Catalog) | 1. Tạo nhiều sản phẩm khác nhau. 2. Áp dụng bộ lọc giá + size. 3. Kiểm tra kết quả khớp tất cả tiêu chí | Sản phẩm khớp tất cả các bộ lọc được trả về | None | Pass | 2025-12-17 | Filters: price 50-150, size "M", multiple filters combined | Kết hợp nhiều filter |
| **PC_45** | Đảm bảo SKU duy nhất trên toàn bộ sản phẩm (Product Catalog) | 1. Tạo sản phẩm với SKU. 2. Thử tạo sản phẩm khác với cùng SKU. 3. Kiểm tra ràng buộc | Lỗi: SKU phải là duy nhất | PC_03 | Pass | 2025-12-17 | Duplicate SKU: "UNIQUE-TEST-001", database unique constraint | Validation SKU unique |

---

## Unit Tests (Kiểm Thử Đơn Vị) - Toàn Bộ UC Cases

**File:** `packages/Webkul/Shop/tests/Unit/ProductCatalogUnitTest.php`  
**Tổng số Test:** 55 (tất cả pass)  
**Loại Test:** Unit tests thuần túy với mocks, không có database

| ID | Mô Tả Test Case | Quy Trình Test Case | Kết Quả Mong Đợi | Phụ Thuộc Test Case | Result | Test Date | Test-Data | Note |
|---|---|---|---|---|---|---|---|---|
| **UC1_001** | Chi tiết sản phẩm trả về thông tin đầy đủ (Product Catalog) | 1. Mock ProductRepository. 2. Gọi findOrFail(1). 3. Kiểm tra dữ liệu sản phẩm | Object sản phẩm với id, name, price, description | None | Pass | 2025-12-17 | id:1, name:"Test", price:99.99, description:"Test Desc" | Use Case 1: Xem Chi Tiết Sản Phẩm |
| **UC1_002** | Chi tiết sản phẩm xử lý sản phẩm không tồn tại (Product Catalog) | 1. Mock repository ném ModelNotFoundException. 2. Thử lấy product ID 999. 3. Kiểm tra exception | ModelNotFoundException được ném ra | None | Pass | 2025-12-17 | Exception for ID 999 | Xử lý lỗi |
| **UC2_001** | Duyệt sản phẩm trả về danh sách phân trang (Product Catalog) | 1. Mock repository paginate(12). 2. Gọi browse products. 3. Kiểm tra pagination | Mảng 12 sản phẩm được trả về | None | Pass | 2025-12-17 | 12 products with pagination metadata | Use Case 2: Duyệt Sản Phẩm |
| **UC2_002** | Duyệt sản phẩm với bộ lọc danh mục (Product Catalog) | 1. Mock repository với category filter. 2. Lọc theo category_id=5. 3. Kiểm tra kết quả đã lọc | Chỉ sản phẩm từ category 5 | None | Pass | 2025-12-17 | Products filtered by category_id=5 | Lọc theo danh mục |
| **UC2_003** | Duyệt sản phẩm sắp xếp theo giá (Product Catalog) | 1. Mock repository với orderBy('price', 'asc'). 2. Lấy sản phẩm. 3. Kiểm tra thứ tự sắp xếp | Sản phẩm được sắp xếp theo giá tăng dần | None | Pass | 2025-12-17 | Products sorted by price: [50, 100, 150] | Sắp xếp |
| **UC3_001** | Tìm kiếm sản phẩm theo từ khóa trả về kết quả khớp (Product Catalog) | 1. Mock repository search('laptop'). 2. Thực hiện tìm kiếm. 3. Kiểm tra kết quả | Sản phẩm với "laptop" trong tên | None | Pass | 2025-12-17 | 3 products with "laptop" keyword | Use Case 3: Tìm Kiếm Sản Phẩm |
| **UC3_002** | Tìm kiếm trả về rỗng khi không có kết quả (Product Catalog) | 1. Mock repository search('xyz'). 2. Thực hiện tìm kiếm. 3. Kiểm tra mảng rỗng | Mảng rỗng được trả về | None | Pass | 2025-12-17 | Empty array for "xyz" search | Tìm kiếm rỗng |
| **UC3_003** | Lọc sản phẩm theo khoảng giá (Product Catalog) | 1. Mock repository với whereBetween('price'). 2. Lọc giá 50-150. 3. Kiểm tra kết quả | Chỉ sản phẩm trong khoảng giá | None | Pass | 2025-12-17 | Products with price between 50-150 | Lọc theo giá |
| **UC3_004** | Lọc sản phẩm theo thuộc tính (Product Catalog) | 1. Mock repository với attribute filter. 2. Lọc theo color="Red". 3. Kiểm tra kết quả | Chỉ sản phẩm màu đỏ | None | Pass | 2025-12-17 | Products filtered by color attribute | Lọc theo thuộc tính |
| **UC4_001** | Tạo sản phẩm với dữ liệu hợp lệ (Product Catalog) | 1. Mock repository create(). 2. Submit dữ liệu sản phẩm hợp lệ. 3. Kiểm tra sản phẩm được tạo | Object sản phẩm được trả về với ID | None | Pass | 2025-12-17 | sku:"TEST-001", name:"Test", price:99.99 | Use Case 4: Quản Lý Sản Phẩm (Tạo) |
| **UC4_002** | Tạo sản phẩm kiểm tra trường bắt buộc (Product Catalog) | 1. Mock validation rules. 2. Submit dữ liệu không có SKU. 3. Kiểm tra lỗi validation | ValidationException được ném ra | None | Pass | 2025-12-17 | Data missing 'sku' field | Validation |
| **UC4_003** | Cập nhật thông tin sản phẩm (Product Catalog) | 1. Mock repository update(id, data). 2. Cập nhật tên sản phẩm. 3. Kiểm tra cập nhật | Sản phẩm đã cập nhật được trả về | None | Pass | 2025-12-17 | Update name from "Old" to "New" | Cập nhật sản phẩm |
| **UC4_004** | Cập nhật sản phẩm kiểm tra kiểu dữ liệu (Product Catalog) | 1. Mock validation. 2. Cập nhật giá thành string "abc". 3. Kiểm tra lỗi | ValidationException được ném ra | None | Pass | 2025-12-17 | Invalid price type | Validation kiểu |
| **UC4_005** | Xóa sản phẩm thành công (Product Catalog) | 1. Mock repository delete(id). 2. Xóa product ID 1. 3. Kiểm tra deletion | True được trả về | None | Pass | 2025-12-17 | delete() returns true | Xóa sản phẩm |
| **UC4_006** | Xóa sản phẩm xử lý ID không tồn tại (Product Catalog) | 1. Mock repository ném exception. 2. Xóa ID 999. 3. Kiểm tra lỗi | ModelNotFoundException được ném ra | None | Pass | 2025-12-17 | Exception for non-existent ID | Xử lý lỗi |
| **UC4_007** | Validation SKU duy nhất (Product Catalog) | 1. Mock repository với SKU đã tồn tại. 2. Tạo sản phẩm với SKU trùng. 3. Kiểm tra lỗi | Lỗi validation: SKU đã tồn tại | None | Pass | 2025-12-17 | SKU "TEST-001" already exists | SKU duy nhất |
| **UC4_008** | Chuyển đổi trạng thái sản phẩm (Product Catalog) | 1. Mock repository update status. 2. Đổi status từ 1 sang 0. 3. Kiểm tra thay đổi | Status được cập nhật thành công | None | Pass | 2025-12-17 | status changed 1→0 | Chuyển trạng thái |
| **UC5_001** | Hiển thị cấu trúc phân cấp danh mục (Product Catalog) | 1. Mock CategoryRepository. 2. Lấy nested categories. 3. Kiểm tra cấu trúc cây | Cây danh mục lồng nhau được trả về | None | Pass | 2025-12-17 | Parent with 2 children, 1 child has grandchild | Use Case 5: Quản Lý Danh Mục |
| **UC5_002** | Tạo danh mục với slug tự động (Product Catalog) | 1. Mock repository create(). 2. Tạo category "New Category". 3. Kiểm tra slug generation | Danh mục với slug "new-category" | None | Pass | 2025-12-17 | name="New Category", slug="new-category" | Tự động tạo slug |
| **UC5_003** | Cập nhật thông tin danh mục (Product Catalog) | 1. Mock repository update(). 2. Cập nhật tên danh mục. 3. Kiểm tra cập nhật | Danh mục đã cập nhật được trả về | None | Pass | 2025-12-17 | Update name to "Updated Category" | Cập nhật danh mục |
| **UC5_004** | Xóa danh mục không có sản phẩm (Product Catalog) | 1. Mock repository delete(). 2. Xóa empty category. 3. Kiểm tra deletion | True được trả về | None | Pass | 2025-12-17 | Empty category deleted | Xóa danh mục |
| **UC5_005** | Gán sản phẩm vào danh mục (Product Catalog) | 1. Mock pivot table attach(). 2. Gán product vào category. 3. Kiểm tra relationship | Relationship được tạo | None | Pass | 2025-12-17 | product_id=1, category_id=5 | Gán sản phẩm-danh mục |
| **UC5_006** | Xóa sản phẩm khỏi danh mục (Product Catalog) | 1. Mock pivot table detach(). 2. Xóa product khỏi category. 3. Kiểm tra removal | Relationship bị xóa | None | Pass | 2025-12-17 | Detach product 1 from category 5 | Xóa gán |
| **UC6_001** | Xem số lượng tồn kho sản phẩm (Product Catalog) | 1. Mock InventoryRepository. 2. Lấy inventory cho product. 3. Kiểm tra quantity | Object inventory với trường qty | None | Pass | 2025-12-17 | product_id:1, qty:100 | Use Case 6: Quản Lý Tồn Kho |
| **UC6_002** | Cập nhật số lượng tồn kho (Product Catalog) | 1. Mock repository update(). 2. Đổi quantity thành 150. 3. Kiểm tra cập nhật | Inventory đã cập nhật được trả về | None | Pass | 2025-12-17 | qty updated 100→150 | Cập nhật tồn kho |
| **UC6_003** | Kiểm tra tính khả dụng của tồn kho (Product Catalog) | 1. Mock repository check stock. 2. Yêu cầu quantity 5. 3. Kiểm tra availability | Boolean: true nếu có sẵn | None | Pass | 2025-12-17 | Current stock=100, requested=5, result=true | Kiểm tra stock |
| **UC6_004** | Ngăn tồn kho âm (Product Catalog) | 1. Mock validation. 2. Cập nhật quantity thành -10. 3. Kiểm tra lỗi | ValidationException được ném ra | None | Pass | 2025-12-17 | Negative quantity rejected | Validation |
| **UC6_005** | Trừ tồn kho sau khi đặt hàng (Product Catalog) | 1. Mock inventory deduction. 2. Đặt hàng quantity 5. 3. Kiểm tra stock giảm | Inventory giảm theo số lượng đặt hàng | None | Pass | 2025-12-17 | Stock 100→95 after order of 5 | Trừ tồn kho |
| **UC7_001** | Tạo thuộc tính sản phẩm (Product Catalog) | 1. Mock AttributeRepository. 2. Tạo attribute "Color". 3. Kiểm tra creation | Object attribute được trả về | None | Pass | 2025-12-17 | code:"color", label:"Color", type:"select" | Use Case 7: Quản Lý Thuộc Tính |
| **UC7_002** | Thêm options cho thuộc tính (Product Catalog) | 1. Mock AttributeOption create. 2. Thêm options "Red", "Blue". 3. Kiểm tra options đã thêm | Mảng options được trả về | None | Pass | 2025-12-17 | Options ["Red", "Blue", "Green"] | Options thuộc tính |
| **UC7_003** | Validate kiểu dữ liệu thuộc tính (Product Catalog) | 1. Mock validation rules. 2. Tạo attribute với kiểu không hợp lệ. 3. Kiểm tra lỗi | ValidationException được ném ra | None | Pass | 2025-12-17 | Invalid attribute type | Validation kiểu |
| **UC7_004** | Cập nhật thuộc tính của attribute (Product Catalog) | 1. Mock repository update(). 2. Cập nhật attribute label. 3. Kiểm tra cập nhật | Attribute đã cập nhật được trả về | None | Pass | 2025-12-17 | Label updated "Color" → "Product Color" | Cập nhật attribute |
| **UC7_005** | Xóa thuộc tính (Product Catalog) | 1. Mock repository delete(). 2. Xóa attribute. 3. Kiểm tra deletion | True được trả về | None | Pass | 2025-12-17 | Attribute deleted | Xóa attribute |
| **UC7_006** | Gán thuộc tính vào family (Product Catalog) | 1. Mock family-attribute relationship. 2. Gán attribute vào family. 3. Kiểm tra assignment | Relationship được tạo | None | Pass | 2025-12-17 | Attribute assigned to family_id=1 | Gán vào family |
| **UC8_001** | Thêm sản phẩm vào giỏ hàng (Shopping Cart) | 1. Mock CartRepository. 2. Thêm product với quantity. 3. Kiểm tra cart item | Cart item được tạo | None | Pass | 2025-12-17 | product_id:1, qty:2, price:99.99 | Use Case 8: Thêm Vào Giỏ |
| **UC8_002** | Thêm cùng sản phẩm tăng quantity (Shopping Cart) | 1. Mock cart với item đã tồn tại. 2. Thêm cùng product lại. 3. Kiểm tra quantity tăng | Quantity tăng, không có item trùng | None | Pass | 2025-12-17 | Qty 2 + 1 = 3 for same product | Xử lý trùng |
| **UC8_003** | Validate tính khả dụng trước khi thêm (Shopping Cart) | 1. Mock product stock check. 2. Thêm product hết hàng. 3. Kiểm tra lỗi | Lỗi: Sản phẩm hết hàng | None | Pass | 2025-12-17 | Stock=0, validation fails | Validation stock |
| **UC8_004** | Thêm configurable product với options (Shopping Cart) | 1. Mock cart add với variant. 2. Thêm product với size=M. 3. Kiểm tra variant được lưu | Cart item có variant options | None | Pass | 2025-12-17 | product_id:1, variant:{size:"M"} | Configurable product |
| **UC9_001** | Hiển thị số lượng item trong mini-cart (Shopping Cart) | 1. Mock Cart với items. 2. Lấy items count. 3. Kiểm tra count | Số đếm integer được trả về | None | Pass | 2025-12-17 | Cart has 3 items, count=3 | Use Case 9: Xem Mini-Cart |
| **UC9_002** | Tính subtotal của mini-cart (Shopping Cart) | 1. Mock Cart items với giá. 2. Tính subtotal. 3. Kiểm tra tổng | Subtotal = tổng của (giá × số lượng) | None | Pass | 2025-12-17 | Item1 ($50×2) + Item2 ($30×1) = $130 | Tính subtotal |
| **UC10_001** | Hiển thị các items trong giỏ hàng chi tiết (Shopping Cart) | 1. Mock Cart getItems(). 2. Lấy tất cả cart items. 3. Kiểm tra chi tiết | Mảng cart items với tất cả chi tiết | None | Pass | 2025-12-17 | 3 items with product info, qty, price | Use Case 10: Xem Giỏ Chi Tiết |
| **UC10_002** | Hiển thị phân tích tổng giỏ hàng (Shopping Cart) | 1. Mock Cart getTotals(). 2. Lấy phân tích totals. 3. Kiểm tra các thành phần | Subtotal, thuế, shipping, grand total | None | Pass | 2025-12-17 | subtotal:100, tax:10, shipping:5, grand_total:115 | Phân tích totals |
| **UC11_001** | Cập nhật số lượng item trong giỏ (Shopping Cart) | 1. Mock Cart updateItem(). 2. Đổi quantity từ 2 thành 5. 3. Kiểm tra cập nhật | Quantity của cart item được cập nhật | None | Pass | 2025-12-17 | Update qty 2→5 for item_id=10 | Use Case 11: Cập Nhật Số Lượng |
| **UC11_002** | Validate số lượng tối thiểu (1) (Shopping Cart) | 1. Mock validation. 2. Cập nhật quantity thành 0. 3. Kiểm tra lỗi hoặc xóa | Lỗi hoặc item bị xóa | None | Pass | 2025-12-17 | Quantity cannot be less than 1 | Validation tối thiểu |
| **UC11_003** | Validate số lượng tối đa vs stock (Shopping Cart) | 1. Mock stock check. 2. Cập nhật quantity vượt stock. 3. Kiểm tra lỗi | Lỗi: Quantity vượt quá stock | None | Pass | 2025-12-17 | Stock=10, requested=15, validation fails | Validation tối đa |
| **UC12_001** | Xóa item khỏi giỏ hàng (Shopping Cart) | 1. Mock Cart removeItem(). 2. Xóa item theo ID. 3. Kiểm tra removal | Item bị xóa khỏi cart | None | Pass | 2025-12-17 | Remove item_id=10 from cart | Use Case 12: Xóa Khỏi Giỏ |
| **UC12_002** | Xóa toàn bộ giỏ hàng (Shopping Cart) | 1. Mock Cart clear(). 2. Xóa tất cả items. 3. Kiểm tra giỏ rỗng | Cart có 0 items | None | Pass | 2025-12-17 | Cart cleared, items_count=0 | Xóa giỏ |
| **UC13_001** | Áp dụng mã coupon hợp lệ (Shopping Cart) | 1. Mock CouponRepository. 2. Áp dụng code "SAVE10". 3. Kiểm tra discount được áp dụng | Discount được áp dụng vào cart | None | Pass | 2025-12-17 | Coupon "SAVE10", discount=10% | Use Case 13: Áp Dụng Coupon |
| **UC13_002** | Từ chối mã coupon không hợp lệ (Shopping Cart) | 1. Mock coupon validation. 2. Áp dụng code không hợp lệ. 3. Kiểm tra lỗi | Lỗi: Mã coupon không hợp lệ | None | Pass | 2025-12-17 | Coupon "INVALID" not found | Validation coupon |
| **UC13_003** | Validate giới hạn sử dụng coupon (Shopping Cart) | 1. Mock coupon với usage limit. 2. Áp dụng coupon đã dùng hết. 3. Kiểm tra lỗi | Lỗi: Vượt quá giới hạn sử dụng | None | Pass | 2025-12-17 | Coupon limit=5, used=5 | Giới hạn sử dụng |
| **UC13_004** | Xóa coupon đã áp dụng (Shopping Cart) | 1. Mock Cart removeCoupon(). 2. Xóa coupon. 3. Kiểm tra discount bị xóa | Discount bị xóa, tổng được khôi phục | None | Pass | 2025-12-17 | Coupon removed, total increases | Xóa coupon |
| **UC13_005** | Tính discount phần trăm (Shopping Cart) | 1. Mock coupon với 10% discount. 2. Áp dụng vào cart subtotal $100. 3. Kiểm tra tính toán | Discount = $10 | None | Pass | 2025-12-17 | 10% of $100 = $10 | Discount phần trăm |
| **UC13_006** | Tính discount số tiền cố định (Shopping Cart) | 1. Mock coupon với $15 discount. 2. Áp dụng vào cart. 3. Kiểm tra tính toán | Discount = $15 | None | Pass | 2025-12-17 | Fixed $15 discount | Discount cố định |
| **UC14_001** | Tính subtotal của giỏ hàng (Shopping Cart) | 1. Mock Cart items. 2. Tính subtotal. 3. Kiểm tra tổng | Subtotal = tổng của item totals | None | Pass | 2025-12-17 | $50 + $30 + $20 = $100 | Use Case 14: Tính Tổng |
| **UC14_002** | Tính thuế trên subtotal (Shopping Cart) | 1. Mock tax rules. 2. Áp dụng 10% thuế. 3. Kiểm tra số tiền thuế | Thuế = subtotal × tỷ lệ thuế | None | Pass | 2025-12-17 | $100 × 10% = $10 | Tính thuế |
| **UC14_003** | Tính phí vận chuyển (Shopping Cart) | 1. Mock shipping rules. 2. Tính cho trọng lượng cart. 3. Kiểm tra chi phí shipping | Chi phí shipping được tính | None | Pass | 2025-12-17 | Flat rate $5 shipping | Tính shipping |
| **UC14_004** | Tính tổng cộng (Shopping Cart) | 1. Mock all totals. 2. Tổng subtotal + thuế + shipping - discount. 3. Kiểm tra grand total | Grand total = tổng tất cả thành phần | None | Pass | 2025-12-17 | $100 + $10 + $5 - $10 = $105 | Tổng cộng |
| **UC14_005** | Xử lý tổng giỏ hàng trống (Shopping Cart) | 1. Mock empty cart. 2. Tính totals. 3. Kiểm tra giá trị zero | Tất cả totals = 0 | None | Pass | 2025-12-17 | Empty cart, totals all $0 | Xử lý giỏ trống |
| **UC15_001** | Validate giỏ hàng trước checkout (Shopping Cart) | 1. Mock Cart validation. 2. Kiểm tra items tồn tại và còn hàng. 3. Kiểm tra validation | Validation pass | None | Pass | 2025-12-17 | Cart has valid items | Use Case 15: Validation Checkout |
| **UC15_002** | Validate thông tin khách hàng (Shopping Cart) | 1. Mock customer data validation. 2. Kiểm tra các trường bắt buộc. 3. Kiểm tra validation | Validation pass hoặc fail | None | Pass | 2025-12-17 | Customer data with required fields | Validation khách hàng |
| **UC15_003** | Cho phép guest checkout (Shopping Cart) | 1. Mock guest customer. 2. Validate dữ liệu guest. 3. Kiểm tra được phép | Guest checkout được phép | None | Pass | 2025-12-17 | Guest customer with email | Guest checkout |

---

## Lệnh Thực Thi Test

### Chạy Integration Tests (PC_26 - PC_45)
```bash
vendor/bin/pest packages/Webkul/Shop/tests/Feature/ProductCatalogTest.php --filter="PC_2[6-9]|PC_3[0-9]|PC_4[0-5]" --colors=always
```

### Chạy Tất Cả Integration Tests
```bash
vendor/bin/pest packages/Webkul/Shop/tests/Feature/ProductCatalogTest.php --colors=always
```

### Chạy Tất Cả Unit Tests
```bash
vendor/bin/pest packages/Webkul/Shop/tests/Unit/ProductCatalogUnitTest.php --colors=always
```

### Chạy Test Cụ Thể
```bash
# Integration test
vendor/bin/pest packages/Webkul/Shop/tests/Feature/ProductCatalogTest.php --filter="PC_26"

# Unit test
vendor/bin/pest packages/Webkul/Shop/tests/Unit/ProductCatalogUnitTest.php --filter="UC1_001"
```

---

## Thống Kê Test

### Integration Tests PC_26 - PC_45
- **Tổng số:** 20 tests
- **Pass:** 20 (100%)
- **Fail:** 0 (0%)
- **Skip:** 0 (0%)
- **Product Catalog:** 14 tests (PC_26-PC_34, PC_40-PC_41, PC_43-PC_45)
- **Shopping Cart:** 6 tests (PC_35-PC_39, PC_42)

### Unit Tests (Toàn Bộ)
- **Tổng số:** 55 tests
- **Pass:** 55 (100%)
- **Fail:** 0 (0%)
- **Skip:** 0 (0%)
- **Product Catalog:** 34 tests (UC1-UC7)
- **Shopping Cart:** 21 tests (UC8-UC15)

### Phân Loại Theo Module
| Module | Integration Tests | Unit Tests | Tổng |
|--------|-------------------|------------|------|
| **Product Catalog** | 14 tests | 34 tests | 48 tests |
| **Shopping Cart** | 6 tests | 21 tests | 27 tests |
| **TỔNG CỘNG** | 20 tests | 55 tests | 75 tests |

---

## Ghi Chú Quan Trọng

### Pattern Kiểm Thử

#### Integration Tests
- Sử dụng database thật với transactions (tự động rollback)
- Dùng ProductFaker và CategoryFaker cho test data
- Kiểm tra toàn bộ luồng từ controller đến database
- Verify cả business logic và data persistence

#### Unit Tests
- Sử dụng Mockery cho tất cả dependencies
- Không kết nối database
- Kiểm tra business logic độc lập
- Thực thi nhanh (milliseconds)

### Bảng Database Sử Dụng
- `products` - Lưu trữ sản phẩm chính
- `product_flat` - Hiển thị sản phẩm frontend (có cột status)
- `categories` - Phân cấp danh mục (nested set)
- `product_categories` - Quan hệ product-category
- `product_inventories` - Quản lý tồn kho
- `attributes` - Thuộc tính sản phẩm
- `cart` - Header giỏ hàng
- `cart_items` - Dòng items trong giỏ
- `cart_rules` - Quy tắc discount
- `cart_rule_coupons` - Mã coupon

### Lưu Ý Kỹ Thuật
1. **Bảng product_flat** dùng cho frontend display và có cột `status`
2. **Bảng products** là lưu trữ chính nhưng thiếu một số cột display
3. **Cart totals** cần gọi `cart()->collectTotals()` để tính lại
4. **Category relationships** cần `$product->load('categories')` sau attach/sync
5. **Eloquent update()** có thể trigger observers (ví dụ: url_key regeneration)
6. **DB::table()** bypass Eloquent observers cho raw updates

---

**Tài liệu được duy trì bởi:** Đội Phát Triển  
**Framework:** Laravel 11.x + Bagisto  
**CI/CD:** GitHub Actions với Pest PHP
