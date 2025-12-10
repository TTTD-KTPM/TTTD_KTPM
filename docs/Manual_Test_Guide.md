# Hướng Dẫn Thực Hiện Manual Test Cases - Order Module

**Ngày tạo:** 10/12/2025  
**Phiên bản:** 1.0  
**Môi trường test:** Bagisto v2.x Local

---

## 📋 Tổng Quan

**Tổng số Manual Tests:** 25 test cases
- **Admin Side:** 12 test cases (TC_06, TC_10-TC_20)
- **Customer Side:** 13 test cases (TC_10-TC_22)

**Thời gian ước tính:** 3-4 giờ để hoàn thành tất cả manual tests

---

## 🔧 ADMIN MANUAL TEST CASES

### TC_06: Shipment vượt tồn kho (Negative)
**Mục đích:** Kiểm tra validation khi ship quantity > stock  
**Độ ưu tiên:** HIGH  
**Thời gian:** 5 phút

**Các bước:**
1. Login Admin: http://127.0.0.1:8000/admin
2. Kiểm tra stock của product (Catalog → Products)
   - Ví dụ: Product "Nike Air Max" có stock = 50
3. Tạo order với quantity = 2
4. Create Invoice cho order
5. Create Shipment với quantity = 100 (> stock = 50)
6. Click Save

**Kết quả mong đợi:**
- ❌ Hiển thị error: "Requested quantity exceeds available stock"
- ❌ Shipment không được tạo
- ✅ Form hiển thị lại với error message

**Ghi chú:** Nếu pass validation → BUG (should prevent shipment)

---

### TC_10: Gửi email fail (Negative)
**Mục đích:** Test error handling khi SMTP fail  
**Độ ưu tiên:** MEDIUM  
**Thời gian:** 10 phút

**Các bước:**
1. Mở file `.env`
2. Cấu hình SMTP sai:
   ```
   MAIL_MAILER=smtp
   MAIL_HOST=invalid.smtp.server
   MAIL_PORT=587
   MAIL_USERNAME=test@test.com
   MAIL_PASSWORD=wrongpassword
   ```
3. Restart server: `php artisan serve`
4. Create Invoice cho order mới
5. Kiểm tra logs: `storage/logs/laravel.log`

**Kết quả mong đợi:**
- ✅ Invoice vẫn được tạo thành công
- ⚠️ Log ghi lại error "SMTP connection failed"
- ✅ Hiển thị warning "Email could not be sent" (optional)
- ❌ Không crash application

---

### TC_11: Tìm kiếm đơn hàng theo order ID
**Mục đích:** Test search functionality  
**Độ ưu tiên:** HIGH  
**Thời gian:** 3 phút

**Các bước:**
1. Go to Sales → Orders
2. Nhập order ID vào search box (ví dụ: "ORD1765336904776")
3. Press Enter hoặc click Search icon

**Kết quả mong đợi:**
- ✅ Hiển thị đúng order matching
- ✅ Nếu không tìm thấy: "No orders found"
- ✅ Search theo partial match (ví dụ: "1765" tìm được)

---

### TC_12: Lọc đơn theo status
**Mục đích:** Test status filter  
**Độ ưu tiên:** HIGH  
**Thời gian:** 5 phút

**Các bước:**
1. Go to Sales → Orders
2. Click vào Status dropdown filter
3. Chọn "Pending"
4. Click Apply/Filter

**Kết quả mong đợi:**
- ✅ Chỉ hiển thị orders có status = Pending
- ✅ Order count update đúng
- ✅ Có thể chọn multiple status (nếu support)
- ✅ Clear filter button works

**Lặp lại với:** Processing, Completed, Canceled

---

### TC_13: Xuất invoice PDF
**Mục đích:** Test PDF generation  
**Độ ưu tiên:** HIGH  
**Thời gian:** 5 phút

**Các bước:**
1. Open order có invoice (Order #5)
2. Click tab "Invoices"
3. Click "Print Invoice" hoặc PDF icon

**Kết quả mong đợi:**
- ✅ PDF file download về máy
- ✅ Tên file: `invoice-{invoice_id}.pdf`
- ✅ PDF chứa:
  - Invoice number
  - Order details
  - Customer info
  - Items list with prices
  - Total amount
  - Company logo (nếu có)

---

### TC_14: Refund một phần đơn hàng
**Mục đích:** Test partial refund  
**Độ ưu tiên:** MEDIUM  
**Thời gian:** 5 phút

**Các bước:**
1. Open completed order với total = $330
2. Click "Refund" button
3. Nhập amount = $150 (partial)
4. Select refund method
5. Click Save

**Kết quả mong đợi:**
- ✅ Refund created với amount = $150
- ✅ Order total - refunded = $180 remaining
- ✅ Có thể tạo thêm refund cho remaining amount
- ✅ Không cho refund > remaining amount

---

### TC_15: Cập nhật tracking number
**Mục đích:** Test shipment update  
**Độ ưu tiên:** MEDIUM  
**Thời gian:** 3 phút

**Các bước:**
1. Open order có shipment (Order #5)
2. Go to Shipments tab
3. Click Edit hoặc View Shipment
4. Update tracking number: "NEW-TRACK-12345"
5. Save

**Kết quả mong đợi:**
- ✅ Tracking number updated
- ✅ Update reflected trong order detail
- ✅ Customer nhận email update (nếu có)

---

### TC_16: Xem order comments/notes
**Mục đích:** Test order notes functionality  
**Độ ưu tiên:** LOW  
**Thời gian:** 5 phút

**Các bước:**
1. Open any order
2. Tìm "Comments" hoặc "Notes" section
3. Nhập comment: "Test order note - customer requested gift wrap"
4. Check "Notify customer" (nếu có)
5. Click Add Comment

**Kết quả mong đợi:**
- ✅ Comment hiển thị trong order history
- ✅ Timestamp và admin name hiển thị
- ✅ Email gửi cho customer (nếu checked)
- ✅ Comment history theo chronological order

---

### TC_17: In packing slip
**Mục đích:** Test packing slip generation  
**Độ ưu tiên:** MEDIUM  
**Thời gian:** 3 phút

**Các bước:**
1. Open order có shipment
2. Go to Shipments tab
3. Click "Print Packing Slip" hoặc "Print" button

**Kết quả mong đợi:**
- ✅ PDF/Print preview mở ra
- ✅ Chứa:
  - Shipment number
  - Shipping address
  - Items list với quantities
  - Barcode/QR code (nếu có)

---

### TC_18: Change order status manually
**Mục đích:** Test manual status update  
**Độ ưu tiên:** HIGH  
**Thời gian:** 3 phút

**Các bước:**
1. Open order status = Pending
2. Find Status dropdown/select
3. Change to "Processing"
4. Click Save/Update

**Kết quả mong đợi:**
- ✅ Status updated thành công
- ✅ Status change log ghi lại
- ✅ Email notification gửi cho customer (nếu có)
- ⚠️ Validate business rules (ví dụ: không cho Completed → Pending)

---

### TC_19: Multi-invoice cho 1 order
**Mục đích:** Test partial invoicing  
**Độ ưu tiên:** MEDIUM  
**Thời gian:** 7 phút

**Các bước:**
1. Create order với 3 items (qty: 2, 3, 5)
2. Create invoice 1: Invoice chỉ 1 item (qty: 2)
3. Verify invoice created
4. Create invoice 2: Invoice item còn lại (qty: 3, 5)
5. Verify cả 2 invoices exist

**Kết quả mong đợi:**
- ✅ Có thể tạo multiple invoices
- ✅ Tổng invoice qty = order qty
- ✅ Không cho invoice qty > remaining qty
- ✅ Invoices tab hiển thị tất cả invoices

---

### TC_20: View order từ customer email link
**Mục đích:** Test email integration  
**Độ ưu tiên:** LOW  
**Thời gian:** 5 phút

**Yêu cầu:** SMTP working, có order email

**Các bước:**
1. Create new order
2. Check customer email inbox
3. Open order confirmation email
4. Click "View Order" link trong email
5. Login nếu yêu cầu

**Kết quả mong đợi:**
- ✅ Redirect đến order detail page
- ✅ Đúng order được hiển thị
- ✅ Nếu chưa login → redirect to login → back to order
- ✅ Link có expiry time (security - optional)

---

## 👤 CUSTOMER MANUAL TEST CASES

### TC_10: Tìm kiếm order theo order number
**Mục đích:** Test customer order search  
**Độ ưu tiên:** MEDIUM  
**Thời gian:** 3 phút

**Các bước:**
1. Login customer: testcustomer@example.com
2. Go to My Account → My Orders
3. Tìm search box
4. Nhập order number: "ORD1765336904776"
5. Press Enter

**Kết quả mong đợi:**
- ✅ Hiển thị matching order
- ✅ Hoặc "No orders found" nếu không match
- ✅ Search case-insensitive

---

### TC_11: Download invoice từ customer account
**Mục đích:** Test customer invoice download  
**Độ ưu tiên:** HIGH  
**Thời gian:** 3 phút

**Các bước:**
1. Login customer
2. Go to My Orders
3. Click vào order có invoice (Order #5)
4. Tìm "Download Invoice" hoặc "View Invoice" button
5. Click download

**Kết quả mong đợi:**
- ✅ PDF invoice download
- ✅ Chứa đầy đủ thông tin như admin invoice
- ✅ Không hiển thị admin-only info (cost price, etc)

---

### TC_12: Lọc orders theo date range
**Mục đích:** Test customer order filtering  
**Độ ưu tiên:** LOW  
**Thời gian:** 3 phút

**Các bước:**
1. Go to My Orders
2. Tìm date filter (nếu có)
3. Select "Last 30 days" hoặc custom range
4. Apply filter

**Kết quả mong đợi:**
- ✅ Chỉ hiển thị orders trong date range
- ✅ Order count update
- ✅ Clear filter works

---

### TC_13: View tracking information
**Mục đích:** Test tracking display  
**Độ ưu tiên:** HIGH  
**Thời gian:** 3 phút

**Các bước:**
1. Login customer
2. Open order có shipment (Order #5)
3. Tìm "Tracking Information" section
4. Check tracking number display
5. Click tracking link (nếu có)

**Kết quả mong đợi:**
- ✅ Tracking number hiển thị: "TRACK1765337330"
- ✅ Carrier name hiển thị: "Flat Rate"
- ✅ Shipment date hiển thị
- ✅ Link redirect đến carrier tracking page (optional)

---

### TC_14: Print order detail
**Mục đích:** Test print functionality  
**Độ ưu tiên:** LOW  
**Thời gian:** 2 phút

**Các bước:**
1. Open order detail
2. Click "Print" button hoặc browser Ctrl+P
3. Check print preview

**Kết quả mong đợi:**
- ✅ Print-friendly format
- ✅ Ẩn navigation, footer, unnecessary elements
- ✅ Hiển thị đầy đủ order info, items, totals

---

### TC_15: Reorder với quantity adjustment
**Mục đích:** Test reorder flexibility  
**Độ ưu tiên:** MEDIUM  
**Thời gian:** 5 phút

**Các bước:**
1. Open order detail
2. Click "Reorder"
3. Verify items added to cart
4. Go to Cart
5. Change quantity của 1 item
6. Proceed to checkout

**Kết quả mong đợi:**
- ✅ Items added to cart với original quantities
- ✅ Có thể modify quantities trong cart
- ✅ Stock validation khi increase quantity
- ✅ Checkout works với modified quantities

---

### TC_16: Request order cancellation
**Mục đích:** Test cancel with reason  
**Độ ưu tiên:** HIGH  
**Thời gian:** 3 phút

**Các bước:**
1. Open pending order
2. Click "Cancel Order" button
3. Popup/form yêu cầu reason (nếu có)
4. Nhập reason: "Changed my mind"
5. Confirm cancel

**Kết quả mong đợi:**
- ✅ Confirmation dialog hiển thị
- ✅ After confirm → order status = Canceled
- ✅ Cancellation reason saved (nếu có)
- ✅ Email confirmation gửi cho customer

---

### TC_17: View refund information
**Mục đích:** Test refund visibility  
**Độ ưu tiên:** MEDIUM  
**Thời gian:** 3 phút

**Yêu cầu:** Order có refund

**Các bước:**
1. Admin tạo refund cho order
2. Customer login
3. Open order có refund
4. Check refund section

**Kết quả mong đợi:**
- ✅ Refund amount hiển thị
- ✅ Refund date hiển thị
- ✅ Refund status hiển thị
- ✅ Refund method hiển thị (Store Credit, Original Payment, etc)

---

### TC_18: Empty order history
**Mục đích:** Test empty state  
**Độ ưu tiên:** LOW  
**Thời gian:** 2 phút

**Các bước:**
1. Create new customer account
2. Login
3. Go to My Orders (chưa có order nào)

**Kết quả mong đợi:**
- ✅ Hiển thị empty state message
- ✅ Message: "You have no orders yet" hoặc tương tự
- ✅ CTA button: "Start Shopping" redirect to homepage/catalog
- ✅ Friendly UI, không crash

---

### TC_19: Pagination khi có nhiều orders
**Mục đích:** Test pagination  
**Độ ưu tiên:** LOW  
**Thời gian:** 5 phút

**Yêu cầu:** Customer có >20 orders

**Các bước:**
1. Create 25 orders cho customer (hoặc dùng SQL insert)
2. Login customer
3. Go to My Orders

**Kết quả mong đợi:**
- ✅ Hiển thị 10-20 orders/page (default page size)
- ✅ Pagination controls hiển thị: Previous, 1, 2, 3, Next
- ✅ Click page 2 → load orders 11-20
- ✅ Page number hiển thị trong URL: ?page=2

---

### TC_20: Order detail với multiple items
**Mục đích:** Test multi-item display  
**Độ ưu tiên:** MEDIUM  
**Thời gian:** 3 phút

**Các bước:**
1. Create order với 6 products khác nhau
2. Customer login
3. Open order detail

**Kết quả mong đợi:**
- ✅ Tất cả 6 items hiển thị
- ✅ Mỗi item show: image, name, SKU, qty, price
- ✅ Subtotal cho mỗi item đúng
- ✅ Grand total = sum of all items + shipping

---

### TC_21: Guest order tracking (nếu có)
**Mục đích:** Test guest tracking feature  
**Độ ưu tiên:** MEDIUM  
**Thời gian:** 3 phút

**Yêu cầu:** System support guest tracking

**Các bước:**
1. Create guest order (checkout without login)
2. Go to "Track Order" page (nếu có)
3. Nhập Order Number + Email
4. Click Track

**Kết quả mong đợi:**
- ✅ Hiển thị order details
- ✅ Không cần login
- ✅ Security: chỉ hiển thị khi email match
- ✅ Limited info (không show sensitive data)

---

### TC_22: Mobile responsive - view orders
**Mục đích:** Test mobile UI  
**Độ ưu tiên:** HIGH  
**Thời gian:** 5 phút

**Các bước:**
1. Mở browser Developer Tools (F12)
2. Toggle device toolbar (Ctrl+Shift+M)
3. Chọn mobile device: iPhone 12 Pro (390x844)
4. Navigate to My Orders
5. Open order detail

**Kết quả mong đợi:**
- ✅ Layout responsive, không bị overflow
- ✅ Orders list dạng cards hoặc stacked
- ✅ Touch targets đủ lớn (min 44x44px)
- ✅ Order detail scroll được
- ✅ All actions (Cancel, Reorder) accessible
- ✅ Images scale properly

**Test thêm với:** iPad, Android phone, landscape mode

---

## 📝 Checklist Thực Hiện

### Trước khi bắt đầu:
- [ ] Server đang chạy: `php artisan serve`
- [ ] Database có test data (OrderTestDataSeeder)
- [ ] Admin account: admin@example.com / admin123
- [ ] Customer account: testcustomer@example.com / password123
- [ ] Browser: Chrome/Firefox latest version

### Trong quá trình test:
- [ ] Ghi lại screenshots cho mỗi test case
- [ ] Note lại actual results
- [ ] Report bugs ngay khi phát hiện
- [ ] Update CSV file với kết quả: PASS/FAIL
- [ ] Ghi rõ bug details trong Note column

### Sau khi test:
- [ ] Tổng hợp bugs found
- [ ] Calculate pass rate
- [ ] Update Test_Summary_Order_Module.md
- [ ] Create bug report document (nếu cần)
- [ ] Share results với team

---

## 🎯 Ưu Tiên Thực Hiện

### Priority 1 (HIGH - Làm trước):
- Admin: TC_06, TC_11, TC_12, TC_13, TC_18
- Customer: TC_11, TC_13, TC_16, TC_22

### Priority 2 (MEDIUM):
- Admin: TC_10, TC_14, TC_15, TC_17, TC_19
- Customer: TC_10, TC_15, TC_17, TC_20, TC_21

### Priority 3 (LOW - Làm sau):
- Admin: TC_16, TC_20
- Customer: TC_12, TC_14, TC_18, TC_19

---

## 📊 Reporting Template

Sau mỗi test, cập nhật kết quả vào CSV:

```
Result: PASS/FAIL
Note: [Chi tiết kết quả hoặc bug description]
```

**Ví dụ:**
```
TC_11,PASS,Search works correctly - found order by ID
TC_13,FAIL,PDF generation error - 500 Internal Server Error
```

---

## ⚠️ Lưu Ý

1. **Không modify test data** trong khi test để đảm bảo consistency
2. **Clear browser cache** trước mỗi test session
3. **Test trên clean database** nếu có thể
4. **Document edge cases** nếu phát hiện
5. **Cross-browser testing** (Chrome, Firefox, Safari) cho critical features

**Thời gian ước tính hoàn thành tất cả:** 3-4 giờ  
**Recommended:** Test theo nhóm priority để optimize time

