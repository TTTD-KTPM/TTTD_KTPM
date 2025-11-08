# Script xóa các files không mong muốn khỏi Git
# CẢNH BÁO: Script này sẽ xóa 1000+ files khỏi Git repository
# Chạy: .\remove-unwanted-files.ps1

Write-Host "=== XÓA FILES KHÔNG MONG MUỐN KHỎI GIT ===" -ForegroundColor Red
Write-Host ""
Write-Host "CẢNH BÁO: Script này sẽ xóa khoảng 1,083 files khỏi Git!" -ForegroundColor Yellow
Write-Host "Files vẫn tồn tại trên local, chỉ bị xóa khỏi Git tracking." -ForegroundColor Yellow
Write-Host ""

$confirmation = Read-Host "Bạn có CHẮC CHẮN muốn tiếp tục? (nhập 'YES' để xác nhận)"

if ($confirmation -ne 'YES') {
    Write-Host "Đã hủy!" -ForegroundColor Red
    exit
}

Write-Host ""
Write-Host "Bắt đầu xóa files..." -ForegroundColor Cyan
Write-Host ""

# Danh sách folders/files cần xóa
$itemsToRemove = @(
    "packages/Webkul/Admin/.gitignore",
    "packages/Webkul/Admin/composer.json",
    "packages/Webkul/Admin/package.json",
    "packages/Webkul/Admin/postcss.config.cjs",
    "packages/Webkul/Admin/tailwind.config.js",
    "packages/Webkul/Admin/vite.config.js",
    "packages/Webkul/Admin/src/DataGrids",
    "packages/Webkul/Admin/src/Exports",
    "packages/Webkul/Admin/src/Helpers",
    "packages/Webkul/Admin/src/Http/Controllers",
    "packages/Webkul/Admin/src/Http/Resources",
    "packages/Webkul/Admin/src/Listeners",
    "packages/Webkul/Admin/src/Providers",
    "packages/Webkul/Admin/src/Resources/lang",
    "packages/Webkul/Admin/src/Resources/manifest.php",
    "packages/Webkul/Admin/src/Resources/views",
    "packages/Webkul/Admin/src/Validations",
    "packages/Webkul/Admin/tests",
    "packages/Webkul/BookingProduct",
    "packages/Webkul/DataTransfer",
    "packages/Webkul/DebugBar",
    "packages/Webkul/FPC",
    "packages/Webkul/MagicAI",
    "packages/Webkul/Notification",
    "packages/Webkul/Shop/src/CacheFilters",
    "packages/Webkul/Shop/src/Data",
    "packages/Webkul/Shop/src/Http/Controllers/API",
    "packages/Webkul/Shop/src/Http/Controllers/Customer/Account/DownloadableProductController.php",
    "packages/Webkul/Shop/src/Http/Controllers/Customer/GDPRController.php",
    "packages/Webkul/Shop/src/Http/Controllers/DataGridController.php",
    "packages/Webkul/Shop/src/Http/Requests",
    "packages/Webkul/Shop/src/Listeners",
    "packages/Webkul/Shop/src/Mail",
    "packages/Webkul/Shop/src/Resources/assets",
    "packages/Webkul/Shop/src/Resources/manifest.php",
    "packages/Webkul/Shop/src/Resources/views",
    "packages/Webkul/Shop/tests",
    "packages/Webkul/Sitemap",
    "packages/Webkul/SocialLogin",
    "packages/Webkul/SocialShare"
)

$removedCount = 0
$totalItems = $itemsToRemove.Count

foreach ($item in $itemsToRemove) {
    $removedCount++
    Write-Host "[$removedCount/$totalItems] Đang xóa: $item" -ForegroundColor Yellow
    
    git rm -r --cached --quiet $item 2>$null
    
    if ($LASTEXITCODE -eq 0) {
        Write-Host "  ✓ Đã xóa" -ForegroundColor Green
    } else {
        Write-Host "  ⚠ Không tìm thấy hoặc đã xóa" -ForegroundColor DarkYellow
    }
}

Write-Host ""
Write-Host "=== HOÀN TẤT XÓA FILES ===" -ForegroundColor Green
Write-Host ""
Write-Host "Kiểm tra kết quả:" -ForegroundColor Cyan
git status --short | Select-String "^D" | Measure-Object -Line | ForEach-Object {
    Write-Host "  Đã xóa: $($_.Lines) files" -ForegroundColor White
}

Write-Host ""
Write-Host "BƯỚ C TIẾP THEO:" -ForegroundColor Cyan
Write-Host "  1. Kiểm tra git status:" -ForegroundColor White
Write-Host "     git status" -ForegroundColor Gray
Write-Host ""
Write-Host "  2. Commit thay đổi:" -ForegroundColor White
Write-Host "     git commit -m 'Remove unnecessary packages and files'" -ForegroundColor Gray
Write-Host ""
Write-Host "  3. Push lên GitHub:" -ForegroundColor White
Write-Host "     git push origin Toan-Order" -ForegroundColor Gray
Write-Host ""
Write-Host "  4. Chạy lại script kiểm tra:" -ForegroundColor White
Write-Host "     .\check-github-files.ps1" -ForegroundColor Gray
