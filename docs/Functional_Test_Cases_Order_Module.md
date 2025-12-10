# FUNCTIONAL TEST CASES - ORDER MODULE

## Mục tiêu
Đảm bảo quy trình quản lý đơn hàng, thanh toán, xuất hóa đơn, giao hàng và hoàn tiền hoạt động đúng.

---

## A. Module Checkout (Thanh toán)

| ID | Test Case Description | Test Case Procedure | Expected Output | Test Data | Result | Inter-test case Dependence | Test date | Note |
|---|---|---|---|---|---|---|---|---|
| **Function: Checkout Process** ||||||||
| CHK-1 | Kiểm tra quy trình thanh toán thành công với khách hàng đã đăng nhập | 1. Đăng nhập tài khoản<br>2. Thêm sản phẩm vào giỏ hàng<br>3. Nhấn "Proceed to Checkout"<br>4. Điền thông tin giao hàng<br>5. Chọn phương thức thanh toán<br>6. Xác nhận đơn hàng | 1. Hiển thị trang checkout<br>2. Tự động điền địa chỉ đã lưu<br>3. Tạo đơn hàng thành công<br>4. Hiển thị Order ID<br>5. Gửi email xác nhận | Customer: john@example.com<br>Password: 123456<br>Product: SKU-001<br>Quantity: 2<br>Payment: Cash on Delivery | Pass |  |  |  |
| CHK-2 | Kiểm tra thanh toán với khách hàng chưa đăng nhập (Guest) | 1. Không đăng nhập<br>2. Thêm sản phẩm vào giỏ<br>3. Checkout<br>4. Điền đầy đủ thông tin shipping<br>5. Chọn payment method<br>6. Place order | 1. Cho phép checkout không cần login<br>2. Yêu cầu nhập đầy đủ thông tin<br>3. Tạo order thành công<br>4. Gửi email confirmation | Email: guest@test.com<br>Phone: 0123456789<br>Address: 123 Test St<br>Product: SKU-002<br>Qty: 1 | Pass |  |  |  |
| CHK-3 | Kiểm tra validate địa chỉ giao hàng | 1. Vào checkout<br>2. Bỏ trống trường bắt buộc (First Name, Address, City)<br>3. Nhấn "Continue" | 1. Hiển thị lỗi validation<br>2. Không cho phép tiếp tục<br>3. Highlight trường lỗi màu đỏ | First Name: (empty)<br>Address: (empty)<br>City: (empty) | Pass |  |  |  |
| CHK-4 | Kiểm tra áp dụng mã giảm giá (Coupon) | 1. Thêm sản phẩm vào cart<br>2. Vào checkout<br>3. Nhập coupon code hợp lệ<br>4. Apply coupon<br>5. Hoàn tất đơn hàng | 1. Giảm giá được áp dụng<br>2. Hiển thị giá sau giảm<br>3. Order total chính xác | Coupon: SAVE10<br>Discount: 10%<br>Original: $100<br>Final: $90 | Pass |  |  |  |
| CHK-5 | Kiểm tra tính phí vận chuyển | 1. Checkout với địa chỉ khác nhau<br>2. Kiểm tra shipping fee | 1. Tính phí ship chính xác theo khu vực<br>2. Hiển thị breakdown chi phí | Address 1: Nội thành ($5)<br>Address 2: Ngoại thành ($15) | Pass | CHK-1 |  |  |
| CHK-6 | Kiểm tra thanh toán online (Payment Gateway) | 1. Chọn payment method: Credit Card<br>2. Nhập thông tin thẻ<br>3. Submit payment | 1. Redirect đến payment gateway<br>2. Xử lý thanh toán<br>3. Return về site với trạng thái | Card: 4242 4242 4242 4242<br>Exp: 12/25<br>CVV: 123 | Pass |  |  |  |
| CHK-7 | Kiểm tra xử lý khi thanh toán thất bại | 1. Chọn online payment<br>2. Nhập thẻ không hợp lệ<br>3. Submit | 1. Hiển thị lỗi payment failed<br>2. Order vẫn được tạo với status "Pending Payment"<br>3. Cho phép retry payment | Card: 0000 0000 0000 0000<br>Result: Declined | Pass | CHK-6 |  |  |

---

## B. Module Order Management (Quản lý đơn hàng)

| ID | Test Case Description | Test Case Procedure | Expected Output | Test Data | Result | Inter-test case Dependence | Test date | Note |
|---|---|---|---|---|---|---|---|---|
| **Function: View Orders** ||||||||
| ORD-1 | Kiểm tra xem danh sách đơn hàng (Customer) | 1. Đăng nhập customer<br>2. Vào "My Orders"<br>3. Xem danh sách orders | 1. Hiển thị tất cả orders của customer<br>2. Hiển thị: Order ID, Date, Status, Total<br>3. Sắp xếp theo ngày mới nhất | Customer: john@example.com<br>Orders: 5 orders | Pass | CHK-1 |  |  |
| ORD-2 | Kiểm tra xem chi tiết đơn hàng | 1. Vào "My Orders"<br>2. Click vào 1 order<br>3. Xem chi tiết | 1. Hiển thị full order details:<br>- Items & quantities<br>- Shipping address<br>- Payment method<br>- Order status<br>- Total breakdown | Order ID: #12345<br>Items: 3 products<br>Status: Processing | Pass | ORD-1 |  |  |
| ORD-3 | Kiểm tra filter đơn hàng theo status | 1. Vào Order list<br>2. Filter theo status: "Completed"<br>3. Apply filter | 1. Chỉ hiển thị orders có status = Completed<br>2. Đếm số lượng chính xác | Filter: Status = Completed<br>Expected: 2 orders | Pass | ORD-1 |  |  |
| ORD-4 | Kiểm tra search đơn hàng theo Order ID | 1. Vào Order management<br>2. Nhập Order ID vào search<br>3. Search | 1. Tìm và hiển thị đúng order<br>2. Highlight keyword | Search: #12345 | Pass | ORD-1 |  |  |
| **Function: Update Order Status** ||||||||
| ORD-5 | Kiểm tra cập nhật trạng thái đơn hàng (Admin) | 1. Đăng nhập Admin<br>2. Vào Sales > Orders<br>3. Chọn 1 order<br>4. Update status: Pending → Processing | 1. Status được cập nhật<br>2. Ghi log thay đổi<br>3. Gửi email thông báo customer | Order: #12345<br>Old: Pending<br>New: Processing | Pass |  |  |  |
| ORD-6 | Kiểm tra cancel đơn hàng | 1. Customer vào order detail<br>2. Click "Cancel Order"<br>3. Xác nhận cancel | 1. Status = Canceled<br>2. Hoàn lại stock<br>3. Không thể undo | Order: #12346<br>Status: Pending → Canceled<br>Stock returned: +2 items | Pass | ORD-2 |  |  |
| ORD-7 | Kiểm tra không cho cancel order đã ship | 1. Chọn order có status = Shipped<br>2. Thử cancel | 1. Hiển thị lỗi: "Cannot cancel shipped order"<br>2. Status không thay đổi | Order: #12347<br>Status: Shipped | Pass | ORD-5 |  |  |

---

## C. Module Invoice (Hóa đơn)

| ID | Test Case Description | Test Case Procedure | Expected Output | Test Data | Result | Inter-test case Dependence | Test date | Note |
|---|---|---|---|---|---|---|---|---|
| **Function: Create Invoice** ||||||||
| INV-1 | Kiểm tra tạo invoice cho đơn hàng | 1. Admin vào order detail<br>2. Click "Create Invoice"<br>3. Xác nhận số lượng sản phẩm<br>4. Submit invoice | 1. Tạo invoice thành công<br>2. Invoice ID được sinh tự động<br>3. Status order = Invoiced<br>4. Gửi invoice PDF qua email | Order: #12345<br>Items: 2 products<br>Invoice ID: INV-001 | Pass | ORD-5 |  |  |
| INV-2 | Kiểm tra tạo partial invoice (Invoice 1 phần) | 1. Vào order có 3 items<br>2. Create invoice chỉ cho 2 items<br>3. Submit | 1. Invoice cho 2 items<br>2. Order vẫn Partially Invoiced<br>3. Có thể tạo invoice tiếp cho item còn lại | Order: #12348<br>Total items: 3<br>Invoiced: 2<br>Remaining: 1 | Pass | ORD-5 |  |  |
| INV-3 | Kiểm tra xem danh sách invoices | 1. Vào Sales > Invoices<br>2. Xem list | 1. Hiển thị tất cả invoices<br>2. Show: Invoice ID, Order ID, Date, Total, Status | Filter: All invoices<br>Result: 10 invoices | Pass | INV-1 |  |  |
| INV-4 | Kiểm tra print/download invoice PDF | 1. Vào invoice detail<br>2. Click "Print Invoice" | 1. Generate PDF file<br>2. PDF chứa đầy đủ thông tin:<br>- Invoice number<br>- Date<br>- Items & prices<br>- Tax breakdown<br>- Total | Invoice: INV-001<br>Format: PDF<br>Size: < 500KB | Pass | INV-1 |  |  |
| INV-5 | Kiểm tra không tạo invoice cho canceled order | 1. Chọn canceled order<br>2. Thử create invoice | 1. Không hiển thị nút "Create Invoice"<br>2. Hoặc hiển thị lỗi nếu force create | Order: #12346<br>Status: Canceled | Pass | ORD-6 |  |  |

---

## D. Module Shipment (Vận chuyển)

| ID | Test Case Description | Test Case Procedure | Expected Output | Test Data | Result | Inter-test case Dependence | Test date | Note |
|---|---|---|---|---|---|---|---|---|
| **Function: Create Shipment** ||||||||
| SHP-1 | Kiểm tra tạo shipment cho đơn hàng | 1. Admin vào order detail<br>2. Click "Ship"<br>3. Nhập tracking number<br>4. Chọn carrier<br>5. Submit shipment | 1. Tạo shipment thành công<br>2. Order status = Shipped<br>3. Gửi email tracking đến customer<br>4. Hiển thị tracking info | Order: #12345<br>Tracking: TRK123456789<br>Carrier: DHL Express | Pass | INV-1 |  |  |
| SHP-2 | Kiểm tra tạo partial shipment | 1. Order có 3 items<br>2. Ship chỉ 2 items<br>3. Submit | 1. Shipment cho 2 items<br>2. Order = Partially Shipped<br>3. Có thể tạo shipment tiếp | Order: #12349<br>Total: 3 items<br>Shipped: 2<br>Pending: 1 | Pass | ORD-5 |  |  |
| SHP-3 | Kiểm tra xem danh sách shipments | 1. Vào Sales > Shipments<br>2. View list | 1. Hiển thị all shipments<br>2. Show: Shipment ID, Order ID, Tracking, Status, Date | Total shipments: 8 | Pass | SHP-1 |  |  |
| SHP-4 | Kiểm tra track shipment (Customer) | 1. Customer vào order detail<br>2. Click "Track Shipment"<br>3. Xem tracking info | 1. Hiển thị tracking number<br>2. Link đến carrier tracking page<br>3. Shipment status | Order: #12345<br>Tracking: TRK123456789<br>Carrier: DHL | Pass | SHP-1 |  |  |
| SHP-5 | Kiểm tra print packing slip | 1. Vào shipment detail<br>2. Click "Print Packing Slip" | 1. Generate PDF packing slip<br>2. Chứa:<br>- Shipment info<br>- Items list<br>- Quantities<br>- Addresses | Shipment: SHP-001<br>Items: 2 products | Pass | SHP-1 |  |  |
| SHP-6 | Kiểm tra không ship order chưa có invoice | 1. Chọn order pending<br>2. Thử create shipment | 1. Hiển thị warning hoặc không cho ship<br>2. Yêu cầu create invoice trước | Order: #12350<br>Status: Pending<br>Invoice: None | Pass | ORD-5 |  |  |

---

## E. Module Refund (Hoàn tiền)

| ID | Test Case Description | Test Case Procedure | Expected Output | Test Data | Result | Inter-test case Dependence | Test date | Note |
|---|---|---|---|---|---|---|---|---|
| **Function: Create Credit Memo** ||||||||
| REF-1 | Kiểm tra tạo refund toàn bộ đơn hàng | 1. Vào invoiced order<br>2. Click "Credit Memo"<br>3. Chọn refund all items<br>4. Nhập lý do<br>5. Submit | 1. Tạo credit memo thành công<br>2. Hoàn tiền vào payment method<br>3. Hoàn stock<br>4. Order status = Closed<br>5. Gửi email refund confirmation | Order: #12345<br>Refund amount: $100<br>Items: All (2 items)<br>Reason: Customer request | Pass | INV-1 |  |  |
| REF-2 | Kiểm tra partial refund (Hoàn 1 phần) | 1. Vào order có 3 items<br>2. Create credit memo cho 1 item<br>3. Submit | 1. Refund cho 1 item thành công<br>2. Refund amount = giá của item đó<br>3. Order = Partially Refunded<br>4. Stock +1 cho item được refund | Order: #12351<br>Total items: 3<br>Refund: 1 item ($30)<br>Remaining: $70 | Pass | INV-1 |  |  |
| REF-3 | Kiểm tra refund với adjustment fee | 1. Create credit memo<br>2. Thêm adjustment fee (+$5)<br>3. Submit | 1. Refund amount = Original - Adjustment<br>2. Hiển thị breakdown rõ ràng | Original: $100<br>Adjustment: +$5<br>Refund: $95 | Pass | REF-1 |  |  |
| REF-4 | Kiểm tra refund shipping fee | 1. Create credit memo<br>2. Check "Refund Shipping"<br>3. Submit | 1. Refund bao gồm cả shipping fee<br>2. Total refund = Items + Shipping | Items: $100<br>Shipping: $10<br>Total refund: $110 | Pass | REF-1 |  |  |
| REF-5 | Kiểm tra không refund order chưa invoice | 1. Chọn order chưa invoice<br>2. Thử create credit memo | 1. Không hiển thị option Credit Memo<br>2. Hiển thị message yêu cầu invoice trước | Order: #12352<br>Status: Pending<br>Invoice: None | Pass | ORD-5 |  |  |
| REF-6 | Kiểm tra xem danh sách credit memos | 1. Vào Sales > Credit Memos<br>2. View list | 1. Hiển thị all credit memos<br>2. Show: Memo ID, Order ID, Refund Amount, Date, Status | Total memos: 5 | Pass | REF-1 |  |  |
| REF-7 | Kiểm tra validate refund quantity | 1. Thử refund quantity > invoiced quantity<br>2. Submit | 1. Hiển thị lỗi validation<br>2. Không cho submit | Invoice qty: 2<br>Refund qty: 3<br>Error: "Cannot refund more than invoiced" | Pass | INV-1 |  |  |

---

## F. Module Order Status Workflow

| ID | Test Case Description | Test Case Procedure | Expected Output | Test Data | Result | Inter-test case Dependence | Test date | Note |
|---|---|---|---|---|---|---|---|---|
| **Function: Order Status Flow** ||||||||
| STA-1 | Kiểm tra flow: Pending → Processing → Complete | 1. Tạo order mới<br>2. Update: Pending → Processing<br>3. Create invoice & ship<br>4. Auto update → Complete | 1. Các status transition hợp lệ<br>2. Ghi log từng bước<br>3. Email notification | Order: #12353<br>Flow: Pending → Processing → Complete | Pass | CHK-1, INV-1, SHP-1 |  |  |
| STA-2 | Kiểm tra không cho transition không hợp lệ | 1. Thử update Pending → Shipped (skip Processing) | 1. Hiển thị lỗi<br>2. Status không thay đổi<br>3. Suggest correct flow | Order: #12354<br>Current: Pending<br>Invalid: Shipped | Pass |  |  |  |
| STA-3 | Kiểm tra order status history | 1. Vào order detail<br>2. Xem "Status History" tab | 1. Hiển thị timeline tất cả status changes<br>2. Show: Date, Old status, New status, User | Order: #12353<br>Changes: 4 transitions<br>Users: admin, system | Pass | STA-1 |  |  |

---

## G. Module Payment Integration

| ID | Test Case Description | Test Case Procedure | Expected Output | Test Data | Result | Inter-test case Dependence | Test date | Note |
|---|---|---|---|---|---|---|---|---|
| **Function: Payment Methods** ||||||||
| PAY-1 | Kiểm tra Cash on Delivery (COD) | 1. Checkout với COD<br>2. Place order | 1. Order created với payment_method = COD<br>2. Payment status = Pending | Order: #12355<br>Method: Cash on Delivery | Pass | CHK-1 |  |  |
| PAY-2 | Kiểm tra Bank Transfer | 1. Chọn Bank Transfer<br>2. Place order<br>3. Upload proof of payment | 1. Order pending payment<br>2. Admin verify payment<br>3. Update paid status | Order: #12356<br>Method: Bank Transfer<br>Proof: receipt.jpg | Pass | CHK-1 |  |  |
| PAY-3 | Kiểm tra PayPal integration | 1. Chọn PayPal<br>2. Redirect PayPal<br>3. Complete payment<br>4. Return to site | 1. Payment captured<br>2. Order auto confirmed<br>3. Status = Processing | Order: #12357<br>Gateway: PayPal<br>Transaction ID: PP123456 | Pass | CHK-6 |  |  |
| PAY-4 | Kiểm tra xử lý payment timeout | 1. Initiate payment<br>2. Không complete trong 15 phút | 1. Payment session expired<br>2. Order vẫn pending<br>3. Cho phép retry | Order: #12358<br>Timeout: 15 min<br>Status: Payment Pending | Pass | CHK-6 |  |  |

---

## Summary Coverage

| Module | Total Test Cases | Priority High | Priority Medium | Priority Low |
|---|---|---|---|---|
| Checkout | 7 | 4 | 2 | 1 |
| Order Management | 7 | 5 | 2 | 0 |
| Invoice | 5 | 3 | 2 | 0 |
| Shipment | 6 | 4 | 2 | 0 |
| Refund | 7 | 5 | 2 | 0 |
| Order Status | 3 | 3 | 0 | 0 |
| Payment | 4 | 3 | 1 | 0 |
| **TOTAL** | **39** | **27** | **11** | **1** |

---

## Test Environment

- **Application**: Bagisto E-commerce Platform
- **Version**: 2.x
- **Database**: MySQL 8.0
- **PHP Version**: 8.2+
- **Test Browser**: Chrome 120+, Firefox 121+
- **Mobile Testing**: iOS Safari, Android Chrome

---

## Notes

1. Tất cả test cases cần được chạy trên cả môi trường **Desktop** và **Mobile**
2. Payment gateway tests cần môi trường **Sandbox** trước khi test Production
3. Email notifications cần verify cả **content** và **delivery**
4. Performance test: Order creation phải < 3 seconds
5. Security test: Validate authorization cho mọi admin operations

---

**Document Version**: 1.0  
**Created Date**: December 8, 2025  
**Created By**: QA Team  
**Last Updated**: December 8, 2025
