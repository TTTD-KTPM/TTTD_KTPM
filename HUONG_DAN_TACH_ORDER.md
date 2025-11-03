# HƯỚNG DẪN TÁCH CHỨC NĂNG ORDER LÊN NHÁNH TT

## Tổng quan
Bạn cần tách toàn bộ chức năng Order (bao gồm FE, BE, Logic, Tests) từ project Bagisto hiện tại và đưa lên nhánh TT mới trên GitHub.

## Cách tiếp cận
Thay vì tách riêng từng file, chúng ta sẽ:
1. Tạo nhánh TT từ main
2. Giữ lại TẤT CẢ code hiện tại (vì Order phụ thuộc vào nhiều module khác)
3. Commit toàn bộ lên nhánh TT
4. Sau đó có thể dần dần làm sạch code không cần thiết nếu muốn

## Các bước thực hiện

### Bước 1: Stash các thay đổi hiện tại
```powershell
git add .
git stash
```

### Bước 2: Tạo và chuyển sang nhánh TT
```powershell
git checkout -b TT
```

### Bước 3: Apply lại các thay đổi
```powershell
git stash pop
```

### Bước 4: Add tất cả các file
```powershell
git add .
```

### Bước 5: Commit với message rõ ràng
```powershell
git commit -m "feat: Add complete Order feature

- Backend: Order Models, Repositories, Controllers
- Frontend Admin: Order management UI, DataGrids
- Frontend Shop: Customer order views
- Tests: Admin and Shop order tests
- Listeners: Order event handlers
- Migrations: Order database schema
- Factories: Order test data generators"
```

### Bước 6: Push lên GitHub
```powershell
git push origin TT
```

### Bước 7: Tạo Pull Request (trên GitHub)
1. Truy cập https://github.com/ToanTranDuc/TTTD_KTPM
2. Click "Pull requests" > "New pull request"
3. Chọn base: `TT` <- compare: `TT`
4. Tạo PR với mô tả chi tiết về chức năng Order

## Các file chính liên quan đến Order

### Backend Core (Sales Package)
- **Models**: `packages/Webkul/Sales/src/Models/Order*.php`
- **Repositories**: `packages/Webkul/Sales/src/Repositories/Order*.php`
- **Migrations**: `packages/Webkul/Sales/src/Database/Migrations/*order*.php`
- **Factories**: `packages/Webkul/Sales/src/Database/Factories/Order*.php`
- **Contracts**: `packages/Webkul/Sales/src/Contracts/Order*.php`
- **Transformers**: `packages/Webkul/Sales/src/Transformers/Order*.php`

### Admin (Backend UI)
- **Controllers**: 
  - `packages/Webkul/Admin/src/Http/Controllers/Sales/OrderController.php`
  - `packages/Webkul/Admin/src/Http/Controllers/Sales/CartController.php`
- **DataGrids**: `packages/Webkul/Admin/src/DataGrids/Sales/Order*.php`
- **Views**: `packages/Webkul/Admin/src/Resources/views/sales/orders/`
- **Tests**: `packages/Webkul/Admin/tests/Feature/Sales/Orders*.php`

### Shop (Frontend UI)
- **Controllers**: `packages/Webkul/Shop/src/Http/Controllers/Customer/Account/OrderController.php`
- **DataGrids**: `packages/Webkul/Shop/src/DataGrids/OrderDataGrid.php`
- **Views**: Views trong `packages/Webkul/Shop/src/Resources/views/` liên quan đến orders
- **Tests**: `packages/Webkul/Shop/tests/Feature/Customers/OrdersTest.php`

### Listeners & Events
- `packages/Webkul/Admin/src/Listeners/Order.php`
- `packages/Webkul/Shop/src/Listeners/Order.php`
- `packages/Webkul/Product/src/Listeners/Order.php`
- `packages/Webkul/CartRule/src/Listeners/Order.php`
- `packages/Webkul/Notification/src/Listeners/Order.php`
- Và các listeners khác...

## Lưu ý quan trọng

### Tại sao không tách riêng từng file?
Order trong Bagisto phụ thuộc vào rất nhiều module khác:
- **Customer**: Thông tin khách hàng
- **Product**: Sản phẩm trong đơn hàng
- **Cart**: Giỏ hàng chuyển thành order
- **Inventory**: Quản lý tồn kho
- **Payment**: Thanh toán
- **Shipping**: Vận chuyển
- **Tax**: Thuế
- **Core**: Channels, Locales, Currencies
- **Category**: Danh mục sản phẩm

Nếu tách riêng, bạn sẽ cần:
1. Tạo lại toàn bộ cấu trúc Bagisto cơ bản
2. Include tất cả các module dependencies
3. Có thể gặp lỗi do thiếu dependencies

### Cách làm đơn giản nhất
**Giữ lại toàn bộ code hiện tại** trên nhánh TT, sau đó:
1. Document rõ ràng phần nào là code Order
2. Tạo tests riêng cho Order
3. Có thể tạo các tags/releases để đánh dấu các phần quan trọng

## Script tự động

Chạy script sau trong PowerShell:
```powershell
.\prepare-order-branch-simple.ps1
```

Hoặc chạy từng lệnh thủ công theo hướng dẫn trên.

## Kiểm tra sau khi push

1. Truy cập: https://github.com/ToanTranDuc/TTTD_KTPM/tree/TT
2. Xác nhận nhánh TT đã có đầy đủ code
3. So sánh với nhánh main để thấy sự khác biệt
4. Tạo README riêng cho nhánh TT giải thích về chức năng Order

## Tài liệu bổ sung

- [ORDER_FEATURE_FILES.md](./ORDER_FEATURE_FILES.md) - Danh sách chi tiết các file Order
- [Bagisto Documentation](https://devdocs.bagisto.com/) - Tài liệu chính thức
