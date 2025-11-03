# Script để tách chức năng Order lên nhánh TT
# Chạy script này từ thư mục gốc của project

Write-Host "=== Bắt đầu tách chức năng Order ===" -ForegroundColor Green

# 1. Kiểm tra git status
Write-Host "`n1. Kiểm tra trạng thái Git..." -ForegroundColor Yellow
git status

# 2. Stash các thay đổi hiện tại (nếu có)
$hasChanges = git status --porcelain
if ($hasChanges) {
    Write-Host "`n2. Lưu tạm các thay đổi hiện tại..." -ForegroundColor Yellow
    git stash push -m "Temporary stash before creating TT branch"
}

# 3. Tạo nhánh TT từ main
Write-Host "`n3. Tạo nhánh TT..." -ForegroundColor Yellow
git checkout -b TT origin/main 2>$null
if ($LASTEXITCODE -ne 0) {
    Write-Host "Nhánh TT đã tồn tại, chuyển sang nhánh TT..." -ForegroundColor Cyan
    git checkout TT
}

# 4. Xóa tất cả các file không cần thiết, chỉ giữ lại cấu trúc cơ bản và Order
Write-Host "`n4. Chuẩn bị danh sách file Order..." -ForegroundColor Yellow

# Danh sách các file/folder cần GIỮ LẠI
$keepFiles = @(
    # Core structure
    ".git",
    ".gitignore",
    ".env.example",
    "README.md",
    "composer.json",
    "composer.lock",
    "package.json",
    "package-lock.json",
    "artisan",
    "phpunit.xml",
    "vite.config.js",
    
    # Core directories
    "bootstrap",
    "config",
    "database/migrations", # Migrations cơ bản
    "lang",
    "public",
    "resources",
    "routes",
    "storage",
    "vendor",
    "app",
    
    # Sales package (Order core)
    "packages/Webkul/Sales",
    
    # Admin - Order related
    "packages/Webkul/Admin/src/Http/Controllers/Sales/OrderController.php",
    "packages/Webkul/Admin/src/Http/Controllers/Sales/CartController.php",
    "packages/Webkul/Admin/src/DataGrids/Sales",
    "packages/Webkul/Admin/src/Resources/views/sales/orders",
    "packages/Webkul/Admin/src/Resources/views/sales/address.blade.php",
    "packages/Webkul/Admin/src/Resources/views/customers/customers/view/orders.blade.php",
    "packages/Webkul/Admin/src/Resources/views/reporting/sales/total-orders.blade.php",
    "packages/Webkul/Admin/src/Resources/views/reporting/sales/average-order-value.blade.php",
    "packages/Webkul/Admin/src/Resources/views/reporting/customers/most-orders.blade.php",
    "packages/Webkul/Admin/src/Http/Resources/OrderItemResource.php",
    "packages/Webkul/Admin/src/Listeners/Order.php",
    "packages/Webkul/Admin/tests/Feature/Sales",
    
    # Shop - Order related
    "packages/Webkul/Shop/src/Http/Controllers/Customer/Account/OrderController.php",
    "packages/Webkul/Shop/src/DataGrids/OrderDataGrid.php",
    "packages/Webkul/Shop/src/Listeners/Order.php",
    "packages/Webkul/Shop/tests/Feature/Customers/OrdersTest.php",
    
    # Related listeners
    "packages/Webkul/Product/src/Listeners/Order.php",
    "packages/Webkul/BookingProduct/src/Listeners/Order.php",
    "packages/Webkul/CartRule/src/Listeners/Order.php",
    "packages/Webkul/FPC/src/Listeners/Order.php",
    "packages/Webkul/Notification/src/Listeners/Order.php",
    
    # Product inventory
    "packages/Webkul/Product/src/Database/Migrations/2018_12_26_165327_create_product_ordered_inventories_table.php",
    
    # Documentation
    "ORDER_FEATURE_FILES.md"
)

Write-Host "`n5. Tạo danh sách file Order cần commit..." -ForegroundColor Yellow

# Tạo file danh sách
$orderFiles = @"
# Core Sales Package
packages/Webkul/Sales/

# Admin Controllers
packages/Webkul/Admin/src/Http/Controllers/Sales/OrderController.php
packages/Webkul/Admin/src/Http/Controllers/Sales/CartController.php

# Admin DataGrids
packages/Webkul/Admin/src/DataGrids/Sales/OrderDataGrid.php
packages/Webkul/Admin/src/DataGrids/Sales/OrderInvoiceDataGrid.php
packages/Webkul/Admin/src/DataGrids/Sales/OrderRefundDataGrid.php
packages/Webkul/Admin/src/DataGrids/Sales/OrderShipmentDataGrid.php
packages/Webkul/Admin/src/DataGrids/Sales/OrderTransactionDataGrid.php

# Admin Views
packages/Webkul/Admin/src/Resources/views/sales/orders/
packages/Webkul/Admin/src/Resources/views/sales/address.blade.php
packages/Webkul/Admin/src/Resources/views/customers/customers/view/orders.blade.php
packages/Webkul/Admin/src/Resources/views/reporting/sales/total-orders.blade.php
packages/Webkul/Admin/src/Resources/views/reporting/sales/average-order-value.blade.php
packages/Webkul/Admin/src/Resources/views/reporting/customers/most-orders.blade.php

# Admin Resources
packages/Webkul/Admin/src/Http/Resources/OrderItemResource.php

# Admin Listeners
packages/Webkul/Admin/src/Listeners/Order.php

# Admin Tests
packages/Webkul/Admin/tests/Feature/Sales/OrdersTest.php
packages/Webkul/Admin/tests/Feature/Sales/Orders/

# Shop Controllers
packages/Webkul/Shop/src/Http/Controllers/Customer/Account/OrderController.php

# Shop DataGrids
packages/Webkul/Shop/src/DataGrids/OrderDataGrid.php

# Shop Listeners
packages/Webkul/Shop/src/Listeners/Order.php

# Shop Tests
packages/Webkul/Shop/tests/Feature/Customers/OrdersTest.php

# Related Listeners
packages/Webkul/Product/src/Listeners/Order.php
packages/Webkul/BookingProduct/src/Listeners/Order.php
packages/Webkul/CartRule/src/Listeners/Order.php
packages/Webkul/FPC/src/Listeners/Order.php
packages/Webkul/Notification/src/Listeners/Order.php

# Product Inventory Migration
packages/Webkul/Product/src/Database/Migrations/2018_12_26_165327_create_product_ordered_inventories_table.php

# Documentation
ORDER_FEATURE_FILES.md
"@

$orderFiles | Out-File -FilePath "order-files-list.txt" -Encoding UTF8

Write-Host "`nĐã tạo file 'order-files-list.txt' với danh sách các file Order" -ForegroundColor Green

Write-Host "`n=== Hướng dẫn tiếp theo ===" -ForegroundColor Cyan
Write-Host "1. Kiểm tra file 'order-files-list.txt' để xem danh sách file Order" -ForegroundColor White
Write-Host "2. Chạy lệnh: git add -A" -ForegroundColor White
Write-Host "3. Chạy lệnh: git commit -m 'feat: Add Order feature with FE, BE, logic and tests'" -ForegroundColor White
Write-Host "4. Chạy lệnh: git push origin TT" -ForegroundColor White

Write-Host "`n=== Lưu ý ===" -ForegroundColor Yellow
Write-Host "- Hiện tại bạn đang ở nhánh TT" -ForegroundColor White
Write-Host "- Tất cả code Order đã sẵn sàng để commit" -ForegroundColor White
Write-Host "- Nếu muốn quay về nhánh main: git checkout main" -ForegroundColor White
Write-Host "- Nếu đã stash changes: git stash pop" -ForegroundColor White
