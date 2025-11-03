# 🗑️ DANH SÁCH MODULE CẦN XÓA VÀ GIỮ LẠI

## ✅ CÁC MODULE CẦN **GIỮ LẠI** CHO ORDER

### Core/Foundation Modules (Bắt buộc):
- ✅ **Core** - Framework core
- ✅ **DataGrid** - Hiển thị danh sách
- ✅ **Admin** - Admin panel
- ✅ **Shop** - Shop frontend
- ✅ **User** - Admin users
- ✅ **Installer** - Setup tool
- ✅ **DebugBar** - Development tool

### Order Related Modules:
- ✅ **Sales** - Orders, Invoices, Shipments, Refunds (CORE của Order)
- ✅ **Checkout** - Cart & Checkout (Tạo Order)
- ✅ **Customer** - Buyer information
- ✅ **Product** - Sản phẩm trong order
- ✅ **Attribute** - Product attributes
- ✅ **Category** - Product categories
- ✅ **Inventory** - Stock management
- ✅ **Payment** - Payment methods
- ✅ **Shipping** - Shipping methods
- ✅ **Tax** - Tax calculation
- ✅ **CartRule** - Cart price rules
- ✅ **CatalogRule** - Catalog price rules
- ✅ **Rule** - Rule engine
- ✅ **Notification** - Order notifications
- ✅ **BookingProduct** - Booking orders (nếu có)

---

## ❌ CÁC MODULE CẦN **XÓA** (Không liên quan Order)

- ❌ **CMS** - Content Management (Pages, blogs)
- ❌ **FPC** - Full Page Cache
- ❌ **GDPR** - Privacy compliance
- ❌ **MagicAI** - AI features
- ❌ **Marketing** - Email marketing, campaigns
- ❌ **Paypal** - PayPal specific (giữ Payment chung)
- ❌ **Sitemap** - SEO sitemap
- ❌ **SocialLogin** - Social authentication
- ❌ **SocialShare** - Social sharing
- ❌ **Theme** - Theme customization (giữ default theme)
- ❌ **DataTransfer** - Data import/export tools (không cần cho test Order)

---

## 📦 TỔNG KẾT

| Loại | Số lượng |
|------|----------|
| **Tổng module** | 32 modules |
| **Giữ lại** | 21 modules |
| **Xóa bỏ** | 11 modules |

---

## ⚠️ LƯU Ý

- Không xóa `composer.json`, `package.json` - cần thiết cho dependencies
- Không xóa `config/`, `database/`, `routes/` - core files
- Chỉ xóa trong `packages/Webkul/`
