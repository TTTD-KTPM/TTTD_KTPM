# Customer Access Control Unit Tests - Test Coverage Map

## Overview
This document maps the use cases from the provided diagrams to unit tests in `CustomerAccessControlUnitTest.php`.

## Test File Location
`packages/Webkul/Shop/tests/Unit/CustomerAccessControlUnitTest.php`

## Use Case Coverage

### BUYER USE CASES

#### ✅ UC1: Register/Login Account
**Controller:** `Shop\Customer\RegistrationController`, `Shop\Customer\SessionController`

**Unit Tests:**
- `test_customer_registration_creates_customer_record()` - Validates customer creation
- `test_customer_registration_requires_unique_email()` - Ensures email uniqueness
- `test_customer_can_authenticate_with_valid_credentials()` - Tests successful login
- `test_customer_authentication_fails_with_invalid_credentials()` - Tests failed login
- `test_inactive_customer_cannot_authenticate()` - Validates status check

**Related Controllers:**
- `Webkul\Shop\Http\Controllers\Customer\RegistrationController`
- `Webkul\Shop\Http\Controllers\Customer\SessionController`

---

#### ✅ UC2: Manage Personal Information
**Controller:** `Shop\Customer\CustomerController`

**Unit Tests:**
- `test_customer_profile_can_be_updated()` - Tests profile updates
- `test_customer_password_can_be_changed()` - Tests password change
- `test_customer_newsletter_subscription()` - Tests newsletter subscription
- `test_customer_can_be_deleted()` - Tests account deletion

**Related Controllers:**
- `Webkul\Shop\Http\Controllers\Customer\CustomerController`

---

#### ✅ UC3: View Purchase History
**Controller:** `Shop\Customer\Account\OrderController`

**Unit Tests:**
- `test_customer_can_retrieve_own_orders()` - Tests order retrieval
- `test_customer_cannot_access_other_customer_orders()` - Tests access control
- `test_order_belongs_to_customer()` - Validates ownership

**Related Controllers:**
- `Webkul\Shop\Http\Controllers\Customer\Account\OrderController`

---

#### ⚠️ UC4: Save Favorite Products (Wishlist)
**Controller:** `Shop\Customer\Account\WishlistController`

**Unit Tests:**
- `test_customer_has_wishlist_relationship()` - Tests relationship existence
- `test_wishlist_functionality_requires_product_model()` - **MARKED AS SKIPPED**

**Status:** PARTIALLY TESTABLE - Wishlist add/remove requires full product and wishlist item setup

**Related Controllers:**
- `Webkul\Shop\Http\Controllers\Customer\Account\WishlistController`

---

#### ✅ UC5: Rate and Review Products
**Controller:** `Shop\API\ReviewController`

**Unit Tests:**
- `test_customer_can_create_product_review()` - Tests review creation
- `test_review_rating_must_be_between_1_and_5()` - Validates rating range
- `test_new_reviews_are_pending_by_default()` - Tests default status

**Related Controllers:**
- `Webkul\Shop\Http\Controllers\API\ReviewController`

---

#### ❌ UC6: Checkout
**Controller:** `Shop\CheckoutController` (disabled)

**Unit Tests:**
- `test_checkout_requires_cart_functionality()` - **MARKED AS SKIPPED**

**Status:** NOT DOABLE - Shopping cart is disabled in Triet-Customer branch

---

### CUSTOMER MANAGER USE CASES

#### ✅ UC7: Access and Edit Customer Information (Admin)
**Controller:** `Admin\Customers\CustomerController`

**Unit Tests:**
- `test_admin_can_create_customer()` - Tests admin creating customer
- `test_admin_can_update_customer_information()` - Tests admin updates
- `test_admin_can_delete_customer()` - Tests admin deletion

**Related Controllers:**
- `Webkul\Admin\Http\Controllers\Customers\CustomerController`

---

#### ✅ UC8: Segment Customers into Groups
**Controller:** `Admin\Customers\CustomerGroupController`

**Unit Tests:**
- `test_customer_group_can_be_created()` - Tests group creation
- `test_customer_can_be_assigned_to_group()` - Tests group assignment
- `test_customer_group_code_must_be_unique()` - Validates uniqueness

**Related Controllers:**
- `Webkul\Admin\Http\Controllers\Customers\CustomerGroupController`

---

#### ❌ UC9: Assign Group-Specific Promotions and Pricing
**Controller:** Catalog Rule Controllers (complex)

**Unit Tests:**
- `test_group_specific_pricing_requires_catalog_rules()` - **MARKED AS SKIPPED**

**Status:** NOT DOABLE - Requires catalog rule models and pricing calculation logic

---

#### ✅ UC10: Moderate Product Reviews (Admin)
**Controller:** Admin Review Controllers

**Unit Tests:**
- `test_admin_can_approve_product_review()` - Tests approval
- `test_admin_can_delete_product_review()` - Tests deletion

**Related Controllers:**
- Admin Review Management (part of Product module)

---

#### ❌ UC11: Analyze Customer Feedback
**Controller:** Reporting/Analytics Controllers

**Unit Tests:**
- `test_customer_feedback_analysis_not_available()` - **MARKED AS SKIPPED**

**Status:** NOT DOABLE - Requires analytics/reporting system not suitable for unit tests

---

### ADMIN USE CASES

#### ✅ UC12: Admin Login
**Controller:** `Admin\User\SessionController`

**Unit Tests:**
- `test_admin_can_authenticate()` - Tests admin login
- `test_admin_authentication_fails_with_invalid_credentials()` - Tests failed login
- `test_inactive_admin_cannot_authenticate()` - Tests status check

**Related Controllers:**
- `Webkul\Admin\Http\Controllers\User\SessionController`

---

#### ✅ UC13: Manage Access with ACL
**Controller:** `Admin\Settings\RoleController`

**Unit Tests:**
- `test_admin_role_can_be_created()` - Tests role creation
- `test_admin_belongs_to_role()` - Tests role assignment
- `test_role_has_permissions()` - Tests permissions

**Related Controllers:**
- `Webkul\Admin\Http\Controllers\Settings\RoleController`

---

#### ✅ UC14: Create/Update/Delete Staff Accounts
**Controller:** `Admin\Settings\UserController`

**Unit Tests:**
- `test_admin_user_can_be_created()` - Tests admin creation
- `test_admin_user_can_be_updated()` - Tests admin update
- `test_admin_user_can_be_deleted()` - Tests admin deletion

**Related Controllers:**
- `Webkul\Admin\Http\Controllers\Settings\UserController`

---

#### ⚠️ UC15: Reset Password
**Controller:** `Shop\Customer\ResetPasswordController`, `Shop\Customer\ForgotPasswordController`

**Unit Tests:**
- `test_customer_password_can_be_reset()` - Tests password reset
- `test_password_reset_token_functionality()` - **MARKED AS SKIPPED**

**Status:** PARTIALLY TESTABLE - Token generation and email sending require full infrastructure

**Related Controllers:**
- `Webkul\Shop\Http\Controllers\Customer\ResetPasswordController`
- `Webkul\Shop\Http\Controllers\Customer\ForgotPasswordController`

---

### ADDITIONAL TESTS

#### ✅ Customer Address Management
**Controller:** `Shop\Customer\Account\AddressController`

**Unit Tests:**
- `test_customer_can_have_multiple_addresses()` - Tests multiple addresses
- `test_customer_can_set_default_address()` - Tests default address
- `test_only_one_address_can_be_default()` - Tests uniqueness constraint

**Related Controllers:**
- `Webkul\Shop\Http\Controllers\Customer\Account\AddressController`

---

## Test Statistics

- **Total Use Cases:** 15
- **Fully Testable:** 10 ✅
- **Partially Testable:** 2 ⚠️
- **Not Testable (Marked as Skipped):** 3 ❌
- **Total Unit Tests:** 48

## Controllers Mapped

### Shop Controllers
1. `Customer\RegistrationController` - Customer registration
2. `Customer\SessionController` - Customer login/logout
3. `Customer\CustomerController` - Profile management
4. `Customer\ResetPasswordController` - Password reset
5. `Customer\ForgotPasswordController` - Forgot password
6. `Customer\Account\OrderController` - Order history
7. `Customer\Account\WishlistController` - Wishlist management
8. `Customer\Account\AddressController` - Address management
9. `API\ReviewController` - Product reviews

### Admin Controllers
1. `Customers\CustomerController` - Admin customer management
2. `Customers\CustomerGroupController` - Customer group management
3. `Settings\UserController` - Admin user management
4. `Settings\RoleController` - Role & permission management
5. `User\SessionController` - Admin login

## Running the Tests

**IMPORTANT:** These unit tests require a properly seeded database with channels and other core data. Before running:

```bash
# Seed the database first
php artisan db:seed

# OR run migrations with seed
php artisan migrate:fresh --seed

# Then run the unit tests
vendor/bin/pest packages/Webkul/Shop/tests/Unit/CustomerAccessControlUnitTest.php

# Run specific test
vendor/bin/pest packages/Webkul/Shop/tests/Unit/CustomerAccessControlUnitTest.php --filter test_customer_can_authenticate_with_valid_credentials

# Run with coverage
vendor/bin/pest packages/Webkul/Shop/tests/Unit/CustomerAccessControlUnitTest.php --coverage
```

**Note:** If tests fail with "Attempt to read property id on null", it means the database is not properly seeded with required data (channels, locales, currencies, etc.).

## Alternative: Using Integration Tests

If unit tests are difficult to set up due to database dependencies, consider using the integration tests in `CustomerAccessControlTest.php` which handle all setup automatically.

## Notes

1. **Unit Tests vs Integration Tests:** These are true unit tests focusing on individual model operations and authentication logic, unlike the `CustomerAccessControlTest.php` which contains integration tests.

2. **Skipped Tests:** Tests marked as skipped require:
   - Cart/Checkout functionality (disabled in branch)
   - Complex pricing and catalog rules
   - Analytics and reporting systems
   - Email infrastructure for password reset tokens

3. **Test Isolation:** Each test uses `RefreshDatabase` trait to ensure clean database state.

4. **Factories Required:** Ensure you have factories for:
   - `Customer`
   - `CustomerGroup`
   - `CustomerAddress`
   - `Product`
   - `ProductReview`
   - `Order`
   - `Admin`
   - `Role`

## Comparison with CustomerAccessControlTest.php

| Feature | CustomerAccessControlTest | CustomerAccessControlUnitTest |
|---------|---------------------------|-------------------------------|
| Test Type | Integration | Unit |
| Scope | End-to-end user flows | Individual component logic |
| HTTP Requests | Yes | No |
| Database | Full transactions | Model operations only |
| Controllers | Tested via routes | Logic tested directly |
| Coverage | User journeys | Component isolation |

## Recommendations

1. **Run both test suites:** Integration tests validate user flows, unit tests validate component logic
2. **Update factories:** Ensure all model factories exist and work correctly
3. **Add more edge cases:** Consider adding more validation tests
4. **Performance:** Unit tests should run much faster than integration tests
