# Danh sách File Liên Quan Đến Chức Năng ORDER

## 1. Backend - Sales Package (Core)

### Models
- `packages/Webkul/Sales/src/Models/Order.php`
- `packages/Webkul/Sales/src/Models/OrderProxy.php`
- `packages/Webkul/Sales/src/Models/OrderItem.php`
- `packages/Webkul/Sales/src/Models/OrderItemProxy.php`
- `packages/Webkul/Sales/src/Models/OrderAddress.php`
- `packages/Webkul/Sales/src/Models/OrderAddressProxy.php`
- `packages/Webkul/Sales/src/Models/OrderPayment.php`
- `packages/Webkul/Sales/src/Models/OrderPaymentProxy.php`
- `packages/Webkul/Sales/src/Models/OrderTransaction.php`
- `packages/Webkul/Sales/src/Models/OrderTransactionProxy.php`
- `packages/Webkul/Sales/src/Models/OrderComment.php`
- `packages/Webkul/Sales/src/Models/OrderCommentProxy.php`

### Contracts
- `packages/Webkul/Sales/src/Contracts/Order.php`
- `packages/Webkul/Sales/src/Contracts/OrderItem.php`
- `packages/Webkul/Sales/src/Contracts/OrderAddress.php`
- `packages/Webkul/Sales/src/Contracts/OrderPayment.php`
- `packages/Webkul/Sales/src/Contracts/OrderTransaction.php`
- `packages/Webkul/Sales/src/Contracts/OrderComment.php`

### Repositories
- `packages/Webkul/Sales/src/Repositories/OrderRepository.php`
- `packages/Webkul/Sales/src/Repositories/OrderItemRepository.php`
- `packages/Webkul/Sales/src/Repositories/OrderAddressRepository.php`
- `packages/Webkul/Sales/src/Repositories/OrderTransactionRepository.php`
- `packages/Webkul/Sales/src/Repositories/OrderCommentRepository.php`

### Generators
- `packages/Webkul/Sales/src/Generators/OrderSequencer.php`

### Transformers (API Resources)
- `packages/Webkul/Sales/src/Transformers/OrderResource.php`
- `packages/Webkul/Sales/src/Transformers/OrderItemResource.php`
- `packages/Webkul/Sales/src/Transformers/OrderAddressResource.php`
- `packages/Webkul/Sales/src/Transformers/OrderPaymentResource.php`

### Database
- `packages/Webkul/Sales/src/Database/Migrations/2018_09_27_113154_create_orders_table.php`
- `packages/Webkul/Sales/src/Database/Migrations/2018_09_27_113207_create_order_items_table.php`
- `packages/Webkul/Sales/src/Database/Migrations/2018_10_01_095504_create_order_payment_table.php`
- `packages/Webkul/Sales/src/Database/Migrations/2020_05_06_171638_create_order_comments_table.php`
- `packages/Webkul/Sales/src/Database/Migrations/2021_03_11_212124_create_order_transactions_table.php`
- `packages/Webkul/Sales/src/Database/Migrations/2023_10_12_090446_add_tax_category_id_column_in_order_items_table.php`
- `packages/Webkul/Sales/src/Database/Migrations/2024_04_19_102939_add_incl_tax_columns_in_orders_table.php`
- `packages/Webkul/Sales/src/Database/Migrations/2024_04_19_144641_add_incl_tax_columns_in_order_items_table.php`

### Factories
- `packages/Webkul/Sales/src/Database/Factories/OrderFactory.php`
- `packages/Webkul/Sales/src/Database/Factories/OrderItemFactory.php`
- `packages/Webkul/Sales/src/Database/Factories/OrderAddressFactory.php`
- `packages/Webkul/Sales/src/Database/Factories/OrderPaymentFactory.php`
- `packages/Webkul/Sales/src/Database/Factories/OrderTransactionFactory.php`

## 2. Backend - Admin Package

### Controllers
- `packages/Webkul/Admin/src/Http/Controllers/Sales/OrderController.php`
- `packages/Webkul/Admin/src/Http/Controllers/Sales/CartController.php` (liên quan đến tạo order)

### DataGrids
- `packages/Webkul/Admin/src/DataGrids/Sales/OrderDataGrid.php`
- `packages/Webkul/Admin/src/DataGrids/Sales/OrderInvoiceDataGrid.php`
- `packages/Webkul/Admin/src/DataGrids/Sales/OrderRefundDataGrid.php`
- `packages/Webkul/Admin/src/DataGrids/Sales/OrderShipmentDataGrid.php`
- `packages/Webkul/Admin/src/DataGrids/Sales/OrderTransactionDataGrid.php`

### Resources (Views)
- `packages/Webkul/Admin/src/Resources/views/sales/orders/` (toàn bộ thư mục)
- `packages/Webkul/Admin/src/Resources/views/sales/address.blade.php`
- `packages/Webkul/Admin/src/Resources/views/customers/customers/view/orders.blade.php`
- `packages/Webkul/Admin/src/Resources/views/reporting/sales/total-orders.blade.php`
- `packages/Webkul/Admin/src/Resources/views/reporting/sales/average-order-value.blade.php`
- `packages/Webkul/Admin/src/Resources/views/reporting/customers/most-orders.blade.php`
- `packages/Webkul/Admin/src/Resources/views/components/shimmer/header/mega-search/orders.blade.php`
- `packages/Webkul/Admin/src/Resources/views/components/shimmer/reporting/sales/total-orders.blade.php`
- `packages/Webkul/Admin/src/Resources/views/components/shimmer/reporting/customers/most-orders.blade.php`
- `packages/Webkul/Admin/src/Resources/views/components/shimmer/reporting/sales/average-order-value.blade.php`

### Http Resources
- `packages/Webkul/Admin/src/Http/Resources/OrderItemResource.php`

### Listeners
- `packages/Webkul/Admin/src/Listeners/Order.php`

## 3. Backend - Shop Package (Frontend Customer)

### Controllers
- `packages/Webkul/Shop/src/Http/Controllers/Customer/Account/OrderController.php`

### DataGrids
- `packages/Webkul/Shop/src/DataGrids/OrderDataGrid.php`

### Resources (Views Shop)
- `packages/Webkul/Shop/src/Resources/views/customers/account/orders/` (toàn bộ thư mục nếu có)

### Listeners
- `packages/Webkul/Shop/src/Listeners/Order.php`

## 4. Tests

### Admin Tests
- `packages/Webkul/Admin/tests/Feature/Sales/OrdersTest.php`
- `packages/Webkul/Admin/tests/Feature/Sales/Orders/OrdersTest.php`

### Shop Tests
- `packages/Webkul/Shop/tests/Feature/Customers/OrdersTest.php`

## 5. Related Listeners (Other Packages)

- `packages/Webkul/Product/src/Listeners/Order.php`
- `packages/Webkul/BookingProduct/src/Listeners/Order.php`
- `packages/Webkul/CartRule/src/Listeners/Order.php`
- `packages/Webkul/FPC/src/Listeners/Order.php`
- `packages/Webkul/Notification/src/Listeners/Order.php`

## 6. Product Inventory Related
- `packages/Webkul/Product/src/Database/Migrations/2018_12_26_165327_create_product_ordered_inventories_table.php`

## 7. Language Files (Translation)
- `lang/en/app.php` (phần liên quan đến orders)
- `packages/Webkul/Admin/src/Resources/lang/*/sales.php`
- `packages/Webkul/Shop/src/Resources/lang/*/checkout.php`

## 8. Routes
- `packages/Webkul/Admin/src/Routes/sales-routes.php` (hoặc routes liên quan)
- `packages/Webkul/Shop/src/Routes/customer-routes.php` (phần orders)

## 9. Policies & Middleware (nếu có)
- Các file policy liên quan đến Order authorization

## 10. Events & Mails
- Các event và mail templates liên quan đến Order notification

---

## Các Bước Thực Hiện

### Bước 1: Tạo nhánh TT
```bash
git checkout -b TT
```

### Bước 2: Copy các file cần thiết
Sử dụng script PowerShell bên dưới

### Bước 3: Commit và push
```bash
git add .
git commit -m "feat: Add Order feature with FE, BE, logic and tests"
git push origin TT
```
