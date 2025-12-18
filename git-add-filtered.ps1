# Script để add tất cả files TRỪ những files trong danh sách loại trừ
# Chạy: .\git-add-filtered.ps1

Write-Host "=== GIT ADD FILTERED SCRIPT ===" -ForegroundColor Cyan
Write-Host ""

# Danh sách các pattern cần loại trừ (từ work-status.txt)
$excludePatterns = @(
    "packages/Webkul/Admin/.gitignore",
    "packages/Webkul/Admin/composer.json",
    "packages/Webkul/Admin/package.json",
    "packages/Webkul/Admin/postcss.config.cjs",
    "packages/Webkul/Admin/src/DataGrids/",
    "packages/Webkul/Admin/src/Exports/",
    "packages/Webkul/Admin/src/Helpers/",
    "packages/Webkul/Admin/src/Http/Controllers/",
    "packages/Webkul/Admin/src/Http/Resources/",
    "packages/Webkul/Admin/src/Listeners/",
    "packages/Webkul/Admin/src/Providers/.gitkeep",
    "packages/Webkul/Admin/src/Resources/lang/",
    "packages/Webkul/Admin/src/Resources/manifest.php",
    "packages/Webkul/Admin/src/Resources/views/.gitkeep",
    "packages/Webkul/Admin/src/Resources/views/account/",
    "packages/Webkul/Admin/src/Resources/views/catalog/",
    "packages/Webkul/Admin/src/Resources/views/cms/",
    "packages/Webkul/Admin/src/Resources/views/configuration/",
    "packages/Webkul/Admin/src/Resources/views/emails/",
    "packages/Webkul/Admin/src/Resources/views/errors/",
    "packages/Webkul/Admin/src/Resources/views/marketing/",
    "packages/Webkul/Admin/src/Resources/views/notifications/",
    "packages/Webkul/Admin/src/Resources/views/reporting/",
    "packages/Webkul/Admin/src/Resources/views/sales/",
    "packages/Webkul/Admin/src/Resources/views/settings/",
    "packages/Webkul/Admin/src/Validations/",
    "packages/Webkul/Admin/tailwind.config.js",
    "packages/Webkul/Admin/tests/",
    "packages/Webkul/Admin/vite.config.js",
    "packages/Webkul/BookingProduct/",
    "packages/Webkul/DataTransfer/",
    "packages/Webkul/DebugBar/",
    "packages/Webkul/FPC/",
    "packages/Webkul/MagicAI/",
    "packages/Webkul/Notification/",
    "packages/Webkul/Shop/src/CacheFilters/",
    "packages/Webkul/Shop/src/Data/",
    "packages/Webkul/Shop/src/Http/Controllers/API/",
    "packages/Webkul/Shop/src/Http/Controllers/Customer/Account/DownloadableProductController.php",
    "packages/Webkul/Shop/src/Http/Controllers/Customer/GDPRController.php",
    "packages/Webkul/Shop/src/Http/Controllers/DataGridController.php",
    "packages/Webkul/Shop/src/Http/Requests/ContactRequest.php",
    "packages/Webkul/Shop/src/Listeners/",
    "packages/Webkul/Shop/src/Mail/",
    "packages/Webkul/Shop/src/Resources/assets/fonts/",
    "packages/Webkul/Shop/src/Resources/assets/images/",
    "packages/Webkul/Shop/src/Resources/assets/js/lazysizes.min.js",
    "packages/Webkul/Shop/src/Resources/assets/js/plugins/",
    "packages/Webkul/Shop/src/Resources/assets/locales/",
    "packages/Webkul/Shop/src/Resources/manifest.php",
    "packages/Webkul/Shop/src/Resources/views/categories/",
    "packages/Webkul/Shop/src/Resources/views/cms/",
    "packages/Webkul/Shop/src/Resources/views/compare/",
    "packages/Webkul/Shop/src/Resources/views/components/carousel/",
    "packages/Webkul/Shop/src/Resources/views/components/categories/",
    "packages/Webkul/Shop/src/Resources/views/components/example.blade.php",
    "packages/Webkul/Shop/src/Resources/views/components/image-zoomer/",
    "packages/Webkul/Shop/src/Resources/views/components/products/",
    "packages/Webkul/Shop/src/Resources/views/components/range-slider/",
    "packages/Webkul/Shop/src/Resources/views/customers/account/downloadable_products/",
    "packages/Webkul/Shop/src/Resources/views/customers/account/gdpr/",
    "packages/Webkul/Shop/src/Resources/views/emails/",
    "packages/Webkul/Shop/src/Resources/views/errors/",
    "packages/Webkul/Shop/src/Resources/views/home/",
    "packages/Webkul/Shop/tests/",
    "packages/Webkul/Sitemap/",
    "packages/Webkul/SocialLogin/",
    "packages/Webkul/SocialShare/",
    "storage/",
    "work-status.txt"
)

Write-Host "1. Lấy danh sách untracked files..." -ForegroundColor Yellow
$untrackedFiles = git ls-files --others --exclude-standard

Write-Host "   Tổng số untracked files: $($untrackedFiles.Count)" -ForegroundColor White
Write-Host ""

Write-Host "2. Lọc files cần add (loại trừ patterns)..." -ForegroundColor Yellow
$filesToAdd = @()
$filesExcluded = @()

foreach ($file in $untrackedFiles) {
    $shouldExclude = $false
    
    foreach ($pattern in $excludePatterns) {
        if ($file -like "*$pattern*") {
            $shouldExclude = $true
            $filesExcluded += $file
            break
        }
    }
    
    if (-not $shouldExclude) {
        $filesToAdd += $file
    }
}

Write-Host "   Files sẽ được ADD: $($filesToAdd.Count)" -ForegroundColor Green
Write-Host "   Files bị LOẠI TRỪ: $($filesExcluded.Count)" -ForegroundColor Red
Write-Host ""

# Hiển thị danh sách files sẽ add
if ($filesToAdd.Count -gt 0) {
    Write-Host "=== FILES SẼ ĐƯỢC ADD ===" -ForegroundColor Green
    foreach ($file in $filesToAdd) {
        Write-Host "  ✓ $file" -ForegroundColor Green
    }
    Write-Host ""
}

# Hiển thị một vài files bị loại trừ (để kiểm tra)
if ($filesExcluded.Count -gt 0) {
    Write-Host "=== MỘT SỐ FILES BỊ LOẠI TRỪ (10 đầu tiên) ===" -ForegroundColor Red
    $filesExcluded | Select-Object -First 10 | ForEach-Object {
        Write-Host "  ✗ $_" -ForegroundColor Red
    }
    if ($filesExcluded.Count -gt 10) {
        Write-Host "  ... và $($filesExcluded.Count - 10) files khác" -ForegroundColor DarkRed
    }
    Write-Host ""
}

# Xác nhận trước khi add
Write-Host "=== XÁC NHẬN ===" -ForegroundColor Yellow
Write-Host "Bạn có muốn add $($filesToAdd.Count) files vào staging area không?" -ForegroundColor Yellow
$confirmation = Read-Host "Nhấn 'y' để tiếp tục, bất kỳ phím nào khác để hủy"

if ($confirmation -eq 'y' -or $confirmation -eq 'Y') {
    Write-Host ""
    Write-Host "3. Đang add files..." -ForegroundColor Yellow
    
    $addedCount = 0
    foreach ($file in $filesToAdd) {
        git add $file
        $addedCount++
        if ($addedCount % 10 -eq 0) {
            Write-Host "   Đã add $addedCount/$($filesToAdd.Count) files..." -ForegroundColor Cyan
        }
    }
    
    Write-Host ""
    Write-Host "✓ ĐÃ HOÀN THÀNH! Đã add $addedCount files." -ForegroundColor Green
    Write-Host ""
    Write-Host "Chạy lệnh sau để xem kết quả:" -ForegroundColor Cyan
    Write-Host "  git status" -ForegroundColor White
    Write-Host ""
    Write-Host "Sau đó commit với:" -ForegroundColor Cyan
    Write-Host "  git commit -m 'your message'" -ForegroundColor White
} else {
    Write-Host ""
    Write-Host "✗ Đã hủy! Không add files nào." -ForegroundColor Red
}
