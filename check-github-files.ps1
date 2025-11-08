# Script kiểm tra xem các files trong work-status.txt có tồn tại trên GitHub hay không
# Chạy: .\check-github-files.ps1

Write-Host "=== KIỂM TRA FILES TRÊN GITHUB ===" -ForegroundColor Cyan
Write-Host ""

# Đọc danh sách files từ work-status.txt
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
    "packages/Webkul/Admin/src/Providers/",
    "packages/Webkul/Admin/src/Resources/lang/",
    "packages/Webkul/Admin/src/Resources/manifest.php",
    "packages/Webkul/Admin/src/Resources/views/",
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
    "packages/Webkul/Shop/src/Http/Requests/",
    "packages/Webkul/Shop/src/Listeners/",
    "packages/Webkul/Shop/src/Mail/",
    "packages/Webkul/Shop/src/Resources/assets/",
    "packages/Webkul/Shop/src/Resources/manifest.php",
    "packages/Webkul/Shop/src/Resources/views/",
    "packages/Webkul/Shop/tests/",
    "packages/Webkul/Sitemap/",
    "packages/Webkul/SocialLogin/",
    "packages/Webkul/SocialShare/",
    "storage/",
    "work-status.txt"
)

Write-Host "1. Kiểm tra files đã được commit trên nhánh Toan-Order..." -ForegroundColor Yellow
Write-Host ""

$foundFiles = @()
$totalChecked = 0

foreach ($pattern in $excludePatterns) {
    $totalChecked++
    
    # Kiểm tra xem pattern có phải là folder không (kết thúc bằng /)
    if ($pattern -like "*/") {
        # Tìm tất cả files trong folder trên remote
        $remoteFiles = git ls-tree -r origin/Toan-Order --name-only | Where-Object { $_ -like "$pattern*" }
        
        if ($remoteFiles) {
            Write-Host "  ❌ CẢNH BÁO: Tìm thấy $($remoteFiles.Count) files trong '$pattern' trên GitHub!" -ForegroundColor Red
            $foundFiles += @{
                Pattern = $pattern
                Files = $remoteFiles
                Count = $remoteFiles.Count
            }
        } else {
            Write-Host "  ✓ OK: Không có files từ '$pattern' trên GitHub" -ForegroundColor Green
        }
    } else {
        # Kiểm tra file cụ thể
        $exists = git ls-tree -r origin/Toan-Order --name-only | Where-Object { $_ -eq $pattern }
        
        if ($exists) {
            Write-Host "  ❌ CẢNH BÁO: File '$pattern' TỒN TẠI trên GitHub!" -ForegroundColor Red
            $foundFiles += @{
                Pattern = $pattern
                Files = @($pattern)
                Count = 1
            }
        } else {
            Write-Host "  ✓ OK: File '$pattern' KHÔNG có trên GitHub" -ForegroundColor Green
        }
    }
}

Write-Host ""
Write-Host "=== KẾT QUẢ KIỂM TRA ===" -ForegroundColor Cyan
Write-Host "Đã kiểm tra: $totalChecked patterns" -ForegroundColor White

if ($foundFiles.Count -gt 0) {
    Write-Host ""
    Write-Host "⚠️  PHÁT HIỆN VẤN ĐỀ!" -ForegroundColor Red
    Write-Host "Có $($foundFiles.Count) patterns/files không nên commit nhưng đã tồn tại trên GitHub:" -ForegroundColor Yellow
    Write-Host ""
    
    $totalFoundFiles = 0
    foreach ($item in $foundFiles) {
        $totalFoundFiles += $item.Count
        Write-Host "  Pattern: $($item.Pattern)" -ForegroundColor Yellow
        Write-Host "  Số files: $($item.Count)" -ForegroundColor White
        
        # Hiển thị 5 files đầu tiên
        $item.Files | Select-Object -First 5 | ForEach-Object {
            Write-Host "    - $_" -ForegroundColor DarkYellow
        }
        if ($item.Count -gt 5) {
            Write-Host "    ... và $($item.Count - 5) files khác" -ForegroundColor DarkGray
        }
        Write-Host ""
    }
    
    Write-Host "Tổng cộng: $totalFoundFiles files không nên có trên GitHub" -ForegroundColor Red
    Write-Host ""
    Write-Host "ĐỀ XUẤT:" -ForegroundColor Cyan
    Write-Host "  1. Xóa các files này khỏi Git history bằng:" -ForegroundColor White
    Write-Host "     git rm -r --cached <file_or_folder>" -ForegroundColor Gray
    Write-Host "  2. Commit và push lại:" -ForegroundColor White
    Write-Host "     git commit -m 'Remove unwanted files'" -ForegroundColor Gray
    Write-Host "     git push origin Toan-Order" -ForegroundColor Gray
} else {
    Write-Host ""
    Write-Host "✓ TẤT CẢ OK!" -ForegroundColor Green
    Write-Host "Không có files không mong muốn trên GitHub." -ForegroundColor Green
    Write-Host "Các files trong work-status.txt đều KHÔNG được commit." -ForegroundColor Green
}

Write-Host ""
Write-Host "=== KIỂM TRA BỔ SUNG ===" -ForegroundColor Cyan

# Kiểm tra tất cả files trên remote
Write-Host ""
Write-Host "Tổng số files trên nhánh Toan-Order:" -ForegroundColor Yellow
$allRemoteFiles = git ls-tree -r origin/Toan-Order --name-only
Write-Host "  $($allRemoteFiles.Count) files" -ForegroundColor White

# Liệt kê một số files gần đây nhất
Write-Host ""
Write-Host "10 files mới commit gần đây nhất:" -ForegroundColor Yellow
git log origin/Toan-Order --name-only --oneline -10 | Select-Object -First 15 | ForEach-Object {
    Write-Host "  $_" -ForegroundColor Gray
}
