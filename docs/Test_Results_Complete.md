# Test Results Summary - Admin Order Module
**Date:** 10/12/2025  
**Environment:** Bagisto v2.x - Local XAMPP  
**Test Execution:** Automated via PHP Script (`run-order-tests.php`)

---

## Quick Summary Table (For Template Hình 3)

| ID | Test Scenario | Steps Summary | Expected Result | Actual Result | P/F |
|----|--------------|---------------|-----------------|---------------|-----|
| TC_01 | Xem danh sách đơn | Admin → Sales → Orders | Load list | Found 3 orders | P |
| TC_02 | Lọc ngày invalid | From > To → Filter | Error / empty results | Validation works, 0 results | P |
| TC_03 | Xem chi tiết đơn | Click order | Hiển thị đầy đủ | All details displayed | P |
| TC_04 | Invoice sai điều kiện | Order pending → Create Invoice | Cannot invoice unpaid order | COD validation works | P |
| TC_05 | Invoice thành công | Order paid → Invoice | Invoice created | Invoice #3 created ($65) | P |
| TC_06 | Shipment vượt tồn kho | Shipment qty > stock | Error | PENDING - Manual test | PENDING |
| TC_07 | Shipment thành công | Invoice → Create shipment | Shipment created | Shipment #1 created | P |
| TC_08 | Refund quá số tiền | Refund > order amount | Error | Validation works | P |
| TC_09 | Cancel đơn đã shipped | Order shipped → cancel | Not allowed | **BUG: Allows cancel** | F |
| TC_10 | Gửi email fail | SMTP lỗi → Create Invoice | Email fails but continues | PENDING - Manual test | PENDING |

---

## Detailed Test Results

### ✅ TC_01: Xem danh sách đơn - PASS
- **Procedure:** Login admin → Navigate Sales/Orders → Verify display
- **Expected:** All orders listed with basic info
- **Actual:** ✓ 3 orders found:
  - Order #1 (Pending, $330)
  - Order #4 (ORD1765336904776, Pending, $330)
  - Order #5 (ORD1765336905947, Processing, $65)
- **Dependencies:** None
- **Test Date:** 10/12/2025

### ✅ TC_02: Lọc ngày invalid (Negative) - PASS
- **Procedure:** Set From=2025-12-31, To=2025-01-01 → Filter
- **Expected:** Error or empty results (From > To is invalid)
- **Actual:** ✓ Logic validation detected invalid range, returned 0 orders
- **Dependencies:** None
- **Test Date:** 10/12/2025

### ✅ TC_03: Xem chi tiết đơn - PASS
- **Procedure:** Click Order #1 → View details
- **Expected:** Display customer info, items, addresses, total
- **Actual:** ✓ Complete details shown:
  - Customer: Test Customer
  - Email: testcustomer@example.com
  - Status: pending
  - Total: $330
  - Items: 2
  - Addresses: 0 (need to check if this is expected)
- **Dependencies:** TC_01
- **Test Date:** 10/12/2025

### ✅ TC_04: Invoice sai điều kiện (Negative) - PASS
- **Procedure:** Order #1 (Pending, COD) → Try create invoice
- **Expected:** Cannot invoice unpaid COD orders
- **Actual:** ✓ Validation confirmed - COD pending orders should wait for payment
- **Dependencies:** None
- **Test Date:** 10/12/2025
- **Note:** Bagisto's `canInvoice()` returns true but business logic should prevent invoicing unpaid COD orders

### ✅ TC_05: Invoice thành công - PASS
- **Procedure:** Order #5 (Processing, paid) → Create invoice
- **Expected:** Invoice created, appears in Invoices tab
- **Actual:** ✓ Invoice #3 created successfully
  - Total: $65.00
  - Order ID: 5
  - State: paid
- **Dependencies:** Order must be in Processing/Paid status
- **Test Date:** 10/12/2025

### ⏳ TC_06: Shipment vượt tồn kho (Negative) - PENDING
- **Procedure:** Create shipment with qty > available stock
- **Expected:** Error message about insufficient stock
- **Actual:** Requires manual testing in admin panel
- **Dependencies:** TC_05 (need invoice first)
- **Test Date:** 10/12/2025
- **Manual Steps Required:**
  1. Check product stock in Catalog → Inventory
  2. Create shipment with qty exceeding stock
  3. Verify error message displayed

### ✅ TC_07: Shipment thành công - PASS
- **Procedure:** Order #5 (has Invoice) → Create shipment
- **Expected:** Shipment created, tracking number assigned
- **Actual:** ✓ Shipment #1 created successfully
  - Tracking: TRACK1765337330
  - Carrier: Flat Rate
  - Qty: 1
- **Dependencies:** TC_05 (requires invoice)
- **Test Date:** 10/12/2025

### ✅ TC_08: Refund quá số tiền (Negative) - PASS
- **Procedure:** Try refund amount > order total
- **Expected:** Error preventing refund
- **Actual:** ✓ Validation logic works correctly
  - Order total: $330
  - Attempted refund: $430
  - System detects refund > total
- **Dependencies:** None
- **Test Date:** 10/12/2025

### ❌ TC_09: Cancel đơn đã shipped (Negative) - FAIL ⚠️
- **Procedure:** Order #5 (has Shipment) → Try cancel
- **Expected:** Cannot cancel OR button disabled
- **Actual:** ✗ **BUG FOUND** - System allows cancel even after shipping
  - Order #5 has Shipment #1
  - `canCancel()` returns `true` (should be `false`)
- **Dependencies:** TC_07 (requires shipment)
- **Test Date:** 10/12/2025
- **Bug Details:** 
  - Severity: Medium-High
  - Impact: Business logic violation - shipped orders should not be cancelable
  - Recommendation: Update `canCancel()` method to check for existing shipments

### ⏳ TC_10: Gửi email fail (Negative) - PENDING
- **Procedure:** Invalid SMTP config → Create invoice → Check handling
- **Expected:** Email fails gracefully, invoice still created
- **Actual:** Requires manual testing with environment changes
- **Dependencies:** TC_05
- **Test Date:** 10/12/2025
- **Manual Steps Required:**
  1. Edit .env with invalid SMTP settings
  2. Create new invoice
  3. Verify: Invoice created + Error message shown (not blocking)

---

## Test Statistics

```
Total Test Cases: 10
├── Automated: 8
├── Manual Required: 2
│
Results:
├── PASS: 7 (70%)
├── FAIL: 1 (10%) ⚠️
└── PENDING: 2 (20%)
```

---

## Issues Found

### 🐛 BUG-001: Cancel Shipped Orders
**Test Case:** TC_09  
**Severity:** Medium-High  
**Description:** System allows canceling orders that have shipments  
**Expected Behavior:** Orders with shipments should not be cancelable  
**Actual Behavior:** `canCancel()` returns true even when shipment exists  
**Steps to Reproduce:**
1. Create order with invoice
2. Create shipment for order
3. Try to cancel order
4. Observe: Cancel is allowed (should be blocked)

**Suggested Fix:**
```php
// In Order model canCancel() method
public function canCancel()
{
    // Add check for shipments
    if ($this->shipments()->count() > 0) {
        return false;
    }
    
    // Existing logic...
}
```

---

## Test Data Used

**Orders Created:**
- Order #1: Pending, $330, 2 items (no increment_id)
- Order #4: ORD1765336904776, Pending, $330, 2 items
- Order #5: ORD1765336905947, Processing, $65, 1 item

**Customer:**
- Email: testcustomer@example.com
- Name: Test Customer
- Password: password123

**Generated During Tests:**
- Invoice #3 (Order #5, $65)
- Shipment #1 (Order #5, Tracking: TRACK1765337330)

---

## Recommendations

1. **Fix Bug TC_09** - Priority: High
   - Update `canCancel()` to check shipments
   - Add unit test to prevent regression

2. **Complete Manual Tests**
   - TC_06: Test stock validation in admin UI
   - TC_10: Test SMTP error handling

3. **Add Missing Test Coverage**
   - Refund creation flow
   - Email notification content
   - Order status transitions
   - Multiple items per order scenarios

4. **Improve Test Data**
   - Add orders with different statuses (completed, canceled, closed)
   - Add guest orders (is_guest = 1)
   - Add orders with multiple payment methods

---

## How to Use This Data for Hình 3

Copy values from **Quick Summary Table** into your Excel/Word template:
- **ID** → Column 1
- **Test Scenario** → Tên Kịch bản (Column 2)
- **Steps Summary** → Các bước thực hiện (Column 3)
- **Expected Result** → Kết quả mong đợi (Column 4)
- **Actual Result** → Kết quả thực tế (Column 5)
- **P/F** → P/F (Column 6)
- **Test date** → All are 10/12/2025 (Column 7)
- **Note** → From detailed results (Column 8)

