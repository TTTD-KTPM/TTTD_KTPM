# Script đơn giản để tạo nhánh TT với đầy đủ code Order
# Chạy từ thư mục gốc project

Write-Host "========================================" -ForegroundColor Cyan
Write-Host "  CHUẨN BỊ NHÁNH TT CHO CHỨC NĂNG ORDER" -ForegroundColor Cyan
Write-Host "========================================" -ForegroundColor Cyan
Write-Host ""

# 1. Kiểm tra xem đang ở nhánh nào
$currentBranch = git rev-parse --abbrev-ref HEAD
Write-Host "1. Nhánh hiện tại: $currentBranch" -ForegroundColor Yellow

# 2. Stash các thay đổi
Write-Host "`n2. Đang lưu tạm các thay đổi..." -ForegroundColor Yellow
git add .
git stash push -m "Temporary stash before TT branch - $(Get-Date -Format 'yyyy-MM-dd HH:mm:ss')"

# 3. Tạo nhánh TT
Write-Host "`n3. Đang tạo nhánh TT..." -ForegroundColor Yellow
$branchExists = git branch --list TT
if ($branchExists) {
    Write-Host "   Nhánh TT đã tồn tại, chuyển sang nhánh TT..." -ForegroundColor Cyan
    git checkout TT
} else {
    Write-Host "   Tạo nhánh TT mới từ main..." -ForegroundColor Green
    git checkout -b TT
}

# 4. Apply lại các thay đổi
Write-Host "`n4. Đang khôi phục các thay đổi..." -ForegroundColor Yellow
git stash pop

# 5. Thông báo
Write-Host "`n========================================" -ForegroundColor Green
Write-Host "  ✓ HOÀN TẤT!" -ForegroundColor Green
Write-Host "========================================" -ForegroundColor Green
Write-Host ""
Write-Host "Bạn đang ở nhánh: " -NoNewline
Write-Host "TT" -ForegroundColor Cyan
Write-Host ""
Write-Host "CÁC BƯỚC TIẾP THEO:" -ForegroundColor Yellow
Write-Host ""
Write-Host "1. Xem các file đã thay đổi:" -ForegroundColor White
Write-Host "   git status" -ForegroundColor Gray
Write-Host ""
Write-Host "2. Add tất cả các file:" -ForegroundColor White  
Write-Host "   git add ." -ForegroundColor Gray
Write-Host ""
Write-Host "3. Commit với message:" -ForegroundColor White
Write-Host "   git commit -m `"feat: Add complete Order feature with FE, BE, logic and tests`"" -ForegroundColor Gray
Write-Host ""
Write-Host "4. Push lên GitHub:" -ForegroundColor White
Write-Host "   git push origin TT" -ForegroundColor Gray
Write-Host ""
Write-Host "5. Nếu lần đầu push nhánh mới:" -ForegroundColor White
Write-Host "   git push -u origin TT" -ForegroundColor Gray
Write-Host ""
Write-Host "========================================" -ForegroundColor Cyan
Write-Host "LƯU Ý:" -ForegroundColor Yellow
Write-Host "- Nhánh TT sẽ chứa TOÀN BỘ code hiện tại" -ForegroundColor White
Write-Host "- Bao gồm đầy đủ chức năng Order và các dependencies" -ForegroundColor White
Write-Host "- Xem file HUONG_DAN_TACH_ORDER.md để biết thêm chi tiết" -ForegroundColor White
Write-Host "========================================" -ForegroundColor Cyan
