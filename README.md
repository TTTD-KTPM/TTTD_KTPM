# 👟 Website Bán Giày - Bagisto E-commerce Platform

<p align="center">
    <img src="https://raw.githubusercontent.com/bagisto/temp-media/master/bagisto-featured.png" alt="Bagisto Banner" width="100%">
</p>

<p align="center">
    <a href="https://github.com/ToanTranDuc/TTTD_KTPM"><img src="https://img.shields.io/badge/version-2.3--optimized-blue.svg" alt="Version"></a>
    <a href="https://github.com/ToanTranDuc/TTTD_KTPM"><img src="https://img.shields.io/badge/modules-24%2F28-success.svg" alt="Modules"></a>
    <a href="https://github.com/ToanTranDuc/TTTD_KTPM"><img src="https://img.shields.io/badge/laravel-11.x-red.svg" alt="Laravel"></a>
    <a href="https://github.com/ToanTranDuc/TTTD_KTPM"><img src="https://img.shields.io/badge/php-8.2%2B-purple.svg" alt="PHP"></a>
</p>

---

## 📋 Mục lục

- [Giới thiệu dự án](#-giới-thiệu-dự-án)
- [Tính năng nổi bật](#-tính-năng-nổi-bật)
- [Kiến trúc hệ thống](#-kiến-trúc-hệ-thống)
- [Công nghệ sử dụng](#-công-nghệ-sử-dụng)
- [Hướng dẫn cài đặt](#-hướng-dẫn-cài-đặt)
- [Ví dụ minh họa](#-ví-dụ-minh-họa)
- [API Documentation](#-api-documentation)
- [Modules đã tối ưu](#-modules-đã-tối-ưu)
- [Đóng góp](#-đóng-góp)
- [Giấy phép](#-giấy-phép)
- [Liên hệ](#-liên-hệ)

---

## 🎯 Giới thiệu dự án

**Website Bán Giày** là một dự án mã nguồn mở xây dựng nền tảng thương mại điện tử chuyên về bán giày trực tuyến. Dự án được phát triển dựa trên **Bagisto** – một framework eCommerce mạnh mẽ trên nền **Laravel** – nhưng đã được **tinh gọn và tối ưu hóa** để phù hợp với phạm vi bài toán đồ án.

### 🎓 Mục tiêu dự án

Dự án hướng tới việc cung cấp:

- ✅ **Trải nghiệm mua sắm chuyên nghiệp**: Website thời trang, thân thiện với người dùng
- ✅ **Quản lý dễ dàng**: Hệ thống quản trị tập trung, tự động hóa nhiều quy trình
- ✅ **Nền tảng vững chắc**: Xây dựng trên Laravel 11.x, sử dụng các công nghệ hiện đại
- ✅ **Tối ưu hóa hiệu năng**: Loại bỏ các module không cần thiết

### ⚠️ Lưu ý quan trọng

Các module không cần thiết đã được **lược bỏ hoàn toàn** khỏi Bagisto trong dự án này:

| Module Đã Xóa | Lý do | Tác động |
|---------------|-------|----------|
| ❌ **CMS** | Không cần quản lý nội dung phức tạp | Pages tĩnh hardcode vào theme |
| ❌ **GDPR** | Thị trường Việt Nam không yêu cầu | Không tuân thủ GDPR |
| ❌ **Sitemap** | SEO cơ bản đủ dùng | Tạo sitemap.xml thủ công |
| ❌ **DataTransfer** | Import/Export không cần thiết | Nhập sản phẩm thủ công |
| ❌ **Notification** | Email notifications đủ dùng | Không có push notifications |
| ❌ **SocialLogin** | Đăng ký thủ công đơn giản hơn | Không login qua social |

**Kết quả tối ưu:** Từ **28 modules** xuống còn **24 modules** (giảm 21.4%)

---

## ✨ Tính năng nổi bật

### 🛍️ Dành cho Khách hàng

- 🔍 **Tìm kiếm & Lọc sản phẩm**: Tìm kiếm nhanh theo tên, danh mục, giá, size, màu sắc
- 🛒 **Giỏ hàng thông minh**: Thêm/xóa sản phẩm, cập nhật số lượng, tính tổng tự động
- 💳 **Thanh toán đa dạng**: COD, PayPal, chuyển khoản ngân hàng
- 📦 **Theo dõi đơn hàng**: Kiểm tra trạng thái đơn hàng real-time
- ⭐ **Đánh giá sản phẩm**: Review và rating sản phẩm
- ❤️ **Wishlist**: Lưu sản phẩm yêu thích
- 🔄 **So sánh sản phẩm**: Compare nhiều sản phẩm cùng lúc
- 👤 **Quản lý tài khoản**: Thông tin cá nhân, địa chỉ, lịch sử mua hàng

### 👨‍💼 Dành cho Quản trị viên

- 📊 **Dashboard tổng quan**: Thống kê doanh thu, đơn hàng, khách hàng
- 📦 **Quản lý sản phẩm**: 6 loại sản phẩm (Simple, Configurable, Bundle, Virtual, Downloadable, Booking)
- 🏷️ **Quản lý danh mục**: Cây danh mục đa cấp
- 📋 **Quản lý đơn hàng**: Xử lý đơn hàng, in hóa đơn, gửi email tự động
- 👥 **Quản lý khách hàng**: Thông tin khách hàng, lịch sử mua hàng
- 📊 **Quản lý kho**: Tồn kho tự động trừ khi bán hàng
- 🎫 **Marketing & Khuyến mãi**: Cart rules, catalog rules, coupons
- 🔐 **Phân quyền chi tiết**: Role-based access control (ACL)
- 📈 **Báo cáo & Thống kê**: Reports về sales, customers, products

---

## 🏗️ Kiến trúc hệ thống

### 📐 Mô hình phân tầng

```
┌─────────────────────────────────────────────────────┐
│              USER INTERFACE LAYER                   │
│  ┌──────────────────────┐  ┌──────────────────────┐│
│  │   Shop Frontend      │  │   Admin Dashboard    ││
│  │  (Blade + Tailwind)  │  │   (Blade + Vue.js)   ││
│  └──────────────────────┘  └──────────────────────┘│
└─────────────────────────────────────────────────────┘
                           ▼
┌─────────────────────────────────────────────────────┐
│           APPLICATION LAYER (Laravel)               │
│  ┌──────────┐ ┌──────────┐ ┌──────────┐ ┌────────┐│
│  │ Product  │ │ Category │ │ Customer │ │ Sales  ││
│  │ Catalog  │ │ & Attrib │ │  Mgmt    │ │  Mgmt  ││
│  └──────────┘ └──────────┘ └──────────┘ └────────┘│
│  ┌──────────┐ ┌──────────┐ ┌──────────┐ ┌────────┐│
│  │   Cart   │ │ Checkout │ │Inventory │ │   ACL  ││
│  │ Shopping │ │ & Payment│ │   Mgmt   │ │ Rights ││
│  └──────────┘ └──────────┘ └──────────┘ └────────┘│
└─────────────────────────────────────────────────────┘
                           ▼
┌─────────────────────────────────────────────────────┐
│         DATABASE LAYER (MySQL 8.x)                  │
│  ┌────────────────────────────────────────────────┐│
│  │  Products │ Orders │ Customers │ Inventory    ││
│  │  Categories │ Cart │ Users │ Attributes       ││
│  └────────────────────────────────────────────────┘│
└─────────────────────────────────────────────────────┘
```

### 🔧 Các thành phần chính

#### 1. **Giao diện người dùng (UI)**
- **Shop Frontend**: Blade templates + Tailwind CSS + JavaScript
- **Admin Dashboard**: Blade + Vue.js components
- Responsive design cho mobile, tablet, desktop

#### 2. **Tầng ứng dụng (Application)**

Bagisto được tổ chức thành các **packages** (modules) độc lập:

| Package | Chức năng | Trạng thái |
|---------|-----------|------------|
| **Core** | Chức năng lõi hệ thống | ✅ Đang dùng |
| **Admin** | Admin panel management | ✅ Đang dùng |
| **Product** | Quản lý sản phẩm | ✅ Đang dùng |
| **Category** | Quản lý danh mục | ✅ Đang dùng |
| **Attribute** | Thuộc tính sản phẩm | ✅ Đang dùng |
| **Customer** | Quản lý khách hàng | ✅ Đang dùng |
| **Checkout** | Quy trình thanh toán | ✅ Đang dùng |
| **Sales** | Quản lý đơn hàng | ✅ Đang dùng |
| **Inventory** | Quản lý tồn kho | ✅ Đang dùng |
| **Marketing** | Marketing & promotions | ✅ Đang dùng |
| **User** | Admin users & ACL | ✅ Đang dùng |
| **CMS** | Content management | ❌ Đã xóa |
| **GDPR** | GDPR compliance | ❌ Đã xóa |
| **Sitemap** | XML sitemap | ❌ Đã xóa |
| **DataTransfer** | Import/Export | ❌ Đã xóa |
| **Notification** | Push notifications | ❌ Đã xóa |
| **SocialLogin** | Social authentication | ❌ Đã xóa |

#### 3. **Tầng cơ sở dữ liệu**
- **MySQL 8.x** với Laravel Eloquent ORM
- **140 bảng** sau khi migrate
- Hỗ trợ transactions, relationships, indexing

---

## 🛠️ Công nghệ sử dụng

### Backend
- **PHP**: 8.2.12 (XAMPP)
- **Laravel**: 11.44.2
- **Bagisto**: 2.3 (optimized)
- **MySQL**: 8.0.x
- **Composer**: 2.x

### Frontend
- **Blade Templates**: Laravel templating engine
- **Tailwind CSS**: Utility-first CSS framework
- **Vue.js**: Progressive JavaScript framework
- **Alpine.js**: Lightweight JavaScript framework
- **Vite**: Next generation frontend tooling

### DevOps & Tools
- **Git**: Version control
- **NPM**: Package manager
- **Artisan**: Laravel CLI
- **PhpMyAdmin**: Database management

---

## 📦 Hướng dẫn cài đặt

### 📋 Yêu cầu hệ thống

Trước khi cài đặt, đảm bảo máy của bạn có:

| Yêu cầu | Phiên bản | Ghi chú |
|---------|-----------|---------|
| PHP | 8.1+ | Khuyến nghị 8.2 |
| MySQL | 8.0+ | Hoặc MariaDB tương đương |
| Composer | 2.x | Quản lý packages PHP |
| Node.js | 16.x+ | Biên dịch assets |
| NPM | 8.x+ | Đi kèm Node.js |
| Web Server | Apache/Nginx | Hoặc dùng `php artisan serve` |

**Extensions PHP cần thiết:**
```
✓ php-intl
✓ php-gd
✓ php-openssl
✓ php-pdo
✓ php-mbstring
✓ php-tokenizer
✓ php-json
✓ php-curl
✓ php-zip
✓ php-xml
```

### 🚀 Các bước cài đặt

#### **Bước 1: Clone repository**

```bash
git clone https://github.com/ToanTranDuc/TTTD_KTPM.git
cd TTTD_KTPM
```

#### **Bước 2: Cài đặt dependencies PHP**

```bash
composer install
```

> **Lưu ý:** Nếu gặp lỗi memory limit, chạy: `composer install --no-scripts`

#### **Bước 3: Cấu hình môi trường**

```bash
# Sao chép file cấu hình
cp .env.example .env

# Generate application key
php artisan key:generate
```

**Chỉnh sửa file `.env`:**

```env
APP_NAME="Website Bán Giày"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bagisto_db
DB_USERNAME=root
DB_PASSWORD=

# Optional: Mail configuration
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
```

#### **Bước 4: Tạo database**

Mở **phpMyAdmin** hoặc **MySQL CLI**:

```sql
CREATE DATABASE bagisto_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

#### **Bước 5: Chạy migrations & seeders**

```bash
# Chạy migrations (tạo 140 bảng)
php artisan migrate

# (Optional) Seed dữ liệu mẫu
php artisan db:seed
```

> **Seeder sẽ tạo:**
> - Tài khoản admin mặc định: `admin@example.com` / `admin123`
> - Các cấu hình channel, locale, currency
> - Attribute families và attributes mẫu

#### **Bước 6: Publish assets**

```bash
# Publish Bagisto assets
php artisan vendor:publish --all

# Tạo symbolic link cho storage
php artisan storage:link

# Clear cache
php artisan optimize:clear
```

#### **Bước 7: Cài đặt frontend assets**

```bash
# Cài đặt NPM packages
npm install

# Development build (với watch mode)
npm run dev

# Production build (minified)
npm run build
```

#### **Bước 8: Khởi chạy server**

```bash
php artisan serve
```

Server sẽ chạy tại: **http://localhost:8000**

### 🌐 Truy cập ứng dụng

| Giao diện | URL | Thông tin đăng nhập |
|-----------|-----|---------------------|
| **Shop Frontend** | http://localhost:8000 | - |
| **Admin Panel** | http://localhost:8000/admin | Email: `admin@example.com`<br>Password: `admin123` |

---

## 🎨 Ví dụ minh họa

### 1. Giao diện trang chủ Shop

<p align="center">
    <img src="https://raw.githubusercontent.com/bagisto/temp-media/master/bagisto-featured.png" alt="Shop Frontend" width="100%">
</p>

**Mô tả:** Giao diện trang chủ hiển thị các sản phẩm nổi bật và banner khuyến mãi. Thanh điều hướng cho phép người dùng duyệt theo danh mục (ví dụ: Giày Nam, Giày Nữ, Giày Thể Thao) một cách trực quan. Mỗi sản phẩm được trình bày với:

- ✅ Hình ảnh chất lượng cao
- ✅ Tên sản phẩm và giá
- ✅ Nút "Thêm vào giỏ hàng"
- ✅ Rating sao từ khách hàng

Giao diện được thiết kế **responsive** để hiển thị tốt trên:
- 💻 Desktop (1920x1080)
- 📱 Mobile (375x667)
- 📱 Tablet (768x1024)

---

### 2. Admin Dashboard

<p align="center">
    <img src="https://raw.githubusercontent.com/ToanTranDuc/temp-media/master/admin-dashboard.png" alt="Admin Dashboard" width="100%">
</p>

**Mô tả:** Trang quản trị cung cấp cái nhìn tổng quan về tình hình kinh doanh:

#### 📊 **Thống kê Overview:**
- **Total Sales**: Tổng doanh thu
- **Total Orders**: Số đơn hàng
- **Total Customers**: Số khách hàng
- **Average Order Value**: Giá trị đơn hàng trung bình

#### 📈 **Biểu đồ:**
- Sales chart theo thời gian
- Top selling products
- Visitor statistics

#### 🎛️ **Menu quản trị (Sidebar):**

| Menu | Chức năng |
|------|-----------|
| 📊 **Dashboard** | Tổng quan |
| 📦 **Catalog** | Sản phẩm, Danh mục, Attributes |
| 💳 **Sales** | Đơn hàng, Invoices, Shipments |
| 👥 **Customers** | Quản lý khách hàng |
| 📊 **Inventory** | Tồn kho |
| 🎯 **Marketing** | Promotions, SEO |
| 🔐 **ACL** | Users, Roles, Permissions |
| ⚙️ **Settings** | Cấu hình hệ thống |

---

### 3. Chi tiết sản phẩm

<p align="center">
    <img src="https://raw.githubusercontent.com/ToanTranDuc/temp-media/master/product-detail.png" alt="Product Detail Page" width="100%">
</p>

**Mô tả:** Trang chi tiết sản phẩm "Nike Sports - Men Cameri Summer Colors Shoes":

#### 🎨 **Thông tin sản phẩm:**
- **Hình ảnh**: Gallery với zoom feature
- **Giá**: $25.00
- **Mô tả**: Chi tiết về sản phẩm
- **Attributes**: Size, Color, Brand

#### 🛒 **Tương tác:**
- Nút "Add to Cart"
- Chọn size và màu sắc
- Wishlist button
- Compare button
- Share on social media

#### ⭐ **Reviews:**
- Rating trung bình
- Danh sách đánh giá từ khách hàng
- Form viết review mới

---

### 4. Code Example - Tạo sản phẩm

**Ví dụ PHP code tạo sản phẩm mới:**

```php
<?php

use Webkul\Product\Repositories\ProductRepository;

// Trong context ứng dụng (Seeder, Controller, Command)
$productRepo = app(ProductRepository::class);

$data = [
    'type' => 'simple',
    'attribute_family_id' => 1,
    'sku' => 'nike-air-max-2024',
    'super_attributes' => [],
    
    // Product information
    'name' => 'Nike Air Max 2024',
    'url_key' => 'nike-air-max-2024',
    'price' => 150.00,
    'weight' => 0.5,
    'status' => 1,
    'visible_individually' => 1,
    'featured' => 1,
    'guest_checkout' => 1,
    'new' => 1,
    
    // Inventory
    'inventories' => [
        1 => 100, // Inventory source ID => quantity
    ],
    
    // Categories
    'categories' => [1, 2], // Category IDs
    
    // Images
    'images' => [
        // Upload images
    ],
    
    // Short description
    'short_description' => 'Designed for running but adopted by the street...',
    
    // Description
    'description' => 'The lightest, most flexible Air Max cushioning to date...',
    
    // SEO
    'meta_title' => 'Nike Air Max 2024 - Best Running Shoes',
    'meta_keywords' => 'nike, air max, running shoes, sports',
    'meta_description' => 'Buy Nike Air Max 2024 running shoes...',
    
    // Channels
    'channels' => [1], // Channel IDs
    
    // Locales
    'locales' => [1], // Locale IDs
];

// Tạo sản phẩm
$product = $productRepo->create($data);

echo "✅ Đã tạo sản phẩm mới với ID: " . $product->id;
```

**Kết quả:**
```
✅ Đã tạo sản phẩm mới với ID: 42
```

---

### 5. API Example - Get Products

**REST API để lấy danh sách sản phẩm:**

```bash
# Get all products
curl -X GET "http://localhost:8000/api/products" \
  -H "Accept: application/json"

# Get product by ID
curl -X GET "http://localhost:8000/api/products/1" \
  -H "Accept: application/json"

# Search products
curl -X GET "http://localhost:8000/api/products?name=nike&price_from=50&price_to=200" \
  -H "Accept: application/json"
```

**Response:**

```json
{
  "data": [
    {
      "id": 1,
      "type": "simple",
      "sku": "nike-air-max-2024",
      "name": "Nike Air Max 2024",
      "url_key": "nike-air-max-2024",
      "price": "150.00",
      "formatted_price": "$150.00",
      "images": [
        {
          "id": 1,
          "url": "http://localhost:8000/storage/product/1/nike-air-max.jpg",
          "type": "image"
        }
      ],
      "in_stock": true,
      "reviews": {
        "total": 24,
        "average_rating": 4.5
      }
    }
  ],
  "meta": {
    "current_page": 1,
    "total": 42
  }
}
```

---

## 📚 API Documentation

### 🔗 Available APIs (42 endpoints)

Dự án cung cấp **42 API endpoints** được chia thành 2 loại:

#### 📂 **Public APIs (34 endpoints)**
Không cần authentication:

| Category | Endpoints | Description |
|----------|-----------|-------------|
| 🏠 **Core** | 5 | Channels, Locales, Currencies, Countries, States |
| 📁 **Categories** | 2 | List categories, Get category detail |
| 📦 **Products** | 6 | List, Search, Filter, Detail, Additional info |
| ⭐ **Reviews** | 3 | List reviews, Get review, Create review |
| 🔄 **Compare** | 5 | Add, Remove, List compared products |
| 🛒 **Cart** | 9 | Add, Update, Remove items, Apply coupon |
| 💳 **Checkout** | 4 | Save address, shipping, payment, place order |

#### 🔐 **Authenticated APIs (8 endpoints)**
Cần customer token:

| Category | Endpoints | Description |
|----------|-----------|-------------|
| 🔑 **Auth** | 3 | Login, Logout, Get account info |
| 👤 **Customer** | 5 | Update profile, addresses, orders, wishlist |

**Xem chi tiết:** [API-ROUTES.md](./API-ROUTES.md)

**Quick Reference:** [API-QUICK-REF.md](./API-QUICK-REF.md)

---

## 🎯 Modules đã tối ưu

### ✅ **24 Modules đang sử dụng**

#### 1. **Core & Admin** (2 modules)
- ✅ `Webkul\Core` - Chức năng lõi hệ thống
- ✅ `Webkul\Admin` - Admin panel management

#### 2. **Product Catalog** (4 modules)
- ✅ `Webkul\Product` - Quản lý sản phẩm (6 loại)
- ✅ `Webkul\Category` - Quản lý danh mục
- ✅ `Webkul\Attribute` - Thuộc tính sản phẩm
- ✅ `Webkul\BookingProduct` - Sản phẩm đặt chỗ

#### 3. **Customers & Access** (2 modules)
- ✅ `Webkul\Customer` - Quản lý khách hàng
- ✅ `Webkul\User` - Admin users & roles

#### 4. **Cart, Checkout & Orders** (5 modules)
- ✅ `Webkul\Checkout` - Quy trình thanh toán
- ✅ `Webkul\Payment` - Phương thức thanh toán
- ✅ `Webkul\Paypal` - PayPal integration
- ✅ `Webkul\Sales` - Quản lý đơn hàng
- ✅ `Webkul\Shipping` - Vận chuyển

#### 5. **Inventory** (1 module)
- ✅ `Webkul\Inventory` - Quản lý tồn kho

#### 6. **Promotions & Rules** (4 modules)
- ✅ `Webkul\Marketing` - Marketing tools
- ✅ `Webkul\Rule` - Rule engine
- ✅ `Webkul\CatalogRule` - Giảm giá catalog
- ✅ `Webkul\CartRule` - Mã giảm giá, coupons

#### 7. **UI & Tax** (3 modules)
- ✅ `Webkul\Tax` - Quản lý thuế
- ✅ `Webkul\Theme` - Theme customization
- ✅ `Webkul\Shop` - Shop frontend

#### 8. **Additional** (3 modules)
- ✅ `Webkul\DataGrid` - Data grid component
- ✅ `Webkul\SocialShare` - Share sản phẩm

---

### ❌ **6 Modules đã loại bỏ**

| Module | Chức năng | Lý do loại bỏ |
|--------|-----------|---------------|
| ❌ **CMS** | Content Management | Không cần quản lý pages phức tạp |
| ❌ **GDPR** | GDPR Compliance | Thị trường VN không yêu cầu |
| ❌ **Sitemap** | XML Sitemap | SEO cơ bản đủ dùng |
| ❌ **DataTransfer** | Import/Export | Không cần bulk operations |
| ❌ **Notification** | Push Notifications | Email notifications đủ |
| ❌ **SocialLogin** | OAuth Login | Đăng ký thủ công đơn giản |

**Chi tiết:** [REMOVED-FEATURES.md](./REMOVED-FEATURES.md)

---

## 📈 Lợi ích tối ưu hóa

### ✅ **Performance**
- ⚡ Code base nhỏ hơn **21.4%**
- ⚡ Ít database queries hơn
- ⚡ Ít routes hơn → Routing nhanh hơn
- ⚡ Ít middleware hơn → Response time tốt hơn

### ✅ **Security**
- 🔒 Giảm attack surface
- 🔒 Ít third-party dependencies
- 🔒 Không có OAuth vulnerabilities
- 🔒 Không có CSV injection risks

### ✅ **Maintenance**
- 🔧 Dễ debug hơn
- 🔧 Ít bugs hơn
- 🔧 Code đơn giản hơn
- 🔧 Update dễ dàng hơn

### ✅ **Development**
- 🚀 Faster development cycle
- 🚀 Ít phụ thuộc external APIs
- 🚀 Dễ customize
- 🚀 Test suite chạy nhanh hơn

---

## 🎓 Tài liệu tham khảo

### 📖 Official Documentation
- [Bagisto Documentation](https://devdocs.bagisto.com/)
- [Laravel 11.x Documentation](https://laravel.com/docs/11.x)
- [Tailwind CSS Documentation](https://tailwindcss.com/docs)
- [Vue.js Documentation](https://vuejs.org/guide/)

### 🎥 Video Tutorials
- [Getting Started with Bagisto](https://www.youtube.com/watch?v=s_DhQrjK8Tw)
- [Bagisto Tutorial Series](https://www.youtube.com/playlist?list=PLe30vg_FG4OS3BU8rHUKQZ2mnX45xwSMc)

### 💬 Community
- [Bagisto Forums](https://forums.bagisto.com/)
- [Facebook Group](https://www.facebook.com/groups/bagisto)
- [GitHub Issues](https://github.com/bagisto/bagisto/issues)

### 📝 Project Documentation
- [API Routes](./API-ROUTES.md) - Danh sách 42 APIs
- [API Quick Reference](./API-QUICK-REF.md) - Quick ref guide
- [Removed Features](./REMOVED-FEATURES.md) - Modules đã xóa
- [Commit Plan](./COMMIT-PLAN.md) - Kế hoạch commit
- [Start Guide](./START-BAGISTO.md) - Hướng dẫn chạy

---

## 🤝 Đóng góp

Chúng tôi rất hoan nghênh mọi đóng góp cho dự án! 

### 📝 Cách đóng góp:

1. **Fork** repository này
2. **Clone** về máy local:
   ```bash
   git clone https://github.com/YOUR_USERNAME/TTTD_KTPM.git
   ```
3. Tạo **branch** mới:
   ```bash
   git checkout -b feature/amazing-feature
   ```
4. **Commit** changes:
   ```bash
   git commit -m "Add some amazing feature"
   ```
5. **Push** lên branch:
   ```bash
   git push origin feature/amazing-feature
   ```
6. Tạo **Pull Request**

### 🐛 Báo lỗi

Nếu bạn phát hiện bug, vui lòng:
1. Kiểm tra [Issues](https://github.com/ToanTranDuc/TTTD_KTPM/issues) xem đã có ai report chưa
2. Nếu chưa, tạo issue mới với:
   - Mô tả chi tiết bug
   - Các bước reproduce
   - Screenshot (nếu có)
   - Environment info (PHP version, OS, etc.)



```
MIT License

Copyright (c) 2025 Website Bán Giày

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
```

Xem thêm: [LICENSE](./LICENSE)


- 🐙 GitHub: [@ToanTranDuc](https://github.com/ToanTranDuc)
- 💼 LinkedIn: [Trần Đức Toản](https://linkedin.com/in/toantranduc)

### 📚 Repository

- 🔗 GitHub: [https://github.com/ToanTranDuc/TTTD_KTPM](https://github.com/ToanTranDuc/TTTD_KTPM)


### 🎓 Thông tin đồ án

- 🏫 Trường: Đại học Sài Gòn
- 📖 Môn học: KTPM - Kỹ thuật phần mềm
- 👨‍🏫 Giảng viên: Đỗ Như Tài
- 📅 Học kỳ: HK1 2024-2025

---

## 🌟 Acknowledgments

Dự án này được xây dựng dựa trên:

- [Bagisto](https://bagisto.com/) - Open-source eCommerce framework
- [Laravel](https://laravel.com/) - PHP framework
- [Tailwind CSS](https://tailwindcss.com/) - CSS framework
- [Vue.js](https://vuejs.org/) - JavaScript framework

Cảm ơn cộng đồng open source đã đóng góp! ❤️

---

## 📊 Project Stats

<p align="center">
    <img src="https://img.shields.io/github/stars/ToanTranDuc/TTTD_KTPM?style=social" alt="Stars">
    <img src="https://img.shields.io/github/forks/ToanTranDuc/TTTD_KTPM?style=social" alt="Forks">
    <img src="https://img.shields.io/github/watchers/ToanTranDuc/TTTD_KTPM?style=social" alt="Watchers">
</p>

<p align="center">
    <img src="https://img.shields.io/github/issues/ToanTranDuc/TTTD_KTPM" alt="Issues">
    <img src="https://img.shields.io/github/issues-pr/ToanTranDuc/TTTD_KTPM" alt="Pull Requests">
    <img src="https://img.shields.io/github/last-commit/ToanTranDuc/TTTD_KTPM" alt="Last Commit">
</p>
