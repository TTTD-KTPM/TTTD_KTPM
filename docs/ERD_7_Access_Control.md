# ERD - ACCESS CONTROL (Kiểm soát truy cập)

## Sơ đồ ERD mức khái niệm

```mermaid
erDiagram
    ADMINS }o--|| ROLES : "có vai trò"
    ROLES ||--o{ ROLE_PERMISSIONS : "có quyền"
    ADMINS ||--o{ ADMIN_PASSWORD_RESETS : "yêu cầu reset"
    CUSTOMERS }o--|| CUSTOMER_GROUPS : "thuộc nhóm"
    CUSTOMERS ||--o{ CUSTOMER_PASSWORD_RESETS : "yêu cầu reset"
    CHANNELS ||--o{ CHANNEL_LOCALES : "hỗ trợ"
    CHANNELS ||--o{ CHANNEL_CURRENCIES : "hỗ trợ"
    LOCALES ||--o{ CHANNEL_LOCALES : "được dùng"
    CURRENCIES ||--o{ CHANNEL_CURRENCIES : "được dùng"
    USERS ||--o{ PERSONAL_ACCESS_TOKENS : "có token"

    ADMINS {
        int id PK "ID quản trị viên"
        string name "Tên đầy đủ"
        string email UK "Email đăng nhập"
        string password "Mật khẩu đã hash"
        string api_token UK "API token"
        boolean status "Trạng thái (1=active, 0=inactive)"
        int role_id FK "ID vai trò"
        string image "Ảnh đại diện"
        string remember_token "Token remember me"
        timestamp created_at "Ngày tạo"
        timestamp updated_at "Ngày cập nhật"
    }

    ROLES {
        int id PK "ID vai trò"
        string name "Tên vai trò"
        string description "Mô tả vai trò"
        string permission_type "Loại quyền (all, custom)"
        json permissions "Danh sách quyền (JSON array)"
        timestamp created_at "Ngày tạo"
        timestamp updated_at "Ngày cập nhật"
    }

    ADMIN_PASSWORD_RESETS {
        string email "Email admin"
        string token "Token reset mật khẩu"
        timestamp created_at "Ngày tạo"
    }

    CUSTOMERS {
        int id PK "ID khách hàng"
        string first_name "Tên"
        string last_name "Họ"
        string email UK "Email"
        string phone UK "Số điện thoại"
        string password "Mật khẩu đã hash"
        string api_token UK "API token"
        tinyint status "Trạng thái (1=active, 0=inactive)"
        int customer_group_id FK "ID nhóm khách hàng"
        boolean is_verified "Đã xác thực email"
        tinyint is_suspended "Bị tạm ngưng"
        string token "Token xác thực"
        string remember_token "Token remember me"
        timestamp created_at "Ngày đăng ký"
        timestamp updated_at "Ngày cập nhật"
    }

    CUSTOMER_GROUPS {
        int id PK "ID nhóm khách hàng"
        string code UK "Mã nhóm"
        string name "Tên nhóm"
        boolean is_user_defined "Do người dùng định nghĩa"
        timestamp created_at "Ngày tạo"
        timestamp updated_at "Ngày cập nhật"
    }

    CUSTOMER_PASSWORD_RESETS {
        string email "Email khách hàng"
        string token "Token reset mật khẩu"
        timestamp created_at "Ngày tạo"
    }

    USERS {
        int id PK "ID người dùng"
        string name "Tên"
        string email UK "Email"
        timestamp email_verified_at "Thời gian xác thực email"
        string password "Mật khẩu đã hash"
        string remember_token "Token remember me"
        timestamp created_at "Ngày tạo"
        timestamp updated_at "Ngày cập nhật"
    }

    PERSONAL_ACCESS_TOKENS {
        int id PK "ID token"
        string tokenable_type "Loại model (User, Customer, Admin)"
        int tokenable_id "ID của model"
        string name "Tên token"
        string token UK "Token value (hash)"
        text abilities "Quyền của token (JSON)"
        timestamp last_used_at "Lần dùng cuối"
        timestamp expires_at "Thời gian hết hạn"
        timestamp created_at "Ngày tạo"
        timestamp updated_at "Ngày cập nhật"
    }

    CHANNELS {
        int id PK "ID kênh"
        string code UK "Mã kênh"
        string name "Tên kênh"
        text description "Mô tả"
        string theme "Theme sử dụng"
        string hostname "Domain/hostname"
        string logo "Logo kênh"
        string favicon "Favicon"
        int root_category_id FK "ID danh mục gốc"
        int default_locale_id FK "ID ngôn ngữ mặc định"
        int base_currency_id FK "ID tiền tệ cơ sở"
        int home_seo_title "Tiêu đề SEO trang chủ"
        int home_seo_description "Mô tả SEO trang chủ"
        int home_seo_keywords "Từ khóa SEO trang chủ"
        boolean is_maintenance_on "Chế độ bảo trì"
        text maintenance_mode_text "Thông báo bảo trì"
        string allowed_ips "Danh sách IP được phép (bảo trì)"
        json seo "Cấu hình SEO"
        timestamp created_at "Ngày tạo"
        timestamp updated_at "Ngày cập nhật"
    }

    LOCALES {
        int id PK "ID ngôn ngữ"
        string code UK "Mã ngôn ngữ (en, vi, fr...)"
        string name "Tên ngôn ngữ"
        string direction "Hướng text (ltr, rtl)"
        timestamp created_at "Ngày tạo"
        timestamp updated_at "Ngày cập nhật"
    }

    CHANNEL_LOCALES {
        int channel_id PK_FK "ID kênh"
        int locale_id PK_FK "ID ngôn ngữ"
    }

    CURRENCIES {
        int id PK "ID tiền tệ"
        string code UK "Mã tiền tệ (USD, VND...)"
        string name "Tên tiền tệ"
        string symbol "Ký hiệu ($, ₫...)"
        decimal decimal_factor "Hệ số thập phân"
        timestamp created_at "Ngày tạo"
        timestamp updated_at "Ngày cập nhật"
    }

    CHANNEL_CURRENCIES {
        int channel_id PK_FK "ID kênh"
        int currency_id PK_FK "ID tiền tệ"
    }
```

## Mô tả các bảng chính

### 1. ADMINS (Quản trị viên)
- Tài khoản quản trị hệ thống backend
- Mỗi admin có một ROLE xác định quyền truy cập
- Có thể bị vô hiệu hóa (status = 0)
- Hỗ trợ API token cho API access

### 2. ROLES (Vai trò)
- Định nghĩa các vai trò trong hệ thống (Super Admin, Admin, Sales, Support...)
- **permission_type**:
  - `all`: Có toàn quyền
  - `custom`: Quyền tùy chỉnh theo permissions JSON
- **permissions**: JSON array chứa danh sách quyền cụ thể

### 3. CUSTOMERS (Khách hàng)
- Tài khoản khách hàng frontend
- Thuộc một CUSTOMER_GROUP ảnh hưởng đến giá và khuyến mãi
- Có thể bị suspend hoặc vô hiệu hóa
- Cần xác thực email (is_verified)

### 4. CUSTOMER_GROUPS (Nhóm khách hàng)
- Phân loại khách hàng (General, Wholesale, VIP, Retailer...)
- Áp dụng giá riêng và quy tắc giảm giá riêng
- Ảnh hưởng đến catalog rules và cart rules

### 5. PERSONAL_ACCESS_TOKENS (Laravel Sanctum)
- Quản lý API tokens cho mobile app, SPA
- Polymorphic: Có thể dùng cho Users, Customers, Admins
- Có thể giới hạn abilities (quyền)
- Hỗ trợ expiration time

### 6. CHANNELS (Kênh bán hàng)
- Multi-store/Multi-channel support
- Mỗi kênh có domain riêng, theme riêng
- Cấu hình ngôn ngữ và tiền tệ riêng
- Hỗ trợ maintenance mode với whitelist IP

### 7. PASSWORD RESETS
- Quản lý token reset mật khẩu
- Token có thời hạn (thường 60 phút)
- Xóa sau khi sử dụng

## Cấu trúc phân quyền

### Các module chính cần phân quyền:

```json
{
  "dashboard": ["view"],
  "sales": {
    "orders": ["create", "edit", "view", "delete"],
    "invoices": ["create", "view", "delete"],
    "shipments": ["create", "view", "delete"],
    "refunds": ["create", "view", "delete"]
  },
  "catalog": {
    "products": ["create", "edit", "view", "delete"],
    "categories": ["create", "edit", "view", "delete"],
    "attributes": ["create", "edit", "view", "delete"],
    "attribute_families": ["create", "edit", "view", "delete"]
  },
  "customers": {
    "customers": ["create", "edit", "view", "delete"],
    "groups": ["create", "edit", "view", "delete"],
    "reviews": ["edit", "view", "delete"]
  },
  "marketing": {
    "promotions": {
      "cart_rules": ["create", "edit", "view", "delete"],
      "catalog_rules": ["create", "edit", "view", "delete"]
    },
    "communications": {
      "campaigns": ["create", "edit", "view", "delete"],
      "events": ["create", "edit", "view", "delete"],
      "templates": ["create", "edit", "view", "delete"]
    },
    "seo": {
      "search_terms": ["edit", "view", "delete"],
      "synonyms": ["create", "edit", "view", "delete"],
      "url_rewrites": ["create", "edit", "view", "delete"],
      "sitemaps": ["create", "edit", "view", "delete"]
    }
  },
  "cms": {
    "pages": ["create", "edit", "view", "delete"]
  },
  "settings": {
    "locales": ["create", "edit", "view", "delete"],
    "currencies": ["create", "edit", "view", "delete"],
    "channels": ["create", "edit", "view", "delete"],
    "users": ["create", "edit", "view", "delete"],
    "roles": ["create", "edit", "view", "delete"],
    "themes": ["create", "edit", "view", "delete"],
    "tax_rates": ["create", "edit", "view", "delete"],
    "tax_categories": ["create", "edit", "view", "delete"]
  },
  "configuration": ["view", "edit"]
}
```

## Quy trình nghiệp vụ

### 1. Đăng nhập Admin

```
1. Admin nhập email và password
2. Validate credentials:
   - Kiểm tra ADMINS.email và password
   - Kiểm tra ADMINS.status = 1 (active)
3. Lấy thông tin ROLE:
   - Load ROLES dựa trên role_id
   - Parse permissions JSON
4. Lưu vào session:
   - Admin info
   - Role info
   - Permissions
5. Redirect đến dashboard
```

### 2. Kiểm tra quyền truy cập

```php
// Middleware kiểm tra permission
public function handle($request, Closure $next, $permission)
{
    $admin = auth()->guard('admin')->user();
    
    if (!$admin) {
        return redirect()->route('admin.login');
    }
    
    $role = $admin->role;
    
    // Super admin có tất cả quyền
    if ($role->permission_type === 'all') {
        return $next($request);
    }
    
    // Kiểm tra custom permissions
    $permissions = json_decode($role->permissions, true);
    
    if (!in_array($permission, $permissions)) {
        abort(403, 'Unauthorized action.');
    }
    
    return $next($request);
}
```

### 3. Đăng ký Customer

```
1. Customer điền form đăng ký
2. Validate:
   - Email chưa tồn tại
   - Password đủ mạnh
   - Phone chưa tồn tại (nếu có)
3. Tạo CUSTOMERS:
   - Hash password (bcrypt)
   - Generate token xác thực
   - Set status = 0 (chưa kích hoạt)
   - Set is_verified = 0
   - Gán customer_group_id mặc định (General)
4. Gửi email xác thực
5. Customer click link xác thực:
   - Validate token
   - Set is_verified = 1, status = 1
   - Clear token
6. Redirect đến trang đăng nhập
```

### 4. Đăng nhập Customer

```
1. Customer nhập email và password
2. Validate credentials
3. Kiểm tra:
   - status = 1 (active)
   - is_suspended = 0 (không bị tạm ngưng)
   - is_verified = 1 (đã xác thực email)
4. Load CUSTOMER_GROUP info
5. Lưu vào session
6. Redirect về trang trước hoặc trang chủ
```

### 5. Reset Password

```
# Request reset
1. User nhập email
2. Validate email tồn tại
3. Generate random token
4. Lưu vào PASSWORD_RESETS table:
   - email
   - token (hashed)
   - created_at
5. Gửi email với link reset (chứa token)

# Reset password
1. User click link reset
2. Validate token:
   - Token tồn tại trong database
   - created_at không quá 60 phút
3. User nhập password mới
4. Cập nhật password trong ADMINS/CUSTOMERS
5. Xóa record trong PASSWORD_RESETS
6. (Optional) Revoke tất cả sessions cũ
```

### 6. API Authentication (Sanctum)

```
# Tạo token
1. User đăng nhập với email/password
2. Validate credentials
3. Tạo PERSONAL_ACCESS_TOKENS:
   - tokenable_type = 'Customer' (hoặc 'Admin')
   - tokenable_id = user.id
   - name = device/app name
   - token = hash của random string
   - abilities = JSON array quyền
4. Return plain text token cho client (chỉ hiển thị 1 lần)

# Sử dụng token
1. Client gửi request với header:
   - Authorization: Bearer {token}
2. Middleware sanctum:
   - Hash token từ header
   - Tìm trong PERSONAL_ACCESS_TOKENS
   - Load tokenable (Customer/Admin)
   - Kiểm tra abilities
   - Cập nhật last_used_at
3. Nếu valid: Cho phép truy cập
4. Nếu invalid: Return 401 Unauthorized
```

### 7. Channel Access Control

```
1. Xác định channel từ:
   - Domain/hostname
   - Subdomain
   - URL parameter
2. Load CHANNELS config:
   - Theme
   - Locales
   - Currencies
   - Root category
3. Filter products/categories theo channel
4. Áp dụng pricing theo channel
5. Kiểm tra maintenance mode:
   - Nếu is_maintenance_on = 1
   - Kiểm tra IP trong allowed_ips
   - Nếu không: Hiển thị maintenance page
```

### 8. Multi-locale Support

```
1. Detect locale từ:
   - URL segment (/en/, /vi/)
   - Cookie
   - Browser Accept-Language header
   - User preference
2. Validate locale trong CHANNEL_LOCALES
3. Load translations theo locale
4. Load content (category_translations, product_attribute_values) theo locale
5. Set locale cho application
```

## Các vai trò mặc định

### 1. Super Administrator
```json
{
  "name": "Super Administrator",
  "permission_type": "all",
  "permissions": null
}
```
- Toàn quyền trên hệ thống
- Quản lý admins, roles
- Cấu hình hệ thống

### 2. Administrator
```json
{
  "name": "Administrator",
  "permission_type": "custom",
  "permissions": [
    "dashboard",
    "sales.*",
    "catalog.*",
    "customers.*",
    "marketing.*",
    "cms.*"
  ]
}
```
- Quản lý toàn bộ nội dung
- Không được thay đổi settings và roles

### 3. Sales Manager
```json
{
  "name": "Sales Manager",
  "permission_type": "custom",
  "permissions": [
    "dashboard",
    "sales.*",
    "customers.customers.*",
    "customers.reviews.view",
    "catalog.products.view"
  ]
}
```
- Quản lý đơn hàng
- Xem và chỉnh sửa thông tin khách hàng
- Chỉ xem sản phẩm

### 4. Content Manager
```json
{
  "name": "Content Manager",
  "permission_type": "custom",
  "permissions": [
    "dashboard",
    "catalog.*",
    "cms.*",
    "marketing.seo.*"
  ]
}
```
- Quản lý sản phẩm, danh mục
- Quản lý CMS pages
- SEO management

### 5. Customer Support
```json
{
  "name": "Customer Support",
  "permission_type": "custom",
  "permissions": [
    "dashboard",
    "sales.orders.view",
    "sales.orders.edit",
    "customers.*"
  ]
}
```
- Xem và chỉnh sửa đơn hàng
- Quản lý khách hàng
- Xử lý review, complaint

## Security Best Practices

### 1. Password Policy
- Minimum 8 characters
- Require uppercase, lowercase, number, special char
- Hash using bcrypt (cost factor ≥ 10)
- Password expiration (optional, every 90 days)
- Prevent password reuse (last 5 passwords)

### 2. Session Management
- Session timeout: 2 hours idle
- Logout on password change
- Concurrent session limit
- Secure session cookie (httpOnly, secure, sameSite)

### 3. API Token Security
- Token expiration
- Rate limiting
- IP whitelist (optional)
- Ability-based access control
- Revoke on suspicious activity

### 4. Two-Factor Authentication (2FA)
- Optional/Required based on role
- Support TOTP (Google Authenticator)
- Backup codes
- Remember device option

### 5. Audit Logging
- Log all admin actions
- Log failed login attempts
- Log permission changes
- Log sensitive data access

### 6. IP Restriction
- Whitelist admin IPs
- Blacklist suspicious IPs
- GeoIP blocking
- Rate limiting per IP

## Ràng buộc quan trọng

1. **Unique Email**: Email phải unique trong ADMINS và CUSTOMERS
2. **Active Role**: Admin phải có role_id tham chiếu đến ROLES tồn tại
3. **Password Strength**: Bắt buộc đủ mạnh
4. **Token Expiration**: Password reset token hết hạn sau 60 phút
5. **Channel Locale**: Mỗi channel phải có ít nhất 1 locale
6. **Channel Currency**: Mỗi channel phải có ít nhất 1 currency
7. **Default Channel**: Phải có ít nhất 1 channel active
