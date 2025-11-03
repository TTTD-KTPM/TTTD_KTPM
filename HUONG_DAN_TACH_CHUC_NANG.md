# 🔄 HƯỚNG DẪN: RESET NHÁNH TT VỀ SƯỜN TRỐNG VÀ THÊM TỪNG CHỨC NĂNG

## ❌ VẤN ĐỀ HIỆN TẠI

Nhánh **TT** hiện có đầy đủ:
- ✅ Products
- ✅ Customers  
- ✅ Orders
- ✅ Marketing
- ✅ Settings
- ✅ CMS
- ✅ Tất cả chức năng Bagisto

**Bạn muốn**: Chỉ có sườn Bagisto, sau đó thêm **từng chức năng** một cách **tách biệt**.

---

## ⚠️ VẤN ĐỀ KỸ THUẬT

**Bagisto là monolithic e-commerce**, KHÔNG phải microservices:
- ❌ KHÔNG THỂ tách riêng Order mà không có Product, Customer, Cart
- ❌ KHÔNG THỂ tách riêng Product mà không có Attribute, Category, Inventory
- ❌ KHÔNG THỂ chạy được nếu thiếu core dependencies

**Giải pháp thay thế**:

---

## ✅ OPTION 1: RESET NHÁNH TT VỀ COMMIT GỐC (ĐANG CÓ GÌ)

### Bước 1: Backup nhánh TT hiện tại
```bash
git branch TT-backup

git checkout TT
```

### Bước 2: Reset về commit "sườn" gần nhất
```bash
# Option A: Về commit đầu tiên (8fa6b46)
git reset --hard 8fa6b46

# Option B: Về commit có cấu trúc ban đầu (3aa56fa)
git reset --hard 3aa56fa
```

### Bước 3: Force push lên GitHub
```bash
git push origin TT --force
```

**⚠️ CẢNH BÁO**: Sẽ MẤT tất cả commits đã push (706 files Order, test config, v.v.)

---

## ✅ OPTION 2: TẠO NHÁNH MỚI CHO TESTING TỪNG CHỨC NĂNG (KHUYẾN NGHỊ)

Thay vì reset TT, tạo nhánh mới cho mỗi chức năng:

### Cấu trúc nhánh đề xuất:
```
main                    # Code đầy đủ
├── TT                  # Code đầy đủ (giữ nguyên)
├── feature/order-only  # Chỉ test Order
├── feature/product     # Chỉ test Product  
├── feature/customer    # Chỉ test Customer
└── feature/minimal     # Sườn trống
```

### Triển khai:

```bash
# 1. Tạo nhánh minimal (sườn trống)
git checkout -b feature/minimal 8fa6b46

# 2. Push lên GitHub
git push -u origin feature/minimal

# 3. Tạo nhánh Order từ minimal
git checkout -b feature/order-only feature/minimal

# 4. Cherry-pick TỪNG commit Order
git cherry-pick <commit-hash-order>

# 5. Test riêng
php artisan test --filter=Order
```

---

## ✅ OPTION 3: SỬ DỤNG phpunit.xml ĐỂ TEST RIÊNG (HIỆN TẠI)

**KHÔNG cần reset code**, chỉ cần:

### 1. Giữ nguyên nhánh TT (có đầy đủ code)

### 2. Test từng chức năng riêng:
```bash
# Test CHỈ Order
php artisan test --configuration=phpunit.order.xml

# Test CHỈ Product (tạo file mới)
php artisan test --configuration=phpunit.product.xml

# Test CHỈ Customer
php artisan test --configuration=phpunit.customer.xml
```

### 3. Tạo documentation riêng cho từng chức năng

---

## 🎯 KHUYẾN NGHỊ: OPTION 3

**LÝ DO**:
1. ✅ Giữ nguyên code hoàn chỉnh (không break dependencies)
2. ✅ Test riêng từng chức năng qua config
3. ✅ Dễ maintain và debug
4. ✅ Không mất công reset/cherry-pick
5. ✅ Phù hợp với monolithic architecture của Bagisto

**Thực hiện**:

### Bước 1: Tạo config test cho từng chức năng

Đã có: ✅ `phpunit.order.xml`

Tạo thêm:
- `phpunit.product.xml`
- `phpunit.customer.xml`
- `phpunit.cart.xml`
- `phpunit.checkout.xml`

### Bước 2: Tạo documentation riêng

Đã có: ✅ `ORDER_FEATURE_FILES.md`

Tạo thêm:
- `PRODUCT_FEATURE_FILES.md`
- `CUSTOMER_FEATURE_FILES.md`
- v.v.

### Bước 3: Test từng chức năng độc lập

```bash
# Test Order
php artisan test --configuration=phpunit.order.xml

# Test Product
php artisan test --configuration=phpunit.product.xml
```

---

## 📊 SO SÁNH CÁC OPTIONS

| Tiêu chí | Option 1: Reset | Option 2: Nhánh mới | Option 3: Config test |
|----------|----------------|---------------------|----------------------|
| **Mất code** | ❌ Có | ✅ Không | ✅ Không |
| **Complexity** | ⚠️ Cao | ⚠️ Trung bình | ✅ Thấp |
| **Dependencies** | ❌ Broken | ⚠️ Cần cherry-pick cẩn thận | ✅ Hoàn chỉnh |
| **Test riêng** | ⚠️ Khó | ✅ Dễ | ✅ Rất dễ |
| **Maintain** | ❌ Khó | ⚠️ Nhiều nhánh | ✅ Dễ |
| **Phù hợp** | ❌ Không | ⚠️ Tạm | ✅ Tốt nhất |

---

## 🚀 HÀNH ĐỘNG ĐỀ XUẤT

### Nếu bạn muốn tiếp tục với cấu trúc hiện tại:

✅ **GIỮ NGUYÊN** nhánh TT (có đầy đủ code)
✅ **SỬ DỤNG** `phpunit.order.xml` để test riêng Order
✅ **TẠO THÊM** config test cho chức năng khác khi cần
✅ **DOCUMENT** từng chức năng trong file markdown riêng

### Nếu bạn THỰC SỰ muốn reset về sườn trống:

⚠️ **BACKUP** trước: `git branch TT-full-backup`
⚠️ **XÁC NHẬN** bạn chấp nhận mất 706 files đã commit
⚠️ **THỰC HIỆN**:
```bash
git checkout TT
git reset --hard 8fa6b46  # Commit đầu tiên
git push origin TT --force

# Sau đó thêm lại từng chức năng thủ công
```

---

## ❓ CÂU HỎI

**"Tại sao không tách được Order riêng?"**

→ Order phụ thuộc: Product, Customer, Cart, Payment, Shipping, Tax, Inventory, Address, Currency, Channel

**"Tại sao không xóa code Product, Customer?"**

→ Order sẽ bị lỗi, không chạy được, migrations fail, tests fail

**"Vậy làm sao test riêng Order?"**

→ Dùng `phpunit.order.xml` - chỉ chạy test Order, ignore test khác

---

## 📞 BẠN MUỐN GÌ TIẾP THEO?

1. ✅ **Giữ nguyên** (Option 3) - Test riêng qua config?
2. ⚠️ **Reset TT** về sườn trống (Option 1) - Mất code hiện tại?
3. 🔀 **Tạo nhánh mới** (Option 2) - Nhiều nhánh cho từng feature?

Hãy cho tôi biết để tôi thực hiện đúng yêu cầu của bạn! 🚀
