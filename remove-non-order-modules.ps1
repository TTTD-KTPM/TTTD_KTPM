# ============================================
#  SCRIPT XÓA CÁC MODULE KHÔNG LIÊN QUAN ORDER
# ============================================

Write-Host "========================================" -ForegroundColor Cyan
Write-Host "  XÓA CÁC MODULE KHÔNG CẦN THIẾT" -ForegroundColor Cyan
Write-Host "========================================" -ForegroundColor Cyan
Write-Host ""

# Danh sách module cần XÓA
$modulesToRemove = @(
    "CMS",
    "FPC", 
    "GDPR",
    "MagicAI",
    "Marketing",
    "Paypal",
    "Sitemap",
    "SocialLogin",
    "SocialShare",
    "Theme",
    "DataTransfer"
)

$packagesPath = "packages\Webkul"
$removedCount = 0
$failedCount = 0

Write-Host "Đang xóa các module không cần thiết..." -ForegroundColor Yellow
Write-Host ""

foreach ($module in $modulesToRemove) {
    $modulePath = Join-Path $packagesPath $module
    
    if (Test-Path $modulePath) {
        try {
            Write-Host "  🗑️  Đang xóa: $module" -ForegroundColor Red
            Remove-Item -Path $modulePath -Recurse -Force -ErrorAction Stop
            $removedCount++
            Write-Host "     ✅ Đã xóa thành công" -ForegroundColor Green
        }
        catch {
            Write-Host "     ❌ Lỗi khi xóa: $_" -ForegroundColor Red
            $failedCount++
        }
    }
    else {
        Write-Host "  ⚠️  Không tìm thấy: $module" -ForegroundColor Yellow
    }
    Write-Host ""
}

Write-Host "========================================" -ForegroundColor Cyan
Write-Host "  KẾT QUẢ" -ForegroundColor Cyan  
Write-Host "========================================" -ForegroundColor Cyan
Write-Host "✅ Đã xóa: $removedCount modules" -ForegroundColor Green
Write-Host "❌ Thất bại: $failedCount modules" -ForegroundColor Red
Write-Host ""

Write-Host "========================================" -ForegroundColor Cyan
Write-Host "  CÁC MODULE CÒN LẠI (CHO ORDER)" -ForegroundColor Cyan
Write-Host "========================================" -ForegroundColor Cyan

$remainingModules = Get-ChildItem -Path $packagesPath -Directory | Select-Object -ExpandProperty Name
Write-Host ""
Write-Host "Tổng số module còn lại: $($remainingModules.Count)" -ForegroundColor Green
Write-Host ""

foreach ($module in $remainingModules | Sort-Object) {
    Write-Host "  ✅ $module" -ForegroundColor Green
}

Write-Host ""
Write-Host "========================================" -ForegroundColor Cyan
Write-Host "  BƯỚC TIẾP THEO" -ForegroundColor Cyan
Write-Host "========================================" -ForegroundColor Cyan
Write-Host ""
Write-Host "1. Kiểm tra lại các file đã xóa:" -ForegroundColor Yellow
Write-Host "   git status" -ForegroundColor White
Write-Host ""
Write-Host "2. Commit thay đổi:" -ForegroundColor Yellow
Write-Host "   git add ." -ForegroundColor White
Write-Host "   git commit -m 'refactor: Remove non-Order modules (CMS, FPC, GDPR, MagicAI, etc.)'" -ForegroundColor White
Write-Host ""
Write-Host "3. Push lên GitHub:" -ForegroundColor Yellow
Write-Host "   git push origin TT" -ForegroundColor White
Write-Host ""
Write-Host "========================================" -ForegroundColor Cyan
