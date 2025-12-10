<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Webkul\Customer\Models\Customer;
use Webkul\Customer\Models\CustomerAddress;
use Webkul\Sales\Models\Order;
use Webkul\Sales\Models\OrderItem;
use Webkul\Sales\Models\OrderAddress;
use Webkul\Sales\Models\OrderPayment;
use Webkul\Product\Models\Product;

class OrderTestDataSeeder extends Seeder
{
    public function run(): void
    {
        // Get or create test customer
        $customer = Customer::firstOrCreate(
            ['email' => 'testcustomer@example.com'],
            [
                'first_name' => 'Test',
                'last_name' => 'Customer',
                'password' => bcrypt('password123'),
                'gender' => 'Male',
                'channel_id' => 1,
                'customer_group_id' => 2,
                'is_verified' => 1,
            ]
        );

        $address = CustomerAddress::firstOrCreate(
            [
                'customer_id' => $customer->id,
                'default_address' => 1,
            ],
            [
                'company_name' => 'Test Company',
                'first_name' => 'Test',
                'last_name' => 'Customer',
                'address' => '123 Test Street',
                'city' => 'Ho Chi Minh',
                'state' => 'Ho Chi Minh',
                'postcode' => '700000',
                'country' => 'VN',
                'phone' => '0123456789',
            ]
        );

        $products = Product::limit(3)->get();

        // Create Order 1 - Pending (for test TC_01, TC_04)
        $incrementId1 = 'ORD' . time() . rand(100, 999);
        $order1 = Order::create([
            'increment_id' => $incrementId1,
            'customer_id' => $customer->id,
            'customer_email' => $customer->email,
            'customer_first_name' => $customer->first_name,
            'customer_last_name' => $customer->last_name,
            'status' => 'pending',
            'channel_id' => 1,
            'channel_name' => 'Default',
            'is_guest' => 0,
            'total_item_count' => 2,
            'total_qty_ordered' => 2,
            'base_currency_code' => 'USD',
            'channel_currency_code' => 'USD',
            'order_currency_code' => 'USD',
            'grand_total' => 330.00,
            'base_grand_total' => 330.00,
            'sub_total' => 330.00,
            'base_sub_total' => 330.00,
            'shipping_method' => 'flatrate_flatrate',
            'shipping_title' => 'Flat Rate - Flat Rate',
        ]);

        // Create Order Address
        OrderAddress::create([
            'order_id' => $order1->id,
            'address_type' => 'billing',
            'first_name' => 'Test',
            'last_name' => 'Customer',
            'address' => '123 Test Street',
            'city' => 'Ho Chi Minh',
            'state' => 'Ho Chi Minh',
            'postcode' => '700000',
            'country' => 'VN',
            'phone' => '0123456789',
        ]);

        OrderAddress::create([
            'order_id' => $order1->id,
            'address_type' => 'shipping',
            'first_name' => 'Test',
            'last_name' => 'Customer',
            'address' => '123 Test Street',
            'city' => 'Ho Chi Minh',
            'state' => 'Ho Chi Minh',
            'postcode' => '700000',
            'country' => 'VN',
            'phone' => '0123456789',
        ]);

        // Order Items for Order 1
        if ($products->count() >= 2) {
            OrderItem::create([
                'order_id' => $order1->id,
                'product_id' => $products[0]->id,
                'sku' => $products[0]->sku,
                'type' => 'simple',
                'name' => $products[0]->name ?? 'Product 1',
                'qty_ordered' => 1,
                'price' => 150.00,
                'base_price' => 150.00,
                'total' => 150.00,
                'base_total' => 150.00,
            ]);

            OrderItem::create([
                'order_id' => $order1->id,
                'product_id' => $products[1]->id,
                'sku' => $products[1]->sku,
                'type' => 'simple',
                'name' => $products[1]->name ?? 'Product 2',
                'qty_ordered' => 1,
                'price' => 180.00,
                'base_price' => 180.00,
                'total' => 180.00,
                'base_total' => 180.00,
            ]);
        }

        // Order Payment
        OrderPayment::create([
            'order_id' => $order1->id,
            'method' => 'cashondelivery',
            'method_title' => 'Cash On Delivery',
        ]);

        // Create Order 2 - Paid (for test TC_05, TC_07)
        $incrementId2 = 'ORD' . (time() + 1) . rand(100, 999);
        $order2 = Order::create([
            'increment_id' => $incrementId2,
            'customer_id' => $customer->id,
            'customer_email' => $customer->email,
            'customer_first_name' => $customer->first_name,
            'customer_last_name' => $customer->last_name,
            'status' => 'processing',
            'channel_id' => 1,
            'channel_name' => 'Default',
            'is_guest' => 0,
            'total_item_count' => 1,
            'total_qty_ordered' => 1,
            'base_currency_code' => 'USD',
            'channel_currency_code' => 'USD',
            'order_currency_code' => 'USD',
            'grand_total' => 65.00,
            'base_grand_total' => 65.00,
            'sub_total' => 65.00,
            'base_sub_total' => 65.00,
            'shipping_method' => 'flatrate_flatrate',
            'shipping_title' => 'Flat Rate - Flat Rate',
        ]);

        OrderAddress::create([
            'order_id' => $order2->id,
            'address_type' => 'billing',
            'first_name' => 'Test',
            'last_name' => 'Customer',
            'address' => '123 Test Street',
            'city' => 'Ho Chi Minh',
            'state' => 'Ho Chi Minh',
            'postcode' => '700000',
            'country' => 'VN',
            'phone' => '0123456789',
        ]);

        OrderAddress::create([
            'order_id' => $order2->id,
            'address_type' => 'shipping',
            'first_name' => 'Test',
            'last_name' => 'Customer',
            'address' => '123 Test Street',
            'city' => 'Ho Chi Minh',
            'state' => 'Ho Chi Minh',
            'postcode' => '700000',
            'country' => 'VN',
            'phone' => '0123456789',
        ]);

        if ($products->count() >= 1) {
            OrderItem::create([
                'order_id' => $order2->id,
                'product_id' => $products[2]->id,
                'sku' => $products[2]->sku,
                'type' => 'simple',
                'name' => $products[2]->name ?? 'Product 3',
                'qty_ordered' => 1,
                'price' => 65.00,
                'base_price' => 65.00,
                'total' => 65.00,
                'base_total' => 65.00,
            ]);
        }

        OrderPayment::create([
            'order_id' => $order2->id,
            'method' => 'cashondelivery',
            'method_title' => 'Cash On Delivery',
        ]);

        $this->command->info("✅ Created Order #{$order1->id} - Status: Pending - Total: \$330");
        $this->command->info("✅ Created Order #{$order2->id} - Status: Processing - Total: \$65");
        $this->command->info("✅ Test customer: testcustomer@example.com / password123");
    }
}
